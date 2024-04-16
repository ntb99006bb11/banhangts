<?php
/**
 *  Dokan Dashboard Template
 *
 *  Dokan Main Dashboard template for Front-end
 *
 *  @since 2.5
 *
 *  @package dokan
 */

$user = get_user_by( 'id', get_current_user_id() );
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

                <article class="dashboard-content-area woocommerce edit-account-wrap">

                    <?php wc_print_notices();?>

                    <h1 class="entry-title"><?php esc_html_e( 'Edit Account Details', 'steelthemes-nest' ); ?></h1>

                    <form class="edit-account" action="" method="post">

                        <?php do_action( 'woocommerce_edit_account_form_start' ); ?>

                        <p class="form-row form-row-first">
                            <label for="account_first_name"><?php esc_html_e( 'First name', 'steelthemes-nest' ); ?> <span class="required">*</span></label>
                            <input type="text" class="input-text" name="account_first_name" id="account_first_name" value="<?php echo esc_attr( $user->first_name ); ?>" />
                        </p>

                        <p class="form-row form-row-last">
                            <label for="account_last_name"><?php esc_html_e( 'Last name', 'steelthemes-nest' ); ?> <span class="required">*</span></label>
                            <input type="text" class="input-text" name="account_last_name" id="account_last_name" value="<?php echo esc_attr( $user->last_name ); ?>" />
                        </p>
                        <div class="clear"></div>

                        <p class="form-row form-row-wide">
                            <label for="account_email"><?php esc_html_e( 'Email address', 'steelthemes-nest' ); ?> <span class="required">*</span></label>
                            <input type="email" class="input-text" name="account_email" id="account_email" value="<?php echo esc_attr( $user->user_email ); ?>" />
                        </p>

                        <fieldset>
                            <legend><?php esc_html_e( 'Password Change', 'steelthemes-nest' ); ?></legend>

                            <p class="form-row form-row-wide">
                                <label for="password_current"><?php esc_html_e( 'Current Password (leave blank to leave unchanged)', 'steelthemes-nest' ); ?></label>
                                <input type="password" class="input-text" name="password_current" id="password_current" />
                            </p>

                            <p class="form-row form-row-wide">
                                <label for="password_1"><?php esc_html_e( 'New Password (leave blank to leave unchanged)', 'steelthemes-nest' ); ?></label>
                                <input type="password" class="input-text" name="password_1" id="password_1" />
                            </p>

                            <p class="form-row form-row-wide">
                                <label for="password_2"><?php esc_html_e( 'Confirm New Password', 'steelthemes-nest' ); ?></label>
                                <input type="password" class="input-text" name="password_2" id="password_2" />
                            </p>
                        </fieldset>

                        <div class="clear"></div>

                        <?php do_action( 'woocommerce_edit_account_form' ); ?>

                        <p>
                            <?php wp_nonce_field( 'dokan_save_account_details' ); ?>
                            <input type="submit" class="dokan-btn dokan-btn-danger dokan-btn-theme" name="dokan_save_account_details" value="<?php esc_attr_e( 'Save changes', 'steelthemes-nest' ); ?>" />
                            <input type="hidden" name="action" value="dokan_save_account_details" />
                        </p>

                        <?php do_action( 'woocommerce_edit_account_form_end' ); ?>

                    </form>

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
                        <?php $copy_right_l =  get_theme_mod('copy_right_left' , '2022 © Nest   ( Wordpress Ecommerce Wordpress Theme).');
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

