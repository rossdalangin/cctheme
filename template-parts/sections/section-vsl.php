<?php
/**
 * VSL Section Template Part
 *
 * @package CloseClient
 */
?>

<section class="section section-lg section-vsl reveal overflow-hidden">
    <div class="section-divider-top"></div>
    <div class="container container-narrow text-center">
        <p class="section-tag reveal"><?php echo esc_html( get_theme_mod( 'closeclient_vsl_tag', 'EXCLUSIVE TRAINING' ) ); ?></p>
        <h2 class="section-headline gradient-text reveal"><?php echo esc_html( get_theme_mod( 'closeclient_vsl_headline', 'The Big Domino: Why Your Expert Business is Stalled (And How to Fix It)' ) ); ?></h2>
        <div class="vsl-video-container reveal glass p-3 p-md-4">
            <?php
            $video_url = get_theme_mod( 'closeclient_vsl_video_url' );
            if ( $video_url ) :
                echo wp_oembed_get( $video_url );
            else : ?>
                <div class="video-placeholder">
                    <p><?php echo esc_html( get_theme_mod( 'closeclient_vsl_placeholder', 'Enter a video URL in Customizer > Homepage > VSL Section' ) ); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
