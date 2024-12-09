<?php 
$default_settings = [
    'portfolio_infos' => []
];
$settings = array_merge($default_settings, $settings);
extract($settings);

use Elementor\Utils;
if(!empty($settings['link']['url'])){
    $widget->add_render_attribute( 'link', 'href', $settings['link']['url'] );

    if ( $settings['link']['is_external'] ) {
        $widget->add_render_attribute( 'link', 'target', '_blank' );
    }

    if ( $settings['link']['nofollow'] ) {
        $widget->add_render_attribute( 'link', 'rel', 'nofollow' );
    }
    if ( ! empty( $settings['link']['custom_attributes'] ) ) {
        // Custom URL attributes should come as a string of comma-delimited key|value pairs
        $custom_attributes = Utils::parse_custom_attributes( $settings['link']['custom_attributes'] );
        $widget->add_render_attribute( 'link', $custom_attributes);
    }

}
$link_attributes = $widget->get_render_attribute_string( 'link' );


?>
<?php if(isset($portfolio_infos) && !empty($portfolio_infos) && count($portfolio_infos)): ?>
	<div class="pxl-portfolio-info">
		<div class="pi-content">
			<ul class="list-style-none">
			<?php foreach ($portfolio_infos as $key => $value): ?>
				<li><span class="pi-lbl"><?php echo esc_html($value['item_label']) ?></span><span class="pi-value"><?php echo esc_html($value['item_value']) ?></span></li>
			<?php endforeach; ?>
			</ul>
			<?php if(!empty($widget->get_setting('button_text'))): ?>
                <div class="button-text pxl-button-wrapper">
                    <a class="btn btn-primary" <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                        <span><?php echo esc_html($settings['button_text']); ?></span>
                    </a>
                </div>
            <?php endif; ?>
		</div>
	</div>
<?php endif; ?>
