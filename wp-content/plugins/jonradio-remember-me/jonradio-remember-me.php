<?php
/*
Plugin Name: Remember Me
Plugin URI: http://zatzlabs.com/plugins/
Description: Set default to Remember Me on WordPress Login Form to avoid re-login after browser close. Without using JavaScript.
Version: 2.1.1
Author: David Gewirtz
Author URI: http://zatzlabs.com/plugins/
License: GPLv2
*/

/*  Copyright 2013  jonradio  (email : info@zatz.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/*	Exit if .php file accessed directly
*/
if ( !defined( 'ABSPATH' ) ) exit;

global $jr_rm_plugin_basename;
$jr_rm_plugin_basename = plugin_basename( __FILE__ );
/**
 * Return Plugin's Basename
 * 
 * For this plugin, it would be:
 *	jonradio-multiple-themes/jonradio-multiple-themes.php
 *
 */
function jr_rm_plugin_basename() {
	global $jr_rm_plugin_basename;
	return $jr_rm_plugin_basename;
}

if ( !function_exists( 'get_plugin_data' ) ) {
	require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

global $jr_rm_plugin_data;
$jr_rm_plugin_data = get_plugin_data( __FILE__ );
$jr_rm_plugin_data['slug'] = basename( dirname( __FILE__ ) );

/*	Detect initial activation or a change in plugin's Version number

	Sometimes special processing is required when the plugin is updated to a new version of the plugin.
	Also used in place of standard activation and new site creation exits provided by WordPress.
	Once that is complete, update the Version number in the plugin's Network-wide settings.
*/

if ( ( FALSE === ( $internal_settings = get_option( 'jr_rm_internal_settings' ) ) ) 
	|| empty( $internal_settings['version'] ) )
	{
	/*	Plugin is either:
		- updated from a version so old that Version was not yet stored in the plugin's settings, or
		- first use after install:
			- first time ever installed, or
			- installed previously and properly uninstalled (data deleted)
	*/

	$old_version = '0.1';
} else {
	$old_version = $internal_settings['version'];
}

$settings = get_option( 'jr_rm_settings' );
if ( empty( $settings ) ) {
	$settings = array(
		'disable'              => FALSE,
		'remember_me'          => 'no',
		'remember_choice'      => FALSE,
		'remember_choice_days' => 366
	);
	/*	Add if Settings don't exist, re-initialize if they were empty.
	*/
	update_option( 'jr_rm_settings', $settings );
	/*	New install on this site, old version or corrupt settings
	*/
	$old_version = $jr_rm_plugin_data['Version'];
}

if ( version_compare( $old_version, $jr_rm_plugin_data['Version'], '!=' ) ) {
	/*	Create, if internal settings do not exist; update if they do exist
	*/
	$internal_settings['version'] = $jr_rm_plugin_data['Version'];
	update_option( 'jr_rm_internal_settings', $internal_settings );

	/*	Handle all Settings changes made in old plugin versions
	*/
	/*	None yet.
	update_option( 'jr_rm_settings', $settings );
	*/
}

/*	Be sure plugin is not disabled
	with the checkbox on the plugin's Settings panel
*/
if ( ! ( $stop_actions = $settings['disable'] ) ) {
	/*	Plugin Settings - check if Remember Choice (user's last Remember Me choice)
		was selected on Settings panel
	*/
	if ( $settings['remember_choice'] ) {
		/*	Does the Cookie that remember's the User's Remember Me choice
			exist on the user's computer?
			empty() goes a step further and also checks if 
			the Cookie exists with a zero length string value
			as would be the case if the Deletion code was used
			but browser had not deleted the Cookie yet.
			Note - empty() returns FALSE if an array element
			does not exist, but generates no error, even with
			every debug feature turned on.
		*/
		if ( !empty( $_COOKIE['jr_rm_remember_choice'] ) ) {
			/*	Set Remember Me checkbox on WordPress login form
				based on what user last chose,
				as remembered in a cookie on user's computer.
			*/
			add_filter( 'wp_login_errors', 'jr_rm_remember_me', 10, 2 );
			/*	Two parameters are not used, but must be specified for this Filter */
			function jr_rm_remember_me( $errors, $redirect_to ) {
				if ( 'checked' == $_COOKIE['jr_rm_remember_choice'] ) {
					$_POST['rememberme'] = 'remember';
				} else {
					unset( $_POST['rememberme'] );
				}
				return $errors;
			}
			/*	Everything necessary has already been done,
				other than storing/updating the Cookie,
				except if we are displaying the Plugin's Settings panel,
				so pretend the plugin is disabled.
			*/
			$stop_actions = TRUE;			
		}
		/*	If Remember User Choice Setting specified,
		store the way Remember Me checkbox was marked
		as a cookie in this browser on this user computer,
		and on this user ID if user computer operating system supports user ID/names.
		*/
		add_action( 'wp_login', 'jr_rm_remember_choice', 10, 2 );
		/*	Two parameters are not used, but must be specified for this Action */
		function jr_rm_remember_choice( $user_login, $user ) {
			/*	Check first to be sure we are coming from a WordPress Login form,
				not some automated login process.
			*/
			if ( ! empty( $_POST['log'] ) ) {
				if ( empty( $_POST['rememberme'] ) ) {
					$remember_me = 'notchecked';
				} else {
					$remember_me = 'checked';
				}
				$settings = get_option( 'jr_rm_settings' );
				setcookie( 'jr_rm_remember_choice', $remember_me, time() + ( $settings['remember_choice_days'] * 24 * 60 * 60 ), SITECOOKIEPATH, COOKIE_DOMAIN );
			}
		}
	} else {
		if ( isset( $_COOKIE['jr_rm_remember_choice'] ) ) {
			/*	Delete the Remember Me Choice Cookie,
				even a previous attempt to Delete was made,
				i.e. - even if a zero length string was found.
			*/
			setcookie( 'jr_rm_remember_choice', '', time() - YEAR_IN_SECONDS, SITECOOKIEPATH, COOKIE_DOMAIN );
		}
	}
}

if ( !$stop_actions ) {
	/*	Alternate definition of this function (see above)
		that will be used for all settings of 'remember_me',
		except 'none', so define it here.
	*/
	/*	Two parameters are not used, but must be specified for this Filter */
	function jr_rm_remember_me( $errors, $redirect_to ) {
		if ( empty( $_POST['rememberme'] ) ) {
			$_POST['rememberme'] = 'remember';
		}
		return $errors;
	}
	
	if ( 'all' === $settings['remember_me'] ) {
		add_filter( 'wp_login_errors', 'jr_rm_remember_me', 10, 2 );
	}
}

if ( is_admin() ) {
	if ( !$stop_actions && ( 'admin' === $settings['remember_me'] ) ) {
		add_filter( 'wp_login_errors', 'jr_rm_remember_me', 10, 2 );
	}
	/*	Regular (non-Network) Admin pages
		Settings page for Plugin
	*/
	require_once( plugin_dir_path( __FILE__ ) . 'includes/admin.php' );
} else {
	/*	Public WordPress content, i.e. - not Admin pages
	*/
	if ( !$stop_actions && ( 'public' === $settings['remember_me'] ) ) {
		add_filter( 'wp_login_errors', 'jr_rm_remember_me', 10, 2 );
	}
}

?>