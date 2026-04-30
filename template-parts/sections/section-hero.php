<?php
/**
 * Hero Section Template Part
 *
 * @package CloseClient
 */
?>

<section class="section section-lg section-hero">
    <div class="container hero-content-wrapper text-center">
        <h1 class="hero-headline">
            <span class="gradient-text <?php echo get_theme_mod( 'closeclient_hero_typewriter', false ) ? 'typewriter-text' : ''; ?>" data-text="<?php echo esc_attr( get_theme_mod( 'closeclient_hero_headline', 'Stop Losing High-Value Clients Before You Even Speak to Them' ) ); ?>">
                <?php
                if ( ! get_theme_mod( 'closeclient_hero_typewriter', false ) ) {
                    echo esc_html( get_theme_mod( 'closeclient_hero_headline', 'Stop Losing High-Value Clients Before You Even Speak to Them' ) );
                }
                ?>
            </span>
        </h1>

        <div class="container-narrow">
            <p class="hero-subheadline"><?php echo esc_html( get_theme_mod( 'closeclient_hero_subheadline', 'Your website should act as your top-performing associate: pre-qualifying, positioning, and closing premium clients — automatically.' ) ); ?></p>
        </div>

        <div class="hero-cta">
            <a href="<?php echo esc_url( get_theme_mod( 'closeclient_hero_cta_link', '#audit' ) ); ?>" class="cc-button"><?php echo esc_html( get_theme_mod( 'closeclient_hero_cta', 'Request Your Authority Audit →' ) ); ?></a>
        </div>

        <?php if ( get_theme_mod( 'closeclient_hero_image' ) ) : ?>
            <div class="hero-image-box container reveal">
                <img src="<?php echo esc_url( get_theme_mod( 'closeclient_hero_image' ) ); ?>" alt="Coach Authority" class="aspect-hero">
            </div>
        <?php endif; ?>
    </div>
</section>
