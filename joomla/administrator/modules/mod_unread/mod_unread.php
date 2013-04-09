<?php
/**
* @version		$Id: mod_unread.php 14401 2010-01-26 14:10:00Z louis $
* @package		Joomla
* @copyright	Copyright (C) 2005 - 2010 Open Source Matters. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

$db =& JFactory::getDBO();
$user =& JFactory::getUser();

$query = 'SELECT COUNT(*)'
. ' FROM #__messages'
. ' WHERE state = 0'
. ' AND user_id_to = '.(int) $user->get('id')
;
$db->setQuery( $query );
$unread = $db->loadResult();

if ($unread) {
	echo "<a href=\"index.php?option=com_messages\" style=\"color: red; text-decoration: none;  font-weight: bold\">$unread <img src=\"images/mail.png\" align=\"middle\" border=\"0\" alt=\"". JText::_( 'Mail' ) ."\" /></a>";
} else {
	echo "<a href=\"index.php?option=com_messages\" style=\"color: black; text-decoration: none;\">$unread <img src=\"images/nomail.png\" align=\"middle\" border=\"0\" alt=\"". JText::_( 'Mail' ) ."\" /></a>";
}