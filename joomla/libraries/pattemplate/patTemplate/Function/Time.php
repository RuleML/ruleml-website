<?PHP
/**
 * patTemplate function that calculates the current time
 * or any other time and returns it in the specified format.
 *
 * $Id: Time.php 10381 2008-06-01 03:35:53Z pasamio $
 *
 * @package		patTemplate
 * @subpackage	Functions
 * @author		Stephan Schmidt <schst@php.net>
 */

// Check to ensure this file is within the rest of the framework
defined('JPATH_BASE') or die();

/**
 * patTemplate function that calculates the current time
 * or any other time and returns it in the specified format.
 *
 * $Id: Time.php 10381 2008-06-01 03:35:53Z pasamio $
 *
 * @package		patTemplate
 * @subpackage	Functions
 * @author		Stephan Schmidt <schst@php.net>
 */
class patTemplate_Function_Time extends patTemplate_Function
{
	/**
	* name of the function
	* @access	private
	* @var		string
	*/
	var $_name	=	'Time';

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
		if( !empty( $content ) )
		{
			$params['time'] = $content;
		}

		if( isset( $params['time'] ) )
		{
			$params['time'] = strtotime( $params['time'] );
		}
		else
		{
			$params['time'] = time();
		}


		return date( $params['format'], $params['time'] );
	}
}
?>
