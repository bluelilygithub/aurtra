<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package bluelily
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function bluelily_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'bluelily_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function bluelily_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'bluelily_pingback_header' );

function bluelily_googlefonts() {
	$query_args = array(
		'family' => 'Source+Sans+Pro:300,400,600,700,900|Raleway:400,600,700|Open+Sans',
		'subset' => 'latin,latin-ext'
	);
     wp_register_style( 'google-fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
     wp_enqueue_style( 'google-fonts' );
}
add_action('wp_enqueue_scripts', 'bluelily_googlefonts');


function bluelily_stylesheets() {
   wp_enqueue_style( 'bluelily-bootstrap-4.0.0', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css', array(), null, 'all' );
   wp_enqueue_style( 'bluelily-layout',  get_template_directory_uri() .'/layouts/layout.css?v='.time(), array(), null, 'all' );
   wp_enqueue_style( 'bluelily-responsive', get_template_directory_uri() .'/layouts/responsive.css', array(), null, 'all' );
   wp_enqueue_style( 'bluelily-infographic', get_template_directory_uri() .'/layouts/infograph.css', array(), null, 'all' );	
   wp_enqueue_style( 'bluelily-font-awesome', get_template_directory_uri() .'/layouts/font-awesome.css', array(), null, 'all' );
   wp_enqueue_style( 'bluelily-print', get_template_directory_uri() .'/layouts/print.css', array(), null, 'print' );
}
add_action( 'wp_enqueue_scripts', 'bluelily_stylesheets' );


function bluelily_jscripts() {
// true = load in the footer
     wp_enqueue_script( 'bluelily-bootstrap-4.0.0',  'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js',array('jquery'), null, 'true' );
     wp_enqueue_script( 'bluelily-custom-artra',  get_template_directory_uri() .'/js/aurtra.js',array('jquery'), null, 'true' );	 	
	 wp_enqueue_script( 'twentyseventeen-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );

	 if ( has_nav_menu( 'top' ) ) {
		wp_enqueue_script( 'twentyseventeen-navigation', get_theme_file_uri( '/assets/js/navigation.js' ), array( 'jquery' ), '1.0', true );
		$twentyseventeen_l10n['expand']         = __( 'Expand child menu', 'twentyseventeen' );
		$twentyseventeen_l10n['collapse']       = __( 'Collapse child menu', 'twentyseventeen' );
		$twentyseventeen_l10n['icon']           = twentyseventeen_get_svg( array( 'icon' => 'angle-down', 'fallback' => true ) );
	 }

	wp_enqueue_script( 'twentyseventeen-global', get_theme_file_uri( '/assets/js/global.js' ), array( 'jquery' ), '1.0', true );
	wp_localize_script( 'twentyseventeen-skip-link-focus-fix', 'twentyseventeenScreenReaderText', $twentyseventeen_l10n );
	
	wp_enqueue_script( 'ajax_custom_script',  get_template_directory_uri() .'/js/mrb-ajaxHandler.js', array('jquery') );
	wp_localize_script( 'ajax_custom_script', 'frontendajax', array(
			'root_Url' => get_site_url(),
			'adminAjax' => admin_url( 'admin-ajax.php' ),
			'security' => wp_create_nonce('user_submitted_data')	
	));

}
add_action( 'wp_enqueue_scripts', 'bluelily_jscripts' );



function bluelily_theme_add_editor_styles() {
    add_editor_style( get_template_directory_uri() .'/layouts/layout.css' );
}
add_action( 'admin_init', 'bluelily_theme_add_editor_styles' );

function bluelily_theme_add_editor_google_styles() {
    $font_url = 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900' ;
    add_editor_style( $font_url );
}
add_action( 'admin_init', 'bluelily_theme_add_editor_google_styles' );

function tiny_mce_remove_unused_formats( $initFormats ) {
    // Add block format elements you want to show in dropdown
    $initFormats['block_formats'] = 'Paragraph=p;Heading 1=h1;Heading 2=h2;Heading 3=h3';
    return $initFormats;
}
add_filter( 'tiny_mce_before_init', 'tiny_mce_remove_unused_formats' );

/* ----------   GET DEFAULFT VARS */
function bluelily_getGlobal($defaultValue) {
		return the_field('default_value', get_page_by_path($defaultValue, '', 'default_values'));
}
add_filter('get_global_var', 'bluelily_getGlobal');

function bluelily_useGlobal($defaultValue) {
		return get_field('default_value', get_page_by_path($defaultValue, '', 'default_values'));
}
add_filter('get_global_var', 'bluelily_useGlobal');

function bluelily_getEmailTemplate($theSlug,$searchArray,$replaceArray) {
$args = array(
  'name'        => $theSlug,
  'post_type'   => 'email_templates',
  'post_status' => 'publish',
  'numberposts' => 1
);
$emailTemplate = get_posts($args);
if( $emailTemplate ) :
	$content_post = get_post($emailTemplate[0]->ID);
	$strBody = $content_post->post_content;
	$content=str_replace($searchArray,$replaceArray,$strBody);
endif;
return $content;
}
add_filter('get_global_var', 'bluelily_getEmailTemplate');
/* -------------------------------- */


//Our custom sitemap which reads the menu order using extended menu walker class
//Shortcode
function bluelily_sitemap($atts){ //[sitemap]
	extract(shortcode_atts(array(	
	), $atts));		
	//call the function
	$shortcodecontent = wdp_sitemap();	
 
	return $shortcodecontent;
}
add_shortcode('sitemap', 'bluelily_sitemap');


/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );

function twentyseventeen_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'twentyseventeen_javascript_detection', 0 );


// light way to add GA
function google_analytics_tracking_code(){
 ?>
		<script type="text/javascript">
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-110777289-1']);
		  _gaq.push(['_trackPageview']);

		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
		</script>
<?php
}
// include GA tracking code before the closing head tag
add_action('wp_head', 'google_analytics_tracking_code');

function delete_refill_cf7() {
	?>
	<script>
	if(wpcf7) {
		wpcf7.cached = 0;
	}
	</script>
	<?php
}
//add_action('wp_after_admin_bar_render', 'delete_refill_cf7');

remove_action('wp_head', 'wp_generator');


function ac_remove_cf7_scripts() {
		wp_deregister_style( 'contact-form-7' );
}
//add_action( 'wp_enqueue_scripts', 'ac_remove_cf7_scripts' );


function bluelily_theme_setup(){
    load_theme_textdomain( 'Aurtra', get_template_directory() . '/languages/en_AU.pot' );
}
add_action( 'after_setup_theme', 'bluelily_theme_setup' );


// header('Content-Security-Policy: default-src \'self\' \'unsafe-inline\' \'unsafe-eval\' https: data:');
header('X-Frame-Options: SAMEORIGIN');
header('Strict-Transport-Security:max-age=31536000; includeSubdomains; preload');
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);

