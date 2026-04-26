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
        'title'       => __( '1. Brand Identity', 'closeclient' ),
        'priority'    => 10,
    ) );

    $wp_customize->add_panel( 'closeclient_layout_panel', array(
        'title'       => __( '2. Site Layout & Global', 'closeclient' ),
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

    $wp_customize->add_section( 'closeclient_utilities_section', array(
        'title'    => __( '5. Theme Setup & Tools', 'closeclient' ),
        'priority' => 50,
    ) );

    // ==========================================
    // 1. BRAND IDENTITY
    // ==========================================

    // Colors
    $wp_customize->add_section( 'closeclient_colors', array(
        'title'    => __( 'Theme Colors', 'closeclient' ),
        'panel'    => 'closeclient_brand_panel',
    ) );

    $colors = array(
        'primary_color'    => array( 'label' => __( 'Primary Color', 'closeclient' ), 'default' => '#050505' ),
        'secondary_color'  => array( 'label' => __( 'Secondary Color', 'closeclient' ), 'default' => '#FBFBFD' ),
        'accent_color'     => array( 'label' => __( 'Accent Color', 'closeclient' ), 'default' => '#4338CA' ),
        'text_color'       => array( 'label' => __( 'Text Color', 'closeclient' ), 'default' => '#1D1D1F' ),
        'bg_color'         => array( 'label' => __( 'Background Color', 'closeclient' ), 'default' => '#FFFFFF' ),
        'button_color'     => array( 'label' => __( 'Button Background', 'closeclient' ), 'default' => '#4338CA' ),
        'button_hover'     => array( 'label' => __( 'Button Hover', 'closeclient' ), 'default' => '#3730A3' ),
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
        'heading_font' => array( 'label' => 'Heading Font', 'default' => 'SF Pro Display', 'type' => 'select', 'choices' => array('SF Pro Display' => 'SF Pro Display', 'Inter' => 'Inter', 'Playfair Display' => 'Playfair Display', 'Montserrat' => 'Montserrat') ),
        'body_font'    => array( 'label' => 'Body Font', 'default' => 'SF Pro Display', 'type' => 'select', 'choices' => array('SF Pro Display' => 'SF Pro Display', 'Inter' => 'Inter', 'Open Sans' => 'Open Sans') ),
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
    $wp_customize->add_setting( 'closeclient_site_layout_type', array( 'default' => 'full-width', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_site_layout_type', array( 'label' => 'Layout Type', 'section' => 'closeclient_site_layout', 'type' => 'radio', 'choices' => array('full-width' => 'Full Width', 'boxed' => 'Boxed') ) );
    $wp_customize->add_setting( 'closeclient_container_width', array( 'default' => '1200', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_container_width', array( 'label' => 'Container Max Width (px)', 'section' => 'closeclient_site_layout', 'type' => 'number' ) );
    $wp_customize->add_setting( 'closeclient_default_layout', array( 'default' => 'right-sidebar', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_default_layout', array( 'label' => 'Content Sidebar', 'section' => 'closeclient_site_layout', 'type' => 'radio', 'choices' => array('full-width' => 'No Sidebar', 'right-sidebar' => 'Right Sidebar', 'left-sidebar' => 'Left Sidebar') ) );

    // Header & Navigation
    $wp_customize->add_section( 'closeclient_header_settings', array( 'title' => 'Header & Navigation', 'panel' => 'closeclient_layout_panel' ) );
    $wp_customize->add_setting( 'closeclient_header_cta_text', array( 'default' => 'Book a Call', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_header_cta_text', array( 'label' => 'Header Button Text', 'section' => 'closeclient_header_settings' ) );
    $wp_customize->add_setting( 'closeclient_header_cta_link', array( 'default' => '#', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( 'closeclient_header_cta_link', array( 'label' => 'Header Button Link', 'section' => 'closeclient_header_settings' ) );

    // Footer Content
    $wp_customize->add_section( 'closeclient_footer_settings', array( 'title' => 'Footer Content', 'panel' => 'closeclient_layout_panel' ) );
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
    $home_sections = array( 'hero' => 'Hero', 'authority' => 'Authority (Logos)', 'vsl' => 'VSL (Video)', 'stats' => 'Stats & Results', 'about' => 'About', 'services' => 'Services', 'process' => 'Process', 'pricing' => 'Pricing', 'testimonials' => 'Testimonials', 'team' => 'Team', 'lead_magnet' => 'Lead Magnet', 'newsletter' => 'Newsletter', 'faq' => 'FAQ', 'booking' => 'Booking CTA' );
    foreach ( $home_sections as $id => $label ) {
        $wp_customize->add_setting( "closeclient_show_$id", array( 'default' => true, 'sanitize_callback' => 'absint' ) );
        $wp_customize->add_control( "closeclient_show_$id", array( 'label' => "Show $label Section", 'section' => 'closeclient_visibility', 'type' => 'checkbox' ) );
    }

    // Section Tags
    $wp_customize->add_section( 'closeclient_section_tags', array( 'title' => '1. Section Tags', 'panel' => 'closeclient_homepage_panel', 'priority' => 10 ) );
    $tags = array( 'services_tag'=>'SERVICES', 'testimonials_tag'=>'SUCCESS STORIES', 'faq_tag'=>'FAQ', 'process_tag'=>'OUR PROCESS', 'team_tag'=>'MEET THE TEAM', 'stats_tag'=>'OUR IMPACT' );
    foreach ( $tags as $id => $default ) {
        $wp_customize->add_setting( "closeclient_$id", array( 'default' => $default, 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "closeclient_$id", array( 'label' => ucwords(str_replace('_', ' ', $id)), 'section' => 'closeclient_section_tags' ) );
    }

    // Contents for Modular Sections
    // Hero
    $wp_customize->add_section( 'closeclient_hero_content', array( 'title' => '2. Hero Content', 'panel' => 'closeclient_homepage_panel' ) );
    $wp_customize->add_setting( 'closeclient_hero_headline', array( 'default' => 'The Authority System for High-Ticket Coaches', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_hero_headline', array( 'label' => 'Headline', 'section' => 'closeclient_hero_content' ) );
    $wp_customize->add_setting( 'closeclient_hero_subheadline', array( 'default' => 'Stop chasing leads and start attracting elite clients. We build premium digital ecosystems that position you as the only logical choice in your market.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
    $wp_customize->add_control( 'closeclient_hero_subheadline', array( 'label' => 'Subheadline', 'section' => 'closeclient_hero_content', 'type' => 'textarea' ) );
    $wp_customize->add_setting( 'closeclient_hero_cta', array( 'default' => 'Apply for Strategy Audit', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_hero_cta', array( 'label' => 'Button Text', 'section' => 'closeclient_hero_content' ) );
    $wp_customize->add_setting( 'closeclient_hero_cta_link', array( 'default' => '#', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( 'closeclient_hero_cta_link', array( 'label' => 'Button Link', 'section' => 'closeclient_hero_content' ) );
    $wp_customize->add_setting( 'closeclient_hero_image', array( 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'closeclient_hero_image', array( 'label' => 'Hero Image', 'section' => 'closeclient_hero_content' ) ) );

    // Authority Logos
    $wp_customize->add_section( 'closeclient_authority_logos', array( 'title' => '3. Authority Logos', 'panel' => 'closeclient_homepage_panel' ) );
    for ( $i = 1; $i <= 5; $i++ ) {
        $wp_customize->add_setting( "closeclient_authority_logo_$i", array( 'sanitize_callback' => 'esc_url_raw' ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "closeclient_authority_logo_$i", array( 'label' => "Logo $i", 'section' => 'closeclient_authority_logos' ) ) );
    }

    // Stats
    $wp_customize->add_section( 'closeclient_stats_content', array( 'title' => '4. Stats & Results', 'panel' => 'closeclient_homepage_panel' ) );
    for ( $i = 1; $i <= 3; $i++ ) {
        $wp_customize->add_setting( "closeclient_stat_{$i}_value", array( 'default' => '100+', 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "closeclient_stat_{$i}_value", array( 'label' => "Stat $i Value", 'section' => 'closeclient_stats_content' ) );
        $wp_customize->add_setting( "closeclient_stat_{$i}_label", array( 'default' => 'Clients Helped', 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "closeclient_stat_{$i}_label", array( 'label' => "Stat $i Label", 'section' => 'closeclient_stats_content' ) );
    }

    // VSL
    $wp_customize->add_section( 'closeclient_vsl_content', array( 'title' => '5. VSL (Video Content)', 'panel' => 'closeclient_homepage_panel' ) );
    $wp_customize->add_setting( 'closeclient_vsl_headline', array( 'default' => 'Watch This If You Want to Scale', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_vsl_headline', array( 'label' => 'Headline', 'section' => 'closeclient_vsl_content' ) );
    $wp_customize->add_setting( 'closeclient_vsl_video_url', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( 'closeclient_vsl_video_url', array( 'label' => 'Video URL', 'section' => 'closeclient_vsl_content' ) );

    // About (Home)
    $wp_customize->add_section( 'closeclient_about_content', array( 'title' => '6. About (Home Content)', 'panel' => 'closeclient_homepage_panel' ) );
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
    $wp_customize->add_setting( 'closeclient_services_headline', array( 'default' => 'Elite Solutions for Elite Experts', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_services_headline', array( 'label' => 'Headline', 'section' => 'closeclient_services_content' ) );
    $wp_customize->add_setting( 'closeclient_services_subheadline', array( 'default' => 'Premium solutions tailored for your stage of growth.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_services_subheadline', array( 'label' => 'Subheadline', 'section' => 'closeclient_services_content' ) );

    // Process
    $wp_customize->add_section( 'closeclient_process_content', array( 'title' => '8. Process Content', 'panel' => 'closeclient_homepage_panel' ) );
    $wp_customize->add_setting( 'closeclient_process_headline', array( 'default' => 'How It Works', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_process_headline', array( 'label' => 'Headline', 'section' => 'closeclient_process_content' ) );
    for ( $i = 1; $i <= 3; $i++ ) {
        $wp_customize->add_setting( "closeclient_process_step_{$i}_title", array( 'default' => "Step $i", 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "closeclient_process_step_{$i}_title", array( 'label' => "Step $i Title", 'section' => 'closeclient_process_content' ) );
        $wp_customize->add_setting( "closeclient_process_step_{$i}_text", array( 'default' => "Description for step $i of your proven process.", 'sanitize_callback' => 'sanitize_textarea_field' ) );
        $wp_customize->add_control( "closeclient_process_step_{$i}_text", array( 'label' => "Step $i Text", 'section' => 'closeclient_process_content', 'type' => 'textarea' ) );
    }

    // Pricing
    $wp_customize->add_section( 'closeclient_pricing_content', array( 'title' => '9. Pricing Content', 'panel' => 'closeclient_homepage_panel' ) );
    $wp_customize->add_setting( 'closeclient_pricing_headline', array( 'default' => 'Invest in Your Growth', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_pricing_headline', array( 'label' => 'Headline', 'section' => 'closeclient_pricing_content' ) );
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
    $wp_customize->add_setting( 'closeclient_testimonials_headline', array( 'default' => 'Results From Our Clients', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_testimonials_headline', array( 'label' => 'Headline', 'section' => 'closeclient_testimonials_content' ) );
    $wp_customize->add_setting( 'closeclient_testimonial_1', array( 'default' => '"Within 90 days of implementing this authority system, our high-ticket sales increased by 300% without adding a single hour to my work week."', 'sanitize_callback' => 'sanitize_textarea_field' ) );
    $wp_customize->add_control( 'closeclient_testimonial_1', array( 'label' => 'Fallback Testimonial', 'section' => 'closeclient_testimonials_content', 'type' => 'textarea' ) );

    // Team
    $wp_customize->add_section( 'closeclient_team_content', array( 'title' => '11. Team Content', 'panel' => 'closeclient_homepage_panel' ) );
    $wp_customize->add_setting( 'closeclient_team_headline', array( 'default' => 'Meet the Experts', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_team_headline', array( 'label' => 'Headline', 'section' => 'closeclient_team_content' ) );
    $wp_customize->add_setting( 'closeclient_team_member_name', array( 'default' => 'Coach Name', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_team_member_name', array( 'label' => 'Lead Name', 'section' => 'closeclient_team_content' ) );
    $wp_customize->add_setting( 'closeclient_team_member_role', array( 'default' => 'Founder & CEO', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_team_member_role', array( 'label' => 'Lead Role', 'section' => 'closeclient_team_content' ) );
    $wp_customize->add_setting( 'closeclient_team_image', array( 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'closeclient_team_image', array( 'label' => 'Team Photo', 'section' => 'closeclient_team_content' ) ) );

    // Lead Magnet
    $wp_customize->add_section( 'closeclient_lm_content', array( 'title' => '12. Lead Magnet Content', 'panel' => 'closeclient_homepage_panel' ) );
    $wp_customize->add_setting( 'closeclient_lm_headline', array( 'default' => 'Free Authority Blueprint', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_lm_headline', array( 'label' => 'Headline', 'section' => 'closeclient_lm_content' ) );
    $wp_customize->add_setting( 'closeclient_lm_subheadline', array( 'default' => 'Download the exact roadmap I use to help consultants land high-ticket clients without cold outreach.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
    $wp_customize->add_control( 'closeclient_lm_subheadline', array( 'label' => 'Subheadline', 'section' => 'closeclient_lm_content', 'type' => 'textarea' ) );
    $wp_customize->add_setting( 'closeclient_lm_button', array( 'default' => 'Get the Blueprint', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_lm_button', array( 'label' => 'Button Text', 'section' => 'closeclient_lm_content' ) );
    $wp_customize->add_setting( 'closeclient_lm_image', array( 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'closeclient_lm_image', array( 'label' => 'Mockup Image', 'section' => 'closeclient_lm_content' ) ) );

    // FAQ
    $wp_customize->add_section( 'closeclient_faq_content', array( 'title' => '13. FAQ Content', 'panel' => 'closeclient_homepage_panel' ) );
    $wp_customize->add_setting( 'closeclient_faq_headline', array( 'default' => 'Frequently Asked Questions', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_faq_headline', array( 'label' => 'Headline', 'section' => 'closeclient_faq_content' ) );
    $wp_customize->add_setting( 'closeclient_faq_q1', array( 'default' => 'Who is this elite system for?', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_faq_q1', array( 'label' => 'Fallback Q1', 'section' => 'closeclient_faq_content' ) );
    $wp_customize->add_setting( 'closeclient_faq_a1', array( 'default' => 'This is specifically architected for established coaches, consultants, and experts who are ready to scale from $10k to $100k+ months.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
    $wp_customize->add_control( 'closeclient_faq_a1', array( 'label' => 'Fallback A1', 'section' => 'closeclient_faq_content', 'type' => 'textarea' ) );

    // Booking CTA
    $wp_customize->add_section( 'closeclient_booking_content', array( 'title' => '14. Booking CTA Content', 'panel' => 'closeclient_homepage_panel' ) );
    $wp_customize->add_setting( 'closeclient_booking_headline', array( 'default' => 'Are You Ready to Scale Beyond Your Current Ceiling?', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_booking_headline', array( 'label' => 'Headline', 'section' => 'closeclient_booking_content' ) );
    $wp_customize->add_setting( 'closeclient_booking_subheadline', array( 'default' => 'We only partner with 3 new experts per month to ensure elite-level execution. If you are ready to automate your authority, let\'s talk.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_booking_subheadline', array( 'label' => 'Subheadline', 'section' => 'closeclient_booking_content' ) );
    $wp_customize->add_setting( 'closeclient_booking_text', array( 'default' => 'Book Your Scaling Audit', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_booking_text', array( 'label' => 'Button Text', 'section' => 'closeclient_booking_content' ) );
    $wp_customize->add_setting( 'closeclient_booking_link', array( 'default' => '#', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( 'closeclient_booking_link', array( 'label' => 'Button Link', 'section' => 'closeclient_booking_content' ) );
    $wp_customize->add_setting( 'closeclient_booking_note', array( 'default' => 'Current Waiting List: 14 Days', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_booking_note', array( 'label' => 'Bottom Note', 'section' => 'closeclient_booking_content' ) );

    // ==========================================
    // 4. PAGE TEMPLATES PANEL
    // ==========================================

    // About Page Template
    $wp_customize->add_section( 'closeclient_about_tpl', array( 'title' => 'About Page Content', 'panel' => 'closeclient_pages_panel' ) );
    $wp_customize->add_setting( 'closeclient_about_headline_tpl', array( 'default' => 'Stop Chasing. Start Leading.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_about_headline_tpl', array( 'label' => 'Hero Headline', 'section' => 'closeclient_about_tpl' ) );

    // Contact Page Template
    $wp_customize->add_section( 'closeclient_contact_tpl', array( 'title' => 'Contact Page Content', 'panel' => 'closeclient_pages_panel' ) );
    $wp_customize->add_setting( 'closeclient_contact_headline_tpl', array( 'default' => "Let's talk about your growth.", 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_contact_headline_tpl', array( 'label' => 'Hero Headline', 'section' => 'closeclient_contact_tpl' ) );
    $wp_customize->add_setting( 'closeclient_contact_subheadline_tpl', array( 'default' => 'Ready to scale your coaching business? Fill out the form or book a call directly.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_contact_subheadline_tpl', array( 'label' => 'Hero Subheadline', 'section' => 'closeclient_contact_tpl' ) );

    // Sales Page Template
    $wp_customize->add_section( 'closeclient_sales_tpl', array( 'title' => 'Sales Page Content', 'panel' => 'closeclient_pages_panel' ) );
    $wp_customize->add_setting( 'closeclient_sales_hero_headline_tpl', array( 'default' => 'The Exact Blueprint to Scale Your Coaching Business', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_sales_hero_headline_tpl', array( 'label' => 'Hero Headline', 'section' => 'closeclient_sales_tpl' ) );
    $wp_customize->add_setting( 'closeclient_sales_hero_subheadline_tpl', array( 'default' => 'Stop trading time for money. Build a scalable authority system that works for you.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
    $wp_customize->add_control( 'closeclient_sales_hero_subheadline_tpl', array( 'label' => 'Hero Subheadline', 'section' => 'closeclient_sales_tpl', 'type' => 'textarea' ) );

    // Thank You Page Template
    $wp_customize->add_section( 'closeclient_thankyou_tpl', array( 'title' => 'Thank You Page Content', 'panel' => 'closeclient_pages_panel' ) );
    $wp_customize->add_setting( 'closeclient_thankyou_headline_tpl', array( 'default' => "You're All Set!", 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_thankyou_headline_tpl', array( 'label' => 'Hero Headline', 'section' => 'closeclient_thankyou_tpl' ) );

    // Services Page Template
    $wp_customize->add_section( 'closeclient_services_tpl', array( 'title' => 'Services Page Content', 'panel' => 'closeclient_pages_panel' ) );
    $wp_customize->add_setting( 'closeclient_services_subheadline_tpl', array( 'default' => 'Premium solutions tailored for your stage of growth.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_services_subheadline_tpl', array( 'label' => 'Hero Subheadline', 'section' => 'closeclient_services_tpl' ) );

    // Theme Utilities
    $utility_nonce = wp_create_nonce( 'closeclient_utility_action' );

    $wp_customize->add_setting( 'closeclient_gen_pages_trigger', array( 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'closeclient_gen_pages_trigger', array(
        'label'       => __( 'Recreate Starter Pages', 'closeclient' ),
        'description' => sprintf( '<a href="%s" class="button button-secondary">%s</a>', admin_url('?closeclient_action=generate&_wpnonce=' . $utility_nonce), __( 'Generate Now', 'closeclient' ) ),
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
    $wp_customize->add_setting( 'closeclient_sticky_cta_title', array( 'default' => 'Scale to $10k+ Months', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_sticky_cta_title', array( 'label' => 'Sticky CTA Title', 'section' => 'closeclient_blog_global' ) );
}
add_action( 'customize_register', 'closeclient_customize_register' );

/**
 * Render the Customizer CSS
 */
function closeclient_customize_css() {
    ?>
    <style type="text/css">
        :root {
            --primary: <?php echo get_theme_mod( 'closeclient_primary_color', '#0A0A0B' ); ?>;
            --secondary: <?php echo get_theme_mod( 'closeclient_secondary_color', '#F5F5F7' ); ?>;
            --accent: <?php echo get_theme_mod( 'closeclient_accent_color', '#0071E3' ); ?>;
            --text: <?php echo get_theme_mod( 'closeclient_text_color', '#1D1D1F' ); ?>;
            --bg: <?php echo get_theme_mod( 'closeclient_bg_color', '#FFFFFF' ); ?>;
            --button-bg: <?php echo get_theme_mod( 'closeclient_button_color', '#0071E3' ); ?>;
            --button-hover: <?php echo get_theme_mod( 'closeclient_button_hover', '#0077ED' ); ?>;

            --base-font-size: <?php echo get_theme_mod( 'closeclient_body_size', '18' ); ?>px;
            --h1-size: <?php echo get_theme_mod( 'closeclient_h1_size', '4.5' ); ?>rem;
            --line-height: <?php echo get_theme_mod( 'closeclient_line_height', '1.6' ); ?>;
            --letter-spacing: <?php echo get_theme_mod( 'closeclient_letter_spacing', '-0.022' ); ?>em;
            --font-weight: <?php echo get_theme_mod( 'closeclient_body_weight', '400' ); ?>;
            --h1-weight: <?php echo get_theme_mod( 'closeclient_h1_weight', '700' ); ?>;
            --container-width: <?php echo get_theme_mod( 'closeclient_container_width', '1200' ); ?>px;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: "<?php echo get_theme_mod( 'closeclient_heading_font', 'SF Pro Display' ); ?>", sans-serif;
        }
        h1 { font-weight: var(--h1-weight); }

        body {
            font-family: "<?php echo get_theme_mod( 'closeclient_body_font', 'SF Pro Display' ); ?>", sans-serif;
            font-size: var(--base-font-size);
            line-height: var(--line-height);
            letter-spacing: var(--letter-spacing);
            font-weight: var(--font-weight);
        }
    </style>
    <?php
}
add_action( 'wp_head', 'closeclient_customize_css' );
