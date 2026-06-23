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
            <h2 class="section-headline gradient-text"><?php echo esc_html( $headline ); ?></h2>
        </div>

        <div class="bento-grid">
            <?php
            $testimonials_query = new WP_Query( array(
                'post_type'      => 'testimonial',
                'posts_per_page' => 3,
            ) );

            if ( $testimonials_query->have_posts() ) :
                $i = 0;
                while ( $testimonials_query->have_posts() ) : $testimonials_query->the_post();
                    $i++;
                    $rating = get_post_meta( get_the_ID(), '_testimonial_rating', true );
                    $company = get_post_meta( get_the_ID(), '_testimonial_company', true );
                    $result  = get_post_meta( get_the_ID(), '_testimonial_result', true );
                    $span = ( $i == 1 ) ? 'bento-span-7' : ( ( $i == 2 ) ? 'bento-span-5' : 'bento-span-12' );
                    ?>
                    <div class="testimonial-item cc-card glass reveal h-100 d-flex flex-column p-5 <?php echo esc_attr($span); ?>">
                        <?php if ( $result ) : ?>
                            <div class="testimonial-result badge bg-accent text-white mb-5 p-2 px-3 small fw-bold" style="font-size: 0.65rem;"><?php echo esc_html( $result ); ?></div>
                        <?php endif; ?>
                        <div class="testimonial-rating mb-5 d-flex gap-1">
                            <?php
                            $stars = intval($rating) ?: 5;
                            for ( $i = 1; $i <= 5; $i++ ) {
                                $color = ($i <= $stars) ? 'text-warning' : 'text-secondary';
                                echo closeclient_get_svg('star', 'star-icon ' . $color);
                            }
                            ?>
                        </div>

                        <div class="testimonial-body flex-grow-1">
                            <blockquote class="mb-5">
                                <span class="quote-icon-top"><?php echo closeclient_get_svg('check', 'quote-svg'); ?></span>
                                <div class="testimonial-text lead small text-muted">
                                    <?php the_content(); ?>
                                </div>
                            </blockquote>
                        </div>

                        <div class="testimonial-client d-flex align-items-center gap-3 mt-auto pt-4 border-top border-secondary">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="client-avatar">
                                    <?php the_post_thumbnail( 'thumbnail', array('class' => 'rounded-circle') ); ?>
                                </div>
                            <?php else : ?>
                                <div class="client-avatar-placeholder rounded-circle bg-secondary"></div>
                            <?php endif; ?>
                            <div class="client-info">
                                <div class="client-name h6 mb-1 text-white"><?php the_title(); ?></div>
                                <?php if ( $company ) : ?>
                                    <div class="client-company small text-accent"><?php echo esc_html( $company ); ?></div>
                                <?php endif; ?>
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
                    <div class="testimonial-item cc-card glass reveal h-100 d-flex flex-column p-4 p-md-5">
                        <div class="testimonial-rating mb-4 d-flex gap-1">
                            <?php for ( $j = 1; $j <= 5; $j++ ) { echo closeclient_get_svg('star', 'star-icon text-warning'); } ?>
                        </div>
                        <div class="testimonial-body flex-grow-1">
                            <blockquote class="mb-5">
                                <span class="quote-icon-top"><?php echo closeclient_get_svg('check', 'quote-svg'); ?></span>
                                <p class="testimonial-text lead small text-muted"><?php echo esc_html( $text ); ?></p>
                            </blockquote>
                        </div>
                        <div class="testimonial-client d-flex align-items-center gap-3 mt-auto pt-4 border-top border-secondary">
                            <div class="client-avatar-placeholder rounded-circle bg-secondary"></div>
                            <div class="client-info">
                                <div class="client-name h6 mb-0 text-white"><?php echo esc_html( $name ); ?></div>
                            </div>
                        </div>
                    </div>
                <?php endfor;
            endif; ?>
        </div>
    </div>
</section>
