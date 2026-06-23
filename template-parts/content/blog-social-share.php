<?php
/**
 * Template part for social sharing links in blog posts
 *
 * @package CloseClient
 */

$post_url   = urlencode( get_permalink() );
$post_title = urlencode( get_the_title() );
?>

<div class="social-share-links d-flex gap-3 align-items-center mt-5 pt-5 border-top border-secondary">
    <span class="small text-muted fw-bold"><?php echo esc_html( get_theme_mod( 'closeclient_label_share', 'SHARE INSIGHTS:' ) ); ?></span>

    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $post_url; ?>&title=<?php echo $post_title; ?>"
       class="social-share-icon" target="_blank" rel="noopener" title="Share on LinkedIn">
       <?php echo closeclient_get_svg('linkedin'); ?>
    </a>

    <a href="https://twitter.com/intent/tweet?text=<?php echo $post_title; ?>&url=<?php echo $post_url; ?>"
       class="social-share-icon" target="_blank" rel="noopener" title="Share on Twitter">
       <?php echo closeclient_get_svg('twitter'); ?>
    </a>

    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $post_url; ?>"
       class="social-share-icon" target="_blank" rel="noopener" title="Share on Facebook">
       <?php echo closeclient_get_svg('facebook'); ?>
    </a>
</div>

