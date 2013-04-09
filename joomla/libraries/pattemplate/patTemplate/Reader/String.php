<?PHP
/**
 * patTemplate Reader that reads from a string
 *
 * $Id: String.php 10381 2008-06-01 03:35:53Z pasamio $
 *
 * @package		patTemplate
 * @subpackage	Readers
 * @author		Stephan Schmidt <schst@php.net>
 */

// Check to ensure this file is within the rest of the framework
defined('JPATH_BASE') or die();

/**
 * patTemplate Reader that reads from a string
 *
 * @package		patTemplate
 * @subpackage	Readers
 * @author		Stephan Schmidt <schst@php.net>
 */
class patTemplate_Reader_String extends patTemplate_Reader
{
	/**
	* Read templates from a string
	*
	* @final
	* @access	public
	* @param	string	string to parse
	* @param	array	options, not implemented in current versions, but future versions will allow passing of options
	* @return	array	templates
	*/
	function readTemplates( $input )
	{
		$this->_currentInput = $input;

		$templates	=	$this->parseString( $input );

		return	$templates;
	}
}
?>
