<?php
/**
 * Template Name: Landing Page (No Header/Footer)
 *
 * @package CloseClient
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<main id="primary" class="site-main landing-page">
    <div class="landing-hero section section-lg reveal text-center overflow-hidden">
        <div class="mesh-gradient"></div>
        <div class="container-narrow">
            <?php
            $headline = get_theme_mod( 'closeclient_landing_headline_tpl', 'Transform Your Brand Into a High-Performance Machine.' );
            $text     = get_theme_mod( 'closeclient_landing_text_tpl', 'Join the elite brands that have automated their authority and scaled their impact.' );
            ?>
            <h1 class="hero-headline gradient-text"><?php echo esc_html( $headline ); ?></h1>
            <p class="lead text-muted mb-5"><?php echo esc_html( $text ); ?></p>
        </div>
    </div>

    <?php
    while ( have_posts() ) :
        the_post();
        $content = get_the_content();
        if ( ! empty( $content ) ) {
            echo '<div class="container">' . apply_filters( 'the_content', $content ) . '</div>';
        } else {
            get_template_part( 'template-parts/sections/section-vsl' );
            get_template_part( 'template-parts/sections/section-booking-cta' );
        }
    endwhile;
    ?>
</main>

<?php wp_footer(); ?>
</body>
</html>
