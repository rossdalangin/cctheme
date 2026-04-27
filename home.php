<?php
/**
 * The template for displaying the blog index page
 *
 * @package CloseClient
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container section">
        <header class="page-header text-center reveal" style="margin-bottom: 80px;">
            <span class="section-tag"><?php echo esc_html( get_theme_mod( 'closeclient_blog_title', 'Insights & Authority' ) ); ?></span>
            <h1 class="page-title h2"><?php echo esc_html( get_theme_mod( 'closeclient_blog_description', 'Expert strategies to scale your coaching business.' ) ); ?></h1>

            <div class="search-form-wrapper d-flex justify-content-center mt-5">
                <?php get_search_form(); ?>
            </div>
        </header>

        <?php if ( have_posts() ) : ?>
            <div class="blog-posts-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 40px;">
                <?php
                while ( have_posts() ) :
                    the_post();
                    get_template_part( 'template-parts/content/content-archive' );
                endwhile;
                ?>
            </div>

            <div class="pagination mt-5 text-center reveal">
                <?php the_posts_pagination( array(
                    'mid_size'  => 2,
                    'prev_text' => __( '← Newer', 'closeclient' ),
                    'next_text' => __( 'Older →', 'closeclient' ),
                ) ); ?>
            </div>
        <?php endif; ?>
    </div>

    <?php get_template_part( 'template-parts/sections/section-newsletter' ); ?>
</main>

<?php
get_footer();
