<?php
/**
* The template for displaying all pages
*
* This is the template that displays all pages by default.
* Please note that this is the WordPress construct of pages
* and that other 'pages' on your WordPress site may use a
* different template.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package corporatecorner
*/

get_header();
$class = (get_theme_mod('bpt_page_sidebar')==1)?"section-content col-lg-9 col-md-9 col-sm-12 col-xs-12":"section-content col-lg-12 col-md-12 col-sm-12 col-xs-12";
?>

<div class="<?php echo esc_attr($class);?>">
	<div class="content-area">
	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content', 'page' );

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

	endwhile; // End of the loop.
	?>
	</div>
</div>

<?php
if (get_theme_mod('bpt_page_sidebar')==1) {?>
	<aside class="section-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
    	<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside>
<?php
}
get_footer();