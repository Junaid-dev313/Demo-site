<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_team_carousel',
        'title' => esc_html__('PXL Team Carousel', 'ameron'),
        'icon' => 'eicon-posts-carousel',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'swiper',
            'ameron-swiper-vertical',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'layout_section',
                    'label' => esc_html__('Layout', 'ameron' ),
                    'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Templates', 'ameron' ),
                            'type' => 'layoutcontrol',
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'ameron' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_team_carousel-1.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_list',
                    'label' => esc_html__('Content', 'ameron'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'content_list',
                            'label' => esc_html__('Team List', 'ameron'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'image',
                                    'label' => esc_html__('Image', 'ameron' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'number',
                                    'label' => esc_html__('Number', 'ameron'),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'label_block' => true,
                                    'options' => [
                                        '1' => esc_html__( '1', 'ameron' ),
                                        '2' => esc_html__( '2', 'ameron' ),
                                        '3' => esc_html__( '3', 'ameron' ),
                                        '4' => esc_html__( '4', 'ameron' ),
                                        '5' => esc_html__( '5', 'ameron' ),
                                        '6' => esc_html__( '6', 'ameron' ),
                                        '7' => esc_html__( '7', 'ameron' ),
                                        '8' => esc_html__( '8', 'ameron' ),
                                        '9' => esc_html__( '9', 'ameron' ),
                                        '10' => esc_html__( '10', 'ameron' ),
                                    ],
                                    'default' => '1',
                                ),
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'ameron'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'year',
                                    'label' => esc_html__('Year', 'ameron'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'description',
                                    'label' => esc_html__('Description', 'ameron' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 4,
                                ),
                                array(
                                    'name' => 'subtitle',
                                    'label' => esc_html__('Subtitle', 'ameron'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'link',
                                    'label' => esc_html__('Link', 'ameron'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'social',
                                    'label' => esc_html__( 'Social', 'ameron' ),
                                    'type' => 'pxl_icons',
                                ),
                            ),
                            'default' => [
                                [
                                    'year'   => esc_html__( '2011 - 2014', 'ameron' ),
                                    'title'   => esc_html__( 'Art & Multimedia #1', 'ameron' ),
                                    'subtitle' => esc_html__( 'Incident Software House', 'ameron' ),
                                    'description'   => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'ameron' ),
                                ],
                                [
                                    'year'   => esc_html__( '2011 - 2014', 'ameron' ),
                                    'title'   => esc_html__( 'Art & Multimedia #2', 'ameron' ),
                                    'subtitle' => esc_html__( 'Incident Software House', 'ameron' ),
                                    'description'   => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'ameron' ),
                                ],
                                [
                                    'year'   => esc_html__( '2011 - 2014', 'ameron' ),
                                    'title'   => esc_html__( 'Art & Multimedia #3', 'ameron' ),
                                    'subtitle' => esc_html__( 'Incident Software House', 'ameron' ),
                                    'description'   => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'ameron' ),
                                ],
                                [
                                    'year'   => esc_html__( '2011 - 2014', 'ameron' ),
                                    'title'   => esc_html__( 'Art & Multimedia #4', 'ameron' ),
                                    'subtitle' => esc_html__( 'Incident Software House', 'ameron' ),
                                    'description'   => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'ameron' ),
                                ],
                            ],
                            'title_field' => '{{{ title }}}',
                        ),
                    ),
                ),
                array(
                    'name' => 'style_section',
                    'label' => esc_html__('Style', 'ameron' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'ameron' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-team .item-title' => 'color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Title Typography', 'ameron' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-team .item-title',
                        ),
                        array(
                            'name' => 'year_color',
                            'label' => esc_html__('Year Color', 'ameron' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-team .item-year' => 'color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'Year_typography',
                            'label' => esc_html__('Year Typography', 'ameron' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-team .item-year',
                        ),
                        array(
                            'name' => 'subtitle_color',
                            'label' => esc_html__('Subtitle Color', 'ameron' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-team .item-subtitle' => 'color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'subtitle_typography',
                            'label' => esc_html__('Subtitle Typography', 'ameron' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-team .item-subtitle',
                        ),
                        array(
                            'name' => 'description_color',
                            'label' => esc_html__('Description Color', 'ameron' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-team .item-description' => 'color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'description_typography',
                            'label' => esc_html__('Description Typography', 'ameron' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-team .item-description',
                        ),
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
                                '{{WRAPPER}} .pxl-team-carousel .background' => 'background-color: {{VALUE}};',
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
                                '{{WRAPPER}} .pxl-team-carousel .background' => 'opacity: {{SIZE}}{{UNIT}};',
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
                                '{{WRAPPER}} .pxl-team-carousel .background' => 'mix-blend-mode: {{VALUE}}',
                            ],
                        ),             
                    ),
                ),

                array(
                    'name' => 'section_carousel_settings',
                    'label' => esc_html__('Carousel Settings', 'ameron'),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'img_size',
                                'label' => esc_html__('Image Size', 'ameron' ),
                                'type' => \Elementor\Controls_Manager::TEXT,
                                'description' =>  esc_html__('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).', 'ameron')
                            ), 
                            array(
                                'name'        => 'space_between',
                                'label'       => esc_html__('Space Between', 'ameron'),
                                'description' => esc_html__('Distance between slides in px', 'ameron'),
                                'type'        => \Elementor\Controls_Manager::NUMBER,
                                'default'     => 30
                            ),
                               
                            array(
                                'name' => 'max_height',
                                'label' => esc_html__('Max Height', 'ameron' ),
                                'description' => esc_html__('Default: 1200 px', 'ameron'),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'control_type' => 'responsive',
                                'size_units' => [ 'px' ],
                                'range' => [
                                    'px' => [
                                        'min' => 380,
                                        'max' => 5000,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-team-carousel.layout-1 .pxl-swiper-container' => 'max-height: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                        ), 
                        ameron_carousel_column_settings(),
                        array( 
                            array(
                                'name' => 'slides_to_scroll',
                                'label' => esc_html__('Slides to scroll', 'ameron' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'default' => '1',
                                'options' => [
                                    '1' => '1',
                                    '2' => '2',
                                    '3' => '3',
                                    '4' => '4',
                                    '5' => '5',
                                    '6' => '6',
                                ],
                            ),
                            array(
                                'name' => 'arrows',
                                'label' => esc_html__('Show Arrows', 'ameron'),
                                'type' => \Elementor\Controls_Manager::SWITCHER,
                            ),
                            array(
                                'name' => 'dots',
                                'label' => esc_html__('Show Dots', 'ameron'),
                                'type' => \Elementor\Controls_Manager::SWITCHER,
                            ),
                            array(
                                'name' => 'pause_on_hover',
                                'label' => esc_html__('Pause on Hover', 'ameron'),
                                'type' => \Elementor\Controls_Manager::SWITCHER,
                            ),
                            array(
                                'name' => 'autoplay',
                                'label' => esc_html__('Autoplay', 'ameron'),
                                'type' => \Elementor\Controls_Manager::SWITCHER,
                            ),
                            array(
                                'name' => 'autoplay_speed',
                                'label' => esc_html__('Autoplay Speed', 'ameron'),
                                'type' => \Elementor\Controls_Manager::NUMBER,
                                'default' => 5000,
                                'condition' => [
                                    'autoplay' => 'true'
                                ]
                            ),
                            array(
                                'name' => 'infinite',
                                'label' => esc_html__('Infinite Loop', 'ameron'),
                                'type' => \Elementor\Controls_Manager::SWITCHER,
                            ),
                            array(
                                'name' => 'speed',
                                'label' => esc_html__('Animation Speed', 'ameron'),
                                'type' => \Elementor\Controls_Manager::NUMBER,
                                'default' => 400,
                            ),
                        )
                    ),
                ),
            ),
        ),
    ),
    ameron_get_class_widget_path()
);