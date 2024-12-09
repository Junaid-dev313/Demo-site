<?php
/**
 * Theme functions: init, enqueue scripts and styles, include required files and widgets.
 *
 * @package Ameron
 */

use Elementor\Plugin;

if( !define('THEME_DEV_MODE_ELEMENTS', true) && is_user_logged_in()){
    define('THEME_DEV_MODE_ELEMENTS', true);
}

require_once get_template_directory() . '/inc/classes/class-main.php';

if (is_admin()) {
    require_once get_template_directory() . '/inc/admin/admin-init.php';
}

/**
 * Theme Require
 */
ameron()->require_folder('inc');
ameron()->require_folder('inc/classes');
ameron()->require_folder('inc/theme-options');
ameron()->require_folder('template-parts/widgets');
if (class_exists('Woocommerce')) {
    ameron()->require_folder('woocommerce');
}
 