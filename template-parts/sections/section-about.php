<?php
/**
 * About Section Template Part
 *
 * @package CloseClient
 */
?>

<section class="section section-about">
    <div class="container about-grid">
        <div class="about-image">
            <?php if ( get_theme_mod( 'closeclient_about_image' ) ) : ?>
                <img src="<?php echo esc_url( get_theme_mod( 'closeclient_about_image' ) ); ?>" alt="About the Coach">
            <?php else : ?>
                <div class="about-image-placeholder"></div>
            <?php endif; ?>
        </div>
        <div class="about-content">
            <h2 class="section-headline"><?php echo esc_html( get_theme_mod( 'closeclient_about_headline', 'Stop Chasing Clients. Start Leading Them.' ) ); ?></h2>
            <div class="about-text">
                <p><?php esc_html_e( 'You didn\'t start your coaching business to spend 8 hours a day in the DMs. You started it to make an impact and build freedom.', 'closeclient' ); ?></p>
                <p><?php esc_html_e( 'I help established experts build the infrastructure they need to scale without sacrificing their personal life.', 'closeclient' ); ?></p>
            </div>
            <a href="<?php echo esc_url( home_url( '/about' ) ); ?>" class="button button-secondary"><?php esc_html_e( 'Learn More About My Story', 'closeclient' ); ?></a>
        </div>
    </div>
</section>
