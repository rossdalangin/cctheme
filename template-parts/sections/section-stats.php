<?php
/**
 * Stats Section Template Part
 *
 * @package CloseClient
 */

$tag = get_theme_mod( 'closeclient_stats_tag', 'OUR IMPACT' );
?>

<?php
$is_nested = isset( $args['is_nested'] ) && $args['is_nested'];
?>

<?php if ( ! $is_nested ) : ?>
<section class="section section-lg section-stats">
    <div class="container">
<?php endif; ?>

        <div class="stats-grid <?php echo $is_nested ? 'cc-grid-1' : 'cc-grid-3'; ?> gap-4">
            <?php for ( $i = 1; $i <= 3; $i++ ) :
                $value = get_theme_mod( "closeclient_stat_{$i}_value", "10$i+" );
                $label = get_theme_mod( "closeclient_stat_{$i}_label", "Success Stories" );
                $reveal_class = ( ! $is_nested && $i <= 3 ) ? '' : ( $is_nested ? '' : 'reveal' );
                ?>
                <div class="stat-item cc-card text-center <?php echo esc_attr($reveal_class); ?> py-md">
                    <div class="stat-value h1 gradient-text mb-2" style="font-size: clamp(2.5rem, 5vw, 4rem);"><?php echo esc_html( $value ); ?></div>
                    <div class="stat-label section-tag mb-0"><?php echo esc_html( $label ); ?></div>
                </div>
            <?php endfor; ?>
        </div>

<?php if ( ! $is_nested ) : ?>
    </div>
</section>
<?php endif; ?>
