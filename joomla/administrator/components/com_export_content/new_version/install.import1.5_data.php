<?php


/**
* yvComment plugin - A User Comments Component, developed for Joomla 1.5
* @version 1.1.1
* @package yvCommentPlugin
* @(c) 2007 yvolk (Yuri Volkov), http://yurivolkov.com. All rights reserved.
* @license GPL
**/

defined('_JEXEC') or die('Restricted access'); // no direct access

function com_install() {
	global $mainframe;
	//$Ok = false;
//	$db = & JFactory :: getDBO();

	//$lang = & JFactory :: getLanguage();
//	$lang->load('com_yvcomment', JPATH_SITE);
//	$template = $mainframe->getTemplate();

	// This is a hack in order to see views of this extension in the "New menu item type" window
	// This hack is not needed if extension has backend menu item.
//	$query = "UPDATE `#__components` SET link='" . "option=com_yvcomment" . "' WHERE `option` = 'com_yvcomment'";
//	$db->setQuery($query);
//	$Ok = $db->query();
	//	$Ok = true;

	//if (!$Ok) {
	//	JError :: raiseError(500, $db->stderr());
	//	return false;
	//} else {
?>
		<fieldset class="adminform">
		<legend>
		Team
		<?php //echo JText::_( 'CREDITS'); ?>
		</legend>
		<table class="admintable" width="100%">
			<tr>
				<th width="40%">
				Project Developer
				<?php //echo JText::_( 'CREDITS_NAMES'); ?>
				</th>
				<th width="60%">
				Contributers
				<?php //echo JText::_( 'CONTRIBUTION'); ?>
				</th>
			</tr>
			<tr>
				<td class="name">
				  Stephen Harrison
				</td>
				<td>A big Thankyou to all BETA testers.
				
				</td>
			</tr>
		</table>
		</fieldset>
		
		<fieldset class="adminform">
		<legend><?php //echo JText::_( 'DESCRIPTION'); ?>
		</legend>
		<table class="admintable" width="100%">
			<tr><td>
  <p>This component has served its purpose of populating the Export Content Database and may safely be removed</p>
		<p><b>Note:</b> This is necessary before attempting to import any further content.</p>

 <p>For the latest and complete information about this extension see <a href="http://www.bestdownloadsites.com/export_content" target="_blank">Export Content Home Page</a>.
  </p> 
			</td>
			</tr>
		</table>
		</fieldset>
<?php


	//} //else
}
?>
