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
				Name
				<?php //echo JText::_( 'CREDITS_NAMES'); ?>
				</th>
				<th width="60%">
					<?php echo JText::_( 'Project Site'); ?>
				
				</th>
			</tr>
			<tr>
				<td class="name">
				  Stephen Harrison
				</td>
				<td> <a href="http://www.bestdownloadsites.com/export_content/" target="_blank">Export Information Site</a>
				
				</td>
			</tr>
		</table>
		</fieldset>
		
		<fieldset class="adminform">
		<legend>
		<?php echo JText::_( 'DESCRIPTION'); ?>
		</legend>
		<table class="admintable" width="100%">
			<tr><td>
    
    To import/export data between Joomla-Mambo based sites this component needs to be installed on both the source and destination sites.<BR/><BR/>
    You will then be able to move content between different Joomla versions.<BR/><BR/>
<b>Note:</b> Please make sure you download the correct version of Export Content for either Joomla 1.5+ series or 1.0+ series.<BR/><BR/>
<p>
    For help go to <a href="http://www.bestdownloadsites.com/export_content/component/option,com_fireboard/Itemid,13/" target="blank">Export Content Support</a>.
    <p> 
			</td>
			</tr>
		</table>
		</fieldset>
<?php
}
?>
