<?php if(!defined('ABSPATH')) exit; // exit if not defined
/**
 * Flexysign functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPresss
 * @subpackage Flexysign
 * @since Flexysign 1.0
 */

if ( ! function_exists( 'flexysign_theme_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since Flexysign 1.0
	 *
	 * @return void
	 */
	function flexysign_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on flexysign, use a find and replace
		 * to change 'flexysign' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'flexysign', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * This theme does not use a hard-coded <title> tag in the document head,
		 * WordPress will provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Add post-formats support.
		 */
		add_theme_support(
			'post-formats',
			array(
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			)
		);

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary menu', 'flexysign' ),
				'privacy' => esc_html__( 'Privacy menu', 'flexysign' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		/*
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		$logo_width  = 300;
		$logo_height = 100;

		add_theme_support(
			'custom-logo',
			array(
				'height'               => $logo_height,
				'width'                => $logo_width,
				'flex-width'           => true,
				'flex-height'          => true,
				'unlink-homepage-logo' => true,
			)
		);	

        if( function_exists('acf_add_options_page') ) {
	
            acf_add_options_page(array(
                'page_title' 	=> 'Site Options',
                'menu_title'	=> 'Site Options',
                'menu_slug' 	=> 'site-options',
                'capability'	=> 'edit_posts',
                'position'   => '40',
		        'icon_url'   => 'dashicons-clipboard',
                'redirect'		=> false
            ));                    
            
        }
	}
}
add_action( 'after_setup_theme', 'flexysign_theme_setup' );

/**
 * Required Files for theme flexysign
 */
get_template_part("inc/custom-posts/projects");

get_template_part("inc/shortcodes/theme-shortcode");

if ( ! function_exists( 'flexysign_enqueue_styles_scripts' ) ) :

	/**s
	 * Enqueue styles.
	 *
	 * @since Flexysign 1.0
	 *
	 * @return void
	 */
	function flexysign_enqueue_styles_scripts() {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );
		$version_string = is_string( $theme_version ) ? $theme_version : false;
        $rand = rand();        
        $dir = get_template_directory_uri();

        wp_enqueue_style('carousel', $dir .'/assets/css/vendor/owl.carousel.min.css', array(), $theme_version );        
        wp_enqueue_style('theme-style', $dir .'/assets/css/style.css', array(), $rand );
        wp_enqueue_style('responsive', $dir .'/assets/css/responsive.css', array(), $rand );
        wp_enqueue_style('wp-style', $dir .'/style.css', array(), $rand );

        wp_enqueue_script('jquery', $dir. '/assets/js/vendor/jquery.js', array(), $theme_version, false);
        wp_enqueue_script('stickyfall', $dir. '/assets/js/vendor/stickyfill.min.js', array(), $theme_version, false);
        wp_enqueue_script('carousel-script', $dir. '/assets/js/vendor/owl.carousel.min.js', array(), $theme_version, false);
        wp_enqueue_script('general', $dir. '/assets/js/general.js', array(), $theme_version, false);

	}

endif;

add_action( 'wp_enqueue_scripts', 'flexysign_enqueue_styles_scripts' );

if ( ! function_exists( 'flexysign_preload_webfonts' ) ) :

	/**
	 * Preloads the main web font to improve performance.
	 *
	 * Only the main web font (font-style: normal) is preloaded here since that font is always relevant (it is used
	 * on every heading, for example). The other font is only needed if there is any applicable content in italic style,
	 * and therefore preloading it would in most cases regress performance when that font would otherwise not be loaded
	 * at all.
	 *
	 * @since Flexysign 1.0
	 *
	 * @return void
	 */
	function flexysign_preload_webfonts() {
		?>
		<link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,600;1,300;1,400;1,600&display=swap" rel="stylesheet">
		<?php
	}

endif;

add_action( 'wp_head', 'flexysign_preload_webfonts' );

function flexysign_sidebar_registration() {

	// Arguments used in all register_sidebar() calls.
	$shared_args = array(
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
		'before_widget' => ' ',
		'after_widget'  => ' ',
	);

	// Footer #1.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Footer #1', 'flexysign' ),
				'id'          => 'sidebar-1',
				'description' => __( 'Widgets in this area will be displayed in the first column in the footer.', 'flexysign' ),
			)
		)
	);
}

add_action( 'widgets_init', 'flexysign_sidebar_registration' );


function flexysign_remove_brackets($content) {
	return str_replace('[&hellip;]', ' ', $content);
}
add_filter('the_excerpt', 'flexysign_remove_brackets');
add_filter('get_the_excerpt', 'flexysign_remove_brackets');

function flexysign_custom_excerpt_length($length)
{
	return 10;
}
add_filter('excerpt_length','flexysign_custom_excerpt_length');

function flexysign_add_favicon() { ?>
    <!-- Custom Favicons -->
    <link rel="shortcut icon" href="<?php the_field('flexysign_favicon','options'); ?>" type="image/x-icon" />
    <?php }
add_action('wp_head','flexysign_add_favicon');
add_action('admin_head','flexysign_add_favicon');
add_action('login_head','flexysign_add_favicon');

//To change flexysign admin wordpress logo
function flexysign_login_logo_url() {
	return home_url('/');
}
add_filter( 'login_headerurl', 'flexysign_login_logo_url' );
	
//To change url title in wp-admin login screen
function flexysign_login_logo_url_title() {
    return get_bloginfo( 'name' );
}
add_filter( 'login_headertext', 'flexysign_login_logo_url_title' );

if ( ! function_exists( 'flexysign_login_customize' ) ) :
	/**
	* Override Login Page Styles
	* Handles to login logo
	* @subpackage olxpeople
	**/
	function flexysign_login_customize() { ?>
		<style>
		body.login div#login h1 a {
		background-image: url('<?php the_field("flexysign_logo", "option"); ?>');
		background-size: 100% auto;
		background-position: center center;
		padding: 0px 80px;
		}

		#loginform #wp-submit {
		background-color: #004D44;
		margin-top:5px;
		border: none;
		border-radius: 3px;
		color: #fff;
		display: inline-block;
		font-size: 16px;
		font-weight: 600;
		padding: 5px 15px 5px 15px;
		text-decoration: none;
		text-transform: uppercase;
		text-shadow: none;
		height: auto;
		line-height: normal;
		box-shadow: none;
		transition: all 350ms cubic-bezier(0, 0.34, 0.74, 0.99) 0s;
		}			
		#loginform #wp-submit:hover {		
		background:rgb(10, 110, 99);
		color: #D06B16;
		text-decoration: none;
		}
		.login form .forgetmenot label { padding-top: 10px; }
		</style>
		<?php
		}
	add_action( 'login_enqueue_scripts', 'flexysign_login_customize' );
endif; 

//Remove Unusual P Tags
function remove_empty_p( $content ){
    // clean up p tags around block elements
    $content = preg_replace( array(
        '#<p>\s*<(div|aside|section|article|header|footer)#',
        '#</(div|aside|section|article|header|footer)>\s*</p>#',
        '#</(div|aside|section|article|header|footer)>\s*<br ?/?>#',
        '#<(div|aside|section|article|header|footer)(.*?)>\s*</p>#',
        '#<p>\s*</(div|aside|section|article|header|footer)#',
    ), array('<$1', '</$1>', '</$1>', '<$1$2>','</$1',), $content );
    return preg_replace('#<p>(\s|&nbsp;)*+(<br\s*/*>)*(\s|&nbsp;)*</p>#i', '', $content);
}
add_filter( 'the_content', 'remove_empty_p', 20, 1 );
	

function flexysign_disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'flexysign_disable_emojis_tinymce' );
}
add_action( 'init', 'flexysign_disable_emojis' );
/**
* Filter function used to remove the tinymce emoji plugin.
*
* @param array $plugins
* @return array Difference betwen the two arrays
*/
function flexysign_disable_emojis_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}

/**
 * Allowe custom mime type
 */
function flexysign_allow_mimetypes( $wp_get_mime_types ) {
    $wp_get_mime_types['webp'] = 'image/webp';
    $wp_get_mime_types['svg'] = 'image/svg+xml';
    $wp_get_mime_types['ico'] = '*';
    return $wp_get_mime_types;
}
 
add_filter( 'mime_types', 'flexysign_allow_mimetypes' );

add_filter('nav_menu_css_class' , 'flexysign_active_class' , 10 , 2);
function flexysign_active_class($classes, $item) {
	if (in_array('current-menu-item', $classes) ){
		$classes[] = 'active ';
	}
	return $classes;
}

add_filter( 'nav_menu_link_attributes', function ( $atts, $item, $args ) {
    if ( $args->theme_location == 'primary' ) { // change 1161 to the ID of your menu item.
        $atts['data-hover'] = $item->title;
    }

    return $atts;
}, 10, 3 );