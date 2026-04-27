<?php
/**
 * Template part for a sticky CTA in blog posts
 *
 * @package CloseClient
 */
?>

<div class="sticky-blog-cta">
	<div class="sticky-cta-content">
		<h4><?php echo esc_html( get_theme_mod( 'closeclient_sticky_cta_title', 'Scale to $10k+ Months' ) ); ?></h4>
		<p><?php echo esc_html( get_theme_mod( 'closeclient_sticky_cta_text', 'Join 5,000+ coaches getting our weekly growth systems.' ) ); ?></p>
		<a href="<?php echo esc_url( get_theme_mod( 'closeclient_sticky_cta_link', '#' ) ); ?>" class="cc-button"><?php echo esc_html( get_theme_mod( 'closeclient_sticky_cta_button', 'Join the Newsletter' ) ); ?></a>
	</div>
</div>
