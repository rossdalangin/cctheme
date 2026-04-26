<?php
/**
 * Shortcodes for CloseClient sections
 *
 * @package CloseClient
 */

function closeclient_register_section_shortcodes() {
    $sections = array(
        'hero', 'authority', 'vsl', 'stats', 'about', 'services',
        'process', 'pricing', 'testimonials', 'team',
        'lead_magnet', 'newsletter', 'faq', 'booking_cta'
    );

    foreach ( $sections as $section ) {
        add_shortcode( 'closeclient_' . $section, function( $atts ) use ( $section ) {
            ob_start();
            $path = 'template-parts/sections/section-' . str_replace( '_', '-', $section );
            get_template_part( $path );
            return ob_get_clean();
        } );
    }
}
add_action( 'init', 'closeclient_register_section_shortcodes' );
