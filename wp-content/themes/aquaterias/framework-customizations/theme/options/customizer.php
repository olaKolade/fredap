<?php if ( ! defined( 'FW' ) ) { die( 'Forbidden' ); }

$options = array(
    'aquaterias_customizer' => array(
        'title' => esc_html__('Aquaterias', 'aquaterias'),
        'options' => array(

            'main_color' => array(
                'type' => 'color-picker',
                'value' => '#21b6ff',
                'label' => esc_html__('Main Color', 'aquaterias'),
            ),

            'second_color' => array(
                'type' => 'color-picker',
                'value' => '#AEC556',
                'label' => esc_html__('Secondary Color', 'aquaterias'),
            ),

            'gray_color' => array(
                'type' => 'color-picker',
                'value' => '#F1F6FB',
                'label' => esc_html__('Gray Color', 'aquaterias'),
            ),

            'white_color' => array(
                'type' => 'color-picker',
                'value' => '#ffffff',
                'label' => esc_html__('White Color', 'aquaterias'),
            ),

            'black_color' => array(
                'type' => 'color-picker',
                'value' => '#112C91',
                'label' => esc_html__('Black Color', 'aquaterias'),
            ),
            'logo_height' => array(
                'type'  => 'slider',
                'value' => 60,
                'properties' => array(

                    'min' => 16,
                    'max' => 110,
                    'step' => 1,

                ),
                'label' => esc_html__('Logo Max Height, px', 'aquaterias'),
            ),        
            
/*
            'nav_bg' => array(
                'type' => 'color-picker',
                'value' => '#fff',
                'label' => esc_html__('Navbar Background', 'aquaterias'),
            ),
            'nav_opacity_top' => array(
                'type' => 'text',
                'value' => '1',
                'label' => esc_html__('Navbar Opacity at Top Position (0 - 1)', 'aquaterias'),
            ),
            'nav_opacity_scroll' => array(
                'type' => 'text',
                'value' => '1',
                'label' => esc_html__('Navbar Opacity Scrolled (0 - 1)', 'aquaterias'),
            ),

            'footer_color' => array(
                'type' => 'color-picker',
                'value' => '#242424',
                'label' => esc_html__('Footer Color', 'aquaterias'),
            ),            
            'border_radius' => array(
                'type' => 'text',
                'value' => '0px',
                'label' => esc_html__('Border Radius', 'aquaterias'),
            ),            
*/            
        ),
    ),
);
