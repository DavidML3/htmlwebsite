<?php
/**
* The sidebar containing the main widget area
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package corporatecorner
*/

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
return;
}
?>

<aside class="section-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>
