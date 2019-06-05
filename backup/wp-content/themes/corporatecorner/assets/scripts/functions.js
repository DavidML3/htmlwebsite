jQuery(document).ready(function($) {
    'use strict';
    if (jQuery('.main-navigation>ul').length != '') {
        jQuery('.main-navigation>ul').slicknav();
    }
    jQuery(document).on('click', '.search-area a', function(e) {
        e.preventDefault();
        jQuery(this).siblings('form').toggle(500);
    });
    jQuery(document).on('click', '.search-area', function() {
        jQuery(this).find(jQuery('.ti')).toggleClass('ti-search ti-close');
    });
    if (jQuery('.blog-detail-slider').length != '') {
        jQuery('.blog-detail-slider').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
        });
    }
    if (jQuery('.counter').length != '') {
        jQuery('.counter').counterUp({
            delay: 10,
            time: 1000
        });
    }
    jQuery(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        jQuery(this).ekkoLightbox();
    });
    jQuery(window).scroll(function() {
        var scroll = jQuery(window).scrollTop();
        if (scroll >= 155) {
            jQuery('#header').addClass('fixed-header');
        } else {
            jQuery('#header').removeClass('fixed-header');
        }
    });
    jQuery('.dropdown-menu').parents('li').addClass('menu-item-has-children');
    jQuery('#menu-primary').removeAttr('id');
    jQuery('#menu-primary').removeClass('dropdown-menu');
    jQuery('body').on('click', '.slicknav_btn,.slicknav_item', function(event) {
        jQuery('.slicknav_nav').find('ul').removeClass('dropdown-menu');
    });
});
jQuery(window).on('load', function() {
    if (jQuery('#posts').length != '') {
        var jQuerycontainer = jQuery('#posts').isotope({
            itemSelector: '.item',
            isFitWidth: true
        });
        jQuery(window).smartresize(function() {
            jQuerycontainer.isotope({
                columnWidth: '.col-sm-3'
            });
        });
        jQuerycontainer.isotope({
            filter: '*'
        });
        jQuery('#filters').on('click', 'button', function() {
            var filterValue = jQuery(this).attr('data-filter');
            jQuerycontainer.isotope({
                filter: filterValue
            });
        });
    }

    // replace widget_search button
    jQuery('.widget_search input[type="submit"]').remove();
    jQuery('.widget_search label').append('<button type="submit"><i class="ti ti-search "></i></button>')


});