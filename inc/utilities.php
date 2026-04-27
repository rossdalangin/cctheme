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
        'closeclient_h1_size'          => '4.5',
        'closeclient_body_size'        => '18',
        'closeclient_line_height'      => '1.6',
        'closeclient_letter_spacing'   => '-0.022',
        'closeclient_hero_headline'    => 'Design the Future of Digital Authority',
        'closeclient_hero_subheadline' => 'We build the elite infrastructure that powers the world\'s most ambitious brands and consultants. Performance-first, conversion-locked, and future-ready.',
        'closeclient_hero_cta'         => 'Apply for Strategy Audit →',
    );

    foreach ( $defaults as $key => $value ) {
        set_theme_mod( $key, $value );
    }
}

/**
 * Generate starter data for CPTs.
 */
function closeclient_generate_cpt_data() {
    // 1. Services
    $services = array(
        'Authority Infrastructure' => 'We build the foundation of your digital dominance.',
        'Revenue Engineering'     => 'Optimizing your sales process for high-ticket scale.',
        'Vortex Funnels'          => 'Automated application systems that pre-qualify every lead.',
        'Elite Positioning'       => 'Moving you from commodity service provider to category king.'
    );
    foreach ( $services as $title => $excerpt ) {
        if ( ! get_posts( array( 'post_type' => 'service', 'title' => $title ) ) ) {
            wp_insert_post( array( 'post_type' => 'service', 'post_title' => $title, 'post_excerpt' => $excerpt, 'post_status' => 'publish' ) );
        }
    }

    // 2. FAQs
    $faqs = array(
        'How long does the implementation take?' => 'Typically 4-6 weeks for full infrastructure deployment.',
        'Is this for new coaches or established experts?' => 'We focus on experts already doing $10k/mo who want to scale beyond themselves.',
        'Do you provide the copywriting?' => 'Yes, our team handles all direct-response copy for the funnels.'
    );
    foreach ( $faqs as $title => $content ) {
        if ( ! get_posts( array( 'post_type' => 'faq', 'title' => $title ) ) ) {
            wp_insert_post( array( 'post_type' => 'faq', 'post_title' => $title, 'post_content' => $content, 'post_status' => 'publish' ) );
        }
    }

    // 3. Testimonials
    $testimonials = array(
        'Scaled to $100k/mo' => 'The system CloseClient built allowed me to step out of the daily grind and focus on high-level strategy.',
        'Best investment of the year' => 'Finally, a website that actually sells my expertise before I even hop on a call.',
        'Predictable Pipeline' => 'I no longer worry about where my next high-ticket client is coming from.'
    );
    foreach ( $testimonials as $title => $content ) {
        if ( ! get_posts( array( 'post_type' => 'testimonial', 'post_title' => $title ) ) ) {
            wp_insert_post( array( 'post_type' => 'testimonial', 'post_title' => $title, 'post_content' => $content, 'post_status' => 'publish' ) );
        }
    }

    // 4. Portfolio
    $portfolio = array(
        'The $1M Consultant Rebrand' => 'A complete overhaul of authority for a leading SaaS consultant.',
        'High-Ticket Coach Funnel'   => 'Automated lead intake system for a premium business coach.',
        'Global Advisory Platform'   => 'Digital infrastructure for a multi-national strategic advisory group.'
    );
    foreach ( $portfolio as $title => $excerpt ) {
        if ( ! get_posts( array( 'post_type' => 'portfolio', 'title' => $title ) ) ) {
            wp_insert_post( array( 'post_type' => 'portfolio', 'post_title' => $title, 'post_excerpt' => $excerpt, 'post_status' => 'publish' ) );
        }
    }
}

/**
 * Generate starter pages with shortcodes.
 */
function closeclient_generate_pages() {
    // Generate CPT Data first
    closeclient_generate_cpt_data();

    $pages = array(
        'Home' => array(
            'content'  => '[closeclient_hero][closeclient_authority][closeclient_vsl][closeclient_stats][closeclient_services][closeclient_process][closeclient_testimonials][closeclient_pricing][closeclient_faq][closeclient_booking_cta]',
            'template' => '',
        ),
        'Services' => array(
            'content'  => '[closeclient_services][closeclient_process][closeclient_pricing][closeclient_booking_cta]',
            'template' => 'template-services.php',
        ),
        'Sales Page' => array(
            'content'  => '[closeclient_vsl][closeclient_testimonials][closeclient_pricing][closeclient_faq][closeclient_booking_cta]',
            'template' => 'template-sales-page.php',
        ),
        'About' => array(
            'content'  => '[closeclient_team][closeclient_authority][closeclient_booking_cta]',
            'template' => 'template-about.php',
        ),
        'Free Training' => array(
            'content'  => '[closeclient_vsl][closeclient_booking_cta]',
            'template' => 'template-landing-page.php',
        ),
        'Success Blueprint' => array(
            'content'  => '[closeclient_lead_magnet]',
            'template' => 'template-lead-magnet.php',
        ),
        'Case Studies' => array(
            'content'  => '[closeclient_portfolio][closeclient_testimonials][closeclient_booking_cta]',
            'template' => '',
        ),
        'Contact' => array(
            'content'  => '[closeclient_booking_cta]',
            'template' => 'template-contact.php',
        ),
        'Privacy Policy' => array(
            'content'  => 'Your privacy is important to us. [Standard Privacy Text Here]',
            'template' => '',
        ),
        'Terms of Service' => array(
            'content'  => 'By using our services, you agree to the following terms. [Standard Terms Text Here]',
            'template' => '',
        ),
    );

    $inserted_pages = array();

    foreach ( $pages as $title => $data ) {
        $page_check = get_posts( array(
            'post_type'  => 'page',
            'title'      => $title,
            'numberposts' => 1,
            'post_status' => 'any'
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
        } else {
            $page_id = $page_check[0]->ID;
            $new_page['ID'] = $page_id;
            wp_update_post( $new_page );
        }

        $inserted_pages[$title] = $page_id;

        if ( ! empty( $data['template'] ) ) {
            update_post_meta( $page_id, '_wp_page_template', $data['template'] );
        }

        if ( 'Home' === $title ) {
            update_option( 'show_on_front', 'page' );
            update_option( 'page_on_front', $page_id );
        }
    }

    // Generate Menus
    closeclient_setup_menus($inserted_pages);

    $hello_world = get_posts( array( 'title' => 'Hello world!', 'numberposts' => 1, 'post_type' => 'post' ) );
    if ( ! empty( $hello_world ) ) {
        wp_delete_post( $hello_world[0]->ID, true );
    }
}

/**
 * Setup Menus
 */
function closeclient_setup_menus($pages) {
    // 1. Primary Menu
    $primary_menu_name = 'Primary Menu';
    $primary_menu_exists = wp_get_nav_menu_object( $primary_menu_name );
    if ( ! $primary_menu_exists ) {
        $menu_id = wp_create_nav_menu( $primary_menu_name );
        $menu_items = array( 'Home', 'Services', 'Case Studies', 'About' );
        foreach ( $menu_items as $title ) {
            if ( isset($pages[$title]) ) {
                wp_update_nav_menu_item( $menu_id, 0, array(
                    'menu-item-title'     => $title,
                    'menu-item-object-id' => $pages[$title],
                    'menu-item-object'    => 'page',
                    'menu-item-type'      => 'post_type',
                    'menu-item-status'    => 'publish',
                ) );
            }
        }
        $locations = get_theme_mod( 'nav_menu_locations' );
        $locations['menu-1'] = $menu_id;
        set_theme_mod( 'nav_menu_locations', $locations );
    }

    // 2. Footer Solutions
    $footer_sol_name = 'Footer Solutions';
    if ( ! wp_get_nav_menu_object( $footer_sol_name ) ) {
        $menu_id = wp_create_nav_menu( $footer_sol_name );
        wp_update_nav_menu_item( $menu_id, 0, array( 'menu-item-title' => 'Authority Infrastructure', 'menu-item-url' => '#', 'menu-item-status' => 'publish' ) );
        wp_update_nav_menu_item( $menu_id, 0, array( 'menu-item-title' => 'Revenue Engineering', 'menu-item-url' => '#', 'menu-item-status' => 'publish' ) );
        $locations = get_theme_mod( 'nav_menu_locations' );
        $locations['footer-1'] = $menu_id;
        set_theme_mod( 'nav_menu_locations', $locations );
    }

    // 3. Footer Resources
    $footer_res_name = 'Footer Resources';
    if ( ! wp_get_nav_menu_object( $footer_res_name ) ) {
        $menu_id = wp_create_nav_menu( $footer_res_name );
        foreach ( array('Case Studies', 'Free Training', 'Success Blueprint') as $title ) {
            if ( isset($pages[$title]) ) {
                wp_update_nav_menu_item( $menu_id, 0, array( 'menu-item-title' => $title, 'menu-item-object-id' => $pages[$title], 'menu-item-object' => 'page', 'menu-item-type' => 'post_type', 'menu-item-status' => 'publish' ) );
            }
        }
        $locations = get_theme_mod( 'nav_menu_locations' );
        $locations['footer-2'] = $menu_id;
        set_theme_mod( 'nav_menu_locations', $locations );
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
