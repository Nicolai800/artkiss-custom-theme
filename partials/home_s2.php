<?php

$section = get_field('categories_section');

if (!$section) {
    return;
}

$has_content = false;
for ($i = 1; $i <= 4; $i++) {
    if (!empty($section["cat_{$i}"]['title'])) {
        $has_content = true;
        break;
    }
}

if (!$has_content) {
    return;
}
?>

<section class="home_s2">
    <div class="home_s2__container l-container">
        <div class="home_s2__list">
            <?php
            $visible_index = 0;
            for ($i = 1; $i <= 4; $i++) :
                $cat = $section["cat_{$i}"];
                
                // Skip if no title is provided
                if (empty($cat['title'])) {
                    continue;
                }
    
                $title = $cat['title'] ?? '';
                $image = $cat['image'] ?? '';
                $desc = $cat['desc'] ?? ''; 
                $link_url = $cat['url'] ?? '';

                // Alternating animation effect: left and right
                $aos_effect = ($visible_index % 2 === 0) ? 'fade-right' : 'fade-left';
                $aos_delay = ($visible_index + 1) * 100;
                $visible_index++;
            ?>
                <div class="home_s2__card-wrap" data-aos="<?php echo $aos_effect; ?>" data-aos-delay="<?php echo $aos_delay; ?>" data-aos-duration="1000">
                    <a href="<?php echo esc_url($link_url); ?>" class="category-card">
                        
                        <?php if ($image) : ?>
                            <div class="category-card__bg">
                                <?php 
                                if (is_array($image)) {
                                    echo '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '">';
                                } elseif (is_numeric($image)) {
                                    echo wp_get_attachment_image($image, 'full');
                                }
                                ?>
                            </div>
                        <?php endif; ?>

                        <div class="category-card__content">
                            <?php if ($title) : ?>
                                <h2 class="category-card__title heading3"><?php echo wp_kses_post($title); ?></h2>
                            <?php endif; ?>

                            <?php if ($desc) : ?>
                                <div class="category-card__desc regular-desc">
                                    <?php echo wp_kses_post($desc); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </a>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>
