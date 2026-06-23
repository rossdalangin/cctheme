<?php
/**
 * VSL Section Template Part
 *
 * @package CloseClient
 */
?>

<section class="section section-lg section-vsl reveal overflow-hidden">
    <div class="section-divider-top"></div>
    <div class="container container-narrow text-center">
        <p class="section-tag reveal"><?php echo esc_html( get_theme_mod( 'closeclient_vsl_tag', 'EXCLUSIVE STRATEGY TRAINING' ) ); ?></p>
        <h2 class="section-headline gradient-text reveal"><?php echo esc_html( get_theme_mod( 'closeclient_vsl_headline', 'The Precise Mechanism: Why Most Digital Brands Stagnate (And How to Force Growth)' ) ); ?></h2>
        <div class="vsl-video-container reveal glass p-3 p-md-4 mb-5">
            <?php
            $video_url = get_theme_mod( 'closeclient_vsl_video_url' );
            if ( $video_url ) :
                echo wp_oembed_get( $video_url );
            else : ?>
                <div class="video-placeholder">
                    <p><?php echo esc_html( get_theme_mod( 'closeclient_vsl_placeholder', 'Enter a video URL in Customizer > Homepage > VSL Section' ) ); ?></p>
                </div>
            <?php endif; ?>
        </div>

        <?php
        $takeaways = get_theme_mod( 'closeclient_vsl_takeaways', 'The hidden technical bottlenecks, The precise architecture of scale, Engineering a frictionless lead engine' );
        if ( $takeaways ) : ?>
            <div class="vsl-takeaways reveal mt-5">
                <h3 class="h6 mb-4 text-white-50 letter-spacing-lg"><?php echo esc_html__( 'CORE STRATEGIC TAKEAWAYS:', 'closeclient' ); ?></h3>
                <div class="takeaways-grid cc-grid-3">
                    <?php
                    $items = explode( ',', $takeaways );
                    foreach ( $items as $item ) : ?>
                        <div class="takeaway-item glass p-4 text-start border-0">
                            <div class="d-flex align-items-center gap-3">
                                <span class="text-accent"><?php echo closeclient_get_svg('check'); ?></span>
                                <span class="small text-muted fw-bold"><?php echo esc_html( trim($item) ); ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
