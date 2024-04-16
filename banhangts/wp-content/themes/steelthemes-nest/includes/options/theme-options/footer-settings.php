<?php
/*
====================
Footer Settings
====================
*/
Redux::setSection( $opt_name, array(
            'title'  => esc_html__( 'Footer Settings', 'steelthemes-nest' ),
            'id'     => 'footer_settings_all',
            'desc'   => esc_html__( '', 'steelthemes-nest' ),
            'icon'   => 'el el-cog',
            'fields' => array(
            array(
                'id'       => 'footer_custom_enables',
                'type'     => 'switch', 
                'title'    => __('Footer Custom Enable / Disable', 'steelthemes-nest'),
                'default'  => false,
            ),
            array(
                'id'       => 'footer_custom_style',
               'type'     => 'select',
               'title'    => __('Select Footer Style', 'steelthemes-nest'), 
               // Must provide key => value pairs for select options
               'options'  => nest_common_query('footer'),
               'required' => array( 'footer_custom_enables', '=', true ),
           ),
        )
    ) 
);