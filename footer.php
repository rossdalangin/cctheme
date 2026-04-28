<?php
/**
 * The template for displaying the footer
 *
 * @package CloseClient
 */

?>

    <?php if ( ! is_page_template( 'template-canvas.php' ) ) : ?>
	<footer id="colophon" class="site-footer" itemscope itemtype="https://schema.org/WPFooter">
		<div class="container">
            <div class="footer-grid">
                <!-- Column 1: Branding & About -->
                <div class="footer-column footer-branding">
                    <div class="footer-logo mb-4">
                        <?php
                        if ( has_custom_logo() ) {
                            the_custom_logo();
                        } else {
                            echo '<a href="' . esc_url( home_url( '/' ) ) . '" class="h4 text-white text-decoration-none">' . get_bloginfo( 'name' ) . '</a>';
                        }
                        ?>
                    </div>
                    <p class="footer-about text-muted small mb-4">
                        <?php echo esc_html( get_theme_mod( 'closeclient_footer_about', 'Engineering the future of digital authority for elite coaches and consultants.' ) ); ?>
                    </p>
                    <div class="footer-social-links d-flex gap-3">
                        <?php
                        $socials = array( 'twitter', 'facebook', 'linkedin', 'instagram', 'youtube' );
                        foreach ( $socials as $social ) :
                            $link = get_theme_mod( "closeclient_social_{$social}", '#' );
                            if ( $link && '#' !== $link ) : ?>
                                <a href="<?php echo esc_url( $link ); ?>" class="social-icon" target="_blank" rel="noopener" title="<?php echo esc_attr( ucfirst( $social ) ); ?>">
                                    <span class="screen-reader-text"><?php echo esc_html( ucfirst( $social ) ); ?></span>
                                    <?php echo closeclient_get_svg( $social ); ?>
                                </a>
                            <?php endif;
                        endforeach; ?>
                    </div>
                </div>

                <!-- Column 2: Solutions -->
                <div class="footer-column">
                    <h3 class="footer-title h6 mb-4"><?php echo esc_html( get_theme_mod( 'closeclient_footer_col2_title', 'Solutions' ) ); ?></h3>
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footer-1',
                            'menu_id'        => 'footer-menu-1',
                            'container'      => false,
                            'fallback_cb'    => 'closeclient_footer_1_fallback',
                            'menu_class'     => 'list-unstyled small text-muted',
                        )
                    );
                    ?>
                </div>

                <!-- Column 3: Resources -->
                <div class="footer-column">
                    <h3 class="footer-title h6 mb-4"><?php echo esc_html( get_theme_mod( 'closeclient_footer_col3_title', 'Resources' ) ); ?></h3>
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footer-2',
                            'menu_id'        => 'footer-menu-2',
                            'container'      => false,
                            'fallback_cb'    => 'closeclient_footer_2_fallback',
                            'menu_class'     => 'list-unstyled small text-muted',
                        )
                    );
                    ?>
                </div>

                <!-- Column 4: Connect/CTA -->
                <div class="footer-column">
                    <h3 class="footer-title h6 mb-4"><?php echo esc_html( get_theme_mod( 'closeclient_footer_col4_title', 'Connect' ) ); ?></h3>
                    <p class="small text-muted mb-4"><?php esc_html_e( 'Ready to engineer your authority?', 'closeclient' ); ?></p>
                    <a href="<?php echo esc_url( get_theme_mod( 'closeclient_header_cta_link', '#' ) ); ?>" class="cc-button" style="padding: 12px 24px; font-size: 0.7rem;">
                        <?php echo esc_html( get_theme_mod( 'closeclient_header_cta_text', 'Book a Call' ) ); ?>
                    </a>
                </div>
            </div>

            <div class="footer-bottom mt-5 pt-5 border-top border-secondary">
                <div class="footer-disclaimer mb-4">
                    <p class="small text-muted mb-0"><?php echo esc_html( get_theme_mod( 'closeclient_footer_disclaimer', 'Consulting services are subject to terms and conditions. Results may vary.' ) ); ?></p>
                </div>

                <div class="site-info d-flex justify-content-between align-items-center flex-wrap gap-3">
                    <p class="copyright small text-muted mb-0"><?php echo esc_html( get_theme_mod( 'closeclient_footer_copyright', '© ' . date('Y') . ' CloseClient. All rights reserved.' ) ); ?></p>
                    <div class="footer-meta-links small text-muted">
                         <a href="<?php echo esc_url( home_url( '/privacy-policy' ) ); ?>" class="text-muted text-decoration-none me-3"><?php esc_html_e( 'Privacy Policy', 'closeclient' ); ?></a>
                         <a href="<?php echo esc_url( home_url( '/terms-of-service' ) ); ?>" class="text-muted text-decoration-none"><?php esc_html_e( 'Terms of Service', 'closeclient' ); ?></a>
                    </div>

                    <a href="#page" class="back-to-top small text-accent text-decoration-none fw-bold" style="cursor:pointer;">
                        <?php esc_html_e( 'BACK TO TOP ↑', 'closeclient' ); ?>
                    </a>
                </div>
            </div>
		</div>
	</footer><!-- #colophon -->
    <?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
