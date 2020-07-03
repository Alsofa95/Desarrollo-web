<?php
/**
 * ForjaArroyo funciones y definiciones
 *
 * @package ForjaArroyo
 */

/**
 * Version lanzada.
 */
if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'web_wordpress_setup' ) ) :
	
	function web_wordpress_setup() {
		
		load_theme_textdomain( 'web_wordpress', get_template_directory() . '/languages' );

		
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'web_wordpress' ),
		) );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		add_theme_support( 'customize-selective-refresh-widgets' );
		
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'web_wordpress_setup' );

/**
 * Incrusta scripts y styles.
 */
function forja_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri());
	wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/index_navigation.js', true );
	wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/index_slide.js', true );
}
add_action( 'wp_enqueue_scripts', 'forja_scripts' );