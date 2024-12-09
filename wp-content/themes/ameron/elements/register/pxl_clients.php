<?php
pxl_add_custom_widget(
    array(
        'name'       => 'pxl_clients',
        'title'      => esc_html__('PXL Clients', 'ameron'),
        'icon'       => 'eicon-slider-push',
        'categories' => array('pxltheme-core'),
        'scripts'    => array(
            'swiper',
            'ameron-swiper',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'layout_section',
                    'label' => esc_html__('Layout', 'ameron' ),
                    'tab' => 'layout',
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Templates', 'ameron' ),
                            'type' => 'layoutcontrol',
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'ameron' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_client-1.jpg'
                                ]
                            ],
                            'prefix_class' => 'pxl-clients-layout-'
                        )
                    ),
                ),
                array(
                    'name'     => 'clients_list',
                    'label'    => esc_html__('Clients', 'ameron'),
                    'tab'      => 'content',
                    'controls' => array(
                        array(
                            'name'     => 'clients',
                            'label'    => esc_html__('Add Client', 'ameron'),
                            'type'     => 'repeater',
                            'controls' => array(
                                array(
                                    'name'        => 'client_img',
                                    'label'       => esc_html__('Client Image', 'ameron'),
                                    'type'        => 'media',
                                    'label_block' => true,
                                ),
                                array(
                                    'name'        => 'name',
                                    'label'       => esc_html__('Client Name', 'ameron'),
                                    'type'        => 'text',
                                    'label_block' => true,
                                ), 
                                array(
                                    'name'        => 'image_link',
                                    'label'       => esc_html__( 'Client Link', 'ameron' ),
                                    'type'        => 'url',
                                    'placeholder' => esc_html__( 'https://your-link.com', 'ameron' ),
                                    'default'     => [
                                        'url'         => '#',
                                        'is_external' => 'on'
                                    ],
                                )
                            ),
                            'default' => [],
                            'title_field' => '{{{ name }}}',
                        ) 
                    )
                ),
                array(
                    'name' => 'carousel_setting',
                    'label' => esc_html__('Carousel Settings', 'ameron' ),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array_merge(
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
            )
        )
    ),
    ameron_get_class_widget_path()
);