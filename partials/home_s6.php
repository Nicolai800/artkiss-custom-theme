<?php
/**
 * Instagram Slider Section (home_s6)
 *
 * @package artkiss-custom-theme
 */

// Get the Instagram section field group
$section = get_field('instagram_section');

$title = $section['title'] ?? '<h2>Śledź nas na Instagramie</h2>';
$profile_url = $section['url'] ?? 'https://www.instagram.com/';
?>
<section class="home-s6">
    <div class="home-s6__container l-container">
        
        <div class="home-s6__header">
            <?php if ($title) : ?>
                <div class="home-s6__title">
                    <?php echo wp_kses_post($title); ?>
                </div>
            <?php endif; ?>
            
            <?php if ($profile_url) : ?>
                <a href="<?php echo esc_url($profile_url); ?>" class="home-s6__cta" target="_blank" rel="noopener noreferrer">
                    <span class="home-s6__cta-text">Więcej pięknych zdjęć na naszym Instagramie</span>
                    <svg class="home-s6__cta-icon" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </a>
            <?php endif; ?>
        </div>

        <div class="home-s6__slider-wrapper">
            <div class="swiper home-s6__slider js-instagram-slider">
                <div class="swiper-wrapper">
                    <?php 
                    for ($i = 1; $i <= 10; $i++) :
                        $img = $section["img_{$i}"] ?? null;
                        
                        if (!$img || !is_array($img)) {
                            continue;
                        }
                        
                        $img_src = $img['url'];
                        $img_alt = $img['alt'] ?: 'Instagram photo ' . $i;
                    ?>
                        <div class="swiper-slide home-s6__slide">
                            <a href="<?php echo esc_url($profile_url); ?>" class="home-s6__post" target="_blank" rel="noopener noreferrer">
                                <div class="home-s6__post-image-container">
                                    <img src="<?php echo esc_url($img_src); ?>" alt="<?php echo esc_attr($img_alt); ?>" class="home-s6__post-image" loading="lazy">
                                    <div class="home-s6__post-overlay">
                                        <svg class="home-s6__post-icon" viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                        </svg>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
            
            <!-- Navigation arrows -->
            <div class="home-s6__nav home-s6__nav--prev js-instagram-prev">
                <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
            </div>
            <div class="home-s6__nav home-s6__nav--next js-instagram-next">
                <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
            </div>
            
            <!-- Pagination -->
            <div class="swiper-pagination home-s6__pagination js-instagram-pagination"></div>
        </div>

    </div>
</section>
