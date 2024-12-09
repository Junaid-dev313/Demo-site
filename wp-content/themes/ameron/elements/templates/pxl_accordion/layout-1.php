<?php
$default_settings = [
    'active_section' => '',
    'ac_items' => '',
    'style' => 'style1',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$html_id = pxl_get_element_id($settings);
$active_section = intval($active_section);
$accordions = $widget->get_settings('ac_items');
if(!empty($accordions)) : ?>
<div id="<?php echo esc_attr($html_id); ?>" class="pxl-accordion <?php echo esc_attr($style); ?>">
    <?php foreach ($accordions as $key => $value):
        $content_key = $widget->get_repeater_setting_key( 'ac_content', 'ac_items', $key );
        $is_active = ($key + 1) == $active_section;
        $_id = isset($value['_id']) ? $value['_id'] : '';
        $ac_title_number = isset($value['ac_title_number']) ? $value['ac_title_number'] : '';
        $ac_title = isset($value['ac_title']) ? $value['ac_title'] : '';
        $ac_title_des = isset($value['ac_title_des']) ? $value['ac_title_des'] : '';
        $ac_title_year = isset($value['ac_title_year']) ? $value['ac_title_year'] : '';
        $ac_title_scroll = isset($value['ac_title_scroll']) ? $value['ac_title_scroll'] : '';
        $ac_content_type = isset($value['ac_content_type']) ? $value['ac_content_type'] : 'text_editor';
        $ac_content = '';
        if($value['ac_content_type'] == 'template'){
            if(!empty($value['ac_content_template'])){
                $content = Elementor\Plugin::$instance->frontend->get_builder_content_for_display( (int)$value['ac_content_template']);
                $ac_content = $content;
            }
        }elseif($value['ac_content_type'] == 'text_editor'){
            $ac_content = $value['ac_content'];
        }
        $title_number = $widget->get_repeater_setting_key( 'ac_title_number', 'ac_items', $key );
        $title_key = $widget->get_repeater_setting_key( 'ac_title', 'ac_items', $key );
        $title_des = $widget->get_repeater_setting_key( 'ac_title_des', 'ac_items', $key );
        $title_year = $widget->get_repeater_setting_key( 'ac_title_year', 'ac_items', $key );
        $title_scroll = $widget->get_repeater_setting_key( 'ac_title_scroll', 'ac_items', $key );
        $widget->add_render_attribute( $title_number, [
            'class' => [ 'pxl-ac-title-number' ],
        ] );
        $widget->add_render_attribute( $title_key, [
            'class' => [ 'pxl-ac-title-text' ],
        ] );
        $widget->add_render_attribute( $title_des, [
            'class' => [ 'pxl-ac-title-des' ],
        ] );
        $widget->add_render_attribute( $title_year, [
            'class' => [ 'pxl-ac-title-year' ],
        ] );
        $widget->add_render_attribute( $title_scroll, [
            'class' => [ 'pxl-ac-title-scroll' ],
        ] );
        $widget->add_inline_editing_attributes( $title_number, 'basic' );
        $widget->add_inline_editing_attributes( $title_key, 'basic' );
        $widget->add_inline_editing_attributes( $title_des, 'basic' );
        $widget->add_inline_editing_attributes( $title_year, 'basic' );
        $widget->add_inline_editing_attributes( $title_scroll, 'basic' );
        $widget->add_render_attribute( $content_key, [
            'id' => $_id.$html_id,
            'class' => [ 'pxl-ac-content' ],
        ] );
        if($is_active){
            $widget->add_render_attribute( $content_key, 'style', 'display:block;' );
        }
        $widget->add_inline_editing_attributes( $content_key, 'basic' ); ?>
        <div class="pxl-ac-item <?php echo esc_attr($is_active?'active':''); ?>">
        <?php if($style == 'style1') { ?>
            <div class="background" style="background-image: url(<?php echo esc_url($settings['image_background']['url']); ?>);"></div>
            <?php } ?>
            <div class="box-scroll">
            </div>
            <div class="pxl-ac-title <?php echo esc_attr($is_active?'active':''); ?>" data-target="<?php echo esc_attr('#' . $_id.$html_id); ?>">
                <div class="box-number">
                    <span <?php pxl_print_html($widget->get_render_attribute_string( $title_number )); ?>><?php pxl_print_html($ac_title_number); ?></span>
                </div>
                <div class="box-content">
                    <span <?php pxl_print_html($widget->get_render_attribute_string( $title_year )); ?>><?php pxl_print_html($ac_title_year); ?></span>
                    <span <?php pxl_print_html($widget->get_render_attribute_string( $title_key )); ?>><?php pxl_print_html($ac_title); ?></span>
                    <span <?php pxl_print_html($widget->get_render_attribute_string( $title_des )); ?>><?php pxl_print_html($ac_title_des); ?></span>
                    <div class="box-icon"></div>
                </div>
            </div>
            <div <?php pxl_print_html($widget->get_render_attribute_string( $content_key )); ?>>
                <div class="pxl-ac-content-inner">
                    <?php pxl_print_html($ac_content); ?>
                </div>
            </div>
        </div>
        <?php
        endforeach;
        ?>
        </div>
<?php endif; ?>