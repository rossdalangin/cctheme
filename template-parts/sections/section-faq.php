<?php
/**
 * FAQ Section Template Part (CPT Version)
 *
 * @package CloseClient
 */
?>

<section class="section section-faq">
    <div class="container narrow-container">
        <div class="section-header text-center">
            <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_faq_tag', 'FAQ' ) ); ?></span>
            <h2 class="section-headline"><?php echo esc_html( get_theme_mod( 'closeclient_faq_headline', 'Frequently Asked Questions' ) ); ?></h2>
        </div>

        <div class="faq-list">
            <?php
            $faq_query = new WP_Query( array(
                'post_type'      => 'faq',
                'posts_per_page' => 10,
            ) );

            if ( $faq_query->have_posts() ) :
                while ( $faq_query->have_posts() ) : $faq_query->the_post(); ?>
                    <div class="faq-item">
                        <h3 class="faq-question"><?php the_title(); ?></h3>
                        <div class="faq-answer">
                            <?php the_content(); ?>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else : ?>
                <div class="faq-item">
                    <h3 class="faq-question"><?php echo esc_html( get_theme_mod( 'closeclient_faq_q1', 'Who is this elite system for?' ) ); ?></h3>
                    <div class="faq-answer">
                        <p><?php echo esc_textarea( get_theme_mod( 'closeclient_faq_a1', 'This is specifically architected for established coaches, consultants, and experts who are ready to scale from $10k to $100k+ months.' ) ); ?></p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
