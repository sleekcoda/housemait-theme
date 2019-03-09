<?php
/**
 * Housemait functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Housemait
 */

if ( ! function_exists( 'housemait_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function housemait_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Housemait, use a find and replace
		 * to change 'housemait' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'housemait', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' 		=> esc_html__( 'Primary Menu', 'housemait' ),                                                    
			'secondary' 	=> esc_html__( 'Secondary Menu', 'housemait' ),                                                    
			'footer' 		=> esc_html__( 'Footer Menu', 'housemait' ),
			'mobile' 		=> esc_html__( 'Mobile Menu', 'housemait' ),
			'user-menu' 	=> esc_html__( 'User Menu', 'housemait' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'housemait_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'housemait_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function housemait_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'housemait_content_width', 640 );
}
add_action( 'after_setup_theme', 'housemait_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function housemait_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'housemait' ),
		'id'            => 'sidebar-middle',
		'description'   => esc_html__( 'Add widgets here.', 'housemait' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) ); 

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Left', 'housemait' ),
		'id'            => 'footer-widget-left',
		'description'   => esc_html__( 'Add widgets here for left footer widget.', 'housemait' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Middle', 'housemait' ),
		'id'            => 'footer-widget-center',
		'description'   => esc_html__( 'Add widgets here for middle footer widget.', 'housemait' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Right', 'housemait' ),
		'id'            => 'footer-widget-right',
		'description'   => esc_html__( 'Add widgets here for right footer widget.', 'housemait' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Top', 'housemait' ),
		'id'            => 'sidebar-top',
		'description'   => esc_html__( 'Wigets here will appear first on sidebar.', 'housemait' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Bottom', 'housemait' ),
		'id'            => 'sidebar-bottom',
		'description'   => esc_html__( 'Wigets here will appear at the bottom on sidebar majorly for ads.', 'housemait' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'housemait_widgets_init' );
/**
 * Remove default unwanted profile
 */
remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );

add_action( 'load-profile.php', function()
{
   add_filter( 'option_show_avatars', '__return_false' );
} );

/**
 * Enqueue scripts and styles.
 */
function housemait_scripts() {
	wp_enqueue_style( 'housemait-font', get_template_directory_uri() . '/fonts/font.css',array(),'20181012',false);
	wp_enqueue_style( 'housemait-font-awesome', get_template_directory_uri() . '/fonts/font-awesome.min.css',array(),'20181012',false);
	wp_register_style( 'single-apartment', get_template_directory_uri() . '/css/single-apartment.css',array(),time(),false);
	wp_register_script( 'single-apartment-js', get_template_directory_uri() . '/js/single-apartment.js',array('jquery'),time(),true);
	wp_register_script('create-new-hmpost',get_template_directory_uri().'/js/create-hmpost.js',array('jquery'),time(),true);
	wp_enqueue_style( 'housemait-style', get_stylesheet_uri(),array(),time(), false );
	
	wp_enqueue_style( 'housemait-bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style( 'housemait-bootstrap-grid-style', get_template_directory_uri() . '/css/bootstrap-grid.min.css',array(),'');

	
	wp_register_script( 'google-autocomplete-api', 'https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyB9gdpVbTsjPhWsSGjiZEuE6YXE_EH-He4' ,array(),'20181102',true);
	wp_register_script( 'google-autocomplete-js', get_template_directory_uri() . '/js/google-autocomplete.js',array(),'20181102',true);

	wp_register_script( 'validate-js', get_template_directory_uri() . '/js/validate.js',array('jquery'),time(),true);	
	wp_register_script( 'login-register-js', get_template_directory_uri() . '/js/login-register.js',array('validate-js'),time(),true);
	wp_register_script( 'media-upload-js', get_template_directory_uri() . '/js/media-upload.js',array('jquery'),time(),true);
	wp_register_script( 'create-hmpost', get_template_directory_uri() . '/js/create-hmpost.js',array('validate-js','media-upload-js'),time(),true);
	wp_register_script( 'update-users', get_template_directory_uri() . '/js/user.js',array('validate-js'),time(),true);
	wp_register_style( 'login-register-css', get_template_directory_uri() . '/css/login-register.css',array(),time(),false);
	
	wp_enqueue_script('jquery');
	wp_enqueue_script('google-autocomplete-api');
	wp_enqueue_script('google-autocomplete-js');

	wp_enqueue_script( 'housemait-navigation', get_template_directory_uri() . '/js/navigation.js', array(), time(), true );

	wp_enqueue_script( 'housemait-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	$local = array(        
		'ajaxurl'       => admin_url( 'admin-ajax.php' ),
		'nonce'         => wp_create_nonce('housemait-nonce')
	);
	
	$media_local = array(
		'ajaxurl'       => admin_url( 'admin-ajax.php' ),
		'upload_url' => admin_url('async-upload.php'),
		'nonce'         => wp_create_nonce('media-form')
	);
	
	wp_localize_script('update-users','media',$media_local);
	wp_localize_script('login-register-js','housemait',$local);
	wp_localize_script('media-upload-js','media',$media_local);
	wp_localize_script('create-new-hmpost','housemait',$local);


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
function housemait_admin_scripts(){

	wp_register_style( 'loggedin-style', get_template_directory_uri() . '/css/logged-in.css',array(),time(),false);
	wp_enqueue_style('loggedin-style'); 

	wp_register_script( 'google-autocomplete-api', 'https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyB9gdpVbTsjPhWsSGjiZEuE6YXE_EH-He4' ,array(),'20181102',true);	
	wp_register_script( 'google-autocomplete-js', get_template_directory_uri() . '/js/google-autocomplete.js',array(),'20181102',true);

}
add_action( 'wp_enqueue_scripts', 'housemait_scripts' );
add_action( 'admin_enqueue_scripts', 'housemait_admin_scripts' );
/**
 * Remove admin bar from none administrators
 */
require get_template_directory(). '/inc/remove-admin-bar.php';
 
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
/**
 * Login Page
 */

require get_template_directory() . '/inc/custom-login.php';
