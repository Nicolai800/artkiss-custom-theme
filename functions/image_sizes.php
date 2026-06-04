<?php

/**
 * Add custom wordpress image sizes
 */
function addImageSizes()
{
	add_image_size('fullhd', 1920, 1080, false);
	add_image_size('category_desktop', 768, 432, true);
	add_image_size('category_mobile', 640, 360, true);
}
add_action('after_setup_theme', 'addImageSizes');