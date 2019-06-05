<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package VW Tour Lite
 */

get_header(); ?>
    <div id="content-vw">
        <div class="container">
            <div class="page-content">
                <h1><?php printf( '<strong>%s</strong> %s', esc_html__( '404', 'vw-tour-lite' ), esc_html__( 'Not Found', 'vw-tour-lite' ) ) ?></h1>
                <p class="text-404"><?php esc_html_e( 'Looks like you have taken a wrong turn', 'vw-tour-lite' ); ?></p>
                <p class="text-404"><?php esc_html_e( 'Dont worry&hellip it happens to the best of us.', 'vw-tour-lite' ); ?></p>
                <div class="read-moresec">
                    <a href="<?php echo esc_url( home_url() ); ?>" class="button"><?php esc_html_e( 'Return to the home page', 'vw-tour-lite' ); ?></a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>