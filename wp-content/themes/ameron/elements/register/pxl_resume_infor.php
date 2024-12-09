<?php
// Register Quick Contact Widget
pxl_add_custom_widget(
    array(
        'name'       => 'pxl_resume_info',
        'title'      => esc_html__( 'PXL Resume Info', 'ameron' ),
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
                            'name'        => 'heading_title',
                            'label'       => esc_html__( 'Heading Title', 'ameron' ),
                            'type'        => 'text',
                            'placeholder' => esc_html__( 'Enter heading title', 'ameron' ),
                            'default'     => esc_html__( 'UI/UX Designer', 'ameron' ),
                            'label_block' => true
                        ),
                        array(
                            'name' => 'active_heading',
                            'label' => esc_html__('Active Heading Title', 'ameron' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'active' => 'Active',
                                'deactive' => 'Deactive',
                            ],
                            'default' => 'active',
                        ),
                        array(
                            'name'     => 'resume_infos',
                            'label'    => esc_html__( 'Resume Information Lists', 'ameron' ),
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
                                array(
                                    'name' => 'active_dot',
                                    'label' => esc_html__('Active Dot', 'ameron' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => [
                                        'active' => 'Active',
                                        'deactive' => 'Deactive',
                                    ],
                                    'default' => 'deactive',
                                ),
                            ),
                            'default' => [
                                [
                                    'item_label' => 'AGE :',
                                    'item_value' => '28',
                                ],
                                [
                                    'item_label' => 'PHONE :',
                                    'item_value' => '+12 986 987 7867',
                                ],
                                [
                                    'item_label' => 'EMAIL :',
                                    'item_value' => 'youremail@gmail.com',
                                ],
                                [
                                    'item_label' => 'ADRESS :',
                                    'item_value' => '37, Pollsatnd, New York, United State',
                                ],
                                [
                                    'item_label' => 'Freelancer :',
                                    'item_value' => 'AVAILABLE',
                                ],
                            ],
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
                                'name' => 'heading_color',
                                'label' => esc_html__('Heading Color', 'ameron' ),
                                'type' => 'color',
                                'selectors' => [
                                    '{{WRAPPER}} .pi-heading' => 'color: {{VALUE}};',
                                ],
                                'condition' => [
                                    'active_heading' => 'active',
                                ],
                            ), 
                            array(
                                'name' => 'content_color',
                                'label' => esc_html__('Content Color', 'ameron' ),
                                'type' => 'color',
                                'selectors' => [
                                    '{{WRAPPER}} .pi-content .pi-value' => 'color: {{VALUE}};',
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