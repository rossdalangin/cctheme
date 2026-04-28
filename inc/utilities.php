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
        'closeclient_hero_headline'    => 'Stop Losing High-Value Clients Before You Even Speak to Them',
        'closeclient_hero_subheadline' => 'Your website should act as your top-performing associate: pre-qualifying, positioning, and closing premium clients — automatically.',
        'closeclient_hero_cta'         => 'Request Your Authority Audit →',
        'closeclient_hero_cta_link'    => '#audit',
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
        'Authority Infrastructure' => 'Visitors are guided into qualified, ready-to-pay clients automatically.',
        'Revenue Engineering'     => 'Positions your firm as the obvious authority in your niche without over-promising.',
        'Vortex Funnels'          => 'Protects your time and ensures only high-value inquiries reach your calendar.',
        'Elite Positioning'       => 'Intelligent follow-up accelerates the decision-making process for premium clients.'
    );
    foreach ( $services as $title => $excerpt ) {
        if ( ! get_posts( array( 'post_type' => 'service', 'title' => $title ) ) ) {
            wp_insert_post( array( 'post_type' => 'service', 'post_title' => $title, 'post_excerpt' => $excerpt, 'post_status' => 'publish' ) );
        }
    }

    // 2. FAQs
    $faqs = array(
        'What is a Client Acquisition Architecture?' => 'It is a strategic digital ecosystem designed to pre-qualify, position, and close premium clients without the owner needing to be involved in every step.',
        'How long does the audit take?' => 'We typically deliver your complete authority roadmap within 5-7 business days after our discovery call.',
        'Do you work with new coaches?' => 'We specialize in established experts doing $10k-$30k/mo who want to automate their intake and scale beyond their current ceiling.'
    );
    foreach ( $faqs as $title => $content ) {
        if ( ! get_posts( array( 'post_type' => 'faq', 'title' => $title ) ) ) {
            wp_insert_post( array( 'post_type' => 'faq', 'post_title' => $title, 'post_content' => $content, 'post_status' => 'publish' ) );
        }
    }

    // 3. Testimonials
    $testimonials = array(
        '42% Revenue Increase' => array('content' => 'This website for a high-ticket consultant converts visitors into strategy calls by replacing generic coaching language with pain-driven, outcome-focused copy.', 'rating' => 5),
        'Market Dominance' => array('content' => 'The system CloseClient built allowed me to step out of the daily grind and focus on high-level strategy.', 'rating' => 5),
    );
    foreach ( $testimonials as $title => $data ) {
        if ( ! get_posts( array( 'post_type' => 'testimonial', 'title' => $title ) ) ) {
            $post_id = wp_insert_post( array( 'post_type' => 'testimonial', 'post_title' => $title, 'post_content' => $data['content'], 'post_status' => 'publish' ) );
            update_post_meta( $post_id, '_testimonial_rating', $data['rating'] );
        }
    }

    // 4. Products
    $products = array(
        'Freelance Flow Pro' => 'Bridge the gap between client acquisition and delivery by unifying contracts, proposals, and invoices.',
        'Agency Nexus'       => 'The all-in-one Agency Operating System built directly on WordPress to centralize every aspect of your business.',
        'CoachPress Theme'   => 'A specialized Authority Site framework designed to transform expertise into a trust-building online presence.',
        'Organization Ecosystem' => 'A fully automated, revenue-generating digital engine designed for professional networks and associations.'
    );
    foreach ( $products as $title => $excerpt ) {
        if ( ! get_posts( array( 'post_type' => 'product', 'title' => $title ) ) ) {
            wp_insert_post( array( 'post_type' => 'product', 'post_title' => $title, 'post_excerpt' => $excerpt, 'post_status' => 'publish' ) );
        }
    }

    // 5. Portfolio (Consultant focused)
    $portfolio = array(
        'High-Ticket Strategy Audit' => 'A complete overhaul of authority for a leading executive consultant.',
        'The $1M Consultant Rebrand' => 'Automated lead intake system for a premium business coach.',
        'Digital Ecosystem Deployment' => 'Infrastructure for a global strategic advisory group.'
    );
    foreach ( $portfolio as $title => $excerpt ) {
        if ( ! get_posts( array( 'post_type' => 'portfolio', 'title' => $title ) ) ) {
            wp_insert_post( array( 'post_type' => 'portfolio', 'post_title' => $title, 'post_excerpt' => $excerpt, 'post_status' => 'publish' ) );
        }
    }

    // 6. Pricing
    $pricing = array(
        'Authority Foundation' => array('price' => '$2,997', 'feat' => '0', 'content' => '<ul><li>Positioning Audit</li><li>Authority Infrastructure</li><li>Direct Response Copy</li></ul>'),
        'Signature Ecosystem'  => array('price' => '$5,997', 'feat' => '1', 'content' => '<ul><li>Everything in Foundation</li><li>Vortex Application Funnel</li><li>Automated Lead Intake</li></ul>'),
        'Legacy Mastery'       => array('price' => '$9,997', 'feat' => '0', 'content' => '<ul><li>Everything in Ecosystem</li><li>Omnipresent Branding</li><li>White-Glove Implementation</li></ul>')
    );
    foreach ( $pricing as $title => $data ) {
        if ( ! get_posts( array( 'post_type' => 'pricing', 'title' => $title ) ) ) {
            $post_id = wp_insert_post( array( 'post_type' => 'pricing', 'post_title' => $title, 'post_content' => $data['content'], 'post_status' => 'publish' ) );
            update_post_meta( $post_id, '_plan_price', $data['price'] );
            update_post_meta( $post_id, '_plan_featured', $data['feat'] );
        }
    }
}

/**
 * Generate starter pages with shortcodes.
 */
function closeclient_generate_pages() {
    closeclient_generate_cpt_data();

    $pages = array(
        'Home' => array('content' => '[closeclient_hero][closeclient_authority][closeclient_stats][closeclient_portfolio][closeclient_services][closeclient_products][closeclient_vsl][closeclient_process][closeclient_testimonials][closeclient_pricing][closeclient_faq][closeclient_booking_cta]', 'template' => ''),
        'Services' => array('content' => '[closeclient_hero][closeclient_services][closeclient_process][closeclient_pricing][closeclient_booking_cta]', 'template' => 'template-services.php'),
        'Products' => array('content' => '[closeclient_products][closeclient_booking_cta]', 'template' => ''),
        'Sales Page' => array('content' => '[closeclient_vsl][closeclient_testimonials][closeclient_pricing][closeclient_faq][closeclient_booking_cta]', 'template' => 'template-sales-page.php'),
        'About' => array('content' => '[closeclient_team][closeclient_authority][closeclient_booking_cta]', 'template' => 'template-about.php'),
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
    $primary_menu_name = 'Primary Menu';
    if ( ! wp_get_nav_menu_object( $primary_menu_name ) ) {
        $menu_id = wp_create_nav_menu( $primary_menu_name );
        $menu_items = array( 'Home', 'Services', 'Products', 'Case Studies', 'About' );
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
