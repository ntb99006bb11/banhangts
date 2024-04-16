<?php
/**
 *  Dokan Dashboard Template
 *
 *  Dokan Main Dashboard template for Fron-end
 *
 *  @since 2.4
 *
 *  @package dokan
 */
global $nest_theme_mod; 
$logo_dokan = get_template_directory_uri() . '/assets/images/logo.svg';
?>
<?php do_action( 'dokan_dashboard_wrap_start' ); ?>

    <div class="dokan-dashboard-wrap">
        <div class="sidebar_rewirte_dok_dash">
            <div class="logo_dokan_dash">
                <?php $dokan_dsh_logo = $nest_theme_mod['dokan_dashboard_logo']['url']; ?>
                <?php if(!empty($dokan_dsh_logo)): ?>
                    <a href="<?php  echo esc_url(home_url()); ?>"><img src="<?php echo esc_url($dokan_dsh_logo); ?>" alt="dokan_logo" /></a>
                <?php else: ?>
                    <a href="<?php  echo esc_url(home_url()); ?>"><img src="<?php echo esc_url($logo_dokan); ?>" alt="dokan_logo" /></a>
                <?php endif; ?>
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
        ?>
        </div>
        <div class="dokan-dashboard-content">

            <?php

                /**
                 *  dokan_dashboard_content_before hook
                 *
                 *  @hooked show_seller_dashboard_notice
                 *
                 *  @since 2.4
                 */
                do_action( 'dokan_dashboard_content_inside_before' );
            ?>

            <article class="dashboard-content-area">

                <?php

                    /**
                     *  dokan_dashboard_before_widgets hook
                     *
                     *  @hooked dokan_show_profile_progressbar
                     *
                     *  @since 2.4
                     */
                    do_action( 'dokan_dashboard_before_widgets' );
                ?>

                <div class="dokan_content_rewrite">

                    <?php

                        /**
                         *  dokan_dashboard_left_widgets hook
                         *
                         *  @hooked get_big_counter_widgets
                         *  @hooked get_orders_widgets
                         *  @hooked get_products_widgets
                         *
                         *  @since 2.4
                         */
                        do_action( 'dokan_dashboard_left_widgets' );
                    ?>

              
                    <?php
                        /**
                         *  dokan_dashboard_right_widgets hook
                         *
                         *  @hooked get_sales_report_chart_widget
                         *
                         *  @since 2.4
                         */
                        do_action( 'dokan_dashboard_right_widgets' );
                    ?>
           
                </div>

            </article><!-- .dashboard-content-area -->

             <?php

                /**
                 *  dokan_dashboard_content_inside_after hook
                 *
                 *  @since 2.4
                 */
                do_action( 'dokan_dashboard_content_inside_after' );
            ?>

<footer class="main-footer font-xs">
                <div class="row pb-30 pt-15">
                    <div class="col-sm-6">
                        <?php $copy_right_l =  get_theme_mod('copy_right_left' , '2022 © Nest  ( Wordpress Ecommerce Wordpress Theme).');
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
        </div><!-- .dokan-dashboard-content -->

        <?php

            /**
             *  dokan_dashboard_content_after hook
             *
             *  @since 2.4
             */
            do_action( 'dokan_dashboard_content_after' );
        ?>

    </div><!-- .dokan-dashboard-wrap -->


<?php do_action( 'dokan_dashboard_wrap_end' ); ?>
