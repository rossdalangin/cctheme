<?php
/**
 * Template Name: Contact Template
 *
 * @package CloseClient
 */

get_header();

$headline    = get_theme_mod( 'closeclient_contact_headline_tpl', "Let's talk about your growth." );
$subheadline = get_theme_mod( 'closeclient_contact_subheadline_tpl', 'Ready to scale your coaching business? Fill out the form or book a call directly.' );
$form_code   = get_theme_mod( 'closeclient_contact_form_shortcode', '[contact-form-7 id="..."]' );
?>

<main id="primary" class="site-main">
    <div class="container section reveal">
        <header class="page-header text-center">
            <span class="section-tag"><?php esc_html_e( 'GET IN TOUCH', 'closeclient' ); ?></span>
            <h1 class="hero-headline"><?php echo esc_html( $headline ); ?></h1>
            <p class="hero-subheadline"><?php echo esc_html( $subheadline ); ?></p>
        </header>

        <div class="contact-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; margin-top: 4rem;">
            <div class="contact-form-wrapper glass p-5">
                <?php
                if ( ! empty( $form_code ) && $form_code !== '[contact-form-7 id="..."]' ) {
                    echo do_shortcode( $form_code );
                } else {
                    echo '<p class="text-muted">' . esc_html__( 'Please configure your contact form shortcode in the Customizer.', 'closeclient' ) . '</p>';
                }
                ?>
            </div>

            <div class="contact-info-wrapper">
                <div class="info-card mb-4 reveal">
                    <h3 class="h4 mb-3"><?php esc_html_e( 'Direct Access', 'closeclient' ); ?></h3>
                    <p class="text-muted"><?php esc_html_e( 'Skip the form and book a direct consultation audit if you are doing $10k+/mo.', 'closeclient' ); ?></p>
                    <a href="<?php echo esc_url( get_theme_mod( 'closeclient_header_cta_link', '#' ) ); ?>" class="btn btn-primary mt-3">
                        <?php echo esc_html( get_theme_mod( 'closeclient_header_cta_text', 'Book a Call' ) ); ?>
                    </a>
                </div>

                <?php get_template_part( 'template-parts/sections/section-faq' ); ?>
            </div>
        </div>
    </div>

    <?php
    $content = get_the_content();
    if ( ! empty( $content ) ) {
        echo '<div class="container section">' . apply_filters( 'the_content', $content ) . '</div>';
    }
    ?>
</main>

<?php
get_footer();
