<?php
/**
 * The template part for displaying Single Post
 *
 * @package VW Tours Lite 
 * @subpackage vw_tours_lite
 * @since 1.0
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>    
  <div class="services-box">
    <div class="service-text">
      <header class="entry-header">
        <h3><?php the_title(); ?></h3>
      </header>
      <div class="metabox">
        <?php if(get_theme_mod('vw_tour_lite_toggle_postdate',true)==1){ ?>
          <span class="entry-date"><i class="fas fa-calendar-alt"></i><?php echo esc_html( get_the_date() ); ?></span>
        <?php } ?>
        <?php if(get_theme_mod('vw_tour_lite_toggle_author',true)==1){ ?>
          <span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><i class="fas fa-user"></i><?php the_author(); ?></a></span>
        <?php } ?>
        <?php if(get_theme_mod('vw_tour_lite_toggle_comments',true)==1){ ?>
          <span class="entry-comments"><i class="fas fa-comments"></i> <?php comments_number( '0 Comments', '0 Comments', '% Comments' ); ?> </span>
        <?php } ?>
      </div><!-- metabox -->
      <div class="feature-box">   
        <img src="<?php the_post_thumbnail_url('full'); ?>" >
      </div><hr>
      <?php the_content(); ?>
      <?php the_tags(); ?>
     <div class="clearfix"></div>
    </div>
  </div>
</div>