<?php
/**
 * Hero Section Template Part
 *
 * @package CloseClient
 */
?>

<section class="section section-hero">
    <div class="container hero-content-wrapper text-center reveal">
        <span class="section-tag reveal">NEXT-GEN DIGITAL SYSTEMS</span>
        <h1 class="hero-headline reveal"><span class="gradient-text"><?php echo esc_html( get_theme_mod( 'closeclient_hero_headline', 'Design the Future of Digital Authority' ) ); ?></span></h1>

        <div class="container-narrow reveal">
            <p class="hero-subheadline" style="font-size: 1.6rem; color: var(--c-text-muted); margin-bottom: 60px; line-height: 1.5;"><?php echo esc_html( get_theme_mod( 'closeclient_hero_subheadline', 'We engineer the elite infrastructure that powers the world\'s most ambitious brands and consultants. Performance-first, conversion-locked, and future-ready.' ) ); ?></p>
        </div>

        <div class="hero-cta reveal">
            <a href="<?php echo esc_url( get_theme_mod( 'closeclient_hero_cta_link', '#' ) ); ?>" class="cc-button"><?php echo esc_html( get_theme_mod( 'closeclient_hero_cta', 'Launch Your Ecosystem' ) ); ?></a>
        </div>
    </div>
</section>
