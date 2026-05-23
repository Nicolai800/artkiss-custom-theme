<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package artkiss-custom-theme
 */

get_header();
?>

<section class="error-404">
    <!-- Ambient glowing background blobs -->
    <div class="error-404__glow error-404__glow--1"></div>
    <div class="error-404__glow error-404__glow--2"></div>

    <div class="error-404__container l-container">
        <div class="error-404__content">
            <h1 class="error-404__title">404</h1>
            <h2 class="error-404__subtitle heading2"><?php esc_html_e('Strona nie została znaleziona', 'artkiss-custom-theme'); ?></h2>
            <p class="error-404__text regular-desc"><?php esc_html_e('Wygląda na to, że ta strona nie istnieje lub została przeniesiona pod inny adres.', 'artkiss-custom-theme'); ?></p>
            <div class="error-404__actions">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="button1">
                    <?php esc_html_e('Powrót do strony głównej', 'artkiss-custom-theme'); ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
