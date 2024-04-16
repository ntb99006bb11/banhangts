/*
Nest add to cart reference
https://wordpress.org/support/topic/ajax-add-to-cart-just-adding-1-item-instead-of-quantity-selected/
https://stackoverflow.com/questions/65793717/ajax-add-to-cart-for-simple-and-variable-products-on-woocommerce-single-products
https://quadlayers.com/woocommerce-ajax-add-to-cart/
*/

(function ($) {
"use strict";
  $(document).ready(function() {
        $('.product:not(.product-type-external) form.cart').on('submit', function(e) {
            e.preventDefault();
            var form = $(this);
            var formData = new FormData(form[0]);
            formData.append('add-to-cart', form.find('[name=add-to-cart]').val() );
            $.ajax({
                url: wc_add_to_cart_params.wc_ajax_url.toString().replace( '%%endpoint%%', 'ace_add_to_cart' ),
                data: formData,
                type: 'POST',
                processData: false,
                contentType: false,
                complete: function( response ) {
                    response = response.responseJSON;
                    if(!response){
                        return;
                    }
                    if(response.error && response.product_url){
                        window.location = response.product_url;
                        return;
                    }
                    if (wc_add_to_cart_params.cart_redirect_after_add === 'yes'){
                        window.location = wc_add_to_cart_params.cart_url;
                        return;
                    }
                    var $thisbutton = form.find('.single_add_to_cart_button'); //
					//var $thisbutton = null; // uncomment this if you don't want the 'View cart' button
                    // Trigger event so themes can refresh other areas.
                    $( document.body ).trigger( 'added_to_cart', [ response.fragments, response.cart_hash, $thisbutton ] );
                    // Remove existing notices
                    $( '.woocommerce-error, .woocommerce-message, .woocommerce-info' ).remove();
                    // Add new notices
                    $(response.fragments.notices_html).appendTo('.cart_notice').delay(3000).fadeOut(300000);
                    $('.cartnotice_close').on('click', function(){
                        $(this).closest('.woocommerce-message, .woocommerce-error').remove();
                    });
                }
            });
        });
    });
    
}(jQuery));