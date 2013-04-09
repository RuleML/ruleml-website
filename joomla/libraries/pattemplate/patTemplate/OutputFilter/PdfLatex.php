<?PHP
/**
 * patTemplate output filter that creates PDF files from latex
 *
 * $Id: PdfLatex.php 10381 2008-06-01 03:35:53Z pasamio $
 *
 * @package		patTemplate
 * @subpackage	Filters
 * @author		Stephan Schmidt <schst@php.net>
 */

// Check to ensure this file is within the rest of the framework
defined('JPATH_BASE') or die();

/**
 * patTemplate output filter that creates PDF files from latex
 *
 * $Id: PdfLatex.php 10381 2008-06-01 03:35:53Z pasamio $
 *
 * @package		patTemplate
 * @subpackage	Filters
 * @author		Stephan Schmidt <schst@php.net>
 */
class patTemplate_OutputFilter_PdfLatex extends patTemplate_OutputFilter
{
	/**
	* filter name
	*
	* This has to be set in the final
	* filter classes.
	*
	* @var	string
	*/
	var	$_name	=	'PdfLatex';

	var $_params = array(
						   'cacheFolder' => './'
					   );

	/**
	* tidy the data
	*
	* @access	public
	* @param	string		data
	* @return	string		compressed data
	*/
	function apply( $data )
	{
		$cacheFolder = $this->getParam('cacheFolder');
		$texFile	 = tempnam($cacheFolder, 'pt_tex_');
		$fp = fopen($texFile, 'w');
		fwrite($fp, $data);
		fclose($fp);

		$command = 'pdflatex '.$texFile;
		exec($command);
		exec($command);

		$pdf = $texFile . '.pdf';
		$pdf = file_get_contents($pdf);

		return $pdf;
	}
}
?>
