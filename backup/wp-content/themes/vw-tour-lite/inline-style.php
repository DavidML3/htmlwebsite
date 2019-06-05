<?php

	$vw_tour_lite_hi_first_color = get_theme_mod('vw_tour_lite_hi_first_color');
	$custom_css ='';
	/*------------------------------ Global Color -----------*/
	if($vw_tour_lite_hi_first_color != false){
		$custom_css .='#header, .footersec, .sidebar h3,.service-text .read-more,.pagination span, .pagination a,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce span.onsale,.woocommerce button.button.alt, .woocommerce a.button.alt, .woocommerce input.button.alt,.sidebar .custom-social-icons i, input[type="submit"],.woocommerce .cart .button, .woocommerce .cart input.button,.copyright-wrapper,#slider .more-btn a:hover,nav.woocommerce-MyAccount-navigation li ,#comments input[type="submit"].submit,.sidebar input[type="submit"],.sidebar .tagcloud a:hover{';
				$custom_css .='background-color: '.esc_html($vw_tour_lite_hi_first_color).';';
		$custom_css .='}';
	}

	if($vw_tour_lite_hi_first_color != false){
		$custom_css .='header.entry-header,.sidebar aside, .sidebar .custom-social-icons, .services-box,.sidebar input[type="search"],.service-text .read-more,.woocommerce-message,.footersec .custom-social-icons i:hover,.woocommerce select.orderby,li.product{';
				$custom_css .='border-color: '.esc_html($vw_tour_lite_hi_first_color).';';
		$custom_css .='}';
	}

	if($vw_tour_lite_hi_first_color != false){
		$custom_css .='.services-box h3,.metabox .entry-date, .metabox .entry-author a, .metabox .entry-comments,.woocommerce-message::before, .woocommerce a.button:hover, .woocommerce button.button.alt:hover, .woocommerce a.button.alt:hover, .woocommerce input.button.alt:hover,.footersec .custom-social-icons i:hover,h1.woocommerce-products-header__title,p.woocommerce-result-count,.woocommerce select.orderby,h2.woocommerce-loop-product__title,.woocommerce div.product .product_title{';
				$custom_css .='color: '.esc_html($vw_tour_lite_hi_first_color).';';
		$custom_css .='}';
	}
	
	// second color

	$vw_tour_lite_hi_second_color = get_theme_mod('vw_tour_lite_hi_second_color');

	/*------------------------------ Global Color -----------*/
	if($vw_tour_lite_hi_second_color != false){
		$custom_css .='#header .nav ul.sub-menu li a:hover,#slider .more-btn a,.pagination .current,.pagination a:hover,input[type="submit"]:hover,.footersec .tagcloud a:hover,.scrollup i{';
				$custom_css .='background-color: '.esc_html($vw_tour_lite_hi_second_color).';';
		$custom_css .='}';
	}

	if($vw_tour_lite_hi_second_color != false){
		$custom_css .='#header .nav ul li a:hover{';
				$custom_css .='border-color: '.esc_html($vw_tour_lite_hi_second_color).';';
		$custom_css .='}';
	}

	// Width setting

	$theme_lay = get_theme_mod( 'vw_tour_lite_width_option','Full Width');
        if($theme_lay == 'Boxed'){
			$custom_css .='body{';
				$custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
			$custom_css .='}';
		}else if($theme_lay == 'Wide Width'){
			$custom_css .='body{';
				$custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
			$custom_css .='}';
		}else if($theme_lay == 'Full Width'){
			$custom_css .='body{';
				$custom_css .='max-width: 100%;';
			$custom_css .='}';
		}

	/*--------------------------- Slider Opacity -------------------*/

	$theme_lay = get_theme_mod( 'vw_tour_lite_slider_opacity_color','0.5');
        if($theme_lay == '0'){
			$custom_css .='#slider img{';
				$custom_css .='opacity:0';
			$custom_css .='}';
		}else if($theme_lay == '0.1'){
			$custom_css .='#slider img{';
				$custom_css .='opacity:0.1';
			$custom_css .='}';
		}else if($theme_lay == '0.2'){
			$custom_css .='#slider img{';
				$custom_css .='opacity:0.2';
			$custom_css .='}';
		}else if($theme_lay == '0.3'){
			$custom_css .='#slider img{';
				$custom_css .='opacity:0.3';
			$custom_css .='}';
		}else if($theme_lay == '0.4'){
			$custom_css .='#slider img{';
				$custom_css .='opacity:0.4';
			$custom_css .='}';
		}else if($theme_lay == '0.5'){
			$custom_css .='#slider img{';
				$custom_css .='opacity:0.5';
			$custom_css .='}';
		}else if($theme_lay == '0.6'){
			$custom_css .='#slider img{';
				$custom_css .='opacity:0.6';
			$custom_css .='}';
		}else if($theme_lay == '0.7'){
			$custom_css .='#slider img{';
				$custom_css .='opacity:0.7';
			$custom_css .='}';
		}else if($theme_lay == '0.8'){
			$custom_css .='#slider img{';
				$custom_css .='opacity:0.8';
			$custom_css .='}';
		}else if($theme_lay == '0.9'){
			$custom_css .='#slider img{';
				$custom_css .='opacity:0.9';
			$custom_css .='}';
		}else if($theme_lay == '1'){
			$custom_css .='#slider img{';
				$custom_css .='opacity:1';
			$custom_css .='}';
		}

		/*---------------------------Slider Content Layout -------------------*/

		$theme_lay = get_theme_mod( 'vw_tour_lite_slider_content_option','Center');
		   if($theme_lay == 'Left'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel h2{';
		$custom_css .='text-align:left; left:12%; right:45%';
		$custom_css .='}';
		}else if($theme_lay == 'Center'){
			$custom_css .='#slider .carousel-caption, #slider .inner_carousel h2{';
			$custom_css .='text-align:center; left:25%; right:25%;';
			$custom_css .='}';
		}else if($theme_lay == 'Right'){
			$custom_css .='#slider .carousel-caption, #slider .inner_carousel h2{';
			$custom_css .='text-align:right; left:45%; right:12%;';
			$custom_css .='}';
		}
