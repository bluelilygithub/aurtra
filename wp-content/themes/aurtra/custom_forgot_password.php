<?php
/*

Template Name:  forgotpasswordForm

*/

get_header(); 
?>     
                   
 
       <section class="sub-pageBanner-area hero_template3">
    	<div class=" container">
        	<div class="row">
            	<div class="col-lg-12">
                	<h2>Login Page</h2>
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
                        
					
						
	<!-- section -->
    <section class="aa_loginForm">
       
	   <form name="lostpasswordform" id="lostpasswordform" action="<?php echo site_url('/wp-login.php?action=lostpassword')?>
" method="post">
	<p>
		<label for="user_login">Username or Email Address<br>
		<input type="text" name="user_login" id="user_login" class="input" value="" size="20"></label>
	</p>
		<input type="hidden" name="redirect_to" value="">
	<p class="submit"><input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="Get New Password"></p>
</form>

	</section>
	<!-- /section -->
						
	<script type="text/javascript">
	try{document.getElementById('user_login').focus();}catch(e){}
	if(typeof wpOnload=='function')wpOnload();
	</script>					
												
						
						</div>
                </div> 
              </div> 
            </div>
        </div>
     </section>
    <?php 
get_footer();
