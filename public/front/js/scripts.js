


$(function () {

    "use strict";

    var wind = $(window);


    /* ----------------------------------------------------------------
                    [  ]
    -----------------------------------------------------------------*/

    $('.nav-mobile .mnav-icon').on('click', '.nav-icon', function () {

        $(".nav-mobile .colaps-menu").slideToggle();

    });

    $('.nav-mobile .colaps-menu').on('click', '.nvmenu .drop', function(){
        $(this).next('.menu').slideToggle();
    });


    /* ----------------------------------------------------------------
                [ Sections Background Image With Data ]
-----------------------------------------------------------------*/

    var pageSection = $(".bg-img, section");
    pageSection.each(function (indx) {

        if ($(this).attr("data-background")) {
            $(this).css("background-image", "url(" + $(this).data("background") + ")");
        }
    });

    /* ----------------------------------------------------------------
                    [ Carousel ]
    -----------------------------------------------------------------*/

    $('.slider').slick({
        autoplay: true,
        draggable: true,
        fade: true,
        speed: 8000,
        infinite: true,
        cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
        touchThreshold: 100,
        dots: false,
        arrows: false,
        rtl: true
    });


    $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: false,
        arrows: true,
        asNavFor: '.slider-nav',
        rtl: true
    });

    $('.slider-nav').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: false,
        asNavFor: '.slider-for',
        dots: false,
        arrows: true,
        focusOnSelect: true,
        rtl: true
    });


    $('.testim .clients-slider').slick({
        slidesToShow: 2,
        autoplay: false,
        draggable: true,
        infinite: true,
        dots: true,
        rtl: true,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });

    // products owlCarousel
    $('.carousel-three .owl-carousel').owlCarousel({
        rtl: true,
        loop: true,
        items: 3,
        margin: 0,
        dots: false,
        nav: true,
        navText: ["<span class='ti-angle-right'></span>", "<span class='ti-angle-left'></span>"],
        autoplay: true,
        smartSpeed: 400,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    });


    /* ----------------------------------------------------------------
                [ price ]
    -----------------------------------------------------------------*/

    $(".price input").on('click', function () {
        $(".price .slider-range").toggleClass("show");
    });


    /* ----------------------------------------------------------------
                    [ ul.tabs ]
    -----------------------------------------------------------------*/

    $('ul.tabs .tab-link').click(function () {
        var tab_id = $(this).attr('data-tab');

        $('ul.tabs .tab-link').removeClass('current');
        $('.tab-content').removeClass('current');

        $(this).addClass('current');
        $("#" + tab_id).addClass('current');
    });

});



// === window When Loading === //

$(window).on("load", function () {

    var wind = $(window);

    /* ----------------------------------------------------------------
                    [ Preloader ]
    -----------------------------------------------------------------*/

    $(".loading").fadeOut(500);

});


/* ----------------------------------------------------------------
                [ profile image preview ]
-----------------------------------------------------------------*/

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}



