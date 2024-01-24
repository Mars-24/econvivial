$(document).ready(function() {

    AOS.init({
        duration: 700,
        offset: -40,
        easing: 'ease-in-out-sine'
    });

   // $('#myModal').modal();

    new WOW().init();

    $('.navbar-fostrap').click(function() {
        $('.nav-fostrap').toggleClass('visible');
        $('body').toggleClass('cover-bg');
    });

    // STICKY NAV
    $(window).scroll(function() {
        if ($(window).scrollTop() > 130) {
            $('.menu-bar').addClass('fixed');
        } else {
            $('.menu-bar').removeClass('fixed');
        }
    });

    // HERO SLIDER OPTIONS
    $(".slider-container").ikSlider({
        speed: 500,
        infinite: true,
        responsive: true,
        cssEase: "ease-in-out"
    });

    // CONSEILS SLIDER
    $(".conseils-slider").ikSlider({
        speed: 500,
        infinite: true,
        responsive: true,
        arrows: false,
        cssEase: "ease-in-out"
    });

    // CONSEILS SLIDER OPTIONS
    $('.thumbs').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1
    });

    // PARTNER SLIDER OPTIONS
    $('.partner__slider').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 5,
        slidesToScroll: 1,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

});
