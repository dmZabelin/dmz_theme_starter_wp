<?php
/**
 * dmz_theme Настройщик тем
 *
 * @package dmz_theme
 */

function dmz_customize_register( $wp_customize ) {

}
add_action( 'customize_register', 'dmz_customize_register' );




/**
 * Скрипт JS для асинхронной перезагрузки изменений предварительного просмотра настройщика тем.
 */
function dmz_customize_preview_js() {
	wp_enqueue_script( 'dmz-customizer', get_template_directory_uri() . '/assets/dist/customizer.js', [ 'customize-preview' ], DMZ_THEME_VERSION, true );
}
add_action( 'customize_preview_init', 'dmz_customize_preview_js' );