<?php
/**
 * Master Admin Guide for CloseClient
 *
 * @package CloseClient
 */

function closeclient_admin_guide_page() {
    ?>
    <div class="wrap" style="max-width: 1000px; margin-top: 40px; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">
        <h1 style="font-weight: 900; font-size: 3rem; letter-spacing: -0.06em; margin-bottom: 20px;"><?php _e( 'CloseClient Ultimate Authority System', 'closeclient' ); ?></h1>
        <p class="description" style="font-size: 1.2rem; line-height: 1.6; color: #666; margin-bottom: 40px;">
            <?php _e( 'Welcome to your new digital authority engine. This dashboard provides a quick reference for the powerful conversion tools built into your theme.', 'closeclient' ); ?>
        </p>

        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 40px;">
            <div class="guide-main">
                <h2 style="font-weight: 800; border-bottom: 2px solid #eee; padding-bottom: 15px; margin-bottom: 25px;"><?php _e( '1. Authority Shortcodes', 'closeclient' ); ?></h2>
                <table class="widefat striped" style="border:none; box-shadow: 0 5px 15px rgba(0,0,0,0.05); border-radius: 8px; overflow:hidden;">
                    <thead>
                        <tr>
                            <th style="padding:15px; font-weight:700;"><?php _e( 'Shortcode', 'closeclient' ); ?></th>
                            <th style="padding:15px; font-weight:700;"><?php _e( 'Target Outcome', 'closeclient' ); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td><code>[closeclient_hero]</code></td><td>Instant authority positioning & primary CTA.</td></tr>
                        <tr><td><code>[closeclient_vsl]</code></td><td>Deep conversion via high-fidelity video training.</td></tr>
                        <tr><td><code>[closeclient_services]</code></td><td>Clarity on your unique mechanism/framework.</td></tr>
                        <tr><td><code>[closeclient_portfolio]</code></td><td>The "Big Proof" - Showcase elite client transformations.</td></tr>
                        <tr><td><code>[closeclient_testimonials]</code></td><td>Social proof & borrowed authority.</td></tr>
                        <tr><td><code>[closeclient_stats]</code></td><td>Quantifiable impact & dominance metrics.</td></tr>
                        <tr><td><code>[closeclient_process]</code></td><td>Reduced friction via a clear roadmap.</td></tr>
                        <tr><td><code>[closeclient_pricing]</code></td><td>Value stacking & logical investment tiers.</td></tr>
                        <tr><td><code>[closeclient_faq]</code></td><td>Objection handling & trust building.</td></tr>
                        <tr><td><code>[closeclient_lead_magnet]</code></td><td>List building & micro-commitments.</td></tr>
                        <tr><td><code>[closeclient_booking_cta]</code></td><td>The final transition to a booked call.</td></tr>
                    </tbody>
                </table>

                <h2 style="font-weight: 800; border-bottom: 2px solid #eee; padding-bottom: 15px; margin-top: 50px; margin-bottom: 25px;"><?php _e( '2. Automation Features', 'closeclient' ); ?></h2>
                <div style="background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
                    <h3 style="margin-top:0;"><?php _e( 'Recreate Starter Pages', 'closeclient' ); ?></h3>
                    <p><?php _e( 'In the Customizer, under "5. Theme Setup & Tools", you can build a complete copy-ready authority funnel in one click.', 'closeclient' ); ?></p>
                    <p style="color: #6366F1; font-weight: 700;">✓ Creates 10 Strategic Pages<br>✓ Populates Sample CPT Data<br>✓ Auto-Configures Menus</p>
                </div>
            </div>

            <div class="guide-sidebar">
                <div style="background: #111; color: #fff; padding: 30px; border-radius: 12px; box-shadow: 0 20px 40px rgba(0,0,0,0.1);">
                    <h3 style="color: #fff; margin-top:0;"><?php _e( 'Strategy Tip', 'closeclient' ); ?></h3>
                    <p style="font-size: 0.95rem; line-height: 1.6; opacity: 0.8;">
                        <?php _e( 'Your website should sell your expertise before you even speak. Focus your navigation on "Services," "Case Studies," and your primary "Book a Call" CTA.', 'closeclient' ); ?>
                    </p>
                    <hr style="border:0; border-top: 1px solid rgba(255,255,255,0.1); margin: 20px 0;">
                    <a href="<?php echo admin_url('customize.php'); ?>" class="button button-primary button-large" style="width:100%; text-align:center; background: #6366F1; border:none;"><?php _e( 'Open Customizer', 'closeclient' ); ?></a>
                </div>

                <div style="background: #f0f0f1; padding: 25px; border-radius: 8px; margin-top: 30px; border-left: 4px solid #6366F1;">
                    <h4 style="margin-top:0;"><?php _e( 'Documentation', 'closeclient' ); ?></h4>
                    <p style="font-size: 0.85rem;"><?php _e( 'View the full strategy guide in your theme folder:', 'closeclient' ); ?><br><code>STRATEGY_GUIDE.md</code></p>
                </div>
            </div>
        </div>
    </div>
    <?php
}

function closeclient_add_admin_menu() {
    add_menu_page(
        __( 'CloseClient Guide', 'closeclient' ),
        __( 'Theme Guide', 'closeclient' ),
        'manage_options',
        'closeclient-shortcodes',
        'closeclient_admin_guide_page',
        'dashicons-performance',
        3
    );
}
add_action( 'admin_menu', 'closeclient_add_admin_menu' );
