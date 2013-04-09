<?php
/**
 * @version		$Id: media.php 14401 2010-01-26 14:10:00Z louis $
 * @package		Joomla
 * @subpackage	Massmail
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant to the
 * GNU General Public License, and as distributed it includes or is derivative
 * of works licensed under the GNU General Public License or other free or open
 * source software licenses. See COPYRIGHT.php for copyright notices and
 * details.
 */

// no direct access
defined('_JEXEC') or die('Restricted access');
$params =& JComponentHelper::getParams('com_media');
// Make sure the user is authorized to view this page
$user = & JFactory::getUser();
if (!$user->authorize( 'com_media', 'popup' )) {
	$mainframe->redirect('index.php', JText::_('ALERTNOTAUTH'));
}

// Set the path definitions
define('COM_MEDIA_BASE',    JPath::clean(JPATH_ROOT.DS.$params->get('image_path', 'images'.DS.'stories')));
define('COM_MEDIA_BASEURL', JURI::root(true).'/'.$params->get('image_path', 'images/stories'));

// Load the admin HTML view
require_once( JPATH_COMPONENT_ADMINISTRATOR.DS.'helpers'.DS.'media.php' );

// Require the base controller
require_once (JPATH_COMPONENT.DS.'controller.php');

$cmd = JRequest::getCmd('task', null);
if (strpos($cmd, '.') != false)
{
	// We have a defined controller/task pair -- lets split them out
	list($controllerName, $task) = explode('.', $cmd);

	// Define the controller name and path
	$controllerName	= strtolower($controllerName);
	$controllerPath	= JPATH_COMPONENT_ADMINISTRATOR.DS.'controllers'.DS.$controllerName.'.php';

	// If the controller file path exists, include it ... else lets die with a 500 error
	if (file_exists($controllerPath)) {
		require_once($controllerPath);
	} else {
		JError::raiseError(500, 'Invalid Controller');
	}
}
else
{
	// Base controller, just set the task :)
	$controllerName = null;
	$task = $cmd;
}
// Set the name for the controller and instantiate it
$controllerClass = 'MediaController'.ucfirst($controllerName);
if (class_exists($controllerClass)) {
	$controller = new $controllerClass();
} else {
	JError::raiseError(500, 'Invalid Controller Class');
}

// Set the model and view paths to the administrator folders
$controller->addViewPath(JPATH_COMPONENT_ADMINISTRATOR.DS.'views');
$controller->addModelPath(JPATH_COMPONENT_ADMINISTRATOR.DS.'models');

// Perform the Request task
$controller->execute($task);

// Redirect if set by the controller
$controller->redirect();
