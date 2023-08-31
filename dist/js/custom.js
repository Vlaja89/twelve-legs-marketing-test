jQuery(function($){

    // Remove Href Tag On First Menu Item
    $('ul').find('li:has(ul)').children('a').removeAttr('href')

    // Display Submeni on Parent Click
    $('.menu-item-has-children').children('a').on('click', function(event){
        event.preventDefault();
        $(this).next('.sub-menu').slideToggle(100).end().parent('.menu-item-has-children').siblings('.menu-item-has-children').children('a').next('.sub-menu').slideUp(100);
    });

    // Open menu 
    (function () {
        $('.hamburger-menu').on('click', function() {
          $('.bar').toggleClass('animate');
          var mobileNav = $('.mobile-nav');
          mobileNav.toggleClass('hide show');
        })
      })();

    // Fixed hamburger menu when it is open
    $(".hamburger-menu").click(function(){
        $(".hamburger-menu").toggleClass("hamb-fixed");
    });

       // variables ftw!
       var win = $(window);
    
       // fire it once on document.ready
       resizeHandler();
       
       // Fires on every resize   
       win.resize(resizeHandler);
       
        function resizeHandler() {
           if (win.width() <= 991) {
            
                // Woo Category Slider
                $('.cat-slider').slick({
                    infinite: false,
                    dots: false,
                    arrows: false,
                    speed: 1200,
                    autoplay: false,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    swipeToSlide: true,
                    variableWidth: true,
                    responsive: [
                    {
                        breakpoint: 767,
                        settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        swipeToSlide: true,
                        arrows: false,
                        variableWidth: true
                        }
                    }
                    ]
                });
            }
            
           if (win.width() <= 767) {
            
            //Toggle 
            $('.showBtn').click(function() {
                //$('.hideme').hide();  
                if ($(this).hasClass('active')) {    
                    $(this).removeClass('active');
                    $('.hideme').slideUp();
                } else {
                    $('.hideme').slideUp();
                    $('.showBtn').removeClass('active');
                    $(this).addClass('active');
                    $(this).next().filter('.hideme').slideDown();
                }
            });
       
        }
   
    }
    
});