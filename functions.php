<?php

/**
 * Enqueue parent then child stylesheets
 */
function childtheme_enqueue_styles() {

	$parent_style = 'twentytwenty-style'; // $handle used in the parent theme when it registers its stylesheet

	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'twentytwentychild-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( $parent_style ),
		wp_get_theme()->get('Version')
	);

}
add_action( 'wp_enqueue_scripts', 'childtheme_enqueue_styles' );

/**
 * Set up child theme's textdomain.
 * Translations can be added to the /languages/ directory.
 */
function childtheme_setup() {
	load_child_theme_textdomain( 'twentytwentychild', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'childtheme_setup' );