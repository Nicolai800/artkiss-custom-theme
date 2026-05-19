<?php

$section = get_field('about_us_section');

if (!$section) {
    return;
}

$title       = $section['title']       ?? '';
$description = $section['description'] ?? '';
$img         = $section['img']         ?? false;
?>

<section class="home-s4">
    <div class="home-s4__container l-container">

        <?php if ($title) : ?>
            <h2 class="home-s4__title heading2"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>

        <div class="home-s4__card">

            <?php if ($img) : ?>
                <div class="home-s4__img-wrap">
                    <img
                        class="home-s4__img"
                        src="<?php echo esc_url($img['url']); ?>"
                        alt="<?php echo esc_attr($img['alt'] ?? $title); ?>"
                        width="<?php echo esc_attr($img['width'] ?? ''); ?>"
                        height="<?php echo esc_attr($img['height'] ?? ''); ?>"
                        loading="lazy"
                    >
                </div>
            <?php endif; ?>

            <?php if ($description) : ?>
                <div class="home-s4__desc regular-desc">
                    <?php echo wp_kses_post($description); ?>
                </div>
            <?php endif; ?>

        </div>

    </div>
</section>