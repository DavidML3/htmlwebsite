<?php
/**
 * Custom comments template
 *
 * @package corporatecorner
 */
function corporatecorner_comments( $comment, $args, $depth ) {
	global $post;
	$author_id = $post->post_author;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments. ?>
		<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="pingback-entry"><span class="pingback-heading"><?php esc_html_e( 'Pingback:', 'corporatecorner' ); ?></span> <?php comment_author_link(); ?></div>
	<?php
		break;
		default :
			// Proceed with normal comments. ?>
			<li id="li-comment-<?php comment_ID(); ?>">
			  <div class="thumblist">
				<ul>
				  <li>
					<div class="bu-media">
						 <figure><?php echo get_avatar( $comment, 40 ); ?></figure>
					</div>
					<div class="bu-text">
						<div class="bu-title">
							<h6><?php comment_author_link(); ?></h6>
							<span><?php  comment_time('F j, Y \a\t h:i A');?></span>
						</div>
					  	
						<?php if ( '0' == $comment->comment_approved ) : ?>
							<p class="comment-awaiting-moderation"><?php echo esc_html__( 'Your comment is awaiting moderation.', 'corporatecorner' ); ?></p>
						<?php endif; ?>
						<?php comment_text(); ?>

						<div class="bu-reply">
							<?php comment_reply_link( array_merge( $args, array(
								'reply_text' => esc_html__( 'Reply', 'corporatecorner' ),
								'class' => 'comment-reply ',
								'depth'      => $depth,
								'max_depth'	 => $args['max_depth'] )
							) ); ?>
						</div>
					</div>
				  </li>
				</ul>
			  </div>
			
	<?php
		break;
	endswitch; // End comment_type check.
}

// Unset default input field from comment form
if ( ! function_exists( 'corporatecorner_comment_form_below' ) ){
	function corporatecorner_comment_form_below( $fields ) { 
	    $comment_field = $fields['comment']; 
	    unset( $fields['comment'] ); 
	    $fields['comment'] = $comment_field; 
	    return $fields; 
	} 
	add_filter( 'comment_form_fields', 'corporatecorner_comment_form_below' ); 
}

// Add placeholder for Name and Email
if ( ! function_exists( 'corporatecorner_modify_comment_form_fields' ) ){
	function corporatecorner_modify_comment_form_fields($fields){
		$req = get_option('require_name_email');
		$commenter = wp_get_current_commenter();
		$aria_req = ( $req ? " aria-required='true'" : '' );
		
	    $fields['author'] = '<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<input class="nameinput" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" id="author" ' . $aria_req . ' placeholder="' . esc_attr__( 'Your Name *', 'corporatecorner' ) . '">
			</div>';
	    $fields['email'] = '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<input class="nameinput" name="email" type="email" placeholder="' . esc_attr__( 'Your Email *', 'corporatecorner' ) . '"  value="' . esc_attr(  $commenter['comment_author_email'] ) .'" ' . $aria_req . '>
			</div>';
		$fields['url'] = '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<input class="nameinput" id="url" name="url" placeholder="' . esc_attr__( 'http://your-site-name.com', 'corporatecorner' ) . '" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" />
			</div>
		</div>';

	    return $fields;
	}
	add_filter('comment_form_default_fields','corporatecorner_modify_comment_form_fields');
}

/**
* Remove the original comment button
*/
if ( ! function_exists( 'corporatecorner_comment_form_submit_button' ) ){
	function corporatecorner_comment_form_submit_button($button) {
		$arg['class_submit'] = 'bgcolor submit-btn wp-rem-comment-form';
    	return $arg;
	}
	add_filter('comment_form_defaults', 'corporatecorner_comment_form_submit_button');
}