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
// Set flag that this is a parent file
define( "_JEXEC", 1 );?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
/***************
Page text
***************/
/*.helptxt{
  color:#4D4D4D;
  font-weight:500;
  font-size:12px;
  text-align:left;
  margin-left:10px;
  font-family: verdana, Tahoma, arial;
}*/
.helptxt{
	color:#333333;
	  font-family:verdana;
  font-size:11px;
  font-weight:500;
  
}
/*****************
Cose page button
*****************/
.close {
  color:#999999;
  font-weight:500;
  border-style:solid;
  border-width:1px;
  border-color:#999999;
  padding-left:2px;
  padding-right:2px;
  padding-top:2px;
  padding-bottom:2px;
  background-image: url(images/background.gif);
}
/*********************
Page text Where NOTE:
**********************/
.note{
  color:#0066FF;
  font-style:italic;
  font-family: verdana, Tahoma, arial;
  }
h3{
 color:#55AAFF;
  font-weight:900;
  font-size:18px;
  text-align:center;
  }
</style>
</head>
<body>
<?php
$Config_lang = strval($_GET["lang"]);
if (file_exists( 'language/'.$Config_lang.'.php')) {
  require_once( 'language/'.$Config_lang.'.php');
} else {
  require_once( 'language/english.php');
}
 $image_path= "$mosConfig_live_site/administrator/components/com_export_content/images/";
     $task =  strval($_GET["task"]);
	 
     echo "<span class=\"helptxt\">";
    
     switch ($task) {
      
     case "sections_to_export" :
	 echo "	<b><h3><u>";
	 echo _COMPILE_SITE_HELP;
	 echo "	</u></h3></b>";
     echo _EXPORT_NOTE;
	 echo "<BR/>";
	 break;
		
	 case "viewExport_static" :
     echo "	<b><h3><u>";
	 echo _COMPILE_STATIC_HELP;
	 echo "	</u></h3></b>";
     echo _EXPORT_STATIC_NOTE;  
     echo "<BR/>";
     break;
     
     	case "sections" :
     echo "<b><h3><u>";
	 echo _SECTION_HEADING;
	 echo "	</u></h3></b>";
     echo _SECTIONS_NOTE; 
	 echo $mosConfig_sitename;
     echo ".<BR/><BR/>";
     echo _ADD_ARCHIVE_NOTE;
     break;

	 case "categories" :
     echo "<b><h3><u>";
	 echo _CATEGORY_HEADING;
	 echo "</u></h3></b>";
     echo _CATEGORIES_NOTE; 
     echo ".<BR/><BR/>";
     echo _ADD_ARCHIVE_NOTE;
     break;

	 case "content_items" :
     echo "<b><h3><u>";
	 echo _ITEMS_HEADING;
	 echo "</u></h3></b>";
     echo _CONTENT_NOTE; 
     echo  "&nbsp;";
	 break;


	 case "static_content" :
	 echo "<b><h3><u>";
	 echo _STATIC_HEADING;
	 echo "</u></h3></b>";
	 echo "<img src=\"images/warning.png\" width=\"16\" height=\"16\">";
	 echo _STATIC_WARN;
	 echo "....";
     echo _STATIC_NOTE; 
     break;

	case "showexportarchive" :
	echo "<b><h3><u>";
	echo _ARCHIVE_ITEMS_HEADING;
	echo "</u></h3></b>";
	echo _ARCHIVE_CONTENT_NOTE;
    break;
    
    case "download_data" :
    echo _DOWNLOAD_HELP;
	break;
	
	default:
	echo _HELP_TEXT;
	break;
	
		}
    ?>
<div align="center">
<BR /><BR />
<input type="button" value="Close Window" onClick="window.close();"class="close"/>
</div>
</body></html>
