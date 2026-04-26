<?php
/**
 * Hero Section Template Part
 *
 * @package CloseClient
 */
?>

<section class="section section-hero">
    <div class="container hero-grid">
        <div class="hero-content">
            <h1 class="hero-headline reveal"><?php echo esc_html( get_theme_mod( 'closeclient_hero_headline', 'Scale Your Authority. Sell Your Expertise.' ) ); ?></h1>
            <p class="hero-subheadline reveal"><?php echo esc_html( get_theme_mod( 'closeclient_hero_subheadline', 'I help high-level coaches and consultants build elite digital platforms that turn visitors into high-ticket clients on autopilot.' ) ); ?></p>
            <div class="hero-cta reveal">
                <a href="<?php echo esc_url( get_theme_mod( 'closeclient_hero_cta_link', '#' ) ); ?>" class="button button-accent button-large"><?php echo esc_html( get_theme_mod( 'closeclient_hero_cta', 'Book Your Strategy Call' ) ); ?></a>
            </div>
        </div>
        <div class="hero-image reveal">
            <?php if ( get_theme_mod( 'closeclient_hero_image' ) ) : ?>
                <img src="<?php echo esc_url( get_theme_mod( 'closeclient_hero_image' ) ); ?>" alt="Coach Hero">
            <?php else : ?>
                <div class="hero-placeholder" style="aspect-ratio:4/5; background:var(--secondary); border-radius:32px;"></div>
            <?php endif; ?>
        </div>
    </div>
</section>
