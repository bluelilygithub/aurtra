<?php

//  post id is the id of custom post that we created via PAGE SECTIONS
        $post_id = 196;
        $img_id = get_post_thumbnail_id( $post_id ); //Note: you may need other methods to get id

        $image_attributes = wp_get_attachment_image_src( $img_id );
        $bk_img = esc_url(str_replace('-150x150','',$image_attributes[0]));
?>
    <section class="learnsection" style="background-image:url(' <?php echo $bk_img; ?>')">
    	<div class="container">
        	<div class="row">
            	<div class="col-lg-12">
                	<div class="learninner">
                    <h2><?php esc_html__(the_field( 'section_heading', $post_id)); ?></h2>
                        <p><?php echo __(apply_filters('the_content', get_post_field('post_content', $post_id))) ; ?></p>
                    <a href="<?php esc_url(the_field( 'section_link', $post_id)); ?>" class="findoutmore">
                    <?php esc_html__(the_field( 'section_link_text', $post_id)); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>