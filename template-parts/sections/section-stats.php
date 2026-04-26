<?php
/**
 * Stats Section Template Part
 *
 * @package CloseClient
 */
?>

<section class="section section-stats bg-light">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_stats_tag', 'OUR IMPACT' ) ); ?></span>
        </div>
        <div class="stats-grid">
            <?php for ( $i = 1; $i <= 3; $i++ ) : ?>
                <div class="stat-item text-center">
                    <div class="stat-value"><?php echo esc_html( get_theme_mod( "closeclient_stat_{$i}_value", "100+" ) ); ?></div>
                    <div class="stat-label"><?php echo esc_html( get_theme_mod( "closeclient_stat_{$i}_label", "Clients Helped" ) ); ?></div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>
