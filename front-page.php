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
    // Hero Section
    get_template_part( 'template-parts/sections/section', 'hero' );

    // Authority / Logo Bar
    get_template_part( 'template-parts/sections/section', 'authority' );

    // About Section
    get_template_part( 'template-parts/sections/section', 'about' );

    // Services Section
    get_template_part( 'template-parts/sections/section', 'services' );

    // Testimonials
    get_template_part( 'template-parts/sections/section', 'testimonials' );

    // Lead Magnet Section
    get_template_part( 'template-parts/sections/section', 'lead-magnet' );

    // FAQ Section
    get_template_part( 'template-parts/sections/section', 'faq' );

    // Booking CTA
    get_template_part( 'template-parts/sections/section', 'booking-cta' );
    ?>

</main><!-- #primary -->

<?php
get_footer();
