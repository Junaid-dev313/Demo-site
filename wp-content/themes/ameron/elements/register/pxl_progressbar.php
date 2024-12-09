<?php
// Register Progress Bar Widget
pxl_add_custom_widget(
    array(
        'name'       => 'pxl_progressbar',
        'title'      => esc_html__( 'PXL Progress Bar', 'ameron' ),
        'icon'       => 'eicon-skill-bar',
        'categories' => array('pxltheme-core'),
        'scripts'    => array(
            'pxl-progressbar',
            'ameron-progressbar'
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
                            'label'   => esc_html__( 'Templates', 'ameron' ),
                            'type'    => 'layoutcontrol',
                            'default' => '1',
                            'options' => [ 
                                '1' => [
                                    'label' => esc_html__( 'Layout 1', 'ameron' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_progressbar-1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__( 'Layout 2', 'ameron' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_progressbar-2.jpg'
                                ],
                            ],
                        )
                    )
                ),
                array(
                    'name'     => 'source_section',
                    'label'    => esc_html__( 'Source Settings', 'ameron' ),
                    'tab'      => 'content',
                    'controls' => array(
                        array(
                            'name'     => 'progressbar_list',
                            'label'    => esc_html__( 'Progress Bar Lists', 'ameron' ),
                            'type'     => 'repeater',
                            'controls' => array_merge(
                                array(
                                    array(
                                        'name' => 'icon_type',
                                        'label' => esc_html__('Icon Type', 'ameron' ),
                                        'type' => \Elementor\Controls_Manager::SELECT,
                                        'options' => [
                                            'icon' => 'Icon',
                                            'image' => 'Image',
                                        ],
                                        'default' => 'icon',
                                    ),
                                    array(
                                        'name' => 'pxl_icon',
                                        'label' => esc_html__('Icon', 'ameron' ),
                                        'type' => \Elementor\Controls_Manager::ICONS,
                                        'fa4compatibility' => 'icon',
                                        'condition' => [
                                            'icon_type' => 'icon',
                                        ],
                                    ),
                                    array(
                                        'name' => 'icon_image',
                                        'label' => esc_html__( 'Icon Image', 'ameron' ),
                                        'type' => \Elementor\Controls_Manager::MEDIA,
                                        'condition' => [
                                            'icon_type' => 'image',
                                        ],
                                    ),
                                    array(
                                        'name'  => 'icon_size',
                                        'label' => esc_html__( 'Icon Size', 'ameron' ),
                                        'type'  => 'slider',
                                        'range' => [
                                            'px' => [
                                                'min' => 15,
                                                'max' => 300,
                                            ],
                                        ],
                                        'selectors' => [
                                            '{{WRAPPER}} .progress-title-wrap .pxl-item--icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                                            '{{WRAPPER}} .progress-title-wrap .pxl-item--icon svg' => 'width: {{SIZE}}{{UNIT}} !important;',
                                        ],
                                    ),
                                    array(
                                        'name'  => 'icon_color',
                                        'label' => esc_html__( 'Icon Color', 'ameron' ),
                                        'type' => \Elementor\Controls_Manager::COLOR,
                                        'default' => '',
                                        'selectors' => [
                                            '{{WRAPPER}} .progress-title-wrap .pxl-item--icon i' => 'color: {{VALUE}};',
                                            '{{WRAPPER}} .progress-title-wrap .pxl-item--icon svg' => 'color: {{VALUE}}',
                                        ],
                                    ),
                                    array(
                                        'name'        => 'title',
                                        'label'       => esc_html__( 'Title', 'ameron' ),
                                        'type'        => 'text',
                                        'placeholder' => esc_html__( 'Enter your title', 'ameron' ),
                                        'default'     => esc_html__( 'My Skill', 'ameron' ),
                                        'label_block' => true
                                    ),
                                    array(
                                        'name'     => 'description',
                                        'label'    => esc_html__('Description', 'ameron'),
                                        'type'     => 'textarea',
                                        'default'  => esc_html__('Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'ameron'),
                                    ),
                                    array(
                                        'name'    => 'percent',
                                        'label'   => esc_html__( 'Percentage', 'ameron' ),
                                        'type'    => 'slider',
                                        'default' => [
                                            'size' => 50,
                                            'unit' => '%',
                                        ],
                                        'label_block' => true
                                    ),
                                    array(
                                        'name' => 'item_bar_color',
                                        'label' => esc_html__( 'Bar Background Color', 'ameron' ),
                                        'type' => \Elementor\Controls_Manager::COLOR,
                                        'selectors' => [
                                            '{{WRAPPER}} {{CURRENT_ITEM}} .pxl-progress-bar' => 'background-color: {{VALUE}}',
                                        ],
                                    ),
                                )
                            ),
                            'title_field' => '{{title}}'
                        )
                    )
                ),
                array(
                    'name' => 'section_title',
                    'label' => esc_html__( 'Style', 'ameron' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'title_color',
                                'label' => esc_html__( 'Title Color', 'ameron' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-progressbar .progress-title' => 'color: {{VALUE}} !important;',
                                ],
                            ),
                            array(
                                'name' => 'typography',
                                'label' => esc_html__( 'Title Typography', 'ameron' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-progressbar .progress-title',
                            ),
                            array(
                                'name' => 'percent_color',
                                'label' => esc_html__( 'Percentage Color', 'ameron' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-progressbar .progress-percentage' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'bg_percent_color',
                                'label' => esc_html__('Background Percentage Color', 'ameron' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'default' => '',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-progressbar .progress-percentage' => 'background-color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'percentage_typography',
                                'label' => esc_html__( 'Percentage Typography', 'ameron' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-progressbar .progress-percentage',
                            ),
                            array(
                                'name' => 'bound_color',
                                'label' => esc_html__( 'Bound Background Color', 'ameron' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-progressbar .progress-bound' => 'background-color: {{VALUE}};'
                                ],
                            ),
                        ),
                        ameron_elementor_animation_opts([
                            'name'   => 'item',
                            'label' => esc_html__('Item', 'ameron'),
                        ])
                    ),
                ),

                array(
                    'name' => 'background_overlay',
                    'label' => esc_html__('Background Overlay', 'ameron' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'image_background',
                            'label' => esc_html__('Image', 'ameron'),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'dynamic' => [
                                'active' => true,
                            ],
                            'default' => "",
                        ),
                        array(
                            'name' => 'bg_item_color',
                            'label' => esc_html__('Background Color', 'ameron' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-progressbar .background' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'opacity_background',
                            'label' => esc_html__('Opacity (%)', 'ameron' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units'   => [ '%' ],
                            'default' => [
                                'unit' => '%',
                            ],
                            'range' => [
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-progressbar .background' => 'opacity: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'blend_mode',
                            'label' => esc_html__('Blend Mode', 'ameron'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => esc_html__( 'Normal', 'ameron' ),
                                'multiply' => esc_html__( 'Multiply', 'ameron' ),
                                'screen' => esc_html__( 'Screen', 'ameron' ),
                                'overlay' => esc_html__( 'Overlay', 'ameron' ),
                                'darken' => esc_html__( 'Darken', 'ameron' ),
                                'lighten' => esc_html__( 'Lighten', 'ameron' ),
                                'color-dodge' => esc_html__( 'Color Dodge', 'ameron' ),
                                'saturation' => esc_html__( 'Saturation', 'ameron' ),
                                'color' => esc_html__( 'Color', 'ameron' ),
                                'difference' => esc_html__( 'Difference', 'ameron' ),
                                'exclusion' => esc_html__( 'Exclusion', 'ameron' ),
                                'hue' => esc_html__( 'Hue', 'ameron' ),
                                'luminosity' => esc_html__( 'Luminosity', 'ameron' ),
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-progressbar .background' => 'mix-blend-mode: {{VALUE}}',
                            ],
                        ),             
                    ),
                ),
                
            )
        )
    ),
    ameron_get_class_widget_path()
);