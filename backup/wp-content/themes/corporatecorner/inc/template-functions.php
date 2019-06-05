<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package corporatecorner
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function corporatecorner_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'corporatecorner_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function corporatecorner_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'corporatecorner_pingback_header' );

if( ! function_exists( 'corporatecorner_register_required_plugins' ) ) {
	add_action( 'tgmpa_register', 'corporatecorner_register_required_plugins' );
	function corporatecorner_register_required_plugins() {
		$plugins = array(
			array(
				'name'         => 'Smart Slider 3',
				'slug'         => 'smart-slider-3',
			),
		);
		$config = array(
			'id'           => 'bptadvisor',
			'default_path' => '',
			'menu'         => 'tgmpa-install-plugins',
			'has_notices'  => true,
			'dismissable'  => true,
			'dismiss_msg'  => '',
			'is_automatic' => false,
			'message'      => '',
		);

		tgmpa( $plugins, $config );
	}
}