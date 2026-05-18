<?php

$section = get_field('about_us_section');

if (!$section) {
    return;
}
$title = $section['title'] ?? '';
$description = $section['description'] ?? '';
$img = $section['img'] ?? false;
?>

<section class="home-s4">
    <div class="home-s4__container l-container">
        <div class="home-s4__header">
            <?php if ($title) : ?>
                <h2 class="home-s4__title heading2"><?php echo esc_html($title); ?></h2>
            <?php endif; ?>

            <?php if ($description) : ?>
                <div class="home-s4__desc regular-desc">
                    <?php echo wp_kses_post($description); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>