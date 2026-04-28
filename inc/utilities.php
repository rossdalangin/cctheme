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
    // 1. Services (Strategic Consultant terms from closeclient.com)
    $services = array(
        'Prospect Conversion Architecture' => 'Visitors are guided into qualified, ready-to-pay clients automatically through strategic psychological triggers.',
        'Market Dominance Positioning'   => 'Positions your firm as the obvious authority in your niche without over-promising or sounding desperate.',
        'Automated Intake & Filtering'   => 'Protects your time and ensures only high-value, pre-qualified inquiries reach your calendar.',
        'Deal Velocity Optimization'     => 'Intelligent follow-up systems that accelerate the decision-making process for premium high-ticket clients.'
    );
    foreach ( $services as $title => $excerpt ) {
        if ( ! get_posts( array( 'post_type' => 'service', 'title' => $title, 'post_status' => 'any' ) ) ) {
            wp_insert_post( array( 'post_type' => 'service', 'post_title' => $title, 'post_excerpt' => $excerpt, 'post_status' => 'publish' ) );
        }
    }

    // 2. FAQs (Addressing Consultant Pain Points)
    $faqs = array(
        'What is a Strategic Client Acquisition Architecture?' => 'It is a specialized digital engine designed to transform your website from a passive brochure into an active associate that pre-qualifies, positions, and closes premium clients automatically.',
        'How does the Authority Audit work?' => 'We uncover the hidden gaps in your positioning, conversion flow, and acquisition strategy, then deliver a prioritized roadmap to attract $10k-$30k engagements.',
        'Why focus on coaches and consultants?' => 'Because experts are often the "best-kept secret." We bridge the gap between your world-class expertise and how the market perceives your value.'
    );
    foreach ( $faqs as $title => $content ) {
        if ( ! get_posts( array( 'post_type' => 'faq', 'title' => $title, 'post_status' => 'any' ) ) ) {
            wp_insert_post( array( 'post_type' => 'faq', 'post_title' => $title, 'post_content' => $content, 'post_status' => 'publish' ) );
        }
    }

    // 3. Testimonials (Consultant outcomes)
    $testimonials = array(
        '42% Revenue Growth' => array('content' => 'Replacing generic coaching language with pain-driven, outcome-focused copy turned our site into a lead machine. The best investment we made this year.', 'rating' => 5),
        'Zero Calender Gaps' => array('content' => 'The system CloseClient built allowed me to step out of the daily DM grind and focus entirely on high-level delivery.', 'rating' => 5),
    );
    foreach ( $testimonials as $title => $data ) {
        if ( ! get_posts( array( 'post_type' => 'testimonial', 'title' => $title, 'post_status' => 'any' ) ) ) {
            $post_id = wp_insert_post( array( 'post_type' => 'testimonial', 'post_title' => $title, 'post_content' => $data['content'], 'post_status' => 'publish' ) );
            update_post_meta( $post_id, '_testimonial_rating', $data['rating'] );
        }
    }

    // 4. Products (Actual Tools from CloseClient.com)
    $products = array(
        'Freelance Flow Pro' => array('desc' => 'High-performance SaaS infrastructure designed to automate the operational lifecycle of virtual assistants and agencies by unifying contracts, proposals, and invoices.', 'price' => '$197'),
        'Agency Nexus'       => array('desc' => 'The all-in-one Agency Operating System built on WordPress to centralize lead capture, project management, and client collaboration into one dashboard.', 'price' => '$497'),
        'CoachPress Theme'   => array('desc' => 'A specialized Authority Site framework engineered to transform coaching expertise into a professional, trust-building online presence.', 'price' => '$297'),
        'Organization Eco System' => array('desc' => 'A revenue-generating digital engine designed for professional associations to transform static networks into active marketplaces.', 'price' => '$997')
    );
    foreach ( $products as $title => $data ) {
        if ( ! get_posts( array( 'post_type' => 'product', 'title' => $title, 'post_status' => 'any' ) ) ) {
            $post_id = wp_insert_post( array( 'post_type' => 'product', 'post_title' => $title, 'post_excerpt' => $data['desc'], 'post_status' => 'publish' ) );
            update_post_meta( $post_id, '_product_price', $data['price'] );
        }
    }

    // 5. Team
    $team = array(
        'Julian Close' => 'Founder & Authority Architect',
        'Sarah Chen'   => 'Lead Conversion Strategist',
        'Marcus Vane'  => 'Revenue Systems Engineer'
    );
    foreach ( $team as $name => $role ) {
        if ( ! get_posts( array( 'post_type' => 'team', 'title' => $name, 'post_status' => 'any' ) ) ) {
            $post_id = wp_insert_post( array( 'post_type' => 'team', 'post_title' => $name, 'post_status' => 'publish' ) );
            update_post_meta( $post_id, '_member_role', $role );
        }
    }

    // 6. Process (The Authority Roadmap)
    $process = array(
        'Authority Audit' => array('desc' => 'We uncover the hidden gaps in your positioning and deliver a clear, prioritized roadmap.', 'order' => 1),
        'Ecosystem Build' => array('desc' => 'Deploying your high-fidelity "Bento" infrastructure and direct-response authority assets.', 'order' => 2),
        'Scale Activation' => array('desc' => 'Launching the Vortex Application Funnel to fill your calendar with $10k+ opportunities.', 'order' => 3)
    );
    foreach ( $process as $title => $data ) {
        if ( ! get_posts( array( 'post_type' => 'process', 'title' => $title, 'post_status' => 'any' ) ) ) {
            $post_id = wp_insert_post( array( 'post_type' => 'process', 'post_title' => $title, 'post_content' => $data['desc'], 'post_status' => 'publish' ) );
            update_post_meta( $post_id, '_step_order', $data['order'] );
        }
    }

    // 7. Portfolio (Directly from CloseClient.com content)
    $portfolio = array(
        'High-Ticket Consultant Rebrand' => array('desc' => 'Transforming a fragmented online presence into an executive advisory platform.', 'challenge' => 'Client had world-class results but a "brochure" website that looked like everyone else.', 'solution' => 'Implemented Elite Positioning and a Vortex intake funnel.', 'outcome' => '42% increase in strategy call quality and $250k in new revenue within 90 days.'),
        'Global Strategic Advisory'   => array('desc' => 'Unified digital infrastructure for a multi-national consulting group.', 'challenge' => 'Lead intake was manual and inconsistent across three timezones.', 'solution' => 'Deployment of Agency Nexus and automated filtering.', 'outcome' => '300% improvement in intake efficiency.')
    );
    foreach ( $portfolio as $title => $data ) {
        if ( ! get_posts( array( 'post_type' => 'portfolio', 'title' => $title, 'post_status' => 'any' ) ) ) {
            $post_id = wp_insert_post( array( 'post_type' => 'portfolio', 'post_title' => $title, 'post_excerpt' => $data['desc'], 'post_status' => 'publish' ) );
            update_post_meta( $post_id, '_portfolio_challenge', $data['challenge'] );
            update_post_meta( $post_id, '_portfolio_solution', $data['solution'] );
            update_post_meta( $post_id, '_portfolio_outcome', $data['outcome'] );
        }
    }

    // 8. Pricing
    $pricing = array(
        'Authority Foundation' => array('price' => '$2,997', 'feat' => '0', 'content' => '<ul><li>Complete Authority Audit</li><li>Digital Infrastructure Build</li><li>Core Direct Response Copy</li></ul>'),
        'Signature Ecosystem'  => array('price' => '$5,997', 'feat' => '1', 'content' => '<ul><li>Everything in Foundation</li><li>Vortex Application Funnel</li><li>Automated Lead Intake</li></ul>'),
        'Legacy Mastery'       => array('price' => '$9,997', 'feat' => '0', 'content' => '<ul><li>Everything in Ecosystem</li><li>Omnipresent Branding</li><li>White-Glove Support</li></ul>')
    );
    foreach ( $pricing as $title => $data ) {
        if ( ! get_posts( array( 'post_type' => 'pricing', 'title' => $title, 'post_status' => 'any' ) ) ) {
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
        'Home' => array('content' => '[closeclient_hero][closeclient_logo_ticker][closeclient_authority][closeclient_stats][closeclient_portfolio][closeclient_services][closeclient_products][closeclient_vsl][closeclient_process][closeclient_testimonials][closeclient_pricing][closeclient_faq][closeclient_booking_cta]', 'template' => ''),
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
        if ( ! is_array( $locations ) ) { $locations = array(); }
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
