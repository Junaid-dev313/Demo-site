<?php
// Register Quick Contact Widget
pxl_add_custom_widget(
    array(
        'name'       => 'pxl_portfolio_info',
        'title'      => esc_html__( 'PXL Portfolio Info', 'ameron' ),
        'icon'       => 'eicon-info-circle-o',
        'categories' => array('pxltheme-core'),
        'scripts'    => [],
        'params'     => array(
            'sections' => array(
                  
                array(
                    'name'     => 'content_section',
                    'label'    => esc_html__( 'Content Settings', 'ameron' ),
                    'tab'      => 'content',
                    'controls' => array(
                        array(
                            'name'     => 'portfolio_infos',
                            'label'    => esc_html__( 'Portfolio Information Lists', 'ameron' ),
                            'type'     => 'repeater',
                            'controls' => array(
                                array(
                                    'name'        => 'item_label',
                                    'label'       => esc_html__( 'Item Label', 'ameron' ),
                                    'type'        => 'text',
                                    'placeholder' => esc_html__( 'Enter item label', 'ameron' ),
                                    'default'     => 'Name:',  
                                    'label_block' => true
                                ), 
                                array(
                                    'name'        => 'item_value',
                                    'label'       => esc_html__( 'Item Value', 'ameron' ),
                                    'type'        => 'text',
                                    'placeholder' => esc_html__( 'Enter item value', 'ameron' ),
                                    'default'     => 'ABC',  
                                    'label_block' => true
                                ),
                            ),
                            'default' => [
                                [
                                    'item_label' => 'WEBSITE:',
                                    'item_value' => 'websroad.com',
                                ],
                                [
                                    'item_label' => 'DATE:',
                                    'item_value' => 'August 02, 2022',
                                ],
                                [
                                    'item_label' => 'SERVICES:',
                                    'item_value' => 'Design, Art Direction, Website',
                                ],
                            ],
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
                            'default'     => 'Hire me now', 
                            'label_block' => true
                        ),
                    )
                ),
                array(
                    'name' => 'pi_style',
                    'label' => esc_html__('Style', 'ameron'),
                    'tab' => 'style',
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'content_color',
                                'label' => esc_html__('Content Color', 'ameron' ),
                                'type' => 'color',
                                'selectors' => [
                                    '{{WRAPPER}} .pi-value' => 'color: {{VALUE}};',
                                ],
                            ), 
                            array(
                                'name' => 'lbl_color',
                                'label' => esc_html__('Label Color', 'ameron' ),
                                'type' => 'color',
                                'selectors' => [
                                    '{{WRAPPER}} .pi-lbl' => 'color: {{VALUE}};',
                                ],
                            ), 
                            array(
                                'name' => 'lbl_typo',
                                'label' => esc_html__('Label Typography', 'ameron' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pi-lbl',
                            ),
                        ),
                        ameron_elementor_animation_opts([
                            'name'   => 'item',
                            'label' => esc_html__('Item', 'ameron'),
                        ])
                    ),
                ),
            )
        )
    ),
    ameron_get_class_widget_path()
);