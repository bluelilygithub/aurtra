<?php

get_header(); 
?>     
                   
    <?php 
                    $featureImage=get_post_thumbnail_id( );
                    $alt_text = esc_attr__(get_post_meta( $featureImage, '_wp_attachment_image_alt', true  ));
                    $image_attributes = wp_get_attachment_image_src( $featureImage );
                    $articleImage = esc_url(str_replace('-150x150','',$image_attributes[0]));
        ?>        
       

       <section class="sub-pageBanner-area hero_template3">
    	<div class=" container">
        	<div class="row">
            	<div class="col-lg-12">
                	<h2>Technical info</h2>
                </div>
            </div>
        </div>
        <div class="downarrowcon"><a href="#iconSection" id="downarrow" class="downarrow"></a> </div>
    </section>
    <section class="article_content">
     	<div class="container">
        	<div class="row">
           	  <div class="col-lg-12">
                 	<div class="singlePost">
                    	<h2><?php esc_html__(the_title()); ?></h2>
                        <span><?php echo esc_html__(the_field( 'article_date'))?>   -   <?php esc_html__(the_field( 'article_author')); ?></span>
                        
                        <div class="postimage"><img src="<?php echo $articleImage; ?>" alt="<?php echo $alt_text; ?>"></div>
                           <p><?php echo __(apply_filters('the_content', get_post_field('post_content'))) ; ?></p>
                        <div class="registerbtn">Register for full paper</div>
						<div id="regoForm" class="regoForm hide-con">
	<div class="regoForm_Header">
<h2>Register Now</h2>
<h3>Fill in form below for access:</h3>
</div>
<div class="regoForm_Body">
						 <?php echo do_shortcode('[contact-form-7 id="724" title="Register for article form"]'); ?>
						</div>
						</div>
                </div> 
              </div> 
            </div>
        </div>
     </section>
    <?php 
get_footer();
