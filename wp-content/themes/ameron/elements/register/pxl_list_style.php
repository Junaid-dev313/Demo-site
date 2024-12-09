<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_list_style',
        'title' => esc_html__('PXL Lists Style', 'ameron'),
        'icon' => 'eicon-editor-list-ul',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_list',
                    'label' => esc_html__('Content', 'ameron'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'ameron' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style1' => esc_html__('Style 1', 'ameron' ),
                                'style2' => esc_html__('Style 2', 'ameron' ),
                                'style3' => esc_html__('Style 3', 'ameron' ),
                            ],
                            'default' => 'style1',
                        ),
                        array(
                            'name' => 'selected_icon',
                            'label' => esc_html__('Icon', 'ameron' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                        ),
                        array(
                            'name' => 'list',
                            'label' => esc_html__('List', 'ameron'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'content',
                                    'label' => esc_html__('Content', 'ameron'),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ content }}}',
                        ),
                    ),
                ),
                array(
                    'name' => 'style_section',
                    'label' => esc_html__('Style', 'ameron' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'icon_color',
                                'label' => esc_html__('Icon Color', 'ameron' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-list-style .list-icon' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'icon_fontsize',
                                'label' => esc_html__('Icon Font Size (px)', 'ameron' ),
                                'type' => \Elementor\Controls_Manager::NUMBER,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-list-style .list-icon' => 'font-size: {{VALUE}}px;',
                                ],
                            ),
                            array(
                                'name' => 'content_color',
                                'label' => esc_html__('Content Color', 'ameron' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-list-style .list-content' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'content_typography',
                                'label' => esc_html__('Content Typography', 'ameron' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-list-style .list-content',
                            ),
                            array(
                                'name' => 'item_spacing',
                                'label' => esc_html__('Item Space (px)', 'ameron' ),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'control_type' => 'responsive',
                                'size_units' => [ 'px' ],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 3000,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-list-style .list-item + .list-item' => 'margin-top: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                        ),
                        ameron_elementor_animation_opts([
                            'name'   => 'item',
                            'label' => esc_html__('Item', 'ameron' ),
                        ])
                    ),
                ),
            ),
        ),
    ),
    ameron_get_class_widget_path()
);