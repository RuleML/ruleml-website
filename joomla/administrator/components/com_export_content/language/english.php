<?php
/*
* @package Export Content: This file may be used with Joomla 1.0+ or 1.5+
* @copyright Copyright (C) 2008 www.bestdownloadsites.com All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL,
* Export Content is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*/
// no direct access
//change for Joomla 1.0+ or Mambo to:
//defined( '_VALID_MOS' ) or die( 'Restricted access' );
//change for Joomla 1.5+ to:
defined( '_JEXEC' ) or die( 'Restricted access' );

#######   NOTE TO ALL TRANSLATORS  ##################################
# You may post any translations here http://www.bestdownloadsites.com/export_content/ on the support forums.
#If you want to be credited for your work please include your details so we can add you to the credits.

###### ABOUT THIS FILE ##########################################
#All language files are basically the same for all releases of Export Content Component after 1/1/08.
#The only differences are clearly commented at the top with:
#   Only needed for Mambo.
# OR
#   Only needed for Joomla 1.5+ series otherwise should be commented out.
#
#If you have the time to translate this file you would be helping both the Joomla and Mambo community as it may be used for all 3 releases of the Export Content Component.

###### IMPORTANT: ###############################################
#Please make sure as much as possible to respect the punctuation and spacing because sometimes the constant are combined...
# Don't ever remove a define as it will create an error in the code.
# When using apostrophes  '   add a back-slash before like this:  \'  otherwise it will create an error.
# sometimes you will see html tags in the define, please leave it the way it is.

############################################################### 

/********************************************
* Only needed for Mambo 
*********************************************/
//START: For Mambo only from here:

 DEFINE('_DOWNLOAD_WARNING','<b>Warning:</b> This data has been optimised for Joomla only. Do not attempt to install this content on a Mambo based site as you may get undesired results');
  DEFINE('_IMPORT_WARNING','Due to incompatibility all "Import" features have been disabled.
  So it is only possible to "Export Content" one way from Mambo to Joomla. <br /> 
  NOTE: This may be addressed in a later release.');
  
  //END: For Mambo only to here.
  
/*******************************************************************************
* Only needed for Joomla 1.5+ series otherwise should be commented out. 
********************************************************************************/
//START: For Joomla 1.5+ series only from here:

DEFINE('_READMORE_EDITOR_MSG','<b>Export Content Note:</b><br> If there is content in the box below a <b>\'Readmore link\'</b> will be added for you when you >>');
 DEFINE('_CMN_TOP','Top');
 DEFINE('_CMN_BOTTOM','Bottom');
 DEFINE('_INSERT_CODE','INSERT Code');
 DEFINE('_COMPILE_SITE_CONTENT','Compile Site Content');
 DEFINE('_XML_FILESIZE_HEADING','The Install File Size');
 
 //END: For Joomla 1.5+ series only to here.
  
 /************************************************************************************
 Everything below here is used for all versions of Export Content and may be used for:
 Joomla 1.0+, Joomla 1.5+, Mambo 4.5+ and Mambo 4.6+ installs
 *************************************************************************************/
DEFINE('_NO_FRONTEND_LINK','There is no front end to this component at this time.
<br><br>
Please go to the <a href="administrator/index2.php" target="blank">administration</a> area under Components >>><u>Export Content.</u>
<br><br>
Or if you need help go to <a href="http://www.bestdownloadsites.com/export_content/" target="blank">Export Content Support Forums.</a>');
/*************************************************
Imported data notes
**************************************************/
 DEFINE('_STATIC_FULLTXT_MSG','The full text below will be added to the intro text after a {mospagebreak} when transfering static items.');
DEFINE('_IMPORT_REMOVE','This component may safely be removed via the extensions uninstaller ( as you would any other component ).<BR /><BR />Look in Extension Manager under components for');
 DEFINE('_IMPORT_NEW_VERSION','import1.5_data.');
  DEFINE('_IMPORT_VERSION','Imported Content.');
DEFINE('_IMPORT_REMOVE_DATA','Note this is necessary before attempting to import any new data and will not affect any content that has already been transferred.');
DEFINE('_IMPORT_INFO_LINK','For the latest and complete information about this extension see <a href="http://www.bestdownloadsites.com/export_content" target="_blank">Export Content Home Page</a>.');
/********************************************
 Intro page
*********************************************/
DEFINE('_CFG_EXP_SATIC','Export-Compile Static Content Items');
DEFINE('_CFG_EXP_SECTIONS','Export-Compile Site Data by sections');
DEFINE('_CFG_SECTIONS','Transfer Imported Data By Sections');
DEFINE('_CFG_CAT','Transfer Imported Data By Categories');
DEFINE('_CFG_CONTENT','Transfer Imported Content Items');
DEFINE('_CFG_STATIC','Transfer Imported Static Items');
DEFINE('_CFG_ARCH','Transfer Imported Archived Items');
DEFINE('_CFG_SUPPORT','Export Content Support Forums');
DEFINE('_CFG_HELP','Export Content Information');
DEFINE('_CFG_ABOUT','About The Export Content Component');
DEFINE('_CFG_DONATE','Helping us help you.');
/*******************
Yes/no select boxes
********************/
DEFINE('_STATIC_YES_NO','Add All Static Content Items');
DEFINE('_ARCHIVE_YES_NO','Add Archived Content Items');
DEFINE('_E_UNARCHIVE','Unarchive');
DEFINE('_ARCHIVE_ITEMS_HEADING','Transfer Imported Archive Items');
/****************************************************
Page Headings
*****************************************************/
DEFINE('_COMPILE_SITE_HELP','Compile Site Content Help');
DEFINE('_COMPILE_STATIC_HELP','Compile Static Content Help');
DEFINE('_COMPILE_SITE_HEADING','Compile Site Content From');
DEFINE('_SECTION_HEADING','Transfer Imported Sections');
DEFINE('_COMPILE_STATIC_HEADING','Compile Static Content From');
DEFINE('_STATIC_HEADING','Transfer Imported Static/Uncategorized Items');
DEFINE('_CATEGORY_HEADING','Transfer Imported Categories');
DEFINE('_ITEMS_HEADING','Transfer Imported Content Items');
DEFINE('_COMPILE_DOWNLOAD_HEADING','Your Selected Content Is Ready To Download');
DEFINE('_DOWNLOAD_HEADING','Download Area');
/****************************************************
Title Headings
*****************************************************/
DEFINE('_ITEMS','Items');
DEFINE('_ID','ID');
DEFINE('_ACTIVE','Active');
 /************************************************
Tool bar menu text
*************************************************/
DEFINE('_COMPILE_15','Compile For 1.5+');
DEFINE('_COMPILE','Compile For 1.0+');
DEFINE('_REMOVE_ALL','Remove All');
DEFINE('_DOWNLOAD','Download 1.0+ Data');
DEFINE('_PUBLISH','Publish');
DEFINE('_UNPUBLISH','Unpublish');
DEFINE('_NEW_BUTTON','New');
DEFINE('_EX_INSERT','Insert');
 /************************************************
Menu text
*************************************************/
DEFINE('_MENU_HEADING','<b>Export Site Content</b>');
DEFINE('_MENU_IMPORT','Import Content');
DEFINE('_MENU_EXPORT','Export Site Content');
DEFINE('_MENU_SECTIONS','Insert Sections');
DEFINE('_MENU_CATEGORIES','Insert Categories');
DEFINE('_MENU_ITEMS','Insert Content Items');
DEFINE('_MENU_STATIC','Insert Static Content');
DEFINE('_MENU_HELP','This Page Help');
DEFINE('_MENU_HELP_TITLE','Click here for help on how to use this page.');
DEFINE('_MENU_EXHELP','Instructions');
DEFINE('_MENU_EXHELP_TITLE','A general how to instruction file');
DEFINE('_MENU_ABOUT','About Us');
DEFINE('_MENU_TRANS_HEADING','<b>Imported Content Menu</b>');
DEFINE('_MENU_SUPPORT_HEADING','<b>Support Menu</b>');
DEFINE('_MENU_EXPORT_STATIC','Export Static Items');
DEFINE('_MENU_ARCHIVES','Insert Archived items');
DEFINE('_SUPPORT_FORUM','Support Forums');
DEFINE('_VERSION','Check for updates');
DEFINE('_DONATE','Donate Now');
DEFINE('_TROUBLE_SHOOT_HEADING','Trouble Shooting Help');

 /*************************
About export content
***************************/
DEFINE('THIS_VERSION','This Version is');
DEFINE('_ABOUT_TEXT','
    <b>Project manager:</b>&nbsp;Stephen Harrison
  <BR/>
<BR/>
 <b><u>About The Program:</u></b>
 <BR/>
    This program is to make it easy to move content between Joomla sites without the need for any programming knowledge. And is free to the community. But all copyright statements must be kept. And all derivative work must duly acknowledge the original with any copyright statement and visible online links.
    <BR/>
    <BR/>
 If you have any suggestions on ways to improve this component or just need support please head over to the <a href="http://www.bestdownloadsites.com/export_content/component/option,com_fireboard/Itemid,13/" target="blank"><u>Support Forums</u></a>.');

 /*************************************************
Select save confirm messages
***************************************************/
DEFINE('_COPY_TO_SECTION_CATEGORY','Copy to Section/Category');
DEFINE('_COPY_TO_SECTION','Copy to Section');
DEFINE('_COPY_TO_CATEGORY','Categories being copied');
DEFINE('_COPY_TO_CONTENT','Content Items being copied');
DEFINE('_TRANSFER_SECTION_MSG','This will transfer the Section(s) listed and the categories, content items (also listed) contained within the sections(s).');
DEFINE('_TRANSFER_CATEGORIES_MSG','This will copy the Categories listed and all the items within the category (also listed) to the selected Section. ');
DEFINE('_TRANSFER_ITEMS_MSG','This will transfer all the content items listed to the section/category selected. ');
/*******************************
Tool tips
********************************/
DEFINE('_SECTION_COMPILE_EDIT','To edit this or any other settings here go to the site Section Manager.');
DEFINE('_STATIC_COMPILE_EDIT','To edit this or any other settings here go to the site Static Content Manager.');
DEFINE('_TROUBLE_SHOOT','Used For Trouble Shooting');
DEFINE('_ZIP_FILESIZE','The file size of all the content selected. Compiled into a downloadable component.<br><br><b>TIP:</b><br>If you are having trouble installing this data at the destination site try reducing the file size by compiling fewer sections or static items at a time.<br><br> <b>NOTE:</b><br>In some cases it may be necessary to compile one section or static item at a time until the static item(s), section(s), category(s) or content item(s) causing the error can be isolated.');
DEFINE('_XML_FILESIZE','The file size of all the content selected. Compiled into a component installation file.');
DEFINE('_XML_VIEW_FILE','View the compiled content component installation file.<br><br><b>NOTE:</b><br> Large files may be slow to load<br>');
/***************************************
Access levels 
****************************************/
DEFINE('_EX_PUBLIC','Public');
DEFINE('_EX_REGISTERED','Registered');
DEFINE('_EX_SPECIAL','Special');
/*************************************
Confirmation messages
*************************************/
DEFINE('_CONTENT_REMOVED','All compiled content has been removed');
DEFINE('_CONTENT_DOWNLOAD','You may now download your data via the download icon');
DEFINE('_SECT_APPLY','Changes to Section saved');
DEFINE('_SECT_SAVED','Section saved');
DEFINE('_INSERT_SECT_CANCEL','Insert of section(s) canceled');
DEFINE('_INSERT_CAT_CANCEL','Insert of categories canceled');
DEFINE('_CAT_APPLY','Changes to Category saved');
DEFINE('_CATEGORY_SAVED','Category saved');
DEFINE('_INSERT_ITEM_CANCEL','Insert of content item(s) canceled');
DEFINE('_INSERT_ARCH_CANCEL','Insert of archived item(s) canceled');
DEFINE('_STATIC_INSERTED','Static Item(s) successfully inserted');
DEFINE('_STATIC_SAVED','Static Content Item saved');
DEFINE('_STATIC_APPLY','Changes to static Content Item saved');
DEFINE('_EDIT_CANCELED','Edit canceled');
/****************************************
Compile confirm message
****************************************/
DEFINE('_COMPILE_CONFIRM_TXT','<h3>Please wait while your request is processed!</h3>');
/****************************************
Download page
*****************************************/
DEFINE('_DOWNLOAD_BUTTON','Download Compiled Content');
DEFINE('_DOWNLOAD_NEW','Download 1.5+ Data');
DEFINE('_VIEW_XML_FILE','View Compiled Content XML installation File');
DEFINE('_VIEW_SQL_FILE','View Compiled Content SQL installation File.');
DEFINE('_DOWNLOAD_NEW_DATA','for Joomla 1.5+');
DEFINE('_DOWNLOAD_OLD_DATA','for Joomla 1.0+');
DEFINE('_VIEW_CODE','<h5>Need Support? please save this file so it may be used for trouble shooting.</h5>');
DEFINE('_DOWNLOAD_NOTE','
To keep any critical data safe from being viewed or downloaded by anyone.<BR/>
It is strongly advised that you use the "Remove All" button when you are finished downloading your compiled content.<BR/><BR/><b>NOTE:</b> This will not affect any site content here at');
/**************************************
Imported data installation text
****************************************/
DEFINE('_XML_DESCRIPTION_TXT','<h2>All imported content has been installed successfully.</h2>
<p>You may safely remove this component as you would any other component via the site installer/uninstaller (look for <b><u>Imported Content</u></b> in the installed components list).
<BR/>
<BR/>
<b><u> NOTE:</u></b> This will not affect the imported content just installed and must be done before attempting to install any other new imported data.
<BR/>
<BR/>
For support go to <a href="http://www.bestdownloadsites.com/export" target="blank">Best Download Sites</a>.<p>');
 /******************************
popup help pages below here
********************************/
DEFINE('_HELP_TEXT','<blockquote>
<p> <span class="helptxt">
<h3><u>Export Content Instructions.</u></h3>
<b><u>STEP 1:</u></b><br>
<u>PLEASE BACKUP</u> any databases that you will be moving data between.
<br>
<br>
<b><u>STEP 2:</u></b><br>
Install <b>"Export Content"</b> on any sites you wish to move content between.
<br>
<br>
<b><u>STEP 3:</u></b><br>
Under the <b>"Export Content"</b> menu Choose either <b>Export Site Content</b> which will allow you to select content by section(s) or <b>Export Static Items</b> to compile static Content only.<br>
<br>
<b><u>STEP 4:</u></b><br>Using the select boxes choose the content you wish to export then press the <b>Compile</b> button either for Joomla 1.0+ or 1.5+ series depending on the destination site.<br>
<br>
<b><u>STEP 5:</u></b><br>Download the compiled content from the source site via the <b>Download</b> button that will appear at the top and install it at the destination site via the site component installer as you would any other component.<br>
<br>
<b><u>STEP 6:</u></b><br>
If you have taken the steps above you should see the options under the <b>Imported Content Menu</b> will be populated with the imported content on the destination site.
<br>
<br>
<b><u>STEP 7:</u></b><br>
Select how you would like to transfer the imported content into the destination site via the <b>Imported Content Menu</b> menu. Click the check box or boxes and then the <b>Insert</b> button at the top.
<br>
<br>
<b><u>STEP 8:</u></b><br>
You will then be given the option of which section or category on the destination site to move the content into and save.
<br>
<br>
<b><u>NOTE:</u></b> <br><span class="note">
When transferring "Static Content items" they will be transferred immediately upon clicking the <b>"Insert"</b> button as no section or category selection is required.
</span><br>
<br>
<b><u>STEP 9:</u></b><br>
Check the site admin menu under Content/Content by section and you should be able to see any new sections you have inserted or you may have to look under categories or content items depending on what action you
took.
<br>
<br>
<b><u>NOTE:</u></b><br> <span class="note">
It is only possible to store imported content from one site at a time. So any imported data will need to be removed each time before adding the next import. This is required to synchronize the new section, category and content items ID numbers. And will not affect the data that has already been transferred.</span>
<BR/>
<BR/>
Please remember to <u>BACKUP!</u>
<BR/><BR/>
For details on how to use any page please use the <b>"This Page Help"</b> link in the Support Menu menu to the left.
<BR/>
<BR/>
</p>
</blockquote>');
/************************************
Export data help popups
*************************************/
DEFINE('_EXPORT_NOTE','
<b>Step 1.</b> <BR/>Tick the boxes to select section(s) from this site to compile.
<BR/><BR/>
<b>Step 2.</b> <BR/>Choose whether to compile content for Joomla 10+ series or the new 1.5+ series via the <b>Compile</b> buttons.
<BR/><BR/>
<b>Step 3.</b><BR/>
All selected section(s) all categories and content items contained within the section(s) will be compiled into a downloadable component.
<BR/><BR/>
<b>Step 4.</b><BR/>
Download the compiled data via the <b>"Download"</b> button that will appear.
<BR/><BR/>
<b><u>NOTE:</u></b><BR/><BR/> If <b>"Add All Static Content Items"</b> is set to yes all static items will be compiled with any section(s) selected.
<BR/><BR/>
If <b>"Add Archived Content Items"</b> is set to yes all archived items in the section(s) selected will be added.
');
DEFINE('_EXPORT_STATIC_NOTE','<b>Step 1.</b> <BR/>Tick the boxes to select static item(s) from this site to compile.
<BR/><BR/>
<b>Step 2.</b> <BR/>Choose whether to compile content for Joomla 10+ series or the new 1.5+ series via the <b>compile</b> buttons.
<BR/><BR/><b>Step 3.</b><BR/>
All selected static items(s) will be compiled into a downloadable component.
<BR/><BR/>
<b>Step 4.</b><BR/>
Download the compiled data via the <b>"Download"</b> button that will appear.
<BR/><BR/>');
/****************************************
Import data help popups
****************************************/
DEFINE('_SECTIONS_NOTE','
<b>Step 1.</b>
<BR/>
Tick the boxes to select section(s) to transfer.<BR/><BR/>
<b>Step 2.</b>
<BR/>
Press the "INSERT" button.
<BR/><BR/>
<b>Step 3.</b>
<BR/>
You will be presented with a conformation page where all section(s), categories and content items contained within the selected section(s) will be listed ready to be transferred');

DEFINE('_CATEGORIES_NOTE','
<b>Step 1.</b> <BR/>Tick the boxes to select a category or categories.
<BR/><BR/>
<b>Step 2.</b> <BR/>Press the <b>"Insert"</b> button.
<BR/><BR/>
<b>Step 3.</b>
<BR/>
You will then be given the choice of which "Section" the category(s) selected and all "Content Items" contained within the category(s) will be transferred into');

DEFINE('_CONTENT_NOTE','
<b>Step 1.</b>
<BR/>
Tick the boxes to select content item(s) to transfer.<BR/><BR/>
<b>Step 2.</b>
<BR/>
Press the <b>"Insert"</b> button.
<BR/><BR/>
<b>Step 3.</b>
<BR/>
You will then be given the choice of which section/category that all content items selected will be transferred into.');

 DEFINE('_STATIC_WARN',' <span class="static_warn"> <b>Warning!</b> All Static content items selected will be transferred immediately upon clicking the "INSERT" button.');
 
DEFINE('_STATIC_NOTE','<b>So please choose carefully.</b>
 <BR/><BR/>
<b>Step 1.</b> <BR/>Tick the boxes to select static content item(s) to transfer.
<BR/><BR/>
<b>Step 2.</b> <BR/>Press the <b>"Insert"</b> button above.
<BR/><BR/>
');

DEFINE('_ADD_ARCHIVE_NOTE','<b> NOTE:</b> Archived items will be transferred to the section/category selected.');

DEFINE('_ARCHIVE_CONTENT_NOTE','
<b>Step 1.</b>
<BR/>
Tick the boxes to select archive item(s) to transfer.<BR/><BR/>
<b>Step 2.</b>
<BR/>
Press the "INSERT" button.
<BR/><BR/>
<b>Step 3.</b>
<BR/>
You will then be given the choice of which section/category under site "Archive Manger"
<BR/>
the archived content items selected will be transferred into<BR/><BR/>
<b>NOTE:</b> If you use the <b>"Unarchive"</b> feature the item(s) selected will be moved to the <b>"Insert Content Items"</b> area under the same sections and categories that the archive item(s) are in now.');

DEFINE('_DOWNLOAD_HELP','<h3>Download Help</h3>
<b>Step 1.</b>
<BR/>Use the <b>"Download button"</b> to Download the compiled data locally.<BR/><BR/>
<b>Step 2.</b>
<BR/>Head over to the destination site making sure the correct version of Export Content is set up.<BR/><BR/>
<b>Step 3.</b>
<BR/>Install the data  on the destination site as you would any other component.');
?>