<?php      
/*
=================================
Sticky header Settings
==================================
*/ 
Redux::setSection( $opt_name, array(
            'title'  => esc_html__( 'Sticky header Settings', 'steelthemes-nest' ),
            'id'     => 'sticjy_header_settings',
            'desc'   => esc_html__( '', 'steelthemes-nest' ),
            'icon'   => 'el el-cog',
            'subsection' => true,
            'fields' => array(

            array(
                'id'       => 'header_sticky',
                'type'     => 'switch', 
                'title'    => __('Header Sticky Enable / Disable', 'steelthemes-nest'),
                'default'  => false,
            ),

            array(
                'id'       => 'header_sticky_custom_style',
                'type'     => 'select',
                'title'    => __('Select Sticky Header Style', 'steelthemes-nest'),  
                // Must provide key => value pairs for select options
                'options'  => nest_common_query('sticky_header'),
                'required' => array( 'header_sticky', '=', true ),
            ),
        )
));
