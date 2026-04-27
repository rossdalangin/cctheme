<?php
/**
 * VSL Section Template Part
 *
 * @package CloseClient
 */
?>

<section class="section section-vsl reveal">
    <div class="container container-narrow text-center">
        <h2 class="section-headline reveal"><?php echo esc_html( get_theme_mod( 'closeclient_vsl_headline', 'The "Big Domino" Strategy Sessions' ) ); ?></h2>
        <div class="vsl-video-container reveal" style="border: 2px solid var(--c-border); border-radius: 32px; overflow: hidden; box-shadow: var(--shadow-premium); background: var(--c-onyx-light);">
            <?php
            $video_url = get_theme_mod( 'closeclient_vsl_video_url' );
            if ( $video_url ) :
                echo wp_oembed_get( $video_url );
            else : ?>
                <div class="video-placeholder" style="aspect-ratio:16/9; display:flex; align-items:center; justify-content:center; color:var(--c-text-muted);">
                    <p>Enter a video URL in Customizer > Homepage > VSL Section</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
