<?php
/**
 * Corporate Corner functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package corporatecorner
 */

if ( ! function_exists( 'corporatecorner_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function corporatecorner_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Corporate Corner, use a find and replace
		 * to change 'corporatecorner' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'corporatecorner', get_template_directory() . '/languages' );

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
		add_image_size( 'corporatecorner_blog-grid-thumbs', 405, 253, true);
		add_image_size( 'corporatecorner_blog-large-list', 812, 300, true);

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'corporatecorner' ),
			'menu-2' => esc_html__( 'Footer', 'corporatecorner' ),
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

		/*
		 * Enable support for Post Formats.
		 * See https://developer.wordpress.org/themes/functionality/post-formats/
		 */
		add_theme_support( 'post-formats', array(
			'gallery',
			'video',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'corporatecorner_custom_background_args', array(
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
			'height'      => 58,
			'width'       => 222,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'corporatecorner_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function corporatecorner_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'corporatecorner_content_width', 640 );
}
add_action( 'after_setup_theme', 'corporatecorner_content_width', 0 );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function corporatecorner_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'corporatecorner' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'corporatecorner' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Banner', 'corporatecorner' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'corporatecorner' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Front Page Right Sidebar', 'corporatecorner' ),
		'id'            => 'sidebar-3',
		'description'   => esc_html__( 'Add widgets here.', 'corporatecorner' ),
		'before_widget' => '<section id="%1$s" class="left-blog-page %2$s"><div class="left-blog">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'corporatecorner' ),
		'id'            => 'sidebar-4',
		'description'   => esc_html__( 'Add widgets here.', 'corporatecorner' ),
		'before_widget' => '<div id="%1$s" class="col-lg-3 col-md-3 col-sm-6 col-xs-12 widget %2$s"><div class="widget widget-categores">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="widget-section-title"><h3 class="widget-heading-1 widget-title ">',
		'after_title'   => '</h3></div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Single Page Sidebar', 'corporatecorner' ),
		'id'            => 'sidebar-5',
		'description'   => esc_html__( 'Post After Details widgets.', 'corporatecorner' ),
		'before_widget' => '<section id="%1$s" class="bu-blog-tags %2$s"><div class="left-blog">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Page Right Sidebar', 'corporatecorner' ),
		'id'            => 'sidebar-6',
		'description'   => esc_html__( 'Add widgets here.', 'corporatecorner' ),
		'before_widget' => '<section id="%1$s" class="left-blog-page %2$s"><div class="left-blog">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'corporatecorner_widgets_init' );

/**
 * Replace single post next and previous btn class .
 */
function corporatecorner_posts_link_next_class($format){
     $format = str_replace('href=', 'class="btn-next" href=', $format);
     return $format;
}
add_filter('next_post_link', 'corporatecorner_posts_link_next_class');
function corporatecorner_posts_link_prev_class($format) {
     $format = str_replace('href=', 'class="btn-prev" href=', $format);
     return $format;
}
add_filter('previous_post_link', 'corporatecorner_posts_link_prev_class');


/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/corporatecorner_scripts.php';

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
 * Implement custom-comments.
 */
require get_template_directory() . '/inc/custom-comments.php';

/**
 * Implement Register Custom Navigation Walker.
 */
require get_template_directory() . '/vendors/wp-bootstrap-navwalker/wp-bootstrap-navwalker.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/vendors/bpt-customizer/class-customize.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/vendors/activation/class-tgm-plugin-activation.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * pro Section.
 */
require get_template_directory() . '/vendors/pro/bpt-admin-page.php';