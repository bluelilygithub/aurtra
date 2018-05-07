 <?php
$args = array(
    'post_type' => 'personnel_list',
    'posts_per_page'=>-1,
    'post_status'=>'publish',
    'orderby'   => array(
        'ID' =>'DESC',
      /*Other params*/
     ));
                $loop = new WP_Query( $args );
                $count = $loop->post_count;

?>
        
    <section class="profilesSection">
    	<div class="container">
        	<div class="row">
                               
                                          <?php  
                $loop = new WP_Query( $args );
                 $i=0;
                while ( $loop->have_posts() ) : $loop->the_post();
                    $featureImage=get_post_thumbnail_id( );
                    $img_id = get_post_thumbnail_id( ); //Note: you may need other methods to get id
                    $alt_text = esc_attr__(get_post_meta( $img_id, '_wp_attachment_image_alt', true  ));
                
                    $image_attributes = wp_get_attachment_image_src( $featureImage );
                    $staffImage = esc_url(str_replace('-150x150','',$image_attributes[0]));
        ?>     

                               <div class="col-lg-12 profile-Col">
                 	<div class="prof_img">
                    	<a href="#"><img src="<?php echo $staffImage; ?>" alt="<?php echo $alt_text; ?>"></a>
                    </div>
                    <div class="profileDetails">
                    	<h1><?php esc_html__(the_title()); ?></h1>
                        <h3><?php esc_html__(the_field( 'position')); ?></h3>
                        <h4><?php
						if(the_field('quote')!="")	echo esc_html__(the_field('quote'));?>
						</h4>
                        <?php esc_html__(the_field('introduction')); ?><span id="staff_more" class="contentreadmore readmore">
                        <div id="staff_bio" class="staff_bodytext"><?php esc_html__(the_content()); ?></div>
						<span id="staff_less" class="contentreadless readless">Less</span>
                        </span>
                        <div class="actioncon">
                        	<ul>
                            	<li><a href="<?php esc_url(the_field( 'linkedin')); ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                             </ul>
                            
                            <a href="<?php esc_url(the_field( 'link_field')); ?>" class="link" target="_blank">LINK</a>
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
	  <script>       
 (function($) {
  $(document).ready(function(){

      $('.contentreadmore').click(function() {
             $(this).find('#staff_bio').toggleClass('staff_bodytext','');
		 	 $(this).find("#staff_more").removeClass('readmore','');
	         $(this).find("#staff_less").toggleClass('readless','');
	 
     });
	       $('.contentreadless').click(function() {
             $(this).find('#staff_bio').toggleClass('staff_bodytext','');
			 $(this).find("#staff_less").toggleClass('readless','');
			 $(this).find("#staff_more").addClass('readmore','');
     })
 });
}(jQuery));
</script>
     </section>    
