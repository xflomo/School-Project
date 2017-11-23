$(window).load(function () {
    $('.menu-burger').on('click', function () {
        openMenu();
    });

    $('.menu-overlay').on('click', function () {
        closeMenu();
    });
    $('.close-btn').on('click', function () {
        closeMenu();
    });
});


$(document).keyup(function(e) {
    // Escape click
    if(e.keyCode == 27){
        closeMenu();
    }
});

function openMenu() {
    $('.menu-overlay').fadeIn();
    $('.side-nav').fadeIn();
    $('.side-nav').css('left', '0px');
}

function closeMenu() {
    $('.menu-overlay').fadeOut();
    var left = $('.side-nav').width() * -1;
    $('.side-nav').css('left', left+'px');


    setTimeout(function(){
        $('.side-nav').fadeOut();
    }, 200);

}