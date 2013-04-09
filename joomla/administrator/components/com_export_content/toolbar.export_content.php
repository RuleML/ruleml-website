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
defined( '_JEXEC' ) or die( 'Restricted access' );
require_once( $mainframe->getPath( 'toolbar_html' ) );

switch ( $task )
{
	case "about":
		menuExportContent::ABOUT();
		break;
		
	    case "sections":
		menuExportContent::SAVE_SECTIONS();
		break;
		
		case 'new_sect':
		menuExportContent::_EDIT_SECTION(false);
		break;
		
		
	    case 'edit_sect':
	    case 'editA_sect':
		menuExportContent::_EDIT_SECTION(true);
		break;
		
		case 'remove_sections':
		menuExportContent::_REMOVE_SECTIONS();
		break;
		
		case 'copyselect_sect':
		menuExportContent::_COPY_SECTION();
		break;
		
        case "categories":
		menuExportContent::SAVE_CATEGORIES();
		break;
		
			case 'new_cat':
		menuExportContent::_EDIT_CATEGORY(false);
		break;
		
	    case 'edit_cat':
	    case 'editA_cat':
		menuExportContent::_EDIT_CATEGORY(true);
		break;
		
	    case "content_items":
		menuExportContent::SAVE_CONTENT_ITEMS();
		break;
			
		case "static_content":
		menuExportContent::_STATIC();
        break;
        
        
        case 'new_static':
		menuExportContent::_EDIT_STATIC(false);
		break;

	    case 'edit_static':
	    case 'editA_static':
		menuExportContent::_EDIT_STATIC(true);
		break;
		
		case 'new_item':
	    menuExportContent::_EDITCONTENT_ITEM(false);
		break;
		
       
	    case 'edit_item':
	    case 'editA_item':
	    menuExportContent::_EDITCONTENT_ITEM(true);
	    break;
		
	    case 'cancelStatic':
		menuExportContent::CANCELSTATIC();
		break;
	
	    case 'copyItemSelect':
		menuExportContent::_COPY_ITEM_SELECT();
		break;
			
		case 'moveselect':
		menuExportContent::_MOVE();
		break;

	    case 'copyselect':
		menuExportContent::_COPY();
		break;

        case 'import':
		menuExportContent::_IMPORT();
		break;
		
        case 'sections_to_export':
		menuExportContent::_SHOWSECTIONS();
		break;
		
		case 'showexportarchive':
		menuExportContent::_ARCHIVE();
		break;
		
	    case 'download_data':
		menuExportContent::_DOWNLOAD_DATA();
		break;
		
		
		case 'viewExport_static':
		menuExportContent::_VIEWEXPORT_STATIC();
		break;
	}

?>
