<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscores
 */

get_header(); ?>

 	<section class="sub-pageBanner-area hero_template3" style="background-image:url('<?php  
	    $img_id = get_post_thumbnail_id( );
        $image_attributes = wp_get_attachment_image_src( $img_id );
        $bk_img = str_replace('-150x150','',$image_attributes[0]);
		if(!$bk_img){
			$bk_img = bluelily_getGlobal('default-page-heading'); 
		}	
		echo esc_url($bk_img) ; 	
	?>')">
    	<div class=" container">
        	<div class="row">
            	<div class="col-lg-12">
                	<?php the_title( '<h1 class="">', '</h1>' ); ?>
                </div>
            </div>
        </div>
        <div class="downarrowcon"><a href="#iconSection" id="downarrow" class="downarrow"></a> </div>
    </section>
	
 <section class="standard_content">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		 <section class="profilesSection">
		<div class="container"><div class="row">
		<div class="col-lg-12">
		<h1>File Not Found</h1>
     			<p>
				Looks like we need to help you ?
				</p>
<p>
<?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
</p>
</div>
</div>
</div>
</div>
		</main><!-- #main -->
	</div><!-- #primary -->
</section>
<?php
get_sidebar();
get_footer();