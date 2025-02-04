<?php 
add_filter( 'woocommerce_enqueue_styles', 'ameron_remove_wc_styles' );
function ameron_remove_wc_styles( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
	unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
	unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
	return $enqueue_styles;
}

/* Product Search form */
add_filter( 'get_product_search_form', 'ameron_product_search_form', 10, 1 );
function ameron_product_search_form($form){
    ob_start();
    ?>
    <form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <label class="screen-reader-text" for="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>"><?php esc_html_e( 'Search for:', 'ameron' ); ?></label>
        <input type="search" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" class="search-field" placeholder="<?php echo esc_attr__( 'Search Product&hellip;', 'ameron' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
        <button type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'ameron' ); ?>"><?php echo esc_html_x( 'Search', 'submit button', 'ameron' ); ?></button>
        <input type="hidden" name="post_type" value="product" />
    </form>
    <?php 
    $form = ob_get_clean();
    return $form;
}    