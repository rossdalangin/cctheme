<?php
/**
 * Register Custom Post Types for CloseClient
 *
 * @package CloseClient
 */

function closeclient_register_cpts() {

    // Services CPT
    register_post_type( 'service', array(
        'labels'      => array(
            'name'          => __( 'Services', 'closeclient' ),
            'singular_name' => __( 'Service', 'closeclient' ),
        ),
        'public'      => true,
        'has_archive' => false,
        'menu_icon'   => 'dashicons-rest-api',
        'supports'    => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'show_in_rest' => true,
    ) );

    // Testimonials CPT
    register_post_type( 'testimonial', array(
        'labels'      => array(
            'name'          => __( 'Testimonials', 'closeclient' ),
            'singular_name' => __( 'Testimonial', 'closeclient' ),
        ),
        'public'      => true,
        'has_archive' => false,
        'menu_icon'   => 'dashicons-testimonial',
        'supports'    => array( 'title', 'editor', 'thumbnail' ),
        'show_in_rest' => true,
    ) );

    // FAQ CPT
    register_post_type( 'faq', array(
        'labels'      => array(
            'name'          => __( 'FAQs', 'closeclient' ),
            'singular_name' => __( 'FAQ', 'closeclient' ),
        ),
        'public'      => true,
        'has_archive' => false,
        'menu_icon'   => 'dashicons-editor-help',
        'supports'    => array( 'title', 'editor' ),
        'show_in_rest' => true,
    ) );
}
add_action( 'init', 'closeclient_register_cpts' );
