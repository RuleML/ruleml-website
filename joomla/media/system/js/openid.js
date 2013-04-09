/**
* @version		$Id: modal.js 5263 2006-10-02 01:25:24Z webImagery $
* @copyright	Copyright (C) 2005 - 2010 Open Source Matters. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

/**
 * JOpenID javascript behavior
 *
 * Used for switching between normal and openid login forms
 *
 * @package		Joomla
 * @since		1.5
 * @version     1.0
 */
var JOpenID = new Class({

	state    : false,
	link     : null,
	switcher : null,

	initialize: function()
	{
		//Create dynamic elements
		var switcher = new Element('a', { 'styles': {'cursor': 'pointer'},'id': 'openid-link'});
		switcher.inject($('form-login'));

		var link = new Element('a', { 'styles': {'text-align' : 'right', 'display' : 'block', 'font-size' : 'xx-small'}, 'href' : 'http://openid.net'});
		link.inject($('form-login'));

		//Initialise members
		this.switcher = switcher;
		this.link     = link;
		this.state    = Cookie.get('login-openid');
		this.length   = $('form-login-password').getSize().size.y;

		this.switchID(this.state, 0);

		this.switcher.addEvent('click', (function(event) {
			this.state = this.state ^ 1;
			this.switchID(this.state, 300);
			Cookie.set('login-openid', this.state);
		}).bind(this));
	},

	switchID : function(state, time)
	{
		var password = $('form-login-password');
		var username = $('modlgn_username');

		if(state == 0)
		{
			username.removeClass('system-openid');
			var text = JLanguage.LOGIN_WITH_OPENID;
			password.effect('height',  {duration: time}).start(0, this.length);
		}
		else
		{
			username.addClass('system-openid');
			var text = JLanguage.NORMAL_LOGIN;
			password.effect('height',  {duration: time}).start(this.length, 0);
		}

		password.effect('opacity', {duration: time}).start(state,1-state);

		this.switcher.setHTML(text);
		this.link.setHTML(JLanguage.WHAT_IS_OPENID);
	}
});

var JOpenID_com = new Class({

	state    : false,
	link     : null,
	switcher : null,

	initialize: function()
	{
		//Create dynamic elements
		var switcher = new Element('a', { 'styles': {'cursor': 'pointer'},'id': 'com-openid-link'});
		switcher.inject($('com-form-login'));

		var link = new Element('a', { 'styles': {'text-align' : 'right', 'display' : 'block', 'font-size' : 'xx-small'}, 'href' : 'http://openid.net'});
		link.inject($('com-form-login'));

		//Initialise members
		this.switcher = switcher;
		this.link     = link;
		this.state    = Cookie.get('login-openid');
		this.length   = $('com-form-login-password').getSize().size.y;

		this.switchID(this.state, 0);

		this.switcher.addEvent('click', (function(event) {
			this.state = this.state ^ 1;
			this.switchID(this.state, 300);
			Cookie.set('login-openid', this.state);
		}).bind(this));
	},

	switchID : function(state, time)
	{
		var password = $('com-form-login-password');
		var username = $('username');

		if(state == 0)
		{
			username.removeClass('com-system-openid');
			var text = JLanguage.LOGIN_WITH_OPENID;
			password.effect('height',  {duration: time}).start(0, this.length);
		}
		else
		{
			username.addClass('com-system-openid');
			var text = JLanguage.NORMAL_LOGIN;
			password.effect('height',  {duration: time}).start(this.length, 0);
		}

		password.effect('opacity', {duration: time}).start(state,1-state);

		this.switcher.setHTML(text);
		this.link.setHTML(JLanguage.WHAT_IS_OPENID);
	}
});


document.openid = null
document.com_openid = null
window.addEvent('domready', function(){
  if (typeof modlogin != 'undefined' && modlogin == 1) {
  	var openid = new JOpenID();
  	document.openid = openid;
  };
  if (typeof comlogin != 'undefined' && comlogin == 1) {
  	var com_openid = new JOpenID_com();
  	document.com_openid = openid;
  };
});
