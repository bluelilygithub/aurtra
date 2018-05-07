<?php 
add_action('admin_init','mrb_load_translations');
function mrb_load_translations() {
global $pagenow, $typenow;;
    
    if (empty($typenow) && !empty($_GET['post'])) {
  $post = get_post($_GET['post']);
  $typenow = $post->post_type;
}

    
//$typenow= $typenow = $post->post_type;
if ( $pagenow =='edit.php' && $typenow == 'job') {
		wp_localize_script( 'mrb-reorder-js', 'WP_JOB_LISTING', array(
			'security' => wp_create_nonce( 'wp-job-order' ),
			'success' => __( 'Jobs sort order has been saved.' ),
			'failure' => __( 'Stop:  There was an error saving the sort order, or you do not have proper permissions.' ),
            	      'error' => __( 'Somethings broken.' )
		) );
	}
}
?>