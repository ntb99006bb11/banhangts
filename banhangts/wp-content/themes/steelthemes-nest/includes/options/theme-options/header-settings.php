<?php
/*
====================
Header Settings
====================
*/
Redux::setSection( $opt_name, array(
            'title'  => esc_html__( 'Header Settings', 'steelthemes-nest' ),
            'id'     => 'header_versions',
            'desc'   => esc_html__( '', 'steelthemes-nest' ),
            'icon'   => 'el el-cog',
            'fields' => array(
          
            array(
                'id' => 'header-sec-start',
                'type' => 'section',
                'title' => __('Header  Section', 'steelthemes-nest'),
                'indent' => true 
            ),                
            array(
                'id'       => 'header_custom_enables',
                'type'     => 'switch', 
                'title'    => __('Header Custom Enable / Disable', 'steelthemes-nest'),
                'default'  => false,
            ),
            array(
                'id'       => 'header_custom_style',
                'type'     => 'select',
                'title'    => __('Select Header Style', 'steelthemes-nest'),  
                // Must provide key => value pairs for select options
                'options'  => nest_common_query('header'),
                'required' => array( 'header_custom_enables', '=', true ),
            ),
 
        )
));

