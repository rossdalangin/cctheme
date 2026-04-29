<?php
/**
 * Template Name: Lead Magnet
 *
 * @package CloseClient
 */

get_header();
?>

<main id="primary" class="site-main lead-magnet-page">
    <section class="section">
        <div class="container lead-magnet-grid reveal">
            <div class="lead-magnet-content">
                <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_leadmagnet_tag_tpl', 'FREE TRAINING' ) ); ?></span>
                <h1 class="hero-headline"><?php echo esc_html( get_theme_mod( 'closeclient_leadmagnet_headline_tpl', 'Get the Authority Blueprint' ) ); ?></h1>
                <p class="lead text-muted mb-5"><?php echo esc_html( get_theme_mod( 'closeclient_leadmagnet_text_tpl', 'Download our proven framework for attracting high-ticket clients on autopilot.' ) ); ?></p>

                <div class="lead-magnet-form glass p-5">
                    <?php the_content(); ?>
                </div>
            </div>

            <div class="lead-magnet-mockup">
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
