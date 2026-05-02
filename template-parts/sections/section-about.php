<?php
/**
 * About Section Template Part
 *
 * @package CloseClient
 */

$headline = get_theme_mod( 'closeclient_about_headline_home', 'Stop Chasing. Start Leading.' );
$p1 = get_theme_mod( 'closeclient_about_text_p1', "You didn't start your coaching business to spend 8 hours a day in the DMs. You started it to make an impact and build freedom." );
$p2 = get_theme_mod( 'closeclient_about_text_p2', "I help established experts build the infrastructure they need to scale without sacrificing their personal life." );
$btn = get_theme_mod( 'closeclient_about_button_text', 'Learn More About My Story' );
$img = get_theme_mod( 'closeclient_about_image' );
?>

<section id="about" class="section section-lg section-about">
    <div class="container">
        <div class="cc-grid-2">
            <div class="about-image reveal">
                <?php if ( $img ) : ?>
                    <img src="<?php echo esc_url( $img ); ?>" alt="About Me" class="aspect-square">
                <?php else : ?>
                    <div class="about-placeholder"></div>
                <?php endif; ?>
            </div>

            <div class="about-content reveal py-lg">
                <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_about_tag_home', 'THE VISION' ) ); ?></span>
                <h2 class="section-headline gradient-text mb-5"><?php echo esc_html( $headline ); ?></h2>
                <div class="about-text mb-5">
                    <p class="lead text-muted mb-4"><?php echo esc_html( $p1 ); ?></p>
                    <p class="text-muted"><?php echo esc_html( $p2 ); ?></p>
                </div>
                <a href="<?php echo esc_url( home_url( '/about' ) ); ?>" class="cc-button cc-button-secondary">
                    <?php echo esc_html( $btn ); ?>
                </a>
            </div>
        </div>
    </div>
</section>
