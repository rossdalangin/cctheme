<?php
/**
 * Template Name: Lead Magnet
 *
 * @package CloseClient
 */

get_header();
?>

<main id="primary" class="site-main lead-magnet-page">
    <section class="section section-lg">
        <div class="container lead-magnet-grid reveal">
            <div class="lead-magnet-content py-lg">
                <span class="section-tag"><?php esc_html_e( 'FREE TRAINING', 'closeclient' ); ?></span>
                <h1 class="hero-headline gradient-text"><?php echo esc_html( get_theme_mod( 'closeclient_leadmagnet_headline_tpl', 'Get the Authority Blueprint' ) ); ?></h1>
                <p class="lead text-muted mb-5"><?php echo esc_html( get_theme_mod( 'closeclient_leadmagnet_text_tpl', 'Download our proven framework for attracting high-ticket clients on autopilot.' ) ); ?></p>

                <div class="lead-magnet-form glass p-5">
                    <?php
                    $custom_action = get_theme_mod( 'closeclient_lm_form_action' );
                    if ( $custom_action ) : ?>
                        <form action="<?php echo esc_url( $custom_action ); ?>" method="POST" class="custom-lead-form">
                            <div class="mb-4">
                                <input type="text" name="first_name" placeholder="First Name" required>
                            </div>
                            <div class="mb-4">
                                <input type="email" name="email" placeholder="Professional Email Address" required>
                            </div>
                            <button type="submit" class="cc-button w-100">
                                <?php echo esc_html( get_theme_mod( 'closeclient_lm_button', 'Access The Blueprint' ) ); ?>
                            </button>
                        </form>
                    <?php else :
                        the_content();
                    endif; ?>
                </div>
            </div>

            <div class="lead-magnet-mockup py-lg">
                <?php if ( get_theme_mod( 'closeclient_lm_image' ) ) : ?>
                    <img src="<?php echo esc_url( get_theme_mod( 'closeclient_lm_image' ) ); ?>" alt="Lead Magnet" class="glass">
                <?php else : ?>
                    <div class="glass">
                        <span class="text-muted"><?php esc_html_e( 'Lead Magnet Mockup', 'closeclient' ); ?></span>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php get_template_part( 'template-parts/sections/section-authority' ); ?>
    <?php get_template_part( 'template-parts/sections/section-testimonials' ); ?>
</main>

<?php
get_footer();
