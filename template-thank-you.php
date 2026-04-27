<?php
/**
 * Template Name: Thank You Template
 *
 * @package CloseClient
 */

get_header();

$headline = get_theme_mod( 'closeclient_thankyou_headline_tpl', "You're All Set!" );
$text     = get_theme_mod( 'closeclient_thankyou_text_tpl', "We've received your request. Check your inbox for the next steps." );
?>

<main id="primary" class="site-main thank-you-page text-center">
    <div class="container narrow-container section reveal">
        <div class="glass p-5">
            <div class="success-icon mb-4" style="font-size: 4rem; color: var(--c-accent);">✓</div>
            <h1 class="page-title"><?php echo esc_html( $headline ); ?></h1>
            <p class="lead text-muted mb-5"><?php echo esc_html( $text ); ?></p>

            <div class="next-steps text-start">
                <h2 class="h4 mb-4"><?php esc_html_e( 'What\'s Next?', 'closeclient' ); ?></h2>
                <div class="grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                    <div class="step-card p-4 bg-secondary">
                        <h3 class="h5"><?php esc_html_e( 'Join the Community', 'closeclient' ); ?></h3>
                        <p class="small text-muted"><?php esc_html_e( 'Connect with other high-level coaches in our private group.', 'closeclient' ); ?></p>
                    </div>
                    <div class="step-card p-4 bg-secondary">
                        <h3 class="h5"><?php esc_html_e( 'Book a Call', 'closeclient' ); ?></h3>
                        <p class="small text-muted"><?php esc_html_e( 'Ready to skip the line? Let\'s talk strategy.', 'closeclient' ); ?></p>
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <a href="<?php echo esc_url( home_url('/') ); ?>" class="btn btn-secondary"><?php esc_html_e( 'Back to Home', 'closeclient' ); ?></a>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
