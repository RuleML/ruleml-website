<?PHP
/**
 * Modifier that creates an HTML image tag from a variable
 *
 * It automatically retrieves the width and height of the image.
 *
 * $Id: Img.php 10381 2008-06-01 03:35:53Z pasamio $
 *
 * @package		patTemplate
 * @subpackage	Modifiers
 * @author		Stephan Schmidt <schst@php.net>
 */

// Check to ensure this file is within the rest of the framework
defined('JPATH_BASE') or die();

/**
 * Modifier that creates an HTML image tag from a variable
 *
 * It automatically retrieves the width and height of the image.
 *
 * $Id: Img.php 10381 2008-06-01 03:35:53Z pasamio $
 *
 * @package		patTemplate
 * @subpackage	Modifiers
 * @author		Stephan Schmidt <schst@php.net>
 */
class patTemplate_Modifier_HTML_Img extends patTemplate_Modifier
{
	/**
	* modify the value
	*
	* @access	public
	* @param	string		value
	* @return	string		modified value
	*/
	function modify( $value, $params = array() )
	{
		$size = getimagesize( $value );
		$params['src']    = $value;
		$params['width']  = $size[0];
		$params['height'] = $size[1];
		return '<img'.$this->arrayToAttributes($params).' />';
	}

	/**
	* create an attribute list
	*
	* @access	private
	* @param	array
	* @return	string
	*/
	function arrayToAttributes( $array )
	{
		$string = '';
		foreach( $array as $key => $val )
		{
			$string .= ' '.$key.'="'.htmlspecialchars( $val ).'"';
		}
		return $string;
	}
}
?>
