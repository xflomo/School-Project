var owl = $('.owl-carousel');


$(window).load(function () {
    var options={
        margin: 0,
        nav: true,
        items: 1,
        animateOut: 'slideOutDown',
        animateIn: 'flipInX',
        onInitialize: initCardCounter,
    };
    owl.owlCarousel(options);

    $('#karteikarte .karteikart-content').textfill({
        minFontPixels: 22,
    });

    var totalCards = $('.karteikarte .item').length;

});




owl.on('changed.owl.carousel', function (e) {
    var currentCard = e.item.index + 1;
    var maxCards = e.item.count;
    $('.anzahl-karten span').text("Karte "+currentCard+" von "+maxCards);
});


function initCardCounter(event) {
    var items     = event.item.count;
    $('.anzahl-karten span').text("Karte 1 von "+items);
}