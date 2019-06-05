<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package corporatecorner
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses corporatecorner_header_style()
 */
function corporatecorner_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'corporatecorner_custom_header_args', array(
			'default-image' => get_template_directory_uri() . '/assets/images/slider-2.jpg',
			'width'         => 1920,
			'height'        => 500,
			'flex-height'   => false,
			'header-text'   => false,
	) ) );
	
	register_default_headers( array(
		'default-image' => array(
		'url' => '%s/assets/images/slider-2.jpg',
		'thumbnail_url' => '%s/assets/images/slider-2.jpg',
		'description' => esc_html__( 'Default Header Image', 'corporatecorner' ),
		),
	));
}
add_action( 'after_setup_theme', 'corporatecorner_custom_header_setup' );

if ( ! function_exists( 'corporatecorner_parallax_window' ) ){
function corporatecorner_parallax_window(){
	$header_image = get_header_image();

	if ($header_image=='' || ( is_active_sidebar('sidebar-2') && is_front_page() ) ) {
	?>
		<div class="parallax-window home_banner_section">
	<?php
	}else{
	?>
		<div class="parallax-window" data-parallax="scroll" data-image-src="<?php echo esc_url($header_image);?>">
	<?php
	}

	if ( is_active_sidebar('sidebar-2') && is_front_page() ) {
		dynamic_sidebar('sidebar-2');
	}else{
?>
	<div class="sub-header align-left modern">
		 <div class="container">
				<div class="row">
					 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mb-30">
							<div class="text-holder">
								 <div class="page-title">
									<?php if (is_home() ){?>
											<h3><?php single_post_title(); ?></h3>
									<?php }elseif(is_search()){?>
											<h3 class="page-title"><?php
											/* translators: %s: search query. */
											printf( esc_html__( 'Search Results for: %s', 'corporatecorner' ), '<span>' . get_search_query() . '</span>' );
										?></h3>
									<?php }elseif(is_archive()){
										the_archive_title( '<h3 class="page-title">', '</h3>' );
										the_archive_description( '<div class="archive-description">', '</div>' );
									}elseif(is_page()){
										echo '<h3 class="page-title">'.esc_html(get_query_var('pagename')).'</h3>';
									}else{?>
											<h3><?php the_title(); ?></h3>
									<?php } ?>
								 </div>
							</div>
					 </div>
					 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mb-30">
							<ul class="breadcrumbs">
								<?php
								if ( ! function_exists( 'breadcrumb_trail' ) ) {
									locate_template( 'vendors/breadcrumbs/breadcrumbs.php', TRUE, TRUE );
									$breadcrumb_args = array(
										'show_browse' => false,
									);
									breadcrumb_trail( $breadcrumb_args );
								}
								?>
							</ul>
					 </div>
				</div>
		 </div>
	</div>
	<?php }?>
 </div>
<?php
}
add_action('corporatecorner_parallax_window','corporatecorner_parallax_window');
}