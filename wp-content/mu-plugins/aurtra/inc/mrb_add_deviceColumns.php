<?php

/*-------
Add column
------- */
add_filter( 'manage_device_posts_columns', 'bluelily_add_device_columns' );
add_action( 'manage_device_posts_custom_column' , 'bluelily_show_device_columns', 10,2 );
add_filter( 'manage_posts_columns', 'bluelily_remove_custom_post_columns', 10, 2 );
add_filter( 'manage_edit-device_sortable_columns', 'bluelily_add_custom_column_make_sortable' );

function bluelily_add_device_columns($columns) {
	$columns['customerID']='Client Company';
	$columns['deviceLocation']='Location';
return $columns;
}
function bluelily_show_device_columns($columns, $post_id) {
	switch ($columns) {
        case 'customerID' :
		    $cID = get_post_meta( $post_id , 'customerID' , true ); 
			echo getCompanyname($cID);    // get title of CTP based on postID we store for field
            break;
        case 'deviceLocation' :
		    $location = get_post_meta( $post_id , 'deviceLocation' , true ); 
			echo $location;	
            break;			
        default:
    }
	return $val;	
}
function bluelily_remove_custom_post_columns( $columns, $post_type ) {
   switch ( $post_type ) {    
    case 'device':
		unset(
			$columns['date']
		);
		break;
    case 'another_example':
		unset(
			$columns['post_type'],
			$columns['author']
		);
		break; 
	default:
   } 	
  return $columns;
}
function bluelily_add_custom_column_make_sortable( $columns ) {
	$columns['customerID']='Client Company';
	$columns['deviceLocation']='Location';
	return $columns;
}
function getCompanyname($customer){
	if(get_post_type( $customer) == 'company'){
		return get_the_title( $customer );
	}	
}	
?>