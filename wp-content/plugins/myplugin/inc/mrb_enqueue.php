<?php

function mrb_admin_enqueue_scripts() {
	global $pagenow, $typenow;
	if ( $typenow == 'job') {
		wp_enqueue_style( 'mrb-admin-css', plugins_url( '../css/admin-jobs.css', __FILE__ ) );
	}
	if ( ($pagenow == 'post.php' || $pagenow == 'post-new.php') && $typenow == 'job' ) {
		
		wp_enqueue_script( 'dwwwp-job-js', plugins_url( '../js/mrb-admin-jobs.js', __FILE__ ), array( 'jquery', 'jquery-ui-datepicker' ), '20150204', true );
		wp_enqueue_script( 'mrb-custom-quicktags', plugins_url( '../js/mrb-quicktags.js', __FILE__ ), array( 'quicktags' ), '20150206', true );
		wp_enqueue_style( 'jquery-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css' );
	}
	if ( $pagenow =='edit.php' && $typenow == 'job') {
		wp_enqueue_script( 'reorder-js', plugins_url( '../js/mrb-reorder.js', __FILE__ ), array( 'jquery', 'jquery-ui-sortable' ), '20150626', true );
		wp_localize_script( 'reorder-js', 'WP_JOB_LISTING', array(
			'security' => wp_create_nonce( 'wp-job-order' ),
			'success' => __( 'Jobs sort order has been saved.' ),
			'failure' => __( 'Stop:  There was an error saving the sort order, or you do not have proper permissions.' ),
                          'error' => _('Not Good')
		) );
   //    require_once(plugin_dir_path(__FILE__). '/mrb_translations.php');
	}
	if ( $pagenow =='edit.php' && $typenow == 'question') {
		wp_enqueue_script( 'reorder-js', plugins_url( '../js/mrb-questions.js', __FILE__ ), '', '20150626', true );
	}
}
add_action( 'admin_enqueue_scripts', 'mrb_admin_enqueue_scripts' );
