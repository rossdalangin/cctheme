<?php
/**
 * Master Admin Command Center for CloseClient
 *
 * @package CloseClient
 */

function closeclient_admin_guide_page() {
    ?>
    <style>
        .cc-admin-dashboard {
            max-width: 1200px;
            margin: 40px auto;
            padding: 40px;
            font-family: 'Inter', -apple-system, sans-serif;
            background: #020203;
            color: #F9FAFB;
            border-radius: 32px;
            box-shadow: 0 40px 100px rgba(0,0,0,0.5);
        }
        .cc-admin-header {
            margin-bottom: 60px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
            padding-bottom: 60px;
        }
        .cc-admin-tag {
            font-size: 0.75rem;
            font-weight: 800;
            letter-spacing: 0.3em;
            color: #6366F1;
            text-transform: uppercase;
            margin-bottom: 20px;
            display: inline-block;
        }
        .cc-admin-title {
            font-size: 3.5rem;
            font-weight: 900;
            letter-spacing: -0.05em;
            margin: 0;
            line-height: 1;
            color: #FFFFFF;
        }
        .cc-admin-desc {
            font-size: 1.25rem;
            opacity: 0.6;
            margin-top: 20px;
            max-width: 700px;
            line-height: 1.6;
        }
        .cc-admin-grid {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 40px;
        }
        .cc-admin-card {
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 24px;
            padding: 40px;
        }
        .cc-admin-card h2 {
            font-weight: 900;
            font-size: 1.5rem;
            margin-top: 0;
            margin-bottom: 30px;
            color: #FFFFFF;
        }
        .cc-admin-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .cc-admin-list li {
            margin-bottom: 15px;
        }
        .cc-admin-link {
            text-decoration: none;
            display: flex;
            align-items: center;
            color: #F9FAFB;
            font-weight: 600;
            padding: 16px;
            background: rgba(255,255,255,0.02);
            border-radius: 16px;
            transition: 0.3s;
            border: 1px solid transparent;
        }
        .cc-admin-link:hover {
            background: rgba(99, 102, 241, 0.1);
            border-color: #6366F1;
            transform: translateX(5px);
        }
        .cc-admin-link .dashicons {
            margin-right: 12px;
            color: #6366F1;
        }
        .cc-admin-table {
            width: 100%;
            border-collapse: collapse;
        }
        .cc-admin-table th {
            text-align: left;
            padding: 15px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            color: #6366F1;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.1em;
        }
        .cc-admin-table td {
            padding: 20px 15px;
            border-bottom: 1px solid rgba(255,255,255,0.05);
        }
        .cc-admin-code {
            background: rgba(255,255,255,0.05);
            padding: 6px 12px;
            border-radius: 8px;
            font-family: monospace;
            color: #6366F1;
        }
        .cc-admin-tip {
            margin-top: 40px;
            padding: 30px;
            background: rgba(99, 102, 241, 0.05);
            border-radius: 20px;
            border: 1px solid rgba(99, 102, 241, 0.2);
        }
    </style>

    <div class="wrap">
        <div class="cc-admin-dashboard">
            <header class="cc-admin-header">
                <span class="cc-admin-tag">DEFINITIVE EDITION V11.0</span>
                <h1 class="cc-admin-title"><?php _e( 'Elite Command Center', 'closeclient' ); ?></h1>
                <p class="cc-admin-desc">
                    <?php _e( 'Your high-performance authority engine is active. Manage your strategic assets and scale your high-ticket influence from this centralized hub.', 'closeclient' ); ?>
                </p>
            </header>

            <div class="cc-admin-grid">
                <!-- Column 1: Shortcuts -->
                <div class="cc-admin-card">
                    <h2><?php _e( 'Strategic Assets', 'closeclient' ); ?></h2>
                    <ul class="cc-admin-list">
                        <?php
                        $cpts = array(
                            'service'     => array('label' => 'Capabilities', 'icon' => 'rest-api'),
                            'portfolio'   => array('label' => 'Case Studies', 'icon' => 'portfolio'),
                            'testimonial' => array('label' => 'Social Proof', 'icon' => 'testimonial'),
                            'product'     => array('label' => 'Ecosystem Tools', 'icon' => 'cart'),
                            'team'        => array('label' => 'The Architects', 'icon' => 'groups'),
                            'process'     => array('label' => 'The Roadmap', 'icon' => 'external'),
                            'pricing'     => array('label' => 'Investment Tiers', 'icon' => 'money-alt'),
                        );
                        foreach ($cpts as $slug => $data) : ?>
                            <li>
                                <a href="<?php echo admin_url("edit.php?post_type=$slug"); ?>" class="cc-admin-link">
                                    <span class="dashicons dashicons-<?php echo $data['icon']; ?>"></span>
                                    <?php echo $data['label']; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- Column 2: Shortcodes -->
                <div class="cc-admin-card">
                    <h2><?php _e( 'Authority Shortcodes', 'closeclient' ); ?></h2>
                    <table class="cc-admin-table">
                        <thead>
                            <tr>
                                <th><?php _e( 'Shortcode', 'closeclient' ); ?></th>
                                <th><?php _e( 'Target Outcome', 'closeclient' ); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td><span class="cc-admin-code">[closeclient_hero]</span></td><td>Instant authority positioning & primary CTA.</td></tr>
                            <tr><td><span class="cc-admin-code">[closeclient_logo_ticker]</span></td><td>Visual social proof via infinite logo scroll.</td></tr>
                            <tr><td><span class="cc-admin-code">[closeclient_vsl]</span></td><td>High-fidelity video sales training.</td></tr>
                            <tr><td><span class="cc-admin-code">[closeclient_products]</span></td><td>Display and monetize your ecosystem tools.</td></tr>
                            <tr><td><span class="cc-admin-code">[closeclient_process]</span></td><td>Visualize your unique mechanism & roadmap.</td></tr>
                        <tr><td><span class="cc-admin-code">[closeclient_pricing]</span></td><td>Present your investment tiers and value stack.</td></tr>
                        <tr><td><span class="cc-admin-code">[closeclient_testimonials]</span></td><td>Showcase high-fidelity social proof.</td></tr>
                            <tr><td><span class="cc-admin-code">[closeclient_booking_cta]</span></td><td>Convert visitors into qualified strategy audits.</td></tr>
                        </tbody>
                    </table>
                    <div class="cc-admin-tip">
                        <p style="margin: 0; color: #6366F1; font-weight: 800; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 0.1em;"><?php _e( 'Automation Tip:', 'closeclient' ); ?></p>
                        <p style="margin: 15px 0 0; font-size: 1rem; line-height: 1.6; color: rgba(255,255,255,0.7);">
                            <?php _e( 'Navigate to **Appearance > Customize > 5. Theme Setup & Tools** and select "Generate Now" to build a complete 10-page authority funnel in seconds.', 'closeclient' ); ?>
                        </p>
                    </div>
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
