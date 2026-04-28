<?php
/**
 * Pricing Section Template Part
 *
 * @package CloseClient
 */

$headline = get_theme_mod( 'closeclient_pricing_headline', 'Investment Opportunities' );
?>

<section id="pricing" class="section section-pricing">
    <div class="container">
        <div class="section-header text-center reveal">
            <span class="section-tag"><?php esc_html_e( 'INVESTMENT', 'closeclient' ); ?></span>
            <h2 class="section-headline"><?php echo esc_html( $headline ); ?></h2>
        </div>

        <div class="cc-grid-3">
            <?php
            $pricing_query = new WP_Query( array(
                'post_type'      => 'pricing',
                'posts_per_page' => 3,
            ) );

            if ( $pricing_query->have_posts() ) :
                while ( $pricing_query->have_posts() ) : $pricing_query->the_post();
                    $price = get_post_meta( get_the_ID(), '_plan_price', true );
                    $featured = get_post_meta( get_the_ID(), '_plan_featured', true );
                    ?>
                    <div class="pricing-item cc-card reveal <?php echo $featured ? 'border-accent' : ''; ?>" style="position: relative;">
                        <?php if ( $featured ) : ?>
                            <div class="featured-badge"><?php esc_html_e( 'MOST POPULAR', 'closeclient' ); ?></div>
                        <?php endif; ?>
                        <h3 class="h4 mb-4"><?php the_title(); ?></h3>
                        <div class="price h2 mb-5"><?php echo esc_html( $price ); ?><span class="small text-muted">/mo</span></div>
                        <div class="pricing-features mb-5">
                            <?php the_content(); ?>
                        </div>
                        <a href="<?php echo esc_url( get_theme_mod( 'closeclient_booking_link', '#' ) ); ?>" class="cc-button <?php echo ! $featured ? 'cc-button-secondary' : ''; ?>" style="width: 100%;"><?php esc_html_e( 'Secure Your Spot', 'closeclient' ); ?></a>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else :
                // Fallback
                $plans = array(
                    array('name' => 'Foundation', 'price' => '$2,997', 'featured' => false, 'features' => array('Authority Audit', 'Infrastructure Build', 'Core Copy')),
                    array('name' => 'Ecosystem', 'price' => '$5,997', 'featured' => true, 'features' => array('Everything in Foundation', 'Vortex Funnel', 'Lead Intake Automation')),
                    array('name' => 'Mastery', 'price' => '$9,997', 'featured' => false, 'features' => array('Everything in Ecosystem', 'Omnipresent Branding', 'White-Glove Support'))
                );
                foreach ( $plans as $plan ) : ?>
                    <div class="pricing-item cc-card reveal <?php echo $plan['featured'] ? 'border-accent' : ''; ?>" style="position: relative;">
                        <?php if ( $plan['featured'] ) : ?>
                            <div class="featured-badge"><?php esc_html_e( 'MOST POPULAR', 'closeclient' ); ?></div>
                        <?php endif; ?>
                        <h3 class="h4 mb-4"><?php echo esc_html( $plan['name'] ); ?></h3>
                        <div class="price h2 mb-5"><?php echo esc_html( $plan['price'] ); ?><span class="small text-muted">/mo</span></div>
                        <ul class="list-unstyled mb-5">
                            <?php foreach ( $plan['features'] as $feature ) : ?>
                                <li class="mb-3 d-flex align-items-center gap-2">
                                    <span class="text-accent pricing-feature-check"><?php echo closeclient_get_svg('check'); ?></span> <?php echo esc_html( trim( $feature ) ); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <a href="<?php echo esc_url( get_theme_mod( 'closeclient_booking_link', '#' ) ); ?>" class="cc-button <?php echo ! $plan['featured'] ? 'cc-button-secondary' : ''; ?>" style="width: 100%;"><?php esc_html_e( 'Secure Your Spot', 'closeclient' ); ?></a>
                    </div>
                <?php endforeach;
            endif; ?>
        </div>
    </div>
</section>
