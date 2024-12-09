<?php
// Register Accordion Widget
$templates = ameron_get_templates_option('default', []) ;
pxl_add_custom_widget(
    array(
        'name'       => 'pxl_accordion',
        'title'      => esc_html__( 'PXL Accordion', 'ameron' ),
        'icon'       => 'eicon-accordion',
        'categories' => array('pxltheme-core'),
        'scripts'    => array(
            'ameron-accordion'
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'source_section',
                    'label'    => esc_html__( 'Source Settings', 'ameron' ),
                    'tab'      => 'content',
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'ameron' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style1' => esc_html__( 'Style 1', 'ameron' ),
                                'style2' => esc_html__( 'Style 2', 'ameron' ),
                            ],
                            'default' => 'style1',
                        ),
                        array(
                            'name' => 'active_section',
                            'label' => esc_html__('Active section', 'ameron' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'separator' => 'after',
                            'default' => '1',
                        ),
                        array(
                            'name' => 'ac_items',
                            'label' => esc_html__('Accordion Items', 'ameron' ),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'ac_title',
                                    'label' => esc_html__('Title', 'ameron' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 3,
                                ),
                                array(
                                    'name' => 'ac_title_number',
                                    'label' => esc_html__('Number', 'ameron' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'rows' => 3,
                                    'description' => 'Use for Style 1 only',
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
                                    'name' => 'ac_title_des',
                                    'label' => esc_html__('Description', 'ameron' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 3,
                                ),
                                array(
                                    'name' => 'ac_title_year',
                                    'label' => esc_html__('Year', 'ameron' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 3,
                                ),
                                array(
                                    'name' => 'ac_title_scroll',
                                    'label' => esc_html__('Title Scroll', 'ameron' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 3,
                                    'description' => 'Use for Style 2 only'
                                ),
                                array(
                                    'name' => 'ac_content_type',
                                    'label' => esc_html__( 'Content Type', 'ameron' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => 'text_editor',
                                    'options' => [
                                        'text_editor' => esc_html__( 'Text Editor', 'ameron' ),
                                        'template' => esc_html__( 'Template', 'ameron' ),
                                    ],
                                ),
                                array(
                                    'name' => 'ac_content',
                                    'label' => esc_html__('Content', 'ameron' ),
                                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                                    'show_label' => false,
                                    'condition' => [
                                        'ac_content_type' => 'text_editor'
                                    ],
                                ),
                                array(
                                    'name' => 'ac_content_template',
                                    'label' => esc_html__('Select Templates', 'ameron'),
                                    'description'        => sprintf(esc_html__('Please create your layout before choosing. %sClick Here%s','ameron'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=pxl-template' ) ) . '">','</a>'),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => '',
                                    'options' => $templates,
                                    'condition' => [
                                        'ac_content_type' => 'template'
                                    ],
                                ),
                            ),
                            'default' => [
                                [
                                    'ac_title_year'   => esc_html__( '2011 - 2014', 'ameron' ),
                                    'ac_title'   => esc_html__( 'Ui/Ux Designer #1', 'ameron' ),
                                    'ac_title_des'   => esc_html__( 'Incidiynt Softwere House', 'ameron' ),
                                    'ac_content' => esc_html__( 'Lorem ipsum dolor sit amet consecte tur adipiscing elit sed do eiu smod tempor incididunt ut labore.', 'ameron' ),
                                ],
                                [
                                    'ac_title_year'   => esc_html__( '2011 - 2014', 'ameron' ),
                                    'ac_title'   => esc_html__( 'Ui/Ux Designer #2', 'ameron' ),
                                    'ac_title_des'   => esc_html__( 'Incidiynt Softwere House', 'ameron' ),
                                    'ac_content' => esc_html__( 'Lorem ipsum dolor sit amet consecte tur adipiscing elit sed do eiu smod tempor incididunt ut labore.', 'ameron' ),
                                ],
                                [
                                    'ac_title_year'   => esc_html__( '2011 - 2014', 'ameron' ),
                                    'ac_title'   => esc_html__( 'Ui/Ux Designer #3', 'ameron' ),
                                    'ac_title_des'   => esc_html__( 'Incidiynt Softwere House', 'ameron' ),
                                    'ac_content' => esc_html__( 'Lorem ipsum dolor sit amet consecte tur adipiscing elit sed do eiu smod tempor incididunt ut labore.', 'ameron' ),
                                ],
                            ],
                            'title_field' => '{{{ ac_title }}}',
                            'separator' => 'after',
                        ),
                        
                    )
                ),
                array(
                    'name'     => 'style_section',
                    'label'    => esc_html__( 'Style', 'ameron' ),
                    'tab'      => 'style',
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'bg_ac_item',
                                'label' => esc_html__('Background Color Item', 'ameron' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'default' => '',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-accordion.style2 .pxl-ac-item' => 'background-color: {{VALUE}};',
                                ],
                                'condition' => [
                                    'style' => 'style2'
                                ],
                            ),
                            array(
                                'name' => 'year_color',
                                'label' => esc_html__('Year Color', 'ameron' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-accordion .pxl-ac-item .pxl-ac-title-year' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'Year_typography',
                                'label' => esc_html__('Year Typography', 'ameron' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-accordion .pxl-ac-item .pxl-ac-title-year',
                            ),
                            array(
                                'name' => 'title_color',
                                'label' => esc_html__('Title Color', 'ameron' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-accordion .pxl-ac-item .pxl-ac-title-text' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'title_typography',
                                'label' => esc_html__('Title Typography', 'ameron' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-accordion .pxl-ac-item .pxl-ac-title-text',
                            ),
                            array(
                                'name' => 'sub_color',
                                'label' => esc_html__('Subtitle Color', 'ameron' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-accordion .pxl-ac-item .pxl-ac-title-des' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'Year_typography',
                                'label' => esc_html__('Subtitle Typography', 'ameron' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-accordion .pxl-ac-item .pxl-ac-title-des',
                            ),
                            array(
                                'name' => 'desc_color',
                                'label' => esc_html__('Description Color', 'ameron' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-accordion .pxl-ac-item .pxl-ac-content .pxl-ac-content-inner' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'desc_typography',
                                'label' => esc_html__('Description Typography', 'ameron' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-accordion .pxl-ac-item .pxl-ac-content .pxl-ac-content-inner',
                            ),
                        )
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
                            'condition' => [
                                'style' => 'style1'
                            ],
                            'default' => "",
                        ),
                        array(
                            'name' => 'bg_item_color',
                            'label' => esc_html__('Background Color', 'ameron' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion.style1 .background' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'style' => 'style1'
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
                                '{{WRAPPER}} .pxl-accordion.style1 .background' => 'opacity: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'style' => 'style1'
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
                                '{{WRAPPER}} .pxl-accordion.style1 .background' => 'mix-blend-mode: {{VALUE}}',
                            ],
                        ),             
                    ),
                ),
                
            ),
        ),
    ),
    ameron_get_class_widget_path()
);