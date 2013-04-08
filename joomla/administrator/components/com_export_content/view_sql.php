<?php
/*
* @package Export Content
* @copyright Copyright (C) 2007 www.bestdownloadsites.com All rights reserved.
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
<head>
<style>
div.css{
	width:98%;
	word-wrap: break-word;
	font-size:12px;
	background-color:#FFFFFF;
}
h5{
	color:#000000;
	border:1px;
	border-style:solid;
	border-color:#AAD4FF;
	background-color:#AAD4FF;
	padding-left:10px;
	font-size:14px;
}
</style>
</head>
<body bgcolor="#FFFFFF">
<?php
global $database,$mosConfig_host,$mosConfig_password, $mosConfig_user, $mosConfig_live_site, $mosConfig_db, $my, $mainframe, $mosConfig_list_limit, $mosConfig_dbprefix, $mosConfig_lang, $adminName, $mosConfig_sitename;
//if (file_exists('language/'.$mosConfig_lang.'.php')) {
  //require_once('language/'.$mosConfig_lang.'.php');
//} else {
  //require_once('language/english.php');
//}
$Config_lang = strval($_GET["lang"]);
if (file_exists( 'language/'.$Config_lang.'.php')) {
  require_once( 'language/'.$Config_lang.'.php');
} else {
  require_once( 'language/english.php');
}
   include_once('geshi/geshi.php');
  // echo '<div class=\"selector\" align=\"left\">';
  $dp = "new_version/install.mysql.utf.sql";
  if (!$dp) 
    {
      echo("<P>Error: unable to load URL file into $dp.  Process aborted.</P>");
      exit();
    }
  $header_content= _VIEW_CODE;;
  $footer_content= _VIEW_CODE;
  $sp = file_get_contents($dp);
  $language = 'css';

// Create a GeSHi object
$geshi =& new GeSHi($sp, $language);
$geshi->set_header_type(GESHI_HEADER_DIV);
$geshi->set_header_content($header_content); 
$geshi->set_footer_content($footer_content); 
echo $geshi->parse_code(); 
echo "<a href=\"#\">Top of page.</a>";
?>
       <div align="center">
     <input type="button" value="Close Window" onClick="window.close();"class="close"/>
    </div>
    </div>
</body>
</html>
