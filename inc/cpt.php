<?php
/**
 * Custom Post Types for CloseClient
 *
 * @package CloseClient
 */

function closeclient_register_cpts() {

    // Services CPT
    register_post_type( 'service', array(
        'labels'      => array( 'name' => 'Services', 'singular_name' => 'Service' ),
        'public'      => true,
        'has_archive' => true,
        'menu_icon'   => 'dashicons-rest-api',
        'supports'    => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
    ) );

    // Testimonials CPT
    register_post_type( 'testimonial', array(
        'labels'      => array( 'name' => 'Testimonials', 'singular_name' => 'Testimonial' ),
        'public'      => true,
        'menu_icon'   => 'dashicons-testimonial',
        'supports'    => array( 'title', 'editor', 'thumbnail' ),
    ) );

    // FAQ CPT
    register_post_type( 'faq', array(
        'labels'      => array( 'name' => 'FAQs', 'singular_name' => 'FAQ' ),
        'public'      => true,
        'menu_icon'   => 'dashicons-editor-help',
        'supports'    => array( 'title', 'editor' ),
    ) );

    // Portfolio CPT
    register_post_type( 'portfolio', array(
        'labels'      => array( 'name' => 'Portfolio', 'singular_name' => 'Project' ),
        'public'      => true,
        'has_archive' => true,
        'menu_icon'   => 'dashicons-portfolio',
        'supports'    => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
    ) );

    // Team CPT
    register_post_type( 'team', array(
        'labels'      => array( 'name' => 'Team', 'singular_name' => 'Member' ),
        'public'      => true,
        'menu_icon'   => 'dashicons-groups',
        'supports'    => array( 'title', 'editor', 'thumbnail' ),
    ) );

    // Process CPT
    register_post_type( 'process', array(
        'labels'      => array( 'name' => 'Process Steps', 'singular_name' => 'Step' ),
        'public'      => true,
        'menu_icon'   => 'dashicons-external',
        'supports'    => array( 'title', 'editor' ),
    ) );

    // Pricing CPT
    register_post_type( 'pricing', array(
        'labels'      => array( 'name' => 'Pricing Plans', 'singular_name' => 'Plan' ),
        'public'      => true,
        'menu_icon'   => 'dashicons-money-alt',
        'supports'    => array( 'title', 'editor', 'excerpt' ),
    ) );
}
add_action( 'init', 'closeclient_register_cpts' );

/**
 * Metadata for Testimonials, Team, and Process
 */
function closeclient_add_custom_meta_boxes() {
    add_meta_box( 'testimonial_rating', 'Testimonial Details', 'closeclient_testimonial_meta_callback', 'testimonial', 'side' );
    add_meta_box( 'team_details', 'Member Details', 'closeclient_team_meta_callback', 'team', 'side' );
    add_meta_box( 'process_details', 'Step Details', 'closeclient_process_meta_callback', 'process', 'side' );
    add_meta_box( 'pricing_details', 'Plan Details', 'closeclient_pricing_meta_callback', 'pricing', 'side' );
}
add_action( 'add_meta_boxes', 'closeclient_add_custom_meta_boxes' );

// Testimonial Meta
function closeclient_testimonial_meta_callback( $post ) {
    $rating = get_post_meta( $post->ID, '_testimonial_rating', true );
    ?>
    <p><label for="testimonial_rating">Star Rating (1-5):</label></p>
    <input type="number" id="testimonial_rating" name="testimonial_rating" value="<?php echo esc_attr( $rating ); ?>" min="1" max="5" style="width:100%;">
    <?php
}

// Team Meta
function closeclient_team_meta_callback( $post ) {
    $role = get_post_meta( $post->ID, '_member_role', true );
    ?>
    <p><label for="member_role">Member Role/Title:</label></p>
    <input type="text" id="member_role" name="member_role" value="<?php echo esc_attr( $role ); ?>" style="width:100%;">
    <?php
}

// Process Meta
function closeclient_process_meta_callback( $post ) {
    $order = get_post_meta( $post->ID, '_step_order', true );
    ?>
    <p><label for="step_order">Step Number (e.g. 1, 2, 3):</label></p>
    <input type="number" id="step_order" name="step_order" value="<?php echo esc_attr( $order ); ?>" style="width:100%;">
    <?php
}

// Pricing Meta
function closeclient_pricing_meta_callback( $post ) {
    $price = get_post_meta( $post->ID, '_plan_price', true );
    $featured = get_post_meta( $post->ID, '_plan_featured', true );
    ?>
    <p><label for="plan_price">Price (e.g. $2,997):</label></p>
    <input type="text" id="plan_price" name="plan_price" value="<?php echo esc_attr( $price ); ?>" style="width:100%;">
    <p><label><input type="checkbox" name="plan_featured" value="1" <?php checked( $featured, '1' ); ?>> Featured Plan?</label></p>
    <?php
}

function closeclient_save_custom_meta( $post_id ) {
    if ( isset( $_POST['testimonial_rating'] ) ) {
        update_post_meta( $post_id, '_testimonial_rating', sanitize_text_field( $_POST['testimonial_rating'] ) );
    }
    if ( isset( $_POST['member_role'] ) ) {
        update_post_meta( $post_id, '_member_role', sanitize_text_field( $_POST['member_role'] ) );
    }
    if ( isset( $_POST['step_order'] ) ) {
        update_post_meta( $post_id, '_step_order', sanitize_text_field( $_POST['step_order'] ) );
    }
    if ( isset( $_POST['plan_price'] ) ) {
        update_post_meta( $post_id, '_plan_price', sanitize_text_field( $_POST['plan_price'] ) );
    }
    update_post_meta( $post_id, '_plan_featured', isset( $_POST['plan_featured'] ) ? '1' : '0' );
}
add_action( 'save_post', 'closeclient_save_custom_meta' );
