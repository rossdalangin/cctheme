<?php
/**
 * FAQ Section Template Part
 *
 * @package CloseClient
 */

$headline = get_theme_mod( 'closeclient_faq_headline', 'Strategic Questions' );
$tag      = get_theme_mod( 'closeclient_faq_tag', 'FAQ' );
?>

<section id="faq" class="section section-lg section-faq">
    <div class="container container-narrow">
        <div class="section-header text-center reveal">
            <span class="section-tag"><?php echo esc_html( $tag ); ?></span>
            <h2 class="section-headline gradient-text"><?php echo esc_html( $headline ); ?></h2>
        </div>

        <div class="faq-accordion mt-5 mb-5">
            <?php
            $faq_query = new WP_Query( array(
                'post_type'      => 'faq',
                'posts_per_page' => 10,
            ) );

            if ( $faq_query->have_posts() ) :
                while ( $faq_query->have_posts() ) : $faq_query->the_post(); ?>
                    <div class="faq-item glass reveal mb-3" role="region">
                        <button class="faq-header d-flex justify-content-between align-items-center w-100 text-start p-4" aria-expanded="false">
                            <h3 class="h6 mb-0 text-white"><?php the_title(); ?></h3>
                            <span class="faq-icon"><?php echo closeclient_get_svg('arrow-right', 'chevron-svg'); ?></span>
                        </button>
                        <div class="faq-body">
                            <div class="p-4 pt-0 text-muted small lead">
                                <?php the_content(); ?>
                            </div>
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
                        <div class="faq-item glass reveal mb-3" role="region">
                            <button class="faq-header d-flex justify-content-between align-items-center w-100 text-start p-4" aria-expanded="false">
                                <h3 class="h6 mb-0 text-white"><?php echo esc_html( $question ); ?></h3>
                                <span class="faq-icon"><?php echo closeclient_get_svg('arrow-right', 'chevron-svg'); ?></span>
                            </button>
                            <div class="faq-body">
                                <div class="p-4 pt-0 text-muted small lead">
                                    <?php echo wp_kses_post( $answer ); ?>
                                </div>
                            </div>
                        </div>
                    <?php endif;
                endfor;
            endif; ?>
        </div>

        <div class="faq-footer text-center mt-5 reveal">
            <p class="text-muted small mb-4"><?php echo esc_html( get_theme_mod( 'closeclient_faq_footer_text', 'Still have technical or strategic questions about our process?' ) ); ?></p>
            <a href="#audit" class="cc-button cc-button-secondary"><?php echo esc_html( get_theme_mod( 'closeclient_faq_footer_btn', 'Talk to an Architect →' ) ); ?></a>
        </div>
    </div>
</section>
