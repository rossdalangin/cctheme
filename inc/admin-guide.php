<?php
/**
 * Shortcode Guide for CloseClient Theme Dashboard
 *
 * @package CloseClient
 */

function closeclient_add_shortcode_guide() {
    add_menu_page(
        __( 'Theme Guide', 'closeclient' ),
        __( 'Theme Guide', 'closeclient' ),
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
    <div class="wrap" style="max-width: 1000px; margin-top: 30px;">
        <h1 style="font-weight: 800; font-size: 2.5rem; letter-spacing: -0.04em;"><?php _e( 'CloseClient Authority Theme Guide', 'closeclient' ); ?></h1>
        <p style="font-size: 1.2rem; color: #666;"><?php _e( 'Welcome to the Signature Agency edition. Use these shortcodes to build high-converting authority pages.', 'closeclient' ); ?></p>

        <div style="background: #fff; padding: 40px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); margin-top: 40px;">
            <h2 style="margin-top: 0;"><?php _e( 'Available Shortcodes', 'closeclient' ); ?></h2>
            <p><?php _e( 'Paste these into any page or post editor to render the corresponding theme section.', 'closeclient' ); ?></p>

            <table class="wp-list-table widefat fixed striped" style="border: none; box-shadow: none;">
                <thead>
                    <tr>
                        <th style="font-weight: 700; padding: 15px;"><?php _e( 'Shortcode', 'closeclient' ); ?></th>
                        <th style="font-weight: 700; padding: 15px;"><?php _e( 'Purpose', 'closeclient' ); ?></th>
                        <th style="font-weight: 700; padding: 15px;"><?php _e( 'Recommended Location', 'closeclient' ); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $shortcodes = array(
                        '[closeclient_hero]' => array(
                            'desc' => 'High-impact conversion hero with headline and CTA.',
                            'usage' => 'Top of landing/home pages.'
                        ),
                        '[closeclient_authority]' => array(
                            'desc' => 'Trust-building "As Seen In" logo bar.',
                            'usage' => 'Immediately following the hero.'
                        ),
                        '[closeclient_services]' => array(
                            'desc' => 'Grid showing core expert capabilities.',
                            'usage' => 'Middle of home/services pages.'
                        ),
                        '[closeclient_process]' => array(
                            'desc' => '3-Step proven roadmap visualization.',
                            'usage' => 'Authority or Services pages.'
                        ),
                        '[closeclient_pricing]' => array(
                            'desc' => 'Signature pricing table with featured support.',
                            'usage' => 'Sales or offer pages.'
                        ),
                        '[closeclient_testimonials]' => array(
                            'desc' => 'Client success stories / Social proof grid.',
                            'usage' => 'Before major conversion points.'
                        ),
                        '[closeclient_faq]' => array(
                            'desc' => 'Accordion-style objection handling.',
                            'usage' => 'Bottom of sales pages.'
                        ),
                        '[closeclient_booking_cta]' => array(
                            'desc' => 'Final, high-impact scheduling call to action.',
                            'usage' => 'End of every conversion-focused page.'
                        ),
                    );

                    foreach ( $shortcodes as $code => $data ) : ?>
                        <tr>
                            <td style="padding: 15px;"><code><?php echo esc_html( $code ); ?></code></td>
                            <td style="padding: 15px;"><?php echo esc_html( $data['desc'] ); ?></td>
                            <td style="padding: 15px;"><?php echo esc_html( $data['usage'] ); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div style="margin-top: 40px; background: #f0f0f1; padding: 30px; border-radius: 12px; border-left: 4px solid #6366F1;">
            <h3 style="margin-top: 0;"><?php _e( 'Setup Tip', 'closeclient' ); ?></h3>
            <p><?php _e( 'Go to <strong>Appearance > Customize > 5. Theme Setup & Tools</strong> to automatically generate all core pages with these shortcodes already placed for you.', 'closeclient' ); ?></p>
        </div>
    </div>
    <?php
}
