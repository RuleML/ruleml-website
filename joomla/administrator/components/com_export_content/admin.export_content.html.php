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
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$option='com_export_content';
global $mosConfig_live_site;
 global $my, $option,$database,$mosConfig_host,$mosConfig_password, $mosConfig_user, $mosConfig_live_site, $mosConfig_db, $my, $mainframe, $mosConfig_list_limit, $mosConfig_dbprefix, $mosConfig_lang, $adminName, $mosConfig_sitename;
//jimport('joomla.application.component.controller');
//extends JController
?>
<style>
table.adminlist{  
 background-color:#EEEEEE;
 }
.hide_help{
	position:relative;
	top:22px;
	left:300px;
	display:block;
	height:10px;
}
</style>
<?php
  function showhelp(){
	$hiden 		= mosGetParam( $_REQUEST, 'hiden' );
if($hiden=='1'){
	$hide_show_help = mosHTML::yesnoSelectList( 'hiden', 'class="inputbox" onchange="document.adminForm.submit( );"', '1', 'Show help', 'Hide help' );
	}else{
	$hide_show_help = mosHTML::yesnoSelectList( 'hiden', 'class="inputbox" onchange="document.adminForm.submit( );"', '0', 'Yes', 'Show help' );	
	}

jimport('joomla.application.component.controller');
}
class HTML_export {

  	function show_sections( &$rows, $scope, $myid, &$pageNav, $option ) {
 global $my, $database,$mosConfig_host,$mosConfig_password, $mosConfig_user, $mosConfig_live_site, $mosConfig_db, $my, $mainframe, $mosConfig_list_limit, $mosConfig_dbprefix, $mosConfig_lang, $adminName, $mosConfig_sitename;
		mosCommonHTML::loadOverlib();
		global $mainframe;

		// Initialize variables
		$db		=& JFactory::getDBO();
		$user	=& JFactory::getUser();
		JHTML::_('behavior.tooltip');
		
	global $_VERSION;

?>
		<form action="index2.php" method="post" name="adminForm">
		
<?php
 //showhelp();
/**********************************
* Yes no select for archive items
**********************************/ 
echo "<div class=\"page_dropdowns\">"; 
$html = mosHTML::yesnoSelectList( 'archives', 'class="inputbox"', '0', 'Yes', 'No' );
      echo _ARCHIVE_YES_NO;
	  echo ":&nbsp;&nbsp;";
      echo $html;
      echo "</div>";
?>
		<table class="adminlist">
<tr></td>
			<th width="5%">
			#
			</th>
			<th width="5%">
			<input type="checkbox" name="toggle" value="" onClick="checkAll(<?php echo count( $rows );?>);" />
			</th>
			<th width="50%" class="title">
			
		<?php	echo	JText::_('Title');?>
			</th>
			<th width="10%" align="center">
			<?php 
		echo	JText::_('Published');?>
			</th>
		
		<th width="12%" nowrap align="center">
		
			<?php echo JText::_( 'ID' ); ?>
			</th>
			<th width="12%" nowrap align="center">
			<?php 
		echo	JText::_('Category');?>
			
			</th>
			<th width="12%" nowrap align="center">
				<?php echo JText::_( 'Num Active' ); ?>
		
			</th>

		</tr>
		<?php
		$k = 0;
		for ( $i=0, $n=count( $rows ); $i < $n; $i++ ) {
			$row = &$rows[$i];

$link = 'index2.php?option=com_sections&scope=content&task=editA&hidemainmenu=1&id='. $row->id;
//	$access 	= accessMenu_sect( $row, $i );
//mosCommonHTML::
			$access 	= AccessProcessing_sect( $row, $i );
			$checked 	= mosCommonHTML::CheckedOutProcessing( $row, $i );
			$published 	= mosCommonHTML::PublishedProcessing( $row, $i );
		//	$published 	= JHTML::_('grid.published', $row, $i );
			?>
			<tr class="<?php echo "row$k"; ?>">
				<td width="5%" align="left">
				<?php echo $pageNav->rowNumber( $i ); ?>
				</td>
				<td width="20">
				<?php echo $checked; ?>
				</td>
				<td width="35%"><span class="titles">
				<?php
				if ( $row->checked_out && ( $row->checked_out != $my->id ) ) {
					echo $row->title. " ( ". $row->alias ." )";
				} else {
                     echo $row->title. " ( ". $row->alias ." )"; ?></span>
				<?php
				}
				?>
				</td>
				<td align="center">
   <?php
             global $mainframe;
          //echo mosAbstractTasker::getTask('sections');
          ?>
				<?php echo $published;?>
				</td>
				
				<td align="center">
				<span class="titlesx"><?php echo $row->id; ?></span>
				</td>
				<td align="center">
				<span class="titlesx"><?php echo $row->categories; ?></span>
				</td>
				<td align="center">
				<span class="titlesx"><?php echo $row->active; ?></span>
				</td>
			
				<?php
				$k = 1 - $k;
				?>
			</tr>
			<?php
		}
		?>
	
		</table>

		<?php echo $pageNav->getListFooter(); ?>

		
		<input type="hidden" name="option" value="<?php echo $option;?>" />
		<input type="hidden" name="scope" value="<?php echo $scope;?>" />
		<input type="hidden" name="task" value="sections" />
		<input type="hidden" name="chosen" value="" />
		<input type="hidden" name="act" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="hidemainmenu" value="0" />
		</form>	
		<?php
	}
/**********************************************************
	 Form to select Section to copy Category to
**********************************************************/
	function copySectionSelect( $option, $cid, $categories, $contents, $section ) {
		?>
		<form action="index2.php" method="post" name="adminForm">
		<br />
		<table class="adminheading">
		<tr>
			<th class="sections">
			<?php //echo _SECTION_HEADING;?>
			</th>
		</tr>
		</table>

		<br />
		<table class="adminform">
		<tr><th class="sections" colspan="4" width="100%">
<?php echo _TRANSFER_SECTION_MSG; ?>
        <BR/>
        
            </th>
            </tr>
            <tr>
			<td width="3%"></td>
			<td align="left" valign="top" width="30%"><BR/>
			<strong><u><?php echo _COPY_TO_SECTION;?>(s):</u></strong>
			<br />
			<?php
global $database;
 /************************************************************************
Display sections, categories and content items that are being transfered
***************************************************************************/
			echo "<ol>";
			foreach ( $section as $sections ) {
    echo "<li>". $sections->title ."</li>";
    echo "\n <input type=\"hidden\" name=\"section[]\" value=\"$sections->id\" />";
			}
			echo "</ol>";
			?>
			</td>
			<td align="left" valign="top" width="30%"><BR/>
			<strong><u><?php echo _COPY_TO_CATEGORY;?>:</u></strong>
			<br />
			<?php
			echo "<ol>";
			foreach ( $categories as $category ) {
			 if($category->name!=NULL){
				echo "<li>". $category->name ."</li>";
				}else
				{
				//if($category->name==NULL){
				echo "<li>". $category->title ."</li>";
				}
				echo "\n <input type=\"hidden\" name=\"category[]\" value=\"$category->id\" />";
			}
			echo "</ol>";
			?>
			</td>
			<td valign="top" width="30%"><BR/>
			<strong><u><?php echo _COPY_TO_CONTENT;?>:</u></strong>
			<br />
			<?php
			echo "<ol>";
			foreach ( $contents as $content ) {
				echo "<li>". $content->title ."</li>";
				echo "\n <input type=\"hidden\" name=\"content[]\" value=\"$content->id\" />";
			}
			echo "</ol>";
			?>
			</td>
		
		</tr>
		</table>
		<br />
	<input type="hidden" name="option" value="<?php echo $option;?>" />
		<input type="hidden" name="boxchecked" value="1" />
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="scope" value="content" />
	
		<?php
		foreach ( $cid as $id ) {
			echo "\n <input type=\"hidden\" name=\"cid[]\" value=\"$id\" />";
		}
		?>
		</form>
		<?php
	}
/**************************************
Show categories
***************************************/
 function show_cat( &$rows, $section, $section_name, &$pageNav, &$lists, $type ) {
		 global $my, $option,$database,$mosConfig_host,$mosConfig_password, $mosConfig_user, $mosConfig_live_site, $mosConfig_db, $my, $mainframe, $mosConfig_list_limit, $mosConfig_dbprefix, $mosConfig_lang, $adminName, $mosConfig_sitename;
		mosCommonHTML::loadOverlib();
		global $mainframe;

		// Initialize variables
		$db		=& JFactory::getDBO();
		$user	=& JFactory::getUser();
		//	JHTML::_('behavior.tooltip');
		
	global $_VERSION;
		?>
		<form action="index2.php" method="post" name="adminForm">
		
			<?php
			if ( $section == 'content') {
			
			} else {
				if ( is_numeric( $section ) ) {
					$query = 'com_export_content&sectionid=' . $section;
				} else {
					if ( $section == 'com_contact_details' ) {
						$query = 'com_contact';
					} else {
						$query = $section;
					}
				}
				?>
			
				Category Manager <small><small>[ <?php echo $section_name;?> ]</small></small>
			
				<?php
			}
	
global $database, $mosConfig_sitename;
  /**********************************
* Yes no select for archive items
**********************************/ 
 //showhelp();
echo "<div class=\"page_dropdowns\">";
$html = mosHTML::yesnoSelectList( 'archives', 'class="inputbox"', '0', 'Yes', 'No' );
      echo _ARCHIVE_YES_NO;
	  echo ":&nbsp;&nbsp;";
      echo $html;
      echo "&nbsp;&nbsp;";
     echo $lists['sectionid'];?>
     </div>
   <table class="adminlist">
		<tr>
			<th width="5%" align="left">
			<?php echo JText::_( 'Num' ); ?>
			</th>
			<th width="5%">
			<input type="checkbox" name="toggle" value="" onClick="checkAll(<?php echo count( $rows );?>);" />
			</th>
			<th class="title" >
			<?php 
			echo	JText::_('Title');?>
			</th>
			<th width="10%">
				<?php 
		echo	JText::_('Published');?>
			</th>
			<?php
		
			if ( $section == 'content') {
				?>
				<th width="25%" align="center">
				<?php 
		echo	JText::_('Section');?>
				</th>
				<?php
			}
			?>
			<th width="5%" align="center">
		
		<?php echo JText::_( 'ID' ); ?>
	
			</th>
			<?php
			if ( $type == 'content') {
				?>
					
				<th width="6%">
			<?php echo JText::_( 'Num Active' ); ?>
			
				</th>
				<?php
			} else {
				?>
				<th width="20%">
				</th>
				<?php
			}
			?>
		</tr>
		<?php
		$k = 0;
		for ($i=0, $n=count( $rows ); $i < $n; $i++) {
			$row 	= &$rows[$i];

			$row->sect_link = 'index2.php?option=com_sections&task=editA&hidemainmenu=1&id='. $row->section;

			$link = 'index2.php?option=com_categories&section='. $section .'&task=editA&hidemainmenu=1&id='. $row->id;

			$access 	= mosCommonHTML::AccessProcessing( $row, $i );
			$checked 	= mosCommonHTML::CheckedOutProcessing( $row, $i );
			$published 	=PublishedProcessing_cat( $row, $i );
			//$published 	= JHTML::_('grid.published', $row, $i );
			//$published 	= mosCommonHTML::PublishedProcessing( $row, $i );
			?>
			<tr class="<?php echo "row$k"; ?>">
				<td>
				<?php echo $pageNav->rowNumber( $i ); ?>
				</td>
				<td>
				<?php echo $checked; ?>
				</td>
				<td><span class="titles">
				<?php
				if ( $row->checked_out_contact_category && ( $row->checked_out_contact_category != $my->id ) ) {
					//echo $row->title .' ( '. $row->alias .' )';
					echo $row->title;
				} else {
					?>
					<?php
                    //echo $link;
                    ?>
					<?php 
					echo $row->title;
					//echo $row->title .' ( '. $row->alias .' )'; ?></span>
					
					<?php
				}
				?>
				</td>
				<td align="center">
				<?php echo $published;?>
				</td>
			<td align="center">
             <span class="titlesx"><?php echo $row->section_name; ?></span>
					</td>
				<td align="center">
				<span class="titlesx"><?php echo $row->id; ?></span>
				</td>
				
				<?php
				if ( $type == 'content') {
					?>
					<td align="center">
				<span class="titlesx"><?php echo $row->active; ?></span>
					</td>
					<?php
				} else {
					?>
					<td>
					</td>
					<?php
				}
				$k = 1 - $k;
				?>
			</tr>
			<?php
		}
		?>
		</table>

		<?php echo $pageNav->getListFooter(); ?>

        <input type="hidden" name="categoryid" value="<?php echo $categoryid;?>" />
		<input type="hidden" name="option" value="com_export_content" />
		<input type="hidden" name="section" value="<?php echo $section;?>" />
		<input type="hidden" name="task" value="categories" />
		<input type="hidden" name="chosen" value="" />
		<input type="hidden" name="act" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="type" value="<?php echo $type; ?>" />
		<input type="hidden" name="hidemainmenu" value="0" />
		</form>
		<?php

	}
/*************************************
Show content items
****************************************/
	function showExportContent( &$rows, $section, &$lists, $search, $pageNav, $all=NULL, $redirect ) {
	 	global $mainframe;

		// Initialize variables
		$db		=& JFactory::getDBO();
		$user	=& JFactory::getUser();

 
		//Ordering allowed ?
		//$ordering = ($lists['order'] == 'section_name' && $lists['order_Dir'] == 'asc');
		JHTML::_('behavior.tooltip');
		global $my, $acl, $database;

	//	mosCommonHTML::loadOverlib();
		?>
		<form action="index2.php" method="post" name="adminForm">
<?php
			if ( $section == 'content' ) {
echo $row->section_name;}
			if ( $all ) {
			
			
			} else {
				?>
				Content Items Manager <small>[ Section: <?php echo $section->title; ?> ]</small>
				<?php
			}
			
/**********************************
* Yes no select for archive items
**********************************/ 

echo "<div class=\"page_dropdowns\">";

	  echo JText::_( 'Filter' ); ?>:<input type="text" name="search" value="" class="text_area" onChange="document.adminForm.submit();" />
             <?php echo $lists['sectionids'];?>
             <?php echo $lists['catid'];?>
            <?php //echo $lists['authorid'];?>
             </div>
    

  <table class="adminlist">
		<tr>
         <th width="5">
			#
			</th>
			<th width="5">
			<input type="checkbox" name="toggle" value="" onClick="checkAll(<?php echo count( $rows ); ?>);" />
			</th>
			<th class="title">
			<?php 
		echo	JText::_('Title');?>
		
			</th>
			<th width="1%">
		<?php 
		echo	JText::_('Published');?>
			</th>
		
			<th width="8%" align="center">
		<?php echo JText::_( 'ID' ); ?>
			</th>
			<?php
			if ( $all ) {
				?>
				<th align="left" >
				<?php 
		echo	JText::_('Section');?>
				</th>
				<?php
			}
			?>
			<th align="left" >
				<?php 
		echo	JText::_('Category');?>
				
			</th>
			<th align="left" > 
			<?php 
		echo	JText::_('Author');?>
			
			</th>
			<th align="center" width="5%">
				<?php 
		echo	JText::_('Date');?>
				
			</th>
		  </tr>
		<?php

		$k = 0;
		$nullDate = $database->getNullDate();
		for ($i=0, $n=count( $rows ); $i < $n; $i++) {
			$row = &$rows[$i];

			$link 	= 'index2.php?option=com_content&sectionid='. $redirect .'&task=edit&hidemainmenu=1&id='. $row->id;

			$row->sect_link = 'index2.php?option=com_sections&task=editA&hidemainmenu=1&id='. $row->sectionid;
			$row->cat_link 	= 'index2.php?option=com_categories&task=editA&hidemainmenu=1&id='. $row->catid;

			$now = date( 'Y-m-d H:i:s' );
			if ( $now <= $row->publish_up && $row->state == "1" ) {
				$img = 'publish_y.png';
				$alt = 'Published';
			} else if ( ( $now <= $row->publish_down || $row->publish_down == $nullDate ) && $row->state == "1" ) {
				$img = 'publish_g.png';
				$alt = 'Published';
			} else if ( $now > $row->publish_down && $row->state == "1" ) {
				$img = 'publish_r.png';
				$alt = 'Expired';
			} elseif ( $row->state == "0" ) {
				$img = "publish_x.png";
				$alt = 'Unpublished';
			}
			$times = '';
			if (isset($row->publish_up)) {
				if ($row->publish_up == $nullDate) {
					$times .= "<tr><td>Start: Always</td></tr>";
				} else {
					$times .= "<tr><td>Start: $row->publish_up</td></tr>";
				}
			}
			if (isset($row->publish_down)) {
				if ($row->publish_down == $nullDate) {
					$times .= "<tr><td>Finish: No Expiry</td></tr>";
				} else {
					$times .= "<tr><td>Finish: $row->publish_down</td></tr>";
				}
			}

			if ( $acl->acl_check( 'administration', 'manage', 'users', $my->usertype, 'components', 'com_users' ) ) {
				if ( $row->created_by_alias ) {
					$author = $row->created_by_alias;
				} else {
					$linkA 	= 'index2.php?option=com_users&task=editA&hidemainmenu=1&id='. $row->created_by;
//$author = '<a href="'. $linkA .'" title="Edit User">'. $row->author .'</a>';
					$author =$row->author;
				}
			} else {
				if ( $row->created_by_alias ) {
					$author = $row->created_by_alias;
				} else {
					$author = $row->author;
				}
			}

			$date = mosFormatDate( $row->created, '%x' );
	      
			$access 	= mosCommonHTML::AccessProcessing( $row, $i );
			$checked 	= mosCommonHTML::CheckedOutProcessing( $row, $i );
			 // $published 	=PublishedProcessingitems( $row, $i );
			  //	$published 	=PublishedProcessingAll( $row, $i );
			?>
			<tr class="<?php echo "row$k"; ?>">
				<td>
				<?php echo $pageNav->rowNumber( $i ); ?></td>
				
                <td >
				<?php echo $checked; ?>
				</td>
				<td>
				<?php
				
						 	if(get_magic_quotes_gpc()=='1'){				
		$row_titles= decode_entities(stripSlashes( $row->title));
		}
	else
		{
			$row_titles=  decode_entities($row->title);
		}
				
				
				if ( $row->checked_out && ( $row->checked_out != $my->id ) ) {			
		echo $row_titles;
		
				} else {
					?>
					 <span class="titles"><?php echo $row_titles; ?></span>
					<a href="<?php //echo $link; ?>" title="Edit Content"></a>
					<?php
				}
			 	?>
			</td>
				<?php
				if ( $times ) {
					?>
					<td align="center">
						<a href="javascript: void(0);" onMouseOver="return overlib('<table><?php echo $times; ?></table>', CAPTION, 'Publish Information', BELOW, RIGHT);" onMouseOut="return nd();" onClick="return listItemTask('cb<?php echo $i;?>','<?php echo $row->state ? "unpublish_items" : "publish_items";?>')">
					<img src="images/<?php echo $img;?>" width="16" height="16" border="0" alt="<?php echo $alt; ?>" />
					</a>
<?php
//echo	$published;
 ?>
					</td>
					<?php
				}
				?>
				
			
				<td align="center">
				 <span class="titlesx"><?php echo $row->id; ?></span>
				</td>
				<?php
				if ( $all ) {
					?>
					<td align="left">
					
					 <span class="titles"><?php echo $row->section_name; ?></span>
					</a>
					</td>
					<?php
				}
				?>
				<td align="left">
				
				 <span class="titles"><?php
				 if($row->name ==NULL){
				  echo $row->category_title; ?></span>
				 <?php
	 }else{
?>
				  <span class="titles"><?php echo $row->name; ?></span>
				<?php
	  }
?>
				</a>
				</td>
				<td align="left">
				 <span class="titles"><?php echo $author; ?></span>
				</td>
				<td align="left">
				 <span class="titles"><?php echo $date; ?></span>
				</td>
			</tr>
			<?php
			$k = 1 - $k;
		}
		
		echo "</table>";
        
		$db		=& JFactory::getDBO();
		$user	=& JFactory::getUser();
		$config	=& JFactory::getConfig();
		$now	= new JDate();
	    echo $pageNav->getListFooter(); 
		echo "<BR/>";
		echo "<BR/>";
		JHTML::_('content.legend');
		?>
	    <input type="hidden" name="option" value="com_export_content" />
		<input type="hidden" name="sectionid" value="<?php echo $section->id;?>" />
		<input type="hidden" name="task" value="content_items" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="hidemainmenu" value="0" />
		<input type="hidden" name="redirect" value="<?php echo $redirect;?>" />
		<?php echo JHTML::_( 'form.token' ); ?>
		</form>
		<?php
	}


/*************************************************
 Form to select Section to copy Categories to
**************************************************/
	function copyCategorySelect( $option, $cid, $SectionList, $items, $sectionOld, $contents, $redirect ) {
		?>
		<form action="index2.php" method="post" name="adminForm">
		<br />
		<table class="adminheading">
		<tr>
			<th class="categories">
			<?php //echo _CATEGORY_HEADING;?>
			</th>
		</tr>
		</table>

		<br />
		<table class="adminform">
		<tr>	
			<th class="section" valign="top" colspan="4">
			<?php echo _TRANSFER_CATEGORIES_MSG;?>
			
			</th>
            </tr>
            <tr>
			<td width="3%"></td>
			<td align="left" valign="top" width="30%"><br />
				<strong><?php echo JText::_( 'Copy to Section' ); ?>:</strong>
			
			<br /><br />
			<?php echo $SectionList;?>
			<br /><br />
			</td>
			<td align="left" valign="top" width="30%"><br />
			<strong><u><?php echo _COPY_TO_CATEGORY;?>:</u></strong>
			<br />
			<?php
			echo "<ol>";
			foreach ( $items as $item ) {
			 	//foreach ( $categories as $category ) {
			 if($item->name!=NULL){
				echo "<li>". $item->name ."</li>";
				}else
				{
				//if($category->name==NULL){
				echo "<li>". $item->title ."</li>";
				}
			//	echo "<li>". $item->name ."</li>";
			//	echo $item->title;
			}
			echo "</ol>";
			?>
			</td>
			<td valign="top" width="30%"><br />
			<strong><u><?php echo _COPY_TO_CONTENT;?>:</u></strong>
			<br />
			<?php
			echo "<ol>";
			foreach ( $contents as $content ) {
				echo "<li>". $content->title ."</li>";
				echo "\n <input type=\"hidden\" name=\"item[]\" value=\"$content->id\" />";
			}
			echo "</ol>";
			?>
		
		</tr>
		</table>
		<br /><br />

		<input type="hidden" name="option" value="<?php echo $option;?>" />
		<input type="hidden" name="section" value="<?php echo $sectionOld;?>" />
		<input type="hidden" name="boxchecked" value="1" />
		<input type="hidden" name="redirect" value="<?php echo $redirect; ?>" />
		<input type="hidden" name="task" value="" />
		<?php
		foreach ( $cid as $id ) {
			echo "\n <input type=\"hidden\" name=\"cid[]\" value=\"$id\" />";
		}
		?>
		</form>
		<?php
	}
/******************************************************
 Form to select Section/Category to copy item(s) to
*******************************************************/
	function copyItemSelect( $option, $cid, $sectCatList, $sectionid, $items  ) {
		?>
		<script language="javascript" type="text/javascript">
		function submitbutton(pressbutton) {
			var form = document.adminForm;
			if (pressbutton == 'cancel_copysave') {
				submitform( pressbutton );
				return;
			}

			// do field validation
			if (!getSelectedValue( 'adminForm', 'sectcat' )) {
				alert( "Please select a Section/Category to copy the items to" );
			} else {
				submitform( pressbutton );
			}
		}
		</script>
		<form action="index2.php" method="post" name="adminForm">
		<br />
		<table class="adminheading">
		<tr>
			<th class="edit">
			<?php //echo _ITEMS_HEADING;?>
			</th>
		</tr>
		</table>

		<br />
		<table class="adminform">
		<tr><th class="section" colspan="2">
        <?php
  echo	_TRANSFER_ITEMS_MSG;
?></th></tr>
        <tr>
			<td align="left" valign="top" width="40%"><BR/>
			<strong><u><?php echo _COPY_TO_SECTION_CATEGORY;?>:</u></strong><BR/>
			<br />
			<?php 
			
			echo $sectCatList; ?>
			<br /><br />
			</td>
			<td align="left" valign="top"><BR/>
			<strong><u><?php echo _COPY_TO_CONTENT;?>:</u></strong>
			<br />
			<?php
			echo "<ol>";
			foreach ( $items as $item ) {
				echo "<li>". $item->title ."</li>";
			}
			echo "</ol>";
			?>
			</td>
		</tr>
		</table>
		<br /><br />

		<input type="hidden" name="option" value="<?php echo $option;?>" />
		<input type="hidden" name="sectionid" value="<?php echo $sectionid; ?>" />
		<input type="hidden" name="task" value="" />
		<?php
		foreach ($cid as $id) {
			echo "\n<input type=\"hidden\" name=\"cid[]\" value=\"$id\" />";
		}
		?>
		</form>
		<?php
	}
	
/*******************************************
Shows static content items 
********************************************/
	function showStaticContent( &$rows, &$pageNav, $option, $search, &$lists ) {
		global $my, $acl, $database;

		mosCommonHTML::loadOverlib();
		?>


  <form  action="index2.php" method="post" name="adminForm">
<?php
//showhelp();
echo "<div class=\"page_dropdowns\">";?>
      <table><tr> 	<td>
			<?php
			
		echo	JText::_('Filter');
?> :&nbsp;
			</td>
			<td>
			<input type="text" name="search" value="<?php echo htmlspecialchars( $search );?>" class="text_area" onChange="document.adminForm.submit();" />
			</td>
			<td>
			&nbsp;&nbsp;&nbsp;Order:&nbsp;
			</td>
			<td>
			<?php echo $lists['order']; ?>
			</td>
			<td width="right">
				<?php //echo $lists['created_by_alias'];?>
			<?php //echo $lists['authorid'];?>
			</td>
		</tr>
		</table>
		<?php
      echo "</div>";?>
<table class="adminlist">
		<tr>
			<th width="5">
			#
			</th>
			<th width="5px">
			<input type="checkbox" name="toggle" value="" onClick="checkAll(<?php echo count( $rows ); ?>);" />
			</th>
			<th class="title">
			<?php echo	JText::_('Title');?>
			</th>
			<th width="5%">
		<?php
        echo	JText::_('Published');
        ?>
			</th>
		
			<th width="15%" align="center">
		<?php echo	JText::_(' ID ');?>
			</th>
			
			<th width="20%" align="left">
		<?php 	echo	JText::_('Author');?>
			</th>
			<th align="center" width="10">
		<?php echo	JText::_('Date');?>
			</th>
		</tr>
		<?php
		get_param_times();
		$k = 0;
		$nullDate = $database->getNullDate();
		for ($i=0, $n=count( $rows ); $i < $n; $i++) {
			$row = &$rows[$i];

			$now = _CURRENT_SERVER_TIME;
			//$now = date('Y-m-d');
			if ( $now <= $row->publish_up && $row->state == 1 ) {
			// Published
				$img = 'publish_y.png';
				$alt = 'Published';
			} else if ( ( $now <= $row->publish_down || $row->publish_down == $nullDate ) && $row->state == 1 ) {
			// Pending
				$img = 'publish_g.png';
				$alt = 'Published';
			} else if ( $now > $row->publish_down && $row->state == 1 ) {
			// Expired
				$img = 'publish_r.png';
				$alt = 'Expired';
			} elseif ( $row->state == 0 ) {
			// Unpublished
				$img = 'publish_x.png';
				$alt = 'Unpublished';
			}

			// correct times to include server offset info
			$row->publish_up 	= mosFormatDate( $row->publish_up, _CURRENT_SERVER_TIME_FORMAT );
			if (trim( $row->publish_down ) == $nullDate || trim( $row->publish_down ) == '' || trim( $row->publish_down ) == '-' ) {
				$row->publish_down = 'Never';
			}
			$row->publish_down 	= mosFormatDate( $row->publish_down, _CURRENT_SERVER_TIME_FORMAT );

			$times = '';
			if ($row->publish_up == $nullDate) {
				$times .= "<tr><td>Start: Always</td></tr>";
			} else {
				$times .= "<tr><td>Start: $row->publish_up</td></tr>";
			}
			if ($row->publish_down == $nullDate || $row->publish_down == 'Never') {
				$times .= "<tr><td>Finish: No Expiry</td></tr>";
			} else {
				$times .= "<tr><td>Finish: $row->publish_down</td></tr>";
			}

			if ( !$row->access ) {
				$color_access = 'style="color: green;"';
				$task_access = 'accessregistered';
			} else if ( $row->access == 1 ) {
				$color_access = 'style="color: red;"';
				$task_access = 'accessspecial';
			} else {
				$color_access = 'style="color: black;"';
				$task_access = 'accesspublic';
			}

			$checked 	= mosCommonHTML::CheckedOutProcessing( $row, $i );

			if ( $acl->acl_check( 'administration', 'manage', 'users', $my->usertype, 'components', 'com_users' ) ) {
				if ( $row->created_by_alias ) {
					$author = $row->created_by_alias;
				} else {
				//	$linkA 	= 'index2.php?option=com_users&task=editA&hidemainmenu=1&id='. $row->created_by;
				//	$author = '<a href="'. $linkA .'" title="Edit User">'. $row->creator .'</a>';
				$author=$row->creator;
				}
			} else {
				if ( $row->created_by_alias ) {
					$author = $row->created_by_alias;
				} else {
					$author = $row->creator;
				}
			}

			$date = mosFormatDate( $row->created, '%x' );
			?>
			<tr class="<?php echo "row$k"; ?>">
				<td>
				<?php echo $pageNav->rowNumber( $i ); ?>
				</td>
				<td>
				<?php echo $checked; ?>
				</td>
				<td>
                <span class="titles">
				<?php
				if ( $row->checked_out && ( $row->checked_out != $my->id ) ) {
					echo $row->title;
					if ( $row->title_alias ) {
						echo ' (<i>'. $row->title_alias .'</i>)';
					}
				} else {
					?>
				<?php
                //echo $link;
                 ?>
					 <?php echo $row->title;?>
                     <?php
				//	if ( $row->title_alias ) {
				//		echo ' (<i>'. $row->title_alias .'</i>)';
				//	}
					?></span>
				
					<?php
				}
				?>
				</td>
				<?php
				if ( $times ) {
					?>
					<td align="center">
					<a href="javascript: void(0);" onMouseOver="return overlib('<table><?php echo $times; ?></table>', CAPTION, 'Publish Information', BELOW, RIGHT);" onMouseOut="return nd();" onClick="return listItemTask('cb<?php echo $i;?>','<?php echo $row->state ? "unpublish_static" : "publish_static";?>')">
					<img src="images/<?php echo $img;?>" width="12" height="12" border="0" alt="<?php echo $alt; ?>" />
					</a>
					</td>
					<?php
				}
				?>
			
			
				<td align="center">
				<span class="titlesx">
                <?php
                echo $row->id;?></span>
				</td>
			
				<td align="left">
				<span class="titles">
                <?php echo $author;?>
                </span>
				</td>
				<td>
				<?php
		$date	= JHTML::_('date',  $row->created, JText::_('DATE_FORMAT_LC4') );
?>
				<span class="titles"><?php echo $date; ?></span>
				</td>
			</tr>
			<?php
			$k = 1 - $k;
		}
		?>
		</table>
		<?php 
		$db		=& JFactory::getDBO();
		$user	=& JFactory::getUser();
		$config	=& JFactory::getConfig();
		$now	= new JDate();
		echo $pageNav->getListFooter(); 
		echo "<BR/>";
		echo "<BR/>";
		JHTML::_('content.legend');
		?>
        <input type="hidden" name="id" value="<?php echo $row->id; ?>" />
		<input type="hidden" name="option" value="com_export_content" />
		<input type="hidden" name="task" value="static_content" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="hidemainmenu" value="0" />
		<input type="hidden" name="redirect" value="<?php echo $redirect; ?>" />
		<?php echo JHTML::_( 'form.token' ); ?>
		</form>
		<?php
	
	}
/***********************************
Edit sections
*************************************/
	function edit_sections( &$row, $option, &$lists, &$menus ) {
		global $mosConfig_live_site;
	JRequest::setVar( 'hidemainmenu', 1 );

		global $mainframe;

		$editor =& JFactory::getEditor();

		if ( $row->name != '' ) {
			$name = $row->name;
		} else {
			$name = JText::_( 'New Section' );
		}
		if ($row->image == '') {
			$row->image = 'blank.png';
		}

	//	jimport('joomla.filter.output');
	//	JOutputFilter::objectHTMLSafe( $row, ENT_QUOTES, 'description' );
	/*
		?>
		<script language="javascript" type="text/javascript">
		function submitbutton(pressbutton) {
			var form = document.adminForm;
			if (pressbutton == 'cancel') {
				submitform( pressbutton );
				return;
			}

			if ( pressbutton == 'menulink' ) {
				if ( form.menuselect.value == '' ) {
					alert( "<?php echo JText::_( 'Please select a Menu', true ); ?>" );
					return;
				} else if ( form.link_type.value == "" ) {
					alert( "<?php echo JText::_( 'Please select a menu type', true ); ?>" );
					return;
				} else if ( form.link_name.value == "" ) {
					alert( "<?php echo JText::_( 'Please enter a Name for this menu item', true ); ?>" );
					return;
				}
			}

			if ( form.title.value == '' ){
				alert("<?php echo JText::_( 'Section must have a title', true ); ?>");
			} else {
				<?php
				echo $editor->save( 'description' ) ; ?>
				submitform(pressbutton);
			}
		}
		</script>
<?php
	*/
		JFilterOutput::objectHTMLSafe( $row, ENT_QUOTES, 'description' );
		?>
		<script language="javascript" type="text/javascript">
		function submitbutton(pressbutton) {
			var form = document.adminForm;
			if (pressbutton == 'cancel_sect') {
				submitform( pressbutton );
				return;
			}

			if ( form.title.value == '' ){
				alert("<?php echo JText::_( 'Section must have a title', true ); ?>");
			} else {
				<?php
				echo $editor->save( 'description' ) ; ?>
				submitform(pressbutton);
			}
		}
		</script>

		<form action="index.php" method="post" name="adminForm">

		<div class="col60">
			<fieldset class="adminform">
				<legend><?php echo JText::_( 'Details' ); ?></legend>

				<table class="admintable">
				<tr>
					<td width="100" class="key">
						<?php echo JText::_( 'Scope' ); ?>:
					</td>
					<td colspan="2">
						<strong>
						<?php echo $row->scope; ?>
						</strong>
					</td>
				</tr>
				<tr>
					<td class="key">
						<label for="title">
							<?php echo JText::_( 'Title' ); ?>:
						</label>
					</td>
					<td colspan="2">
						<input class="text_area" type="text" name="title" id="title" value="<?php echo $row->title; ?>" size="50" maxlength="50" title="<?php echo JText::_( 'TIPTITLEFIELD' ); ?>" />
					</td>	
					</tr>
				<tr>
					<td nowrap="nowrap" class="key">
						<label for="alias">
							<?php echo JText::_( 'Alias' ); ?>:
						</label>
					</td>
					<td colspan="2">
						<input class="text_area" type="text" name="alias" id="alias" value="<?php echo $row->alias; ?>" size="50" maxlength="255" title="<?php echo JText::_( 'TIPNAMEFIELD' ); ?>" />
					</td>
				</tr>
				<tr>
					<td class="key">
						<?php echo JText::_( 'Published' ); ?>:
					</td>
					<td colspan="2">
						<?php echo $lists['published']; ?>
					</td>
				</tr>
				<tr>
					<td class="key">
						<label for="ordering">
							<?php echo JText::_( 'Ordering' ); ?>:
						</label>
					</td>
					<td colspan="2">
						<?php echo $lists['ordering']; ?>
					</td>
				</tr>
				<tr>
					<td nowrap="nowrap" valign="top" class="key">
						<label for="access">
							<?php echo JText::_( 'Access Level' ); ?>:
						</label>
					</td>
					<td>
						<?php echo $lists['access']; ?>
					</td>
					<td rowspan="4" width="50%">
						<?php
							$path = $mainframe->getSiteURL() . "/images/";
							if ($row->image != "blank.png") {
								$path.= "stories/";
							}
						?>
						<img src="<?php echo $path;?><?php echo $row->image;?>" name="imagelib" width="80" height="80" border="2" alt="<?php echo JText::_( 'Preview' ); ?>" />
					</td>
				</tr>
				<tr>
					<td class="key">
						<label for="image">
							<?php echo JText::_( 'Image' ); ?>:
						</label>
					</td>
					<td>
						<?php echo $lists['image']; ?>
					</td>
				</tr>
				<tr>
					<td nowrap="nowrap" class="key">
						<label for="image_position">
							<?php echo JText::_( 'Image Position' ); ?>:
						</label>
					</td>
					<td>
						<?php echo $lists['image_position']; ?>
					</td>
				</tr>
				</table>
			</fieldset>

			<fieldset class="adminform">
				<legend><?php echo JText::_( 'Details' ); ?></legend>

				<table class="admintable">
				<tr>
					<td valign="top" colspan="3">
										<?php
	/*****************************				
		intro/fulltext editors
	******************************/
	//check for magic quotes static
			if(get_magic_quotes_gpc()=='1'){
					
		echo $editor->display( 'description',  decode_entities(stripSlashes($row->description)) , '500', '300', '60', '20', false ) ;
		}else {
			echo $editor->display( 'description',  decode_entities($row->description) , '500', '300', '60', '20', false ) ;
		}
		

						// parameters : areaname, content, width, height, cols, rows
					//	echo $editor->display( 'description',  $row->description, '500', '300', '60', '20', false ) ;
						?>
					</td>
				</tr>
				</table>
			</fieldset>
		</div>
		<div class="clr"></div>

		<input type="hidden" name="option" value="<?php echo $option;?>" />
		<input type="hidden" name="scope" value="<?php echo $row->scope; ?>" />
		<input type="hidden" name="id" value="<?php echo $row->id; ?>" />
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="oldtitle" value="<?php echo $row->title ; ?>" />
		</form>
		<?php
	}
/*********************************
Edit Static
************************************/
	function edit_static( &$row, &$images, &$lists, &$params, $option, &$menus ) {
		global $database;
				global $database, $mainframe;
	//	$editor =& JFactory::getEditor();
	//	JHTML::_('behavior.tooltip');
	/*
		JRequest::setVar( 'hidemainmenu', 1 );

		jimport('joomla.html.pane');
		jimport('joomla.filter.output');
	//	JFilterOutput::objectHTMLSafe( $row );
	
	
		$db		=& JFactory::getDBO();
		$editor =& JFactory::getEditor();
		$pane	=& JPane::getInstance('sliders');

		JHTML::_('behavior.tooltip');

		mosMakeHtmlSafe( $row );

		$create_date 	= null;
		$mod_date 		= null;
		$nullDate 		= $database->getNullDate();

		if ( $row->created != $nullDate ) {
			$create_date 	= mosFormatDate( $row->created, '%A, %d %B %Y %H:%M', '0' );
		}
		if ( $row->modified != $nullDate ) {
			$mod_date 		= mosFormatDate( $row->modified, '%A, %d %B %Y %H:%M', '0' );
		}

		$tabs = new mosTabs( 1 );
		// used to hide "Reset Hits" when hits = 0
		if ( !$row->hits ) {
			$visibility = "style='display: none; visibility: hidden;'";
		} else {
			$visibility = "";
		}

		mosCommonHTML::loadOverlib();
		mosCommonHTML::loadCalendar();
		?>
	

		<table class="adminheading">
		<tr>
			<th class="edit">
		Static Content Item:
			<small>
			<?php echo $row->id ? 'Edit' : 'New';?>
			</small>
			</th>
		</tr>
		</table>
*/		global $database, $mainframe;
	//	$editor =& JFactory::getEditor();
	//	JHTML::_('behavior.tooltip');
	
		JRequest::setVar( 'hidemainmenu', 1 );

		jimport('joomla.html.pane');
		jimport('joomla.filter.output');
	//	JFilterOutput::objectHTMLSafe( $row );
	
	$cparams = JComponentHelper::getParams ('com_media');
		$db		=& JFactory::getDBO();
		$editor =& JFactory::getEditor();
		$pane	=& JPane::getInstance('sliders');

		JHTML::_('behavior.tooltip');
	////////////////////////
		//JRequest::setVar( 'hidemainmenu', 1 );

	//	jimport('joomla.html.pane');
		JFilterOutput::objectHTMLSafe( $row );

	//	$db		=& JFactory::getDBO();
	//	$editor =& JFactory::getEditor();
	//	$pane	=& JPane::getInstance('sliders');

		JHTML::_('behavior.tooltip');
	
	///////////////////////////
	//	mosMakeHtmlSafe( $row );
	$db				= & JFactory::getDBO();
		$user			= & JFactory::getUser();
		//$nullDate 		= $database->getNullDate();
		$nullDate		= $db->getNullDate();
		$create_date 	= null;

		if ( $row->created != $nullDate ) {
			$create_date 	= mosFormatDate( $row->created, '%A, %d %B %Y %H:%M', '0' );
		}
		$mod_date = null;
		if ( $row->modified != $nullDate ) {
			$mod_date 		= mosFormatDate( $row->modified, '%A, %d %B %Y %H:%M', '0' );
		}

		$tabs = new mosTabs(1);

		// used to hide "Reset Hits" when hits = 0
		if ( !$row->hits ) {
			$visibility = "style='display: none; visibility: hidden;'";
		} else {
			$visibility = "";
		}

		mosCommonHTML::loadOverlib();
		mosCommonHTML::loadCalendar();
		?>
		<script language="javascript" type="text/javascript">
		<!--

     function submitbutton(pressbutton) {
			var form = document.adminForm;
			if (pressbutton == 'cancelStatic') {
				submitform( pressbutton );
				return;
			}
		
	var text = <?php echo $editor->getContent( 'text' ); ?>
			// do field validation
			if (form.title.value == ""){
			alert( "<?php echo JText::_( 'Article must have a title', true ); ?>" );	
			} else if (form.introtext == ""){
				alert( "<?php echo JText::_( 'Article must have some text', true ); ?>" );
			} else {
	
				<?php getEditorContents( 'editor1', 'introtext' ) ; ?>
				<?php getEditorContents( 'editor2', 'fulltext' ) ; ?>
				submitform( pressbutton );
			}
		}
		//-->
		</script>
	
		</tr>
		</table>
		<form action="index2.php" method="post" name="adminForm">

		<table cellspacing="0" cellpadding="0" border="0" width="100%">
		<tr>
			<td width="60%" valign="top">

				<table class="adminform">
				<tr>
					<th colspan="3">
					Item Details
					</th>
				</tr>
				<tr>
					<td align="left">
					Title:
					</td>
					<td>
					<input class="inputbox" type="text" name="title" size="30" maxlength="100" value="<?php echo  decode_entities_all($row->title); ?>" />
					</td>
				</tr>
				<tr>
					<td align="left">
					Title Alias:
					</td>
					<td>
					<?php
                    //html_entity_decode 
                   $alias= decode_entities_all($row->alias);
					?>
					<input class="inputbox" type="text" name="alias" size="30" maxlength="100" value="<?php echo $alias; ?>" />
					<?php
//echo	$row->alias;
?></td>
				</tr>
				<tr>
					<td valign="top" align="left" colspan="2" width="60%">
						<table class="adminform" width="100%">
				<tr>
					<td>
					Text: (required)<br />
					<?php

	if(get_magic_quotes_gpc()=='1'){
					
		echo $editor->display( 'introtext',  stripSlashes($row->introtext), '100%', '550', '75', '20') ;
		}else {
			echo $editor->display( 'introtext',  $row->introtext, '100%', '550', '75', '20') ;
				}
	?>
	<span class="editlinktip hasTip" title="<u><?php echo JText::_( 'Readmore' );?></u>::
	<?php
   echo	 _READMORE_EDITOR_MSG;
   //echo "<BR />";
   echo _CFG_CONTENT;
?>.">
<a href="#">&nbsp;
				<?php echo JText::_( 'Read more...' ); ?>
				</a></span>
            </td>
				</tr>
				<tr>
				<td>
					Main Text: (optional)
					<br />
					<?php

						if(get_magic_quotes_gpc()=='1'){
					
		echo $editor->display( 'fulltext',  stripSlashes($row->fulltext), '100%', '550', '75', '20') ;
		}else {
		echo $editor->display( 'fulltext',  $row->fulltext, '100%', '550', '75', '20') ;
		}
	?>
		</td>
				</tr>
				</table>
			<td width="40%" valign="top">
		<?php
			$config =& JFactory::getConfig();
		$tzoffset = $config->getValue('config.offset');
		$date = new JDate($row->created, $tzoffset);
		$row->created = $date->toMySQL();
		// Create the form
		$form = new JParameter('', JPATH_COMPONENT.DS.'models'.DS.'article.xml');
		// Advanced Group
	$form->loadINI($row->attribs);
	
				$title = JText::_( 'Parameters - Article' );
				echo $pane->startPane("content-pane");
				echo $pane->startPanel( $title, "detail-page" );
		?>
				<table class="adminform">
				<tr>
					<th colspan="2">
					Publishing Info
					</th>
				</tr>
				<tr>
					<td valign="top" align="right" width="120">
				
					</td>
					<td>
					</td>
				</tr>
				<tr>
					<td valign="top" align="right">
					Published:
					</td>
					<td>
					<input type="checkbox" name="state" value="1" <?php echo $row->state ? 'checked="checked"' : ''; ?> />
					
					</td>
				</tr>
				<tr>
					<td valign="top" align="right">
					Access Level:
					</td>
					<td>
					<?php echo $lists['access']; ?>
					</td>
				</tr>
				<tr>
					<td valign="top" align="right">
					Author Alias:
					</td>
					<td>
					<input type="text" name="created_by_alias" size="30" maxlength="100" value="<?php echo $row->created_by_alias; ?>" class="text_area" />
					</td>
				</tr>
				<tr>
					<td valign="top" align="right">
					Change Creator:
					</td>
					<td>
					<?php echo $lists['created_by']; ?>
					</td>
				</tr>
				<tr>
					<td valign="top" align="right">Ordering:</td>
					<td>
					<?php //echo $lists['ordering']; ?>
					</td>
				</tr>
				<tr>
					<td valign="top" align="right">
					Override Created Date
					</td>
					<td>
					<?php
	$rowpublish_down 	= ContentController::_validateDate($row->publish_down);
	$rowcreated 	= ContentController::_validateDate($row->created);
?>
					<input class="text_area" type="text" name="created" id="created" size="25" maxlength="19" value="<?php echo $rowcreated; ?>" />
					<input name="reset" type="reset" class="button" onclick="return showCalendar('created', 'y-mm-dd');" value="..." />
					</td>
				</tr>
				<tr>
					<td valign="top" align="right">
					Start Publishing:
					</td>
					<td>
			
					<input class="text_area" type="text" name="publish_up" id="publish_up" size="25" maxlength="19" value="<?php echo $row->publish_up; ?>" />
					<input type="reset" class="button" value="..." onclick="return showCalendar('publish_up', 'y-mm-dd');" />
					</td>
				</tr>
				<tr>
					<td valign="top" align="right">
					Finish Publishing:
					</td>
					<td>
					<?php
//	echo	$form->set('created', JHTML::_('date', $row->created, '%Y-%m-%d %H:%M:%S'));
//	echo	$form->set('publish_up', JHTML::_('date', $row->publish_up, '%Y-%m-%d %H:%M:%S'));
//<input type="hidden" name="reset_hits" value=" onclick="submitbutton('resethits');" />
?>
					<input class="text_area" type="text" name="publish_down" id="publish_down" size="25" maxlength="19" value="never" />
					<input type="reset" class="button" value="..." onclick="return showCalendar('publish_down', 'y-mm-dd');" />
					</td>
				</tr>
				</table>
		<?php
		$title = JText::_( 'Parameters - Advanced' );
				echo $pane->endPanel();
				echo $pane->startPanel( $title, "params-page" );
				echo $form->render('params', 'advanced');
	

				$title = JText::_( 'Metadata Information' );
				echo $pane->endPanel();
				echo $pane->startPanel( $title, "metadata-page" );
			//	echo $form->render('meta', 'metadata');
	 
		 if($row->metadata!=NULL){
	  $row->metadata  	= explode( "\n", $row->metadata  );
		$robot_meta = trim( $row->metadata [0] );
         $authors_meta = trim( $row->metadata [1] );
	}else{
	$robot_meta = '';
         $authors_meta = '';	
	}
	$robots = str_replace('robots=','',$robot_meta);
	$authors_meta = str_replace('author=','',$authors_meta);
	?>
<table width="100%" class="paramlist admintable" cellspacing="1">
<tr>
<td width="40%" class="paramlist_key"><span class="editlinktip"><label id="metadescription-lbl" for="metadescription" class="hasTip" title="Description::METADESC">Description</label></span></td>
<td class="paramlist_value"><textarea name="meta[description]" cols="30" rows="5" class="text_area" id="metadescription" ><?php echo $row->metadesc; ?></textarea></td>
</tr>
<tr>
<td width="40%" class="paramlist_key"><span class="editlinktip"><label id="metakeywords-lbl" for="metakeywords" class="hasTip" title="Keywords::METAKEYS">Keywords</label></span></td>
<td class="paramlist_value"><textarea name="meta[keywords]" cols="30" rows="5" class="text_area" id="metakeywords" ><?php echo $row->metakey; ?></textarea></td>
</tr>
<tr>
<td width="40%" class="paramlist_key"><span class="editlinktip"><label id="metarobots-lbl" for="metarobots" class="hasTip" title="Robots::METAROBOTS">Robots</label></span></td>
<td class="paramlist_value"><input type="text" name="meta[robots]" id="metarobots" value="<?php echo $robots;?>" class="text_area" size="20" /></td>
</tr>
<tr>
<td width="40%" class="paramlist_key"><span class="editlinktip"><label id="metaauthor-lbl" for="metaauthor" class="hasTip" title="Author::METAAUTHOR">Author</label></span></td>
<td class="paramlist_value"><input type="text" name="meta[author]" id="metaauthor" value="<?php echo $authors_meta; ?>" class="text_area" size="20" /></td>
</tr>
</table>
		
			<?php	
			echo $pane->endPanel();
			echo $pane->endPane();
		
				?>
			</td>
		
		
		</tr>
		</table>
		
        <input type="hidden" name="images" value="" />
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<input type="hidden" name="id" value="<?php echo $row->id; ?>" />
		<input type="hidden" name="hits" value="<?php echo $row->hits; ?>" />
		<input type="hidden" name="task" value="edit_static" />
		</form>
		<?php
	}
/**********************************************************************
	* Writes the edit form for new and existing content item
	*
	* A new record is defined when <var>$row</var> is passed with the <var>id</var>
	* property set to 0.
	* @param mosContent The category object
	* @param string The html for the groups select list
*******************************************************************************/
function editContent_item( &$row, $section, &$lists, &$sectioncategories, &$images, &$params, $option, $redirect, &$menus, $form ) {
		global $database, $mainframe;
	//	$editor =& JFactory::getEditor();
	//	JHTML::_('behavior.tooltip');
	
		JRequest::setVar( 'hidemainmenu', 1 );

		jimport('joomla.html.pane');
		jimport('joomla.filter.output');
	//	JFilterOutput::objectHTMLSafe( $row );
	
	
		$db		=& JFactory::getDBO();
		$editor =& JFactory::getEditor();
		$pane	=& JPane::getInstance('sliders');

		JHTML::_('behavior.tooltip');
	
		mosMakeHtmlSafe( $row );
	$db				= & JFactory::getDBO();
		$user			= & JFactory::getUser();
		//$nullDate 		= $database->getNullDate();
		$nullDate		= $db->getNullDate();
		$create_date 	= null;

		if ( $row->created != $nullDate ) {
			$create_date 	= mosFormatDate( $row->created, '%A, %d %B %Y %H:%M', '0' );
		}
		$mod_date = null;
		if ( $row->modified != $nullDate ) {
			$mod_date 		= mosFormatDate( $row->modified, '%A, %d %B %Y %H:%M', '0' );
		}

		$tabs = new mosTabs(1);

		// used to hide "Reset Hits" when hits = 0
		if ( !$row->hits ) {
			$visibility = "style='display: none; visibility: hidden;'";
		} else {
			$visibility = "";
		}

		mosCommonHTML::loadOverlib();
		mosCommonHTML::loadCalendar();
		?>
		<script language="javascript" type="text/javascript">
		<!--
		var sectioncategories = new Array;
		<?php
		$i = 0;
		foreach ($sectioncategories as $k=>$items) {
			foreach ($items as $v) {
				echo "sectioncategories[".$i++."] = new Array( '$k','".addslashes( $v->id )."','".addslashes( $v->name )."' );\t";
			}
		}
		?>

		var folderimages = new Array;
		<?php
		$i = 0;
		foreach ($images as $k=>$items) {
			foreach ($items as $v) {
				echo "folderimages[".$i++."] = new Array( '$k','".addslashes( ampReplace( $v->value ) )."','".addslashes( ampReplace( $v->text ) )."' );\t";
			}
		}
		?>

		function submitbutton(pressbutton) {
			var form = document.adminForm;

			if ( pressbutton == 'menulink' ) {
				if ( form.menuselect.value == "" ) {
					alert( "Please select a Menu" );
					return;
				} else if ( form.link_name.value == "" ) {
					alert( "Please enter a Name for this menu item" );
					return;
				}
			}

			if (pressbutton == 'cancel_item') {
				submitform( pressbutton );
				return;
			}
			// assemble the images back into one field
		//	var temp = new Array;
		//	for (var i=0, n=form.imagelist.options.length; i < n; i++) {
		//		temp[i] = form.imagelist.options[i].value;
		//	}
		//	form.images.value = temp.join( '\n' );

			// do field validation
			if (form.title.value == ""){
			 	alert( "<?php echo JText::_( 'Article must have a title', true ); ?>" );
			//	alert( "Content item must have a title" );
			} else if (form.sectionid.value == "-1"){
			 alert( "<?php echo JText::_( 'You must select a Section', true ); ?>" );
			} else if (form.catid.value == "-1"){
				alert( "<?php echo JText::_( 'You must select a Category', true ); ?>" );
 			} else if (form.catid.value == ""){
 					alert( "<?php echo JText::_( 'You must select a Category', true ); ?>" );
 					
			//} else if (form.textarea.introtext == ""){
				alert( "<?php echo JText::_( 'Article must have some text', true ); ?>" );
			} else {
				<?php getEditorContents( 'editor1', 'introtext' ) ; ?>
				<?php getEditorContents( 'editor2', 'fulltext' ) ; ?>
				submitform( pressbutton );
			}
		}
		//-->
		</script>
		<form action="index2.php" method="post" name="adminForm">
		<table class="adminheading">
		<tr>
			<th class="edit">
			Content Item:
			<small>
			<?php //echo $row->id ? 'Edit' : 'New';?>
			</small>
			<?php
			if ( $row->id ) {
				?>
				<small><small>
				[ Section: <?php echo $section; ?> ]
				</small></small>
				<?php
			}
			?>
			</th>
		</tr>
		</table>

		<table cellspacing="0" cellpadding="0" width="100%">
		<tr>
			<td width="60%" valign="top">
				<table width="100%" class="adminform">
				<tr>
					<td width="100%">
						<table cellspacing="0" cellpadding="0" border="0" width="100%">
						<tr>
							<th colspan="4">
							Item Details
							</th>
						</tr>
						<tr>
							<td>
							Title:
							</td>
							<td align="left">
							
	<input name="title" type="text" class="text_area" id="title" value="<?php if(get_magic_quotes_gpc()=='1'){echo decode_entities(stripSlashes($row->title));}else{echo decode_entities($row->title);}?>" size="30" maxlength="100" />
							</td>
							<td>
							Section:
							</td>
							<td>
							<?php echo $lists['sectionid']; ?>
							</td>
						</tr>
						<tr>
							<td>
							Title Alias:
							</td>
							<td>
	<input name="alias" type="text" class="text_area" id="alias" value="<?php if(get_magic_quotes_gpc()=='1'){echo decode_entities(stripSlashes($row->alias));}else{echo decode_entities($row->alias);}?>" size="30" maxlength="100" />
		
							</td>
							<td>
							Category:
							</td>
							<td>
							<?php echo $lists['catid']; ?>
							</td>
						</tr>
						</table>
					</td>
				</tr>
				<tr>
				<td	valign="top" >
					Intro Text: (required)
					<br />
					<?php
	/*****************************				
		intro/fulltext editors
	******************************/
		mosCommonHTML::loadOverlib();
		global $mainframe;

		// Initialize variables
		$db		=& JFactory::getDBO();
		$user	=& JFactory::getUser();

		//Ordering allowed ?
		//$ordering = ($lists['order'] == 'section_name' && $lists['order_Dir'] == 'asc');
		JHTML::_('behavior.tooltip');
	//check for magic quotes static

						if(get_magic_quotes_gpc()=='1'){
					
		echo $editor->display( 'introtext',  stripSlashes($row->introtext), '100%', '550', '75', '20') ;
		}else {
			echo $editor->display( 'introtext',  $row->introtext, '100%', '550', '75', '20') ;
		}
			?>
	<span class="editlinktip hasTip" title="<u><?php echo JText::_( 'Readmore' );?></u>::
	<?php
   echo	 _READMORE_EDITOR_MSG;
   //echo "<BR />";
   echo _CFG_CONTENT;
?>.">
<a href="#">&nbsp;
				<?php echo JText::_( 'Read more...' ); ?>
				</a></span>
            </td>
				</tr>
				<tr>
				<td>
					Main Text: (optional)
					<br />
					<?php

						if(get_magic_quotes_gpc()=='1'){
					
		echo $editor->display( 'fulltext',  stripSlashes($row->fulltext), '100%', '550', '75', '20') ;
		}else {
		echo $editor->display( 'fulltext',  $row->fulltext, '100%', '550', '75', '20') ;
		}
	?>
		</td>
			</tr>
				</table>
			</td>
		<td width="48%" valign="top">
					<?php 
								
		$config =& JFactory::getConfig();
		$tzoffset = $config->getValue('config.offset');
		$date = new JDate($row->created, $tzoffset);
		$row->created = $date->toMySQL();
		// Create the form
		$form = new JParameter('', JPATH_COMPONENT.DS.'models'.DS.'article.xml');
		// Advanced Group
	$form->loadINI($row->attribs);
	//	HTML_export::_displayArticleStats($row, $lists);
				$title = JText::_( 'Parameters - Article' );
				echo $pane->startPane("content-pane");
				echo $pane->startPanel( $title, "detail-page" );
		?>
				<table class="adminform">
				<tr>
					<th colspan="2">
					Publishing Info
					</th>
				</tr>
				<tr>
					<td valign="top" align="right" width="120">
				
					</td>
					<td>
					
					
					</td>
				</tr>
				<tr>
					<td valign="top" align="right">
					Published:
					</td>
					<td>
					<input type="checkbox" name="state" value="1" <?php echo $row->state ? 'checked="checked"' : ''; ?> />
					
					</td>
				</tr>
				<tr>
					<td valign="top" align="right">
					Access Level:
					</td>
					<td>
					<?php echo $lists['access']; ?>
					</td>
				</tr>
				<tr>
					<td valign="top" align="right">
					Author Alias:
					</td>
					<td>
					<input type="text" name="created_by_alias" size="30" maxlength="100" value="<?php echo $row->created_by_alias; ?>" class="text_area" />
					</td>
				</tr>
				<tr>
					<td valign="top" align="right">
					Change Creator:
					</td>
					<td>
					<?php echo $lists['created_by']; ?>
					</td>
				</tr>
				<tr>
					<td valign="top" align="right">Ordering:</td>
					<td>
					<?php echo $lists['ordering']; ?>
					</td>
				</tr>
				<tr>
					<td valign="top" align="right">
					Override Created Date
					</td>
					<td>
					<?php
	$rowpublish_down 	= ContentController::_validateDate($row->publish_down);
	$rowcreated 	= ContentController::_validateDate($row->created);
?>
					<input class="text_area" type="text" name="created" id="created" size="25" maxlength="19" value="<?php echo $rowcreated; ?>" />
					<input name="reset" type="reset" class="button" onclick="return showCalendar('created', 'y-mm-dd');" value="..." />
					</td>
				</tr>
				<tr>
					<td valign="top" align="right">
					Start Publishing:
					</td>
					<td>
			
					<input class="text_area" type="text" name="publish_up" id="publish_up" size="25" maxlength="19" value="<?php echo $row->publish_up; ?>" />
					<input type="reset" class="button" value="..." onclick="return showCalendar('publish_up', 'y-mm-dd');" />
					</td>
				</tr>
				<tr>
					<td valign="top" align="right">
					Finish Publishing:
					</td>
					<td>
					<?php
			//	echo	$form->set('created', JHTML::_('date', $row->created, '%Y-%m-%d %H:%M:%S'));
//	echo	$form->set('publish_up', JHTML::_('date', $row->publish_up, '%Y-%m-%d %H:%M:%S'));
	
	
//<input type="hidden" name="reset_hits" value=" onclick="submitbutton('resethits');" />
?>
					<input class="text_area" type="text" name="publish_down" id="publish_down" size="25" maxlength="19" value="never" />
					<input type="reset" class="button" value="..." onclick="return showCalendar('publish_down', 'y-mm-dd');" />
					</td>
				</tr>
				</table>
		<?php
       //	echo	$row->created_by_alias;
		//echo $form->render('details');
	
				$title = JText::_( 'Parameters - Advanced' );
				echo $pane->endPanel();
				echo $pane->startPanel( $title, "params-page" );
				echo $form->render('params', 'advanced');

				$title = JText::_( 'Metadata Information' );
				echo $pane->endPanel();
				echo $pane->startPanel( $title, "metadata-page" );
			//	echo $form->render('meta', 'metadata');
			//	$row->metadata  	= explode( "\n", $row->metadata  );
	 if($row->metadata!=NULL){
	  $row->metadata  	= explode( "\n", $row->metadata  );
		$robot_meta = trim( $row->metadata [0] );
         $authors_meta = trim( $row->metadata [1] );
	}else{
	$robot_meta = '';
         $authors_meta = '';	
	}
	$robots = str_replace('robots=','',$robot_meta);
	$authors_meta = str_replace('author=','',$authors_meta);
		
				?>
<table width="100%" class="paramlist admintable" cellspacing="1">
<tr>
<td width="25%" class="paramlist_key"><span class="editlinktip"><label id="metadescription-lbl" for="metadescription" class="hasTip" title="Description::METADESC">Description</label></span></td>
<td class="paramlist_value"><textarea name="meta[description]" cols="30" rows="5" class="text_area" id="metadescription" ><?php echo $row->metadesc; ?></textarea></td>
</tr>
<tr>
<td width="25%" class="paramlist_key"><span class="editlinktip"><label id="metakeywords-lbl" for="metakeywords" class="hasTip" title="Keywords::METAKEYS">Keywords</label></span></td>
<td class="paramlist_value"><textarea name="meta[keywords]" cols="30" rows="5" class="text_area" id="metakeywords" ><?php echo $row->metakey; ?></textarea></td>
</tr>
<tr>
<td width="25%" class="paramlist_key"><span class="editlinktip"><label id="metarobots-lbl" for="metarobots" class="hasTip" title="Robots::METAROBOTS">Robots</label></span></td>
<td class="paramlist_value"><input type="text" name="meta[robots]" id="metarobots" value="<?php echo $robots;?>" class="text_area" size="20" /></td>
</tr>
<tr>
<td width="25%" class="paramlist_key"><span class="editlinktip"><label id="metaauthor-lbl" for="metaauthor" class="hasTip" title="Author::METAAUTHOR">Author</label></span></td>
<td class="paramlist_value"><input type="text" name="meta[author]" id="metaauthor" value="<?php echo $authors_meta; ?>" class="text_area" size="20" /></td>
</tr>
</table>
		
			<?php	
			echo $pane->endPanel();
			echo $pane->endPane();
				?>
			</td>
		</tr>
		</table>

	
		<input type="hidden" name="id" value="<?php echo $row->id; ?>" />
		<input type="hidden" name="version" value="<?php echo $row->version; ?>" />
		<input type="hidden" name="mask" value="0" />
		<input type="hidden" name="option" value="com_export_content" />
		<input type="hidden" name="redirect" value="<?php echo $redirect;?>" />
		<input type="hidden" name="task" value="content_items" />
		<input type="hidden" name="images" value="" />
		<input type="hidden" name="hidemainmenu" value="0" />
		</form>
		<?php
	}
/******************************************
Edit categories
*****************************************/
	function edit_categories( &$row, &$lists, $redirect, $menus ) {
	 		global $mosConfig_live_site;
	JRequest::setVar( 'hidemainmenu', 1 );

		global $mainframe;

		$editor =& JFactory::getEditor();
		
		if ($row->image == "") {
			$row->image = 'blank.png';
		}

		if ( $redirect == 'content' ) {
			$component = 'Content';
		} else {
			$component = ucfirst( substr( $redirect, 4 ) );
			if ( $redirect == 'com_contact_details' ) {
				$component = 'Contact';
			}
		}
		mosMakeHtmlSafe( $row, ENT_QUOTES, 'description' );
		?>
		<script language="javascript" type="text/javascript">
		function submitbutton(pressbutton, section) {
			var form = document.adminForm;
			if (pressbutton == 'cancel_cat') {
				submitform( pressbutton );
				return;
			}

			if ( pressbutton == 'menulink' ) {
				if ( form.menuselect.value == "" ) {
					alert( "Please select a Menu" );
					return;
				} else if ( form.link_type.value == "" ) {
					alert( "Please select a menu type" );
					return;
				} else if ( form.link_name.value == "" ) {
					alert( "Please enter a Name for this menu item" );
					return;
				}
			}

			if ( form.title.value == "" ) {
				alert("<?php echo JText::_( 'Category must have a title', true ); ?>");
			} else {
				<?php getEditorContents( 'editor1', 'description' ) ; ?>
				submitform(pressbutton);
			}
		}
		</script>

		<form action="index2.php" method="post" name="adminForm">
		<table class="adminheading">
		<tr>
			<th class="categories">
			Category:
			<small>
			<?php echo $row->id ? 'Edit' : 'New';?>
			</small>
			<small><small>
			[ <?php echo $component; ?>: <?php echo stripslashes($row->name); ?> ]
			</small></small>
			</th>
		</tr>
		</table>

		<table width="100%">
		<tr>
			<td valign="top" width="60%">
				<table class="adminform">
				<tr>
					<th colspan="3">
						<legend><?php echo JText::_( 'Details' ); ?></legend>
					</th>
				<tr>
				<tr>
					<td class="key">
							<label for="title" width="100">
								<?php echo JText::_( 'Title' ); ?>:
							</label>
					</td>
					<td colspan="2">
					<input class="text_area" type="text" name="title" value="<?php echo stripslashes( $row->title ); ?>" size="50" maxlength="50" title="A short name to appear in menus" />
					</td>
				</tr>
				<tr>
						<td class="key">
							<label for="alias">
								<?php echo JText::_( 'Alias' ); ?>:
							</label>
					</td>
					<td colspan="2">
					<input class="text_area" type="text" name="alias" value="<?php echo stripslashes( $row->alias ); ?>" size="50" maxlength="255" title="A long name to be displayed in headings" />
					</td>
				</tr>
				<tr>
					<td class="key">
							<label for="section">
								<?php echo JText::_( 'Section' ); ?>:
							</label>
					</td>
					<td colspan="2">
					<?php echo $lists['section']; ?>
					</td>
				</tr>
				<tr>
					<td class="key">
							<label for="ordering">
								<?php echo JText::_( 'Ordering' ); ?>:
							</label>
					</td>
					<td colspan="2">
					<?php echo $lists['ordering']; ?>
					</td>
				</tr>
				<tr>
					<td>
					Image:
					</td>
					<td>
					<?php echo $lists['image']; ?>
					</td>
					<td rowspan="5" width="50%">
					<script language="javascript" type="text/javascript">
					if (document.forms[0].image.options.value!=''){
					  jsimg='../images/stories/' + getSelectedValue( 'adminForm', 'image' );
					} else {
					  jsimg='../images/M_images/blank.png';
					}
					document.write('<img src=' + jsimg + ' name="imagelib" width="80" height="80" border="2" alt="Preview" />');
					</script>
					</td>
				</tr>
				<tr>
						<td class="key">
							<label for="image_position">
								<?php echo JText::_( 'Image Position' ); ?>:
							</label>
					</td>
					<td>
					<?php echo $lists['image_position']; ?>
					</td>
				</tr>
				<tr>
						<td valign="top" class="key">
							<label for="access">
								<?php echo JText::_( 'Access Level' ); ?>:
							</label>
					</td>
					<td>
					<?php echo $lists['access']; ?>
					</td>
				</tr>
				<tr>
					<td class="key">
							<?php echo JText::_( 'Published' ); ?>:
					</td>
					<td>
					<?php echo $lists['published']; ?>
					</td>
				</tr>
				<tr>
					<td valign="top" colspan="2">
					<legend><?php echo JText::_( 'Description' ); ?></legend>
					</td>
				</tr>
				<tr>
					<td colspan="3">
	<?php
/**************************************				
 editor 
**************************************/
	jimport('joomla.filter.output');
		JFilterOutput::objectHTMLSafe( $row, ENT_QUOTES, 'description' );
	//check for magic quotes static
			if(get_magic_quotes_gpc()=='1'){
					
		echo $editor->display( 'description',  decode_entities(stripSlashes($row->description)) , '500', '300', '60', '20', false ) ;
		}else {
			echo $editor->display( 'description',  decode_entities($row->description) , '500', '300', '60', '20', false ) ;
		}
		 ?>
					</td>
				</tr>
				</table>
			</td>
			<td valign="top" width="1%"></td>
		</tr>
		</table>

		<input type="hidden" name="option" value="com_export_content" />
		<input type="hidden" name="oldtitle" value="<?php echo $row->title ; ?>" />
		<input type="hidden" name="id" value="<?php echo $row->id; ?>" />
		<input type="hidden" name="sectionid" value="<?php echo $row->section; ?>" />
		<input type="hidden" name="task" value="categories" />
		<input type="hidden" name="redirect" value="<?php echo $redirect; ?>" />
		<input type="hidden" name="hidemainmenu" value="0" />
		</form>
		<?php
	}

 /*******************************************************************
Choose multipule sections and whether to add archived items to compile
*********************************************************************/
 	function section_to_export( $sec_rows, &$rows, $scope, $myid, &$pageNav, $option ) {
		global $my, $mosConfig_live_site, $adminName, $mosConfig_sitename;
$option='com_export_content';
		mosCommonHTML::loadOverlib();
		global $mainframe;

		// Initialize variables
		$db		=& JFactory::getDBO();
		$user	=& JFactory::getUser();

		//Ordering allowed ?
		//$ordering = ($lists['order'] == 'section_name' && $lists['order_Dir'] == 'asc');
		JHTML::_('behavior.tooltip');
		?>
		<form action="index2.php" method="post" name="adminForm" onsubmit="document.getElementById('submitdiv').innerHTML='<?php echo _COMPILE_CONFIRM_TXT;?>'">
		<div id="submitdiv"></div>
		
		<div class="clr"></div>
			<div id="element-box">
			<div class="t">
		 		<div class="t">
					<div class="t"></div>
		 		</div>
			</div>
	
		<?php
		 //showhelp();
	echo "<div class=\"page_dropdowns\">";
$html_arch = mosHTML::yesnoSelectList( 'archives', 'class="inputbox"', '0', 'Yes', 'No' );
$html_static = mosHTML::yesnoSelectList( 'static_items', 'class="inputbox"', '0', 'Yes', 'No' );
      echo _ARCHIVE_YES_NO;
	  echo ":&nbsp;&nbsp;";
      echo $html_arch;
      echo "&nbsp;&nbsp;";
      echo _STATIC_YES_NO;
      echo ":&nbsp;&nbsp;";
      echo $html_static;
      echo "</div>";
?>

		<table class="adminlist">
		<tr>
			<th width="20">
			#
			</th>
			<th width="20">
			<input type="checkbox" name="toggle" value="" onClick="checkAll(<?php echo count( $rows );?>);" />
			</th>
			<th class="title">
			<?php 
				echo	JText::_('Title');
			//echo _SECTION_NAME;?>
			</th>
			<th width="8%" align="center">
		<?php 
		echo	JText::_('Published');?>
		
			<th width="12%" align="center">
			<?php //echo _ACCESS;?>
				<?php 
		echo	JText::_('Access');?>
			</th>
			<th width="10%" align="center" nowrap>
				<?php 
		echo	JText::_('Section');
		echo	JText::_('ID');?>
			</th>
			<th width="10%" align="center" nowrap>
			<?php 
		echo	JText::_('Category');?>
			</th>
			<th width="12%" align="center" nowrap>
				<?php //echo _ITEMS;?>
				<?php echo JText::_( 'Num Active' ); ?>
			</th>
		<?php
//<th width="12%" nowrap># Trash</th>
 ?>

		</tr>
		<?php
		$k = 0;
		for ( $i=0, $n=count( $rows ); $i < $n; $i++ ) {
			$row = &$rows[$i];
			$link = 'index2.php?option=com_sections&scope=content&task=editA&hidemainmenu=1&id='. $row->id;

			$access 	= mosCommonHTML::AccessProcessing( $row, $i );
			$checked 	= mosCommonHTML::CheckedOutProcessing( $row, $i );
			$published 	= mosCommonHTML::PublishedProcessing( $row, $i );
			?>
			<tr class="<?php echo "row$k"; ?>">
				<td width="20" align="right">
				<?php echo $pageNav->rowNumber( $i ); ?>
				</td>
				<td width="20">
				<?php echo $checked; ?>
				</td>
				<td width="35%"><span class="titles">
				<?php
				if ( $row->checked_out && ( $row->checked_out != $my->id ) ) {
					echo $row->name. " ( ". $row->title ." )";
				} else {
					?>
					<a href="<?php echo $link; ?>">
					<?php
                    //echo $row->name. " ( ". $row->title ." )";
                    }
                     ?>
					</a>
					
<?php
/*******************************
 Tool tips
********************************/?>	
			
<span class="editlinktip hasTip" title="<?php echo JText::_( 'How to edit' );?>:: To  edit the [<?php echo $row->title; ?>] section Go to the site section manager.<br><br><b>Note: </b>If you want to change title names or the content you may do so after exporting to the destination site.">
<a href="#">
					<?php echo $row->title. " ( ". $row->alias ." )";?>
				</a></span>
				</td>
				<td align="center">
	<?php
				if($row->published=='1' ){
                  ?>
              <img src="../administrator/images/tick.png" alt="published" border="0"/>
                  <?php
                  }
            	if($row->published=='0' ){
                  ?>
             <img src="../administrator/images/publish_x.png" alt="unpublished" border="0"/>
              <?php
              }
                ?>
			</a>
            </td>
			
				<td align="center">
				<?php
                //echo $access;
                /////////////////tool tip here
                ?>
			
			<?php
		$permission=	$row->access;
			if($permission=='0'){
              echo _EX_PUBLIC;
   }
   		if($permission=='1'){
              echo _EX_REGISTERED;
   }
   	if($permission=='2'){
              echo _EX_SPECIAL;
   }
        ?>
				</a></td>
				<td align="center">
				<?php echo $row->id; ?>
				</td>
				<td align="center">
				<?php echo $row->categories; ?>
				</td>
				<td align="center">
				<?php echo $row->active; ?>
				</td>
			
				<?php
                //echo $row->trash;
				$k = 1 - $k;
				?>
			</tr>
			<?php
	}
		?>
		</table>
		<?php echo $pageNav->getListFooter();?>

        <input type="hidden" name="task" value="sections_to_export"/>
		<input type="hidden" name="option" value="com_export_content" />
		<input type="hidden" name="scope" value="<?php echo $scope;?>" />
	    <input type="hidden" name="chosen" value="" />
		<input type="hidden" name="act" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="hidemainmenu" value="0" />
		</form>
		<?php
   }
/****************************************************************
	* Writes a list of Archived content items
	* @param array An array of content objects
*****************************************************************/
	function showExportArchive( &$rows, $section, &$lists, $search, $pageNav, $option, $all=NULL, $redirect ) {
		global $my, $acl;

		?>
		<script language="javascript" type="text/javascript">
		function submitbutton(pressbutton) {
			if (pressbutton == 'remove') {
				if (document.adminForm.boxchecked.value == 0) {
					alert('Please make a selection from the list to send to Trash');
				} else if ( confirm('Are you sure you want to Trash the selected items? \nThis will not permanently delete the items.')) {
					submitform('remove');
				}
			} else {
				submitform(pressbutton);
			}
		}
		</script>
		<?php
		mosCommonHTML::loadOverlib();
		?>
		<form action="index2.php" method="post" name="adminForm">

			<?php
			if ( $section == 'content' ) {
//echo $row->section_name;
}
			if ( $all ) {
				?>
				<?php //echo _ARCHIVE_ITEMS_HEADING;
			
			} else {
				?>
				Content Items Manager <small>[ Section: <?php echo $section->title; ?> ]</small>
				<?php
			}
		
   	 global $mosConfig_sitename;
/**********************************
* Yes no select for archive items
**********************************/ 
 //showhelp();
echo "<div class=\"page_dropdowns\">";?>

             <?php echo JText::_('Filter');?>:<input type="text" name="search" value="" class="text_area" onChange="document.adminForm.submit();" />
             <?php echo $lists['sectionids'];?>
             <?php echo $lists['catid'];?>
             </div>
    

		<table class="adminlist">
		<tr>
			<th width="5">
			#
			</th>
			<th width="20">
			<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $rows ); ?>);" />
			</th>
			<th class="title">
			<?php 
				echo	JText::_('Title');?>
			</th>
			<th width="15%">
			<?php 
		echo	JText::_('Section');?>
			</th>
		
			<th width="15%" align="left">
		<?php 
		echo	JText::_('Category');?>
			</th>
			<th width="15%" align="left">
				<?php 
		echo	JText::_('Author');?>
			</th>
			<th align="center" width="10">
			<?php 
		echo	JText::_('Date');?>
			</th>
		</tr>
		<?php
		$k = 0;
		for ($i=0, $n=count( $rows ); $i < $n; $i++) {
			$row = &$rows[$i];

			

			if ( $acl->acl_check( 'administration', 'manage', 'users', $my->usertype, 'components', 'com_users' ) ) {
				if ( $row->created_by_alias ) {
					$author = $row->created_by_alias;
				} else {
					$linkA 	= 'index2.php?option=com_users&task=editA&hidemainmenu=1&id='. $row->created_by;
					$author = '<a href="'. $linkA .'" title="Edit User">'. $row->author .'</a>';
				}
			} else {
				if ( $row->created_by_alias ) {
					$author = $row->created_by_alias;
				} else {
					$author = $row->author;
				}
			}

			$date = mosFormatDate( $row->created, '%x' );
			?>
			<tr class="<?php echo "row$k"; ?>">
				<td>
				<?php echo $pageNav->rowNumber( $i ); ?>
				</td>
				<td width="20">
				<?php echo mosHTML::idBox( $i, $row->id ); ?>
				</td>
				<td>
				<?php echo $row->title; ?>
				</td>
				<td align="left">

			<?php echo $row->section_name;?>
				</td>
				<td>
				<?php 
				global $database;
				$query = "SELECT title, id FROM #__export_categories";
	            $database->setQuery( $query );
	            $catrows = $database->loadObjectList();
	            foreach($catrows as $cat){
	            if($cat->id ==$row->catid)
				{
				echo $cat->title;
				}
				}
			?>
				</td>
				<td>
				
				<?php
				echo $row->author;?>
				</td>
				<td>
				<?php echo $date; ?>
				</td>
			</tr>
			<?php
			$k = 1 - $k;
		}
		?>
		</table>

		<?php echo $pageNav->getListFooter(); 
$redirect 	='index2.php?option=com_export_content&task=showexportarchive';?>
		<input type="hidden" name="option" value="<?php echo $option;?>" />
		<input type="hidden" name="sectionid" value="<?php echo $section->id;?>" />
		<input type="hidden" name="task" value="showexportarchive" />
		<input type="hidden" name="returntask" value="showexportarchive" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="hidemainmenu" value="0" />
		<input type="hidden" name="redirect" value="<?php echo $redirect;?>" />
		</form>
		<?php
	}
/****************************************************
For selecting static items for compile and download
*****************************************************/
	function showExportstatic( &$rows, &$pageNav, $option, $search, &$lists ) {
		global $my, $acl, $database,$mosConfig_sitename;

		mosCommonHTML::loadOverlib();
			global $mainframe;

		// Initialize variables
		$db		=& JFactory::getDBO();
		$user	=& JFactory::getUser();

		//Ordering allowed ?
		//$ordering = ($lists['order'] == 'section_name' && $lists['order_Dir'] == 'asc');
		JHTML::_('behavior.tooltip');
		?>
		
<form action="index2.php" method="post" name="adminForm" onsubmit="document.getElementById('submitdiv').innerHTML='<?php echo _COMPILE_CONFIRM_TXT;?>'">
		<div id="submitdiv"></div>
<?php
 //showhelp();
echo "<div class=\"page_dropdowns\">";?>
      <table><tr> 	<td>
			<?php
	
		echo	JText::_('Filter');
?> :&nbsp;
			</td>
			<td>
			<input type="text" name="search" value="<?php echo htmlspecialchars( $search );?>" class="text_area" onChange="document.adminForm.submit();" />
			</td>
			<td>
			&nbsp;&nbsp;&nbsp;Order:&nbsp;
			</td>
			<td>
			<?php echo $lists['order']; ?>
			</td>
			<td width="right">
			<?php echo $lists['authorid'];?>
			</td>
		</tr>
		</table>
		<?php
      echo "</div>";?>
	

		<table class="adminlist">
		<tr>
			<th width="5">
			#
			</th>
			<th width="5px">
			<input type="checkbox" name="toggle" value="" onClick="checkAll(<?php echo count( $rows ); ?>);" />
			</th>
			<th class="title">
			<?php
			echo	JText::_('Title');?>
			</th>
			<th width="5%">
			<?php 
		echo	JText::_('Published');?>
			</th>
			
			<th width="12%" align="center">
			<?php 
		echo	JText::_('Access');?>
			</th>
			<th width="5%" align="center">
			<?php 
		echo	JText::_('ID');?>
			</th>
		
			<th width="17%" align="center">
			<?php 
		echo	JText::_('Author');?>
			</th>
			<th width="10%" align="center">
			<?php 
		echo	JText::_('Date');?>
			
			</th>
		</tr>
		<?php
		$k = 0;
		$nullDate = $database->getNullDate();
		for ($i=0, $n=count( $rows ); $i < $n; $i++) {
			$row = &$rows[$i];
			mosMakeHtmlSafe($row);
//get_param_times();
//$now	= new JDate();
			//$now = DATE_FORMAT_LC2;
		//	$now =_CURRENT_SERVER_TIME;
	$now =	_DATE_FORMAT_LC;
			if ( $now <= $row->publish_up && $row->state == 1 ) {
			// Published
				$img = 'tick.png';
				$alt = 'Published';
			} else if ( ( $now <= $row->publish_down || $row->publish_down == $nullDate ) && $row->state == 1 ) {
			// Pending
				$img = 'publish_g.png';
				$alt = 'Published';
			} else if ( $now > $row->publish_down && $row->state == 1 ) {
			// Expired
				$img = 'publish_r.png';
				$alt = 'Expired';
			} elseif ( $row->state == 0 ) {
			// Unpublished
				$img = 'publish_x.png';
				$alt = 'Unpublished';
			}

			// correct times to include server offset info
			$row->publish_up 	= mosFormatDate( $row->publish_up, _DATE_FORMAT_LC );
			if (trim( $row->publish_down ) == $nullDate || trim( $row->publish_down ) == '' || trim( $row->publish_down ) == '-' ) {
				$row->publish_down = 'Never';
			}
			$row->publish_down 	= mosFormatDate( $row->publish_down, _DATE_FORMAT_LC );

			$times = '';
			if ($row->publish_up == $nullDate) {
				$times .= "<tr><td>Start: Always</td></tr>";
			} else {
				$times .= "<tr><td>Start: $row->publish_up</td></tr>";
			}
			if ($row->publish_down == $nullDate || $row->publish_down == 'Never') {
				$times .= "<tr><td>Finish: No Expiry</td></tr>";
			} else {
				$times .= "<tr><td>Finish: $row->publish_down</td></tr>";
			}

			if ( !$row->access ) {
				$color_access = 'style="color: green;"';
				$task_access = 'accessregistered';
			} else if ( $row->access == 1 ) {
				$color_access = 'style="color: red;"';
				$task_access = 'accessspecial';
			} else {
				$color_access = 'style="color: black;"';
				$task_access = 'accesspublic';
			}

			$link 		= 'index2.php?option=com_typedcontent&task=edit&hidemainmenu=1&id='. $row->id;

			$checked 	= mosCommonHTML::CheckedOutProcessing( $row, $i );

			if ( $acl->acl_check( 'administration', 'manage', 'users', $my->usertype, 'components', 'com_users' ) ) {
				if ( $row->created_by_alias ) {
					$author = $row->created_by_alias;
				} else {
					$linkA 	= 'index2.php?option=com_users&task=editA&hidemainmenu=1&id='. $row->created_by;
					$author = $row->creator;
				}
			} else {
				if ( $row->created_by_alias ) {
					$author = $row->created_by_alias;
				} else {
					$author = $row->creator;
				}
			}

			$date = mosFormatDate( $row->created, '%x' );
			?>
			<tr class="<?php echo "row$k"; ?>">
				<td>
				<?php echo $pageNav->rowNumber( $i ); ?>
				</td>
				<td>
				<?php echo $checked; ?>
				</td>
				<td>
				<?php
				if ( $row->checked_out && ( $row->checked_out != $my->id ) ) {
					echo $row->title;
					if ( $row->title_alias ) {
						echo ' (<i>'. $row->title_alias .'</i>)';
					}
				} else {
					?>
				<?php
				
/*******************************
 Tool tips
********************************/?>				
<span class="editlinktip hasTip" title="<?php echo JText::_( 'How to edit' );?>:: To  edit the [<?php echo $row->title; ?>] item Go to the Site Article manager.<br><br><b>Note:</b> If you want to change title names or the content you may do so after exporting to the destination site.">

<a href="#">
					<?php echo $row->title. " ( ". $row->alias ." )";?>
				</a></span>	
			
					<?php
				}
				?>
				</td>
				<?php
				if ( $times ) {
					?>
					<td align="center">
					
					<img src="images/<?php echo $img;?>" width="16" height="16" border="0" alt="<?php echo $alt; ?>" />
					
					</td>
					<?php
				}
				?>
			
				<td align="center">
				<?php echo $row->groupname;?>
			</td>
				<td align="center">
				<?php echo $row->id;?>
				</td>
			
				<td align="center">
				<?php echo $author;?>
				</td>
				<td align="center">
				<?php echo $date; ?>
				</td>
			</tr>
			<?php
			$k = 1 - $k;
		}
		?>
		</table>

		<?php echo $pageNav->getListFooter(); ?>
		<?php //mosCommonHTML::ContentLegend(); ?>

		<input type="hidden" name="option" value="<?php echo $option;?>" />
		<input type="hidden" name="task" value="viewExport_static" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="hidemainmenu" value="0" />
		</form>
		<?php
	}	
}class ContentView
{
	/**
	* Writes a list of the articles
	* @param array An array of article objects
	*/
	function showContent( &$rows, &$lists, $page, $redirect )
	{
		jimport('joomla.utilities.date');

		global $mainframe;

		// Initialize variables
		$db		=& JFactory::getDBO();
		$user	=& JFactory::getUser();
		$config	=& JFactory::getConfig();
		$now	= new JDate();

		//Ordering allowed ?
		$ordering = ($lists['order'] == 'section_name' || $lists['order'] == 'cc.name');
		JHTML::_('behavior.tooltip');
		?>
		<form action="index.php?option=com_content" method="post" name="adminForm">

			<table>
				<tr>
					<td width="100%">
						<?php echo JText::_( 'Filter' ); ?>:
						<input type="text" name="search" id="search" value="<?php echo $lists['search'];?>" class="text_area" onchange="document.adminForm.submit();" title="<?php echo JText::_( 'Filter by title or enter article ID' );?>"/>
						<button onclick="this.form.submit();"><?php echo JText::_( 'Go' ); ?></button>
						<button onclick="document.getElementById('search').value='';this.form.getElementById('filter_sectionid').value='-1';this.form.getElementById('catid').value='0';this.form.getElementById('filter_authorid').value='0';this.form.getElementById('filter_state').value='';this.form.submit();"><?php echo JText::_( 'Reset' ); ?></button>
					</td>
					<td nowrap="nowrap">
						<?php
						echo $lists['sectionid'];
						echo $lists['catid'];
						echo $lists['authorid'];
						echo $lists['state'];
						?>
					</td>
				</tr>
			</table>

			<table class="adminlist" cellspacing="1">
			<thead>
				<tr>
					<th width="5">
						<?php echo JText::_( 'Num' ); ?>
					</th>
					<th width="5">
						<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $rows ); ?>);" />
					</th>
					<th class="title">
						<?php echo JHTML::_('grid.sort',   'Title', 'c.title', @$lists['order_Dir'], @$lists['order'] ); ?>
					</th>
					<th width="1%" nowrap="nowrap">
						<?php echo JHTML::_('grid.sort',   'Published', 'c.state', @$lists['order_Dir'], @$lists['order'] ); ?>
					</th>
					<th nowrap="nowrap" width="1%">
						<?php echo JHTML::_('grid.sort',   'Front Page', 'frontpage', @$lists['order_Dir'], @$lists['order'] ); ?>
					</th>
					<th width="8%">
						<?php echo JHTML::_('grid.sort',   'Order', 'section_name', @$lists['order_Dir'], @$lists['order'] ); ?>
						<?php echo JHTML::_('grid.order',  $rows ); ?>
					</th>
					<th width="7%">
						<?php echo JHTML::_('grid.sort',   'Access', 'groupname', @$lists['order_Dir'], @$lists['order'] ); ?>
					</th>
					<th class="title" width="8%" nowrap="nowrap">
						<?php echo JHTML::_('grid.sort',   'Section', 'section_name', @$lists['order_Dir'], @$lists['order'] ); ?>
					</th>
					<th  class="title" width="8%" nowrap="nowrap">
						<?php echo JHTML::_('grid.sort',   'Category', 'cc.name', @$lists['order_Dir'], @$lists['order'] ); ?>
					</th>
					<th  class="title" width="8%" nowrap="nowrap">
						<?php echo JHTML::_('grid.sort',   'Author', 'author', @$lists['order_Dir'], @$lists['order'] ); ?>
					</th>
					<th align="center" width="10">
						<?php echo JHTML::_('grid.sort',   'Date', 'c.created', @$lists['order_Dir'], @$lists['order'] ); ?>
					</th>
					<th align="center" width="10">
						<?php echo JHTML::_('grid.sort',   'Hits', 'c.hits', @$lists['order_Dir'], @$lists['order'] ); ?>
					</th>
					<th width="1%" class="title">
						<?php echo JHTML::_('grid.sort',   'ID', 'c.id', @$lists['order_Dir'], @$lists['order'] ); ?>
					</th>
				</tr>
			</thead>
			<tfoot>
			<tr>
				<td colspan="15">
					<?php echo $page->getListFooter(); ?>
				</td>
			</tr>
			</tfoot>
			<tbody>
			<?php
			$k = 0;
			$nullDate = $db->getNullDate();
			for ($i=0, $n=count( $rows ); $i < $n; $i++)
			{
				$row = &$rows[$i];

				$link 	= 'index.php?option=com_content&sectionid='. $redirect .'&task=edit&cid[]='. $row->id;

				$row->sect_link = JRoute::_( 'index.php?option=com_sections&task=edit&cid[]='. $row->sectionid );
				$row->cat_link 	= JRoute::_( 'index.php?option=com_categories&task=edit&cid[]='. $row->catid );

				$publish_up = new JDate($row->publish_up);
				$publish_down = new JDate($row->publish_down);
				$publish_up->setOffset($config->getValue('config.offset'));
				$publish_down->setOffset($config->getValue('config.offset'));
				if ( $now->toUnix() <= $publish_up->toUnix() && $row->state == 1 ) {
					$img = 'publish_y.png';
					$alt = JText::_( 'Published' );
				} else if ( ( $now->toUnix() <= $publish_down->toUnix() || $row->publish_down == $nullDate ) && $row->state == 1 ) {
					$img = 'publish_g.png';
					$alt = JText::_( 'Published' );
				} else if ( $now->toUnix() > $publish_down->toUnix() && $row->state == 1 ) {
					$img = 'publish_r.png';
					$alt = JText::_( 'Expired' );
				} else if ( $row->state == 0 ) {
					$img = 'publish_x.png';
					$alt = JText::_( 'Unpublished' );
				} else if ( $row->state == -1 ) {
					$img = 'disabled.png';
					$alt = JText::_( 'Archived' );
				}
				$times = '';
				if (isset($row->publish_up)) {
					if ($row->publish_up == $nullDate) {
						$times .= JText::_( 'Start: Always' );
					} else {
						$times .= JText::_( 'Start' ) .": ". $publish_up->toFormat();
					}
				}
				if (isset($row->publish_down)) {
					if ($row->publish_down == $nullDate) {
						$times .= "<br />". JText::_( 'Finish: No Expiry' );
					} else {
						$times .= "<br />". JText::_( 'Finish' ) .": ". $publish_down->toFormat();
					}
				}

				if ( $user->authorize( 'com_users', 'manage' ) ) {
					if ( $row->created_by_alias ) {
						$author = $row->created_by_alias;
					} else {
						$linkA 	= 'index.php?option=com_users&task=edit&cid[]='. $row->created_by;
						$author = '<a href="'. JRoute::_( $linkA ) .'" title="'. JText::_( 'Edit User' ) .'">'. $row->author .'</a>';
					}
				} else {
					if ( $row->created_by_alias ) {
						$author = $row->created_by_alias;
					} else {
						$author = $row->author;
					}
				}

				$access 	= JHTML::_('grid.access',   $row, $i, $row->state );
				$checked 	= JHTML::_('grid.checkedout',   $row, $i );
				?>
				<tr class="<?php echo "row$k"; ?>">
					<td>
						<?php echo $page->getRowOffset( $i ); ?>
					</td>
					<td align="center">
						<?php echo $checked; ?>
					</td>
					<td>
					<?php
						if (  JTable::isCheckedOut($user->get ('id'), $row->checked_out ) ) {
							echo $row->title;
						} else if ($row->state == -1) {
							echo htmlspecialchars($row->title, ENT_QUOTES, 'UTF-8');
							echo ' [ '. JText::_( 'Archived' ) .' ]';
						} else {
							?>
							<a href="<?php echo JRoute::_( $link ); ?>">
								<?php echo htmlspecialchars($row->title, ENT_QUOTES); ?></a>
							<?php
						}
						?>
					</td>
					<?php
					if ( $times ) {
						?>
						<td align="center">
							<span class="editlinktip hasTip" title="<?php echo JText::_( 'Publish Information' );?>::<?php echo $times; ?>"><a href="javascript:void(0);" onclick="return listItemTask('cb<?php echo $i;?>','<?php echo $row->state ? 'unpublish' : 'publish' ?>')">
								<img src="images/<?php echo $img;?>" width="16" height="16" border="0" alt="<?php echo $alt; ?>" /></a></span>
						</td>
						<?php
					}
					?>
					<td align="center">
						<a href="javascript:void(0);" onclick="return listItemTask('cb<?php echo $i;?>','toggle_frontpage')" title="<?php echo ( $row->frontpage ) ? JText::_( 'Yes' ) : JText::_( 'No' );?>">
							<img src="images/<?php echo ( $row->frontpage ) ? 'tick.png' : ( $row->state != -1 ? 'publish_x.png' : 'disabled.png' );?>" width="16" height="16" border="0" alt="<?php echo ( $row->frontpage ) ? JText::_( 'Yes' ) : JText::_( 'No' );?>" /></a>
					</td>
					<td class="order">
						<span><?php echo $page->orderUpIcon( $i, ($row->catid == @$rows[$i-1]->catid), 'orderup', 'Move Up', $ordering); ?></span>
						<span><?php echo $page->orderDownIcon( $i, $n, ($row->catid == @$rows[$i+1]->catid), 'orderdown', 'Move Down', $ordering ); ?></span>
						<?php $disabled = $ordering ?  '' : 'disabled="disabled"'; ?>
						<input type="text" name="order[]" size="5" value="<?php echo $row->ordering; ?>" <?php echo $disabled; ?> class="text_area" style="text-align: center" />
					</td>
					<td align="center">
						<?php echo $access;?>
					</td>
						<td>
							<a href="<?php echo $row->sect_link; ?>" title="<?php echo JText::_( 'Edit Section' ); ?>">
								<?php echo $row->section_name; ?></a>
						</td>
					<td>
						<a href="<?php echo $row->cat_link; ?>" title="<?php echo JText::_( 'Edit Category' ); ?>">
							<?php echo $row->name; ?></a>
					</td>
					<td>
						<?php echo $author; ?>
					</td>
					<td nowrap="nowrap">
						<?php echo JHTML::_('date',  $row->created, JText::_('DATE_FORMAT_LC4') ); ?>
					</td>
					<td nowrap="nowrap" align="center">
						<?php echo $row->hits ?>
					</td>
					<td>
						<?php echo $row->id; ?>
					</td>
				</tr>
				<?php
				$k = 1 - $k;
			}
			?>
			</tbody>
			</table>
			<?php JHTML::_('content.legend'); ?>

		<input type="hidden" name="option" value="com_content" />
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="redirect" value="<?php echo $redirect;?>" />
		<input type="hidden" name="filter_order" value="<?php echo $lists['order']; ?>" />
		<input type="hidden" name="filter_order_Dir" value="<?php echo $lists['order_Dir']; ?>" />
		</form>
		<?php
	}


	/**
	* Writes a list of the articles
	* @param array An array of article objects
	*/
	function showArchive( &$rows, $section, &$lists, $pageNav, $option, $all=NULL, $redirect )
	{
		// Initialize variables
		$user	= &JFactory::getUser();
		?>
		<script language="javascript" type="text/javascript">
		function submitbutton(pressbutton) {
			if (pressbutton == 'remove') {
				if (document.adminForm.boxchecked.value == 0) {
					alert("<?php echo JText::_( 'VALIDSELECTIONLISTSENDTRASH', true ); ?>");
				} else if ( confirm("<?php echo JText::_( 'VALIDTRASHSELECTEDITEMS', true ); ?>")) {
					submitform('remove');
				}
			} else {
				submitform(pressbutton);
			}
		}
		</script>
		<form action="index.php?option=com_content&amp;task=showarchive&amp;sectionid=0" method="post" name="adminForm">

		<table>
		<tr>
			<td align="left" width="100%">
				<?php echo JText::_( 'Filter' ); ?>:
				<input type="text" name="search" id="search" value="<?php echo $lists['search'];?>" class="text_area" onchange="document.adminForm.submit();" />
				<input type="button" value="<?php echo JText::_( 'Go' ); ?>" class="button" onclick="this.form.submit();" />
				<input type="button" value="<?php echo JText::_( 'Reset' ); ?>" class="button" onclick="getElementById('search').value='';this.form.submit();" />
			</td>
			<td nowrap="nowrap">
				<?php
				if ( $all ) {
					echo $lists['sectionid'];
				}
				echo $lists['catid'];
				echo $lists['authorid'];
				?>
			</td>
		</tr>
		</table>

		<div id="tablecell">
			<table class="adminlist">
			<thead>
			<tr>
				<th width="5">
					<?php echo JText::_( 'Num' ); ?>
				</th>
				<th width="20">
					<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $rows ); ?>);" />
				</th>
				<th class="title">
					<?php echo JHTML::_('grid.sort',   'Title', 'c.title', @$lists['order_Dir'], @$lists['order'] ); ?>
				</th>
				<th width="3%"  class="title">
					<?php echo JHTML::_('grid.sort',   'ID', 'c.id', @$lists['order_Dir'], @$lists['order'] ); ?>
				</th>
				<th width="15%"  class="title">
					<?php echo JHTML::_('grid.sort',   'Section', 'sectname', @$lists['order_Dir'], @$lists['order'] ); ?>
				</th>
				<th width="15%"  class="title">
					<?php echo JHTML::_('grid.sort',   'Category', 'cc.name', @$lists['order_Dir'], @$lists['order'] ); ?>
				</th>
				<th width="15%"  class="title">
					<?php echo JHTML::_('grid.sort',   'Author', 'author', @$lists['order_Dir'], @$lists['order'] ); ?>
				</th>
				<th align="center" width="10">
					<?php echo JHTML::_('grid.sort',   'Date', 'c.created', @$lists['order_Dir'], @$lists['order'] ); ?>
				</th>
			</tr>
			</thead>
			<tfoot>
			<tr>
				<td colspan="8">
					<?php echo $pageNav->getListFooter(); ?>
				</td>
			</tr>
			</tfoot>
			<tbody>
			<?php
			$k = 0;
			for ($i=0, $n=count( $rows ); $i < $n; $i++) {
				$row = &$rows[$i];

				$row->cat_link 	= JRoute::_( 'index.php?option=com_categories&task=edit&cid[]='. $row->catid );
				$row->sec_link 	= JRoute::_( 'index.php?option=com_sections&task=edit&cid[]='. $row->sectionid );

				if ( $user->authorize( 'com_users', 'manage' ) ) {
					if ( $row->created_by_alias ) {
						$author = $row->created_by_alias;
					} else {
						$linkA 	= JRoute::_( 'index.php?option=com_users&task=edit&cid[]='. $row->created_by );
						$author = '<a href="'. $linkA .'" title="'. JText::_( 'Edit User' ) .'">'. $row->author .'</a>';
					}
				} else {
					if ( $row->created_by_alias ) {
						$author = $row->created_by_alias;
					} else {
						$author = $row->author;
					}
				}

				?>
				<tr class="<?php echo "row$k"; ?>">
					<td>
						<?php echo $pageNav->getRowOffset( $i ); ?>
					</td>
					<td width="20">
						<?php echo JHTML::_('grid.id', $i, $row->id ); ?>
					</td>
					<td>
						<?php echo $row->title; ?>
					</td>
					<td>
						<?php echo $row->id; ?>
					</td>
					<td>
						<a href="<?php echo $row->sec_link; ?>" title="<?php echo JText::_( 'Edit Section' ); ?>">
							<?php echo $row->sectname; ?></a>
					</td>
					<td>
						<a href="<?php echo $row->cat_link; ?>" title="<?php echo JText::_( 'Edit Category' ); ?>">
							<?php echo $row->name; ?></a>
					</td>
					<td>
						<?php echo $author; ?>
					</td>
					<td nowrap="nowrap">
						<?php echo JHTML::_('date',  $row->created, JText::_( 'DATE_FORMAT_LC4' ) ); ?>
					</td>
				</tr>
				<?php
				$k = 1 - $k;
			}
				?>
			</tbody>
			</table>
		</div>

		<input type="hidden" name="option" value="<?php echo $option;?>" />
		<input type="hidden" name="sectionid" value="<?php echo $section->id;?>" />
		<input type="hidden" name="task" value="showarchive" />
		<input type="hidden" name="returntask" value="showarchive" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="redirect" value="<?php echo $redirect;?>" />
		<input type="hidden" name="filter_order" value="<?php echo $lists['order']; ?>" />
		<input type="hidden" name="filter_order_Dir" value="" />
		<?php //echo JHTML::_( 'form.token' ); ?>
		</form>
		<?php
	}


	/**
	* Writes the edit form for new and existing article
	*
	* A new record is defined when <var>$row</var> is passed with the <var>id</var>
	* property set to 0.
	* @param JTableContent The category object
	* @param string The html for the groups select list
	*/
	function editContent( &$row, $section, &$lists, &$sectioncategories, $option, &$form )
	{
		JRequest::setVar( 'hidemainmenu', 1 );

		jimport('joomla.html.pane');
		JFilterOutput::objectHTMLSafe( $row );

		$db		=& JFactory::getDBO();
		$editor =& JFactory::getEditor();
		$pane	=& JPane::getInstance('sliders');

		JHTML::_('behavior.tooltip');
		?>
		<script language="javascript" type="text/javascript">
		<!--
		var sectioncategories = new Array;
		<?php
		$i = 0;
		foreach ($sectioncategories as $k=>$items) {
			foreach ($items as $v) {
				echo "sectioncategories[".$i++."] = new Array( '$k','".addslashes( $v->id )."','".addslashes( $v->title )."' );\n\t\t";
			}
		}
		?>

		function submitbutton(pressbutton)
		{
			var form = document.adminForm;

			if ( pressbutton == 'menulink' ) {
				if ( form.menuselect.value == "" ) {
					alert( "<?php echo JText::_( 'Please select a Menu', true ); ?>" );
					return;
				} else if ( form.link_name.value == "" ) {
					alert( "<?php echo JText::_( 'Please enter a Name for this menu item', true ); ?>" );
					return;
				}
			}

			if (pressbutton == 'cancel') {
				submitform( pressbutton );
				return;
			}

			// do field validation
			var text = <?php echo $editor->getContent( 'text' ); ?>
			if (form.title.value == ""){
				alert( "<?php echo JText::_( 'Article must have a title', true ); ?>" );
			} else if (form.sectionid.value == "-1"){
				alert( "<?php echo JText::_( 'You must select a Section', true ); ?>" );
			} else if (form.catid.value == "-1"){
				alert( "<?php echo JText::_( 'You must select a Category', true ); ?>" );
 			} else if (form.catid.value == ""){
 				alert( "<?php echo JText::_( 'You must select a Category', true ); ?>" );
			} else if (text == ""){
				alert( "<?php echo JText::_( 'Article must have some text', true ); ?>" );
			} else {
				<?php
				echo $editor->save( 'text' );
				?>
				submitform( pressbutton );
			}
		}
		//-->
		</script>

		<form action="index.php" method="post" name="adminForm">

		<table cellspacing="0" cellpadding="0" border="0" width="100%">
		<tr>
			<td valign="top">
				<?php ContentView::_displayArticleDetails( $row, $lists ); ?>
				<table class="adminform">
				<tr>
					<td>
						<?php
						// parameters : areaname, content, width, height, cols, rows
						echo $editor->display( 'text',  $row->text , '100%', '550', '75', '20' ) ;
						?>
					</td>
				</tr>
				</table>
			</td>
			<td valign="top" width="320" style="padding: 7px 0 0 5px">
			<?php
				ContentView::_displayArticleStats($row, $lists);

				$title = JText::_( 'Parameters - Article' );
				echo $pane->startPane("content-pane");
				echo $pane->startPanel( $title, "detail-page" );
				echo $form->render('details');

				$title = JText::_( 'Parameters - Advanced' );
				echo $pane->endPanel();
				echo $pane->startPanel( $title, "params-page" );
				echo $form->render('params', 'advanced');

				$title = JText::_( 'Metadata Information' );
				echo $pane->endPanel();
				echo $pane->startPanel( $title, "metadata-page" );
				echo $form->render('meta', 'metadata');

				echo $pane->endPanel();
				echo $pane->endPane();
			?>
			</td>
		</tr>
		</table>

		<input type="hidden" name="id" value="<?php echo $row->id; ?>" />
		<input type="hidden" name="cid[]" value="<?php echo $row->id; ?>" />
		<input type="hidden" name="version" value="<?php echo $row->version; ?>" />
		<input type="hidden" name="mask" value="0" />
		<input type="hidden" name="option" value="<?php echo $option;?>" />
		<input type="hidden" name="task" value="" />
		</form>
		<?php
		echo JHTML::_('behavior.keepalive');
	}


/********************************************************
	Form to select Section/Category to move item(s) to
*********************************************************/
	function moveSection( $cid, $sectCatList, $option, $sectionid, $items )
	{
		?>
		<script language="javascript" type="text/javascript">
		function submitbutton(pressbutton) {
			var form = document.adminForm;
			if (pressbutton == 'cancel') {
				submitform( pressbutton );
				return;
			}

			// do field validation
			if (!getSelectedValue( 'adminForm', 'sectcat' )) {
				alert( "<?php echo JText::_( 'Please select something', true ); ?>" );
			} else {
				submitform( pressbutton );
			}
		}
		</script>

		<form action="index.php" method="post" name="adminForm">

		<table class="adminform">
		<tr>
			<td  valign="top" width="40%">
			<strong><?php echo JText::_( 'Move to Section/Category' ); ?>:</strong>
			<br />
			<?php echo $sectCatList; ?>
			<br /><br />
			</td>
			<td  valign="top">
			<strong><?php echo JText::_( 'Articles being Moved' ); ?>:</strong>
			<br />
			<?php
			echo "<ol>";
			foreach ( $items as $item ) {
				echo "<li>". $item->title ."</li>";
			}
			echo "</ol>";
			?>
			</td>
		</tr>
		</table>
		<br /><br />

		<input type="hidden" name="option" value="<?php echo $option;?>" />
		<input type="hidden" name="sectionid" value="<?php echo $sectionid; ?>" />
		<input type="hidden" name="task" value="" />
		<?php
		foreach ($cid as $id) {
			echo "\n<input type=\"hidden\" name=\"cid[]\" value=\"$id\" />";
		}
		?>
		</form>
		<?php
	}



/******************************************************
 Form to select Section/Category to copys item(s) to
*******************************************************/
	function copySection( $option, $cid, $sectCatList, $sectionid, $items  )
	{
		?>
		<script language="javascript" type="text/javascript">
		function submitbutton(pressbutton) {
			var form = document.adminForm;
			if (pressbutton == 'cancel') {
				submitform( pressbutton );
				return;
			}

			// do field validation
			if (!getSelectedValue( 'adminForm', 'sectcat' )) {
				alert( "<?php echo JText::_( 'VALIDSELECTSECTCATCOPYITEMS', true ); ?>" );
			} else {
				submitform( pressbutton );
			}
		}
		</script>
		<form action="index.php" method="post" name="adminForm">

		<table class="adminform">
		<tr>
			<td  valign="top" width="40%">
			<strong><?php echo JText::_( 'Copy to Section/Category' ); ?>:</strong>
			<br />
			<?php echo $sectCatList; ?>
			<br /><br />
			</td>
			<td  valign="top">
			<strong><?php echo JText::_( 'Articles being copied' ); ?>:</strong>
			<br />
			<?php
			echo "<ol>";
			foreach ( $items as $item ) {
				echo "<li>". $item->title ."</li>";
			}
			echo "</ol>";
			?>
			</td>
		</tr>
		</table>
		<br /><br />

		<input type="hidden" name="option" value="<?php echo $option;?>" />
		<input type="hidden" name="sectionid" value="<?php echo $sectionid; ?>" />
		<input type="hidden" name="task" value="" />
		<?php
		foreach ($cid as $id) {
			echo "\n<input type=\"hidden\" name=\"cid[]\" value=\"$id\" />";
		}
		?>
		</form>
		<?php
	}

	function previewContent()
	{
		global $mainframe;

		$editor		=& JFactory::getEditor();

		$document	=& JFactory::getDocument();
		$document->setLink(JURI::root());

		JHTML::_('behavior.caption');

		?>
		<script>
		var form = window.top.document.adminForm
		var title = form.title.value;

		var alltext = window.top.<?php echo $editor->getContent('text') ?>;
		alltext = alltext.replace('<hr id=\"system-readmore\" \/>', '');

		</script>

		<table align="center" width="90%" cellspacing="2" cellpadding="2" border="0">
			<tr>
				<td class="contentheading" colspan="2"><script>document.write(title);</script></td>
			</tr>
		<tr>
			<script>document.write("<td valign=\"top\" height=\"90%\" colspan=\"2\">" + alltext + "</td>");</script>
		</tr>
		</table>
		<?php
	}
/*******************************
 Renders pagebreak options
********************************/
	function insertPagebreak()
	{
		$eName	= JRequest::getVar('e_name');
		$eName	= preg_replace( '#[^A-Z0-9\-\_\[\]]#i', '', $eName );
		?>
		<script type="text/javascript">
			function insertPagebreak()
			{
				// Get the pagebreak title
				var title = document.getElementById("title").value;
				if (title != '') {
					title = "title=\""+title+"\" ";
				}

				// Get the pagebreak toc alias -- not inserting for now
				// don't know which attribute to use...
				var alt = document.getElementById("alt").value;
				if (alt != '') {
					alt = "alt=\""+alt+"\" ";
				}

				var tag = "<hr class=\"system-pagebreak\" "+title+" "+alt+"/>";

				window.parent.jInsertEditorText(tag, '<?php echo $eName; ?>');
				window.parent.document.getElementById('sbox-window').close();
				return false;
			}
		</script>

		<form>
		<table width="100%" align="center">
			<tr width="40%">
				<td class="key" align="right">
					<label for="title">
						<?php echo JText::_( 'PGB PAGE TITLE' ); ?>
					</label>
				</td>
				<td>
					<input type="text" id="title" name="title" />
				</td>
			</tr>
			<tr width="60%">
				<td class="key" align="right">
					<label for="alias">
						<?php echo JText::_( 'PGB TOC ALIAS PROMPT' ); ?>
					</label>
				</td>
				<td>
					<input type="text" id="alt" name="alt" />
				</td>
			</tr>
		</table>
		</form>
		<button onclick="insertPagebreak();"><?php echo JText::_( 'PGB INS PAGEBRK' ); ?></button>
		<?php
	}

	function _displayArticleDetails(&$row, &$lists )
	{
		?>
		<table  class="adminform">
		<tr>
			<td>
				<label for="title">
					<?php echo JText::_( 'Title' ); ?>
				</label>
			</td>
			<td>
				<input class="inputbox" type="text" name="title" id="title" size="40" maxlength="255" value="<?php echo $row->title; ?>" />
			</td>
			<td>
				<label>
					<?php echo JText::_( 'Published' ); ?>
				</label>
			</td>
			<td>
				<?php echo $lists['state']; ?>
			</td>
		</tr>
		<tr>
			<td>
				<label for="alias">
					<?php echo JText::_( 'Alias' ); ?>
				</label>
			</td>
			<td>
				<input class="inputbox" type="text" name="alias" id="alias" size="40" maxlength="255" value="<?php echo $row->alias; ?>" />
			</td>
			<td>
				<label>
				<?php echo JText::_( 'Frontpage' ); ?>
				</label>
			</td>
			<td>
				<?php echo $lists['frontpage']; ?>
			</td>
		</tr>
		<tr>
			<td>
				<label for="sectionid">
					<?php echo JText::_( 'Section' ); ?>
				</label>
			</td>
			<td>
				<?php echo $lists['sectionid']; ?>
			</td>
			<td>
				<label for="catid">
					<?php echo JText::_( 'Category' ); ?>
				</label>
			</td>
			<td>
				<?php echo $lists['catid']; ?>
			</td>
		</tr>
		</table>
		<?php
	}

	function _displayArticleStats(&$row, &$lists )
	{
		$db =& JFactory::getDBO();

		$create_date 	= null;
		$nullDate 		= $db->getNullDate();

		// used to hide "Reset Hits" when hits = 0
		if ( !$row->hits ) {
			$visibility = 'style="display: none; visibility: hidden;"';
		} else {
			$visibility = '';
		}

		?>
		<table width="100%" style="border: 1px dashed silver; padding: 5px; margin-bottom: 10px;">
		<?php
		if ( $row->id ) {
		?>
		<tr>
			<td>
				<strong><?php echo JText::_( 'Article ID' ); ?>:</strong>
			</td>
			<td>
				<?php echo $row->id; ?>
			</td>
		</tr>
		<?php
		}
		?>
		<tr>
			<td>
				<strong><?php echo JText::_( 'State' ); ?></strong>
			</td>
			<td>
				<?php echo $row->state > 0 ? JText::_( 'Published' ) : ($row->state < 0 ? JText::_( 'Archived' ) : JText::_( 'Draft Unpublished' ) );?>
			</td>
		</tr>
		<tr>
			<td>
				<strong><?php echo JText::_( 'Hits' ); ?></strong>
			</td>
			<td>
				<?php echo $row->hits;?>
				<span <?php echo $visibility; ?>>
					<input name="reset_hits" type="button" class="button" value="<?php echo JText::_( 'Reset' ); ?>" onclick="submitbutton('resethits');" />
				</span>
			</td>
		</tr>
		<tr>
			<td>
				<strong><?php echo JText::_( 'Revised' ); ?></strong>
			</td>
			<td>
				<?php echo $row->version;?> <?php echo JText::_( 'times' ); ?>
			</td>
		</tr>
		<tr>
			<td>
				<strong><?php echo JText::_( 'Created' ); ?></strong>
			</td>
			<td>
				<?php
				if ( $row->created == $nullDate ) {
					echo JText::_( 'New document' );
				} else {
					echo JHTML::_('date',  $row->created,  JText::_('DATE_FORMAT_LC2') );
				}
				?>
			</td>
		</tr>
		<tr>
			<td>
				<strong><?php echo JText::_( 'Modified' ); ?></strong>
			</td>
			<td>
				<?php
					if ( $row->modified == $nullDate ) {
						echo JText::_( 'Not modified' );
					} else {
						echo JHTML::_('date',  $row->modified, JText::_('DATE_FORMAT_LC2'));
					}
				?>
			</td>
		</tr>
		</table>
		<?php
	}
}
  ?>