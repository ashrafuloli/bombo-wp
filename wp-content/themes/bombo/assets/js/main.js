(function ($) {
    "use strict";

    //preloader activation
    var win = $(window);
    win.on('load', function () {
        $('#preloader').delay(350).fadeOut('slow');
        $('body').delay(350).css({
            'overflow': 'visible'
        });
    })

    // data bg
    $("[data-background]").each(function () {
        $(this).css("background-image", "url(" + $(this).attr("data-background") + ")")
    })

    $("[data-bg-color]").each(function () {
        $(this).css("background-color", $(this).attr("data-bg-color"))
    })

    $("[data-top-space]").each(function () {
        $(this).css("padding-top", $(this).attr("data-top-space"))
    })

    // meanmenu
    $('#mobile-menu-active').metisMenu();

    $('#mobile-menu-active .has-children > a').on('click', function (e) {
        e.preventDefault();
    });

    $(".open-mobile-menu > a").on("click", function (e) {
        e.preventDefault();
        $(".slide-bar").addClass("show");
        $("body").addClass("on-side");
        $('.body-overlay').addClass('active');
        $(this).addClass('active');
    });

    $(".close-mobile-menu > a").on("click", function (e) {
        e.preventDefault();
        $(".slide-bar").removeClass("show");
        $("body").removeClass("on-side");
        $('.body-overlay').removeClass('active');
        $('.open-mobile-menu > a').removeClass('active');
    });

    $('.body-overlay').on('click', function () {
        $(this).removeClass('active');
        $(".slide-bar").removeClass("show");
        $("body").removeClass("on-side");
        $('.open-mobile-menu > a').removeClass('active');
    });

    // menu-last class
    $('.main-menu nav > ul > li').slice(-4).addClass('menu-last');

    //mobile side menu
    $('.side-toggle').on('click', function () {
        $('.side-info').addClass('info-open');
        $('.offcanvas-overlay').addClass('overlay-open');
    })

    $('.side-info-close,.offcanvas-overlay').on('click', function () {
        $('.side-info').removeClass('info-open');
        $('.offcanvas-overlay').removeClass('overlay-open');
    })

    //sticky menu activation
    win.on('scroll', function () {
        var scroll = win.scrollTop();
        if (scroll < 60) {
            $(".header-sticky").removeClass("sticky-menu");
        } else {
            $(".header-sticky").addClass("sticky-menu");
        }
    });

    function heroActive() {
        // data - background
        $("[data-background]").each(function () {
            $(this).css("background-image", "url(" + $(this).attr("data-background") + ")")
        })

        $("[data-bg-color]").each(function () {
            $(this).css("background-color", $(this).attr("data-bg-color"))
        })

        $("[data-top-space]").each(function () {
            $(this).css("padding-top", $(this).attr("data-top-space"))
        })
    }

    /* magnificPopup img view */
    $('.popup-image').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        }
    });

    /* magnificPopup video view */
    $('.popup-video').magnificPopup({
        type: 'iframe'
    });


    // nice select
    $(".footer__widget select,.widget select,.post-text select").niceSelect();


    //venobox activation
    $('.venobox').venobox();


    // Scroll To Top Js
    function smoothSctollTop() {
        $('.smooth-scroll a').on('click', function (event) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                event.preventDefault();
                $('html, body').stop().animate({
                    scrollTop: target.offset().top - 0
                }, 1500);
            }
        });
    }

    smoothSctollTop();

    // Show or hide the sticky footer button
    win.on('scroll', function (event) {
        if ($(this).scrollTop() > 600) {
            $('#scroll').fadeIn(200)
        } else {
            $('#scroll').fadeOut(200)
        }
    });

    //Animate the scroll to yop
    $('#scroll').on('click', function (event) {
        event.preventDefault();

        $('html, body').animate({
            scrollTop: 0,
        }, 1500);
    });


    // WOW active
    var wow = new WOW(
        {
            mobile: false,       // trigger animations on mobile devices (default is true)
        }
    );
    wow.init();

    // Slider active
    function mainSlider() {
        var BasicSlider = $('.slider-active');
        BasicSlider.on('init', function (e, slick) {
            var $firstAnimatingElements = $('.single-slider:first-child').find('[data-animation]');
            doAnimations($firstAnimatingElements);
        });
        BasicSlider.on('beforeChange', function (e, slick, currentSlide, nextSlide) {
            var $animatingElements = $('.single-slider[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
            doAnimations($animatingElements);
        });
        BasicSlider.slick({
            autoplay: false,
            autoplaySpeed: 10000,
            dots: false,
            fade: true,
            arrows: false,
            responsive: [
                {breakpoint: 767, settings: {dots: false, arrows: false}}
            ]
        });

        function doAnimations(elements) {
            var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
            elements.each(function () {
                var $this = $(this);
                var $animationDelay = $this.data('delay');
                var $animationType = 'animated ' + $this.data('animation');
                $this.css({
                    'animation-delay': $animationDelay,
                    '-webkit-animation-delay': $animationDelay
                });
                $this.addClass($animationType).one(animationEndEvents, function () {
                    $this.removeClass($animationType);
                });
            });
        }
    }

    // Featured activation
    function featuredSlider2() {
        if (jQuery(".btestimonial-active").length > 0) {
            let atestimonial1 = new Swiper('.btestimonial-active', {
                slidesPerView: 3,
                spaceBetween: 30,
                // direction: 'vertical',
                loop: true,

                // If we need pagination
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },

                // And if we need scrollbar
                scrollbar: {
                    el: '.swiper-scrollbar',
                },
                breakpoints: {
                    // when window width is >= 320px
                    320: {
                        slidesPerView: 1,
                        spaceBetween: 20
                    },
                    // when window width is >= 480px
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 30
                    },
                    // when window width is >= 640px
                    992: {
                        slidesPerView: 3,
                        spaceBetween: 40
                    },
                    1200: {
                        slidesPerView: 3,
                        spaceBetween: 40
                    }
                },
                a11y: false
            });
        }
    }

    // testimonial activation
    function featuredSlider() {
        if (jQuery(".featured-active").length > 0) {
            let atestimonial1 = new Swiper('.featured-active', {
                slidesPerView: 4,
                spaceBetween: 30,
                // direction: 'vertical',
                loop: true,
                autoplay: true,

                // If we need pagination
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },

                // Navigation arrows
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },

                // And if we need scrollbar
                scrollbar: {
                    el: '.swiper-scrollbar',
                },
                breakpoints: {
                    // when window width is >= 320px
                    320: {
                        slidesPerView: 1,
                        spaceBetween: 20
                    },
                    // when window width is >= 480px
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 30
                    },
                    // when window width is >= 640px
                    992: {
                        slidesPerView: 3,
                        spaceBetween: 40
                    },
                    1200: {
                        slidesPerView: 4,
                        spaceBetween: 40
                    }
                },
                a11y: false
            });
        }
    }

    mainSlider();
    featuredSlider();
    featuredSlider2();

    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/slider.default', mainSlider);
        elementorFrontend.hooks.addAction('frontend/element_ready/testimonial_slider.default', featuredSlider);
        elementorFrontend.hooks.addAction('frontend/element_ready/testimonial_slider.default', featuredSlider2);
    });

})(jQuery);