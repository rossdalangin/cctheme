<?php
/**
 * FAQ Section Template Part
 *
 * @package CloseClient
 */

$headline = get_theme_mod( 'closeclient_faq_headline', 'Frequently Asked Questions' );
$tag      = get_theme_mod( 'closeclient_faq_tag', 'FAQ' );
?>

<section id="faq" class="section section-faq">
    <div class="container container-narrow">
        <div class="section-header text-center reveal">
            <span class="section-tag"><?php echo esc_html( $tag ); ?></span>
            <h2 class="section-headline"><?php echo esc_html( $headline ); ?></h2>
        </div>

        <div class="faq-list mt-5">
            <?php
            $faq_query = new WP_Query( array(
                'post_type'      => 'faq',
                'posts_per_page' => 10,
            ) );

            if ( $faq_query->have_posts() ) :
                while ( $faq_query->have_posts() ) : $faq_query->the_post(); ?>
                    <div class="faq-item cc-card reveal mb-4">
                        <h3 class="h5 mb-3 faq-question"><?php the_title(); ?></h3>
                        <div class="text-muted small">
                            <?php the_content(); ?>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else :
                // Fallback to Customizer
                for ( $i = 1; $i <= 3; $i++ ) :
                    $question = get_theme_mod( "closeclient_faq_q{$i}" );
                    $answer   = get_theme_mod( "closeclient_faq_a{$i}" );
                    if ( ! empty( $question ) ) : ?>
                        <div class="faq-item cc-card reveal mb-4">
                            <h3 class="h5 mb-3 faq-question"><?php echo esc_html( $question ); ?></h3>
                            <div class="text-muted small">
                                <?php echo wp_kses_post( $answer ); ?>
                            </div>
                        </div>
                    <?php endif;
                endfor;
            endif; ?>
        </div>
    </div>
</section>
