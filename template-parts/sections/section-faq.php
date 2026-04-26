<?php
/**
 * FAQ Section Template Part
 *
 * @package CloseClient
 */
?>

<section class="section section-faq">
    <div class="container container-narrow">
        <div class="section-header text-center" style="margin-bottom: 60px;">
            <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_faq_tag', 'FAQ' ) ); ?></span>
            <h2 class="section-headline"><?php echo esc_html( get_theme_mod( 'closeclient_faq_headline', 'Frequently Asked Questions' ) ); ?></h2>
        </div>

        <div class="faq-list">
            <?php for ( $i = 1; $i <= 3; $i++ ) :
                $question = get_theme_mod( "closeclient_faq_q{$i}" );
                $answer = get_theme_mod( "closeclient_faq_a{$i}" );

                if ( $question ) : ?>
                <div class="faq-item bento-item reveal" style="margin-bottom: 16px; padding: 32px;">
                    <h3 class="faq-question" style="font-size: 1.15rem; margin-bottom: 16px; display: flex; justify-content: space-between; align-items: center;">
                        <?php echo esc_html( $question ); ?>
                        <span class="faq-icon" style="color: var(--accent);">+</span>
                    </h3>
                    <div class="faq-answer">
                        <p style="margin: 0; color: var(--text-muted); font-size: 0.95rem; line-height: 1.7;"><?php echo esc_html( $answer ); ?></p>
                    </div>
                </div>
                <?php endif;
            endfor; ?>
        </div>
    </div>
</section>
