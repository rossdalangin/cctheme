<?php
/**
 * CloseClient Customizer functionality
 * AUTO-GENERATED - Triple-Lock Sync
 */

function closeclient_hex_to_rgb( $hex ) {
    $hex = str_replace( '#', '', $hex );
    if ( strlen( $hex ) == 3 ) {
        $r = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
        $g = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
        $b = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
    } else {
        $r = hexdec( substr( $hex, 0, 2 ) );
        $g = hexdec( substr( $hex, 2, 2 ) );
        $b = hexdec( substr( $hex, 4, 2 ) );
    }
    return "$r, $g, $b";
}

function closeclient_customize_register( $wp_customize ) {
    $wp_customize->add_panel( 'closeclient_brand_panel', array( 'title' => '1. Elite Brand Identity' ) );
    $wp_customize->add_panel( 'closeclient_homepage_panel', array( 'title' => '3. Homepage Sections' ) );
    $wp_customize->add_panel( 'closeclient_layout_panel', array( 'title' => '2. Strategic Layout Control' ) );
    $wp_customize->add_panel( 'closeclient_pages_panel', array( 'title' => '4. Page Templates' ) );

    $wp_customize->add_section( 'closeclient_about_tpl', array( 'title' => 'About Template', 'panel' => 'closeclient_pages_panel' ) );
    $wp_customize->add_section( 'closeclient_booking', array( 'title' => 'Booking CTA', 'panel' => 'closeclient_homepage_panel' ) );
    $wp_customize->add_section( 'closeclient_colors', array( 'title' => 'Theme Colors', 'panel' => 'closeclient_brand_panel' ) );
    $wp_customize->add_section( 'closeclient_contact_tpl', array( 'title' => 'Contact Template', 'panel' => 'closeclient_pages_panel' ) );
    $wp_customize->add_section( 'closeclient_faq', array( 'title' => 'FAQ', 'panel' => 'closeclient_homepage_panel' ) );
    $wp_customize->add_section( 'closeclient_forms', array( 'title' => 'Form & CRM Actions', 'panel' => 'closeclient_brand_panel' ) );
    $wp_customize->add_section( 'closeclient_hero', array( 'title' => '1. Hero Content', 'panel' => 'closeclient_homepage_panel' ) );
    $wp_customize->add_section( 'closeclient_labels', array( 'title' => 'Global UI Labels', 'panel' => 'closeclient_pages_panel' ) );
    $wp_customize->add_section( 'closeclient_layout_section', array( 'title' => 'Global Layout', 'panel' => 'closeclient_layout_panel' ) );
    $wp_customize->add_section( 'closeclient_leadmagnet_tpl', array( 'title' => 'Lead Magnet Template', 'panel' => 'closeclient_pages_panel' ) );
    $wp_customize->add_section( 'closeclient_pricing', array( 'title' => 'Pricing', 'panel' => 'closeclient_homepage_panel' ) );
    $wp_customize->add_section( 'closeclient_process', array( 'title' => 'Process', 'panel' => 'closeclient_homepage_panel' ) );
    $wp_customize->add_section( 'closeclient_services', array( 'title' => 'Services', 'panel' => 'closeclient_homepage_panel' ) );
    $wp_customize->add_section( 'closeclient_social', array( 'title' => 'Social Media Links', 'panel' => 'closeclient_layout_panel' ) );
    $wp_customize->add_section( 'closeclient_stats', array( 'title' => 'Stats & Impact', 'panel' => 'closeclient_homepage_panel' ) );
    $wp_customize->add_section( 'closeclient_team', array( 'title' => 'Team', 'panel' => 'closeclient_homepage_panel' ) );
    $wp_customize->add_section( 'closeclient_testimonials', array( 'title' => 'Testimonials', 'panel' => 'closeclient_homepage_panel' ) );
    $wp_customize->add_section( 'closeclient_thankyou_tpl', array( 'title' => 'Thank You Template', 'panel' => 'closeclient_pages_panel' ) );
    $wp_customize->add_section( 'closeclient_typography', array( 'title' => 'Typography', 'panel' => 'closeclient_brand_panel' ) );
    $wp_customize->add_section( 'closeclient_utilities', array( 'title' => '5. Theme Setup & Tools' ) );
    $wp_customize->add_section( 'closeclient_visibility', array( 'title' => '0. Visibility', 'panel' => 'closeclient_homepage_panel' ) );
    $wp_customize->add_section( 'closeclient_vsl', array( 'title' => '2. VSL Training', 'panel' => 'closeclient_homepage_panel' ) );

    // Helpers
    $labels = array(
        'closeclient_about_headline_tpl' => 'About Page Headline',
        'closeclient_about_method_title' => 'Methodology Title',
        'closeclient_accent_color' => 'Accent Color (Brand)',
        'closeclient_bg_color' => 'Background Color',
        'closeclient_body_font' => 'Body Font Family',
        'closeclient_body_size' => 'Body Font Size (px)',
        'closeclient_body_weight' => 'Body Font Weight',
        'closeclient_booking_headline' => 'Booking Headline',
        'closeclient_booking_link' => 'Booking Link (URL/#anchor)',
        'closeclient_booking_note' => 'Booking Waitlist Note',
        'closeclient_booking_scarcity' => 'Scarcity Messaging',
        'closeclient_booking_subheadline' => 'Booking Subheadline',
        'closeclient_booking_text' => 'Booking Button Text',
        'closeclient_button_color' => 'Primary Button Color',
        'closeclient_button_hover' => 'Button Hover Color',
        'closeclient_color_preset' => 'Global Color Preset',
        'closeclient_contact_form_action' => 'Custom Form Action URL (GHL/HubSpot)',
        'closeclient_contact_form_shortcode' => 'Contact Form Shortcode (CF7)',
        'closeclient_contact_headline_tpl' => 'Contact Page Headline',
        'closeclient_contact_subheadline_tpl' => 'Contact Page Subheadline',
        'closeclient_container_width' => 'Site Container Width (px)',
        'closeclient_content_width' => 'Reading Content Width (px)',
        'closeclient_faq_a1' => 'FAQ 1: Answer',
        'closeclient_faq_a2' => 'FAQ 2: Answer',
        'closeclient_faq_a3' => 'FAQ 3: Answer',
        'closeclient_faq_headline' => 'FAQ Headline',
        'closeclient_faq_q1' => 'FAQ 1: Question',
        'closeclient_faq_q2' => 'FAQ 2: Question',
        'closeclient_faq_q3' => 'FAQ 3: Question',
        'closeclient_faq_tag' => 'FAQ Tag',
        'closeclient_floating_cta_threshold' => 'Floating CTA Scroll Threshold (px)',
        'closeclient_footer_about' => 'Footer "About" Text',
        'closeclient_footer_copyright' => 'Copyright Text',
        'closeclient_footer_disclaimer' => 'Legal Disclaimer',
        'closeclient_h1_size' => 'H1 Font Size (rem)',
        'closeclient_h1_weight' => 'H1 Font Weight',
        'closeclient_header_cta_link' => 'Header Button Link',
        'closeclient_header_cta_text' => 'Header Button Text',
        'closeclient_header_glass' => 'Header Opacity (0.1 - 1.0)',
        'closeclient_header_sticky' => 'Enable Sticky Header',
        'closeclient_heading_font' => 'Heading Font Family',
        'closeclient_hero_cta' => 'Hero Button Text',
        'closeclient_hero_cta_link' => 'Hero Button Link',
        'closeclient_hero_headline' => 'Hero Headline (Authority Statement)',
        'closeclient_hero_subheadline' => 'Hero Subheadline',
        'closeclient_hero_typewriter' => 'Enable Typewriter Effect',
        'closeclient_label_404_btn' => '404 Button Text',
        'closeclient_label_404_tag' => '404 Tag',
        'closeclient_label_404_text' => '404 Message',
        'closeclient_label_404_title' => '404 Title',
        'closeclient_label_challenge' => 'Case Study: Challenge Label',
        'closeclient_label_outcome' => 'Case Study: Outcome Label',
        'closeclient_label_read_more' => 'Read More Label',
        'closeclient_label_related' => 'Related Posts Label',
        'closeclient_label_search' => 'Search Results Label',
        'closeclient_label_share' => 'Social Share Label',
        'closeclient_label_solution' => 'Case Study: Solution Label',
        'closeclient_leadmagnet_headline_tpl' => 'Lead Magnet Headline',
        'closeclient_leadmagnet_text_tpl' => 'Lead Magnet Text',
        'closeclient_letter_spacing' => 'Global Letter Spacing',
        'closeclient_line_height' => 'Global Line Height',
        'closeclient_lm_form_action' => 'Lead Magnet Form Action',
        'closeclient_newsletter_form_action' => 'Newsletter Form Action',
        'closeclient_plan1_features' => 'Plan 1: Features (Comma Separated)',
        'closeclient_plan1_name' => 'Plan 1: Name',
        'closeclient_plan1_price' => 'Plan 1: Price',
        'closeclient_plan2_features' => 'Plan 2: Features (Comma Separated)',
        'closeclient_plan2_name' => 'Plan 2: Name',
        'closeclient_plan2_price' => 'Plan 2: Price',
        'closeclient_plan3_features' => 'Plan 3: Features (Comma Separated)',
        'closeclient_plan3_name' => 'Plan 3: Name',
        'closeclient_plan3_price' => 'Plan 3: Price',
        'closeclient_pricing_headline' => 'Pricing Headline',
        'closeclient_pricing_tag' => 'Pricing Tag',
        'closeclient_primary_color' => 'Primary Brand Color',
        'closeclient_process_headline' => 'Process Headline',
        'closeclient_process_step_1_text' => 'Step 1: Description',
        'closeclient_process_step_1_title' => 'Step 1: Title',
        'closeclient_process_step_2_text' => 'Step 2: Description',
        'closeclient_process_step_2_title' => 'Step 2: Title',
        'closeclient_process_step_3_text' => 'Step 3: Description',
        'closeclient_process_step_3_title' => 'Step 3: Title',
        'closeclient_process_tag' => 'Process Tag',
        'closeclient_secondary_color' => 'Secondary Brand Color',
        'closeclient_service_1_text' => 'Service 1: Description',
        'closeclient_service_1_title' => 'Service 1: Title',
        'closeclient_service_2_text' => 'Service 2: Description',
        'closeclient_service_2_title' => 'Service 2: Title',
        'closeclient_service_3_text' => 'Service 3: Description',
        'closeclient_service_3_title' => 'Service 3: Title',
        'closeclient_services_headline' => 'Services Headline',
        'closeclient_services_tag' => 'Services Tag',
        'closeclient_stat_1_label' => 'Stat 1: Label',
        'closeclient_stat_1_value' => 'Stat 1: Value',
        'closeclient_stat_2_label' => 'Stat 2: Label',
        'closeclient_stat_2_value' => 'Stat 2: Value',
        'closeclient_stat_3_label' => 'Stat 3: Label',
        'closeclient_stat_3_value' => 'Stat 3: Value',
        'closeclient_stats_tag' => 'Stats Tag',
        'closeclient_team_1_name' => 'Team 1: Name',
        'closeclient_team_1_role' => 'Team 1: Role',
        'closeclient_team_2_name' => 'Team 2: Name',
        'closeclient_team_2_role' => 'Team 2: Role',
        'closeclient_team_3_name' => 'Team 3: Name',
        'closeclient_team_3_role' => 'Team 3: Role',
        'closeclient_team_headline' => 'Team Headline',
        'closeclient_team_tag' => 'Team Tag',
        'closeclient_testimonial_1_name' => 'Testimonial 1: Name',
        'closeclient_testimonial_1_role' => 'Testimonial 1: Role',
        'closeclient_testimonial_1_text' => 'Testimonial 1: Copy',
        'closeclient_testimonial_2_name' => 'Testimonial 2: Name',
        'closeclient_testimonial_2_role' => 'Testimonial 2: Role',
        'closeclient_testimonial_2_text' => 'Testimonial 2: Copy',
        'closeclient_testimonial_3_name' => 'Testimonial 3: Name',
        'closeclient_testimonial_3_role' => 'Testimonial 3: Role',
        'closeclient_testimonial_3_text' => 'Testimonial 3: Copy',
        'closeclient_testimonials_headline' => 'Testimonials Headline',
        'closeclient_testimonials_tag' => 'Testimonials Tag',
        'closeclient_text_color' => 'Global Text Color',
        'closeclient_thankyou_headline_tpl' => 'Thank You Headline',
        'closeclient_thankyou_text_tpl' => 'Thank You Message',
        'closeclient_vsl_headline' => 'VSL Headline',
        'closeclient_vsl_tag' => 'VSL Tag',
        'closeclient_vsl_video_url' => 'VSL Video URL (YouTube/Vimeo)',
        'closeclient_show_authority' => 'Show Authority Section',
        'closeclient_show_booking' => 'Show Booking CTA',
        'closeclient_show_faq' => 'Show FAQ Section',
        'closeclient_show_floating_cta' => 'Show Floating CTA',
        'closeclient_show_hero' => 'Show Hero Section',
        'closeclient_show_lead_magnet' => 'Show Lead Magnet Section',
        'closeclient_show_logo_ticker' => 'Show Logo Ticker',
        'closeclient_show_newsletter' => 'Show Newsletter Section',
        'closeclient_show_portfolio' => 'Show Portfolio Section',
        'closeclient_show_preloader' => 'Enable Preloader Interaction',
        'closeclient_show_pricing' => 'Show Pricing Section',
        'closeclient_show_process' => 'Show Process Section',
        'closeclient_show_products' => 'Show Products Section',
        'closeclient_show_services' => 'Show Services Section',
        'closeclient_show_stats' => 'Show Stats Section',
        'closeclient_show_team' => 'Show Team Section',
        'closeclient_show_testimonials' => 'Show Testimonials Section',
        'closeclient_show_vsl' => 'Show VSL Section',
        'closeclient_social_facebook' => 'Facebook URL',
        'closeclient_social_instagram' => 'Instagram URL',
        'closeclient_social_linkedin' => 'LinkedIn URL',
        'closeclient_social_twitter' => 'Twitter URL',
        'closeclient_social_youtube' => 'YouTube URL',
        'closeclient_products_headline' => 'Products Section Headline',
        'closeclient_products_desc' => 'Products Section Description',
        'closeclient_label_portfolio_archive_tag' => 'Portfolio Archive Tag',
        'closeclient_label_portfolio_archive_title' => 'Portfolio Archive Title',
        'closeclient_label_portfolio_archive_desc' => 'Portfolio Archive Description',
        'closeclient_label_portfolio_btn' => 'Portfolio View Button Text',
    );

    // Dynamic Register
    $defaults = closeclient_get_defaults();
    foreach ($defaults as $key => $val) {
        $wp_customize->add_setting( $key, array( 'default' => $val, 'sanitize_callback' => 'sanitize_text_field' ) );

        $section = 'closeclient_labels';
        if (strpos($key, 'color') !== false) $section = 'closeclient_colors';
        elseif (strpos($key, 'font') !== false || strpos($key, 'size') !== false || strpos($key, 'weight') !== false || strpos($key, 'spacing') !== false || strpos($key, 'line_height') !== false) $section = 'closeclient_typography';
        elseif (strpos($key, 'hero') !== false) $section = 'closeclient_hero';
        elseif (strpos($key, 'vsl') !== false) $section = 'closeclient_vsl';
        elseif (strpos($key, 'service') !== false) $section = 'closeclient_services';
        elseif (strpos($key, 'portfolio') !== false) $section = 'closeclient_labels';
        elseif (strpos($key, 'stat') !== false) $section = 'closeclient_stats';
        elseif (strpos($key, 'team') !== false) $section = 'closeclient_team';
        elseif (strpos($key, 'faq') !== false) $section = 'closeclient_faq';
        elseif (strpos($key, 'pricing') !== false || strpos($key, 'plan') !== false) $section = 'closeclient_pricing';
        elseif (strpos($key, 'process') !== false) $section = 'closeclient_process';
        elseif (strpos($key, 'booking') !== false) $section = 'closeclient_booking';
        elseif (strpos($key, 'social') !== false) $section = 'closeclient_social';
        elseif (strpos($key, 'show_') !== false) $section = 'closeclient_visibility';
        elseif (strpos($key, 'width') !== false || strpos($key, 'header') !== false || strpos($key, 'footer') !== false) $section = 'closeclient_layout_section';
        elseif (strpos($key, 'form_action') !== false || strpos($key, 'shortcode') !== false) $section = 'closeclient_forms';
        elseif (strpos($key, 'product') !== false) $section = 'closeclient_products';

        $label = isset($labels[$key]) ? $labels[$key] : $key;

        if ($key === 'closeclient_color_preset') {
            $wp_customize->add_control( $key, array(
                'label' => $label,
                'section' => 'closeclient_colors',
                'type' => 'select',
                'choices' => array(
                    'deep-onyx' => 'Deep Onyx (Default)',
                    'royal-indigo' => 'Royal Indigo',
                    'forest-expert' => 'Forest Expert',
                    'midnight-gold' => 'Midnight Gold',
                )
            ) );
        } elseif (strpos($key, 'color') !== false) {
            $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $key, array( 'label' => $label, 'section' => $section ) ) );
        } elseif (strpos($key, 'show_') !== false || $key === 'closeclient_header_sticky' || $key === 'closeclient_hero_typewriter') {
            $wp_customize->add_control( $key, array( 'label' => $label, 'section' => $section, 'type' => 'checkbox' ) );
        } elseif (strpos($key, 'headline') !== false || strpos($key, 'text') !== false || strpos($key, 'desc') !== false || strpos($key, 'subheadline') !== false || strpos($key, 'note') !== false || strpos($key, 'scarcity') !== false || strpos($key, 'disclaimer') !== false || strpos($key, 'about') !== false) {
            $wp_customize->add_control( $key, array( 'label' => $label, 'section' => $section, 'type' => 'textarea' ) );
        } else {
            $wp_customize->add_control( $key, array( 'label' => $label, 'section' => $section ) );
        }
    }

    $wp_customize->add_setting( 'closeclient_gen_trigger', array( 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'closeclient_gen_trigger', array(
        'label' => 'Recreate Starter Pages',
        'description' => '<a href="' . admin_url('?closeclient_action=generate&_wpnonce=' . wp_create_nonce('closeclient_utility_action')) . '" class="button button-primary">Generate Now</a>',
        'section' => 'closeclient_utilities',
        'type' => 'hidden'
    ) ) );
}
add_action( 'customize_register', 'closeclient_customize_register' );

function closeclient_customize_css() {
    $preset = get_theme_mod( 'closeclient_color_preset', 'deep-onyx' );

    // Preset Mappings
    $presets = array(
        'deep-onyx' => array( 'accent' => '#6366F1', 'bg' => '#020203', 'primary' => '#020203', 'secondary' => '#0A0A0B' ),
        'royal-indigo' => array( 'accent' => '#818CF8', 'bg' => '#0F172A', 'primary' => '#0F172A', 'secondary' => '#1E293B' ),
        'forest-expert' => array( 'accent' => '#10B981', 'bg' => '#064E3B', 'primary' => '#064E3B', 'secondary' => '#065F46' ),
        'midnight-gold' => array( 'accent' => '#FBBF24', 'bg' => '#171717', 'primary' => '#171717', 'secondary' => '#262626' ),
    );

    $current = isset($presets[$preset]) ? $presets[$preset] : $presets['deep-onyx'];

    $accent = get_theme_mod( 'closeclient_accent_color', $current['accent'] );
    $bg = get_theme_mod( 'closeclient_bg_color', $current['bg'] );
    $primary = get_theme_mod( 'closeclient_primary_color', $current['primary'] );
    $secondary = get_theme_mod( 'closeclient_secondary_color', $current['secondary'] );
    $text = get_theme_mod( 'closeclient_text_color', '#F9FAFB' );
    $accent_rgb = closeclient_hex_to_rgb($accent);

    ?>
    <style type="text/css">
        :root {
            --c-accent: <?php echo $accent; ?>;
            --c-accent-rgb: <?php echo $accent_rgb; ?>;
            --c-accent-hover: <?php echo get_theme_mod( 'closeclient_button_hover', '#4F46E5' ); ?>;
            --c-primary: <?php echo $primary; ?>;
            --c-secondary: <?php echo $secondary; ?>;
            --c-bg: <?php echo $bg; ?>;
            --c-text: <?php echo $text; ?>;
            --container-width: <?php echo get_theme_mod( 'closeclient_container_width', '1200' ); ?>px;
            --content-width: <?php echo get_theme_mod( 'closeclient_content_width', '800' ); ?>px;
            --heading-font: '<?php echo get_theme_mod( 'closeclient_heading_font', 'Inter' ); ?>', sans-serif;
            --body-font: '<?php echo get_theme_mod( 'closeclient_body_font', 'Inter' ); ?>', sans-serif;
            --h1-size: <?php echo get_theme_mod( 'closeclient_h1_size', '4.5' ); ?>rem;
            --body-size: <?php echo get_theme_mod( 'closeclient_body_size', '18' ); ?>px;
            --letter-spacing: <?php echo get_theme_mod( 'closeclient_letter_spacing', '-0.022' ); ?>em;
            --line-height: <?php echo get_theme_mod( 'closeclient_line_height', '1.6' ); ?>;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'closeclient_customize_css' );
