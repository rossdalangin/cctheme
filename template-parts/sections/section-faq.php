<?php
/**
 * FAQ Section Template Part
 *
 * @package CloseClient
 */

$headline = get_theme_mod( 'closeclient_faq_headline', 'Frequently Asked Questions' );
$tag      = get_theme_mod( 'closeclient_faq_tag', 'FAQ' );
?>

<section id="faq" class="section section-faq bg-dark">
    <div class="container container-narrow">
        <div class="section-header text-center reveal" style="margin-bottom: 60px;">
            <span class="section-tag"><?php echo esc_html( $tag ); ?></span>
            <h2 class="section-headline"><?php echo esc_html( $headline ); ?></h2>
        </div>

        <div class="faq-list">
            <?php
            // Try to fetch from CPT first
            $faqs = new WP_Query( array(
                'post_type'      => 'faq',
                'posts_per_page' => 10,
            ) );

            if ( $faqs->have_posts() ) :
                while ( $faqs->have_posts() ) : $faqs->the_post(); ?>
                    <div class="faq-item cc-card reveal mb-4" style="padding: 30px;">
                        <h3 class="h5 mb-3" style="color: var(--c-white);"><?php the_title(); ?></h3>
                        <div class="faq-answer text-muted small">
                            <?php the_content(); ?>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else :
                // Fallback to Customizer defaults
                for ( $i = 1; $i <= 3; $i++ ) :
                    $question = get_theme_mod( "closeclient_faq_q{$i}", "Question $i?" );
                    $answer   = get_theme_mod( "closeclient_faq_a{$i}", "Answer $i to build trust and reduce friction." );
                    ?>
                    <div class="faq-item cc-card reveal mb-4" style="padding: 30px;">
                        <h3 class="h5 mb-3" style="color: var(--c-white);"><?php echo esc_html( $question ); ?></h3>
                        <div class="faq-answer text-muted small">
                            <?php echo esc_html( $answer ); ?>
                        </div>
                    </div>
                <?php endfor;
            endif; ?>
        </div>
    </div>
</section>
