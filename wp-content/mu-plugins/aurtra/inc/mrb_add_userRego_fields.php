<?php
/*
This routine is used to add a "Custom Field" to the User Login form.
We add a select field so we can set the company that the person works with.

The previously added two roles   (company user & company admin) to the form
*/
function crf_admin_registration_form( $operation ) {
	if ( 'add-new-user' !== $operation ) {
		// $operation may also be 'add-existing-user'
		return;
	}

  $all_companies = get_posts( array(
        'post_type' => 'company',
        'numberposts' => -1,
        'orderby' => 'post_title',
		'post_status' => 'publish',
        'order' => 'ASC'
    ) );
	$selectRows=count($all_companies); 
	
	?>
	<h3><?php esc_html_e( 'Aurtra Client Company', 'crf' ); ?></h3>

	<table class="form-table">
		<tr>
			<th><label for="customerID"><?php esc_html_e( 'Company', 'crf' ); ?></label> <span class="description"><?php esc_html_e( '(required)', 'crf' ); ?></span></th>
			<td>
				<select name="customerID" size="<?php echo $selectRows?>" style="width:100%; height:unset">
    <?php foreach ( $all_companies as $company ) : ?>
        <option value="<?php echo $company->ID; ?>"><?php echo $company->post_title; ?></option>
    <?php endforeach; ?>
				</select>
			</td>
		</tr>
	</table>
	<?php
}
add_action( 'user_new_form', 'crf_admin_registration_form' );


function crf_show_extra_profile_fields( $user ) {
	$customerID = get_the_author_meta( 'customerID', $user->ID );

	 $all_companies = get_posts( array(
        'post_type' => 'company',
        'numberposts' => -1,
        'orderby' => 'post_title',
		'post_status' => 'publish',
        'order' => 'ASC'
    ) );
	$selectRows=count($all_companies); 
	
	?>
	<h3><?php esc_html_e( 'Aurtra Client Company', 'crf' ); ?></h3>

	<table class="form-table">
		<tr>
			<th><label for="customerID"><?php esc_html_e( 'Company', 'crf' ); ?></label> <span class="description"><?php esc_html_e( '(required)', 'crf' ); ?></span></th>
			<td>
				<select name="customerID" size="<?php echo $selectRows?>" style="width:100%; height:unset">
    <?php foreach ( $all_companies as $company ) : ?>
        <option value="<?php echo $company->ID; ?>"<?php echo ($company->ID == $customerID ) ? ' selected="selected"' : ''; ?>><?php echo $company->post_title; ?></option>
    <?php endforeach; ?>
				</select>
			</td>
		</tr>
	</table>
	<?php
}
add_action( 'show_user_profile', 'crf_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'crf_show_extra_profile_fields' );




function crf_update_profile_fields( $user_id ) {
	if ( ! current_user_can( 'edit_user', $user_id ) ) {
		return false;
	}

	if ( ! empty( $_POST['customerID'] )) {
		update_user_meta( $user_id, 'customerID',  $_POST['customerID']  );
	}
}
add_action( 'personal_options_update', 'crf_update_profile_fields' );
add_action( 'edit_user_profile_update', 'crf_update_profile_fields' );
add_action( 'user_register', 'crf_update_profile_fields' );

/**
 * Back end registration
 */




function crf_user_profile_update_errors( $errors, $update, $user ) {
	if ( $update ) {
		return;
	}

	if ( empty( $_POST['customerID'] ) ) {
		$errors->add( 'company_error', __( '<strong>ERROR</strong>: Please Select A Company.', 'crf' ) );
	}


}
add_action( 'user_profile_update_errors', 'crf_user_profile_update_errors', 10, 3 );
add_action( 'edit_user_created_user', 'crf_user_register' );