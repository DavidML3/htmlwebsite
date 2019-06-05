<?php
/**
 * Enqueue scripts and styles.
 *
 * @package corporatecorner
 */
function corporatecorner_scripts() {
	$version = wp_get_theme()->get('Version');
	wp_enqueue_style( 'corporatecorner-google-fonts', 'https://fonts.googleapis.com/css?family=Poppins:300,400,400i,500,600,700,800,900' );
	wp_enqueue_style( 'Bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', false, $version, 'all');
	wp_enqueue_style( 'bootstrap-theme', get_template_directory_uri() . '/assets/css/bootstrap-theme.css', false, $version, 'all');
	wp_enqueue_style( 'themify-icons', get_template_directory_uri() . '/assets/css/themify-icons.css', false, $version, 'all');
	wp_enqueue_style( 'corporatecorner-default-style', get_template_directory_uri() . '/assets/css/corporatecorner-style.css', false, $version, 'all');
	wp_enqueue_style( 'corporatecorner-menu', get_template_directory_uri() . '/assets/css/menu.css', false, $version, 'all');
	wp_enqueue_style( 'corporatecorner-widget', get_template_directory_uri() . '/assets/css/widget.css', false, $version, 'all');
	wp_enqueue_style( 'corporatecorner-responsive', get_template_directory_uri() . '/assets/css/responsive.css', false, $version, 'all');
	wp_enqueue_style( 'corporatecorner-color', get_template_directory_uri() . '/assets/css/color.css', false, $version, 'all');
	wp_enqueue_style( 'corporatecorner-style', get_stylesheet_uri() );

	// js
	wp_enqueue_script( 'Bootstrap', get_template_directory_uri().'/assets/scripts/bootstrap.js', array('jquery'), $version, true );
	wp_enqueue_script( 'corporatecorner-menu', get_template_directory_uri().'/assets/scripts/menu.js', array(), $version, true );
	wp_enqueue_script( 'corporatecorner-slick', get_template_directory_uri().'/assets/scripts/slick.js', array(), $version, true );
	wp_enqueue_script( 'corporatecorner-parallax', get_template_directory_uri().'/assets/scripts/parallax/parallax.js', array(), $version, true );
	wp_enqueue_script( 'corporatecorner-functions', get_template_directory_uri().'/assets/scripts/functions.js', array(), $version, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'corporatecorner_scripts' );