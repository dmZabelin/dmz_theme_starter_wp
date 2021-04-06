<?php

/******************************************
 * *ПОДКЛЮЧЕНИЕ СКРИПТОВ И СТИЛЕЙ ДЛЯ ТЕМЫ
 *******************************************/

 //---CSS---//
	function dmz_enqueue_styles() {
		
		// Основные стили темы
			wp_enqueue_style( 'dmz-main-css', DMZ_URL_ASSETS . '/dist/main.min.css', array(), DMZ_THEME_VERSION, 'all');

	}
	add_action('wp_enqueue_scripts', 'dmz_enqueue_styles');

//---JS---//
	function dmz_enqueue_scripts() {

		//Кастомные скрипты темы
			wp_enqueue_script( 'dmz-main-scripts', DMZ_URL_ASSETS . '/dist/main.min.js', array( 'jquery' ), DMZ_THEME_VERSION, true );
	}
	add_action( 'wp_enqueue_scripts', 'dmz_enqueue_scripts');

