<?php
/**
 * Template Name: Services Template
 *
 * @package CloseClient
 */

get_header();

$headline    = get_theme_mod( 'closeclient_services_hero_headline_tpl', 'Bespoke Systems for High-Ticket Experts.' );
$subheadline = get_theme_mod( 'closeclient_services_subheadline_tpl', 'We don\'t just build websites. We architect the infrastructure of omnipresent authority.' );
?>

<main id="primary" class="site-main">
    <div class="container section section-lg text-center reveal overflow-hidden">
        <div class="mesh-gradient"></div>
        <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_service_archive_tag', 'OUR CAPABILITIES' ) ); ?></span>
        <h1 class="hero-headline gradient-text"><?php echo esc_html( $headline ); ?></h1>
        <div class="container-narrow">
            <p class="hero-subheadline py-md text-muted lead"><?php echo esc_html( $subheadline ); ?></p>
        </div>
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
