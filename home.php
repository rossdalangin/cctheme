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
        <header class="page-header">
            <h1 class="page-title"><?php esc_html_e( 'Insights & Authority', 'closeclient' ); ?></h1>
            <p class="page-description"><?php esc_html_e( 'Expert strategies to scale your coaching business.', 'closeclient' ); ?></p>
        </header>

        <div class="blog-grid">
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
    </div>
</main>

<?php
get_footer();
