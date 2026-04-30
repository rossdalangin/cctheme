<?php
/**
 * Testimonials Section Template Part
 *
 * @package CloseClient
 */

$headline = get_theme_mod( 'closeclient_testimonials_headline', 'Elite Success Stories' );
$tag      = get_theme_mod( 'closeclient_testimonials_tag', 'SOCIAL PROOF' );
?>

<section id="testimonials" class="section section-lg section-testimonials">
    <div class="container">
        <div class="section-header text-center reveal">
            <span class="section-tag"><?php echo esc_html( $tag ); ?></span>
            <h2 class="section-headline"><?php echo esc_html( $headline ); ?></h2>
        </div>

        <div class="cc-grid-3">
            <?php
            $testimonials_query = new WP_Query( array(
                'post_type'      => 'testimonial',
                'posts_per_page' => 3,
            ) );

            if ( $testimonials_query->have_posts() ) :
                while ( $testimonials_query->have_posts() ) : $testimonials_query->the_post();
                    $rating = get_post_meta( get_the_ID(), '_testimonial_rating', true );
                    ?>
                    <div class="testimonial-item cc-card reveal">
                        <?php if ( $rating ) : ?>
                            <div class="testimonial-rating mb-3">
                                <?php for ( $i = 1; $i <= $rating; $i++ ) { echo '★'; } ?>
                            </div>
                        <?php endif; ?>
                        <div class="quote-icon">"</div>
                        <div class="mb-5 small text-muted testimonial-text">
                            <?php the_content(); ?>
                        </div>
                        <div class="testimonial-client d-flex align-items-center gap-3">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="client-avatar">
                                    <?php the_post_thumbnail( 'thumbnail' ); ?>
                                </div>
                            <?php endif; ?>
                            <div class="client-info">
                                <div class="client-name h5 mb-0"><?php the_title(); ?></div>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else :
                // Fallback
                for ( $i = 1; $i <= 3; $i++ ) :
                    $text = get_theme_mod( "closeclient_testimonial_{$i}_text", "The system CloseClient built allowed me to scale to $100k months while working fewer hours." );
                    $name = get_theme_mod( "closeclient_testimonial_{$i}_name", "Elite Expert $i" );
                    ?>
                    <div class="testimonial-item cc-card reveal">
                        <div class="testimonial-rating mb-3">★★★★★</div>
                        <div class="quote-icon">"</div>
                        <p class="mb-5 testimonial-text"><?php echo esc_html( $text ); ?></p>
                        <div class="client-name h5 mb-0"><?php echo esc_html( $name ); ?></div>
                    </div>
                <?php endfor;
            endif; ?>
        </div>
    </div>
</section>
