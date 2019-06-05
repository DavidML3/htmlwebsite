<?php
/**
* The header for our theme
*
* This is the template that displays all of the <head> section and everything up until <div id="content">
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package corporatecorner
*/

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="wrapper">
<!-- Header Start -->
<header id="header" class="modern">
	<div class="top-bar">
		 <div class="container">
			<div class="row">
				<?php if (get_theme_mod('bpt_header_location')!='') {?>
				 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<ul class="top-nav nav-left">
							 <li>
								<p><span class="ti-location-pin"></span> <?php echo esc_html(get_theme_mod('bpt_header_location'));?></p>
							 </li>
						</ul>
				 </div>
				<?php }?>
				<?php if (get_theme_mod('bpt_header_social')!='') {?>
				 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
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
				<?php }?>
			</div>
		 </div>
	</div>
	<div class="container">
		 <div class="main-header">
				<div class="row">
					 <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<div class="bu-logo bu-logo-dark">
								 <div class="bu-media">
										<figure>
					                        <?php
					                            if (has_custom_logo()) {
					                                 the_custom_logo();
					                            } else { ?>
					                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="brand"> 
					                                    <h1 class='site-title'><?php bloginfo( 'name' ) ?></h1>
					                                    <?php
					                                    $description = get_bloginfo( 'description' );
					                                    if ( $description ) {
					                                        echo  '<p class="site-description">' . esc_html( $description ) . '</p>' ;
					                                    }
					                                echo "</a>";
					                            }
					                        ?>
					                    </figure>
								 </div>
							</div>
					 </div>
					 <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
							<div class="bu-main-nav">
								 <div class="nav-top-section">
										<div class="row">
											 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
												<?php if(get_theme_mod('bpt_header_mobile')!=''){?>
												<div class="img-holder">
													 <figure><span class="ti-mobile"></span></figure>
												</div>
												<div class="text-holder">
													 <p><?php echo esc_html(get_theme_mod('bpt_header_mobile'));?></p>
												</div>
												<?php }?>
											</div>
											<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
												<?php if(get_theme_mod('bpt_header_email')!=''){?>
												<div class="img-holder">
													 <figure><span class="ti-email"></span></figure>
												</div>
												<div class="text-holder">
													 <p><?php echo esc_html(get_theme_mod('bpt_header_email'));?></p>
												</div>
												<?php }?>
											</div>
											<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
												<?php if(get_theme_mod('bpt_header_time')!=''){?>
												<div class="img-holder">
													 <figure><span class="ti-time"></span></figure>
												</div>
												<div class="text-holder">
													 <p><?php echo esc_html(get_theme_mod('bpt_header_time'));?></p>
												</div>
												<?php }?>
											 </div>
										</div>
								 </div>
								<nav class="main-navigation">
								 	<ul>
								 		<?php
		                                    wp_nav_menu( array(
		                                        'theme_location'    => 'menu-1',
		                                        'depth'             => 3,
		                                        'container'         => '',
		                                        'container_class'   => '',
		                                        'items_wrap'      => '%3$s',
		                                        'container_id'      => '',
		                                        'menu_class'        => '',
		                                        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
		                                        'walker'            => new WP_Bootstrap_Navwalker())
		                                    );
		                                ?>
		                                <li class="bu-search-area">
											<div class="search-area">
												 <a href="#"><span class="ti ti-search "></span></a>
												<form role="search" action="<?php echo esc_url(site_url('/')); ?>" method="get">
													<div class="input-holder">
														 <div class="wrap-input100">
																<input class="input100" name="s" placeholder="<?php echo esc_html__('Enter your keywords','corporatecorner');?>" type="text">
																<span class="focus-input100"></span>
														 </div>
														 <label class="search-click">
														 <span class="ti-search"></span>
														 <input type="submit" value="search">
														 </label>
													</div>
												</form>
											</div>
										</li>
									</ul>
								</nav>
							</div>
					 </div>
				</div>
		 </div>
	</div>
</header>


<?php  do_action('corporatecorner_parallax_window');?>


<!-- Main Start -->
<div id="main" class="mt-60">
<div class="container">
<div class="row">