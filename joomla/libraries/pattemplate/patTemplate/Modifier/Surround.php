<?PHP
/**
 * patTemplate modfifier Surround
 *
 * $Id: Surround.php 10381 2008-06-01 03:35:53Z pasamio $
 *
 * @package		patTemplate
 * @subpackage	Modifiers
 * @author		Stephan Schmidt <schst@php.net>
 */

// Check to ensure this file is within the rest of the framework
defined('JPATH_BASE') or die();

/**
 * patTemplate modfifier Surround
 *
 * splits a text and surrunds each part by custom start and end strings
 *
 * Possible attributes are:
 * - delimiter (string)
 * - start (string)
 * - end (string)
 * - keepdelimiter (yes|no) default: no
 * - withfirst (yes|no) default: yes
 * - withlast (yes|no) default: yes
 *
 *
 * @package		patTemplate
 * @subpackage	Modifiers
 * @author		gERD Schaufelberger <gerd@php-tools.net>
 * @version		0.2
 */
class patTemplate_Modifier_Surround extends patTemplate_Modifier
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
		// set default values
		$delimiter	=	"\n";
		$start		=	'';
		$end		=	'';

		// where to split
		if( isset( $params['delimiter'] ) )
		{
			$delimiter	=	$params['delimiter'];
		}

		if( isset( $params['start'] ) )
		{
			$start	=	$params['start'];
		}

		if( isset( $params['end'] ) )
		{
			$end	=	$params['end'];
		}

		// append the delimiter?
		if( isset( $params['keepdelimiter'] ) && $params['keepdelimiter'] === 'yes' )
		{
			$end	.=	$delimiter;
		}

		$split	=	explode( $delimiter, $value );
		$value	=	implode( $end . $start, $split );

		// add first?
		if( !isset( $params['withfirst'] ) || $params['withfirst'] !== 'no' )
		{
			$value	=	$start . $value;
		}

		// add last?
		if( !isset( $params['withlast'] ) || $params['withlast'] !== 'no' )
		{
			$value	.=	$end;
		}

		return $value;
	}
}
?>
