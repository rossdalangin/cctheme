<?php
/**
 * Pricing Section Template Part
 *
 * @package CloseClient
 */

$headline = get_theme_mod( 'closeclient_pricing_headline', 'Investment Tiers' );
$tag      = get_theme_mod( 'closeclient_pricing_tag', 'INVESTMENT' );
?>

<section id="pricing" class="section section-lg section-pricing bg-dark">
    <div class="container">
        <div class="section-header text-center reveal">
            <span class="section-tag"><?php echo esc_html( $tag ); ?></span>
            <h2 class="section-headline gradient-text"><?php echo esc_html( $headline ); ?></h2>
        </div>

        <div class="cc-grid-3 mb-5">
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
                    <div class="pricing-item cc-card glass reveal p-5 d-flex flex-column h-100 <?php echo $featured ? 'featured-plan' : ''; ?>">
                        <?php if ( $featured ) : ?>
                            <div class="featured-badge"><?php echo esc_html( get_theme_mod( 'closeclient_label_popular', 'MOST POPULAR' ) ); ?></div>
                        <?php endif; ?>

                        <div class="pricing-header mb-5">
                            <h3 class="h3 mb-4 text-white"><?php the_title(); ?></h3>
                            <div class="price h1 mb-0 gradient-text"><?php echo esc_html( $price ); ?><span class="small text-muted fw-normal">/mo</span></div>
                        </div>

                        <div class="pricing-features flex-grow-1 mb-5">
                            <div class="small text-muted mb-4 text-uppercase tracking-widest fw-bold"><?php echo esc_html( get_theme_mod( 'closeclient_label_included', 'System Components' ) ); ?></div>
                            <?php the_content(); ?>
                        </div>

                        <div class="pricing-footer mt-auto pt-4">
                            <a href="<?php echo esc_url( get_theme_mod( 'closeclient_booking_link', '#audit' ) ); ?>" class="cc-button w-100 <?php echo ! $featured ? 'cc-button-secondary' : ''; ?>">
                                <?php echo esc_html( get_theme_mod( 'closeclient_label_secure', 'Secure Your Audit →' ) ); ?>
                            </a>
                        </div>
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
                    <div class="pricing-item glass reveal p-4 p-md-5 d-flex flex-column h-100 <?php echo $plan['featured'] ? 'featured-plan' : ''; ?>">
                        <?php if ( $plan['featured'] ) : ?>
                            <div class="featured-badge"><?php echo esc_html( get_theme_mod( 'closeclient_label_popular', 'MOST POPULAR' ) ); ?></div>
                        <?php endif; ?>

                        <div class="pricing-header mb-5">
                            <h3 class="h4 mb-4 text-white"><?php echo esc_html( $plan['name'] ); ?></h3>
                            <div class="price h1 mb-0"><?php echo esc_html( $plan['price'] ); ?><span class="small text-muted fw-normal">/mo</span></div>
                        </div>

                        <div class="pricing-features flex-grow-1 mb-5">
                            <div class="small text-muted mb-4 text-uppercase tracking-widest fw-bold"><?php echo esc_html( get_theme_mod( 'closeclient_label_included', 'System Components' ) ); ?></div>
                            <ul class="list-unstyled mb-0">
                                <?php foreach ( $plan['features'] as $feature ) : ?>
                                    <li class="mb-3 d-flex align-items-center gap-2 small text-muted">
                                        <span class="text-accent pricing-feature-check"><?php echo closeclient_get_svg('check'); ?></span> <?php echo esc_html( trim( $feature ) ); ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <div class="pricing-footer mt-auto pt-4">
                            <a href="<?php echo esc_url( get_theme_mod( 'closeclient_booking_link', '#audit' ) ); ?>" class="cc-button w-100 <?php echo ! $plan['featured'] ? 'cc-button-secondary' : ''; ?>">
                                <?php echo esc_html( get_theme_mod( 'closeclient_label_secure', 'Secure Your Audit →' ) ); ?>
                            </a>
                        </div>
                    </div>
                <?php endforeach;
            endif; ?>
        </div>

        <div class="pricing-trust-bar text-center mt-5 reveal opacity-50">
            <div class="d-flex justify-content-center align-items-center gap-5 flex-wrap">
                <div class="trust-item d-flex align-items-center gap-2">
                    <span class="text-accent"><?php echo closeclient_get_svg('check'); ?></span>
                    <span class="small fw-bold uppercase letter-spacing-1"><?php echo esc_html( get_theme_mod( 'closeclient_pricing_trust_1', 'NO LONG-TERM CONTRACTS' ) ); ?></span>
                </div>
                <div class="trust-item d-flex align-items-center gap-2">
                    <span class="text-accent"><?php echo closeclient_get_svg('check'); ?></span>
                    <span class="small fw-bold uppercase letter-spacing-1"><?php echo esc_html( get_theme_mod( 'closeclient_pricing_trust_2', 'ROI-FOCUSED ENGINEERING' ) ); ?></span>
                </div>
                <div class="trust-item d-flex align-items-center gap-2">
                    <span class="text-accent"><?php echo closeclient_get_svg('check'); ?></span>
                    <span class="small fw-bold uppercase letter-spacing-1"><?php echo esc_html( get_theme_mod( 'closeclient_pricing_trust_3', 'WHITE-GLOVE ONBOARDING' ) ); ?></span>
                </div>
            </div>
        </div>
    </div>
</section>
