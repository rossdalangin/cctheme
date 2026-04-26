<?php
/**
 * The template for displaying the front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CloseClient
 */

get_header();
?>

	<main id="primary" class="site-main">

        <?php
        // Output WordPress editor content first
        while ( have_posts() ) :
            the_post();
            the_content();
        endwhile;

        // Output modular homepage sections
        $sections = array(
            'hero', 'authority', 'vsl', 'stats', 'about', 'services',
            'process', 'pricing', 'testimonials', 'team',
            'lead_magnet', 'newsletter', 'faq', 'booking'
        );

        foreach ( $sections as $section ) {
            $section_template = ( 'booking' === $section ) ? 'booking-cta' : str_replace('_', '-', $section);
            if ( get_theme_mod( "closeclient_show_$section", true ) ) {
                get_template_part( 'template-parts/sections/section-' . $section_template );
            }
        }
        ?>

	</main><!-- #main -->

<?php
get_footer();
