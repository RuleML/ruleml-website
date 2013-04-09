<?php
/*
* @package Export Content
* @copyright Copyright (C) 2008 www.bestdownloadsites.com All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL,
* Export Content is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*/
/** ensure this file is being included by a parent file */
defined( '_JEXEC' ) or die( 'Restricted access' );

 /*********************************************
Export tables
**************************************************/
class mosExport_Sections extends mosDBTable {
	/** @var int Primary key */
	var $id					= null;
	/** @var text The menu title for the Section (a short name)*/
	var $title				= null;
	/** @var text The full name for the Section*/
	var $name				= null;
	/** @var string for version Joomla 1.5*/
	var $alias				= null;
	/** @var text */
	var $image				= null;
	/** @var string */
	var $scope				= null;
	/** @var int */
	var $image_position		= null;
	/** @var text */
	var $description		= null;
	/** @var boolean */
	var $published			= null;
	/** @var boolean */
	var $checked_out		= null;
	/** @var time */
	var $checked_out_time	= null;
	/** @var int */
	var $ordering			= null;
	/** @var int */
	var $access				= null;
	/** @var text */
	var $params				= null;
	/**
	* @param database A database connector object
	*/
	function mosExport_Sections( &$db ) {
		$this->mosDBTable( '#__export_sections', 'id', $db );
	}
	}
/*************************************
Storage Category table
*************************************/
class mosExport_Category extends mosDBTable {
	/** @var int Primary key */
	var $id					= null;
	/** @var int */
	var $parent_id			= null;
	/** @var text The menu title for the Category (a short name)*/
	var $title				= null;
	/** @var text The full name for the Category*/
	var $name				= null;
	/** @var string for version Joomla 1.5*/
	var $alias				= null;
	/** @var string */
	var $image				= null;
	/** @var string */
	var $section			= null;
	/** @var int */
	var $image_position		= null;
	/** @var text string */
	var $description		= null;
	/** @var boolean */
	var $published			= null;
	/** @var boolean */
	var $checked_out		= null;
	/** @var time */
	var $checked_out_time	= null;
	/** @var int */
	var $ordering			= null;
	/** @var int */
	var $access				= null;
	/** @var string */
	var $params				= null;
	/**
	* @param database A database connector object
	*/
	function mosExport_Category( &$db ) {
		$this->mosDBTable( '#__export_categories', 'id', $db );
	}
	}
/*************************************
Storage Content table
*************************************/
class mosExport_Content extends mosDBTable {
	/** @var int Primary key */
	var $id					= null;
	/** @var text string */
	var $title				= null;
	/** @var text string */
	var $title_alias		= null;
	/** @var string for version Joomla 1.5*/
	var $alias				= null;
	/** @var string */
	var $introtext			= null;
	/** @var string */
	var $fulltext			= null;
	/** @var int */
	var $state				= null;
	/** @var int The id of the category section*/
	var $sectionid			= null;
	/** @var int DEPRECATED */
	var $mask				= null;
	/** @var int */
	var $catid				= null;
	/** @var datetime */
	var $created			= null;
	/** @var int User id*/
	var $created_by			= null;
	/** @var text An alias for the author*/
	var $created_by_alias	= null;
	/** @var datetime */
	var $modified			= null;
	/** @var int User id*/
	var $modified_by		= null;
	/** @var boolean */
	var $checked_out		= null;
	/** @var time */
	var $checked_out_time	= null;
	/** @var datetime */
	var $publish_up			= null;
	/** @var datetime */
	var $publish_down		= null;
	/** @var string */
	var $images				= null;
	/** @var string */
	var $urls				= null;
	/** @var string */
	var $attribs			= null;
	/** @var int */
	var $version			= null;
	/** @var int */
	var $parentid			= null;
	/** @var int */
	var $ordering			= null;
	/** @var string */
	var $metakey			= null;
	/** @var string */
	var $metadesc			= null;
	/** @var int */
	var $access				= null;
	/** @var int */
	var $hits				= null;
	/** @var text */
	var $metadata           = null;
	/**
	* @param database A database connector object
	*/
	function mosExport_Content( &$db ) {
		$this->mosDBTable( '#__export_content', 'id', $db );
	}
    }
    
    
    jimport('joomla.application.component.controller');
    jimport('joomla.application.component.view');
    class ContentController extends JController
{
	/**
	 * Articles element
	 */
	function element()
	{
		$model	= &$this->getModel( 'element' );
		$view	= &$this->getView( 'element');
		$view->setModel( $model, true );
		$view->display();
	}

	/**
	* Compiles a list of installed or defined modules
	* @param database A database connector object
	*/
	function viewContent()
	{
		global $mainframe;

		// Initialize variables
		$db			=& JFactory::getDBO();
		$filter		= null;

		// Get some variables from the request
		$sectionid			= JRequest::getVar( 'sectionid', -1, '', 'int' );
		$redirect			= $sectionid;
		$option				= JRequest::getVar( 'option' );
		$context			= 'com_content.viewcontent';
		$filter_order		= $mainframe->getUserStateFromRequest( $context.'filter_order', 'filter_order', '');
		$filter_order_Dir	= $mainframe->getUserStateFromRequest( $context.'filter_order_Dir', 'filter_order_Dir', '');
		$filter_state		= $mainframe->getUserStateFromRequest( $context.'filter_state', 'filter_state', '*');
		$catid				= $mainframe->getUserStateFromRequest( $context.'catid', 'catid', 0);
		$filter_authorid	= $mainframe->getUserStateFromRequest( $context.'filter_authorid', 'filter_authorid', 0);
		$filter_sectionid	= $mainframe->getUserStateFromRequest( $context.'filter_sectionid', 'filter_sectionid', -1);
		$search				= $mainframe->getUserStateFromRequest( $context.'search', 'search', '');

		$limit		= (int) $mainframe->getUserStateFromRequest( 'global.list.limit', 'limit', $mainframe->getCfg('list_limit'), 0);
		$limitstart	= (int) $mainframe->getUserStateFromRequest( $context.'limitstart', 'limitstart', 0);

		//$where[] = "c.state >= 0";
		$where[] = 'c.state != -2';

		if (!$filter_order) {
			$filter_order = 'section_name';
		}
		$order = ' ORDER BY '. $filter_order .' '. $filter_order_Dir .', section_name, cc.title, c.ordering';
		$all = 1;

		if ($filter_sectionid >= 0) {
			$filter = ' WHERE cc.section = '. $filter_sectionid;
		}
		$section->title = 'All Articles';
		$section->id = 0;

		/*
		 * Add the filter specific information to the where clause
		 */
		// Section filter
		if ($filter_sectionid >= 0) {
			$where[] = 'c.sectionid = ' . (int) $filter_sectionid;
		}
		// Category filter
		if ($catid > 0) {
			$where[] = 'c.catid = ' . (int) $catid;
		}
		// Author filter
		if ($filter_authorid > 0) {
			$where[] = 'c.created_by = ' . (int) $filter_authorid;
		}
		// Content state filter
		if ($filter_state) {
			if ($filter_state == 'P') {
				$where[] = 'c.state = 1';
			} else {
				if ($filter_state == 'U') {
					$where[] = 'c.state = 0';
				} else if ($filter_state == 'A') {
					$where[] = 'c.state = -1';
				} else {
					$where[] = 'c.state != -2';
				}
			}
		}
		// Keyword filter
		if ($search) {
			$where[] = '(LOWER( c.title ) LIKE ' . $db->Quote( "%$search%" ) .
				' OR c.id = ' . (int) $search . ')';
		}

		// Build the where clause of the content record query
		$where = (count($where) ? ' WHERE '.implode(' AND ', $where) : '');

		// Get the total number of records
		$query = 'SELECT COUNT(*)' .
				' FROM #__content AS c' .
				' LEFT JOIN #__categories AS cc ON cc.id = c.catid' .
				' LEFT JOIN #__sections AS s ON s.id = c.sectionid' .
				$where;
		$db->setQuery($query);
		$total = $db->loadResult();


		// Create the pagination object
		jimport('joomla.html.pagination');
		$pagination = new JPagination($total, $limitstart, $limit);

		// Get the articles
		$query = 'SELECT c.*, g.name AS groupname, cc.title AS name, u.name AS editor, f.content_id AS frontpage, s.title AS section_name, v.name AS author' .
				' FROM #__content AS c' .
				' LEFT JOIN #__categories AS cc ON cc.id = c.catid' .
				' LEFT JOIN #__sections AS s ON s.id = c.sectionid' .
				' LEFT JOIN #__groups AS g ON g.id = c.access' .
				' LEFT JOIN #__users AS u ON u.id = c.checked_out' .
				' LEFT JOIN #__users AS v ON v.id = c.created_by' .
				' LEFT JOIN #__content_frontpage AS f ON f.content_id = c.id' .
				$where .
				$order;
		$db->setQuery($query, $pagination->limitstart, $pagination->limit);
		$rows = $db->loadObjectList();

		// If there is a database query error, throw a HTTP 500 and exit
		if ($db->getErrorNum()) {
			JError::raiseError( 500, $db->stderr() );
			return false;
		}

		// get list of categories for dropdown filter
		$query = 'SELECT cc.id AS value, cc.title AS text, section' .
				' FROM #__categories AS cc' .
				' INNER JOIN #__sections AS s ON s.id = cc.section '.$filter .
				' ORDER BY s.ordering, cc.ordering';
		$lists['catid'] = ContentHelper::filterCategory($query, $catid);

		// get list of sections for dropdown filter
		$javascript = 'onchange="document.adminForm.submit();"';
		$lists['sectionid'] = JHTML::_('list.section', 'filter_sectionid', $filter_sectionid, $javascript);

		// get list of Authors for dropdown filter
		$query = 'SELECT c.created_by, u.name' .
				' FROM #__content AS c' .
				' INNER JOIN #__sections AS s ON s.id = c.sectionid' .
				' LEFT JOIN #__users AS u ON u.id = c.created_by' .
				' WHERE c.state <> -1' .
				' AND c.state <> -2' .
				' GROUP BY u.name' .
				' ORDER BY u.name';
		$authors[] = JHTML::_('select.option', '0', '- '.JText::_('Select Author').' -', 'created_by', 'name');
		$db->setQuery($query);
		$authors = array_merge($authors, $db->loadObjectList());
		$lists['authorid'] = JHTML::_('select.genericlist',  $authors, 'filter_authorid', 'class="inputbox" size="1" onchange="document.adminForm.submit( );"', 'created_by', 'name', $filter_authorid);

		// state filter
		$lists['state'] = JHTML::_('grid.state', $filter_state, 'Published', 'Unpublished', 'Archived');

		// table ordering
		$lists['order_Dir']	= $filter_order_Dir;
		$lists['order']		= $filter_order;

		// search filter
		$lists['search'] = $search;

		ContentView::showContent($rows, $lists, $pagination, $redirect);
	}

	/**
	* Shows a list of archived articles
	* @param int The section id
	*/
	function viewArchive()
	{
		global $mainframe;

		// Initialize variables
		$db						=& JFactory::getDBO();

		$sectionid				= JRequest::getVar( 'sectionid', 0, '', 'int' );
		$option					= JRequest::getVar( 'option' );

		$filter_order			= $mainframe->getUserStateFromRequest("$option.$sectionid.viewarchive.filter_order", 'filter_order', 'sectname');
		$filter_order_Dir		= $mainframe->getUserStateFromRequest("$option.$sectionid.viewarchive.filter_order_Dir", 'filter_order_Dir', '');
		$catid					= $mainframe->getUserStateFromRequest("$option.$sectionid.viewarchive.catid", 'catid', 0);
		$limit					= $mainframe->getUserStateFromRequest('limit', 'limit', $mainframe->getCfg('list_limit'));
		$limitstart				= $mainframe->getUserStateFromRequest("$option.$sectionid.viewarchive.limitstart", 'limitstart', 0);
		$filter_authorid		= $mainframe->getUserStateFromRequest("$option.$sectionid.viewarchive.filter_authorid", 'filter_authorid', 0);
		$filter_sectionid		= $mainframe->getUserStateFromRequest("$option.$sectionid.viewarchive.filter_sectionid", 'filter_sectionid', 0);
		$search					= $mainframe->getUserStateFromRequest("$option.$sectionid.viewarchive.search", 'search', '');
		$search					= $db->getEscaped(JString::strtolower($search));
		$redirect				= $sectionid;

		// A section id of zero means view all articles [all sections]
		if ($sectionid == 0)
		{
			$where = array ('c.state 	= -1', 'c.catid	= cc.id', 'cc.section = s.id', 's.scope  	= "content"');
			$filter = ' , #__sections AS s WHERE s.id = c.section';
			$all = 1;
		}
		else
		{
			 //We are viewing a specific section
			$where = array ('c.state 	= -1', 'c.catid	= cc.id', 'cc.section	= s.id', 's.scope	= "content"', 'c.sectionid= '.$sectionid);
			$filter = ' WHERE section = "'.$sectionid.'"';
			$all = NULL;
		}

		// Section filter
		if ($filter_sectionid > 0)
		{
			$where[] = 'c.sectionid = ' . (int) $filter_sectionid;
		}
		// Author filter
		if ($filter_authorid > 0)
		{
			$where[] = 'c.created_by = ' . (int) $filter_authorid;
		}
		// Category filter
		if ($catid > 0)
		{
			$where[] = 'c.catid = ' . (int) $catid;
		}
		// Keyword filter
		if ($search)
		{
			$where[] = 'LOWER( c.title ) LIKE "%'.$search.'%"';
		}

		// TODO: Sanitise $filter_order
		$filter_order_Dir = ($filter_order_Dir == 'ASC' ? 'ASC' : 'DESC');
		$orderby = ' ORDER BY '. $filter_order .' '. $filter_order_Dir .', sectname, cc.name, c.ordering';
		$where = (count($where) ? ' WHERE '.implode(' AND ', $where) : '');

		// get the total number of records
		$query = 'SELECT COUNT(*)' .
				' FROM #__content AS c' .
				' LEFT JOIN #__categories AS cc ON cc.id = c.catid' .
				' LEFT JOIN #__sections AS s ON s.id = c.sectionid'.$where;
		$db->setQuery($query);
		$total = $db->loadResult();

		jimport('joomla.html.pagination');
		$pagination = new JPagination($total, $limitstart, $limit);

		$query = 'SELECT c.*, g.name AS groupname, cc.name, v.name AS author, s.title AS sectname' .
				' FROM #__content AS c' .
				' LEFT JOIN #__categories AS cc ON cc.id = c.catid' .
				' LEFT JOIN #__sections AS s ON s.id = c.sectionid' .
				' LEFT JOIN #__groups AS g ON g.id = c.access' .
				' LEFT JOIN #__users AS v ON v.id = c.created_by'.$where.$orderby;
		$db->setQuery($query, $pagination->limitstart, $pagination->limit);
		$rows = $db->loadObjectList();

		// If there is a database query error, throw a HTTP 500 and exit
		if ($db->getErrorNum())
		{
			JError::raiseError( 500, $db->stderr() );
			return false;
		}

		// get list of categories for dropdown filter
		$query = 'SELECT c.id AS value, c.title AS text' .
				' FROM #__categories AS c'.$filter .
				' ORDER BY c.ordering';
		$lists['catid'] = ContentHelper::filterCategory($query, $catid);

		// get list of sections for dropdown filter
		$javascript = 'onchange="document.adminForm.submit();"';
		$lists['sectionid'] = JAdminMenus::SelectSection('filter_sectionid', $filter_sectionid, $javascript);

		$section = & JTable::getInstance('section');
		$section->load($sectionid);

		// get list of Authors for dropdown filter
		$query = 'SELECT c.created_by, u.name' .
				' FROM #__content AS c' .
				' INNER JOIN #__sections AS s ON s.id = c.sectionid' .
				' LEFT JOIN #__users AS u ON u.id = c.created_by' .
				' WHERE c.state = -1' .
				' GROUP BY u.name' .
				' ORDER BY u.name';
		$db->setQuery($query);
		$authors[] = JHTML::_('select.option', '0', '- '.JText::_('Select Author').' -', 'created_by', 'name');
		$authors = array_merge($authors, $db->loadObjectList());
		$lists['authorid'] = JHTML::_('select.genericlist',  $authors, 'filter_authorid', 'class="inputbox" size="1" onchange="document.adminForm.submit( );"', 'created_by', 'name', $filter_authorid);

		// table ordering
		$lists['order_Dir']	= $filter_order_Dir;
		$lists['order']		= $filter_order;

		// search filter
		$lists['search'] = $search;

		ContentView::showArchive($rows, $section, $lists, $pagination, $option, $all, $redirect);
	}

	/**
	* Compiles information to add or edit the record
	*
	* @param database A database connector object
	* @param integer The unique id of the record to edit (0 if new)
	* @param integer The id of the content section
	*/
	function editContent()
	{
		global $mainframe;

		// Initialize variables
		$db				= & JFactory::getDBO();
		$user			= & JFactory::getUser();

		$cid			= JRequest::getVar( 'cid', array(0), '', 'array' );
		$id				= JRequest::getVar( 'id', @$cid[0], '', 'int' );
		$option			= JRequest::getVar( 'option' );
		$nullDate		= $db->getNullDate();
		$contentSection = '';
		$sectionid  	= 0;

		// Create and load the content table row
		$row = & JTable::getInstance('content');
		$row->load($id);

		if ($id) {
			$sectionid = $row->sectionid;
			if ($row->state < 0) {
				$mainframe->redirect('index.php?option=com_content', JText::_('You cannot edit an archived item'));
			}
		}

		// A sectionid of zero means grab from all sections
		if ($sectionid == 0) {
			$where = ' WHERE section NOT LIKE "%com_%"';
		} else {
			// Grab from the specific section
			$where = ' WHERE section = '. $db->Quote( $sectionid );
		}

		/*
		 * If the item is checked out we cannot edit it... unless it was checked
		 * out by the current user.
		 */
		if ( JTable::isCheckedOut($user->get ('id'), $row->checked_out ))
		{
			$msg = JText::sprintf('DESCBEINGEDITTED', JText::_('The item'), $row->title);
			$mainframe->redirect('index.php?option=com_content', $msg);
		}

		if ($id)
		{
			$row->checkout($user->get('id'));

			if (trim($row->images)) {
				$row->images = explode("\n", $row->images);
			} else {
				$row->images = array ();
			}

			$row->publish_down 	= ContentController::_validateDate($row->publish_down);

			$query = 'SELECT name' .
					' FROM #__users'.
					' WHERE id = '. $row->created_by;
			$db->setQuery($query);
			$row->creator = $db->loadResult();

			// test to reduce unneeded query
			if ($row->created_by == $row->modified_by) {
				$row->modifier = $row->creator;
			} else {
				$query = 'SELECT name' .
						' FROM #__users' .
						' WHERE id = '. $row->modified_by;
				$db->setQuery($query);
				$row->modifier = $db->loadResult();
			}

			$query = 'SELECT COUNT(content_id)' .
					' FROM #__content_frontpage' .
					' WHERE content_id = '. $row->id;
			$db->setQuery($query);
			$row->frontpage = $db->loadResult();
			if (!$row->frontpage) {
				$row->frontpage = 0;
			}
		}
		else
		{
			if (!$sectionid && @ JRequest::getVar('filter_sectionid')) {
				$sectionid =JRequest::getVar('filter_sectionid');
			}

			if (@JRequest::getVar('catid'))
			{
				$row->catid	 = JRequest::getVar('catid');
				$category 	 = & JTable::getInstance('category');
				$category->load(JRequest::getVar('catid'));
				$sectionid = $category->section;
			} else {
				$row->catid = NULL;
			}
			jimport('joomla.utilities.date');
			$createdate = new JDate();
			$row->sectionid = $sectionid;
			$row->version = 0;
			$row->state = 1;
			$row->ordering = 0;
			$row->images = array ();
			$row->publish_up = $createdate->toUnix();
			$row->publish_down = JText::_('Never');
			$row->creator = '';
			$row->created = $createdate->toUnix();
			$row->modified = $nullDate;
			$row->modifier = '';
			$row->frontpage = 0;

		}

		$javascript = "onchange=\"changeDynaList( 'catid', sectioncategories, document.adminForm.sectionid.options[document.adminForm.sectionid.selectedIndex].value, 0, 0);\"";

		$query = 'SELECT s.id, s.title' .
				' FROM #__sections AS s' .
				' ORDER BY s.ordering';
		$db->setQuery($query);

		$sections[] = JHTML::_('select.option', '-1', '- '.JText::_('Select Section').' -', 'id', 'title');
		$sections[] = JHTML::_('select.option', '0', JText::_('Uncategorized'), 'id', 'title');
		$sections = array_merge($sections, $db->loadObjectList());
		$lists['sectionid'] = JHTML::_('select.genericlist',  $sections, 'sectionid', 'class="inputbox" size="1" '.$javascript, 'id', 'title', intval($row->sectionid));

		foreach ($sections as $section)
		{
			$section_list[] = $section->id;
			// get the type name - which is a special category
			if ($row->sectionid) {
				if ($section->id == $row->sectionid) {
					$contentSection = $section->title;
				}
			} else {
				if ($section->id == $sectionid) {
					$contentSection = $section->title;
				}
			}
		}

		$sectioncategories = array ();
		$sectioncategories[-1] = array ();
		$sectioncategories[-1][] = JHTML::_('select.option', '-1', JText::_( 'Select Category' ), 'id', 'title');
		$section_list = implode('\', \'', $section_list);

		$query = 'SELECT id, title, section' .
				' FROM #__categories' .
				' WHERE section IN ( \''.$section_list.'\' )' .
				' ORDER BY ordering';
		$db->setQuery($query);
		$cat_list = $db->loadObjectList();

		// Uncategorized category mapped to uncategorized section
		$uncat = new stdClass();
		$uncat->id = 0;
		$uncat->title = JText::_('Uncategorized');
		$uncat->section = 0;
		$cat_list[] = $uncat;
		foreach ($sections as $section)
		{
			$sectioncategories[$section->id] = array ();
			$rows2 = array ();
			foreach ($cat_list as $cat)
			{
				if ($cat->section == $section->id) {
					$rows2[] = $cat;
				}
			}
			foreach ($rows2 as $row2) {
				$sectioncategories[$section->id][] = JHTML::_('select.option', $row2->id, $row2->title, 'id', 'title');
			}
		}

		$categories = array();
		foreach ($cat_list as $cat) {
			if($cat->section == $row->sectionid)
				$categories[] = $cat;
		}

		$categories[] = JHTML::_('select.option', '-1', JText::_( 'Select Category' ), 'id', 'title');
		$lists['catid'] = JHTML::_('select.genericlist',  $categories, 'catid', 'class="inputbox" size="1"', 'id', 'title', intval($row->catid));

		// build the html select list for ordering
		$query = 'SELECT ordering AS value, title AS text' .
				' FROM #__content' .
				' WHERE catid = ' . (int) $row->catid .
				' AND state >= 0' .
				' ORDER BY ordering';
		$lists['ordering'] = JHTML::_('list.specificordering', $row, $id, $query, 1);

		// build the html radio buttons for frontpage
		$lists['frontpage'] = JHTML::_('select.booleanlist', 'frontpage', '', $row->frontpage);

		// build the html radio buttons for published
		$lists['state'] = JHTML::_('select.booleanlist', 'state', '', $row->state);

		/*
		 * We need to unify the introtext and fulltext fields and have the
		 * fields separated by the {readmore} tag, so lets do that now.
		 */
		if (JString::strlen($row->fulltext) > 1) {
			$row->text = $row->introtext . "<hr id=\"system-readmore\" />" . $row->fulltext;
		} else {
			$row->text = $row->introtext;
		}

		// Create the form
		$form = new JParameter('', JPATH_COMPONENT.DS.'models'.DS.'article.xml');

		// Details Group
		$active = (intval($row->created_by) ? intval($row->created_by) : $user->get('id'));
		$form->set('created_by', $active);
		$form->set('access', $row->access);
		$form->set('created_by_alias', $row->created_by_alias);

		$form->set('created', JHTML::_('date', $row->created, '%Y-%m-%d %H:%M:%S'));
		$form->set('publish_up', JHTML::_('date', $row->publish_up, '%Y-%m-%d %H:%M:%S'));
		$form->set('publish_down', $row->publish_down);

		// Advanced Group
		$form->loadINI($row->attribs);

		// Metadata Group
		$form->set('description', $row->metadesc);
		$form->set('keywords', $row->metakey);
		$form->loadINI($row->metadata);

		ContentView::editContent($row, $contentSection, $lists, $sectioncategories, $option, $form);
	}

	/**
	* Saves the article an edit form submit
	* @param database A database connector object
	*/
	function saveContent()
	{
		global $mainframe;

		jimport('joomla.utilities.date');

		// Initialize variables
		$db			= & JFactory::getDBO();
		$user		= & JFactory::getUser();

		$details	= JRequest::getVar( 'details', array(), 'post', 'array');
		$option		= JRequest::getVar( 'option' );
		$task		= JRequest::getVar( 'task' );
		$sectionid	= JRequest::getVar( 'sectionid', 0, '', 'int' );
		$redirect	= JRequest::getVar( 'redirect', $sectionid, 'post' );
		$menu		= JRequest::getVar( 'menu', 'mainmenu', 'post' );
		$menuid		= JRequest::getVar( 'menuid', 0, 'post' );
		$nullDate	= $db->getNullDate();

		$row = & JTable::getInstance('content');
		if (!$row->bind(JRequest::get('post'))) {
			JError::raiseError( 500, $db->stderr() );
			return false;
		}
		$row->bind($details);

		// sanitise id field
		$row->id = (int) $row->id;

		// Are we saving from an item edit?
		if ($row->id) {
			$datenow = new JDate();
			$row->modified 		= $datenow->toFormat();
			$row->modified_by 	= $user->get('id');
		}

		$row->created_by 	= $row->created_by ? $row->created_by : $user->get('id');

		if ($row->created && strlen(trim( $row->created )) <= 10) {
			$row->created 	.= ' 00:00:00';
		}

		$config =& JFactory::getConfig();
		$tzoffset = $config->getValue('config.offset');
		$date = new JDate($row->created, $tzoffset);
		$row->created = $date->toMySQL();

		// Append time if not added to publish date
		if (strlen(trim($row->publish_up)) <= 10) {
			$row->publish_up .= ' 00:00:00';
		}

		$date = new JDate($row->publish_up, $tzoffset);
		$row->publish_up = $date->toMySQL();

		// Handle never unpublish date
		if (trim($row->publish_down) == JText::_('Never') || trim( $row->publish_down ) == '')
		{
			$row->publish_down = $nullDate;
		}
		else
		{
			if (strlen(trim( $row->publish_down )) <= 10) {
				$row->publish_down .= ' 00:00:00';
			}
			$date = new JDate($row->publish_down);
			$date->setOffset( -$mainframe->getCfg('offset'));
			$row->publish_down = $date->toMySQL();
		}

		// Get a state and parameter variables from the request
		$row->state	= JRequest::getVar( 'state', 0, '', 'int' );
		$params		= JRequest::getVar( 'params', '', 'post', 'array' );

		// Build parameter INI string
		if (is_array($params))
		{
			$txt = array ();
			foreach ($params as $k => $v) {
				$txt[] = "$k=$v";
			}
			$row->attribs = implode("\n", $txt);
		}

		// Get metadata string
		$metadata = JRequest::getVar( 'meta', array(), 'post', 'array');
		if (is_array($params))
		{
			$txt = array();
			foreach ($metadata as $k => $v) {
				if ($k == 'description') {
					$row->metadesc = $v;
				} elseif ($k == 'keywords') {
					$row->metakey = $v;
				} else {
					$txt[] = "$k=$v";
				}
			}
			$row->metadata = implode("\n", $txt);
		}

		// Prepare the content for saving to the database
		ContentHelper::saveContentPrep( $row );

		// Make sure the data is valid
		if (!$row->check()) {
			JError::raiseError( 500, $db->stderr() );
			return false;
		}

		// Increment the content version number
		$row->version++;

		// Store the content to the database
		if (!$row->store()) {
			JError::raiseError( 500, $db->stderr() );
			return false;
		}

		// Check the article and update item order
		$row->checkin();
		$row->reorder("catid = $row->catid AND state >= 0");

		/*
		 * We need to update frontpage status for the article.
		 *
		 * First we include the frontpage table and instantiate an instance of it.
		 */
		require_once (JPATH_ADMINISTRATOR.DS.'components'.DS.'com_frontpage'.DS.'tables'.DS.'frontpage.php');
		$fp = new TableFrontPage($db);

		// Is the article viewable on the frontpage?
		if (JRequest::getVar( 'frontpage', 0, '', 'int' ))
		{
			// Is the item already viewable on the frontpage?
			if (!$fp->load($row->id))
			{
				// Insert the new entry
				$query = 'INSERT INTO #__content_frontpage' .
						' VALUES ( '. $row->id .', 1 )';
				$db->setQuery($query);
				if (!$db->query())
				{
					JError::raiseError( 500, $db->stderr() );
					return false;
				}
				$fp->ordering = 1;
			}
		}
		else
		{
			// Delete the item from frontpage if it exists
			if (!$fp->delete($row->id)) {
				$msg .= $fp->stderr();
			}
			$fp->ordering = 0;
		}
		$fp->reorder();

		$cache = & JFactory::getCache('com_content');
		$cache->clean();

		switch ($task)
		{
			case 'go2menu' :
				$mainframe->redirect('index.php?option=com_menus&menutype='.$menu);
				break;

			case 'go2menuitem' :
				$mainframe->redirect('index.php?option=com_menus&menutype='.$menu.'&task=edit&id='.$menuid);
				break;

			case 'menulink' :
				ContentHelper::menuLink($redirect, $row->id);
				break;

			case 'resethits' :
				ContentHelper::resetHits($redirect, $row->id);
				break;

			case 'apply' :
				$msg = JText::sprintf('Successfully Saved changes to Item', $row->title);
				$mainframe->redirect('index.php?option=com_content&sectionid='.$redirect.'&task=edit&cid[]='.$row->id, $msg);
				break;

			case 'save' :
			default :
				$msg = JText::sprintf('Successfully Saved Item', $row->title);
				$mainframe->redirect('index.php?option=com_content&sectionid='.$redirect, $msg);
				break;
		}
	}

	/**
	* Changes the state of one or more content pages
	*
	* @param string The name of the category section
	* @param integer A unique category id (passed from an edit form)
	* @param array An array of unique category id numbers
	* @param integer 0 if unpublishing, 1 if publishing
	* @param string The name of the current user
	*/
	function changeContent( $state = 0 )
	{
		global $mainframe;

		// Initialize variables
		$db		= & JFactory::getDBO();
		$user	= & JFactory::getUser();

		$cid	= JRequest::getVar( 'cid', array(0), 'post', 'array' );
		$option	= JRequest::getVar( 'option' );
		$task	= JRequest::getVar( 'task' );
		$rtask	= JRequest::getVar( 'returntask', '', 'post' );
		if ($rtask) {
			$rtask = '&task='.$rtask;
		} else {
			$rtask = '';
		}

		if (count($cid) < 1) {
			$redirect	= JRequest::getVar( 'redirect', '', 'post' );
			$action		= ($state == 1) ? 'publish' : ($state == -1 ? 'archive' : 'unpublish');
			$msg		= JText::_('Select an item to') . ' ' . JText::_($action);
			$mainframe->redirect('index.php?option='.$option.$rtask.'&sectionid='.$redirect, $msg, 'error');
		}

		// Get some variables for the query
		$uid	= $user->get('id');
		$total	= count($cid);
		$cids	= implode(',', $cid);

		$query = 'UPDATE #__content' .
				' SET state = '. $state .
				' WHERE id IN ( '. $cids .' ) AND ( checked_out = 0 OR (checked_out = '. $uid .' ) )';
		$db->setQuery($query);
		if (!$db->query()) {
			JError::raiseError( 500, $db->getErrorMsg() );
			return false;
		}

		if (count($cid) == 1) {
			$row = & JTable::getInstance('content');
			$row->checkin($cid[0]);
		}

		switch ($state)
		{
			case -1 :
				$msg = JText::sprintf('Item(s) successfully Archived', $total);
				break;

			case 1 :
				$msg = JText::sprintf('Item(s) successfully Published', $total);
				break;

			case 0 :
			default :
				if ($task == 'unarchive') {
					$msg = JText::sprintf('Item(s) successfully Unarchived', $total);
				} else {
					$msg = JText::sprintf('Item(s) successfully Unpublished', $total);
				}
				break;
		}

		$cache = & JFactory::getCache('com_content');
		$cache->clean();

		// Get some return/redirect information from the request
		$redirect	= JRequest::getVar( 'redirect', $row->sectionid, 'post' );

		$mainframe->redirect('index.php?option='.$option.$rtask.'&sectionid='.$redirect, $msg);
	}

	/**
	* Changes the frontpage state of one or more articles
	*
	*/
	function toggleFrontPage()
	{
		global $mainframe;

		// Initialize variables
		$db		=& JFactory::getDBO();

		$cid	= JRequest::getVar( 'cid', array(0), 'post', 'array' );
		$option	= JRequest::getVar( 'option' );
		$msg	= null;

		if (count($cid) < 1) {
			$msg = JText::_('Select an item to toggle');
			$mainframe->redirect('index.php?option='.$option, $msg, 'error');
		}

		/*
		 * We need to update frontpage status for the articles.
		 *
		 * First we include the frontpage table and instantiate an instance of
		 * it.
		 */
		require_once (JPATH_ADMINISTRATOR.DS.'components'.DS.'com_frontpage'.DS.'tables'.DS.'frontpage.php');
		$fp = new TableFrontPage($db);

		foreach ($cid as $id)
		{
			// toggles go to first place
			if ($fp->load($id)) {
				if (!$fp->delete($id)) {
					$msg .= $fp->stderr();
				}
				$fp->ordering = 0;
			} else {
				// new entry
				$query = 'INSERT INTO #__content_frontpage' .
						' VALUES ( '. $id .', 0 )';
				$db->setQuery($query);
				if (!$db->query()) {
					JError::raiseError( 500, $db->stderr() );
					return false;
				}
				$fp->ordering = 0;
			}
			$fp->reorder();
		}

		$cache = & JFactory::getCache('com_content');
		$cache->clean();

		$mainframe->redirect('index.php?option='.$option, $msg);
	}

	function removeContent()
	{
		global $mainframe;

		// Initialize variables
		$db			= & JFactory::getDBO();

		$cid		= JRequest::getVar( 'cid', array(0), 'post', 'array' );
		$option		= JRequest::getVar( 'option' );
		$return		= JRequest::getVar( 'returntask', '', 'post' );
		$nullDate	= $db->getNullDate();

		if (count($cid) < 1) {
			$msg =  JText::_('Select an item to delete');
			$mainframe->redirect('index.php?option='.$option, $msg, 'error');

		}

		// Removed content gets put in the trash [state = -2] and ordering is always set to 0
		$state		= '-2';
		$ordering	= '0';

		// Get the list of content id numbers to send to trash.
		$cids = implode(',', $cid);

		// Update articles in the database
		$query = 'UPDATE #__content' .
				' SET state = '.$state .
				', ordering = '.$ordering .
				', checked_out = 0, checked_out_time = "'.$nullDate.
				'" WHERE id IN ( '. $cids. ' )';
		$db->setQuery($query);
		if (!$db->query())
		{
			JError::raiseError( 500, $db->getErrorMsg() );
			return false;
		}

		$cache = & JFactory::getCache('com_content');
		$cache->clean();

		$msg = JText::sprintf('Item(s) sent to the Trash', count($cid));
		$mainframe->redirect('index.php?option='.$option.'&task='.$return, $msg);
	}

	/**
	* Cancels an edit operation
	*/
	function cancelContent()
	{
		global $mainframe;

		// Initialize variables
		$db	= & JFactory::getDBO();

		// Check the article in if checked out
		$row = & JTable::getInstance('content');
		$row->bind(JRequest::get('post'));
		$row->checkin();

		$mainframe->redirect('index.php?option=com_content');
	}

	/**
	* Moves the order of a record
	* @param integer The increment to reorder by
	*/
	function orderContent($direction)
	{
		global $mainframe;

		// Initialize variables
		$db		= & JFactory::getDBO();

		$cid	= JRequest::getVar( 'cid', array(), 'post', 'array' );

		if (isset( $cid[0] ))
		{
			$row = & JTable::getInstance('content');
			$row->load( (int) $cid[0] );
			$row->move($direction, 'catid = ' . (int) $row->catid . ' AND state >= 0' );

			$cache = & JFactory::getCache('com_content');
			$cache->clean();
		}

		$mainframe->redirect('index.php?option=com_content');
	}

	/**
	* Form for moving item(s) to a different section and category
	*/
	function moveSection()
	{
		// Initialize variables
		$db			=& JFactory::getDBO();

		$cid		= JRequest::getVar( 'cid', array(), 'post', 'array' );
		$sectionid	= JRequest::getVar( 'sectionid', 0, '', 'int' );

		if (count($cid) < 1) {
			$msg = JText::_('Select an item to move');
			$mainframe->redirect('index.php?option=com_content', $msg, 'error');
		}

		//seperate contentids
		JArrayHelper::toInteger( $cid );
		$cids = implode(',', $cid);
		// Articles query
		$query = 'SELECT a.title' .
				' FROM #__content AS a' .
				' WHERE ( a.id IN ( '. $cids .' ) )' .
				' ORDER BY a.title';
		$db->setQuery($query);
		$items = $db->loadObjectList();

		$query = 'SELECT CONCAT_WS( ", ", s.id, c.id ) AS `value`, CONCAT_WS( "/", s.title, c.title ) AS `text`' .
				' FROM #__sections AS s' .
				' INNER JOIN #__categories AS c ON c.section = s.id' .
				' WHERE s.scope = "content"' .
				' ORDER BY s.title, c.title';
		$db->setQuery($query);
		$rows[] = JHTML::_('select.option', "0, 0", 'Static Content');
		$rows = array_merge($rows, $db->loadObjectList());
		// build the html select list
		$sectCatList = JHTML::_('select.genericlist',  $rows, 'sectcat', 'class="inputbox" size="8"', 'value', 'text', null);

		ContentView::moveSection($cid, $sectCatList, 'com_content', $sectionid, $items);
	}

	/**
	* Save the changes to move item(s) to a different section and category
	*/
	function moveSectionSave()
	{
		global $mainframe;

		// Initialize variables
		$db			= & JFactory::getDBO();
		$user		= & JFactory::getUser();

		$cid		= JRequest::getVar( 'cid', array(0), 'post', 'array' );
		$sectionid	= JRequest::getVar( 'sectionid', 0, '', 'int' );
		$option		= JRequest::getVar( 'option' );

		$sectcat = JRequest::getVar( 'sectcat', '', 'post' );
		list ($newsect, $newcat) = explode(',', $sectcat);

		if (!$newsect && !$newcat) {
			$mainframe->redirect("index.php?option=com_content&sectionid=$sectionid", JText::_('An error has occurred'));
		}

		// find section name
		$query = 'SELECT a.name' .
				' FROM #__sections AS a' .
				' WHERE a.id = '. $newsect;
		$db->setQuery($query);
		$section = $db->loadResult();

		// find category name
		$query = 'SELECT  a.name' .
				' FROM #__categories AS a' .
				' WHERE a.id = '. $newcat;
		$db->setQuery($query);
		$category = $db->loadResult();

		$total	= count($cid);
		$cids		= implode(',', $cid);
		$uid		= $user->get('id');

		$row = & JTable::getInstance('content');
		// update old orders - put existing items in last place
		foreach ($cid as $id)
		{
			$row->load(intval($id));
			$row->ordering = 0;
			$row->store();
			$row->reorder("catid = $row->catid AND state >= 0");
		}

		$query = 'UPDATE #__content SET sectionid = '.$newsect.', catid = '.$newcat.
				' WHERE id IN ( '.$cids.' )' .
				' AND ( checked_out = 0 OR ( checked_out = '.$uid.' ) )';
		$db->setQuery($query);
		if (!$db->query())
		{
			JError::raiseError( 500, $db->getErrorMsg() );
			return false;
		}

		// update new orders - put items in last place
		foreach ($cid as $id)
		{
			$row->load(intval($id));
			$row->ordering = 0;
			$row->store();
			$row->reorder("catid = $row->catid AND state >= 0");
		}

		if ($section && $category) {
			$msg = JText::sprintf('Item(s) successfully moved to Section', $total, $section, $category);
		} else {
			$msg = JText::_('Item(s) successfully moved to Static Content');
		}

		$mainframe->redirect('index.php?option='.$option.'&sectionid='.$sectionid, $msg);
	}

	/**
	* Form for copying item(s)
	**/
	function copyItem()
	{
		// Initialize variables
		$db			= & JFactory::getDBO();

		$cid		= JRequest::getVar( 'cid', array(0), 'post', 'array' );
		$sectionid	= JRequest::getVar( 'sectionid', 0, '', 'int' );
		$option		= JRequest::getVar( 'option' );

		if (!is_array($cid) || count($cid) < 1) {
			$msg = JText::_('Select an item to move');
			$mainframe->redirect('index.php?option='.$option, $msg, 'error');
		}

		//seperate contentids
		$cids = implode(',', $cid);
		## Articles query
		$query = 'SELECT a.title' .
				' FROM #__content AS a' .
				' WHERE ( a.id IN ( '. $cids .' ) )' .
				' ORDER BY a.title';
		$db->setQuery($query);
		$items = $db->loadObjectList();

		## Section & Category query
		$query = 'SELECT CONCAT_WS(",",s.id,c.id) AS `value`, CONCAT_WS(" // ", s.title, c.title) AS `text`' .
				' FROM #__sections AS s' .
				' INNER JOIN #__categories AS c ON c.section = s.id' .
				' WHERE s.scope = "content"' .
				' ORDER BY s.title, c.title';
		$db->setQuery($query);
		$rows = $db->loadObjectList();
		// build the html select list
		$sectCatList = JHTML::_('select.genericlist',  $rows, 'sectcat', 'class="inputbox" size="10"', 'value', 'text', NULL);

		ContentView::copySection($option, $cid, $sectCatList, $sectionid, $items);
	}

	/**
	* saves Copies of items
	**/
	function copyItemSave()
	{
		global $mainframe;

		// Initialize variables
		$db			= & JFactory::getDBO();

		$cid		= JRequest::getVar( 'cid', array(0), 'post', 'array' );
		$sectionid	= JRequest::getVar( 'sectionid', 0, '', 'int' );
		$option		= JRequest::getVar( 'option' );

		$item	= null;
		$sectcat = JRequest::getVar( 'sectcat', '', 'post' );
		//seperate sections and categories from selection
		$sectcat = explode(',', $sectcat);
		list ($newsect, $newcat) = $sectcat;

		if (!$newsect && !$newcat) {
			$mainframe->redirect('index.php?option=com_content&sectionid='.$sectionid, JText::_('An error has occurred'));
		}

		// find section name
		$query = 'SELECT a.title' .
				' FROM #__sections AS a' .
				' WHERE a.id = '. $newsect;
		$db->setQuery($query);
		$section = $db->loadResult();

		// find category name
		$query = 'SELECT a.title' .
				' FROM #__categories AS a' .
				' WHERE a.id = '. $newcat;
		$db->setQuery($query);
		$category = $db->loadResult();

		$total = count($cid);
		for ($i = 0; $i < $total; $i ++)
		{
			$row = & JTable::getInstance('content');

			// main query
			$query = 'SELECT a.*' .
					' FROM #__content AS a' .
					' WHERE a.id = '.$cid[$i];
			$db->setQuery($query, 0, 1);
			$item = $db->loadObject();

			// values loaded into array set for store
			$row->id						= NULL;
			$row->sectionid					= $newsect;
			$row->catid						= $newcat;
			$row->hits						= '0';
			$row->ordering					= '0';
			$row->title						= $item->title;
			$row->title_alias				= $item->title_alias;
			$row->introtext					= $item->introtext;
			$row->fulltext					= $item->fulltext;
			$row->state						= $item->state;
			$row->mask						= $item->mask;
			$row->created					= $item->created;
			$row->created_by				= $item->created_by;
			$row->created_by_alias			= $item->created_by_alias;
			$row->modified					= $item->modified;
			$row->modified_by				= $item->modified_by;
			$row->checked_out				= $item->checked_out;
			$row->checked_out_time			= $item->checked_out_time;
			$row->publish_up				= $item->publish_up;
			$row->publish_down				= $item->publish_down;
			$row->images					= $item->images;
			$row->attribs					= $item->attribs;
			$row->version					= $item->parentid;
			$row->parentid					= $item->parentid;
			$row->metakey					= $item->metakey;
			$row->metadesc					= $item->metadesc;
			$row->access					= $item->access;

			if (!$row->check()) {
				JError::raiseError( 500, $row->getError() );
				return false;
			}

			if (!$row->store()) {
				JError::raiseError( 500, $row->getError() );
				return false;
			}
			$row->reorder("catid='".$row->catid."' AND state >= 0");
		}

		$msg = JText::sprintf('Item(s) successfully copied to Section', $total, $section, $category);
		$mainframe->redirect('index.php?option='.$option.'&sectionid='.$sectionid, $msg);
	}

	/**
	* @param integer The id of the article
	* @param integer The new access level
	* @param string The URL option
	*/
	function accessMenu($access)
	{
		global $mainframe;

		// Initialize variables
		$db		= & JFactory::getDBO();

		$cid	= JRequest::getVar( 'cid', array(0), 'post', 'array' );
		$option	= JRequest::getVar( 'option' );
		$uid	= $cid[0];

		// Create and load the article table object
		$row = & JTable::getInstance('content');
		$row->load($uid);
		$row->access = $access;

		// Ensure the article object is valid
		if (!$row->check()) {
			JError::raiseError( 500, $row->getError() );
			return false;
		}

		// Store the changes
		if (!$row->store()) {
			JError::raiseError( 500, $row->getError() );
			return false;
		}

		$cache = & JFactory::getCache('com_content');
		$cache->clean();

		$mainframe->redirect('index.php?option='.$option);
	}

	function saveOrder()
	{
		global $mainframe;

		// Initialize variables
		$db			= & JFactory::getDBO();

		$cid		= JRequest::getVar( 'cid', array(0), 'post', 'array' );
		$order		= JRequest::getVar( 'order', array (0), 'post', 'array' );
		$redirect	= JRequest::getVar( 'redirect', 0, 'post' );
		$rettask	= JRequest::getVar( 'returntask', '', 'post' );
		$total		= count($cid);
		$conditions	= array ();

		// Instantiate an article table object
		$row = & JTable::getInstance('content');

		// Update the ordering for items in the cid array
		for ($i = 0; $i < $total; $i ++)
		{
			$row->load( (int) $cid[$i] );
			if ($row->ordering != $order[$i]) {
				$row->ordering = $order[$i];
				if (!$row->store()) {
					JError::raiseError( 500, $db->getErrorMsg() );
					return false;
				}
				// remember to updateOrder this group
				$condition = "catid = $row->catid AND state >= 0";
				$found = false;
				foreach ($conditions as $cond)
					if ($cond[1] == $condition) {
						$found = true;
						break;
					}
				if (!$found)
					$conditions[] = array ($row->id, $condition);
			}
		}

		// execute updateOrder for each group
		foreach ($conditions as $cond)
		{
			$row->load($cond[0]);
			$row->reorder($cond[1]);
		}

		$cache = & JFactory::getCache('com_content');
		$cache->clean();

		$msg = JText::_('New ordering saved');
		switch ($rettask)
		{
			case 'showarchive' :
				$mainframe->redirect('index.php?option=com_content&task=showarchive&sectionid='.$redirect, $msg);
				break;

			default :
				$mainframe->redirect('index.php?option=com_content&sectionid='.$redirect, $msg);
				break;
		}
	}

	function previewContent()
	{
		// Initialize variables
		$document		=& JFactory::getDocument();
		$db 			=& JFactory::getDBO();
		$id				= JRequest::getVar( 'id', 0, '', 'int' );
		$option			= JRequest::getVar( 'option' );

		// Get the current default template
		$query = 'SELECT template' .
				' FROM #__templates_menu' .
				' WHERE client_id = 0' .
				' AND menuid = 0';
		$db->setQuery($query);
		$template = $db->loadResult();

		// Set page title
		$document->setTitle(JText::_('Article Preview'));
		$document->addStyleSheet('../templates/'.$template.'/css/editor.css');

		// Render article preview
		ContentView::previewContent();
	}

	function insertPagebreak()
	{
		global $mainframe;

		$mainframe->setPageTitle(JText::_('PGB ARTICLE PAGEBRK'));
		ContentView::insertPagebreak();
	}

	function _validateDate($date)
	{
		$db =& JFactory::getDBO();

		if (JHTML::_('date', $date, '%Y') == 1969 || $date == $db->getNullDate()) {
			$newDate = JText::_('Never');
		} else {
			$newDate = JHTML::_('date', $date, '%Y-%m-%d %H:%M:%S');
		}

		return $newDate;
	}
}

/**
 * HTML Article Element View class for the Content component
 *
 * @package		Joomla
 * @subpackage	Content
 * @since 1.5
 */
class ContentViewElement extends JView
{
	function display()
	{
		global $mainframe;

		// Initialize variables
		$url 		= $mainframe->isAdmin() ? $mainframe->getSiteURL() : JURI::base();
		$db			= &JFactory::getDBO();
		$nullDate	= $db->getNullDate();

		$document	= & JFactory::getDocument();
		$document->setTitle('Article Selection');
		$document->addScript($url.'includes/js/joomla/modal.js');
		$document->addStyleSheet($url.'includes/js/joomla/modal.css');

		$template = $mainframe->getTemplate();
		$document->addStyleSheet("templates/$template/css/general.css");

		$limitstart = JRequest::getVar('limitstart', '0', '', 'int');

		$lists = $this->_getLists();

		//Ordering allowed ?
		$ordering = ($lists['order'] == 'section_name' && $lists['order_Dir'] == 'ASC');

		$rows = &$this->get('List');
		$page = &$this->get('Pagination');
		JHTML::_('behavior.tooltip');
		?>
		<form action="index.php?option=com_content&amp;task=element&amp;tmpl=component" method="post" name="adminForm">

			<table>
				<tr>
					<td width="100%">
						<?php echo JText::_( 'Filter' ); ?>:
						<input type="text" name="search" id="search" value="<?php echo $lists['search'];?>" class="text_area" onchange="document.adminForm.submit();" />
						<button onclick="this.form.submit();"><?php echo JText::_( 'Go' ); ?></button>
						<button onclick="getElementById('search').value='';this.form.submit();"><?php echo JText::_( 'Reset' ); ?></button>
					</td>
					<td nowrap="nowrap">
						<?php
						echo $lists['sectionid'];
						echo $lists['catid'];
						?>
					</td>
				</tr>
			</table>

			<table class="adminlist" cellspacing="1">
			<thead>
				<tr>
					<th width="5">
						<?php echo JText::_( 'Num' ); ?>
					</th>
					<th class="title">
						<?php JHTML::_('grid.sort',   'Title', 'c.title', @$lists['order_Dir'], @$lists['order'] ); ?>
					</th>
					<th width="7%">
						<?php JHTML::_('grid.sort',   'Access', 'groupname', @$lists['order_Dir'], @$lists['order'] ); ?>
					</th>
					<th width="2%" class="title">
						<?php JHTML::_('grid.sort',   'ID', 'c.id', @$lists['order_Dir'], @$lists['order'] ); ?>
					</th>
					<th class="title" width="15%" nowrap="nowrap">
						<?php JHTML::_('grid.sort',   'Section', 'section_name', @$lists['order_Dir'], @$lists['order'] ); ?>
					</th>
					<th  class="title" width="15%" nowrap="nowrap">
						<?php JHTML::_('grid.sort',   'Category', 'cc.title', @$lists['order_Dir'], @$lists['order'] ); ?>
					</th>
					<th align="center" width="10">
						<?php JHTML::_('grid.sort',   'Date', 'c.created', @$lists['order_Dir'], @$lists['order'] ); ?>
					</th>
				</tr>
			</thead>
			<tfoot>
				<td colspan="15">
					<?php echo $page->getListFooter(); ?>
				</td>
			</tfoot>
			<tbody>
			<?php
			$k = 0;
			for ($i=0, $n=count( $rows ); $i < $n; $i++)
			{
				$row = &$rows[$i];

				$link 	= '';
				$date	= JHTML::_('date',  $row->created, DATE_FORMAT_LC4 );
				$access	= JHTML::_('grid.access',   $row, $i, $row->state );
				?>
				<tr class="<?php echo "row$k"; ?>">
					<td>
						<?php echo $page->getRowOffset( $i ); ?>
					</td>
					<td>
						<a onclick="window.parent.jSelectArticle('<?php echo $row->id; ?>', '<?php echo addSlashes($row->title); ?>');">
							<?php echo htmlspecialchars($row->title, ENT_QUOTES); ?>
						</a>
					</td>
					<td align="center">
						<?php echo $row->groupname;?>
					</td>
					<td>
						<?php echo $row->id; ?>
					</td>
						<td>
							<?php echo $row->section_name; ?>
						</td>
					<td>
						<?php echo $row->cctitle; ?>
					</td>
					<td nowrap="nowrap">
						<?php echo $date; ?>
					</td>
				</tr>
				<?php
				$k = 1 - $k;
			}
			?>
			</tbody>
			</table>

		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="hidemainmenu" value="0" />
		<input type="hidden" name="filter_order" value="<?php echo $lists['order']; ?>" />
		<input type="hidden" name="filter_order_Dir" value="" />
		</form>
		<?php
	}

	function _getLists()
	{
		global $mainframe;

		// Initialize variables
		$db		= &JFactory::getDBO();
		$filter	= null;

		// Get some variables from the request
		$sectionid			= JRequest::getVar( 'sectionid', -1, '', 'int' );
		$redirect			= $sectionid;
		$option				= JRequest::getVar( 'option' );
		$filter_order		= $mainframe->getUserStateFromRequest("articleelement.filter_order", 'filter_order', '');
		$filter_order_Dir	= $mainframe->getUserStateFromRequest("articleelement.filter_order_Dir", 'filter_order_Dir', '');
		$filter_state		= $mainframe->getUserStateFromRequest("articleelement.filter_state", 'filter_state', '*');
		$catid				= $mainframe->getUserStateFromRequest("articleelement.catid", 'catid', 0);
		$filter_authorid	= $mainframe->getUserStateFromRequest("articleelement.filter_authorid", 'filter_authorid', 0);
		$filter_sectionid	= $mainframe->getUserStateFromRequest("articleelement.filter_sectionid", 'filter_sectionid', -1);
		$limit				= $mainframe->getUserStateFromRequest('limit', 'limit', $mainframe->getCfg('list_limit'));
		$limitstart			= $mainframe->getUserStateFromRequest("articleelement.limitstart", 'limitstart', 0);
		$search				= $mainframe->getUserStateFromRequest("articleelement.search", 'search', '');
		$search				= $db->getEscaped(trim(JString::strtolower($search)));

		// get list of categories for dropdown filter
		$query = 'SELECT cc.id AS value, cc.title AS text, section FROM #__categories AS cc' .
				' INNER JOIN #__sections AS s ON s.id = cc.section '.$filter .
				' ORDER BY s.ordering, cc.ordering';
		$lists['catid'] = ContentHelper::filterCategory($query, $catid);

		// get list of sections for dropdown filter
		$javascript = 'onchange="document.adminForm.submit();"';
		$lists['sectionid'] = JHTML::_('list.section', 'filter_sectionid', $filter_sectionid, $javascript);

		// table ordering
		$lists['order_Dir']	= $filter_order_Dir;
		$lists['order']		= $filter_order;

		// search filter
		$lists['search'] = $search;

		return $lists;
	}
}
/**
 * Utility class for creating HTML Grids
 *
 * @static
 * @package		Joomla
 * @subpackage	Content
 * @since		1.5
 */
class JHTMLContent
{
	/**
	 * Displays the publishing state legend for articles
	 */
	function Legend( )
	{
		?>
		<table cellspacing="0" cellpadding="4" border="0" align="center">
		<tr align="center">
			<td>
			<img src="images/publish_y.png" width="16" height="16" border="0" alt="<?php echo JText::_( 'Pending' ); ?>" />
			</td>
			<td>
			<?php echo JText::_( 'Published, but is' ); ?> <u><?php echo JText::_( 'Pending' ); ?></u> |
			</td>
			<td>
			<img src="images/publish_g.png" width="16" height="16" border="0" alt="<?php echo JText::_( 'Visible' ); ?>" />
			</td>
			<td>
			<?php echo JText::_( 'Published and is' ); ?> <u><?php echo JText::_( 'Current' ); ?></u> |
			</td>
			<td>
			<img src="images/publish_r.png" width="16" height="16" border="0" alt="<?php echo JText::_( 'Finished' ); ?>" />
			</td>
			<td>
			<?php echo JText::_( 'Published, but has' ); ?> <u><?php echo JText::_( 'Expired' ); ?></u> |
			</td>
			<td>
			<img src="images/publish_x.png" width="16" height="16" border="0" alt="<?php echo JText::_( 'Finished' ); ?>" />
			</td>
			<td>
			<?php echo JText::_( 'Not Published' ); ?>
			</td>
		</tr>
		<tr>
			<td colspan="8" align="center">
			<?php echo JText::_( 'Click on icon to toggle state.' ); ?>
			</td>
		</tr>
		</table>
		<?php
	}
}
/**
 * Content Component Helper
 *
 * @static
 * @package		Joomla
 * @subpackage	Content
 * @since 1.5
 */
class ContentHelper
{
	function saveContentPrep( &$row )
	{

		// Get submitted text from the request variables
		$text = JRequest::getVar( 'text', '', 'post', 'string', JREQUEST_ALLOWRAW );

		// Clean text for xhtml transitional compliance
		jimport('joomla.filter.output');
		$text		= str_replace( '<br>', '<br />', $text );
		$row->title	= JOutputFilter::ampReplace($row->title);

		// Search for the {readmore} tag and split the text up accordingly.
		$tagPos	= JString::strpos( $text, '<hr id="system-readmore" />' );

		if ( $tagPos === false )
		{
			$row->introtext	= $text;
		} else
		{
			$row->introtext	= JString::substr($text, 0, $tagPos);
			$row->fulltext	= JString::substr($text, $tagPos + 27 );
		}

		return true;
	}

	/**
	* Function to reset Hit count of an article
	*
	*/
	function resetHits($redirect, $id)
	{
		global $mainframe;

		// Initialize variables
		$db	= & JFactory::getDBO();

		// Instantiate and load an article table
		$row = & JTable::getInstance('content');
		$row->Load($id);
		$row->hits = 0;
		$row->store();
		$row->checkin();

		$msg = JText::_('Successfully Reset Hit count');
		$mainframe->redirect('index.php?option=com_content&sectionid='.$redirect.'&task=edit&id='.$id, $msg);
	}

	function filterCategory($query, $active = NULL)
	{
		// Initialize variables
		$db	= & JFactory::getDBO();

		$categories[] = JHTML::_('select.option', '0', '- '.JText::_('Select Category').' -');
		$db->setQuery($query);
		$categories = array_merge($categories, $db->loadObjectList());

		$category = JHTML::_('select.genericlist',  $categories, 'catid', 'class="inputbox" size="1" onchange="document.adminForm.submit( );"', 'value', 'text', $active);

		return $category;
	}

}
   ?>
