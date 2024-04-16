<?php
/*
====================
Register required plugins
====================
*/
add_action('tgmpa_register', 'nest_register_required_plugins');
function nest_register_required_plugins(){
        $plugins = array(
            array(
                'name' => esc_html__('Elementor', 'steelthemes-nest') ,
                'slug' => 'elementor',
                'required' => true,
                'force_activation' => false,
                'force_deactivation' => false,
            ) ,
           
            array(
                'name' => esc_html__('Nest Addons', 'steelthemes-nest') ,
                'slug' => 'nest-addons',
                'source'  => get_template_directory() . '/includes/plugins/nest-addons.zip',
                'required' => true,
                'force_activation' => false,
                'force_deactivation' => false,
            ) , 

            
            array(
                'name' => esc_html__('Woocommerce', 'steelthemes-nest'),
                'slug' => 'woocommerce',
                'required' => true,
                'force_activation' => false,
                'force_deactivation' => false,
            ),
            array(
                'name' => esc_html__('HubSpot All-In-One Marketing - Forms, Popups, Live Chat', 'steelthemes-nest'),
                'slug' => 'leadin',
                'required' => false,
                'force_activation' => false,
                'force_deactivation' => false,
            ),
            array(
                'name' => esc_html__('Fiboo Ajax Search', 'steelthemes-nest'),
                'slug' => 'ajax-search-for-woocommerce',
                'required' => false,
                'force_activation' => false,
                'force_deactivation' => false,
            ),
            
            array(
                'name' => esc_html__('WPC Smart Compare for WooCommerce', 'steelthemes-nest'),
                'slug' => 'woo-smart-compare',
                'required' => true,
                'force_activation' => false,
                'force_deactivation' => false,
            ),
            array(
                'name' => esc_html__('WPC Smart Wishlist for WooCommerce', 'steelthemes-nest'),
                'slug'   => 'woo-smart-wishlist',
                'required' => true,
                'force_activation' => false,
                'force_deactivation' => false,
            ),

            array(
                'name' => esc_html__('WPC Frequently Bought Together for WooCommerce', 'steelthemes-nest'),
                'slug'   => 'woo-bought-together',
                'required' => false,
                'force_activation' => false,
                'force_deactivation' => false,
            ),
         
            array(
                'name'   => esc_html__('Variation Swatches','steelthemes-nest'),
                'slug'   => 'woo-variation-swatches',
                'required' => false,
                'force_activation' => false,
                'force_deactivation' => false,
            ),
            array(
                'name' => esc_html__('Contact Form 7', 'steelthemes-nest') ,
                'slug' => 'contact-form-7',
                'required' => false,
                'force_activation' => false,
                'force_deactivation' => false,
            ),
           
            array(
                'name' => esc_html__('MailChimp for WordPress', 'steelthemes-nest') ,
                'slug' => 'mailchimp-for-wp',
                'required' => false,
                'force_activation' => false,
                'force_deactivation' => false,
            ),
    
            array(
				'name' => esc_html__('One Click Demo Import', 'steelthemes-nest'),
				'slug'   => 'one-click-demo-import',
				'required' => false,
				'force_activation' => false,
				'force_deactivation' => false,
			),
            array(
                'name' => esc_html__('Revslider', 'steelthemes-nest') ,
                'slug' => 'revslider',
                'source'  => get_template_directory() . '/includes/plugins/revslider.zip',
                'required' => false,
                'force_activation' => false,
                'force_deactivation' => false,
            ) ,
        );
        $config = array(
            'id' => 'tgmpa' ,
            'domain' => 'steelthemes-nest',
            'default_path' => '',
            'menu' => 'install-required-plugins',
            'has_notices' => true,
            'is_automatic' => false,
            'message' => '',
            'strings' => array(
                'page_title' => esc_html__('Install Required Plugins', 'steelthemes-nest') ,
                'menu_title' => esc_html__('Install Plugins', 'steelthemes-nest') ,
                'installing' => esc_html__('Installing Plugin: %s', 'steelthemes-nest') ,
                'oops' => esc_html__('Something went wrong with the plugin API.', 'steelthemes-nest') ,
                'notice_can_install_required' => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'steelthemes-nest') ,
                'notice_can_install_recommended' => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'steelthemes-nest') ,
                'notice_cannot_install' => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'steelthemes-nest') ,
                'notice_can_activate_required' => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'steelthemes-nest') ,
                'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'steelthemes-nest') ,
                'notice_cannot_activate' => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'steelthemes-nest') ,
                'notice_ask_to_update' => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'steelthemes-nest') ,
                'notice_cannot_update' => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'steelthemes-nest') ,
                'install_link' => _n_noop('Begin installing plugin', 'Begin installing plugins', 'steelthemes-nest') ,
                'activate_link' => _n_noop('Activate installed plugin', 'Activate installed plugins', 'steelthemes-nest') ,
                'return' => esc_html__('Return to Required Plugins Installer', 'steelthemes-nest') ,
                'plugin_activated' => esc_html__('Plugin activated successfully.', 'steelthemes-nest') ,
                'complete' => esc_html__('All plugins installed and activated successfully. %s', 'steelthemes-nest') ,
                'nag_type' => 'updated'
            )
        );
    tgmpa($plugins, $config);
}

 


