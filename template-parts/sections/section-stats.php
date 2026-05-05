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
                $desc  = get_theme_mod( "closeclient_stat_{$i}_desc", "Description of impact for stat $i" );
                $reveal_class = ( ! $is_nested && $i <= 3 ) ? '' : ( $is_nested ? '' : 'reveal' );
                ?>
                <div class="stat-item cc-card text-center <?php echo esc_attr($reveal_class); ?> py-lg border-accent-soft">
                    <div class="stat-value counter"><?php echo esc_html( $value ); ?></div>
                    <div class="stat-label section-tag mb-3"><?php echo esc_html( $label ); ?></div>
                    <p class="small text-muted mb-0 px-4"><?php echo esc_html( $desc ); ?></p>
                </div>
            <?php endfor; ?>
        </div>

<?php if ( ! $is_nested ) : ?>
    </div>
</section>
<?php endif; ?>
