<?php
/**
 * Services Section Template Part
 *
 * @package CloseClient
 */
?>

<section class="section section-services">
    <div class="container">
        <div class="section-header text-center reveal" style="margin-bottom: 80px;">
            <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_services_subheadline', 'OUR CORE CAPABILITIES' ) ); ?></span>
            <h2 class="section-headline"><?php echo esc_html( get_theme_mod( 'closeclient_services_headline', 'Elite Solutions for Elite Experts' ) ); ?></h2>
        </div>

        <div class="services-grid">
            <?php for ( $i = 1; $i <= 3; $i++ ) :
                $title = get_theme_mod( "closeclient_service_{$i}_title" );
                $text = get_theme_mod( "closeclient_service_{$i}_text" );

                if ( $title || $text ) : ?>
                <div class="bento-item reveal">
                    <h3><?php echo esc_html( $title ); ?></h3>
                    <p class="text-muted"><?php echo esc_html( $text ); ?></p>
                </div>
                <?php endif;
            endfor; ?>
        </div>
    </div>
</section>
