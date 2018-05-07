<?php
/*  This is a list */

$args = array(
    'post_type' => 'article',
    'posts_per_page'=>-1,
    'post_status'=>'publish',
    'orderby'   => array(
        'ID' =>'DESC',
      /*Other params*/
     ));
                $loop = new WP_Query( $args );
                $count = $loop->post_count;

?>
           <section class="technicalInfo">
     	<div class="container">
        	<div class="row">
            	<div class="col-lg-12">
                	<h2 class="pagetitle"><?php esc_html__(the_title()); ?></h2>


               <?php
                $loop = new WP_Query( $args );
                 $i=0;
                while ( $loop->have_posts() ) : $loop->the_post();
                    $featureImage=get_post_thumbnail_id( );
                    $alt_text = esc_attr__(get_post_meta( $featureImage, '_wp_attachment_image_alt', true  ));
                    $image_attributes = wp_get_attachment_image_src( $featureImage );
                    $articleImage = esc_url(str_replace('-150x150','',$image_attributes[0]));
        ?>
                       	<div class="ti-box">
                    	<div class="itimg"><a href="#"><img src="<?php echo $articleImage; ?>" alt="<?php echo $alt_text; ?>"></a>
</div>
                        <div class="detailsinfo">
                        <h2><?php esc_html__(the_title()); ?></h2>
                        <p><?php // esc_html__(the_field( 'article_category')); ?></p>
                        </div>
                        <div class="overlaycon">
                        	  <h2><?php esc_html__(the_title());  ?></h2>
                            <p><?php esc_html__(the_field( 'caption_description')); ?></p>
                            <a href="..\<?php  echo esc_html__(get_post_field('post_name')); ?>">View Details</a>
                        </div>
                    </div>

                                     <?php
    $i++;
endwhile;
wp_reset_query();
                ?>

                </div>
            </div>
        </div>
     </section>
