<?php                                      
/**
 * Jewel Store functions and definitions
 *
 * @package Jewel Store
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'jewel_store_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.  
 */
function jewel_store_setup() { 		
	$GLOBALS['content_width'] = apply_filters( 'jewel_store_content_width', 680 );		
	load_theme_textdomain( 'jewel-store', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );	
	add_theme_support( 'title-tag' );
	add_theme_support('html5');
	add_theme_support( 'post-thumbnails' );	
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );	
	add_theme_support( 'wp-block-styles' );	
	add_theme_support( 'custom-logo', array(
		'height'      => 80,
		'width'       => 320,
		'flex-height' => true,
	) );
	
	add_action( 'wp_enqueue_scripts', function() {
     wp_enqueue_style( 'dashicons' );
	} );
		
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'jewel-store' ),
	) );
	
	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
	
	add_editor_style( 'editor-style.css' );
} 
endif; // jewel_store_setup
add_action( 'after_setup_theme', 'jewel_store_setup' );
function jewel_store_widgets_init() { 	
	
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'jewel-store' ),
		'description'   => __( 'Appears on blog page sidebar', 'jewel-store' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 1', 'jewel-store' ),
		'description'   => __( 'Appears on footer', 'jewel-store' ),
		'id'            => 'fw-column-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 2', 'jewel-store' ),
		'description'   => __( 'Appears on footer', 'jewel-store' ),
		'id'            => 'fw-column-2',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 3', 'jewel-store' ),
		'description'   => __( 'Appears on footer', 'jewel-store' ),
		'id'            => 'fw-column-3',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
	
	
}
add_action( 'widgets_init', 'jewel_store_widgets_init' );


function jewel_store_font_url(){
		$font_url = '';	
		
		/* Translators: If there are any character that are not
		* supported by Poppins, trsnalate this to off, do not
		* translate into your own language.
		*/
		$poppins = _x('on','Poppins:on or off','jewel-store');	
		
		/* Translators: If there are any character that are not
		* supported by Oswald, trsnalate this to off, do not
		* translate into your own language.
		*/
		$oswald = _x('on','Oswald:on or off','jewel-store');			
		
		    if('off' !== $poppins || 'off' !== $oswald ){
			    $font_family = array();			
			
			if('off' !== $poppins){
				$font_family[] = 'Poppins:300,400,500,600,700,800,900';
			}
			
			if('off' !== $oswald){
				$font_family[] = 'Oswald:300,400,500,600,700,800,900';
			}								
						
			$query_args = array(
				'family'	=> urlencode(implode('|',$font_family)),
			);
			
			$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
		}
		
	return $font_url;
	}


function jewel_store_scripts() {
	wp_enqueue_style('jewel-store-font', jewel_store_font_url(), array());
	wp_enqueue_style( 'jewel-store-basic-style', get_stylesheet_uri() );	
	wp_enqueue_style( 'nivo-slider', get_template_directory_uri()."/css/nivo-slider.css" );
	wp_enqueue_style( 'fontawesome-all-style', get_template_directory_uri().'/fontsawesome/css/fontawesome-all.css' );
	wp_enqueue_style( 'jewel-store-responsive', get_template_directory_uri()."/css/responsive.css" );
	wp_enqueue_script( 'jquery-nivo-slider', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	wp_enqueue_script( 'jewel-store-editable', get_template_directory_uri() . '/js/editable.js' );		
	wp_enqueue_script( 'jewel-store-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '01062020', true );	
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'jewel_store_scripts' );

function jewel_store_ie_stylesheet(){
	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style('jewel-store-ie', get_template_directory_uri().'/css/ie.css', array( 'jewel-store-style' ), '20190312' );
	wp_style_add_data('jewel-store-ie','conditional','lt IE 10');
	
	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'jewel-store-ie8', get_template_directory_uri() . '/css/ie8.css', array( 'jewel-store-style' ), '20190312' );
	wp_style_add_data( 'jewel-store-ie8', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'jewel-store-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'jewel-store-style' ), '20190312' );
	wp_style_add_data( 'jewel-store-ie7', 'conditional', 'lt IE 8' );	
	}
add_action('wp_enqueue_scripts','jewel_store_ie_stylesheet');

if ( ! function_exists( 'jewel_store_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function jewel_store_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

/**
 * Customize Pro included.
 */
require_once get_template_directory() . '/customize-pro/class-customize.php';

/**
 * WooCommerce Compatibility
 */
add_action( 'after_setup_theme', 'jewel_store_setup_woocommerce_support' );
function jewel_store_setup_woocommerce_support()   
{
  	add_theme_support('woocommerce');
	add_theme_support( 'wc-product-gallery-zoom' ); 
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' ); 
}


/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function jewel_store_skip_link_focus_fix() {  
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php                           
}
add_action( 'wp_print_footer_scripts', 'jewel_store_skip_link_focus_fix' );

/* Excerpt Length Limit Fuctions */
function jewel_store_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}  

function jewel_store_customize_partial_blogname() {
	bloginfo( 'name' );
}

function jewel_store_customize_partial_blogdescription() {
	bloginfo( 'description' );
}  

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom template for about theme.
 */
if ( is_admin() ) { 
require get_template_directory() . '/inc/about-themes.php';
}

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
