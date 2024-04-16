<?php
/*
**   ==============================   
**    Nest Ecommerce Mini Cart
**   ==============================
*/
function  nest_mini_cart_mobile(){ 
?>
<div class="side_bar_cart" id="mini_cart">
    <div class="cart_overlay"></div>
    <div class="cart_right_conten">
        <div class="close">
            <div class="close_btn_mini">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg">
                <line x1="1" y1="11" x2="11" y2="1" stroke="white" stroke-width="2" />
                <line x1="1" y1="1" x2="11" y2="11" stroke="white" stroke-width="2" />
            </svg>
        </div>
    </div>
    <div class="cart_content_box">
    <?php  global $woocommerce;
        ob_start();
        woocommerce_mini_cart();
        $mini_cart = ob_get_clean();
        $mini_content = sprintf( '	<div class="widget_shopping_cart_content">%s</div>', $mini_cart );
        printf(
            '<div class="contnet_cart_box">%s</div>', 
            $mini_content
        );?>
        </div>
    </div>
</div>
<?php
} 
?>