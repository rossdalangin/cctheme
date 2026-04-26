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
            <h1 class="hero-headline"><?php echo esc_html( get_theme_mod( 'closeclient_hero_headline', 'The Authority System for High-Ticket Coaches' ) ); ?></h1>
            <p class="hero-subheadline"><?php echo esc_html( get_theme_mod( 'closeclient_hero_subheadline', 'Stop chasing leads and start attracting elite clients. We build premium digital ecosystems that position you as the only logical choice in your market.' ) ); ?></p>
            <div class="hero-cta">
                <a href="<?php echo esc_url( get_theme_mod( 'closeclient_hero_cta_link', '#' ) ); ?>" class="button button-large button-accent"><?php echo esc_html( get_theme_mod( 'closeclient_hero_cta', 'Apply for Strategy Audit' ) ); ?></a>
            </div>
        </div>
        <div class="hero-image">
            <?php if ( get_theme_mod( 'closeclient_hero_image' ) ) : ?>
                <img src="<?php echo esc_url( get_theme_mod( 'closeclient_hero_image' ) ); ?>" alt="Premium Coach">
            <?php else : ?>
                <div class="hero-image-placeholder" style="aspect-ratio:4/5; background:var(--silk); border-radius:32px; box-shadow:var(--shadow-premium);"></div>
            <?php endif; ?>
        </div>
    </div>
</section>
