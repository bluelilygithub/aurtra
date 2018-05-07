<?php
function mrb_add_company_metabox() {
	add_meta_box(
		'mrb_meta',
		__( 'company Listing' ),
		'mrb_meta_company_callback',
		'company',
		'normal',
		'core'
	);
}
add_action( 'add_meta_boxes', 'mrb_add_company_metabox' );
function mrb_meta_company_callback( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'company_nonce' );
	$stored_meta = get_post_meta( $post->ID );
	
    ?>
	<div>
		<div class="meta-row">
			<div class="meta-th">
				<label for="Customer ID" class="dwwp-row-title"><?php _e( 'customerID Id', 'wp-company-listing' ); ?></label>
			</div>
			<div class="meta-td">
				<input type="text" class="dwwp-row-content" name="customerID" id="customerID" required="required"
				value="<?php if ( ! empty ( $stored_meta['customerID'] ) ) {
					echo esc_attr( $stored_meta['customerID'][0] );
				} ?>"/>
			</div>
			
		</div>	
	</div>
<script type='text/javascript'>
	jQuery(document).ready(function( $ ) {
	
	$('#customerID').blur(function() {
            var selected_length = $(this).val().length;
			var first4 = $(this).val().slice(0, 4);
            if (selected_length != 11) {
                alert( 'The customer ID field must be 11 characters' );
            }
			if (first4 != 'Cust') {
                alert( 'The customer ID field must begin with Cust' );
            }
        });
	
});
</script>	
	<?php
	
}


function dont_publish( $data , $postarr ){  
  if($postarr['customerID'] == 'michaelbarrett'){
		$data['post_status'] = 'draft';    
		add_action( 'admin_notices', 'mrb_error_notice' );
  }
  return $data;   
}  
add_filter('wp_insert_post_data' , 'dont_publish' , '9', 2); 

function mrb_meta_company_save( $post_id ){
 if($_POST[ 'post_type' ] == 'company'){
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'company_nonce' ] ) && wp_verify_nonce( $_POST[ 'company_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
	update_post_meta( $post_id, 'customerID', sanitize_text_field( $_POST[ 'customerID' ] ) );
 }	
}
add_action( 'save_post_company', 'mrb_meta_company_save' );

function mrb_error_notice() {
    ?>
    <div class="error notice">
        <p><?php _e( 'There has been an error. Bummer!', 'my_plugin_textdomain' ); ?></p>
    </div>
    <?php
}
?>