<?php
/**
 * About Section Template Part
 *
 * @package CloseClient
 */
?>

<section class="section section-about">
    <div class="container about-grid">
        <div class="about-image reveal">
            <?php if ( get_theme_mod( 'closeclient_about_image' ) ) : ?>
                <img src="<?php echo esc_url( get_theme_mod( 'closeclient_about_image' ) ); ?>" alt="About the Coach">
            <?php else : ?>
                <div class="about-placeholder" style="aspect-ratio:1/1; background:var(--secondary); border-radius:24px;"></div>
            <?php endif; ?>
        </div>
        <div class="about-content reveal">
            <h2 class="section-headline"><?php echo esc_html( get_theme_mod( 'closeclient_about_headline_home', 'Stop Chasing. Start Leading.' ) ); ?></h2>
            <div class="about-text">
                <p><?php echo esc_html( get_theme_mod( 'closeclient_about_text_p1', 'You didn\'t start your coaching business to spend 8 hours a day in the DMs. You started it to make an impact and build freedom.' ) ); ?></p>
                <p><?php echo esc_html( get_theme_mod( 'closeclient_about_text_p2', 'I help established experts build the infrastructure they need to scale without sacrificing their personal life.' ) ); ?></p>
            </div>
            <a href="<?php echo esc_url( home_url( '/about' ) ); ?>" class="button button-secondary"><?php echo esc_html( get_theme_mod( 'closeclient_about_button_text', 'Learn More About My Story' ) ); ?></a>
        </div>
    </div>
</section>
