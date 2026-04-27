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
            <div class="blog-featured-post mb-5 reveal">
                <?php
                $i = 0;
                while ( have_posts() ) :
                    the_post();
                    $i++;
                    if ( 1 === $i ) : ?>
                        <article class="featured-article glass p-5 d-flex gap-5 align-items-center">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="featured-image" style="flex: 1; aspect-ratio: 16/10; border-radius: var(--radius-lg); overflow: hidden;">
                                    <?php the_post_thumbnail( 'large', array( 'style' => 'width:100%; height:100%; object-fit:cover;' ) ); ?>
                                </div>
                            <?php endif; ?>
                            <div class="featured-content" style="flex: 1.2;">
                                <span class="section-tag"><?php esc_html_e( 'FEATURED INSIGHT', 'closeclient' ); ?></span>
                                <h2 class="h3 mb-3"><?php the_title(); ?></h2>
                                <p class="text-muted mb-4"><?php echo wp_trim_words( get_the_excerpt(), 35 ); ?></p>
                                <a href="<?php the_permalink(); ?>" class="cc-button"><?php esc_html_e( 'Read Deep Dive →', 'closeclient' ); ?></a>
                            </div>
                        </article>
                        <?php break; ?>
                    <?php endif;
                endwhile; ?>
            </div>

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
