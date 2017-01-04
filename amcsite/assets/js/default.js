jQuery(document).ready(function($) {
    new WOW().init();
    $('.parallax').parallax();
    $('.bxslider').bxSlider({
        auto: true,
        controls: false,
        pager: false,
        pause: 6000,
        autoHover: true

    });
    $('.button-collapse').sideNav({
            menuWidth: 250, // Default is 240
            edge: 'left', // Choose the horizontal origin
            closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
            draggable: true // Choose whether you can drag to open on touch screens
        }
    );
});
