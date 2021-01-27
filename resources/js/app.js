try {
    require('./bootstrap');
    window.$ = window.jQuery = require('jquery');
} catch (e) {}

let page = 1;

let finishData = false;

$( "[data-js-proposal-cards]" ).bind('mousewheel', function(e){
    if (finishData) {
        return;
    }

    let nextPage = page + 1;

    $.ajax({
        url: "/proposal/all-ajax/" + nextPage,
        async: false
    })
        .done(function( data ) {
            if (data) {
                $( "[data-js-proposal-cards]" ).append( data );
                page = nextPage;
            } else {
                finishData = true;
            }
        })
        .fail(function() {
            $("#myToast").toast({
                delay: 2000
            }).toast('show');
        });
});
