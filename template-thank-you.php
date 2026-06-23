<?php
/**
 * Template Name: Thank You
 *
 * @package CloseClient
 */

get_header();
?>

<main id="primary" class="site-main thank-you-page">
    <section class="section section-lg">
        <div class="container container-narrow text-center reveal">
            <div class="success-icon mb-4 h1 text-accent">✓</div>
            <h1 class="hero-headline gradient-text"><?php echo esc_html( get_theme_mod( 'closeclient_thankyou_headline_tpl', 'Inquiry Received.' ) ); ?></h1>
            <p class="lead text-muted mb-5 py-md"><?php echo esc_html( get_theme_mod( 'closeclient_thankyou_text_tpl', 'An architect will review your data and reach out within 24 business hours.' ) ); ?></p>

            <div class="glass p-5 mt-5">
                <h2 class="h4 mb-4"><?php echo esc_html( get_theme_mod( 'closeclient_thankyou_wait_title', 'Next Steps...' ) ); ?></h2>
                <div class="thank-you-grid cc-grid-2">
                    <div class="resource-item py-md">
                        <p class="small text-muted mb-3"><?php echo esc_html( get_theme_mod( 'closeclient_thankyou_insights_text', 'Explore our latest engineering insights' ) ); ?></p>
                        <a href="<?php echo esc_url( home_url( '/blog' ) ); ?>" class="cc-button cc-button-secondary w-100"><?php echo esc_html( get_theme_mod( 'closeclient_thankyou_blog_btn', 'Read Insights' ) ); ?></a>
                    </div>
                    <div class="resource-item py-md">
                        <p class="small text-muted mb-3"><?php echo esc_html( get_theme_mod( 'closeclient_thankyou_stories_text', 'See our recent partner success stories' ) ); ?></p>
                        <a href="<?php echo esc_url( home_url( '/case-studies' ) ); ?>" class="cc-button cc-button-secondary w-100"><?php echo esc_html( get_theme_mod( 'closeclient_thankyou_cases_btn', 'View Case Studies' ) ); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
