<?php
/**
* @version		$Id: view.html.php 19343 2010-11-03 18:12:02Z ian $
* @package		Joomla
* @subpackage	Config
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

jimport( 'joomla.application.component.view');

/**
 * HTML View class for the Plugins component
 *
 * @static
 * @package		Joomla
 * @subpackage	Plugins
 * @since 1.0
 */
class PluginsViewPlugins extends JView
{
	function display( $tpl = null )
	{
		global $mainframe, $option;

		$db =& JFactory::getDBO();

		$client = JRequest::getWord( 'filter_client', 'site' );

		$filter_order		= $mainframe->getUserStateFromRequest( "$option.$client.filter_order",		'filter_order',		'p.folder',	'cmd' );
		$filter_order_Dir	= $mainframe->getUserStateFromRequest( "$option.$client.filter_order_Dir",	'filter_order_Dir',	'',			'word' );
		$filter_state		= $mainframe->getUserStateFromRequest( "$option.$client.filter_state",		'filter_state',		'',			'word' );
		$filter_type		= $mainframe->getUserStateFromRequest( "$option.$client.filter_type", 		'filter_type',		1,			'cmd' );
		$search				= $mainframe->getUserStateFromRequest( "$option.$client.search",			'search',			'',			'string' );
		if (strpos($search, '"') !== false) {
			$search = str_replace(array('=', '<'), '', $search);
		}
		$search = JString::strtolower($search);

		$limit		= $mainframe->getUserStateFromRequest( 'global.list.limit', 'limit', $mainframe->getCfg('list_limit'), 'int' );
		$limitstart	= $mainframe->getUserStateFromRequest( $option.'.limitstart', 'limitstart', 0, 'int' );

		$where = '';
		if ($client == 'admin') {
			$where[] = 'p.client_id = 1';
			$client_id = 1;
		} else {
			$where[] = 'p.client_id = 0';
			$client_id = 0;
		}

		// used by filter
		if ( $filter_type != 1 ) {
			$where[] = 'p.folder = '.$db->Quote($filter_type);
		}
		if ( $search ) {
			$where[] = 'LOWER( p.name ) LIKE '.$db->Quote( '%'.$db->getEscaped( $search, true ).'%', false );
		}
		if ( $filter_state ) {
			if ( $filter_state == 'P' ) {
				$where[] = 'p.published = 1';
			} else if ($filter_state == 'U' ) {
				$where[] = 'p.published = 0';
			}
		}

		$where 		= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );

		// sanitize $filter_order
		if (!in_array($filter_order, array('p.name', 'p.published', 'p.ordering', 'groupname', 'p.folder', 'p.element', 'p.id'))) {
			$filter_order = 'p.folder';
		}

		if (!in_array(strtoupper($filter_order_Dir), array('ASC', 'DESC'))) {
			$filter_order_Dir = '';
		}

		if ($filter_order == 'p.ordering') {
			$orderby = ' ORDER BY p.folder, p.ordering '. $filter_order_Dir;
		} else {
			$orderby = ' ORDER BY '. $filter_order .' '. $filter_order_Dir .', p.ordering ASC';
		}

		// get the total number of records
		$query = 'SELECT COUNT(*)'
			. ' FROM #__plugins AS p'
			. $where
			;
		$db->setQuery( $query );
		$total = $db->loadResult();

		jimport('joomla.html.pagination');
		$pagination = new JPagination( $total, $limitstart, $limit );

		$query = 'SELECT p.*, u.name AS editor, g.name AS groupname'
			. ' FROM #__plugins AS p'
			. ' LEFT JOIN #__users AS u ON u.id = p.checked_out'
			. ' LEFT JOIN #__groups AS g ON g.id = p.access'
			. $where
			. ' GROUP BY p.id'
			. $orderby
			;
		$db->setQuery( $query, $pagination->limitstart, $pagination->limit );
		$rows = $db->loadObjectList();
		if ($db->getErrorNum()) {
			echo $db->stderr();
			return false;
		}


		// get list of Positions for dropdown filter
		$query = 'SELECT folder AS value, folder AS text'
			. ' FROM #__plugins'
			. ' WHERE client_id = '.(int) $client_id
			. ' GROUP BY folder'
			. ' ORDER BY folder'
			;
		$types[] = JHTML::_('select.option',  1, '- '. JText::_( 'Select Type' ) .' -' );
		$db->setQuery( $query );
		$types 			= array_merge( $types, $db->loadObjectList() );
		$lists['type']	= JHTML::_('select.genericlist',   $types, 'filter_type', 'class="inputbox" size="1" onchange="document.adminForm.submit( );"', 'value', 'text', $filter_type );

		// state filter
		$lists['state']	= JHTML::_('grid.state',  $filter_state );


		// table ordering
		$lists['order_Dir']	= $filter_order_Dir;
		$lists['order']		= $filter_order;

		// search filter
		$lists['search']= $search;

		$this->assign('client',		$client);

		$this->assignRef('user',		JFactory::getUser());
		$this->assignRef('lists',		$lists);
		$this->assignRef('items',		$rows);
		$this->assignRef('pagination',	$pagination);

		parent::display($tpl);
	}
}
