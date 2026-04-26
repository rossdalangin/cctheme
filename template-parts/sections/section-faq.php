<?php
/**
 * FAQ Section Template Part
 *
 * @package CloseClient
 */
?>

<section class="section section-faq">
    <div class="container container-narrow">
        <div class="section-header text-center reveal">
            <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_faq_tag', 'FAQ' ) ); ?></span>
            <h2 class="section-headline"><?php echo esc_html( get_theme_mod( 'closeclient_faq_headline', 'Frequently Asked Questions' ) ); ?></h2>
        </div>

        <div class="faq-list">
            <?php for ( $i = 1; $i <= 3; $i++ ) :
                $question = get_theme_mod( "closeclient_faq_q{$i}" );
                $answer = get_theme_mod( "closeclient_faq_a{$i}" );

                if ( $question ) : ?>
                <div class="faq-item reveal">
                    <h3 class="faq-question">
                        <?php echo esc_html( $question ); ?>
                        <span class="faq-icon">+</span>
                    </h3>
                    <div class="faq-answer">
                        <p><?php echo esc_html( $answer ); ?></p>
                    </div>
                </div>
                <?php endif;
            endfor; ?>
        </div>
    </div>
</section>
