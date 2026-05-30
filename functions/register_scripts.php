<?php

/**
 * Load scripts
 */
function load_scripts()
{
	$js_file = get_template_directory() . '/dist/build-combined.js';
	$version = file_exists($js_file) ? filemtime($js_file) : '1.0';

	wp_enqueue_script('app', get_template_directory_uri() . '/dist/build-combined.js', '', $version, true);

	wp_localize_script( 'app', 'ajax', array(
    	'url' => admin_url( 'admin-ajax.php' )
	));
}
add_action('wp_enqueue_scripts', 'load_scripts');