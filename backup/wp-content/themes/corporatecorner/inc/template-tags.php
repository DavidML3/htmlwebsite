<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package corporatecorner
 */

if ( ! function_exists( 'corporatecorner_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function corporatecorner_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time> <time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( ' %s', 'post date', 'corporatecorner' ),
			'<li><a href="' . esc_url( get_permalink() ) . '" rel="bookmark"> <span class="ti-calendar"></span>' . $time_string . '</a></li>'
		);

		echo '<ul class="post-date">' . $posted_on . '</ul>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'corporatecorner_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function corporatecorner_posted_by() {
		$comments_count = wp_count_comments( get_the_ID() );
		$total_comments = $comments_count->total_comments.esc_html__(' Comments', 'corporatecorner');
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( ' %s', 'post author', 'corporatecorner' ),
			'<li><a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><span class="ti-face-smile"></span> ' . esc_html__( ' By ', 'corporatecorner' ) . get_the_author() . '</a></li>
			<li><a href="#"><span class="ti-comments"></span> '.$total_comments.'</a></li>'
		);

		echo '<ul class="post-options"> ' . $byline . '</ul>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'corporatecorner_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function corporatecorner_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'corporatecorner' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'corporatecorner' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'corporatecorner' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'corporatecorner' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'corporatecorner' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'corporatecorner' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'corporatecorner_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function corporatecorner_post_thumbnail($bpt_post_format='') {
		if ( post_password_required() || is_attachment()) {
			return;
		}

		if ( is_singular() ){
		if ( has_post_thumbnail() ) {
		?>
			<div class="img-holder">
				<figure>
					<?php the_post_thumbnail();?>
				</figure>
			</div>
		<?php } }else{ if ( has_post_thumbnail() ) { ?>
			<div class="img-holder">
				<figure>
				<a href="<?php the_permalink(); ?>">
					<?php
						if ($bpt_post_format=='blog-grid') {
							$bpt_post_format = 'corporatecorner_blog-grid-thumbs';
						}elseif ($bpt_post_format=='blog-large'){
							$bpt_post_format = 'corporatecorner_blog-large-list';
						}else{
							$bpt_post_format = 'medium';
						}

						the_post_thumbnail( $bpt_post_format, array('alt' => the_title_attribute( array('echo' => false,) ),) );
					?>
				</a>
				</figure>
			</div>
		<?php
		} } // End is_singular().
	}
endif;


if ( ! function_exists( 'corporatecorner_post_thumbnail_gallery' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function corporatecorner_post_thumbnail_gallery($bpt_post_format='') {
		if ( post_password_required() || is_attachment()) {
			return;
		}
		if ($bpt_post_format=='blog-grid') {
			$bpt_post_format = 'corporatecorner_blog-grid-thumbs';
		}elseif ($bpt_post_format=='blog-large'){
			$bpt_post_format = 'corporatecorner_blog-large-list';
		}else{
			$bpt_post_format = 'medium';
		}
		?>
		
<?php
if ( get_post_gallery() ) {
	echo '<ul class="blog-detail-slider">';
	$gallery = get_post_gallery( get_the_ID(), false );
	/* Loop through all the image and output them one by one */
	?>
	<!-- Post Image -->
	<?php if ( has_post_thumbnail() ) {?>
		<li><figure><img src="<?php the_post_thumbnail_url($bpt_post_format); ?>" alt=""></figure></li>

	<?php } ?>
	<!-- /Post Image -->
	<?php
	foreach( $gallery['src'] as $src ){?>
		<li><figure><img src="<?php echo esc_url($src);?>" alt=""></figure></li>
	<?php
	}
	echo '</ul>';
};
?>

		<?php
	}
endif;
