jQuery(document).ready(function($) {
    $(document).ready(function(){
        $('.scrollspy').scrollSpy({
            scrollOffset: 75
        });
    });

    $('ul#menu-menu_principal > li > a').bind('click', function(event) {
        $('#menu-menu_principal > li').removeClass('current-menu-item');
        $(this).parent().addClass('current-menu-item');
        /*console.log('one');
        $('html, body').stop().animate({
            scrollTop: $($(this).attr('href')).offset().top-150,
        }, 1500, 'easeInOutExpo');
        event.preventDefault();*/
    });
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
