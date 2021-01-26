try {
    require('./bootstrap');
    window.$ = window.jQuery = require('jquery');
} catch (e) {}

let page = 1;

$( ".js-more-proposals" ).click(function() {
    $.get( "/proposal/all-ajax/" + (page + 1), function( data ) {
        if (data) {
            $( ".js-cards" ).append( data );
            page++;
        } else {
            $( ".js-more-proposals" ).remove();
        }
    });
});
