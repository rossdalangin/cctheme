<?php
/**
 * Logo Ticker Section (Infinite Scroll)
 *
 * @package CloseClient
 */
?>

<section class="section section-logo-ticker py-md">
    <div class="container mb-4 text-center">
        <span class="section-tag small"><?php echo esc_html( get_theme_mod( 'closeclient_logo_ticker_tag', 'TRUSTED BY WORLD-CLASS BRANDS' ) ); ?></span>
    </div>
    <div class="container-fluid ticker-container">
        <div class="ticker-wrapper">
            <?php
            for ( $i = 1; $i <= 5; $i++ ) :
                $logo = get_theme_mod( "closeclient_authority_logo_$i" );
                if ( $logo ) : ?>
                    <div class="ticker-item">
                        <img src="<?php echo esc_url( $logo ); ?>" alt="Partner Logo">
                    </div>
                <?php endif;
            endfor; ?>

            <!-- Duplicate for infinite effect -->
            <?php
            for ( $i = 1; $i <= 5; $i++ ) :
                $logo = get_theme_mod( "closeclient_authority_logo_$i" );
                if ( $logo ) : ?>
                    <div class="ticker-item">
                        <img src="<?php echo esc_url( $logo ); ?>" alt="Partner Logo">
                    </div>
                <?php endif;
            endfor; ?>
        </div>
    </div>
</section>
