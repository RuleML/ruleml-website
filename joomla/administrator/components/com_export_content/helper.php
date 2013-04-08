<?php
/*
* @package Export Content
* @copyright Copyright (C) 2008 www.bestdownloadsites.com All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL,
* Export Content is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*/
class ContentHelper
{
	function saveContentPrep( &$row )
	{

		// Get submitted text from the request variables
		$text = JRequest::getVar( 'text', '', 'post', 'string', JREQUEST_ALLOWRAW );

		// Clean text for xhtml transitional compliance
		$text		= str_replace( '<br>', '<br />', $text );

		// Search for the {readmore} tag and split the text up accordingly.
		$tagPos	= JString::strpos( $text, '<hr id="system-readmore" />' );

		if ( $tagPos === false )
		{
			$row->introtext	= $text;
		} else
		{
			$row->introtext	= JString::substr($text, 0, $tagPos);
			$row->fulltext	= JString::substr($text, $tagPos + 27 );
		}

		return true;
	}

	/**
	* Function to reset Hit count of an article
	*
	*/
	function resetHits($redirect, $id)
	{
		global $mainframe;

		// Initialize variables
		$db	= & JFactory::getDBO();

		// Instantiate and load an article table
		$row = & JTable::getInstance('export_content');
		$row->Load($id);
		$row->hits = 0;
		$row->store();
		$row->checkin();

		$msg = JText::_('Successfully Reset Hit count');
		$mainframe->redirect('index.php?option=com_content&sectionid='.$redirect.'&task=edit&id='.$id, $msg);
	}

	function filterCategory($query, $active = NULL)
	{
		// Initialize variables
		$db	= & JFactory::getDBO();

		$categories[] = JHTML::_('select.option', '0', '- '.JText::_('Select Category').' -');
		$db->setQuery($query);
		$categories = array_merge($categories, $db->loadObjectList());

		$category = JHTML::_('select.genericlist',  $categories, 'catid', 'class="inputbox" size="1" onchange="document.adminForm.submit( );"', 'value', 'text', $active);

		return $category;
	}

}
?>