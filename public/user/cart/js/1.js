$(document).ready(function () {
    console.log('đã vào hàm');

    $('.menutren ul li:nth-child(1) a').on('click', function () {
        event.preventDefault();
        console.log($('.chapter1').offset().top);
       $('html,body').animate({scrollTop : $('.chapter1').offset().top}, 1400,"easeOutExpo");
    });
    $('.menutren ul li:nth-child(2) a').on('click', function () {
        event.preventDefault();
        console.log($('.chapter2').offset().top);
       $('html,body').animate({scrollTop : $('.chapter2').offset().top}, 1400,"easeOutElastic");
    });
    $('.menutren ul li:nth-child(3) a').on('click', function () {
        event.preventDefault();
        console.log($('.chapter3').offset().top);
       $('html,body').animate({scrollTop : $('.chapter3').offset().top}, 1400,"easeOutBounce");
    });
    $('.menutren ul li:nth-child(4) a').on('click', function () {
        event.preventDefault();
        console.log($('.chapter4').offset().top);
       $('html,body').animate({scrollTop : $('.chapter4').offset().top}, 1400,"easeOutBack");
    });

    
   
});