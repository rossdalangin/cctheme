<?php
/**
 * Template Name: About
 *
 * @package CloseClient
 */

get_header();

$headline = get_theme_mod( 'closeclient_about_headline_tpl', 'The Origin Story' );
$text     = get_theme_mod( 'closeclient_about_text_tpl', 'Engineering the future of high-ticket authority.' );
?>

<main id="primary" class="site-main about-page">
    <section class="section section-lg template-about-story bg-dark">
        <div class="container">
            <div class="cc-grid-2 reveal">
                <div class="about-hero-content">
                    <span class="section-tag"><?php esc_html_e( 'OUR MISSION', 'closeclient' ); ?></span>
                    <h1 class="hero-headline gradient-text"><?php echo esc_html( $headline ); ?></h1>
                    <p class="lead text-muted mb-5"><?php echo nl2br( esc_html( $text ) ); ?></p>
                </div>
                <div class="about-hero-image py-lg">
                    <?php if ( get_theme_mod( 'closeclient_about_image' ) ) : ?>
                        <img src="<?php echo esc_url( get_theme_mod( 'closeclient_about_image' ) ); ?>" alt="About Our Mission" class="cc-card">
                    <?php else : ?>
                        <div class="about-placeholder cc-card"></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-lg bg-black">
        <div class="container reveal">
            <div class="section-header text-center mb-5">
                <span class="section-tag"><?php esc_html_e( 'THE CORE VALUES', 'closeclient' ); ?></span>
                <h2 class="h1"><?php esc_html_e( 'Engineering Elite Authority', 'closeclient' ); ?></h2>
            </div>
            <div class="cc-grid-3 py-lg">
                <div class="value-item cc-card">
                    <div class="h3 mb-3 text-accent"><?php esc_html_e( 'Precision', 'closeclient' ); ?></div>
                    <p class="text-muted"><?php esc_html_e( 'We eliminate the "guesswork" from your client acquisition by deploying systems built on direct-response data.', 'closeclient' ); ?></p>
                </div>
                <div class="value-item cc-card">
                    <div class="h3 mb-3 text-accent"><?php esc_html_e( 'Authority', 'closeclient' ); ?></div>
                    <p class="text-muted"><?php esc_html_e( 'Positioning is the lead domino. We ensure you are perceived as the only logical choice in your market.', 'closeclient' ); ?></p>
                </div>
                <div class="value-item cc-card">
                    <div class="h3 mb-3 text-accent"><?php esc_html_e( 'Profit', 'closeclient' ); ?></div>
                    <p class="text-muted"><?php esc_html_e( 'Impact is the goal, but profit is the engine. Our systems are built to maximize your ROI and lifetime value.', 'closeclient' ); ?></p>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part( 'template-parts/sections/section-team' ); ?>

    <section class="section section-lg bg-dark">
        <div class="container reveal">
            <div class="section-header text-center mb-5">
                <span class="section-tag"><?php esc_html_e( 'THE EXPERTISE', 'closeclient' ); ?></span>
                <h2 class="h1"><?php esc_html_e( 'Architecting Global Authority', 'closeclient' ); ?></h2>
            </div>
            <div class="cc-grid-2 py-lg">
                <div class="expertise-content">
                    <h3 class="h2 mb-4"><?php esc_html_e( 'The $100M Methodology', 'closeclient' ); ?></h3>
                    <p class="lead text-muted mb-4"><?php esc_html_e( 'We don\'t just build websites; we engineer authority. Our methodology is rooted in the psychological triggers of the high-ticket prospect.', 'closeclient' ); ?></p>
                    <ul class="list-unstyled">
                        <li class="mb-3 d-flex align-items-center"><span class="text-accent me-3">✓</span> <?php esc_html_e( 'Direct-Response System Architecture', 'closeclient' ); ?></li>
                        <li class="mb-3 d-flex align-items-center"><span class="text-accent me-3">✓</span> <?php esc_html_e( 'Vortex Lead Intake & Pre-qualification', 'closeclient' ); ?></li>
                        <li class="mb-3 d-flex align-items-center"><span class="text-accent me-3">✓</span> <?php esc_html_e( 'Bento-style Social Proof Engineering', 'closeclient' ); ?></li>
                    </ul>
                </div>
                <div class="expertise-visual glass p-5">
                    <div class="h1 gradient-text mb-2"><?php esc_html_e( '94%', 'closeclient' ); ?></div>
                    <p class="small text-muted uppercase letter-spacing-1"><?php esc_html_e( 'Client Retention Rate', 'closeclient' ); ?></p>
                    <div class="h1 gradient-text mb-2 mt-5"><?php esc_html_e( '$250M+', 'closeclient' ); ?></div>
                    <p class="small text-muted uppercase letter-spacing-1"><?php esc_html_e( 'Revenue Generated for Clients', 'closeclient' ); ?></p>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part( 'template-parts/sections/section-authority' ); ?>
    <?php get_template_part( 'template-parts/sections/section-booking-cta' ); ?>
</main>

<?php
get_footer();
