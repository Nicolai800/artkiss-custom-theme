<?php
/**
 * Template Name: Szablon tekstowy
 * @package artkiss-custom-theme
 */

get_header();

// Fetch ACF fields.
$custom_title   = get_field('text_title');
$custom_content = get_field('text_content');

// Fallback to standard WordPress title and content if ACF fields are not populated.
$title   = !empty($custom_title) ? $custom_title : get_the_title();
$content = !empty($custom_content) ? $custom_content : get_the_content();
?>

<div class="main-content">
    <section class="policy">
        <div class="policy__container l-container">
            <h1 class="policy__title heading1">
                <?php echo esc_html($title); ?>
            </h1>

            <?php if (!empty($content)) : ?>
                <div class="policy__desc">
                    <?php echo wp_kses_post(apply_filters('the_content', $content)); ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
</div>

<?php
get_footer();
