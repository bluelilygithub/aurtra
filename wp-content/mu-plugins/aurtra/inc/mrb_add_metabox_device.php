<?php
function mrb_add_device_metabox() {
	add_meta_box(
		'mrb_meta',
		__( 'device Listing' ),
		'mrb_meta_device_callback',
		'device',
		'normal',
		'core'
	);
}
add_action( 'add_meta_boxes', 'mrb_add_device_metabox' );
function mrb_meta_device_callback( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'device_nonce' );
	$stored_meta = get_post_meta( $post->ID );
	
		$storedCompanyID = $stored_meta['customerID'] ;
	
	// drop down list of companies to select from.
	$all_companies = get_posts( array(
        'post_type' => 'company',
        'numberposts' => -1,
        'orderby' => 'post_title',
		'post_status' => 'publish',
        'order' => 'ASC'
    ) );
	$selectRows=count($all_companies);
	
    ?>
	<div>
		<div class="meta-row">
			<div class="meta-th">
				<label for="Device ID" class="dwwp-row-title"><?php _e( 'deviceID Id', 'wp-device-listing' ); ?></label>
			</div>
			<div class="meta-td">
				<input type="text" class="dwwp-row-content" name="deviceID" id="deviceID" required="required"
				value="<?php if ( ! empty ( $stored_meta['deviceID'] ) ) {
					echo esc_attr( $stored_meta['deviceID'][0] );
				} ?>"/>
			</div>			
		</div>	
		
		<div class="meta-row">
			<div class="meta-th">
				<label for="Company ID" class="dwwp-row-title"><?php _e( 'companyID Id', 'wp-company-listing' ); ?></label>
			</div>
			<div class="meta-td">
				<select name="customerID" size="<?php echo $selectRows?>" style="width:100%; height:unset" required="required">
    <?php foreach ( $all_companies as $company ) : ?>
        <option value="<?php echo $company->ID; ?>"<?php echo ($company->ID == $storedCompanyID[0] ) ? ' selected="selected"' : ''; ?>><?php echo $company->post_title; ?></option>
    <?php endforeach; ?>
				</select>
			</div>			
		</div>	
		
		<div class="meta-row">
			<div class="meta-th">
				<label for="Device Location" class="dwwp-row-title"><?php _e( 'device location', 'device-location' ); ?></label>
			</div>
			<div class="meta-td">
				<input type="text" class="dwwp-row-content" name="deviceLocation" id="deviceLocation" required="required"
				value="<?php if ( ! empty ( $stored_meta['deviceLocation'] ) ) {
					echo esc_attr( $stored_meta['deviceLocation'][0] );
				} ?>"/>
			</div>			
		</div>

		<div class="meta-row">
			<div class="meta-th">
				<label for="Device Description" class="dwwp-row-title"><?php _e( 'device description', 'device-description' ); ?></label>
			</div>
			<div class="meta-td">
				<input type="text" class="dwwp-row-content" name="deviceDescription" id="deviceDescription" required="required"
				value="<?php if ( ! empty ( $stored_meta['deviceDescription'] ) ) {
					echo esc_attr( $stored_meta['deviceDescription'][0] );
				} ?>"/>
			</div>			
		</div>			
		
	</div>	
	<?php
	
}


function mrb_meta_device_save( $post_id ) {
	// Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'device_nonce' ] ) && wp_verify_nonce( $_POST[ 'device_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
    if ( isset( $_POST[ 'customerID' ] ) ) {
    	update_post_meta( $post_id, 'customerID', sanitize_text_field( $_POST[ 'customerID' ] ) );
    	update_post_meta( $post_id, 'deviceID', sanitize_text_field( $_POST[ 'deviceID' ] ) );
    	update_post_meta( $post_id, 'deviceLocation', sanitize_text_field( $_POST[ 'deviceLocation' ] ) );		
    	update_post_meta( $post_id, 'deviceDescription', sanitize_text_field( $_POST[ 'deviceDescription' ] ) );		
    }
 
}
add_action( 'save_post', 'mrb_meta_device_save' );


/*   NOT WORKING------------------------
function mrb_meta_device_errors( $errors, $post_id ) {

	if ( empty( $_POST['customerID'] ) ) {
		$errors->add( 'device_error', __( '<strong>ERROR</strong>: Please enter device ID.', 'crf' ) );
	}
}
add_action( 'mrb_check_device_errors', 'mrb_meta_device_errors', 10, 3 );
---------------------------   NOT WORKING------*/
