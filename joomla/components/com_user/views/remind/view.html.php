<?php
/**
 * @version		$Id: view.html.php 14401 2010-01-26 14:10:00Z louis $
 * @package		Joomla
 * @subpackage	User
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant to the
 * GNU General Public License, and as distributed it includes or is derivative
 * of works licensed under the GNU General Public License or other free or open
 * source software licenses. See COPYRIGHT.php for copyright notices and
 * details.
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * HTML View class for the Users component
 *
 * @package		Joomla
 * @subpackage	User
 * @since		1.5
 */
class UserViewRemind extends JView
{
	/**
	 * Registry namespace prefix
	 *
	 * @var	string
	 */
	var $_namespace	= 'members.remind.';

	/**
	 * Display function
	 *
	 * @since 1.5
	 */
	function display($tpl = null)
	{
		jimport('joomla.html.html');
		$mainframe = &JFactory::getApplication();

		// Get the page/component configuration
		$params = &$mainframe->getParams();

		$menus	= &JSite::getMenu();
		$menu	= $menus->getActive();

		// because the application sets a default page title, we need to get it
		// right from the menu item itself
		if (is_object( $menu )) {
			$menu_params = new JParameter( $menu->params );
			if (!$menu_params->get( 'page_title')) {
				$params->set('page_title',	JText::_( 'FORGOT_YOUR_USERNAME' ));
			}
		} else {
			$params->set('page_title',	JText::_( 'FORGOT_YOUR_USERNAME' ));
		}
		$document	= &JFactory::getDocument();
		$document->setTitle( $params->get( 'page_title' ) );


		// Load the form validation behavior
		JHTML::_('behavior.formvalidation');

		// Add the tooltip behavior
		JHTML::_('behavior.tooltip');

		$this->assignRef('params',		$params);

		parent::display($tpl);
	}
}
