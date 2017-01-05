jQuery(document).ready(function($) {
    new WOW().init();
    // parallax initialization
    $('.parallax').parallax();
    // news slider initialization
    $('.bxslider').bxSlider({
        auto: true,
        controls: false,
        pager: false,
        pause: 6000,
        autoHover: true

    });
    // script pour le carousel références
    $('.slider').bxSlider({
        slideWidth: 200,
        minSlides: 3,
        maxSlides: 6,
        slideMargin: 15,
        auto: true,
        controls: true,
        pager: false,
        pause: 5000,
        autoHover: true
    });
    // mobile navigation setup
    $('.button-collapse').sideNav({
            menuWidth: 250, // Default is 240
            edge: 'left', // Choose the horizontal origin
            closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
            draggable: true // Choose whether you can drag to open on touch screens
        }
    );
});
