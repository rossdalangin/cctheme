<?php
/**
 * The template for displaying the blog home page
 *
 * @package CloseClient
 */

get_header();

$layout = closeclient_get_layout();
?>

<main id="primary" class="site-main">
    <div class="container">
        <header class="page-header section text-center reveal">
            <span class="section-tag"><?php esc_html_e( 'THE FEED', 'closeclient' ); ?></span>
            <h1 class="page-title"><span class="gradient-text"><?php echo esc_html( get_theme_mod( 'closeclient_blog_title', 'Insights & Authority' ) ); ?></span></h1>
            <p class="section-subheadline" style="max-width: 700px; margin: 0 auto; color: var(--c-text-muted);"><?php echo esc_html( get_theme_mod( 'closeclient_blog_description', 'Expert strategies to scale your coaching business.' ) ); ?></p>
        </header>

        <div class="blog-layout">
            <div class="blog-posts">
                <?php
                if ( have_posts() ) :
                    while ( have_posts() ) :
                        the_post();
                        get_template_part( 'template-parts/content/content', 'archive' );
                    endwhile;

                    the_posts_navigation();
                else :
                    get_template_part( 'template-parts/content/content', 'none' );
                endif;
                ?>
            </div>

            <?php if ( 'full-width' !== $layout ) : ?>
                <aside id="secondary" class="sidebar">
                    <?php get_sidebar(); ?>
                </aside>
            <?php endif; ?>
        </div>

        <?php get_template_part( 'template-parts/sections/section-newsletter' ); ?>
    </div>
</main>

<?php
get_footer();
