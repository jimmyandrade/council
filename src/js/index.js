(function ( $ ) {
    "use strict";
    $( document ).ready( function() {
            $( "img.lazy" ).lazyload({
                effect : "fadeIn"
            });
        }
    );
}(jQuery));
