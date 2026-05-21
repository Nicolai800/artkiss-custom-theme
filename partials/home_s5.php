<?php
$section = get_field('trust_section');

if (!$section) {
    return;
}

$title = $section['title'] ?? '';
?>

<section class="home-s5">
    <div class="home-s5__container l-container">

        <?php if ($title) : ?>
            <h2 class="home-s5__title heading2" data-aos="fade-up" data-aos-duration="1000"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>

        <div class="home-s5__grid">
            <?php for ($i = 1; $i <= 4; $i++) : 
                $icon  = $section["card_{$i}_icon"] ?? null;
                $card_title = $section["card_{$i}_title"] ?? '';
                $card_text  = $section["card_{$i}_text"] ?? '';
                
                if (!$card_title && !$card_text) continue;
                $aos_effect = ($i % 2 !== 0) ? 'fade-right' : 'fade-left';
            ?>
                <div class="home-s5__card" data-aos="<?php echo $aos_effect; ?>" data-aos-delay="<?php echo $i * 100; ?>" data-aos-duration="1000">
                    <?php if ($icon) : ?>
                        <div class="home-s5__card-icon-wrap">
                            <img 
                                class="home-s5__card-icon"
                                src="<?php echo esc_url($icon['url']); ?>" 
                                alt="<?php echo esc_attr($icon['alt'] ?? $card_title); ?>" 
                                width="<?php echo esc_attr($icon['width'] ?? ''); ?>"
                                height="<?php echo esc_attr($icon['height'] ?? ''); ?>"
                                loading="lazy"
                            >
                        </div>
                    <?php endif; ?>
                    
                    <div class="home-s5__card-content">
                        <?php if ($card_title) : ?>
                            <h3 class="home-s5__card-title"><?php echo esc_html($card_title); ?></h3>
                        <?php endif; ?>
                        
                        <?php if ($card_text) : ?>
                            <p class="home-s5__card-text"><?php echo esc_html($card_text); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endfor; ?>
        </div>

    </div>
</section>
