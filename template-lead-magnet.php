<?php
/**
 * Template Name: Lead Magnet Template
 *
 * @package CloseClient
 */

get_header();

$headline = get_theme_mod( 'closeclient_leadmagnet_headline_tpl', 'Get the Authority Blueprint' );
$text     = get_theme_mod( 'closeclient_leadmagnet_text_tpl', 'Download our proven framework for attracting high-ticket clients on autopilot.' );
?>

<main id="primary" class="site-main lead-magnet-page">
    <div class="container section">
        <div class="lead-magnet-grid reveal" style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center;">
            <div class="lead-magnet-image">
                <?php if ( get_theme_mod( 'closeclient_lm_image' ) ) : ?>
                    <img src="<?php echo esc_url( get_theme_mod( 'closeclient_lm_image' ) ); ?>" alt="Lead Magnet" class="glass" style="max-width: 100%; height: auto; border-radius: var(--radius-lg);">
                <?php else : ?>
                    <div class="glass" style="aspect-ratio: 4/5; display: flex; align-items: center; justify-content: center; border-radius: var(--radius-lg);">
                        <span class="text-muted"><?php esc_html_e( 'Upload Blueprint Mockup in Customizer', 'closeclient' ); ?></span>
                    </div>
                <?php endif; ?>
            </div>

            <div class="lead-magnet-content">
                <span class="section-tag"><?php esc_html_e( 'FREE RESOURCE', 'closeclient' ); ?></span>
                <h1 class="page-title h2 mb-3"><?php echo esc_html( $headline ); ?></h1>
                <p class="lead text-muted mb-5"><?php echo esc_html( $text ); ?></p>

                <div class="lead-magnet-form-area glass p-4 mb-4">
                    <?php
                    $content = get_the_content();
                    if ( ! empty( $content ) ) {
                        echo apply_filters( 'the_content', $content );
                    } else {
                        echo '<p class="small text-muted">' . esc_html__( 'Add your opt-in form shortcode in the page editor.', 'closeclient' ) . '</p>';
                    }
                    ?>
                </div>

                <div class="trust-indicators d-flex gap-4">
                    <div class="indicator small text-muted">✓ <?php esc_html_e( 'Instant Download', 'closeclient' ); ?></div>
                    <div class="indicator small text-muted">✓ <?php esc_html_e( '100% Free', 'closeclient' ); ?></div>
                    <div class="indicator small text-muted">✓ <?php esc_html_e( 'No Spam', 'closeclient' ); ?></div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
