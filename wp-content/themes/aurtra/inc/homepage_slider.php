<?php
$args = array(
    'post_type' => 'homepage_slider',
    'posts_per_page'=>-1,
    'post_status'=>'publish',
    'orderby'   => array(
        'ID' =>'DESC',
      /*Other params*/
     ));
                $loop = new WP_Query( $args );
                $count = $loop->post_count;

?>
      <section class="mainslider">
   	<div id="myCarousel" class="carousel slide" data-ride="carousel">
    	<div class="indicatorcon">
         	<div class="container">
                <ol class="carousel-indicators">
                 <?php for($i=0;  $i<$count; $i++){ ?>
                             <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" class="<?php  if($i==0) echo 'active'; ?>" ></li>
                <?php } ?>
                </ol>
         	</div>
         </div>
      
      	<div class="downarrowcon"><div class="downarrow"></div> </div>
        <div class="carousel-inner">
           
            <?php  
                $loop = new WP_Query( $args );
                 $i=0;
                while ( $loop->have_posts() ) : $loop->the_post();
                    $featureImage=get_post_thumbnail_id( );
                    $image_attributes = wp_get_attachment_image_src( $featureImage );
                    $sliderImage = esc_url(str_replace('-150x150','',$image_attributes[0]));
        
            ?>      
   
          <div class="carousel-item <?php  if($i==0) echo 'active'; ?> ">
            <img class="first-slide" src="<?php echo $sliderImage; ?>" />
            <div class="carousel-caption <?php esc_html__(the_field( 'caption_colour')); ?> <?php esc_html__(the_field( 'caption_position')); ?>">
                <div class="container">
                <h2><?php esc_html__(the_field( 'caption_sub_heading')); ?></h2>
                <h1><?php esc_html__(the_field( 'caption_header')); ?></h1>
                  <p><?php echo __(apply_filters('the_content', get_the_content())) ; ?></p>
                                   <a href="<?php esc_url(the_field( 'caption_link')); ?>" class="findoutmore">
                    <?php esc_html__(the_field( 'caption_link_text')); ?></a>
              </div>
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