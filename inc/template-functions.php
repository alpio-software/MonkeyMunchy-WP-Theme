<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Monkey_Munchy
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function mm_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	if ( isset( $_COOKIE['mm-night-mode'] ) && '1' === $_COOKIE['mm-night-mode'] ) {
		$classes[] = 'mm-night-mode';
	}

	return $classes;
}
add_filter( 'body_class', 'mm_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function mm_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'mm_pingback_header' );

/**
 * Allow different files for upload.
 *
 * @param array $mimes Default file mime types.
 *
 * @return mixed
 */
function mm_mime_types( $mimes ) {
	$mimes['json'] = 'application/json';
	$mimes['svg']  = 'image/svg+xml';

	return $mimes;
}

add_filter( 'upload_mimes', 'mm_mime_types' );

/**
 * Get theme options.
 *
 * @param string $key Option key (database name).
 * @param string $default Default option.
 *
 * @return mixed|string
 */
function mm_opt( $key = '', $default = '' ) {
	$opt = get_option( 'mm' );

	return isset( $opt[ $key ] ) ? $opt[ $key ] : $default;
}

/**
 * Check is page built with Elementor.
 *
 * @param int $post_id Post ID.
 * @return bool
 */
function mm_is_elementor( $post_id = null ) {
	if ( ! defined( 'ELEMENTOR_VERSION' ) ) {
		return;
	}

	if ( empty( $post_id ) ) {
		global $post;
		$post_id = isset( $post->ID ) ? $post->ID : null;
	}

	return ! ! get_post_meta( $post_id, '_elementor_edit_mode', true );
}

/**
 * Add custom codes between <head> tags.
 */
function mm_custom_head_codes() {
	// Android browser color.
	echo '<meta name="theme-color" content="#1E2868" />';
}

add_action( 'wp_head', 'mm_custom_head_codes' );
