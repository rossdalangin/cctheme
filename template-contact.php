<?php
/**
 * Template Name: Contact
 *
 * @package CloseClient
 */

get_header();
?>

<main id="primary" class="site-main">
    <section class="section">
        <div class="container">
            <div class="section-header text-center reveal">
                <span class="section-tag"><?php esc_html_e( 'GET IN TOUCH', 'closeclient' ); ?></span>
                <h1 class="hero-headline"><?php echo esc_html( get_theme_mod( 'closeclient_contact_headline_tpl', "Let's talk about your growth." ) ); ?></h1>
                <p class="lead text-muted mt-4"><?php echo esc_html( get_theme_mod( 'closeclient_contact_subheadline_tpl', 'Ready to scale your coaching business? Fill out the form or book a call directly.' ) ); ?></p>
            </div>

            <div class="contact-grid reveal">
                <div class="contact-info">
                    <div class="glass p-5 mb-4">
                        <h3 class="h4 mb-4"><?php esc_html_e( 'Direct Contact', 'closeclient' ); ?></h3>
                        <p class="text-muted"><?php esc_html_e( 'Prefer email? Reach out at:', 'closeclient' ); ?><br>
                        <a href="mailto:<?php echo antispambot( get_option('admin_email') ); ?>" class="text-white fw-bold"><?php echo antispambot( get_option('admin_email') ); ?></a></p>
                    </div>
                    <?php get_template_part( 'template-parts/sections/section-stats' ); ?>
                </div>

                <div class="contact-form-wrapper glass p-5">
                    <?php
                    $form_shortcode = get_theme_mod( 'closeclient_contact_form_shortcode' );
                    if ( $form_shortcode ) {
                        echo do_shortcode( $form_shortcode );
                    } else {
                        echo '<p class="text-muted">' . esc_html__( 'Add your Contact Form 7 shortcode in Customizer > Page Templates > Contact.', 'closeclient' ) . '</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part( 'template-parts/sections/section-faq' ); ?>
</main>

<?php
get_footer();
