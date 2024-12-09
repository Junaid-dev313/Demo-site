<?php
if (!class_exists('Ameron_Blog')) {
    class Ameron_Blog
    {
        public function get_post_feature(){
            if ( !has_post_thumbnail()) return;
            $post_feature_image_type = ameron()->get_theme_opt('post_feature_image_type','cropped');
 
            if($post_feature_image_type == 'full'){ 
                $thumbnail_size = 'full'; 
            }else{
                $thumbnail_size = 'size-post-single';
            }
            echo '<div class="post-image post-featured '.$post_feature_image_type.'">';  
                the_post_thumbnail($thumbnail_size); 
                ameron()->blog->get_post_share();
            echo '</div>';
        }

        public function get_archive_meta($post_id = 0) {
            $archive_category = ameron()->get_theme_opt( 'archive_category', true );
            $post_comments_on = ameron()->get_theme_opt('post_comments_on', true);
            $archive_author = ameron()->get_theme_opt( 'archive_author', true );
            $archive_date = ameron()->get_theme_opt( 'archive_date', true );

            global $post;
            if(!has_term( '' , 'product_cat', $post->ID)){
            if($archive_author || $archive_category || $post_comments_on || $archive_date)  : ?>
                <div class="post-metas">
                    <div class="meta-inner d-flex align-items-center">
                        <?php if($archive_author) : ?>
                            <span class="post-author col-auto d-flex"><span> <i class="pxli pxli-user1"></i> <?php echo esc_html__('By', 'ameron'); ?> <?php the_author_posts_link(); ?></span></span>
                        <?php endif; ?>
                        <?php if($archive_date) : ?>
                            <span class="post-date col-auto d-flex"><span> <i class="pxl-icon pxli-calendar-alt-regular"></i> <?php echo get_the_date(); ?></span></span>
                        <?php endif; ?>
                        <?php if($archive_category && has_category('', $post_id)) : ?>
                            <span class="post-category col-auto d-flex"><span> <i class="pxl-icon pxli-folder-open"></i> <?php the_terms( $post_id, 'category', '', ', ', '' ); ?></span></span>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; 
            }

        }

        public function get_excerpt( $length = 55 ){
            $pxl_the_excerpt = get_the_excerpt();
            if(!empty($pxl_the_excerpt)) {
                echo esc_html($pxl_the_excerpt);
            } else {
                echo wp_kses_post($this->get_excerpt_more( $length ));
            }
        }

        public function get_excerpt_more( $length = 55, $post = null ) {
            $post = get_post( $post );

            if ( empty( $post ) || 0 >= $length ) {
                return '';
            }

            if ( post_password_required( $post ) ) {
                return esc_html__( 'Post password required.', 'ameron' );
            }

            $content = apply_filters( 'the_content', strip_shortcodes( $post->post_content ) );
            $content = str_replace( ']]>', ']]&gt;', $content );

            $excerpt_more = apply_filters( 'ameron_excerpt_more', '&hellip;' );
            $excerpt      = wp_trim_words( $content, $length, $excerpt_more );

            return $excerpt;
        }

        public function get_post_metas(){
            $post_author_on = ameron()->get_theme_opt('post_author_on', true);
            $post_date_on = ameron()->get_theme_opt('post_date_on', true);
            $post_comments_on = ameron()->get_theme_opt('post_comments_on', true);
            $post_categories_on = ameron()->get_theme_opt('post_categories_on', true);
            $titles = ameron()->pagetitle->get_title();
            if ($post_author_on || $post_date_on || $post_categories_on || $post_comments_on) : ?>
                <div class="box-metas">
                    <div class="post-metas">
                        <div class="background-overlay"></div>
                        <div class="meta-inner d-flex align-items-center">
                            <?php if($post_date_on) : ?>
                                <div class="post-date d-flex align-items-center">
                                    <div class="day-month">
                                        <span class="date-month"><?php echo get_the_date('M'); ?></span>
                                        <span class="date-day"><?php echo get_the_date('d'); ?></span>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if($post_author_on) : ?>
                                <span class="post-author d-flex align-items-center">
                                    <span><?php echo esc_html__('By', 'ameron'); ?>&nbsp;<?php the_author_posts_link(); ?></span>
                                </span>
                            <?php endif; ?>
                            <div class="pxl-page-title col-12">
                                    <span class="main-title"><?php echo esc_attr(get_the_title()) ?></span>
                                </div>
                            <div class = "divide-meta">
                                <div class = "divide-meta-bold">
                                </div>
                            </div>  
                            <?php if($post_categories_on && has_category()) : ?>
                                <span class="post-category d-inline-flex align-items-center">
                                    <span><?php the_terms(get_the_ID(), 'category', '', ', '); ?></span>
                                </span>
                            <?php endif; ?>
                            <?php if($post_comments_on) : ?>
                                <span class="post-comments d-inline-flex align-items-center">
                                    <i class="zmdi zmdi-comment-text"></i>
                                    <a href="<?php comments_link(); ?>">
                                        <span><?php comments_number(esc_html__('No Comments', 'ameron'), esc_html__(' 1 Comment', 'ameron'), esc_html__(' % Comments', 'ameron')); ?></span>
                                    </a>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif;
        }

        public function get_post_metas_related(){
            $post_author_on = ameron()->get_theme_opt('post_author_on', true);
            $post_date_on = ameron()->get_theme_opt('post_date_on', true);
            $titles = ameron()->pagetitle->get_title();
            if ($post_author_on || $post_date_on) : ?>
            <div class="related-meta">
                <div class="content">
                    <div class="item-post-meta">
                        <div class="background-overlay"></div>
                        <div class="meta-inner d-flex">
                            <?php if($post_date_on) : ?>
                                <span class="post-date meta-item col-auto"><span class="pxl-icon pxli-calendar-alt-regular"></span>
                                    <?php echo get_the_date(); ?>
                                </span>
                            <?php endif; ?>
                            <h3 class="item-title"><a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_attr(get_the_title()); ?></a></h3>
                            <div class = "divide-meta">
                                <div class = "divide-meta-bold"></div>
                            </div>
                            <?php if($post_author_on) : ?>
                                <span class="post-author meta-item"><?php echo esc_html__('By', 'ameron'); ?>&nbsp;<?php the_author_posts_link(); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif;
        }

        public function ameron_set_post_views( $postID ) {
            $countKey = 'post_views_count';
            $count    = get_post_meta( $postID, $countKey, true );
            if ( $count == '' ) {
                $count = 0;
                delete_post_meta( $postID, $countKey );
                add_post_meta( $postID, $countKey, '0' );
            } else {
                $count ++;
                update_post_meta( $postID, $countKey, $count );
            }
        }

        public function get_post_tags(){
            $post_tag = ameron()->get_theme_opt( 'post_tag', true );
            if($post_tag != '1') return;
            $tags_list = get_the_tag_list( '<span class="label">'.esc_attr__('TAGS', 'ameron'). '</span>', ' ' );
            if ( $tags_list ){
                echo '<div class="post-tags d-flex">';
                printf('%2$s', '', $tags_list);
                echo '</div>';
            }
        }

        public function get_post_share($post_id = 0) {
            $post_social_share = ameron()->get_theme_opt( 'post_social_share', false );
            $share_icons = ameron()->get_theme_opt( 'post_social_share_icon', [] );
            if($post_social_share != '1') return;
            $post = get_post($post_id);
            ?>
            <div class="post-shares d-flex">
                <div class="social-share">
                    <div class="social-content d-flex flex-column">
                        <?php if(in_array('facebook', $share_icons)): ?>
                        <div class="social-item">
                            <a class="pxl-icon icon-facebook pxli-facebook-f" title="<?php echo esc_attr__('Facebook', 'ameron'); ?>" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_the_permalink($post_id)); ?>"></a>
                        </div>
                        <?php endif; ?>
                        <?php if(in_array('twitter', $share_icons)): ?>
                        <div class="social-item">
                            <a class="pxl-icon icon-twitter pxli-twitter" title="<?php echo esc_attr__('Twitter', 'ameron'); ?>" target="_blank" href="https://twitter.com/intent/tweet?original_referer=<?php echo urldecode(home_url('/')); ?>&url=<?php echo urlencode(get_the_permalink($post_id)); ?>%20"></a>
                        </div>
                        <?php endif; ?>
                        <?php if(in_array('linkedin', $share_icons)): ?>
                        <div class="social-item">
                            <a class="pxl-icon icon-linkedin pxli-linkedin-in" title="<?php echo esc_attr__('Linkedin', 'ameron'); ?>" target="_blank" href="https://www.linkedin.com/cws/share?url=<?php echo urlencode(get_the_permalink($post_id));?>"></a>
                        </div>
                        <?php endif; ?>
                        <?php if(in_array('pinterest', $share_icons)): ?>
                            <div class="social-item">
                                <a class="pxl-icon icon-pinterest pxli-pinterest-p" title="<?php echo esc_attr__('Pinterest', 'ameron'); ?>" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_the_post_thumbnail_url($post_id, 'full')); ?>&media=&description=<?php echo urlencode(the_title_attribute(array('echo' => false, 'post' => $post))); ?>"></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php
        }

        public function get_post_nav() {
            $post_navigation = ameron()->get_theme_opt( 'post_navigation', false );
            if($post_navigation != '1') return;
            global $post;

            $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
            $next     = get_adjacent_post( false, '', false );

            if ( ! $next && ! $previous )
                return;
            ?>
            <?php
            $next_post = get_next_post();
            $previous_post = get_previous_post();
            if(empty($previous_post) && empty($next_post)) return;

            ?>
            <div class="single-next-prev-nav row gx-0 justify-content-between align-items-center">
                <?php if(!empty($previous_post)): 
                    $prev_img_id = get_post_thumbnail_id($previous_post->ID);
                    $prev_img_url = wp_get_attachment_image_src($prev_img_id, 'thumbnail');

                    $img = pxl_get_image_by_size( array(
                        'attach_id'  => $prev_img_id,
                        'thumb_size' => '60x52',
                        'class' => 'no-lazyload',
                    ));
                    $thumbnail = $img['thumbnail'];
                    ?>
                    <div class="nav-next-prev prev col relative text-start">
                        <div class="nav-inner">
                            <?php previous_post_link('%link',''); ?>
                            <div class="nav-label-wrap d-flex align-items-center">
                                <span class="nav-icon pxli-angle-double-left"></span>
                                <span class="nav-label"><?php echo esc_html__('Previous Post', 'ameron'); ?></span>
                            </div>
                            <div class="nav-title-wrap d-flex align-items-center d-none d-sm-flex">
                                <div class="col-auto nav-img"><?php echo wp_kses_post( $thumbnail ) ?></div>
                                <div class="col"><div class="nav-title"><?php echo get_the_title($previous_post->ID); ?></div></div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if(!empty($next_post)) : 
                    $next_img_id = get_post_thumbnail_id($next_post->ID);
                    $next_img_url = wp_get_attachment_image_src($next_img_id, 'thumbnail');

                    $img = pxl_get_image_by_size( array(
                        'attach_id'  => $next_img_id,
                        'thumb_size' => '60x52',
                        'class' => 'no-lazyload',
                    ));
                    $thumbnail = $img['thumbnail'];
                    ?>
                    <div class="nav-next-prev next col relative text-end">
                        <div class="nav-inner">
                            <?php next_post_link('%link',''); ?>
                            <div class="nav-label-wrap d-flex align-items-center justify-content-end">
                                <span class="nav-label"><?php echo esc_html__('Newer Post', 'ameron'); ?></span>
                                <span class="nav-icon pxli-angle-double-right"></span>
                            </div>
                            <div class="nav-title-wrap d-flex align-items-center d-none d-sm-flex">
                                <div class="col"><div class="nav-title"><?php echo get_the_title($next_post->ID); ?></div></div>
                                <div class="col-auto nav-img"><?php echo wp_kses_post( $thumbnail ) ?></div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div> 
            <?php  
        }

        public function get_related_post(){
            $post_related_on = ameron()->get_theme_opt( 'post_related_on', false );
            $description_related = ameron()->get_theme_opt('description_related', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore,');
            if($post_related_on) {
                global $post;
                $current_id = $post->ID;
                $posttags = get_the_category($post->ID);
                if (empty($posttags)) return;

                $tags = array();

                foreach ($posttags as $tag) {

                    $tags[] = $tag->term_id;
                }
                $post_number = '6';
                $query_similar = new WP_Query(array('posts_per_page' => $post_number, 'post_type' => 'post', 'post_status' => 'publish', 'category__in' => $tags));
                if (count($query_similar->posts) > 1) {
                    wp_enqueue_script( 'swiper' );
                     
                    $opts = [
                        'slide_direction'               => 'horizontal',
                        'slide_percolumn'               => '1', 
                        'slide_mode'                    => 'slide', 
                        'slides_to_show'                => 3, 
                        'slides_to_show_lg'             => 2, 
                        'slides_to_show_md'             => 2, 
                        'slides_to_show_sm'             => 2, 
                        'slides_to_show_xs'             => 1, 
                        'slides_to_scroll'              => 1, 
                        'slides_gutter'                 => 30, 
                        'arrow'                         => false,
                        'dots'                          => true,
                        'dots_style'                    => 'bullets'
                    ];
                    $data_settings = wp_json_encode($opts);
                    $dir           = is_rtl() ? 'rtl' : 'ltr';
                    ?>
                    
                    <div class="pxl-related-post">
                        <div class="widget-container">
                            <div class="widget-title">
                                <span class="title-before"><?php echo esc_html__('Related ', 'ameron'); ?></span>
                                <span class="title-after"><?php echo esc_html__('Posts', 'ameron'); ?></span>
                            </div>
                            <?php if(!empty($description_related)): ?>
                                <div class="description">
                                    <?php echo esc_html( $description_related);  ?>
                                </div>
                            <?php endif ?>
                        </div>
                        <div class="pxl-swiper-container overflow-hidden" data-settings="<?php echo esc_attr($data_settings) ?>" data-rtl="<?php echo esc_attr($dir) ?>">
                            <div class="pxl-related-post-inner pxl-swiper-wrapper swiper-wrapper">
                            <?php foreach ($query_similar->posts as $post):
                                $thumbnail_url = '';
                                if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)) :
                                    $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'ameron-blog-small', false);
                                endif;
                                if ($post->ID !== $current_id) : ?>
                                    <div class="pxl-swiper-slide swiper-slide grid-item">
                                    <?php $has_thumbnail = has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false) ? true : false; ?>
                                        <div class="grid-item-inner <?php if ($has_thumbnail) { echo ''; } else { echo ' no-thumbnail'; } ?>">
                                            <?php if (has_post_thumbnail()) { ?>
                                                <div class="item-featured">
                                                    <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($thumbnail_url[0]); ?>" alt="_blank" /></a>
                                                </div>
                                            <?php } ?>
                                            <?php ameron()->blog->get_post_metas_related(); ?> 
                                        </div>
                                    </div>
                                <?php endif;
                            endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php }
            }
            wp_reset_postdata();
        }
    }
 
}