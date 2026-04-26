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
        $has_content = false;
        while ( have_posts() ) :
            the_post();
            $content = get_the_content();
            if ( ! empty( $content ) ) {
                the_content();
                $has_content = true;
            }
        endwhile;

        // If no editor content is found, show the default modular layout
        if ( ! $has_content ) {
            $sections = array(
                'hero', 'authority', 'vsl', 'stats', 'about', 'services',
                'process', 'pricing', 'testimonials', 'team',
                'lead_magnet', 'newsletter', 'faq', 'booking_cta'
            );

            foreach ( $sections as $section ) {
                if ( get_theme_mod( "closeclient_show_$section", true ) ) {
                    get_template_part( 'template-parts/sections/section-' . str_replace('_', '-', $section) );
                }
            }
        }
        ?>

	</main><!-- #main -->

<?php
get_footer();
