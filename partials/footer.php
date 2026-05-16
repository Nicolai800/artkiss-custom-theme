<footer class="l-footer">
    <div class="l-footer__container l-container">

        <div class="l-footer__top">

            <?php // Лого
            $logo_id = get_theme_mod('custom_logo');
            if ($logo_id) : ?>
                <a class="l-footer__logo" href="<?php echo esc_url(get_site_url()); ?>">
                    <?php echo wp_get_attachment_image($logo_id, 'full'); ?>
                </a>
            <?php endif; ?>

            <div class="l-footer__menu">
                <?php // Меню
                wp_nav_menu([
                    'theme_location' => 'footer',
                    'container'      => false,
                    'menu_class'     => 'menu',
                ]); ?>
            </div>

            <?php 
            get_template_part('partials/social-media'); ?>

        </div>

        <div class="l-footer__bottom">

            <div class="l-footer__copyright">
                <span>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <a href="<?php echo esc_url(home_url('/polityka-prywatnosci/')); ?>">Polityka prywatności</a></span>
            </div>

            <?php  ?>
            <a href="#up" aria-label="Do góry" class="l-footer__up anchor-item-up">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="18 15 12 9 6 15"></polyline>
                </svg>
            </a>

        </div>

    </div>
</footer>

<?php wp_footer(); ?>