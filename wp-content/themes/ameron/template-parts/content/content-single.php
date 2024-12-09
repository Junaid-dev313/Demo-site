<?php
/**
 * Template part for displaying posts in loop
 *
 * @package Ameron
 */

if(has_post_thumbnail()){
    $content_inner_cls = 'single-post-inner has-post-thumbnail';
    $meta_class    = ''; 
} else {
    $content_inner_cls = 'single-post-inner  no-post-thumbnail';
    $meta_class = '';
}
 
if(class_exists('\Elementor\Plugin') && \Elementor\Plugin::$instance->documents->get( $id )->is_built_with_elementor()){
    $post_content_classes = 'single-elementor-content';
} else {
    $post_content_classes = '';
}

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('pxl-single-post'); ?>>
    <div class="<?php echo esc_attr($content_inner_cls);?>">
        <?php
        if (has_post_thumbnail()) {
            ameron()->blog->get_post_feature();
        }
        ?>
        <?php ameron()->blog->get_post_metas(); ?>
        <div class="post-content overflow-hidden">
            <div class="content-inner clearfix <?php echo esc_attr($post_content_classes);?>"><?php
                the_content();
            ?></div>
            <div class="<?php echo trim(implode(' ', ['navigation page-links clearfix empty-none'])); ?>"><?php 
                wp_link_pages(); 
            ?></div>
        </div>
        <?php
        $post_tag = ameron()->get_theme_opt( 'post_tag', true );
        $post_social_share = ameron()->get_theme_opt( 'post_social_share', false );
        $post_author_on = ameron()->get_theme_opt('post_author_on', true);
        $author_description = get_the_author_meta('description');
        $post_related_on = ameron()->get_theme_opt( 'post_related_on', false );
        $has_tag = get_the_tag_list() ? true : false;
        if ($post_tag == '1'){
            ?>
            <div class="<?php if ($has_tag) { echo 'post-tags-share d-flex'; } else { echo 'd-none no-tag'; } ?>">
            <div class="background-overlay"></div>
                <?php
                if ($post_tag == '1'){
                    ?><div class="post-tags-wrap col-sm-6"><?php ameron()->blog->get_post_tags(); ?></div><?php
                }
                ?>
            </div>
            <?php
        }
        ?>
        <?php if($post_author_on) : ?>
            <div class="post-author-post d-flex align-items-center">
                <div class="avatar-author-post col-auto empty-none">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 110 ); ?>
                </div>
                <div class="author_description d-flex">
                    <span class="about"><?php echo esc_html__('About', 'ameron'); ?>&nbsp;<?php the_author_posts_link(); ?></span>
                    <span class="description"><?php echo esc_attr($author_description); ?></span>
                    <?php ameron_get_user_social(); ?>
                </div>
                
            </div>
        <?php endif; ?>
    </div>
    <?php ameron()->blog->get_post_nav(); ?>
</article>