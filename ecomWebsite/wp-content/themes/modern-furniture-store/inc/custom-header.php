<?php
/**
 * Custom header implementation
 *
 * @link https://codex.wordpress.org/Custom_Headers
 *
 * @package Modern Furniture Store
 * @subpackage modern_furniture_store
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses modern_furniture_store_header_style()
 */
function modern_furniture_store_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'modern_furniture_store_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 400,
		'wp-head-callback'       => 'modern_furniture_store_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'modern_furniture_store_custom_header_setup' );

if ( ! function_exists( 'modern_furniture_store_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see modern_furniture_store_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'modern_furniture_store_header_style' );
function modern_furniture_store_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$modern_furniture_store_custom_css = "
        .headerbox{
			background-image:url('".esc_url(get_header_image())."') !important;
			background-position: center top;
		}";
	   	wp_add_inline_style( 'modern-furniture-store-style', $modern_furniture_store_custom_css );
	endif;
}
endif;
