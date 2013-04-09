<?php
/**
 * @version		$Id: controller.php 14401 2010-01-26 14:10:00Z louis $
 * @package		Joomla
 * @subpackage	MailTo
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant to the
 * GNU General Public License, and as distributed it includes or is derivative
 * of works licensed under the GNU General Public License or other free or open
 * source software licenses. See COPYRIGHT.php for copyright notices and
 * details.
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );

jimport('joomla.application.component.controller');

define('MAILTO_TIMEOUT', 20);

/**
 * @package		Joomla
 * @subpackage	MailTo
 */
class MailtoController extends JController
{

	/**
	 * Show the form so that the user can send the link to someone
	 *
	 * @access public
	 * @since 1.5
	 */
	function mailto()
	{
		$session =& JFactory::getSession();
		$session->set('com_mailto.formtime', time());
		JRequest::setVar( 'view', 'mailto' );
		$this->display();
	}

	/**
	 * Send the message and display a notice
	 *
	 * @access public
	 * @since 1.5
	 */
	function send()
	{
		global $mainframe;

		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );
		$session =& JFactory::getSession();
		$db	=& JFactory::getDBO();

		// we return time() instead of 0 (as it previously was), so that the session variable has to be set in order to send the mail
		$timeout = $session->get('com_mailto.formtime', time());
		if($timeout == 0 || time() - $timeout < MAILTO_TIMEOUT) {
			JError::raiseNotice( 500, JText:: _ ('EMAIL_NOT_SENT' ));
			return $this->mailto();
		}
		// here we unset the counter right away so that you have to wait again, and you have to visit mailto() first
		$session->set('com_mailto.formtime', null);

		jimport( 'joomla.mail.helper' );

		$SiteName 	= $mainframe->getCfg('sitename');
		$MailFrom 	= $mainframe->getCfg('mailfrom');
		$FromName 	= $mainframe->getCfg('fromname');

		$link 		= base64_decode( JRequest::getVar( 'link', '', 'post', 'base64' ) );

		// Verify that this is a local link
		if(!JURI::isInternal($link)) {
			//Non-local url...  
			JError::raiseNotice( 500, JText:: _ ('EMAIL_NOT_SENT' ));
			return $this->mailto();
		}

		// An array of e-mail headers we do not want to allow as input
		$headers = array (	'Content-Type:',
							'MIME-Version:',
							'Content-Transfer-Encoding:',
							'bcc:',
							'cc:');

		// An array of the input fields to scan for injected headers
		$fields = array ('mailto',
						 'sender',
						 'from',
						 'subject',
						 );

		/*
		 * Here is the meat and potatoes of the header injection test.  We
		 * iterate over the array of form input and check for header strings.
		 * If we find one, send an unauthorized header and die.
		 */
		foreach ($fields as $field)
		{
			foreach ($headers as $header)
			{
				if (strpos($_POST[$field], $header) !== false)
				{
					JError::raiseError(403, '');
				}
			}
		}

		/*
		 * Free up memory
		 */
		unset ($headers, $fields);

		$email 				= JRequest::getString('mailto', '', 'post');
		$sender 			= JRequest::getString('sender', '', 'post');
		$from 				= JRequest::getString('from', '', 'post');
		$subject_default 	= JText::sprintf('Item sent by', $sender);
		$subject 			= JRequest::getString('subject', $subject_default, 'post');

		// Check for a valid to address
		$error	= false;
		if ( ! $email  || ! JMailHelper::isEmailAddress($email) )
		{
			$error	= JText::sprintf('EMAIL_INVALID', $email);
			JError::raiseWarning(0, $error );
		}

		// Check for a valid from address
		if ( ! $from || ! JMailHelper::isEmailAddress($from) )
		{
			$error	= JText::sprintf('EMAIL_INVALID', $from);
			JError::raiseWarning(0, $error );
		}

		if ( $error )
		{
			return $this->mailto();
		}

		// Build the message to send
		$msg	= JText :: _('EMAIL_MSG');
		$body	= sprintf( $msg, $SiteName, $sender, $from, $link);

		// Clean the email data
		$subject = JMailHelper::cleanSubject($subject);
		$body	 = JMailHelper::cleanBody($body);
		$sender	 = JMailHelper::cleanAddress($sender);

		// Send the email
		if ( JUtility::sendMail($from, $sender, $email, $subject, $body) !== true )
		{
			JError::raiseNotice( 500, JText:: _ ('EMAIL_NOT_SENT' ));
			return $this->mailto();
		}

		JRequest::setVar( 'view', 'sent' );
		$this->display();
	}
}
