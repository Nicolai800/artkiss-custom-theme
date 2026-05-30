<?php

/**
 * Register customizer settings for social media
 */
function artkiss_customizer_settings($wp_customize) {

    // Section
    $wp_customize->add_section('artkiss_social_media', [
        'title'    => 'Social Media',
        'priority' => 30,
    ]);

    // Facebook
    $wp_customize->add_setting('facebook_url', ['default' => '']);
    $wp_customize->add_control('facebook_url', [
        'label'   => 'Facebook URL',
        'section' => 'artkiss_social_media',
        'type'    => 'url',
    ]);

    // Instagram
    $wp_customize->add_setting('instagram_url', ['default' => '']);
    $wp_customize->add_control('instagram_url', [
        'label'   => 'Instagram URL',
        'section' => 'artkiss_social_media',
        'type'    => 'url',
    ]);

    // TikTok
    $wp_customize->add_setting('tiktok_url', ['default' => '']);
    $wp_customize->add_control('tiktok_url', [
        'label'   => 'TikTok URL',
        'section' => 'artkiss_social_media',
        'type'    => 'url',
    ]);
}
add_action('customize_register', 'artkiss_customizer_settings');