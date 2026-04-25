	<header id="masthead" class="site-header" itemscope itemtype="https://schema.org/WPHeader">
		<div class="container header-container">
			<div class="site-branding">
				<?php
				if ( has_custom_logo() ) :
					the_custom_logo();
				else :
					if ( is_front_page() && is_home() ) :
						?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
					else :
						?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
					endif;
				endif;
				?>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
					<span class="menu-text"><?php esc_html_e( 'Menu', 'closeclient' ); ?></span>
				</button>

				<div class="nav-menu-wrapper">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'container'      => false,
							'menu_class'     => 'primary-menu-list',
						)
					);
					?>
					<div class="header-cta mobile-cta">
						<a href="<?php echo esc_url( get_theme_mod( 'closeclient_header_cta_link', '#' ) ); ?>" class="button button-accent"><?php echo esc_html( get_theme_mod( 'closeclient_header_cta_text', 'Book a Call' ) ); ?></a>
					</div>
				</div>
			</nav><!-- #site-navigation -->

			<div class="header-cta desktop-cta">
				<a href="<?php echo esc_url( get_theme_mod( 'closeclient_header_cta_link', '#' ) ); ?>" class="button button-accent"><?php echo esc_html( get_theme_mod( 'closeclient_header_cta_text', 'Book a Call' ) ); ?></a>
			</div>
		</div>
	</header><!-- #masthead -->
