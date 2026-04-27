<?php
/**
 * The template for displaying all single posts
 *
 * @package CloseClient
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container section">
        <div class="container-narrow">
            <?php
            while ( have_posts() ) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'reveal' ); ?>>
                    <header class="entry-header text-center mb-5">
                        <div class="entry-meta section-tag mb-3">
                            <?php closeclient_posted_on(); ?>
                        </div>
                        <?php the_title( '<h1 class="entry-title h2">', '</h1>' ); ?>
                    </header>

                    <?php closeclient_post_thumbnail(); ?>

                    <div class="entry-content mt-5">
                        <?php
                        the_content();

                        wp_link_pages(
                            array(
                                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'closeclient' ),
                                'after'  => '</div>',
                            )
                        );
                        ?>
                    </div>

                    <footer class="entry-footer mt-5 pt-5 border-top border-secondary">
                        <?php closeclient_entry_footer(); ?>
                    </footer>
                </article>

                <?php
                // Author box for authority building
                get_template_part( 'template-parts/content/content-single' );

                the_post_navigation(
                    array(
                        'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'closeclient' ) . '</span> <span class="nav-title">%title</span>',
                        'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'closeclient' ) . '</span> <span class="nav-title">%title</span>',
                    )
                );

                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;

            endwhile;
            ?>
        </div>
    </div>

    <?php get_template_part( 'template-parts/sections/section-newsletter' ); ?>
</main>

<?php
get_footer();
