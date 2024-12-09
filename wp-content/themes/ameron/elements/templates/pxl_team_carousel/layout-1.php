<?php
use Elementor\Icons_Manager;
Icons_Manager::enqueue_shim();
$default_settings = [
    'content_list' => [],
];
$settings = array_merge($default_settings, $settings);
extract($settings);

$img_size = !empty( $img_size ) ? $img_size : '555x600'; 

$arrows = $widget->get_setting('arrows','false');  
$dots = $widget->get_setting('dots','false');

$opts = [
    'slide_direction'               => 'vertical',
    'slide_percolumn'               => '1', 
    'slide_mode'                    => 'slide', 
    'slides_to_show_xxl'            => $widget->get_setting('col_xxl', '3'), 
    'slides_to_show'                => $widget->get_setting('col_xl', '3'), 
    'slides_to_show_lg'             => $widget->get_setting('col_lg', '2'), 
    'slides_to_show_md'             => $widget->get_setting('col_md', '2'), 
    'slides_to_show_sm'             => $widget->get_setting('col_sm', '1'), 
    'slides_to_show_xs'             => $widget->get_setting('col_xs', '1'), 
    'slides_to_scroll'              => $widget->get_setting('slides_to_scroll', '1'), 
    'slides_gutter'                 => (int)$widget->get_setting('space_between', '30'), 
    'arrow'                         => $arrows,
    'dots'                          => $dots,
    'dots_style'                    => 'bullets',
    'autoplay'                      => $widget->get_setting('autoplay', 'false'),
    'pause_on_hover'                => $widget->get_setting('pause_on_hover', 'true'),
    'pause_on_interaction'          => 'true',
    'delay'                         => $widget->get_setting('autoplay_speed', '5000'),
    'loop'                          => $widget->get_setting('infinite','false'),
    'speed'                         => $widget->get_setting('speed', '500')
];
  

$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container vertical-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]);

?>
<?php if(isset($content_list) && !empty($content_list) && count($content_list)): ?>
    <div class="pxl-swiper-slider pxl-team pxl-team-carousel layout-<?php echo esc_attr($settings['layout'])?>">
        <div class="pxl-swiper-slider-wrap pxl-carousel-inner overflow-hidden">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper swiper-wrapper">
                    <?php foreach ($content_list as $key => $value):
                        $title    = isset($value['title']) ? $value['title'] : '';
                        $year = isset($value['year']) ? $value['year'] : '';
                        $subtitle = isset($value['subtitle']) ? $value['subtitle'] : '';
                        $description = isset($value['description']) ? $value['description'] : '';
                        $number = isset($value['number']) ? $value['number'] : '';
                        $image    = isset($value['image']) ? $value['image'] : [];
                        $link     = isset($value['link']) ? $value['link'] : '';
                        $thumbnail = '';
                        if(!empty($image)) {
                            $img = pxl_get_image_by_size( array(
                                'attach_id'  => $image['id'],
                                'thumb_size' => $img_size,
                                'class' => 'no-lazyload',
                            ));
                            $thumbnail = $img['thumbnail'];
                        }

                        $social = isset($value['social']) ? $value['social'] : '';
                        $link_key = $widget->get_repeater_setting_key( 'link', 'content_list', $key );
                        if ( ! empty( $link['url'] ) ) {
                            $widget->add_render_attribute( $link_key, 'href', $link['url'] );

                            if ( $link['is_external'] ) {
                                $widget->add_render_attribute( $link_key, 'target', '_blank' );
                            }

                            if ( $link['nofollow'] ) {
                                $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                            }
                            if ( ! empty( $link['custom_attributes'] ) ) {
                                // Custom URL attributes should come as a string of comma-delimited key|value pairs
                                $custom_attributes = Utils::parse_custom_attributes( $link['custom_attributes'] );
                                $widget->add_render_attribute( $link_key, $custom_attributes);
                            }
                        }
                        $link_attributes = $widget->get_render_attribute_string( $link_key );
                        ?>
                        <div class="pxl-swiper-slide swiper-slide">
                                    <div class="background" style="background-image: url(<?php echo esc_url($settings['image_background']['url']); ?>);"></div>
                                    <div class="item-inner">
                                        <div class="item-box">
                                            <span class="item-number"><?php echo pxl_print_html($number); ?></span>
                                        </div>
                                        <div class="item-content">
                                            <span class="item-year"><?php echo pxl_print_html($year); ?></span>
                                            <span class="item-title">
                                                <?php if ( ! empty( $link['url'] ) ): ?><a <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php endif; ?>
                                                    <?php echo pxl_print_html($title); ?>
                                                    <?php if ( ! empty( $link['url'] ) ): ?></a><?php endif; ?>
                                            </span>
                                            <span class="item-subtitle"><?php echo pxl_print_html($subtitle); ?></span>
                                            <?php if(!empty($description)) { ?>
                                                <span class="item-description"><?php echo pxl_print_html($description); ?></span>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <?php if(!empty($thumbnail)) { ?>
                                        <div class="item-image">
                                            <?php echo wp_kses_post($thumbnail); ?>
                                            <?php if(!empty($social)): ?>
                                                <div class="item-social">
                                                    <?php
                                                    $team_social = json_decode($social, true);
                                                    foreach ($team_social as $value): ?>
                                                        <a href="<?php echo esc_url($value['url']); ?>" target="_blank">
                                                            <i class="pxli <?php echo esc_attr($value['icon']); ?>"></i>
                                                        </a>
                                                    <?php endforeach;?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <?php } ?>
                        
                        </div>
                    <?php endforeach; ?>
                </div>    
            </div>
        </div>
        <?php if($arrows !== 'false'): ?>
            <div class="pxl-swiper-arrows nav-out-vertical">
                <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><span class="pxl-icon pxli-arrow-next"></span></div>
                <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><span class="pxl-icon pxli-arrow-prev"></span></div>
            </div>
        <?php endif; ?>
        <?php if($dots !== 'false'): ?>
        <div class="pxl-swiper-dots"></div>
        <?php endif; ?>
    </div>
<?php endif; ?>
