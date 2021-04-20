<?php

/******************************************
 * *ПОДКЛЮЧЕНИЕ СКРИПТОВ И СТИЛЕЙ ДЛЯ ТЕМЫ
 *******************************************/

 //---CSS---//
	function dmz_enqueue_styles() {
		
	//Регистрируем стили	
		wp_register_style( 'dmz-main', DMZ_URL_ASSETS . '/dist/main.min.css', array(), DMZ_THEME_VERSION, 'all');
		wp_register_style( 'dmz-theme-style', get_stylesheet_uri() );
	
	//Подключаем стили
		wp_enqueue_style('dmz-main');
		wp_enqueue_style('dmz-theme-style');
	}
	add_action('wp_enqueue_scripts', 'dmz_enqueue_styles');

//---JS---//
	function dmz_enqueue_scripts() {

	//Регистрируем скрипты
		wp_register_script( 'dmz-main-scripts', DMZ_URL_ASSETS . '/dist/main.min.js', array( 'jquery' ), DMZ_THEME_VERSION, true );
		
	//Подключаем скрипты	
		wp_enqueue_script( 'dmz-main-scripts');
	}
	add_action( 'wp_enqueue_scripts', 'dmz_enqueue_scripts');

