<?php

//  post id is the id of custom post that we created via PAGE SECTIONS
        $post_id = 194;

	$img_id = get_post_thumbnail_id( $post_id ); //Note: you may need other methods to get id
         $alt_text = esc_attr__(get_post_meta( $img_id, '_wp_attachment_image_alt', true  ));

?>

    <section class="whoare solutions">
    	<div class="container">
        	<div class="row">
            	<div class=" col-lg-12">
                 	<div class="ourporoject">
                   <?php echo get_the_post_thumbnail( $post_id,'large', array( 'title' => $alt_text ));?>
                    <div class="ourprojectsDetails">
                	<h2><?php  esc_html__(the_field( 'section_sub_heading', $post_id)); ?></h2>
                	<h1><?php esc_html__(the_field( 'section_heading', $post_id)); ?></h1>
                        <p><?php echo __(apply_filters('the_content', get_post_field('post_content', $post_id))) ; ?></p>
                    <a href="<?php esc_url(the_field( 'section_link', $post_id)); ?>" class="findoutmore">
                    <?php esc_html__(the_field( 'section_link_text', $post_id)); ?></a>
                    </div>
                    </div>
              </div>
                 
            </div>
        </div>
    </section>