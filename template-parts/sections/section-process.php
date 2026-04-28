<?php
/**
 * Process Section Template Part
 *
 * @package CloseClient
 */

$headline = get_theme_mod( 'closeclient_process_headline', 'The Authority Roadmap' );
$tag      = get_theme_mod( 'closeclient_process_tag', 'OUR PROCESS' );
?>

<section id="process" class="section section-process bg-secondary">
    <div class="container">
        <div class="section-header text-center reveal">
            <span class="section-tag"><?php echo esc_html( $tag ); ?></span>
            <h2 class="section-headline"><?php echo esc_html( $headline ); ?></h2>
        </div>

        <div class="process-grid">
            <?php
            $process_query = new WP_Query( array(
                'post_type'      => 'process',
                'posts_per_page' => 3,
                'meta_key'       => '_step_order',
                'orderby'        => 'meta_value_num',
                'order'          => 'ASC'
            ) );

            if ( $process_query->have_posts() ) :
                while ( $process_query->have_posts() ) : $process_query->the_post();
                    $order = get_post_meta( get_the_ID(), '_step_order', true );
                    ?>
                    <div class="process-step cc-card reveal">
                        <div class="step-num">0<?php echo esc_html($order); ?></div>
                        <h3 class="h4 mb-3"><?php the_title(); ?></h3>
                        <div class="text-muted small"><?php the_content(); ?></div>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else :
                // Fallback to Customizer
                for ( $i = 1; $i <= 3; $i++ ) :
                    $title = get_theme_mod( "closeclient_process_step_{$i}_title", "Phase $i" );
                    $text  = get_theme_mod( "closeclient_process_step_{$i}_text", "Description for step $i of your proven roadmap." );
                    ?>
                    <div class="process-step cc-card reveal">
                        <div class="step-num">0<?php echo $i; ?></div>
                        <h3 class="h4 mb-3"><?php echo esc_html( $title ); ?></h3>
                        <p class="text-muted small"><?php echo esc_html( $text ); ?></p>
                    </div>
                <?php endfor;
            endif; ?>
        </div>
    </div>
</section>
