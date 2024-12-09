<?php
$bq_content = !empty($settings['bq_content']) ? $settings['bq_content'] : '';
$bq_client_name = !empty($settings['bq_client_name']) ? $settings['bq_client_name'] : '';
?>

<div class="pxl-block-quote-wrap d-flex justify-content-center">
    <?php if(!empty($bq_content) && !empty($bq_client_name)): ?>
        <div class="wp-block-quote pxl-block-quote">
        <div class="background" style="background-image: url(<?php echo esc_url($settings['image_background']['url']); ?>);"></div>
            <div class="container">
                <div class="description">
                    <span><?php pxl_print_html($bq_content); ?></span>
                </div>
                <div class="d-flex content">
                    <div class="clearfix"><?php echo esc_html__('Creative Agency ', 'ameron'); ?></div>
                    <cite class="author">&nbsp;<?php pxl_print_html($bq_client_name); ?></cite>
                </div>
            </div>
            
            
        </div>        
    <?php else: ?>
    <?php endif; ?>
</div>
