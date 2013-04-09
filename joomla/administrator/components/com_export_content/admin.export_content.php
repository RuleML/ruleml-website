<?php
/***
* @version : beta 2.0.0
* @package Export Content
* @copyright Copyright (C) 2008 www.bestdownloadsites.com All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL,
* Export Content is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*/
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
//defined('_JEXEC') or die();
 global $database,$option, $mosConfig_host,$mosConfig_password, $mosConfig_user, $mosConfig_live_site, $mosConfig_db, $my, $mainframe, $mosConfig_list_limit, $mosConfig_dbprefix, $mosConfig_lang, $adminName, $mosConfig_sitename, $export_version;
 $option='com_export_content';
 
 error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
 
// ensure user has access to this function
if (!($acl -> acl_check('administration', 'edit', 'users', $my -> usertype, 'components', 'all') | $acl -> acl_check('administration', 'edit', 'users', $my -> usertype, 'components', 'com_export_content'))){
    mosRedirect('index2.php', _DML_NOT_AUTH);
}
  //Are we using joomla 1.5 series

 function joomla_version_num(){
  global $_VERSION;
   if (file_exists(JPATH_SITE . '/libraries/joomla/version.php')) {
  $result='1';
    }else{
	$result='0';	
	}
return $result;
}
//base path
DEFINE( '_EXPORT_BASE_PATH', '../administrator/components/com_export_content/' );

// require_once( YOURBASEPATH . '/../../configuration.php' );
require_once( $mainframe->getPath( 'admin_html' ) );

require_once( $mainframe->getPath( 'class' ) );
//$option='com_export_content';


if (file_exists(_EXPORT_BASE_PATH . 'language/'.$mosConfig_lang.'.php')) {
  require_once(_EXPORT_BASE_PATH . 'language/'.$mosConfig_lang.'.php');
} else {
  require_once(_EXPORT_BASE_PATH . 'language/english.php');
}
  require_once(_EXPORT_BASE_PATH . 'convert_img.php');
  //require_once('/administrator/languages/en-GB/en-GB.com_content.ini');

$sectionid 	= mosGetParam( $_REQUEST, 'sectionid', 0 );
$id 		= mosGetParam( $_REQUEST, 'id', '' );
$section 	= mosGetParam( $_REQUEST, 'section', 'content' );
$cid 		= mosGetParam( $_REQUEST, 'cid', array(0) );
$scope 		= mosGetParam( $_REQUEST, 'scope', '' );

$id = mosGetParam( $_REQUEST, 'cid', array(0) );
if (!is_array( $id )) {
	$id = array(0);
}

function get_param_times(){
$now = date( 'Y-m-d H:i', time() );
DEFINE( '_CURRENT_SERVER_TIME', $now );
DEFINE( '_CURRENT_SERVER_TIME_FORMAT', '%Y-%m-%d %H:%M:%S' );
}

$controller = new ContentController();
$task = JRequest::getCmd('task');

	switch ($task) {

	    case 'new_sect':
		edit_sect( 0, $scope, $option );
		break;

	    case 'edit_sect':
		edit_sect( intval( $cid[0] ), '', $option );
		break;

	    case 'editA_sect':
    	edit_sect( intval( $cid[0] ), '', $option );
		break;

        case 'go2menu':
      	case 'go2menuitem':
	    case 'menulink':
	    case 'save_sect':
	    case 'apply':
		saveSection( $option, $scope, $task );
		break;

		//category edit
 	    case 'new_cat':
		edit_cat( 0, $section );
		break;

	    case 'edit_cat':
		edit_cat( intval( $cid[0] ) );
		break;

	    case 'editA_cat':
	    edit_cat( intval( $cid[0] ), '', $option );
        break;

		case 'go2menu':
	    case 'go2menuitem':
	    case 'menulink':
	    case 'save_cat':
	    case 'apply':
		saveCategory( $task );
		break;

		case 'cancel_cat':
		cancel_cat();
			break;

		//content items edit
        case 'new_item':
		editContent_item( 0, $sectionid, $option );
		break;

    	case 'edit_item':
		editContent_item( $id, $sectionid, $option );
		break;

	    case 'editA_item':
		editContent_item( intval( $cid[0] ), '', $option );
		break;
     //static items edit
      	case 'new_static':
		edit_static( 0, $option );
		break;

	    case 'edit_static':
		edit_static( $id, $option );
		break;

	    case 'editA_static':
		edit_static( intval( $cid[0] ), $option );
		break;

   // for static
        case 'go2menu':
    	case 'go2menuitem':
    	case 'resethits':
    	case 'menulink':
        case 'save_static':
	    case 'apply_static':
		save_static( $option, $task );
		break;

	    case "save_sections" :
		save_sections($option);
		break;

        case "save_categories" :
		save_categories($task);
		break;
		
	    case "save_items" :
		save_items( $sectionid, $task );
		break;

        case "remove_sections":
        remove_sections( $cid, $scope, $option );
		break;

		case "remove_categories":
		remove_categories( $cid, $option );
		break;

		case "remove_items":
		remove_items( $cid, $option );
		break;

		case 'trash_static':
		trash_static( $cid, $option );
		break;

		case 'copyselect_sect':
		copySectionSelect( $option, $cid, $section );
		break;

	    case 'copysave_sect':
		copySectionSave( $cid,$sect );
		break;

	    case 'copyselect':
		copyCategorySelect( $option, $cid, $section );
		break;

	    case 'copysave':
		copyCategorySave( $cid, $section );
		break;

        case 'copyItemSelect':
		copyItemSelect( $cid, $sectionid, $option );
		break;

     	case 'copysave_items':
	    copyItemSave( $cid, $sectionid, $option );
		break;

	    case 'copysave_static':
	    copysave_static( $id, $sectionid, $option );
		break;

        case 'cancel_sect':
	    cancelSection( $option, $scope );
		break;

	    case 'cancel':
		cancelCategory();
		break;

	    case 'cancelStatic':
	    cancelStatic();
    	break;

		case 'cancel_item':
		cancel_item();
		break;

        case 'cancel_copysave':
		cancelContent();
		break;

        case "import" :
        require_once( _EXPORT_BASE_PATH . 'menu.php' );
	    import($option, $task);
		break;

        case "imported" :
        require_once( _EXPORT_BASE_PATH . 'menu.php' );
	    import($option, $task);
		break;

        case "export":
        require_once( _EXPORT_BASE_PATH . 'menu.php' );
		export($option);
		break;

        case "sections" :
        // echo "<td>";
        require_once( _EXPORT_BASE_PATH . 'menu.php' );
        $scope='content';
        sections( $scope, $option );
        
       
   	    break;

        case "categories":
        require_once( _EXPORT_BASE_PATH . 'menu.php' );
	    categories( $section, $option );
        break;

        case "content_items":
        require_once( _EXPORT_BASE_PATH . 'menu.php' );
		content_items( $sectionid, $option );
		break;

	    case "static_content":
	    require_once( _EXPORT_BASE_PATH . 'menu.php' );
		viewStatic($option );
		break;

/*************
for sections
*************/
  	    case 'publish':
		publishSections( $scope, $cid, 1, $option );
		break;

	    case 'unpublish':
		publishSections( $scope, $cid, 0, $option );
		break;
/*************
for categories
**************/
        case 'publish_cat':
		publishCategories( $section, $id, $cid, 1, $option );
		break;

        case 'unpublish_cat':
        publishCategories( $section, $id, $cid, 0, $option );
		break;
/*************
for items
***************/
	    case 'publish_items':
		changeContent( $cid, 1, $option );
		break;

        case 'unpublish_items':
		changeContent( $cid, 0, $option );
		break;
/******************
for static content
*******************/
	    case 'publish_static':
		changeStatic( $cid, 1, $option );
		break;

        case 'unpublish_static':
		changeStatic( $cid, 0, $option );
		break;

/*************************************
For section access levels ###TODO###
***************************************/
	   case 'accesspublic_sect':
	   AccessProcessing_sect( $cid[0], 0, $section );
       break;

   	   case 'accessregistered_sect':
	   AccessProcessing_sect( $cid[0], 1, $section );
       break;

	   case 'accessspecial_sect':
	   AccessProcessing_sect( $cid[0], 2, $section );
       break;
/*************************************
For category access levels ###TODO###
***************************************/
        case 'accesspublic':
        accessMenu_cat( $cid[0], 0, $section );
        break;

	    case 'accessregistered':
		accessMenu_cat( $cid[0], 1, $section );
		break;

        case 'accessspecial':
		accessMenu_cat( $cid[0], 2, $section );
		break;

        case "load_dump" :
        load_dump();
		break;

		//Build xml file
        case "dumping" :
        dumping($sectionid,$cid,$id);
		break;

    	//remove content for security
        case "remove" :
        remove_zip();
        remove_xml();
       	break;
       	
	    //remove content for security
        case "remove_static" :
        remove_sql_install();
        remove_zip_static();
        remove_xml_static();
        
       break;
       
		//build a component for download
	    case "compile" :
        compile();
		break;
		
		 case "compile_new_version" :
        compile_15();
		break;
		
			 case "compile_static_15" :
        compile_static_15();
		break;
		
		//download the zipped data
	    case "download_data" :
	   echo '<div class="download_page_txt">';
	   require_once( _EXPORT_BASE_PATH . 'menu.php' );
        download_data($option);
        echo "</div>";
        echo "</div>";
		break;

	    case "help" :
        help($option);
        break;


        case "sections_to_export" :
        require_once( _EXPORT_BASE_PATH . 'menu.php' );
		showSections( $scope, $option );
		break;

        case "multisectionSave" :
        require_once( _EXPORT_BASE_PATH . 'menu.php' );
		multiSectionSave( $option, $cid);
		break;
		
				case 'showexportarchive':
		require_once( _EXPORT_BASE_PATH . 'menu.php' );
		viewExportArchive( $sectionid, $option );
		break;
		
		case 'archive':
		changeContent( $cid, -1, $option );
		break;

	    case 'unarchive':
		changeContent( $cid, 0, $option );
		break;
		
		case 'un_archive':
		un_archive( $cid, 0, $option );
		break;
		
		case 'viewExport_static':
		require_once( _EXPORT_BASE_PATH . 'menu.php' );
		viewExport_static($option,$cid );
		break;
		
		//Build xml file for static items
		case 'compile_static':
		static_compile($option,$cid );
		break;
		
        default:
       JToolBarHelper::title( JText::_( 'Export Content Component' ), 'frontpage.png' );
         about($option);
         
		break;
}
//close page borders
?>
<div class="clr"></div>
			
<?php

 /*************************************
Remove static zip
**************************************/                 
 function remove_zip_static(){
  remove_xml_static();
  //remove_xml();
     //All compiled content has been removed;
   $msg= _CONTENT_REMOVED;
mosRedirect( 'index2.php?option=com_export_content&task=viewExport_static',$msg );
 }
 /*************************************
Remove compliled static
**************************************/
function remove_xml_static(){
  global $mosConfig_live_site;
  //remove zipped data file
$file = "../administrator/components/com_export_content/zip/import_content_data.zip";
if (!unlink($file))
  {
  echo ("Error deleting $file");
  }
else
  {
  echo ("Deleted $file");
}
//remove XML file;
$xmlfile = "../administrator/components/com_export_content/zip/import_content_data.xml";
if (!unlink($xmlfile))
  {
  echo ("Error deleting $xmlfile");
  }
else
  {
  echo ("Deleted $xmlfile");
}

  //All compiled content has been removed;
   $msg= _CONTENT_REMOVED;
  
mosRedirect( 'index2.php?option=com_export_content&task=viewExport_static',$msg );
}
/****************************************************
* Shows a list of archived content items
******************************************************/
function viewExportArchive( $sectionid, $option ) {
	global $database, $mainframe, $mosConfig_list_limit;
 $catid= mosGetParam( $_POST, 'catid' );
 $sectionids= mosGetParam( $_POST, 'sectionids' );
	$catid 				= intval( $mainframe->getUserStateFromRequest( "catidarc{$option}{$sectionid}", 'catid', 0 ) );
	$limit 				= intval( $mainframe->getUserStateFromRequest( "viewlistlimit", 'limit', $mosConfig_list_limit ) );
	$limitstart 		= intval( $mainframe->getUserStateFromRequest( "viewarc{$option}{$sectionid}limitstart", 'limitstart', 0 ) );
	$filter_authorid 	= intval( $mainframe->getUserStateFromRequest( "filter_authorid{$option}{$sectionid}", 'filter_authorid', 0 ) );
	$filter_sectionid 	= intval( $mainframe->getUserStateFromRequest( "filter_sectionid{$option}{$sectionid}", 'filter_sectionid', 0 ) );
	$search 			= $mainframe->getUserStateFromRequest( "searcharc{$option}{$sectionid}", 'search', '' );
	$search 			= $database->getEscaped( trim( strtolower( $search ) ) );
	//$redirect 			= $sectionid;
$redirect 			='index2.php?option=com_export_content&task=showexportarchive';
	if ( $sectionid == 0 ) {
		$where = array(
		"c.state 	= -1",
		"c.catid	= cc.id",
		"cc.section = s.id",
		"s.scope  	= 'content'"
		);
		$filter = "\n , #__export_sections AS s WHERE s.id = c.section";
		$all = 1;
	} else {
		$where = array(
		"c.state 	= -1",
		"c.catid	= cc.id",
		"cc.section	= s.id",
		"s.scope	= 'content'",
		"c.sectionid= $sectionid"
		);
		$filter = "\n WHERE section = '$sectionid'";
		$all = NULL;
	}

	// used by filter
	if ( $filter_sectionid > 0 ) {
		$where[] = "c.sectionid = $filter_sectionid";
	}
	if ( $filter_authorid > 0 ) {
		$where[] = "c.created_by = $filter_authorid";
	}
//	$rtask 		= mosGetParam( $_POST, 'returntask', '' );
	
	if ($catid > 0) {
	
		$where[] = "c.catid = $catid";
	}
	if ($search) {
		$where[] = "LOWER( c.title ) LIKE '%$search%'";
	}

	// get the total number of records
	$query = "SELECT COUNT(*)"
	. "\n FROM #__export_content AS c"
	. "\n LEFT JOIN #__export_categories AS cc ON cc.id = c.catid"
	. "\n LEFT JOIN #__export_sections AS s ON s.id = c.sectionid"
	. ( count( $where ) ? "\n WHERE " . implode( ' AND ', $where ) : '' )
	;
	$database->setQuery( $query );
	$total = $database->loadResult();

	require_once( $GLOBALS['mosConfig_absolute_path'] . '/administrator/includes/pageNavigation.php' );
	$pageNav = new mosPageNav( $total, $limitstart, $limit  );

	$query = "SELECT c.*, g.name AS groupname, cc.name, v.name AS author, s.name as section_name"
	. "\n FROM #__export_content AS c"
	. "\n LEFT JOIN #__export_categories AS cc ON cc.id = c.catid"
	. "\n LEFT JOIN #__export_sections AS s ON s.id = c.sectionid"
	. "\n LEFT JOIN #__groups AS g ON g.id = c.access"
	. "\n LEFT JOIN #__users AS v ON v.id = c.created_by"
	. ( count( $where ) ? "\n WHERE " . implode( ' AND ', $where ) : '' )
	. "\n ORDER BY c.catid, c.ordering"
	;
	$database->setQuery( $query, $pageNav->limitstart, $pageNav->limit );
	$rows = $database->loadObjectList();
	if ($database->getErrorNum()) {
		echo $database->stderr();
		return;
	}
	
$sectionids = array();
$sectionids[] = mosHTML::makeOption( '0', '- '.JText::_('Select Section').' -' );

$database->setQuery( "SELECT id AS value, title AS text FROM #__export_sections" );
$sectionids = array_merge( $sectionids, $database->loadObjectList() );

$database->setQuery( "SELECT id AS value title AS text FROM #__export_sections" );
$select = $database->loadObjectList();

// Creates the HTML sections list.
$lists['sectionids'] = mosHTML::selectList( $sectionids, 'sectionids','size="1" class="inputbox" onchange="document.adminForm.submit( );"', 'value', 'text', $select );
	
	// get list of categories for dropdown filter
$catid = array();
$catid[] = mosHTML::makeOption( '0', '- '.JText::_('Select Category').' -' );
$database->setQuery( "SELECT id AS value, title as text FROM #__export_categories WHERE section='$filter_sectionid'" );
$catid = array_merge( $catid, $database->loadObjectList() );
//$cats='2';

$database->setQuery( "SELECT id AS value, title as text FROM #__export_categories WHERE section ='$filter'" );
$selected = $database->loadObjectList();

// Creates the HTML categories list.
$lists['catid'] = mosHTML::selectList( $catid, 'catid','size="1" class="inputbox" onchange="document.adminForm.submit( );"', 'value', 'text', $selected );

$query = "SELECT FROM #__export_content WHERE id =$sectionid";
$database->setQuery( $query );
	$section = $database->loadObjectList();
	// get list of Authors for dropdown filter
	$query = "SELECT created_by, created_by_alias, name"
	. "\n FROM #__export_content"
	//. "\n INNER JOIN #__export_sections AS s ON s.id = c.sectionid"
	//. "\n LEFT JOIN #__users AS u ON u.id = c.created_by"
	. "\n WHERE state = -1"
	. "\n GROUP BY created_by_alias" 
	//. "\n GROUP BY u.name"
	. "\n ORDER BY created_by_alias" 
	;
	$authors[] = mosHTML::makeOption( '0', '- '.JText::_('Select Author').' -', 'created_by_alias', 'created_by_alias' );
//	$authors[] = mosHTML::makeOption( '0', _SEL_AUTHOR, 'created_by', 'name' );
	$database->setQuery( $query );
//	$authors = array_merge( $authors, $database->loadObjectList() );
	//$lists['authorid']	= mosHTML::selectList( $authors, 'filter_authorid', 'class="inputbox" size="1" onchange="document.adminForm.submit( );"', 'created_by', 'name', $filter_authorid );

	HTML_export::showExportArchive( $rows, $section, $lists, $search, $pageNav, $option, $all, $redirect );
}

/*****************************
Content items un_archive
**********************************/
   function un_archive( $cid=null, $state=0, $option ) {
	global $database, $my, $task;

	if (count( $cid ) < 1) {
		$action = $state == 1 ? 'publish' : ($state == -1 ? 'archive' : 'unpublish');
		echo "<script> alert('Select an item to $action'); window.history.go(-1);</script>\n";
		exit;
	}

	$total = count ( $cid );
	$cids = implode( ',', $cid );

	$query = "UPDATE #__export_content"
	. "\n SET state = $state"
	. "\n WHERE id IN ( $cids ) AND ( checked_out = 0 OR (checked_out = $my->id ) )"
	;
	$database->setQuery( $query );
	if (!$database->query()) {
		echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
		exit();
	}

	if (count( $cid ) == 1) {
		$row = new mosExport_Content( $database );
		$row->checkin( $cid[0] );
	}

	switch ( $state ) {
		case -1:
			$msg = $total .' Item(s) successfully Archived';
			break;

		case 1:
			$msg = $total .' Item(s) successfully Published';
			break;

		case 0:
		default:
			if ( $task == 'un_archive' ) {
				$msg = $total .' Item(s) successfully Unarchived';
			} else {
				$msg = $total .' Item(s) successfully Unpublished';
			}
			break;
	}

	$redirect 	= mosGetParam( $_POST, 'redirect', $row->sectionid );
	$rtask 		= mosGetParam( $_POST, 'returntask', '' );
	if ( $rtask ) {
		$rtask = '&task='. $rtask;
	} else {
		$rtask = '';
	}
	mosRedirect( 'index2.php?option=com_export_content&task=showexportarchive',$msg );

}
/************************************************
Download compliled data
**************************************************/
function download_data( $option ) {
 ?>
 
<style>
.menu_tab{
  border-top-color:#E7E7E7;
  border-left-color:#E7E7E7;
  border-right-color:#E7E7E7;
  border-bottom-color:#E7E7E7;
  border-right-width:0px;
  border-left-width:0px;
  border-bottom-width:0px;
  border-top-width:0px;
  border-style:solid;
  background-image:none;
  color:#000;
  font-weight:500;
}
.menu {
  text-align:left;
  border-top-color:#E7E7E7;
  border-left-color:#E7E7E7;
  border-right-color:#E7E7E7;
  border-bottom-color:#E7E7E7;
  border-right-width:1px;
  border-left-width:1px;
  border-bottom-width:0px;
  border-top-width:1px;
  border-style:solid;
  background-image:none;
  color:#000;
  width:160px;
   }
   .pwrby{
	padding-left:40px;
}
</style>
<?php

global $database, $mosConfig_sitename, $mainframe, $mosConfig_live_site;
	mosCommonHTML::loadOverlib();
	$base_path='../administrator/index.php?option=com_export_content';
	//1.5+ files
	$sqlfilename   = _EXPORT_BASE_PATH . 'new_version/install.mysql.utf.sql';
	$newfilename      = _EXPORT_BASE_PATH . 'new_version/import_content_data.zip';
	//1.0+ files
$xmlfilename   = _EXPORT_BASE_PATH . 'zip/import_content_data.xml';
$filename      = _EXPORT_BASE_PATH . 'zip/import_content_data.zip';

$xmlalt= '';
$zipalt ='';
if(file_exists($sqlfilename)){
  $xmlsize= filesize($sqlfilename);
  $size= filesize($newfilename);
  }else{
  $xmlsize= filesize($xmlfilename);
  $size= filesize($filename);
  }
  //$size= filesize($filename);

function size_hum_read($size){
/*******************************
Returns a human readable size
********************************/
  $i=0;
  $iec = array("B", "KB", "MB", "GB", "TB", "PB", "EB", "ZB", "YB");
  while (($size/1024)>1) {
   $size=$size/1024;
   $i++;
  }
  return substr($size,0,strpos($size,'.')+4).$iec[$i];
}
?>
<div class="filesizes">
<h3><u><?php echo _COMPILE_DOWNLOAD_HEADING;?></u></h3>
<?php
// JToolBarHelper::title(   JText::_( 'Download Area' ), 'install.png' );
    echo _DOWNLOAD_NOTE;?> <?php echo $mosConfig_sitename;?>.
        <BR/>
        <BR/>
		<form action="index2.php" method="post" name="adminForm">
        <input type="hidden" name="task" value="download_data"/>
		<input type="hidden" name="option" value="com_export_content" />
		<input type="hidden" name="scope" value="<?php echo $scope;?>" />
        <input type="hidden" name="chosen" value="" />
		<input type="hidden" name="act" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="hidemainmenu" value="0" />
		</form>
        <BR/>
        <BR/>
  <?php
  if(file_exists($sqlfilename)){
   //download link for Joomla 1.5+ data
 $download_link="$mosConfig_live_site/administrator/components/com_export_content/new_version/import_content_data.zip";
   }else{
 //download link for Joomla 1.0+ data
$download_link="$mosConfig_live_site/administrator/components/com_export_content/zip/import_content_data.zip";	
 }
?>  
<form  type="link" action="<?php echo $download_link;?>">
<input type="submit" value="<?php echo _DOWNLOAD_BUTTON;?>&nbsp;<?php if(file_exists($sqlfilename)){echo _DOWNLOAD_NEW_DATA;}else{echo _DOWNLOAD_OLD_DATA;}?>" class="button_size">
</form>
<BR/>
<BR/><div class="trouble_shoot">
<u><b><?php
/****************************************
Troubleshoot tips
*****************************************/
JHTML::_('behavior.tooltip');
 echo _TROUBLE_SHOOT_HEADING;?></b></u><BR/><BR/>
 <?php //echo _TROUBLE_SHOOT;?>
 	<span class="editlinktip hasTip" title="<?php echo JText::_( '_COMPILE_SITE_CONTENT' );?>:: <div align=left><?php echo _ZIP_FILESIZE;?></div>">
					
	<a href="#"><img src="<?php echo $mosConfig_live_site;?>/administrator/components/com_export_content/images/tooltip_icon.png" width="16" height="16" border="0" alt="<?php echo $zipalt; ?>" />
	</a></span>Compiled content "ZIP file" size is: <?php echo size_hum_read($size); ?>
 <BR/><BR/>
 
	<span class="editlinktip hasTip" title="<?php echo JText::_( '_XML_FILESIZE_HEADING' );?>:: <div align=left><?php echo _XML_FILESIZE;?></div>">
					
	<a href="#"><img src="<?php echo $mosConfig_live_site;?>/administrator/components/com_export_content/images/tooltip_icon.png" width="16" height="16" border="0" alt="<?php echo $zipalt; ?>" />
	</a></span>Compiled content "INSTALL file" size is: <?php echo size_hum_read($xmlsize); ?>
	
<BR/><BR/>

	<span class="editlinktip hasTip" title="<?php echo JText::_( '_INSERT_CODE' );?>:: <div align=left><?php echo _XML_VIEW_FILE;?></div>">
					
	<a href="#"><img src="<?php echo $mosConfig_live_site;?>/administrator/components/com_export_content/images/tooltip_icon.png" width="16" height="16" border="0" alt="<?php echo $zipalt; ?>" />
	</a></span><?php
	if(file_exists($sqlfilename)){
	 $link='../administrator/components/com_export_content/view_sql.php';
	 }else{
   $link='../administrator/components/com_export_content/view_xml.php';
  
  }
     $win_status= 'toolbar=no, scrollbars=yes, menubar=no, resizable=yes, width=800, height=600, location=no, left=100, top=10';
        ?>
        <a href="<?php echo $link;?>" onclick="NewWin=window.open(this.href,this.target,'<?php echo $win_status;
?>'); return false;" title=""><?php 
if(file_exists($sqlfilename)){
 echo _VIEW_SQL_FILE;
 }else{
echo _VIEW_XML_FILE;
}?></a>	
<BR/>
<BR/><BR/></div>
 </div></div><BR/>
<style>

</style>
</td></tr><tr><td colspan="2"  class="pwrby">	
 <?php
  function viewimg(){
		if(file_exists($sqlfilename)){
	 $link='../administrator/components/com_export_content/view_sql.php';
	 }else{
   $link='../administrator/components/com_export_content/view_xml.php';
  
  }
}
    echo '<font size="-2" color="#006699;">Export Content Is Powered by:<a href="http://www.bestdownloadsites.com/" target="_blank">Best Download Sites </a></font></td></tr></table>';
	?>
	<div class="clr"></div></div>
	<div class="clr"></div></div></div>
	<div id="border-bottom"><div><div></div></div>
	<?php
}

/****************************************************
check date
*****************************************************/
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
 /*************************************************************
Get site content and build a joomla 1.5 component for download
***************************************************************/
function compile_15()
{
 $oldfile = "../administrator/components/com_export_content/zip/import_content_data.zip";
if(file_exists($oldfile)){
  remove_old_zip();
  }
 $oldfiles = "../administrator/components/com_export_content/new_version/import_content_data.zip";
if(file_exists($oldfiles)){
  remove_old_zip();
  }
  
  require_once( _EXPORT_BASE_PATH . 'dump_joomla_new.php' );
 // remove_xml();
  dumping_new_version($sectionid, $cid, $id);
  require_once( 'pclzip.lib.php' );
$archive = new PclZip('../administrator/components/com_export_content/new_version/import_content_data.zip');
$v_list = $archive->create('../administrator/components/com_export_content/new_version/',PCLZIP_OPT_REMOVE_PATH, '../administrator/components/com_export_content/new_version/',PCLZIP_OPT_ADD_PATH, 'import_content_data');

  if ($v_list == 0) {
    die("Error : ".$archive->errorInfo(true));
  }
//You may now download your data via the download icon
$msg= _CONTENT_DOWNLOAD;
mosRedirect( 'index2.php?option=com_export_content&task=sections_to_export',$msg );
}
/*****************************************************************
Get static content and build a joomla 1.5 component for download 
*****************************************************************/
function compile_static_15()
{
 $oldfile = "../administrator/components/com_export_content/zip/import_content_data.zip";
if(file_exists($oldfile)){
  remove_old_zip();
  }
 $oldfiles = "../administrator/components/com_export_content/new_version/import_content_data.zip";
if(file_exists($oldfiles)){
  remove_old_zip();
  }
  require_once( _EXPORT_BASE_PATH . 'dump_static_1.5.php' );
 // remove_xml();
  dumping_new_version_static($option,$cid);
  require_once( 'pclzip.lib.php' );
$archive = new PclZip('../administrator/components/com_export_content/new_version/import_content_data.zip');
$v_list = $archive->create('../administrator/components/com_export_content/new_version/',PCLZIP_OPT_REMOVE_PATH, '../administrator/components/com_export_content/new_version/',PCLZIP_OPT_ADD_PATH, 'import_content_data');

  if ($v_list == 0) {
    die("Error : ".$archive->errorInfo(true));
  }
//You may now download your data via the download icon
$msg= _CONTENT_DOWNLOAD;
mosRedirect( 'index2.php?option=com_export_content&task=viewExport_static',$msg );
}
 /****************************************************
Get site content and build a component for download
*****************************************************/
function compile()
{
  remove_old_zip();
 // remove_xml();
  dumping($sectionid, $cid, $id);
  require_once( 'pclzip.lib.php' );
$archive = new PclZip('../administrator/components/com_export_content/zip/import_content_data.zip');
$v_list = $archive->create('../administrator/components/com_export_content/zip/',PCLZIP_OPT_REMOVE_PATH, '../administrator/components/com_export_content/zip/',PCLZIP_OPT_ADD_PATH, 'import_content_data');

  if ($v_list == 0) {
    die("Error : ".$archive->errorInfo(true));
  }
//You may now download your data via the download icon
$msg= _CONTENT_DOWNLOAD;
mosRedirect( 'index2.php?option=com_export_content&task=sections_to_export',$msg );
}
/************************************************
Removed site info from the component zip file
**************************************************/
function remove_zip(){
  remove_xml();
     //All compiled content has been removed;
   $msg= _CONTENT_REMOVED;
mosRedirect( 'index2.php?option=com_export_content&task=sections_to_export',$msg );
 }
/**********************************
Remove old zip before re-compiling
*********************************/
function remove_old_zip(){
  global $mosConfig_live_site;
  //remove zipped data file
$file = "../administrator/components/com_export_content/zip/import_content_data.zip";
if (!unlink($file))
  {
  echo ("Error deleting $file");
  }
else
  {
  echo ("Deleted $file");
}

//version 1.5
$files = "../administrator/components/com_export_content/new_version/import_content_data.zip";
if (!unlink($files))
  {
  echo ("Error deleting $files");
  }
else
  {
  echo ("Deleted $files");
}
}
 /******************************************************************
Removes the xml and zip file after being compiled via remove button
********************************************************************/
function remove_xml(){
  global $mosConfig_live_site;
  //remove zipped data file
$file = "../administrator/components/com_export_content/zip/import_content_data.zip";
if (!unlink($file))
  {
  echo ("Error deleting $file");
  }
else
  {
  echo ("Deleted $file");
}
//remove XML file;
$xmlfile = "../administrator/components/com_export_content/zip/import_content_data.xml";
if (!unlink($xmlfile))
  {
  echo ("Error deleting $xmlfile");
  }
else
  {
  echo ("Deleted $xmlfile");
}
//joomla 1.5
//remove zip file;
$newfiles = "../administrator/components/com_export_content/new_version/import_content_data.zip";
if (!unlink($newfiles))
  {
  echo ("Error deleting $newfiles");
  }
else
  {
  echo ("Deleted $newfiles");
}
//remove sql
$sqlfile = "../administrator/components/com_export_content/new_version/install.mysql.utf.sql";
if (!unlink($sqlfile))
  {
  echo ("Error deleting $sqlfile");
  }
else
  {
  echo ("Deleted $sqlfile");
}
//remove sql
$nonuf8sqlfile = "../administrator/components/com_export_content/new_version/install.mysql.nonutf8.sql";
if (!unlink($nonuf8sqlfile))
  {
  echo ("Error deleting $nonuf8sqlfile");
  }
else
  {
  echo ("Deleted $nonuf8sqlfile");
}
  //All compiled content has been removed;
   $msg= _CONTENT_REMOVED;
mosRedirect( 'index2.php?option=com_export_content&task=sections_to_export',$msg );
}
/*********************************
//remove sql
*********************************/
function remove_sql_install(){
$sqlfile = "../administrator/components/com_export_content/new_version/install.mysql.utf.sql";
if (!unlink($sqlfile))
  {
  echo ("Error deleting $sqlfile");
  }
else
  {
  echo ("Deleted $sqlfile");
}
//remove sql
$nonuf8sqlfile = "../administrator/components/com_export_content/new_version/install.mysql.nonutf8.sql";
if (!unlink($nonuf8sqlfile))
  {
  echo ("Error deleting $nonuf8sqlfile");
  }
else
  {
  echo ("Deleted $nonuf8sqlfile");
}
  //All compiled content has been removed;
  // $msg= _CONTENT_REMOVED;
//mosRedirect( 'index2.php?option=com_export_content&task=sections_to_export',$msg );
}
/*******************************************
Build xml content file
*******************************************/
function dumping($sectionid, $cid, $id){
  global $mainframe;
remove_sql_install();
$option = 'com_export_content';

   $static 	          = mosGetParam( $_REQUEST, 'static', '' );
   $sectionids 	      = mosGetParam( $_REQUEST, 'cid', 'cid' );
   $get_from_section  = implode( ',', $sectionids );

/*************************************
Start XML output
**************************************/
 global $database,$mosConfig_host,$mosConfig_password, $mosConfig_user, $mosConfig_live_site, $mosConfig_db, $mosConfig_dbprefix;
 //xml description text
$xml_txt = _XML_DESCRIPTION_TXT;
$dates   = date("F/j/Y");
   $file= fopen("../administrator/components/com_export_content/zip/import_content_data.xml", "w");
$_xml ="<?xml version=\"1.0\"?>\r\n";
$_xml .="<mosinstall type=\"component\">\r\n";
$_xml .="<name>import_content_data</name>\r\n";
$_xml .="<creationDate>$dates</creationDate>\r\n";
$_xml .="<author>Stephen Harrison</author>\r\n";
$_xml .="<copyright>Copyright 2007 GNU/GPL License.</copyright>\r\n";
$_xml .="<authorEmail>joomla@bestdownloadsites.com</authorEmail>\r\n";
$_xml .="<authorUrl>http://www.bestdownloadsites.com</authorUrl>\r\n";
$_xml .="<version>1.0</version>\r\n";
$_xml .="<description><![CDATA[$xml_txt ]]></description>\r\n";
$_xml .="<install>\r\n";
$_xml .="<queries>\r\n";
$_xml .="<query>\r\n";
$_xml .="TRUNCATE TABLE  #__export_sections\r\n";
$_xml .="</query>\r\n";
$_xml .="<query>\r\n";
$_xml .="TRUNCATE TABLE  #__export_categories\r\n";
$_xml .="</query>\r\n";
$_xml .="<query>\r\n";
$_xml .="TRUNCATE TABLE  #__export_content\r\n";
$_xml .="</query>\r\n";
global $database;
/*********************************************
Get info for sections table.
**********************************************/
$sql="SELECT *FROM #__sections WHERE id IN ( $get_from_section ) ORDER BY `id`ASC";
	$database->setQuery($sql);
    $section_rows = $database->loadObjectList();
	foreach($section_rows as $sect){
$_xml .="<query>\r\n";
 $_xml .="<![CDATA[INSERT INTO `#__export_sections` (`id`, `title`,`name`, `alias`, `image`, `scope`, `image_position`,`description`, `published`, `checked_out`, `checked_out_time`, `ordering`, `access`, `count`, `params`)VALUES";
$sect_id               = $sect->id;
$sect_title            = addslashes(accents_15($sect->title));
$sect_name             = $sect_title; 
$sect_alias            = addslashes(accents_15($sect->alias));
$sect_image            = addslashes(accents_15($sect->image));
$sect_scope            = $sect->scope;
$sect_image_position   = $sect->image_position;
$sect_description      = addslashes(accents_15($sect->description));
$published             = $sect->published;
$sect_checked_out      = $sect->checked_out;
$sect_checked_out_time = $sect->checked_out_time;
$sect_ordering         = $sect->ordering;
$sect_access           = $sect->access;
$sect_count            = $sect->count;
$sect_params           = $sect->params;
/*********************************************
Setup inserts for sections table.
**********************************************/
$sect_text="('$sect_id','$sect_title','$sect_name','$sect_alias','$sect_image','$sect_scope','$sect_image_position','$sect_description','$published','$sect_checked_out','$sect_checked_out_time','$sect_ordering','$sect_access','$sect_count','$sect_params')";
$_xml .="$sect_text";
$_xml .=";]]></query>\r\n";
}
/**********************************
Get categories
************************************/
global $database;
   $sql="SELECT * FROM #__categories WHERE section IN ( $get_from_section )"
    . "\n AND section NOT LIKE ('%com_%')OR('%help%')"
	. "\n ORDER BY id ASC"
    ;
	$database->setQuery($sql);
    $cat_rows = $database->loadObjectList();
    
    foreach($cat_rows as $cat){
 $_xml .="<query>\r\n";
 $_xml .="<![CDATA[INSERT INTO #__export_categories (`id`, `parent_id`,`title`, `name`, `alias`, `image`, `section`,`image_position`, `description`, `published`, `checked_out`, `checked_out_time`, `editor`, `ordering`, `access`, `count`, `params`)VALUES";
$cat_id                = $cat->id;
$cat_parent_id         = $cat->parent_id;
$cat_title             = addslashes(accents_15($cat->title));
$cat_name              = $cat_title;
$alias                 = addslashes(accents_15($cat->alias));
$cat_image             = addslashes(accents_15($cat->image));
$cat_section           = $cat->section;
$cat_image_position    = $cat->image_position;
$cat_description       = addslashes(accents_15($cat->description));
$cat_published         = $cat->published;
$cat_checked_out       = $cat->checked_out;
$cat_checked_out_time  = $cat->checked_out_time;
$cat_editor            = $cat->editor;
$cat_ordering          = $cat->ordering;
$cat_access            = $cat->access;
$cat_count             = $cat->count;
$cat_params            = addslashes(accents_15($cat->params));

/*********************************************
Setup inserts for sections table.
**********************************************/
$cat_text="('$cat_id','$cat_parent_id','$cat_title','$cat_name','$cat_alias','$cat_image','$cat_section','$cat_image_position','$cat_description','$cat_published','$cat_checked_out','$cat_checked_out_time','$cat_editor','$cat_ordering','$cat_access','$cat_count','$cat_params')";
$_xml .="$cat_text";
 $_xml .=";]]></query>\r\n";
 }
 /*********************************************************************
To stop static items being compiled by default.
***********************************************************************/

global $mosConfig_absolute_path;
 $archives          = mosGetParam( $_REQUEST, 'archives');
   $static 	          = mosGetParam( $_REQUEST, 'static_items');
  
   //Choose whether do add static items
   global $database;
if ($static=='1'){
    $sql = 'SELECT id FROM #__content WHERE catid= 0';
    $database->setQuery( $sql );
    $ids_static = $database->loadResultArray( 0 );
    $_staticxml ="";
    $_staticxml .="\n OR id IN (";
    $ids_static = implode(',' ,$ids_static);
    $_staticxml .="$ids_static";
    $_staticxml .=")";
 
}
//Choose whether do add archive items
if($archives=='1'){
	$archived_items='(state >= -1)';
}
else{
	$archived_items='(state != -1)';
}
   
$sql="SELECT * FROM #__content WHERE $archived_items"
. "\n AND sectionid IN ( $get_from_section )"
. "\n  $_staticxml"
. "\n  ORDER BY `id` ASC"
;
	$database->setQuery($sql);
   $content_rows = $database->loadObjectList();
  // $content_rows = $database->getEscaped( $content_rows);
	foreach($content_rows as $content){
$_xml .="<query><![CDATA[INSERT INTO #__export_content (`id`, `title`, `alias`, `title_alias`, `introtext`, `fulltext`, `state`,`sectionid`, `mask`, `catid`, `created`, `created_by`, `created_by_alias`, `modified`, `modified_by`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `images`, `urls`, `attribs`, `version`, `parentid`, `ordering`, `metakey`, `metadesc`, `access`, `hits`, `metadata`)VALUES";
/****************************************
Get content items 
****************************************/
$content_id        = $content->id;
$title             = addslashes(accents_15($content->title));
$alias             = $title;
$title_alias       = $title;
$intro             = addslashes(accents_15($content->introtext));
$full              = addslashes(accents_15($content->fulltext));
$state             = $content->state;
$sectionid         = $content->sectionid;
$mask              = $content->mask;
$catid             = $content->catid;
$created           = $content->created;
$created_by        = $content->created_by;
$created_by_alias    = addslashes(accents_15($content->created_by_alias));
$modified          = $content->modified;
$modified_by       = $content->modified_by;
$checked_out       = $content->checked_out;
$checked_out_time  = $content->checked_out_time;
$publish_up        = $content->publish_up;
$publish_down      = $content->publish_down;
$images            = addslashes(accents_15($content->images));
$urls              = addslashes(accents_15($content->urls));
$attribs           = change_attribs('#atrstart#' . $content->attribs . '#atrend#');
$version           = $content->version;
$parentid          = $content->parentid;
$ordering          = $content->ordering;
$metakey           = addslashes(accents_15($content->metakey));
$metadesc          = addslashes(accents_15($content->metadesc));
$access            = $content->access;
$hits              = $content->hits;
$metadata          = '';
/*********************************************
Setup inserts  statements for content table.
**********************************************/
$text= "('$content_id','$title','$alias','$title_alias','$intro','$full','$state','$sectionid','$mask','$catid','$created','$created_by','$created_by_alias','$modified','$modified_by','$checked_out','$checked_out_time','$publish_up','$publish_down','$images','$urls','$attribs','$version','$parentid','$ordering','$metakey','$metadesc','$access','$hits','$metadata')";
   $_xml .="$text";
     $_xml .=";]]></query>\r\n";
     }
     $_xml .="</queries>\r\n";
     $_xml .="</install>\r\n";
     $_xml .="<installfile>\r\n";
	 $_xml .="<filename>install.import_content_data.php</filename>\r\n";
     $_xml .="</installfile>\r\n";
     $_xml .="<uninstallfile>\r\n";
	 $_xml .="<filename>uninstall.import_content_data.php</filename>\r\n";
     $_xml .="</uninstallfile>\r\n";
     $_xml .="<administration>\r\n";
	 $_xml .="<menu>Imported Content</menu>\r\n";
	 $_xml .="<files>\r\n";
     $_xml .="<filename>admin.import_content_data.php</filename>\r\n";
     $_xml .="</files>\r\n";
	 $_xml .="</administration>\r\n";
     $_xml .="</mosinstall>";
 fwrite($file, high_order($_xml));
 fclose($file);
}
/*****************************************************************
Show sections from source site for insertion into destination site
******************************************************************/
function Sections( $scope, $option ) {
$cid 		= mosGetParam( $_REQUEST, 'cid', array(0) );
$section 	= mosGetParam( $_REQUEST, 'scope', '' );
	global $database, $my, $mainframe, $mosConfig_list_limit;

	$limit = $mainframe->getUserStateFromRequest( "viewlistlimit", 'limit', $mosConfig_list_limit );
	$limitstart = $mainframe->getUserStateFromRequest( "view{$option}limitstart", 'limitstart', 0 );
 $scope='content';
	// get the total number of records
	$query = "SELECT COUNT(*)"
	. "\n FROM #__export_sections"
	. "\n WHERE scope = '$scope'"
	;
	$database->setQuery( $query );
	$total = $database->loadResult();

	require_once( $GLOBALS['mosConfig_absolute_path'] . '/administrator/includes/pageNavigation.php' );
	$pageNav = new mosPageNav( $total, $limitstart, $limit );

	$query = "SELECT c.*, g.name AS groupname, u.name AS editor"
	. "\n FROM #__export_sections AS c"
	. "\n LEFT JOIN #__export_content AS cc ON c.id = cc.sectionid"
	. "\n LEFT JOIN #__users AS u ON u.id = c.checked_out"
	. "\n LEFT JOIN #__groups AS g ON g.id = c.access"
	. "\n WHERE scope = '$scope'"
	. "\n GROUP BY c.id"
	. "\n ORDER BY c.ordering, c.name"
	. "\n LIMIT $pageNav->limitstart, $pageNav->limit"
	;
	$database->setQuery( $query );
	$rows = $database->loadObjectList();
	if ($database->getErrorNum()) {
		echo $database->stderr();
		return false;
	}

	$count = count( $rows );
	// number of Active Items
	for ( $i = 0; $i < $count; $i++ ) {
		$query = "SELECT COUNT( a.id )"
		. "\n FROM #__export_categories AS a"
		. "\n WHERE a.section = '". $rows[$i]->id ."'"
		. "\n AND a.published != -2"
		;
		$database->setQuery( $query );
		$active = $database->loadResult();
		$rows[$i]->categories = $active;
	}
	// number of Active Items
	for ( $i = 0; $i < $count; $i++ ) {
		$query = "SELECT COUNT( a.id )"
		. "\n FROM #__export_content AS a"
		. "\n WHERE a.sectionid = '". $rows[$i]->id ."'"
		. "\n AND a.state != -2"
		;
		$database->setQuery( $query );
		$active = $database->loadResult();
		$rows[$i]->active = $active;
	}
	// number of Trashed Items
	for ( $i = 0; $i < $count; $i++ ) {
		$query = "SELECT COUNT( a.id )"
		. "\n FROM #__export_content AS a"
		. "\n WHERE a.sectionid = '". $rows[$i]->id ."'"
		. "\n AND a.state = -2"
		;
		$database->setQuery( $query );
		$trash = $database->loadResult();
		$rows[$i]->trash = $trash;
	}

	HTML_export::show_sections( $rows, $scope, $my->id, $pageNav, $option );
	}
/******************************************************************
Show categories from source site for insertion into destination site
*******************************************************************/
function categories( $section, $option ) {
 	// Initialize variables
		$db		=& JFactory::getDBO();
		$user	=& JFactory::getUser();
global $database;
global $database, $mainframe, $mosConfig_list_limit, $mosConfig_absolute_path;
	
$sectionid = $mainframe->getUserStateFromRequest( "sectionid{$option}{$section}", 'sectionid', 0 );
$limit=$mainframe->getUserStateFromRequest( "viewlistlimit", 'limit', $mosConfig_list_limit );

$limitstart=$mainframe->getUserStateFromRequest( "view{$section}limitstart", 'limitstart', 0 );

	$section_name 	= '';
	$content_add 	= '';
	$content_join 	= '';
	$order 			= "\n ORDER BY c.ordering, c.name";
	if (intval( $section ) > 0) {
		$table = 'content';

		$query = "SELECT name"
		. "\n FROM #__export_sections"
		. "\n WHERE id = $section";
		$database->setQuery( $query );
		$section_name = $database->loadResult();
		$section_name = 'Content: '. $section_name;
		$where 	= "\n WHERE c.section = '$section'";
		$type 	= 'content';
	} else if (strpos( $section, 'com_' ) === 0) {
		$table = substr( $section, 4 );

		$query = "SELECT name"
		. "\n FROM #__components"
		. "\n WHERE link = 'option=$section'"
		;
		$database->setQuery( $query );
		$section_name = $database->loadResult();
		$where 	= "\n WHERE c.section = '$section'";
		$type 	= 'other';

		// special handling for contact component
		if ( $section == 'com_contact_details' ) {
			$section_name 	= 'Contact';
		}
		$section_name = 'Component: '. $section_name;
	} else {
		$table 	= $section;
		$where 	= "\n WHERE c.section = '$section'";
		$type 	= 'other';
	}

	// get the total number of records
	$query = "SELECT COUNT(*)"
	. "\n FROM #__export_categories"
	. "\n WHERE section = '$section'"
	;
	$database->setQuery( $query );
	$total = $database->loadResult();

	// allows for viweing of all content categories
	if ( $section == 'content' ) {
		$table 			= 'content';
		$content_add 	= "\n , z.title AS section_name";
		$content_join 	= "\n LEFT JOIN #__export_sections AS z ON z.id = c.section";
		$where 			= "\n WHERE c.section NOT LIKE '%com_%'";
		$order 			= "\n ORDER BY c.section, c.ordering, c.name";
		$section_name 	= '$section_name';
		// get the total number of records
		$query = "SELECT COUNT(*)"
		. "\n FROM #__export_categories"
		. "\n INNER JOIN #__export_sections AS s ON s.id = section"
		;
		$database->setQuery( $query );
		$total = $database->loadResult();
		$type 			= 'content';
	}

	// used by filter
	if ( $sectionid > 0 ) {
		$filter = "\n AND c.section = '$sectionid'";
	} else {
		$filter = '';
	}

	require_once( $mosConfig_absolute_path . '/administrator/includes/pageNavigation.php' );
	$pageNav = new mosPageNav( $total, $limitstart, $limit );

	$query = "SELECT  c.*, c.checked_out as checked_out_contact_category, g.name AS groupname, u.name AS editor,"
	. "COUNT( DISTINCT s2.checked_out ) AS checked_out"
	. $content_add
	. "\n FROM #__export_categories AS c"
	. "\n LEFT JOIN #__users AS u ON u.id = c.checked_out"
	. "\n LEFT JOIN #__groups AS g ON g.id = c.access"
	. "\n LEFT JOIN #__$table AS s2 ON s2.catid = c.id AND s2.checked_out > 0"
	. $content_join
	. $where
	. $filter
	. "\n AND c.published != -2"
	. "\n GROUP BY c.id"
	. $order
	. "\n LIMIT $pageNav->limitstart, $pageNav->limit"
	;
	$database->setQuery( $query );
	$rows = $database->loadObjectList();
	if ($database->getErrorNum()) {
		echo $database->stderr();
		return;
	}

	$count = count( $rows );
	// number of Active Items
	for ( $i = 0; $i < $count; $i++ ) {
		$query = "SELECT COUNT( a.id )"
		. "\n FROM #__export_content AS a"
		. "\n WHERE a.catid = ". $rows[$i]->id
		. "\n AND a.state != -2"
		;
		$database->setQuery( $query );
		$active = $database->loadResult();
		$rows[$i]->active = $active;
	}
	// number of Trashed Items
	for ( $i = 0; $i < $count; $i++ ) {
		$query = "SELECT COUNT( a.id )"
		. "\n FROM #__export_content AS a"
		. "\n WHERE a.catid = ". $rows[$i]->id
		. "\n AND a.state = -2"
		;
		$database->setQuery( $query );
		$trash = $database->loadResult();
		$rows[$i]->trash = $trash;
	}

$sectionid = array();
$sectionid[] = mosHTML::makeOption( '0', '- '.JText::_('Select Section').' -' );
$database->setQuery( "SELECT id AS value, title AS text FROM #__export_sections" );
$sectionid = array_merge( $sectionid, $database->loadObjectList() );

$database->setQuery( "SELECT id AS value, title AS text FROM #__export_sections WHERE id=$sectionid" );
$selected =$database->loadObjectList();

$lists['sectionid'] = mosHTML::selectList( $sectionid, 'sectionid','class="inputbox" size="1"  onchange="document.adminForm.submit( );"', 'value', 'text', $selected  );

	HTML_export::show_cat( $rows, $section, $section_name, $pageNav, $lists, $type );

}

/************************************************************************
Show content items from source site for insertion into destination site
*************************************************************************/
function content_items( $sectionid, $option ) {
	global $database, $mainframe, $mosConfig_list_limit;


	$catid 				= $mainframe->getUserStateFromRequest( "catid{$option}{$sectionid}", 'catid', 0 );
	$filter_authorid 	= $mainframe->getUserStateFromRequest( "filter_authorid{$option}{$sectionid}", 'filter_authorid', 0 );
	$filter_sectionid 	= $mainframe->getUserStateFromRequest( "filter_sectionid{$option}{$sectionid}", 'filter_sectionid', 0 );
	$limit 				= $mainframe->getUserStateFromRequest( "viewlistlimit", 'limit', $mosConfig_list_limit );
	$limitstart 		= $mainframe->getUserStateFromRequest( "view{$option}{$sectionid}limitstart", 'limitstart', 0 );
	$search 			= $mainframe->getUserStateFromRequest( "search{$option}{$sectionid}", 'search', '' );
	$search 			= $database->getEscaped( trim( strtolower( $search ) ) );
	$redirect 			= $sectionid;
	$filter 			= ''; //getting a undefined variable error

	if ( $sectionid == 0 ) {
		// used to show All content items
		$where = array(
		"c.state 	>= 0",
		"c.catid 	= cc.id",
		"cc.section = s.id",
		"s.scope	= 'content'",
		);
		$order = "\n ORDER BY s.title, c.catid, cc.ordering, cc.title, c.ordering";
		$all = 1;

		if ($filter_sectionid > 0) {
			$filter = "\n WHERE cc.section = $filter_sectionid";
		}
		$section->title = 'All Content Items';
		$section->id = 0;
	} else {
		$where = array(
		"c.state 	>= 0",
		"c.catid 	= cc.id",
		"cc.section = s.id",
		"s.scope 	= 'content'",
		"c.sectionid = '$sectionid'"
		);
		$order 		= "\n ORDER BY cc.ordering, cc.title, c.ordering";
		$all 		= NULL;
		$filter 	= "\n WHERE cc.section = '$sectionid'";
		$section 	= new mosExport_Sections( $database );
		$section->load( $sectionid );
	}

	// used by filter
	if ( $filter_sectionid > 0 ) {
		$where[] = "c.sectionid = $filter_sectionid";
	}
	if ( $catid > 0 ) {
		$where[] = "c.catid = $catid";
	}
	if ( $filter_authorid > 0 ) {
		$where[] = "c.created_by = $filter_authorid";
	}

	if ( $search ) {
		$where[] = "LOWER( c.title ) LIKE '%$search%'";
	}

	// get the total number of records
	$query = "SELECT COUNT(*)"
	. "\n FROM ( #__export_content AS c, #__export_categories AS cc, #__export_sections AS s )"
	. ( count( $where ) ? "\n WHERE " . implode( ' AND ', $where ) : "" )
	;
	$database->setQuery( $query );
	$total = $database->loadResult();
	require_once( $GLOBALS['mosConfig_absolute_path'] . '/administrator/includes/pageNavigation.php' );
	$pageNav = new mosPageNav( $total, $limitstart, $limit );

	$query = "SELECT c.*, g.name AS groupname, cc.name, cc.title as category_title, u.name AS editor, f.content_id AS frontpage, s.title AS section_name, v.name AS author"
	. "\n FROM ( #__export_content AS c, #__export_categories AS cc, #__export_sections AS s )"
	. "\n LEFT JOIN #__groups AS g ON g.id = c.access"
	. "\n LEFT JOIN #__users AS u ON u.id = c.checked_out"
	. "\n LEFT JOIN #__users AS v ON v.id = c.created_by"
	. "\n LEFT JOIN #__content_frontpage AS f ON f.content_id = c.id"
	. ( count( $where ) ? "\nWHERE " . implode( ' AND ', $where ) : '' )
	. $order
	. "\n LIMIT $pageNav->limitstart, $pageNav->limit"
	;
	$database->setQuery( $query );
	$rows = $database->loadObjectList();

	if ($database->getErrorNum()) {
		echo $database->stderr();
		return false;
	}
/*************************
create dropdown lists
************************/

$sectionids = array();
$sectionids[] = mosHTML::makeOption( '0', '- '.JText::_('Select Section').' -' );

$database->setQuery( "SELECT id AS value, title AS text FROM #__export_sections" );
$sectionids = array_merge( $sectionids, $database->loadObjectList() );

$database->setQuery( "SELECT id AS value title AS text FROM #__export_sections" );
$select = $database->loadObjectList();

// Creates the HTML sections list.
$lists['sectionids'] = mosHTML::selectList( $sectionids, 'filter_sectionid','size="1" class="inputbox" onchange="document.adminForm.submit( );"', 'value', 'text', $select );
//category list
$catid = array();
$catid[] = mosHTML::makeOption( '0', '- '.JText::_('Select Category').' -' );
$database->setQuery( "SELECT id AS value, title as text FROM #__export_categories WHERE section='$filter_sectionid'" );
$catid = array_merge( $catid, $database->loadObjectList() );
//$cats='2';

$database->setQuery( "SELECT id AS value, title as text FROM #__export_categories WHERE section ='$filter'" );
$selected = $database->loadObjectList();

// Creates the HTML categories list.
$lists['catid'] = mosHTML::selectList( $catid, 'catid','size="1" class="inputbox" onchange="document.adminForm.submit( );"', 'value', 'text', $selected );

	HTML_export::showExportContent( $rows, $section, $lists, $search, $pageNav, $option, $all, $redirect );
}

/*********************
Show about us
***********************/

function about($option)
{
global $database, $mosConfig_live_site;
?>
<style type="text/css">
.preload{
 background: url(images/donation.png);
/*	background-image: url("rollover_image.png");*/
	background-repeat: no-repeat;background-position: -1000px -1000px;
	}
</style>
<div class="preload"></div>
<?php
echo '<div class="about">';?>
<div class="about_heading">

<table class="thisform">

   <tr class="thisform">

      <td width="60%" valign="top" class="thisform">

         <div id="cpanel">

         <div style="float:left;">

			<div class="icon">

            <a href="index.php?option=com_export_content&amp;task=sections_to_export" style="text-decoration:none;" title="<?php echo _CFG_EXP_SECTIONS;?>">

            <img src="components/com_export_content/images/exsect.png" width="48px" height="48px" align="middle" border="0"/>

            <span>

            <?php echo _CFG_EXP_SECTIONS;?>

            </span></a>

            </div></div>

            
              <div style="float:left;">

			<div class="icon">

            <a href="index2.php?option=com_export_content&amp;task=viewExport_static" style="text-decoration:none;" title="<?php echo _CFG_EXP_SATIC;?>">

            <img src="components/com_export_content/images/export_icon.png" width="48px" height="48px" align="middle" border="0"/>

            <span>

            <?php echo _CFG_EXP_SATIC;?>

            </span></a>

            </div></div>
         <div style="float:left;">

			<div class="icon">

            <a href="index2.php?option=com_export_content&amp;task=sections" style="text-decoration:none;" title="<?php echo _CFG_SECTIONS;?>">

            <img src="components/com_export_content/images/sections.png" width="48px" height="48px" align="middle" border="0"/>

            <span>

            <?php echo _CFG_SECTIONS;?>

            </span></a>

            </div></div>



         <div style="float:left;">

			<div class="icon">

            <a href="index2.php?option=com_export_content&amp;task=categories" style="text-decoration:none;" title="<?php echo _CFG_CAT;?>">

            <img src="components/com_export_content/images/category.png" width="48px" height="48px" align="middle" border="0"/>

            <span>

            <?php echo _CFG_CAT;?>

            </span>

            </a>

            </div></div>

            

         <div style="float:left;">

			<div class="icon">

            <a href="index2.php?option=com_export_content&amp;task=content_items" style="text-decoration:none;" title="<?php echo _CFG_CONTENT;?>">

            <img src="components/com_export_content/images/content.png" width="48px" height="48px" align="middle" border="0"/>

            <span>

            <?php echo _CFG_CONTENT;?>

            </span></a>

            </div></div>

	          

         <div style="float:left;">

			<div class="icon">

            <a href="index2.php?option=com_export_content&amp;task=static_content" style="text-decoration:none;" title="<?php echo _CFG_STATIC;?>">

            <img src="components/com_export_content/images/static.png" width="48px" height="48px" align="middle" border="0"/>

            <span>

            <?php echo _CFG_STATIC;?>

            </span></a>

            </div></div>



            <div style="float:left;">

			<div class="icon">

            <a href="index2.php?option=com_export_content&amp;task=showexportarchive" style="text-decoration:none;" title="<?php echo _CFG_ARCH;?>">

            <img src="components/com_export_content/images/archive.png" width="48px" height="48px" align="middle" border="0"/>

            <span>

            <?php echo _CFG_ARCH;?>

            </span></a>

            </div></div>

         <div style="float:left;">

			<div class="icon">

            <a href="http://www.bestdownloadsites.com/export_content/" target="blank" style="text-decoration:none;" title="<?php echo _CFG_SUPPORT;?>">

            <img src="components/com_export_content/images/support.png" width="48px" height="48px" align="middle" border="0"/>

            <span>

            <?php echo _CFG_SUPPORT;?>

            </a>

            </div></div>

            

         <div style="float:left;">

			<div class="icon">

            <a href="http://www.bestdownloadsites.com/export_content/content/blogsection/1/5/" target="blank" style="text-decoration:none;" title="<?php echo _CFG_HELP;?>">

            <img src="components/com_export_content/images/info.png" width="48px" height="48px" align="middle" border="0"/>

            <span>

            <?php echo _CFG_HELP;?>

            </a>

            </div></div>         

<style>
/*div.icon_stat{padding:4px; } */
.icon_stat{         
border-bottom-color:#E7E7E7;border-right-color:#E7E7E7;
  border-right-width:1px;
  border-left-width:0px;
  border-bottom-width:1px;
  border-top-width:0px;
  border-style:solid; 
  padding-right:8px;
  padding-bottom:2px;
 
   }
   #donatetxt{
    display:none;
}

 table .thisform3x td  {
   border: 1px;
  border-style:solid;
  border-bottom-color:#EFEFEF;
  border-right-color:#EFEFEF;
  border-left-color:#EFEFEF;
  border-top-color:#EFEFEF;	
  width:130px;
 }
 .credits td{
  text-align:left;
  border: 1px;
  border-style:solid;
  border-bottom-color:#EFEFEF;
  border-right-color:#EFEFEF;
  border-left-color:#EFEFEF;
  border-top-color:#EFEFEF;	
  /*width:130px*/
  padding-left:15px;
  color:#666666;	
}
  </style>	
  <?php
	//style="text-decoration:none;"
?>          
                <div style="float:left;  background-color:#F7F8F9;">
             <div class="icon_stat">
  <a href="http://www.bestdownloadsites.com/export_content/content/view/7/12/" target="blank"  title="<?php echo _CFG_DONATE;?>">
  <img src="<?php echo $mosConfig_live_site;?>/administrator/components/com_export_content/images/donation.png" width="330px" height="76px" align="middle" border="0"/></a>
  <div id="donatetxt">
   <?php echo _CFG_DONATE;?></div>
   </a>
       </div>
	</div>
       
                           </td>
       <td width="40%" valign="top" align="center">
       <table border="0" width="100%" class="credits">
         
             <tr class="thisform3c"><td colspan="2"><br />
     
                <div style="width=100%; color:#999999;" >
      
          <p>      
       <?php
	       echo _ABOUT_TEXT;
         ?>
         </p>
     <BR/></blockquote>
       <br />
       <br />
       </div>

				
	   </div>  
          </td>
		      </tr>       
        <tr class="thisform3xx">
           <td width="120"><?php echo THIS_VERSION;?>:</td>
             <td><?php //echo _CFG_VERSION;?>
			 2.0.0 Built for Joomla series 1.5+</td>
                 </tr>
              <tr class="thisform3">
                 <td>Copyright:</td>
                    <td> <a href="http://www.bestdownloadsites.com" target="_blank">&copy; 2008 Best Download Sites</a>
	</td>
      </tr>		  
  <tr class="thisform3">
        <td>License:</td>
           <td><a href="http://www.gnu.org/copyleft/gpl.html" target="_blank">GNU GPL</a>
	</td>
        </tr>
          </table>
              </td>
                  </tr>
                     </table>
                           </div>
						   
						   
       <blockquote>
      
	
   		
<?php
echo "</div><BR/><BR/>";

}
/*************************************
Cancel moving a section
***************************************/
function cancelSection( $option, $scope ) {
	global $database;
	$row = new mosExport_Sections( $database );
	$row->bind( $_POST );
	$row->checkin();
	//Insert of section canceled
$msg = _INSERT_SECT_CANCEL;
mosRedirect( 'index2.php?option=com_export_content&task=sections',$msg );

}
/****************************************
Cancel moving a Category
****************************************/
function cancelCategory() {
	global $database;
    $row = new mosCategory( $database );
	$row->bind( $_POST );
	$row->checkin();
	//Insert of categories canceled
$msg = _INSERT_CAT_CANCEL;
    mosRedirect( 'index2.php?option=com_export_content&task=categories',$msg);

}
/****************************************
Cancel moving a conten item
****************************************/
function cancelContent( ) {
	global $database;
    $row = new mosExport_Content( $database );
	$row->bind( $_POST );
	$row->checkin();
    //Insert of items canceled
    $msg= _INSERT_ITEM_CANCEL;
	mosRedirect( 'index2.php?option=com_export_content&task=content_items',$msg);

}
/*****************************************************
For Processing publishing categories
******************************************************/
function PublishedProcessing_cat( &$row, $i ) {
		$img 	= $row->published ? 'publish_g.png' : 'publish_x.png';
		$task 	= $row->published ? 'unpublish_cat' : 'publish_cat';
		$alt 	= $row->published ? 'Published' : 'Unpublished';
		$action	= $row->published ? 'Unpublish_cat' : 'Publish_cat';

		$href = '
		<a href="javascript: void(0);" onclick="return listItemTask(\'cb'. $i .'\',\''. $task .'\')" title="'. $action .'">
		<img src="images/'. $img .'" border="0" alt="'. $alt .'" />
		</a>'
		;

		return $href;
	//	HTML_export::PublishedProcessingAll( &$row, $i );
		mosRedirect( 'index2.php?option=com_export_content&task=categories');
	}

/**********************************
publish sections
********************************************/
function publishSections( $scope, $cid=null, $publish=1, $option ) {
	global $database, $my;
$scope='content';
	if ( !is_array( $cid ) || count( $cid ) < 1 ) {
		$action = $publish ? 'publish' : 'unpublish';
		echo "<script> alert('Select a section to $action'); window.history.go(-1);</script>\n";
		exit;
	}

	$cids = implode( ',', $cid );
	$count = count( $cid );
	if ( $publish ) {
		if ( !$count ){
			echo "<script> alert('Cannot Publish an Empty Section $count'); window.history.go(-1);</script>\n";
			return;
		}
	}

	$query = "UPDATE #__export_sections"
	. "\n SET published = " . intval( $publish )
	. "\n WHERE id IN ( $cids )"
	. "\n AND ( checked_out = 0 OR ( checked_out = $my->id ) )"
	;
	$database->setQuery( $query );
	if (!$database->query()) {
		echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
		exit();
	}

	if ( $count == 1 ) {
		$row = new mosExport_Sections( $database );
		$row->checkin( $cid[0] );
	}

mosRedirect( 'index2.php?option=com_export_content&task=sections');

}
/************************************************
 Publishes or Unpublishes one or more categories
**************************************************/
function publishCategories( $section, $categoryid=null, $cid=null, $publish=1 ,$option) {
	global $database, $my;
$cid  = mosGetParam( $_REQUEST, 'cid');


	if (count( $cid ) < 1) {

		$action = $publish ? 'publish_cat' : 'unpublish_cat';
		echo "<script> alert('Select a category to $action'); window.history.go(-1);</script>\n";
		exit;
	}


	$cids = implode( ',', $cid );
	$query = "UPDATE #__export_categories"
	. "\n SET published = " . (int) $publish
	. "\n WHERE id IN( $cids )"
	;

	$database->setQuery( $query );
	if (!$database->query()) {
		echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
		exit();
	}

	if (count( $cid ) == 1) {
		$row = new mosExport_Category( $database );
	    $row->checkin( $cid[0] );
	}
	
	
		mosCache::cleanCache( 'com_export_content' );
	
mosRedirect( 'index2.php?option=com_export_content&task=categories');

}
/************************************************
* Deletes one or more sections from export table
* @param array An array of unique category id numbers
* @param string The current url option
***************************************************/
function remove_sections( $cid, $scope, $option ) {
	global $database;

	if (count( $cid ) < 1) {
		echo "<script> alert('Select a section to delete'); window.history.go(-1);</script>\n";
		exit;
	}

	$cids = implode( ',', $cid );

	$query = "SELECT s.id, s.name, COUNT(c.id) AS numcat"
	. "\n FROM #__export_sections AS s"
	. "\n LEFT JOIN #__export_categories AS c ON c.section=s.id"
	. "\n WHERE s.id IN ( $cids )"
	. "\n GROUP BY s.id"
	;
	$database->setQuery( $query );
	if (!($rows = $database->loadObjectList())) {
		echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
	}

	$err = array();
	$cid = array();
	foreach ($rows as $row) {
		if ($row->numcat == 0) {
			$cid[] = $row->id;
			$name[] = $row->name;
		} else {
			$err[] = $row->name;
		}
	}

	if (count( $cid )) {
		$cids = implode( ',', $cid );
		$query = "DELETE FROM #__export_sections"
		. "\n WHERE id IN ( $cids )"
		;
		$database->setQuery( $query );
		if (!$database->query()) {
			echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
		}
	}

	if (count( $err )) {
		$cids = implode( ', ', $err );
		$msg = 'Sections(s): '. $cids .' cannot be removed as they contain categories';
		mosRedirect( 'index2.php?option=com_export_content&task=sections', $msg );
	}

	$names = implode( ', ', $name );
	$msg = 'Section(s): '. $names .' successfully deleted';
mosRedirect( 'index2.php?option=com_export_content&task=sections');
}

/**********************************
Remove categories from export table
**********************************/
function remove_categories( $cid, $option ) {
	global $database;

	if (!is_array( $cid ) || count( $cid ) < 1) {
		echo "<script> alert('Select an item to delete'); window.history.go(-1);</script>";
		exit;
	}
	if (count( $cid )) {
		$cids = implode( ',', $cid );
		$database->setQuery( "DELETE FROM #__export_categories WHERE id IN ($cids)" );
		if (!$database->query()) {
			echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>";
		}
	}
		$msg = 'Category(s): '. $names .' successfully removed';
mosRedirect( 'index2.php?option=com_export_content&task=categories', $msg );

}
/**************************************
Remove items from export table
**************************************/
function remove_items( $cid, $option ) {
	global $database;

	if (!is_array( $cid ) || count( $cid ) < 1) {
		echo "<script> alert('Select an item to delete'); window.history.go(-1);</script>";
		exit;
	}
	if (count( $cid )) {
		$cids = implode( ',', $cid );
		$database->setQuery( "DELETE FROM #__export_content WHERE id IN ($cids)" );
		if (!$database->query()) {
			echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>";
		}
	}
	$msg = 'Item(s): '. $names .' successfully removed';
mosRedirect( 'index2.php?option=com_export_content&task=content_items', $msg );

}
/**********************************
 Removes the static content items
***********************************/
function trash_static( &$cid, $option ) {
	global $database;

	$total = count( $cid );
	if ( $total < 1) {
		echo "<script> alert('Select an item to delete'); window.history.go(-1);</script>\n";
		exit;
	}

	$state = '-2';
	$ordering = '0';
	//seperate contentids
	$cids = implode( ',', $cid );
	$query = "UPDATE #__export_content"
	. "\n SET state = $state, ordering = $ordering"
	. "\n WHERE id IN ( $cids )"
	;
	$database->setQuery( $query );
	if ( !$database->query() ) {
		echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
		exit();
	}

    	// clean any existing cache files
	mosCache::cleanCache( 'com_content' );

	$msg = $total ." Static Item(s) have been removed";
		mosRedirect( 'index2.php?option=com_export_content&task=static_content',$msg);
}
/**************************************************
* Form for copying item(s) to a specific menu
***************************************************/
function copySectionSelect( $option, $cid, $section ) {
	global $database;
$cid 	= mosGetParam( $_REQUEST, 'cid', 'cid' );
		
  	$sids = implode( ',', $cid );
	$query = "SELECT title, id, name, scope"
    . "\n FROM #__export_sections"
	. "\n WHERE id IN ($sids)"
	;
	$database->setQuery( $query );
	$section = $database->loadObjectList();

	## query to list selected sections
	$cids = implode( ',', $cid );
	$query = "SELECT a.name, a.id "
	. "\n FROM #__export_categories AS a"
	. "\n WHERE a.section IN ( '$cids' )"
	;
	$database->setQuery( $query );
	$categories = $database->loadObjectList();
	
	if (!is_array( $cid ) || count( $cid ) < 1) {
		echo "<script> alert('Select an item to move'); window.history.go(-1);</script>\n";
		exit;
	}

	## query to list selected categories
	$cids = implode( ',', $cid );
	$query = "SELECT a.name, a.title, a.id "
	. "\n FROM #__export_categories AS a"
	. "\n WHERE a.section IN ( $cids )"
	;
	$database->setQuery( $query );
	$categories = $database->loadObjectList();
	$archive_items = mosGetParam( $_POST, 'archives' );
	if($archive_items=='0'){
	$get_state ='a.state > -1';	
	}else{
$get_state ='a.state > -2';
}
	## query to list items from categories
	$query = "SELECT a.title, a.state, a.id"
	. "\n FROM #__export_content AS a"
	. "\n WHERE a.sectionid IN ( $cids )"
	. "\n AND $get_state"
	. "\n ORDER BY a.sectionid, a.catid, a.title"
	;
	$database->setQuery( $query );
	$contents = $database->loadObjectList();

	HTML_export::copySectionSelect( $option, $cid, $categories, $contents, $section );
}
/**********************************************
Display form to insert categories and content items
**************************************************/
function copyCategorySelect( $option, $cid, $sectionOld ) {
	global $database, $mainframe;
	$db =& JFactory::getDBO();
	$redirect = mosGetParam( $_POST, 'section', 'content' );

	if (!is_array( $cid ) || count( $cid ) < 1) {
		echo "<script> alert('Select an item to move'); window.history.go(-1);</script>\n";
		exit;
	}

	## query to list selected categories
	$cids = implode( ',', $cid );
	$query = "SELECT a.name, a.title, a.section"
	. "\n FROM #__export_categories AS a"
	. "\n WHERE a.id IN ( $cids )"
	;
	$database->setQuery( $query );
	$items = $database->loadObjectList();
	$archive_items = mosGetParam( $_POST, 'archives' );
	if($archive_items=='0'){
	$get_state ='a.state > -1';	
	}else{
$get_state ='a.state > -2';
}
	## query to list items from categories
	$query = "SELECT a.title, a.state, a.id"
	. "\n FROM #__export_content AS a"
	. "\n WHERE a.catid IN ( $cids )"
	. "\n AND $get_state"
	//. "\n OR a.state != -1"
	. "\n ORDER BY a.catid, a.title"
	;
	$database->setQuery( $query );
	$contents = $database->loadObjectList();


	## query to choose section to move to
	$query = 'SELECT a.title AS text, a.id AS value'
	. ' FROM #__sections AS a'
	. ' WHERE a.published = 1'
	. ' ORDER BY a.name'
	;
	$database->setQuery( $query );
	$sections = $database->loadObjectList();

	// build the html select list
	$SectionList = JHTML::_('select.genericlist',   $sections, 'sectionmove', 'class="inputbox" size="10"', 'value', 'text', null );
	
	HTML_export::copyCategorySelect( $option, $cid, $SectionList, $items, $sectionOld, $contents, $redirect );
}
/***************************************
Save moved categories and content items
****************************************/
function copyCategorySave( $cid, $sectionOld) {
		global $database;
   global $mainframe;
	$sectionMove 	= mosGetParam( $_REQUEST, 'sectionmove', '' );
	$contentid 		= mosGetParam( $_REQUEST, 'item', '' );
	$total 			= count( $contentid  );

	$cids = implode( ',', $cid );
	$query = "SELECT id, name, title, image, image_position, description, published, ordering"
	. "\n FROM #__export_categories"
	. "\n WHERE id IN ( $cids )"
	;
	$database->setQuery( $query );
	$cat = $database->loadObjectList();
		foreach( $cat as $cats ) {
          $excat_id              = $cats->id;
          $title                 = decode_entities($cats->title);
          $name                  = decode_entities($cats->name);
          $image                 = decode_entities($cats->image);
          $cat_image_position    = $cats->image_position;
          $cat_description       = decode_entities($cats->description);
          $cat_published         = $cats->published;
          $cat_checked_out       = $cats->checked_out;
          $cat_checked_out_time  =$cats->checked_out_time;
          $cat_editor            = $cats->editor;
          $cat_ordering          = $cats->ordering ;
          $cat_access            = $cats->access;
          $cat_count             = $cats->count;
          $cat_params            = $cats->params;
//insert into new categories

	$category = new mosCategory ( $database );
	foreach( $cid as $id ) {
		$category->load( $id );
		$category->id 		       = NULL;
		$category->title 	       = $title;
		$category->name 	       = $name;
		$category->image           = $image;
		$category->section 	       = $sectionMove;
		$category->image_position  = $cat_image_position;
		$category->description     = $cat_description;
		$category->published       = '1';
			// order categories
	$order = array();
	$query = "SELECT COUNT(*)"
	. "\n FROM #__categories"
	. "\n WHERE section = '$sectionMove'"
	;
	$database->setQuery( $query );
	$max = intval( $database->loadResult() ) + 1;

	for ($i=1; $i < $max; $i++) {
		$category->ordering        = $i;
	}
}
		if (!$category->check()) {
			echo "<script> alert('".$category->getError()."'); window.history.go(-1); </script>\n";
			exit();
		}

		if (!$category->store()) {
			echo "<script> alert('".$category->getError()."'); window.history.go(-1); </script>\n";
			exit();
		}
		$category->checkin();
		// stores original catid
		$newcatids[]["old"] = $id;
		// pulls new catid
		$newcatids[]["new"] = $category->id;
	//}

	$query = "SELECT* FROM #__export_content"
	. "\n WHERE catid IN ($excat_id)"
	. "\n ORDER BY catid, title"
	;
	$database->setQuery( $query );
	$con = $database->loadObjectList();
	foreach($con as $cont){

          $item_title        = decode_entities($cont->title);
          $title_alias       = decode_entities($cont->title_alias);
          //$introtext         = decode_entities($cont->introtext);
          //$fulltext          = decode_entities($cont->fulltext);
              		$intros=  decode_entities($cont->introtext);
 $introtext = str_replace("#imageurl#", "$mosConfig_live_site", stripslashes($intros));
///////////////
	$fulltext 			= decode_entities($cont->fulltext);
		$fulltext = str_replace("#imageurl#", "$mosConfig_live_site", stripslashes($fulltext));
          $state             = $cont->state;
         // $images            = decode_entities($cont->images);
          $exordering        = $cont->ordering;
          $attribs           = $cont->attribs;
          $metakey           = decode_entities($cont->metakey);
          $metadesc          = decode_entities($cont->metadesc);
          $access            = $cont->access;

	$content = new mosContent ( $database );
	foreach( $contentid as $id) {
		 $content->load( $id );
		 $content->id 	      	 = NULL;
		 $content->title     	 = $item_title;
		 $content->title_alias 	 = '';
		 $content->alias 	     = $title_alias;
		 $content->introtext     = $introtext;
		 $content->fulltext      = $fulltext;
		 $content->images        = '';
		 $content->state         = $state;
         $content->attribs       = $attribs;
         $content->ordering      = $exordering;
         $content->metakey       = $metakey;
         $content->metadesc      = $metadesc;
         $content->access        = $access;
		 $content->sectionid     = $sectionMove;
		 $content->hits 		 = 0;
		 $content->catid         =$category->id;
         $content->metadata      ="robots=\nauthor=";
	 }

		foreach( $newcatids as $newcatid ) {
			if ( $content->catid == $newcatid["old"] ) {
				$content->catid = $newcatid["new"];
			}
		}

		if (!$content->check()) {
			echo "<script> alert('".$content->getError()."'); window.history.go(-1); </script>\n";
			exit();
		}

		if (!$content->store()) {
			echo "<script> alert('".$content->getError()."'); window.history.go(-1); </script>\n";
			exit();
		}
		$content->checkin();

 }
}
	$sectionNew = new mosSection ( $database );
	$sectionNew->load( $sectionMove );
	$msg = $total .' Categories copied to '. $sectionNew->name;
	mosRedirect( 'index2.php?option=com_export_content&task=categories', $msg);

}
/****************************************************
* Form for copying item(s)
*****************************************************/
function copyItemSelect( $cid, $sectionid, $option ) {
	global $database;

	if (!is_array( $cid ) || count( $cid ) < 1) {
		echo "<script> alert('Select an item to move'); window.history.go(-1);</script>\n";
		exit;
	}

	//seperate contentids
	$cids = implode( ',', $cid );
	## Content Items query
	$query = "SELECT a.title"
	. "\n FROM #__export_content AS a"
	. "\n WHERE ( a.id IN ( $cids ) )"
	. "\n ORDER BY a.title"
	;
	$database->setQuery( $query );
	$items = $database->loadObjectList();

	
				## Section & Category query
		$query = 'SELECT CONCAT_WS(",",s.id,c.id) AS `value`, CONCAT_WS(" // ", s.title, c.title) AS `text`' .
				' FROM #__sections AS s' .
				' INNER JOIN #__categories AS c ON c.section = s.id' .
				' WHERE s.scope = "content"' .
				' ORDER BY s.title, c.title';
		$database->setQuery($query);
		$rows = $database->loadObjectList();
		// build the html select list
$sectCatList = JHTML::_('select.genericlist',  $rows, 'sectcat', 'class="inputbox" size="10"', 'value', 'text', NULL);		
		

	HTML_export::copyItemSelect( $option, $cid, $sectCatList, $sectionid, $items );
}

/******************************************************
 Saves inserted static items
******************************************************/
function copysave_static( $id, $sectionid, $option ) {
	global $database;

  $ids 		= mosGetParam( $_REQUEST, 'id', '' );
  $cids = implode( ',', $id );
		$row = new mosContent( $database );

		$query = "SELECT * FROM #__export_content AS c"
    . "\n WHERE ( c.id IN ( $cids ) )"
	. "\n AND c.sectionid = '0'"
	. "\n AND c.catid = '0'"
	. "\n AND c.state != '-2'"
    ;
    
		$database->setQuery( $query );
		$items = $database->loadObjectList();
foreach($items as $item){
		$row->id 				= NULL;
		$row->sectionid 		= 0;
		$row->catid 			= 0;
		$row->hits 				= '0';
		$row->ordering			= '0';
		$row->title 			= decode_entities($item->title);
		$row->title_alias 		= '';
		$row->alias 		    = decode_entities($item->title_alias);
		
		$intros 		        = decode_entities($item->introtext);
		$full 		            = decode_entities($item->fulltext);
$row->introtext= str_replace("#imageurl#", "$mosConfig_live_site", stripslashes($intros));
		
$row->fulltext   = str_replace("#imageurl#", "$mosConfig_live_site", stripslashes($full));

		$row->state 			= $item->state;
		$row->mask 				= $item->mask;
		$row->created 			= $item->created;
		$row->created_by 		= $item->created_by;
		$row->created_by_alias 	= $item->created_by_alias;
		$row->modified 			= $item->modified;
		$row->modified_by 		= $item->modified_by;
		$row->checked_out 		= $item->checked_out;
		$row->checked_out_time 	= $item->checked_out_time;
		$row->publish_up 		= $item->publish_up;
		$row->publish_down 		= $item->publish_down;
		$row->images 			='';
		$row->attribs 			= $item->attribs;
		$row->version 			= $item->parentid;
		$row->parentid 			= $item->parentid;
		$row->metakey 			= decode_entities($item->metakey);
		$row->metadesc 			= decode_entities($item->metadesc);
		$row->access 			= $item->access;
	    $row->metadata          ="robots=\nauthor=";


		
		if (!$row->check()) {
			echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
			exit();
		}
		if (!$row->store()) {
			echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
			exit();
		}
        }
	
	//Static Item(s) successfully inserted
   $msg =	_STATIC_INSERTED;

	mosRedirect( 'index2.php?option=com_export_content&task=static_content',$msg);
	}

/******************************************************
 saves Copies of items
******************************************************/
function copyItemSave( $cid, $sectionid, $option ) {
	global $database,$mosConfig_live_site;

	$sectcat = mosGetParam( $_POST, 'sectcat', '' );
	//seperate sections and categories from selection
	$sectcat = explode( ',', $sectcat );
	list( $newsect, $newcat ) = $sectcat;

	if ( !$newsect && !$newcat ) {
		mosRedirect( 'index.php?option=com_content&sectionid='. $sectionid .'&mosmsg=An error has occurred' );
	}

	// find section name
	$query = "SELECT a.name"
	. "\n FROM #__sections AS a"
	. "\n WHERE a.id = $newsect"
	;
	$database->setQuery( $query );
	$section = $database->loadResult();

	// find category name
	$query = "SELECT a.name"
	. "\n FROM #__categories AS a"
	. "\n WHERE a.id = $newcat"
	;
	$database->setQuery( $query );
	$category = $database->loadResult();

	$total = count( $cid );
	for ( $i = 0; $i < $total; $i++ ) {
		$row = new mosContent( $database );

		// main query
		$query = "SELECT a.*"
		. "\n FROM #__export_content AS a"
		. "\n WHERE a.id = ". $cid[$i] .""
		;
		$database->setQuery( $query );
		$item = $database->loadObjectList();

		// values loaded into array set for store
		$row->id 				= NULL;
		$row->sectionid 		= $newsect;
		$row->catid 			= $newcat;
		$row->hits 				= '0';
		$row->ordering			= '0';
		$row->title 			= decode_entities($item[0]->title);
		//changed to alias
		$row->title_alias 		= '';
		//assign title_alias to alias
		$row->alias 		    = decode_entities($item[0]->title_alias);
		// change #image# URL to $mosConfig_live_site
	$intros=  decode_entities($item[0]->introtext);
 $row->introtext = str_replace("#imageurl#", "$mosConfig_live_site", stripslashes($intros));
	// change #image# URL to $mosConfig_live_site
	$fulltext 			= decode_entities(stripslashes($item[0]->fulltext));
		$row->fulltext = str_replace("#imageurl#", "$mosConfig_live_site", stripslashes($fulltext));
		$row->state 			= $item[0]->state;
		$row->mask 				= $item[0]->mask;
		$row->created 			= $item[0]->created;
		$row->created_by 		= $item[0]->created_by;
		$row->created_by_alias 	= decode_entities($item[0]->created_by_alias);
		$row->modified 			= $item[0]->modified;
		$row->modified_by 		= $item[0]->modified_by;
		$row->checked_out 		= $item[0]->checked_out;
		$row->checked_out_time 	= $item[0]->checked_out_time;
		$row->publish_up 		= $item[0]->publish_up;
		$row->publish_down 		= $item[0]->publish_down;
		//image attrib not needed for 1.5 series
	//	$row->images 			= decode_entities($item[0]->images);
		$row->images 			='';
		$row->attribs 			= $item[0]->attribs;
		$row->version 			= $item[0]->parentid;
		$row->parentid 			= $item[0]->parentid;
		$row->metakey 			= decode_entities($item[0]->metakey);
		$row->metadesc 			= decode_entities($item[0]->metadesc);
		$row->access 			= $item[0]->access;
		$row->metadata          ="robots=\nauthor=";

		if (!$row->check()) {
			echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
			exit();
		}
		if (!$row->store()) {
			echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
			exit();
		}
		$row->updateOrder( "catid='". $row->catid ."' AND state >= 0" );
	}

	$msg = $total. ' Item(s) successfully copied to Section: '. $section .', Category: '. $category;
	mosRedirect( 'index2.php?option=com_export_content&task=content_items',$msg);

}
/************************************
Save sections to site sections table
************************************/
function save_sections( $option ) {
	global $database;

	$row = new Export_content( $database );
	if (!$row->bind( $_POST )) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}

	// save params
	$params = mosGetParam( $_POST, 'params', '' );
	if (is_array( $params )) {
		$txt = array();
		foreach ( $params as $k=>$v) {
			$txt[] = "$k=$v";
		}
		$row->params = implode( "\n", $txt );
	}

	// pre-save checks
	if (!$row->check()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}

	// save the changes
	if (!$row->store()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	$row->checkin();
	$row->updateOrder();
	if ($row->default_con) {
		$query = "UPDATE #__contact_details"//TODO CHANGE
		. "\n SET default_con = 0"
		. "\n WHERE id <> $row->id"
		. "\n AND default_con = 1"
		;
		$database->setQuery( $query );
		$database->query();
	}

	mosRedirect( "index2.php?option=$option" );
}
/*******************************************
Save categories to site categories table
********************************************/
function save_categories( $task ) {
	global $database;

	$menu 		= mosGetParam( $_POST, 'menu', 'mainmenu' );
	$menuid		= mosGetParam( $_POST, 'menuid', 0 );
	$redirect 	= mosGetParam( $_POST, 'redirect', '' );
	$oldtitle 	= mosGetParam( $_POST, 'oldtitle', null );

	$row = new mosExport_Category( $database );
	if (!$row->bind( $_POST )) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	if (!$row->check()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}

	if (!$row->store()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	$row->checkin();
	$row->updateOrder( "section = '$row->section'" );

	if ( $oldtitle ) {
		if ($oldtitle != $row->title) {
			$query = "UPDATE #__menu"
			. "\n SET name = '$row->title'"
			. "\n WHERE name = '$oldtitle'"
			. "\n AND type = 'content_category'"
			;
			$database->setQuery( $query );
			$database->query();
		}
	}

	// Update Section Count
	if ($row->section != 'com_contact_details' &&
		$row->section != 'com_newsfeeds' &&
		$row->section != 'com_weblinks') {
		$query = "UPDATE #__sections SET count=count+1"
		. "\n WHERE id = '$row->section'"
		;
		$database->setQuery( $query );
	}

	if (!$database->query()) {
		echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
		exit();
	}

	switch ( $task ) {
		case 'go2menu':
			mosRedirect( 'index2.php?option=com_menus&menutype='. $menu );
			break;

		case 'go2menuitem':
			mosRedirect( 'index2.php?option=com_menus&menutype='. $menu .'&task=edit&hidemainmenu=1&id='. $menuid );
			break;

		case 'menulink':
			menuLink( $row->id );
			break;

		case 'apply':
			$msg = 'Changes to Category saved'.$row->section;
			mosRedirect( 'index2.php?option=com_categories&section='. $redirect .'&task=editA&hidemainmenu=1&id='. $row->id, $msg );
			break;

		case 'save':
		default:
			//Category saved
		$msg =	_CATEGORY_SAVED;
			mosRedirect( 'index2.php?option=com_export_content&task=categories');

			break;
	}
}
/*********************************************
* Saves the record on an edit form submit
* @param database A database connector object
*********************************************/

function save_items( $sectionid, $task ) {
	global $database, $my;
	/////////////////////////////////////////////////////////////////////
	$row =  new mosExport_Content( $database );
		$details	= JRequest::getVar( 'details', array(), 'post', 'array');
			$row->state	= JRequest::getVar( 'state', 0, '', 'int' );
		$params		= JRequest::getVar( 'params', null, 'post', 'array' );

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
		$metadata = JRequest::getVar( 'meta', null, 'post', 'array');
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
	
	if (!$row->bind( $_POST )) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>";
		exit();
	}

//	$row->date = date( "Y-m-d H:i:s" );
	if (!$row->check()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>";
		exit();
	}
	if (!$row->store()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>";
		exit();
	}
	$row->checkin();
	$row->updateOrder( "catid='$row->catid'" );

	mosRedirect( "index2.php?option=com_export_content&task=content_items" );
}

/*****************************
Content items
**********************************/
   function changeContent( $cid=null, $state=0, $option ) {
	global $database, $my, $task;

	if (count( $cid ) < 1) {
		$action = $state == 1 ? 'publish' : ($state == -1 ? 'archive' : 'unpublish');
		echo "<script> alert('Select an item to $action'); window.history.go(-1);</script>\n";
		exit;
	}

	$total = count ( $cid );
	$cids = implode( ',', $cid );

	$query = "UPDATE #__export_content"
	. "\n SET state = $state"
	. "\n WHERE id IN ( $cids ) AND ( checked_out = 0 OR (checked_out = $my->id ) )"
	;
	$database->setQuery( $query );
	if (!$database->query()) {
		echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
		exit();
	}

	if (count( $cid ) == 1) {
		$row = new mosExport_Content( $database );
		$row->checkin( $cid[0] );
	}

	switch ( $state ) {
		case -1:
			$msg = $total .' Item(s) successfully Archived';
			break;

		case 1:
			$msg = $total .' Item(s) successfully Published';
			break;

		case 0:
		default:
			if ( $task == 'unarchive' ) {
				$msg = $total .' Item(s) successfully Unarchived';
			} else {
				$msg = $total .' Item(s) successfully Unpublished';
			}
			break;
	}

	$redirect 	= mosGetParam( $_POST, 'redirect', $row->sectionid );
	$rtask 		= mosGetParam( $_POST, 'returntask', '' );
	if ( $rtask ) {
		$rtask = '&task='. $rtask;
	} else {
		$rtask = '';
	}
	mosRedirect( 'index2.php?option=com_export_content&task=content_items',$msg );

}
/**************************
change static
*************************/
   function changeStatic( $cid=null, $state=0, $option ) {
	global $database, $my, $task;

	if (count( $cid ) < 1) {
		$action = $state == 1 ? 'publish' : ($state == -1 ? 'archive' : 'unpublish');
		echo "<script> alert('Select an item to $action'); window.history.go(-1);</script>\n";
		exit;
	}

	$total = count ( $cid );
	$cids = implode( ',', $cid );

	$query = "UPDATE #__export_content"
	. "\n SET state = $state"
	. "\n WHERE id IN ( $cids ) AND ( checked_out = 0 OR (checked_out = $my->id ) )"
	;
	$database->setQuery( $query );
	if (!$database->query()) {
		echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
		exit();
	}

	if (count( $cid ) == 1) {
		$row = new mosExport_Content( $database );
		$row->checkin( $cid[0] );
	}

	switch ( $state ) {
		case -1:
			$msg = $total .' Item(s) successfully Archived';
			break;

		case 1:
			$msg = $total .' Item(s) successfully Published';
			break;

		case 0:
		default:
			if ( $task == 'unarchive' ) {
				$msg = $total .' Item(s) successfully Unarchived';
			} else {
				$msg = $total .' Item(s) successfully Unpublished';
			}
			break;
	}

	$redirect 	= mosGetParam( $_POST, 'redirect', $row->sectionid );
	$rtask 		= mosGetParam( $_POST, 'returntask', '' );
	if ( $rtask ) {
		$rtask = '&task='. $rtask;
	} else {
		$rtask = '';
	}
	mosRedirect( 'index2.php?option=com_export_content&task=static_content',$msg );

}
/*******************************
Static content
********************************/
function viewStatic( $option ) {
	global $database, $mainframe, $mosConfig_list_limit;

	$filter_authorid 	= intval( $mainframe->getUserStateFromRequest( "filter_authorid{$option}", 'filter_authorid', 0 ) );
	$order 				= $mainframe->getUserStateFromRequest( "zorder", 'zorder', 'c.ordering DESC' );
	$limit 				= intval( $mainframe->getUserStateFromRequest( "viewlistlimit", 'limit', $mosConfig_list_limit ) );
	$limitstart 		= intval( $mainframe->getUserStateFromRequest( "view{$option}limitstart", 'limitstart', 0 ) );
	$search 			= $mainframe->getUserStateFromRequest( "search{$option}", 'search', '' );
	$search 			= $database->getEscaped( trim( strtolower( $search ) ) );

	// used by filter
	if ( $search ) {
		$search_query = "\n AND ( LOWER( c.title ) LIKE '%$search%' OR LOWER( c.title_alias ) LIKE '%$search%' )";
	} else {
		$search_query = '';
	}

	$filter = '';
	if ( $filter_authorid > 0 ) {
		$filter = "\n AND c.created_by = '$filter_authorid'";
	}

	// get the total number of records
	$query = "SELECT count(*)"
	. "\n FROM #__export_content AS c"
	. "\n WHERE c.sectionid = '0'"
	. "\n AND c.catid = '0'"
	. "\n AND c.state != '-2'"
	. $filter
	;
	$database->setQuery( $query );
	$total = $database->loadResult();
	require_once( $GLOBALS['mosConfig_absolute_path'] . '/administrator/includes/pageNavigation.php' );
	$pageNav = new mosPageNav( $total, $limitstart, $limit );

	$query = "SELECT c.*, g.name AS groupname, u.name AS editor, z.name AS creator"
	. "\n FROM #__export_content AS c"
	. "\n LEFT JOIN #__groups AS g ON g.id = c.access"
	. "\n LEFT JOIN #__users AS u ON u.id = c.checked_out"
	. "\n LEFT JOIN #__users AS z ON z.id = c.created_by"
	. "\n WHERE c.sectionid = 0"
	. "\n AND c.catid = 0"
	. "\n AND c.state != -2"
	. $search_query
	. $filter
	. "\n ORDER BY ". $order
	. "\n LIMIT $pageNav->limitstart,$pageNav->limit"
	;
	$database->setQuery( $query );
	$rows = $database->loadObjectList();

	if ($database->getErrorNum()) {
		echo $database->stderr();
		return false;
	}

	$count = count( $rows );
	for( $i = 0; $i < $count; $i++ ) {
		$query = "SELECT COUNT( id )"
		. "\n FROM #__menu"
		. "\n WHERE componentid = ". $rows[$i]->id
		. "\n AND type = 'content_typed'"
		. "\n AND published != -2"
		;
		$database->setQuery( $query );
		$rows[$i]->links = $database->loadResult();
	}
//	$ordering[] = mosHTML::makeOption( 'c.created_by_alias ASC', 'Author alias asc' );
$ordering[] = mosHTML::makeOption( 'c.created_by_alias DESC', 'Author alias desc' );
    $ordering[] = mosHTML::makeOption( 'c.ordering ASC', 'Ordering asc' );
	$ordering[] = mosHTML::makeOption( 'c.ordering DESC', 'Ordering desc' );
	$ordering[] = mosHTML::makeOption( 'c.id ASC', 'ID asc' );
	$ordering[] = mosHTML::makeOption( 'c.id DESC', 'ID desc' );
	$ordering[] = mosHTML::makeOption( 'c.title ASC', 'Title asc' );
	$ordering[] = mosHTML::makeOption( 'c.title DESC', 'Title desc' );
	$ordering[] = mosHTML::makeOption( 'c.created ASC', 'Date asc' );
	$ordering[] = mosHTML::makeOption( 'c.created DESC', 'Date desc' );
	$ordering[] = mosHTML::makeOption( 'z.name ASC', 'Author asc' );
	$ordering[] = mosHTML::makeOption( 'z.name DESC', 'Author desc' );
	$ordering[] = mosHTML::makeOption( 'c.state ASC', 'Published asc' );
	$ordering[] = mosHTML::makeOption( 'c.state DESC', 'Published desc' );
	$ordering[] = mosHTML::makeOption( 'c.access ASC', 'Access asc' );
	$ordering[] = mosHTML::makeOption( 'c.access DESC', 'Access desc' );
	$javascript = 'onchange="document.adminForm.submit();"';
	$lists['order'] = mosHTML::selectList( $ordering, 'zorder', 'class="inputbox" size="1"'. $javascript, 'value', 'text', $order );

	// get list of Authors for dropdown filter
	$query = "SELECT c.created_by AS value, u.name AS text"
	. "\n FROM #__export_content AS c"
	. "\n LEFT JOIN #__users AS u ON u.id = c.created_by"
	. "\n WHERE c.sectionid = 0"
	. "\n GROUP BY u.name"
	. "\n ORDER BY u.name"
	;
	$authors[] = mosHTML::makeOption( '0','- '.JText::_('Select Author').' -' );
	$database->setQuery( $query );
	$authors = array_merge( $authors, $database->loadObjectList() );
	$lists['authorid']	= mosHTML::selectList( $authors, 'filter_authorid', 'class="inputbox" size="1" onchange="document.adminForm.submit( );"', 'value', 'text', $filter_authorid );

	$created_by_alias = array();
$created_by_alias[] = mosHTML::makeOption( '0', '- '.JText::_('Select Author').' -' );
$database->setQuery( "SELECT id AS value, IFNULL(NULL,created_by_alias) AS text FROM #__export_content" );
$created_by_alias = array_merge( $created_by_alias, $database->loadObjectList() );

$lists['created_by_alias'] = mosHTML::selectList( $created_by_alias, 'created_by_alias','class="inputbox" size="1"  onchange="document.adminForm.submit( );"', 'value', 'text', '' );
//////////////////////////////////
	HTML_export::showStaticContent( $rows, $pageNav, $option, $search, $lists );
}
/***************************
Edit static content items
****************************/
function edit_static( $uid, $option ){
	global $database, $my, $mainframe;
	global $mosConfig_absolute_path, $mosConfig_live_site, $mosConfig_offset;

	$row = new mosExport_Content( $database );
	$row->load( $uid );

	$lists 		= array();
	$nullDate 	= $database->getNullDate();

	if ($uid) {
		// fail if checked out not by 'me'
		if ($row->isCheckedOut( $my->id )) {
			mosErrorAlert( "The module ".$row->title." is currently being edited by another administrator" );
		}

		$row->checkout( $my->id );

		if (trim( $row->images )) {
			$row->images = explode( "\n", $row->images );
		} else {
			$row->images = array();
		}
$now = date( 'Y-m-d H:i', time() );
DEFINE( '_CURRENT_SERVER_TIME', $now );
DEFINE( '_CURRENT_SERVER_TIME_FORMAT', '%Y-%m-%d %H:%M:%S' );
$row->created 		= mosFormatDate( $row->created, _CURRENT_SERVER_TIME_FORMAT );
$row->modified 		= $row->modified == $nullDate ? '' : mosFormatDate( $row->modified, _CURRENT_SERVER_TIME_FORMAT );
$row->publish_up 	= mosFormatDate( $row->publish_up, _CURRENT_SERVER_TIME_FORMAT );

		if (trim( $row->publish_down ) == $nullDate || trim( $row->publish_down ) == '' || trim( $row->publish_down ) == '-' ) {
			$row->publish_down = 'Never';
		}
		$row->publish_down 	= mosFormatDate( $row->publish_down, _CURRENT_SERVER_TIME_FORMAT );

		$query = "SELECT name"
		. "\n FROM #__users"
		. "\n WHERE id = $row->created_by"
		;
		$database->setQuery( $query );
		$row->creator = $database->loadResult();

		// test to reduce unneeded query
		if ( $row->created_by == $row->modified_by ) {
			$row->modifier = $row->creator;
		} else {
			$query = "SELECT name"
			. "\n FROM #__users"
			. "\n WHERE id = $row->modified_by"
			;
			$database->setQuery( $query );
			$row->modifier = $database->loadResult();
		}

		// get list of links to this item
		$and 	= "\n AND componentid = ". $row->id;
		$menus 	= mosAdminMenus::Links2Menu( 'export_content', $and );
	} else {
		// initialise values for a new item
		$row->version 		= 0;
		$row->state 		= 1;
		$row->images 		= array();
		$row->publish_up 	= date( 'Y-m-d H:i:s', time() + ( $mosConfig_offset * 60 * 60 ) );
		$row->publish_down 	= 'Never';
		$row->sectionid 	= 0;
		$row->catid 		= 0;
		$row->creator 		= '';
		$row->modified 		= $nullDate;
		$row->modifier 		= '';
		$row->ordering 		= 0;
		$menus = array();
	}

	// calls function to read image from directory
	$pathA 		= $mosConfig_absolute_path .'/images/stories';
	$pathL 		= $mosConfig_live_site .'/images/stories';
	$images 	= array();
	$folders 	= array();
	$folders[] 	= mosHTML::makeOption( '/' );
	mosAdminMenus::ReadImages( $pathA, '/', $folders, $images );
	// list of folders in images/stories/
	$lists['folders'] 		= mosAdminMenus::GetImageFolders( $folders, $pathL );
	// list of images in specfic folder in images/stories/
	$lists['imagefiles']	= mosAdminMenus::GetImages( $images, $pathL );
	// list of saved images
	$lists['imagelist'] 	= mosAdminMenus::GetSavedImages( $row, $pathL );

	// build list of users
	$active = ( intval( $row->created_by ) ? intval( $row->created_by ) : $my->id );
	$lists['created_by'] 	= mosAdminMenus::UserSelect( 'created_by', $active );
	// build the html select list for the group access
	$lists['access'] 		= mosAdminMenus::Access( $row );
	// build the html select list for menu selection
	$lists['menuselect']	= mosAdminMenus::MenuSelect( );
	// build the select list for the image positions
	$lists['_align'] 		= mosAdminMenus::Positions( '_align' );
	// build the select list for the image caption alignment
	$lists['_caption_align'] 	= mosAdminMenus::Positions( '_caption_align' );
	// build the select list for the image caption position
	$pos[] = mosHTML::makeOption( 'bottom', _CMN_BOTTOM );
	$pos[] = mosHTML::makeOption( 'top', _CMN_TOP );
	$lists['_caption_position'] = mosHTML::selectList( $pos, '_caption_position', 'class="inputbox" size="1"', 'value', 'text' );

	// get params definitions
	$params = new mosParameters( $row->attribs, $mainframe->getPath( 'com_xml', 'com_export_content' ), 'component' );

	HTML_export::edit_static( $row, $images, $lists, $params, $option, $menus );
}
/*****************************************
* Saves Static content items
********************************************/
function save_static( $option, $task ) {
	global $database, $my, $mosConfig_offset;
	$nullDate 	= $database->getNullDate();
	$menu 		= strval( mosGetParam( $_POST, 'menu', 'mainmenu' ) );
	$menuid		= intval( mosGetParam( $_POST, 'menuid', 0 ) );

	$row = new mosExport_Content( $database );
		$details	= JRequest::getVar( 'details', array(), 'post', 'array');
			$row->state	= JRequest::getVar( 'state', 0, '', 'int' );
			//$row->mask	= JRequest::getVar( 'mask', 0, '', 'int' );
		$params		= JRequest::getVar( 'params', null, 'post', 'array' );

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
		$metadata = JRequest::getVar( 'meta', null, 'post', 'array');
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
	if (!$row->bind( $_POST )) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}

	if ($row->id) {
		$row->modified 		= date( 'Y-m-d H:i:s' );
		$row->modified_by 	= $my->id;
	}

	$row->created_by 	= $row->created_by ? $row->created_by : $my->id;

	if ($row->created && strlen(trim( $row->created )) <= 10) {
		$row->created 	.= ' 00:00:00';
	}
	$row->created 		= $row->created ? mosFormatDate( $row->created, _CURRENT_SERVER_TIME_FORMAT, -$mosConfig_offset ) : date( 'Y-m-d H:i:s' );

	if (strlen(trim( $row->publish_up )) <= 10) {
		$row->publish_up .= ' 00:00:00';
	}
	$row->publish_up = mosFormatDate($row->publish_up, _CURRENT_SERVER_TIME_FORMAT, -$mosConfig_offset );

	if (trim( $row->publish_down ) == 'Never' || trim( $row->publish_down ) == '') {
		$row->publish_down = $nullDate;
	} else {
		if (strlen(trim( $row->publish_down )) <= 10) {
			$row->publish_down .= ' 00:00:00';
		}
		$row->publish_down = mosFormatDate( $row->publish_down, _CURRENT_SERVER_TIME_FORMAT, -$mosConfig_offset );
	}

	// code cleaner for xhtml transitional compliance
	$row->introtext = str_replace( '<br>', '<br />', $row->introtext );

	$row->title = ampReplace( $row->title );

	if (!$row->check()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	if (!$row->store()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	$row->checkin();

	// clean any existing cache files
	mosCache::cleanCache( 'com_export_content' );

	switch ( $task ) {
		case 'go2menu':
			mosRedirect( 'index2.php?option=com_menus&menutype='. $menu );
			break;

		case 'go2menuitem':
			mosRedirect( 'index2.php?option=com_menus&menutype='. $menu .'&task=edit&hidemainmenu=1&id='. $menuid );
			break;

		case 'menulink':
			menuLink( $option, $row->id );
			break;

		case 'resethits':
			resethits( $option, $row->id );
			break;

		case 'save_static':
			//Static Content Item saved
		$msg =	_STATIC_SAVED;
			mosRedirect( 'index2.php?option=com_export_content&task=static_content', $msg );
			break;

		case 'apply_static':
		default:
			//Changes to static Content Item saved
			$msg =	_STATIC_APPLY;
			mosRedirect( 'index2.php?option=com_export_content&task=editA_static&hidemainmenu=1&id='. $row->id, $msg );
			break;
	}
    }
 /********************************************
* Cancels an edit operation on static items
* @param database A database connector object
*********************************************/
function cancelStatic($option) {
	global $database;

	$row = new mosExport_Content( $database );
	$row->bind( $_POST );
	$row->checkin();
	mosRedirect( 'index2.php?option=com_export_content&task=static_content' );
}
/***********************************************
* Cancels an edit operation on content item
* @param database A database connector object
***********************************************/
function cancel_item($option) {
	global $database;
    $row = new mosExport_Content( $database );
	$row->bind( $_POST );
	$row->checkin();
	mosRedirect( 'index2.php?option=com_export_content&task=content_items' );
}
/***********************************************
* Compiles information to add or edit the record
* @param database A database connector object
* @param integer The unique id of the record to edit (0 if new)
*************************************************/
function editContent_item( $uid=0, $sectionid=0, $option ) {
 //////////////////////////////////
 global $mainframe;
$edit=$uid;
		// Initialize variables
		$db				= & JFactory::getDBO();
		$user			= & JFactory::getUser();


 //////////////////////////////////
	global $database, $my, $mainframe;
	global $mosConfig_absolute_path, $mosConfig_live_site, $mosConfig_offset;

	$redirect = strval( mosGetParam( $_POST, 'redirect', '' ) );
	$nullDate = $database->getNullDate();

	if ( !$redirect ) {
		$redirect = $sectionid;
	}

	// load the row from the db table
	$row = new mosExport_Content( $database );
	$row->load( $uid );

	if ($uid) {
		$sectionid = $row->sectionid;
		if ($row->state < 0) {
			mosRedirect( 'index2.php?option=com_content&sectionid='. $row->sectionid, 'You cannot edit an archived item' );
		}
	}

	// fail if checked out not by 'me'
	if ($row->checked_out && $row->checked_out != $my->id) {
		mosRedirect( 'index2.php?option=com_export_content', 'The module '. $row->title .' is currently being edited by another administrator' );
	}

	$selected_folders = NULL;
	if ($uid) {
		$row->checkout( $my->id );

		if (trim( $row->images )) {
			$row->images = explode( "\n", $row->images );
		} else {
			$row->images = array();
		}
get_param_times();
 		$row->created 		= mosFormatDate( $row->created, _CURRENT_SERVER_TIME_FORMAT );
		$row->modified 		= $row->modified == $nullDate ? '' : mosFormatDate( $row->modified, _CURRENT_SERVER_TIME_FORMAT );
		$row->publish_up 	= mosFormatDate( $row->publish_up, _CURRENT_SERVER_TIME_FORMAT );

 		if (trim( $row->publish_down ) == $nullDate || trim( $row->publish_down ) == '' || trim( $row->publish_down ) == '-' ) {
			$row->publish_down = 'Never';
		}
		$row->publish_down 	= mosFormatDate( $row->publish_down, _CURRENT_SERVER_TIME_FORMAT );

		$query = "SELECT name"
		. "\n FROM #__users"
		. "\n WHERE id = $row->created_by"
		;
		$database->setQuery( $query );
		$row->creator = $database->loadResult();

		// test to reduce unneeded query
		if ( $row->created_by == $row->modified_by ) {
			$row->modifier = $row->creator;
		} else {
			$query = "SELECT name"
			. "\n FROM #__users"
			. "\n WHERE id = $row->modified_by"
			;
			$database->setQuery( $query );
			$row->modifier = $database->loadResult();
		}

		$query = "SELECT content_id"
		. "\n FROM #__content_frontpage"
		. "\n WHERE content_id = $row->id"
		;
		$database->setQuery( $query );
		$row->frontpage = $database->loadResult();

		// get list of links to this item
		$and = "\n AND componentid = $row->id";
		$menus = mosAdminMenus::Links2Menu( 'content_item_link', $and );
	} else {
		if ( !$sectionid && @$_POST['filter_sectionid'] ) {
			$sectionid = $_POST['filter_sectionid'];
		}
		if ( @$_POST['catid'] ) {
			$row->catid 	= $_POST['catid'];
			$category = new mosExport_Category( $database );
			$category->load( $_POST['catid'] );
			$sectionid = $category->section;
		} else {
			$row->catid 	= 0;
		}

		$row->sectionid 	= $sectionid;
		$row->version 		= 0;
		$row->state 		= 1;
		$row->ordering 		= 0;
		$row->images 		= array();
		$row->publish_up 	= date( 'Y-m-d H:i:s', time() + ( $mosConfig_offset * 60 * 60 ) );
		$row->publish_down 	= 'Never';
		$row->creator 		= '';
		$row->modified 		= $nullDate;
		$row->modifier 		= '';
		$row->frontpage 	= 0;
		$menus = array();
	}

	$javascript = "onchange=\"changeDynaList( 'catid', sectioncategories, document.adminForm.sectionid.options[document.adminForm.sectionid.selectedIndex].value, 0, 0);\"";

	$query = "SELECT s.id, s.title"
	. "\n FROM #__export_sections AS s"
	. "\n ORDER BY s.ordering";
	$database->setQuery( $query );
	if ( $sectionid == 0 ) {
		$sections[] = mosHTML::makeOption( '-1', 'Select Section', 'id', 'title' );
		$sections = array_merge( $sections, $database->loadObjectList() );
		$lists['sectionid'] = mosHTML::selectList( $sections, 'sectionid', 'class="inputbox" size="1" '. $javascript, 'id', 'title' );
	} else {
		$sections = $database->loadObjectList();
		$lists['sectionid'] = mosHTML::selectList( $sections, 'sectionid', 'class="inputbox" size="1" '. $javascript, 'id', 'title', intval( $row->sectionid ) );
	}

	$contentSection = '';
	foreach($sections as $section) {
		$section_list[] = $section->id;
		// get the type name - which is a special category
		if ($row->sectionid){
			if ( $section->id == $row->sectionid ) {
				$contentSection = $section->title;
			}
		} else {
			if ( $section->id == $sectionid ) {
				$contentSection = $section->title;
			}
		}
	}

	$sectioncategories 			= array();
	$sectioncategories[-1] 		= array();
	$sectioncategories[-1][] 	= mosHTML::makeOption( '-1', 'Select Category', 'id', 'name' );
	$section_list 				= implode( '\', \'', $section_list );

	$query = "SELECT id, name, title, section"
	. "\n FROM #__export_categories"
	. "\n WHERE section IN ( '$section_list' )"
	. "\n ORDER BY ordering"
	;
	$database->setQuery( $query );
	$cat_list = $database->loadObjectList();
	foreach($sections as $section) {
		$sectioncategories[$section->id] = array();
		$rows2 = array();
		foreach($cat_list as $cat) {
			if ($cat->section == $section->id) {
				$rows2[] = $cat;
			}
		}
		foreach($rows2 as $row2) {
			$sectioncategories[$section->id][] = mosHTML::makeOption( $row2->id, $row2->title, 'id', 'name' );
		}
	}

 	// get list of categories
  	if ( !$row->catid && !$row->sectionid ) {
 		$categories[] 		= mosHTML::makeOption( '-1', 'Select Category', 'id', 'title' );
 		$lists['catid'] 	= mosHTML::selectList( $categories, 'catid', 'class="inputbox" size="1"', 'id', 'title' );
  	} else {
		if ( $sectionid == 0 ) {
			//$where = "\n WHERE section NOT LIKE '%com_%'";
			foreach($cat_list as $cat) {
				$categoriesA[] = $cat;
			}
		} else {
			//$where = "\n WHERE section = '$sectionid'";
			foreach($cat_list as $cat) {
				if ($cat->section == $sectionid) {
					$categoriesA[] = $cat;
				}
			}
		}
		$categories[] 		= mosHTML::makeOption( '-1', 'Select Category', 'id', 'title' );
		$categories 		= array_merge( $categories, $categoriesA );
 		$lists['catid'] 	= mosHTML::selectList( $categories, 'catid', 'class="inputbox" size="1"', 'id', 'title', intval( $row->catid ) );
  	}

	// build the html select list for ordering
	$query = "SELECT ordering AS value, title AS text"
	. "\n FROM #__export_content"
	. "\n WHERE catid = $row->catid"
	. "\n AND state >= 0"
	. "\n ORDER BY ordering"
	;
	$lists['ordering'] = mosAdminMenus::SpecificOrdering( $row, $uid, $query, 1 );

	// pull param column from category info
	$query = "SELECT params"
	. "\n FROM #__export_categories"
	. "\n WHERE id = $row->catid"
	;
	$database->setQuery( $query );
	$categoryParam = $database->loadResult();

	$paramsCat = new mosParameters( $categoryParam, $mainframe->getPath( 'com_xml', 'com_categories' ), 'component' );
	$selected_folders = $paramsCat->get( 'imagefolders', '' );

	if ( !$selected_folders ) {
		$selected_folders = '*2*';
	}

	// check if images utilizes settings from section
	if ( strpos( $selected_folders, '*2*' ) !== false ) {
		unset( $selected_folders );
		// load param column from section info
		$query = "SELECT params"
		. "\n FROM #__export_sections"
		. "\n WHERE id = $row->sectionid"
		;
		$database->setQuery( $query );
		$sectionParam = $database->loadResult();

		$paramsSec = new mosParameters( $sectionParam, $mainframe->getPath( 'com_xml', 'com_sections' ), 'component' );
		$selected_folders = $paramsSec->get( 'imagefolders', '' );
	}

	if ( trim( $selected_folders ) ) {
		$temps = explode( ',', $selected_folders );
		foreach( $temps as $temp ) {
			$temp 		= ampReplace( $temp);
			$folders[] 	= mosHTML::makeOption( $temp, $temp );
		}
	} else {
		$folders[] = mosHTML::makeOption( '*1*' );
	}

	// calls function to read image from directory
	$pathA 		= $mosConfig_absolute_path .'/images/stories';
	$pathL 		= $mosConfig_live_site .'/images/stories';
	$images 	= array();

	if ( $folders[0]->value == '*1*' ) {
		$folders 	= array();
		$folders[] 	= mosHTML::makeOption( '/' );
		mosAdminMenus::ReadImages( $pathA, '/', $folders, $images );
	} else {
		mosAdminMenus::ReadImagesX( $folders, $images );
	}

	// list of folders in images/stories/
	$lists['folders'] 			= mosAdminMenus::GetImageFolders( $folders, $pathL );
	// list of images in specfic folder in images/stories/
	$lists['imagefiles']		= mosAdminMenus::GetImages( $images, $pathL, $folders );
	// list of saved images
	$lists['imagelist'] 		= mosAdminMenus::GetSavedImages( $row, $pathL );

	// build list of users
	$active = ( intval( $row->created_by ) ? intval( $row->created_by ) : $my->id );
	$lists['created_by'] 		= mosAdminMenus::UserSelect( 'created_by', $active );
	// build the select list for the image position alignment
	$lists['_align'] 			= mosAdminMenus::Positions( '_align' );
	// build the select list for the image caption alignment
	$lists['_caption_align'] 	= mosAdminMenus::Positions( '_caption_align' );
	// build the html select list for the group access
	$lists['access'] 			= mosAdminMenus::Access( $row );
	// build the html select list for menu selection
	$lists['menuselect']		= mosAdminMenus::MenuSelect( );

	// build the select list for the image caption position
	$pos[] = mosHTML::makeOption( 'bottom', _CMN_BOTTOM );
	$pos[] = mosHTML::makeOption( 'top', _CMN_TOP );
	$lists['_caption_position'] = mosHTML::selectList( $pos, '_caption_position', 'class="inputbox" size="1"', 'value', 'text' );

	// get params definitions

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
	
	
	HTML_export::editContent_item( $row, $contentSection, $lists, $sectioncategories, $images, $params, $option, $redirect, $menus,$form );
	

}
/*********************************************************************
Compiles information to add or edit a section
**********************************************************************/
function edit_sect( $uid=0, $scope='', $option ) {
	global $database, $my, $mainframe;

	global $mainframe,$database;
	//global $mainframe;

	$db			=& JFactory::getDBO();
	$user 		=& JFactory::getUser();

	$option		= JRequest::getCmd( 'option');
	$scope		= JRequest::getCmd( 'scope' );
	$cid		= JRequest::getVar( 'cid', array(0), '', 'array' );
	JArrayHelper::toInteger($cid, array(0));

	//$row =& JTable::getInstance('section');
	$row = new mosExport_Sections( $db );
	// load the row from the db table
	$row->load( $cid[0] );

	// fail if checked out not by 'me'
	if ($row->isCheckedOut( $user->get('id') )) {
		$msg = JText::sprintf( 'DESCBEINGEDITTED', JText::_( 'The section' ), $row->title );
		$mainframe->redirect( 'index.php?option='. $option .'&scope='. $row->scope, $msg );
	}

	if ( $cid[0] ) {
		$row->checkout( $user->get('id') );
	} else {
		$row->scope 		= $scope;
		$row->published 	= 1;
	}

	// build the html select list for ordering
	$query = 'SELECT ordering AS value, title AS text'
	. ' FROM #__export_sections'
		. ' WHERE scope='.$db->Quote($row->scope).' ORDER BY ordering'
	;
	$lists['ordering'] 			= JHTML::_('list.specificordering',  $row, $cid[0], $query );

	// build the select list for the image positions
	$active =  ( $row->image_position ? $row->image_position : 'left' );
	$lists['image_position'] 	= JHTML::_('list.positions',  'image_position', $active, NULL, 0 );
	// build the html select list for images
	$lists['image'] 			= JHTML::_('list.images',  'image', $row->image );
	// build the html select list for the group access
	$lists['access'] 			= JHTML::_('list.accesslevel',  $row );
	// build the html radio buttons for published
	$lists['published'] 		= JHTML::_('select.booleanlist',  'published', 'class="inputbox"', $row->published );

	HTML_export::edit_sections( $row, $option, $lists, $menus );
}
/****************************************************
 Saves the Section after an edit form submit
****************************************************/
function saveSection( $option, $scope, $task ) {
	global $database;

	$menu 		= strval( mosGetParam( $_POST, 'menu', 'mainmenu' ) );
	$menuid		= intval( mosGetParam( $_POST, 'menuid', 0 ) );
	$oldtitle 	= strval( mosGetParam( $_POST, 'oldtitle', null ) );

	$row = new mosExport_Sections( $database );
	if (!$row->bind( $_POST )) {
		echo "<script> alert('".$row->getError()."'); document.location.href='index2.php?option=$option&scope=$scope&task=new'; </script>\n";
		exit();
	}
	if (!$row->check()) {
		echo "<script> alert('".$row->getError()."'); document.location.href='index2.php?option=$option&scope=$scope&task=new'; </script>\n";
		exit();
	}
	if ( $oldtitle ) {
		if ( $oldtitle != $row->title ) {
			$query = "UPDATE #__menu"
			. "\n SET name = '$row->title'"
			. "\n WHERE name = '$oldtitle'"
			. "\n AND type = 'content_section'"
			;
			$database->setQuery( $query );
			$database->query();
		}
	}

	// handling for MOSImage directories
	$folders 		= mosGetParam( $_POST, 'folders', array() );
	$folders 		= implode( ',', $folders );
	if ( strpos( $folders, '*1*' ) !== false  ) {
		$folders 	= '*1*';
	} else if ( strpos( $folders, '*0*' ) !== false ) {
		$folders	= '*0*';
	} else if ( strpos( $folders, ',*#*' ) !== false ) {
		$folders 	= str_replace( ',*#*', '', $folders );
	} else if ( strpos( $folders, '*#*,' ) !== false ) {
		$folders 	= str_replace( '*#*,', '', $folders );
	} else if ( strpos( $folders, '*#*' ) !== false ) {
		$folders 	= str_replace( '*#*', '', $folders );
	}
	$row->params	= 'imagefolders='. $folders;

	if (!$row->store()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	$row->checkin();
	$row->updateOrder( "scope='$row->scope'" );

	// clean any existing cache files
	mosCache::cleanCache( 'com_content' );

	switch ( $task ) {
		case 'go2menu':
			mosRedirect( 'index2.php?option=com_menus&menutype='. $menu );
			break;

		case 'go2menuitem':
			mosRedirect( 'index2.php?option=com_menus&menutype='. $menu .'&task=edit&hidemainmenu=1&id='. $menuid );
			break;

		case 'menulink':
			menuLink( $row->id );
			break;

		case 'apply':
			//Changes to Section saved
		$msg =	_SECT_APPLY;
			mosRedirect( 'index2.php?option=com_export_content&task=sections', $msg );
			break;

		case 'save_sect':
		default:
			//Section saved
		$msg =	_SECT_SAVED;
			mosRedirect( 'index2.php?option=com_export_content&task=sections', $msg );
			break;
	}
}
/************************************************
Edit categories
**************************************************/
function edit_cat( $uid=0, $section='' ) {
	global $database, $my, $mainframe;

	$type 		= strval( mosGetParam( $_REQUEST, 'type', '' ) );
	$redirect 	= strval( mosGetParam( $_REQUEST, 'section', 'content' ) );

	// check for existance of any sections
	$query = "SELECT COUNT( id )"
	. "\n FROM #__export_sections"
	. "\n WHERE scope = 'content'"
	;
	$database->setQuery( $query );
	$sections = $database->loadResult();
	if (!$sections && $type != 'other') {
		echo "<script> alert('You need to have at least one Section before you can create a Category'); window.history.go(-1); </script>\n";
		exit();
	}

	$row = new mosExport_Category( $database );
	// load the row from the db table
	$row->load( $uid );

	// fail if checked out not by 'me'
	if ($row->checked_out && $row->checked_out != $my->id) {
		mosRedirect( 'index2.php?option=categories&section='. $row->section, 'The category '. $row->title .' is currently being edited by another administrator' );
	}

	$lists['links']		= 0;
	$menus 				= NULL;
	$selected_folders	= NULL;
	if ( $uid ) {
		// existing record
		$row->checkout( $my->id );

		// code for Link Menu
		switch ( $row->section ) {
			case 'com_weblinks':
				$and 	= "\n AND type = 'weblink_category_table'";
				$link 	= 'Table - Weblink Category';
				break;

			case 'com_newsfeeds':
				$and 	= "\n AND type = 'newsfeed_category_table'";
				$link 	= 'Table - Newsfeeds Category';
				break;

			case 'com_contact_details':
				$and 	= "\n AND type = 'contact_category_table'";
				$link 	= 'Table - Contacts Category';
				break;

			default:
				$and  = '';
				$link = '';
				break;
		}

		// content
		if ( $row->section > 0 ) {
			$query = "SELECT *"
			. "\n FROM #__menu"
			. "\n WHERE componentid = ". $row->id
			. "\n AND ( type = 'content_archive_category' OR type = 'content_blog_category' OR type = 'content_category' )"
			;
			$database->setQuery( $query );
			$menus = $database->loadObjectList();

			$count = count( $menus );
			for( $i = 0; $i < $count; $i++ ) {
				switch ( $menus[$i]->type ) {
					case 'content_category':
						$menus[$i]->type = 'Table - Content Category';
						break;

					case 'content_blog_category':
						$menus[$i]->type = 'Blog - Content Category';
						break;

					case 'content_archive_category':
						$menus[$i]->type = 'Blog - Content Category Archive';
						break;
				}
			}
			$lists['links']	= 1;

			// handling for MOSImage directories
			if ( trim( $row->params ) ) {
				// get params definitions
				$params = new mosParameters( $row->params, $mainframe->getPath( 'com_xml', 'com_categories' ), 'component' );
				$temps 	= $params->get( 'imagefolders', '' );

				$temps 	= explode( ',', $temps );
				foreach( $temps as $temp ) {
					$selected_folders[] = mosHTML::makeOption( $temp, $temp );
				}
			} else {
				$selected_folders[] = mosHTML::makeOption( '*2*' );
			}
		} else {
			$query = "SELECT *"
			. "\n FROM #__menu"
			. "\n WHERE componentid = ". $row->id
			. $and
			;
			$database->setQuery( $query );
			$menus = $database->loadObjectList();

			$count = count( $menus );
			for( $i = 0; $i < $count; $i++ ) {
				$menus[$i]->type = $link;
			}
			$lists['links']	= 1;
		}
	} else {
		// new record
		$row->section 		= $section;
		$row->published 	= 1;
		$menus 				= NULL;

		// handling for MOSImage directories
		if ( $row->section == 'content' ) {
			$selected_folders[]	= mosHTML::makeOption( '*2*' );
		}
	}

	// make order list
	$order = array();
	$query = "SELECT COUNT(*)"
	. "\n FROM #__export_categories"
	. "\n WHERE section = '$row->section'"
	;
	$database->setQuery( $query );
	$max = intval( $database->loadResult() ) + 1;

	for ($i=1; $i < $max; $i++) {
		$order[] = mosHTML::makeOption( $i );
	}


	// build the html select list for category types
	$types[] = mosHTML::makeOption( '', 'Select Type' );
	if ($row->section == 'com_contact_details') {
		$types[] = mosHTML::makeOption( 'contact_category_table', 'Contact Category Table' );
	} else
	if ($row->section == 'com_newsfeeds') {
		$types[] = mosHTML::makeOption( 'newsfeed_category_table', 'Newsfeed Category Table' );
	} else
	if ($row->section == 'com_weblinks') {
		$types[] = mosHTML::makeOption( 'weblink_category_table', 'Weblink Category Table' );
	} else {
		$types[] = mosHTML::makeOption( 'content_category', 'Content Category Table' );
		$types[] = mosHTML::makeOption( 'content_blog_category', 'Content Category Blog' );
		$types[] = mosHTML::makeOption( 'content_archive_category', 'Content Category Archive Blog' );
	} // if
	$lists['link_type'] 		= mosHTML::selectList( $types, 'link_type', 'class="inputbox" size="1"', 'value', 'text' );

	// build the html select list for ordering
	$query = "SELECT ordering AS value, title AS text"
	. "\n FROM #__export_categories"
	. "\n WHERE section = '$row->section'"
	. "\n ORDER BY ordering"
	;
	$lists['ordering'] 			= mosAdminMenus::SpecificOrdering( $row, $uid, $query );

	// build the select list for the image positions
	$active =  ( $row->image_position ? $row->image_position : 'left' );
	$lists['image_position'] 	= mosAdminMenus::Positions( 'image_position', $active, NULL, 0, 0 );
	// Imagelist
	$lists['image'] 			= mosAdminMenus::Images( 'image', $row->image );
	// build the html select list for the group access
	$lists['access'] 			= mosAdminMenus::Access( $row );
	// build the html radio buttons for published
	$lists['published'] 		= mosHTML::yesnoRadioList( 'published', 'class="inputbox"', $row->published );
	// build the html select list for menu selection
	$lists['menuselect']		= mosAdminMenus::MenuSelect( );

	// handling for MOSImage directories
	if ( $row->section > 0 || $row->section == 'content' ) {
		// list of folders in images/stories/
		//$imgFiles 	= recursive_listdir( COM_IMAGE_BASE );
	//	$len 		= strlen( COM_IMAGE_BASE );

		$folders[] 	= mosHTML::makeOption( '*2*', 'Use Section settings'  );
		$folders[] 	= mosHTML::makeOption( '*#*', '---------------------' );
		$folders[] 	= mosHTML::makeOption( '*1*', 'All'  );
		$folders[] 	= mosHTML::makeOption( '*0*', 'None' );
		$folders[] 	= mosHTML::makeOption( '*#*', '---------------------' );
		$folders[] 	= mosHTML::makeOption( '/' );

		$db			=& JFactory::getDBO();
	$user 		=& JFactory::getUser();
	$uid		= $user->get('id');
//Get sections list
			$query = 'SELECT s.id AS value, s.title AS text'
		. ' FROM #__export_sections AS s'
		. ' ORDER BY s.ordering'
		;
		$db->setQuery( $query );
		$sections = $db->loadObjectList();
		$lists['section'] = JHTML::_('select.genericlist',   $sections, 'section', 'class="inputbox" size="1"', 'value', 'text', $row->section );

		$lists['folders'] = mosHTML::selectList( $folders, 'folders[]', 'class="inputbox" size="17" multiple="multiple"', 'value', 'text', $selected_folders );
	}

 	HTML_export::edit_categories( $row, $lists, $redirect, $menus );
}

/***************************************************
* Saves the category after an edit form submit
****************************************************/
function saveCategory( $option,$task ) {
	global $database;

	$menu 		= strval( mosGetParam( $_POST, 'menu', 'mainmenu' ) );
	$menuid		= intval( mosGetParam( $_POST, 'menuid', 0 ) );
	$redirect 	= strval( mosGetParam( $_POST, 'redirect', '' ) );
	$oldtitle 	= strval( mosGetParam( $_POST, 'oldtitle', null ) );

	$row = new mosExport_Category( $database );
	if (!$row->bind( $_POST, 'folders' )) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	$row->title 	= addslashes( $row->title );
	$row->name		= addslashes( $row->name );

	// handling for MOSImage directories
	if ( $row->section > 0 ) {
		$folders 		= mosGetParam( $_POST, 'folders', array() );
		$folders 		= implode( ',', $folders );

		if ( strpos( $folders, '*2*' ) !== false  ) {
			$folders 	= '*2*';
		} else if ( strpos( $folders, '*1*' ) !== false  ) {
			$folders 	= '*1*';
		} else if ( strpos( $folders, '*0*' ) !== false ) {
			$folders	= '*0*';
		} else if ( strpos( $folders, ',*#*' ) !== false ) {
			$folders 	= str_replace( ',*#*', '', $folders );
		} else if ( strpos( $folders, '*#*,' ) !== false ) {
			$folders 	= str_replace( '*#*,', '', $folders );
		} else if ( strpos( $folders, '*#*' ) !== false ) {
			$folders 	= str_replace( '*#*', '', $folders );
		}

		$row->params	= 'imagefolders='. $folders;
	}

	if (!$row->check()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}

	if (!$row->store()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}

	$row->checkin();
	$row->updateOrder( "section = '$row->section'" );

	if ( $oldtitle ) {
		if ($oldtitle != $row->title) {
			$query = "UPDATE #__menu"
			. "\n SET name = '$row->title'"
			. "\n WHERE name = '$oldtitle'"
			. "\n AND type = 'content_category'"
			;
			$database->setQuery( $query );
			$database->query();
		}
	}

	// Update Section Count
	if ($row->section != 'com_contact_details' &&
		$row->section != 'com_newsfeeds' &&
		$row->section != 'com_weblinks') {
		$query = "UPDATE #__export_sections SET count=count+1"
		. "\n WHERE id = '$row->section'"
		;
		$database->setQuery( $query );
	}
	if (!$database->query()) {
		echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
		exit();
	}

	if ($redirect == 'content') {
		// clean any existing cache files
		mosCache::cleanCache( 'com_content' );
	}

	switch ( $task ) {
		case 'go2menu':
			mosRedirect( 'index2.php?option=com_menus&menutype='. $menu );
			break;

		case 'go2menuitem':
			mosRedirect( 'index2.php?option=com_menus&menutype='. $menu .'&task=edit&hidemainmenu=1&id='. $menuid );
			break;

		case 'menulink':
			menuLink( $row->id );
			break;

		case 'apply':
			 //Changes to Category saved
		$msg =	_CAT_APPLY;
			mosRedirect( 'index2.php?option=com_categories&section='. $redirect .'&task=editA&hidemainmenu=1&id='. $row->id, $msg );
			break;

		case 'save_cat':
		    default:
			//Category saved
			$msg =	_CATEGORY_SAVED;
			mosRedirect( 'index2.php?option=com_export_content&task=categories', $msg );
			break;
	}
}
/**********************
Cancel categories edit
**********************/
function cancel_Cat() {
	global $database;

	$redirect = strval( mosGetParam( $_POST, 'redirect', '' ) );

	$row = new mosExport_Category( $database );
	$row->bind( $_POST );
	$row->checkin();
 //Edit canceled
 $msg= _EDIT_CANCELED;
	mosRedirect( 'index2.php?option=com_export_content&task=categories',$msg );
}
/**************************************
Sections access levels  ###TODO###   BELOW HERE
**************************************/
 function accessMenu_sect( $uid, $access, $section ) {
	global $database;

	$row = new mosExport_Sections( $database );
	$row->load( $uid );
	$row->access = $access;

	if ( !$row->check() ) {
		return $row->getError();
	}
	if ( !$row->store() ) {
		return $row->getError();
	}
	mosRedirect( 'index2.php?option=com_export_content&task=sections' );

}
/****************************************************
TODO
*****************************************************/
	function AccessProcessing_sect( &$row, $i ) {
		if ( !$row->access ) {
			$color_access = 'style="color: green;"';
			$task_access = 'accessregistered_sect';
		} else if ( $row->access == 1 ) {
			$color_access = 'style="color: red;"';
			$task_access = 'accessspecial_sect';
		} else {
			$color_access = 'style="color: black;"';
			$task_access = 'accesspublic_sect';
		}

		$href = '
		<a href="javascript: void(0);" onclick="return listItemTask(\'cb'. $i .'\',\''. $task_access .'\')" '. $color_access .'>
		'. $row->groupname .'
		</a>';
		return $href;
			global $database;

	$row = new mosExport_Sections( $database );
	$row->load( $uid );
	$row->access = $task_access;

	if ( !$row->check() ) {
		return $row->getError();
	}
	if ( !$row->store() ) {
		return $row->getError();
	}
//HTML_export::accessMenu_sect( $row, $i );
$msg='';
		mosRedirect( 'index2.php?option=com_export_content&task=sections');
	}
/**************************************************
Categories access levels                ###TODO####
*************************************************/
function accessMenu_cat( $uid, $access, $section ) {
	global $database;

	$row = new mosExport_Category( $database );
	$row->load( $uid );
	$row->access = $access;

	if ( !$row->check() ) {
		return $row->getError();
	}
	if ( !$row->store() ) {
		return $row->getError();
	}

	mosRedirect( 'index2.php?option=com_export_content&task=categories' );
}
/******************************************
* changes the access level of a record
* @param integer The increment to reorder by
**********************************************/
function changeAccess( $id, $access, $option  ) {
	global $database;

	$row = new mosExport_Content( $database );
	$row->load( $id );
	$row->access = $access;

	if ( !$row->check() ) {
		return $row->getError();
	}
	if ( !$row->store() ) {
		return $row->getError();
	}

	// clean any existing cache files
	mosCache::cleanCache( 'com_content' );

	mosRedirect( 'index2.php?option='. $option );
}


/**********************************************
* Function to reset Hit count of a content item
***********************************************/
function resethits( $option, $id ) {
	global $database;

	$row = new mosExport_Content($database);
	$row->Load( $id );
	$row->hits = "0";
	$row->store();
	$row->checkin();

	$msg = 'Successfully Reset Hit';
	mosRedirect( 'index2.php?option='. $option .'&task=edit&hidemainmenu=1&id='. $row->id, $msg );
}
/*********************
TODO
***********************/
function menuLink( $option, $id ) {
	global $database;

	$menu 	= strval( mosGetParam( $_POST, 'menuselect', '' ) );
	$link 	= strval( mosGetParam( $_POST, 'link_name', '' ) );
    $link	= stripslashes( ampReplace($link) );
    $row 				= new mosMenu( $database );
	$row->menutype 		= $menu;
	$row->name 			= $link;
	$row->type 			= 'content_typed';
	$row->published		= 1;
	$row->componentid	= $id;
	$row->link			= 'index.php?option=com_export_content&task=view&id='. $id;
	$row->ordering		= 9999;

	if (!$row->check()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	if (!$row->store()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	$row->checkin();
	$row->updateOrder( "menutype='$row->menutype' AND parent='$row->parent'" );

	// clean any existing cache files
	mosCache::cleanCache( 'com_content' );

	$msg = $link .' (Link - Static Content) in menu: '. $menu .' successfully created';
	mosRedirect( 'index2.php?option='. $option .'&task=edit&hidemainmenu=1&id='. $id, $msg );
}
/********************
remove
*******************/
function go2menu() {
	global $database;

	// checkin content
	$row = new mosExport_Content( $database );
	$row->bind( $_POST );
	$row->checkin();

	$menu = strval( mosGetParam( $_POST, 'menu', 'mainmenu' ) );

	mosRedirect( 'index2.php?option=com_menus&menutype='. $menu );
}

function go2menuitem() {
	global $database;

	// checkin content
	$row = new mosContent( $database );
	$row->bind( $_POST );
	$row->checkin();

	$menu 	= strval( mosGetParam( $_POST, 'menu', 'mainmenu' ) );
	$id		= intval( mosGetParam( $_POST, 'menuid', 0 ) );

	mosRedirect( 'index2.php?option=com_menus&menutype='. $menu .'&task=edit&hidemainmenu=1&id='. $id );
}
//}
//end todo
/******************************************
Save imports to export content tables
*******************************************/
function save_imports( $option ) {
	global $database;

	$row = new Export_content( $database );//TODO CHANGE
	if (!$row->bind( $_POST )) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}

	// save params
	$params = mosGetParam( $_POST, 'params', '' );
	if (is_array( $params )) {
		$txt = array();
		foreach ( $params as $k=>$v) {
			$txt[] = "$k=$v";
		}
		$row->params = implode( "\n", $txt );
	}

	// pre-save checks
	if (!$row->check()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}

	// save the changes
	if (!$row->store()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	$row->checkin();
	$row->updateOrder();
	if ($row->default_con) {
		$query = "UPDATE #__contact_details"//TODO CHANGE
		. "\n SET default_con = 0"
		. "\n WHERE id <> $row->id"
		. "\n AND default_con = 1"
		;
		$database->setQuery( $query );
		$database->query();
	}

	mosRedirect( "index2.php?option=$option" );
}

/**********************************************
* Compiles a list of categories for a section
* @param database A database connector object
* @param string The name of the category section
* @param string The name of the current user
*************************************************/
function showSections( $scope, $option ) {
	global $database, $my, $mainframe, $mosConfig_list_limit;

	$limit 		= intval( $mainframe->getUserStateFromRequest( "viewlistlimit", 'limit', $mosConfig_list_limit ) );
	$limitstart = intval( $mainframe->getUserStateFromRequest( "view{$option}limitstart", 'limitstart', 0 ) );
/*

*/
	$query = "SELECT *FROM #__sections";
		$database->setQuery( $query );
	$sec_rows = $database->loadObjectList();
	foreach($sec_rows as $sid){
   $sect_id=$sid->id;
  }

	// get the total number of records
	$query = "SELECT COUNT(*)"
	. "\n FROM #__sections"
	. "\n WHERE scope = '$scope'"
	//. "\n ORDER BY ASC"
	;
	$database->setQuery( $query );
	$total = $database->loadResult();
	;
	
	require_once( $GLOBALS['mosConfig_absolute_path'] . '/administrator/includes/pageNavigation.php' );
	$pageNav = new mosPageNav( $total, $limitstart, $limit );

	$query = "SELECT c.*, g.name AS groupname, u.name AS editor"
	. "\n FROM #__sections AS c"
	. "\n LEFT JOIN #__content AS cc ON c.id = cc.sectionid"
	. "\n LEFT JOIN #__users AS u ON u.id = c.checked_out"
	. "\n LEFT JOIN #__groups AS g ON g.id = c.access"
//	. "\n WHERE scope = '$scope'"
	. "\n GROUP BY c.id"
	. "\n ORDER BY c.ordering, c.name"
	;
	$database->setQuery( $query, $pageNav->limitstart, $pageNav->limit );
	$rows = $database->loadObjectList();
	if ($database->getErrorNum()) {
		echo $database->stderr();
		return false;
	}

	$count = count( $rows );
	// number of Active Items
	for ( $i = 0; $i < $count; $i++ ) {
		$query = "SELECT COUNT( a.id )"
		. "\n FROM #__categories AS a"
		. "\n WHERE a.section = '". $rows[$i]->id ."'"
		. "\n AND a.published != -2"
		;
		$database->setQuery( $query );
		$active = $database->loadResult();
		$rows[$i]->categories = $active;
	}
	// number of Active Items
	for ( $i = 0; $i < $count; $i++ ) {
		$query = "SELECT COUNT( a.id )"
		. "\n FROM #__content AS a"
		. "\n WHERE a.sectionid = '". $rows[$i]->id ."'"
		. "\n AND a.state != -2"
		;
		$database->setQuery( $query );
		$active = $database->loadResult();
		$rows[$i]->active = $active;
	}
	// number of Trashed Items
	for ( $i = 0; $i < $count; $i++ ) {
		$query = "SELECT COUNT( a.id )"
		. "\n FROM #__content AS a"
		. "\n WHERE a.sectionid = '". $rows[$i]->id ."'"
		. "\n AND a.state = -2"
		;
		$database->setQuery( $query );
		$trash = $database->loadResult();
		$rows[$i]->trash = $trash;
	}

	HTML_export::section_to_export($sec_rows, $rows, $scope, $my->id, $pageNav, $option );
}
/**********************************************
* Insert mulipule setion and the content within
**********************************************/
function multiSectionSave( $option, $cid) {

global $database,$mosConfig_live_site;
//function replace_image_path($text){
//  $value = str_replace('#imageurl#','$mosConfig_live_site',$value);	
//}

$sides		= mosGetParam( $_REQUEST, 'cid', 'cid' );
$title 		= mosGetParam( $_REQUEST, 'title', '' );
$contentid 	= mosGetParam( $_REQUEST, 'content', '' );
$categoryid = mosGetParam( $_REQUEST, 'category', '' );
$sectionid  = mosGetParam( $_REQUEST, 'section', '' );
$sid        = implode( ',', $sectionid );

	// copy section
		$query = "SELECT * FROM #__export_sections"
		. "\n WHERE id IN ( $sid )"
	;
	$database->setQuery( $query );
    $sectionids = $database->loadObjectList();
   foreach($sectionids as $sect){
          $sect_id                    = $sect->id;
          $sect_title                 = decode_entities($sect->title);
          $sect_name                  = decode_entities($sect->name);
          $sect_image                 = decode_entities($sect->image);
          $sect_image_position        = $sect->image_position;
          $sect_description           = decode_entities($sect->description);
          $sect_published             = $sect->published;
          $sect_checked_out_time      = $sect->checked_out_time;
          $sect_params                = decode_entities($sect->params);

	$section = new mosSection ( $database );
//	foreach( $sectionid as $id ) {
		$section->load( $id );
		$section->id 	          = NULL;
		$section->title           = $sect_title;
		$section->name 	          = $sect_name;
     	$section->description     = $sect_description;
		$section->scope           = 'content';
		$section->checked_out_time= $sect_checked_out_time;
		$section->published 	  = $sect_published;
		$section->image 	      = $sect_image;
		$section->image_position  = $sect_image_position;
		$section->params          = $sect_params;
//     }
		if ( !$section->check() ) {
			echo "<script> alert('".$section->getError()."'); window.history.go(-1); </script>\n";
			exit();
		}

		if ( !$section->store() ) {
			echo "<script> alert('".$section->getError()."'); window.history.go(-1); </script>\n";
			exit();
		}
		$section->checkin();
		
/****************************
Get last inserted section id
*****************************/
		$query = "SELECT id FROM #__sections WHERE id=LAST_INSERT_ID()";
		$database->setQuery( $query );
$lastsectionid = $database->loadObjectList();
foreach($lastsectionid as $new_sect){
$moving=$new_sect->id;
}

/****************************
Get category info
*****************************/
	$cids = implode( ',', $categoryid );
	$query = "SELECT id, name, title, image, image_position, description, published, ordering"
	. "\n FROM #__export_categories"
    . "\n WHERE section = $sect_id"
	;
	$database->setQuery( $query );
	$cat = $database->loadObjectList();
		foreach( $cat as $cats ) {
          $excat_id              = $cats->id;
          $cat_title             = decode_entities($cats->title);
          $cat_name              = decode_entities($cats->name);
          $cat_image             = decode_entities($cats->image);
          $cat_image_position    = $cats->image_position;
          $cat_description       = decode_entities($cats->description);
          $cat_published         = $cats->published;
          $cat_checked_out       = $cats->checked_out;
          $cat_checked_out_time  = $cats->checked_out_time;
          $cat_editor            = decode_entities($cats->editor);
          $cat_ordering          = $cats->ordering ;
          $cat_access            = $cats->access;
          $cat_count             = $cats->count;
          $cat_params            = $cats->params;
/****************************
Insert category info
*****************************/
	$category = new mosCategory ( $database );
	foreach( $categoryid as $id ) {

		$category->load( $id );
		$category->id               = NULL;
        $category->title            =$cat_title;
        $category->name             =$cat_name;
        $category->image            =$cat_image;
        $category->image_position   =$cat_image_position;
        $category->description      =$cat_description;
        $category->published        =$cat_published;
        $category->checked_out      =$cat_checked_out;
        $category->checked_out_time =$cat_checked_out_time;
        $category->editor           =$cat_editor;
        $category->ordering         =$cat_ordering  ;
        $category->access           =$cat_access;
        $category->count            =$cat_count;
        $category->params           =$cat_params;
        $category->section          = $moving;

        }

		if (!$category->check()) {
			echo "<script> alert('".$category->getError()."'); window.history.go(-1); </script>\n";
			exit();
		}

		if (!$category->store()) {
			echo "<script> alert('".$category->getError()."'); window.history.go(-1); </script>\n";
			exit();
		}
		$category->checkin();
/****************************
Get last inserted category id
*****************************/
			$query = "SELECT id FROM #__categories WHERE id=LAST_INSERT_ID()";
		$database->setQuery( $query );
$lastcatid = $database->loadObjectList();
foreach($lastcatid as $new_cat){
$move_cat=$new_cat->id;
}
/****************************
Get content info
*****************************/
		$query = "SELECT a.id, a.title, a.title_alias, a.introtext, a.fulltext, a.state, a.images, a.created, a.created_by_alias, a.publish_up, a.publish_down, a.ordering, a.attribs, a.metakey, a.metadesc, a.access"
	. "\n FROM #__export_content AS a"
    . "\n WHERE a.catid  = $excat_id"
	. "\n ORDER BY a.sectionid, a.catid, a.title"
	;
	$database->setQuery( $query );
	$con = $database->loadObjectList();

	foreach($con as $cont){
          $item_names        = decode_entities($cont->title);
          $title_alias       = decode_entities($cont->title_alias);
          $introtext         = decode_entities($cont->introtext);
          $fulltext          = decode_entities($cont->fulltext);
          $state             = $cont->state;
          $created           = $cont->created;
          $checked_out_time  = $cont->checked_out_time;
          $publish_down      = $cont->publish_down;
          $publish_up        = $cont->publish_up ;
          $created_by_alias  = $cont->created_by_alias;
          $images            = decode_entities($cont->images);
          $exordering        = $cont->ordering;
          $attribs           = $cont->attribs;
          $metakey           = decode_entities($cont->metakey);
          $metadesc          = decode_entities($cont->metadesc);
          $access            = $cont->access;
/****************************
Insert content info
*****************************/
	$content = new mosContent ( $database );
	foreach( $contentid as $id) {
 
   $content->load( $id );
   $content->title           = $item_names ;
   $content->title_alias     = $title_alias;
    //// $introtext  = str_replace("#imageurl#", "$mosConfig_live_site", $introtext);
    //stripSlashes()
   $content->introtext       = $introtext;
   $content->fulltext        = $fulltext ;
   $content->state           = $state;
   $content->created_by_alias= $created_by_alias;
   $content->created         = $created;
   $content->checked_out_time= $checked_out_time;
   $content->publish_down    = $publish_down;
   $content->publish_up      = $publish_up ;
   $content->images          = $images;
   $content->ordering        = $exordering ;
   $content->attribs         = $attribs;
   $content->metakey         = $metakey ;
   $content->metadesc        = $metadesc ;
   $content->access          = $access;
   $content->sectionid       = $moving;
   $content->catid           = $move_cat;
   $content->id              = NULL;
   $content->hits            = 0;
       }

		if (!$content->check()) {
			echo "<script> alert('".$content->getError()."'); window.history.go(-1); </script>\n";
			exit();
		}

		if (!$content->store()) {
			echo "<script> alert('".$content->getError()."'); window.history.go(-1); </script>\n";
			exit();
		}
		$content->checkin();
	}
  }
}

	// clean any existing cache files
	mosCache::cleanCache( 'com_content' );
	$msg = 'Section(s): '. $sect_title .' successfully transfered';
	mosRedirect( 'index2.php?option=com_export_content&task=sections',$msg );
}

/**********************************************************
Displays a list of static/uncategorized items for copile
***********************************************************/
function viewExport_static( $option ) {
	global $database, $mainframe, $mosConfig_list_limit;

	$filter_authorid 	= intval( $mainframe->getUserStateFromRequest( "filter_authorid{$option}", 'filter_authorid', 0 ) );
	$order 				= $mainframe->getUserStateFromRequest( "zorder", 'zorder', 'c.ordering DESC' );
	$limit 				= intval( $mainframe->getUserStateFromRequest( "viewlistlimit", 'limit', $mosConfig_list_limit ) );
	$limitstart 		= intval( $mainframe->getUserStateFromRequest( "view{$option}limitstart", 'limitstart', 0 ) );
	$search 			= $mainframe->getUserStateFromRequest( "search{$option}", 'search', '' );
	if (get_magic_quotes_gpc()) {
		$search			= stripslashes( $search );
	}

	// used by filter
	if ( $search ) {
		$searchEscaped = $database->getEscaped( trim( strtolower( $search ) ) );
		$search_query = "\n AND ( LOWER( c.title ) LIKE '%$searchEscaped%' OR LOWER( c.title_alias ) LIKE '%$searchEscaped%' )";
	} else {
		$search_query = '';
	}

	$filter = '';
	if ( $filter_authorid > 0 ) {
		$filter = "\n AND c.created_by = " . (int) $filter_authorid;
	}

	$orderAllowed = array( 'c.ordering ASC', 'c.ordering DESC', 'c.id ASC', 'c.id DESC', 'c.title ASC', 'c.title DESC', 'c.created ASC', 'c.created DESC', 'z.name ASC', 'z.name DESC', 'c.state ASC', 'c.state DESC', 'c.access ASC', 'c.access DESC' );
	if (!in_array( $order, $orderAllowed )) {
		$order = 'c.ordering DESC';
	}

	// get the total number of records
	$query = "SELECT count(*)"
	. "\n FROM #__content AS c"
	. "\n WHERE c.sectionid = 0"
	. "\n AND c.catid = 0"
	. "\n AND c.state != -2"
	. $search_query
	. $filter
	;
	$database->setQuery( $query );
	$total = $database->loadResult();
	require_once( $GLOBALS['mosConfig_absolute_path'] . '/administrator/includes/pageNavigation.php' );
	$pageNav = new mosPageNav( $total, $limitstart, $limit );

	$query = "SELECT c.*, g.name AS groupname, u.name AS editor, z.name AS creator"
	. "\n FROM #__content AS c"
	. "\n LEFT JOIN #__groups AS g ON g.id = c.access"
	. "\n LEFT JOIN #__users AS u ON u.id = c.checked_out"
	. "\n LEFT JOIN #__users AS z ON z.id = c.created_by"
	. "\n WHERE c.sectionid = 0"
	. "\n AND c.catid = 0"
	. "\n AND c.state != -2"
	. $search_query
	. $filter
	. "\n ORDER BY ". $order
	;
	$database->setQuery( $query, $pageNav->limitstart, $pageNav->limit );
	$rows = $database->loadObjectList();

	if ($database->getErrorNum()) {
		echo $database->stderr();
		return false;
	}

	$count = count( $rows );
	for( $i = 0; $i < $count; $i++ ) {
		$query = "SELECT COUNT( id )"
		. "\n FROM #__menu"
		. "\n WHERE componentid = " . (int) $rows[$i]->id
		. "\n AND type = 'content_typed'"
		. "\n AND published != -2"
		;
		$database->setQuery( $query );
		$rows[$i]->links = $database->loadResult();
	}

	$ordering[] = mosHTML::makeOption( 'c.ordering ASC', 'Ordering asc' );
	$ordering[] = mosHTML::makeOption( 'c.ordering DESC', 'Ordering desc' );
	$ordering[] = mosHTML::makeOption( 'c.id ASC', 'ID asc' );
	$ordering[] = mosHTML::makeOption( 'c.id DESC', 'ID desc' );
	$ordering[] = mosHTML::makeOption( 'c.title ASC', 'Title asc' );
	$ordering[] = mosHTML::makeOption( 'c.title DESC', 'Title desc' );
	$ordering[] = mosHTML::makeOption( 'c.created ASC', 'Date asc' );
	$ordering[] = mosHTML::makeOption( 'c.created DESC', 'Date desc' );
	$ordering[] = mosHTML::makeOption( 'z.name ASC', 'Author asc' );
	$ordering[] = mosHTML::makeOption( 'z.name DESC', 'Author desc' );
	$ordering[] = mosHTML::makeOption( 'c.state ASC', 'Published asc' );
	$ordering[] = mosHTML::makeOption( 'c.state DESC', 'Published desc' );
	$ordering[] = mosHTML::makeOption( 'c.access ASC', 'Access asc' );
	$ordering[] = mosHTML::makeOption( 'c.access DESC', 'Access desc' );
	$javascript = 'onchange="document.adminForm.submit();"';
	$lists['order'] = mosHTML::selectList( $ordering, 'zorder', 'class="inputbox" size="1"'. $javascript, 'value', 'text', $order );

	// get list of Authors for dropdown filter
	$query = "SELECT c.created_by AS value, u.name AS text"
	. "\n FROM #__content AS c"
	. "\n LEFT JOIN #__users AS u ON u.id = c.created_by"
	. "\n WHERE c.sectionid = 0"
	. "\n GROUP BY u.name"
	. "\n ORDER BY u.name"
	;
	$authors[] = mosHTML::makeOption( '0', '- '.JText::_('Select Author').' -' );
	$database->setQuery( $query );
	$authors = array_merge( $authors, $database->loadObjectList() );
	$lists['authorid']	= mosHTML::selectList( $authors, 'filter_authorid', 'class="inputbox" size="1" onchange="document.adminForm.submit( );"', 'value', 'text', $filter_authorid );

	HTML_export::showExportstatic( $rows, $pageNav, $option, $search, $lists );
}
 /****************************************************
Get site content and build a component for download
*****************************************************/
function static_compile()
{
  remove_old_zip();
  compile_static($option,$cid);
  require_once( 'pclzip.lib.php' );
$archive = new PclZip('../administrator/components/com_export_content/zip/import_content_data.zip');
$v_list = $archive->create('../administrator/components/com_export_content/zip/',PCLZIP_OPT_REMOVE_PATH, '../administrator/components/com_export_content/zip/',PCLZIP_OPT_ADD_PATH, 'import_content_data');

  if ($v_list == 0) {
    die("Error : ".$archive->errorInfo(true));
  }
//You may now download your data via the download icon
$msg= _CONTENT_DOWNLOAD;
mosRedirect( 'index2.php?option=com_export_content&task=viewExport_static',$msg );
}
/*************************************
Create XML to Export static items
**************************************/
function compile_static($option,$cid){
   global $mainframe;
remove_sql_install();
$option = 'com_export_content';
// get params definitions
   $static_id	      = mosGetParam( $_REQUEST, 'cid', 'cid' );
   $cids  = implode( ',', $static_id );

/*************************************
Start XML output for static
**************************************/
 global $database,$mosConfig_host,$mosConfig_password, $mosConfig_user, $mosConfig_live_site, $mosConfig_db, $mosConfig_dbprefix;
 //xml description text
$xml_txt = _XML_DESCRIPTION_TXT;
$dates   = date("F/j/Y");
   $file= fopen("../administrator/components/com_export_content/zip/import_content_data.xml", "w");
$_xml ="<?xml version=\"1.0\"?>\r\n";
$_xml .="<mosinstall type=\"component\">\r\n";
$_xml .="<name>import_content_data</name>\r\n";
$_xml .="<creationDate>$dates</creationDate>\r\n";
$_xml .="<author>Stephen Harrison</author>\r\n";
$_xml .="<copyright>Copyright 2007 GNU/GPL License.</copyright>\r\n";
$_xml .="<authorEmail>joomla@bestdownloadsites.com</authorEmail>\r\n";
$_xml .="<authorUrl>http://www.bestdownloadsites.com</authorUrl>\r\n";
$_xml .="<version>1.0</version>\r\n";
$_xml .="<description><![CDATA[$xml_txt ]]></description>\r\n";
$_xml .="<install>\r\n";
$_xml .="<queries>\r\n";
$_xml .="<query>\r\n";
$_xml .="TRUNCATE TABLE  #__export_sections\r\n";
$_xml .="</query>\r\n";
$_xml .="<query>\r\n";
$_xml .="TRUNCATE TABLE  #__export_categories\r\n";
$_xml .="</query>\r\n";
$_xml .="<query>\r\n";
$_xml .="TRUNCATE TABLE  #__export_content\r\n";
$_xml .="</query>\r\n";
	 /*********************************************************************
To stop static items being compiled by default.
************************************************************************/	
global $database;

$sql="SELECT * FROM #__content WHERE id IN ( $cids )"
//. "\n $static_content"
. "\n  ORDER BY `id` ASC"
;
	$database->setQuery($sql);
   $content_rows = $database->loadObjectList();
  // $content_rows = $database->getEscaped( $content_rows);
	foreach($content_rows as $content){
$_xml .="<query><![CDATA[INSERT INTO #__export_content (`id`, `title`, `alias`, `title_alias`, `introtext`, `fulltext`, `state`,`sectionid`, `mask`, `catid`, `created`, `created_by`, `created_by_alias`, `modified`, `modified_by`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `images`, `urls`, `attribs`, `version`, `parentid`, `ordering`, `metakey`, `metadesc`, `access`, `hits`, `metadata`)VALUES";
/****************************************
Get content items 
****************************************/
$content_id        = $content->id;
$title             = addslashes(accents_15($content->title));
$alias             = $title;
$title_alias       = $title;
$intro             = addslashes(accents_15($content->introtext));
$full              = addslashes(accents_15($content->fulltext));
$state             = $content->state;
$sectionid         = $content->sectionid;
$mask              = $content->mask;
$catid             = $content->catid;
$created           = $content->created;
$created_by        = $content->created_by;
$createdbyalias    = addslashes(accents_15($content->created_by_alias));
$modified          = $content->modified;
$modified_by       = $content->modified_by;
$checked_out       = $content->checked_out;
$checked_out_time  = $content->checked_out_time;
$publish_up        = $content->publish_up;
$publish_down      = $content->publish_down;
$images            = addslashes(accents_15($content->images));
$urls              = addslashes(accents_15($content->urls));
$attribs           = change_attribs('#atrstart#' . $content->attribs . '#atrend#');
$version           = $content->version;
$parentid          = $content->parentid;
$ordering          = $content->ordering;
$metakey           = addslashes(accents_15($content->metakey));
$metadesc          = addslashes(accents_15($content->metadesc));
$access            = $content->access;
$hits              = $content->hits;
$metadata          = '';

/*********************************************
Setup inserts  statements for content table.
**********************************************/
$text= "('$content_id','$title','$alias','$title_alias','$intro','$full','$state','$sectionid','$mask','$catid','$created','$created_by','$created_by_alias','$modified','$modified_by','$checked_out','$checked_out_time','$publish_up','$publish_down','$images','$urls','$attribs','$version','$parentid','$ordering','$metakey','$metadesc','$access','$hits','$metadata')";
   $_xml .="$text";
     $_xml .=";]]></query>\r\n";
     }
     $_xml .="</queries>\r\n";
     $_xml .="</install>\r\n";
     $_xml .="<installfile>\r\n";
	 $_xml .="<filename>install.import_content_data.php</filename>\r\n";
     $_xml .="</installfile>\r\n";
     $_xml .="<uninstallfile>\r\n";
	 $_xml .="<filename>uninstall.import_content_data.php</filename>\r\n";
     $_xml .="</uninstallfile>\r\n";
     $_xml .="<administration>\r\n";
	 $_xml .="<menu>Imported Content</menu>\r\n";
	 $_xml .="<files>\r\n";
     $_xml .="<filename>admin.import_content_data.php</filename>\r\n";
     $_xml .="</files>\r\n";
	 $_xml .="</administration>\r\n";
     $_xml .="</mosinstall>";
    
 fwrite($file, high_order($_xml));
 fclose($file);

}
?>