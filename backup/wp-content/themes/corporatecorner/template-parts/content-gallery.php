<?php
/**
* Template part for displaying posts
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package bpt-bootstrap
*/

$bpt_post_format = (get_theme_mod('bpt_Blog_style')=='')?esc_attr('blog-large'):esc_attr(get_theme_mod('bpt_Blog_style'));

if ($bpt_post_format=='blog-grid') {
	if ( is_singular() ){
		$class = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
	}else{
		$class = 'col-lg-6 col-md-6 col-sm-12 col-xs-12';
	}
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class($class); ?>>
	<?php
		get_template_part( 'template-parts/post-format/blog-grid', 'col' );
	?>
	</article><!-- #post--blog-grid-<?php the_ID(); ?> -->

<?php }elseif ($bpt_post_format=='blog-large'){?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('col-lg-12 col-md-12 col-sm-12 col-xs-12'); ?>>
	<?php
		get_template_part( 'template-parts/post-format/blog-grid', 'col' );
	?>
	</article><!-- #post--blog-large-<?php the_ID(); ?> -->

<?php }else{?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('col-lg-12 col-md-12 col-sm-12 col-xs-12'); ?>>
	<?php
		get_template_part( 'template-parts/post-format/blog-grid', 'col' );
	?>
	</article><!-- #post--blog-medium-<?php the_ID(); ?> -->

<?php }?>