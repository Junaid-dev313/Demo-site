<?php
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;

pxl_add_custom_widget(
    array(
        'name' => 'pxl_video',
        'title' => esc_html__('PXL Video', 'ameron'),
        'icon' => 'eicon-play',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'layout_section',
                    'label' => esc_html__('Layout', 'ameron'),
                    'tab' => 'layout',
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Templates', 'ameron'),
                            'type' => 'layoutcontrol',
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'ameron'),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_video-1.jpg'
                                ] 
                            ],
                            'prefix_class' => 'pxl-video-layout-'
                        ),
                        array(
                            'name'  => 'max_width',
                            'label' => esc_html__( 'Max Width (px)', 'ameron' ),
                            'type'  => 'slider',
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => 100,
                                    'max' => 1920,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video-player' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        )
                    )
                ),
                array(
                    'name' => 'video_section',
                    'label' => esc_html__('Video', 'ameron'),
                    'tab' => 'content',
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'video_bt_style',
                                'label' => esc_html__('Video Button Style', 'ameron'),
                                'type' => Controls_Manager::SELECT,
                                'options' => [
                                    'df' => esc_html__('Default', 'ameron'),
                                    '1' => esc_html__('Rim Border', 'ameron'),
                                    '2' => esc_html__('Primary color', 'ameron'),
                                ],
                                'default' => 'df',
                            ),
                            array(
                                'name' => 'video_link',
                                'label' => esc_html__('Video URL', 'ameron'),
                                'description' => '(https://www.youtube.com/watch?v=r2YbkyYA9Gc)',
                                'type' => Controls_Manager::URL,
                                'default' => [
                                    'url' => '',
                                    'is_external' => 'on'
                                ]
                            ),
                            array(
                                'name' => 'video_play_bg',
                                'label' => esc_html__('Video Button Background', 'ameron'),
                                'type' => Controls_Manager::COLOR,
                                'condition' => [
                                    'video_link[url]!' => ''
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-video-player .pxl-video-btn' => 'background-color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'video_play_bg_hover',
                                'label' => esc_html__('Video Button Background Hover', 'ameron'),
                                'type' => Controls_Manager::COLOR,
                                'condition' => [
                                    'video_link[url]!' => ''
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-video-player .pxl-video-btn:hover' => 'background-color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'video_play_size',
                                'label' => esc_html__('Video Button Size', 'ameron'),
                                'type' => Controls_Manager::SELECT,
                                'options' => [
                                    'df' => esc_html__('Default (72px x 72px)', 'ameron'),
                                    '1' => '80px x 80px',
                                    '2' => '117px x 117px',
                                    '3' => '123px x 123px',
                                ],
                                'default' => 'df',
                            ),
                            array(
                                'name' => 'play_icon_color',
                                'label' => esc_html__('Play Icon Color', 'ameron'),
                                'type' => Controls_Manager::COLOR,
                                'condition' => [
                                    'video_link[url]!' => ''
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-video-player .pxl-video-btn > .pxl-icon' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'play_icon_color_hover',
                                'label' => esc_html__('Play Icon Color Hover', 'ameron'),
                                'type' => Controls_Manager::COLOR,
                                'condition' => [
                                    'video_link[url]!' => ''
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-video-player .pxl-video-btn:hover > .pxl-icon' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'video_text',
                                'label' => esc_html__('Video Text', 'ameron'),
                                'type' => Controls_Manager::TEXT,
                                'default' => '',
                                'condition' => [
                                    'video_link[url]!' => ''
                                ],
                                'label_block' => true
                            ),
                            array(
                                'name' => 'video_heading',
                                'label' => esc_html__('Video Heading', 'ameron'),
                                'type' => Controls_Manager::TEXT,
                                'default' => '',
                                'condition' => [
                                    'video_link[url]!' => ''
                                ],
                                'label_block' => true
                            ),
                            array(
                                'name' => 'video_text_color',
                                'label' => esc_html__('Text Color', 'ameron'),
                                'type' => Controls_Manager::COLOR,
                                'condition' => [
                                    'video_link[url]!' => '',
                                    'video_text!' => ''
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-video-player .pxl-video-text' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'video_heading_color',
                                'label' => esc_html__('Heading Color', 'ameron'),
                                'type' => Controls_Manager::COLOR,
                                'condition' => [
                                    'video_link[url]!' => '',
                                    'video_heading!' => ''
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-video-player .pxl-video-heading' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'video_animation',
                                'label' => esc_html__('Button Video Effect', 'ameron'),
                                'type' => Controls_Manager::ANIMATION,
                                'condition' => [
                                    'video_link[url]!' => ''
                                ]
                            ),
                            array(
                                'name' => 'video_animation_duration',
                                'label' => esc_html__('Animation Duration', 'ameron'),
                                'type' => Controls_Manager::SELECT,
                                'default' => 'normal',
                                'options' => [
                                    'slow' => esc_html__('Slow', 'ameron'),
                                    'normal' => esc_html__('Normal', 'ameron'),
                                    'fast' => esc_html__('Fast', 'ameron'),
                                ],
                                'condition' => [
                                    'video_link[url]!' => '',
                                    'video_animation!' => '',
                                ]
                            ),
                            array(
                                'name' => 'video_animation_delay',
                                'label' => esc_html__('Animation Delay', 'ameron'),
                                'type' => Controls_Manager::NUMBER,
                                'min' => 0,
                                'step' => 100,
                                'condition' => [
                                    'video_link[url]!' => '',
                                    'video_animation!' => ''
                                ]
                            )
                        )
                    )
                ),
                array(
                    'name' => 'image_section',
                    'label' => esc_html__('Image Overlay', 'ameron'),
                    'tab' => 'content',
                    'controls' => array(
                        array(
                            'name' => 'video_image_overlay',
                            'label' => esc_html__('Choose Image', 'ameron'),
                            'type' => 'media',
                            'dynamic' => [
                                'active' => true,
                            ],
                            'default' => [
                                'url' => Utils::get_placeholder_image_src()
                            ]
                        ),
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'ameron' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height).',
                        ),
                        array(
                            'name' => 'bg_color',
                            'label' => esc_html__('Background Color', 'ameron'),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video-player .pxl-overlay' => 'background-color:{{VALUE}};'
                            ]
                        ),
                        array(
                            'name' => 'border_radius',
                            'label' => esc_html__('Border Radius', 'ameron' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video-player img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-overlay' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ],
                        ),
                    )
                )
            )
        )
    ),
    ameron_get_class_widget_path()
);