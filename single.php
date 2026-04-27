<?php
/**
 * The template for displaying all single posts
 *
 * @package CloseClient
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    while ( have_posts() ) :
        the_post();

        get_template_part( 'template-parts/content/content-single' );

        echo '<div class="container container-narrow reveal mb-5">';
        the_post_navigation(
            array(
                'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous Article', 'closeclient' ) . '</span> <span class="nav-title" style="display:block; font-weight:700;">%title</span>',
                'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next Article', 'closeclient' ) . '</span> <span class="nav-title" style="display:block; font-weight:700;">%title</span>',
            )
        );
        echo '</div>';

        if ( comments_open() || get_comments_number() ) :
            echo '<div class="container container-narrow mb-5">';
            comments_template();
            echo '</div>';
        endif;

    endwhile;
    ?>

    <?php get_template_part( 'template-parts/sections/section-newsletter' ); ?>
</main>

<?php
get_footer();
