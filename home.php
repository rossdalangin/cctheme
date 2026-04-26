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
        <header class="page-header text-center section">
            <h1 class="page-title"><?php echo esc_html( get_theme_mod( 'closeclient_blog_title', 'Insights & Authority' ) ); ?></h1>
            <p class="section-subheadline"><?php echo esc_html( get_theme_mod( 'closeclient_blog_description', 'Expert strategies to scale your coaching business.' ) ); ?></p>
        </header>

        <?php
        // Featured Post Section
        $featured_query = new WP_Query( array(
            'posts_per_page' => 1,
            'meta_key'       => '_is_featured',
            'meta_value'     => 'yes',
        ) );

        if ( ! $featured_query->have_posts() ) {
            $featured_query = new WP_Query( array( 'posts_per_page' => 1 ) );
        }

        if ( $featured_query->have_posts() ) :
            while ( $featured_query->the_post() ) : ?>
                <div class="featured-post-hero">
                    <div class="featured-post-grid">
                        <div class="featured-post-image">
                            <?php if ( has_post_thumbnail() ) the_post_thumbnail( 'large' ); ?>
                        </div>
                        <div class="featured-post-content">
                            <span class="section-tag"><?php esc_html_e( 'FEATURED ARTICLE', 'closeclient' ); ?></span>
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <div class="entry-excerpt"><?php the_excerpt(); ?></div>
                            <a href="<?php the_permalink(); ?>" class="button button-secondary"><?php esc_html_e( 'Read the Full Article', 'closeclient' ); ?></a>
                        </div>
                    </div>
                </div>
            <?php endwhile; wp_reset_postdata();
        endif; ?>

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
                <?php get_sidebar(); ?>
            <?php endif; ?>
        </div>

        <?php get_template_part( 'template-parts/sections/section', 'newsletter' ); ?>
    </div>
</main>

<?php
get_footer();
