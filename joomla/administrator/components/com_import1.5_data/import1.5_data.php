<?php
/***
* @version : 1.0
* @package Export Content
* @copyright Copyright (C) 2008 www.bestdownloadsites.com All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL,
* Export Content is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

JToolBarHelper::title( JText::_( 'Imported Content' ), 'config.png' );
DEFINE( '_EXPORT_BASE_PATH', '../administrator/components/com_export_content/' );
if (file_exists(_EXPORT_BASE_PATH . 'language/'.$mosConfig_lang.'.php')) {
  require_once(_EXPORT_BASE_PATH . 'language/'.$mosConfig_lang.'.php');
} else {
  require_once(_EXPORT_BASE_PATH . 'language/english.php');
}
echo "<h3>";
echo _IMPORT_REMOVE;
echo " ";
echo _IMPORT_NEW_VERSION;
echo "<BR /><BR />";
echo _IMPORT_REMOVE_DATA;
echo "</h3><p>";
echo _IMPORT_INFO_LINK;
echo "</p>";
?>