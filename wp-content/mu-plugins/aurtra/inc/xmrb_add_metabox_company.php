<?php
function mrb_add_company_metabox() {
	add_meta_box(
		'mrb_company_meta',
		__( 'Company Listing' ),
		'mrb_company_meta_callback',
		'company',
		'normal',
		'core'
	);
}
add_action( 'add_company_meta_boxes', 'mrb_add_company_metabox' );

function mrb_company_meta_callback( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'company_nonce' );
	$stored_meta = get_post_meta( $post->ID ); 

    $selected_jobs = get_post_meta( $stored_meta , 'jobs', true );
    $all_jobs = get_posts( array(
        'post_type' => 'jobs',
        'numberposts' => -1,
        'orderby' => 'post_title',
        'order' => 'ASC'
    ) );
    ?>
 



	<div>
		<div class="meta-row">
			<div class="meta-th">
				<label for="job-id" class="dwwp-row-title"><?php _e( 'Job Id', 'wp-job-listing' ); ?></label>
			</div>
			<div class="meta-td">
				<input type="text" class="dwwp-row-content" name="job_id" id="job-id"
				value="<?php if ( ! empty ( $stored_meta['job_id'] ) ) {
					echo esc_attr( $stored_meta['job_id'][0] );
				} ?>"/>
			</div>
			
			<div class="meta-th">
				<label for="x-id" class="dwwp-row-title"><?php _e( 'x Id', 'wp-x-listing' ); ?></label>
			</div>
			<div class="meta-td">
				<input type="text" class="dwwp-row-content" name="x_id" id="x-id"
				value="<?php if ( ! empty ( $stored_meta['x_id'] ) ) {
					echo esc_attr( $stored_meta['x_id'][0] );
				} ?>"/>
			</div>
			
		   <div class="meta-th">
				<label for="jobb-id" class="dwwp-row-title"><?php _e( 'Jobb Id', 'wp-jobb-listing' ); ?></label>
			</div>
			<div class="meta-td">
			<select multiple name="movies">
    <?php foreach ( $all_jobs as $job ) : ?>
        <option value="<?php echo $job->ID; ?>"<?php echo (in_array( $job->ID, $selected_jobs )) ? ' selected="selected"' : ''; ?>><?php echo $movie->post_title; ?></option>
    <?php endforeach; ?>
    </select>
			</div>
			
			
	
	
	</div>	
	<?php
}
function mrb_company_meta_save( $post_id ) {

}
add_action( 'save_post', 'mrb_company_meta_save' );