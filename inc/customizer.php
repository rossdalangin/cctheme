<?php
/**
 * CloseClient Customizer functionality
 *
 * @package CloseClient
 */

function closeclient_customize_register( $wp_customize ) {

    // ==========================================
    // PANELS
    // ==========================================

    $wp_customize->add_panel( 'closeclient_brand_panel', array(
        'title'       => __( '1. Elite Brand Identity', 'closeclient' ),
        'description' => __( 'Manage your high-ticket visual ecosystem and authority assets.', 'closeclient' ),
        'priority'    => 10,
    ) );

    $wp_customize->add_panel( 'closeclient_layout_panel', array(
        'title'       => __( '2. Strategic Layout Control', 'closeclient' ),
        'description' => __( 'Configure the structural architecture of your digital headquarters.', 'closeclient' ),
        'priority'    => 20,
    ) );

    $wp_customize->add_panel( 'closeclient_homepage_panel', array(
        'title'       => __( '3. Homepage Sections', 'closeclient' ),
        'priority'    => 30,
    ) );

    $wp_customize->add_panel( 'closeclient_pages_panel', array(
        'title'    => __( '4. Page Templates', 'closeclient' ),
        'priority' => 40,
    ) );

    $wp_customize->add_section( 'closeclient_portfolio_content', array( 'title' => '15. Portfolio Content', 'panel' => 'closeclient_homepage_panel' ) );
    $wp_customize->add_setting( 'closeclient_portfolio_headline', array( 'default' => 'Our Engineered Success Stories', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_portfolio_headline', array( 'label' => 'Headline', 'section' => 'closeclient_portfolio_content' ) );
    $wp_customize->add_setting( 'closeclient_portfolio_tag', array( 'default' => 'FEATURED WORK', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_portfolio_tag', array( 'label' => 'Tag', 'section' => 'closeclient_portfolio_content' ) );

    $wp_customize->add_section( 'closeclient_utilities_section', array(
        'title'    => __( '5. Theme Setup & Tools', 'closeclient' ),
        'priority' => 50,
    ) );

    $wp_customize->add_setting( 'closeclient_guide_link', array( 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'closeclient_guide_link', array(
        'label'       => __( 'Theme Guide & Shortcodes', 'closeclient' ),
        'description' => sprintf( '<a href="%s" class="cc-button cc-button-secondary" target="_blank">%s</a>', admin_url('admin.php?page=closeclient-shortcodes'), __( 'Open Master Guide', 'closeclient' ) ),
        'section'     => 'closeclient_utilities_section',
        'type'        => 'hidden',
    ) ) );

    // ==========================================
    // 1. BRAND IDENTITY
    // ==========================================

    // Colors
    $wp_customize->add_section( 'closeclient_colors', array(
        'title'    => __( 'Theme Colors', 'closeclient' ),
        'panel'    => 'closeclient_brand_panel',
    ) );

    $wp_customize->add_setting( 'closeclient_color_preset', array( 'default' => 'deep-onyx', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_color_preset', array(
        'label'    => 'Color Scheme Preset',
        'section'  => 'closeclient_colors',
        'type'     => 'select',
        'choices'  => array(
            'deep-onyx'     => 'Deep Onyx (Default)',
            'royal-indigo'  => 'Royal Indigo',
            'forest-expert' => 'Forest Expert',
            'midnight-gold' => 'Midnight Gold'
        )
    ) );

    $colors = array(
        'primary_color'    => array( 'label' => __( 'Primary Color', 'closeclient' ), 'default' => '#020203' ),
        'secondary_color'  => array( 'label' => __( 'Secondary Color', 'closeclient' ), 'default' => '#0A0A0B' ),
        'accent_color'     => array( 'label' => __( 'Accent Color', 'closeclient' ), 'default' => '#6366F1' ),
        'text_color'       => array( 'label' => __( 'Text Color', 'closeclient' ), 'default' => '#F9FAFB' ),
        'bg_color'         => array( 'label' => __( 'Background Color', 'closeclient' ), 'default' => '#020203' ),
        'button_color'     => array( 'label' => __( 'Button Background', 'closeclient' ), 'default' => '#6366F1' ),
        'button_hover'     => array( 'label' => __( 'Button Hover', 'closeclient' ), 'default' => '#4F46E5' ),
    );

    foreach ( $colors as $id => $data ) {
        $wp_customize->add_setting( "closeclient_{$id}", array(
            'default'           => $data['default'],
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage',
        ) );

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, "closeclient_{$id}", array(
            'label'    => $data['label'],
            'section'  => 'closeclient_colors',
        ) ) );
    }

    // Typography
    $wp_customize->add_section( 'closeclient_typography', array(
        'title'    => __( 'Typography & Fonts', 'closeclient' ),
        'panel'    => 'closeclient_brand_panel',
    ) );

    $typography = array(
        'heading_font' => array( 'label' => 'Heading Font', 'default' => 'Inter', 'type' => 'select', 'choices' => array('Inter' => 'Inter', 'SF Pro Display' => 'SF Pro Display', 'Playfair Display' => 'Playfair Display', 'Montserrat' => 'Montserrat') ),
        'body_font'    => array( 'label' => 'Body Font', 'default' => 'Inter', 'type' => 'select', 'choices' => array('Inter' => 'Inter', 'SF Pro Display' => 'SF Pro Display', 'Open Sans' => 'Open Sans') ),
        'h1_size'      => array( 'label' => 'H1 Max Size (rem)', 'default' => '4.5', 'type' => 'text' ),
        'h1_weight'    => array( 'label' => 'H1 Weight', 'default' => '700', 'type' => 'select', 'choices' => array('400'=>'400','600'=>'600','700'=>'700','800'=>'800') ),
        'body_size'    => array( 'label' => 'Body Size (px)', 'default' => '18', 'type' => 'number' ),
        'body_weight'  => array( 'label' => 'Body Weight', 'default' => '400', 'type' => 'select', 'choices' => array('300'=>'300','400'=>'400','500'=>'500','600'=>'600') ),
        'line_height'  => array( 'label' => 'Line Height', 'default' => '1.6', 'type' => 'text' ),
        'letter_spacing'=> array( 'label' => 'Letter Spacing (em)', 'default' => '-0.022', 'type' => 'text' ),
    );

    foreach ( $typography as $id => $data ) {
        $wp_customize->add_setting( "closeclient_{$id}", array(
            'default'           => $data['default'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        ) );

        $wp_customize->add_control( "closeclient_{$id}", array(
            'label'    => $data['label'],
            'section'  => 'closeclient_typography',
            'type'     => $data['type'],
            'choices'  => isset($data['choices']) ? $data['choices'] : null,
        ) );
    }

    // ==========================================
    // 2. SITE LAYOUT & GLOBAL
    // ==========================================

    // Site Layout
    $wp_customize->add_section( 'closeclient_site_layout', array(
        'title'    => __( 'Site Layout Settings', 'closeclient' ),
        'panel'    => 'closeclient_layout_panel',
    ) );

    $wp_customize->add_setting( 'closeclient_show_preloader', array( 'default' => true, 'sanitize_callback' => 'absint' ) );
    $wp_customize->add_control( 'closeclient_show_preloader', array( 'label' => 'Show Preloader Animation', 'section' => 'closeclient_site_layout', 'type' => 'checkbox' ) );

    $wp_customize->add_setting( 'closeclient_site_layout_type', array( 'default' => 'full-width', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_site_layout_type', array( 'label' => 'Layout Type', 'section' => 'closeclient_site_layout', 'type' => 'radio', 'choices' => array('full-width' => 'Full Width', 'boxed' => 'Boxed') ) );
    $wp_customize->add_setting( 'closeclient_container_width', array( 'default' => '1200', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_container_width', array( 'label' => 'Container Max Width (px)', 'section' => 'closeclient_site_layout', 'type' => 'number' ) );

    $wp_customize->add_setting( 'closeclient_content_width', array( 'default' => '800', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_content_width', array( 'label' => 'Content Max Width (px)', 'section' => 'closeclient_site_layout', 'type' => 'number' ) );
    $wp_customize->add_setting( 'closeclient_default_layout', array( 'default' => 'right-sidebar', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_default_layout', array( 'label' => 'Content Sidebar', 'section' => 'closeclient_site_layout', 'type' => 'radio', 'choices' => array('full-width' => 'No Sidebar', 'right-sidebar' => 'Right Sidebar', 'left-sidebar' => 'Left Sidebar') ) );

    // Header & Navigation
    $wp_customize->add_section( 'closeclient_header_settings', array( 'title' => 'Header & Navigation', 'panel' => 'closeclient_layout_panel' ) );

    $wp_customize->add_setting( 'closeclient_header_sticky', array( 'default' => true, 'sanitize_callback' => 'absint' ) );
    $wp_customize->add_control( 'closeclient_header_sticky', array( 'label' => 'Sticky Header', 'section' => 'closeclient_header_settings', 'type' => 'checkbox' ) );

    $wp_customize->add_setting( 'closeclient_header_glass', array( 'default' => '0.7', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_header_glass', array( 'label' => 'Glass Opacity (0.1 to 1.0)', 'section' => 'closeclient_header_settings', 'type' => 'text' ) );

    $wp_customize->add_setting( 'closeclient_show_floating_cta', array( 'default' => false, 'sanitize_callback' => 'absint' ) );
    $wp_customize->add_control( 'closeclient_show_floating_cta', array( 'label' => 'Show Floating Action Button', 'section' => 'closeclient_header_settings', 'type' => 'checkbox' ) );

    $wp_customize->add_setting( 'closeclient_floating_cta_threshold', array( 'default' => '500', 'sanitize_callback' => 'absint' ) );
    $wp_customize->add_control( 'closeclient_floating_cta_threshold', array(
        'label'       => 'Floating CTA Scroll Threshold (px)',
        'description' => 'Pixel depth before the button appears.',
        'section'     => 'closeclient_header_settings',
        'type'        => 'number'
    ) );

    $wp_customize->add_setting( 'closeclient_header_cta_text', array( 'default' => 'Book a Call', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_header_cta_text', array( 'label' => 'Header Button Text', 'section' => 'closeclient_header_settings' ) );
    $wp_customize->add_setting( 'closeclient_header_cta_link', array( 'default' => '#audit', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_header_cta_link', array( 'label' => 'Header Button Link', 'section' => 'closeclient_header_settings' ) );

    // Footer Content
    $wp_customize->add_section( 'closeclient_footer_settings', array( 'title' => 'Footer Content', 'panel' => 'closeclient_layout_panel' ) );

    $wp_customize->add_setting( 'closeclient_footer_glass', array( 'default' => false, 'sanitize_callback' => 'absint' ) );
    $wp_customize->add_control( 'closeclient_footer_glass', array( 'label' => 'Use Glassmorphism Footer', 'section' => 'closeclient_footer_settings', 'type' => 'checkbox' ) );

    $wp_customize->add_setting( 'closeclient_footer_about', array( 'default' => 'Engineering the future of digital authority for elite coaches and consultants.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
    $wp_customize->add_control( 'closeclient_footer_about', array( 'label' => 'Footer About Text', 'section' => 'closeclient_footer_settings', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'closeclient_footer_col2_title', array( 'default' => 'Solutions', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_footer_col2_title', array( 'label' => 'Column 2 Title', 'section' => 'closeclient_footer_settings' ) );

    $wp_customize->add_setting( 'closeclient_footer_col3_title', array( 'default' => 'Resources', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_footer_col3_title', array( 'label' => 'Column 3 Title', 'section' => 'closeclient_footer_settings' ) );

    $wp_customize->add_setting( 'closeclient_footer_col4_title', array( 'default' => 'Connect', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_footer_col4_title', array( 'label' => 'Column 4 Title', 'section' => 'closeclient_footer_settings' ) );

    $wp_customize->add_setting( 'closeclient_footer_copyright', array( 'default' => '© ' . date('Y') . ' CloseClient. All rights reserved.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_footer_copyright', array( 'label' => 'Copyright Text', 'section' => 'closeclient_footer_settings' ) );

    $wp_customize->add_setting( 'closeclient_footer_disclaimer', array( 'default' => 'Consulting services are subject to terms and conditions. Results may vary.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
    $wp_customize->add_control( 'closeclient_footer_disclaimer', array( 'label' => 'Footer Disclaimer', 'section' => 'closeclient_footer_settings', 'type' => 'textarea' ) );

    // Social Media
    $wp_customize->add_section( 'closeclient_social_settings', array( 'title' => 'Social Media Links', 'panel' => 'closeclient_layout_panel' ) );
    foreach ( array('twitter','facebook','linkedin','instagram','youtube') as $id ) {
        $wp_customize->add_setting( "closeclient_social_$id", array( 'default' => '#', 'sanitize_callback' => 'esc_url_raw' ) );
        $wp_customize->add_control( "closeclient_social_$id", array( 'label' => ucfirst($id), 'section' => 'closeclient_social_settings' ) );
    }

    // ==========================================
    // 3. HOMEPAGE SECTIONS
    // ==========================================

    // Visibility
    $wp_customize->add_section( 'closeclient_visibility', array(
        'title'    => __( '0. Section Visibility', 'closeclient' ),
        'panel'    => 'closeclient_homepage_panel',
        'priority' => 5,
    ) );
    $home_sections = array(
        'hero' => 'Hero',
        'logo_ticker' => 'Logo Ticker (v9.0)',
        'authority' => 'Authority (Logos)',
        'vsl' => 'VSL (Video)',
        'stats' => 'Stats & Results',
        'portfolio' => 'Portfolio Bento (v9.0)',
        'about' => 'About',
        'services' => 'Services Bento (v9.0)',
        'products' => 'Products Ecosystem (v9.0)',
        'process' => 'Process',
        'pricing' => 'Pricing',
        'testimonials' => 'Testimonials',
        'team' => 'Team',
        'lead_magnet' => 'Lead Magnet',
        'newsletter' => 'Newsletter',
        'faq' => 'FAQ',
        'booking' => 'Booking CTA'
    );
    foreach ( $home_sections as $id => $label ) {
        $wp_customize->add_setting( "closeclient_show_$id", array( 'default' => true, 'sanitize_callback' => 'absint' ) );
        $wp_customize->add_control( "closeclient_show_$id", array( 'label' => "Show $label Section", 'section' => 'closeclient_visibility', 'type' => 'checkbox' ) );
    }

    // Section Tags
    $wp_customize->add_section( 'closeclient_section_tags', array( 'title' => '1. Section Tags', 'panel' => 'closeclient_homepage_panel', 'priority' => 10 ) );
    $tags = array( 'services_tag'=>'SERVICES', 'testimonials_tag'=>'SOCIAL PROOF', 'faq_tag'=>'FAQ', 'process_tag'=>'OUR PROCESS', 'team_tag'=>'MEET THE TEAM', 'stats_tag'=>'OUR IMPACT', 'pricing_tag' => 'INVESTMENT', 'products_tag' => 'ECOSYSTEM TOOLS', 'about_tag_home' => 'THE VISION' );
    foreach ( $tags as $id => $default ) {
        $wp_customize->add_setting( "closeclient_$id", array( 'default' => $default, 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "closeclient_$id", array( 'label' => ucwords(str_replace('_', ' ', $id)), 'section' => 'closeclient_section_tags' ) );
    }

    // Contents for Modular Sections
    // Hero
    $wp_customize->add_section( 'closeclient_hero_content', array( 'title' => '2. Hero Content', 'panel' => 'closeclient_homepage_panel' ) );
    $wp_customize->add_setting( 'closeclient_hero_headline', array( 'default' => 'Stop Losing High-Value Clients Before You Even Speak to Them', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_hero_headline', array( 'label' => 'Headline', 'section' => 'closeclient_hero_content' ) );

    $wp_customize->add_setting( 'closeclient_hero_typewriter', array( 'default' => false, 'sanitize_callback' => 'absint' ) );
    $wp_customize->add_control( 'closeclient_hero_typewriter', array( 'label' => 'Use Typewriter Effect', 'section' => 'closeclient_hero_content', 'type' => 'checkbox' ) );
    $wp_customize->add_setting( 'closeclient_hero_subheadline', array( 'default' => 'Your website should act as your top-performing associate: pre-qualifying, positioning, and closing premium clients — automatically.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
    $wp_customize->add_control( 'closeclient_hero_subheadline', array( 'label' => 'Subheadline', 'section' => 'closeclient_hero_content', 'type' => 'textarea' ) );
    $wp_customize->add_setting( 'closeclient_hero_cta', array( 'default' => 'Request Your Authority Audit →', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_hero_cta', array( 'label' => 'Button Text', 'section' => 'closeclient_hero_content' ) );
    $wp_customize->add_setting( 'closeclient_hero_cta_link', array( 'default' => '#audit', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( 'closeclient_hero_cta_link', array( 'label' => 'Button Link', 'section' => 'closeclient_hero_content' ) );
    $wp_customize->add_setting( 'closeclient_hero_image', array( 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'closeclient_hero_image', array( 'label' => 'Hero Image', 'section' => 'closeclient_hero_content' ) ) );

    // Authority Logos
        $wp_customize->add_setting( 'closeclient_authority_tag', array( 'default' => 'POWERING WORLD-CLASS AUTHORITIES', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_authority_tag', array( 'label' => 'Tag', 'section' => 'closeclient_authority_logos' ) );
    $wp_customize->add_section( 'closeclient_authority_logos', array( 'title' => '3. Authority Logos', 'panel' => 'closeclient_homepage_panel' ) );
    for ( $i = 1; $i <= 5; $i++ ) {
        $wp_customize->add_setting( "closeclient_authority_logo_$i", array( 'sanitize_callback' => 'esc_url_raw' ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "closeclient_authority_logo_$i", array( 'label' => "Logo $i", 'section' => 'closeclient_authority_logos' ) ) );
    }

    // Stats
    $wp_customize->add_section( 'closeclient_stats_content', array( 'title' => '4. Stats & Results', 'panel' => 'closeclient_homepage_panel' ) );
    $wp_customize->add_setting( 'closeclient_stats_tag', array( 'default' => 'OUR IMPACT', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_stats_tag', array( 'label' => 'Tag', 'section' => 'closeclient_stats_content' ) );
    for ( $i = 1; $i <= 3; $i++ ) {
        $wp_customize->add_setting( "closeclient_stat_{$i}_value", array( 'default' => '100+', 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "closeclient_stat_{$i}_value", array( 'label' => "Stat $i Value", 'section' => 'closeclient_stats_content' ) );
        $wp_customize->add_setting( "closeclient_stat_{$i}_label", array( 'default' => 'Clients Helped', 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "closeclient_stat_{$i}_label", array( 'label' => "Stat $i Label", 'section' => 'closeclient_stats_content' ) );
    }

    // VSL
    $wp_customize->add_section( 'closeclient_vsl_content', array( 'title' => '5. VSL (Video Content)', 'panel' => 'closeclient_homepage_panel' ) );
    $wp_customize->add_setting( 'closeclient_vsl_tag', array( 'default' => 'EXCLUSIVE TRAINING', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_vsl_tag', array( 'label' => 'Tag', 'section' => 'closeclient_vsl_content' ) );
    $wp_customize->add_setting( 'closeclient_vsl_headline', array( 'default' => 'The Big Domino: Why Your Expert Business is Stalled (And How to Fix It)', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_vsl_headline', array( 'label' => 'Headline', 'section' => 'closeclient_vsl_content' ) );
    $wp_customize->add_setting( 'closeclient_vsl_video_url', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( 'closeclient_vsl_video_url', array( 'label' => 'Video URL', 'section' => 'closeclient_vsl_content' ) );

    // About (Home)
    $wp_customize->add_section( 'closeclient_about_content', array( 'title' => '6. About (Home Content)', 'panel' => 'closeclient_homepage_panel' ) );
    $wp_customize->add_setting( 'closeclient_about_tag_home', array( 'default' => 'THE VISION', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_about_tag_home', array( 'label' => 'Tag', 'section' => 'closeclient_about_content' ) );
    $wp_customize->add_setting( 'closeclient_about_headline_home', array( 'default' => 'Stop Chasing. Start Leading.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_about_headline_home', array( 'label' => 'Headline', 'section' => 'closeclient_about_content' ) );
    $wp_customize->add_setting( 'closeclient_about_text_p1', array( 'default' => 'You didn\'t start your coaching business to spend 8 hours a day in the DMs. You started it to make an impact and build freedom.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
    $wp_customize->add_control( 'closeclient_about_text_p1', array( 'label' => 'Paragraph 1', 'section' => 'closeclient_about_content', 'type' => 'textarea' ) );
    $wp_customize->add_setting( 'closeclient_about_text_p2', array( 'default' => 'I help established experts build the infrastructure they need to scale without sacrificing their personal life.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
    $wp_customize->add_control( 'closeclient_about_text_p2', array( 'label' => 'Paragraph 2', 'section' => 'closeclient_about_content', 'type' => 'textarea' ) );
    $wp_customize->add_setting( 'closeclient_about_button_text', array( 'default' => 'Learn More About My Story', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_about_button_text', array( 'label' => 'Button Text', 'section' => 'closeclient_about_content' ) );
    $wp_customize->add_setting( 'closeclient_about_image', array( 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'closeclient_about_image', array( 'label' => 'About Image', 'section' => 'closeclient_about_content' ) ) );

    // Services
    $wp_customize->add_section( 'closeclient_services_content', array( 'title' => '7. Services Content', 'panel' => 'closeclient_homepage_panel' ) );
    $wp_customize->add_setting( 'closeclient_services_headline', array( 'default' => 'The Architecture of Dominance', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_services_headline', array( 'label' => 'Headline', 'section' => 'closeclient_services_content' ) );
    $wp_customize->add_setting( 'closeclient_services_tag', array( 'default' => 'SERVICES', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_services_tag', array( 'label' => 'Tag', 'section' => 'closeclient_services_content' ) );

    for ( $i = 1; $i <= 3; $i++ ) {
        $wp_customize->add_setting( "closeclient_service_{$i}_title", array( 'default' => "Capability $i", 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "closeclient_service_{$i}_title", array( 'label' => "Service $i Title", 'section' => 'closeclient_services_content' ) );
        $wp_customize->add_setting( "closeclient_service_{$i}_text", array( 'default' => "Description of your elite service capability.", 'sanitize_callback' => 'sanitize_textarea_field' ) );
        $wp_customize->add_control( "closeclient_service_{$i}_text", array( 'label' => "Service $i Text", 'section' => 'closeclient_services_content', 'type' => 'textarea' ) );
    }

    // Process
    $wp_customize->add_section( 'closeclient_process_content', array( 'title' => '8. Process Content', 'panel' => 'closeclient_homepage_panel' ) );
    $wp_customize->add_setting( 'closeclient_process_headline', array( 'default' => 'The Authority Roadmap', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_process_headline', array( 'label' => 'Headline', 'section' => 'closeclient_process_content' ) );
    $wp_customize->add_setting( 'closeclient_process_tag', array( 'default' => 'OUR PROCESS', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_process_tag', array( 'label' => 'Tag', 'section' => 'closeclient_process_content' ) );
    for ( $i = 1; $i <= 3; $i++ ) {
        $wp_customize->add_setting( "closeclient_process_step_{$i}_title", array( 'default' => "Step $i", 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "closeclient_process_step_{$i}_title", array( 'label' => "Step $i Title", 'section' => 'closeclient_process_content' ) );
        $wp_customize->add_setting( "closeclient_process_step_{$i}_text", array( 'default' => "Description for step $i of your proven process.", 'sanitize_callback' => 'sanitize_textarea_field' ) );
        $wp_customize->add_control( "closeclient_process_step_{$i}_text", array( 'label' => "Step $i Text", 'section' => 'closeclient_process_content', 'type' => 'textarea' ) );
    }

    // Pricing
    $wp_customize->add_section( 'closeclient_pricing_content', array( 'title' => '9. Pricing Content', 'panel' => 'closeclient_homepage_panel' ) );
    $wp_customize->add_setting( 'closeclient_pricing_headline', array( 'default' => 'Investment Opportunities', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_pricing_headline', array( 'label' => 'Headline', 'section' => 'closeclient_pricing_content' ) );
    $wp_customize->add_setting( 'closeclient_pricing_tag', array( 'default' => 'INVESTMENT', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_pricing_tag', array( 'label' => 'Tag', 'section' => 'closeclient_pricing_content' ) );
    for ( $i = 1; $i <= 3; $i++ ) {
        $wp_customize->add_setting( "closeclient_plan{$i}_name", array( 'default' => "Plan $i", 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "closeclient_plan{$i}_name", array( 'label' => "Plan $i Name", 'section' => 'closeclient_pricing_content' ) );
        $wp_customize->add_setting( "closeclient_plan{$i}_price", array( 'default' => "$0", 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "closeclient_plan{$i}_price", array( 'label' => "Plan $i Price", 'section' => 'closeclient_pricing_content' ) );
        $wp_customize->add_setting( "closeclient_plan{$i}_features", array( 'default' => "Feature 1, Feature 2", 'sanitize_callback' => 'sanitize_textarea_field' ) );
        $wp_customize->add_control( "closeclient_plan{$i}_features", array( 'label' => "Plan $i Features", 'section' => 'closeclient_pricing_content', 'type' => 'textarea' ) );
    }

    // Testimonials
    $wp_customize->add_section( 'closeclient_testimonials_content', array( 'title' => '10. Testimonials Content', 'panel' => 'closeclient_homepage_panel' ) );
    $wp_customize->add_setting( 'closeclient_testimonials_headline', array( 'default' => 'Elite Success Stories', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_testimonials_headline', array( 'label' => 'Headline', 'section' => 'closeclient_testimonials_content' ) );
    $wp_customize->add_setting( 'closeclient_testimonials_tag', array( 'default' => 'SOCIAL PROOF', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_testimonials_tag', array( 'label' => 'Tag', 'section' => 'closeclient_testimonials_content' ) );

    for ( $i = 1; $i <= 3; $i++ ) {
        $wp_customize->add_setting( "closeclient_testimonial_{$i}_text", array( 'default' => "Premium results for our elite partners.", 'sanitize_callback' => 'sanitize_textarea_field' ) );
        $wp_customize->add_control( "closeclient_testimonial_{$i}_text", array( 'label' => "Testimonial $i Text", 'section' => 'closeclient_testimonials_content', 'type' => 'textarea' ) );
        $wp_customize->add_setting( "closeclient_testimonial_{$i}_name", array( 'default' => "Client Name", 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "closeclient_testimonial_{$i}_name", array( 'label' => "Testimonial $i Name", 'section' => 'closeclient_testimonials_content' ) );
        $wp_customize->add_setting( "closeclient_testimonial_{$i}_role", array( 'default' => "Founder & CEO", 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "closeclient_testimonial_{$i}_role", array( 'label' => "Testimonial $i Role", 'section' => 'closeclient_testimonials_content' ) );
    }

    // Team
    $wp_customize->add_section( 'closeclient_team_content', array( 'title' => '11. Team Content', 'panel' => 'closeclient_homepage_panel' ) );
    $wp_customize->add_setting( 'closeclient_team_headline', array( 'default' => 'The Authority Architects', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_team_headline', array( 'label' => 'Headline', 'section' => 'closeclient_team_content' ) );
    $wp_customize->add_setting( 'closeclient_team_tag', array( 'default' => 'MEET THE TEAM', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_team_tag', array( 'label' => 'Tag', 'section' => 'closeclient_team_content' ) );

    for ( $i = 1; $i <= 3; $i++ ) {
        $wp_customize->add_setting( "closeclient_team_{$i}_name", array( 'default' => "Expert $i", 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "closeclient_team_{$i}_name", array( 'label' => "Member $i Name", 'section' => 'closeclient_team_content' ) );
        $wp_customize->add_setting( "closeclient_team_{$i}_role", array( 'default' => "Specialist", 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "closeclient_team_{$i}_role", array( 'label' => "Member $i Role", 'section' => 'closeclient_team_content' ) );
        $wp_customize->add_setting( "closeclient_team_{$i}_image", array( 'sanitize_callback' => 'esc_url_raw' ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "closeclient_team_{$i}_image", array( 'label' => "Member $i Photo", 'section' => 'closeclient_team_content' ) ) );
    }


    // Products
    $wp_customize->add_section( 'closeclient_products_content', array( 'title' => '11.5 Products Content', 'panel' => 'closeclient_homepage_panel' ) );
    $wp_customize->add_setting( 'closeclient_products_headline', array( 'default' => 'Essential Tools That Work as Hard as You Do', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_products_headline', array( 'label' => 'Headline', 'section' => 'closeclient_products_content' ) );
    $wp_customize->add_setting( 'closeclient_products_tag', array( 'default' => 'ECOSYSTEM TOOLS', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_products_tag', array( 'label' => 'Tag', 'section' => 'closeclient_products_content' ) );
    $wp_customize->add_setting( 'closeclient_products_subheadline', array( 'default' => 'Themes and plugins trusted by elite coaches to streamline operations and elevate branding.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
    $wp_customize->add_control( 'closeclient_products_subheadline', array( 'label' => 'Subheadline', 'section' => 'closeclient_products_content', 'type' => 'textarea' ) );

    // Lead Magnet
    $wp_customize->add_section( 'closeclient_lm_content', array( 'title' => '12. Lead Magnet Content', 'panel' => 'closeclient_homepage_panel' ) );
    $wp_customize->add_setting( 'closeclient_lm_headline', array( 'default' => 'Free Authority Blueprint', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_lm_headline', array( 'label' => 'Headline', 'section' => 'closeclient_lm_content' ) );
    $wp_customize->add_setting( 'closeclient_lm_subheadline', array( 'default' => 'Download the exact roadmap I use to help consultants land high-ticket clients without cold outreach.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
    $wp_customize->add_control( 'closeclient_lm_subheadline', array( 'label' => 'Subheadline', 'section' => 'closeclient_lm_content', 'type' => 'textarea' ) );
    $wp_customize->add_setting( 'closeclient_lm_button', array( 'default' => 'Access The Blueprint', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_lm_button', array( 'label' => 'Button Text', 'section' => 'closeclient_lm_content' ) );
    $wp_customize->add_setting( 'closeclient_lm_image', array( 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'closeclient_lm_image', array( 'label' => 'Mockup Image', 'section' => 'closeclient_lm_content' ) ) );

    // FAQ
    $wp_customize->add_section( 'closeclient_faq_content', array( 'title' => '13. FAQ Content', 'panel' => 'closeclient_homepage_panel' ) );
    $wp_customize->add_setting( 'closeclient_faq_headline', array( 'default' => 'Frequently Asked Questions', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_faq_headline', array( 'label' => 'Headline', 'section' => 'closeclient_faq_content' ) );
    $wp_customize->add_setting( 'closeclient_faq_tag', array( 'default' => 'FAQ', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_faq_tag', array( 'label' => 'Tag', 'section' => 'closeclient_faq_content' ) );

    for ( $i = 1; $i <= 3; $i++ ) {
        $wp_customize->add_setting( "closeclient_faq_q{$i}", array( 'default' => "Question $i?", 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "closeclient_faq_q{$i}", array( 'label' => "Question $i", 'section' => 'closeclient_faq_content' ) );
        $wp_customize->add_setting( "closeclient_faq_a{$i}", array( 'default' => "Answer $i to build trust and reduce friction.", 'sanitize_callback' => 'sanitize_textarea_field' ) );
        $wp_customize->add_control( "closeclient_faq_a{$i}", array( 'label' => "Answer $i", 'section' => 'closeclient_faq_content', 'type' => 'textarea' ) );
    }

    // Booking CTA
    $wp_customize->add_section( 'closeclient_booking_content', array( 'title' => '14. Booking CTA Content', 'panel' => 'closeclient_homepage_panel' ) );
    $wp_customize->add_setting( 'closeclient_booking_headline', array( 'default' => 'Are You Ready to Scale Beyond Your Current Ceiling?', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_booking_headline', array( 'label' => 'Headline', 'section' => 'closeclient_booking_content' ) );
    $wp_customize->add_setting( 'closeclient_booking_subheadline', array( 'default' => 'We only partner with 3 new experts per month to ensure elite-level execution. If you are ready to automate your authority, let\'s talk.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_booking_subheadline', array( 'label' => 'Subheadline', 'section' => 'closeclient_booking_content' ) );
    $wp_customize->add_setting( 'closeclient_booking_text', array( 'default' => 'Book Your Scaling Audit', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_booking_text', array( 'label' => 'Button Text', 'section' => 'closeclient_booking_content' ) );
    $wp_customize->add_setting( 'closeclient_booking_link', array( 'default' => '#audit', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( 'closeclient_booking_link', array( 'label' => 'Button Link', 'section' => 'closeclient_booking_content' ) );
    $wp_customize->add_setting( 'closeclient_booking_note', array( 'default' => 'Current Waiting List: 14 Days', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_booking_note', array( 'label' => 'Bottom Note', 'section' => 'closeclient_booking_content' ) );

    $wp_customize->add_setting( 'closeclient_booking_scarcity', array( 'default' => 'Only 2 Strategy Audit slots remaining for this month.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_booking_scarcity', array( 'label' => 'Scarcity Message', 'section' => 'closeclient_booking_content' ) );

    // ==========================================
    // 4. PAGE TEMPLATES PANEL
    // ==========================================

    // About Page Template
    $wp_customize->add_section( 'closeclient_about_tpl', array( 'title' => '7. About Page Content', 'panel' => 'closeclient_pages_panel' ) );
    $wp_customize->add_setting( 'closeclient_about_headline_tpl', array( 'default' => 'Stop Chasing. Start Leading.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_about_headline_tpl', array( 'label' => 'Hero Headline', 'section' => 'closeclient_about_tpl' ) );
    $wp_customize->add_setting( 'closeclient_about_text_tpl', array( 'default' => "Most agencies focus on 'pretty.' We focus on Positioning & Profit. Founded on direct-response principles, CloseClient rescues experts from being the 'best-kept secret.'", 'sanitize_callback' => 'sanitize_textarea_field' ) );
    $wp_customize->add_control( 'closeclient_about_text_tpl', array( 'label' => 'Main Content', 'section' => 'closeclient_about_tpl', 'type' => 'textarea' ) );

    // Contact Page Template
    $wp_customize->add_section( 'closeclient_contact_tpl', array( 'title' => '8. Contact Page Content', 'panel' => 'closeclient_pages_panel' ) );
    $wp_customize->add_setting( 'closeclient_contact_headline_tpl', array( 'default' => "Let's talk about your growth.", 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_contact_headline_tpl', array( 'label' => 'Hero Headline', 'section' => 'closeclient_contact_tpl' ) );
    $wp_customize->add_setting( 'closeclient_contact_subheadline_tpl', array( 'default' => 'Ready to scale your coaching business? Fill out the form or book a call directly.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_contact_subheadline_tpl', array( 'label' => 'Hero Subheadline', 'section' => 'closeclient_contact_tpl' ) );
    $wp_customize->add_setting( 'closeclient_contact_form_shortcode', array( 'default' => '[contact-form-7 id="..."]', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_contact_form_shortcode', array( 'label' => 'Form Shortcode', 'section' => 'closeclient_contact_tpl' ) );

    $wp_customize->add_setting( 'closeclient_contact_form_action', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( 'closeclient_contact_form_action', array( 'label' => 'Custom Form Action URL (Optional)', 'description' => 'If set, this will replace the shortcode with a basic HTML form targeting this URL.', 'section' => 'closeclient_contact_tpl' ) );

    // Sales Page Template
    $wp_customize->add_section( 'closeclient_sales_tpl', array( 'title' => '9. Sales Page Content', 'panel' => 'closeclient_pages_panel' ) );
    $wp_customize->add_setting( 'closeclient_sales_hero_headline_tpl', array( 'default' => 'Scale to $100k/mo Without Spending 8 Hours a Day in the DMs.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_sales_hero_headline_tpl', array( 'label' => 'Hero Headline', 'section' => 'closeclient_sales_tpl' ) );
    $wp_customize->add_setting( 'closeclient_sales_hero_subheadline_tpl', array( 'default' => 'For the elite consultant who is ready to graduate from "hustling" to "owning a machine."', 'sanitize_callback' => 'sanitize_textarea_field' ) );
    $wp_customize->add_control( 'closeclient_sales_hero_subheadline_tpl', array( 'label' => 'Hero Subheadline', 'section' => 'closeclient_sales_tpl', 'type' => 'textarea' ) );
    $wp_customize->add_setting( 'closeclient_sales_value_stack', array( 'default' => "Authority Audit ($1,497 Value), Bento Ecosystem ($8,000 Value), Vortex Funnel ($3,500 Value)", 'sanitize_callback' => 'sanitize_textarea_field' ) );
    $wp_customize->add_control( 'closeclient_sales_value_stack', array( 'label' => 'Value Stack (Comma separated)', 'section' => 'closeclient_sales_tpl', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'closeclient_about_method_title', array( 'default' => 'The $100M Methodology', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_about_method_title', array( 'label' => 'Methodology Title', 'section' => 'closeclient_about_tpl' ) );

    $wp_customize->add_setting( 'closeclient_about_method_text', array( 'default' => 'We don\'t just build websites; we engineer authority. Our methodology is rooted in the psychological triggers of the high-ticket prospect.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
    $wp_customize->add_control( 'closeclient_about_method_text', array( 'label' => 'Methodology Text', 'section' => 'closeclient_about_tpl', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'closeclient_about_methodology', array( 'default' => 'Direct-Response System Architecture, Vortex Lead Intake & Pre-qualification, Bento-style Social Proof Engineering', 'sanitize_callback' => 'sanitize_textarea_field' ) );
    $wp_customize->add_control( 'closeclient_about_methodology', array( 'label' => 'Methodology Items (Comma separated)', 'section' => 'closeclient_about_tpl', 'type' => 'textarea' ) );

    // Thank You Page Template
    $wp_customize->add_section( 'closeclient_thankyou_tpl', array( 'title' => '10. Thank You Page Content', 'panel' => 'closeclient_pages_panel' ) );
    $wp_customize->add_setting( 'closeclient_thankyou_headline_tpl', array( 'default' => "You're All Set!", 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_thankyou_headline_tpl', array( 'label' => 'Hero Headline', 'section' => 'closeclient_thankyou_tpl' ) );
    $wp_customize->add_setting( 'closeclient_thankyou_text_tpl', array( 'default' => "We've received your request. Check your inbox for the next steps.", 'sanitize_callback' => 'sanitize_textarea_field' ) );
    $wp_customize->add_control( 'closeclient_thankyou_text_tpl', array( 'label' => 'Main Text', 'section' => 'closeclient_thankyou_tpl', 'type' => 'textarea' ) );

    // Services Page Template
    $wp_customize->add_section( 'closeclient_services_tpl', array( 'title' => '11. Services Page Content', 'panel' => 'closeclient_pages_panel' ) );
    $wp_customize->add_setting( 'closeclient_services_hero_headline_tpl', array( 'default' => 'Strategic Systems for the 1% Expert.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_services_hero_headline_tpl', array( 'label' => 'Hero Headline', 'section' => 'closeclient_services_tpl' ) );
    $wp_customize->add_setting( 'closeclient_services_subheadline_tpl', array( 'default' => 'Premium solutions tailored for your stage of growth.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_services_subheadline_tpl', array( 'label' => 'Hero Subheadline', 'section' => 'closeclient_services_tpl' ) );

    // Landing Page Template
    $wp_customize->add_section( 'closeclient_landing_tpl', array( 'title' => '12. Landing Page Content', 'panel' => 'closeclient_pages_panel' ) );
    $wp_customize->add_setting( 'closeclient_landing_headline_tpl', array( 'default' => 'Transform Your Expertise Into a High-Performance Machine.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_landing_headline_tpl', array( 'label' => 'Hero Headline', 'section' => 'closeclient_landing_tpl' ) );
    $wp_customize->add_setting( 'closeclient_landing_text_tpl', array( 'default' => 'Join the elite ranks of coaches who have automated their authority and scaled their impact.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
    $wp_customize->add_control( 'closeclient_landing_text_tpl', array( 'label' => 'Hero Text', 'section' => 'closeclient_landing_tpl', 'type' => 'textarea' ) );


    // Products

    // Lead Magnet Template
    $wp_customize->add_section( 'closeclient_leadmagnet_tpl', array( 'title' => '13. Lead Magnet Page Content', 'panel' => 'closeclient_pages_panel' ) );
    $wp_customize->add_setting( 'closeclient_leadmagnet_headline_tpl', array( 'default' => 'Get the Authority Blueprint', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_leadmagnet_headline_tpl', array( 'label' => 'Hero Headline', 'section' => 'closeclient_leadmagnet_tpl' ) );
    $wp_customize->add_setting( 'closeclient_leadmagnet_text_tpl', array( 'default' => 'Download our proven framework for attracting high-ticket clients on autopilot.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
    $wp_customize->add_control( 'closeclient_leadmagnet_text_tpl', array( 'label' => 'Hero Text', 'section' => 'closeclient_leadmagnet_tpl', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'closeclient_lm_form_action', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( 'closeclient_lm_form_action', array( 'label' => 'Custom Form Action URL (Optional)', 'description' => 'If set, this will replace the page content with a basic HTML form targeting this URL.', 'section' => 'closeclient_leadmagnet_tpl' ) );

    $wp_customize->add_setting( 'closeclient_lm_benefits', array( 'default' => 'The "Authority Flywheel" Framework, 3 Conversion-Killing Mistakes to Avoid, Automated Lead Intake Blueprints', 'sanitize_callback' => 'sanitize_textarea_field' ) );
    $wp_customize->add_control( 'closeclient_lm_benefits', array( 'label' => 'What\'s Inside (Comma separated)', 'section' => 'closeclient_leadmagnet_tpl', 'type' => 'textarea' ) );

    // Theme Utilities
    $utility_nonce = wp_create_nonce( 'closeclient_utility_action' );

    $wp_customize->add_setting( 'closeclient_gen_pages_trigger', array( 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'closeclient_gen_pages_trigger', array(
        'label'       => __( 'Recreate Starter Pages', 'closeclient' ),
        'description' => sprintf( '<a href="%s" class="cc-button cc-button-secondary">%s</a>', admin_url('?closeclient_action=generate&_wpnonce=' . $utility_nonce), __( 'Generate Now', 'closeclient' ) ),
        'section'     => 'closeclient_utilities_section',
        'type'        => 'hidden',
    ) ) );

    $wp_customize->add_setting( 'closeclient_reset_trigger', array( 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'closeclient_reset_trigger', array(
        'label'       => __( 'Reset Theme Settings', 'closeclient' ),
        'description' => sprintf( '<a href="%s" class="button button-link-delete" onclick="return confirm(\'Are you sure?\')">%s</a>', admin_url('?closeclient_action=reset&_wpnonce=' . $utility_nonce), __( 'Reset to Defaults', 'closeclient' ) ),
        'section'     => 'closeclient_utilities_section',
        'type'        => 'hidden',
    ) ) );

    // Blog settings
    $wp_customize->add_section( 'closeclient_blog_global', array( 'title' => 'Blog & Newsletter', 'priority' => 90 ) );

    $wp_customize->add_setting( 'closeclient_blog_sidebar', array( 'default' => true, 'sanitize_callback' => 'absint' ) );
    $wp_customize->add_control( 'closeclient_blog_sidebar', array( 'label' => 'Show Blog Sticky Sidebar', 'section' => 'closeclient_blog_global', 'type' => 'checkbox' ) );

    $wp_customize->add_setting( 'closeclient_blog_title', array( 'default' => 'Insights & Authority', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_blog_title', array( 'label' => 'Blog Title', 'section' => 'closeclient_blog_global' ) );
    $wp_customize->add_setting( 'closeclient_blog_description', array( 'default' => 'Expert strategies to scale your coaching business.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_blog_description', array( 'label' => 'Blog Description', 'section' => 'closeclient_blog_global' ) );
    $wp_customize->add_setting( 'closeclient_newsletter_title', array( 'default' => 'Join the Authority Circle', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_newsletter_title', array( 'label' => 'Newsletter Headline', 'section' => 'closeclient_blog_global' ) );
    $wp_customize->add_setting( 'closeclient_newsletter_text', array( 'default' => 'Weekly insights on authority positioning, high-ticket sales, and scaling systems for coaches.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_newsletter_text', array( 'label' => 'Newsletter Text', 'section' => 'closeclient_blog_global' ) );
    $wp_customize->add_setting( 'closeclient_newsletter_button', array( 'default' => 'Subscribe Now', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_newsletter_button', array( 'label' => 'Newsletter Button Text', 'section' => 'closeclient_blog_global' ) );

    $wp_customize->add_setting( 'closeclient_newsletter_form_action', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( 'closeclient_newsletter_form_action', array( 'label' => 'Custom Form Action URL (Optional)', 'description' => 'If set, the newsletter form will target this URL.', 'section' => 'closeclient_blog_global' ) );

    $wp_customize->add_setting( 'closeclient_sticky_cta_title', array( 'default' => 'Scale to $10k+ Months', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_sticky_cta_title', array( 'label' => 'Sticky CTA Title', 'section' => 'closeclient_blog_global' ) );

    $wp_customize->add_setting( 'closeclient_sticky_cta_text', array( 'default' => 'Join 5,000+ coaches getting our weekly growth systems.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_sticky_cta_text', array( 'label' => 'Sticky CTA Text', 'section' => 'closeclient_blog_global' ) );

    $wp_customize->add_setting( 'closeclient_sticky_cta_button', array( 'default' => 'Join the Newsletter', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_sticky_cta_button', array( 'label' => 'Sticky CTA Button', 'section' => 'closeclient_blog_global' ) );

    $wp_customize->add_setting( 'closeclient_sticky_cta_link', array( 'default' => '#', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( 'closeclient_sticky_cta_link', array( 'label' => 'Sticky CTA Link', 'section' => 'closeclient_blog_global' ) );

    $wp_customize->add_setting( 'closeclient_sidebar_insight_title', array( 'default' => 'The Authority Flywheel', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_sidebar_insight_title', array( 'label' => 'Sidebar Insight Title', 'section' => 'closeclient_blog_global' ) );

    $wp_customize->add_setting( 'closeclient_sidebar_insight_text', array( 'default' => 'Learn how to transform your expertise into an omnipresent brand that closes deals while you sleep.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_sidebar_insight_text', array( 'label' => 'Sidebar Insight Text', 'section' => 'closeclient_blog_global', 'type' => 'textarea' ) );

    // Global UI Labels
    $wp_customize->add_section( 'closeclient_labels_section', array( 'title' => 'Global UI Labels', 'priority' => 100 ) );

    $labels = array(
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
        'closeclient_label_related'         => 'More Authority Insights'
    );

    foreach ( $labels as $id => $default ) {
        $wp_customize->add_setting( $id, array( 'default' => $default, 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( $id, array( 'label' => ucwords(str_replace('closeclient_label_', '', $id)), 'section' => 'closeclient_labels_section' ) );
    }

    // Menu Labels
    $wp_customize->add_section( 'closeclient_menu_labels_section', array( 'title' => 'Menu Labels (Fallback)', 'priority' => 110 ) );

    $menu_labels = array(
        'closeclient_menu_label_services' => 'Solutions',
        'closeclient_menu_label_cases'    => 'Success Stories',
        'closeclient_menu_label_about'    => 'The Method',
        'closeclient_menu_label_training' => 'Free Training',
        'closeclient_menu_label_blog'     => 'Insights'
    );

    foreach ( $menu_labels as $id => $default ) {
        $wp_customize->add_setting( $id, array( 'default' => $default, 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( $id, array( 'label' => ucwords(str_replace('closeclient_menu_label_', '', $id)), 'section' => 'closeclient_menu_labels_section' ) );
    }
}
add_action( 'customize_register', 'closeclient_customize_register' );

/**
 * Render the Customizer CSS
 */
function closeclient_customize_css() {
    $preset = get_theme_mod( 'closeclient_color_preset', 'deep-onyx' );
    $primary = get_theme_mod( 'closeclient_primary_color', '#020203' );
    $accent  = get_theme_mod( 'closeclient_accent_color', '#6366F1' );

    // Apply Presets (if user hasn't overridden or just to provide a base)
    if ( 'royal-indigo' === $preset ) {
        $primary = '#0f172a';
        $accent  = '#818cf8';
    } elseif ( 'forest-expert' === $preset ) {
        $primary = '#061a15';
        $accent  = '#10b981';
    } elseif ( 'midnight-gold' === $preset ) {
        $primary = '#0c0a09';
        $accent  = '#fbbf24';
    }

    ?>
    <style type="text/css">
        :root {
            --c-primary: <?php echo esc_attr( $primary ); ?>;
            --c-secondary: <?php echo get_theme_mod( 'closeclient_secondary_color', '#0A0A0B' ); ?>;
            --c-accent: <?php echo get_theme_mod( 'closeclient_accent_color', '#6366F1' ); ?>;
            --c-text: <?php echo get_theme_mod( 'closeclient_text_color', '#F9FAFB' ); ?>;
            --c-bg: <?php echo get_theme_mod( 'closeclient_bg_color', '#020203' ); ?>;
            --button-bg: <?php echo get_theme_mod( 'closeclient_button_color', '#6366F1' ); ?>;
            --button-hover: <?php echo get_theme_mod( 'closeclient_button_hover', '#4F46E5' ); ?>;

            --base-font-size: <?php echo get_theme_mod( 'closeclient_body_size', '18' ); ?>px;
            --h1-size: <?php echo get_theme_mod( 'closeclient_h1_size', '4.5' ); ?>rem;
            --line-height: <?php echo get_theme_mod( 'closeclient_line_height', '1.6' ); ?>;
            --letter-spacing: <?php echo get_theme_mod( 'closeclient_letter_spacing', '-0.022' ); ?>em;
            --font-weight: <?php echo get_theme_mod( 'closeclient_body_weight', '400' ); ?>;
            --h1-weight: <?php echo get_theme_mod( 'closeclient_h1_weight', '700' ); ?>;
            --container-width: <?php echo get_theme_mod( 'closeclient_container_width', '1200' ); ?>px;
            --content-width: <?php echo get_theme_mod( 'closeclient_content_width', '800' ); ?>px;
            --header-glass: <?php echo get_theme_mod( 'closeclient_header_glass', '0.7' ); ?>;
        }

        .site-header {
            position: <?php echo get_theme_mod( 'closeclient_header_sticky', true ) ? 'sticky' : 'relative'; ?>;
            background: rgba(2, 2, 3, var(--header-glass));
        }

        .site-footer {
            <?php if ( get_theme_mod( 'closeclient_footer_glass', false ) ) : ?>
                background: rgba(10, 10, 11, 0.5);
                backdrop-filter: blur(20px);
            <?php endif; ?>
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: "<?php echo get_theme_mod( 'closeclient_heading_font', 'Inter' ); ?>", sans-serif;
        }
        h1 { font-weight: var(--h1-weight); }

        body {
            font-family: "<?php echo get_theme_mod( 'closeclient_body_font', 'Inter' ); ?>", sans-serif;
            font-size: var(--base-font-size);
            line-height: var(--line-height);
            letter-spacing: var(--letter-spacing);
            font-weight: var(--font-weight);
        }
    </style>
    <?php
}
add_action( 'wp_head', 'closeclient_customize_css' );

/**
 * Enqueue Customizer live preview scripts.
 */
function closeclient_customize_preview_js() {
	wp_enqueue_script( 'closeclient-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '1.0', true );
}
add_action( 'customize_preview_init', 'closeclient_customize_preview_js' );
