<?php
/**
 * @version		$Id: banner.php 18162 2010-07-16 07:00:47Z ian $
 * @package		Joomla
 * @subpackage	Banners
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

/**
* @package		Joomla
* @subpackage	Banners
*/
class BannersViewBanner
{
	function setBannersToolbar()
	{
		JToolBarHelper::title( JText::_( 'Banner Manager' ), 'generic.png' );
		JToolBarHelper::publishList();
		JToolBarHelper::unpublishList();
		JToolBarHelper::customX( 'copy', 'copy.png', 'copy_f2.png', 'Copy' );
		JToolBarHelper::deleteList();
		JToolBarHelper::editListX();
		JToolBarHelper::addNewX();
		JToolBarHelper::preferences('com_banners', '200');
		JToolBarHelper::help( 'screen.banners' );
	}

	function banners( &$rows, &$pageNav, &$lists )
	{
		BannersViewBanner::setBannersToolbar();
		$user =& JFactory::getUser();
		$ordering = ($lists['order'] == 'b.ordering');
		JHTML::_('behavior.tooltip');
		?>
		<form action="index.php?option=com_banners" method="post" name="adminForm">
		<table>
		<tr>
			<td align="left" width="100%">
				<?php echo JText::_( 'Filter' ); ?>:
				<input type="text" name="search" id="search" value="<?php echo htmlspecialchars($lists['search']);?>" class="text_area" onchange="document.adminForm.submit();" />
				<button onclick="this.form.submit();"><?php echo JText::_( 'Go' ); ?></button>
				<button onclick="document.getElementById('search').value='';this.form.getElementById('filter_catid').value='0';this.form.getElementById('filter_state').value='';this.form.submit();"><?php echo JText::_( 'Filter Reset' ); ?></button>
			</td>
			<td nowrap="nowrap">
				<?php
				echo $lists['catid'];
				echo $lists['state'];
				?>
			</td>
		</tr>
		</table>

			<table class="adminlist">
			<thead>
				<tr>
					<th width="20">
						<?php echo JText::_( 'Num' ); ?>
					</th>
					<th width="20">
						<input type="checkbox" name="toggle" value=""  onclick="checkAll(<?php echo count( $rows ); ?>);" />
					</th>
					<th nowrap="nowrap" class="title">
						<?php echo JHTML::_('grid.sort',  'Name', 'b.name', @$lists['order_Dir'], @$lists['order'] ); ?>
					</th>
					<th width="10%" nowrap="nowrap">
						<?php echo JHTML::_('grid.sort',   'Client', 'c.name', @$lists['order_Dir'], @$lists['order'] ); ?>
					</th>
					<th width="10%" nowrap="nowrap">
						<?php echo JHTML::_('grid.sort',   'Category', 'cc.title', @$lists['order_Dir'], @$lists['order'] ); ?>
					</th>
					<th width="5%" nowrap="nowrap">
						<?php echo JHTML::_('grid.sort',   'Published', 'b.showBanner', @$lists['order_Dir'], @$lists['order'] ); ?>
					</th>
					<th width="8%" nowrap="nowrap">
						<?php echo JHTML::_('grid.sort',   'Order', 'b.ordering', @$lists['order_Dir'], @$lists['order'] ); ?>
						<?php if ($ordering) echo JHTML::_('grid.order',  $rows ); ?>
					</th>
					<th width="5%" nowrap="nowrap">
						<?php echo JHTML::_('grid.sort',   'Sticky', 'b.Sticky', @$lists['order_Dir'], @$lists['order'] ); ?>
					</th>
					<th width="5%" nowrap="nowrap">
						<?php echo JHTML::_('grid.sort',   'Impressions', 'b.impmade', @$lists['order_Dir'], @$lists['order'] ); ?>
					</th>
					<th width="80">
						<?php echo JHTML::_('grid.sort',   'Clicks', 'b.clicks', @$lists['order_Dir'], @$lists['order'] ); ?>
					</th>
					<th width="5%" nowrap="nowrap">
						<?php echo JText::_( 'Tags' ); ?>
					</th>
					<th width="1%" nowrap="nowrap">
						<?php echo JHTML::_('grid.sort',   'ID', 'b.bid', @$lists['order_Dir'], @$lists['order'] ); ?>
					</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<td colspan="13">
						<?php echo $pageNav->getListFooter(); ?>
					</td>
				</tr>
			</tfoot>
			<tbody>
			<?php
			$k = 0;
			for ($i=0, $n=count( $rows ); $i < $n; $i++) {
				$row = &$rows[$i];

				$row->id	= $row->bid;
				$link		= JRoute::_( 'index.php?option=com_banners&task=edit&cid[]='. $row->id );

				if( $row->imptotal <= 0 ) {
					$row->imptotal	=  JText::_('unlimited');
				}

				if ( $row->impmade != 0 ) {
					$percentClicks = 100 * $row->clicks/$row->impmade;
				} else {
					$percentClicks = 0;
				}

				$row->published = $row->showBanner;
				$published		= JHTML::_('grid.published', $row, $i );
				$checked		= JHTML::_('grid.checkedout',   $row, $i );
				?>
				<tr class="<?php echo "row$k"; ?>">
					<td align="center">
						<?php echo $pageNav->getRowOffset($i); ?>
					</td>
					<td align="center">
						<?php echo $checked; ?>
					</td>
					<td>
					<span class="editlinktip hasTip" title="<?php echo JText::_( 'Edit' );?>::<?php echo htmlspecialchars($row->name); ?>">
						<?php
						if ( JTable::isCheckedOut($user->get ('id'), $row->checked_out ) ) {
							echo htmlspecialchars($row->name);
						} else {
							?>

							<a href="<?php echo $link; ?>">
								<?php echo htmlspecialchars($row->name); ?></a>
							<?php
						}
						?>
						</span>
					</td>
					<td align="center">
						<?php echo htmlspecialchars($row->client_name);?>
					</td>
					<td align="center">
						<?php echo htmlspecialchars($row->category_name);?>
					</td>
					<td align="center">
						<?php echo $published;?>
					</td>
					<td class="order">
                    	<?php $disabled = $ordering ?  '' : 'disabled="disabled"'; ?>
						<input type="text" name="order[]" size="5" value="<?php echo $row->ordering; ?>" <?php echo $disabled ?> class="text_area" style="text-align: center" />
					</td>
					<td align="center">
						<?php echo $row->sticky ? JText::_( 'Yes' ) : JText::_( 'No' );?>
					</td>
					<td align="center">
						<?php echo $row->impmade.' '.JText::_('of').' '.$row->imptotal?>
					</td>
					<td align="center">
						<?php echo $row->clicks;?> -
						<?php echo sprintf( '%.2f%%', $percentClicks );?>
					</td>
					<td>
						<?php echo $row->tags; ?>
					</td>
					<td align="center">
						<?php echo $row->id; ?>
					</td>
				</tr>
				<?php
				$k = 1 - $k;
			}
			?>
			</tbody>
			</table>

		<input type="hidden" name="c" value="banner" />
		<input type="hidden" name="option" value="com_banners" />
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="filter_order" value="<?php echo $lists['order']; ?>" />
		<input type="hidden" name="filter_order_Dir" value="<?php echo $lists['order_Dir']; ?>" />
		<?php echo JHTML::_( 'form.token' ); ?>
		</form>
		<?php
	}

	function setBannerToolbar()
	{
		$task = JRequest::getVar( 'task', '', 'method', 'string');

		JToolBarHelper::title( $task == 'add' ? JText::_( 'Banner' ) . ': <small><small>[ '. JText::_( 'New' ) .' ]</small></small>' : JText::_( 'Banner' ) . ': <small><small>[ '. JText::_( 'Edit' ) .' ]</small></small>', 'generic.png' );
		JToolBarHelper::save( 'save' );
		JToolBarHelper::apply('apply');
		JToolBarHelper::cancel( 'cancel' );
		JToolBarHelper::help( 'screen.banners.edit' );
	}

	function banner( &$row, &$lists )
	{
		BannersViewBanner::setBannerToolbar();
		JRequest::setVar( 'hidemainmenu', 1 );
		JFilterOutput::objectHTMLSafe( $row, ENT_QUOTES, 'custombannercode' );
		?>
		<script language="javascript" type="text/javascript">
		<!--
		function changeDisplayImage() {
			if (document.adminForm.imageurl.value !='') {
				document.adminForm.imagelib.src='../images/banners/' + document.adminForm.imageurl.value;
			} else {
				document.adminForm.imagelib.src='images/blank.png';
			}
		}
		function submitbutton(pressbutton) {
			var form = document.adminForm;
			if (pressbutton == 'cancel') {
				submitform( pressbutton );
				return;
			}
			// do field validation
			if (form.name.value == "") {
				alert( "<?php echo JText::_( 'You must provide a banner name.', true ); ?>" );
			} else if (getSelectedValue('adminForm','cid') < 1) {
				alert( "<?php echo JText::_( 'Please select a client.', true ); ?>" );
			/*} else if (!getSelectedValue('adminForm','imageurl')) {
				alert( "<?php echo JText::_( 'Please select an image.', true ); ?>" );*/
			/*} else if (form.clickurl.value == "") {
				alert( "<?php echo JText::_( 'Please fill in the URL for the banner.', true ); ?>" );*/
			} else if ( getSelectedValue('adminForm','catid') == 0 ) {
				alert( "<?php echo JText::_( 'Please select a category.', true ); ?>" );
			} else {
				submitform( pressbutton );
			}
		}
		//-->
		</script>
		<form action="index.php" method="post" name="adminForm">

		<div class="col100">
			<fieldset class="adminform">
				<legend><?php echo JText::_( 'Details' ); ?></legend>

				<table class="admintable">
				<tbody>
					<tr>
						<td width="20%" class="key">
							<label for="name">
								<?php echo JText::_( 'Name' ); ?>:
							</label>
						</td>
						<td width="80%">
							<input class="inputbox" type="text" name="name" id="name" size="50" value="<?php echo $row->name;?>" />
						</td>
					</tr>
					<tr>
						<td width="20%" class="key">
							<label for="alias">
								<?php echo JText::_( 'Alias' ); ?>:
							</label>
						</td>
						<td width="80%">
							<input class="inputbox" type="text" name="alias" id="alias" size="50" value="<?php echo $row->alias;?>" />
						</td>
					</tr>
					<tr>
						<td class="key">
							<?php echo JText::_( 'Show Banner' ); ?>:
						</td>
						<td>
							<?php echo $lists['showBanner']; ?>
						</td>
					</tr>
					<tr>
						<td class="key">
							<?php echo JText::_( 'Sticky' ); ?>:
						</td>
						<td>
							<?php echo $lists['sticky']; ?>
						</td>
					</tr>
					<tr>
						<td class="key">
							<label for="ordering">
								<?php echo JText::_( 'Ordering' ); ?>:
							</label>
						</td>
						<td>
							<input class="inputbox" type="text" name="ordering" id="ordering" size="6" value="<?php echo $row->ordering;?>" />
						</td>
					</tr>
					<tr>
						<td valign="top" align="right" class="key">
							<label for="catid">
								<?php echo JText::_( 'Category' ); ?>:
							</label>
						</td>
						<td>
							<?php echo $lists['catid']; ?>
						</td>
					</tr>
					<tr>
						<td class="key">
							<label for="cid">
								<?php echo JText::_( 'Client Name' ); ?>:
							</label>
						</td>
						<td >
							<?php echo $lists['cid']; ?>
						</td>
					</tr>
					<tr>
						<td class="key">
							<label for="imptotal">
								<?php echo JText::_( 'Impressions Purchased' ); ?>:
							</label>
						</td>
						<?php
						$unlimited = '';
						if ($row->imptotal == 0) {
							$unlimited = 'checked="checked"';
							$row->imptotal = '';
						}
						?>
						<td>
							<input class="inputbox" type="text" name="imptotal" id="imptotal" size="12" maxlength="11" value="<?php echo $row->imptotal;?>" />
							&nbsp;&nbsp;&nbsp;&nbsp;
							<label for="unlimited">
								<?php echo JText::_( 'Unlimited' ); ?>
							</label>
							<input type="checkbox" name="unlimited" id="unlimited" <?php echo $unlimited;?> />
						</td>
					</tr>
					<tr>
						<td class="key">
							<label for="clickurl">
								<?php echo JText::_( 'Click URL' ); ?>:
							</label>
						</td>
						<td>
							<input class="inputbox" type="text" name="clickurl" id="clickurl" size="100" maxlength="200" value="<?php echo $row->clickurl;?>" />
						</td>
					</tr>
					<tr >
						<td valign="top" align="right" class="key">
							<?php echo JText::_( 'Clicks' ); ?>:
						</td>
						<td colspan="2">
							<?php echo $row->clicks;?>
							&nbsp;&nbsp;&nbsp;&nbsp;
							<input name="reset_hits" type="button" class="button" value="<?php echo JText::_( 'Reset Clicks' ); ?>" onclick="submitbutton('resethits');" />
						</td>
					</tr>
					<tr>
						<td valign="top" class="key">
							<label for="custombannercode">
								<?php echo JText::_( 'Custom banner code' ); ?>:
							</label>
						</td>
						<td>
							<textarea class="inputbox" cols="70" rows="8" name="custombannercode" id="custombannercode"><?php echo $row->custombannercode;?></textarea>
						</td>
					</tr>
					<tr>
						<td valign="top" class="key">
							<label for="description">
								<?php echo JText::_( 'Description/Notes' ); ?>:
							</label>
						</td>
						<td>
							<textarea class="inputbox" cols="70" rows="3" name="description" id="description"><?php echo $row->description;?></textarea>
						</td>
					</tr>
					<tr>
						<td colspan="3">
						</td>
					</tr>
					<tr>
						<td valign="top" class="key">
							<label for="imageurl">
								<?php echo JText::_( 'Banner Image Selector' ); ?>:
							</label>
						</td>
						<td >
							<?php echo $lists['imageurl']; ?>
						</td>
					</tr>
					<tr>
						<td class="key">
							<label for="width">
								<?php echo JText::_( 'Width' ); ?>:
							</label>
						</td>
						<td>
							<input class="inputbox" type="text" name="width" id="width" size="6" value="<?php echo $lists['width'];?>" />
						</td>
					</tr>
					<tr>
						<td class="key">
							<label for="height">
								<?php echo JText::_( 'Height' ); ?>:
							</label>
						</td>
						<td>
							<input class="inputbox" type="text" name="height" id="height" size="6" value="<?php echo $lists['height'];?>" />
						</td>
					</tr>
					<tr>
						<td valign="top" class="key">
							<?php echo JText::_( 'Banner Image' ); ?>:
						</td>
						<td valign="top">
							<?php
							if (preg_match("#swf$#i", $row->imageurl)) {
								?>
								<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" border="0" width="<?php echo $lists['width'];?>" height="<?php echo $lists['height'];?>">
									<param name="movie" value="../images/banners/<?php echo $row->imageurl; ?>"><embed src="../images/banners/<?php echo $row->imageurl; ?>" loop="false" pluginspage="http://www.macromedia.com/go/get/flashplayer" type="application/x-shockwave-flash"  width="<?php echo $lists['width'];?>" height="<?php echo $lists['height'];?>"></embed>
								</object>
								<?php
							} elseif (preg_match("#gif|jpg|png#i", $row->imageurl)) {
								?>
								<img src="../images/banners/<?php echo $row->imageurl; ?>" name="imagelib" />
								<?php
							} else {
								?>
								<img src="images/blank.png" name="imagelib" />
								<?php
							}
							?>
						</td>
					</tr>
					<tr>
						<td valign="top" class="key">
							<label for="tags">
								<?php echo JText::_( 'Tags' ); ?>:
							</label>
						</td>
						<td>
							<textarea class="inputbox" cols="70" rows="3" name="tags" id="tags"><?php echo $row->tags;?></textarea>
						</td>
					</tr>
				</tbody>
				</table>
			</fieldset>
		</div>
		<div class="clr"></div>

		<input type="hidden" name="c" value="banner" />
		<input type="hidden" name="option" value="com_banners" />
		<input type="hidden" name="bid" value="<?php echo $row->bid; ?>" />
		<input type="hidden" name="clicks" value="<?php echo $row->clicks; ?>" />
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="impmade" value="<?php echo $row->impmade; ?>" />
		<?php echo JHTML::_( 'form.token' ); ?>
		</form>
		<?php
	}
}
