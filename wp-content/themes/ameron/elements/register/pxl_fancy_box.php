<?php
// Register Fancy Box Widget
pxl_add_custom_widget(
    array(
        'name'       => 'pxl_fancy_box',
        'title'      => esc_html__( 'PXL Fancy Box', 'ameron' ),
        'icon'       => 'eicon-icon-box',
        'categories' => array('pxltheme-core'),
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
                                    'label' => esc_html__( 'Layout 5', 'ameron' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_fancy_box-1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__( 'Layout 6', 'ameron' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_fancy_box-2.jpg'
                                ],
                                '3' => [
                                    'label' => esc_html__( 'Layout 7', 'ameron' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_fancy_box-3.jpg'
                                ],
                                '4' => [
                                    'label' => esc_html__( 'Layout 8', 'ameron' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_fancy_box-4.jpg'
                                ],
                            ],
                        )
                    )
                ),
                array(
                    'name'     => 'content_section',
                    'label'    => esc_html__( 'Content', 'ameron' ),
                    'tab'      => 'content',
                    'controls' => array(
                        array(
                            'name'             => 'selected_icon',
                            'label'            => esc_html__( 'Icon', 'ameron' ),
                            'type'             => 'icons',
                            'default'          => [
                                'library' => 'flaticon',
                                'value'   => 'flaticon-calling'  
                            ],
                            'condition' => [
                                'layout!'    => ['1']
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
                                '{{WRAPPER}} .pxl-fancy-box .box-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-fancy-box .box-icon svg' => 'width: {{SIZE}}{{UNIT}} !important;',
                            ],
                            'condition' => [
                                'layout!'    => ['1']
                            ],
                        ),
                        array(
                            'name'  => 'icon_color',
                            'label' => esc_html__( 'Icon Color', 'ameron' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-fancy-box .box-icon i' => 'color: {{VALUE}} !important;',
                                '{{WRAPPER}} .pxl-fancy-box .box-icon svg' => 'color: {{VALUE}} !important',
                            ],
                            'condition' => [
                                'layout!'    => ['1']
                            ],
                        ),
                        array(
                            'name'  => 'background_icon_color',
                            'label' => esc_html__( 'Background Icon Color', 'ameron' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-fancy-box .box-icon i' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-fancy-box .box-icon svg' => 'background-color: {{VALUE}}',
                            ],
                            'condition' => [
                                'layout!'    => ['1']
                            ],
                        ),

                        array(
                            'name' => 'icon_margin',
                            'label' => esc_html__('Icon Margin', 'ameron' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-fancy-box .box-icon i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-fancy-box .box-icon svg' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                            'condition' => [
                                'layout!'    => ['1','3']
                            ],
                        ),
                        array(
                            'name'             => 'selected_img',
                            'label'            => esc_html__( 'Image', 'ameron' ),
                            'type'             => 'media',
                            'default'          => '',
                            'condition' => [
                                'layout!'    => ['1','2','3','4']
                            ],
                        ),
                        array(
                            'name'     => 'subtitle',
                            'label'    => esc_html__('Sub Title', 'ameron'),
                            'type'     => 'textarea',
                            'default'  => esc_html__('Your Sub Title', 'ameron'),
                            'condition' => [
                                'layout!'    => ['2','3']
                            ],
                        ),
                        array(
                            'name'     => 'title',
                            'label'    => esc_html__('Title', 'ameron'),
                            'type'     => 'textarea',
                            'default'  => esc_html__('Your Title', 'ameron')
                        ),
                        array(
                            'name'     => 'description',
                            'label'    => esc_html__('Description', 'ameron'),
                            'type'     => 'textarea',
                            'default'  => esc_html__('Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'ameron'),
                            'condition' => [
                                'layout!'    => ['3','4']
                            ]
                        ),
                        array(
                            'name'     => 'year',
                            'label'    => esc_html__('Year', 'ameron'),
                            'type'     => 'textarea',
                            'default'  => esc_html__('2009 - 2013', 'ameron'),
                            'condition' => [
                                'layout'    => ['1']
                            ]
                        ),
                        array(
                            'name' => 'subtitle_color',
                            'label' => esc_html__( 'Subtitle Color', 'ameron' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-fancy-box .box-sub-title' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout!'    => ['2','3']
                            ],
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__( 'Title Color', 'ameron' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-fancy-box .box-title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'description_color',
                            'label' => esc_html__( 'Description Color', 'ameron' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-fancy-box .box-description' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout!'    => ['3','4']
                            ],
                        ),
                        array(
                            'name' => 'year',
                            'label' => esc_html__( 'Year Color', 'ameron' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-fancy-box .box-year' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout'    => ['1']
                            ]
                        ),
                        array(
                            'name'        => 'link',
                            'label'       => esc_html__( 'Custom Link', 'ameron' ),
                            'type'        => 'url',
                            'placeholder' => esc_html__( 'https://your-link.com', 'ameron' ),
                            'default'     => [
                                'url'         => '#',
                                'is_external' => 'on'
                            ],
                        ),
                        array(
                            'name' => 'button_text',
                            'label' => esc_html__('Button Text', 'ameron'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'condition' => [
                                'layout'    => ['4']
                            ]
                        ),
                        array(
                            'name' => 'hover_type',
                            'label' => esc_html__( 'Hover Type', 'ameron' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'top-to-bottom' => esc_html__( 'Top to Bottom', 'ameron' ),
                                'bottom-to-top' => esc_html__( 'Bottom to Top', 'ameron' ),
                            ],
                            'default' => 'top-to-bottom',
                            'condition' => [
                                'layout'    => ['4']
                            ]
                        ),
                        array(
                            'name' => 'hover_color',
                            'label' => esc_html__( 'Hover Color', 'ameron' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-fancy-box .box-inner:after' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout'    => ['4']
                            ]
                        ),
                        array(
                            'name' => 'bg_layout_4',
                            'label' => esc_html__('Background Color Item', 'ameron' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-fancy-box .box-inner' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout'    => ['4']
                            ],
                        ),
                        
                    )
                ),

                array(
                    'name' => 'background_overlay',
                    'label' => esc_html__('Background Overlay', 'ameron' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'layout'    => ['1']
                    ],
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
                                '{{WRAPPER}} .pxl-fancy-box .background' => 'background-color: {{VALUE}};',
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
                                '{{WRAPPER}} .pxl-fancy-box .background' => 'opacity: {{SIZE}}{{UNIT}};',
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
                                '{{WRAPPER}} .pxl-fancy-box .background' => 'mix-blend-mode: {{VALUE}}',
                            ],
                        ),             
                    ),
                ),
            )
        )
    ),
    ameron_get_class_widget_path()
);