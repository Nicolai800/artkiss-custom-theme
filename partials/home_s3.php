<?php

$section = get_field('bestsellers_section');

if (!$section) {
    return;
}
$title = $section['title'] ?? '';
$description = $section['description'] ?? '';
$products = $section['products'] ?? false;
?>

<section class="home-s3">
    <div class="home-s3__container l-container">
        
        <div class="home-s3__header" data-aos="fade-up" data-aos-duration="1000">
            <?php if ($title) : ?>
                <h2 class="home-s3__title heading2"><?php echo esc_html($title); ?></h2>
            <?php endif; ?>

            <?php if ($description) : ?>
                <div class="home-s3__desc regular-desc">
                    <?php echo wp_kses_post($description); ?>
                </div>
            <?php endif; ?>
        </div>

        <?php 
        if ($products && is_array($products)) : 
            $product_ids = array_map(function($p) { return $p->ID; }, $products);
            
            $args = array(
                'post_type'      => 'product',
                'post__in'       => $product_ids,
                'orderby'        => 'post__in',
                'posts_per_page' => -1,
            );
            
            $loop = new WP_Query($args);

            if ($loop->have_posts()) : ?>
                <div class="home-s3__grid-wrap" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                    <ul class="home-s3__grid products">
                        <?php 
                        while ($loop->have_posts()) : $loop->the_post();
                            wc_get_template_part('content', 'product');
                        endwhile; 
                        ?>
                    </ul>
                </div>
                <?php 
                wp_reset_postdata();
            endif;
        else : ?>
            <p class="regular-desc">Wybierz produkty w panelu ACF.</p>
        <?php endif; ?>

    </div>
</section>