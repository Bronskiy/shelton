/*=======================================
[Start Activation Code]
=========================================
	01. Mobile Menu JS
	02. Mobile Menu JS
	03. Nice Select JS
	04. Circle Progress JS
	05. Trips Slider JS
	06. Testimonial Slider JS
	07. Testimonial Slider Two JS
	08. Client Carousel JS
	09. Home Slider JS
	10. Counter JS
	11. Youtube Player JS
	12. Trip Single Slider JS
	13. Wow JS
	14. Parallax JS
	15. Video Popup JS
	16. Date Picker JS
	17. Scroll UP JS
	18. Others JS
=========================================
[End Activation Code]
=========================================*/
(function($) {
    "use strict";
     $(document).on('ready', function() {

       /*====================================
       01. Comment Form
       ======================================*/
       $("#open-comment-form").click(function(){
           $(".comments-form form").toggle();
       });


		/*====================================
		01. Sticky Header JS
		======================================*/
		jQuery(window).on('scroll', function() {
			if ($(this).scrollTop() > 150) {
				$('.site-header').addClass("sticky");
			} else {
				$('.site-header').removeClass("sticky");
			}
		});

		/*====================================
		02. Mobile Menu
		======================================*/
		$('.menu').slicknav({
			prependTo:".mobile-nav",
			duration: 600,
			closeOnClick:true,
		});

		/*====================================
		03.	Nice Select
		======================================*/
		$('select').niceSelect();

		/*====================================
		04.	Circle Progress
		======================================*/
		$('.circle').circleProgress({
			fill: {
			color: '#FF7550'
			}
		})

		/*===============================
		05. Trips Slider
		=================================*/
		$(".trips-slider").owlCarousel({
			loop:true,
			autoplay:true,
			smartSpeed: 500,
			autoplayTimeout:3500,
			singleItem: true,
			autoplayHoverPause:true,
			margin:30,
			dots:false,
			nav:true,
			navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
			responsive:{
				300: {
					items:1,
				},
				480: {
					items:2,
				},
				768: {
					items:2,
				},
				1170: {
					items:3,
				},
			}
		});

		/*===============================
		06.	Testimonial Slider JS
		=================================*/
		$(".testimonial-slider").owlCarousel({
			loop:true,
			autoplay:true,
			smartSpeed: 500,
			autoplayTimeout:3500,
			singleItem: true,
			autoplayHoverPause:true,
			items:1,
			nav:true,
			navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
			dots:false,
		});

		/*===============================
		07.	Testimonial Slider Two
		=================================*/
		$(".testimonial-slider-two").owlCarousel({
			loop:true,
			autoplay:false,
			smartSpeed: 500,
			autoplayTimeout:3500,
			singleItem: true,
			autoplayHoverPause:true,
			center:false,
			nav:false,
			margin:30,
			responsive:{
				300: {
					items:1,
				},
				480: {
					items:1,
				},
				768: {
					items:2,
				},
				1170: {
					items:2,
				},
			}
		});

		/*===============================
		08.	Clients Carousel JS
		=================================*/
		$(".clients-slider").owlCarousel({
			loop:true,
			autoplay:true,
			smartSpeed: 500,
			autoplayTimeout:2000,
			singleItem: true,
			autoplayHoverPause:true,
			center:false,
			margin:30,
			nav:false,
			dots:false,
			responsive:{
				300: {
					items:1,
				},
				480: {
					items:2,
				},
				768: {
					items:4,
				},
				1170: {
					items:5,
				},
			}
		});

		/*===============================
		09.	Home Slider JS
		=================================*/
		$(".slider-active").owlCarousel({
			loop:true,
			autoplay:true,
			smartSpeed: 700,
			autoplayTimeout:3500,
			singleItem: true,
			autoplayHoverPause:true,
			center:false,
			nav:true,
			navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
			dots:false,
			items:1,
		});

		/*===============================
		10. Counter JS
		=================================*/
		$('.number').counterUp({
			time: 1000
		});

		/*====================================
		11. Youtube Player JS
		======================================*/
		$('.player').mb_YTPlayer();

		/*===============================
		12.	Trip Single Slider JS
		=================================*/
		$(".gallery-slider").owlCarousel({
			loop:true,
			autoplay:true,
			smartSpeed: 500,
			autoplayTimeout:2500,
			animateIn: 'fadeIn',
			animateOut: 'fadeOut',
			singleItem: true,
			autoplayHoverPause:true,
			center:false,
			margin:0,
			items:1,
			dots:false,
			nav:true,
			navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
		});

		/*====================================
		13.	Wow JS
		======================================*/
		var window_width = $(window).width();
			if(window_width > 767){
            new WOW().init();
		}

		/*======================================
		14.	Parallax JS
		======================================*/
		$(window).stellar({
            responsive: true,
            positionProperty: 'position',
			horizontalOffset: 0,
			verticalOffset: 0,
            horizontalScrolling: false
        });


		/*=====================================
		15.  Video Popup
		======================================*/
		$('.video-popup').magnificPopup({
			type: 'iframe',
			removalDelay: 300,
			mainClass: 'mfp-fade'
		});


		/*=====================================
		16.  Date Picker JS
		======================================*/
		$( function() {
      $( "#datetimepicker" ).datetimepicker({
        locale: 'ru',
        stepping: 30,
        sideBySide: true
      });
      $( "#datetimepicker2" ).datetimepicker({
        locale: 'ru',
        stepping: 30,
        sideBySide: true
      });
      /*
			$( "#datepicker" ).datepicker();
			$( "#datepicker2" ).datepicker();
      */
		});

		/*=====================================
		17. Scroll Up
		======================================*/
		$.scrollUp({
			scrollName: 'scrollUp',      // Element ID
			scrollDistance: 300,         // Distance from top/bottom before showing element (px)
			scrollFrom: 'top',           // 'top' or 'bottom'
			scrollSpeed: 1000,            // Speed back to top (ms)
			easingType: 'easeInQuad',        // Scroll to top easing (see http://easings.net/)
			animation: 'slide',           // Fade, slide, none
			animationSpeed: 200,         // Animation speed (ms)
			scrollTrigger: false,        // Set a custom triggering element. Can be an HTML string or jQuery object
			scrollTarget: false,         // Set a custom target element for scrolling to. Can be element or number
			scrollText: ["<i class='fa fa-angle-up'></i>"], // Text for element, can contain HTML
			scrollTitle: false,          // Set a custom <a> title if required.
			scrollImg: false,            // Set true to use image
			activeOverlay: false,        // Set CSS color to display scrollUp active point, e.g '#00FFFF'
			zIndex: 323332           // Z-Index for the overlay
		});

		$('.single-faq .faq-title').on('click', function() {
            $(".single-faq .faq-title").removeClass("active");
            $(this).addClass("active");
		});
	});
		/*=====================================
		18. Others JS
		======================================*/
		$( function() {
			$( "#slider-range" ).slider({
			  range: true,
			  min: 0,
			  max: 500,
			  values: [ 0, 500 ],
			  slide: function( event, ui ) {
				$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
			  }
			});
			$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
			  " - $" + $( "#slider-range" ).slider( "values", 1 ) );
		} );

		/*
		$(window).on('load', function() {
				$('.cp-preloader').fadeOut('slow', function(){
				$(this).remove();
			});
		});
    */
})(jQuery);
