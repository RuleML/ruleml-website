<?php
/**
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

/************************************************
Decode
**************************************************/
	function ex_decode($string)
	{
 // replace numeric entities
    $string = preg_replace('~&#x([0-9a-f]+);~ei', 'chr(hexdec("\\1"))', $string);
    $string = preg_replace('~&#([0-9]+);~e', 'chr("\\1")', $string);
    // replace literal entities
    $trans_tbl = get_html_translation_table(HTML_ENTITIES);
    $trans_tbl = array_flip($trans_tbl);
    // changing translation table to UTF-8
    foreach( $trans_tbl as $key => $value ) {
        $trans_tbl[$key] = iconv( 'ISO-8859-1', 'UTF-8', $value );
    }
    return strtr($string, $trans_tbl);
		/////////////////////////
	//	return $source;
	}


/************************************************
Decode
**************************************************/

function decode_entities($text) {
   //$text= html_entity_decode($text,ENT_QUOTES,"ISO-8859-1"); #NOTE: UTF-8 does not work!
   $text = html_entity_decode( $text, ENT_QUOTES, "UTF-8" );
   $text= preg_replace('/&#(\d+);/me',"chr(\\1)",$text); #decimal notation
   $text= preg_replace('/&#x([a-f0-9]+);/mei',"chr(0x\\1)",$text);  #hex notation
   return $text;
}

/*******************************************
* All function below here are working
********************************************/
function accents_15($text){
 /*
 //Replace all page breaks with {mospagebreak}
<hr class="system-pagebreak" />
<hr class="system-pagebreak" title="The page title" /> or 
<hr class="system-pagebreak" alt="The first page" /> or 
<hr class="system-pagebreak" title="The page title" alt="The first page" /> or 
<hr class="system-pagebreak" alt="The first page" title="The page title" /> 

Replace{loadposition} with {mosloadposition}
Remove <hr id="system-readmore" />
Make sure any control characters and <> parse in the XML
 */
    $text = str_replace('<hr id="system-readmore" />', '',$text);
    $text = str_replace('{loadposition', '{mosloadposition',$text);
	$regexp = '#<hr(.*)class=\"system-pagebreak\"(.*)\/>#iU';
	$text = preg_replace("$regexp", '{mospagebreak}',$text);	
	 $cr=array(
	 ''=> '&#x0002;',
'' => '&#x0003;',
'' => '&#x0004;', 
'' => '&#x0005;',  
''	=> '&#x0006;',
''	=> '&#x0007;', 
''	=> '&#x0008;',  
'' => '&#x000B;',
'' => '&#x000C;',
'' => '&#x000E;',
'' => '&#x000F;',
'' => '&#x0012;',
'' => '&#x0013;',
'' => '&#x0014;',
'' => '&#x0015;',
'' => '&#x0016;',
'' => '&#x0017;',
'' => '&#x0018;',
'' => '&#x0019;',
'' => '&#x001A;',
'' => '&#x001B;',
//high order control
'&#65533;' => '',
'<' => '&#60;', '>' => '&#62;'
  );
  return strtr($text, $cr);
}

/********************************************
* Decode edit form fields
******************************************/
function decode_entities_all($string) {
      // replace numeric entities
   $string = preg_replace('~&#x([0-9a-f]+);~ei', 'chr(hexdec("\\1"))', $string);
    $string = preg_replace('~&#([0-9]+);~e', 'chr("\\1")', $string);
    // replace literal entities
    $trans_tbl = get_html_translation_table(HTML_ENTITIES);
    $trans_tbl = array_flip($trans_tbl);
    // changing translation table to UTF-8
    foreach( $trans_tbl as $key => $value ) {
        $trans_tbl[$key] = iconv( 'ISO-8859-1', 'UTF-8', $value );
    }
 
    return strtr($string, $trans_tbl);

}

/***********************************************************
   Change attribs for 1.0+
**********************************************************/

 function change_attribs($value){
/* changes needed for articles
show_title= ->item_title=
link_titles= ->link_titles=
show_intro= ->introtext=
show_section= ->section=
link_section= ->section_link=
show_category= ->category=
link_category= ->category_link=
show_vote= ->rating=
show_author= ->author=
show_create_date= ->createdate=
show_modify_date= ->modifydate=
show_pdf_icon= ->pdf=
show_print_icon= ->print=
show_email_icon= ->email=
language= ->''
keyref= ->keyref=
readmore= ->''
*/
                $value = str_replace('show_author=','author=',$value);
  				$value = str_replace('link_titles=','link_titles=',$value);
			    $value = str_replace('show_readmore=','readmore=',$value);
				$value = str_replace('show_pdf_icon=','pdf=',$value);
				$value = str_replace('show_print_icon=','print=',$value);
				$value = str_replace('show_email_icon=','email=',$value);
				$value = str_replace('keyref=',"\nkeyref=",$value);
				$value = str_replace('num_leading_articles=','leading=',$value);
				$value = str_replace('show_page_title=','page_title=',$value);
				$value = str_replace('page_title=','header=',$value);
				$value = str_replace('num_intro_articles=','intro=',$value);
				$value = str_replace('num_columns=','columns=',$value);
				$value = str_replace('num_links=','link=',$value);
				$value = str_replace('show_pagination=','pagination=',$value);
				$value = str_replace('show_pagination_results=','pagination_results=',$value);
				$value = str_replace('show_title=','item_title=',$value);
				$value = str_replace('show_category=','category=',$value);
				$value = str_replace('link_category=','category_link=',$value);
				$value = str_replace('show_vote=','rating=',$value);
				$value = str_replace('show_create_date=','createdate=',$value);
				$value = str_replace('show_modify_date=','modifydate=',$value);
				$value = str_replace('show_description=','description=',$value);
				$value = str_replace('show_description_image=','description_image=',$value);
				$value = str_replace('show_intro=','introtext=',$value);
				$value = str_replace('show_section=','section=',$value);
				$value = str_replace('link_section=','section_link=',$value);
				$value = str_replace('show_category_description=','description_cat=',$value);
				$value = str_replace('show_date=','date=',$value);
				$value = str_replace('show_hits=','hits=',$value);
				$value = str_replace('show_headings=','headings=',$value);
				$value = str_replace('show_empty_categories=','empty_cat=',$value);
				$value = str_replace('show_categories=','other_cat=',$value);
				$value = str_replace('show_cat_num_articles=','cat_items=',$value);
				$value = str_replace('show_pagination_limit=','display=',$value);
				$value = str_replace('show_item_navigation=','navigation=',$value);
				//remove 1.5+ values that dont apply 
 
  $value=ereg_replace("(language=([.]?[a-zA-Z0-9_/-])*)","",$value);
  $value=ereg_replace("(readmore=([.]?[a-zA-Z0-9_/-])*)","\n",$value);
   //tidy up
   $value = str_replace("#atrstart#", "\npageclass_sfx=\nback_button=\n", $value);
   $value = str_replace("#atrend#", "\ndocbook_type=\n", $value);
   $value = str_replace("\n\n", "", $value);
				
  return $value;
  }



 /****************************************
High end numeric converter
******************************************/
function high_order($text){
$text = preg_replace('/([\xc0-\xdf].)/se', "'&#' . ((ord(substr('$1', 0, 1)) - 192) * 64 + (ord(substr('$1', 1, 1)) - 128)) . ';'", $text);
$text = preg_replace('/([\xe0-\xef]..)/se', "'&#' . ((ord(substr('$1', 0, 1)) - 224) * 4096 + (ord(substr('$1', 1, 1)) - 128) * 64 + (ord(substr('$1', 2, 1)) - 128)) . ';'", $text);

 return $text;
}
?>