<?php
/**
 * Monkey Munchy functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Monkey_Munchy
 */

if ( ! defined( 'MM_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'MM_VERSION', '1.2.5' );
}

if ( ! function_exists( 'mm_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function mm_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Monkey Munchy, use a find and replace
		 * to change 'mm' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'mm', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Add excerpt support to pages.
		 */
		add_post_type_support( 'page', 'excerpt' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 * Disable big image scale feature.
		 */
		add_filter( 'big_image_size_threshold', '__return_false' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'header-menu' => esc_html__( 'Header Menu', 'mm' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'mm_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'width'       => 1024,
				'height'      => 590,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'mm_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mm_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mm_content_width', 640 );
}

add_action( 'after_setup_theme', 'mm_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function mm_scripts() {
	wp_enqueue_style( 'mm-core-style', get_stylesheet_uri(), array(), MM_VERSION );
	wp_enqueue_style( 'mm-style', get_template_directory_uri() . '/dist/bundle.css', array(), MM_VERSION );
	wp_add_inline_style( 'mm-style', mm_custom_css() );

	if ( ! mm_is_elementor() ) {
		wp_enqueue_style( 'adobe-fonts', 'https://use.typekit.net/pel1ljr.css', array(), MM_VERSION );
		wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Source+Serif+Pro:wght@400;700&display=swap', array(), MM_VERSION );
	}

	wp_enqueue_script( 'mm-script', get_template_directory_uri() . '/dist/bundle.js', array( 'jquery' ), MM_VERSION, true );
	wp_localize_script(
		'mm-script',
		'mmObject',
		array(
			'ajaxUrl' => admin_url( 'admin-ajax.php' ),
		)
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Remove Facebook Review plugin stylesheets.
	wp_dequeue_style( 'fbrev_css' );
}

add_action( 'wp_enqueue_scripts', 'mm_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Elementor widgets.
 */
require get_template_directory() . '/inc/elementor/init.php';

/**
 * Theme framework.
 */
require get_template_directory() . '/inc/frameworks/codestar-framework/codestar-framework.php';

/**
 * Template options.
 */
require get_template_directory() . '/inc/template-options.php';

/**
 * Template icons.
 */
require get_template_directory() . '/inc/template-icons.php';

/**
 * Template widgets.
 */
require get_template_directory() . '/inc/widgets/init.php';

/**
 * Cafe post type.
 */
require get_template_directory() . '/inc/cafe.php';

/**
 * Breadcrumbs class.
 */
require get_template_directory() . '/inc/classes/class-mm-breadcrumbs.php';

/**
 * Call WooCommerce.
 */
require get_template_directory() . '/inc/woocommerce/init.php';

/**
 * Call Metaboxes.
 */
require get_template_directory() . '/inc/metabox/init.php';

add_filter(
	'show_admin_bar',
	function() {
		return ! is_page_template( 'page-video-scroll.php' ) && current_user_can( 'manage_options' );
	}
);
