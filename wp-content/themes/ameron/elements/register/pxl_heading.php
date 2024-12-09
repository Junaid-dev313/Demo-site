<?php
pxl_add_custom_widget(
    array(
        'name'       => 'pxl_heading',
        'title'      => esc_html__( 'PXL Heading', 'ameron' ),
        'icon'       => 'eicon-t-letter',
        'categories' => array('pxltheme-core'),
        'scripts'    => array(
            'ameron-typewrite',
            'ameron-animation'
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__( 'Layout', 'ameron' ),
                    'tab'      => 'layout',
                    'controls' => array(
                        array(
                            'name'    => 'layout',
                            'label'   => esc_html__( 'Layout', 'ameron' ),
                            'type'    => 'layoutcontrol',
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__( 'Layout 1', 'ameron' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_heading-1.jpg'
                                ],
                            ],
                            'prefix_class' => 'pxl-heading-layout-',
                        ),
                    )
                ),
                array(
                    'name' => 'title_section',
                    'label' => esc_html__('Title', 'ameron' ),
                    'tab' => 'content',
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'heading_padding',
                                'label' => esc_html__('Padding', 'ameron' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'image_background',
                                'label' => esc_html__('Background Image', 'ameron'),
                                'type' => \Elementor\Controls_Manager::MEDIA,
                                'dynamic' => [
                                    'active' => true,
                                ],
                                'default' => "",
                            ),
                            array(
                                'name' => 'position',
                                'label' => esc_html__('Position', 'ameron' ),
                                'type' => 'select',
                                'options' => [
                                    'unset' => 'Default',
                                    'center center' => 'Center Center',
                                    'center bottom' => 'Center Bottom',
                                    'center top' => 'Center Top',
                                    'right bottom' => 'Right Bottom',
                                    'right center' => 'Right Center',
                                    'right top' => 'Right Top',
                                    'left bottom' => 'Left Bottom',
                                    'left center' => 'Left Center',
                                    'left top' => 'Left Top',
                                    'custom' => esc_html__('Custom', 'ameron' ),
                                ],  
                                'default' => 'unset',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading-inner ' => 'background-position: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name'  => 'background_position_x',
                                'label' => esc_html__( 'X Position', 'ameron' ),
                                'type'  => 'slider',
                                'control_type' => 'responsive', 
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 1000,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading-inner' => 'background-position-x: {{SIZE}}{{UNIT}};',
                                ],
                                'condition'     => [
                                    'position'     => 'custom',
                                ],
                            ),
                            array(
                                'name'  => 'background_position_y',
                                'label' => esc_html__( 'Y Position', 'ameron' ),
                                'type'  => 'slider',
                                'control_type' => 'responsive', 
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 1000,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading-inner' => 'background-position-y: {{SIZE}}{{UNIT}};',
                                ],
                                'condition'     => [
                                    'position'     => 'custom',
                                ],
                            ),
                            array(
                                'name' => 'repeat',
                                'label' => esc_html__('Repeat', 'ameron' ),
                                'type' => 'select',
                                'options' => [
                                    'unset' => 'Default',
                                    'repeat' => 'Repeat',
                                    'no-repeat' => 'No-Repeat',
                                    'repeat-x' => 'Repeat-x',
                                    'repeat-y' => 'Repeat-y',
                                ],  
                                'default' => 'unset',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading-inner ' => 'background-repeat: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'size',
                                'label' => esc_html__('Size', 'ameron' ),
                                'type' => 'select',
                                'options' => [
                                    'unset' => 'Default',
                                    'auto' => 'Auto',
                                    'cover' => 'Cover',
                                    'contain' => 'Contain',
                                    'custom' => esc_html__('Custom', 'ameron' ),
                                ],  
                                'default' => 'unset',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading-inner ' => 'background-size: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name'  => 'with',
                                'label' => esc_html__( 'With', 'ameron' ),
                                'type'  => 'slider',
                                'control_type' => 'responsive', 
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 1000,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading-inner' => 'background-size: {{SIZE}}{{UNIT}} auto;',
                                ],
                                'condition'     => [
                                    'size'     => 'custom',
                                ],
                            ),
                            array(
                                'name' => 'title',
                                'label' => esc_html__('Title', 'ameron' ),
                                'type' => 'textarea',
                                'default' => 'Alfred Nofiat',
                                'label_block' => true,
                            ),
                            array(
                                'name' => 'title_tag',
                                'label' => esc_html__('Heading HTML Tag', 'ameron' ),
                                'type' => 'select',
                                'options' => [
                                    'h1' => 'H1',
                                    'h2' => 'H2',
                                    'h3' => 'H3',
                                    'h4' => 'H4',
                                    'h5' => 'H5',
                                    'h6' => 'H6',
                                    'div' => 'div',
                                    'span' => 'span',
                                    'p' => 'p',
                                ],
                                'default' => 'h2',
                            ),
                            array(
                                'name' => 'title_color',
                                'label' => esc_html__('Title Color', 'ameron' ),
                                'type' => 'color',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading-wrap .heading-title' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'title_typography',
                                'label' => esc_html__('Title Typography', 'ameron' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-heading-wrap .heading-title',
                            ),
                            array(
                                'name' => 'text_align',
                                'label' => esc_html__('Alignment', 'ameron' ),
                                'type' => 'choose',
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
                                    '{{WRAPPER}} .pxl-heading-wrap' => 'justify-content: {{VALUE}};',
                                    '{{WRAPPER}} .pxl-heading-inner' => 'text-align: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name'  => 'max_width',
                                'label' => esc_html__( 'Max Width (px)', 'ameron' ),
                                'type'  => 'slider',
                                'control_type' => 'responsive',
                                'range' => [
                                    'px' => [
                                        'min' => 100,
                                        'max' => 1920,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading-inner' => 'max-width: {{SIZE}}{{UNIT}};',
                                ]
                            ),
                            array(
                                'name' => 'link',   
                                'label' => esc_html__('Link', 'ameron' ),
                                'type' => \Elementor\Controls_Manager::URL,
                            ),
                        ),
                        ameron_elementor_animation_opts([
                            'name'   => 'title',
                            'label' => '',
                        ])
                    ),
                ),
                array(
                    'name' => 'sub_title_section',
                    'label' => esc_html__('Sub Title', 'ameron' ),
                    'tab' => 'content',
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'sub_title',
                                'label' => esc_html__('Sub Title', 'ameron' ),
                                'type' => 'textarea',
                                'label_block' => true,
                            ),
                            array(
                                'name' => 'sub_title_color',
                                'label' => esc_html__('Sub Title Color', 'ameron' ),
                                'type' => 'color',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading-wrap .heading-subtitle' => 'color: {{VALUE}};',
                                    '{{WRAPPER}} .pxl-heading-wrap .heading-subtitle span:before' => 'background-color: {{VALUE}};',
                                    '{{WRAPPER}} .pxl-heading-wrap .heading-subtitle span:after' => 'background-color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'sub_title_typography',
                                'label' => esc_html__('Sub Title Typography', 'ameron' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-heading-wrap .heading-subtitle',
                            ),
                            array(
                                'name'         => 'sub_title_atbot',
                                'label'        => esc_html__( 'At Bottom', 'ameron' ),
                                'type'         => 'switcher',
                                'default'      => '',
                                'label_on'     => 'Hide',
                                'label_off'    => 'Show',
                            ),
                            array(
                                'name'         => 'sub_title_line',
                                'label'        => esc_html__( 'Line Text', 'ameron' ),
                                'type'         => 'switcher',
                                'default'      => '',
                                'label_on'     => 'Hide',
                                'label_off'    => 'Show',
                            ),
                            array(
                                'name' => 'sub_title_space',
                                'label' => esc_html__('Margin(px)', 'ameron' ),
                                'type' => 'dimensions',
                                'allowed_dimensions' => 'vertical',
                                'default' => ['top' => '', 'right' => '', 'bottom' => '', 'left' => ''],
                                'control_type' => 'responsive',
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading-wrap.layout1 .heading-subtitle, {{WRAPPER}} .pxl-heading-wrap.layout2 .sub-stroke-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                            ),
                        ),
                        ameron_elementor_animation_opts([
                            'name'   => 'sub_title',
                            'label' => '',
                        ])
                    ),
                ),
                array(
                    'name' => 'highlight_section',
                    'label' => esc_html__('Highlight Text', 'ameron' ),
                    'tab' => 'content',
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'text_list',
                                'label' => esc_html__('Text List', 'ameron'),
                                'type' => \Elementor\Controls_Manager::REPEATER,
                                'controls' => array(
                                    array(
                                        'name' => 'highlight_text',
                                        'label' => esc_html__('Text', 'ameron'),
                                        'type' => \Elementor\Controls_Manager::TEXT,
                                        'label_block' => true,
                                    ),
                                ),
                                'title_field' => '{{{ highlight_text }}}',
                            ),
                            array(
                                'name' => 'highlight_color',
                                'label' => esc_html__('Highlight Color', 'ameron' ),
                                'type' => 'color',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading-wrap .heading-highlight' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'highlight_typography',
                                'label' => esc_html__('Highlight Typography', 'ameron' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-heading-wrap .heading-highlight',
                            ),
                        )
                    ),
                ),
            ),
        ),
    ),
    ameron_get_class_widget_path()
);