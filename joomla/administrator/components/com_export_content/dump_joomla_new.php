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
global $mosConfig_live_site;
/*******************************************
Build xml content file
*******************************************/
function dumping_new_version($sectionid, $cid, $id){
  global $mainframe;

$option = 'com_export_content';
// get params definitions
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
   
$file= fopen("../administrator/components/com_export_content/new_version/install.mysql.utf.sql", "w");
   $_xml .="TRUNCATE TABLE  #__export_sections;\r\n";
  $_xml .="TRUNCATE TABLE  #__export_categories;\r\n";
  $_xml .="TRUNCATE TABLE  #__export_content;\r\n";

 global $database;
/*********************************************
Get info for sections table.
**********************************************/
 $sql="SELECT *FROM #__sections WHERE id IN ( $get_from_section ) ORDER BY `id`ASC";
	$database->setQuery($sql);
    $section_rows = $database->loadObjectList();
	foreach($section_rows as $sect){
	 
 $_xml .="INSERT INTO `#__export_sections` (`id`, `title`,`name`, `alias`, `image`, `scope`, `image_position`,`description`, `published`, `checked_out`, `checked_out_time`, `ordering`, `access`, `count`, `params`)VALUES";
$sect_id               = $sect->id;
$sect_title            = addslashes($sect->title);
$sect_name             = addslashes($sect->name);
$sect_alias            = addslashes($sect->alias);
$sect_image            = addslashes($sect->image);
$sect_scope            = $sect->scope;
$sect_image_position   = $sect->image_position;
$sect_description      = addslashes($sect->description);
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
$_xml .=";\r\n";

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
 
 $_xml .="INSERT INTO #__export_categories (`id`, `parent_id`,`title`, `name`, `alias`, `image`, `section`,`image_position`, `description`, `published`, `checked_out`, `checked_out_time`, `editor`, `ordering`, `access`, `count`, `params`)VALUES";
$cat_id                = $cat->id;
$cat_parent_id         = $cat->parent_id;
$cat_title             = addslashes($cat->title);
$cat_name              = addslashes($cat->name);
$cat_alias             = addslashes($cat->alias);
$cat_image             = addslashes($cat->image);
$cat_section           = $cat->section;
$cat_image_position    = $cat->image_position;
$cat_description       = addslashes($cat->description);
$cat_published         = $cat->published;
$cat_checked_out       = $cat->checked_out;
$cat_checked_out_time  = $cat->checked_out_time;
$cat_editor            = $cat->editor;
$cat_ordering          = $cat->ordering;
$cat_access            = $cat->access;
$cat_count             = $cat->count;
$cat_params            = addslashes($cat->params);

/*********************************************
Setup inserts for sections table.
**********************************************/
$cat_text="('$cat_id','$cat_parent_id','$cat_title','$cat_name','$cat_alias','$cat_image','$cat_section','$cat_image_position','$cat_description','$cat_published','$cat_checked_out','$cat_checked_out_time','$cat_editor','$cat_ordering','$cat_access','$cat_count','$cat_params')";
$_xml .="$cat_text";
$_xml .=";\r\n";

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
	foreach($content_rows as $content){

$_xml .="INSERT INTO #__export_content (`id`, `title`, `alias`, `title_alias`, `introtext`, `fulltext`, `state`,`sectionid`, `mask`, `catid`, `created`, `created_by`, `created_by_alias`, `modified`, `modified_by`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `images`, `urls`, `attribs`, `version`, `parentid`, `ordering`, `metakey`, `metadesc`, `access`, `hits`, `metadata`)VALUES";
/****************************************
Get content items 
****************************************/
$content_id        = $content->id;
$title             = addslashes($content->title);
$title_alias       = addslashes($content->title_alias);
$alias             = addslashes($content->alias);
$intro             = addslashes($content->introtext);;
$full              = addslashes($content->fulltext);
$state             = $content->state;
$sectionid         = $content->sectionid;
$mask              = $content->mask;
$catid             = $content->catid;
$created           = $content->created;
$created_by        = $content->created_by;
$created_by_alias  = addslashes($content->created_by_alias);
$modified          = $content->modified;
$modified_by       = $content->modified_by;
$checked_out       = $content->checked_out;
$checked_out_time  = $content->checked_out_time;
$publish_up        = $content->publish_up;
$publish_down      = $content->publish_down;
$images            = addslashes($content->images);
$urls              = addslashes($content->urls);
$attribs           = $content->attribs;
$version           = $content->version;
$parentid          = $content->parentid;
$ordering          = $content->ordering;
$metakey           = addslashes($content->metakey );
$metadesc          = addslashes($content->metadesc);
$access            = $content->access;
$hits              = $content->hits;
$metadata          = addslashes($content->metadata);
/*********************************************
Setup inserts  statements for content table.
**********************************************/
$text= "('$content_id','$title','$alias','$title_alias','$intro','$full','$state','$sectionid','$mask','$catid','$created','$created_by','$created_by_alias','$modified','$modified_by','$checked_out','$checked_out_time','$publish_up','$publish_down','$images','$urls','$attribs','$version','$parentid','$ordering','$metakey','$metadesc','$access','$hits','$metadata')";

   $_xml .="$text";
    $_xml .=";\r\n";

     }
   //build for UTF8
 fwrite($file, $_xml);
 fclose($file);
   //build for non-UTF8
$file= fopen("../administrator/components/com_export_content/new_version/install.mysql.nonutf8.sql", "w");
 fwrite($file, $_xml);
 fclose($file);
}
?>