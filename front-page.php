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

        // Check if we are viewing a static page set as front page
        if ( is_front_page() && ! is_home() ) {
            while ( have_posts() ) :
                the_post();
                $content = get_the_content();
                // Check for empty content or standard WP block boilerplate
                if ( ! empty( $content ) && ! str_contains( $content, 'Welcome to WordPress' ) ) {
                    the_content();
                    $has_content = true;
                }
            endwhile;
        }

        // Fallback to modular layout if no static page content is found
        if ( ! $has_content ) {
            // Optimized Authority Funnel Sequence: Only one terminal CTA (Booking)
            $sections = array(
                'hero', 'logo_ticker', 'authority', 'vsl', 'stats', 'portfolio', 'about', 'services',
                'products', 'process', 'pricing', 'testimonials', 'team', 'faq', 'booking_cta'
            );

            foreach ( $sections as $section ) {
                $show_key = 'closeclient_show_' . ( 'booking_cta' === $section ? 'booking' : $section );
                if ( get_theme_mod( $show_key, true ) ) {
                    get_template_part( 'template-parts/sections/section-' . str_replace('_', '-', $section) );
                }
            }
        }
        ?>

	</main><!-- #main -->

<?php
get_footer();
