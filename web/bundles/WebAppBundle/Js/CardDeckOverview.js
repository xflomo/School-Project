var cardAddBtn = $('#addDeckModal .add-card-btn');

$(window).load(function () {
    cardAddBtn.on('click', function () {
        addCardRow();
    });
});



function addCardRow() {
    var error = false;
    $('.add-card-wrapper .form-group').each(function () {
        var cardInput = $(this).find('textarea');
        if(cardInput.val().length == 0){
            $(this).find('p.error').show();
            error = true;
        }else{
            $(this).find('p.error').hide();
            error = false;
        }
    });

    if(error === false){
        // Add Input row and count up names for post data
        var addCardContent = $('.add-card-wrapper .row:last-child').clone();
        addCardContent.find('textarea').val("");
        addCardContent.find('textarea').each(function() {
            var text = $(this).attr("name");
            rowNum = parseInt(text.replace(/[^0-9\.]/g, ''));
            currentRow = rowNum;
            rowNum = ++rowNum;

            text = text.replace('card['+currentRow+']', 'card['+rowNum+']');

            $(this).attr("name", text);
        });
        addCardContent.appendTo( ".add-card-wrapper" );
    }
}