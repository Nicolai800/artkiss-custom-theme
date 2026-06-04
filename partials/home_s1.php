<?php

$hero = get_field('hero_section');

if (!$hero) {
    return;
}

$hero_bg     = $hero['hero_bg_image'] ?? '';
$hero_bg_mob = $hero['hero_bg_image_mob'] ?? '';
$hero_label  = $hero['hero_label'] ?? '';
$hero_title  = $hero['hero_title'] ?? '';
$hero_desc   = $hero['hero_description'] ?? '';
$hero_btn    = $hero['hero_button_text'] ?? '';
$hero_url    = $hero['hero_button_url'] ?? '';

?>

<section class="hero">

    <?php if ($hero_bg || $hero_bg_mob) : ?>
        <picture class="hero__bg-picture">
            <?php if ($hero_bg_mob) : ?>
                <?php
                $hero_bg_mob_id = is_array($hero_bg_mob) ? ($hero_bg_mob['ID'] ?? null) : (is_numeric($hero_bg_mob) ? $hero_bg_mob : null);
                $mob_url = $hero_bg_mob_id ? wp_get_attachment_image_url($hero_bg_mob_id, 'large') : null;
                if (!$mob_url && is_array($hero_bg_mob)) {
                    $mob_url = $hero_bg_mob['url'] ?? '';
                }
                ?>
                <?php if ($mob_url) : ?>
                    <source media="(max-width: 768px)" srcset="<?php echo esc_url($mob_url); ?>">
                <?php endif; ?>
            <?php endif; ?>
            
            <?php
            $hero_bg_id = is_array($hero_bg) ? ($hero_bg['ID'] ?? null) : (is_numeric($hero_bg) ? $hero_bg : null);
            $desktop_url = $hero_bg_id ? wp_get_attachment_image_url($hero_bg_id, 'fullhd') : null;
            if (!$desktop_url && is_array($hero_bg)) {
                $desktop_url = $hero_bg['url'] ?? '';
            }
            
            $fallback_url = $desktop_url ? $desktop_url : (is_array($hero_bg_mob) ? ($hero_bg_mob['url'] ?? '') : wp_get_attachment_image_url($hero_bg_mob_id, 'full'));
            ?>
            <img
                class="hero__bg-img"
                src="<?php echo esc_url($fallback_url); ?>"
                alt=""
                aria-hidden="true"
                fetchpriority="high"
                loading="eager"
                decoding="sync"
            >
        </picture>
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
