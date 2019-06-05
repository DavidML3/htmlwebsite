<?php
/**
 * Displays footer site info
 *
 * @package corporatecorner
 */

?>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
	<div class="copyright-text">
		<p><a href="<?php echo esc_url( __( 'https://wordpress.org/', 'corporatecorner' ) ); ?>">
			<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'corporatecorner' ), 'WordPress' );
			?>
		</a>
		<span class="sep"> | </span>
		<?php
		/* translators: 1: Theme name, 2: Theme author. */
		printf( esc_html__( 'Theme: %1$s by %2$s.', 'corporatecorner' ), 'corporatecorner', '<a href="'.esc_url( __( 'https://www.buyprotheme.com/', 'corporatecorner' ) ).'">'.esc_html__('BuyProTheme', 'corporatecorner').'</a>' );
		?></p>
    </div>
</div>
