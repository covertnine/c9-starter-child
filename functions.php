<?php
/**
 * Child theme functions
 *
 * Functions file for child theme, enqueues parent and child stylesheets by default.
 *
 * @since   1.0.0
 * @package c9child
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! function_exists( 'c9child_enqueue_styles' ) ) {
	// Add enqueue function to the desired action.
	add_action( 'wp_enqueue_scripts', 'c9child_enqueue_styles' );
	/**
	 * Enqueue Styles.
	 *
	 * Enqueue parent style and child styles where parent are the dependency
	 * for child styles so that parent styles always get enqueued first.
	 *
	 * @since 1.0.0
	 */
	function c9child_enqueue_styles() {
		// Parent style variable.
		$parent_style = 'c9-styles';
		// Enqueue Parent theme's stylesheet.
		wp_enqueue_style( $parent_style, get_template_directory_uri() . '/assets/dist/css/theme.min.css' );
		// Enqueue Child theme's stylesheet.
		// Setting 'parent-style' as a dependency will ensure that the child theme stylesheet loads after it.
		wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ) );
	}
}

if ( ! function_exists( 'c9child_enqueue_scripts' ) ) {
	add_action( 'wp_enqueue_scripts', 'c9child_enqueue_scripts' );

	/**
	 * Enqueue Main.js Script
	 *
	 * @return void
	 */
	function c9child_enqueue_scripts() {
		wp_enqueue_script( 'child-script', get_stylesheet_directory_uri() . '/main.js' );
	}
}
