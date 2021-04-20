<?php

// *Максимально допустимая ширина для любого контента в теме
	function dmz_theme_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'dmz_theme_content_width', 640 );
	}
	add_action( 'after_setup_theme', 'dmz_theme_content_width', 0 );

// *Базовые установки
	if ( ! function_exists( 'dmz_theme_setup' ) ) :

		function dmz_theme_setup() {

		//Загружает файл перевода темы (.mo) в память, для дальнейшей работы с ним.
			load_theme_textdomain( 'dmz_theme', get_template_directory() . '/languages' );

		//Подключаем метатег <title>
			add_theme_support( 'title-tag' );

		//Включение поддержки миниатюр сообщений
			add_theme_support( 'post-thumbnails' );

		//Регистрируется сразу несколько расположений меню, к которым затем прикрепляются меню.
			register_nav_menus([
				'header_menu'	=> esc_html__('Header Menu', 'dmz_theme'),
				'mobile_menu'	=> esc_html__('Mobile Menu', 'dmz_theme'),
			]);
		}

	endif;
	add_action( 'after_setup_theme', 'dmz_theme_setup' );