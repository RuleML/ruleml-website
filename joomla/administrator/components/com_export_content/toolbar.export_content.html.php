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
defined( '_JEXEC' ) or die( 'Restricted access' );

class menuExportContent{
 
 
/**************************************
  Show sections
**************************************/	
	function SAVE_SECTIONS() {
	// JToolBarHelper::title( JText::_( 'Imported Sections' ), 'sections.png' );
  mosMenuBar::startTable();
  mosMenuBar::publishList('publish', 'Publish');
  mosMenuBar::spacer();
  mosMenuBar::unpublishList('unpublish', 'Unpublish');
  mosMenuBar::spacer();
  mosMenuBar::customX( 'copyselect_sect', 'move.png', 'move_f2.png', _EX_INSERT, true );
  mosMenuBar::spacer();
  mosMenuBar::editListX( 'editA_sect', 'Edit');
  mosMenuBar::spacer();
  mosMenuBar::addNewX( 'new_sect', 'New');
  mosMenuBar::spacer();
  JToolBarHelper::custom( 'remove_sections', 'delete.png', 'delete_f2.png', 'Trash', true );
  
  mosMenuBar::spacer();
  mosMenuBar::endTable();
	}
/**************************************
  Edit Sections
**************************************/	
	function _EDIT_SECTION( $edit) {
		$cid = JRequest::getVar('cid', array(0), '', 'array');
		JArrayHelper::toInteger($cid, array(0));

		$text = ( $edit ? JText::_( 'Edit' ) : JText::_( 'New' ) );

		JToolBarHelper::title( JText::_( 'Section' ).': <small><small>[ '. $text.' ]</small></small>', 'sections.png' );
	 
		mosMenuBar::startTable();
		mosMenuBar::spacer();
		mosMenuBar::spacer();
		mosMenuBar::save('save_sect', 'Save' );
		mosMenuBar::spacer();
        mosMenuBar::spacer();
        mosMenuBar::cancel('cancel_sect', 'Cancel' );
		mosMenuBar::spacer();
		mosMenuBar::help( 'screen.sections' );
		mosMenuBar::endTable();
	}
/**************************************
  Edit Categories
**************************************/
		function _EDIT_CATEGORY($edit)
	{
		$cid = JRequest::getVar( 'cid', array(0), '', 'array' );

		$text = ( $edit ? JText::_( 'Edit' ) : JText::_( 'New' ) );

		JToolBarHelper::title( JText::_( 'Category' ) .': <small><small>[ '. $text.' ]</small></small>', 'categories.png' );
		mosMenuBar::startTable();
		mosMenuBar::spacer();
		mosMenuBar::spacer();
		mosMenuBar::save('save_cat', 'Save' );
		mosMenuBar::spacer();
		mosMenuBar::spacer();
		mosMenuBar::cancel('cancel_cat', 'Cancel' );
		mosMenuBar::spacer();
		mosMenuBar::help( 'screen.categories' );
		mosMenuBar::endTable();
	}
/**************************************
  Move Categories 
**************************************/
     function _COPY() {
       JToolBarHelper::title( JText::_( '_CATEGORY_HEADING' ), 'cpanel.png' );
		mosMenuBar::startTable();
		mosMenuBar::save( 'copysave','Save'  );
		mosMenuBar::spacer();
		mosMenuBar::cancel();
		mosMenuBar::endTable();
	}

/***************************************************************
 Draws the menu for Copying existing sections multisectionSave
******************************************************************/
	function _COPY_SECTION() {
	 JToolBarHelper::title( JText::_( '_SECTION_HEADING' ), 'cpanel.png' );
		mosMenuBar::startTable();
		mosMenuBar::save( 'multisectionSave', 'Save' );
		mosMenuBar::spacer();
		mosMenuBar::cancel('cancel_sect', 'Cancel' );//for copy select page
		mosMenuBar::endTable();
	}
/**************************************
 Move items
**************************************/	
	function _MOVE() {

      	global $id;
		mosMenuBar::startTable();
		mosMenuBar::save( 'movesave', 'Save' );
        mosMenuBar::spacer();
		mosMenuBar::cancel();
		mosMenuBar::endTable();
	}
/**************************************
  Show Categories
**************************************/	
	function SAVE_CATEGORIES() {
	// JToolBarHelper::title( JText::_( 'Imported Categories' ), 'sections.png' );
	global $id;
		mosMenuBar::startTable();
		mosMenuBar::publishList('publish_cat', _PUBLISH);
		mosMenuBar::spacer();
		mosMenuBar::unpublishList('unpublish_cat', _UNPUBLISH);
		mosMenuBar::spacer();
		mosMenuBar::customX( 'copyselect', 'move.png', 'move_f2.png', _EX_INSERT, true );
		mosMenuBar::spacer();
		mosMenuBar::editListX( 'editA_cat', 'Edit');
		mosMenuBar::spacer();
		mosMenuBar::addNewX( 'new_cat', _NEW_BUTTON );
		mosMenuBar::spacer();
	    mosMenuBar::customX( 'remove_categories', 'trash.png', 'trash.png', 'Trash', false);
		mosMenuBar::spacer();
		mosMenuBar::endTable();
	}
/**************************************
  Show content
**************************************/
	function SAVE_CONTENT_ITEMS() {
    mosMenuBar::startTable();
	mosMenuBar::spacer();
	mosMenuBar::publishList('publish_items', _PUBLISH);
	mosMenuBar::spacer();
	mosMenuBar::unpublishList('unpublish_items', _UNPUBLISH);
	mosMenuBar::spacer();
    mosMenuBar::customX( 'copyItemSelect', 'move.png', 'move_f2.png', _EX_INSERT, true );
    mosMenuBar::spacer();
    mosMenuBar::editListX( 'editA_item', 'Edit' );
    mosMenuBar::spacer();
    mosMenuBar::addNewX( 'new_item', _NEW_BUTTON);
    mosMenuBar::spacer();
	mosMenuBar::spacer();
		JToolBarHelper::custom( 'remove_items', 'delete.png', 'delete_f2.png', 'Trash', true );
	mosMenuBar::spacer();
	mosMenuBar::endTable();
    }
/**************************************
  Moving items
**************************************/	
	function _COPY_ITEM_SELECT() {
	 JToolBarHelper::title( JText::_( '_ITEMS_HEADING' ), 'cpanel.png' );
		mosMenuBar::startTable();
		mosMenuBar::save( 'copysave_items', 'Save'  );
		mosMenuBar::spacer();
		mosMenuBar::back('Cancel');
		mosMenuBar::endTable();
	}
/**************************************
  Show static items
**************************************/	
		function _STATIC() {
		mosMenuBar::startTable();
        mosMenuBar::publishList('publish_static', _PUBLISH);
		mosMenuBar::spacer();
		mosMenuBar::unpublishList('unpublish_static', _UNPUBLISH);
		mosMenuBar::spacer();
        mosMenuBar::customX( 'copysave_static', 'move.png', 'move_f2.png', _EX_INSERT, true );
	 	mosMenuBar::spacer();
		mosMenuBar::editListX( 'editA_static',  'Edit');
		mosMenuBar::spacer();
		mosMenuBar::addNewX( 'new_static', _NEW_BUTTON);
		mosMenuBar::spacer();
		mosMenuBar::trash('trash_static');
		mosMenuBar::spacer();
	//	mosMenuBar::help( 'screen.staticcontent' );
		mosMenuBar::endTable();
	}
/**************************************
  Edit Content
**************************************/	
			function _EDITCONTENT_ITEM($edit)
	{
		$cid = JRequest::getVar( 'cid', array(0), '', 'array' );
		$cid = intval($cid[0]);
        $text = ( $edit ? JText::_( 'Edit' ) : JText::_( 'New' ) );
         JToolBarHelper::title( JText::_( 'Article' ).': <small><small>[ '. $text.' ]</small></small>', 'addedit.png' );
	//	JToolBarHelper::preview( 'index.php?option=com_content&id='.$cid.'&tmpl=component', true );
		mosMenuBar::startTable();
	//	mosMenuBar::preview( 'contentwindow', true );
		mosMenuBar::spacer();
	//	mosMenuBar::media_manager();
		mosMenuBar::spacer();
		mosMenuBar::save('save_items', 'Save' );
		mosMenuBar::spacer();
		mosMenuBar::spacer();
        mosMenuBar::cancel('cancel_item', 'Cancel');
		mosMenuBar::spacer();
	//	mosMenuBar::help( 'screen.content.edit' );
		mosMenuBar::endTable();
	}
/**************************************
  Edit Static
**************************************/	
		function _EDIT_STATIC($edit)
	{
		$cid = JRequest::getVar( 'cid', array(0), '', 'array' );
		$cid = intval($cid[0]);

		$text = ( $edit ? JText::_( 'Edit' ) : JText::_( 'New' ) );

		JToolBarHelper::title( JText::_( 'Article' ).': <small><small>[ '. $text.' ]</small></small>', 'addedit.png' );
	//	JToolBarHelper::preview( 'index.php?option=com_content&id='.$cid.'&tmpl=component', true );
		mosMenuBar::startTable();
	//	mosMenuBar::preview( 'contentwindow', true );
		mosMenuBar::spacer();
		mosMenuBar::spacer();
		mosMenuBar::save('save_static', 'Save' );
		mosMenuBar::spacer();
		mosMenuBar::spacer();
		mosMenuBar::cancel('cancelStatic', 'Cancel');
		mosMenuBar::spacer();
	//	mosMenuBar::help( 'screen.staticcontent.edit' );
		mosMenuBar::endTable();
	}
/**************************************
  ???????????
**************************************/	
	function _IMPORT() {
		mosMenuBar::startTable();
		mosMenuBar::spacer();
		mosMenuBar::addNew('imported','Import Sections');
		mosMenuBar::spacer();
		#mosMenuBar::help( 'screen.users' );
		mosMenuBar::endTable();
}
/**************************************
  Download page
**************************************/
	function _DOWNLOAD_DATA() {
	// JToolBarHelper::title(   JText::_( '_DOWNLOAD_HEADING' ), 'install.png' );
		mosMenuBar::startTable();
	    mosMenuBar::spacer();
		mosMenuBar::customX( 'remove', 'trash.png', 'trash.png', _REMOVE_ALL, false);
		mosMenuBar::spacer();
		mosMenuBar::spacer();
		mosMenuBar::endTable();
	}
/***********************************
Archived items
***********************************/
	function _ARCHIVE() {
	// JToolBarHelper::title( JText::_( 'Imported Archived Items' ), 'addedit.png' );
		mosMenuBar::startTable();
	//	mosMenuBar::unarchiveList();
		mosMenuBar::customX('un_archive', 'unarchive.png', 'archive_f2.png', _E_UNARCHIVE, true );
        mosMenuBar::spacer();
		mosMenuBar::customX( 'copyItemSelect', 'move.png', 'move_f2.png', _EX_INSERT, true );
		mosMenuBar::spacer();
		mosMenuBar::customX('remove_archive', 'trash.png', 'trash.png', 'Trash', true );
		mosMenuBar::endTable();
	}
/*************************************************
Show a list of site sections (for compiling)
**************************************************/
		function _SHOWSECTIONS() {
		mosMenuBar::startTable();
		mosMenuBar::spacer();
        mosMenuBar::customX( 'compile', 'move.png', 'dbrestore.png', _COMPILE, true );
		mosMenuBar::spacer();
		mosMenuBar::customX( 'compile_new_version', 'move.png', 'dbrestore.png', _COMPILE_15, true );
		mosMenuBar::spacer();
   global $mosConfig_live_site;
   $filename = '../administrator/components/com_export_content/zip/import_content_data.zip';
   $newfilename = '../administrator/components/com_export_content/new_version/import_content_data.zip';
   if(file_exists($filename)){
		mosMenuBar::customX( 'remove', 'trash.png', 'trash.png',  _REMOVE_ALL, false);
		mosMenuBar::spacer();
   $size= filesize($filename);
   if($size>1700){
	JToolBarHelper::custom( 'download_data', 'forward.png', 'download_f2.png', _DOWNLOAD, false );		

      }
  }else{
	if(file_exists($newfilename)){
	 
	 	mosMenuBar::customX( 'remove', 'trash.png', 'trash.png',  _REMOVE_ALL, false);
		mosMenuBar::spacer();
   $size= filesize($newfilename);
   if($size>1700){
	JToolBarHelper::custom( 'download_data', 'forward.png', 'download_f2.png', _DOWNLOAD_NEW, false );		

      }
		
	}
}
        mosMenuBar::spacer();
	   //mosMenuBar::help( 'screen.staticcontent' );
		mosMenuBar::endTable();
	}
/********************************************
Show a list of site sections (for compiling)
*********************************************/

		function _VIEWEXPORT_STATIC() {
		 
		mosMenuBar::startTable();
		mosMenuBar::spacer();
        mosMenuBar::customX( 'compile_static', 'move.png', 'dbrestore.png', _COMPILE, true );
		mosMenuBar::spacer();
		mosMenuBar::customX( 'compile_static_15', 'move.png', 'dbrestore.png', _COMPILE_15, true );
		mosMenuBar::spacer();
   global $mosConfig_live_site;
   $filename = '../administrator/components/com_export_content/zip/import_content_data.zip';
   $newfilename = '../administrator/components/com_export_content/new_version/import_content_data.zip';
   if(file_exists($filename)){
    
		mosMenuBar::customX( 'remove_static', 'trash.png', 'trash.png',  _REMOVE_ALL, false);
		mosMenuBar::spacer();
   $size= filesize($filename);
   if($size>1700){
	JToolBarHelper::custom( 'download_data', 'forward.png', 'download_f2.png', _DOWNLOAD, false );		

      }
  }else{
	if(file_exists($newfilename)){
	 
	 	mosMenuBar::customX( 'remove', 'trash.png', 'trash.png',  _REMOVE_ALL, false);
		mosMenuBar::spacer();
   $size= filesize($newfilename);
   if($size>1700){
	JToolBarHelper::custom( 'download_data', 'forward.png', 'download_f2.png', _DOWNLOAD_NEW, false );		

      }
		
	}
}
        mosMenuBar::spacer();
	   //mosMenuBar::help( 'screen.staticcontent' );
		mosMenuBar::endTable();
	}
	//to be removed
	function ABOUT() {
	// JToolBarHelper::title( JText::_( 'Export Content' ), 'frontpage.png' );
  //mosMenuBar::startTable();
 //mosMenuBar::spacer();
  //mosMenuBar::endTable();
	}
}
?>
