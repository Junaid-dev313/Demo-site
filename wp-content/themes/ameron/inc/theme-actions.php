<?php 
/**
 * Actions Hook for the theme
 *
 * @package Ameron
 */

add_action('after_setup_theme', 'ameron_setup');
function ameron_setup(){
    //Set the content width in pixels, based on the theme's design and stylesheet.
    $GLOBALS['content_width'] = apply_filters( 'ameron_content_width', 1200 );

    // Make theme available for translation.
    load_theme_textdomain( 'ameron', get_template_directory() . '/languages' );

    // Custom Header
    add_theme_support( 'custom-header' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );

    // Set post thumbnail size.
    set_post_thumbnail_size( 1170, 560 );
    $custom_sizes = ameron_configs('custom_sizes'); 
    foreach ($custom_sizes as $option => $values) {
        add_image_size( $option, $values[0], $values[1], $values[2] );
    }
   
    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary', 'ameron' ),
    ) );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Add support for core custom logo.
    add_theme_support( 'custom-logo', array(
        'height'      => 250,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
    ) );
    // Post formats
    add_theme_support( 'post-formats', array(
        'video',
        'audio',
        'quote',
        'link',
    ) );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support('post-thumbnails');
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
    remove_theme_support('widgets-block-editor');

}

/**
 * Register Widgets Position.
 */
add_action( 'widgets_init', 'ameron_widgets_position' );
function ameron_widgets_position() {
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'ameron' ),
		'id'            => 'sidebar-blog',
		'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-content">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',


	) );
     
	if (class_exists('ReduxFramework') && class_exists('Pxltheme_Core')) {
		register_sidebar( array(
			'name'          => esc_html__( 'Page Sidebar', 'ameron' ),
			'id'            => 'sidebar-page',
			'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-content">',
			'after_widget'  => '</div></section>',
			'before_title'  => '<h3 class="widget-title"><span>',
			'after_title'   => '</span></h3>',
		) );
	}

	if ( class_exists( 'Woocommerce' ) ) {
		register_sidebar( array(
			'name'          => esc_html__( 'Shop Sidebar', 'ameron' ),
			'id'            => 'sidebar-shop',
			'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-content">',
			'after_widget'  => '</div></section>',
			'before_title'  => '<h3 class="widget-title"><span>',
			'after_title'   => '</span></h3>',
		) );
	}
}

/**
 * Enqueue Styles Scripts : Front-End
 */
add_action( 'wp_enqueue_scripts', 'ameron_scripts' );
function ameron_scripts() {  
    /* Icons Lib */
    wp_enqueue_style( 'ameron-icon', get_template_directory_uri() . '/assets/fonts/pixelart/style.css', array(), '1.0.0');
    wp_enqueue_style( 'flaticon', get_template_directory_uri() . '/assets/fonts/flaticon/css/flaticon.css', array(), '1.0.0');
    wp_enqueue_style( 'material', get_template_directory_uri() . '/assets/fonts/material/css/font-material.min.css', array(), '1.0.0');
    wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), '1.0.0' );
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css', array(), '1.0.0' );
	wp_enqueue_style( 'ameron-grid', get_template_directory_uri() . '/assets/css/grid.css', array(), ameron()->get_version() );
	wp_enqueue_style( 'ameron-style', get_template_directory_uri() . '/assets/css/style.css', array(), ameron()->get_version() );
	wp_add_inline_style( 'ameron-style', ameron_inline_styles() );
    wp_enqueue_style( 'ameron-base', get_template_directory_uri() . '/style.css', array(), ameron()->get_version() );
	wp_enqueue_style( 'ameron-google-fonts', ameron_fonts_url(), array(), null );

    wp_enqueue_script( 'tilt', get_template_directory_uri() . '/assets/js/tilt.jquery.min.js', array( 'jquery' ), ameron()->get_version(), true );
    wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/magnific-popup.min.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'wow', get_template_directory_uri() . '/assets/js/wow.min.js', array( 'jquery' ), '1.3.0', true );
    wp_enqueue_script( 'ameron-main', get_template_directory_uri() . '/assets/js/theme.js', array( 'jquery' ), ameron()->get_version(), true );
    wp_localize_script( 'ameron-main', 'main_data', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    $smoothscroll = ameron()->get_theme_opt( 'smoothscroll', false );
    if(isset($smoothscroll) && $smoothscroll) {
        wp_enqueue_script('ameron-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array('jquery'), '1.0.0', true);
    }
    do_action( 'ameron_scripts');
}

/**
 * Enqueue Styles Scripts : Back-End
 */
add_action('admin_enqueue_scripts', 'ameron_admin_style');
function ameron_admin_style() {
    wp_enqueue_style('ameron-admin', get_template_directory_uri() . '/assets/css/admin.css', array(), '1.0.0');
    wp_enqueue_style('ameron-icon', get_template_directory_uri() . '/assets/fonts/pixelart/style.css', array(), '1.0.0');
    wp_enqueue_style('flaticon', get_template_directory_uri() . '/assets/fonts/flaticon/css/flaticon.css', array(), '1.0.0');
    wp_enqueue_style('material', get_template_directory_uri() . '/assets/fonts/material/css/font-material.min.css', array(), '1.0.0');
    wp_enqueue_script( 'admin-widget', get_template_directory_uri() . '/inc/admin/assets/js/widget.js', array( 'jquery' ), array( 'jquery' ), '1.0.0', true );
}

add_action( 'elementor/editor/before_enqueue_scripts', function() {
    wp_enqueue_style( 'ameron-custom-editor', get_template_directory_uri() . '/assets/css/custom-editor.css', array(), '1.0.0' );
    wp_enqueue_style( 'admin-ameron-icon', get_template_directory_uri() . '/assets/fonts/pixelart/style.css', array(), '1.0.0' );
    wp_enqueue_style( 'admin-flaticon', get_template_directory_uri() . '/assets/fonts/flaticon/css/flaticon.css', array(), '1.0.0' );
    wp_enqueue_style( 'admin-material', get_template_directory_uri() . '/assets/fonts/material/css/font-material.min.css', array(), '1.0.0' );
} );

//* Favicon
add_action('wp_head', 'ameron_site_favicon');
function ameron_site_favicon(){
    $favicon = ameron()->get_theme_opt( 'favicon' );
    if(!empty($favicon['url']))
        echo '<link rel="icon" type="image/png" href="'.esc_url($favicon['url']).'"/>';
}

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
add_action( 'wp_head', 'ameron_pingback_header' );
function ameron_pingback_header(){
    if ( is_singular() && pings_open() )
    {
        echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
    }
}

add_action( 'elementor/preview/enqueue_styles', 'ameron_add_editor_preview_style' );
function ameron_add_editor_preview_style(){
    wp_add_inline_style( 'editor-preview', ameron_editor_preview_inline_styles() );
}
function ameron_editor_preview_inline_styles(){
    $theme_colors = ameron_configs('theme_colors');
    ob_start();
        echo '.elementor-edit-area-active{';
            foreach ($theme_colors as $color => $value) {
                printf('--%1$s-color: %2$s;', str_replace('#', '',$color),  $value['value']);
            }
        echo '}';
    return ob_get_clean();
}

/**
 * Add field subtitle to post.
 */
add_action( 'edit_form_after_title', 'ameron_add_subtitle_field' );
function ameron_add_subtitle_field() {
	global $post;

	$screen = get_current_screen();

	if ( in_array( $screen->id, array( 'acm-post' ) ) ) {

		$value = get_post_meta( $post->ID, 'post_subtitle', true );

		echo '<div class="subtitle"><input type="text" name="post_subtitle" value="' . esc_attr( $value ) . '" id="subtitle" placeholder = "' . esc_attr__( 'Subtitle', 'ameron' ) . '" style="width: 100%;margin-top: 4px;"></div>';
	}
}

add_action('wp_footer', 'ameron_backtotop',2);
function ameron_backtotop($args = []){
    $back_totop_on = ameron()->get_theme_opt('back_totop_on', true);
    if ('1' !== $back_totop_on) return;
    ?>
    <a href="#pxl-page" class="pxl-scroll-top"><i class="zmdi zmdi-long-arrow-up"></i></a>
<?php 
} 

add_action( 'pxltheme_anchor_target', 'ameron_hook_anchor_side_mobile_default');
function ameron_hook_anchor_side_mobile_default(){
    $header_mobile_layout = (int)ameron()->get_opt('header_mobile_layout'); 
    if( $header_mobile_layout > 0 ) return;
    ?>
    <nav class="pxl-hidden-template pos-left pxl-side-mobile">
        <div class="pxl-panel-header">
            <div class="panel-header-inner">
                <a href="#" class="pxl-close" data-target=".pxl-side-mobile" title="<?php echo esc_attr__( 'Close', 'ameron' ) ?>"></a>
            </div>
        </div> 
        <div class="pxl-panel-content custom_scroll">
            <div class="menu-main-container-wrap">
                <div id="mobile-menu-container" class="menu-main-container">
                    <?php 
                        if ( has_nav_menu( 'primary' ) ){
                            wp_nav_menu( 
                                array(
                                    'theme_location' => 'primary',
                                    'container'      => '',
                                    'menu_id'        => 'pxl-mobile-menu',
                                    'menu_class'     => 'pxl-mobile-menu clearfix',
                                    'link_before'    => '<span class="pxl-menu-title">',
                                    'link_after'     => '</span>',  
                                    'walker'         => '',
                                ) 
                            );
                        }else{
                            printf(
                                '<ul class="pxl-mobile-menu pxl-primary-menu primary-menu-not-set"><li><a href="%1$s">%2$s</a></li></ul>',
                                esc_url( admin_url( 'nav-menus.php' ) ),
                                esc_html__( 'Create New Menu', 'ameron' )
                            );
                        }
                    ?>
                </div>
            </div>
        </div>
    </nav>
    <?php 
}

add_action( 'pxltheme_anchor_target', 'ameron_hook_anchor_templates_hidden_panel');
function ameron_hook_anchor_templates_hidden_panel(){

    $hidden_templates = ameron_get_templates_slug('hidden-panel');
    if(empty($hidden_templates)) return;
    foreach ($hidden_templates as $slug => $values){
        $args = [
            'slug' => $slug,
            'post_id' => $values['post_id'],
            'position' => !empty($values['position']) ? $values['position'] : 'custom-pos'
        ];
        if( did_action('pxl_anchor_target_hidden_panel_'.$values['post_id']) <= 0){
            do_action( 'pxl_anchor_target_hidden_panel_'.$values['post_id'], $args );
        }
    }
}

function ameron_hook_anchor_hidden_panel($args){
    ?>
    <div class="pxl-hidden-template pxl-hidden-template-<?php echo esc_attr($args['post_id'])?> pos-<?php echo esc_attr($args['position']) ?>">
        <div class="pxl-hidden-template-wrap">
            <div class="pxl-panel-header">
                <div class="panel-header-inner">
                    <a href="#" class="pxl-close" title="<?php echo esc_attr__( 'Close', 'ameron' ) ?>"></a>
                </div>
            </div>
            <div class="pxl-panel-content custom_scroll">
                <?php echo Elementor\Plugin::$instance->frontend->get_builder_content_for_display( (int)$args['post_id']); ?>
            </div>
        </div>
    </div>
    <?php
}
function ameron_hook_anchor_custom(){
    return;
}

add_action( 'pxltheme_anchor_target', 'ameron_header_popup_cart');
function ameron_header_popup_cart(){  
    if(!class_exists('Woocommerce')) return;
    ?>
    <div class="pxl-hidden-template pxl-side-cart">
        <div class="pxl-hidden-template-wrap">
            <div class="pxl-panel-header">
                <div class="panel-header-inner">
                    <h3 class="cart-title"><?php echo esc_html__( 'Shopping Cart', 'ameron' ) ?></h3>
                    <a href="#" class="pxl-close" title="<?php echo esc_attr__( 'Close', 'ameron' ) ?>"></a>
                </div>
            </div>
            <div class="pxl-side-panel-content widget_shopping_cart custom_scroll">
                <div class="widget_shopping_cart_content">
                    <?php woocommerce_mini_cart(); ?>
                </div>
            </div>
        </div>
    </div>
    <?php
}

//* Custom archive link
function pxl_custom_archive_post_type_link() {
    $pxl_case_study_archive_link = ameron()->get_theme_opt('pxl_case_study_archive_link', '');
    $pxl_practice_area_archive_link = ameron()->get_theme_opt('pxl_practice_area_archive_link', '');
    if( is_post_type_archive( 'pxl-case-study' ) && !empty($pxl_case_study_archive_link) ) {
        wp_redirect( $pxl_case_study_archive_link, 301 );
        exit();
    }
    if( is_post_type_archive( 'pxl-practice-area' ) && !empty($pxl_practice_area_archive_link) ) {
        wp_redirect( $pxl_practice_area_archive_link, 301 );
        exit();
    }
}
add_action( 'template_redirect', 'pxl_custom_archive_post_type_link' );

//* User Custom Fields
add_action('show_user_profile', 'ameron_user_fields');
add_action('edit_user_profile', 'ameron_user_fields');
function ameron_user_fields($user)
{

    $user_facebook = get_user_meta($user->ID, 'user_facebook', true);
    $user_twitter = get_user_meta($user->ID, 'user_twitter', true);
    $user_youtube = get_user_meta($user->ID, 'user_youtube', true);
    $user_instagram = get_user_meta($user->ID, 'user_instagram', true);
    $user_google = get_user_meta($user->ID, 'user_google', true);

?>
    <h3><?php esc_html_e('Social', 'ameron'); ?></h3>
    <table class="form-table">
        <tr>
            <th><label for="user_facebook"><?php esc_html_e('Facebook URL', 'ameron'); ?></label></th>
            <td>
                <input id="user_facebook" name="user_facebook" type="text" value="<?php echo esc_attr(isset($user_facebook) ? $user_facebook : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_twitter"><?php esc_html_e('Twitter URL', 'ameron'); ?></label></th>
            <td>
                <input id="user_twitter" name="user_twitter" type="text" value="<?php echo esc_attr(isset($user_twitter) ? $user_twitter : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_youtube"><?php esc_html_e('Youtube URL', 'ameron'); ?></label></th>
            <td>
                <input id="user_youtube" name="user_youtube" type="text" value="<?php echo esc_attr(isset($user_youtube) ? $user_youtube : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_instagram"><?php esc_html_e('Instagram URL', 'ameron'); ?></label></th>
            <td>
                <input id="user_instagram" name="user_instagram" type="text" value="<?php echo esc_attr(isset($user_instagram) ? $user_instagram : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_google"><?php esc_html_e('Google URL', 'ameron'); ?></label></th>
            <td>
                <input id="user_google" name="user_google" type="text" value="<?php echo esc_attr(isset($user_google) ? $user_google : ''); ?>" />
            </td>
        </tr>
    </table>
<?php
}

/**
 * Save user custom fields.
 */
add_action('personal_options_update', 'ameron_save_user_custom_fields');
add_action('edit_user_profile_update', 'ameron_save_user_custom_fields');
function ameron_save_user_custom_fields($user_id)
{
    if (!current_user_can('edit_user', $user_id))
        return false;

    if (isset($_POST['user_facebook']))
        update_user_meta($user_id, 'user_facebook', $_POST['user_facebook']);
    if (isset($_POST['user_twitter']))
        update_user_meta($user_id, 'user_twitter', $_POST['user_twitter']);
    if (isset($_POST['user_youtube']))
        update_user_meta($user_id, 'user_youtube', $_POST['user_youtube']);
    if (isset($_POST['user_instagram']))
        update_user_meta($user_id, 'user_instagram', $_POST['user_instagram']);
    if (isset($_POST['user_google']))
        update_user_meta($user_id, 'user_google', $_POST['user_google']);
}

//* Author Social
function ameron_get_user_social()
{

    $user_facebook = get_user_meta(get_the_author_meta('ID'), 'user_facebook', true);
    $user_twitter = get_user_meta(get_the_author_meta('ID'), 'user_twitter', true);
    $user_youtube = get_user_meta(get_the_author_meta('ID'), 'user_youtube', true);
    $user_instagram = get_user_meta(get_the_author_meta('ID'), 'user_instagram', true);
    $user_google = get_user_meta(get_the_author_meta('ID'), 'user_google', true);

?>
    <ul class="user-social d-flex">
        <?php if (!empty($user_youtube)) { ?>
            <li class="user-social-youtube"><a href="<?php echo esc_url($user_youtube); ?>"><i class="pxli pxli-youtube-brands"></i></a></li>
        <?php } ?>
        <?php if (!empty($user_facebook)) { ?>
            <li class="user-social-facebook"><a href="<?php echo esc_url($user_facebook); ?>"><i class="pxli pxli-facebook-f"></i></a></li>
        <?php } ?>
        <?php if (!empty($user_instagram)) { ?>
            <li class="user-social-instagram"><a href="<?php echo esc_url($user_instagram); ?>"><i class="pxli pxli-instagram-square"></i></a></li>
        <?php } ?>
        <?php if (!empty($user_google)) { ?>
            <li class="user-social-google"><a href="<?php echo esc_url($user_google); ?>"><i class="pxli pxli-google-plus-g"></i></a></li>
        <?php } ?>
        <?php if (!empty($user_twitter)) { ?>
            <li class="user-social-twitter"><a href="<?php echo esc_url($user_twitter); ?>"><i class="pxli pxli-twitter"></i></a></li>
        <?php } ?>
    </ul>
<?php
}


