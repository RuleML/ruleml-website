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
function dumping_new_version_static($option,$cid){
   global $mainframe;

$option = 'com_export_content';
// get params definitions
   $static_id	      = mosGetParam( $_REQUEST, 'cid', 'cid' );
   $cids  = implode( ',', $static_id );

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

 /*********************************************************************
To stop static items being compiled by default.
***********************************************************************/

   global $database;
$sql="SELECT * FROM #__content WHERE id IN ( $cids )"
. "\n  ORDER BY `id` ASC"
;
	
	$database->setQuery($sql);
   $content_rows = $database->loadObjectList();
  // $content_rows = $database->getEscaped( $content_rows);
	foreach($content_rows as $content){
//$_xml .="<query><![CDATA[";
$_xml .="INSERT INTO #__export_content (`id`, `title`, `alias`, `title_alias`, `introtext`, `fulltext`, `state`,`sectionid`, `mask`, `catid`, `created`, `created_by`, `created_by_alias`, `modified`, `modified_by`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `images`, `urls`, `attribs`, `version`, `parentid`, `ordering`, `metakey`, `metadesc`, `access`, `hits`, `metadata`)VALUES";
/****************************************
Get content items 
****************************************/
$content_id        = $content->id;
$title             = addslashes($content->title);
$title_alias       = addslashes($content->title_alias);
$alias             = addslashes($content->alias);
$intro             = addslashes($content->introtext);
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
 //build for non UTF8
$file= fopen("../administrator/components/com_export_content/new_version/install.mysql.nonutf8.sql", "w");

 fwrite($file, $_xml);
 fclose($file);
}
?>