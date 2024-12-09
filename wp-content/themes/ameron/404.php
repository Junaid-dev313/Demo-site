<?php
/**
 * @package Ameron
 */
get_header(); ?>
<?php
    $img_404_bg         = ameron()->get_theme_opt('img_404_background', []);
    $wrap_class = "";
    if (!empty($img_404_bg["background-image"])){
        $wrap_class = "has-background";
    }
    $img_404_1          = ameron()->get_theme_opt('img_404_1', []);
    $heading_404_page   = ameron()->get_theme_opt('heading_404_page', '');
    $desc_404_page      = ameron()->get_theme_opt('desc_404_page', '');
    $btn_text_404_page  = ameron()->get_theme_opt('btn_text_404_page', esc_html__('back to home', 'ameron'));
?>
<div class="page-404-wrap pxl-404-page relative">
    <div class="container">
        <main id="pxl-content-main" class="d-flex justify-content-center text-center <?php echo esc_attr($wrap_class);?>">
            <div class="pxl-error-inner">
                <div class="number-wrap">
                    <span>404</span>
                </div>
                <?php if(!empty($img_404_1['url'])): ?>
                    <div class="image-wrap">
                        <img src="<?php echo esc_url($img_404_1['url']) ?>" class="img-layer img-1 shape-animate1"/>
                    </div>
                <?php endif; ?>
                <?php if(!empty($heading_404_page)): ?>
                    <h2 class="pxl-error-title">
                        <?php  echo esc_html( $heading_404_page ) ?>
                    </h2>
                <?php else:  ?>
                    <h2 class="pxl-error-title df">
                        <?php echo esc_html__( 'oops page not found', 'ameron' );?>
                    </h2>
                <?php endif; ?>
                <?php if(!empty($desc_404_page)): ?>
                    <div class="desc">
                        <?php echo esc_html( $desc_404_page);  ?>
                    </div>
                <?php else: ?>
                    <div class="desc">
                        <span><?php echo esc_html__( '', 'ameron' );?></span>
                    </div>
                <?php endif; ?>
                <div class="search-content">
                    <?php get_search_form(); ?>
                </div>
                <div class="button-wrapper">
                    <a class="btn_404" href="<?php echo esc_url(home_url('/')); ?>">
                    <i aria-hidden="true" class="pxli pxli-home-3"></i>
                        <span><?php echo esc_html($btn_text_404_page); ?></span>
                    </a>
                </div>
            </div>
        </main>    
    </div>
         
    <?php if(!empty($img_404_foot['url'])): ?> <img src="<?php echo esc_url($img_404_foot['url']) ?>" class="img-404-foot"/> <?php endif; ?>
     
</div>
 
<?php get_footer();
