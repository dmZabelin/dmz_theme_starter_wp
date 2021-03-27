<?php

/**
 * Enqueue Theme Styles
 */
function dm_enqueue_styles() {
	
//Load general css
	wp_enqueue_style( 'dm-main-css', DM_URL_ASSETS . '/dist/main.min.css', array(), DM_THEME_VERSION, 'all');

}
add_action('wp_enqueue_scripts', 'dm_enqueue_styles');

/**
* Enqueue Theme Scripts
*/
function dm_enqueue_scripts() {

	//Custom JS Code
	wp_enqueue_script( 'dm-main-scripts', DM_URL_ASSETS . '/dist/main.min.js', array( 'jquery' ), DM_THEME_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'dm_enqueue_scripts' );
