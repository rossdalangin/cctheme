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
        'title'       => __( 'Brand Identity', 'closeclient' ),
        'description' => __( 'Manage your brand colors, typography, and logos.', 'closeclient' ),
        'priority'    => 10,
    ) );

    $wp_customize->add_panel( 'closeclient_layout_panel', array(
        'title'       => __( 'Site Layout & Global Settings', 'closeclient' ),
        'description' => __( 'Manage global layout, header, and footer settings.', 'closeclient' ),
        'priority'    => 20,
    ) );

    $wp_customize->add_panel( 'closeclient_homepage_panel', array(
        'title'       => __( 'Homepage & Sections', 'closeclient' ),
        'description' => __( 'Manage content for your homepage and reusable sections.', 'closeclient' ),
        'priority'    => 30,
    ) );

    $wp_customize->add_panel( 'closeclient_pages_panel', array(
        'title'    => __( 'Page Templates', 'closeclient' ),
        'priority' => 35,
    ) );

    // ==========================================
    // SECTIONS & SETTINGS
    // ==========================================

    // --- 1. Brand Identity ---

    // Colors
    $wp_customize->add_section( 'closeclient_colors', array(
        'title'    => __( 'Theme Colors', 'closeclient' ),
        'panel'    => 'closeclient_brand_panel',
        'priority' => 10,
    ) );

    $colors = array(
        'primary_color'    => array( 'label' => __( 'Primary Color', 'closeclient' ), 'default' => '#000000' ),
        'secondary_color'  => array( 'label' => __( 'Secondary Color', 'closeclient' ), 'default' => '#f5f5f7' ),
        'accent_color'     => array( 'label' => __( 'Accent Color', 'closeclient' ), 'default' => '#0071e3' ),
        'text_color'       => array( 'label' => __( 'Text Color', 'closeclient' ), 'default' => '#1d1d1f' ),
        'bg_color'         => array( 'label' => __( 'Background Color', 'closeclient' ), 'default' => '#ffffff' ),
        'button_color'     => array( 'label' => __( 'Button Background', 'closeclient' ), 'default' => '#0071e3' ),
        'button_hover'     => array( 'label' => __( 'Button Hover', 'closeclient' ), 'default' => '#0077ed' ),
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
        'title'    => __( 'Typography', 'closeclient' ),
        'panel'    => 'closeclient_brand_panel',
        'priority' => 20,
    ) );

    $typography = array(
        'heading_font' => array( 'label' => 'Heading Font', 'default' => 'SF Pro Display', 'type' => 'select', 'choices' => array('SF Pro Display' => 'SF Pro Display', 'Inter' => 'Inter', 'Playfair Display' => 'Playfair Display', 'Montserrat' => 'Montserrat') ),
        'body_font'    => array( 'label' => 'Body Font', 'default' => 'SF Pro Display', 'type' => 'select', 'choices' => array('SF Pro Display' => 'SF Pro Display', 'Inter' => 'Inter', 'Open Sans' => 'Open Sans') ),
        'h1_size'      => array( 'label' => 'H1 Max Font Size (rem)', 'default' => '4.5', 'type' => 'text' ),
        'body_size'    => array( 'label' => 'Body Font Size (px)', 'default' => '18', 'type' => 'number' ),
        'line_height'  => array( 'label' => 'Line Height', 'default' => '1.6', 'type' => 'text' ),
        'letter_spacing'=> array( 'label' => 'Letter Spacing (em)', 'default' => '-0.022', 'type' => 'text' ),
        'font_weight'  => array( 'label' => 'Body Font Weight', 'default' => '400', 'type' => 'select', 'choices' => array('300'=>'300','400'=>'400','500'=>'500','600'=>'600','700'=>'700') ),
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

    // --- 2. Site Layout ---

    // Global Layout
    $wp_customize->add_section( 'closeclient_site_layout', array(
        'title'    => __( 'Global Layout', 'closeclient' ),
        'panel'    => 'closeclient_layout_panel',
        'priority' => 10,
    ) );

    $wp_customize->add_setting( 'closeclient_site_layout_type', array(
        'default'           => 'full-width',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'closeclient_site_layout_type', array(
        'label'    => __( 'Site Layout Type', 'closeclient' ),
        'section'  => 'closeclient_site_layout',
        'type'     => 'radio',
        'choices'  => array(
            'full-width' => __( 'Full Width (Seamless)', 'closeclient' ),
            'boxed'      => __( 'Boxed (Luxury Border)', 'closeclient' ),
        ),
    ) );

    $wp_customize->add_setting( 'closeclient_container_width', array(
        'default'           => '1200',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'closeclient_container_width', array(
        'label'    => __( 'Container Max Width (px)', 'closeclient' ),
        'section'  => 'closeclient_site_layout',
        'type'     => 'number',
    ) );

    $wp_customize->add_setting( 'closeclient_default_layout', array(
        'default'           => 'right-sidebar',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'closeclient_default_layout', array(
        'label'    => __( 'Content/Sidebar Layout', 'closeclient' ),
        'section'  => 'closeclient_site_layout',
        'type'     => 'radio',
        'choices'  => array(
            'full-width'    => __( 'Full Width (No Sidebar)', 'closeclient' ),
            'right-sidebar' => __( 'Right Sidebar', 'closeclient' ),
            'left-sidebar'  => __( 'Left Sidebar', 'closeclient' ),
        ),
    ) );

    // Header Settings
    $wp_customize->add_section( 'closeclient_header_settings', array(
        'title'    => __( 'Header Settings', 'closeclient' ),
        'panel'    => 'closeclient_layout_panel',
        'priority' => 20,
    ) );

    $wp_customize->add_setting( 'closeclient_header_cta_text', array(
        'default'           => 'Book a Call',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'closeclient_header_cta_text', array( 'label' => 'CTA Button Text', 'section' => 'closeclient_header_settings' ) );

    $wp_customize->add_setting( 'closeclient_header_cta_link', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'closeclient_header_cta_link', array( 'label' => 'CTA Button Link', 'section' => 'closeclient_header_settings' ) );

    // Footer Settings
    $wp_customize->add_section( 'closeclient_footer_settings', array(
        'title'    => __( 'Footer Settings', 'closeclient' ),
        'panel'    => 'closeclient_layout_panel',
        'priority' => 30,
    ) );

    $wp_customize->add_setting( 'closeclient_footer_copyright', array(
        'default'           => '© ' . date('Y') . ' CloseClient. All rights reserved.',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'closeclient_footer_copyright', array( 'label' => 'Copyright Text', 'section' => 'closeclient_footer_settings' ) );

    // Social Media Links
    $wp_customize->add_section( 'closeclient_social_settings', array(
        'title'    => __( 'Social Media Links', 'closeclient' ),
        'panel'    => 'closeclient_layout_panel',
        'priority' => 40,
    ) );

    $socials = array(
        'twitter' => 'Twitter',
        'facebook' => 'Facebook',
        'linkedin' => 'LinkedIn',
        'instagram' => 'Instagram',
        'youtube' => 'YouTube',
    );

    foreach ( $socials as $id => $label ) {
        $wp_customize->add_setting( "closeclient_social_{$id}", array( 'default' => '#', 'sanitize_callback' => 'esc_url_raw' ) );
        $wp_customize->add_control( "closeclient_social_{$id}", array( 'label' => $label, 'section' => 'closeclient_social_settings' ) );
    }

    // --- 3. Homepage Sections ---

    // Section Images (Shared)
    $wp_customize->add_section( 'closeclient_images', array(
        'title'    => __( 'Section Images', 'closeclient' ),
        'panel'    => 'closeclient_homepage_panel',
        'priority' => 10,
    ) );

    $images = array(
        'hero_image' => 'Hero Section Image',
        'about_image' => 'About Section Image',
        'team_image' => 'Team Photo',
        'testimonial_photo' => 'Testimonial Author Photo',
        'lm_image' => 'Lead Magnet Mockup Image',
    );

    foreach ( $images as $id => $label ) {
        $wp_customize->add_setting( "closeclient_{$id}", array( 'sanitize_callback' => 'esc_url_raw' ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "closeclient_{$id}", array( 'label' => $label, 'section' => 'closeclient_images' ) ) );
    }

    // Authority Logos
    $wp_customize->add_section( 'closeclient_authority_settings', array(
        'title'    => __( 'Authority Logo Bar', 'closeclient' ),
        'panel'    => 'closeclient_homepage_panel',
        'priority' => 25,
    ) );

    for ( $i = 1; $i <= 5; $i++ ) {
        $wp_customize->add_setting( "closeclient_authority_logo_$i", array( 'sanitize_callback' => 'esc_url_raw' ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "closeclient_authority_logo_$i", array(
            'label'    => "Logo $i",
            'section'  => 'closeclient_authority_settings',
        ) ) );
    }

    // Section Tags & Headlines
    $wp_customize->add_section( 'closeclient_section_tags', array(
        'title'    => __( 'Section Tags & Headlines', 'closeclient' ),
        'panel'    => 'closeclient_homepage_panel',
        'priority' => 15,
    ) );

    $tags = array(
        'services_tag' => 'SERVICES',
        'testimonials_tag' => 'SUCCESS STORIES',
        'faq_tag' => 'FAQ',
        'process_tag' => 'OUR PROCESS',
        'team_tag' => 'MEET THE TEAM',
    );

    foreach ( $tags as $id => $default ) {
        $wp_customize->add_setting( "closeclient_{$id}", array( 'default' => $default, 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "closeclient_{$id}", array( 'label' => ucwords(str_replace('_', ' ', $id)), 'section' => 'closeclient_section_tags' ) );
    }

    // Hero Section
    $wp_customize->add_section( 'closeclient_hero', array(
        'title'    => __( 'Hero Section', 'closeclient' ),
        'panel'    => 'closeclient_homepage_panel',
        'priority' => 20,
    ) );

    $wp_customize->add_setting( 'closeclient_hero_headline', array(
        'default'           => __( 'Scale Your Authority. Sell Your Expertise.', 'closeclient' ),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'closeclient_hero_headline', array( 'label' => 'Headline', 'section' => 'closeclient_hero' ) );

    $wp_customize->add_setting( 'closeclient_hero_subheadline', array(
        'default'           => __( 'I help high-level coaches and consultants build elite digital platforms that turn visitors into high-ticket clients on autopilot.', 'closeclient' ),
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'closeclient_hero_subheadline', array( 'label' => 'Subheadline', 'section' => 'closeclient_hero', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'closeclient_hero_cta', array( 'default' => 'Book Your Strategy Call', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_hero_cta', array( 'label' => 'CTA Text', 'section' => 'closeclient_hero' ) );

    $wp_customize->add_setting( 'closeclient_hero_cta_link', array( 'default' => '#', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( 'closeclient_hero_cta_link', array( 'label' => 'CTA Link', 'section' => 'closeclient_hero' ) );

    // Stats Section
    $wp_customize->add_section( 'closeclient_stats', array(
        'title'    => __( 'Stats & Results', 'closeclient' ),
        'panel'    => 'closeclient_homepage_panel',
        'priority' => 35,
    ) );

    for ( $i = 1; $i <= 3; $i++ ) {
        $wp_customize->add_setting( "closeclient_stat_{$i}_value", array( 'default' => '100+', 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "closeclient_stat_{$i}_value", array( 'label' => "Stat $i Value", 'section' => 'closeclient_stats' ) );

        $wp_customize->add_setting( "closeclient_stat_{$i}_label", array( 'default' => 'Clients Helped', 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "closeclient_stat_{$i}_label", array( 'label' => "Stat $i Label", 'section' => 'closeclient_stats' ) );
    }

    // Process Section
    $wp_customize->add_section( 'closeclient_process', array(
        'title'    => __( 'Process Section', 'closeclient' ),
        'panel'    => 'closeclient_homepage_panel',
        'priority' => 42,
    ) );

    $wp_customize->add_setting( 'closeclient_process_headline', array( 'default' => 'How It Works', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_process_headline', array( 'label' => 'Headline', 'section' => 'closeclient_process' ) );

    for ( $i = 1; $i <= 3; $i++ ) {
        $wp_customize->add_setting( "closeclient_process_step_{$i}_title", array( 'default' => "Step $i", 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "closeclient_process_step_{$i}_title", array( 'label' => "Step $i Title", 'section' => 'closeclient_process' ) );

        $wp_customize->add_setting( "closeclient_process_step_{$i}_text", array( 'default' => "Description for step $i of your proven process.", 'sanitize_callback' => 'sanitize_textarea_field' ) );
        $wp_customize->add_control( "closeclient_process_step_{$i}_text", array( 'label' => "Step $i Description", 'section' => 'closeclient_process', 'type' => 'textarea' ) );
    }

    // Pricing Section
    $wp_customize->add_section( 'closeclient_pricing', array(
        'title'    => __( 'Pricing Section', 'closeclient' ),
        'panel'    => 'closeclient_homepage_panel',
        'priority' => 45,
    ) );

    $wp_customize->add_setting( 'closeclient_pricing_headline', array( 'default' => 'Invest in Your Growth', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_pricing_headline', array( 'label' => 'Headline', 'section' => 'closeclient_pricing' ) );

    for ( $i = 1; $i <= 3; $i++ ) {
        $wp_customize->add_setting( "closeclient_plan{$i}_name", array( 'default' => "Plan $i", 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "closeclient_plan{$i}_name", array( 'label' => "Plan $i Name", 'section' => 'closeclient_pricing' ) );
        $wp_customize->add_setting( "closeclient_plan{$i}_price", array( 'default' => "$0", 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "closeclient_plan{$i}_price", array( 'label' => "Plan $i Price", 'section' => 'closeclient_pricing' ) );
        $wp_customize->add_setting( "closeclient_plan{$i}_features", array( 'default' => "Feature 1, Feature 2", 'sanitize_callback' => 'sanitize_textarea_field' ) );
        $wp_customize->add_control( "closeclient_plan{$i}_features", array( 'label' => "Plan $i Features", 'section' => 'closeclient_pricing', 'type' => 'textarea' ) );
    }

    // Team Section
    $wp_customize->add_section( 'closeclient_team', array(
        'title'    => __( 'Team Section', 'closeclient' ),
        'panel'    => 'closeclient_homepage_panel',
        'priority' => 55,
    ) );

    $wp_customize->add_setting( 'closeclient_team_headline', array( 'default' => 'Meet the Experts', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_team_headline', array( 'label' => 'Headline', 'section' => 'closeclient_team' ) );

    // FAQ Section
    $wp_customize->add_section( 'closeclient_faq', array(
        'title'    => __( 'FAQ Section', 'closeclient' ),
        'panel'    => 'closeclient_homepage_panel',
        'priority' => 70,
    ) );
    $wp_customize->add_setting( 'closeclient_faq_headline', array( 'default' => 'Frequently Asked Questions', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_faq_headline', array( 'label' => 'Headline', 'section' => 'closeclient_faq' ) );

    // Booking Section
    $wp_customize->add_section( 'closeclient_booking_settings', array(
        'title'    => __( 'Booking Section', 'closeclient' ),
        'panel'    => 'closeclient_homepage_panel',
        'priority' => 80,
    ) );

    $wp_customize->add_setting( 'closeclient_booking_headline', array( 'default' => 'Ready to Scale Your Authority?', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_booking_headline', array( 'label' => 'Headline', 'section' => 'closeclient_booking_settings' ) );
    $wp_customize->add_setting( 'closeclient_booking_subheadline', array( 'default' => 'Book a 15-minute strategy audit to see if we are a fit to work together.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_booking_subheadline', array( 'label' => 'Subheadline', 'section' => 'closeclient_booking_settings' ) );
    $wp_customize->add_setting( 'closeclient_booking_text', array( 'default' => 'Book My Strategy Audit', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_booking_text', array( 'label' => 'Button Text', 'section' => 'closeclient_booking_settings' ) );
    $wp_customize->add_setting( 'closeclient_booking_link', array( 'default' => '#', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( 'closeclient_booking_link', array( 'label' => 'Button Link', 'section' => 'closeclient_booking_settings' ) );

    // --- 4. Page Templates ---

    // About Page
    $wp_customize->add_section( 'closeclient_about_page', array(
        'title'    => __( 'About Page', 'closeclient' ),
        'panel'    => 'closeclient_pages_panel',
    ) );
    $wp_customize->add_setting( 'closeclient_about_headline', array( 'default' => 'Stop Chasing. Start Leading.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_about_headline', array( 'label' => 'Headline', 'section' => 'closeclient_about_page' ) );

    // Contact Page
    $wp_customize->add_section( 'closeclient_contact_page', array(
        'title'    => __( 'Contact Page', 'closeclient' ),
        'panel'    => 'closeclient_pages_panel',
    ) );
    $wp_customize->add_setting( 'closeclient_contact_headline', array( 'default' => 'Let\'s talk about your growth.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_contact_headline', array( 'label' => 'Headline', 'section' => 'closeclient_contact_page' ) );
    $wp_customize->add_setting( 'closeclient_contact_subheadline', array( 'default' => 'Ready to scale your coaching business? Fill out the form or book a call directly.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_contact_subheadline', array( 'label' => 'Subheadline', 'section' => 'closeclient_contact_page' ) );

    // Thank You Page
    $wp_customize->add_section( 'closeclient_thankyou_page', array(
        'title'    => __( 'Thank You Page', 'closeclient' ),
        'panel'    => 'closeclient_pages_panel',
    ) );
    $wp_customize->add_setting( 'closeclient_thankyou_headline', array( 'default' => 'You\'re All Set!', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_thankyou_headline', array( 'label' => 'Headline', 'section' => 'closeclient_thankyou_page' ) );

    // Sales Page
    $wp_customize->add_section( 'closeclient_sales_page_settings', array(
        'title'    => __( 'Sales Page', 'closeclient' ),
        'panel'    => 'closeclient_pages_panel',
    ) );
    $wp_customize->add_setting( 'closeclient_sales_hero_headline', array( 'default' => 'The Exact Blueprint to Scale Your Coaching Business', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_sales_hero_headline', array( 'label' => 'Hero Headline', 'section' => 'closeclient_sales_page_settings' ) );
    $wp_customize->add_setting( 'closeclient_sales_hero_subheadline', array( 'default' => 'Stop trading time for money. Build a scalable authority system that works for you.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
    $wp_customize->add_control( 'closeclient_sales_hero_subheadline', array( 'label' => 'Hero Subheadline', 'section' => 'closeclient_sales_page_settings', 'type' => 'textarea' ) );

    // Blog & Newsletter
    $wp_customize->add_section( 'closeclient_blog_settings', array(
        'title'    => __( 'Blog & Newsletter', 'closeclient' ),
        'priority' => 90,
    ) );

    $wp_customize->add_setting( 'closeclient_blog_title', array( 'default' => 'Insights & Authority', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_blog_title', array( 'label' => 'Blog Index Title', 'section' => 'closeclient_blog_settings' ) );
    $wp_customize->add_setting( 'closeclient_blog_description', array( 'default' => 'Expert strategies to scale your coaching business.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_blog_description', array( 'label' => 'Blog Index Description', 'section' => 'closeclient_blog_settings' ) );

    $wp_customize->add_setting( 'closeclient_newsletter_title', array( 'default' => 'Join the Authority Circle', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_newsletter_title', array( 'label' => 'Newsletter Headline', 'section' => 'closeclient_blog_settings' ) );
    $wp_customize->add_setting( 'closeclient_newsletter_text', array( 'default' => 'Weekly insights on authority positioning, high-ticket sales, and scaling systems for coaches.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_newsletter_text', array( 'label' => 'Newsletter Text', 'section' => 'closeclient_blog_settings' ) );
    $wp_customize->add_setting( 'closeclient_newsletter_button', array( 'default' => 'Subscribe Now', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_newsletter_button', array( 'label' => 'Newsletter Button Text', 'section' => 'closeclient_blog_settings' ) );

    $wp_customize->add_setting( 'closeclient_sticky_cta_title', array( 'default' => 'Scale to $10k+ Months', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_sticky_cta_title', array( 'label' => 'Sticky CTA Title', 'section' => 'closeclient_blog_settings' ) );
}
add_action( 'customize_register', 'closeclient_customize_register' );

/**
 * Render the Customizer CSS
 */
function closeclient_customize_css() {
    ?>
    <style type="text/css">
        :root {
            --primary: <?php echo get_theme_mod( 'closeclient_primary_color', '#000000' ); ?>;
            --secondary: <?php echo get_theme_mod( 'closeclient_secondary_color', '#f5f5f7' ); ?>;
            --accent: <?php echo get_theme_mod( 'closeclient_accent_color', '#0071e3' ); ?>;
            --text: <?php echo get_theme_mod( 'closeclient_text_color', '#1d1d1f' ); ?>;
            --bg: <?php echo get_theme_mod( 'closeclient_bg_color', '#ffffff' ); ?>;
            --button-bg: <?php echo get_theme_mod( 'closeclient_button_color', '#0071e3' ); ?>;
            --button-hover: <?php echo get_theme_mod( 'closeclient_button_hover', '#0077ed' ); ?>;

            --base-font-size: <?php echo get_theme_mod( 'closeclient_body_size', '18' ); ?>px;
            --h1-size: <?php echo get_theme_mod( 'closeclient_h1_size', '4.5' ); ?>rem;
            --line-height: <?php echo get_theme_mod( 'closeclient_line_height', '1.6' ); ?>;
            --letter-spacing: <?php echo get_theme_mod( 'closeclient_letter_spacing', '-0.022' ); ?>em;
            --font-weight: <?php echo get_theme_mod( 'closeclient_font_weight', '400' ); ?>;
            --container-width: <?php echo get_theme_mod( 'closeclient_container_width', '1200' ); ?>px;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: "<?php echo get_theme_mod( 'closeclient_heading_font', 'SF Pro Display' ); ?>", sans-serif;
        }

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

/**
 * Register Team Member settings.
 */
function closeclient_customize_register_team_details( $wp_customize ) {
    $wp_customize->add_setting( 'closeclient_team_member_name', array( 'default' => 'Coach Name', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_team_member_name', array( 'label' => 'Team Member Name', 'section' => 'closeclient_team' ) );
    $wp_customize->add_setting( 'closeclient_team_member_role', array( 'default' => 'Founder & CEO', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_team_member_role', array( 'label' => 'Team Member Role', 'section' => 'closeclient_team' ) );
}
add_action( 'customize_register', 'closeclient_customize_register_team_details' );

/**
 * Register About Section text settings.
 */
function closeclient_customize_register_about_extra( $wp_customize ) {
    $wp_customize->add_setting( 'closeclient_about_text_p1', array( 'default' => 'You didn\'t start your coaching business to spend 8 hours a day in the DMs. You started it to make an impact and build freedom.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
    $wp_customize->add_control( 'closeclient_about_text_p1', array( 'label' => 'About Text Paragraph 1', 'section' => 'closeclient_about', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'closeclient_about_text_p2', array( 'default' => 'I help established experts build the infrastructure they need to scale without sacrificing their personal life.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
    $wp_customize->add_control( 'closeclient_about_text_p2', array( 'label' => 'About Text Paragraph 2', 'section' => 'closeclient_about', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'closeclient_about_button_text', array( 'default' => 'Learn More About My Story', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_about_button_text', array( 'label' => 'About Button Text', 'section' => 'closeclient_about' ) );
}
add_action( 'customize_register', 'closeclient_customize_register_about_extra' );

/**
 * Register Section Visibility settings.
 */
function closeclient_customize_register_visibility( $wp_customize ) {
    $wp_customize->add_section( 'closeclient_visibility', array(
        'title'    => __( 'Section Visibility (Homepage)', 'closeclient' ),
        'panel'    => 'closeclient_homepage_panel',
        'priority' => 5,
    ) );

    $sections = array(
        'hero' => 'Hero',
        'authority' => 'Authority',
        'stats' => 'Stats',
        'about' => 'About',
        'services' => 'Services',
        'process' => 'Process',
        'pricing' => 'Pricing',
        'testimonials' => 'Testimonials',
        'team' => 'Team',
        'lead_magnet' => 'Lead Magnet',
        'faq' => 'FAQ',
        'booking' => 'Booking CTA',
    );

    foreach ( $sections as $id => $label ) {
        $wp_customize->add_setting( "closeclient_show_$id", array( 'default' => true, 'sanitize_callback' => 'absint' ) );
        $wp_customize->add_control( "closeclient_show_$id", array(
            'label'    => "Show $label Section",
            'section'  => 'closeclient_visibility',
            'type'     => 'checkbox',
        ) );
    }
}
add_action( 'customize_register', 'closeclient_customize_register_visibility' );
