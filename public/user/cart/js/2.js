$(document).ready(function () {
   
    $('.pay-1 ').on("click",function(){

       console.log('đã vào hàm');
       $('.pay-1-1').slideToggle(500);


    }) 
    $('.pay-1-1').slideUp();
});