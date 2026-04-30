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
        'closeclient_vsl_headline'     => 'The Big Domino: Why Your Expert Business is Stalled (And How to Fix It)',
        'closeclient_vsl_tag'          => 'EXCLUSIVE TRAINING',
        'closeclient_authority_tag'    => 'POWERING WORLD-CLASS AUTHORITIES',
        'closeclient_portfolio_headline' => 'Our Engineered Success Stories',
        'closeclient_portfolio_tag'    => 'FEATURED WORK',
        'closeclient_portfolio_btn'    => 'View Case Study',
        'closeclient_about_headline_home' => 'Stop Chasing. Start Leading.',
        'closeclient_about_tag_home'   => 'THE VISION',
        'closeclient_services_headline' => 'The Architecture of Dominance',
        'closeclient_services_tag'     => 'SERVICES',
        'closeclient_products_headline' => 'Essential Tools That Work as Hard as You Do',
        'closeclient_products_tag'     => 'ECOSYSTEM TOOLS',
        'closeclient_products_subheadline' => 'Themes and plugins trusted by elite coaches to streamline operations and elevate branding.',
        'closeclient_process_headline'  => 'The Authority Roadmap',
        'closeclient_process_tag'       => 'OUR PROCESS',
        'closeclient_pricing_headline'  => 'Investment Opportunities',
        'closeclient_pricing_tag'       => 'INVESTMENT',
        'closeclient_pricing_btn'       => 'Secure Your Spot',
        'closeclient_testimonials_headline' => 'Elite Success Stories',
        'closeclient_testimonials_tag'  => 'SOCIAL PROOF',
        'closeclient_team_headline'     => 'The Authority Architects',
        'closeclient_team_tag'          => 'MEET THE TEAM',
        'closeclient_faq_headline'      => 'Frequently Asked Questions',
        'closeclient_faq_tag'           => 'FAQ',
        'closeclient_stats_tag'         => 'OUR IMPACT',
        'closeclient_booking_headline'  => 'Are You Ready to Scale Beyond Your Current Ceiling?',
        'closeclient_booking_subheadline' => 'We only partner with 3 new experts per month to ensure elite-level execution. If you are ready to automate your authority, let\'s talk.',
        'closeclient_booking_text'      => 'Book Your Scaling Audit',
        'closeclient_booking_note'      => 'Current Waiting List: 14 Days',
        'closeclient_booking_link'      => '#audit',
        'closeclient_about_button_text' => 'Learn More About My Story',
        'closeclient_newsletter_title'  => 'Join the Authority Circle',
        'closeclient_newsletter_text'   => 'Weekly insights on authority positioning, high-ticket sales, and scaling systems for coaches.',
        'closeclient_newsletter_button' => 'Subscribe Now',
        'closeclient_newsletter_disclaimer' => 'No spam. Just value. Unsubscribe anytime.',

        // Global UI Labels
        'closeclient_label_search'          => 'SEARCH RESULTS',
        'closeclient_label_archive'         => 'ARCHIVE',
        'closeclient_label_service_single'  => 'SERVICE DETAIL',
        'closeclient_label_portfolio_single'=> 'CASE STUDY',
        'closeclient_label_portfolio_archive_tag'   => 'CASE STUDIES',
        'closeclient_label_portfolio_archive_title' => 'Engineered Success Stories',
        'closeclient_label_portfolio_archive_desc'  => 'Deep dives into how we transform expert knowledge into high-performance authority machines.',
        'closeclient_label_portfolio_btn'           => 'View Case Study',
        'closeclient_label_service_archive_tag'     => 'OUR CAPABILITIES',
        'closeclient_label_service_archive_title'   => 'Strategic Systems',
        'closeclient_label_service_btn'             => 'System Details →',
        'closeclient_label_challenge'       => '01. The Challenge',
        'closeclient_label_solution'        => '02. The Authority Architecture',
        'closeclient_label_outcome'         => '03. The Result',
        'closeclient_label_cta_portfolio'   => 'Get Results Like This →',
        'closeclient_label_read_more'       => 'READ ARTICLE →',
        'closeclient_label_share'           => 'SHARE INSIGHTS:',
        'closeclient_label_related'         => 'More Authority Insights',

        // Menu Labels
        'closeclient_menu_label_services' => 'Services',
        'closeclient_menu_label_cases'    => 'Case Studies',
        'closeclient_menu_label_about'    => 'About',
        'closeclient_menu_label_training' => 'Free Training',
        'closeclient_menu_label_blog'     => 'Blog',
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
        'Revenue Architecture' => 'Transform your website into a high-performance sales associate that pre-qualifies and closes premium clients 24/7.',
        'Authority Positioning' => 'Command the attention of the 1% by positioning your expertise as the only logical solution in a sea of generalists.',
        'Vortex Intake Systems' => 'Filter out the "tire-kickers" and ensure only pre-sold, high-value inquiries ever reach your calendar.',
        'Conversion Engineering' => 'Strategic psychological triggers engineered to accelerate deal velocity and maximize your client lifetime value.'
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
        'Signature Ecosystem'  => array('price' => '$5,997', 'feat' => '1', 'content' => '<ul><li>Everything in Foundation</li><li>Vortex Funnel</li><li>Automated Lead Intake</li></ul>'),
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

        // Strategic Elite Navigation Structure
        $menu_items = array(
            'Solutions'       => 'Services',
            'Success Stories' => 'Case Studies',
            'The Method'      => 'About',
            'Insights'        => 'Home', // Fallback to Home if blog isn't defined, but normally mapped to Blog
        );

        foreach ( $menu_items as $label => $page_title ) {
            if ( isset($pages[$page_title]) ) {
                wp_update_nav_menu_item( $menu_id, 0, array(
                    'menu-item-title'     => $label,
                    'menu-item-object-id' => $pages[$page_title],
                    'menu-item-object'    => 'page',
                    'menu-item-type'      => 'post_type',
                    'menu-item-status'    => 'publish'
                ) );
            }
        }

        // Add custom CTA to menu
        wp_update_nav_menu_item( $menu_id, 0, array(
            'menu-item-title'  => 'Book Audit',
            'menu-item-url'    => '#audit',
            'menu-item-type'   => 'custom',
            'menu-item-status' => 'publish'
        ) );

        $locations = get_theme_mod( 'nav_menu_locations' );
        if ( ! is_array( $locations ) ) { $locations = array(); }
        $locations['menu-1'] = $menu_id;
        set_theme_mod( 'nav_menu_locations', $locations );
    }

    $footer_1_name = 'Footer Solutions';
    if ( ! wp_get_nav_menu_object( $footer_1_name ) ) {
        $f1_id = wp_create_nav_menu( $footer_1_name );
        $f1_items = array( 'Services', 'Products', 'Success Blueprint' );
        foreach ( $f1_items as $title ) {
            if ( isset($pages[$title]) ) {
                wp_update_nav_menu_item( $f1_id, 0, array(
                    'menu-item-title'     => $title,
                    'menu-item-object-id' => $pages[$title],
                    'menu-item-object'    => 'page',
                    'menu-item-type'      => 'post_type',
                    'menu-item-status'    => 'publish'
                ) );
            }
        }
        $locations = get_theme_mod( 'nav_menu_locations' );
        $locations['footer-1'] = $f1_id;
        set_theme_mod( 'nav_menu_locations', $locations );
    }

    $footer_2_name = 'Footer Resources';
    if ( ! wp_get_nav_menu_object( $footer_2_name ) ) {
        $f2_id = wp_create_nav_menu( $footer_2_name );
        $f2_items = array( 'Case Studies', 'Free Training', 'About', 'Contact' );
        foreach ( $f2_items as $title ) {
            if ( isset($pages[$title]) ) {
                wp_update_nav_menu_item( $f2_id, 0, array(
                    'menu-item-title'     => $title,
                    'menu-item-object-id' => $pages[$title],
                    'menu-item-object'    => 'page',
                    'menu-item-type'      => 'post_type',
                    'menu-item-status'    => 'publish'
                ) );
            }
        }
        $locations = get_theme_mod( 'nav_menu_locations' );
        $locations['footer-2'] = $f2_id;
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
