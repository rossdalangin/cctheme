/**
 * Customizer Live Preview (postMessage)
 */

( function( $ ) {

	// Brand Colors
	wp.customize( 'closeclient_primary_color', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--c-primary', newval );
		} );
	} );

    wp.customize( 'closeclient_secondary_color', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--c-secondary', newval );
		} );
	} );

    wp.customize( 'closeclient_accent_color', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--c-accent', newval );
            // Update button hover logic if needed or other dependents
		} );
	} );

    wp.customize( 'closeclient_bg_color', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--c-bg', newval );
		} );
	} );

    wp.customize( 'closeclient_text_color', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--c-text', newval );
		} );
	} );

    wp.customize( 'closeclient_button_hover', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--c-accent-hover', newval );
		} );
	} );

	// Typography
	wp.customize( 'closeclient_body_size', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--body-size', newval + 'px' );
		} );
	} );

    wp.customize( 'closeclient_h1_size', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--h1-size', newval + 'rem' );
		} );
	} );

    wp.customize( 'closeclient_letter_spacing', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--letter-spacing', newval + 'em' );
		} );
	} );

    wp.customize( 'closeclient_line_height', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--line-height', newval );
		} );
	} );

    // Layout
    wp.customize( 'closeclient_container_width', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--container-width', newval + 'px' );
		} );
	} );

    wp.customize( 'closeclient_content_width', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--content-width', newval + 'px' );
		} );
	} );

} )( jQuery );
