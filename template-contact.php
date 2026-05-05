<?php
/**
 * Template Name: Contact
 *
 * @package CloseClient
 */

get_header();
?>

<main id="primary" class="site-main">
    <section class="section section-lg">
        <div class="container">
            <div class="section-header text-center reveal mb-5">
                <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_contact_tag_tpl', 'GET IN TOUCH' ) ); ?></span>
                <h1 class="hero-headline gradient-text"><?php echo esc_html( get_theme_mod( 'closeclient_contact_headline_tpl', 'Let\'s Talk About Your Growth.' ) ); ?></h1>
                <p class="lead text-muted mt-4"><?php echo esc_html( get_theme_mod( 'closeclient_contact_subheadline_tpl', 'Ready to engineer your scale? Fill out the form or apply for your Authority Audit directly.' ) ); ?></p>
            </div>

            <div class="contact-grid reveal py-lg">
                <div class="contact-info">
                    <div class="glass p-5 mb-4">
                        <h3 class="h4 mb-4"><?php echo esc_html( get_theme_mod( 'closeclient_contact_direct_title', 'Direct Contact' ) ); ?></h3>
                        <p class="text-muted"><?php echo esc_html( get_theme_mod( 'closeclient_contact_direct_desc', 'Prefer email? Reach out at:' ) ); ?><br>
                        <a href="mailto:<?php echo antispambot( get_option('admin_email') ); ?>" class="text-white fw-bold"><?php echo antispambot( get_option('admin_email') ); ?></a></p>
                    </div>
                    <div class="contact-stats-visual mt-5">
                         <?php get_template_part( 'template-parts/sections/section-stats', null, array('is_nested' => true) ); ?>
                    </div>
                </div>

                <div class="contact-form-wrapper glass p-5">
                    <?php
                    $custom_action = get_theme_mod( 'closeclient_contact_form_action' );
                    if ( $custom_action ) : ?>
                        <form action="<?php echo esc_url( $custom_action ); ?>" method="POST" class="custom-contact-form">
                            <div class="mb-4">
                                <label><?php echo esc_html( get_theme_mod( 'closeclient_contact_name_label', 'Full Name' ) ); ?></label>
                                <input type="text" name="name" required>
                            </div>
                            <div class="mb-4">
                                <label><?php echo esc_html( get_theme_mod( 'closeclient_contact_email_label', 'Email Address' ) ); ?></label>
                                <input type="email" name="email" required>
                            </div>
                            <div class="mb-4">
                                <label><?php echo esc_html( get_theme_mod( 'closeclient_contact_message_label', 'Message' ) ); ?></label>
                                <textarea name="message" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="cc-button w-100"><?php echo esc_html( get_theme_mod( 'closeclient_contact_btn_text', 'Send Message →' ) ); ?></button>
                        </form>
                    <?php else :
                        $form_shortcode = get_theme_mod( 'closeclient_contact_form_shortcode' );
                        if ( $form_shortcode ) {
                            echo do_shortcode( $form_shortcode );
                        } else {
                            echo '<p class="text-muted">' . esc_html( get_theme_mod( 'closeclient_contact_form_not_configured_text', 'Add your Contact Form 7 shortcode in Customizer > Page Templates > Contact.' ) ) . '</p>';
                        }
                    endif; ?>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part( 'template-parts/sections/section-faq' ); ?>
</main>

<?php
get_footer();
