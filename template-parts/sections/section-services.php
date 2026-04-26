<?php
/**
 * Services Section Template Part
 *
 * @package CloseClient
 */
?>

<section class="section section-services">
    <div class="container">
        <div class="section-header reveal" style="margin-bottom: 120px;">
            <span class="gradient-text" style="font-weight: 900; letter-spacing: 0.2em; font-size: 0.8rem;"><?php echo esc_html( get_theme_mod( 'closeclient_services_subheadline', 'CORE CAPABILITIES' ) ); ?></span>
            <h2 class="section-headline" style="margin-top: 20px;"><?php echo esc_html( get_theme_mod( 'closeclient_services_headline', 'The New Standard of Digital Architecture' ) ); ?></h2>
        </div>

        <div class="bento-grid services-bento">
            <?php for ( $i = 1; $i <= 3; $i++ ) :
                $title = get_theme_mod( "closeclient_service_{$i}_title" );
                $text = get_theme_mod( "closeclient_service_{$i}_text" );
                $is_large = ( 1 === $i ) ? 'large' : '';

                if ( $title || $text ) : ?>
                <div class="bento-item reveal <?php echo esc_attr( $is_large ); ?>" style="min-height: <?php echo $is_large ? '500px' : '400px'; ?>;">
                    <div class="bento-content" style="position: relative; z-index: 2;">
                        <h3 class="gradient-text" style="font-size: 2.5rem;"><?php echo esc_html( $title ); ?></h3>
                        <p style="font-size: 1.15rem; line-height: 1.8; color: var(--text-muted);"><?php echo esc_html( $text ); ?></p>
                    </div>
                    <div class="bento-overlay" style="position: absolute; bottom: 0; right: 0; padding: 40px; opacity: 0.05; font-weight: 900; font-size: 8rem; line-height: 1; pointer-events: none;">0<?php echo $i; ?></div>
                </div>
                <?php endif;
            endfor; ?>

            <div class="bento-item large reveal" style="background: var(--cosmic-dark); display: flex; align-items: center; justify-content: center; min-height: 400px;">
                <div class="infinite-logo-mark" style="width: 120px; height: 120px; border: 4px solid var(--vivid-violet); border-radius: 50%; opacity: 0.2; animation: pulse 4s infinite;"></div>
                <h2 style="position: absolute; font-size: 10vw; opacity: 0.03; pointer-events: none; margin: 0;">INFINITE</h2>
            </div>
        </div>
    </div>
</section>

<style>
@keyframes pulse {
    0% { transform: scale(1); opacity: 0.2; }
    50% { transform: scale(1.1); opacity: 0.4; }
    100% { transform: scale(1); opacity: 0.2; }
}
</style>
