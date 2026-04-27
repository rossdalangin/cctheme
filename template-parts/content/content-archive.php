<?php
/**
 * Post Card Template Part
 *
 * @package CloseClient
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-card cc-card reveal' ); ?> style="padding: 0; overflow: hidden; display: flex; flex-direction: column;">
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="post-thumbnail" style="aspect-ratio: 16/9; overflow: hidden;">
            <a href="<?php echo esc_url( get_permalink() ); ?>">
                <?php the_post_thumbnail( 'large', array( 'style' => 'width: 100%; height: 100%; object-fit: cover; border-radius: 0; transition: 0.5s;' ) ); ?>
            </a>
        </div>
    <?php endif; ?>

    <div class="post-content" style="padding: 40px; flex-grow: 1; display: flex; flex-direction: column;">
        <div class="post-meta section-tag mb-3" style="font-size: 0.65rem;">
            <?php the_category( ', ' ); ?> • <?php echo get_the_date(); ?>
        </div>

        <h3 class="post-title h4 mb-3">
            <a href="<?php echo esc_url( get_permalink() ); ?>" style="text-decoration: none; color: inherit;"><?php the_title(); ?></a>
        </h3>

        <div class="post-excerpt text-muted mb-5" style="font-size: 0.95rem;">
            <?php echo wp_trim_words( get_the_excerpt(), 20 ); ?>
        </div>

        <div class="post-footer mt-auto">
            <a href="<?php echo esc_url( get_permalink() ); ?>" class="cc-button cc-btn btn-secondary" style="padding: 12px 32px; font-size: 0.8rem;"><?php esc_html_e( 'Read Article', 'closeclient' ); ?></a>
        </div>
    </div>
</article>

<style>
.blog-card:hover .post-thumbnail img { transform: scale(1.05); }
</style>
