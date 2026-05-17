<?php
/**
 * Template Name: Kontakty
 * @package artkiss-custom-theme
 */

get_header();

$company_name = get_field('contact_company_name');
$address = get_field('contact_address');
$nip = get_field('contact_nip');
$regon = get_field('contact_regon');
$email = get_field('contact_email');
$form_title = get_field('contact_form_title') ?: 'Skontaktuj się z nami';
$form_shortcode = get_field('contact_form_shortcode');

?>

<main class="main-content">
    <section class="contact-page">
        <div class="contact-page__container l-container">
            <h1 class="contact-page__title heading1" >
                Kontakty
            </h1>

            <div class="contact-page__grid">
                
                
                <div class="contact-page__info">
                    <?php if ($company_name) : ?>
                        <div class="contact-page__item">
                            <span class="contact-page__label">Nazwa:</span>
                            <span class="contact-page__value"><strong><?php echo esc_html($company_name); ?></strong></span>
                        </div>
                    <?php endif; ?>

                    <?php if ($address) : ?>
                        <div class="contact-page__item">
                            <span class="contact-page__label">Adres:</span>
                            <span class="contact-page__value"><?php echo wp_kses_post($address); ?></span>
                        </div>
                    <?php endif; ?>

                    <?php if ($nip) : ?>
                        <div class="contact-page__item">
                            <span class="contact-page__label">NIP:</span>
                            <span class="contact-page__value"><?php echo esc_html($nip); ?></span>
                        </div>
                    <?php endif; ?>

                    <?php if ($regon) : ?>
                        <div class="contact-page__item">
                            <span class="contact-page__label">REGON:</span>
                            <span class="contact-page__value"><?php echo esc_html($regon); ?></span>
                        </div>
                    <?php endif; ?>

                    <?php if ($email) : ?>
                        <div class="contact-page__item">
                            <span class="contact-page__label">Email:</span>
                            <a href="mailto:<?php echo antispambot($email); ?>" class="contact-page__value contact-page__link">
                                <?php echo antispambot($email); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    
                
                    <div class="contact-page__socials">
                        <?php get_template_part('partials/social-media'); ?>
                    </div>
                </div>

                
                <div class="contact-page__form-wrapper">
                    <?php if ($form_title) : ?>
                        <h2 class="contact-page__form-title heading3"><?php echo esc_html($form_title); ?></h2>
                    <?php endif; ?>

                    <?php if ($form_shortcode) : ?>
                        <div class="contact-page__form">
                            <?php echo do_shortcode($form_shortcode); ?>
                        </div>
                    <?php else : ?>
                        <p class="regular-desc">Wprowadź shortcode formularza w panelu edycji strony (ACF).</p>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </section>
</main>

<?php
get_footer();
