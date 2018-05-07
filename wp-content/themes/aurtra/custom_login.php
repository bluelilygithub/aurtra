<?php
/*

Template Name:  loginForm

*/

get_header(); 
//wp_logout();
?>     
                   
 
       <section class="sub-pageBanner-area hero_template3">
    	<div class=" container">
        	<div class="row">
            	<div class="col-lg-12">
                	<h1>Asset Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="downarrowcon"><a href="#iconSection" id="downarrow" class="downarrow"></a> </div>
    </section>
    <section class="article_content">
     	<div class="container">
        	<div class="row">
           	  <div class="col-lg-12">
                 	<div class="singlePost singlePost_form">
                    	<h2><?php esc_html__(the_title()); ?></h2>
                        
					
						
	<!-- section -->
    <section class="aa_loginForm">
        <?php 
            global $user_login;
            // In case of a login error.
            if ( isset( $_GET['login'] ) && $_GET['login'] == 'failed' ) : ?>
    	            <div class="aa_error">
    		            <p><?php _e( 'FAILED: Try again!', 'AA' ); ?></p>
    	            </div>
            <?php 
                endif;
            // If user is already logged in.
            if ( is_user_logged_in() ) : ?>

                <div class="aa_logout"> 
                    
                    <?php 
                        _e( 'Hello', 'AA' ); 
                        echo $user_login; 
                    ?>
                    
                    </br>
                    
                    <?php _e( 'You are already logged in.', 'AA' ); ?>

                </div>

                <a id="wp-submit" href="<?php echo "/aurtra/logout"; ?>" title="Logout">
                    <?php _e( 'Logout', 'AA' ); ?>
                </a>

            <?php 
                // If user is not logged in.
                else: 
                
                    // Login form arguments.
                    $args = array(
                        'echo'           => true,
                        'redirect'       => home_url( 'wp-admin()' ), 
                        'form_id'        => 'loginform',
                        'label_username' => __( 'Username' ),
                        'label_password' => __( 'Password' ),
                        'label_remember' => __( 'Remember Me' ),
                        'label_log_in'   => __( 'Log In' ),
                        'id_username'    => 'user_login',
                        'id_password'    => 'user_pass',
                      //  'id_remember'    => 'rememberme',
                        'id_submit'      => 'wp-submit',
                        'remember'       => false,
                        'value_username' => NULL,
                        'value_remember' => false
                    ); 
                    
                    // Calling the login form.
                    wp_login_form( $args );
                endif;
        ?> 

	</section>
	<!-- /section -->
						
						
												
						
						</div>
                </div> 
              </div> 
            </div>
        </div>
     </section>
    <?php 
get_footer();
