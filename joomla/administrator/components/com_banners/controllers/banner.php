<?php
/**
 * @version		$Id: banner.php 19343 2010-11-03 18:12:02Z ian $
 * @package		Joomla
 * @subpackage	Banners
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.controller' );

/**
 * @package		Joomla
 * @subpackage	Banners
 */
class BannerControllerBanner extends JController
{
	/**
	 * Constructor
	 */
	function __construct( $config = array() )
	{
		parent::__construct( $config );
		// Register Extra tasks
		$this->registerTask( 'add',			'edit' );
		$this->registerTask( 'apply',		'save' );
		$this->registerTask( 'resethits',	'save' );
		$this->registerTask( 'unpublish',	'publish' );
	}

	/**
	 * Display the list of banners
	 */
	function display()
	{
		global $mainframe;

		$db =& JFactory::getDBO();

		$context			= 'com_banners.banner.list.';
		$filter_order		= $mainframe->getUserStateFromRequest( $context.'filter_order',		'filter_order',		'cc.title',	'cmd' );
		$filter_order_Dir	= $mainframe->getUserStateFromRequest( $context.'filter_order_Dir',	'filter_order_Dir',	'',			'word' );
		$filter_catid		= $mainframe->getUserStateFromRequest( $context.'filter_catid',		'filter_catid',		'',			'int' );
		$filter_state		= $mainframe->getUserStateFromRequest( $context.'filter_state',		'filter_state',		'',			'word' );
		$search				= $mainframe->getUserStateFromRequest( $context.'search',			'search',			'',			'string' );
		if (strpos($search, '"') !== false) {
			$search = str_replace(array('=', '<'), '', $search);
		}
		$search = JString::strtolower($search);

		$limit		= $mainframe->getUserStateFromRequest( 'global.list.limit', 'limit', $mainframe->getCfg('list_limit'), 'int' );
		$limitstart = $mainframe->getUserStateFromRequest( $context.'limitstart', 'limitstart', 0, 'int' );

		$where = array();

		if ( $filter_state )
		{
			if ( $filter_state == 'P' ) {
				$where[] = 'b.showBanner = 1';
			}
			else if ($filter_state == 'U' ) {
				$where[] = 'b.showBanner = 0';
			}
		}
		if ($filter_catid) {
			$where[] = 'cc.id = ' . (int) $filter_catid;
		}
		if ($search) {
			$where[] = 'LOWER(b.name) LIKE '.$db->Quote( '%'.$db->getEscaped( $search, true ).'%', false );
		}

		$where		= count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '';

		// sanitize $filter_order
		if (!in_array($filter_order, array('b.name', 'c.name', 'cc.title', 'b.showBanner', 'b.ordering', 'b.Sticky', 'b.impmade', 'b.clicks', 'b.bid'))) {
			$filter_order = 'cc.title';
		}

		if (!in_array(strtoupper($filter_order_Dir), array('ASC', 'DESC'))) {
			$filter_order_Dir = '';
		}

		$orderby	= ' ORDER BY '. $filter_order .' '. $filter_order_Dir .', b.ordering';

		// get the total number of records
		$query = 'SELECT COUNT(*)'
		. ' FROM #__banner AS b'
		. ' LEFT JOIN #__categories AS cc ON cc.id = b.catid'
		. $where
		;
		$db->setQuery( $query );
		$total = $db->loadResult();

		jimport('joomla.html.pagination');
		$pageNav = new JPagination( $total, $limitstart, $limit );

		$query = 'SELECT b.*, c.name AS client_name, cc.title AS category_name, u.name AS editor'
		. ' FROM #__banner AS b'
		. ' INNER JOIN #__bannerclient AS c ON c.cid = b.cid'
		. ' LEFT JOIN #__categories AS cc ON cc.id = b.catid'
		. ' LEFT JOIN #__users AS u ON u.id = b.checked_out'
		. $where
		. $orderby
		;
		$db->setQuery( $query, $pageNav->limitstart, $pageNav->limit );
		$rows = $db->loadObjectList();

		// build list of categories
		$javascript		= 'onchange="document.adminForm.submit();"';
		$lists['catid'] = JHTML::_('list.category',  'filter_catid', 'com_banner', (int) $filter_catid, $javascript );

		// state filter
		$lists['state']	= JHTML::_('grid.state',  $filter_state );

		// table ordering
		$lists['order_Dir']	= $filter_order_Dir;
		$lists['order']		= $filter_order;

		// search filter
		$lists['search']= $search;

		require_once(JPATH_COMPONENT.DS.'views'.DS.'banner.php');
		BannersViewBanner::banners( $rows, $pageNav, $lists );
	}

	function edit()
	{
		$db		=& JFactory::getDBO();
		$user	=& JFactory::getUser();

		if ($this->_task == 'edit') {
			$cid	= JRequest::getVar('cid', array(0), 'method', 'array');
			$cid	= array((int) $cid[0]);
		} else {
			$cid	= array( 0 );
		}

		$option = JRequest::getCmd('option');

		$lists = array();

		$row =& JTable::getInstance('banner', 'Table');
		$row->load( $cid[0] );

		if ($cid[0]) {
			$row->checkout( $user->get('id') );
		} else {
			$row->showBanner = 1;
		}

		// Build Client select list
		$sql = 'SELECT cid, name'
		. ' FROM #__bannerclient'
		;
		$db->setQuery($sql);
		if (!$db->query())
		{
			$this->setRedirect( 'index.php?option=com_banners' );
			return JError::raiseWarning( 500, $db->getErrorMsg() );
		}

		$banner_params = new JParameter( $row->params );
		$lists['width'] = $banner_params->get( 'width');
		$lists['height'] = $banner_params->get( 'height');

		$clientlist[]		= JHTML::_('select.option',  '0', JText::_( 'Select Client' ), 'cid', 'name' );
		$clientlist			= array_merge( $clientlist, $db->loadObjectList() );
		$lists['cid']		= JHTML::_('select.genericlist',   $clientlist, 'cid', 'class="inputbox" size="1"','cid', 'name', $row->cid );

		// Imagelist
		$javascript			= 'onchange="changeDisplayImage();"';
		$directory			= '/images/banners';
		$lists['imageurl']	= JHTML::_('list.images',  'imageurl', $row->imageurl, $javascript, $directory, "bmp|gif|jpg|png|swf"  );

		// build list of categories
		$lists['catid']		= JHTML::_('list.category',  'catid', 'com_banner', intval( $row->catid ) );

		// sticky
		$lists['sticky']	= JHTML::_('select.booleanlist',  'sticky', 'class="inputbox"', $row->sticky );

		// published
		$lists['showBanner'] = JHTML::_('select.booleanlist',  'showBanner', '', $row->showBanner );

		require_once(JPATH_COMPONENT.DS.'views'.DS.'banner.php');
		BannersViewBanner::banner( $row, $lists );
	}

	/**
	 * Save method
	 */
	function save()
	{
		global $mainframe;

		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );

		$this->setRedirect( 'index.php?option=com_banners' );

		// Initialize variables
		$db =& JFactory::getDBO();

		$post	= JRequest::get( 'post' );
		// fix up special html fields
		$post['custombannercode'] = JRequest::getVar( 'custombannercode', '', 'post', 'string', JREQUEST_ALLOWRAW );

		$row =& JTable::getInstance('banner', 'Table');

		// Save params temp fix
		$temp1 = array();
		$temp2 = array();
		$temp1['width'] = (int) $post['width'];
		$temp1['height'] = (int) $post['height'];
			foreach ($temp1 as $k => $v)
			{
				if ( $k && strlen($v) )
				{
					$temp2[] = $k.'='.$v;
				}
			}
		$row->params = implode( "\n", $temp2 );

		if (!$row->bind( $post )) {
			return JError::raiseWarning( 500, $row->getError() );
		}

		// Resets clicks when `Reset Clicks` button is used instead of `Save` button
		$task = JRequest::getCmd( 'task' );
		if ( $task == 'resethits' )
		{
			$row->clicks = 0;
			$msg = JText::_( 'Reset Banner clicks' );
		}

		// Sets impressions to unlimited when `unlimited` checkbox ticked
		$unlimited = JRequest::getBool('unlimited');
		if ($unlimited) {
			$row->imptotal = 0;
		}

		if (!$row->check()) {
			return JError::raiseWarning( 500, $row->getError() );
		}

		// if new item order last in appropriate group
		if (!$row->bid)
		{
			$where = 'catid = '.(int) $row->catid;
			$row->ordering = $row->getNextOrder( $where );
		}

		if (!$row->store()) {
			return JError::raiseWarning( 500, $row->getError() );
		}
		$row->checkin();

		switch ($task)
		{
			case 'apply':
				$link = 'index.php?option=com_banners&task=edit&cid[]='. $row->bid ;
				break;

			case 'save':
			default:
				$link = 'index.php?option=com_banners';
				break;
		}

		$this->setRedirect( $link, JText::_( 'Item Saved' ) );
	}

	function cancel()
	{
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );

		$this->setRedirect( 'index.php?option=com_banners' );

		// Initialize variables
		$db		=& JFactory::getDBO();
		$post	= JRequest::get( 'post' );
		$row	=& JTable::getInstance('banner', 'Table');
		$row->bind( $post );
		$row->checkin();
	}

	/**
	 * Copies one or more banners
	 */
	function copy()
	{
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );

		$this->setRedirect( 'index.php?option=com_banners' );

		$cid	= JRequest::getVar( 'cid', null, 'post', 'array' );
		$db		=& JFactory::getDBO();
		$table	=& JTable::getInstance('banner', 'Table');
		$user	= &JFactory::getUser();
		$n		= count( $cid );

		if ($n > 0)
		{
			foreach ($cid as $id)
			{
				if ($table->load( (int)$id ))
				{
					$table->bid				= 0;
					$table->name			= 'Copy of ' . $table->name;
					$table->impmade			= 0;
					$table->clicks			= 0;
					$table->showBanner		= 0;
					$table->date			= $db->getNullDate();

					if (!$table->store()) {
						return JError::raiseWarning( $table->getError() );
					}
				}
				else {
					return JError::raiseWarning( 500, $table->getError() );
				}
			}
		}
		else {
			return JError::raiseWarning( 500, JText::_( 'No items selected' ) );
		}
		$this->setMessage( JText::sprintf( 'Items copied', $n ) );
	}

	function publish()
	{
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );

		$this->setRedirect( 'index.php?option=com_banners' );

		// Initialize variables
		$db			=& JFactory::getDBO();
		$user		=& JFactory::getUser();
		$cid		= JRequest::getVar( 'cid', array(), 'post', 'array' );
		$task		= JRequest::getCmd( 'task' );
		$publish	= ($task == 'publish');
		$n			= count( $cid );

		if (empty( $cid )) {
			return JError::raiseWarning( 500, JText::_( 'No items selected' ) );
		}

		JArrayHelper::toInteger( $cid );
		$cids = implode( ',', $cid );

		$query = 'UPDATE #__banner'
		. ' SET showBanner = ' . (int) $publish
		. ' WHERE bid IN ( '. $cids.'  )'
		. ' AND ( checked_out = 0 OR ( checked_out = ' .(int) $user->get('id'). ' ) )'
		;
		$db->setQuery( $query );
		if (!$db->query()) {
			return JError::raiseWarning( 500, $db->getError() );
		}
		$this->setMessage( JText::sprintf( $publish ? 'Items published' : 'Items unpublished', $n ) );
	}

	function remove()
	{
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );

		$this->setRedirect( 'index.php?option=com_banners' );

		// Initialize variables
		$db		=& JFactory::getDBO();
		$cid	= JRequest::getVar( 'cid', array(), 'post', 'array' );
		$n		= count( $cid );
		JArrayHelper::toInteger( $cid );

		if ($n)
		{
			$query = 'DELETE FROM #__banner'
			. ' WHERE bid = ' . implode( ' OR bid = ', $cid )
			;
			$db->setQuery( $query );
			if (!$db->query()) {
				JError::raiseWarning( 500, $db->getError() );
			}
		}

		$this->setMessage( JText::sprintf( 'Items removed', $n ) );
	}

	/**
	 * Save the new order given by user
	 */
	function saveOrder()
	{
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );

		$this->setRedirect( 'index.php?option=com_banners' );

		// Initialize variables
		$db			=& JFactory::getDBO();
		$cid		= JRequest::getVar( 'cid', array(), 'post', 'array' );
		$order		= JRequest::getVar( 'order', array(), 'post', 'array' );
		$row		=& JTable::getInstance('banner', 'Table');
		$total		= count( $cid );
		$conditions	= array();

		if (empty( $cid )) {
			return JError::raiseWarning( 500, JText::_( 'No items selected' ) );
		}

		// update ordering values
		for ($i = 0; $i < $total; $i++)
		{
			$row->load( (int) $cid[$i] );
			if ($row->ordering != $order[$i])
			{
				$row->ordering = $order[$i];
				if (!$row->store()) {
					return JError::raiseError( 500, $db->getErrorMsg() );
				}
				// remember to reorder this category
				$condition = 'catid = '.(int) $row->catid;
				$found = false;
				foreach ($conditions as $cond) {
					if ($cond[1] == $condition)
					{
						$found = true;
						break;
					}
				}
				if (!$found) {
					$conditions[] = array ( $row->bid, $condition );
				}
			}
		}

		// execute reorder for each category
		foreach ($conditions as $cond)
		{
			$row->load( $cond[0] );
			$row->reorder( $cond[1] );
		}

		// Clear the component's cache
		$cache =& JFactory::getCache('com_banners');
		$cache->clean();

		$this->setMessage( JText::_('New ordering saved') );
	}
}
