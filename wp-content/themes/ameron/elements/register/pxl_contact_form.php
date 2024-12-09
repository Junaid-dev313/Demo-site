<?php
// Register Contact Form 7 Widget
if(class_exists('WPCF7')) {
    $cf7 = get_posts('post_type="wpcf7_contact_form"&numberposts=-1');
    $contact_forms = array();
    if ($cf7) {
        foreach ($cf7 as $cform) {
            $contact_forms[$cform->post_name] = $cform->post_title;
        }
    } else {
        $contact_forms[esc_html__('No contact forms found', 'ameron')] = 0;
    }

    pxl_add_custom_widget(
        array(
            'name'       => 'pxl_contact_form',
            'title'      => esc_html__('Pxl Contact Form 7', 'ameron'),
            'icon'       => 'eicon-form-horizontal',
            'categories' => array('pxltheme-core'),
            'scripts'    => array(),
            'params'     => array(
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
                                        'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_contact_form-1.jpg'
                                    ],
                                    '2' => [
                                        'label' => esc_html__( 'Layout 2', 'ameron' ),
                                        'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_contact_form-2.jpg'
                                    ],
                                ],
                            )
                        )
                    ),
                    array(
                        'name' => 'source_section',
                        'label' => esc_html__('Source Settings', 'ameron'),
                        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                        'controls' => array(
                            array(
                                'name' => 'ctf7_slug',
                                'label' => esc_html__('Select Form', 'ameron'),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'description' => 'Use for layout 1 and 2 respectively',
                                'options' => $contact_forms,
                                'default' => array_key_first($contact_forms),
                            ),
                        ),
                    ),
                    array(
                        'name' => 'section_style_button',
                        'label' => esc_html__('Button Style', 'ameron' ),
                        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                        'controls' => array(
                            array(
                                'name' => 'text_align',
                                'label' => esc_html__('Alignment', 'ameron' ),
                                'type' => \Elementor\Controls_Manager::CHOOSE,
                                'control_type' => 'responsive',
                                'options' => [
                                    'left' => [
                                        'title' => esc_html__('Left', 'ameron' ),
                                        'icon' => 'eicon-text-align-left',
                                    ],
                                    'center' => [
                                        'title' => esc_html__('Center', 'ameron' ),
                                        'icon' => 'eicon-text-align-center',
                                    ],
                                    'right' => [
                                        'title' => esc_html__('Right', 'ameron' ),
                                        'icon' => 'eicon-text-align-right',
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form7' => 'text-align: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'button_style_tabs',
                                'control_type' => 'tab',
                                'tabs' => array(
                                    array(
                                        'name' => 'button_style_normal',
                                        'label' => esc_html__('Normal', 'ameron'),
                                        'controls' => array(
                                            array(
                                                'name' => 'button_color',
                                                'label' => esc_html__('Text Color', 'ameron'),
                                                'type' => \Elementor\Controls_Manager::COLOR,
                                                'selectors' => [
                                                    '{{WRAPPER}} .wpcf7-form input[type="submit"]' => 'color: {{VALUE}};'
                                                ]
                                            ),
                                            array(
                                                'name' => 'button_background',
                                                'type' => \Elementor\Group_Control_Background::get_type(),
                                                'control_type' => 'group',
                                                'types'             => [ 'classic' , 'gradient' ],
                                                'selector' => '{{WRAPPER}} .wpcf7-form input[type="submit"]',
                                            ),

                                        )
                                    ),
                                    array(
                                        'name' => 'button_style_hover',
                                        'label' => esc_html__('Hover', 'ameron'),
                                        'controls' => array(
                                            array(
                                                'name' => 'button_color_hover',
                                                'label' => esc_html__('Text Color', 'ameron'),
                                                'type' => \Elementor\Controls_Manager::COLOR,
                                                'selectors' => [
                                                    '{{WRAPPER}} .wpcf7-form input[type="submit"]:hover' => 'color:{{VALUE}};'
                                                ]
                                            ),
                                            array(
                                                'name' => 'button_background_hover',
                                                'type' => \Elementor\Group_Control_Background::get_type(),
                                                'control_type' => 'group',
                                                'types'             => [ 'classic' , 'gradient' ],
                                                'selector' => '{{WRAPPER}} .wpcf7-form input[type="submit"]:hover',
                                            ),
                                        )
                                    ),
                                )
                            ),
                        ),
                    ),
                    array(
                        'name' => 'textarea_size',
                        'label' => esc_html__('Texarea Size', 'ameron'),
                        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                        'condition' => [
                            'layout' => '2'
                        ],
                        'controls' => array(
                            array(
                                'name'  =>  'message_height',
                                'type'  =>  \Elementor\Controls_Manager::SLIDER,
                                'label' => esc_html__('Message Height', 'ameron'),
                                'size_units' => ['px'],
                                'range' => [
                                    'px' => [
                                        'min' => 120,
                                        'max' => 350,
                                    ],
                                ],
                                'default'   => [
                                    'unit' => 'px',
                                    'size' => '',
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .wpcf7-form textarea.wpcf7-textarea' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                        ),
                    ),
                ),
            )
        ),
            ameron_get_class_widget_path()
    );
}