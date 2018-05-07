<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscores
 */

?>
     
     <?php
//  check to see if the page should contain any special sections
//  by default all are set you yes on pages.
$post_display_sections[]= get_post_meta($post->ID, 'display_sections', true);


if ( empty ( $post_display_sections [0]) ){ 
   //  not sections to display
}else{

    // place final if closing tag at end of page
?>

     <!-- Main Slider  Section End Here
    ================================================== -->
    
     <!-- who are Aurtra Section Start Here
    ================================================== -->
       
      <?php
      if (in_array("who", $post_display_sections[0])) {
            require_once('template_whoarewe.php');
   }
?>

        <!-- who are Aurtra Section End Here
    ================================================== -->
    
    
     <!-- Solutions Section Start Here
    ================================================== -->

           <?php
      if (in_array("technology", $post_display_sections[0])) {
            require_once('template_technology.php');
   }
?>
       
     <!-- Solutions Section End Here
    ================================================== -->
    
    
     <!-- Icon Section Start Here
    ================================================== -->

                 <?php
      if (in_array("icons", $post_display_sections[0])) {
            require_once('template_iconblock.php');
   }
?>
    
     <!-- Icon Section End Here
    ================================================== -->
    
    
     <!-- Learn Section Start Here
    ================================================== -->

                  <?php
      if (in_array("learning", $post_display_sections[0])) {
            require_once('template_learning.php');
   }
?>
    
     <!-- Learn Section End Here
    ================================================== -->
    
    <!-- Solutions Section Start Here
    ================================================== -->

                   <?php
      if (in_array("solutions", $post_display_sections[0])) {
            require_once('template_solutions.php');
   }
?>
    
     <!-- Solutions Section End Here
    ================================================== -->
    
     <!-- Footer Start Here
    ================================================== -->
   
    <?php } ?> 
