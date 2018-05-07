<?php
add_action( 'wp_ajax_nopriv_process_user_generated_post', 'process_user_generated_post' );
add_action( 'wp_ajax_process_user_generated_post', 'process_user_generated_post' );
function process_user_generated_post() {
	if ( ! empty( $_POST[ 'submission' ] ) ) {
		wp_send_json_error( 'Honeypot Check Failed' );
	}
	if ( ! check_ajax_referer( 'user_submitted_data', 'security' ) ) {
		wp_send_json_error( 'Security Check failed' );
	}
	$devicePostID=sanitize_text_field( $_POST[ 'data' ][ 'devicePostID' ] ) ;
	$deviceLocation=sanitize_text_field( $_POST[ 'data' ][ 'deviceLocation' ] ) ;
	$deviceDescription=sanitize_text_field( $_POST[ 'data' ][ 'deviceDescription' ] ) ;
	
	update_post_meta($devicePostID,'deviceLocation',$deviceLocation);
	update_post_meta($devicePostID,'deviceDescription',$deviceDescription);
die;	
}				