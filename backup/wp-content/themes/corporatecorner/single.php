<?php
/**
* The template for displaying all single posts
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
*
* @package corporatecorner
*/

get_header();
?>

<div class="section-content col-lg-9 col-md-9 col-sm-12 col-xs-12">
<div class="content-area">
	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content', get_post_format() );
		?>
		
		<div class="bu-next-previous-post mt-30">
			<div class="row">

				<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
					<div class="bu-previous">
					<?php
						the_post_navigation( array(
						'prev_text' => __( 'Prev Post', 'corporatecorner' ) . '<span class="ti-arrow-left"></span>',
						'next_text' => '',
						) );
					?>
					</div>
				</div>

				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
					<div class="main-menu text-center"><a class="main-menu-btn" href="#"><span class="ti-layout-grid3"></span></a></div>
				</div>

				<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
					<div class="bu-next">
					<?php
						the_post_navigation( array(
						'next_text' => __( 'Next post', 'corporatecorner' ) . '<span class="ti-arrow-right"></span>',
						'prev_text' => '',
						) );
					?>
					</div>
				</div>

		   </div>
		</div>

		<?php if ( is_active_sidebar( 'sidebar-5' ) ) {?>
			<div class="bu-blog-tags"><?php dynamic_sidebar( 'sidebar-5' ); ?></div>
		<?php }?>

		<?php
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

	endwhile; // End of the loop.
	?>
 </div>
</div>

<?php
get_sidebar();
get_footer();
