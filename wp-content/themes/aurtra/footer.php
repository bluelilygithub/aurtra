<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package underscores
 */
?>

     <?php 
//  if ( !is_front_page() ) {  ?>
     <!-- Footer Start Here
    ================================================== -->

    <footer class="footertop">
    	<div class="container">
        	<div class="row">
            	<div class=" col-lg-3 col-md-12 col-sm-12">
               	  <div class="footCol">
                    	<h2>Contact Us</h2>
                    <p><strong>Phone:</strong> 
					<?php echo esc_html__(bluelily_getGlobal('default-company-phone'));  ?>
					</p>

                   
				   <?php echo do_shortcode('[contact-form-7 id="664" title="Enquiry Form In The Footer"]'); ?>
 
                      <a href="<?php echo esc_url(bluelily_getGlobal('default-company-linkedin'));  ?>" 
class="icon_linkedin" target="_blank" ><img src="<?=get_template_directory_uri()?>/img/icon_linkedin.png" width="25" height="25"></a>
                      <a href="<?php echo esc_url(bluelily_getGlobal('default-company-twitter'));  ?>" 
class="icon_twitter" target="_blank" ><img src="<?=get_template_directory_uri()?>/img/icon_tw.png" target="_blank" width="25" height="25"></a>


                    </div>
                </div>
            	<div class=" col-lg-3 col-md-12 col-sm-12">
                	<div class="footCol">
                    <h2>FAQs</h2>
                    <p>Got some questions? <br/>Visit our <a href="/learn/faq/">FAQ page</a> or Contact us direct</p>
                    </div>
                </div>
            	<div class=" col-lg-3 col-md-12 col-sm-12">
                	<div class="footCol">
                    	<h2>Links</h2>
                        <ul class="footer_list">
                        	<li><a href="/privacy-policy">Privacy Policy</a></li>
							<li><a href="/terms-and-conditions">Terms & Conditions</a></li><br/>
                        	<li><?php echo esc_url(bluelily_getGlobal('default-company-copyright'));  ?></li>
							<li><?php echo esc_url(bluelily_getGlobal('default-company-abn'));  ?></li>							
                        </ul>
                    </div>
                </div>
            	<div class=" col-lg-3 col-md-12 col-sm-12">
                	<div class="footCol"><h2>Distributors</h2>
                    <p><strong>Register your interest as a Country or Distribution Partner for Aurtra :</strong></p>
  					   <?php echo do_shortcode('[contact-form-7 id="682" title="Registration Form In The Footer_copy"]'); ?>
					
                      </div>
                </div>
            </div>
        </div>
    </footer>
    <section class="backtoup" id="backtothetop">
    	<a href="">Back to top</a>
    </section>
     <!-- Footer  end Here
    ================================================== -->

<?php // } ?>

<?php wp_footer(); ?>

</body>
</html>
