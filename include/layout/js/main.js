$(function (){
    "use strict";
    //Trigger Nice Scroll plugin
    $(".right-side  li").click(function(){
        $(this).addClass("active").siblings().removeClass();
         $(".articles-block .articles-content").hide();
        $($(this).data("filter")).fadeIn(500);
    });
//Smooth Scroll Div
    $(".breadcrumb li a").click(function(){
        $("html ,body").animate({scrollTop: $("#"+$(this).data("value")).offset().top-50},1000);
    });
    
    //SWIPER
    var swiper = new Swiper('.swiper-container', {
      slidesPerView: 3,
      spaceBetween: 50,
      // init: false,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      breakpoints: {
        1024: {
          slidesPerView: 2,
          spaceBetween: 40,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 30,
        },
        640: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
        320: {
          slidesPerView: 1,
          spaceBetween: 10,
        }
      }
    });
});