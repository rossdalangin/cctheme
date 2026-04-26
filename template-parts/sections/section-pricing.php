<?php
/**
 * Pricing Section Template Part
 *
 * @package CloseClient
 */

$headline = get_theme_mod( 'closeclient_pricing_headline', 'Invest in Your Growth' );

$plans = array(
    array(
        'name'     => get_theme_mod( 'closeclient_plan1_name', 'Strategy Audit' ),
        'price'    => get_theme_mod( 'closeclient_plan1_price', '$497' ),
        'features' => get_theme_mod( 'closeclient_plan1_features', '60-Min Deep Dive, Growth Roadmap, Recording included' ),
        'featured' => false,
    ),
    array(
        'name'     => get_theme_mod( 'closeclient_plan2_name', 'Elite Coaching' ),
        'price'    => get_theme_mod( 'closeclient_plan2_price', '$2,500/mo' ),
        'features' => get_theme_mod( 'closeclient_plan2_features', 'Weekly 1:1 Calls, Priority Support, Full Systems Audit, Scale Blueprint' ),
        'featured' => true,
    ),
    array(
        'name'     => get_theme_mod( 'closeclient_plan3_name', 'Mastermind' ),
        'price'    => get_theme_mod( 'closeclient_plan3_price', 'Custom' ),
        'features' => get_theme_mod( 'closeclient_plan3_features', 'Annual Retreat, Group Calls, Private Slack, Implementation Days' ),
        'featured' => false,
    ),
);
?>

<section class="section section-pricing">
    <div class="container">
        <div class="section-header text-center" style="margin-bottom: 80px;">
            <h2 class="section-headline"><?php echo esc_html( $headline ); ?></h2>
        </div>

        <div class="pricing-grid">
            <?php foreach ( $plans as $plan ) : ?>
                <div class="pricing-card reveal <?php echo $plan['featured'] ? 'featured' : ''; ?>">
                    <div class="pricing-header">
                        <h3 style="font-size: 1.5rem; margin-bottom: 10px;"><?php echo esc_html( $plan['name'] ); ?></h3>
                        <div class="price" style="font-size: 3.5rem; font-weight: 900; margin-bottom: 30px; letter-spacing: -0.04em;"><?php echo esc_html( $plan['price'] ); ?></div>
                    </div>

                    <ul class="pricing-features" style="list-style: none; padding: 0; margin-bottom: 40px; text-align: left;">
                        <?php
                        $features = explode( ',', $plan['features'] );
                        foreach ( $features as $feature ) : ?>
                            <li style="margin-bottom: 12px; padding-left: 28px; position: relative;">
                                <span style="position: absolute; left: 0; color: var(--electric-violet);">✓</span>
                                <?php echo esc_html( trim( $feature ) ); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <div class="pricing-cta">
                        <a href="<?php echo esc_url( get_theme_mod( 'closeclient_booking_link', '#' ) ); ?>" class="button <?php echo $plan['featured'] ? 'button-accent' : 'button-secondary'; ?>" style="width: 100%;"><?php esc_html_e( 'Secure Your Spot', 'closeclient' ); ?></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
