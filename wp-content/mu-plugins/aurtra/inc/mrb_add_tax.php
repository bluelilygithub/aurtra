<?php

function mrb_add_Location_Tax() {
    $singular = "Location" ;
    $plural="Locations";
    $labels = array(
    'name' => _x( $singular. ' Tags', 'taxonomy general name' ),
    'singular_name' => _x( $singular.' Tag', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search '.$singular.' Tags' ),
    'all_items' => __( 'All '.$singular.' Tags' ),
    'parent_item' => __( 'Parent '.$singular.' Tag' ),
    'parent_item_colon' => __( 'Parent '.$singular.' Tag:' ),
    'edit_item' => __( 'Edit '.$singular.' Tag' ),
    'update_item' => __( 'Update '.$singular.' Tag' ),
    'add_new_item' => __( 'Add New '.$singular.' Tag' ),
    'new_item_name' => __( 'New '.$singular.' Tag Name' ),
    'menu_name' => __( $singular.' Tags' )
  ); 
  $args = array(
    'labels'        => $labels,
    'hierarchical' => true,
  'rewrite' => array(
    'slug' => 'location-tags',
    'with_front' => false,
    'hierarchical' => true
      )      
  );
register_taxonomy( 'location-type','job', $args );  
 }
add_action( 'init', 'mrb_add_Location_Tax' );   
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function mrb_add_product_Tax() {
    $singular = "Product";
    $plural="Products";
    $labels = array(
    'name' => _x( $singular. ' Tags', 'taxonomy general name' ),
    'singular_name' => _x( $singular.' Tag', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search '.$singular.' Tags' ),
    'all_items' => __( 'All '.$singular.' Tags' ),
    'parent_item' => __( 'Parent '.$singular.' Tag' ),
    'parent_item_colon' => __( 'Parent '.$singular.' Tag:' ),
    'edit_item' => __( 'Edit '.$singular.' Tag' ),
    'update_item' => __( 'Update '.$singular.' Tag' ),
    'add_new_item' => __( 'Add New '.$singular.' Tag' ),
    'new_item_name' => __( 'New '.$singular.' Tag Name' ),
    'menu_name' => __( $singular.' Tags' )
  ); 
  $args = array(
    'labels'        => $labels,
    'hierarchical' => true,
  'rewrite' => array(
    'slug' => 'product-tags',
    'with_front' => false,
    'hierarchical' => true
      )      
  );
register_taxonomy( 'product-type','job', $args ); 
 }
add_action( 'init', 'mrb_add_product_Tax' );   
?>