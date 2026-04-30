<?php
/**
 * Stats Section Template Part
 *
 * @package CloseClient
 */

$tag = get_theme_mod( 'closeclient_stats_tag', 'OUR IMPACT' );
?>

<section class="section section-stats py-lg">
    <div class="container">
        <div class="stats-grid cc-grid-3">
            <?php for ( $i = 1; $i <= 3; $i++ ) :
                $value = get_theme_mod( "closeclient_stat_{$i}_value", "10$i+" );
                $label = get_theme_mod( "closeclient_stat_{$i}_label", "Success Stories" );
                $reveal_class = ( $i <= 2 ) ? '' : 'reveal';
                ?>
                <div class="stat-item cc-card text-center <?php echo esc_attr($reveal_class); ?> py-md">
                    <div class="stat-value h1 gradient-text mb-3" style="font-size: clamp(3rem, 5vw, 5.5rem);"><?php echo esc_html( $value ); ?></div>
                    <div class="stat-label section-tag mb-0"><?php echo esc_html( $label ); ?></div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>
