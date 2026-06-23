<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CloseClient
 */

?>

<?php $reveal_class = get_query_var( 'closeclient_reveal_class', 'reveal' ); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class( "blog-card cc-card $reveal_class" ); ?>>
    <div class="post-thumbnail">
        <?php closeclient_post_thumbnail(); ?>
    </div>

    <div class="post-content">
        <div class="post-meta section-tag mb-3">
            <?php closeclient_posted_on(); ?>
        </div>

        <?php the_title( sprintf( '<h2 class="entry-title h4 mb-3"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

        <div class="post-excerpt text-muted mb-5">
            <?php the_excerpt(); ?>
        </div>

        <div class="mt-auto">
            <a href="<?php echo esc_url( get_permalink() ); ?>" class="cc-button cc-button-secondary read-more-btn"><?php echo esc_html( get_theme_mod( 'closeclient_label_read_more', 'READ FULL ARTICLE →' ) ); ?></a>
        </div>
    </div>
</article>
