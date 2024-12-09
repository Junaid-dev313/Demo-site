<?php
$pt_supports = ['post','pxl-case-study', 'pxl-practice-area'];
use Elementor\Controls_Manager;
pxl_add_custom_widget(
    array(
        'name'       => 'pxl_post_grid',
        'title'      => esc_html__('PXL Post Grid', 'ameron' ),
        'icon'       => 'eicon-posts-grid',
        'categories' => array('pxltheme-core'),
        'scripts'    => [
            'imagesloaded',
            'isotope',
            'ameron-post-grid',
        ],
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__( 'Layout', 'ameron' ),
                    'tab'      => 'layout',
                    'controls' => array_merge(
                        array(
                            array(
                                'name'     => 'post_type',
                                'label'    => esc_html__( 'Select Post Type', 'ameron' ),
                                'type'     => 'select',
                                'multiple' => true,
                                'options'  => ameron_get_post_type_options($pt_supports),
                                'default'  => 'post'
                            ) 
                        ),
                        ameron_get_post_grid_layout($pt_supports)
                    ),
                ),
                 
                array(
                    'name' => 'source_section',
                    'label' => esc_html__('Source', 'ameron' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'     => 'select_post_by',
                                'label'    => esc_html__( 'Select posts by', 'ameron' ),
                                'type'     => 'select',
                                'multiple' => true,
                                'options'  => [
                                    'term_selected' => esc_html__( 'Terms selected', 'ameron' ),
                                    'post_selected' => esc_html__( 'Posts selected ', 'ameron' ),
                                ],
                                'default'  => 'term_selected'
                            ) 
                        ),
                        ameron_get_grid_term_by_posttype($pt_supports, ['custom_condition' => ['select_post_by' => 'term_selected']]),
                        ameron_get_grid_ids_by_posttype($pt_supports, ['custom_condition' => ['select_post_by' => 'post_selected']]),
                        array(
                            array(
                                'name'    => 'orderby',
                                'label'   => esc_html__('Order By', 'ameron' ),
                                'type'    => \Elementor\Controls_Manager::SELECT,
                                'default' => 'date',
                                'options' => [
                                    'date'   => esc_html__('Date', 'ameron' ),
                                    'ID'     => esc_html__('ID', 'ameron' ),
                                    'author' => esc_html__('Author', 'ameron' ),
                                    'title'  => esc_html__('Title', 'ameron' ),
                                    'rand'   => esc_html__('Random', 'ameron' ),
                                ],
                            ),
                            array(
                                'name'    => 'order',
                                'label'   => esc_html__('Sort Order', 'ameron' ),
                                'type'    => \Elementor\Controls_Manager::SELECT,
                                'default' => 'desc',
                                'options' => [
                                    'desc' => esc_html__('Descending', 'ameron' ),
                                    'asc'  => esc_html__('Ascending', 'ameron' ),
                                ],
                            ),
                            array(
                                'name'    => 'limit',
                                'label'   => esc_html__('Total items', 'ameron' ),
                                'type'    => \Elementor\Controls_Manager::NUMBER,
                                'default' => '6',
                            ),
                        )
                    ),
                ),
                array(
                    'name' => 'general_section',
                    'label' => esc_html__('General Settings', 'ameron' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'        => 'img_size',
                                'label'       => esc_html__('Image Size', 'ameron' ),
                                'type'        => \Elementor\Controls_Manager::TEXT,
                                'description' =>  esc_html__('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).', 'ameron')
                            ),
                            array(
                                'name'    => 'layout_mode',
                                'label'   => esc_html__( 'Layout Mode', 'ameron' ),
                                'type'    => \Elementor\Controls_Manager::SELECT,
                                'options' => [
                                    'fitRows' => esc_html__( 'Basic Grid', 'ameron' ),
                                    'masonry' => esc_html__( 'Masonry Grid', 'ameron' ),
                                ],
                                'default'   => 'fitRows'
                            ),
                            array(
                                'name'    => 'filter',
                                'label'   => esc_html__('Term Filter', 'ameron' ),
                                'type'    => \Elementor\Controls_Manager::SELECT,
                                'default' => 'false',
                                'options' => [
                                    'true'  => esc_html__('Enable', 'ameron' ),
                                    'false' => esc_html__('Disable', 'ameron' ),
                                ],
                                'condition' => [
                                    'select_post_by' => 'term_selected',
                                ],
                                
                            ),
                            array(
                                'name'      => 'filter_default_title',
                                'label'     => esc_html__('Filter Default Title', 'ameron' ),
                                'type'      => \Elementor\Controls_Manager::TEXT,
                                'default'   => esc_html__('All', 'ameron' ),
                                'condition' => [
                                    'select_post_by' => 'term_selected',
                                    'filter'         => 'true',
                                ],
                            ),
                            array(
                                'name'         => 'filter_alignment',
                                'label'        => esc_html__( 'Filter Alignment', 'ameron' ),
                                'type'         => 'choose',
                                'control_type' => 'responsive',
                                'options' => [
                                    'start' => [
                                        'title' => esc_html__( 'Start', 'ameron' ),
                                        'icon'  => 'eicon-text-align-left',
                                    ],
                                    'center' => [
                                        'title' => esc_html__( 'Center', 'ameron' ),
                                        'icon'  => 'eicon-text-align-center',
                                    ],
                                    'end' => [
                                        'title' => esc_html__( 'End', 'ameron' ),
                                        'icon'  => 'eicon-text-align-right',
                                    ]
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .grid-filter-wrap' => 'justify-content: {{VALUE}};'
                                ],
                                'default'      => 'center',
                                'condition' => [
                                    'select_post_by' => 'term_selected',
                                    'filter'         => 'true',
                                ],
                            ),
                            array(
                                'name'    => 'pagination_type',
                                'label'   => esc_html__('Pagination Type', 'ameron' ),
                                'type'    => \Elementor\Controls_Manager::SELECT,
                                'default' => 'false',
                                'options' => [
                                    'pagination' => esc_html__('Pagination', 'ameron' ),
                                    'loadmore'   => esc_html__('Loadmore', 'ameron' ),
                                    'false'      => esc_html__('Disable', 'ameron' ),
                                ],
                            ),
                            array(
                                'name'      => 'loadmore_text',
                                'label'     => esc_html__( 'Load More text', 'ameron' ),
                                'type'      => \Elementor\Controls_Manager::TEXT,
                                'default'   => esc_html__('Load More','ameron'),
                                'condition' => [
                                    'pagination_type' => 'loadmore'
                                ]
                            ),
                            array(
                                'name'             => 'loadmore_icon',
                                'label'            => esc_html__( 'Loadmore Icon', 'ameron' ),
                                'type'             => 'icons',
                                'default'          => [],
                                'condition' => [
                                    'pagination_type' => 'loadmore'
                                ]
                            ),
                            array(
                                'name' => 'icon_align',
                                'label' => esc_html__('Icon Position', 'ameron' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'default' => 'right',
                                'options' => [
                                    'right' => esc_html__('After', 'ameron' ),
                                    'left' => esc_html__('Before', 'ameron' ),
                                ],
                                'condition' => [
                                    'pagination_type' => 'loadmore'
                                ]
                            ),
                            array(
                                'name'         => 'pagination_alignment',
                                'label'        => esc_html__( 'Pagination Alignment', 'ameron' ),
                                'type'         => 'choose',
                                'control_type' => 'responsive',
                                'options' => [
                                    'start' => [
                                        'title' => esc_html__( 'Start', 'ameron' ),
                                        'icon'  => 'eicon-text-align-left',
                                    ],
                                    'center' => [
                                        'title' => esc_html__( 'Center', 'ameron' ),
                                        'icon'  => 'eicon-text-align-center',
                                    ],
                                    'end' => [
                                        'title' => esc_html__( 'End', 'ameron' ),
                                        'icon'  => 'eicon-text-align-right',
                                    ]
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-grid-pagination, {{WRAPPER}} .pxl-load-more' => 'justify-content: {{VALUE}};'
                                ],
                                'default'      => 'start',
                                'condition' => [
                                    'pagination_type' => ['pagination', 'loadmore'],
                                ],
                            ),
                            array(
                                'name' => 'item_padding',
                                'label' => esc_html__('Item Padding', 'ameron' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px' ],
                                'default' => [
                                    'top' => '15',
                                    'right' => '15',
                                    'bottom' => '15',
                                    'left' => '15'
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-grid-inner' => 'margin-top: -{{TOP}}{{UNIT}}; margin-right: -{{RIGHT}}{{UNIT}}; margin-bottom: -{{BOTTOM}}{{UNIT}}; margin-left: -{{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .pxl-grid-inner .grid-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'control_type' => 'responsive',
                            ),
         
                            array(
                                'name'         => 'gap_extra',
                                'label'        => esc_html__( 'Item Gap Bottom', 'ameron' ),
                                'description'  => esc_html__( 'Add extra space at bottom of each items','ameron'),
                                'type'         => \Elementor\Controls_Manager::NUMBER,
                                'default'      => 0,
                                'control_type' => 'responsive',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-grid-inner .grid-item' => 'margin-bottom: {{VALUE}}px;',
                                ],
                            )
                        ),
                        ameron_elementor_animation_opts([
                            'name'   => 'item',
                            'label' => esc_html__('Item', 'ameron'),
                        ])
                    )
                ),
                array(
                    'name' => 'grid_section',
                    'label' => esc_html__('Grid Settings', 'ameron' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        ameron_grid_column_settings(),
                        array(
                            array(
                                'name'      => 'grid_custom_columns',
                                'label'     => esc_html__('Custom Items Columns', 'ameron'),
                                'type'      => \Elementor\Controls_Manager::REPEATER,
                                'condition' => [
                                    'layout_mode' => ['masonry'],
                                ],
                                'controls' => array_merge(
                                    ameron_grid_custom_column_settings(),
                                    array(
                                        array(
                                            'name'        => 'img_size_c',
                                            'label'       => esc_html__('Image Size', 'ameron' ),
                                            'type'        => \Elementor\Controls_Manager::TEXT,
                                            'description' => esc_html__('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).', 'ameron'),
                                        ),
                                    ),
                                    ameron_elementor_animation_opts([
                                        'name'  => 'item_c',
                                        'label' => esc_html__('Item', 'ameron'),
                                    ])
                                ),
                            ),
                        )
                    ),
                ),
                array(
                    'name' => 'display_section',
                    'label' => esc_html__('Display Options', 'ameron' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'bg_item_post',
                            'label' => esc_html__('Background Color Item', 'ameron' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-grid .pxl-grid-inner .item-content' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => ['post_type' => 'post']
                        ),
                        array(
                            'name' => 'bg_item_practice_area',
                            'label' => esc_html__('Background Color Item 2', 'ameron' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-practice-area-grid .pxl-grid-inner .grid-item-inner' => 'background-color: {{VALUE}} !important;',
                            ],
                            'condition' => ['post_type' => array('pxl-practice-area')]
                        ),
                        array(
                            'name' => 'color_title',
                            'label' => esc_html__('Title Color', 'ameron' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-grid .pxl-grid-inner .item-content .item-title' => 'color: {{VALUE}};',
                            ],
                            'condition' => ['post_type' => 'post']
                        ),
                        array(
                            'name' => 'color_title_practice_area',
                            'label' => esc_html__('Title Color', 'ameron' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-practice-area-grid .pxl-grid-inner .grid-item-inner .item-title' => 'color: {{VALUE}};',
                            ],
                            'condition' => ['post_type' => array('pxl-practice-area')]
                        ),
                        array(
                            'name' => 'color_excerpt_practice_area',
                            'label' => esc_html__('Excerpt Color', 'ameron' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-practice-area-grid .pxl-grid-inner .grid-item-inner .item-excerpt' => 'color: {{VALUE}};',
                            ],
                            'condition' => ['post_type' => array('pxl-practice-area')]
                        ),
                        array(
                            'name'      => 'show_title',
                            'label'     => esc_html__('Show Title', 'ameron' ),
                            'type'      => \Elementor\Controls_Manager::SWITCHER,
                            'default'   => 'true',
                            'condition' => ['post_type' => array('pxl-case-study')]
                        ),
                        array(
                            'name'      => 'show_date',
                            'label'     => esc_html__('Show Date', 'ameron' ),
                            'type'      => \Elementor\Controls_Manager::SWITCHER,
                            'default'   => 'true',
                            'condition' => ['post_type' => 'post']
                        ),
                        array(
                            'name'      => 'show_author',
                            'label'     => esc_html__('Show Author', 'ameron' ),
                            'type'      => \Elementor\Controls_Manager::SWITCHER,
                            'default'   => 'true',
                            'condition' => ['post_type' => 'post']
                        ),
                        array(
                            'name'      => 'show_category',
                            'label'     => esc_html__('Show Category', 'ameron' ),
                            'type'      => \Elementor\Controls_Manager::SWITCHER,
                            'default'   => 'true',
                            'condition' => ['post_type' => array('post', 'pxl-case-study')]
                        ),
                        array(
                            'name'      => 'show_comment',
                            'label'     => esc_html__('Show Comment', 'ameron' ),
                            'type'      => \Elementor\Controls_Manager::SWITCHER,
                            'default'   => 'false',
                            'condition' => ['post_type' => 'post']
                        ),
                        array(
                            'name'      => 'show_excerpt',
                            'label'     => esc_html__('Show Excerpt', 'ameron' ),
                            'type'      => \Elementor\Controls_Manager::SWITCHER,
                            'default'   => 'false',
                        ),
                        array(
                            'name'      => 'num_words',
                            'label'     => esc_html__('Number of Words', 'ameron' ),
                            'type'      => \Elementor\Controls_Manager::NUMBER,
                            'condition' => [
                                'show_excerpt' => 'true',
                            ],
                        ),
                        array(
                            'name'      => 'show_button',
                            'label'     => esc_html__('Show Button Readmore', 'ameron' ),
                            'type'      => \Elementor\Controls_Manager::SWITCHER,
                            'default'   => 'false',
                        ),
                        array(
                            'name'      => 'button_text',
                            'label'     => esc_html__('Button Text', 'ameron' ),
                            'type'      => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'show_button' => 'false',
                            ],
                        ),
                        array(
                            'name' => 'title_padding',
                            'label' => esc_html__('Title Padding', 'ameron' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-practice-area-grid .item-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'condition' => ['post_type' => array('pxl-practice-area')]
                        ),    
                        array(
                            'name' => 'text_align',
                            'label' => esc_html__('Alignment', 'ameron' ),
                            'type' => 'choose',
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
                            'prefix_class' => 'elementor-align-',
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-practice-area-grid .item-title' => 'justify-content: {{VALUE}};'
                            ],
                            'condition' => ['post_type' => array('pxl-practice-area')]
                        ), 
                    ),
                ),
            ),
        ),
    ),
    ameron_get_class_widget_path()
);