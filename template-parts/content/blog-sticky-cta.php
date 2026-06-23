<?php
/**
 * Template part for a sticky CTA in blog posts
 *
 * @package CloseClient
 */
?>

<div class="sticky-blog-cta cc-card glass p-4 border-accent">
	<div class="sticky-cta-content">
        <span class="section-tag small mb-3"><?php echo esc_html__( 'FREE RESOURCE', 'closeclient' ); ?></span>
		<h4 class="h5 mt-2 text-white"><?php echo esc_html( get_theme_mod( 'closeclient_sticky_cta_title', 'Scale to $100k+ Months' ) ); ?></h4>
		<p class="small text-muted mb-4"><?php echo esc_html( get_theme_mod( 'closeclient_sticky_cta_text', 'Join 5,000+ brand owners getting our weekly growth systems.' ) ); ?></p>
		<a href="<?php echo esc_url( get_theme_mod( 'closeclient_sticky_cta_link', '#' ) ); ?>" class="cc-button w-100"><?php echo esc_html( get_theme_mod( 'closeclient_sticky_cta_button', 'Join the Newsletter' ) ); ?></a>
	</div>
</div>
