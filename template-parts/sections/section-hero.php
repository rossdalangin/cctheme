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
            <h1 class="hero-headline"><?php echo esc_html( get_theme_mod( 'closeclient_hero_headline', 'I Help Coaches Scale to $10k+ Without the Burnout' ) ); ?></h1>
            <p class="hero-subheadline"><?php echo esc_textarea( get_theme_mod( 'closeclient_hero_subheadline', 'Position yourself as the obvious expert and turn your expertise into a premium client-attraction system.' ) ); ?></p>
            <div class="hero-cta">
                <a href="<?php echo esc_url( get_theme_mod( 'closeclient_hero_cta_link', '#' ) ); ?>" class="button button-large button-accent"><?php echo esc_html( get_theme_mod( 'closeclient_hero_cta', 'Book Your Strategy Call' ) ); ?></a>
            </div>
        </div>
        <div class="hero-image">
            <?php if ( get_theme_mod( 'closeclient_hero_image' ) ) : ?>
                <img src="<?php echo esc_url( get_theme_mod( 'closeclient_hero_image' ) ); ?>" alt="Coach Hero">
            <?php else : ?>
                <div class="hero-image-placeholder"></div>
            <?php endif; ?>
        </div>
    </div>
</section>
