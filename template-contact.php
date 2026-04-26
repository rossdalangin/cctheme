<?php
/**
 * Template Name: Contact Template
 *
 * @package CloseClient
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container">
        <header class="page-header text-center">
            <h1 class="page-title"><?php the_title(); ?></h1>
        </header>

        <div class="contact-grid">
            <div class="contact-info">
                <h2><?php echo esc_html( get_theme_mod( 'closeclient_contact_headline_tpl', 'Let\'s talk about your growth.' ) ); ?></h2>
                <p><?php echo esc_html( get_theme_mod( 'closeclient_contact_subheadline_tpl', 'Ready to scale your coaching business? Fill out the form or book a call directly.' ) ); ?></p>
            </div>
            <div class="contact-form-area">
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
