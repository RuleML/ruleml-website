<?php
/**
* @version		$Id: helper.php 14401 2010-01-26 14:10:00Z louis $
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
defined('_JEXEC') or die('Restricted access');

class modWhosonlineHelper {

	// show online count
	function getOnlineCount() {
	    $db		  =& JFactory::getDBO();
		$sessions = null;
		// calculate number of guests and members
		$result      = array();
		$user_array  = 0;
		$guest_array = 0;

		$query = 'SELECT guest, usertype, client_id' .
					' FROM #__session' .
					' WHERE client_id = 0';
		$db->setQuery($query);
		$sessions = $db->loadObjectList();

		if ($db->getErrorNum()) {
			JError::raiseWarning( 500, $db->stderr() );
		}

		if (count($sessions)) {
		    foreach ($sessions as $session) {
			    // if guest increase guest count by 1
				if ($session->guest == 1 && !$session->usertype) {
				    $guest_array ++;
				}
				// if member increase member count by 1
				if ($session->guest == 0) {
					$user_array ++;
				}
			}
		}

		$result['user']  = $user_array;
		$result['guest'] = $guest_array;

		return $result;
	}

	// show online member names
	function getOnlineMemberNames() {
	    $db		=& JFactory::getDBO();
		$result	= null;

		$query = 'SELECT DISTINCT a.username' .
				 ' FROM #__session AS a' .
				 ' WHERE client_id = 0' .
				 ' AND a.guest = 0';
		$db->setQuery($query);
		$result = $db->loadObjectList();

		if ($db->getErrorNum()) {
			JError::raiseWarning( 500, $db->stderr() );
		}

		return $result;
	}
}
