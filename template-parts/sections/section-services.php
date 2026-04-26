<?php
/**
 * Services Section Template Part
 *
 * @package CloseClient
 */
?>

<section class="section section-services">
    <div class="container">
        <div class="section-header text-center reveal" style="margin-bottom: 100px;">
            <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_services_tag', 'OUR CORE CAPABILITIES' ) ); ?></span>
            <h2 class="section-headline"><?php echo esc_html( get_theme_mod( 'closeclient_services_headline', 'Elite Solutions for the Digital Economy' ) ); ?></h2>
        </div>

        <div class="cc-grid-3">
            <?php for ( $i = 1; $i <= 3; $i++ ) :
                $title = get_theme_mod( "closeclient_service_{$i}_title", "Capability $i" );
                $text = get_theme_mod( "closeclient_service_{$i}_text", "High-performance digital engineering tailored for infinite scale." );

                if ( $title || $text ) : ?>
                <div class="service-card cc-card reveal">
                    <h3 class="gradient-text" style="font-size: 1.8rem; margin-bottom: 1.5rem;"><?php echo esc_html( $title ); ?></h3>
                    <p style="color: var(--c-text-muted); font-size: 1rem; line-height: 1.8;"><?php echo esc_html( $text ); ?></p>
                </div>
                <?php endif;
            endfor; ?>
        </div>
    </div>
</section>
