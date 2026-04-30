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
    <?php get_template_part( 'template-parts/sections/section-authority' ); ?>
    <?php get_template_part( 'template-parts/sections/section-booking-cta' ); ?>
</main>

<?php
get_footer();
