<?php
/**
 * Process Section Template Part
 *
 * @package CloseClient
 */

$headline = get_theme_mod( 'closeclient_process_headline', 'The Authority Roadmap' );
$tag      = get_theme_mod( 'closeclient_process_tag', 'OUR PROCESS' );
?>

<section id="process" class="section section-lg section-process bg-secondary">
    <div class="container">
        <div class="section-header text-center reveal">
            <span class="section-tag"><?php echo esc_html( $tag ); ?></span>
            <h2 class="section-headline gradient-text"><?php echo esc_html( $headline ); ?></h2>
        </div>

        <div class="process-list">
            <?php
            $process_query = new WP_Query( array(
                'post_type'      => 'process',
                'posts_per_page' => 4,
                'meta_key'       => '_step_order',
                'orderby'        => 'meta_value_num',
                'order'          => 'ASC'
            ) );

            if ( $process_query->have_posts() ) :
                $i = 0;
                while ( $process_query->have_posts() ) : $process_query->the_post();
                    $i++;
                    $order = get_post_meta( get_the_ID(), '_step_order', true );
                    $align = ( $i % 2 == 0 ) ? 'flex-row-reverse text-end' : '';
                    ?>
                    <div class="process-step-modern d-flex align-items-center mb-5 reveal <?php echo $align; ?>">
                        <div class="process-step-content flex-1 p-4">
                            <div class="step-num-modern gradient-text h1 mb-2">0<?php echo esc_html($order); ?></div>
                            <h3 class="h2 mb-3"><?php the_title(); ?></h3>
                            <div class="text-muted lead"><?php the_content(); ?></div>
                        </div>
                        <div class="process-step-spacer d-none d-lg-block flex-1"></div>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else :
                // Fallback to Customizer
                for ( $i = 1; $i <= 3; $i++ ) :
                    $title = get_theme_mod( "closeclient_process_step_{$i}_title", "Phase $i" );
                    $text  = get_theme_mod( "closeclient_process_step_{$i}_text", "Description for step $i of your proven roadmap." );
                    $align = ( $i % 2 == 0 ) ? 'flex-row-reverse text-end' : '';
                    ?>
                    <div class="process-step-modern d-flex align-items-center mb-5 reveal <?php echo $align; ?>">
                        <div class="process-step-content flex-1 p-4">
                            <div class="step-num-modern gradient-text h1 mb-2">0<?php echo $i; ?></div>
                            <h3 class="h2 mb-3"><?php echo esc_html( $title ); ?></h3>
                            <p class="text-muted lead"><?php echo esc_html( $text ); ?></p>
                        </div>
                        <div class="process-step-spacer d-none d-lg-block flex-1"></div>
                    </div>
                <?php endfor;
            endif; ?>
        </div>
    </div>
</section>
