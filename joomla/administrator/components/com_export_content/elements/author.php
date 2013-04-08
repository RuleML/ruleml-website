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

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

/**
 * Renders a author element
 *
 * @author 		Louis Landry
 * @package 	Joomla
 * @subpackage	Articles
 * @since		1.5
 */
class JElementAuthor extends JElement
{
	/**
	 * Element name
	 * @access	protected
	 * @var		string
	 */
	var	$_name = 'Author';

	function fetchElement($name, $value, &$node, $control_name)
	{
		return JHTML::_('list.users', $control_name.'['.$name.']', $value);
	}
}