<?php

/**
 * Load styles
 */
function load_styles() {
    $css_file = get_template_directory() . '/dist/build-style.css';
    $version = file_exists($css_file) ? filemtime($css_file) : '1.0';

    wp_enqueue_style('app', get_template_directory_uri() . '/dist/build-style.css', [], $version, 'all');
}
add_action('wp_enqueue_scripts', 'load_styles');