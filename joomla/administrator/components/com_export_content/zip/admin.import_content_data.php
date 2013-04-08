<?php
/**
* @version :1.0
* @package Import Content Data
* @copyright Copyright (C) 2007 www.bestdownloadsites.com All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL,
* Export Content is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*/

defined('_VALID_MOS') or die('Direct Access to this location is not allowed.');

// ensure user has access to this function
if (!($acl->acl_check( 'administration', 'edit', 'users', $my->usertype, 'components', 'all' )
| $acl->acl_check( 'administration', 'edit', 'users', $my->usertype, 'components', 'com_export_content' ))) {
  mosRedirect( 'index2.php', _NOT_AUTH );
}
 echo '<BR/><BR/><BR/><b>This component has served it\'s purpose of populating the export content tables and can be<BR/>
   safely removed via the site component uninstaller (as you would any other component).<BR/>
Look in the list for <u>Imported Content</u> to remove it.<BR/><BR/>
NOTE: This is necessary before attempting to import any new content.</b><BR/><BR/><BR/>';
?>

