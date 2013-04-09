<?php
/***
* @version : 1.0
* @package Export Content
* @copyright Copyright (C) 2008 www.bestdownloadsites.com All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL,
* Export Content is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*/


defined('_JEXEC') or die('Restricted access'); // no direct access

function com_install() {
	global $mainframe;

?>
		<fieldset class="adminform">
		<legend>
		<?php echo JText::_( 'CREDITS'); ?>
		</legend>
		<table class="admintable" width="100%">
			<tr>
				<th width="40%">
				<?php echo JText::_( 'DEVELOPER'); ?>
				</th>
				<th width="60%">
				
				<?php echo JText::_( 'CONTRIBUTION'); ?>
				</th>
			</tr>
			<tr>
				<td class="name">
				  Stephen Harrison
				</td>
				<td>
				 <?php echo JText::_( 'Thankyou to all Beta testers.'); ?>
		
				</td>
			</tr>
		</table>
		</fieldset>
		
		<fieldset class="adminform">
		<legend><?php echo JText::_( 'DESCRIPTION'); ?>
		</legend>
		<table class="admintable" width="100%">
			<tr><td>
  <p> 
<?php
	  DEFINE( '_EXPORT_BASE_PATH', '../administrator/components/com_export_content/' );
if (file_exists(_EXPORT_BASE_PATH . 'language/'.$mosConfig_lang.'.php')) {
  require_once(_EXPORT_BASE_PATH . 'language/'.$mosConfig_lang.'.php');
} else {
  require_once(_EXPORT_BASE_PATH . 'language/english.php');
}
echo "<h3>";
echo _IMPORT_REMOVE;
echo " ";
echo _IMPORT_NEW_VERSION;
echo "<BR /><BR />";
echo _IMPORT_REMOVE_DATA;
echo "</h3><p>";
echo _IMPORT_INFO_LINK;
echo "</p>";
?>
			</td>
			</tr>
		</table>
		</fieldset>
<?php
}
?>
