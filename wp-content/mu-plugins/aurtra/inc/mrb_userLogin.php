<?php
// Add link to login form for 'lost Passwords'
add_action( 'login_form_middle', 'add_lost_password_link' );
function add_lost_password_link() {
	return '<a href="'.site_url('/lost-password').'">Forgot Password?</a>';
}

// Redirect subscriber accounts out of admin and onto homepage
add_action('admin_init', 'redirectSubsToFrontend');
function redirectSubsToFrontend() {

	$ourCurrentUser = wp_get_current_user();
    if ((count($ourCurrentUser->roles)==1) AND !defined( 'DOING_AJAX' ) AND ($ourCurrentUser->roles[0]=='company_admin_role' or $ourCurrentUser->roles[0]=='company_user_role')) {
	wp_redirect(site_url('/member-devices/'));
		exit;
	}
}

// where should the form redirect to if the login attempt fails
add_action( 'wp_login_failed', 'client_login_fail' );  
function client_login_fail( $username ) {
    $referrer = $_SERVER['HTTP_REFERER'];  // where did the post submission come from?
    // if there's a valid referrer, and it's not the default log-in screen
        if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') ) {
            wp_redirect(home_url( '/login?login=failed' ));
        exit;
    }
}

// don't show the black admin bar at the top if logged in as company user
add_action('wp_loaded', 'noSubsAdminBar');
function noSubsAdminBar() {
  $ourCurrentUser = wp_get_current_user();
  if ((count($ourCurrentUser->roles)==1) AND ($ourCurrentUser->roles[0]=='company_admin_role' or $ourCurrentUser->roles[0]=='company_user_role')) {
    show_admin_bar(false);
  }
}

// Load a separate CSS for admin pages
add_action('login_enqueue_scripts', 'ourLoginCSS');
function ourLoginCSS() {
  wp_enqueue_style( 'mrb-admin-css', plugins_url( '../css/admin-aurtra.css', __FILE__ ) );
}


// Customize Login Screen
add_filter('login_headerurl', 'ourHeaderUrl');
function ourHeaderUrl() {
  return esc_url(site_url('/'));
}
add_filter('login_headertitle', 'ourLoginTitle');
function ourLoginTitle() {
  return get_bloginfo('name');
}


function bluelily_lost_password_redirect() {
    // Check if have submitted 
    $confirm = ( isset($_GET['checkemail'] ) ? $_GET['checkemail'] : '' );
    if( $confirm ) {
        wp_redirect( home_url('lost-password-redirect') ); 
        exit;
    }
}
add_action('login_headerurl', 'bluelily_lost_password_redirect');

function bluelily_reset_password_redirect() {
    wp_redirect( home_url('login') ); 
    exit;
}
add_action('after_password_reset', 'bluelily_reset_password_redirect');
