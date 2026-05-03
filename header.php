<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class( get_theme_mod( 'closeclient_site_layout_type', 'full-width' ) ); ?> itemscope itemtype="https://schema.org/WebPage">
<?php wp_body_open(); ?>

<div class="reading-progress-bar"></div>

<?php if ( get_theme_mod( 'closeclient_show_preloader', true ) ) : ?>
    <div class="cc-preloader">
        <div class="preloader-dot"></div>
    </div>
<?php endif; ?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php echo esc_html( get_theme_mod( 'closeclient_label_skip_link', 'Skip to content' ) ); ?></a>

	<?php
    if ( ! is_page_template( 'template-canvas.php' ) ) {
        get_template_part( 'template-parts/navigation/navigation', 'main' );
    }
    ?>

	<?php
    if ( ! is_page_template( array( 'template-canvas.php', 'template-landing-page.php' ) ) ) {
        closeclient_breadcrumbs();
    }
    ?>
