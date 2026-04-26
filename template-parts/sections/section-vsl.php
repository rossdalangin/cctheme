<?php
/**
 * VSL Section Template Part
 *
 * @package CloseClient
 */
?>

<section class="section section-vsl bg-light">
    <div class="container container-narrow text-center">
        <h2 class="section-headline"><?php echo esc_html( get_theme_mod( 'closeclient_vsl_headline', 'Watch This If You Want to Scale' ) ); ?></h2>
        <div class="vsl-video-container shadow-premium">
            <?php
            $video_url = get_theme_mod( 'closeclient_vsl_video_url' );
            if ( $video_url ) :
                echo wp_oembed_get( $video_url );
            else : ?>
                <div class="video-placeholder" style="aspect-ratio:16/9; background:#000; border-radius:24px; display:flex; align-items:center; justify-content:center; color:#fff;">
                    <p>Enter a video URL in Customizer > Homepage > VSL Section</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
