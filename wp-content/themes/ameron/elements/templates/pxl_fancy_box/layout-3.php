<?php
use Elementor\Utils;
if(!empty($settings['link']['url'])){
    $widget->add_render_attribute( 'link', 'class', 'btn-more' );
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
$thumbnail = '';
if( ! empty( $settings['selected_img']['id'] ) ){
    $img  = pxl_get_image_by_size( array(
        'attach_id'  => $settings['selected_img']['id'],
        'thumb_size' => 'full',
    ) );
    $thumbnail = $img['thumbnail'];
}
?>
<div class="pxl-fancy-box layout-3">
    <div class="box-inner">
        <div class="box-left d-flex">
            <div class="box-icon d-flex">
                <?php if(! empty( $settings['selected_icon']['value'] )): ?>
                    <?php \Elementor\Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true', 'class' => 'pxl-fancy-icon pxl-icon' ], 'i' );?>
                <?php endif; ?>
            </div>
        </div>
        <div class="box-right">
            <div class="box-title">
                <?php pxl_print_html( nl2br($widget->get_setting('title'))); ?>
            </div>
        </div>
    </div>  
</div>

