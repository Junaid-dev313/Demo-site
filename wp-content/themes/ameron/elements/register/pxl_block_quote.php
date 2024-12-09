<?php
pxl_add_custom_widget(
    array(
        'name'       => 'pxl_block_quote',
        'title'      => esc_html__( 'PXL Block Quote', 'ameron' ),
        'icon'       => 'eicon-blockquote',
        'categories' => array('pxltheme-core'),
        'scripts'    => array(),
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__( 'Layout', 'ameron' ),
                    'tab'      => 'layout',
                    'controls' => array(
                        array(
                            'name' => 'text_align',
                            'label' => esc_html__( 'Alignment', 'ameron' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
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
                                '{{WRAPPER}} .pxl-block-quote-wrap' => 'justify-content: {{VALUE}};',
                            ],
                        ),
                         
                        array(
                            'name'    => 'layout',
                            'label'   => esc_html__( 'Templates', 'ameron' ),
                            'type'    => 'layoutcontrol',
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__( 'Layout 1', 'ameron' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/block-quote-1.jpg'
                                ]
                            ],
                            'prefix_class' => 'pxl-blockquote-layout-'
                        )
                    )
                ),
                array(
                    'name'     => 'text_section',
                    'label'    => esc_html__( 'Content & Client Name', 'ameron' ),
                    'tab'      => 'content',
                    'controls' => array(
                        array(
                            'name'     => 'bq_content',
                            'label'    => esc_html__('Content', 'ameron'),
                            'type'     => 'textarea',
                            'default'  => esc_html__('“When you think ‘I know’ and ‘it is,’ you have the illusion of knowing, the illusion of certainty, and then you’re mindless”', 'ameron')
                        ),
                        array(
                            'name'     => 'bq_client_name',
                            'label'    => esc_html__('Client Name', 'ameron'),
                            'type'     => 'text',
                            'label_block' => true,
                            'default'  => 'Kristoffer Nolan'
                        ),
                    )
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
                                '{{WRAPPER}} .pxl-block-quote .background' => 'background-color: {{VALUE}};',
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
                                '{{WRAPPER}} .pxl-block-quote .background' => 'opacity: {{SIZE}}{{UNIT}};',
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
                                '{{WRAPPER}} .pxl-block-quote .background' => 'mix-blend-mode: {{VALUE}}',
                            ],
                        ),             
                    ),
                ),
            )
        )
    ),
    ameron_get_class_widget_path()
);