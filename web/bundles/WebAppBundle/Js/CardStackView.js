var owl = $('.owl-carousel');

$(window).load(function () {
    $(".flip-card-effect").flip({
        trigger: 'manual',
    });

    var options={
        margin: 0,
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

    
    $('.turn-card-action-btn').on('click', function () {
        turnCardAndCheckUserInput();
    });

    $('.turn-card-back-action-btn').on('click', function () {
        turnCardBack();
    });


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
    $('.btn-enter.turn-card-back-action-btn').hide();
    $('.btn-enter.turn-card-action-btn').show();
}

function turnCardAndCheckUserInput() {
    $(".owl-item.active .flip-card-effect").flip(true);
    $('.btn-enter.turn-card-back-action-btn').show();
    $('.btn-enter.turn-card-action-btn').hide();
}

function turnCardBack() {
    $(".owl-item.active .flip-card-effect").flip(false);
    $('.btn-enter.turn-card-back-action-btn').hide();
    $('.btn-enter.turn-card-action-btn').show();
}