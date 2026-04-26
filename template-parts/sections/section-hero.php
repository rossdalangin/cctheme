<?php
/**
 * Hero Section Template Part
 *
 * @package CloseClient
 */
?>

<section class="section section-hero">
    <div class="container hero-content-wrapper">
        <span class="section-tag reveal">NEXT-GEN DIGITAL SYSTEMS</span>
        <h1 class="hero-headline reveal"><span class="gradient-text"><?php echo esc_html( get_theme_mod( 'closeclient_hero_headline', 'Design the Future of Your Authority' ) ); ?></span></h1>
        <p class="hero-subheadline reveal"><?php echo esc_html( get_theme_mod( 'closeclient_hero_subheadline', 'We engineer elite-level digital infrastructure for the world\'s most ambitious coaches and consultants. Scaling is no longer a goal—it\'s a system.' ) ); ?></p>
        <div class="hero-cta reveal">
            <a href="<?php echo esc_url( get_theme_mod( 'closeclient_hero_cta_link', '#' ) ); ?>" class="button button-accent"><?php echo esc_html( get_theme_mod( 'closeclient_hero_cta', 'Launch Your Ecosystem' ) ); ?></a>
        </div>
    </div>
</section>
