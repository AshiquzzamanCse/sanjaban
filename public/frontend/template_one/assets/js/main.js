(function ($) {
    "use strict";

    // meanmenu

    jQuery("#mobile-menu").meanmenu({
        meanMenuContainer: ".mobile-menu",

        meanScreenWidth: "1199",
    });

    // minicart toggle

    $(document).ready(function () {
        $(".mini__cart--link").on("click", function (event) {
            event.stopPropagation();
            $(".mini__cart--box").slideToggle(); // Toggle the minicart visibility
        });

        // Close minicart on click outside (excluding minicart itself)
        $(document).on('click', function(event) {
            if (!$(event.target).closest('.mini__cart--box, #navbarDropdown').length) {
              $(".mini__cart--box").slideUp();
            }
          });

        // Prevent clicks within the mini cart from closing it
        $(".mini__cart--box").on("click", function (event) {
            event.stopPropagation();
        });
    });

    // menu

    $(".dept__menu-mlink").on("click", function () {
        $(this).parents(".dept__menu").toggleClass("dept__menu--hover");

        $(this).siblings(".dept__menu--dropdown").toggleClass("open");
    });

    $("body").on("click", function (e) {
        if ($(e.target).is(".dept__menu-mlink")) {
            return;
        }

        $(".dept__menu--dropdown").removeClass("open");

        $(".dept__menu").addClass("dept__menu--hover");
    });

    $("select").niceSelect();

    // One Page Nav

    var top_offset = $(".header-area").height() - 10;

    $(".main-menu nav ul").onePageNav({
        currentClass: "active",

        scrollOffset: top_offset,
    });

    // data - background

    $("[data-background]").each(function () {
        $(this).css(
            "background-image",
            "url(" + $(this).attr("data-background") + ")"
        );
    });

    $(window).on("scroll", function () {
        var scroll = $(window).scrollTop();

        if (scroll < 245) {
            $(".header-sticky").removeClass("sticky");
        } else {
            $(".header-sticky").addClass("sticky");
        }
    });

    // mainSlider

    function mainSlider() {
        var BasicSlider = $(".slider-active");

        BasicSlider.on("init", function (e, slick) {
            var $firstAnimatingElements = $(".single-slider:first-child").find(
                "[data-animation]"
            );

            doAnimations($firstAnimatingElements);
        });

        BasicSlider.on(
            "beforeChange",
            function (e, slick, currentSlide, nextSlide) {
                var $animatingElements = $(
                    '.single-slider[data-slick-index="' + nextSlide + '"]'
                ).find("[data-animation]");

                doAnimations($animatingElements);
            }
        );

        BasicSlider.slick({
            autoplay: true,

            autoplaySpeed: 6000,

            dots: true,

            fade: true,

            arrows: false,

            responsive: [
                {
                    breakpoint: 767,

                    settings: {
                        dots: false,

                        arrows: false,
                    },
                },
            ],
        });

        function doAnimations(elements) {
            var animationEndEvents =
                "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend";

            elements.each(function () {
                var $this = $(this);

                var $animationDelay = $this.data("delay");

                var $animationType = "animated " + $this.data("animation");

                $this.css({
                    "animation-delay": $animationDelay,

                    "-webkit-animation-delay": $animationDelay,
                });

                $this
                    .addClass($animationType)
                    .one(animationEndEvents, function () {
                        $this.removeClass($animationType);
                    });
            });
        }
    }

    mainSlider();

    // product active

    $(".product__active").owlCarousel({
        loop: true,
        autoplay: true,
        autoplayTimeout: 6000, // Time between slides in milliseconds
        autoplayHoverPause: true, // Pause on hover
        margin: 0,
        items: 1,
        navText: [
            '<i class="fa fa-angle-left"></i>',
            '<i class="fa fa-angle-right"></i>',
        ],
        nav: false,
        dots: false,
        responsive: {
            0: {
                items: 1,
            },

            767: {
                items: 3,
            },

            992: {
                items: 4,
            },

            1199: {
                items: 4,
            },
        },
    });

    // product active for shop banner page

    $(".shop--banner__active").owlCarousel({
        loop: true,

        margin: 0,

        items: 1,

        navText: [
            '<i class="fa fa-angle-left"></i>',
            '<i class="fa fa-angle-right"></i>',
        ],

        nav: false,

        dots: false,

        responsive: {
            0: {
                items: 1,
            },

            767: {
                items: 2,
            },

            992: {
                items: 3,
            },

            1199: {
                items: 4,
            },
        },
    });

    // product active

    $(".product__active--two").owlCarousel({
        loop: true,

        margin: 0,

        items: 1,

        navText: [
            '<i class="fa fa-angle-left"></i>',
            '<i class="fa fa-angle-right"></i>',
        ],

        nav: false,

        dots: false,

        responsive: {
            0: {
                items: 1,
            },

            767: {
                items: 2,
            },

            992: {
                items: 3,
            },

            1199: {
                items: 3,
            },
        },
    });

    // product active small

    $(".product__active--small").owlCarousel({
        loop: true,
        autoplay: true,
        autoplayTimeout: 3000, // Time between slides in milliseconds
        autoplayHoverPause: true, // Pause on hover
        margin: 0,
        items: 1,
        navText: [
            '<i class="fa fa-angle-left"></i>',
            '<i class="fa fa-angle-right"></i>',
        ],
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1,
            },
            767: {
                items: 3,
            },
            992: {
                items: 3,
            },
        },
    });

    // owlCarousel

    $(".featured__active").owlCarousel({
        loop: true,

        margin: 0,

        items: 1,

        navText: [
            '<i class="fa fa-angle-left"></i>',
            '<i class="fa fa-angle-right"></i>',
        ],

        nav: false,

        dots: false,

        responsive: {
            0: {
                items: 1,
            },

            767: {
                items: 2,
            },

            992: {
                items: 3,
            },
        },
    });

    // categories slider active

    $(".categories-slider--active").owlCarousel({
        loop: true,

        margin: 0,

        items: 1,

        navText: [
            '<i class="fa fa-angle-left"></i>',
            '<i class="fa fa-angle-right"></i>',
        ],

        nav: true,

        dots: false,

        responsive: {
            0: {
                items: 1,
            },

            767: {
                items: 3,
            },

            992: {
                items: 4,
            },

            1199: {
                items: 9,

                nav: false,
            },
        },
    });

    /* magnificPopup img view */

    $(".popup-image").magnificPopup({
        type: "image",

        gallery: {
            enabled: true,
        },
    });

    /* magnificPopup video view */

    $(".popup-video").magnificPopup({
        type: "iframe",
    });

    // isotop

    $(".grid").imagesLoaded(function () {
        // init Isotope

        var $grid = $(".grid").isotope({
            itemSelector: ".grid-item",

            percentPosition: true,

            masonry: {
                // use outer width of grid-sizer for columnWidth

                columnWidth: ".grid-item",
            },
        });
    });

    // filter items on button click

    $(".portfolio-menu").on("click", "button", function () {
        var filterValue = $(this).attr("data-filter");

        $grid.isotope({
            filter: filterValue,
        });
    });

    //for menu active class

    $(".portfolio-menu button").on("click", function (event) {
        $(this).siblings(".active").removeClass("active");

        $(this).addClass("active");

        event.preventDefault();
    });

    //slick-activation

    $(".categories-active").slick({
        dots: true,
        infinite: true, // Enable looping
        speed: 600,
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: false,
        autoplay: true, // Enable auto-slide
        autoplaySpeed: 2000, // Time between slides in milliseconds
        cssEase: "linear", // Smooth transition for continuous sliding
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true, // Enable looping
                    dots: false,
                    autoplay: true, // Auto-slide for responsive breakpoints
                    autoplaySpeed: 2000,
                    cssEase: "linear",
                },
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    dots: false,
                    infinite: true, // Enable looping
                    autoplay: true,
                    autoplaySpeed: 2000,
                    cssEase: "linear",
                },
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: false,
                    infinite: true, // Enable looping
                    autoplay: true,
                    autoplaySpeed: 2000,
                    cssEase: "linear",
                },
            },
        ],
    });



    //slick-activation

    $(".product__active-three").slick({
        dots: false,

        infinite: true,

        speed: 600,

        slidesToShow: 5,

        slidesToScroll: 1,

        arrows: false,

        responsive: [
            {
                breakpoint: 1024,

                settings: {
                    slidesToShow: 3,

                    //slidesToScroll: 3,

                    //infinite: true,

                    //dots: true
                },
            },

            {
                breakpoint: 600,

                settings: {
                    slidesToShow: 2,

                    slidesToScroll: 2,
                },
            },

            {
                breakpoint: 480,

                settings: {
                    slidesToShow: 1,

                    slidesToScroll: 1,
                },
            },

            // You can unslick at a given breakpoint now by adding:

            // settings: "unslick"

            // instead of a settings object
        ],
    });

    //brand-activation

    $(".brand-active").slick({
        dots: false,
        infinite: true,
        speed: 600,
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: false,
        centerMode: true,
        centerPadding: "10px", // Adjust this for more space
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false,
                    centerPadding: "10px",
                },
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    centerPadding: "10px",
                },
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    centerPadding: "10px",
                },
            },
        ],
    });


    //blog details page activation

    $(".blog-details-img-active").slick({
        dots: false,

        infinite: true,

        speed: 600,

        slidesToShow: 1,

        slidesToScroll: 1,

        arrows: true,

        prevArrow: '<i class="fas fa-angle-left left"></i>',

        nextArrow: '<i class="fas fa-angle-right right"></i>',
    });

    // scrollToTop

    $.scrollUp({
        scrollName: "scrollUp", // Element ID

        topDistance: "300", // Distance from top before showing element (px)

        topSpeed: 300, // Speed back to top (ms)

        animation: "fade", // Fade, slide, none

        animationInSpeed: 200, // Animation in speed (ms)

        animationOutSpeed: 200, // Animation out speed (ms)

        scrollText: '<i class="icofont icofont-long-arrow-up"></i>', // Text for element

        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
    });

    //range slider activation

    $("#slider-range").slider({
        range: true,

        min: 0,

        max: 500,

        values: [75, 200],

        slide: function (event, ui) {
            $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
        },
    });

    $("#amount").val(
        "$" +
            $("#slider-range").slider("values", 0) +
            " - $" +
            $("#slider-range").slider("values", 1)
    );

    // WOW active

    new WOW().init();

    // count down

    $("[data-countdown]").each(function () {
        var $this = $(this),
            finalDate = $(this).data("countdown");

        $this.countdown(finalDate, function (event) {
            $this.html(
                event.strftime(
                    '<div class="time-count">%D <span>days</span></div><div class="time-count">%H <span>hour</span></div><div class="time-count">%M <span>minute</span></div><div class="time-count">%S <span>Second</span></div>'
                )
            );
        });
    });
})(jQuery);
