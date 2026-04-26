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
        'heading_font' => array( 'label' => 'Heading Font', 'default' => 'SF Pro Display', 'type' => 'select', 'choices' => array('SF Pro Display' => 'SF Pro Display', 'Inter' => 'Inter', 'Playfair Display' => 'Playfair Display') ),
        'body_font'    => array( 'label' => 'Body Font', 'default' => 'SF Pro Display', 'type' => 'select', 'choices' => array('SF Pro Display' => 'SF Pro Display', 'Inter' => 'Inter') ),
        'h1_size'      => array( 'label' => 'H1 Font Size (px)', 'default' => '64', 'type' => 'number' ),
        'body_size'    => array( 'label' => 'Body Font Size (px)', 'default' => '18', 'type' => 'number' ),
        'line_height'  => array( 'label' => 'Line Height', 'default' => '1.6', 'type' => 'text' ),
        'letter_spacing'=> array( 'label' => 'Letter Spacing (em)', 'default' => '-0.022', 'type' => 'text' ),
        'font_weight'  => array( 'label' => 'Font Weight', 'default' => '400', 'type' => 'select', 'choices' => array('300'=>'300','400'=>'400','500'=>'500','600'=>'600','700'=>'700') ),
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

    // --- 3. Homepage Sections ---

    // Images (Shared)
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

    // Section Tags (Global)
    $wp_customize->add_section( 'closeclient_section_tags', array(
        'title'    => __( 'Section Tags & Headlines', 'closeclient' ),
        'panel'    => 'closeclient_homepage_panel',
        'priority' => 15,
    ) );

    $tags = array(
        'services_tag' => 'SERVICES',
        'testimonials_tag' => 'SUCCESS STORIES',
        'faq_tag' => 'FAQ',
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

    // About Section
    $wp_customize->add_section( 'closeclient_about', array(
        'title'    => __( 'About Section', 'closeclient' ),
        'panel'    => 'closeclient_homepage_panel',
        'priority' => 30,
    ) );
    $wp_customize->add_setting( 'closeclient_about_headline', array( 'default' => 'Stop Chasing. Start Leading.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_about_headline', array( 'label' => 'About Headline', 'section' => 'closeclient_about' ) );

    // Services Section
    $wp_customize->add_section( 'closeclient_services', array(
        'title'    => __( 'Services Section', 'closeclient' ),
        'panel'    => 'closeclient_homepage_panel',
        'priority' => 40,
    ) );
    $wp_customize->add_setting( 'closeclient_services_headline', array( 'default' => 'Elite Solutions for Elite Experts', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_services_headline', array( 'label' => 'Services Headline', 'section' => 'closeclient_services' ) );
    $wp_customize->add_setting( 'closeclient_services_subheadline', array( 'default' => 'Premium solutions tailored for your stage of growth.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_services_subheadline', array( 'label' => 'Services Subheadline', 'section' => 'closeclient_services' ) );

    // Testimonials
    $wp_customize->add_section( 'closeclient_testimonials', array(
        'title'    => __( 'Testimonials Section', 'closeclient' ),
        'panel'    => 'closeclient_homepage_panel',
        'priority' => 50,
    ) );
    $wp_customize->add_setting( 'closeclient_testimonials_headline', array( 'default' => 'Results From Our Clients', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_testimonials_headline', array( 'label' => 'Testimonials Headline', 'section' => 'closeclient_testimonials' ) );
    $wp_customize->add_setting( 'closeclient_testimonial_1', array( 'default' => '"Within 90 days of implementing this authority system, our high-ticket sales increased by 300% without adding a single hour to my work week."', 'sanitize_callback' => 'sanitize_textarea_field' ) );
    $wp_customize->add_control( 'closeclient_testimonial_1', array( 'label' => 'Testimonial 1 (Fallback)', 'section' => 'closeclient_testimonials', 'type' => 'textarea' ) );

    // Lead Magnet
    $wp_customize->add_section( 'closeclient_lead_magnet', array(
        'title'    => __( 'Lead Magnet Section', 'closeclient' ),
        'panel'    => 'closeclient_homepage_panel',
        'priority' => 60,
    ) );

    $wp_customize->add_setting( 'closeclient_lm_headline', array( 'default' => 'Free Authority Blueprint', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_lm_headline', array( 'label' => 'Headline', 'section' => 'closeclient_lead_magnet' ) );
    $wp_customize->add_setting( 'closeclient_lm_subheadline', array( 'default' => 'Download the exact roadmap I use to help consultants land high-ticket clients without cold outreach.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
    $wp_customize->add_control( 'closeclient_lm_subheadline', array( 'label' => 'Subheadline', 'section' => 'closeclient_lead_magnet', 'type' => 'textarea' ) );
    $wp_customize->add_setting( 'closeclient_lm_button', array( 'default' => 'Get the Blueprint', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_lm_button', array( 'label' => 'Button Text', 'section' => 'closeclient_lead_magnet' ) );

    // FAQ Section
    $wp_customize->add_section( 'closeclient_faq', array(
        'title'    => __( 'FAQ Section', 'closeclient' ),
        'panel'    => 'closeclient_homepage_panel',
        'priority' => 70,
    ) );
    $wp_customize->add_setting( 'closeclient_faq_headline', array( 'default' => 'Frequently Asked Questions', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_faq_headline', array( 'label' => 'Headline', 'section' => 'closeclient_faq' ) );
    $wp_customize->add_setting( 'closeclient_faq_q1', array( 'default' => 'Who is this elite system for?', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_faq_q1', array( 'label' => 'Question 1 (Fallback)', 'section' => 'closeclient_faq' ) );
    $wp_customize->add_setting( 'closeclient_faq_a1', array( 'default' => 'This is specifically architected for established coaches, consultants, and experts who are ready to scale from $10k to $100k+ months.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
    $wp_customize->add_control( 'closeclient_faq_a1', array( 'label' => 'Answer 1 (Fallback)', 'section' => 'closeclient_faq', 'type' => 'textarea' ) );

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
    $wp_customize->add_setting( 'closeclient_booking_note', array( 'default' => 'Only 3 spots available for new clients this month.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_booking_note', array( 'label' => 'Bottom Note', 'section' => 'closeclient_booking_settings' ) );

    // --- 4. Blog & Newsletter ---
    $wp_customize->add_section( 'closeclient_blog_settings', array(
        'title'    => __( 'Blog & Newsletter Settings', 'closeclient' ),
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
            --h1-size: <?php echo get_theme_mod( 'closeclient_h1_size', '64' ); ?>px;
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
 * Register Social Media settings.
 */
function closeclient_customize_register_social( $wp_customize ) {
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
}
add_action( 'customize_register', 'closeclient_customize_register_social' );

/**
 * Register Specialized Page settings.
 */
function closeclient_customize_register_pages( $wp_customize ) {
    $wp_customize->add_panel( 'closeclient_pages_panel', array(
        'title'    => __( 'Page Templates', 'closeclient' ),
        'priority' => 35,
    ) );

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
}
add_action( 'customize_register', 'closeclient_customize_register_pages' );

/**
 * Register Pricing Section settings.
 */
function closeclient_customize_register_pricing( $wp_customize ) {
    $wp_customize->add_section( 'closeclient_pricing', array(
        'title'    => __( 'Pricing Section', 'closeclient' ),
        'panel'    => 'closeclient_homepage_panel',
        'priority' => 45,
    ) );

    $wp_customize->add_setting( 'closeclient_pricing_headline', array( 'default' => 'Invest in Your Growth', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_pricing_headline', array( 'label' => 'Headline', 'section' => 'closeclient_pricing' ) );

    // Plan 1
    $wp_customize->add_setting( 'closeclient_plan1_name', array( 'default' => 'Strategy Audit', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_plan1_name', array( 'label' => 'Plan 1 Name', 'section' => 'closeclient_pricing' ) );
    $wp_customize->add_setting( 'closeclient_plan1_price', array( 'default' => '$497', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_plan1_price', array( 'label' => 'Plan 1 Price', 'section' => 'closeclient_pricing' ) );
    $wp_customize->add_setting( 'closeclient_plan1_features', array( 'default' => '60-Min Deep Dive, Growth Roadmap, Recording included', 'sanitize_callback' => 'sanitize_textarea_field' ) );
    $wp_customize->add_control( 'closeclient_plan1_features', array( 'label' => 'Plan 1 Features (comma separated)', 'section' => 'closeclient_pricing', 'type' => 'textarea' ) );

    // Plan 2 (Featured)
    $wp_customize->add_setting( 'closeclient_plan2_name', array( 'default' => 'Elite Coaching', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_plan2_name', array( 'label' => 'Plan 2 Name', 'section' => 'closeclient_pricing' ) );
    $wp_customize->add_setting( 'closeclient_plan2_price', array( 'default' => '$2,500/mo', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_plan2_price', array( 'label' => 'Plan 2 Price', 'section' => 'closeclient_pricing' ) );
    $wp_customize->add_setting( 'closeclient_plan2_features', array( 'default' => 'Weekly 1:1 Calls, Priority Support, Full Systems Audit, Scale Blueprint', 'sanitize_callback' => 'sanitize_textarea_field' ) );
    $wp_customize->add_control( 'closeclient_plan2_features', array( 'label' => 'Plan 2 Features', 'section' => 'closeclient_pricing', 'type' => 'textarea' ) );

    // Plan 3
    $wp_customize->add_setting( 'closeclient_plan3_name', array( 'default' => 'Mastermind', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_plan3_name', array( 'label' => 'Plan 3 Name', 'section' => 'closeclient_pricing' ) );
    $wp_customize->add_setting( 'closeclient_plan3_price', array( 'default' => 'Custom', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_plan3_price', array( 'label' => 'Plan 3 Price', 'section' => 'closeclient_pricing' ) );
}
add_action( 'customize_register', 'closeclient_customize_register_pricing' );
