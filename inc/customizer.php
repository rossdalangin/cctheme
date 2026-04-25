<?php
/**
 * CloseClient Customizer functionality
 *
 * @package CloseClient
 */

function closeclient_customize_register( $wp_customize ) {

    // Theme Colors Section
    $wp_customize->add_section( 'closeclient_colors', array(
        'title'    => __( 'Theme Colors', 'closeclient' ),
        'priority' => 30,
    ) );

    $colors = array(
        'primary_color'    => array( 'label' => __( 'Primary Color', 'closeclient' ), 'default' => '#1a1a1a' ),
        'secondary_color'  => array( 'label' => __( 'Secondary Color', 'closeclient' ), 'default' => '#f5f5f7' ),
        'accent_color'     => array( 'label' => __( 'Accent Color', 'closeclient' ), 'default' => '#0071e3' ),
        'text_color'       => array( 'label' => __( 'Text Color', 'closeclient' ), 'default' => '#1d1d1f' ),
        'bg_color'         => array( 'label' => __( 'Background Color', 'closeclient' ), 'default' => '#ffffff' ),
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

    // Hero Section
    $wp_customize->add_section( 'closeclient_hero', array(
        'title'    => __( 'Hero Section', 'closeclient' ),
        'priority' => 40,
    ) );

    $wp_customize->add_setting( 'closeclient_hero_headline', array(
        'default'           => __( 'I Help Coaches Scale to $10k+ Without the Burnout', 'closeclient' ),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'closeclient_hero_headline', array(
        'label'    => __( 'Headline', 'closeclient' ),
        'section'  => 'closeclient_hero',
        'type'     => 'text',
    ) );

    $wp_customize->add_setting( 'closeclient_hero_subheadline', array(
        'default'           => __( 'Position yourself as the obvious expert and turn your expertise into a premium client-attraction system.', 'closeclient' ),
        'sanitize_callback' => 'textarea_escape',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'closeclient_hero_subheadline', array(
        'label'    => __( 'Subheadline', 'closeclient' ),
        'section'  => 'closeclient_hero',
        'type'     => 'textarea',
    ) );

    $wp_customize->add_setting( 'closeclient_hero_cta', array(
        'default'           => __( 'Book Your Strategy Call', 'closeclient' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'closeclient_hero_cta', array(
        'label'    => __( 'CTA Button Text', 'closeclient' ),
        'section'  => 'closeclient_hero',
        'type'     => 'text',
    ) );

    // About Section
    $wp_customize->add_section( 'closeclient_about', array(
        'title'    => __( 'About Section', 'closeclient' ),
        'priority' => 50,
    ) );

    $wp_customize->add_setting( 'closeclient_about_headline', array(
        'default'           => __( 'Stop Chasing Clients. Start Leading Them.', 'closeclient' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'closeclient_about_headline', array(
        'label'    => __( 'About Headline', 'closeclient' ),
        'section'  => 'closeclient_about',
        'type'     => 'text',
    ) );

    // Testimonials
    $wp_customize->add_section( 'closeclient_testimonials', array(
        'title'    => __( 'Testimonials', 'closeclient' ),
        'priority' => 60,
    ) );

    $wp_customize->add_setting( 'closeclient_testimonial_1', array(
        'default'           => __( '"Working with this team changed my business. I went from $2k months to $20k months in just 90 days."', 'closeclient' ),
        'sanitize_callback' => 'textarea_escape',
    ) );

    $wp_customize->add_control( 'closeclient_testimonial_1', array(
        'label'    => __( 'Testimonial 1', 'closeclient' ),
        'section'  => 'closeclient_testimonials',
        'type'     => 'textarea',
    ) );

    // FAQ Section
    $wp_customize->add_section( 'closeclient_faq', array(
        'title'    => __( 'FAQ Section', 'closeclient' ),
        'priority' => 70,
    ) );

    $wp_customize->add_setting( 'closeclient_faq_q1', array(
        'default'           => __( 'How long does it take to see results?', 'closeclient' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'closeclient_faq_q1', array(
        'label'    => __( 'Question 1', 'closeclient' ),
        'section'  => 'closeclient_faq',
        'type'     => 'text',
    ) );

    $wp_customize->add_setting( 'closeclient_faq_a1', array(
        'default'           => __( 'Most clients see significant authority shifts within the first 30 days of implementation.', 'closeclient' ),
        'sanitize_callback' => 'textarea_escape',
    ) );

    $wp_customize->add_control( 'closeclient_faq_a1', array(
        'label'    => __( 'Answer 1', 'closeclient' ),
        'section'  => 'closeclient_faq',
        'type'     => 'textarea',
    ) );
}
add_action( 'customize_register', 'closeclient_customize_register' );

/**
 * Render the Customizer CSS
 */
function closeclient_customize_css() {
    ?>
    <style type="text/css">
        :root {
            --primary-color: <?php echo get_theme_mod( 'closeclient_primary_color', '#1a1a1a' ); ?>;
            --secondary-color: <?php echo get_theme_mod( 'closeclient_secondary_color', '#f5f5f7' ); ?>;
            --accent-color: <?php echo get_theme_mod( 'closeclient_accent_color', '#0071e3' ); ?>;
            --text-color: <?php echo get_theme_mod( 'closeclient_text_color', '#1d1d1f' ); ?>;
            --bg-color: <?php echo get_theme_mod( 'closeclient_bg_color', '#ffffff' ); ?>;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'closeclient_customize_css' );
