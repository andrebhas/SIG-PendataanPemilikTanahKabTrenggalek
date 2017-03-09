"use strict";
$(window).load(function() {
    $('.preloader img').fadeOut();
    $('.preloader').fadeOut(1000);
});

$(document).ready(function() {
    new WOW().init();

    // ====================our projects================

    var owl = $("#owl-demo");

    owl.owlCarousel({
        nav: true,
        loop: true,
        pagination: false
    });

    $(".next1").click(function() {
        owl.trigger('owl.next');
    });
    $(".prev").click(function() {
        owl.trigger('owl.prev');
    });

    // ===========================================
    // ====================our clients section==========
    $(".clients").owlCarousel({ autoPlay: 2000 });

    var x = $('.our-team-members');
    x.owlCarousel({
        items: 4,
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [990, 2],
        pagination: false

    });
    $(".next1").click(function() {
        x.trigger('owl.next');
    });
    $(".prev").click(function() {
        x.trigger('owl.prev');
    });
    // ====================================


    $('.news_slider').bxSlider({
        infiniteLoop: true,
        hideControlOnEnd: true,
        pager: false,
        nextText: ' ',
        prevText: ' '
    });

    $('.photo_slider').bxSlider({
        minSlides: 3,
        maxSlides: 4,
        slideWidth: 250,
        pager: false,
        auto: true,
        controls: false
    });



    $('.news').owlCarousel({
        autoPlay: 2000,
        items: 2,
        itemsDesktop: [1199, 2],
        itemsDesktopSmall: [990, 2]
    });

    $('.collapse').on('shown.bs.collapse', function() {
        $(this).parent().find("i").removeClass("fa-plus").addClass("fa-minus");
    }).on('hidden.bs.collapse', function() {
        $(this).parent().find("i").removeClass("fa-minus").addClass("fa-plus");
    });
});
$('.accordion section').click(function() {
    $.toggleClass('active').find('i').toggleClass('fa-plus fa-minus')
        .closest('section').siblings('section')
        .removeClass('active').find('i')
        .removeClass('fa-minus').addClass('fa-plus');

});


$(document).ready(function() {
    /*------------page load animation end------------*/

    $('.tabs .tab-links a').on('click', function(e) {
        var currentAttrValue = $(this).attr('href');

        // Show/Hide Tabs
        $('.tabs ' + currentAttrValue).show().siblings().hide();

        // Change/remove current tab to active
        $(this).parent('li').addClass('active').siblings().removeClass('active');

        e.preventDefault();

        // animated nav css

    });
    $(window).scroll(function() {
        if ($(document).scrollTop() > 50) {
            $(".bottom").addClass("animated-scroll-bottom");
            $(".inner").addClass("animated-scroll-inner");
            $(".top").addClass("animated-scroll-top");
            $(".navbar-nav > li > .dropdown-menu").addClass("margin-of-mega-menu-scroll");


        } else {
            $(".bottom").removeClass("animated-scroll-bottom");
            $(".inner").removeClass("animated-scroll-inner");
            $(".top").removeClass("animated-scroll-top");


            $(".navbar-nav > li > .dropdown-menu").removeClass("margin-of-mega-menu-scroll");

        }
    });
    $(window).scroll(function() {
        if ($(this).scrollTop() > 40) {
            $('#scroll').fadeIn();

        } else {
            $('#scroll').fadeOut();

        }
        if ($(this).scrollTop() > 280) {
            $(".tp-bullets.preview2").hide();
        } else {
            $(".tp-bullets.preview2").show();
        }
    });
    $('#scroll').click(function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });
    $(".mail-ico").click(function() {
        $(".mail.ico").addClass("jqryclass");

    });

});


/*wow initialisation*/
if (typeof WOW === "function") {
    new WOW().init();
}

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-80298157-1', 'auto');
  ga('send', 'pageview');