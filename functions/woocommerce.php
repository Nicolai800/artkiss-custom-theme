<?php

/**
 * Add WooCommerce support
 */
function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

/**
 * Update cart count via AJAX
 */
function artkiss_woocommerce_cart_count_fragments( $fragments ) {
    ob_start();
    ?>
    <span class="c-cart-icon__count"><?php echo WC()->cart ? WC()->cart->get_cart_contents_count() : 0; ?></span>
    <?php
    $fragments['span.c-cart-icon__count'] = ob_get_clean();
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'artkiss_woocommerce_cart_count_fragments' );