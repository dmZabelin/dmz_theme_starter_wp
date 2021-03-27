<?php

if ( ! function_exists( 'dm_starter_theme_setup' ) ) :

	function dm_starter_theme_setup() {


	//Загружает файл перевода темы (.mo) в память, для дальнейшей работы с ним.
		load_theme_textdomain( 'dm_starter_theme', get_template_directory() . '/languages' );

	//Подключаем метатег <title>
		add_theme_support( 'title-tag' );

	//Включение поддержки миниатюр сообщений
		add_theme_support( 'post-thumbnails' );

	//Регистрируется сразу несколько расположений меню, к которым затем прикрепляются меню.
		register_nav_menus([
			'headerMenu'	=> esc_html__('Header Menu', 'dm_theme_start'),
			'mobileMenu'	=> esc_html__('Mobile Menu', 'dm_theme_start'),
		]);
	}

endif;

add_action( 'after_setup_theme', 'dm_starter_theme_setup' );