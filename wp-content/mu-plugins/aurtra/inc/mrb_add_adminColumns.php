<?php
/*-------
      Set DEFAULG column from Users view
------- */
function blueily_user_sort( $query_args ){
    if( is_admin() && !isset($_GET['orderby']) ) {
        $query_args->query_vars['orderby'] = 'login';
    }
    return $query_args;
}
add_action( 'pre_get_users', 'blueily_user_sort' );

/*-------
      Remove POSTS COUNT column from Users view
------- */
add_action('manage_users_columns','bluelily_modify_user_columns');
function bluelily_modify_user_columns($column_headers) {
  unset($column_headers['posts']);
return $column_headers;
}
/*-------
      Add column from Users view
------- */
add_filter('manage_users_columns', 'bluelily_add_user_id_column');
function bluelily_add_user_id_column($columns) {
// $columns['user_id'] = 'User ID';
	$columns['customerID']='Client Company';
//	$columns['url']='Website';
return $columns;
}
add_action('manage_users_custom_column',  'bluelily_show_user_id_column_content', 10, 3);
function bluelily_show_user_id_column_content($value, $column_name, $user_id) {
	switch ($column_name) {
        case 'user_id' :
			return $user_id;
            break;
        case 'customerID' :
		    $cID = get_the_author_meta('customerID', $user_id);
			return get_the_title( $cID );    // get title of CTP based on postID we store for field
            break;
        case 'url' :
			$user_info = get_userdata($user_id);
			return $user_info->user_url;	
            break;			
        default:
    }
return $val;	
}
add_filter( 'manage_users_sortable_columns', 'bluelily_column_sortable' );
function bluelily_column_sortable( $columns ) {
	return wp_parse_args( array( 
	'customerID' => 'Customer ID',
	'email' => 'email',
	'role' => 'role',
	'name' => 'name' ), 
	$columns );
}

?>