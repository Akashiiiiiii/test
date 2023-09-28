jQuery(function($) {

    /* -----------------------------------------
    Preloader
    ----------------------------------------- */
    $('#preloader').delay(1000).fadeOut();
    $('#loader').delay(1000).fadeOut("slow");

    /* -----------------------------------------
    Navigation
    ----------------------------------------- */
    $('.menu-toggle').click(function() {
        $(this).toggleClass('open');
    });

    /* -----------------------------------------
    Sticky Header
    ----------------------------------------- */
    const header = document.querySelector('.bottom-header-part');
    window.onscroll = function() {
        if (window.pageYOffset > 200) {
            header.classList.add('fix-header');
        } else {
            header.classList.remove('fix-header');
        }
    };
    $(document).ready(function() {
        var divHeight = $('.bottom-header-part').height();
        $('.bottom-header-outer-wrapper').css('min-height', divHeight + 'px');
    });

    /* -----------------------------------------
    Keyboard Navigation
    ----------------------------------------- */
    $(window).on('load resize', function() {
        if ($(window).width() < 992 && $(window).width() >= 768) {
            $('.main-navigation').find("a").unbind('keydown');
            $('.main-navigation').find("li").last().bind('keydown', function(e) {
                if (e.which === 9) {
                    e.preventDefault();
                    $('#masthead').find('.menu-toggle').focus();
                }
            });
        } else if ($(window).width() < 768) {
            $('.main-navigation').find("li").unbind('keydown');
            $('.main-navigation').find("a").last().bind('keydown', function(e) {
                if (e.which === 9) {
                    e.preventDefault();
                    $('#masthead').find('.menu-toggle').focus();
                }
            });
        } else {
            $('.main-navigation').find("li").unbind('keydown');
            $('.main-navigation').find("a").unbind('keydown');
        }
    });

    var primary_menu_toggle = $('#masthead .menu-toggle');
    primary_menu_toggle.on('keydown', function(e) {
        var tabKey = e.keyCode === 9;
        var shiftKey = e.shiftKey;

        if (primary_menu_toggle.hasClass('open')) {
            if (shiftKey && tabKey) {
                e.preventDefault();
                $('.main-navigation').toggleClass('toggled');
                primary_menu_toggle.removeClass('open');
            };
        }
    });

    $('.header-search-wrap').find(".search-submit").bind('keydown', function(e) {
        var tabKey = e.keyCode === 9;
        if (tabKey) {
            e.preventDefault();
            $('.header-search-icon').focus();
        }
    });

    $('.header-search-icon').on('keydown', function(e) {
        var tabKey = e.keyCode === 9;
        var shiftKey = e.shiftKey;
        if ($('.header-search-wrap').hasClass('show')) {
            if (shiftKey && tabKey) {
                e.preventDefault();
                $('.header-search-wrap').removeClass('show');
                $('.header-search-icon').focus();
            }
        }
    });

    /* -----------------------------------------
    Search
    ----------------------------------------- */
    var searchWrap = $('.header-search-wrap');
    $(".header-search-icon").click(function(e) {
        e.preventDefault();
        searchWrap.toggleClass("show");
        searchWrap.find('input.search-field').focus();
    });
    $(document).click(function(e) {
        if (!searchWrap.is(e.target) && !searchWrap.has(e.target).length) {
            $(".header-search-wrap").removeClass("show");
        }
    });

    /* -----------------------------------------
    Main Slider
    ----------------------------------------- */
    $('.main-slider').slick({
        autoplay: false,
        dots: false,
        nextArrow: '<button class="slick-next fas fa-angle-right ascendoor-carousel-btn"></button>',
        prevArrow: '<button class="slick-prev fas fa-angle-left ascendoor-carousel-btn"></button>',
        adaptiveHeight: false,
    });

    /* -----------------------------------------
    Brands Slider
    ----------------------------------------- */
    $('.brand-slider').slick({
        autoplay: true,
        arrows: false,
        adaptiveHeight: true,
        slidesToShow: 5,
        responsive: [{
                breakpoint: 1025,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });

    /* -----------------------------------------
    Blog Slider layout 1
    ----------------------------------------- */
    $('.blog-style-1 .business-vibes-blog-section-wrapper').slick({
        autoplay: false,
        nextArrow: '<button class="slick-next fas fa-angle-right ascendoor-carousel-btn"></button>',
        prevArrow: '<button class="slick-prev fas fa-angle-left ascendoor-carousel-btn"></button>',
        adaptiveHeight: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [{
                breakpoint: 1025,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    arrows: false,
                    dots: true,
                }
            }
        ]
    });

    /* -----------------------------------------
    Testimonial slider style 1
    ----------------------------------------- */
    $('.testimonial-style-1 .business-vibes-testimonial-slider').slick({
        nextArrow: '<button class="slick-next fas fa-angle-right ascendoor-carousel-btn"></button>',
        prevArrow: '<button class="slick-prev fas fa-angle-left ascendoor-carousel-btn"></button>',
        adaptiveHeight: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [{
                breakpoint: 1025,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });

    /* -----------------------------------------
    Testimonial slider style 2
    ----------------------------------------- */
    
    $('.testimonial-style-2 .business-vibes-testimonial-slider').slick({
        nextArrow: '<button class="slick-next fas fa-angle-right ascendoor-carousel-btn"></button>',
        prevArrow: '<button class="slick-prev fas fa-angle-left ascendoor-carousel-btn"></button>',
        adaptiveHeight: true,
        slidesToShow: 1,
        slidesToScroll: 1,
    });

    /* -----------------------------------------
    Circular Progressbar
    ----------------------------------------- */
    function animateElements() {
        $('.progressbar').each(function() {
            var elementPos = $(this).offset().top;
            var topOfWindow = $(window).scrollTop();
            var percent = $(this).find('.circle').attr('data-percent');
            var percentage = parseInt(percent, 10) / parseInt(100, 10);
            var animate = $(this).data('animate');
            if (elementPos < topOfWindow + $(window).height() - 30 && !animate) {
                $(this).data('animate', true);
                $(this).find('.circle').circleProgress({
                    startAngle: -Math.PI / 2,
                    value: percent / 100,
                    emptyFill: "rgba(237,241,244, .3)",
                }).on('circle-animation-progress', function(event, progress, stepValue) {
                    $(this).find('div').text((stepValue * 100).toFixed(1) + "%");
                }).stop();
            }
        });
    }

    // Show animated elements
    animateElements();
    $(window).scroll(animateElements);

    /* -----------------------------------------
    Linear Progressbar
    ----------------------------------------- */
    $('.progress-bar-container').each(function() {
        $(this).find('.progress-bar-inner').animate({
            width:$(this).attr('data-percentage')+ "%"
        },2000);
    });
    $('.progress-percent').append("%");
    // https://codepen.io/Bachieee/embed/rxLoNQ?default-tab=html%2Cresult&theme-id=dark

    /* -----------------------------------------
    Counter
    ----------------------------------------- */
    if ($('#business_vibes_counter_section').length) {
        var counted = 0;
        $(window).on('load scroll', function() {
            var oTop = $('#business_vibes_counter_section').offset().top - window.innerHeight;
            if (counted == 0 && $(window).scrollTop() > oTop) {
                $('.count').each(function() {
                    var $this = $(this),
                        countTo = $this.attr('data-count');
                    $({
                        countNum: $this.text()
                    }).animate({
                        countNum: countTo
                    }, {
                        duration: 2000,
                        easing: 'swing',
                        step: function() {
                            $this.text(Math.floor(this.countNum));
                        },
                        complete: function() {
                            $this.text(this.countNum);
                        }
                    });
                });
                counted = 1;
            }
        });
    }

    /* -----------------------------------------
    Featured Video
    ----------------------------------------- */
    $('.business-vibes-video-popup').magnificPopup({
        type: 'iframe',
        mainClass: 'mfp-fade',
        preloader: true,
    });

    /* -----------------------------------------
    Scroll Top
    ----------------------------------------- */
    var scrollToTopBtn = $('.business-vibes-scroll-to-top');

    $(window).scroll(function() {
        if ($(window).scrollTop() > 400) {
            scrollToTopBtn.addClass('show');
        } else {
            scrollToTopBtn.removeClass('show');
        }
    });

    scrollToTopBtn.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, '300');
    });

});