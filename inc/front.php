<?php

/************************************************
 * *ПОДКЛЮЧЕНИЕ СКРИПТОВ И СТИЛЕЙ ДЛЯ АДМИН ПАНЕЛИ
 *************************************************/

function dm_add_scripts($hook) {

	// Скрипты для подключения галлереи в Админпанель
	if ($hook == 'page-new.php' || $hook == 'page.php' ) {
		 wp_enqueue_script('dm-gallery-meta-scripts', DM_URL_ASSETS . '/dist/libs/metabox-gallery.js', array('jquery', 'jquery-ui-sortable'));
	}

}
add_action( 'admin_enqueue_scripts', 'dm_add_scripts', 10 );

/******************************************
 * *ПОДКЛЮЧЕНИЕ СКРИПТОВ И СТИЛЕЙ ДЛЯ ТЕМЫ
 *******************************************/

 //---CSS---//
function dm_enqueue_styles() {
	
	// Основные стили темы
	wp_enqueue_style( 'dm-main-css', DM_URL_ASSETS . '/dist/main.min.css', array(), DM_THEME_VERSION, 'all');

}
add_action('wp_enqueue_scripts', 'dm_enqueue_styles');

//---JS---//
function dm_enqueue_scripts() {

	//Кастомные скрипты темы
	wp_enqueue_script( 'dm-main-scripts', DM_URL_ASSETS . '/dist/main.min.js', array( 'jquery' ), DM_THEME_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'dm_enqueue_scripts');

