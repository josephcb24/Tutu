/*	
 * Developed by: Active IT zone
 * Date	: 14 July, 2015
 * Active Supershop eCommerce CMS
 * http://codecanyon.net/user/activeitezone
 */


var App = function () {

    function handleBootstrap() {
        /*Bootstrap Carousel*/
        jQuery('.carousel').carousel({
            interval: 15000,
            pause: 'hover'
        });

        /*Tooltips*/
        jQuery('.tooltips').tooltip();
        jQuery('.tooltips-show').tooltip('show');      
        jQuery('.tooltips-hide').tooltip('hide');       
        jQuery('.tooltips-toggle').tooltip('toggle');       
        jQuery('.tooltips-destroy').tooltip('destroy');       

        /*Popovers*/
        jQuery('.popovers').popover();
        jQuery('.popovers-show').popover('show');
        jQuery('.popovers-hide').popover('hide');
        jQuery('.popovers-toggle').popover('toggle');
        jQuery('.popovers-destroy').popover('destroy');
    }

    function handleSearchV1() {
        jQuery('.search-button').click(function () {
            jQuery('.search-open').slideDown();
        });

        jQuery('.search-close').click(function () {
            jQuery('.search-open').slideUp();
        });

        jQuery(window).scroll(function(){
          if(jQuery(this).scrollTop() > 1) jQuery('.search-open').fadeOut('fast');
        });

    }

    function handleToggle() {
        jQuery('.list-toggle').on('click', function() {
            jQuery(this).toggleClass('active');
        });

        /*
        jQuery('#serviceList').on('shown.bs.collapse'), function() {
            jQuery(".servicedrop").addClass('glyphicon-chevron-up').removeClass('glyphicon-chevron-down');
        }

        jQuery('#serviceList').on('hidden.bs.collapse'), function() {
            jQuery(".servicedrop").addClass('glyphicon-chevron-down').removeClass('glyphicon-chevron-up');
        }
        */
    }

    function handleBoxed() {
        jQuery('.boxed-layout-btn').click(function(){
            jQuery(this).addClass("active-switcher-btn");
            jQuery(".wide-layout-btn").removeClass("active-switcher-btn");
            jQuery("body").addClass("boxed-layout container");
        });
        jQuery('.wide-layout-btn').click(function(){
            jQuery(this).addClass("active-switcher-btn");
            jQuery(".boxed-layout-btn").removeClass("active-switcher-btn");
            jQuery("body").removeClass("boxed-layout container");
        });
    }

    function handleHeader() {
         jQuery(window).scroll(function() {
            if (jQuery(window).scrollTop()>100){
                jQuery(".header-fixed .header-static").addClass("header-fixed-shrink");
            }
            else {
                jQuery(".header-fixed .header-static").removeClass("header-fixed-shrink");
            }
        });
    }

    function handleMegaMenu() {
        $(document).on('click', '.mega-menu .dropdown-menu', function(e) {
            e.stopPropagation()
        })
    }

    function handleScrollBar() {
        jQuery(document).ready(function ($) {
            "use strict";
            jQuery('.contentHolder').perfectScrollbar();
        });
    }

    return {
        init: function () {
            handleBootstrap();
            handleSearchV1();
            handleToggle();
            handleBoxed();
            handleHeader();
            handleMegaMenu();
            handleScrollBar();
        },

        initCounter: function () {
            jQuery('.counter').counterUp({
                delay: 10,
                time: 1000
            });
        },

        initParallaxBg: function () {
            jQuery('.parallaxBg').parallax("50%", 0.2);
            jQuery('.parallaxBg1').parallax("50%", 0.4);
        },

        initMouseWheel: function () {
            jQuery('.slider-snap').noUiSlider({
                start: [ 120, 420 ],
                snap: true,
                connect: true,
                range: {
                    'min': 0,
                    '5%': 20,
                    '10%': 40,
                    '15%': 80,
                    '20%': 120,
                    '25%': 160,
                    '30%': 200,
                    '35%': 240,
                    '40%': 280,
                    '50%': 300,
                    '60%': 340,
                    '70%': 380,
                    '80%': 420,
                    '90%': 460,
                    'max': 500
                }
            });
            jQuery('.slider-snap').Link('lower').to(jQuery('.slider-snap-value-lower'));
            jQuery('.slider-snap').Link('upper').to(jQuery('.slider-snap-value-upper'));
        },
    };

}();