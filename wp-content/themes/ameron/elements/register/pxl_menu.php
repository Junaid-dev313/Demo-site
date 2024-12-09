<?php

use Elementor\Controls_Manager;

$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
$custom_menus = array(
    '' => esc_html__('Default', 'ameron')
);
if ( is_array( $menus ) && ! empty( $menus ) ) {
    foreach ( $menus as $single_menu ) {
        if ( is_object( $single_menu ) && isset( $single_menu->name, $single_menu->slug ) ) {
            $custom_menus[ $single_menu->slug ] = $single_menu->name;
        }
    }
} else {
    $custom_menus = '';
}
pxl_add_custom_widget(
    array(
        'name' => 'pxl_menu',
        'title' => esc_html__('Pxl Menu', 'ameron'),
        'icon' => 'eicon-nav-menu',
        'categories' => array('pxltheme-core'),
        'scripts' => array(),
        'params' => array(
            'sections' => array(
                 
                array(
                    'name' => 'source_section',
                    'label' => esc_html__('Source Settings', 'ameron'),
                    'tab' => 'content',
                    'controls' => array(
                        array(
                            'name' => 'type',
                            'label' => esc_html__('Type', 'ameron' ),
                            'type' => 'select',
                            'options' => [
                                '1' => esc_html__('Primary Menu', 'ameron'),
                                '2' => esc_html__('Menu Inner', 'ameron'),
                                '3' => esc_html__('Mobile Menu', 'ameron'),
                                '4' => esc_html__('Sidebar Menu', 'ameron'),
                            ],
                            'default' => '1',
                        ),
                        array(
                            'name' => 'el_title',
                            'label' => esc_html__('Sidebar Widget Title', 'ameron'),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'label_block' => true,
                            'condition' => [
                                'type' => '4',
                            ],
                        ),
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Menu Style', 'ameron' ),
                            'type' => 'select',
                            'options' => [
                                '1' => esc_html__('Default', 'ameron'),
                                '2' => esc_html__('Style 2', 'ameron'),
                            ],
                            'default' => '1',
                            'condition' => [
                                'type' => ['1','2'],
                            ]
                        ),
                        array(
                            'name' => 'menu',
                            'label' => esc_html__('Select Menu', 'ameron'),
                            'type' => 'select',
                            'options' => $custom_menus,
                        ),
                        array(
                            'name'         => 'align',
                            'label'        => esc_html__( 'Alignment', 'ameron' ),
                            'type'         => 'choose',
                            'control_type' => 'responsive',
                            'options' => [
                                'start' => [
                                    'title' => esc_html__( 'Start', 'ameron' ),
                                    'icon' => 'eicon-text-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__( 'Center', 'ameron' ),
                                    'icon' => 'eicon-text-align-center',
                                ],
                                'end' => [
                                    'title' => esc_html__( 'End', 'ameron' ),
                                    'icon' => 'eicon-text-align-right',
                                ]
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-primary-menu, {{WRAPPER}} .pxl-mobile-menu' => 'justify-content: {{VALUE}};'
                            ],
                            'condition' => [
                                'type' => ['1','3'],
                            ]
                        ),
                        array(
                            'name' => 'menu_flex_grow',
                            'label' => esc_html__( 'Flex Grow', 'ameron' ),
                            'type' => 'choose',
                            'control_type' => 'responsive',
                            'options' => [
                                '0' => [
                                    'title' => esc_html__( 'Inherit', 'ameron' ),
                                    'icon' => 'eicon-h-align-center',
                                ],
                                '1' => [
                                    'title' => esc_html__( 'Fill available space', 'ameron' ),
                                    'icon' => 'eicon-h-align-right',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}}' => 'flex-grow: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'first_section',
                    'label' => esc_html__('Style First Level', 'ameron'),
                    'tab' => 'content',
                    'condition' => [
                        'type' => ['1','3'],
                    ],
                    'controls' => array(
                        array(
                            'name' => 'color',
                            'label' => esc_html__('Color', 'ameron' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-primary-menu > li > a' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-nav-menu .pxl-mobile-menu > li > a' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-nav-menu .pxl-primary-menu > li .main-menu-toggle:before' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-nav-menu .pxl-mobile-menu > li .main-menu-toggle:before' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'color_hover',
                            'label' => esc_html__('Color Hover', 'ameron' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-primary-menu > li > a:hover'                      => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-nav-menu .pxl-primary-menu > li.current-menu-item > a'          => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-nav-menu .pxl-primary-menu > li.current-menu-ancestor > a'      => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-nav-menu .pxl-primary-menu > li.current-menu-ancestor .main-menu-toggle:before'      => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-nav-menu .pxl-primary-menu > li:hover:before'                   => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-nav-menu .pxl-primary-menu > li.current-menu-item:before'       => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-nav-menu .pxl-primary-menu > li.current-menu-ancestor:before'   => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-nav-menu .pxl-mobile-menu > li > a:hover'                       => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-nav-menu .pxl-primary-menu > li:hover .main-menu-toggle:before' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-nav-menu .pxl-mobile-menu > li:hover .main-menu-toggle:before'  => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'underline_color',
                            'label' => esc_html__('Underline Color', 'ameron' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-primary-menu > li:before' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'typography',
                            'label' => esc_html__('Typography', 'ameron' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-nav-menu .pxl-primary-menu > li > a, {{WRAPPER}} .pxl-nav-menu .pxl-mobile-menu > li > a',
                        ),
                        array(
                            'name'  => 'show_arrow',
                            'label' => esc_html__('Show Arrow', 'ameron'),
                            'type'  => 'switcher',
                            'return_value' => 'yes',
                            'default' => 'yes',
                            'condition' => [
                                'type' => ['1'],
                            ],
                        ),
                        array(
                            'name'  => 'show_underline',
                            'label' => esc_html__('Show Underline', 'ameron'),
                            'type'  => 'switcher',
                            'return_value' => 'yes',
                            'default' => 'yes',
                            'condition' => [
                                'type' => ['1'],
                            ],
                        ),
                        array(
                            'name' => 'item_space',
                            'label' => esc_html__('Item Space', 'ameron' ),
                            'type' => 'dimensions',
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', 'em', '%', 'rem' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-primary-menu > li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-mobile-menu > li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'sub_section',
                    'label' => esc_html__('Style Sub Level', 'ameron'),
                    'tab' => 'content',
                    'condition' => [
                        'type' => ['1','3'],
                    ],
                    'controls' => array(
                        array(
                            'name' => 'sub_color',
                            'label' => esc_html__('Color', 'ameron' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-primary-menu li .sub-menu a' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-nav-menu .pxl-mobile-menu li .sub-menu a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'sub_color_hover',
                            'label' => esc_html__('Color Hover', 'ameron' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-primary-menu li .sub-menu a:hover' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-nav-menu .pxl-mobile-menu li .sub-menu a:hover' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'sub_typography',
                            'label' => esc_html__('Typography', 'ameron' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-nav-menu .pxl-primary-menu li .sub-menu a, {{WRAPPER}} .pxl-nav-menu .pxl-mobile-menu li .sub-menu a',
                        ),
                    ),
                ),

                array(
                    'name' => 'nav_section',
                    'label' => esc_html__('Style', 'ameron'),
                    'tab' => 'content',
                    'condition' => [
                        'type' => ['2'],
                    ],
                    'controls' => array(
                        array(
                            'name' => 'nav_color',
                            'label' => esc_html__('Color', 'ameron' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-nav-inner li' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-nav-menu .pxl-nav-inner a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'nav_color_hover',
                            'label' => esc_html__('Color Hover', 'ameron' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-nav-inner a:hover' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name'  => 'border_hover',
                            'label' => esc_html__('Border Hover', 'ameron'),
                            'type'  => 'switcher',
                            'return_value' => 'yes',
                            'default' => 'yes',
                        ),
                        array(
                            'name' => 'nav_typography',
                            'label' => esc_html__('Typography', 'ameron' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-nav-menu .pxl-nav-inner a',
                        ),
                        array(
                            'name' => 'nav_item_space',
                            'label' => esc_html__('Item Space', 'ameron' ),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-nav-inner li + li' => 'margin-top: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    ameron_get_class_widget_path()
);