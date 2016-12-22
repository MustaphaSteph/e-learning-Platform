(function($) {
	"use strict";
	$(document).ready(function() {

		/*  [ Dropdown ]
		- - - - - - - - - - - - - - - - - - - - */
		$( '.dropdown' ).each(function() {
			var _this = $( this );
			$( this ).find('a').on( 'click', function(e) {
				e.preventDefault();
				$( _this ).toggleClass( 'open' );
				var value = $( this ).text();
				$( _this ).find( '> ul > li > a' ).text( value );
			});
		});
		$('html').on( 'click', function(e) {
            if( $( e.target ).closest('.dropdown.open').length == 0 ) {
                $( '.dropdown' ).removeClass('open');
            }
        });

        /*  [ Sticky Header ]
        - - - - - - - - - - - - - - - - - - - - */
        $( '.site-header' ).sticky();

        /*  [ Main Menu ]
        - - - - - - - - - - - - - - - - - - - - */
        $( '.mega-menu' ).each(function() {
            $( this ).parent().addClass('has-mega-menu');
        });
        $( '.sub-menu' ).each(function() {
            $( this ).parent().addClass( 'has-child' ).find( '> a' ).append( '<span class="arrow"><i class="fa fa-caret-down"></i></span>' );
        });
        $( '.main-menu .arrow' ).on( 'click', function(e) {
            e.preventDefault();
            $( this ).parents( 'li' ).find( '> .sub-menu' ).slideToggle( 'fast' );
        });
        $( '.mobile-btn' ).on( 'click', function() {
            $( this ).parent().toggleClass('open');
        });
        if( $( '.header4' ).length ) {
            var menuItem = $( '.header4 .main-menu > ul > li' );
            var countMenuItem = menuItem.length;
            var logoWidth = $( '.site-brand' ).outerWidth();
            menuItem.eq( (countMenuItem/2) - 1 ).addClass( 'menu-left-center' ).css( 'margin-right', logoWidth/2 + 35 );
            menuItem.eq( (countMenuItem/2) ).addClass( 'menu-right-center' ).css( 'margin-left', logoWidth/2 + 35 );
        }
        $( window ).resize(function(event) {
            if( $( '.header4' ).length ) {
                var menuItem = $( '.header4 .main-menu > ul > li' );
                var countMenuItem = menuItem.length;
                var logoWidth = $( '.site-brand' ).outerWidth();
                menuItem.eq( (countMenuItem/2) - 1 ).addClass( 'menu-left-center' ).css( 'margin-right', logoWidth/2 + 35 );
                menuItem.eq( (countMenuItem/2) ).addClass( 'menu-right-center' ).css( 'margin-left', logoWidth/2 + 35 );
            }
        });

        /*  [ Style Switch ]
		- - - - - - - - - - - - - - - - - - - - */
		$( '.style-switch a' ).on( 'click', function(e) {
			e.preventDefault();
			var style = $( this ).attr( 'data-view' );
			var _this = $( this );
			$( this ).parents( '.site-content' ).find( '.layout' ).addClass('loading');
			$( this ).parent().find('a').not( this ).removeClass('active');
			$( this ).addClass('active');
			$( this ).parents( '.site-content' ).find( '.layout' ).removeClass( 'list grid' ).addClass( style );
			setTimeout( function() {
				_this.parents( '.site-content' ).find( '.layout' ).removeClass('loading');
			}, 300);
		});

        $( '.site-main' ).find( '.products .product' ).each(function() {
            var content = $( this ).find( '.p-title a' ).text(),
                shortContent = content.substr( 0, 24 );
            $( this ).find( '.p-title a' ).wrapInner('<span class="fulltext"></span>').append('<span class="shorttext">' + shortContent + ' ...</span>');
        });

		/*  [ Filter by price ]
		- - - - - - - - - - - - - - - - - - - - */
		$('#slider-range').slider({
			range: true,
			min: 0,
			max: 500,
			values: [0, 300],
			slide: function (event, ui) {
				$('#amount').text('$' + ui.values[0] + ' - $' + ui.values[1]);
			}
		});
		$('#amount').text('$' + $('#slider-range').slider('values', 0) + ' - $' + $('#slider-range').slider('values', 1));

		/*  [ Isotope ]
		- - - - - - - - - - - - - - - - - - - - */
		$( '.isotope' ).isotope({
			itemSelector: '.isotope-item',
		});

        $( '.filter ul li a' ).on( 'click', function(e) {
            e.preventDefault();
            var filterValue = $(this).attr('data-filter');
            $( '.isotope' ).isotope({
                itemSelector: '.isotope-item',
                filter: filterValue
            });
            $( this ).parents('ul').find('a').not( this ).removeClass('active');
            $( this ).addClass('active');
        });

        /*  [ Carousel Slider ]
        - - - - - - - - - - - - - - - - - - - - */
        $( '.carousel .slider' ).owlCarousel({
            items: 6,
            itemsDesktop: [1199, 6],
            itemsDesktopSmall: [979, 4],
            itemsTablet: [768, 3],
            itemsMobile: [479, 2],
            pagination: false,
            navigation: false,
        });

        /*  [ Team Slider ]
        - - - - - - - - - - - - - - - - - - - - */
        $( '.team-slider .slider' ).owlCarousel({
            items: 4,
            itemsDesktop: [1199, 4],
            itemsDesktopSmall: [989, 3],
            itemsTablet: [660, 2],
            itemsMobile: [460, 1],
            pagination: true,
            navigation: true,
            navigationText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
        });

        /*  [ Related Slider ]
        - - - - - - - - - - - - - - - - - - - - */
        $( '.related-products .slider' ).owlCarousel({
            items: 4,
            itemsDesktop: [1200, 3],
            itemsDesktopSmall: [979, 3],
            itemsTablet: [768, 2],
            itemsMobile: [430, 1],
            pagination: false,
            navigation: false,
            navigationText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
        });

        /*  [ Book Slider ]
        - - - - - - - - - - - - - - - - - - - - */
        $( '.book-slider .slider' ).owlCarousel({
            items: 2,
            itemsDesktop: [1199, 2],
            itemsDesktopSmall: [979, 1],
            itemsTablet: [768, 1],
            itemsMobile: [479, 1],
            pagination: true,
            navigation: true,
            navigationText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
        });

        /*  [ Main Slider ]
        - - - - - - - - - - - - - - - - - - - - */
        $( '.main-slider .slider' ).owlCarousel({
            singleItem: true,
            pagination: true,
            navigation: true,
            navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            afterAction: function(){
                this.$owlItems.removeClass('active');
                this.$owlItems.eq(this.currentItem).addClass('active');
            }
        });

        /*  [ Testimonial Slider ]
        - - - - - - - - - - - - - - - - - - - - */
        $( '.testimonial .slider' ).owlCarousel({
            singleItem: true,
            pagination: true,
            navigation: false,
        });

        /*  [ Courses Slider ]
        - - - - - - - - - - - - - - - - - - - - */
        $( '.courses-slider' ).owlCarousel({
            singleItem: true,
            pagination: true,
            navigation: true,
            navigationText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
        });

		/*  [ Single Product Slider ]
        - - - - - - - - - - - - - - - - - - - - */
        var sycn1 = $( '#p-preview .slider' );
        var sycn2 = $( '#p-thumbnail .slider' );

        sycn1.owlCarousel({
            singleItem: true,
            slideSpeed: 1000,
            navigation: false,
            pagination: false,
            afterAction: syncPosition,
            responsiveRefreshRate: 200,
        });

        sycn2.owlCarousel({
            items: 3,
            itemsDesktop: [1199, 3],
            itemsDesktopSmall: [979, 3],
            itemsTablet: [768, 3],
            itemsMobile: [479, 3],
            pagination: false,
            navigation: true,
            navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            responsiveRefreshRate: 100,
            afterInit: function (el) {
                el.find(".owl-item").eq(0).addClass("synced");
            }
        });

        function syncPosition(el) {
            var current = this.currentItem;
            $( sycn2 )
                .find(".owl-item")
                .removeClass("synced")
                .eq(current)
                .addClass("synced")
            if ($(".slider-images").data("owlCarousel") !== undefined) {
                center(current)
            };
        }

        $( sycn2 ).on("click", ".owl-item", function (e) {
            e.preventDefault();
            var number = $(this).data("owlItem");
            sycn1.trigger("owl.goTo", number);
        });

        function center(number) {
            var sycn2visible = sycn2.data("owlCarousel").owl.visibleItems;
            var num = number;
            var found = false;
            for (var i in sycn2visible) {
                if (num === sycn2visible[i]) {
                    var found = true;
                }
            }

            if (found === false) {
                if (num > sycn2visible[sycn2visible.length - 1]) {
                    sycn2.trigger("owl.goTo", num - sycn2visible.length + 2)
                } else {
                    if (num - 1 === -1) {
                        num = 0;
                    }
                    sycn2.trigger("owl.goTo", num);
                }
            } else if (num === sycn2visible[sycn2visible.length - 1]) {
                sycn2.trigger("owl.goTo", sycn2visible[1])
            } else if (num === sycn2visible[0]) {
                sycn2.trigger("owl.goTo", num - 1)
            }
        }

        /*  [ prettyPhoto ]
        - - - - - - - - - - - - - - - - - - - - */
        $("a[data-gal^='prettyPhoto'], a.video").prettyPhoto({
            hook: 'data-gal',
            animation_speed:'normal',
            theme:'light_square',
            slideshow:3000,
            social_tools: false
        });

        /*  [ Add minus and plus number quantity ]
        - - - - - - - - - - - - - - - - - - - - */
        $( 'input.number' ).each( function() {
            $( this ).wrap( '<div class="number-wrap"></div>' );
            var form_cart = $( this ).parent();
            form_cart.prepend( '<span class="minus"><i class="fa fa-caret-down"></i></span>' );
            form_cart.append( '<span class="plus"><i class="fa fa-caret-up"></i></span>' );

            var minus = form_cart.find( $( '.minus' ) );
            var plus  = form_cart.find( $( '.plus' ) );

            minus.on( 'click', function(){
                var qty = $( this ).parent().find( '.number' );
                if ( qty.val() <= 1 ) {
                    qty.val( 1 );
                } else {
                    qty.val( ( parseInt( qty.val(), 10 ) - 1 ) );
                }
            });
            plus.on( 'click', function(){
                var qty = $( this ).parent().find( '.number' );
                qty.val( ( parseInt( qty.val(), 10 ) + 1 ) );
            });
        });

        /*  [ Tabs ]
        - - - - - - - - - - - - - - - - - - - - */
        $( '.tabs-container' ).each(function() {
            $( this ).find( '.tabs li:first-child a' ).addClass('active');
            $( this ).find( '.tab-content' ).not(':first').hide();

            $( this ).find('.tabs li a').on( 'click' , function(e) {
                e.preventDefault();
                var selector = $(this).attr('href');
                $(this).parent().parent().find('a').not(this).removeClass('active');
                $(this).addClass('active');
                $(this).parents('.tabs-container').find('.tab-content').not(selector).animate({
				    opacity: 0,
			    }, 300, 'swing', function() {
			        $( this ).hide();
			    });
                $(this).parents('.tabs-container').find(selector).animate({
				    opacity: 1,
			    }, 300, 'swing', function() {
			        $( this ).show();
			    });
            });
        });

        /*  [ Nav Scroll ]
        - - - - - - - - - - - - - - - - - - - - */
        $( '.nav-scroll li a' ).on( 'click', function(e) {
            e.preventDefault();
            var section = $( this ).attr( 'href' );
            $( 'html, body' ).stop().animate({
            'scrollTop': $( section ).offset().top
            }, 500, 'swing');
        });

        function onScroll(event){
            var scrollPos = $(document).scrollTop();
            $('.nav-scroll a').each(function () {
                var currLink = $(this);
                var refElement = $(currLink.attr('href'));
                if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
                    $('.nav-scroll li a').removeClass('active');
                    currLink.addClass('active');
                }
                else{
                    currLink.removeClass("active");
                }
            });
        }
        $(document).on("scroll", onScroll);

        /*  [ Comment Rating ]
        - - - - - - - - - - - - - - - - - - - - */
        $( '.comment-rating a' ).on( 'click', function(e) {
        	e.preventDefault();
        	var rating = $( this ).attr( 'data-rating' );
        	$( this ).parent().find( 'a' ).not( this ).removeClass( 'active' );
        	$( this ).addClass( 'active' ).parent().find( 'input' ).val( rating );
        });

        /*  [ Animate Elements ]
         - - - - - - - - - - - - - - - - - - - - */
        var $animation_elements_in = $('.animation-element.fade-in');
        var $animation_elements_left = $('.animation-element.fade-left');
        var $animation_elements_right = $('.animation-element.fade-right');
        var $window = $(window);

        function check_if_in_view() {
            var window_height = $window.height();
            var window_top_position = $window.scrollTop();
            var window_bottom_position = (window_top_position + window_height);

            $.each($animation_elements_in, function() {
                var $element = $(this);
                var element_height = $element.outerHeight();
                var element_top_position = $element.offset().top;
                var element_bottom_position = (element_top_position + element_height);

                //check to see if this current container is within viewport
                if ((element_bottom_position >= window_top_position+100) &&
                    (element_top_position <= window_bottom_position)) {
                    $element.addClass('animated fadeInUp');
                }
            });

            $.each($animation_elements_left, function() {
                var $element = $(this);
                var element_height = $element.outerHeight();
                var element_top_position = $element.offset().top;
                var element_bottom_position = (element_top_position + element_height);

                //check to see if this current container is within viewport
                if ((element_bottom_position >= window_top_position+100) &&
                    (element_top_position <= window_bottom_position)) {
                    $element.addClass('animated fadeInLeft');
                }
            });

            $.each($animation_elements_right, function() {
                var $element = $(this);
                var element_height = $element.outerHeight();
                var element_top_position = $element.offset().top;
                var element_bottom_position = (element_top_position + element_height);

                //check to see if this current container is within viewport
                if ((element_bottom_position >= window_top_position+100) &&
                    (element_top_position <= window_bottom_position)) {
                    $element.addClass('animated fadeInRight');
                }
            });
        }
        $window.on('scroll resize', check_if_in_view);
        $window.trigger('scroll');

        $( window ).load(function() {
            /*  [ Page loader ]
            - - - - - - - - - - - - - - - - - - - - */
            $( 'body' ).addClass( 'loaded' );
            setTimeout(function () {
                $('#pageloader').fadeOut();
            }, 500);
        });
	});
})(jQuery);