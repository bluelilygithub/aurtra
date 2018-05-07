 <?php
$args = array(
    'post_type' => 'frequent_questions',
    'posts_per_page'=>-1,
    'post_status'=>'publish',
    'orderby'   => array(
        'ID' =>'DESC',
      /*Other params*/
     ));
                $loop = new WP_Query( $args );
                $count = $loop->post_count;

?>  

    	<div class="container faqcon">
        	<div class="row">
                               
               <div class="contentsedtion">                        
                             	<h2>FAQs</h2>

                     <?php  
                $loop = new WP_Query( $args );
                 $i=0;
      //          while ( $loop->have_posts() ) : $loop->the_post();
        ?>     
            

   
   <?php
    $i++;
// endwhile;
wp_reset_query();
                ?>
                </div>
        </div> 
      </div>

  

          
<?php 
	$args = array(
		'post_type' => 'frequent_questions',
		'numberposts' => -1,
		'order' => 'ASC',
		'orderby' => 'ID',
                 'status' => 'publish',
		'meta_key' => 'faq_categories',
	);
   $previous_category="";
	$faq_posts = get_posts($args); 
	foreach($faq_posts as $post) : 
	setup_postdata( $post ); 
?>
	
	<?php 
     		if (get_field('faq_categories')) {
			$current_category = get_field('faq_categories');
			if ($current_category != $previous_category) { 
                            if ($previous_category) { echo '</div>'; }
		?>
			
        <h1><?php echo $current_category; ?></h1>
			<div class="category">
				
		<?php } ?>
				        <div class="question "><?php  echo the_field('faq_question'); ?> <span class="answer" ><?php  echo the_content(); ?></span></div>					
					
		<?php 
			$previous_category = get_field('faq_categories');
	} ?>
<?php endforeach; wp_reset_postdata(); ?>
        </div>
        
        
<script>       
 (function($) {
  $(document).ready(function(){

      $('.question').click(function() {
          //   $(".question span").css("display", "none");
         //    $(".question").removeClass("active");
             $(this).toggleClass("active", "");
             $(this).find('span').slideToggle();
     })
 });
}(jQuery));
</script>

