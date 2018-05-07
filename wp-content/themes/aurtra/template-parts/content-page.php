<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
   
<?php  


	
?>    
 	<section class="sub-pageBanner-area hero_template3" style="background-image:url('<?php  
	    $img_id = get_post_thumbnail_id( );
        $image_attributes = wp_get_attachment_image_src( $img_id );
        $bk_img = str_replace('-150x150','',$image_attributes[0]);
		if(!$bk_img){
			$bk_img = bluelily_getGlobal('default-page-heading'); 
		}	
		echo esc_url($bk_img) ; 	
	?>')">
    	<div class=" container">
        	<div class="row">
            	<div class="col-lg-12">
                	<?php the_title( '<h1 class="">', '</h1>' ); ?>
                </div>
            </div>
        </div>
        <div class="downarrowcon"><a href="#iconSection" id="downarrow" class="downarrow"></a> </div>
    </section>

	
     <section class="standard_content">
     	<div class="container">
        	<div class="row"><div class="col-lg-12">

		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'underscores' ),
				'after'  => '</div>',
			) );
		?>
          </div>  </div></div></section>

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
	
	   <!-- Learn Section Start Here
    ================================================== -->

                  <?php
      if (in_array("learning", $post_display_sections[0])) {
            require_once('template_learning.php');
   }
?>
    
     <!-- Learn Section End Here
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
    
    
<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="screen-reader-text">%s</span>', 'underscores' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->