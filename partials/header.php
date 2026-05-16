<?php
$logo_id = get_theme_mod('custom_logo');
?>

<header class="l-header js-headroom">
    <div class="l-header__container l-container l-container--full">

        <?php if ($logo_id) : ?>
            <a class="l-header__branding" href="<?php echo esc_url(get_site_url()); ?>" title="Przejdź do strony głównej">
                <?php echo wp_get_attachment_image($logo_id, 'full', false, ['loading' => 'eager']); ?>
            </a>
        <?php else : ?>
            <a class="l-header__branding" href="<?php echo esc_url(get_site_url()); ?>">
                <?php bloginfo('name'); ?>
            </a>
        <?php endif; ?>

        <div class="l-header__menu">
            <?php wp_nav_menu(['theme_location' => 'header', 'container' => false]); ?>
        </div>

        <div class="l-header__actions">
            <?php if (class_exists('WooCommerce')) : ?>
                <div class="l-header__box">
                    <div class="l-header__box__link">
                        <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="c-cart-icon" title="Kosz">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="9" cy="21" r="1"></circle>
                                <circle cx="20" cy="21" r="1"></circle>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                            </svg>
                            <span class="c-cart-icon__count">
                                <?php echo WC()->cart ? WC()->cart->get_cart_contents_count() : 0; ?>
                            </span>
                        </a>
                    </div>
                </div>
            <?php endif; ?>

            <?php get_template_part('partials/menu', 'mobile'); ?>
        </div>

    </div>
</header>