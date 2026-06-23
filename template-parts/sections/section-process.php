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

        <div class="process-list pt-lg">
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
                    $align_class = ( $i % 2 == 0 ) ? 'step-right' : 'step-left';
                    ?>
                    <div class="process-step-modern reveal <?php echo esc_attr($align_class); ?>">
                        <div class="process-dot"></div>
                        <div class="process-step-content glass p-4 p-md-5">
                            <div class="step-num-modern gradient-text h2 mb-3">0<?php echo esc_html($order); ?></div>
                            <h3 class="h3 mb-3"><?php the_title(); ?></h3>
                            <div class="text-muted lead small mb-4"><?php the_content(); ?></div>

                            <?php
                            $deliverables = get_post_meta( get_the_ID(), '_step_deliverables', true );
                            if ( $deliverables ) : ?>
                                <div class="step-deliverables pt-4 border-top border-secondary">
                                    <span class="small text-accent fw-bold uppercase letter-spacing-1 d-block mb-3"><?php echo esc_html__( 'CORE DELIVERABLES:', 'closeclient' ); ?></span>
                                    <ul class="list-unstyled mb-0 d-flex flex-wrap gap-x-4 gap-y-2">
                                        <?php
                                        $items = explode( ',', $deliverables );
                                        foreach ( $items as $item ) : ?>
                                            <li class="small text-white-50"><span class="text-accent me-2">✓</span><?php echo esc_html( trim($item) ); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else :
                // Fallback to Customizer
                for ( $i = 1; $i <= 3; $i++ ) :
                    $title = get_theme_mod( "closeclient_process_step_{$i}_title", "Phase $i" );
                    $text  = get_theme_mod( "closeclient_process_step_{$i}_text", "Description for step $i of your proven roadmap." );
                    $align_class = ( $i % 2 == 0 ) ? 'step-right' : 'step-left';
                    ?>
                    <div class="process-step-modern reveal <?php echo esc_attr($align_class); ?>">
                        <div class="process-dot"></div>
                        <div class="process-step-content glass p-4 p-md-5">
                            <div class="step-num-modern gradient-text h2 mb-3">0<?php echo $i; ?></div>
                            <h3 class="h3 mb-3"><?php echo esc_html( $title ); ?></h3>
                            <p class="text-muted lead small"><?php echo esc_html( $text ); ?></p>
                        </div>
                    </div>
                <?php endfor;
            endif; ?>
        </div>
    </div>
</section>
