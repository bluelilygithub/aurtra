<?php
/**

Template Name: 2 col vert
 */

get_header(); 

$post_thumbnail_id = get_post_thumbnail_id($post );
if ( $post_thumbnail_id ) {
	$bk_img = wp_get_attachment_image_url( $post_thumbnail_id, 'full' );
}


?>
<div style="margin-top:0px">
 	<section class="sub-pageBanner-area hero_template3" style="background-image:url('<?php echo $bk_img; ?>')">
    	<div class=" container">
        	<div class="row">
            	<div class="col-lg-12">
                	<?php the_title( '<h1 class="">', '</h1>' ); ?>
                </div>
            </div>
        </div>
        <div class="downarrowcon"><a href="#iconSection" id="downarrow" class="downarrow"></a> </div>
    </section>
	
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
     			<?php
			while ( have_posts() ) : the_post();
			?>

<div class="container"><div class="row" style="padding:60px 0 20px 0">

<div class="col-lg-6 col-md-12 col-sm-12">
<?php 
$image = get_field('page_side_image');
$size = 'full'; // (thumbnail, medium, large, full or custom size)
	echo "<img src=".$image['url'].">";
?>
</div>
<div class="col-lg-6 col-md-12 col-sm-12">
<?php echo the_content(); ?>
</div>

</div></div>
            <?php
			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div> <!-- top div with inline style -->
<?php
get_sidebar();
get_footer();