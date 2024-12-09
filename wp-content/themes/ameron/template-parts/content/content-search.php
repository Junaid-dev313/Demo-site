<?php
/**
 * @package Ameron
 */
$archive_readmore = ameron()->get_theme_opt('archive_readmore', '0');
$archive_readmore_text = ameron()->get_theme_opt( 'archive_readmore_text', esc_html__('Read more', 'ameron') );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('pxl-archive-post search-results-post'); ?>>
     
    <div class="post-content">
        <?php if(!is_singular('product')) {
            ameron()->blog->get_archive_meta();
        }
        ?>
        <h3 class="post-title">
            <a href="<?php echo esc_url( get_permalink()); ?>" title="<?php the_title_attribute(); ?>">
                <?php if(is_sticky()): ?>
                    <i class="pxli-star"></i>
                <?php endif; ?>
                <?php the_title(); ?>
            </a>
        </h3>
        <div class="post-excerpt">
            <?php
                ameron()->blog->get_excerpt();
                wp_link_pages( array(
                    'before'      => '<div class="page-links">',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                ) );
            ?>
        </div>
        <?php if( $archive_readmore == '1'): ?>
            <div class="post-readmore">
                <a class="btn" href="<?php echo esc_url( get_permalink()); ?>">
                    <span><?php pxl_print_html($archive_readmore_text); ?></span>
                </a>
            </div>
        <?php endif; ?>
         
    </div>
</article><!-- #post -->