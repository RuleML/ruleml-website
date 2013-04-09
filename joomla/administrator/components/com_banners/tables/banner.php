<?php
/**
 * @version		$Id: banner.php 14401 2010-01-26 14:10:00Z louis $
 * @package		Joomla
 * @subpackage	Banners
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
 * @subpackage	Banners
 */
class TableBanner extends JTable
{
	/** @var int */
	var $bid				= null;
	/** @var int */
	var $cid				= null;
	/** @var string */
	var $type				= '';
	/** @var string */
	var $name				= '';
	/** @var string */
	var $alias				= '';
	/** @var int */
	var $imptotal			= 0;
	/** @var int */
	var $impmade			= 0;
	/** @var int */
	var $clicks				= 0;
	/** @var string */
	var $imageurl			= '';
	/** @var string */
	var $clickurl			= '';
	/** @var date */
	var $date				= null;
	/** @var int */
	var $showBanner			= 0;
	/** @var int */
	var $checked_out		= 0;
	/** @var date */
	var $checked_out_time	= 0;
	/** @var string */
	var $editor				= '';
	/** @var string */
	var $custombannercode	= '';
	/** @var int */
	var $catid				= null;
	/** @var string */
	var $description		= null;
	/** @var int */
	var $sticky				= null;
	/** @var int */
	var $ordering			= null;
	/** @var date */
	var $publish_up			= null;
	/** @var date */
	var $publish_down		= null;
	/** @var string */
	var $tags				= null;
	/** @var string */
	var $params				= null;

	function __construct( &$_db )
	{
		parent::__construct( '#__banner', 'bid', $_db );


		$now =& JFactory::getDate();
		$this->set( 'date', $now->toMySQL() );
	}

	function clicks()
	{
		$query = 'UPDATE #__banner'
		. ' SET clicks = ( clicks + 1 )'
		. ' WHERE bid = ' . (int) $this->bid
		;
		$this->_db->setQuery( $query );
		$this->_db->query();
	}

	/**
	 * Overloaded check function
	 *
	 * @access public
	 * @return boolean
	 * @see JTable::check
	 * @since 1.5
	 */
	function check()
	{
		// check for valid client id
		if (is_null($this->cid) || $this->cid == 0) {
			$this->setError(JText::_( 'BNR_CLIENT' ));
			return false;
		}

		// check for valid name
		if(trim($this->name) == '') {
			$this->setError(JText::_( 'BNR_NAME' ));
			return false;
		}

		if(empty($this->alias)) {
			$this->alias = $this->name;
		}
		$this->alias = JFilterOutput::stringURLSafe($this->alias);

		/*if(trim($this->imageurl) == '') {
			$this->setError(JText::_( 'BNR_IMAGE' ));
			return false;
		}
		if(trim($this->clickurl) == '' && trim($this->custombannercode) == '') {
			$this->setError(JText::_( 'BNR_URL' ));
			return false;
		}*/

		return true;
	}
}
?>
