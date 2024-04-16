jQuery(function($) {
    "use strict";
    if ($('.woocommerce-shop').length) {
    $('ul.products').infiniteScroll({
        // options
        path: '.scrollproduct .page-numbers .next',
        append: '.product',
        history: false,
        status: '.scroller-status',
        hideNav: '.page-numbers', 
    });
}
});