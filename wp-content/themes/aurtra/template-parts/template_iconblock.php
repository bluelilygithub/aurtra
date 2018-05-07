<?php
$args = array(
    'post_type' => 'page_icon_section',
    'posts_per_page'=>3,
    'post_status'=>'publish',
    'orderby'   => array(
        'ID' =>'DESC',
      /*Other params*/
     ));

?>
       
       <section class="iconSection">
    	<div class="container">
        	<div class="row">
               
               <?php  
                $loop = new WP_Query( $args );
                 $i=0;
                while ( $loop->have_posts() ) : $loop->the_post();
                $icon=get_the_post_thumbnail( );
            ?>           
                
            	<div class="col-lg-4 col-sm-12 col-md-12">
                	<div class="icon-box">
                    	<div class="icon"><?php echo $icon; ?></div>
                        <h1><?php echo esc_html__(get_the_title()); ?></h1>
                        <p><?php echo __(apply_filters('the_content', get_the_content())) ; ?></p>
                    </div>
                </div>
              
                <?php
    $i++;
endwhile;
wp_reset_query();
                ?>
                
                
                	
            </div>
        </div>
    </section>