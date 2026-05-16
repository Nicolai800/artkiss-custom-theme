<?php

/**
 * Load styles
 */
function load_styles() {
    // Google Fonts — Inter + Cormorant Garamond
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Inter:wght@400;500;600;700&display=swap',
        [],
        null
    );

    wp_enqueue_style('app', get_template_directory_uri() . '/dist/build-style.css', ['google-fonts'], '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'load_styles');