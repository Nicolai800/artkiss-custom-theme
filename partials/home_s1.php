<?php

$hero = get_field('hero_section');

if (!$hero) {
    return;
}

$hero_bg    = $hero['hero_bg_image'] ?? '';
$hero_label = $hero['hero_label'] ?? '';
$hero_title = $hero['hero_title'] ?? '';
$hero_desc  = $hero['hero_description'] ?? '';
$hero_btn   = $hero['hero_button_text'] ?? '';
$hero_url   = $hero['hero_button_url'] ?? '';

?>

<section class="hero">

    <?php if ($hero_bg) : ?>
        <img
            class="hero__bg-img"
            src="<?php echo esc_url($hero_bg['url']); ?>"
            alt=""
            aria-hidden="true"
        >
    <?php endif; ?>

    <div class="hero__container l-container">
        <div class="hero__content">

            <?php if ($hero_label) : ?>
                <span class="hero__label heading5">
                    <?php echo esc_html($hero_label); ?>
                </span>
            <?php endif; ?>

            <?php if ($hero_title) : ?>
                <h1 class="hero__title heading1">
                    <?php echo wp_kses_post($hero_title); ?>
                </h1>
            <?php endif; ?>

            <?php if ($hero_desc) : ?>
                <div class="hero__desc regular-desc">
                    <?php echo wp_kses_post($hero_desc); ?>
                </div>
            <?php endif; ?>

            <?php if ($hero_btn && $hero_url) : ?>
                <div class="hero__actions">
                    <a href="<?php echo esc_url($hero_url); ?>" class="button1">
                        <?php echo esc_html($hero_btn); ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                </div>
            <?php endif; ?>

        </div>
    </div>

</section>
