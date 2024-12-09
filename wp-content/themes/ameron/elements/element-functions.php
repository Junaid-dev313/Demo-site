<?php

use Elementor\Controls_Manager;
use Elementor\Embed;
use Elementor\Group_Control_Image_Size;

if (!function_exists('ameron_elements_scripts')) {
    add_action('ameron_scripts', 'ameron_elements_scripts');
    function ameron_elements_scripts(){
        wp_enqueue_style( 'e-animations');
        wp_register_style( 'odometer', get_template_directory_uri() . '/elements/assets/css/odometer-theme-default.css', array(), '1.1.0');
        wp_enqueue_script('ameron-elements', get_template_directory_uri() . '/elements/assets/js/pxl-elements.js', [ 'jquery' ], ameron()->get_version(), true);
        wp_register_script('ameron-tabs', get_template_directory_uri() . '/elements/assets/js/pxl-tabs.js', ['jquery'], ameron()->get_version(), true);
        wp_register_script('ameron-typewrite', get_template_directory_uri() . '/elements/assets/js/pxl-typewrite.js', ['jquery'], ameron()->get_version(), true);

        wp_register_script('ameron-post-grid', get_template_directory_uri() . '/elements/assets/js/pxl-post-grid.js', ['isotope', 'jquery'], ameron()->get_version(), true);
        wp_localize_script('ameron-post-grid', 'main_data', array('ajax_url' => admin_url('admin-ajax.php')));

        wp_register_script('ameron-swiper', get_template_directory_uri() . '/elements/assets/js/pxl-swiper-carousel.js', ['jquery'], ameron()->get_version(), true);
        wp_register_script('ameron-swiper-vertical', get_template_directory_uri() . '/elements/assets/js/pxl-swiper-vertical.js', ['jquery'], ameron()->get_version(), true);
        wp_register_script('ameron-accordion', get_template_directory_uri() . '/elements/assets/js/pxl-accordion.js', [ 'jquery' ], ameron()->get_version(), true);
        wp_register_script('ameron-progressbar', get_template_directory_uri() . '/elements/assets/js/pxl-progressbar.js', [ 'jquery' ], ameron()->get_version(), true);
        wp_register_script('ameron-counter', get_template_directory_uri() . '/elements/assets/js/pxl-counter.js', [ 'jquery' ], ameron()->get_version(), true);
        wp_register_script('odometer', get_template_directory_uri() . '/elements/assets/js/odometer.min.js', [ 'jquery' ], ameron()->get_version(), true);
        wp_register_script('ameron-countdown', get_template_directory_uri() . '/elements/assets/js/pxl-countdown.js', [ 'jquery' ], ameron()->get_version(), true);
        
    }
}
 
 
if (!function_exists('ameron_register_custom_icon_library')) {
    add_filter('elementor/icons_manager/native', 'ameron_register_custom_icon_library');
    function ameron_register_custom_icon_library($tabs){
        $custom_tabs = [
            'ameron' => [
                'name' => 'ameron',
                'label' => esc_html__('Ameron', 'ameron'),
                'url' => false,
                'enqueue' => false,
                'prefix' => 'pxli-',
                'displayPrefix' => 'pxli',
                'labelIcon' => 'fas fa-user-plus',
                'ver' => '1.0.0',
                'fetchJson' => get_template_directory_uri() . '/assets/fonts/pixelart/pixelarts.js',
                'native' => true,
            ],
            'flaticon' => [
                'name' => 'flaticon',
                'label' => esc_html__('Flaticon', 'ameron'),
                'url' => false,
                'enqueue' => false,
                'prefix' => 'flaticon-',
                'displayPrefix' => 'flaticon',
                'labelIcon' => 'fas fa-user-plus',
                'ver' => '1.0.0',
                'fetchJson' => get_template_directory_uri() . '/assets/fonts/flaticon/flaticon.js',
                'native' => true,
            ],
            'material' => [
                'name' => 'material',
                'label' => esc_html__( 'Material Design Iconic', 'ameron' ),
                'url' => false,
                'enqueue' => false,
                'prefix' => 'zmdi-',
                'displayPrefix' => 'zmdi',
                'labelIcon' => 'fas fa-user-plus',
                'ver' => '1.0.0',
                'fetchJson' => get_template_directory_uri() . '/assets/fonts/material/materialdesign.js',
                'native' => true,
            ],
        ];
        $tabs = array_merge($custom_tabs, $tabs);
        return $tabs;
    }
}

if (!function_exists('ameron_get_class_widget_path')) {
    function ameron_get_class_widget_path(){
        $upload_dir = wp_upload_dir();
        $cls_path = $upload_dir['basedir'] . '/elementor-widget/';
        if (!is_dir($cls_path)) {
            wp_mkdir_p($cls_path);
        }
        return $cls_path;
    }
}

function ameron_get_post_type_options($pt_supports = []){
    $post_types = get_post_types([
        'public' => true,
    ], 'objects');
    $excluded_post_type = [
        'page',
        'attachment',
        'revision',
        'nav_menu_item',
        'custom_css',
        'customize_changeset',
        'oembed_cache',
        'e-landing-page',
        'product',
        'elementor_library'
    ];

    $result_some = [];
    $result_any = [];
    if (!is_array($post_types))
        return $result;
    foreach ($post_types as $post_type) {
        if (!$post_type instanceof WP_Post_Type)
            continue;
        if (in_array($post_type->name, $excluded_post_type))
            continue;

        if (!empty($pt_supports) && in_array($post_type->name, $pt_supports)) {
            $result_some[$post_type->name] = $post_type->labels->singular_name;
        } else {
            $result_any[$post_type->name] = $post_type->labels->singular_name;
        }
    }

    if (!empty($pt_supports))
        return $result_some;
    else
        return $result_any;
}

//* post_grid functions
function ameron_get_post_grid_layout($pt_supports = []){
    $post_types = ameron_get_post_type_options($pt_supports);
    $result = [];
    if (!is_array($post_types))
        return $result;
    foreach ($post_types as $name => $label) {
        $result[] = array(
            'name' => 'layout_' . $name,
            'label' => sprintf(esc_html__('Select Templates of %s', 'ameron'), $label),
            'type' => 'layoutcontrol',
            'default' => 'post-1',
            'options' => ameron_get_grid_layout_options($name),
            'condition' => [
                'post_type' => [$name]
            ]
        );
    }
    return $result;
}

function ameron_get_grid_layout_options($posttype_name){
    $option_layouts = [];
    switch ($posttype_name) {
        case 'pxl-case-study':
            $option_layouts = [
                'pxl-case-study-1' => [
                    'label' => esc_html__('Layout 1', 'ameron'),
                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/post_grid-pxl-case-study-1.jpg'
                ],
                'pxl-case-study-2' => [
                    'label' => esc_html__('Layout 2', 'ameron'),
                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/post_grid-pxl-case-study-2.jpg'
                ],
            ];
            break;
        case 'pxl-practice-area':
            $option_layouts = [
                'pxl-practice-area-1' => [
                    'label' => esc_html__('Layout 1', 'ameron'),
                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/post_grid-pxl-practice-area-1.jpg'
                ],
            ];
            break;
        case 'post':
            $option_layouts = [
                'post-1' => [
                    'label' => esc_html__('Layout 1', 'ameron'),
                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/post_grid-layout1.jpg'
                ],
                'post-2' => [
                    'label' => esc_html__('Layout 2', 'ameron'),
                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/post_grid-layout2.jpg'
                ],
            ];
            break;
    }
    return $option_layouts;
}

function ameron_get_grid_term_by_posttype($pt_supports = [], $args = []){
    $args = wp_parse_args($args, ['condition' => 'post_type', 'custom_condition' => []]);
    $post_types = ameron_get_post_type_options($pt_supports);
    $result = [];
    if (!is_array($post_types))
        return $result;
    foreach ($post_types as $name => $label) {

        $taxonomy = get_object_taxonomies($name, 'names');

        if ($name == 'post') $taxonomy = ['category'];
        if ($name == 'product') $taxonomy = ['product_cat'];

        $result[] = array(
            'name' => 'source_' . $name,
            'label' => sprintf(esc_html__('Select Term', 'ameron'), $label),
            'description' => esc_html__('Get all when no term selected', 'ameron'),
            'type' => Controls_Manager::SELECT2,
            'multiple' => true,
            'options' => pxl_get_grid_term_options($name, $taxonomy),
            'condition' => array_merge(
                [
                    $args['condition'] => [$name]
                ],
                $args['custom_condition']
            )
        );
    }

    return $result;
}

function ameron_get_grid_ids_by_posttype($pt_supports = [], $args = []){
    $args = wp_parse_args($args, ['condition' => 'post_type', 'custom_condition' => []]);
    $post_types = ameron_get_post_type_options($pt_supports);
    $result = [];
    if (!is_array($post_types))
        return $result;
    foreach ($post_types as $name => $label) {

        $posts = ameron_list_post($name, false);
 
        $result[] = array(
            'name' => 'source_' . $name . '_post_ids',
            'label' => sprintf(esc_html__('Select posts', 'ameron'), $label),
            'type' => Controls_Manager::SELECT2,
            'multiple' => true,
            'options' => $posts,
            'condition' => array_merge(
                [
                    $args['condition'] => [$name]
                ],
                $args['custom_condition']
            )
        );
    }

    return $result;
}

/* post_carousel functions */
function ameron_get_post_carousel_layout($pt_supports = []){
    $post_types = ameron_get_post_type_options($pt_supports);
    $result = [];
    if (!is_array($post_types))
        return $result;
    foreach ($post_types as $name => $label) {
        $result[] = array(
            'name' => 'layout_' . $name,
            'label' => sprintf(esc_html__('Select Templates of %s', 'ameron'), $label),
            'type' => 'layoutcontrol',
            'default' => 'post-1',
            'options' => ameron_get_carousel_layout_options($name),
            'prefix_class' => 'post-layout-',
            'condition' => [
                'post_type' => [$name]
            ]
        );
    }
    return $result;
}

function ameron_get_carousel_layout_options($posttype_name){
    $option_layouts = [];
    switch ($posttype_name) {
        case 'post':
            $option_layouts = [
                'post-1' => [
                    'label' => esc_html__('Layout 1', 'ameron'),
                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/post_carousel-1.jpg'
                ],
                'post-2' => [
                    'label' => esc_html__('Layout 2', 'ameron'),
                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/post_carousel-2.jpg'
                ]
            ];
            break;
        case 'pxl-case-study':
            $option_layouts = [
                'pxl-case-study-1' => [
                    'label' => esc_html__('Layout 1', 'ameron'),
                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/post_carousel-pxl-case-study-1.jpg'
                ],
                'pxl-case-study-2' => [
                    'label' => esc_html__('Layout 2', 'ameron'),
                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/post_carousel-pxl-case-study-2.jpg'
                ],
                'pxl-case-study-3' => [
                    'label' => esc_html__('Layout 3', 'ameron'),
                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/post_carousel-pxl-case-study-3.jpg'
                ]
            ];
            break;
        case 'pxl-practice-area':
            $option_layouts = [
                'pxl-practice-area-1' => [
                    'label' => esc_html__('Layout 1', 'ameron'),
                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/post_carousel-pxl-practice-area-1.jpg'
                ],
                'pxl-practice-area-2' => [
                    'label' => esc_html__('Layout 2', 'ameron'),
                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/post_carousel-pxl-practice-area-2.jpg'
                ]
            ];
            break;
    }
    return $option_layouts;
}

function ameron_get_carousel_term_by_posttype($pt_supports = [], $args = []){
    $args = wp_parse_args($args, ['condition' => 'post_type', 'custom_condition' => []]);
    $post_types = ameron_get_post_type_options($pt_supports);
    $result = [];
    if (!is_array($post_types))
        return $result;
    foreach ($post_types as $name => $label) {

        $taxonomy = get_object_taxonomies($name, 'names');

        if ($name == 'post') $taxonomy = ['category'];
        if ($name == 'product') $taxonomy = ['product_cat'];

        $result[] = array(
            'name' => 'source_' . $name,
            'label' => sprintf(esc_html__('Select Term', 'ameron'), $label),
            'type' => Controls_Manager::SELECT2,
            'multiple' => true,
            'options' => pxl_get_grid_term_options($name, $taxonomy),
            'condition' => array_merge(
                [
                    $args['condition'] => [$name]
                ],
                $args['custom_condition']
            )
        );
    }

    return $result;
}

function ameron_get_carousel_ids_by_posttype($pt_supports = [], $args = []){
    $args = wp_parse_args($args, ['condition' => 'post_type', 'custom_condition' => []]);
    $post_types = ameron_get_post_type_options($pt_supports);
    $result = [];
    if (!is_array($post_types))
        return $result;
    foreach ($post_types as $name => $label) {

        $posts = ameron_list_post($name, false);
 
        $result[] = array(
            'name' => 'source_' . $name . '_post_ids',
            'label' => sprintf(esc_html__('Select posts', 'ameron'), $label),
            'type' => Controls_Manager::SELECT2,
            'multiple' => true,
            'options' => $posts,
            'condition' => array_merge(
                [
                    $args['condition'] => [$name]
                ],
                $args['custom_condition']
            )
        );
    }

    return $result;
}

 

/* grid columns setting */
function ameron_grid_column_settings(){
    $options = [
        '12' => '12',
        '6'  => '6',
        '5'  => '5',
        '4'  => '4',
        '3'  => '3',
        '2'  => '2',
        '1'  => '1'
    ];
    return array(
        array(
            'name'    => 'col_xs',
            'label'   => esc_html__( 'Extra Small <= 575', 'ameron' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => '1',
            'options' => $options
        ),
        array(
            'name'    => 'col_sm',
            'label'   => esc_html__( 'Small <= 767', 'ameron' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => '1',
            'options' => $options
        ),
        array(
            'name'    => 'col_md',
            'label'   => esc_html__( 'Medium <= 991', 'ameron' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => '2',
            'options' => $options
        ),
        array(
            'name'    => 'col_lg',
            'label'   => esc_html__( 'Large <= 1199', 'ameron' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => '2',
            'options' => $options
        ),
        array(
            'name'    => 'col_xl',
            'label'   => esc_html__( 'XL Devices >= 1200', 'ameron' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => '3',
            'options' => $options
        ),
        array(
            'name'    => 'col_xxl',
            'label'   => esc_html__( 'XXL Devices >= 1400', 'ameron' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => '3',
            'options' => $options
        )
    );
}

function ameron_grid_custom_column_settings(){
    $options = [
        '12' => '12',
        '6'  => '6',
        '5'  => '5',
        '4'  => '4',
        '3'  => '3',
        '2'  => '2',
        '1'  => '1'
    ];
    return array(
        array(
            'name'    => 'col_xs_c',
            'label'   => esc_html__( 'Extra Small <= 575', 'ameron' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => '1',
            'options' => $options
        ),
        array(
            'name'    => 'col_sm_c',
            'label'   => esc_html__( 'Small <= 767', 'ameron' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => '1',
            'options' => $options
        ),
        array(
            'name'    => 'col_md_c',
            'label'   => esc_html__( 'Medium <= 991', 'ameron' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => '2',
            'options' => $options
        ),
        array(
            'name'    => 'col_lg_c',
            'label'   => esc_html__( 'Large <= 1199', 'ameron' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => '2',
            'options' => $options
        ),
        array(
            'name'    => 'col_xl_c',
            'label'   => esc_html__( 'XL Devices >= 1200', 'ameron' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => '3',
            'options' => $options
        ),
        array(
            'name'    => 'col_xxl_c',
            'label'   => esc_html__( 'XXL Devices >= 1400', 'ameron' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => '3',
            'options' => $options
        )
    );
}

function ameron_carousel_column_settings(){
    $options = [
        '12' => '12',
        '6'  => '6',
        '5'  => '5',
        '4'  => '4',
        '3'  => '3',
        '2'  => '2',
        '1'  => '1'
    ];
    return array(
        array(
            'name'    => 'col_xs',
            'label'   => esc_html__( 'Extra Small <= 575', 'ameron' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => '1',
            'options' => $options
        ),
        array(
            'name'    => 'col_sm',
            'label'   => esc_html__( 'Small <= 767', 'ameron' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => '2',
            'options' => $options
        ),
        array(
            'name'    => 'col_md',
            'label'   => esc_html__( 'Medium <= 991', 'ameron' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => '2',
            'options' => $options
        ),
        array(
            'name'    => 'col_lg',
            'label'   => esc_html__( 'Large <= 1199', 'ameron' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => '3',
            'options' => $options
        ),
        array(
            'name'    => 'col_xl',
            'label'   => esc_html__( 'XL Devices >= 1200', 'ameron' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => '4',
            'options' => $options
        ),
        array(
            'name'    => 'col_xxl',
            'label'   => esc_html__( 'XXL Devices >= 1400', 'ameron' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => '4',
            'options' => $options
        )
    );
}

function ameron_elementor_animation_opts($args = []){
    $args = wp_parse_args($args, [
        'name'   => '',
        'label'  => '',
        'condition'   => [],
    ]);

    return array(
        array(
            'name'      => $args['name'].'_animation',
            'label'     => $args['label'].' '.esc_html__( 'Motion Effect', 'ameron' ),
            'type'      => \Elementor\Controls_Manager::ANIMATION,
            'condition'   => $args['condition'],
        ),
        array(
            'name'    => $args['name'].'_animation_duration', 
            'label'   => $args['label'].' '.esc_html__( 'Animation Duration', 'ameron' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => 'normal',
            'options' => [
                'slow'   => esc_html__( 'Slow', 'ameron' ),
                'normal' => esc_html__( 'Normal', 'ameron' ),
                'fast'   => esc_html__( 'Fast', 'ameron' ),
            ],
            'condition'   => array_merge($args['condition'], [ $args['name'].'_animation!' => '' ]),
            
        ),
        array(
            'name'      => $args['name'].'_animation_delay',
            'label'     => $args['label'].' '.esc_html__( 'Animation Delay', 'ameron' ),
            'type'      => \Elementor\Controls_Manager::NUMBER,
            'min'       => 0,
            'step'      => 100,
            'condition'   => array_merge($args['condition'], [ $args['name'].'_animation!' => '' ]),
        )
    );
}

function ameron_wow_animate() {
    $pxl_animate = array(
        '' => 'None',
        'wow bounce' => 'bounce',
        'wow flash' => 'flash',
        'wow pulse' => 'pulse',
        'wow rubberBand' => 'rubberBand',
        'wow shake' => 'shake',
        'wow swing' => 'swing',
        'wow tada' => 'tada',
        'wow wobble' => 'wobble',
        'wow bounceIn' => 'bounceIn',
        'wow bounceInDown' => 'bounceInDown',
        'wow bounceInLeft' => 'bounceInLeft',
        'wow bounceInRight' => 'bounceInRight',
        'wow bounceInUp' => 'bounceInUp',
        'wow bounceOut' => 'bounceOut',
        'wow bounceOutDown' => 'bounceOutDown',
        'wow bounceOutLeft' => 'bounceOutLeft',
        'wow bounceOutRight' => 'bounceOutRight',
        'wow bounceOutUp' => 'bounceOutUp',
        'wow fadeIn' => 'fadeIn',
        'wow fadeInUp' => 'fadeInUp',
        'wow fadeInUpBig' => 'fadeInUpBig',
        'wow fadeInDown' => 'fadeInDown',
        'wow fadeInDownBig' => 'fadeInDownBig',
        'wow fadeInLeft' => 'fadeInLeft',
        'wow fadeInLeftBig' => 'fadeInLeftBig',
        'wow fadeInRight' => 'fadeInRight',
        'wow fadeInRightBig' => 'fadeInRightBig',
        'wow fadeOut' => 'fadeOut',
        'wow fadeOutDown' => 'fadeOutDown',
        'wow fadeOutDownBig' => 'fadeOutDownBig',
        'wow fadeOutLeft' => 'fadeOutLeft',
        'wow fadeOutLeftBig' => 'fadeOutLeftBig',
        'wow fadeOutRight' => 'fadeOutRight',
        'wow fadeOutRightBig' => 'fadeOutRightBig',
        'wow fadeOutUp' => 'fadeOutUp',
        'wow fadeOutUpBig' => 'fadeOutUpBig',
        'wow flip' => 'flip',
        'wow flipInX' => 'flipInX',
        'wow flipInY' => 'flipInY',
        'wow flipOutX' => 'flipOutX',
        'wow flipOutY' => 'flipOutY',
        'wow lightSpeedIn' => 'lightSpeedIn',
        'wow lightSpeedOut' => 'lightSpeedOut',
        'wow rotateIn' => 'rotateIn',
        'wow rotateInDownLeft' => 'rotateInDownLeft',
        'wow rotateInDownRight' => 'rotateInDownRight',
        'wow rotateInUpLeft' => 'rotateInUpLeft',
        'wow rotateInUpRight' => 'rotateInUpRight',
        'wow rotateOut' => 'rotateOut',
        'wow rotateOutDownLeft' => 'rotateOutDownLeft',
        'wow rotateOutDownRight' => 'rotateOutDownRight',
        'wow rotateOutUpLeft' => 'rotateOutUpLeft',
        'wow rotateOutUpRight' => 'rotateOutUpRight',
        'wow hinge' => 'hinge',
        'wow rollIn' => 'rollIn',
        'wow rollOut' => 'rollOut',
        'wow zoomIn' => 'zoomIn',
        'wow zoomInDown' => 'zoomInDown',
        'wow zoomInLeft' => 'zoomInLeft',
        'wow zoomInRight' => 'zoomInRight',
        'wow zoomInUp' => 'zoomInUp',
        'wow zoomOut' => 'zoomOut',
        'wow zoomOutDown' => 'zoomOutDown',
        'wow zoomOutLeft' => 'zoomOutLeft',
        'wow zoomOutRight' => 'zoomOutRight',
        'wow zoomOutUp' => 'zoomOutUp',
    );
    return $pxl_animate;
}

function ameron_position_option($args = []){
    $start = is_rtl() ? esc_html__( 'Right', 'ameron' ) : esc_html__( 'Left', 'ameron' );
    $end = ! is_rtl() ? esc_html__( 'Right', 'ameron' ) : esc_html__( 'Left', 'ameron' );
    $args = wp_parse_args($args, [
        'prefix' => '',
        'selectors_class' => '',
        'condition' => []
    ]);
    $options = array(
        array(
            'name'        => $args['prefix'] .'position',
            'label' => ucfirst( str_replace('_', ' ', $args['prefix']) ).' '.esc_html__( 'Position', 'ameron' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '',
            'options' => [
                '' => esc_html__( 'Default', 'ameron' ),
                'absolute' => esc_html__( 'Absolute', 'ameron' ),
            ],
            'frontend_available' => true,
            'condition'   => $args['condition'],
        ),
         
        array(
            'name'        => $args['prefix'] .'pos_offset_left',
            'label' => esc_html__( 'Left', 'ameron' ).' (50px) px,%,vw,auto',
            'type' => 'text',
            'default' => '',
            'control_type' => 'responsive',
            'selectors' => [
                '{{WRAPPER}} '.$args['selectors_class'] => 'left: {{VALUE}}',
            ],
            'condition'   => array_merge($args['condition'], [ $args['prefix'] .'position!' => '' ]),
        ),  
        array(
            'name'        => $args['prefix'] .'pos_offset_right',
            'label' => esc_html__( 'Right', 'ameron' ).' (50px) px,%,vw,auto',
            'type' => 'text',
            'default' => '',
            'control_type' => 'responsive',
            'selectors' => [
                '{{WRAPPER}} '.$args['selectors_class'] => 'right: {{VALUE}}',
            ],
            'condition'   => array_merge($args['condition'], [ $args['prefix'] .'position!' => '' ]),
             
        ),
        array(
            'name'        => $args['prefix'] .'pos_offset_top',
            'label' => esc_html__( 'Top', 'ameron' ).' (50px) px,%,vh,auto',
            'type' => 'text',
            'default' => '',
            'control_type' => 'responsive',
            'selectors' => [
                '{{WRAPPER}} '.$args['selectors_class'] => 'top: {{VALUE}}',
            ],
            'condition'   => array_merge($args['condition'], [ $args['prefix'] .'position!' => '']),
              
        ),  
        array(
            'name'        => $args['prefix'] .'pos_offset_bottom',
            'label' => esc_html__( 'Bottom', 'ameron' ).' (50px) px,%,vh,auto',
            'type' => 'text',
            'default' => '',
            'control_type' => 'responsive',
            'selectors' => [
                '{{WRAPPER}} '.$args['selectors_class'] => 'bottom: {{VALUE}}',
            ],
            'condition'   => array_merge($args['condition'], [ $args['prefix'] .'position!' => '']),
        ),
        array(
            'name'        => $args['prefix'] .'z_index',
            'label' => ucfirst( str_replace('_', ' ', $args['prefix']) ).' '. esc_html__( 'Z-Index', 'ameron' ),
            'type' => Controls_Manager::NUMBER,
            'selectors' => [
                '{{WRAPPER}} '.$args['selectors_class'] => 'z-index: {{VALUE}};',
            ],
            'condition'   => array_merge($args['condition'], [ $args['prefix'] .'position!' => '' ]),
        )
    );
    return $options;
}

function ameron_transform_option($args = []){
    $transform_prefix_class = 'pxl-';
    $transform_return_value = 'transform';
    $args = wp_parse_args($args, [
        'prefix' => '',
        'selectors_class' => '',
        'condition' => []
    ]);
    $options = array(
        array(
            'name'        => $args['prefix'] .'transform_translate_popover',
            'label' => ucfirst( str_replace('_', '', $args['prefix']) ).' '. esc_html__( 'Transform', 'ameron' ),
            'type' => Controls_Manager::POPOVER_TOGGLE,
            'prefix_class' => $transform_prefix_class,
            'return_value' => $transform_return_value,
            'condition'   => $args['condition'],
        ),
        array(
            'name'        => $args['prefix'] .'pxl_start_popover',
            'label'       => ucfirst( str_replace('_', '', $args['prefix']) ).' '. esc_html__( 'Start Popover', 'ameron' ),
            'type'        => 'pxl_start_popover',
            'condition'   => $args['condition'],
        ),
        array(
            'name'        => $args['prefix'] .'transform_translateX_effect',
            'label' => esc_html__( 'Offset X', 'ameron' ),
            'type' => Controls_Manager::SLIDER,
            'size_units' => [ '%', 'px' ],
            'range' => [
                '%' => [
                    'min' => -100,
                    'max' => 100,
                ],
                'px' => [
                    'min' => -1000,
                    'max' => 1000,
                ],
            ],
            'control_type' => 'responsive',
            'condition' => [
                $args['prefix'] .'transform_translate_popover!' => '',
            ],
            'selectors' => [
                '{{WRAPPER}} '.$args['selectors_class'] => '--pxl-transform-translateX: {{SIZE}}{{UNIT}};',
            ],
            'frontend_available' => true,
        ),
        array(
            'name'        => $args['prefix'] .'_transform_translateY_effect',
            'label' => esc_html__( 'Offset Y', 'ameron' ),
            'type' => Controls_Manager::SLIDER,
            'size_units' => [ '%', 'px' ],
            'range' => [
                '%' => [
                    'min' => -100,
                    'max' => 100,
                ],
                'px' => [
                    'min' => -1000,
                    'max' => 1000,
                ],
            ],
            'control_type' => 'responsive',
            'condition' => [
                $args['prefix'] .'transform_translate_popover!' => '',
            ],
            'selectors' => [
                '{{WRAPPER}} '.$args['selectors_class'] => '--pxl-transform-translateY: {{SIZE}}{{UNIT}};',
            ],
            'frontend_available' => true,
        ),
        array(
            'name'        => $args['prefix'] .'pxl_end_popover',
            'label'       => ucfirst( str_replace('_', '', $args['prefix']) ).' '. esc_html__( 'End Popover', 'ameron' ),
            'type'        => 'pxl_end_popover',
            'condition'   => $args['condition'],
        ),
    );
    return $options;
}