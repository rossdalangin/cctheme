<?php
/**
 * CloseClient Customizer functionality
 *
 * @package CloseClient
 */

function closeclient_customize_register( $wp_customize ) {

    // --- Colors Section ---
    $wp_customize->add_section( 'closeclient_colors', array(
        'title'    => __( 'Theme Colors', 'closeclient' ),
        'priority' => 30,
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

    // --- Typography Section ---
    $wp_customize->add_section( 'closeclient_typography', array(
        'title'    => __( 'Typography', 'closeclient' ),
        'priority' => 35,
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

    // --- Hero Section ---
    $wp_customize->add_section( 'closeclient_hero', array(
        'title'    => __( 'Hero Section', 'closeclient' ),
        'priority' => 40,
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

    // --- About Section ---
    $wp_customize->add_section( 'closeclient_about', array(
        'title'    => __( 'About Section', 'closeclient' ),
        'priority' => 50,
    ) );
    $wp_customize->add_setting( 'closeclient_about_headline', array( 'default' => 'Stop Chasing. Start Leading.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_about_headline', array( 'label' => 'About Headline', 'section' => 'closeclient_about' ) );

    // --- Services Section ---
    $wp_customize->add_section( 'closeclient_services', array(
        'title'    => __( 'Services Section', 'closeclient' ),
        'priority' => 55,
    ) );
    $wp_customize->add_setting( 'closeclient_services_headline', array( 'default' => 'Elite Solutions for Elite Experts', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_services_headline', array( 'label' => 'Services Headline', 'section' => 'closeclient_services' ) );

    // --- Testimonials Section ---
    $wp_customize->add_section( 'closeclient_testimonials', array(
        'title'    => __( 'Testimonials', 'closeclient' ),
        'priority' => 60,
    ) );
    $wp_customize->add_setting( 'closeclient_testimonial_1', array( 'default' => '"Within 90 days of implementing this authority system, our high-ticket sales increased by 300% without adding a single hour to my work week."', 'sanitize_callback' => 'sanitize_textarea_field' ) );
    $wp_customize->add_control( 'closeclient_testimonial_1', array( 'label' => 'Testimonial 1', 'section' => 'closeclient_testimonials', 'type' => 'textarea' ) );

    // --- FAQ Section ---
    $wp_customize->add_section( 'closeclient_faq', array(
        'title'    => __( 'FAQ Section', 'closeclient' ),
        'priority' => 70,
    ) );
    $wp_customize->add_setting( 'closeclient_faq_q1', array( 'default' => 'Who is this elite system for?', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'closeclient_faq_q1', array( 'label' => 'Question 1', 'section' => 'closeclient_faq' ) );
    $wp_customize->add_setting( 'closeclient_faq_a1', array( 'default' => 'This is specifically architected for established coaches, consultants, and experts who are ready to scale from $10k to $100k+ months.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
    $wp_customize->add_control( 'closeclient_faq_a1', array( 'label' => 'Answer 1', 'section' => 'closeclient_faq', 'type' => 'textarea' ) );

    // --- Image Uploads Section ---
    $wp_customize->add_section( 'closeclient_images', array(
        'title'    => __( 'Theme Images', 'closeclient' ),
        'priority' => 32,
    ) );

    $images = array(
        'hero_image' => 'Hero Image',
        'about_image' => 'About Image',
        'team_image' => 'Team Image',
        'testimonial_photo' => 'Testimonial Photo',
    );

    foreach ( $images as $id => $label ) {
        $wp_customize->add_setting( "closeclient_{$id}", array( 'sanitize_callback' => 'esc_url_raw' ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "closeclient_{$id}", array( 'label' => $label, 'section' => 'closeclient_images' ) ) );
    }

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
