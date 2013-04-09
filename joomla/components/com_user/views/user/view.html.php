<?php
/**
* @version		$Id: view.html.php 14401 2010-01-26 14:10:00Z louis $
* @package		Joomla
* @subpackage	Weblinks
* @copyright	Copyright (C) 2005 - 2010 Open Source Matters. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

// Check to ensure this file is included in Joomla!
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view');

/**
 * HTML View class for the Users component
 *
 * @static
 * @package		Joomla
 * @subpackage	Weblinks
 * @since 1.0
 */
class UserViewUser extends JView
{
	function display( $tpl = null)
	{
		global $mainframe;

		$layout	= $this->getLayout();
		if( $layout == 'form') {
			$this->_displayForm($tpl);
			return;
		}

		if ( $layout == 'login' ) {
			parent::display($tpl);
			return;
		}

		$user =& JFactory::getUser();

		// Get the page/component configuration
		$params = &$mainframe->getParams();

		$menus	= &JSite::getMenu();
		$menu	= $menus->getActive();

		// because the application sets a default page title, we need to get it
		// right from the menu item itself
		if (is_object( $menu )) {
			$menu_params = new JParameter( $menu->params );
			if (!$menu_params->get( 'page_title')) {
				$params->set('page_title',	JText::_( 'Registered Area' ));
			}
		} else {
			$params->set('page_title',	JText::_( 'Registered Area' ));
		}
		$document	= &JFactory::getDocument();
		$document->setTitle( $params->get( 'page_title' ) );

		// Set pathway information
		$this->assignRef('user'   , $user);
		$this->assignRef('params',		$params);

		parent::display($tpl);
	}

	function _displayForm($tpl = null)
	{
		global $mainframe;

		// Load the form validation behavior
		JHTML::_('behavior.formvalidation');

		$user     =& JFactory::getUser();
		$params = &$mainframe->getParams();

		// check to see if Frontend User Params have been enabled
		$usersConfig = &JComponentHelper::getParams( 'com_users' );
		$check = $usersConfig->get('frontend_userparams');

		if ($check == '1' || $check == 1 || $check == NULL)
		{
			if($user->authorize( 'com_user', 'edit' )) {
				$params		= $user->getParameters(true);
			}
		}
		$params->merge( $params );
		$menus	= &JSite::getMenu();
		$menu	= $menus->getActive();

		// because the application sets a default page title, we need to get it
		// right from the menu item itself
		if (is_object( $menu )) {
			$menu_params = new JParameter( $menu->params );
			if (!$menu_params->get( 'page_title')) {
				$params->set('page_title',	JText::_( 'Edit Your Details' ));
			}
		} else {
			$params->set('page_title',	JText::_( 'Edit Your Details' ));
		}
		$document	= &JFactory::getDocument();
		$document->setTitle( $params->get( 'page_title' ) );

		$this->assignRef('user'  , $user);
		$this->assignRef('params', $params);

		parent::display($tpl);
	}
}
