<?php
/**
 * Displays footer widgets if assigned
 *
 * @package corporatecorner
 */

if ( is_active_sidebar( 'sidebar-4' ) ) {
?>

<div class="bu-footer-widgets">
	<div class="container">
		<div class="row">
			<?php dynamic_sidebar( 'sidebar-4' ); ?>
		</div>
	</div>
</div>
		
<?php }?>