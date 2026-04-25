<?php
/**
 * Template Name: Lead Magnet Template
 *
 * @package CloseClient
 */

get_header();
?>

<main id="primary" class="site-main lead-magnet-page">
    <div class="container narrow-container">
        <header class="page-header text-center">
            <h1 class="page-title"><?php the_title(); ?></h1>
            <p class="lead"><?php esc_html_e( 'Download the exact blueprint I use to help coaches hit $10k months.', 'closeclient' ); ?></p>
        </header>

        <div class="lead-magnet-content grid">
            <div class="lead-magnet-image">
                <?php the_post_thumbnail( 'large' ); ?>
            </div>
            <div class="lead-magnet-form">
                <?php
                while ( have_posts() ) :
                    the_post();
                    the_content();
                endwhile;
                ?>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
