<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="<?php echo esc_attr(get_theme_mod('theme_color', '#C79B84')); ?>">

    <!-- Preconnect to external resources -->
    <link rel="preconnect" href="https://www.googletagmanager.com" crossorigin>
    <link rel="preconnect" href="https://www.google-analytics.com" crossorigin>

    <!-- Preload critical local fonts to prevent FOUT (Flash of Unstyled Text) -->
    <link rel="preload" href="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/fonts/cormorant-garamond-v21-latin_latin-ext-600.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/fonts/inter-v20-latin_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>

    <!-- Preload Mobile Hero Background Image to optimize LCP -->
    <?php 
    if ( is_front_page() || is_page_template( 'template-homepage.php' ) ) {
        $page_id = get_queried_object_id();
        if ( $page_id ) {
            $hero = get_field('hero_section', $page_id);
            if ($hero) {
                $mob_img = $hero['hero_bg_image_mob'] ?? '';
                $mob_url = '';
                if (is_array($mob_img)) {
                    $mob_url = $mob_img['sizes']['large'] ?? $mob_img['url'] ?? '';
                } elseif (is_numeric($mob_img)) {
                    $mob_url = wp_get_attachment_image_url($mob_img, 'large');
                } elseif (is_string($mob_img)) {
                    $mob_url = $mob_img;
                }
                if ($mob_url) {
                    echo '<link rel="preload" as="image" href="' . esc_url($mob_url) . '" media="(max-width: 768px)" fetchpriority="high">';
                }
            }
        }
    }
    ?>

    <?php wp_head(); ?>
</head>

<body <?php body_class('preload'); ?>>

    <?php get_template_part('partials/header'); ?>

    <main id="up">