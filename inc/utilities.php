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
        'closeclient_primary_color'    => '#1D1D1F',
        'closeclient_secondary_color'  => '#F5F5F7',
        'closeclient_accent_color'     => '#0071E3',
        'closeclient_text_color'       => '#1D1D1F',
        'closeclient_bg_color'         => '#FFFFFF',
        'closeclient_button_color'     => '#0071E3',
        'closeclient_button_hover'     => '#0077ED',
        'closeclient_heading_font'     => 'SF Pro Display',
        'closeclient_body_font'        => 'SF Pro Display',
        'closeclient_h1_size'          => '4.5',
        'closeclient_body_size'        => '18',
        'closeclient_line_height'      => '1.6',
        'closeclient_letter_spacing'   => '-0.022',
        'closeclient_hero_headline'    => 'Scale Your Authority. Sell Your Expertise.',
        'closeclient_hero_subheadline' => 'I help high-level coaches and consultants build elite digital platforms that turn visitors into high-ticket clients on autopilot.',
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

    // Clean up default Hello World post
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
