var owl = $('.owl-carousel');

$(window).load(function () {
    $(".flip-card-effect").flip({
        trigger: 'manual',
    });

    var options={
        margin: 5,
        nav: true,
        items: 1,
        smartSpeed: 800,
        onInitialize: initCardCounter,
        onChanged: changeCard
    };
    owl.owlCarousel(options);

    $('#karteikarte .karteikart-content.front').textfill({
        minFontPixels: 22,
    });

    $('#karteikarte .karteikart-content.back').textfill({
        minFontPixels: 22,
    });

    $('.flip-card-effect').on('click', function () {
        turnCard();
    });


});

$(document).keyup(function(e) {
    if(e.keyCode == 37){
        owl.trigger('prev.owl.carousel');
    }
    // Pfeil Rechts
    else if(e.keyCode == 39){
        owl.trigger('next.owl.carousel');
    }
    // Pfeil Leertaste
    else if(e.keyCode == 32){
        $( "body" ).click();
        var flip = $(".flip-card-effect").data("flip-model");
        if(flip.isFlipped){
            turnCard();
        }else{
            turnCard();
        }
    }
});

/**********************************
 *
 * Funktionen
 *
 **********************************/

function initCardCounter(event) {
    var items  = event.item.count;
    $('.anzahl-karten span').text("Karte 1 von "+items);
}

function changeCard(e) {
    // refresh counter
    var currentCard = e.item.index + 1;
    var maxCards = e.item.count;
    $('.anzahl-karten span').text("Karte "+currentCard+" von "+maxCards);

    // refresh card Flip
    refreshCardFlips();
}

function refreshCardFlips() {
    setTimeout(function(){
        $(".flip-card-effect").flip(false);
    }, 850);
}

function turnCard() {
    var flip = $(".owl-item.active .flip-card-effect").data("flip-model");
    if(flip.isFlipped){
        $(".owl-item.active .flip-card-effect").flip(false);
        $('.translation-input input').removeAttr('disabled');
    }else{
        $(".owl-item.active .flip-card-effect").flip(true);
        $('.translation-input input').attr('disabled','disabled');
    }
}