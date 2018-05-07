<?php
/*
	Initiated when in the Admin panels.
	Used to create the Settings page for the plugin.
*/

//	Exit if .php file accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

add_action( 'admin_menu', 'jr_rm_admin_hook' );
//	Runs just before admin_init (below)

/**
 * Add Admin Menu item for plugin
 * 
 * Plugin needs its own Page in the Settings section of the Admin menu.
 *
 */
function jr_rm_admin_hook() {
	//  Add Settings Page for this Plugin
	global $jr_rm_plugin_data;
	add_users_page( $jr_rm_plugin_data['Name'], 'Remember Me', 'add_users', 'jr_rm_settings', 'jr_rm_settings_page' );
	add_options_page( $jr_rm_plugin_data['Name'], 'Remember Me', 'manage_options', 'jr_rm_settings', 'jr_rm_settings_page' );
}

/**
 * Settings page for plugin
 * 
 * Display and Process Settings page for this plugin.
 *
 */
function jr_rm_settings_page() {
	global $jr_rm_plugin_data;
	add_thickbox();
	echo '<div class="wrap">';
	screen_icon( 'plugins' );
	echo '<h2>' . $jr_rm_plugin_data['Name'] . '</h2>';
	
	//	Required because it is only called automatically for Admin Pages in the Settings section
	settings_errors( 'jr_rm_settings' );

	?>
	<p>
	Support has moved to the ZATZLabs site and is no longer provided on the WordPress.org forums. Please visit the new <A HREF=“http://zatzlabs.com/forums/“>ZATZLab Forums</a>. If you need a timely reply from the developer, please <a href=“http://zatzlabs.com/submit-ticket/“>open a ticket</a>.
	</p>
	<h3>
	Overview
	</h3>
	<p>
	The <b>Remember Me</b> checkbox
	on the standard WordPress Login form
	changes how, and how long, that
	WordPress keeps a user logged in.
	
	If the user selects Remember Me
	and a checkmark is displayed in the checkbox,
	the user can stay logged into WordPress for two weeks,
	even if the browser is closed during that period.
	
	Without that checkmark,
	the user is logged off after two days
	or whenever the browser is closed,
	whichever happens first.
	
	Of course, the user can still Logoff at any time
	by clicking a Logoff link or selecting Logoff from a menu.
	The WordPress default to is leave the
	Remember Me checkbox empty
	every time the Login form is displayed.
	</p>
	<p>
	<?php
	
	$settings = get_option( 'jr_rm_settings' );
	if ( $settings['disable'] ) {
		echo 'If you empty the <b>Disable</b> checkbox in the Disable This Plugin section just below, this';
	} else {
		echo 'This';
	}
	?>		
	Plugin 
	can be used to change that WordPress default
	of leaving the 
	Remember Me checkbox empty
	every time the Login form is displayed.
	
	Such a change
	can be used to reduce the number of times that
	you and your site's registered users
	are distracted by a WordPress Login form
	and asked to
	enter a Username and Password,
	and hit the Login button to
	login to this site.
	</p>
	<p>
	Setting the default to Remember Me
	overcomes a major annoyance factor for web sites
	that can only be viewed by users who are logged in,
	because users tend to visit a web site more frequently 
	than Administrators access Admin panels.
	
	In fact,
	this plugin came about from a request by an Administrator
	using the 
	<a href="http://wordpress.org/plugins/jonradio-private-site/">jonradio Private Site plugin</a>.
	</p>

	<form action="options.php" method="POST">
	<?php		
	//	Plugin Settings are displayed and entered here:
	settings_fields( 'jr_rm_settings' );
	do_settings_sections( 'jr_rm_settings_page' );
	?>	
	<p>
	Selecting
	<b>
	Remember User Choice
	</b>
	gives each User the ability to
	override the default Remember Me selected in the previous setting.
	
	The 
	<b>
	how long?
	</b>
	value determines the maximum amount of time, in days, that 
	the User's Remember Me choice will be
	saved between Logins.

	Each user's choice is
	<i>
	remembered
	</i>
	in a Cookie stored by the browser on the User's computer
	for the period of time specified.
	
	For example, if the 
	<i>
	how long
	</i>
	value is
	set to
	<code>28</code>,
	each user will have their Remember Me choice automatically preset
	forever if that user:
	<ol>
	<li>
	logs in at least once every four weeks (<code>28</code> days)
	</li>
	<li>
	from the same computer (client workstation, not web server),
	</li>
	<li>
	using the same account (if the operating system uses User Name or other facilities to separate each user's files on the computer),
	</li>
	<li>
	using the same Internet browser, 
	assuming that a Remove All Cookies operation has not been performed using either
	the browser's built-in commands
	or by separate security software.
	</li>
	</ol>	
	If several users share the same computer, account and browser,
	each user will inherit the choice
	of the last user who logged in.	
	</p>
	<p>
	</p>
	If both a Default and Remember User Choice are selected,
	the User's last Choice will be used,
	if the Cookie can be found.
	<p>
	<input name="save" type="submit" value="Save Changes" class="button-primary" />
	</p>
	</form>
	<hr />
	<h3>
	Security
	</h3>
	<p>
	It was a conscious security decision by WordPress developers 
	to always present the standard WordPress Login form 
	with the Remember Me checkbox empty.
	</p>
	<p>
	On the other hand, 
	savvy users quickly got into the habit 
	of being sure the Remember Me checkbox 
	was selected every time they logged on.
	</p>
	<p>
	The security risk is very dependent 
	on how many registered users will login 
	using a public or other shared computer 
	that does not have an effective mechanism built in 
	for automatically deleting auth cookies when 
	one person finishes and the next begins.
	
	There is a similar risk in office environments
	where a person steps away from their office computer
	without
	<i>
	locking it 
	</i>
	in the sense of requiring a password be typed to gain access.
	</p>
	<p>
	Of course, the most important security question to ask is: 
	What level of risk do other people 
	using the same computer as a registered user pose?
	</p>
	<?php
}

add_action( 'admin_init', 'jr_rm_admin_init' );

/**
 * Register and define the settings
 * 
 * Everything to be stored and/or can be set by the user
 *
 */
function jr_rm_admin_init() {
	register_setting( 'jr_rm_settings', 'jr_rm_settings', 'jr_rm_validate_settings' );
	add_settings_section( 'jr_rm_disable_section', 
		'Disable This Plugin', 
		'jr_rm_disable_expl', 
		'jr_rm_settings_page' 
	);
	add_settings_field( 'disable', 
		'Disable', 
		'jr_rm_echo_disable', 
		'jr_rm_settings_page', 
		'jr_rm_disable_section' 
	);
	add_settings_section( 'jr_rm_remember_section', 
		'Keep Users Logged In', 
		'jr_rm_remember_me_expl', 
		'jr_rm_settings_page' 
	);
	add_settings_field( 'remember_me', 
		'Set <b>Remember Me</b> as Default?', 
		'jr_rm_echo_remember_me', 
		'jr_rm_settings_page', 
		'jr_rm_remember_section' 
	);
	add_settings_field( 'remember_choice', 
		'Remember User Choice', 
		'jr_rm_echo_remember_choice', 
		'jr_rm_settings_page', 
		'jr_rm_remember_section' 
	);
	add_settings_field( 'remember_choice_days', 
		'...for how long?', 
		'jr_rm_echo_remember_choice_days', 
		'jr_rm_settings_page', 
		'jr_rm_remember_section' 
	);
}

/**
 * Section text for Section1
 * 
 * Display an explanation of this Section
 *
 */
function jr_rm_disable_expl() {
	?>
	<p>
	This plugin only functions if the Disable checkbox is <b>empty</b>.
	This checkbox allows you to disable the plugin's
	control of the Remember Me checkbox
	on the standard WordPress Login form
	without deactivating the Plugin.
	</p>
	<?php
}

function jr_rm_echo_disable() {
	$settings = get_option( 'jr_rm_settings' );
	echo '<input type="checkbox" id="disable" name="jr_rm_settings[disable]" value="true"'
		. checked( TRUE, $settings['disable'], FALSE ) . ' />';
}

/**
 * Section text for Section2
 * 
 * Display an explanation of this Section
 *
 */
function jr_rm_remember_me_expl() {
	?>
	<p>
	The <b>Remember Me</b> setting
	on the standard WordPress Login form
	can be controlled by this plugin in a number of different ways
	as indicated by the two settings below.
	</p>
	<p>
	
	</p>
	<?php
}

/**
 * Remember Me
 * 
 * Create HTML for the Remember Me field.
 * Values:
 *	no - never pre-fill the Remember Me checkbox; just let WordPress always leave the checkbox empty,
 *		or use the Remember Choice option
 *	public - only pre-fill the Remember Me checkbox for Logins forced for public web sites page, not Admin
 *	all - always pre-fill the Remember Me checkbox for all Logins
 *	admin - only pre-fill the Remember Me checkbox for Logins to Admin panels, but not when Logins are forced for public web sites page
 *
 */
function jr_rm_echo_remember_me() {
	$settings = get_option( 'jr_rm_settings' );
	foreach ( array(
		'all'    => 'For <b>all</b> logins',
		'public' => 'For logins from <b>public</b> web site only, not for Admin panels',
		'admin'  => 'For logins from <b>Admin</b> panels only, not for public web site',
		'no'     => '<b>No Default</b>: either use Remember User Choice (below) or use the WordPress default (empty Remember Me checkbox)'
		) as $value => $description ) {
		echo '<input type="radio" id="remember_me" name="jr_rm_settings[remember_me]" '
			. checked( $value, $settings['remember_me'], FALSE )
			. ' value="' . $value . '" '
			. ' />&nbsp; ' . $description . '<br />';
	}
}

function jr_rm_echo_remember_choice() {
	$settings = get_option( 'jr_rm_settings' );
	echo '<input type="checkbox" id="remember_choice" name="jr_rm_settings[remember_choice]" value="true"'
		. checked( TRUE, $settings['remember_choice'], FALSE ) . ' />';
}

function jr_rm_echo_remember_choice_days() {
	$settings = get_option( 'jr_rm_settings' );
	echo '<input type="text" id="remember_choice_days" name="jr_rm_settings[remember_choice_days]" value="'
		. $settings['remember_choice_days']
		. '" size="4" maxlength="8" /> days';
}

function jr_rm_validate_settings( $input ) {
	$valid = array();
	$settings = get_option( 'jr_rm_settings' );
	
	if ( isset( $input['disable'] ) && ( $input['disable'] === 'true' ) ) {
		$valid['disable'] = TRUE;
	} else {
		$valid['disable'] = FALSE;
	}
	
	$valid['remember_me'] = $input['remember_me'];

	if ( isset( $input['remember_choice'] ) && ( $input['remember_choice'] === 'true' ) ) {
		$valid['remember_choice'] = TRUE;
	} else {
		$valid['remember_choice'] = FALSE;
	}
	
	/*	Restore old value if validation fails
	*/
	$valid['remember_choice_days'] = $settings['remember_choice_days'];
	if ( is_numeric( $input['remember_choice_days'] ) ) {
		if ( $input['remember_choice_days'] > 0 ) {
			if ( $input['remember_choice_days'] <= 3660 ) {
				$valid['remember_choice_days'] = $input['remember_choice_days'];
			} else {
				add_settings_error(
					'jr_rm_settings',
					'jr_rm_daystoobig',
					'Days to Remember must be 10 years or less; ' . $input['remember_choice_days'] . ' days were specified.',
					'error'
				);
			}
		} else {
			add_settings_error(
				'jr_rm_settings',
				'jr_rm_daystoosmall',
				'Days to Remember must be more than zero; "' . $input['remember_choice_days'] . '" was specified.',
				'error'
			);
		}
	} else {
		add_settings_error(
			'jr_rm_settings',
			'jr_rm_daysnotnumeric',
			'Days to Remember must be a Number; "' . $input['remember_choice_days'] . '" was specified.',
			'error'
		);
	}
	
	$errors = get_settings_errors();
	if ( empty( $errors ) ) {
		add_settings_error(
			'jr_rm_settings',
			'jr_rm_saved',
			'Settings Saved',
			'updated'
		);	
	}	
	
	return $valid;
}

/*	Add Link to the plugin's entry on the Admin "Plugins" Page, for easy access
*/
add_filter( 'plugin_action_links_' . jr_rm_plugin_basename(), 'jr_rm_plugin_action_links', 10, 1 );
	
/**
* Creates Settings entry right on the Plugins Page entry.
*
* Helps the user understand where to go immediately upon Activation of the Plugin
* by creating entries on the Plugins page, right beside Deactivate and Edit.
*
* @param	array	$links	Existing links for our Plugin, supplied by WordPress
* @param	string	$file	Name of Plugin currently being processed
* @return	string	$links	Updated set of links for our Plugin
*/
function jr_rm_plugin_action_links( $links ) {
	/*	Add "Settings" to the end of existing Links
		The "page=" query string value must be equal to the slug
		of the Settings admin page.
	*/
	array_push( $links, '<a href="' . get_bloginfo('wpurl') . '/wp-admin/admin.php?page=jr_rm_settings' . '">Settings</a>' );
	return $links;
}
	
?>