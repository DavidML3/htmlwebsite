<?php
/**
* Template part for displaying posts
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package corporatecorner
*/

?>


 <div class="blog-post">

	<?php
		$content = apply_filters( 'the_content', get_the_content() );
		$video = false;
		// Only get video from the content if a playlist isn't present.
		if ( false === strpos( $content, 'wp-playlist-script' ) ) {
			$video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
		}

		if ( '' !== get_the_post_thumbnail() && ! is_single() ){ 
			corporatecorner_post_thumbnail();
		}elseif(''== get_the_post_thumbnail() && !empty( $video ) && ! is_single()){
			echo '<div class="content-video">';
				echo $video[0];
			echo '</div>';
		}else{
			corporatecorner_post_thumbnail();
		}
	?>
		
	<div class="text-holder">
		<?php corporatecorner_posted_on();?>
		<?php
			if ( is_singular() ) :
				the_title( '<div class="post-title"><h2>', '</h2></div>' );
			else :
				the_title( '<div class="post-title"><h4><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4></div>' );
			endif;
		?>
		<?php corporatecorner_posted_by();?>

		<?php
			if( !is_singular() ){
				the_excerpt();
				?>
				<a href="<?php esc_url(the_permalink());?>" class="read-more"><?php echo esc_html__('Read More','corporatecorner');?> <span class="ti-angle-right"></span></a>
			<?php
			}else{
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'corporatecorner' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'corporatecorner' ),
					'after'  => '</div>',
				) );
			}
		?>
	</div>
 </div>
