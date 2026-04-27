<?php
/**
 * Hero Section Template Part
 *
 * @package CloseClient
 */
?>

<section class="section section-hero">
    <div class="container hero-content-wrapper text-center reveal">
        <h1 class="hero-headline reveal"><span class="gradient-text"><?php echo esc_html( get_theme_mod( 'closeclient_hero_headline', 'Stop Begging for Leads and Start Commanding Authority.' ) ); ?></span></h1>

        <div class="container-narrow reveal">
            <p class="hero-subheadline" style="font-size: 1.5rem; color: var(--c-text-muted); margin-bottom: 60px; line-height: 1.5;"><?php echo esc_html( get_theme_mod( 'closeclient_hero_subheadline', 'Most coaches are one referral drought away from bankruptcy. We build the elite digital infrastructure that pre-qualifies your leads and positions you as the only logical choice.' ) ); ?></p>
        </div>

        <div class="hero-cta reveal">
            <a href="<?php echo esc_url( get_theme_mod( 'closeclient_hero_cta_link', '#' ) ); ?>" class="cc-button"><?php echo esc_html( get_theme_mod( 'closeclient_hero_cta', 'Yes! Build My Authority Engine →' ) ); ?></a>
        </div>

        <?php if ( get_theme_mod( 'closeclient_hero_image' ) ) : ?>
            <div class="hero-image-box container reveal" style="margin-top: 80px;">
                <img src="<?php echo esc_url( get_theme_mod( 'closeclient_hero_image' ) ); ?>" alt="Coach Authority" class="aspect-hero">
            </div>
        <?php endif; ?>
    </div>
</section>
