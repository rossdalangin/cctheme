<?php
/**
 * Hero Section Template Part
 *
 * @package CloseClient
 */
?>

<section class="section section-lg section-hero overflow-hidden no-reveal">
    <div class="mesh-gradient"></div>
    <div class="hero-bg-glow"></div>
    <div class="hero-creative-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
    </div>
    <div class="container hero-content-wrapper text-center">
        <h1 class="hero-headline">
            <span class="gradient-text <?php echo get_theme_mod( 'closeclient_hero_typewriter', false ) ? 'typewriter-text' : ''; ?>" data-text="<?php echo esc_attr( get_theme_mod( 'closeclient_hero_headline', 'We Architect High-Fidelity Digital Machines for the 1%.' ) ); ?>">
                <?php
                if ( ! get_theme_mod( 'closeclient_hero_typewriter', false ) ) {
                    echo esc_html( get_theme_mod( 'closeclient_hero_headline', 'We Architect High-Fidelity Digital Machines for the 1%.' ) );
                }
                ?>
            </span>
        </h1>

        <div class="container-narrow">
            <p class="hero-subheadline"><?php echo esc_html( get_theme_mod( 'closeclient_hero_subheadline', 'Stop settling for "pretty" websites. We engineer high-performance authority engines that pre-qualify, position, and close premium clients — automatically.' ) ); ?></p>
        </div>

        <div class="hero-cta mb-5">
            <a href="<?php echo esc_url( get_theme_mod( 'closeclient_hero_cta_link', '#audit' ) ); ?>" class="cc-button"><?php echo esc_html( get_theme_mod( 'closeclient_hero_cta', 'Request Your Authority Audit →' ) ); ?></a>
            <p class="hero-social-proof mt-4 small text-muted reveal">
                <span class="me-2">⚡</span> <?php echo esc_html( get_theme_mod( 'closeclient_hero_proof_text', 'Powering the Digital Infrastructure of 500+ High-Ticket Authority Brands.' ) ); ?>
            </p>
        </div>

        <?php if ( get_theme_mod( 'closeclient_hero_image' ) ) : ?>
            <div class="hero-image-box container reveal">
                <img src="<?php echo esc_url( get_theme_mod( 'closeclient_hero_image' ) ); ?>" alt="Coach Authority" class="aspect-hero">
            </div>
        <?php endif; ?>
    </div>
    <div class="section-divider-bottom"></div>
</section>
