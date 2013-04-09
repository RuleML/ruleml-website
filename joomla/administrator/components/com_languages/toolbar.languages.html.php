<?php
/**
* @version		$Id: toolbar.languages.html.php 14401 2010-01-26 14:10:00Z louis $
* @package		Joomla
* @subpackage	Languages
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

/**
* @package		Joomla
* @subpackage	Languages
*/
class TOOLBAR_languages
{
	function _DEFAULT()
	{
		JToolBarHelper::title( JText::_( 'Language Manager' ), 'langmanager.png' );
		JToolBarHelper::makeDefault( 'publish' );
		JToolBarHelper::help( 'screen.languages' );
	}
}