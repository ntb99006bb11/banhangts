<?php
/*
**   ==============================   
**    Nest Ecommerce Footer File
**   ==============================
*/
global $nest_theme_mod; 
 ?>
                        </div>
                    </div>
                </div>
            <div class="cart_notice"></div>
                <?php get_template_part('template-parts/footer/default', 'footer'); ?>
            </div>
            <?php if(function_exists('nest_mini_cart_mobile')): nest_mini_cart_mobile(); endif; ?>
          
            <?php // mobile nav  ?>
                <?php do_action('nest_custom_mobile_menu'); //nest_quick_view();?>
            <?php // mobile nav  ?>
            
            <?php if(!empty($nest_theme_mod['mobile_floating_enable']) == true): ?>
            <?php // mobile Floating Menu  ?>
        
                <?php do_action('get_custom_mobile_menu'); //nest_mobile_floating_menu();?>
    
            <?php // mobile Floating Menu  ?>
   
            <?php endif; ?>
            <?php // filter side content ?>
            <?php if(!empty($nest_theme_mod['filter_content_enable']) == true): ?>
                <?php if(is_post_type_archive('product') || is_tax( 'product_cat')  || is_tax('product_tag')): ?>
            <?php if(is_active_sidebar('filter-sidebar')): ?>
                <div class="srollbar filter_side_content">
                <div class="nest_filter_btn_close"><i class="fas fa-times"></i></div>
                        <div class="content">
                      
                            <?php dynamic_sidebar('filter-sidebar') ?>
                        </div>
                </div>
            <?php endif; ?>
            <?php endif; ?>
            <?php endif; ?>
            <?php // filter side content ?>
 
            <?php if(!empty($nest_theme_mod['bactotop_enable']) == true): ?>
                <a class="scrollUp"><i class="fi-rs-arrow-small-up"></i></a>    
            <?php endif; ?>
            <!--page_wapper-->
            </div>
       
		    <div class="wcqv_contend"> 
   
            </div>
	
        <?php wp_footer(); ?>
 
    </body>
</html>