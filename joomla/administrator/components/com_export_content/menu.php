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
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

global $database,$mosConfig_host,$mosConfig_password, $mosConfig_user, $mosConfig_live_site, $mosConfig_db, $my, $mainframe, $mosConfig_list_limit, $mosConfig_dbprefix, $mosConfig_lang, $adminName, $mosConfig_sitename;?>
 <script type="text/javascript" src="../includes/js/joomla.javascript.js"></script>
  <script type="text/javascript" src="http://localhost/joomlarc/media/system/js/mootools.js"></script>
  <script type="text/javascript" src="http://localhost/joomlarc/media/system/js/tabs.js"></script>
  <script type="text/javascript" src="http://localhost/joomlarc/includes/js/calendar/calendar_mini.js"></script>
  <script type="text/javascript" src="http://localhost/joomlarc/includes/js/calendar/lang/calendar-en-GB.js"></script>
  <script type="text/javascript" src="http://localhost/joomlarc/media/system/js/modal.js"></script>
  <?php
$base_nav='../administrator/index.php?option=com_export_content';
$image_path= "$mosConfig_live_site/administrator/components/com_export_content/images/";
?>

<link rel="stylesheet" href="../administrator/components/com_export_content/export_content.css" type="text/css" />
<style>
.give{
	position:absolute;
/*	display:block;*/
	top:110px;
	left:30px;
	height:100px;
}
</style>
<div class="give"><a href="http://www.bestdownloadsites.com/export_content/content/view/7/12/" target="blank"  title="<?php echo _CFG_DONATE;?>">
  <img src="<?php echo $image_path;?>headtxt.gif" width="282px" height="41px" align="middle" border="0"/></a></div>
<?php


function corners_top(){
    $_htm ="";
    $_htm .="<div class=\"clr\"></div>";
	$_htm .="<div id=\"element-box\">";
	$_htm .="<div class=\"t\"><div class=\"t\"></div>";
	$_htm .="</div></div><div class=\"m\">";
	echo $_htm;
}
function corners_botttom(){
    $_htm ="";
    $_htm .="<div class=\"clr\"></div></div>";
	$_htm .="<div class=\"b\">";
	$_htm .="<div class=\"b\">";
	$_htm .="<div class=\"b\"></div></div></div></div>";
	echo $_htm;
}
echo "<div class=\"main_headings\">";
/**************************************
Menu layout
**************************************/

global $mosConfig_sitename;
 $hiden = mosGetParam( $_REQUEST, 'hiden' );
$tasks 		= mosGetParam( $_REQUEST, 'task');
	switch ($task) {
	 case "sections_to_export" :
    if($hiden =='1'){
     echo "<img src=\"$image_path/exsect.png\" />";
	 echo _COMPILE_SITE_HEADING;
	 echo  "&nbsp;";
	 echo $mosConfig_sitename;
 	 echo "</div>";
	 echo "<div class=\"static_page_txt\">";
     echo _EXPORT_NOTE;
	 echo "</div>";
	 corners_botttom();
	   }else{
     echo "<img src=\"$image_path/exsect.png\" />";
	 echo _COMPILE_SITE_HEADING;
	 echo  "&nbsp;";
	 echo $mosConfig_sitename;
	 echo "</div>";
	 corners_botttom();
	}
break;
	 
	case "viewExport_static" :
	if($hiden =='1'){
	 echo "<img src=\"$image_path/export_icon.png\" />";
	 echo _COMPILE_STATIC_HEADING;
	 echo  "&nbsp;";
	 echo $mosConfig_sitename;
 	 echo "</div>";
	 echo "<div class=\"static_page_txt\">";
     echo _EXPORT_STATIC_NOTE; 
     echo "</div>";
	 corners_botttom();
	   }else{
     echo "<img src=\"$image_path/export_icon.png\" />";
	 echo _COMPILE_STATIC_HEADING;
	 echo  "&nbsp;";
	 echo $mosConfig_sitename;
	 echo "</div>";	
	 corners_botttom();
	}
break;

	case "sections" :
	if($hiden =='1'){
	echo "<img src=\"$image_path/sections.png\" />";
	 echo _SECTION_HEADING;
	echo "</div>";
	 echo "<div class=\"static_page_txt\">";
     echo _SECTIONS_NOTE; 
	 echo $mosConfig_sitename;
     echo ".<BR/><BR/>";
     echo _ADD_ARCHIVE_NOTE;
	  echo "</div>";
	 corners_botttom();
	   }else{
     echo "<img src=\"$image_path/sections.png\" />";
	 echo _SECTION_HEADING;
	 echo "</div>";	
	 corners_botttom();	
	}
break;

	case "categories" :
	if($hiden =='1'){
	 echo "<img src=\"$image_path/category.png\" />";
	 echo _CATEGORY_HEADING;
	 echo "</div>";
	 echo "<div class=\"static_page_txt\">";
     echo _CATEGORIES_NOTE; 
     echo  "&nbsp;";
	 echo $mosConfig_sitename;
     echo ".<BR/><BR/>";
     echo _ADD_ARCHIVE_NOTE;
     	   echo "</div>";
	 corners_botttom();
	   }else{
	 echo "<img src=\"$image_path/category.png\" />";
	 echo _CATEGORY_HEADING;
	 echo "</div>";	
	 corners_botttom();
	}
break;

	case "content_items" :
	if($hiden =='1'){
	 echo "<img src=\"$image_path/content.png\" />";
	 echo _ITEMS_HEADING;
	 echo "</div>";
	 echo "<div class=\"static_page_txt\">";
     echo _CONTENT_NOTE; 
    // echo  "&nbsp;";
	// echo $mosConfig_sitename;
	 echo "</div>";
	 corners_botttom();
	   }else{
     echo "<img src=\"$image_path/content.png\" />";
	 echo _ITEMS_HEADING;
	 echo "</div>";	
	 corners_botttom();
	}
break;


	case "static_content" :
	if($hiden =='1'){
	 echo "<img src=\"$image_path/static.png\" />";
	 echo _STATIC_HEADING;
	 echo "</div>";
	 echo "<div class=\"static_page_txt\">";
	 echo "<br/>"; 
	 echo _STATIC_WARN;
     echo "<BR/>"; 
     echo _STATIC_NOTE; 
     echo "</div>";
	 corners_botttom();
	   }else{
     echo "<img src=\"$image_path/static.png\" />";
	 echo _STATIC_HEADING;
	 echo "<br/>"; 
	 echo _STATIC_WARN;
	 echo "</div>";	
	 corners_botttom();	
	}
break;

	case "showexportarchive" :
	if($hiden =='1'){
	 echo "<img src=\"$image_path/archive.png\" />";
	 echo _ARCHIVE_ITEMS_HEADING;
	 echo "</div>";
	 echo "<div class=\"static_page_txt\">";
     echo _CONTENT_NOTE;
     echo "</div>";
	 corners_botttom();
	 }else{
      echo "<img src=\"$image_path/archive.png\" />";
	 echo _ARCHIVE_ITEMS_HEADING;
	 echo "</div>";	
	 corners_botttom();
	}
break;
}
 echo "<BR />";
 echo "</div>";
 ?>
 
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="main_tab">

  <tr>
    <td rowspan="2" valign="top" width="11%"  class="menu_tab">
 
      <table width="150" border="0" cellspacing="0" cellpadding="0" class="menu">
        <tr>
        <td class="menu_head"><?php echo _MENU_HEADING;?></td>
        </tr>
        <tr>
     
          <th class="nav"><a href="../administrator/index.php?option=com_export_content&task=sections_to_export"><?php echo _MENU_EXPORT;?></a></th>
              </tr>
		<tr>
          <th class="nav"><a href="<?php echo $base_nav;?>&task=viewExport_static"><?php echo _MENU_EXPORT_STATIC;?></a></th>
        </tr>
        <tr> <td class="menu_head"><?php echo _MENU_TRANS_HEADING;?></td>
        </tr>
        <tr>
          <th class="nav"><a href="<?php echo $base_nav;?>&task=sections"><?php echo _MENU_SECTIONS; ?></a></th>
        </tr>
        <tr>
          <th class="nav"><a href="<?php echo $base_nav;?>&task=categories"><?php echo _MENU_CATEGORIES; ?></a></th>
        </tr>
        <tr>
          <th class="nav"><a href="<?php echo $base_nav;?>&task=content_items"><?php echo _MENU_ITEMS; ?></a></th>
        </tr>
        <tr>
        <th class="nav"><a href="<?php echo $base_nav;?>&task=static_content"><?php echo _MENU_STATIC; ?></a></th>
        </tr>
        
        <tr>
        <th class="nav"><a href="<?php echo $base_nav;?>&task=showexportarchive"><?php echo _MENU_ARCHIVES; ?></a></th>
         
        <tr> <td class="menu_head"><?php echo _MENU_SUPPORT_HEADING;?></td>
        </tr>
       <tr>
                <?php 
        
    $tasks 		= mosGetParam( $_REQUEST, 'task');
    $update_link=" ../administrator/components/com_export_content/help.php?task=$tasks&lang=$mosConfig_lang";
    switch ($tasks) {
    case "sections_to_export" :
    $height='420';
    break;
    	
    case "viewExport_static" :
    case "showexportarchive" :
    $height='380';
    break;
    	
    case "sections" :
    case "categories" :
    case "content_items" :
    case "static_content" :
    $height='300';
    	break;
	
    case "download_data" :
	$height='270';
	break;
	
	default:
//	case "exhelps" :
	$height='600';
	break;
  } 
       echo "<th></tr><tr>";
     $status= "toolbar=no, scrollbars=yes, menubar=no, resizable=no, width=600, height=$height, location=no, left=300, top=10";
        ?>
        <th class="nav"><a href="<?php echo $update_link;?>" onclick="NewWin=window.open(this.href,this.target,'<?php echo $status;
?>'); return false;" title="<?php echo  _MENU_HELP_TITLE;?>"><?php echo  _MENU_HELP;?></a></th>
        </tr>
        <tr> 
		<?php
	
 $help_link="../administrator/components/com_export_content/help.php?lang=$mosConfig_lang";
     $status= 'toolbar=no, scrollbars=yes, menubar=no, resizable=no, width=690, height=600, location=no, left=300, top=10';
        ?>
        <th class="nav"><a href="<?php echo $help_link;?>" onclick="NewWin=window.open(this.href,this.target,'<?php echo $status;
?>'); return false;" title="<?php echo  _MENU_EXHELP_TITLE;?>"><?php echo  _MENU_EXHELP;?></a></th>
        </tr>
        <tr>

          <th class="nav"><a href="<?php echo $base_nav?>&task=about"><?php echo _MENU_ABOUT;?></a></th>

        </tr>
<tr>
          <th class="nav"><a href="http://www.bestdownloadsites.com/export_content/component/option,com_fireboard/Itemid,13/" target="blank"><?php echo _SUPPORT_FORUM;?></a>
</th>
</tr>
          <th class="nav"><a href="http://joomlacode.org/gf/project/com_export_co1/frs/" target="blank"><?php echo _VERSION;?></a>
</th>

</tr>
          <th class="nav"><a href="http://www.bestdownloadsites.com/export_content/content/view/7/12/" target="blank"><?php echo _DONATE;?></a>
</th>

</tr>
<tr>
<th><span class="version"><?php echo THIS_VERSION;?>: 2.0.0</span></th></tr>
</table>
</td>

    <td valign="top" align="center" class="foot">
    <?php
   
//$powered= '<font size="-2" color="#006699;">Export Content Is Powered by:<BR/><a href="http://www.bestdownloadsites.com/" target="_blank">Best Download Sites </a></font></td></tr></table>';
?>