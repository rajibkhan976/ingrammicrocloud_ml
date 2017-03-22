$(document).ready(function() {

    // Grid
    $('.grid').isotope({
        itemSelector: '.grid-item',
        percentPosition: true,
        masonry: {
            columnWidth: '.grid-sizer'
        }
    });
    // /Grid
    
    // Session Slider
    $('.session-slider').slick({
        "slidesToShow": 1,
        "slidesToScroll": 1,
        dots: false,
        arrows: true,
        prevArrow: $('.prev'),
        nextArrow: $('.next'),
        autoplay: true,
        autoplaySpeed: 4000,
        asNavFor: '.session-slider'
    });
    // /Session Slider
    
    // Testimonial Slider
    $('.testimonial-slider').slick({
        "slidesToShow": 3,
        "slidesToScroll": 3,
        arrows: true,
        prevArrow: $('.prev1'),
        nextArrow: $('.next1'),
        asNavFor: '.testimonial-slider'
    });
    // /Testimonial Slider
    
    // Sponsor Slider
    $('.sponsor-slider').slick({
        "slidesToShow": 3,
        "slidesToScroll": 3,
    });
    // /Sponsor Slider
    
    //Colorbox Pop for Video
    $(".colorbox").colorbox({iframe:true, innerWidth:'45%', innerHeight:'55%'});
    
    // $('.reg-btn').hover(function(){
    //     $(this).children('.sub-menu').slideDown('fast');
    // }, function(){
    //     $(this).children('.sub-menu').slideUp('fast');
    // });
    
    $('.mini-menu').click(function(){
        $('.micro-menu').toggle('fast');
        //$('.micro-menu').slideDown();
    });
    
    //Colorbox Pop for Registration
    $(".inline-pop").colorbox({inline:true, width:"320px"});
    //$(".colorbox").colorbox({width: '85%', , height: '80%', scalePhotos: 'true'});
    
    //WOW animation library
    new WOW().init();
});