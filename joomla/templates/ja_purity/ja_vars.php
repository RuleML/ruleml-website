<?php
/**
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

include_once (dirname(__FILE__).DS.'/ja_templatetools.php');

$tmpTools = new JA_Tools($this);

# Auto Collapse Divs Functions ##########
$ja_left = $this->countModules('left') || ($tmpTools->getParam(JA_TOOL_MENU) == 1);
$ja_right = $this->countModules('right');

if ( $ja_left && $ja_right ) {
	$divid = '';
	} elseif ( $ja_left ) {
	$divid = '-fr';
	} elseif ( $ja_right ) {
	$divid = '-fl';
	} else {
	$divid = '-f';
}

$curidx = $tmpTools->getCurrentMenuIndex();
//if ($curidx) $curidx--;

//Calculate the width of template
$tmpWidth = '';
$tmpWrapMin = '100%';
switch ($tmpTools->getParam(JA_TOOL_SCREEN)){
	case 'auto':
		$tmpWidth = '97%';
		break;
	case 'fluid':
		$tmpWidth = intval($tmpTools->getParam('ja_screen_width'));
		$tmpWidth = $tmpWidth ? $tmpWidth.'%' : '90%';
		break;
	case 'fix':
		$tmpWidth = intval($tmpTools->getParam('ja_screen_width'));
		$tmpWrapMin = $tmpWidth ? ($tmpWidth+1).'px' : '751px';
		$tmpWidth = $tmpWidth ? $tmpWidth.'px' : '750px';
		break;
	default:
		$tmpWidth = intval($tmpTools->getParam(JA_TOOL_SCREEN));
		$tmpWrapMin = $tmpWidth ? ($tmpWidth+1).'px' : '751px';
		$tmpWidth = $tmpWidth ? $tmpWidth.'px' : '750px';
		break;
}

?>
