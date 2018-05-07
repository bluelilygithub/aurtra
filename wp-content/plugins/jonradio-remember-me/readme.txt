=== Remember Me ===
Contributors: dgewirtz
Donate link: http://zatzlabs.com/lab-notes/
Tags: remember me, remember, login, login form, cookies, cookie, password, auth, authentication
Requires at least: 3.6
Tested up to: 4.6
Stable tag: 2.1.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Control whether Remember Me is selected on the WordPress Login Form, without using any JavaScript.

== Description ==

**IMPORTANT: Support has moved to the ZATZLabs site and is no longer provided on the WordPress.org forums. Please visit the new [ZATZLabs Forums](http://zatzlabs.com/forums/). If you need a timely reply from the developer, please [open a ticket](http://zatzlabs.com/submit-ticket/).**

Allows the Administrator and/or the User to control the placement of a check mark in the Remember Me checkbox on the standard WordPress login form.

Without a check mark in the Remember Me checkbox, your users will have to login every time they close their browser.  With Remember Me selected, they won't have to login again for two weeks.

Settings allow:

* The Administrator to control whether Remember Me is the default for all logins, logins from Admin panels or logins from public web pages controlled by jonradio Private Site or equivalent plugin
* The Administrator to control if the User's Remember Me choice is remembered and, if so, for how long
* Disabling of the plugin's control of the Remember Me checkbox

There are other plugins that make Remember Me the default, but I wrote this plugin because I wanted a solution that did not require JavaScript, which was the solution used by every other plugin that I could find.  This plugin uses a documented standard WordPress Action ("hook") and a Post variable used by WordPress just for this purpose, i.e. - straight PHP with no JavaScript.

Deciding whether this plugin is for you:

* WordPress always leaves the Remember Me checkbox empty, even if you selected it the last time you logged on;
* Without Remember Me checked, logoff occurs automatically when the browser is closed or two days have passed;
* Without Remember Me checked, some browsers will force a login when opening a new browser window;
* With Remember Me checked, logoff occurs automatically in two weeks;
* With Remember Me checked, the user remains logged in even if the browser is closed, the user's computer is rebooted or the web site hosting server is rebooted;
* Web sites that can only be viewed by registered users (e.g. - [jonradio Private Site plugin](http://wordpress.org/plugins/jonradio-private-site/ "jonradio Private Site")) are more likely to want Remember Me pre-selected for each user at login, as web site viewing will be more frequently repeated than WordPress Administration;
* For public or shared computers, the WordPress behaviour of leaving the Remember Me checkbox empty is a slight Security improvement, but is easily defeated by a user selecting Remember Me during login, which still leaves subsequent users logged on.

> <strong>Adoption Notice</strong><br>
> This plugin was recently adopted by David Gewirtz and ongoing support and updates will continue. Feel free to visit [David's Lab Notes](http://zatzlabs.com/lab-notes/) for additional details and to sign up for emailed news updates.

Special thanks to Jon 'jonradio' Pearkins for creating the plugin and making adoption possible.

== Installation ==

**IMPORTANT: Support has moved to the ZATZLabs site and is no longer provided on the WordPress.org forums. Please visit the new [ZATZLabs Forums](http://zatzlabs.com/forums/). If you need a timely reply from the developer, please [open a ticket](http://zatzlabs.com/submit-ticket/).**

This section describes how to install the *jonradio Remember Me* plugin and get it working.

1. Use **Add Plugin** within the WordPress Admin panel to download and install this *jonradio Remember Me* plugin from the WordPress.org plugin repository (preferred method).  Or download and unzip this plugin, then upload the `/jonradio-remember-me/` directory to your WordPress web site's `/wp-content/plugins/` directory.
1. Activate the *jonradio Remember Me* plugin through the **Installed Plugins** Admin panel in WordPress.  If you have a WordPress Network ("Multisite"), you can either **Network Activate** this plugin through the **Installed Plugins** Network Admin panel, or Activate it individually on the sites where you wish to use it.  Activating on individual sites within a Network avoids some of the confusion created by WordPress' hiding of Network Activated plugins on the Plugin menu of individual sites.  Alternatively, to avoid this confusion, you can install the *jonradio Reveal Network Activated Plugins* plugin.
1. Review the Settings page.

== Frequently Asked Questions ==

**IMPORTANT: Support has moved to the ZATZLabs site and is no longer provided on the WordPress.org forums. Please visit the new [ZATZLabs Forums](http://zatzlabs.com/forums/). If you need a timely reply from the developer, please [open a ticket](http://zatzlabs.com/submit-ticket/).**

= Will this plugin work with other Login forms? =

It depends on whether the *other* Login form provides two standard technical features of the WordPress Login form generated by wp-login.php:

1. The "login_form_login" Action; and
1. The "rememberme" Post field.

Both are used by this plugin.

= How much Security am I sacrificing by using this plugin? =

It was a conscious security decision by WordPress developers to always present the standard WordPress Login form with the Remember Me checkbox empty.

On the other hand, savvy users quickly got into the habit of being sure the Remember Me checkbox was selected every time they logged on. There is a similar risk in office environments where a person steps away from their office computer without *locking it* in the sense of requiring a password be typed to gain access.

The security risk is very dependent on how many registered users will login using a public or other shared computer that does not have an effective mechanism built in for automatically deleting auth cookies when one person finishes and the next begins.  There is a similar risk in office environments where a person steps away from their office computer without *locking it* in the sense of requiring a password be typed to gain access.

Of course, the most important security question to ask is: 	What level of risk do other people using the same computer as a registered user pose?

== Changelog ==

= 2.1.1 =
Minor support update

= 2.1 =
* Correct Login "bizarre behaviour" bug caused by not returning the WP Error object to Filter 'wp_login_errors'

= 2.0 =
* Add Settings to disable the plugin, set the Remember Me default, and remember User's Remember Me choice

= 1.0 =
* Prepare to WordPress Plugin Directory standards.

== Upgrade Notice ==

= 2.1 =
Stops disruption of the Login process

= 2.0 =
Add Settings Page for more control

= 1.0 =
Production version, updated to meet WordPress Repository standards