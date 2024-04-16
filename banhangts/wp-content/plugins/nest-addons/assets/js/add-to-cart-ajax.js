 

(function ($) {
    "use strict";
    jQuery(function($) {
        var noticesHtml;
        
        $(document).on('click', 'a.ajax_add_to_cart', function(e){
            e.preventDefault();
            var $thisbutton = $(this);
            var formData = new FormData();
            formData.append('add-to-cart', $thisbutton.attr( 'data-product_id' ));
            $( document.body ).trigger( 'adding_to_cart', [ $thisbutton, formData ] );
            $.ajax({
                url: wc_add_to_cart_params.wc_ajax_url.toString().replace( '%%endpoint%%', 'ace_add_to_cart' ),
                data: formData,
                type: 'POST',
                processData: false,
                contentType: false,
                complete: function( response ) {
                    response = response.responseJSON;
                    if ( ! response ) {
                        return;
                    }
                    if ( response.error && response.product_url ) {
                        window.location = response.product_url;
                        return;
                    }
                    if ( wc_add_to_cart_params.cart_redirect_after_add === 'yes' ) {
                        window.location = wc_add_to_cart_params.cart_url;
                        return;
                    }
                    $( document.body ).trigger( 'added_to_cart', [ response.fragments, response.cart_hash, $thisbutton ] );
                    noticesHtml = response.fragments.notices_html;
                    $(noticesHtml).appendTo('.cart_notice').delay(3000).fadeOut(300, function(){
                        $(this).remove();
                    });
                    $('.cartnotice_close').on('click', function(){
                        $(this).closest('.woocommerce-message, .woocommerce-error').remove();
                    });
                },
                dataType: 'json'
            });
        });
        
        
    });  
}(jQuery));
