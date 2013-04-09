<?php
/**
* @version		$Id: toolbar.templates.php 14401 2010-01-26 14:10:00Z louis $
* @package		Joomla
* @subpackage	Templates
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

require_once( JApplicationHelper::getPath( 'toolbar_html' ) );

$client	=& JApplicationHelper::getClientInfo(JRequest::getVar('client', '0', '', 'int'));

switch ($task)
{
	case 'view'   :
	case 'preview':
		TOOLBAR_templates::_VIEW($client);
		break;

	case 'edit_source':
		TOOLBAR_templates::_EDIT_SOURCE($client);
		break;

	case 'edit':
		TOOLBAR_templates::_EDIT($client);
		break;

	case 'choose_css':
		TOOLBAR_templates::_CHOOSE_CSS($client);
		break;

	case 'edit_css':
		TOOLBAR_templates::_EDIT_CSS($client);
		break;

	default:
		TOOLBAR_templates::_DEFAULT($client);
		break;
}