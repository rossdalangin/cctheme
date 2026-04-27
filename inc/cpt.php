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
        'supports'    => array( 'title', 'editor', 'thumbnail' ),
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
}
add_action( 'init', 'closeclient_register_cpts' );
