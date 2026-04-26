<?php
/**
 * Services Section Template Part
 *
 * @package CloseClient
 */
?>

<section class="section section-services">
    <div class="container">
        <div class="section-header text-center" style="margin-bottom: 80px;">
            <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_services_subheadline', 'OUR CORE CAPABILITIES' ) ); ?></span>
            <h2 class="section-headline"><?php echo esc_html( get_theme_mod( 'closeclient_services_headline', 'The Architecture of Dominance' ) ); ?></h2>
        </div>

        <div class="bento-grid services-bento">
            <?php for ( $i = 1; $i <= 3; $i++ ) :
                $title = get_theme_mod( "closeclient_service_{$i}_title" );
                $text = get_theme_mod( "closeclient_service_{$i}_text" );
                $is_large = ( 1 === $i ) ? 'large' : '';

                if ( $title || $text ) : ?>
                <div class="bento-item <?php echo esc_attr( $is_large ); ?>">
                    <h3 class="gradient-text"><?php echo esc_html( $title ); ?></h3>
                    <p><?php echo esc_html( $text ); ?></p>
                </div>
                <?php endif;
            endfor; ?>

            <div class="bento-item large" style="display: flex; align-items: center; justify-content: center; background: var(--onyx-light);">
                 <h2 style="margin: 0; opacity: 0.1;">ELITE PERFORMANCE</h2>
            </div>
        </div>
    </div>
</section>
