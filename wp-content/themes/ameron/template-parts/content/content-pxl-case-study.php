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
<article id="post-<?php the_ID(); ?>" <?php post_class('pxl-single-posttype pxl-case-study'); ?>>
    <div class="pxl-entry-content clearfix">
            <div class="content-inner clearfix <?php echo esc_attr($post_content_classes);?>"><?php
                $post_feature_image_type = ameron()->get_theme_opt('post_feature_image_type','cropped');
                if (has_post_thumbnail()) {
                echo '<div class="post-image post-featured '.$post_feature_image_type.'">';  
                        ameron()->blog->get_post_feature();
                 echo '</div>';
                }
                $title_case = ameron()->get_page_opt( 'title_on', false );
                $tag_case = ameron()->get_page_opt( 'tag_on', false );
                $category_case = ameron()->get_page_opt( 'categoty_on', false );
                $comments_case = ameron()->get_theme_opt('post_comments_on', true);
                $has_thumbnail = has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false) ? true : false;
                if ($title_case || $tag_case || $category_case) {
                    ?>
                    <div class="box-metas-case  <?php if ($has_thumbnail) { echo ''; } else {  echo ' no-thumbnail'; } ?>">
                        <div class="meta-inner d-flex align-items-center">
                                <div class="background-overlay"></div>
                            <?php if($title_case) : ?>
                                <h2 class="post-title col-auto d-flex">
                                <?php the_title(); ?>
                                </h2>
                                <div class = "divide-meta">
                                    <div class = "divide-meta-bold">
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if($tag_case) : ?>
                                <div class="case-tags col-auto d-flex">
                                <span><?php the_terms(get_the_ID(), 'pxl-case-study-tag', '', ', '); ?></span>
                                </div>
                            <?php endif; ?>
                            <?php if($category_case) : ?>
                                <div class="post-category d-inline-flex align-items-center">
                                <span><?php the_terms( $post->ID, 'pxl-case-study-category', '', ', ' ); ?></span>
                                </div>
                            <?php endif; ?>
                            <?php if($comments_case) : ?>
                                <span class="post-comments d-inline-flex align-items-center">
                                    <i class="zmdi zmdi-comment-text"></i>
                                    <a href="<?php comments_link(); ?>">
                                        <span><?php comments_number(esc_html__('No Comments', 'ameron'), esc_html__(' 1 Comment', 'ameron'), esc_html__(' % Comments', 'ameron')); ?></span>
                                    </a>
                                </span>
                            <?php endif; ?>
                            
                        </div>
                    </div>
                    <?php
                }
                the_content();
            ?></div>
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