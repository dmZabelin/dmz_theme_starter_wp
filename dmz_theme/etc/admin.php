<?php

/************************************************
 * *ПОДКЛЮЧЕНИЕ СКРИПТОВ И СТИЛЕЙ ДЛЯ АДМИН ПАНЕЛИ
 *************************************************/

function dmz_admin_styles($hook) {

	// Подключение кастомных стилей админ панели
		wp_enqueue_style( 'dmz-admin-css', DMZ_THEME_URL . '/src/css/admin.css' );
		wp_enqueue_style( 'dmz-fontawesome-admin-css', DMZ_THEME_URL . '/src/css/all.min.css' );
}
add_action( 'admin_enqueue_scripts', 'dmz_admin_styles', 10 );