<?php
/**
 *  Dokan Dashboard Orders Template
 *
 *  Load order related template
 *
 *  @since 2.4
 *
 *  @package dokan
 */
?>

<?php do_action( 'dokan_dashboard_wrap_start' ); ?>

    <div class="dokan-dashboard-wrap">
    <div class="sidebar_rewirte_dok_dash">
            <div class="logo_dokan_dash">
                <?php   $dokan_dsh_logo = get_theme_mod('dokan_dashboard_logo' , get_template_directory_uri() . '/assets/images/logo.svg'); ?>
                <a href="<?php  echo esc_url(home_url()); ?>"><img src="<?php echo esc_url($dokan_dsh_logo); ?>" alt="dokan_logo" /></a>
            </div>
        <?php

            /**
             *  dokan_dashboard_content_before hook
             *
             *  @hooked get_dashboard_side_navigation
             *
             *  @since 2.4
             */
            do_action( 'dokan_dashboard_content_before' );
            do_action( 'dokan_order_content_before' );

        ?>
        </div>
        <div class="dokan-dashboard-content dokan-orders-content">

            <?php

                /**
                 *  dokan_order_content_inside_before hook
                 *
                 *  @hooked show_seller_enable_message
                 *
                 *  @since 2.4
                 */
                do_action( 'dokan_order_content_inside_before' );
            ?>


            <article class="dokan-orders-area">

                <?php

                    /**
                     *  dokan_order_inside_content Hook
                     *
                     *  @hooked dokan_order_listing_status_filter
                     *  @hooked dokan_order_main_content
                     *
                     *  @since 2.4
                     */
                    do_action( 'dokan_order_inside_content' );

                ?>

            </article>


            <?php

                /**
                 *  dokan_order_content_inside_after hook
                 *
                 *  @since 2.4
                 */
                do_action( 'dokan_order_content_inside_after' );
            ?>
<footer class="main-footer font-xs">
                <div class="row pb-30 pt-15">
                    <div class="col-sm-6">
                        <?php $copy_right_l =  get_theme_mod('copy_right_left' , '2022 ©  Nest ( Wordpress Ecommerce Wordpress Theme).');
                         echo esc_attr($copy_right_l); ?>
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end">
                        <?php $copy_right_r =  get_theme_mod('copy_right_right' , 'All rights reserved');
                         echo esc_attr($copy_right_r); ?>    
                        </div>
                    </div>
                </div>
            </footer>
        </div> <!-- #primary .content-area -->

        <?php

            /**
             *  dokan_dashboard_content_after hook
             *  dokan_order_content_after hook
             *
             *  @since 2.4
             */
            do_action( 'dokan_dashboard_content_after' );
            do_action( 'dokan_order_content_after' );

        ?>

    </div><!-- .dokan-dashboard-wrap -->

<?php do_action( 'dokan_dashboard_wrap_end' ); ?>