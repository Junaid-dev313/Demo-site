<?php
use Elementor\Embed;
$img_classes = [];

if (empty($settings['video_link']['url']) || $settings['video_link']['url'] === null) return;
 
$lightbox_id = isset($settings['_id']) ? $settings['_id'] : $settings['element_id'];

$video_atts = $embed_options = [];
$classes = ['pxl-video-lightbox'];
$classes[] = isset($settings['video_animation_duration']) ? 'animated-' . $settings['video_animation_duration'] : '';
if (!empty($settings['video_animation'])) {
    $classes[] = 'pxl-animate pxl-invisible';
    $video_atts[] = 'data-settings="' . esc_attr(json_encode([
            'animation' => $settings['video_animation'],
            'animation_delay' => $settings['video_animation_delay']
        ])).'"';

}
$embed_params = [
    'loop' => '0',
    'controls' => '1',
    'mute' => '0',
    'rel' => '0',
    'modestbranding' => '0'
];
 
$video_atts[] = 'class="' . implode(' ', $classes) . '"';
$video_atts[] = 'data-elementor-open-lightbox="yes"';
$video_atts[] = 'data-elementor-lightbox="' . esc_attr(json_encode([
    'type' => 'video',
    'videoType' => 'youtube',
    'url' => Embed::get_embed_url($settings['video_link']['url'], $embed_params, $embed_options),
    'modalOptions' => [
        'id' => 'pxl-lightbox-' . $lightbox_id,
        'entranceAnimation' => 'fadeInUp',
        'entranceAnimation_tablet' => '',
        'entranceAnimation_mobile' => '',
        'videoAspectRatio' => '169'
    ]
])).'"';

$thumbnail = '';
if( !empty($settings['video_image_overlay']['id'])){ 
    $img  = pxl_get_image_by_size( array(
        'attach_id'  => $settings['video_image_overlay']['id'],
        'thumb_size' => !empty($settings['img_size']) ? $settings['img_size'] : 'full',
    ) );

    $thumbnail = $img['thumbnail'];
}

$video_bt_style = !empty( $settings['video_bt_style']) ? $settings['video_bt_style'] : '';
$video_play_size = !empty( $settings['video_play_size']) ? $settings['video_play_size'] : '';
?>
<div class="pxl-video-player relative btn-style-<?php echo esc_attr($video_bt_style);?> size-<?php echo esc_attr($video_play_size);?>">
    <div class="relative">
        <?php if ( ! empty( $settings['video_image_overlay']['url'] ) ) { echo wp_kses_post($thumbnail); } ?>
        <div class="pxl-overlay"></div>
        <div class="btn-video-wrap">
            <div <?php echo implode(' ', $video_atts); ?>>
                <div class="pxl-video-btn text-center"><span class="pxl-icon pxli pxli-play"></span></div>
                <?php if(!empty($settings['video_text'])): ?>
                    <div class="pxl-video-box">
                        <div class="pxl-video-text">
                            <?php pxl_print_html($settings['video_text']);?>
                        </div>
                        <div class="pxl-video-heading">
                            <h3><?php pxl_print_html($settings['video_heading']);?></h3>
                        </div>    
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

</div>