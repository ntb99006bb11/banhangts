<?php
/*
====================
Theme Color Settings
====================
*/
Redux::setSection( $opt_name, array(
            'title'  => esc_html__( 'Theme  Settings', 'steelthemes-nest' ),
            'id'     => 'color_scheme',
            'desc'   => esc_html__( '', 'steelthemes-nest' ),
            'icon'   => 'el el-cog',
            'fields' => array(
                   
                
                    array(
                        'id'       => 'theme_bg_image',
                        'type'     => 'media', 
                        'url'      => true,
                        'title'    => __('Theme Background Image', 'steelthemes-nest'),
                        
                    ),
                    array(         
                        'id'       => 'theme_bg_color',
                        'type'     => 'color',
                        'title'    => __('Theme Background Color', 'steelthemes-nest'), 
                        'validate' => 'color',
                     
                    ),
                    array(
                        'id'       => 'theme_setttings_enable',
                        'type'     => 'switch', 
                        'title'    => __('Theme Color Settings Enable', 'steelthemes-nest'),
                        'default'  => false,
                    ), 
                    array(
                        'id' => 'theme_primary_fonts_section',
                        'type' => 'section',
                        'title' => __('Theme Font Familys', 'steelthemes-nest'),
                        'indent' => true ,
                        'required' => array( 'theme_setttings_enable', '=', true ),
                    ),
                    array(
                        'id' => 'font_familt_default_one',
                        'type' => 'typography',
                        'title' => esc_html__('Font Family Primary', 'steelthemes-nest'),
                        'google' => true,
                        'color' => false,
                        'font-backup' => true,
                        'font-family' => true,
                        'subsets' => false,
                        'font-size' => false,
                        'font-weight' => false,
                        'font-style' => false,
                        'line-height' => false,
                        'text-align' => false,
                        'units' => 'px',
                        'default' => array(
                        'font-family' => '', 
                        ),
                        'required' => array('theme_setttings_enable', '=', true),
                    ),
                
                    array(
                        'id' => 'font_familt_second_one',
                        'type' => 'typography',
                        'title' => esc_html__('Font Family Secondary', 'steelthemes-nest'),
                        'google' => true,
                        'color' => false,
                        'font-backup' => true,
                        'font-family' => true,
                        'subsets' => false,
                        'font-size' => false,
                        'font-weight' => false,
                        'font-style' => false,
                        'line-height' => false,
                        'text-align' => false,
                        'units' => 'px',
                        'default' => array(
                        'font-family' => '', 
                        ),
                        'required' => array('theme_setttings_enable', '=', true),
                    ),
                    

                    array(
                        'id' => 'theme_color_section',
                        'type' => 'section',
                        'title' => __('Theme Primary Colors', 'steelthemes-nest'),
                        'indent' => true ,
                        'required' => array( 'theme_setttings_enable', '=', true ),
                    ),
                
                    array(
                        'id'       => 'theme_color_one',
                        'type'     => 'color',
                        'title'    => __('Theme Color (1)', 'steelthemes-nest'), 
                        'validate' => 'color',
                        'required' => array( 'theme_setttings_enable', '=', true ),
                    ),
                    array(
                        'id'       => 'theme_color_two',
                        'type'     => 'color',
                        'title'    => __('Theme Color (2)', 'steelthemes-nest'), 
                        'validate' => 'color',
                        'required' => array( 'theme_setttings_enable', '=', true ),
                    ),
                    array(
                        'id'       => 'theme_color_three',
                        'type'     => 'color',
                        'title'    => __('Theme Color (3)', 'steelthemes-nest'), 
                        'validate' => 'color',
                        'required' => array( 'theme_setttings_enable', '=', true ),
                    ),
                

                    array(
                        'id' => 'theme_bgcolor_section',
                        'type' => 'section',
                        'title' => __('Theme Background Colors', 'steelthemes-nest'),
                        'indent' => true ,
                        'required' => array( 'theme_setttings_enable', '=', true ),
                    ),
            
                array(
                    'id'       => 'theme_bgcolor_one',
                    'type'     => 'color',
                    'title'    => __('Theme Background Light Color (1)', 'steelthemes-nest'), 
                    'description'    => __('Only Light colors want to apply', 'steelthemes-nest'), 
                    'validate' => 'color',
                    'required' => array( 'theme_setttings_enable', '=', true ),
                ),
                array(
                    'id'       => 'theme_bgcolor_two',
                    'type'     => 'color',
                    'title'    => __('Theme Background Light Color (2)', 'steelthemes-nest'), 
                    'description'    => __('Only Light colors want to apply', 'steelthemes-nest'), 
                    'validate' => 'color',
                    'required' => array( 'theme_setttings_enable', '=', true ),
                ),
                array(
                    'id'       => 'theme_bgcolor_three',
                    'type'     => 'color',
                    'title'    => __('Theme Background Light Color (3) ', 'steelthemes-nest'), 
                    'description'    => __('Only Light colors want to apply', 'steelthemes-nest'), 
                    'validate' => 'color',
                    'required' => array( 'theme_setttings_enable', '=', true ),
                ),
            

                    array(
                        'id' => 'theme_heding_clor_section',
                        'type' => 'section',
                        'title' => __('Theme Heading Colors', 'steelthemes-nest'),
                        'indent' => true ,
                        'required' => array( 'theme_setttings_enable', '=', true ),
                    ),
                    array(
                        'id'       => 'heading_color',
                        'type'     => 'color',
                        'title'    => __('Heading Color', 'steelthemes-nest'), 
                        'validate' => 'color',
                        'required' => array( 'theme_setttings_enable', '=', true ),
                    
                    ),
                    array(
                        'id' => 'theme_descr_clor_section',
                        'type' => 'section',
                        'title' => __('Text Colors', 'steelthemes-nest'),
                        'indent' => true ,
                        'required' => array( 'theme_setttings_enable', '=', true ),
                    ),
                    array(
                        'id'       => 'description_color',
                        'type'     => 'color',
                        'title'    => __('Text  Color', 'steelthemes-nest'), 
                        'validate' => 'color',
                        'required' => array( 'theme_setttings_enable', '=', true ),
                    ),
            

                    array(
                        'id' => 'theme_border_color_sect',
                        'type' => 'section',
                        'title' => __('Border Colors', 'steelthemes-nest'),
                        'indent' => true ,
                        'required' => array( 'theme_setttings_enable', '=', true ),
                    ),

                    array(
                        'id'       => 'border_color',
                        'type'     => 'color',
                        'title'    => __('Border Color', 'steelthemes-nest'), 
                        'validate' => 'color',
                        'required' => array( 'theme_setttings_enable', '=', true ),
                    ),

                    array(
                        'id'       => 'border_color_two',
                        'type'     => 'color',
                        'title'    => __('Border Color (2)', 'steelthemes-nest'), 
                        'validate' => 'color',
                        'required' => array( 'theme_setttings_enable', '=', true ),
                    ),

                 
            
        )
    )   
);

