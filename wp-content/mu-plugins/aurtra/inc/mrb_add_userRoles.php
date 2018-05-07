<?php
/*
We added to additional roles to the user profile page
company_admin will have the same rights as company_user  -  as well as some additional features
*/


function mrb_add_roles() {
       add_role( 'company_admin_role', 'Company Admin', array( 'read' => true, 'level_0' => true ) );
	   add_role( 'company_user_role', 'Company User', array( 'read' => true, 'level_0' => true ) );
   }
mrb_add_roles();


/*  ------------------------------------- /*
Create a limited Admin Role for Clients to manage the backend
*/
add_action('init', 'cloneUserRole');
function cloneUserRole(){
	if( !get_role('Aurtra Admin') ){	
		global $wp_roles;
		if (!isset($wp_roles))
		$wp_roles = new WP_Roles();
		$adm = $wp_roles->get_role('administrator');
		$wp_roles->add_role('aurtra_admin', 'Aurtra Administrator', $adm->capabilities);
	}
}

/*
Remove unwanted Role   --  for example customised admin roles
*/
if( get_role('Aurtra Admin') ){
      remove_role( 'Aurtra Admin' );
}
