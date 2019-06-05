<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package corporatecorner
 */

get_header();

/*
	*content.php need dynamic
*/
	
$bpt_post_format = (get_theme_mod('bpt_Blog_style')=='')?esc_html('blog-large'):esc_html(get_theme_mod('bpt_Blog_style'));

$bpt_post_class = ($bpt_post_format=='blog-medium')?'blog blog-classic':'blog blog-grid';
?>
<div class="section-content col-lg-9 col-md-9 col-sm-12 col-xs-12">
	<div class="content-area">
		<div class="row">
			 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="<?php echo esc_attr($bpt_post_class);?>">
						 <div class="row">
							<?php
							if ( have_posts() ) :
								/* Start the Loop */
								while ( have_posts() ) :
									the_post();
									/*
									* Include the Post-Type-specific template for the content.
									* If you want to override this in a child theme, then include a file
									* called content-___.php (where ___ is the Post Type name) and that will be used instead.
									*/
									get_template_part( 'template-parts/content', get_post_format() );
								endwhile;
								?>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<?php the_posts_pagination();?>
								</div>
							<?php
							else :
								get_template_part( 'template-parts/content', 'none' );
							endif;
							?>
						 </div>
					</div>
			 </div>

		</div>
	</div>
</div>

<?php
get_sidebar();
get_footer();
