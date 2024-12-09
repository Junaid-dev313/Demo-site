<?php
// make some configs
if(!function_exists('ameron_configs')){
    function ameron_configs($value){ 
        $body_font    = '\'Nunito Sans\', sans-serif';
        $heading_font = '\'Poppins\', sans-serif';
        $other_font = '\'Caveat\', sans-serif';
          
        $configs = [
            'theme_colors' => [
                'primary'   => [
                    'title' => esc_html__('Primary', 'ameron'),
                    'value' => ameron()->get_opt('primary_color', '#284be5')
                ],
                'secondary'   => [
                    'title' => esc_html__('Secondary', 'ameron'),
                    'value' => ameron()->get_opt('secondary_color', '#232a60')
                ],
                'additional01'   => [
                    'title' => esc_html__('Additional01 Color', 'ameron'),
                    'value' => ameron()->get_opt('additional01_color', '#f7f1fe')
                ],
                'body'     => [
                    'title' => esc_html__('Body', 'ameron'),
                    'value' => ameron()->get_opt('font_body', ['color' => '#647c9e'],'color')
                ],
                'heading'     => [
                    'title' => esc_html__('Heading', 'ameron'),
                    'value' => ameron()->get_opt('font_heading', ['color' => '#232a60'],'color')
                ],
            ],
            'link' => [
                'color' => ameron()->get_opt('link_color', ['regular' => 'inherit'],'regular'),
                'color-hover'   => ameron()->get_opt('link_color', ['hover' => '#183153'],'hover'),
                'color-active'  => ameron()->get_opt('link_color', ['active' => '#183153'],'active'),
            ],
            'custom_sizes' => [
                'size-post-single'      => [800, 470, true],
                'size-recent-post'      => [400, 468, true],
            ],
            'body' => [
                'bg'                => '#fff',
                'font-family'       => ameron()->get_theme_opt('font_body',['font-family' => $body_font], 'font-family'),
                'font-size'         => ameron()->get_theme_opt('font_body',['font-size' => '18px'], 'font-size'),
                'font-weight'       => ameron()->get_theme_opt('font_body',['font-weight' => '400'], 'font-weight'),
                'line-height'       => ameron()->get_theme_opt('font_body',['line-height' => '1.625'], 'line-height'),
                'letter-spacing'    => ameron()->get_theme_opt('font_body',['letter-spacing' => '0px'], 'letter-spacing'),

            ],
            'heading' => [
                'font-family'       => ameron()->get_theme_opt('font_heading',['font-family' => $heading_font], 'font-family'),
                'font-weight'       => ameron()->get_theme_opt('font_heading',['font-weight' => '700'], 'font-weight'),
                'line-height'       => ameron()->get_theme_opt('font_heading',['line-height' => '1.18'], 'line-height'),
                'letter-spacing'    => ameron()->get_theme_opt('font_heading',['letter-spacing' => '0.02em'], 'letter-spacing'),
                'color-hover'      => 'var(--primary-color)',
            ],
            'heading_font_size' => [
                'h1' => ameron()->get_theme_opt('font_h1','60px'),
                'h2' => ameron()->get_theme_opt('font_h2','48px'),
                'h3' => ameron()->get_theme_opt('font_h3','36px'),
                'h4' => ameron()->get_theme_opt('font_h4','26px'),
                'h5' => ameron()->get_theme_opt('font_h5','18px'),
                'h6' => ameron()->get_theme_opt('font_h6','16px')
            ],
            'header' => [
                'height' => '110px' // use for default header
            ],
            'logo' => [
                'mobile_width' => ameron()->get_opt('logo_mobile_size', ['width' => '192px', 'units' => 'px'])['width'],
            ],
            'border' => [
                'color'          => '#a9a9a9',
                'radius'         => '10px',
                'radius_mobile'  => '5px',
                'radius_button'  => '10px',
                'radius_form'    => '20px',
                'radius_comment' => '24px'
            ],
            'divider' => [
                'color'          => '#d8d8d8',
            ],
            // Menu Color
            'menu' => [
                'bg'          => '#fff',
                'regular'     => 'var(--heading-color)',
                'hover'       => 'var(--primary-color)',
                'active'      => 'var(--primary-color)',
                'font_size'   => '18px',
                'font_weight' => 600,
                'font_family' => $heading_font
            ] ,
            'dropdown' => [
                'bg'            => '#f7f1fe',
                'shadow'        => '0px 5px 83px 0 rgba(40,40,40,0.08)',
                'regular'       => 'var(--secondary-color)',
                'hover'         => 'var(--primary-color)',
                'active'        => 'var(--primary-color)',
                'font_size'     => '15px',
                'font_weight'   => '600',
                'item_bg'       => 'transparent',
                'item_bg_hover' => '#ffffff',
            ],
            'mobile_menu' => [
                'regular' => 'var(--heading-color)',
                'hover'   => 'var(--primary-color)',
                'active'  => 'var(--primary-color)',
                'font_size'   => '17px',
                'font_weight' => 600,
                'font_family' => $heading_font,
                'item_bg'       => 'transparent',
                'item_bg_hover' => 'transparent',
                'text_transform' => 'capitalize' 
            ],
            'mobile_submenu' => [
                'regular' => 'var(--heading-color)',
                'hover'   => 'var(--primary-color)',
                'active'  => 'var(--primary-color)',
                'font_size'     => '15px', 
                'font_weight' => 400, 
                'font_family' => $body_font,
                'item_bg'       => 'transparent',
                'item_bg_hover' => 'transparent',
                'text_transform' => 'capitalize' 
            ],
            'button' => [
                'font-family'        => $heading_font,
                'font-size'          => '16px',
                'font-weight'        => '700',
                'line-height'        => '2.5',
                'bg-color'           => 'var(--primary-color)',      
                'color'              => '#ffffff',
                'letter-spacing'     => '0px',
                'padding'            => '11px 45px',
                'radius'             => '10px',
                'radius-mobile'      => '5px',
                'radius-rtl'         => '0',
                'bg-color-hover'     => 'var(--secondary-color)',
                'color-hover'        => '#ffffff',
                'border-color-hover' => 'var(--secondary-color)',
            ],
        ];

        return $configs[$value];
    }
}
if(!function_exists('ameron_inline_styles')){
    function ameron_inline_styles() {
        $body              = ameron_configs('body');
        $theme_colors      = ameron_configs('theme_colors');
        $link_color        = ameron_configs('link');
        $heading           = ameron_configs('heading');
        $heading_font_size = ameron_configs('heading_font_size');
        $logo              = ameron_configs('logo');
        ob_start();
        echo ':root{';
        foreach ($theme_colors as $color => $value) {
            printf('--%1$s-color: %2$s;', $color,  $value['value']);
        }
        foreach ($theme_colors as $color => $value) {
            printf('--%1$s-color-rgb: %2$s;', $color,  ameron_hex_rgb($value['value']));
        }
        foreach ($link_color as $color => $value) {
            printf('--link-%1$s: %2$s;', $color, $value);
        }
        foreach ($body as $key => $value) {
            printf('--body-%1$s: %2$s;', $key, $value);
        }
        foreach ($heading as $key => $value) {
            printf('--heading-%1$s: %2$s;', $key, $value);
        }
        foreach ($heading_font_size as $key => $value) {
            printf('--heading-font-size-%1$s: %2$s;', $key, $value);
        }
        foreach ($logo as $key => $value) {
            printf('--logo-%1$s: %2$s;', $key, $value);
        }
        echo '}';
        return ob_get_clean();

    }
}
 