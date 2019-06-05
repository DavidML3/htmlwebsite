<?php
/**
* The template for displaying the footer
*
* Contains the closing of the #content div and all content after.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package corporatecorner
*/

?>

</div>
</div>
</div>
<!-- Main End -->

<!-- Footer Start -->
<footer id="footer">

	<?php get_template_part( 'template-parts/footer/footer', 'widgets' );?>

	<div class="container">
		 <div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				 <div class="bu-footer-logo-holder center">
						<div class="bu-footer-nav">
							 <div class="footer-nav">
							 	<?php wp_nav_menu( array( 
							 		'theme_location' => 'menu-2',
							 		'container_class' => 'footer-nav' 
							 	) );?>
							 </div>
						</div>
				 </div>
			</div>
		 </div>
	</div>

	<div class="bu-copyright">
		 <div class="container">
				<div class="row">
					<?php get_template_part( 'template-parts/footer/site', 'info' );?>
					 <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="bu-social-media">
								 <ul>
									<?php if(get_theme_mod('fb_link')!=''){?>
									    <li><a href="<?php echo esc_url(get_theme_mod('fb_link'));?>" target="_blank"><span class="ti-facebook"></span></a></li>
									<?php }?>
									<?php if(get_theme_mod('tw_link')!=''){?>
									    <li><a href="<?php echo esc_url(get_theme_mod('tw_link'));?>" target="_blank"><span class="ti-twitter"></span></a></li>
									<?php }?>
									<?php if(get_theme_mod('google_plus')!=''){?>
									    <li><a href="<?php echo esc_url(get_theme_mod('google_plus'));?>" target="_blank"><span class="ti-google-plus"></span></a></li>
									<?php }?>
									<?php if(get_theme_mod('linkedin')!=''){?>
									    <li><a href="<?php echo esc_url(get_theme_mod('linkedin'));?>" target="_blank"><span class="ti-linkedin"></span></a></li>
									<?php }?>
									<?php if(get_theme_mod('youtube')!=''){?>
									    <li><a href="<?php echo esc_url(get_theme_mod('youtube'));?>" target="_blank"><span class="ti-youtube"></span></a></li>
									<?php }?>
									<?php if(get_theme_mod('instagram')!=''){?>
									    <li><a href="<?php echo esc_url(get_theme_mod('instagram'));?>" target="_blank"><span class="ti-instagram"></span></a></li>
									<?php }?>
								 </ul>
							</div>
					 </div>
				</div>
		 </div>
	</div>
</footer>
<!-- Footer End -->

</div>
<!-- wrapper End -->

<?php wp_footer(); ?>

</body>
</html>
