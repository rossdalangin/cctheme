<?php
/**
 * Template Name: Contact
 *
 * @package CloseClient
 */

get_header();
?>

<main id="primary" class="site-main contact-page">
    <section class="section section-lg bg-dark overflow-hidden">
        <div class="mesh-gradient"></div>
        <div class="container">
            <div class="section-header text-center reveal mb-5">
                <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_contact_tag_tpl', 'GET IN TOUCH' ) ); ?></span>
                <h1 class="hero-headline gradient-text"><?php echo esc_html( get_theme_mod( 'closeclient_contact_headline_tpl', 'Let\'s Talk About Your Growth.' ) ); ?></h1>
                <p class="lead text-muted mt-4 max-w-700 mx-auto"><?php echo esc_html( get_theme_mod( 'closeclient_contact_subheadline_tpl', 'Ready to engineer your scale? Fill out the form or apply for your Authority Audit directly.' ) ); ?></p>
            </div>

            <div class="bento-grid reveal py-lg">
                <!-- Left: Info & Stats -->
                <div class="contact-info bento-span-5 d-grid gap-4">
                    <div class="glass p-5 border-accent-soft h-100 d-flex flex-column justify-content-center">
                        <span class="section-tag small mb-4">CHANNELS</span>
                        <h3 class="h4 mb-4"><?php echo esc_html( get_theme_mod( 'closeclient_contact_direct_title', 'Direct Contact' ) ); ?></h3>
                        <p class="text-muted mb-0"><?php echo esc_html( get_theme_mod( 'closeclient_contact_direct_desc', 'Prefer email? Reach out at:' ) ); ?><br>
                        <a href="mailto:<?php echo antispambot( get_option('admin_email') ); ?>" class="text-white fw-bold h5 text-decoration-none d-block mt-2"><?php echo antispambot( get_option('admin_email') ); ?></a></p>
                    </div>

                    <div class="glass p-5 h-100 d-flex flex-column justify-content-center">
                         <div class="d-flex align-items-center gap-3 mb-4">
                             <div class="stat-indicator pulse"></div>
                             <span class="small fw-bold text-accent uppercase tracking-widest">Active Engineering</span>
                         </div>
                         <p class="small text-muted mb-0">Currently accepting 2 new high-authority partners for the next quarter.</p>
                    </div>
                </div>

                <!-- Right: Form -->
                <div class="contact-form-wrapper bento-span-7 glass p-5 p-md-5">
                    <div class="form-intro mb-5">
                        <h3 class="h3 mb-2">Initialize Intake</h3>
                        <p class="small text-muted">Complete the fields below to trigger a strategic diagnostic.</p>
                    </div>

                    <?php
                    $custom_action = get_theme_mod( 'closeclient_contact_form_action' );
                    if ( $custom_action ) : ?>
                        <form action="<?php echo esc_url( $custom_action ); ?>" method="POST" class="custom-contact-form">
                            <div class="cc-grid-2 mb-4">
                                <div>
                                    <label class="small uppercase fw-bold text-muted mb-2 d-block"><?php echo esc_html( get_theme_mod( 'closeclient_contact_name_label', 'Full Name' ) ); ?></label>
                                    <input type="text" name="name" required class="bg-black-soft border-0">
                                </div>
                                <div>
                                    <label class="small uppercase fw-bold text-muted mb-2 d-block"><?php echo esc_html( get_theme_mod( 'closeclient_contact_email_label', 'Email Address' ) ); ?></label>
                                    <input type="email" name="email" required class="bg-black-soft border-0">
                                </div>
                            </div>
                            <div class="mb-5">
                                <label class="small uppercase fw-bold text-muted mb-2 d-block"><?php echo esc_html( get_theme_mod( 'closeclient_contact_message_label', 'Message' ) ); ?></label>
                                <textarea name="message" rows="5" required class="bg-black-soft border-0"></textarea>
                            </div>
                            <button type="submit" class="cc-button w-100 py-4"><?php echo esc_html( get_theme_mod( 'closeclient_contact_btn_text', 'Send Message →' ) ); ?></button>
                        </form>
                    <?php else :
                        $form_shortcode = get_theme_mod( 'closeclient_contact_form_shortcode' );
                        if ( $form_shortcode ) {
                            echo do_shortcode( $form_shortcode );
                        } else {
                            echo '<p class="text-muted text-center py-5">' . esc_html( get_theme_mod( 'closeclient_contact_form_not_configured_text', 'Add your Contact Form 7 shortcode in Customizer > Page Templates > Contact.' ) ) . '</p>';
                        }
                    endif; ?>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part( 'template-parts/sections/section-faq' ); ?>
</main>

<style>
.max-w-700 { max-width: 700px; }
.bg-black-soft { background: rgba(0,0,0,0.3); }
.stat-indicator { width: 10px; height: 10px; background: #10B981; border-radius: 50%; }
.pulse { animation: pulse 2s infinite; }
@keyframes pulse { 0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7); } 70% { transform: scale(1); box-shadow: 0 0 0 10px rgba(16, 185, 129, 0); } 100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); } }
</style>

<?php
get_footer();
