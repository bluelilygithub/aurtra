<?php

function mrb_remove_dashboard_widgets() {
              remove_meta_box( 'dashboard_right_now', 'dashboard','normal');
}
add_action( 'wp_dashboard_setup', 'mrb_remove_dashboard_widgets' );

function mrb_add_topmenu_item() {
             global $wp_admin_bar;
            $args=array(
                'id' =>'bluelilywebsite',
                'title'=>'Bluelily Website', 
                'href'=>'https://www.bluelily.com.au'
                ); 
                $wp_admin_bar->add_menu( $args);
}
add_action( 'wp_before_admin_bar_render', 'mrb_add_topmenu_item' );



/*--------------------------------------------------------------------------------*/
// Remove top level and sub menu admin menus
function remove_admin_menus() {
	$user = wp_get_current_user();
	if ( in_array( 'aurtra_admin', (array) $user->roles ) ) {
// Menu
		remove_menu_page( 'edit.php' ); // Posts 
		remove_menu_page( 'edit-comments.php' ); // Comments
        remove_menu_page( 'themes.php'); // Appearance	
		remove_menu_page( 'plugins.php'); // Plugins  
		remove_menu_page( 'options-general.php'); // Settings	
		remove_menu_page( 'tools.php'); // Settings	
// CTP		
		remove_menu_page( 'edit.php?post_type=page_sections'); 
		remove_menu_page( 'edit.php?post_type=page_icon_section'); 	
		remove_menu_page( 'edit.php?post_type=homepage_slider'); 
		remove_menu_page( 'edit.php?post_type=company'); 
		remove_menu_page( 'edit.php?post_type=device'); 
		remove_menu_page( 'edit.php?post_type=article'); 	
		remove_menu_page( 'edit.php?post_type=frequent_questions'); 
		remove_menu_page( 'edit.php?post_type=partners'); 
		remove_menu_page( 'edit.php?post_type=personnel_list'); 	
		remove_menu_page( 'edit.php?post_type=default_values'); 
		remove_menu_page( 'edit.php?post_type=email_templates');		
}
}
add_action( 'admin_menu', 'remove_admin_menus' );

/*--------------------------------------------------------------------------------*/
// RENAME top level and sub menu admin menus
	function rename_menu_items() { 	
	$user = wp_get_current_user();
	if ( in_array( 'aurtra_admin', (array) $user->roles ) ) {
		global $menu;	
		global $submenu; 
		$menu[5][0] = 'Page Content';		
		$submenu['edit.php?post_type=page'][5][0] = 'Manage Page Content';
	}}
add_action( 'admin_init', 'rename_menu_items' );

/*---------------------------------------------------------------------------------*/
// submenu item to top level menu 
function new_menu_items() { 
	$user = wp_get_current_user();
	if ( in_array( 'aurtra_admin', (array) $user->roles ) ) {
	add_menu_page('Aurtra','Aurtra','manage_options','Aurtra', '', 'dashicons-desktop');
	add_submenu_page('Aurtra', 'Company', 'Company', 'manage_options', 'edit.php?post_type=company'); 
	add_submenu_page('Aurtra', 'Devices', 'Devices', 'manage_options', 'edit.php?post_type=devices'); 
	
	add_menu_page('Site Elements','Site Elements','manage_options','Elements', '', 'dashicons-desktop');
	add_submenu_page('Elements', 'Articles', 'Articles', 'manage_options', 'edit.php?post_type=article'); 
	add_submenu_page('Elements', 'FAQs', 'FAQs', 'manage_options', 'edit.php?post_type=frequent_questions'); 
	add_submenu_page('Elements', 'Partners', 'Partners', 'manage_options', 'edit.php?post_type=partners'); 
	add_submenu_page('Elements', 'Staff', 'Staff', 'manage_options', 'edit.php?post_type=personnel_list'); 
	add_submenu_page('Elements', 'Defaults', 'Defaults', 'manage_options', 'edit.php?post_type=default_values'); 
	}
}
add_action( 'admin_init', 'new_menu_items' );

/*---------------------------------------------------------------------------------*/

// Remove sub level admin menus
function remove_admin_submenus() {
	$user = wp_get_current_user();
	if ( in_array( 'aurtra_admin', (array) $user->roles ) ) {
	remove_submenu_page( 'edit.php?post_type=page', 'post-new.php?post_type=page' );
	remove_submenu_page( 'Aurtra', 'Aurtra' );
	remove_submenu_page( 'Elements', 'Elements' );	
	}
}
add_action( 'admin_init', 'remove_admin_submenus' );
/*--------------------------------------------------------------------------------*/


function remove_plugin_menus() {
	$user = wp_get_current_user();
	if ( in_array( 'aurtra_admin', (array) $user->roles ) ) {
 // -----------use echo to get the name of plugins  	
//     echo '<pre>' . print_r( $GLOBALS[ 'menu' ], TRUE) . '</pre>';
//    echo '<pre>' . print_r( $GLOBALS[ 'submenu' ], TRUE) . '</pre>';	  
	
		remove_menu_page('cptui_main_menu');
		remove_menu_page('acf');
		remove_menu_page('asl_settings');
		remove_menu_page('duplicator');	
		remove_menu_page('shortcodes-ultimate');
		remove_menu_page('wpcf7');
		
		remove_menu_page( 'edit.php?post_type=acf'); 
        remove_menu_page( 'edit.php?post_type=acf-field-group');		
		remove_menu_page( 'edit.php?post_type=points_image'); 	
		remove_menu_page( 'edit.php?post_type=tinymcetemplates'); 		
	}	
}
add_action( 'admin_init', 'remove_plugin_menus' );
/*--------------------------------------------------------------------------------*/

// re-order left admin menu
function reorder_admin_menu( $__return_true ) {
	$user = wp_get_current_user();
	if ( in_array( 'aurtra_admin', (array) $user->roles ) ) {
    return array(
		 'tools.php', // Tools
         'index.php', // Dashboard
         'edit.php?post_type=page', // Pages 
         'edit.php', // Posts
         'upload.php', // Media
         'themes.php', // Appearance
         'separator1', // --Space--
         'edit-comments.php', // Comments 
         'users.php', // Users
         'separator2', // --Space--
         'plugins.php', // Plugins        
         'options-general.php', // Settings
    );
	}
}
add_filter( 'custom_menu_order', 'reorder_admin_menu' );
add_filter( 'menu_order', 'reorder_admin_menu' );

/*-----------------------------------------------------------------------------------*/
//  Create Submenu items
//add_submenu_page( string $parent_slug, string $page_title, 
//string $menu_title, string $capability, string $menu_slug, callable $function = '' )

function mrb_register_submenu_page() {
	$user = wp_get_current_user();
	if ( in_array( 'aurtra_admin', (array) $user->roles ) ) {
    add_submenu_page(
		'edit.php?post_type=page', 
		'Page Sections', 
		'Manage Page Sections', 
		'manage_options', 
		'..\wp-admin\edit.php?post_type=page_sections', 
		'');
    add_submenu_page(
		'edit.php?post_type=page', 
		'Manage Top Menu', 
		'Manage Top Menu', 
		'manage_options',  
		'..\wp-admin\nav-menus.php', 
		'');		
    add_submenu_page(
		'edit.php?post_type=page', 
		'Icon Sections', 
		'Manage Icon Sections', 
		"manage_options", 
		'..\wp-admin\edit.php?post_type=page_sections', 
		'');
    add_submenu_page(
		'upload.php', 
		'Image Hotspots', 
		'Image Hotspots', 
		"manage_options", 
		'..\wp-admin\edit.php?post_type=points_image', 
		'');
    add_submenu_page(
		'upload.php',  
		'Homepage Slider', 
		'Homepage Slider', 
		"manage_options", 
		'..\wp-admin\edit.php?post_type=homepage_slider', 
		'');	
    add_submenu_page(
		'Aurtra',  
		'Client Admin Role', 
		'Client Admin Role', 
		"manage_options", 
		'..\wp-admin\users.php?role=company_admin_role', 
		'');	
    add_submenu_page(
		'Aurtra',  
		'Client User Role', 
		'Client User Role', 
		"manage_options", 
		'..\wp-admin\users.php?role=company_user_role', 
		'');	
	}		
}
add_action('admin_menu', 'mrb_register_submenu_page');

	
?>