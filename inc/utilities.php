<?php
/**
 * Theme Utilities for CloseClient
 *
 * @package CloseClient
 */

/**
 * Reset theme settings to defaults.
 */
function closeclient_reset_defaults() {
    $defaults = array(
        'closeclient_primary_color'    => '#020203',
        'closeclient_secondary_color'  => '#0A0A0B',
        'closeclient_accent_color'     => '#6366F1',
        'closeclient_text_color'       => '#F9FAFB',
        'closeclient_bg_color'         => '#020203',
        'closeclient_button_color'     => '#6366F1',
        'closeclient_button_hover'     => '#4F46E5',
        'closeclient_heading_font'     => 'Inter',
        'closeclient_body_font'        => 'Inter',
        'closeclient_h1_size'          => '7.5',
        'closeclient_body_size'        => '18',
        'closeclient_line_height'      => '1.6',
        'closeclient_letter_spacing'   => '-0.05',
        'closeclient_hero_headline'    => 'Stop Losing High-Value Clients Before You Even Open Your Mouth.',
        'closeclient_hero_subheadline' => 'Most websites are just expensive brochures. We build "Digital Ecosystems" for coaches and consultants that pre-qualify leads and build instant authority.',
        'closeclient_hero_cta'         => 'Yes! Build My Authority Engine →',
        'closeclient_services_headline' => 'Strategic Architecture for the High-Ticket Economy',
        'closeclient_services_subheadline' => 'WE ENGINEER PATHS TO CONVERSION',
        'closeclient_service_1_title'   => 'Authority Infrastructure',
        'closeclient_service_1_text'    => 'The core digital engine that positions you as the undisputed expert in your market.',
        'closeclient_service_2_title'   => 'Vortex Funnels',
        'closeclient_service_2_text'    => 'High-velocity acquisition systems that turn attention into applications on autopilot.',
        'closeclient_service_3_title'   => 'ScaleOps',
        'closeclient_service_3_text'    => 'Operational dashboards to manage your client flow without the burnout or overhead.',
        'closeclient_process_headline'  => 'The 3-Step Authority Roadmap',
        'closeclient_process_step_1_title' => 'The Authority Audit',
        'closeclient_process_step_1_text'  => 'We find the "leaks" in your current positioning that are draining your revenue.',
        'closeclient_process_step_2_title' => 'The Ecosystem Build',
        'closeclient_process_step_2_text'  => 'We engineer your high-converting platform with psychological authority triggers.',
        'closeclient_process_step_3_title' => 'The Infinite Scale',
        'closeclient_process_step_3_text'  => 'Launch and watch your website become your top-performing sales associate 24/7.',
    );

    foreach ( $defaults as $key => $value ) {
        set_theme_mod( $key, $value );
    }
}

/**
 * Generate starter pages with shortcodes.
 */
function closeclient_generate_pages() {
    $pages = array(
        'Home' => array(
            'content'  => '[closeclient_hero][closeclient_authority][closeclient_vsl][closeclient_stats][closeclient_about][closeclient_services][closeclient_process][closeclient_pricing][closeclient_testimonials][closeclient_team][closeclient_lead_magnet][closeclient_faq][closeclient_booking_cta]',
            'template' => '',
        ),
        'Sales Page' => array(
            'content'  => '[closeclient_hero][closeclient_vsl][closeclient_about][closeclient_services][closeclient_pricing][closeclient_testimonials][closeclient_faq][closeclient_booking_cta]',
            'template' => 'template-sales-page.php',
        ),
        'Lead Magnet' => array(
            'content'  => '[closeclient_lead_magnet]',
            'template' => 'template-lead-magnet.php',
        ),
        'Services' => array(
            'content'  => '[closeclient_services][closeclient_pricing]',
            'template' => 'template-services.php',
        ),
        'About' => array(
            'content'  => '[closeclient_about][closeclient_team]',
            'template' => 'template-about.php',
        ),
        'Contact' => array(
            'content'  => '[closeclient_booking_cta]',
            'template' => 'template-contact.php',
        ),
    );

    foreach ( $pages as $title => $data ) {
        $page_check = get_posts( array(
            'post_type'  => 'page',
            'title'      => $title,
            'numberposts' => 1,
        ) );

        $new_page = array(
            'post_type'    => 'page',
            'post_title'   => $title,
            'post_content' => $data['content'],
            'post_status'  => 'publish',
            'post_author'  => 1,
        );

        if ( empty( $page_check ) ) {
            $page_id = wp_insert_post( $new_page );
            if ( ! empty( $data['template'] ) ) {
                update_post_meta( $page_id, '_wp_page_template', $data['template'] );
            }

            if ( 'Home' === $title ) {
                update_option( 'show_on_front', 'page' );
                update_option( 'page_on_front', $page_id );
            }
        }
    }

    $hello_world = get_posts( array( 'title' => 'Hello world!', 'numberposts' => 1 ) );
    if ( ! empty( $hello_world ) ) {
        wp_delete_post( $hello_world[0]->ID, true );
    }
}

/**
 * Handle Utility Actions
 */
function closeclient_handle_utilities() {
    if ( ! isset( $_GET['closeclient_action'] ) ) {
        return;
    }

    if ( ! current_user_can( 'manage_options' ) ) {
        wp_die( esc_html__( 'You do not have sufficient permissions to access this page.', 'closeclient' ) );
    }

    if ( ! isset( $_GET['_wpnonce'] ) || ! wp_verify_nonce( $_GET['_wpnonce'], 'closeclient_utility_action' ) ) {
        wp_die( esc_html__( 'Security check failed.', 'closeclient' ) );
    }

    $action = sanitize_text_field( $_GET['closeclient_action'] );

    if ( 'reset' === $action ) {
        closeclient_reset_defaults();
        wp_redirect( admin_url( 'customize.php?closeclient_msg=reset_success' ) );
        exit;
    }

    if ( 'generate' === $action ) {
        closeclient_generate_pages();
        wp_redirect( admin_url( 'edit.php?post_type=page&closeclient_msg=gen_success' ) );
        exit;
    }
}
add_action( 'admin_init', 'closeclient_handle_utilities' );
