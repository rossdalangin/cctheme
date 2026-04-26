<?php
/**
 * Hero Section Template Part
 *
 * @package CloseClient
 */
?>

<section class="section section-hero">
    <div class="container hero-content-wrapper text-center">
        <h1 class="hero-headline reveal"><?php echo esc_html( get_theme_mod( 'closeclient_hero_headline', 'Scale Your Authority. Sell Your Expertise.' ) ); ?></h1>
        <p class="hero-subheadline reveal"><?php echo esc_html( get_theme_mod( 'closeclient_hero_subheadline', 'I help high-level coaches and consultants build elite digital platforms that turn visitors into high-ticket clients on autopilot.' ) ); ?></p>
        <div class="hero-cta reveal">
            <a href="<?php echo esc_url( get_theme_mod( 'closeclient_hero_cta_link', '#' ) ); ?>" class="button button-accent button-large"><?php echo esc_html( get_theme_mod( 'closeclient_hero_cta', 'Book Your Strategy Call' ) ); ?></a>
        </div>
    </div>
</section>
