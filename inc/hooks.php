<?php
/**
 * Custom hooks for CloseClient theme
 *
 * @package CloseClient
 */

function closeclient_before_header() {
    do_action( 'closeclient_before_header' );
}

function closeclient_after_header() {
    do_action( 'closeclient_after_header' );
}

function closeclient_before_footer() {
    do_action( 'closeclient_before_footer' );
}

function closeclient_after_footer() {
    do_action( 'closeclient_after_footer' );
}

function closeclient_before_content() {
    do_action( 'closeclient_before_content' );
}

function closeclient_after_content() {
    do_action( 'closeclient_after_content' );
}
