<?php
$default_settings = [
    'list' => '',
    'selected_icon' => '',
    'style' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
  
$animate_cls = '';
$data_animations = [];
if ( !empty( $item_animation ) ) {
    $animate_cls = 'pxl-animate pxl-invisible animated-'.$settings['item_animation_duration'];
    $item_animation_delay = !empty( $settings['item_animation_delay'] ) ? $settings['item_animation_delay'] : 200;
    $data_animations = ['animation' => $item_animation, 'animation_delay' => $item_animation_delay];
}

?>
<?php if(isset($list) && !empty($list) && count($list)): ?>
    <div class="pxl-list-style <?php echo esc_attr($style); ?>">
        <?php
        	foreach ($list as $key => $pxl_list): 
                $increase = $key + 1; 
                $data_settings = '';
                if ( !empty( $data_animations ) ) {
                    $data_animations['animation_delay'] = ((float)$item_animation_delay * $increase);
                    $data_settings = 'data-settings="'.esc_attr(json_encode($data_animations)).'"';
                }
            ?>
            <div class="list-item <?php echo esc_attr($animate_cls); ?>" <?php pxl_print_html($data_settings); ?>>
                <?php if ( !empty( $selected_icon ) ) : ?> 
                    <div class="list-icon"><?php \Elementor\Icons_Manager::render_icon( $selected_icon, [ 'aria-hidden' => 'true' ] );?></div>
                <?php endif; ?>
            	<div class="list-content">
	            	<?php pxl_print_html($pxl_list['content'])?>
	            </div>
           </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
