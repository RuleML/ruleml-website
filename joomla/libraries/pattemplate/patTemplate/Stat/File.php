<?PHP
/**
 * Base class for patTemplate Stat
 *
 * $Id: File.php 10381 2008-06-01 03:35:53Z pasamio $
 *
 * A stat component should be implemented for each reader
 * to support caching. Stats return information about the
 * template source.
 *
 * @package		patTemplate
 * @subpackage	Stat
 * @author		Stephan Schmidt <schst@php.net>
 */

// Check to ensure this file is within the rest of the framework
defined('JPATH_BASE') or die();

/**
 * Base class for patTemplate Stat
 *
 * $Id: File.php 10381 2008-06-01 03:35:53Z pasamio $
 *
 * A stat component should be implemented for each reader
 * to support caching. Stats return information about the
 * template source.
 *
 * @package		patTemplate
 * @subpackage	Stat
 * @author		Stephan Schmidt <schst@php.net>
 */
class patTemplate_Stat_File extends patTemplate_Stat
{
	/**
	* get the modification time of a template
	*
	* Needed, if a template cache should be used, that auto-expires
	* the cache.
	*
	* @abstract	must be implemented in the template readers
	* @param	mixed	input to read from.
	*					This can be a string, a filename, a resource or whatever the derived class needs to read from
	* @return	integer	unix timestamp
	*/
	function getModificationTime( $input )
	{
		$fullPath	=	$this->_options['root'] . '/' . $input;
		return @filemtime( $fullPath );
	}
}
?>
