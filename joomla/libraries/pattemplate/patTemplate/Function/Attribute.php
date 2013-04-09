<?PHP
/**
 * patTemplate function to dynamically change the
 * value of _any_ attribute of the parent tag.
 *
 * $Id: Attribute.php 10381 2008-06-01 03:35:53Z pasamio $
 *
 * @package		patTemplate
 * @subpackage	Functions
 * @author		Stephan Schmidt <schst@php.net>
 */

// Check to ensure this file is within the rest of the framework
defined('JPATH_BASE') or die();

/**
 * patTemplate function to dynamically change the
 * value of _any_ attribute of the parent tag.
 *
 * Possible attributes:
 * - name => name of the attribute to change
 *
 * The enclosed data will be used as the value of the attribute.
 *
 * $Id: Attribute.php 10381 2008-06-01 03:35:53Z pasamio $
 *
 * @package		patTemplate
 * @subpackage	Functions
 * @author		Stephan Schmidt <schst@php.net>
 */
class patTemplate_Function_Attribute extends patTemplate_Function
{
	/**
	* name of the function
	* @access	private
	* @var		string
	*/
	var $_name	=	'Attribute';

	/**
	* call the function
	*
	* @access	public
	* @param	array	parameters of the function (= attributes of the tag)
	* @param	string	content of the tag
	* @return	string	content to insert into the template
	*/
	function call( $params, $content )
	{
		if( isset( $params['name'] ) )
		{
			$this->_reader->_addToParentTag( 'attributes', $content, $params['name'] );
		}
		return '';
	}
}
?>
