<?php
/**
* @version		$Id: helpsites.php 14401 2010-01-26 14:10:00Z louis $
* @package		Joomla.Framework
* @subpackage	Parameter
* @copyright	Copyright (C) 2005 - 2010 Open Source Matters. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

// Check to ensure this file is within the rest of the framework
defined('JPATH_BASE') or die();

/**
 * Renders a helpsites element
 *
 * @package 	Joomla.Framework
 * @subpackage		Parameter
 * @since		1.5
 */

class JElementHelpsites extends JElement
{
	/**
	* Element name
	*
	* @access	protected
	* @var		string
	*/
	var	$_name = 'Helpsites';

	function fetchElement($name, $value, &$node, $control_name)
	{
		jimport('joomla.language.help');

		$helpsites 				= JHelp::createSiteList(JPATH_ADMINISTRATOR.DS.'help'.DS.'helpsites-15.xml', $value);
		array_unshift($helpsites, JHTML::_('select.option', '', JText::_('local')));

		return JHTML::_('select.genericlist',  $helpsites, ''.$control_name.'['.$name.']', ' class="inputbox"', 'value', 'text', $value, $control_name.$name );
	}
}
