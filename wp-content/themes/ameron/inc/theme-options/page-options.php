<?php
 
add_action( 'pxl_post_metabox_register', 'ameron_page_options_register' );
function ameron_page_options_register( $metabox ) {
	$panels = [
		'post' => [
			'opt_name'            => 'post_option',
			'display_name'        => esc_html__( 'Post Settings', 'ameron' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'post_settings' => [
					'title'  => esc_html__( 'Post Settings', 'ameron' ),
					'icon'   => 'el el-refresh',
					'fields' => array_merge(
						ameron_sidebar_pos_opts(['prefix' => 'post_', 'default' => true, 'default_value' => '-1']),
						ameron_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
                        array(
                            array(
                                'id'          => 'featured-video-url',
                                'type'        => 'text',
                                'title'       => esc_html__( 'Video URL', 'ameron' ),
                                'description' => esc_html__( 'Video will show when set post format is video', 'ameron' ),
                                'validate'    => 'url',
                                'msg'         => 'Url error!',
                            ),
                            array(
                                'id'          => 'featured-audio-url',
                                'type'        => 'text',
                                'title'       => esc_html__( 'Audio URL', 'ameron' ),
                                'description' => esc_html__( 'Audio that will show when set post format is audio', 'ameron' ),
                                'validate'    => 'url',
                                'msg'         => 'Url error!',
                            ),
                            array(
                                'id'=>'featured-quote-text',
                                'type' => 'textarea',
                                'title' => esc_html__('Quote Text', 'ameron'),
                                'default' => '',
                            ),
                            array(
                                'id'          => 'featured-quote-cite',
                                'type'        => 'text',
                                'title'       => esc_html__( 'Quote Cite', 'ameron' ),
                                'description' => esc_html__( 'Quote will show when set post format is quote', 'ameron' ),
                            ),
                            array(
                                'id'       => 'featured-link-url',
                                'type'     => 'text',
                                'title'    => esc_html__( 'Format Link URL', 'ameron' ),
                                'description' => esc_html__( 'Link will show when set post format is link', 'ameron' ),
                            ),
                            array(
                                'id'          => 'featured-link-text',
                                'type'        => 'text',
                                'title'       => esc_html__( 'Format Link Text', 'ameron' ),
                            ),
                        )
					)
				]
			]
		],
		'page' => [
			'opt_name'            => 'pxl_page_options',
			'display_name'        => esc_html__( 'Page Settings', 'ameron' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'Header', 'ameron' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
				        ameron_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
                        array(
                            array(
                                'id'       => 'remove_header',
                                'title'    => esc_html__('Remove Header', 'ameron'),
                                'subtitle' => esc_html__('Header will not display.', 'ameron'),
                                'type'     => 'button_set',
                                'options'  => array(
                                    '1'  => esc_html__('Yes','ameron'),
                                    '0'  => esc_html__('No','ameron'),
                                ),
                                'default'  => '0',
                            ),
                        ),
						array(
					        array(
				                'id'       => 'pd_menu',
				                'type'     => 'select',
				                'title'    => esc_html__( 'Menu', 'ameron' ),
				                'options'  => ameron_get_nav_menu_slug(),
				                'default' => '-1',
				            ),
					    )
				    )
				],
				'header_mobile' => [
					'title'  => esc_html__( 'Header Mobile', 'ameron' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
				        ameron_header_mobile_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
					        array(
				                'id'       => 'pm_menu',
				                'type'     => 'select',
				                'title'    => esc_html__( 'Menu', 'ameron' ),
				                'options'  => ameron_get_nav_menu_slug(),
				                'default' => '-1',
				            ),
					    )
				    )
				],
				'page_title' => [
					'title'  => esc_html__( 'Page Title', 'ameron' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
				        ameron_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
                        array(
                            array(
                                'id'           => 'custom_main_title',
                                'type'         => 'text',
                                'title'        => esc_html__( 'Custom Main Title', 'ameron' ),
                                'subtitle'     => esc_html__( 'Custom heading text title', 'ameron' ),
                                'required' => array( 'pt_mode', '=', 'bd' )
                            ),
                            array(
                                'id'           => 'custom_sub_title',
                                'type'         => 'text',
                                'title'        => esc_html__( 'Custom Sub title', 'ameron' ),
                                'subtitle'     => esc_html__( 'Add short description for page title', 'ameron' ),
                                'required' => array( 'pt_mode', '=', 'bd' )
                            )
                        )
				    )

				],
				'content' => [
					'title'  => esc_html__( 'Content', 'ameron' ),
					'icon'   => 'el-icon-pencil',
					'fields' => array_merge(
						ameron_sidebar_pos_opts(['prefix' => 'page_', 'default' => false, 'default_value' => '0']),
						array(
							array(
								'id'             => 'content_padding',
								'type'           => 'spacing',
								'output'         => array( '#pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Content Padding', 'ameron' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							),
                            array(
                                'id'       => 'content_bg_color',
                                'type'     => 'color_rgba',
                                'title'    => esc_html__( 'Background Color', 'ameron' ),
                                'subtitle' => esc_html__( 'Content background color.', 'ameron' ),
                                'output'   => array( 'background-color' => 'body' )
                            ),
						)  
					)
				],
				'footer' => [
					'title'  => esc_html__( 'Footer', 'ameron' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
				        ameron_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
                        array(
                            array(
                                'id'       => 'remove_footer',
                                'title'    => esc_html__('Remove Footer', 'ameron'),
                                'subtitle' => esc_html__('Footer will not display.', 'ameron'),
                                'type'     => 'button_set',
                                'options'  => array(
                                    '1'  => esc_html__('Yes','ameron'),
                                    '0'  => esc_html__('No','ameron'),
                                ),
                                'default'  => '0',
                            ),
                        )
				    )
				],
				'colors' => [
					'title'  => esc_html__( 'Colors', 'ameron' ),
					'icon'   => 'el el-website',
					'fields' => array(
				        array(
				            'id'          => 'primary_color',
				            'type'        => 'color',
				            'title'       => esc_html__('Primary Color', 'ameron'),
				            'transparent' => false,
				            'default'     => ''
				        ), 
				        array(
				            'id'          => 'secondary_color',
				            'type'        => 'color',
				            'title'       => esc_html__('Secondary Color', 'ameron'),
				            'transparent' => false,
				            'default'     => ''
				        ),
				    )
				]
			]
		],
		'product' => [ //product
			'opt_name'            => 'pxl_product_options',
			'display_name'        => esc_html__( 'Product Settings', 'ameron' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'general' => [
					'title'  => esc_html__( 'General', 'ameron' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
					            'id'=> 'product_feature_text',
					            'type' => 'text',
					            'title' => esc_html__('Featured Text', 'ameron'),
					            'default' => '',
					        ),
                            array(
                                'id'       => 'gallery_layout',
                                'type'     => 'button_set',
                                'title'    => esc_html__('Single Gallery', 'ameron'),
                                'options'  => array(
                                    'simple' => esc_html__('Simple', 'ameron'),
                                    'horizontal' => esc_html__('Horizontal', 'ameron'),
                                    'vertical' => esc_html__('Vertical', 'ameron'),
                                ),
                                'default'  => 'simple'
                            ),
						)
				    )
				],
			]
		],
		'pxl-case-study' => [ //post_type
			'opt_name'            => 'pxl_case_study_options',
			'display_name'        => esc_html__( 'Page Settings', 'ameron' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
                'page_title' => [
                    'title'  => esc_html__( 'Page Title', 'ameron' ),
                    'icon'   => 'el el-indent-left',
                    'fields' => array_merge(
                        ameron_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
                        ameron_page_title_opts([
                            'default'         => true,
                            'default_value'   => '-1'
                        ]),
                        array(
                            array(
                                'id'           => 'custom_main_title',
                                'type'         => 'text',
                                'title'        => esc_html__( 'Custom Main Title', 'ameron' ),
                                'subtitle'     => esc_html__( 'Custom heading text title', 'ameron' ),
                                'required' => array( 'pt_mode', '=', 'bd' )
                            ),
                            array(
                                'id'           => 'custom_sub_title',
                                'type'         => 'text',
                                'title'        => esc_html__( 'Custom Sub title', 'ameron' ),
                                'subtitle'     => esc_html__( 'Add short description for page title', 'ameron' ),
                                'required' => array( 'pt_mode', '=', 'bd' )
                            )
                        )
                    )

                ],
                'content' => [
                    'title'  => esc_html__( 'Content', 'ameron' ),
                    'icon'   => 'el-icon-pencil',
                    'fields' => array_merge(
                        array(
                            array(
                                'id'             => 'content_padding',
                                'type'           => 'spacing',
                                'output'         => array( '#pxl-main' ),
                                'right'          => false,
                                'left'           => false,
                                'mode'           => 'padding',
                                'units'          => array( 'px' ),
                                'units_extended' => 'false',
                                'title'          => esc_html__( 'Content Padding', 'ameron' ),
                                'default'        => array(
                                    'padding-top'    => '',
                                    'padding-bottom' => '',
                                    'units'          => 'px',
                                )
                            ),
                            array(
                                'id'       => 'title_on',
                                'title'    => esc_html__('Title', 'ameron'),
                                'subtitle' => esc_html__('Display the Title at top of post.', 'ameron'),
                                'type'     => 'switch',
                                'default'  => '0'
                            ),
                            array(
                                'id'       => 'tag_on',
                                'title'    => esc_html__('Tags', 'ameron'),
                                'subtitle' => esc_html__('Display the Tags at top of post.', 'ameron'),
                                'type'     => 'switch',
                                'default'  => '0'
                            ),
                            array(
                                'id'       => 'categoty_on',
                                'title'    => esc_html__('Category', 'ameron'),
                                'subtitle' => esc_html__('Display the Category at top of post.', 'ameron'),
                                'type'     => 'switch',
                                'default'  => '0'
                            ),                    
                        )
                    )
                ],
			]
		],
        'pxl-practice-area' => [ //post_type
            'opt_name'            => 'pxl_practice_area_options',
            'display_name'        => esc_html__( 'Page Settings', 'ameron' ),
            'show_options_object' => false,
            'context'  => 'advanced',
            'priority' => 'default',
            'sections'  => [
                'page_title' => [
                    'title'  => esc_html__( 'Page Title', 'ameron' ),
                    'icon'   => 'el el-indent-left',
                    'fields' => array_merge(
                        ameron_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
                        ameron_page_title_opts([
                            'default'         => true,
                            'default_value'   => '-1'
                        ]),
                        array(
                            array(
                                'id'           => 'custom_main_title',
                                'type'         => 'text',
                                'title'        => esc_html__( 'Custom Main Title', 'ameron' ),
                                'subtitle'     => esc_html__( 'Custom heading text title', 'ameron' ),
                                'required' => array( 'pt_mode', '=', 'bd' )
                            ),
                            array(
                                'id'           => 'custom_sub_title',
                                'type'         => 'text',
                                'title'        => esc_html__( 'Custom Sub title', 'ameron' ),
                                'subtitle'     => esc_html__( 'Add short description for page title', 'ameron' ),
                                'required' => array( 'pt_mode', '=', 'bd' )
                            )
                        )
                    )

                ],
                'content' => [
                    'title'  => esc_html__( 'Content', 'ameron' ),
                    'icon'   => 'el-icon-pencil',
                    'fields' => array_merge(
                        array(
                            array(
                                'id'             => 'content_padding',
                                'type'           => 'spacing',
                                'output'         => array( '#pxl-main' ),
                                'right'          => false,
                                'left'           => false,
                                'mode'           => 'padding',
                                'units'          => array( 'px' ),
                                'units_extended' => 'false',
                                'title'          => esc_html__( 'Content Padding', 'ameron' ),
                                'default'        => array(
                                    'padding-top'    => '',
                                    'padding-bottom' => '',
                                    'units'          => 'px',
                                )
                            ),
                            array(
                                'id'       => 'title_on',
                                'title'    => esc_html__('Title', 'ameron'),
                                'subtitle' => esc_html__('Display the Title at top of post.', 'ameron'),
                                'type'     => 'switch',
                                'default'  => '0'
                            ),
                            array(
                                'id'       => 'categoty_on',
                                'title'    => esc_html__('Category', 'ameron'),
                                'subtitle' => esc_html__('Display the Category at top of post.', 'ameron'),
                                'type'     => 'switch',
                                'default'  => '0'
                            ),
                            array(
                                'id'=>'multi-text',
                                'type' => 'multi_text',
                                'title' => esc_html__('Multi Text Option', 'ameron'),
                                'subtitle' => esc_html__('Recommend up to 5 options', 'ameron'),
                            ),                               
                        )
                    )
                ],
                'additional_data' => [
                    'title'  => esc_html__( 'Additional Data', 'ameron' ),
                    'icon'   => 'el el-list-alt',
                    'fields' => array(
                        array(
                            'id'       => 'area_icon_type',
                            'type'     => 'button_set',
                            'title'    => esc_html__('Icon Type', 'ameron'),
                            'desc'     => esc_html__( 'This image icon will display in post grid or carousel', 'ameron' ),
                            'options'  => array(
                                'icon'  => esc_html__('Icon', 'ameron'),
                                'image'  => esc_html__('Image', 'ameron'),
                            ),
                            'default'  => 'image'
                        ),
                        array(
                            'id'       => 'area_icon',
                            'type'     => 'pxl_iconpicker',
                            'title'    => esc_html__( 'Select Icon', 'ameron' ),
                            'default'  => '',
                            'required' => array( 0 => 'area_icon_type', 1 => 'equals', 2 => 'icon' ),
                        ),
                        array(
                            'id'       => 'area_img',
                            'type'     => 'media',
                            'title'    => esc_html__('Select Image', 'ameron'),
                            'default' => '',
                            'required' => array( 0 => 'area_icon_type', 1 => 'equals', 2 => 'image' ),
                            'force_output' => true
                        ),

                    ),

                ],
            ]
        ],
		'pxl-template' => [ //post_type
			'opt_name'            => 'pxl_hidden_template_options',
			'display_name'        => esc_html__( 'Template Settings', 'ameron' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'general' => [
					'title'  => esc_html__( 'General', 'ameron' ),
					'icon'   => 'el-icon-website',
					'fields' => array(
						array(
							'id'    => 'template_type',
							'type'  => 'select',
							'title' => esc_html__('Template Type', 'ameron'),
				            'options' => [
                                'default'      => esc_html__('Default', 'ameron'),
								'header'       => esc_html__('Header', 'ameron'), 
								'footer'       => esc_html__('Footer', 'ameron'), 
								'mega-menu'    => esc_html__('Mega Menu', 'ameron'), 
								'page-title'   => esc_html__('Page Title', 'ameron'), 
								'hidden-panel' => esc_html__('Hidden Panel', 'ameron'),
                            ],
				            'default' => 'default',
				        ),
				        array(
							'id'       => 'template_position',
							'type'     => 'select',
							'title'    => esc_html__('Hidden Panel Position', 'ameron'),
							'options'  => [
                                'full' => esc_html__('Full Screen', 'ameron'),
                                'top'   => esc_html__('Top Position', 'ameron'),
								'left'   => esc_html__('Left Position', 'ameron'),
								'right'  => esc_html__('Right Position', 'ameron'),
                                'center'  => esc_html__('Center Position', 'ameron'),
				            ],
							'default'  => 'full',
							'required' => [ 'template_type', '=', 'hidden-panel']
				        ),
					),
				    
				],
			]
		],
	];
 
	$metabox->add_meta_data( $panels );
}
 