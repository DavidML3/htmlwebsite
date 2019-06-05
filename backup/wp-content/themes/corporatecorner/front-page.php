<?php
/**
* The main template file
*
* This is the most generic template file in a WordPress theme
* and one of the two required files for a theme (the other being style.css).
* It is used to display a page when nothing more specific matches a query.
* E.g., it puts together the home page when no home.php file exists.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package corporatecorner
*/

get_header();
?>

<!--Blog Area Start-->
<div class="blog-page-area area-padding">
    <div class="container">
        <div class="row">
            <div class="blog-grid home-blog">

                <?php if(get_theme_mod('bpt_homepage_sidebar')=='1' && is_active_sidebar('sidebar-3')){?><div class="col-md-8 col-sm-8 col-xs-12"><?php }?>

                <?php
                if ( have_posts() ){
                    /* Start the Loop */
                    while ( have_posts() ){
                        the_post();
                        /*
                         * Include the Post-Type-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                         */
                        get_template_part( 'template-parts/content', get_post_type() );
                        
                    }
                    the_posts_pagination();
                }else{
                    get_template_part( 'template-parts/content', 'none' );
                }
                ?>
                <?php if(get_theme_mod('bpt_homepage_sidebar')=='1' && is_active_sidebar('sidebar-3')){?>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <?php dynamic_sidebar('sidebar-3');?>
                    </div>
                <?php }?>

            </div>
        </div>
        <!-- End row -->
    </div>
</div>
<!--End of Blog Area-->

<?php
get_footer();
