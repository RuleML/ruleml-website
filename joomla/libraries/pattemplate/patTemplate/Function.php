<?PHP
/**
 * Base class for patTemplate functions
 *
 * $Id: Function.php 10381 2008-06-01 03:35:53Z pasamio $
 *
 * @package		patTemplate
 * @subpackage	Functions
 * @author		Stephan Schmidt <schst@php.net>
 */

// Check to ensure this file is within the rest of the framework
defined('JPATH_BASE') or die();

/**
 * function is executed, when template is compiled (preg_match)
 */
define('PATTEMPLATE_FUNCTION_COMPILE', 1);

/**
 * function is executed, when template parsed
 */
define('PATTEMPLATE_FUNCTION_RUNTIME', 2);

/**
 * Base class for patTemplate functions
 *
 * $Id: Function.php 10381 2008-06-01 03:35:53Z pasamio $
 *
 * @abstract
 * @package		patTemplate
 * @subpackage	Functions
 * @author		Stephan Schmidt <schst@php.net>
 */
class patTemplate_Function extends patTemplate_Module
{
	/**
	* reader object
	*
	* @access private
	* @var	  object
	*/
	var $_reader;

	/**
	* function type
	*
	* @access public
	* @var	  integer
	*/
	var $type = PATTEMPLATE_FUNCTION_COMPILE;

	/**
	* set the reference to the reader object
	*
	* @access	public
	* @param	object patTemplate_Reader
	*/
	function setReader( &$reader )
	{
		$this->_reader = &$reader;
	}

	/**
	* call the function
	*
	* @abstract
	* @access	public
	* @param	array	parameters of the function (= attributes of the tag)
	* @param	string	content of the tag
	* @return	string	content to insert into the template
	*/
	function call( $params, $content )
	{
	}
}
?>
