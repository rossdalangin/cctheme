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
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'closeclient' ); ?></a>

	<header id="masthead" class="site-header" itemscope itemtype="https://schema.org/WPHeader">
		<div class="container header-container">
			<div class="site-branding">
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;
				?>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'closeclient' ); ?></button>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'container'      => false,
					)
				);
				?>
                <div class="header-cta">
                    <a href="<?php echo esc_url( get_theme_mod( 'closeclient_header_cta_link', '#' ) ); ?>" class="button button-accent"><?php echo esc_html( get_theme_mod( 'closeclient_header_cta_text', 'Book a Call' ) ); ?></a>
                </div>
			</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->
	<?php closeclient_breadcrumbs(); ?>
