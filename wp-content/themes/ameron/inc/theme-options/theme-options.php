<?php
if (!class_exists('ReduxFramework')) {
    return;
}
if (class_exists('ReduxFrameworkPlugin')) {
    remove_action('admin_notices', array(ReduxFrameworkPlugin::instance(), 'admin_notices'));
}

$opt_name = ameron()->get_option_name();
$version = ameron()->get_version();

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name'         => '', //$theme->get('Name'),
    // Name that appears at the top of your panel
    'display_version'      => $version,
    // Version that appears at the top of your panel
    'menu_type'            => 'submenu',  
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not
    'menu_title'           => esc_html__('Theme Options', 'ameron'),
    'page_title'           => esc_html__('Theme Options', 'ameron'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key'       => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => false,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => false,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-admin-generic',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => true,
    // Show the time the page took to load, etc
    'update_notice'        => true,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field
    'show_options_object' => false,
    // OPTIONAL -> Give you extra features
    'page_priority'        => 80,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => 'pxlart', 
    // For a full list of options, visit: //codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => '',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => 'pxlart-theme-options',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // HINTS
    'hints'                => array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => array(
            'color'   => 'red',
            'shadow'  => true,
            'rounded' => false,
            'style'   => '',
        ),
        'tip_position'  => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect'    => array(
            'show' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'mouseover',
            ),
            'hide' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'click mouseleave',
            ),
        ),
    ),
);

Redux::SetArgs($opt_name, $args);

//* General
Redux::setSection($opt_name, array(
    'title'  => esc_html__('General', 'ameron'),
    'icon'   => 'el-icon-home',
    'fields' => array(
        array(
            'id'       => 'favicon',
            'type'     => 'media',
            'title'    => esc_html__('Favicon', 'ameron'),
            'default' => ''
        ),
        array(
            'id'       => 'site_loader',
            'type'     => 'switch',
            'title'    => esc_html__('Site Loader', 'ameron'),
            'default'  => false
        ),
        array(
            'id'          => 'site_loader_style',
            'type'        => 'select',
            'title'       => esc_html__('Loading Style', 'ameron'),
            'options'  => array(
                'default' => esc_html__('Default', 'ameron'),
                'gif_image'  => esc_html__('Image or Gif', 'ameron'),
            ),
            'default'     => 'default',
            'required' => array( 0 => 'site_loader', 1 => 'equals', 2 => true ),
            'force_output' => true
        ),
        array(
            'id'       => 'loader_image',
            'type'     => 'media',
            'title'    => esc_html__('Select Image', 'ameron'),
            'default' => '',
            'required' => array( 0 => 'site_loader_style', 1 => 'equals', 2 => 'gif_image' ),
        ),
        array(
            'id'       => 'smoothscroll',
            'type'     => 'switch',
            'title'    => esc_html__('Smooth Scroll', 'ameron'),
            'default'  => false
        ),
    )
));

//* Colors
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Colors', 'ameron'),
    'icon'   => 'el el-adjust',
    'fields' => array(
        array(
            'id'          => 'primary_color',
            'type'        => 'color',
            'title'       => esc_html__('Primary Color', 'ameron'),
            'transparent' => false,
            'default'     => '#284be5'
        ), 
        array(
            'id'          => 'secondary_color',
            'type'        => 'color',
            'title'       => esc_html__('Secondary Color', 'ameron'),
            'transparent' => false,
            'default'     => '#232a60'
        ),
        array(
            'id'          => 'additional01_color',
            'type'        => 'color',
            'title'       => esc_html__('Additional01 Color', 'ameron'),
            'transparent' => false,
            'default'     => '#f7f1fe'
        ),
        array(
            'id'      => 'link_color',
            'type'    => 'link_color',
            'title'   => esc_html__('Link Colors', 'ameron'),
            'default' => array(
                'regular' => '',
                'hover'   => '',
                'active'  => ''
            ),
            'output'  => array('a')
        ),
    )
));

//* Header
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Header Desktop', 'ameron'),
    'icon'   => 'el-icon-website',
    'fields' => array_merge(
        ameron_header_opts() 
    )
));
Redux::setSection($opt_name, array(
    'title'      => esc_html__('Header Mobile', 'ameron'),
    'icon'       => 'el-icon-website',
    'fields'     => array_merge(
        ameron_header_mobile_opts()
        
    )
));

//* Page Title
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Page Title', 'ameron'),
    'icon'   => 'el el-indent-left',
    'fields' => array_merge(
        ameron_page_title_opts() 
    )
));

//* WordPress default content
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Content', 'ameron'),
    'icon'   => 'el-icon-pencil',
    'fields' => array(
        array(
            'id'       => 'content_bg_color',
            'type'     => 'color_rgba',
            'title'    => esc_html__('Background Color', 'ameron'),
            'subtitle' => esc_html__('Content background color.', 'ameron'),
            'output'   => array('background-color' => '.pxl-main')
        ),
        array(
            'id'             => 'content_padding',
            'type'           => 'spacing',
            'output'         => array('.pxl-main'),
            'right'          => false,
            'left'           => false,
            'mode'           => 'padding',
            'units'          => array('px'),
            'units_extended' => 'false',
            'title'          => esc_html__('Content Padding', 'ameron'),
            'desc'           => esc_html__('Default: Top-90px, Bottom-90px', 'ameron'),
            'default'        => array(
                'padding-top'    => '',
                'padding-bottom' => '',
                'units'          => 'px',
            )
        ),
        array(
            'id'       => 'sidebar_sticky',
            'type'     => 'button_set',
            'title'    => esc_html__('Sidebar Sticky', 'ameron'),
            'options'  => array(
                '0' => esc_html__('Default', 'ameron'),
                '1' => esc_html__('Sticky', 'ameron'),
            ),
            'default'  => '1'
        )

    )
));


//* Archive Post
Redux::setSection($opt_name, array(
    'title' => esc_html__('Blog Archive', 'ameron'),
    'icon'  => 'el-icon-list',
    'subsection' => true,
    'fields'     => array_merge(
        ameron_sidebar_pos_opts([ 'prefix' => 'blog_']),
        array(
            array(
                'id'       => 'archive_author',
                'title'    => esc_html__('Author', 'ameron'),
                'subtitle' => esc_html__('Display the Author for each blog post.', 'ameron'),
                'type'     => 'switch',
                'default'  => true,
            ),
            array(
                'id'       => 'archive_date',
                'title'    => esc_html__('Date', 'ameron'),
                'subtitle' => esc_html__('Display the Date for each blog post.', 'ameron'),
                'type'     => 'switch',
                'default'  => true,
            ),
            array(
                'id'       => 'archive_category',
                'title'    => esc_html__('Category', 'ameron'),
                'subtitle' => esc_html__('Display the Category for each blog post.', 'ameron'),
                'type'     => 'switch',
                'default'  => true,
            ),
            array(
                'id'       => 'archive_readmore',
                'title'    => esc_html__('Readmore Button', 'ameron'),
                'subtitle' => esc_html__('Display the Readmore button for each blog post.', 'ameron'),
                'type'     => 'switch',
                'default'  => true,
            ),
            array(
                'id'      => 'archive_readmore_text',
                'type'    => 'text',
                'title'   => esc_html__('Read More Text', 'ameron'),
                'default' => '',
                'subtitle' => esc_html__('Default: Read more', 'ameron'),
                'required' => array('archive_readmore', '=', true)
            )
        )
    )
));

//* Single Post
Redux::setSection($opt_name, array(
    'title'      => esc_html__('Single Post', 'ameron'),
    'icon'       => 'el-icon-file-edit',
    'subsection' => true,
    'fields'     => array_merge(
        array(
            array(
                'id'       => 'single_post_title_layout',
                'type'     => 'button_set',
                'title'    => esc_html__('Post title layout', 'ameron'),
                'options'  => array(
                    '0' => esc_html__('Default', 'ameron'),
                    '1' => esc_html__('Custom Post Title', 'ameron'),
                ),
                'default'  => '0'
            ),
            array(
                'id'       => 'post_custom_title',
                'title'    => esc_html__('Custom Post Title', 'ameron'),
                'subtitle' => esc_html__('Show custom post title instead of post title.', 'ameron'),
                'type'     => 'text',
                'default'  => esc_html__('Blog details', 'ameron'),
                'required'      => [ 'single_post_title_layout', '=', '1']
            ),
        ),
        ameron_sidebar_pos_opts([ 'prefix' => 'post_']),
        array(
            array(
                'id'       => 'post_feature_image_on',
                'title'    => esc_html__('Feature Image', 'ameron'),
                'subtitle' => esc_html__('Show feature image on single post.', 'ameron'),
                'type'     => 'switch',
                'default'  => '1'
            ),
            array(
                'id'       => 'post_feature_image_type',
                'type'     => 'button_set',
                'title'    => esc_html__('Feature Image Type', 'ameron'),
                'subtitle' => esc_html__('Feature image Type on single post.', 'ameron'),
                'options' => array(
                    'cropped'  => esc_html__('Cropped Image', 'ameron'),
                    'full'  => esc_html__('Full Image', 'ameron')
                ),
                'default' => 'full',
            ),
            array(
                'id'       => 'post_author',
                'title'    => esc_html__('Author', 'ameron'),
                'subtitle' => esc_html__('Display the Author for blog post.', 'ameron'),
                'type'     => 'switch',
                'default'  => '1'
            ),
            array(
                'id'       => 'post_date_on',
                'title'    => esc_html__('Date', 'ameron'),
                'subtitle' => esc_html__('Display the Date for blog post.', 'ameron'),
                'type'     => 'switch',
                'default'  => '1'
            ),
            array(
                'id'       => 'post_comments_on',
                'title'    => esc_html__('Send Message', 'ameron'),
                'subtitle' => esc_html__('Display the Comment form for blog post.', 'ameron'),
                'type'     => 'switch',
                'default'  => '1',
            ),
            array(
                'id'       => 'post_categories_on',
                'title'    => esc_html__('Categories', 'ameron'),
                'subtitle' => esc_html__('Display the Category for blog post.', 'ameron'),
                'type'     => 'switch',
                'default'  => '1'
            ),
            array(
                'id'       => 'post_tag',
                'title'    => esc_html__('Tags', 'ameron'),
                'subtitle' => esc_html__('Display the Tag for blog post.', 'ameron'),
                'type'     => 'switch',
                'default'  => '1'
            ),
            array(
                'id'       => 'post_social_share',
                'title'    => esc_html__('Social Share', 'ameron'),
                'subtitle' => esc_html__('Display the Social Share for blog post.', 'ameron'),
                'type'     => 'switch',
                'default'  => '0',
            ),
            array(
                'id'       => 'post_social_share_icon',
                'type'     => 'button_set',
                'title'    => esc_html__('Select Social Share', 'ameron'),
                'subtitle' => esc_html__('Show social share on single post.', 'ameron'),
                'multi'    => '1',
                'options' => array(
                    'facebook'  => esc_html__('Facebook', 'ameron'),
                    'twitter'   => esc_html__('Twitter', 'ameron'),
                    'linkedin'  => esc_html__('Linkedin', 'ameron'),
                    'pinterest' => esc_html__('Pinterest', 'ameron'),
                ), 
                'default' => array('facebook', 'twitter', 'linkedin', 'pinterest'),
                'required' => [
                   'post_social_share',
                   'equals',
                   '1' 
                ]
            ),
            array(
                'id'       => 'post_navigation',
                'title'    => esc_html__('Navigation', 'ameron'),
                'subtitle' => esc_html__('Display the Navigation for blog post.', 'ameron'),
                'type'     => 'switch',
                'default'  => '1',
            ),
            array(
                'id'       => 'post_related_on',
                'title'    => esc_html__('Related Post', 'ameron'),
                'subtitle' => esc_html__('Show related on single post.', 'ameron'),
                'type'     => 'switch',
                'default'  => false,
            ),
            array(
                'id'       => 'description_related',
                'type'     => 'textarea',
                'title'    => esc_html__('Description Realated', 'ameron'),
                'subtitle' => esc_html__('Enter your description text', 'ameron'),
                'desc'     => esc_html__('Leave blank to use default text', 'ameron'),
                'default'  => '',
            ),
        )
    )
));

//* Post Type
Redux::setSection($opt_name, array(
    'title' => esc_html__('Post Types', 'ameron'),
    'desc' => esc_html__('Theme custom post type', 'ameron'),
    'icon' => 'el el-folder-open',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'pxl_case_study_slug',
            'type' => 'text',
            'title' => esc_html__('Portfolio Slug', 'ameron'),
            'subtitle' => esc_html__('The slug name cannot be the same as a page name. Make sure to regenertate permalinks, after making changes.', 'ameron'),
            'default' => '',
        ),
        array(
            'id' => 'pxl_case_study_label',
            'type' => 'text',
            'title' => esc_html__('Portfolio Label', 'ameron'),
            'subtitle' => esc_html__('Name of the post type shown in the menu, breadcrumb...', 'ameron'),
            'default' => '',
        ),
        array(
            'id'      => 'pxl_case_study_archive_link',
            'type'    => 'text',
            'title'   => esc_html__('Portfolio Archive Link', 'ameron'),
            'subtitle' => esc_html__('Custom default archive link when customer click on breadcrumb, default layout same blog post archive.', 'ameron'),
            'default' => '',
        ),
        array(
            'id' => 'pxl_practice_area_slug',
            'type' => 'text',
            'title' => esc_html__('Practice Area Slug', 'ameron'),
            'subtitle' => esc_html__('The slug name cannot be the same as a page name. Make sure to regenertate permalinks, after making changes.', 'ameron'),
            'default' => '',
        ),
        array(
            'id' => 'pxl_practice_area_label',
            'type' => 'text',
            'title' => esc_html__('Practice Area Label', 'ameron'),
            'subtitle' => esc_html__('Name of the post type shown in the menu, breadcrumb...', 'ameron'),
            'default' => '',
        ),
        array(
            'id'      => 'pxl_practice_area_archive_link',
            'type'    => 'text',
            'title'   => esc_html__('Practice Area Archive Link', 'ameron'),
            'subtitle' => esc_html__('Custom default archive link when customer click on breadcrumb, default layout same blog post archive.', 'ameron'),
            'default' => '',
        ),
    )
));

//* Footer
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Footer', 'ameron'),
    'icon'   => 'el el-website',
    'fields' => array_merge(
        ameron_footer_opts(),
        array(
            array(
                'id'       => 'back_totop_on',
                'type'     => 'switch',
                'title'    => esc_html__('Button Back to Top', 'ameron'),
                'default'  => false,
            )
        )
    )

));

//* 404 Page
Redux::setSection($opt_name, array(
    'title'      => esc_html__('404 Page', 'ameron'),
    'icon'       => 'el el-cog',
    'fields'     => array_merge(
        array(
            
            array(
                'id'       => 'img_404_background',
                'type'     => 'background',
                'title'    => esc_html__('Backgound Image', 'ameron'),
                'output'   => array('body.error404 .page-404-wrap'),
                'default' => array()
            ), 
            array(
                'id'       => 'img_404_1',
                'type'     => 'media',
                'title'    => esc_html__('Icon Image', 'ameron'),
                'default' => array()
            ),
            array(
                'id'       => 'heading_404_page',
                'type'     => 'text',
                'title'    => esc_html__('Heading', 'ameron'),
                'subtitle' => esc_html__('Enter your text', 'ameron'),
                'desc'     => esc_html__('Leave blank to use default text', 'ameron'),
                'default'  => '',
            ),
            array(
                'id'       => 'desc_404_page',
                'type'     => 'textarea',
                'title'    => esc_html__('Description', 'ameron'),
                'subtitle' => esc_html__('Enter your description text', 'ameron'),
                'desc'     => esc_html__('Leave blank to use default text', 'ameron'),
                'default'  => '',
            ),
            array(
                'id'       => 'btn_text_404_page',
                'type'     => 'text',
                'title'    => esc_html__('Button Text', 'ameron'),
                'subtitle' => esc_html__('Enter your text', 'ameron'),
                'default'  => '',
                'desc'     => esc_html__('Leave blank to use default text', 'ameron')
            )
        )
    )
));

//* Woocommerce
if(class_exists('Woocommerce')) {
    Redux::setSection($opt_name, array(
        'title' => esc_html__('Woocommerce', 'ameron'),
        'icon'  => 'el el-shopping-cart',
        'fields'     => array_merge(
            ameron_sidebar_pos_opts([ 'prefix' => 'shop_']),
            array(
                array(
                    'id'       => 'shop_display_type',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Display Type', 'ameron'),
                    'options'  => array(
                        'grid' => esc_html__('Grid', 'ameron'),
                        'list' => esc_html__('List', 'ameron'),
                    ),
                    'default'  => 'grid'
                ),
                array(
                    'title'         => esc_html__('Products displayed per row', 'ameron'),
                    'id'            => 'products_columns',
                    'type'          => 'slider',
                    'subtitle'      => esc_html__('Number product to show per row', 'ameron'),
                    'default'       => 2,
                    'min'           => 2,
                    'step'          => 1,
                    'max'           => 6,
                    'display_value' => 'text'
                ),
                array(
                    'title'         => esc_html__('Products displayed per page', 'ameron'),
                    'id'            => 'product_per_page',
                    'type'          => 'slider',
                    'subtitle'      => esc_html__('Number product to show', 'ameron'),
                    'default'       => 6,
                    'min'           => 3,
                    'step'          => 1,
                    'max'           => 50,
                    'display_value' => 'text'
                ),
            )
        )
    ));
    Redux::setSection($opt_name, array(
        'title'      => esc_html__('Single Product', 'ameron'),
        'icon'       => 'el el-file-edit',
        'subsection' => true,
        'fields'     => array_merge(
            ameron_sidebar_pos_opts([ 'prefix' => 'product_', 'default_value' => '0'] ),
            array(
                array(
                    'id'       => 'product_social_share_on',
                    'title'    => esc_html__('Social Share', 'ameron'),
                    'subtitle' => esc_html__('Show social share on single product.', 'ameron'),
                    'type'     => 'switch',
                    'default'  => '0',
                ),
                array(
                    'id'       => 'product_social_share_icon',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Select Social Share', 'ameron'),
                    'subtitle' => esc_html__('Show social share on single product.', 'ameron'),
                    'multi'    => true,
                    'options' => array(
                        'facebook'  => esc_html__('Facebook', 'ameron'),
                        'twitter'   => esc_html__('Twitter', 'ameron'),
                        'linkedin'  => esc_html__('Linkedin', 'ameron'),
                        'pinterest' => esc_html__('Pinterest', 'ameron'),
                    ),
                    'default' => array('facebook', 'twitter', 'linkedin', 'pinterest'),
                    'required' => [
                        'product_social_share_on',
                        'equals',
                        '1'
                    ]
                ),
            ),
            ameron_product_single_opts_wishlist(),
            array(
                array(
                    'id'       => 'product_related',
                    'title'    => esc_html__('Product Related', 'ameron'),
                    'subtitle' => esc_html__('Show/Hide related product', 'ameron'),
                    'type'     => 'switch',
                    'default'  => '1',
                ),
            )
        )
    ));
    Redux::setSection($opt_name, array(
        'title'      => esc_html__('Cart Page', 'ameron'),
        'icon'       => 'el el-shopping-cart-sign',
        'subsection' => true,
        'fields'     => array_merge(
            array(
                array(
                    'id'       => 'cart_cross_sell',
                    'title'    => esc_html__('Cross Sells', 'ameron'),
                    'subtitle' => esc_html__('Show/Hide Cross Sells product', 'ameron'),
                    'type'     => 'switch',
                    'default'  => '1',
                ),
                array(
                    'id'            => 'cart_cross_sell_total',
                    'title'         => esc_html__('Cross Sells Total', 'ameron'),
                    'subtitle'      => esc_html__('Total cross sell product display', 'ameron'),
                    'type'          => 'slider',
                    'default'       => '4',
                    'min'           => 1,
                    'step'          => 1,
                    'max'           => 12,
                    'display_value' => 'label',
                    'required' => [
                        ['cart_cross_sell', '!=', '0'],
                    ]
                ),
                array(
                    'id'            => 'cart_cross_sell_column',
                    'title'         => esc_html__('Cross Sells Columns', 'ameron'),
                    'subtitle'      => esc_html__('Choose your Columns', 'ameron'),
                    'type'          => 'slider',
                    'default'       => '4',
                    'min'           => 1,
                    'step'          => 1,
                    'max'           => 6,
                    'display_value' => 'label',
                    'required' => [
                        ['cart_cross_sell', '!=', '0'],
                    ]
                )
            )
        )
    ));
}

//* Typography
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Typography', 'ameron'),
    'icon'   => 'el-icon-text-width',
    'fields' => array(
        array(
            'id'          => 'font_body',
            'type'        => 'typography',
            'title'       => esc_html__('Body', 'ameron'),
            'google'      => true,
            'line-height' => true,
            'font-size'   => true,
            'text-align'  => false,
            'letter-spacing' => true,
            'units'       => 'px',
        ),
        array(
            'id'             => 'font_heading',
            'type'           => 'typography',
            'title'          => esc_html__('Heading', 'ameron'),
            'google'         => true,
            'line-height'    => true,
            'font-size'      => false,
            'text-align'     => false,
            'letter-spacing' => true,
            'text-transform' => true,
            'units'          => 'em',
        ),
        array(
            'id'          => 'font_h1',
            'type'        => 'text',
            'title'       => esc_html__('H1 Font Size', 'ameron'),
            'default'     => '',
            'placeholder' => '60px'
        ),
        array(
            'id'          => 'font_h2',
            'type'        => 'text',
            'title'       => esc_html__('H2 Font Size', 'ameron'),
            'default'     => '',
            'placeholder' => '45px'
        ),
        array(
            'id'          => 'font_h3',
            'type'        => 'text',
            'title'       => esc_html__('H3 Font Size', 'ameron'),
            'default'     => '',
            'placeholder' => '36px'
        ),
        array(
            'id'          => 'font_h4',
            'type'        => 'text',
            'title'       => esc_html__('H4 Font Size', 'ameron'),
            'default'     => '',
            'placeholder' => '24px'
        ),
        array(
            'id'          => 'font_h5',
            'type'        => 'text',
            'title'       => esc_html__('H5 Font Size', 'ameron'),
            'default'     => '',
            'placeholder' => '18px'
        ),
        array(
            'id'          => 'font_h6',
            'type'        => 'text',
            'title'       => esc_html__('H6 Font Size', 'ameron'),
            'default'     => '',
            'placeholder' => '16px'
        ),
    )
));