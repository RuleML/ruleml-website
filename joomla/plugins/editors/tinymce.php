<?php
/**
 * @version		$Id: tinymce.php 15099 2010-02-27 14:23:40Z ian $
 * @package		Joomla
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

// Do not allow direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.plugin.plugin' );

/**
 * TinyMCE WYSIWYG Editor Plugin
 *
 * @package Editors
 * @since 1.5
 */
class plgEditorTinymce extends JPlugin
{
	/**
	 * Constructor
	 *
	 * For php4 compatability we must not use the __constructor as a constructor for plugins
	 * because func_get_args ( void ) returns a copy of all passed arguments NOT references.
	 * This causes problems with cross-referencing necessary for the observer design pattern.
	 *
	 * @param 	object $subject The object to observe
	 * @param 	array  $config  An array that holds the plugin configuration
	 * @since 1.5
	 */
	function plgEditorTinymce(& $subject, $config)
	{
		parent::__construct($subject, $config);
	}

	/**
	 * Method to handle the onInit event.
	 *  - Initializes the TinyMCE WYSIWYG Editor
	 *
	 * @access public
	 * @return string JavaScript Initialization string
	 * @since 1.5
	 */
	function onInit()
	{
		$mainframe =&JFactory::getApplication();
		$language =& JFactory::getLanguage();
		JPlugin::loadLanguage('plg_editors_tinymce', JPATH_ADMINISTRATOR);
		$mode = $this->params->get('mode','advanced');
		$theme = array('simple' => 'simple','advanced' => 'advanced','extended' => 'advanced');
		$skin = $this->params->get( 'skin', '0' );
		switch ($skin)
		{
			case '3':
				$skin = "skin : \"o2k7\", skin_variant : \"black\",";
				break;
			case '2':
				$skin = "skin : \"o2k7\", skin_variant : \"silver\",";
				break;
			case '1':
				$skin = "skin : \"o2k7\",";
				break;
			case '0':
			default:
				$skin = "skin : \"default\",";
		}
		$compressed			= $this->params->def('compressed', 0);
		$cleanup_startup	= $this->params->def('cleanup_startup', 0);
		$cleanup_save		= $this->params->def('cleanup_save', 2);
		$entity_encoding	= $this->params->def('entity_encoding', 'raw');

		if ($cleanup_startup) {
			$cleanup_startup = 'true';
		} else {
			$cleanup_startup = 'false';
		}
		switch ($cleanup_save) {
			case '0': /* Never clean up on save */
				$cleanup = 'false';
				break;
			case '1': /* Clean up front end edits only */
				if ($mainframe->isadmin())
					$cleanup = 'false';
				else
					$cleanup = 'true';
				break;
			default:  /* Always clean up on save */
				$cleanup = 'true';
				break;
		}

		$langMode	= $this->params->def('lang_mode', 0);
		$langPrefix	= $this->params->def('lang_code', 'en');
		if ($langMode) {
			$langPrefix = substr($language->getTag(), 0, strpos( $language->getTag(), '-' ));
		}
		if ($language->isRTL()) {
			$text_direction = 'rtl';
		} else {
			$text_direction = 'ltr';
		}

		$use_content_css	= $this->params->def('content_css', 1);
		$content_css_custom	= $this->params->def('content_css_custom', '');

		/*
		 * Lets get the default template for the site application
		 */
		$db =& JFactory::getDBO();
		$query = 'SELECT template'
		. ' FROM #__templates_menu'
		. ' WHERE client_id = 0'
		. ' AND menuid = 0'
		;
		$db->setQuery( $query );
		$template = $db->loadResult();

		$content_css = '';

		$templates_path = JPATH_SITE.DS.'templates';
		// loading of css file for 'styles' dropdown
		if ( $content_css_custom )
		{
			// If URL, just pass it to $content_css
			if (strpos( $content_css_custom, 'http' ) !==false) {
				$content_css = 'content_css : "'. $content_css_custom .'",';
			// If it is not a URL, assume it is a file name in the current template folder
			} else {
				$content_css = 'content_css : "'. JURI::root() .'templates/'. $template . '/css/'. $content_css_custom .'",';

				// Issue warning notice if the file is not found (but pass name to $content_css anyway to avoid TinyMCE error
				if (!file_exists($templates_path.DS.$template.DS.'css'.DS.$content_css_custom)) {
					$msg = sprintf (JText::_('CUSTOMCSSFILENOTPRESENT'), $content_css_custom);
					JError::raiseNotice('SOME_ERROR_CODE', $msg);
				}
			}
		}
		else
		{
			// process when use_content_css is Yes and no custom file given
			if($use_content_css) {

				// first check templates folder for default template
				// if no editor.css file in templates folder, check system template folder
				if (!file_exists($templates_path.DS.$template.DS.'css'.DS.'editor.css')) {
					$template = 'system';

					// if no editor.css file in system folder, show alert
					if (!file_exists($templates_path.DS.'system'.DS.'css'.DS.'editor.css'))
					{
						JError::raiseNotice('SOME_ERROR_CODE', JText::_('TEMPLATECSSFILENOTPRESENT'));
					} else {
						$content_css = 'content_css : "' . JURI::root() .'templates/system/css/editor.css",';
					}
				} else {
					$content_css = 'content_css : "' . JURI::root() .'templates/'. $template . '/css/editor.css",';
				}
			}
		}

		$relative_urls		= $this->params->def('relative_urls', '1');
		if ( $relative_urls ) { // relative
			$relative_urls = "true";
		} else { // absolute
			$relative_urls = "false";
		}

		$newlines = $this->params->def('newlines', 0);
		if ($newlines) { // br
			$forcenewline = "force_br_newlines : true, force_p_newlines : false, forced_root_block : '',";
		} else { // p
			$forcenewline = "force_br_newlines : false, force_p_newlines : true, forced_root_block : 'p',";
		}
		$invalid_elements	= $this->params->def('invalid_elements', 'script,applet,iframe');
		$extended_elements	= $this->params->def('extended_elements', '');

		// theme_advanced_* settings
		$toolbar = $this->params->def('toolbar', 'top');
		$toolbar_align	= $this->params->def('toolbar_align', 'left');
		$html_height = $this->params->def('html_height', '550');
		$html_width = $this->params->def('html_width', '750');
		$element_path = '';
		if ($this->params->get('element_path', 1)) {
			$element_path = 'theme_advanced_statusbar_location : "bottom", theme_advanced_path : true';
		} else {
			$element_path = 'theme_advanced_statusbar_location : "none", theme_advanced_path : false';
		}

		$buttons1_add_before = $buttons1_add = array();
		$buttons2_add_before = $buttons2_add = array();
		$buttons3_add_before = $buttons3_add = array();
		$buttons4 = array();
		$plugins 	= array();
		if($extended_elements != "") $elements = explode(',', $extended_elements);

		//Initial values for buttons
		array_push($buttons4,'cut','copy','paste');
		//array_push($buttons4,'|');

		// Plugins

		// fonts
		$fonts =  $this->params->def( 'fonts', 1 );
		if ($fonts) {
			$buttons1_add[]	= 'fontselect,fontsizeselect';
		}

		// paste
		$paste =  $this->params->def('paste', 1);
		if ($paste) {
			$plugins[]	= 'paste';
			$buttons4[]	= 'pastetext';
			$buttons4[]	= 'pasteword';
			$buttons4[]	= 'selectall,|';
		}

		// search & replace
		$searchreplace		=  $this->params->def('searchreplace', 1);
		if ($searchreplace) {
			$plugins[]	= 'searchreplace';
			$buttons2_add_before[]	= 'search,replace,|';
		}

		// insert date and/or time plugin
		$insertdate			= $this->params->def('insertdate', 1);
		$format_date		= $this->params->def('format_date', '%Y-%m-%d');
		$inserttime			= $this->params->def('inserttime', 1);
		$format_time		= $this->params->def('format_time', '%H:%M:%S');
		if ($insertdate or $inserttime) {
			$plugins[]	= 'insertdatetime';
			if ($insertdate) {
				$buttons2_add[]	= 'insertdate';
			}
			if ($inserttime) {
				$buttons2_add[]	= 'inserttime';
			}
		}

		// colors
		$colors =  $this->params->def('colors', 1);
		if ($colors) {
			$buttons2_add[]	= 'forecolor,backcolor';
		}

		// table
		$table = $this->params->def('table', 1);
		if ($table) {
			$plugins[]	= 'table';
			$buttons3_add_before[]	= 'tablecontrols';
		}

		// emotions
		$smilies = $this->params->def('smilies', 1);
		if ($smilies) {
			$plugins[]	= 'emotions';
			$buttons3_add[]	= 'emotions';
		}

		//media plugin
		$media = $this->params->def('media', 1);
		if ($media) {
			$plugins[] = 'media';
			$buttons3_add[] = 'media';
		}

		// horizontal line
		$hr = $this->params->def('hr', 1);
		if ($hr) {
			$plugins[]	= 'advhr';
			$elements[] = 'hr[id|title|alt|class|width|size|noshade|style]';
			$buttons3_add[]	= 'advhr';
		} else {
			$elements[] = 'hr[id|class|title|alt]';
		}

		// rtl/ltr buttons
		$directionality	= $this->params->def('directionality', 1);
		if ($directionality) {
			$plugins[] = 'directionality';
			$buttons3_add[] = 'ltr,rtl';
		}

		// fullscreen
		$fullscreen	= $this->params->def('fullscreen', 1);
		if ($fullscreen) {
			$plugins[]	= 'fullscreen';
			$buttons2_add[]	= 'fullscreen';
		}

		// layer
		$layer = $this->params->def('layer', 1);
		if ($layer) {
			$plugins[]	= 'layer';
			$buttons4[]	= 'insertlayer';
			$buttons4[]	= 'moveforward';
			$buttons4[]	= 'movebackward';
			$buttons4[]	= 'absolute';
		}

		// style
		$style = $this->params->def('style', 1);
		if ($style) {
			$plugins[]	= 'style';
			$buttons4[]	= 'styleprops';
		}

		// XHTMLxtras
		$xhtmlxtras	= $this->params->def('xhtmlxtras', 1);
		if ($xhtmlxtras) {
			$plugins[]	= 'xhtmlxtras';
			$buttons4[]	= 'cite,abbr,acronym,ins,del,attribs';
		}

		// visualchars
		$visualchars = $this->params->def('visualchars', 1);
		if ($visualchars) {
			$plugins[]	= 'visualchars';
			$buttons4[]	= 'visualchars';
		}

		// non-breaking
		$nonbreaking = $this->params->def('nonbreaking', 1);
		if ($nonbreaking) {
			$plugins[]	= 'nonbreaking';
			$buttons4[]	= 'nonbreaking';
		}

		// blockquote
		$blockquote	= $this->params->def( 'blockquote', 1 );
		if ( $blockquote ) {
			$plugins[] = 'blockquote';
			$buttons4[] = 'blockquote';
		}

		// template
		$template = $this->params->def('template', 1);
		if ($template) {
			$plugins[]	= 'template';
			$buttons4[]	= 'template';
		}

		// advimage
		$advimage = $this->params->def('advimage', 1);
		if ($advimage) {
			$plugins[]	= 'advimage';
			$elements[]	= 'img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name|style]';
		}

		// advlink
		$advlink 	= $this->params->def('advlink', 1);
		if ($advlink) {
			$plugins[]	= 'advlink';
			$elements[]	= 'a[id|class|name|href|target|title|onclick|rel|style]';
		}

		// autosave
		$autosave = $this->params->def('autosave', 1);
		if ($autosave) {
			$plugins[]	= 'autosave';
		}

		// context menu
		$contextmenu = $this->params->def('contextmenu', 1);
		if ($contextmenu) {
			$plugins[]	= 'contextmenu';
		}

		// inline popups
		$inlinepopups			= $this->params->def('inlinepopups', 1);
		if ($inlinepopups) {
			$plugins[]	= 'inlinepopups';
			$dialog_type = "dialog_type : \"modal\",";
		} else {
			$dialog_type = "";
		}

		// Safari compatibility
		$safari	= $this->params->def('safari', 0);
		if ($safari) {
			$plugins[]	= 'safari';
		}

		$custom_plugin = $this->params->def('custom_plugin', '');
		if ($custom_plugin != "") {
			$plugins[] = $custom_plugin;
		}

		$custom_button = $this->params->def('custom_button', '');
		if ($custom_button != "") {
			$buttons4[] = $custom_button;
		}

		// Prepare config variables
		$buttons1_add_before = implode(',', $buttons1_add_before);
		$buttons2_add_before = implode(',', $buttons2_add_before);
		$buttons3_add_before = implode(',', $buttons3_add_before);
		$buttons1_add = implode(',', $buttons1_add);
		$buttons2_add = implode(',', $buttons2_add);
		$buttons3_add = implode(',', $buttons3_add);
		$buttons4 = implode(',', $buttons4);
		$plugins = implode(',', $plugins);
		$elements = implode(',', $elements);

		switch($mode) {
			case 'simple': /* Simple mode*/
				if ($compressed) {
					$load = "\t<script type=\"text/javascript\" src=\"".
							JURI::root().
							"plugins/editors/tinymce/jscripts/tiny_mce/tiny_mce_gzip.js\"></script>\n";
					$load .= "\t<script type=\"text/javascript\">
					tinyMCE_GZ.init({
					themes : \"$theme[$mode]\",
					languages : \"". $langPrefix . "\"
				});
				</script>";
				} else {
					$load = "\t<script type=\"text/javascript\" src=\"".
							JURI::root().
							"plugins/editors/tinymce/jscripts/tiny_mce/tiny_mce.js\"></script>\n";
				}
				$return = $load .
				"\t<script type=\"text/javascript\">
				tinyMCE.init({
					// General
					directionality: \"$text_direction\",
					editor_selector : \"mce_editable\",
					language : \"". $langPrefix . "\",
					mode : \"specific_textareas\",
					$skin
					theme : \"$theme[$mode]\",
					// Cleanup/Output
					inline_styles : true,
					gecko_spellcheck : true,
					cleanup : $cleanup,
					cleanup_on_startup : $cleanup_startup,
					entity_encoding : \"$entity_encoding\",
					$forcenewline
					// URL
					relative_urls : $relative_urls,
					remove_script_host : false,
					// Layout
					$content_css
					document_base_url : \"". JURI::root() ."\",
				});
				</script>";
				break;

			case 'advanced': /* Advanced mode*/
				if ($compressed) {
					$load = "\t<script type=\"text/javascript\" src=\"".
							JURI::root().
							"plugins/editors/tinymce/jscripts/tiny_mce/tiny_mce_gzip.js\"></script>\n";
					$load .= "\t<script type=\"text/javascript\">
						tinyMCE_GZ.init({
						themes : \"$theme[$mode]\",
						languages : \"". $langPrefix . "\"
					});
				</script>";
				} else {
					$load = "\t<script type=\"text/javascript\" src=\"".
							JURI::root().
							"plugins/editors/tinymce/jscripts/tiny_mce/tiny_mce.js\"></script>\n";
				}
				$return = $load .
				"\t<script type=\"text/javascript\">
				tinyMCE.init({
					// General
					directionality: \"$text_direction\",
					editor_selector : \"mce_editable\",
					language : \"". $langPrefix . "\",
					mode : \"specific_textareas\",
					$skin
					theme : \"$theme[$mode]\",
					// Cleanup/Output
					inline_styles : true,
					gecko_spellcheck : true,
					cleanup : $cleanup,
					cleanup_on_startup : $cleanup_startup,
					entity_encoding : \"$entity_encoding\",
					extended_valid_elements : \"$elements\",
					$forcenewline
					invalid_elements : \"$invalid_elements\",
					// URL
					relative_urls : $relative_urls,
					remove_script_host : false,
					document_base_url : \"". JURI::root() ."\",
					// Layout
					$content_css
					// Advanced theme
					theme_advanced_toolbar_location : \"$toolbar\",
					theme_advanced_toolbar_align : \"$toolbar_align\",
					theme_advanced_source_editor_height : \"$html_height\",
					theme_advanced_source_editor_width : \"$html_width\",
					$element_path
				});
				</script>";
				break;

			case 'extended': /* Extended mode*/
				if ($compressed) {
					$load = "\t<script type=\"text/javascript\" src=\"".
							JURI::root().
							"plugins/editors/tinymce/jscripts/tiny_mce/tiny_mce_gzip.js\"></script>\n";
				  	$load .= "\t<script type=\"text/javascript\">
				tinyMCE_GZ.init({
					themes : \"$theme[$mode]\",
					plugins : \"$plugins\",
					languages : \"". $langPrefix . "\"
				});
				</script>";
		  } else {
				$load = "\t<script type=\"text/javascript\" src=\"".
						JURI::root().
						"plugins/editors/tinymce/jscripts/tiny_mce/tiny_mce.js\"></script>\n";
		  }
		  $return = $load .
				"\t<script type=\"text/javascript\">
				tinyMCE.init({
					// General
					$dialog_type
					directionality: \"$text_direction\",
					editor_selector : \"mce_editable\",
					language : \"". $langPrefix . "\",
					mode : \"specific_textareas\",
					plugins : \"$plugins\",
					$skin
					theme : \"$theme[$mode]\",
					// Cleanup/Output
					inline_styles : true,
					gecko_spellcheck : true,
					cleanup : $cleanup,
					cleanup_on_startup : $cleanup_startup,
					entity_encoding : \"$entity_encoding\",
					extended_valid_elements : \"$elements\",
					$forcenewline
					invalid_elements : \"$invalid_elements\",
					// URL
					relative_urls : $relative_urls,
					remove_script_host : false,
					document_base_url : \"". JURI::root() ."\",
					//Templates
					template_external_list_url :  \"". JURI::root() ."plugins/editors/tinymce/templates/template_list.js\",
					// Layout
					$content_css
					// Advanced theme
					theme_advanced_toolbar_location : \"$toolbar\",
					theme_advanced_toolbar_align : \"$toolbar_align\",
					theme_advanced_source_editor_height : \"$html_height\",
					theme_advanced_source_editor_width : \"$html_width\",
					$element_path,
					theme_advanced_buttons1_add_before : \"$buttons1_add_before\",
					theme_advanced_buttons2_add_before : \"$buttons2_add_before\",
					theme_advanced_buttons3_add_before : \"$buttons3_add_before\",
					theme_advanced_buttons1_add : \"$buttons1_add\",
					theme_advanced_buttons2_add : \"$buttons2_add\",
					theme_advanced_buttons3_add : \"$buttons3_add\",
					theme_advanced_buttons4 : \"$buttons4\",
					plugin_insertdate_dateFormat : \"$format_date\",
					plugin_insertdate_timeFormat : \"$format_time\",
					fullscreen_settings : {
						theme_advanced_path_location : \"top\"
					}
				});
				</script>";
		  break;
		}

		return $return;
	}

	/**
	 * TinyMCE WYSIWYG Editor - get the editor content
	 *
	 * @param string 	The name of the editor
	 */
	function onGetContent( $editor ) {
		return 'tinyMCE.get(\''.$editor.'\').getContent();';
	}

	/**
	 * TinyMCE WYSIWYG Editor - set the editor content
	 *
	 * @param string 	The name of the editor
	 */
	function onSetContent($editor, $html) {
		return 'tinyMCE.get(\''.$editor.'\').setContent('.$html.');';
	}

	/**
	 * TinyMCE WYSIWYG Editor - copy editor content to form field
	 *
	 * @param string 	The name of the editor
	 */
	function onSave($editor) {
 		return 'if (tinyMCE.get("'.$editor.'").isHidden()) {tinyMCE.get("'.$editor.'").show()}; tinyMCE.get("'.$editor.'").save();';
	}

	/**
	 * TinyMCE WYSIWYG Editor - display the editor
	 *
	 * @param string The name of the editor area
	 * @param string The content of the field
	 * @param string The width of the editor area
	 * @param string The height of the editor area
	 * @param int The number of columns for the editor area
	 * @param int The number of rows for the editor area
	 * @param mixed Can be boolean or array.
	 */
	function onDisplay($name, $content, $width, $height, $col, $row, $buttons = true)
	{
		// Only add "px" to width and height if they are not given as a percentage
		if (is_numeric( $width )) {
			$width .= 'px';
		}
		if (is_numeric( $height )) {
			$height .= 'px';
		}

		$editor  = "<textarea id=\"$name\" name=\"$name\" cols=\"$col\" rows=\"$row\" style=\"width:{$width}; height:{$height};\" class=\"mce_editable\">$content</textarea>\n" .
			$this->_displayButtons($name, $buttons) .
			$this->_toogleButton($name);

		return $editor;
	}

	function onGetInsertMethod($name)
	{
		$doc =& JFactory::getDocument();

		$js= "
			function isBrowserIE() {
				return navigator.appName==\"Microsoft Internet Explorer\";
			}

			function jInsertEditorText( text, editor ) {
				if (isBrowserIE()) {
					if (window.parent.tinyMCE) {
						window.parent.tinyMCE.selectedInstance.selection.moveToBookmark(window.parent.global_ie_bookmark);
					}
				}
				tinyMCE.execInstanceCommand(editor, 'mceInsertContent',false,text);
			}

			var global_ie_bookmark = false;

			function IeCursorFix() {
				if (isBrowserIE()) {
					tinyMCE.execCommand('mceInsertContent', false, '');
					global_ie_bookmark = tinyMCE.activeEditor.selection.getBookmark(false);
				}
				return true;
			}";

		$doc->addScriptDeclaration($js);

		return true;
	}

	function _displayButtons($name, $buttons)
	{
		// Load modal popup behavior
		JHTML::_('behavior.modal', 'a.modal-button');

		$args['name'] = $name;
		$args['event'] = 'onGetInsertMethod';

		$return = '';
		$results[] = $this->update($args);
		foreach ($results as $result) {
			if (is_string($result) && trim($result)) {
				$return .= $result;
			}
		}

		if(!empty($buttons))
		{
			$results = $this->_subject->getButtons($name, $buttons);

			/*
			 * This will allow plugins to attach buttons or change the behavior on the fly using AJAX
			 */
			$return .= "\n<div id=\"editor-xtd-buttons\">\n";
			foreach ($results as $button)
			{
				/*
				 * Results should be an object
				 */
				if ( $button->get('name') )
				{
					$modal		= ($button->get('modal')) ? 'class="modal-button"' : null;
					$href		= ($button->get('link')) ? 'href="'.JURI::base().$button->get('link').'"' : null;
                    $onclick	= ($button->get('onclick')) ? 'onclick="'.$button->get('onclick').'"' : 'onclick="IeCursorFix(); return false;"';
					$return .= "<div class=\"button2-left\"><div class=\"".$button->get('name')."\"><a ".$modal." title=\"".$button->get('text')."\" ".$href." ".$onclick." rel=\"".$button->get('options')."\">".$button->get('text')."</a></div></div>\n";
				}
			}
			$return .= "</div>\n";
		}

		return $return;
	}

	function _toogleButton($name)
	{
		$return  = '';
		$return .= "\n<div style=\"margin-top:-5px\">\n";
		$return .= "<div class=\"button2-left\"><div class=\"blank\"><a href=\"#\" onclick=\"javascript:tinyMCE.execCommand('mceToggleEditor', false, '$name');return false;\" title=\"".JText::_('Toggle editor')."\">".JText::_('Toggle editor')."</a></div></div>";
		$return .= "</div>\n";
		return $return;
	}
}
