<?php
/**
 * Master Admin Command Center for CloseClient
 *
 * @package CloseClient
 */

function closeclient_admin_guide_page() {
    ?>
    <div class="wrap closeclient-admin-wrap" style="max-width: 1200px; margin: 40px auto; padding-right: 20px; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">
        <header style="margin-bottom: 60px;">
            <div style="background: #020203; color: #fff; padding: 60px; border-radius: 24px; box-shadow: 0 20px 50px rgba(0,0,0,0.15);">
                <span style="font-size: 0.75rem; font-weight: 800; letter-spacing: 0.3em; color: #6366F1; text-transform: uppercase; margin-bottom: 20px; display: inline-block;">DEFINITIVE EDITION V10.0</span>
                <h1 style="color: #fff; font-size: 3.5rem; font-weight: 900; letter-spacing: -0.05em; margin: 0; line-height: 1;"><?php _e( 'CloseClient Elite Command Center', 'closeclient' ); ?></h1>
                <p style="font-size: 1.25rem; opacity: 0.6; margin-top: 20px; max-width: 700px; line-height: 1.6;">
                    <?php _e( 'Your high-performance authority engine is active. Use this dashboard to manage your strategic assets and scale your high-ticket influence.', 'closeclient' ); ?>
                </p>
            </div>
        </header>

        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px;">
            <!-- Column 1: Shortcuts -->
            <div style="background: #fff; padding: 40px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
                <h2 style="font-weight: 900; font-size: 1.5rem; margin-top: 0; margin-bottom: 30px; border-bottom: 2px solid #f0f0f1; padding-bottom: 15px;"><?php _e( 'Quick Access', 'closeclient' ); ?></h2>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <?php
                    $cpts = array(
                        'service'     => array('label' => 'Capabilities', 'icon' => 'rest-api'),
                        'portfolio'   => array('label' => 'Case Studies', 'icon' => 'portfolio'),
                        'testimonial' => array('label' => 'Social Proof', 'icon' => 'testimonial'),
                        'product'     => array('label' => 'Ecosystem Tools', 'icon' => 'cart'),
                        'team'        => array('label' => 'Meet the Team', 'icon' => 'groups'),
                        'process'     => array('label' => 'The Roadmap', 'icon' => 'external'),
                    );
                    foreach ($cpts as $slug => $data) : ?>
                        <li style="margin-bottom: 15px;">
                            <a href="<?php echo admin_url("edit.php?post_type=$slug"); ?>" style="text-decoration:none; display:flex; align-items:center; color:#111; font-weight:600; padding:12px; background:#f9fafb; border-radius:12px; transition:0.3s;">
                                <span class="dashicons dashicons-<?php echo $data['icon']; ?>" style="margin-right:10px; color:#6366F1;"></span>
                                <?php echo $data['label']; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Column 2: Shortcodes -->
            <div style="background: #fff; padding: 40px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); grid-column: span 2;">
                <h2 style="font-weight: 900; font-size: 1.5rem; margin-top: 0; margin-bottom: 30px; border-bottom: 2px solid #f0f0f1; padding-bottom: 15px;"><?php _e( 'Authority Shortcodes', 'closeclient' ); ?></h2>
                <table class="widefat striped" style="border:none;">
                    <thead>
                        <tr>
                            <th style="font-weight:700;"><?php _e( 'Shortcode', 'closeclient' ); ?></th>
                            <th style="font-weight:700;"><?php _e( 'Target Outcome', 'closeclient' ); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td><code>[closeclient_hero]</code></td><td>Instant authority positioning & primary CTA.</td></tr>
                        <tr><td><code>[closeclient_logo_ticker]</code></td><td>Visual social proof via infinite logo scroll.</td></tr>
                        <tr><td><code>[closeclient_vsl]</code></td><td>High-fidelity video sales training.</td></tr>
                        <tr><td><code>[closeclient_products]</code></td><td>Monetize and display your ecosystem tools.</td></tr>
                        <tr><td><code>[closeclient_stats]</code></td><td>Quantify your impact and market dominance.</td></tr>
                        <tr><td><code>[closeclient_booking_cta]</code></td><td>Convert visitors into qualified strategy audits.</td></tr>
                    </tbody>
                </table>
                <div style="margin-top: 40px; padding: 25px; background: #EEF2FF; border-radius: 16px; border: 1px solid #C7D2FE;">
                    <p style="margin: 0; color: #4338CA; font-weight: 700;"><?php _e( 'Automation Tip:', 'closeclient' ); ?></p>
                    <p style="margin: 10px 0 0; font-size: 0.95rem; line-height: 1.5; color: #4338CA;">
                        <?php _e( 'Use the "Starter Page Generator" in the Customizer to build a complete 10-page high-converting funnel in 1 click.', 'closeclient' ); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <?php
}

function closeclient_add_admin_menu() {
    add_menu_page(
        __( 'CloseClient Center', 'closeclient' ),
        __( 'CloseClient', 'closeclient' ),
        'manage_options',
        'closeclient-shortcodes',
        'closeclient_admin_guide_page',
        'dashicons-chart-bar',
        2
    );
}
add_action( 'admin_menu', 'closeclient_add_admin_menu' );
