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
            padding: 60px;
            font-family: 'Inter', -apple-system, sans-serif;
            background: #020203;
            color: #F9FAFB;
            border-radius: 40px;
            box-shadow: 0 40px 100px rgba(0,0,0,0.6);
            border: 1px solid rgba(255,255,255,0.05);
        }
        .cc-admin-header {
            margin-bottom: 60px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
            padding-bottom: 60px;
            text-align: center;
        }
        .cc-admin-tag {
            font-size: 0.75rem;
            font-weight: 800;
            letter-spacing: 0.4em;
            color: #6366F1;
            text-transform: uppercase;
            margin-bottom: 20px;
            display: inline-block;
            background: rgba(99, 102, 241, 0.1);
            padding: 8px 20px;
            border-radius: 100px;
        }
        .cc-admin-title {
            font-size: 4rem;
            font-weight: 900;
            letter-spacing: -0.05em;
            margin: 0;
            line-height: 1;
            color: #FFFFFF;
        }
        .cc-admin-desc {
            font-size: 1.25rem;
            opacity: 0.6;
            margin: 30px auto 0;
            max-width: 800px;
            line-height: 1.6;
        }
        .cc-admin-grid {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 40px;
        }
        .cc-admin-card {
            background: rgba(255,255,255,0.02);
            border: 1px solid rgba(255,255,255,0.06);
            border-radius: 32px;
            padding: 40px;
        }
        .cc-admin-card h2 {
            font-weight: 900;
            font-size: 1.5rem;
            margin-top: 0;
            margin-bottom: 30px;
            color: #FFFFFF;
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .cc-admin-card h2 .dashicons {
            color: #6366F1;
            font-size: 24px;
            width: 24px;
            height: 24px;
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
            padding: 20px;
            background: rgba(255,255,255,0.02);
            border-radius: 20px;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            border: 1px solid transparent;
        }
        .cc-admin-link:hover {
            background: rgba(99, 102, 241, 0.1);
            border-color: #6366F1;
            transform: translateX(10px);
        }
        .cc-admin-link .dashicons {
            margin-right: 15px;
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
            padding: 25px 15px;
            border-bottom: 1px solid rgba(255,255,255,0.05);
        }
        .cc-admin-code {
            background: rgba(255,255,255,0.05);
            padding: 8px 16px;
            border-radius: 10px;
            font-family: 'Courier New', monospace;
            color: #6366F1;
            font-weight: 700;
        }
        .workflow-step {
            display: flex;
            align-items: flex-start;
            gap: 20px;
            margin-bottom: 30px;
            padding: 20px;
            background: rgba(255,255,255,0.01);
            border-radius: 20px;
            border-left: 3px solid rgba(99, 102, 241, 0.3);
        }
        .step-num {
            background: #6366F1;
            color: white;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            flex-shrink: 0;
        }
        .step-content h3 {
            margin: 0 0 5px;
            font-size: 1.1rem;
            color: #FFFFFF;
        }
        .step-content p {
            margin: 0;
            font-size: 0.9rem;
            opacity: 0.5;
            line-height: 1.5;
        }
    </style>

    <div class="wrap">
        <div class="cc-admin-dashboard">
            <header class="cc-admin-header">
                <span class="cc-admin-tag">DEFINITIVE EDITION V12.2</span>
                <h1 class="cc-admin-title"><?php _e( 'Elite Command Center', 'closeclient' ); ?></h1>
                <p class="cc-admin-desc">
                    <?php _e( 'Your high-performance authority engine is active. V12.2 features enhanced social proof metrics, service blueprints, and a optimized conversion funnel.', 'closeclient' ); ?>
                </p>
            </header>

            <div class="cc-admin-grid">
                <!-- Column 1: Strategic Assets -->
                <div class="cc-admin-card">
                    <h2><span class="dashicons dashicons-database"></span> <?php _e( 'Strategic Assets', 'closeclient' ); ?></h2>
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

                    <div style="margin-top: 50px;">
                        <h2><span class="dashicons dashicons-admin-settings"></span> <?php _e( 'Theme Setup', 'closeclient' ); ?></h2>
                        <a href="<?php echo admin_url('customize.php?autofocus[section]=closeclient_utilities'); ?>" class="cc-admin-link">
                            <span class="dashicons dashicons-update"></span>
                            <?php _e( 'Recreate Funnel', 'closeclient' ); ?>
                        </a>
                        <a href="<?php echo admin_url('customize.php'); ?>" class="cc-admin-link" style="margin-top: 15px;">
                            <span class="dashicons dashicons-admin-appearance"></span>
                            <?php _e( 'Visual Branding', 'closeclient' ); ?>
                        </a>
                    </div>
                </div>

                <!-- Column 2: Scaling Workflow -->
                <div class="cc-admin-card">
                    <h2><span class="dashicons dashicons-chart-line"></span> <?php _e( 'Authority Scaling Workflow', 'closeclient' ); ?></h2>

                    <div class="workflow-step">
                        <div class="step-num">1</div>
                        <div class="step-content">
                            <h3>Deploy the Infrastructure</h3>
                            <p>Navigate to **Theme Setup & Tools** and click **Generate Now**. This builds your 10-page strategic funnel instantly.</p>
                        </div>
                    </div>

                    <div class="workflow-step">
                        <div class="step-num">2</div>
                        <div class="step-content">
                            <h3>The "Big Domino" Training</h3>
                            <p>Upload your VSL to YouTube/Vimeo and paste the link in the **VSL Training** section. This is your primary pre-qualification asset.</p>
                        </div>
                    </div>

                    <div class="workflow-step" style="border-left-color: #6366F1;">
                        <div class="step-num">3</div>
                        <div class="step-content">
                            <h3>Proof Engineering</h3>
                            <p>Add 3 Case Studies to the **Portfolio** CPT with ROI metrics, and 3 Testimonials. Categorize them using the new **Project Categories** for granular filtering.</p>
                        </div>
                    </div>

                    <div class="workflow-step" style="border-left-color: #6366F1; margin-bottom: 50px;">
                        <div class="step-num">4</div>
                        <div class="step-content">
                            <h3>The Authority Audit</h3>
                            <p>Map all CTAs to `#audit`. This triggers the high-intent modal and filters your leads into the strategy intake funnel.</p>
                        </div>
                    </div>

                    <h2><span class="dashicons dashicons-editor-code"></span> <?php _e( 'Section Shortcodes', 'closeclient' ); ?></h2>
                    <table class="cc-admin-table">
                        <thead>
                            <tr>
                                <th><?php _e( 'Shortcode', 'closeclient' ); ?></th>
                                <th><?php _e( 'Outcome', 'closeclient' ); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td><span class="cc-admin-code">[closeclient_vsl]</span></td><td>High-fidelity sales training.</td></tr>
                            <tr><td><span class="cc-admin-code">[closeclient_products]</span></td><td>Monetize ecosystem tools.</td></tr>
                            <tr><td><span class="cc-admin-code">[closeclient_process]</span></td><td>Visualize your unique mechanism.</td></tr>
                            <tr><td><span class="cc-admin-code">[closeclient_booking_cta]</span></td><td>Terminal conversion audit.</td></tr>
                        </tbody>
                    </table>
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
