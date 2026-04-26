<?php
/**
 * The template for displaying the blog home page
 *
 * @package CloseClient
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container">
        <header class="page-header text-center section reveal">
            <span class="section-tag"><?php esc_html_e( 'THE FEED', 'closeclient' ); ?></span>
            <h1 class="page-title"><?php echo esc_html( get_theme_mod( 'closeclient_blog_title', 'Insights & Authority' ) ); ?></h1>
            <p class="section-subheadline"><?php echo esc_html( get_theme_mod( 'closeclient_blog_description', 'Expert strategies to scale your coaching business.' ) ); ?></p>
        </header>

        <div class="blog-layout-wrapper section">
            <div class="blog-posts-grid">
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

            <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
                <aside id="secondary" class="widget-area">
                    <?php get_sidebar(); ?>
                </aside>
            <?php endif; ?>
        </div>

        <?php get_template_part( 'template-parts/sections/section-newsletter' ); ?>
    </div>
</main>

<?php
get_footer();
