<?php
/**
 * Hero Section Template Part
 *
 * @package CloseClient
 */
?>

<section class="section section-hero">
    <div class="container hero-content-wrapper text-center">
        <div class="hero-label reveal" style="margin-bottom: 40px;">
            <span style="border: 1px solid rgba(255,255,255,0.1); padding: 12px 24px; border-radius: 100px; font-size: 0.8rem; font-weight: 700; letter-spacing: 0.1em; background: rgba(255,255,255,0.03);">ELITE DIGITAL AGENCY</span>
        </div>

        <h1 class="hero-headline reveal"><span class="gradient-text"><?php echo esc_html( get_theme_mod( 'closeclient_hero_headline', 'Design the Future of Your Authority' ) ); ?></span></h1>

        <div class="container-narrow reveal">
            <p class="hero-subheadline"><?php echo esc_html( get_theme_mod( 'closeclient_hero_subheadline', 'We engineer elite-level digital infrastructure for the world\'s most ambitious coaches and consultants. Scaling is no longer a goal—it\'s a system.' ) ); ?></p>
        </div>

        <div class="hero-cta reveal" style="margin-top: 60px;">
            <a href="<?php echo esc_url( get_theme_mod( 'closeclient_hero_cta_link', '#' ) ); ?>" class="button button-accent"><?php echo esc_html( get_theme_mod( 'closeclient_hero_cta', 'Launch Your Ecosystem' ) ); ?></a>
        </div>

        <div class="hero-scroll reveal" style="margin-top: 100px; opacity: 0.3;">
            <div class="mouse" style="width: 24px; height: 40px; border: 2px solid var(--white); border-radius: 12px; margin: 0 auto; position: relative;">
                <div class="wheel" style="width: 2px; height: 6px; background: var(--white); position: absolute; top: 6px; left: 50%; transform: translateX(-50%); animation: scroll 2s infinite;"></div>
            </div>
        </div>
    </div>
</section>

<style>
@keyframes scroll {
    0% { top: 6px; opacity: 1; }
    100% { top: 20px; opacity: 0; }
}
</style>
