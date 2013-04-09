<?PHP
/**
 * patTemplate modfifier Numberformat
 *
 * $Id: Numberformat.php 10381 2008-06-01 03:35:53Z pasamio $
 *
 * @package		patTemplate
 * @subpackage	Modifiers
 * @author		Stephan Schmidt <schst@php.net>
 */

// Check to ensure this file is within the rest of the framework
defined('JPATH_BASE') or die();

/**
 * patTemplate modfifier Numberformat
 *
 * formats dates and times according to a format string.
 *
 * Possible attributes are:
 * - decimals (int)
 * - point
 * - separator
 *
 * See the PHP documentation for number_format() for
 * more information.
 *
 * @package		patTemplate
 * @subpackage	Modifiers
 * @author		Stephan Schmidt <schst@php.net>
 * @link		http://www.php.net/manual/en/function.strftime.php
 */
class patTemplate_Modifier_Numberformat extends patTemplate_Modifier
{
    var $defaults = array(
                        'decimals'  => 2,
                        'point'     => '.',
                        'separator' => ','
                    );
	/**
	* modify the value
	*
	* @access	public
	* @param	string		value
	* @return	string		modified value
	*/
	function modify($value, $params = array())
	{
	    $params = array_merge($this->defaults, $params);
	    return @number_format($value, $params['decimals'], $params['point'], $params['separator']);
	}
}
?>
