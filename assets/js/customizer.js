/**
 * Customizer Live Preview
 */

( function( $ ) {

	// Brand Colors
	wp.customize( 'closeclient_primary_color', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--c-primary', newval );
		} );
	} );

    wp.customize( 'closeclient_accent_color', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--c-accent', newval );
            document.documentElement.style.setProperty( '--button-bg', newval );
		} );
	} );

	// Typography
	wp.customize( 'closeclient_body_size', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--base-font-size', newval + 'px' );
		} );
	} );

    // Container Width
    wp.customize( 'closeclient_container_width', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--container-width', newval + 'px' );
		} );
	} );

    // Content Width
    wp.customize( 'closeclient_content_width', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--content-width', newval + 'px' );
		} );
	} );

} )( jQuery );
