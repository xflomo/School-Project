$(window).load(function () {

});


$('.menu-burger').on('click', function () {
   $('.menu-overlay').fadeIn();
   $('.side-nav').fadeIn();
   $('.side-nav').css('left', '0px');
});