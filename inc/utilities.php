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
        'Scaled to $100k/mo' => array('content' => 'The system CloseClient built allowed me to step out of the daily grind.', 'rating' => 5),
        'Best investment' => array('content' => 'Finally, a website that actually sells my expertise.', 'rating' => 5),
    );
    foreach ( $testimonials as $title => $data ) {
        if ( ! get_posts( array( 'post_type' => 'testimonial', 'title' => $title ) ) ) {
            $post_id = wp_insert_post( array( 'post_type' => 'testimonial', 'post_title' => $title, 'post_content' => $data['content'], 'post_status' => 'publish' ) );
            update_post_meta( $post_id, '_testimonial_rating', $data['rating'] );
        }
    }

    // 4. Team
    $team = array(
        'Alex Rivers' => 'Founder & Chief Architect',
        'Sarah Chen'  => 'Lead Conversion Strategist',
        'Marcus Vane' => 'Revenue Engineer'
    );
    foreach ( $team as $name => $role ) {
        if ( ! get_posts( array( 'post_type' => 'team', 'title' => $name ) ) ) {
            $post_id = wp_insert_post( array( 'post_type' => 'team', 'post_title' => $name, 'post_status' => 'publish' ) );
            update_post_meta( $post_id, '_member_role', $role );
        }
    }

    // 5. Process
    $process = array(
        'Authority Audit' => array('desc' => 'We diagnose your current positioning gaps.', 'order' => 1),
        'Infrastructure Build' => array('desc' => 'Deploying your elite digital ecosystem.', 'order' => 2),
        'Scale Activation' => array('desc' => 'Launching the vortex application system.', 'order' => 3)
    );
    foreach ( $process as $title => $data ) {
        if ( ! get_posts( array( 'post_type' => 'process', 'title' => $title ) ) ) {
            $post_id = wp_insert_post( array( 'post_type' => 'process', 'post_title' => $title, 'post_content' => $data['desc'], 'post_status' => 'publish' ) );
            update_post_meta( $post_id, '_step_order', $data['order'] );
        }
    }
}

/**
 * Generate starter pages with shortcodes.
 */
function closeclient_generate_pages() {
    closeclient_generate_cpt_data();

    $pages = array(
        'Home' => array('content' => '[closeclient_hero][closeclient_authority][closeclient_vsl][closeclient_stats][closeclient_services][closeclient_process][closeclient_testimonials][closeclient_pricing][closeclient_faq][closeclient_booking_cta]', 'template' => ''),
        'Services' => array('content' => '[closeclient_services][closeclient_process][closeclient_pricing][closeclient_booking_cta]', 'template' => 'template-services.php'),
        'Sales Page' => array('content' => '[closeclient_vsl][closeclient_testimonials][closeclient_pricing][closeclient_faq][closeclient_booking_cta]', 'template' => 'template-sales-page.php'),
        'About' => array('content' => '[closeclient_about][closeclient_team][closeclient_authority][closeclient_booking_cta]', 'template' => 'template-about.php'),
        'Free Training' => array('content' => '[closeclient_vsl][closeclient_booking_cta]', 'template' => 'template-landing-page.php'),
        'Success Blueprint' => array('content' => '[closeclient_lead_magnet]', 'template' => 'template-lead-magnet.php'),
        'Case Studies' => array('content' => '[closeclient_portfolio][closeclient_testimonials][closeclient_booking_cta]', 'template' => ''),
        'Contact' => array('content' => '[closeclient_booking_cta]', 'template' => 'template-contact.php'),
    );

    $inserted_pages = array();
    foreach ( $pages as $title => $data ) {
        $page_check = get_posts( array('post_type' => 'page', 'title' => $title, 'numberposts' => 1, 'post_status' => 'any') );
        $new_page = array('post_type' => 'page', 'post_title' => $title, 'post_content' => $data['content'], 'post_status' => 'publish', 'post_author' => 1);

        if ( empty( $page_check ) ) {
            $page_id = wp_insert_post( $new_page );
        } else {
            $page_id = $page_check[0]->ID;
            $new_page['ID'] = $page_id;
            wp_update_post( $new_page );
        }

        $inserted_pages[$title] = $page_id;
        if ( ! empty( $data['template'] ) ) update_post_meta( $page_id, '_wp_page_template', $data['template'] );
        if ( 'Home' === $title ) {
            update_option( 'show_on_front', 'page' );
            update_option( 'page_on_front', $page_id );
        }
    }

    closeclient_setup_menus($inserted_pages);

    $hello_world = get_posts( array( 'title' => 'Hello world!', 'numberposts' => 1, 'post_type' => 'post' ) );
    if ( ! empty( $hello_world ) ) wp_delete_post( $hello_world[0]->ID, true );
}

/**
 * Setup Menus
 */
function closeclient_setup_menus($pages) {
    // Primary Menu
    $primary_menu_name = 'Primary Menu';
    if ( ! wp_get_nav_menu_object( $primary_menu_name ) ) {
        $menu_id = wp_create_nav_menu( $primary_menu_name );
        $menu_items = array( 'Home', 'Services', 'Case Studies', 'About' );
        foreach ( $menu_items as $title ) {
            if ( isset($pages[$title]) ) {
                wp_update_nav_menu_item( $menu_id, 0, array('menu-item-title' => $title, 'menu-item-object-id' => $pages[$title], 'menu-item-object' => 'page', 'menu-item-type' => 'post_type', 'menu-item-status' => 'publish') );
            }
        }
        $locations = get_theme_mod( 'nav_menu_locations' );
        $locations['menu-1'] = $menu_id;
        set_theme_mod( 'nav_menu_locations', $locations );
    }
}

/**
 * Handle Utility Actions
 */
function closeclient_handle_utilities() {
    if ( ! isset( $_GET['closeclient_action'] ) ) return;
    if ( ! current_user_can( 'manage_options' ) ) wp_die( esc_html__( 'Insufficient permissions.', 'closeclient' ) );
    if ( ! isset( $_GET['_wpnonce'] ) || ! wp_verify_nonce( $_GET['_wpnonce'], 'closeclient_utility_action' ) ) wp_die( esc_html__( 'Security check failed.', 'closeclient' ) );

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
