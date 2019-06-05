<?php
/**
 * The template part for displaying grid post
 *
 * @package VW Tours Lite 
 * @subpackage vw_tours_lite
 * @since 1.0
 */
?>
<div class="col-md-4">
  <div id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>    
    <div class="services-box">
        <div class="service-image">
          <?php 
            if(has_post_thumbnail()) { 
              the_post_thumbnail(); 
            }
          ?>
        </div>
        <div class="service-text">
          <header class="entry-header">
            <h3><?php the_title(); ?></h3>
          </header>
         <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_tour_lite_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_tour_lite_excerpt_number','30')))); ?></p>
          <a href="<?php the_permalink(); ?>" class="read-more"><?php echo esc_html_e('Read More','vw-tour-lite'); ?></a>
         <div class="clearfix"></div>
        </div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>