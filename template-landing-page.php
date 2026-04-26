<?php
/**
 * Template Name: Landing Page (No Header/Footer)
 *
 * @package CloseClient
 */

wp_head();
?>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<main id="primary" class="site-main landing-page">
    <?php
    while ( have_posts() ) :
        the_post();
        the_content();
    endwhile;
    ?>
</main>

<?php wp_footer(); ?>
</body>
</html>
