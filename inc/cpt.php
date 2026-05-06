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
        'taxonomies'  => array( 'service_cat' ),
    ) );

    register_taxonomy( 'service_cat', 'service', array(
        'labels'            => array( 'name' => 'Service Categories', 'singular_name' => 'Category' ),
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
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
        'taxonomies'  => array( 'portfolio_cat' ),
    ) );

    register_taxonomy( 'portfolio_cat', 'portfolio', array(
        'labels'            => array( 'name' => 'Project Categories', 'singular_name' => 'Category' ),
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
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

    // Product CPT
    register_post_type( 'product', array(
        'labels'      => array( 'name' => 'Products', 'singular_name' => 'Product' ),
        'public'      => true,
        'menu_icon'   => 'dashicons-cart',
        'supports'    => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
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
    add_meta_box( 'service_details', 'Service Architecture', 'closeclient_service_meta_callback', 'service', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'closeclient_add_custom_meta_boxes' );

// Testimonial Meta
function closeclient_testimonial_meta_callback( $post ) {
    $rating = get_post_meta( $post->ID, '_testimonial_rating', true );
    ?>
    <p><label for="testimonial_rating">Star Rating (1-5):</label></p>
    <input type="number" id="testimonial_rating" name="testimonial_rating" value="<?php echo esc_attr( $rating ); ?>" min="1" max="5" >
    <?php
}

// Team Meta
function closeclient_team_meta_callback( $post ) {
    $role = get_post_meta( $post->ID, '_member_role', true );
    ?>
    <p><label for="member_role">Member Role/Title:</label></p>
    <input type="text" id="member_role" name="member_role" value="<?php echo esc_attr( $role ); ?>" >
    <?php
}

// Process Meta
function closeclient_process_meta_callback( $post ) {
    $order = get_post_meta( $post->ID, '_step_order', true );
    ?>
    <p><label for="step_order">Step Number (e.g. 1, 2, 3):</label></p>
    <input type="number" id="step_order" name="step_order" value="<?php echo esc_attr( $order ); ?>" >
    <?php
}

// Pricing Meta
function closeclient_pricing_meta_callback( $post ) {
    $price = get_post_meta( $post->ID, '_plan_price', true );
    $featured = get_post_meta( $post->ID, '_plan_featured', true );
    ?>
    <p><label for="plan_price">Price (e.g. $2,997):</label></p>
    <input type="text" id="plan_price" name="plan_price" value="<?php echo esc_attr( $price ); ?>" >
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

/**
 * Add Product Metadata
 */
function closeclient_add_product_meta() {
    add_meta_box( 'product_details', 'Product Details', 'closeclient_product_meta_callback', 'product', 'side' );
}
add_action( 'add_meta_boxes', 'closeclient_add_product_meta' );

function closeclient_product_meta_callback( $post ) {
    $price = get_post_meta( $post->ID, '_product_price', true );
    $link  = get_post_meta( $post->ID, '_product_link', true );
    ?>
    <p><label for="product_price">Price (e.g. $49):</label></p>
    <input type="text" id="product_price" name="product_price" value="<?php echo esc_attr( $price ); ?>" >
    <p><label for="product_link">External Link:</label></p>
    <input type="url" id="product_link" name="product_link" value="<?php echo esc_attr( $link ); ?>" >
    <?php
}

function closeclient_save_product_meta( $post_id ) {
    if ( isset( $_POST['product_price'] ) ) {
        update_post_meta( $post_id, '_product_price', sanitize_text_field( $_POST['product_price'] ) );
    }
    if ( isset( $_POST['product_link'] ) ) {
        update_post_meta( $post_id, '_product_link', esc_url_raw( $_POST['product_link'] ) );
    }
}
add_action( 'save_post', 'closeclient_save_product_meta' );

/**
 * Add Enhanced Portfolio Metadata
 */
function closeclient_add_portfolio_meta() {
    add_meta_box( 'portfolio_enhanced', 'Strategic Case Study Details', 'closeclient_portfolio_meta_callback', 'portfolio', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'closeclient_add_portfolio_meta' );

function closeclient_portfolio_meta_callback( $post ) {
    $challenge = get_post_meta( $post->ID, '_portfolio_challenge', true );
    $solution  = get_post_meta( $post->ID, '_portfolio_solution', true );
    $outcome   = get_post_meta( $post->ID, '_portfolio_outcome', true );
    $metric    = get_post_meta( $post->ID, '_portfolio_metric', true );
    ?>
    <div>
        <p><strong>Key Performance Metric (e.g. 3.4x ROI):</strong><br><input type="text" name="portfolio_metric" value="<?php echo esc_attr( $metric ); ?>" class="widefat"></p>
        <p><strong>The Challenge:</strong><br><textarea name="portfolio_challenge" class="widefat" rows="4"><?php echo esc_textarea( $challenge ); ?></textarea></p>
        <p><strong>The Solution:</strong><br><textarea name="portfolio_solution" class="widefat" rows="4"><?php echo esc_textarea( $solution ); ?></textarea></p>
        <p><strong>The Outcome:</strong><br><textarea name="portfolio_outcome" class="widefat" rows="4"><?php echo esc_textarea( $outcome ); ?></textarea></p>
    </div>
    <?php
}

function closeclient_service_meta_callback( $post ) {
    $blueprint = get_post_meta( $post->ID, '_service_blueprint', true );
    ?>
    <div>
        <p><strong>System Architecture Blueprint (Comma Separated):</strong><br>
        <textarea name="service_blueprint" class="widefat" rows="3" placeholder="e.g. Infrastructure Setup, Lead Filtering, Performance Dashboards"><?php echo esc_textarea( $blueprint ); ?></textarea></p>
        <p class="howto">These items will appear as a strategic checklist on the service detail page.</p>
    </div>
    <?php
}

function closeclient_save_portfolio_meta( $post_id ) {
    if ( isset( $_POST['portfolio_challenge'] ) ) {
        update_post_meta( $post_id, '_portfolio_challenge', wp_kses_post( $_POST['portfolio_challenge'] ) );
    }
    if ( isset( $_POST['portfolio_solution'] ) ) {
        update_post_meta( $post_id, '_portfolio_solution', wp_kses_post( $_POST['portfolio_solution'] ) );
    }
    if ( isset( $_POST['portfolio_outcome'] ) ) {
        update_post_meta( $post_id, '_portfolio_outcome', wp_kses_post( $_POST['portfolio_outcome'] ) );
    }
    if ( isset( $_POST['portfolio_metric'] ) ) {
        update_post_meta( $post_id, '_portfolio_metric', sanitize_text_field( $_POST['portfolio_metric'] ) );
    }
    if ( isset( $_POST['service_blueprint'] ) ) {
        update_post_meta( $post_id, '_service_blueprint', sanitize_text_field( $_POST['service_blueprint'] ) );
    }
}
add_action( 'save_post', 'closeclient_save_portfolio_meta' );
