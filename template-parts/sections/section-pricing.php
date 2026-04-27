<?php
/**
 * Pricing Section Template Part
 *
 * @package CloseClient
 */

$headline = get_theme_mod( 'closeclient_pricing_headline', 'Invest in Your Infinite Scale' );
?>

<section id="pricing" class="section section-pricing bg-secondary">
    <div class="container">
        <div class="section-header text-center reveal" style="margin-bottom: 80px;">
            <span class="section-tag"><?php esc_html_e( 'INVESTMENT', 'closeclient' ); ?></span>
            <h2 class="section-headline"><?php echo esc_html( $headline ); ?></h2>
        </div>

        <div class="cc-grid-3">
            <?php
            $plans = array(
                array('id' => 1, 'featured' => false),
                array('id' => 2, 'featured' => true),
                array('id' => 3, 'featured' => false),
            );

            foreach ( $plans as $plan ) :
                $name     = get_theme_mod( "closeclient_plan{$plan['id']}_name", "Growth Plan {$plan['id']}" );
                $price    = get_theme_mod( "closeclient_plan{$plan['id']}_price", "$2,997" );
                $features = get_theme_mod( "closeclient_plan{$plan['id']}_features", "Authority Audit, Bento Ecosystem, Weekly Strategy" );
                $feature_list = explode( ',', $features );
                ?>
                <div class="pricing-card cc-card reveal <?php echo $plan['featured'] ? 'border-accent' : ''; ?>" style="position: relative;">
                    <?php if ( $plan['featured'] ) : ?>
                        <div class="popular-tag" style="position: absolute; top: -15px; left: 50%; transform: translateX(-50%); background: var(--c-accent); color: white; padding: 4px 16px; border-radius: 20px; font-size: 0.7rem; font-weight: 800; letter-spacing: 0.1em;"><?php esc_html_e( 'MOST POPULAR', 'closeclient' ); ?></div>
                    <?php endif; ?>

                    <h3 class="h4 mb-2"><?php echo esc_html( $name ); ?></h3>
                    <div class="price h2 mb-5" style="color: var(--c-white);"><?php echo esc_html( $price ); ?><span class="small text-muted" style="font-size: 1rem;">/mo</span></div>

                    <ul class="list-unstyled mb-5">
                        <?php foreach ( $feature_list as $feature ) : ?>
                            <li class="mb-3 small d-flex gap-2">
                                <span class="text-accent">✓</span> <?php echo esc_html( trim( $feature ) ); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <a href="<?php echo esc_url( get_theme_mod( 'closeclient_booking_link', '#' ) ); ?>" class="cc-button <?php echo ! $plan['featured'] ? 'cc-btn btn-secondary' : ''; ?>" style="width: 100%;"><?php esc_html_e( 'Secure Your Spot', 'closeclient' ); ?></a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
