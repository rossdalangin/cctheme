<?php
/**
 * Shortcode Guide for CloseClient Theme Dashboard
 *
 * @package CloseClient
 */

function closeclient_add_shortcode_guide() {
    add_menu_page(
        __( 'Master Guide', 'closeclient' ),
        __( 'Master Guide', 'closeclient' ),
        'edit_theme_options',
        'closeclient-shortcodes',
        'closeclient_render_shortcode_guide',
        'dashicons-superhero',
        60
    );
}
add_action( 'admin_menu', 'closeclient_add_shortcode_guide' );

function closeclient_render_shortcode_guide() {
    ?>
    <div class="wrap" style="max-width: 1200px; margin-top: 40px;">
        <h1 style="font-weight: 900; font-size: 3rem; letter-spacing: -0.06em; margin-bottom: 20px;"><?php _e( 'CloseClient Ultimate Authority System', 'closeclient' ); ?></h1>
        <p style="font-size: 1.4rem; color: #64748b; line-height: 1.4;"><?php _e( 'The Master Agency Edition. Engineered for high-ticket client acquisition and psychological authority dominance.', 'closeclient' ); ?></p>

        <div style="background: #0f172a; color: #fff; padding: 60px; border-radius: 32px; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5); margin-top: 50px;">
            <h2 style="color: #fff; font-size: 2rem; margin-top: 0; letter-spacing: -0.04em;"><?php _e( 'Core Engine Shortcodes', 'closeclient' ); ?></h2>
            <p style="color: #94a3b8; font-size: 1.1rem; margin-bottom: 40px;"><?php _e( 'Use these shortcodes to deploy the Authority Engine anywhere on your site.', 'closeclient' ); ?></p>

            <table class="wp-list-table widefat fixed" style="background: transparent; color: #cbd5e1; border: none;">
                <thead>
                    <tr>
                        <th style="color: #f8fafc; font-weight: 800; border-bottom: 1px solid #1e293b; padding: 20px;"><?php _e( 'Shortcode', 'closeclient' ); ?></th>
                        <th style="color: #f8fafc; font-weight: 800; border-bottom: 1px solid #1e293b; padding: 20px;"><?php _e( 'Purpose', 'closeclient' ); ?></th>
                        <th style="color: #f8fafc; font-weight: 800; border-bottom: 1px solid #1e293b; padding: 20px;"><?php _e( 'Target Outcome', 'closeclient' ); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $shortcodes = array(
                        '[closeclient_hero]' => array(
                            'desc' => 'High-fidelity conversion hero with gradient headline.',
                            'outcome' => 'Immediate Authority'
                        ),
                        '[closeclient_services]' => array(
                            'desc' => 'Master grid of core expert capabilities.',
                            'outcome' => 'Expert Differentiation'
                        ),
                        '[closeclient_pricing]' => array(
                            'desc' => 'Cyber-tier pricing table with value stack.',
                            'outcome' => 'Transaction Confidence'
                        ),
                        '[closeclient_testimonials]' => array(
                            'desc' => 'High-impact social proof transformation stories.',
                            'outcome' => 'Social Validation'
                        ),
                        '[closeclient_process]' => array(
                            'desc' => 'The 3-Step architecture of your results.',
                            'outcome' => 'Operational Trust'
                        ),
                        '[closeclient_faq]' => array(
                            'desc' => 'Objection-obliterating interactive accordion.',
                            'outcome' => 'Friction Removal'
                        ),
                        '[closeclient_booking_cta]' => array(
                            'desc' => 'The high-velocity final call to action.',
                            'outcome' => 'Lead Acquisition'
                        ),
                    );

                    foreach ( $shortcodes as $code => $data ) : ?>
                        <tr>
                            <td style="padding: 20px; border-bottom: 1px solid #1e293b;"><code><?php echo esc_html( $code ); ?></code></td>
                            <td style="padding: 20px; border-bottom: 1px solid #1e293b;"><?php echo esc_html( $data['desc'] ); ?></td>
                            <td style="padding: 20px; border-bottom: 1px solid #1e293b;"><span style="color: #818cf8; font-weight: 700;"><?php echo esc_html( $data['outcome'] ); ?></span></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div style="margin-top: 50px; background: #e0f2fe; color: #0369a1; padding: 40px; border-radius: 24px; border-left: 8px solid #0ea5e9;">
            <h3 style="margin-top: 0; font-weight: 800;"><?php _e( 'The Big Domino Setup', 'closeclient' ); ?></h3>
            <p style="font-size: 1.1rem;"><?php _e( 'Navigate to <strong>Appearance > Customize > 5. Theme Setup & Tools</strong> and click "Generate Now" to automatically deploy this entire ecosystem onto your site in 3 seconds.', 'closeclient' ); ?></p>
        </div>
    </div>
    <?php
}
