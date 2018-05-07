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

function mrb_add_submenu_page() {
	add_submenu_page( 
		'edit.php?post_type=job', 
		__( 'Reorder Jobs' ), 
		__( 'Reorder Jobs' ), 
		'manage_options', 
		'reorder_jobs', 
		'reorder_admin_jobs_callback' 
	);
}
add_action( 'admin_menu', 'mrb_add_submenu_page' );

?>