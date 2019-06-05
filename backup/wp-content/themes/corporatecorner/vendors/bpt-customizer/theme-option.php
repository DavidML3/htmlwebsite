<?php 

/**
* Theme Options Panel.
*
* @package corporatecorner
*/


// Add Theme Options Panel.
$manager->add_panel( 'theme_option_panel',
	array(
		'title'      => esc_html__( 'Theme Options', 'corporatecorner' ),
		'priority'   => 20,
		'capability' => 'edit_theme_options',
	)
);

/*
 #Header Section
*/
$manager->add_section( 'bpt_header_contact_info',array(
	'title'      => esc_html__( 'Header', 'corporatecorner' ),
	'priority'   => 120,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
));
	$manager->add_setting('bpt_header_location', array(
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$manager->add_control('bpt_header_location', array(
		'label'      => esc_html__( 'Header Location', 'corporatecorner' ),
		'section'    => 'bpt_header_contact_info',
		'type'       => 'text',
	));
	$manager->add_setting('bpt_header_mobile', array(
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$manager->add_control('bpt_header_mobile', array(
		'label'      => esc_html__( 'Mobile Number', 'corporatecorner' ),
		'section'    => 'bpt_header_contact_info',
		'type'       => 'text',
	));
	$manager->add_setting('bpt_header_email', array(
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_email',
	) );
	$manager->add_control('bpt_header_email', array(
		'label'      => esc_html__( 'Email', 'corporatecorner' ),
		'section'    => 'bpt_header_contact_info',
		'type'       => 'text',
	));
	$manager->add_setting('bpt_header_time', array(
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$manager->add_control('bpt_header_time', array(
		'label'      => esc_html__( 'Time', 'corporatecorner' ),
		'section'    => 'bpt_header_contact_info',
		'type'       => 'text',
	));

/*
 #Post Section
*/
$manager->add_section( 'bpt_Blog_style',array(
	'title'      => esc_html__( 'Blog', 'corporatecorner' ),
	'priority'   => 120,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
));
	$manager->add_setting('bpt_Blog_style', array(
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'slug_sanitize_select',
	) );
	$manager->add_control('bpt_Blog_style', array(
		'type' => 'select',
		'section' => 'bpt_Blog_style',
		'label' => __( 'Blog Style','corporatecorner' ),
		'choices' => array(
			'blog-grid' => __( 'Blog grid','corporatecorner' ),
			'blog-large' => __( 'Blog Large List','corporatecorner' ),
			'blog-medium' => __( 'Blog Medium','corporatecorner' ),
		),
		));

/*
 #Header Section
*/
$manager->add_section( 'bpt_social',array(
	'title'      => esc_html__( 'Social', 'corporatecorner' ),
	'priority'   => 120,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
));
	$manager->add_setting('fb_link', array(
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$manager->add_control('fb_link', array(
		'label'      => esc_html__( 'Facebook', 'corporatecorner' ),
		'section'    => 'bpt_social',
		'type'       => 'url',
	));
	$manager->add_setting('tw_link', array(
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$manager->add_control('tw_link', array(
		'label'      => esc_html__( 'Twitter', 'corporatecorner' ),
		'section'    => 'bpt_social',
		'type'       => 'url',
	));
	$manager->add_setting('google_plus', array(
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$manager->add_control('google_plus', array(
		'label'      => esc_html__( 'Google Plus', 'corporatecorner' ),
		'section'    => 'bpt_social',
		'type'       => 'url',
	));
	$manager->add_setting('linkedin', array(
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$manager->add_control('linkedin', array(
		'label'      => esc_html__( 'Linkedin', 'corporatecorner' ),
		'section'    => 'bpt_social',
		'type'       => 'url',
	));
	$manager->add_setting('youtube', array(
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$manager->add_control('youtube', array(
		'label'      => esc_html__( 'Youtube', 'corporatecorner' ),
		'section'    => 'bpt_social',
		'type'       => 'url',
	));
	$manager->add_setting('instagram', array(
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$manager->add_control('instagram', array(
		'label'      => esc_html__( 'Instagram', 'corporatecorner' ),
		'section'    => 'bpt_social',
		'type'       => 'url',
	));


/*
 #Theme Settings
*/
$manager->add_section( 'bpt_setting',array(
	'title'      => esc_html__( 'Theme Settings', 'corporatecorner' ),
	'priority'   => 120,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
));
	$manager->add_setting('bpt_homepage_sidebar', array(
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_checkbox',
	));
	$manager->add_control('bpt_homepage_sidebar', array(
		'label'      => esc_html__( 'Front Page Right Sidebar', 'corporatecorner' ),
		'section'    => 'bpt_setting',
		'type'       => 'checkbox',
	));
	$manager->add_setting('bpt_header_social', array(
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_checkbox',
	));
	$manager->add_control('bpt_header_social', array(
		'label'      => esc_html__( 'Header Social Icon', 'corporatecorner' ),
		'section'    => 'bpt_setting',
		'type'       => 'checkbox',
	));
	$manager->add_setting('bpt_page_sidebar', array(
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_checkbox',
	));
	$manager->add_control('bpt_page_sidebar', array(
		'label'      => esc_html__( 'Page Right Sidebar', 'corporatecorner' ),
		'section'    => 'bpt_setting',
		'type'       => 'checkbox',
	));