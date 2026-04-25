<?php
/**
 * Template Name: Thank You Template
 *
 * @package CloseClient
 */

get_header();
?>

<main id="primary" class="site-main thank-you-page text-center">
    <div class="container narrow-container">
        <header class="page-header">
            <h1 class="page-title"><?php echo esc_html( get_theme_mod( 'closeclient_thankyou_headline', 'You\'re All Set!' ) ); ?></h1>
            <p class="lead"><?php esc_html_e( 'Check your inbox. Your resources are on the way.', 'closeclient' ); ?></p>
        </header>

        <div class="next-steps">
            <h2><?php esc_html_e( 'What\'s Next?', 'closeclient' ); ?></h2>
            <div class="grid">
                <div class="step">
                    <h3><?php esc_html_e( 'Join the Community', 'closeclient' ); ?></h3>
                    <p><?php esc_html_e( 'Connect with other high-level coaches in our private group.', 'closeclient' ); ?></p>
                </div>
                <div class="step">
                    <h3><?php esc_html_e( 'Book a Call', 'closeclient' ); ?></h3>
                    <p><?php esc_html_e( 'Ready to skip the line? Let\'s talk strategy.', 'closeclient' ); ?></p>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
