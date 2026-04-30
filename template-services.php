<?php
/**
 * Template Name: Services Template
 *
 * @package CloseClient
 */

get_header();

$headline    = get_theme_mod( 'closeclient_services_hero_headline_tpl', 'Strategic Systems for the 1% Expert.' );
$subheadline = get_theme_mod( 'closeclient_services_subheadline_tpl', 'Premium solutions tailored for your stage of growth.' );
?>

<main id="primary" class="site-main">
    <div class="container section section-lg text-center reveal">
        <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_service_archive_tag', 'OUR CAPABILITIES' ) ); ?></span>
        <h1 class="hero-headline gradient-text"><?php echo esc_html( $headline ); ?></h1>
        <p class="hero-subheadline py-md"><?php echo esc_html( $subheadline ); ?></p>
    </div>

    <?php
    $content = get_the_content();
    if ( empty( $content ) ) {
        get_template_part( 'template-parts/sections/section-services' );
        get_template_part( 'template-parts/sections/section-pricing' );
        get_template_part( 'template-parts/sections/section-booking-cta' );
    } else {
        echo '<div class="container section py-xl">' . apply_filters( 'the_content', $content ) . '</div>';
    }
    ?>
</main>

<?php
get_footer();
