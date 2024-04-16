<?php
/*
====================
Breadcrumb Settings
====================
*/

Redux::setSection( $opt_name, array(
            'title'  => esc_html__( 'Breadcrumb Settings', 'steelthemes-nest' ),
            'id'     => 'breadcrumb_settings',
            'desc'   => esc_html__( '', 'steelthemes-nest' ),
            'subsection' => true,
            'icon'   => 'el el-wrench',
            'fields' => array(
                
                array(
                    'id'       => 'product_breadcrumb_names',
                    'type'     => 'text', 
                    'default'  =>  __('Products', 'steelthemes-nest'),
                    'title'    => __('Product Breadcrumb Text', 'steelthemes-nest'),
                ),

                   
                array(
                    'id'       => 'product_breadcrumb_links',
                    'type'     => 'text', 
                    'default'  =>  __('#', 'steelthemes-nest'),
                    'title'    => __('Product Breadcrumb Link', 'steelthemes-nest'),
                ),

        ),
));