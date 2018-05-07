	<div class="container">
        	<div class="row">
        	            	<div class="col-lg-12 logo">
                	<a href="#"><img src="<?=get_template_directory_uri()?>/img/logo.png" alt="Logo"></a>
                </div> 

				

					  
           <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'twentyseventeen' ); ?>">
	<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false">
		<?php
		echo twentyseventeen_get_svg( array( 'icon' => 'bars' ) );
		echo twentyseventeen_get_svg( array( 'icon' => 'close' ) );
		_e( 'Menu', 'twentyseventeen' );
		?>
	</button>

	<?php wp_nav_menu( array(
		'theme_location' => 'top',
		'menu_id'        => 'top-menu',
	) ); ?>

</nav><!-- #site-navigation -->
          				</div><!-- .wrap -->
			</div><!-- .navigation-top -->
       
		