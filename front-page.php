<?php
/**
 * The front page template
 *
 * @package CloseClient
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php
    $sections = array(
        'hero' => 'hero',
        'authority' => 'authority',
        'vsl' => 'vsl',
        'stats' => 'stats',
        'about' => 'about',
        'services' => 'services',
        'process' => 'process',
        'pricing' => 'pricing',
        'testimonials' => 'testimonials',
        'team' => 'team',
        'lead_magnet' => 'lead-magnet',
        'newsletter' => 'newsletter',
        'faq' => 'faq',
        'booking' => 'booking-cta',
    );

    foreach ( $sections as $mod_id => $file_id ) {
        if ( get_theme_mod( "closeclient_show_$mod_id", true ) ) {
            get_template_part( 'template-parts/sections/section', $file_id );
        }
    }
    ?>

</main><!-- #primary -->

<?php
get_footer();
