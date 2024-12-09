<?php
/**
 * @package Ameron
 */
?>
<?php
    $id = get_the_ID();
    if(class_exists('\Elementor\Plugin') && \Elementor\Plugin::$instance->documents->get( $id )->is_built_with_elementor()){
        $post_content_classes = 'single-elementor-content';
    } else {
        $post_content_classes = '';
    }
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('pxl-single-posttype pxl-practice-area'); ?>>
    <div class="pxl-entry-content clearfix">
            <div class="content-inner clearfix container <?php echo esc_attr($post_content_classes);?>">
            <?php $multi_text = ameron()->get_page_opt( 'multi-text', false );?>
            <?php $has_thumbnail = has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false) ? true : false; ?>
                <div class="grid-inner row <?php if ($has_thumbnail) { echo ''; } else { echo ' no-thumbnail'; } ?>">
                        <?php
                        $post_feature_image_type = ameron()->get_theme_opt('post_feature_image_type','cropped');
                        if (has_post_thumbnail())  {
                        echo '<div class="post-image post-featured col-xl-8 col-lg-12'.$post_feature_image_type.'">';  
                            ameron()->blog->get_post_feature();
                        echo '</div>';
                        }
                        ?>
                        <?php
                        $title_case = ameron()->get_page_opt( 'title_on', true );
                        $category_case = ameron()->get_page_opt( 'categoty_on', true );
                        $area_icon = get_post_meta($post->ID, 'area_icon', true);
                        
                        if ($title_case || $category_case) {
                            ?>
                            <div class="box-metas-case col-xl-6 col-lg-12 col-md-12">
                                <div class="meta-inner d-flex align-items-center">
                                    <div class="background-overlay"></div>
                                    <div class="item-icon"><i class="<?php echo esc_attr($area_icon); ?>"></i>
                                    </div>
                                    <div class="content-box">
                                        <?php if($category_case) : ?>
                                            <div class="post-category d-inline-flex align-items-center">
                                                <span><?php the_terms( $post->ID, 'pxl-practice-area-category', '', ', ' ); ?></span>
                                            </div>
                                        <?php endif; ?>      
                                        <?php if($title_case) : ?>
                                            <h2 class="post-title col-auto d-flex">
                                            <?php the_title(); ?>
                                            </h2>
                                        </div>
                                        <?php endif; ?> 
                                    </div>
                                </div>
                                <div class="post-multi-text col-xl-4 col-lg-12 col-md-12">
                                    <?php foreach ($multi_text as $text): ?>
                                    <div class="box-multi">
                                        <?php if($text != ''): ?>
                                        <i aria-hidden="true" class="flaticon flaticon-check"></i>
                                        <?php endif; ?> 
                                        <span><?php echo pxl_print_html($text); ?></span>
                                        <br />
                                    </div>
                                    <?php endforeach; ?> 
                                </div> 
                            </div>
                            <?php
                        }
                        ?>
                        </div>
                </div>
            <?php the_content(); ?>
            <?php
                wp_link_pages( array(
                    'before'      => '<div class="page-links">',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                ) );
            ?>
    </div>
</article> 