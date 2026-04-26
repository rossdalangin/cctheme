<?php
/**
 * Shortcode Guide for CloseClient Theme Dashboard
 *
 * @package CloseClient
 */

function closeclient_add_shortcode_guide() {
    add_menu_page(
        __( 'Theme Shortcodes', 'closeclient' ),
        __( 'Shortcodes', 'closeclient' ),
        'edit_theme_options',
        'closeclient-shortcodes',
        'closeclient_render_shortcode_guide',
        'dashicons-editor-code',
        60
    );
}
add_action( 'admin_menu', 'closeclient_add_shortcode_guide' );

function closeclient_render_shortcode_guide() {
    ?>
    <div class="wrap">
        <h1><?php _e( 'CloseClient Theme Shortcodes', 'closeclient' ); ?></h1>
        <p><?php _e( 'Use these shortcodes to add theme sections to any page or post. All content is managed in the Customizer.', 'closeclient' ); ?></p>

        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <th><?php _e( 'Shortcode', 'closeclient' ); ?></th>
                    <th><?php _e( 'Description', 'closeclient' ); ?></th>
                    <th><?php _e( 'Usage Context', 'closeclient' ); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $shortcodes = array(
                    '[closeclient_hero]' => array(
                        'desc' => 'The primary conversion hero section with headline and CTA.',
                        'usage' => 'Top of landing pages or home page.'
                    ),
                    '[closeclient_authority]' => array(
                        'desc' => 'Trust logos bar ("As Seen In").',
                        'usage' => 'Immediately after the hero for social proof.'
                    ),
                    '[closeclient_services]' => array(
                        'desc' => 'Grid showing core capabilities and services.',
                        'usage' => 'Middle of home or services pages.'
                    ),
                    '[closeclient_pricing]' => array(
                        'desc' => '3-column pricing table with featured plan support.',
                        'usage' => 'Sales or Services pages.'
                    ),
                    '[closeclient_testimonials]' => array(
                        'desc' => 'Carousel or grid of client success stories.',
                        'usage' => 'Before any major CTA.'
                    ),
                    '[closeclient_process]' => array(
                        'desc' => 'Visual 3-step timeline of your proven method.',
                        'usage' => 'About or Services pages.'
                    ),
                    '[closeclient_faq]' => array(
                        'desc' => 'Accordion-style frequently asked questions.',
                        'usage' => 'Bottom of sales pages to handle objections.'
                    ),
                    '[closeclient_booking_cta]' => array(
                        'desc' => 'High-impact final call to action for booking calls.',
                        'usage' => 'End of every conversion page.'
                    ),
                    '[closeclient_vsl]' => array(
                        'desc' => 'Video Sales Letter container with premium border.',
                        'usage' => 'Sales or lead magnet pages.'
                    ),
                    '[closeclient_team]' => array(
                        'desc' => 'Meet the experts / team member grid.',
                        'usage' => 'About or Authority pages.'
                    ),
                );

                foreach ( $shortcodes as $code => $data ) : ?>
                    <tr>
                        <td><code><?php echo esc_html( $code ); ?></code></td>
                        <td><?php echo esc_html( $data['desc'] ); ?></td>
                        <td><?php echo esc_html( $data['usage'] ); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php
}
