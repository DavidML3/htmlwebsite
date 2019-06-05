<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package corporatecorner
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class('col-lg-12 col-md-12 col-sm-12 col-xs-12'); ?>>
<?php
	get_template_part( 'template-parts/post-format/blog-grid', 'col' );
?>
</div><!-- #post--blog-medium-<?php the_ID(); ?> -->