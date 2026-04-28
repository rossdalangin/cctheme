<?php
/**
 * Stats Section Template Part
 *
 * @package CloseClient
 */

$tag = get_theme_mod( 'closeclient_stats_tag', 'OUR IMPACT' );
?>

<section class="section section-stats">
    <div class="container">
        <div class="bento-grid">
            <?php for ( $i = 1; $i <= 3; $i++ ) :
                $value = get_theme_mod( "closeclient_stat_{$i}_value", "10$i+" );
                $label = get_theme_mod( "closeclient_stat_{$i}_label", "Success Stories" );
                ?>
                <div class="stat-item cc-card text-center reveal">
                    <div class="stat-value h1 gradient-text mb-2"><?php echo esc_html( $value ); ?></div>
                    <div class="stat-label section-tag mb-0"><?php echo esc_html( $label ); ?></div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>
