<?php

/************************
* *Базовые установки
*************************/
	if ( ! function_exists( 'dmz_theme_setup' ) ) :

		function dmz_theme_setup() 
		{
		//Максимально допустимая ширина для любого контента в теме 
			if ( !isset( $content_width ) ) {
				$content_width = 600;
			}

		//Загружает файл перевода темы (.mo) в память, для дальнейшей работы с ним.
			load_theme_textdomain( 'dmz_hram_site', get_template_directory() . '/languages' );

		//Подключаем метатег <title>
			add_theme_support( 'title-tag' );

		//Включение поддержки миниатюр сообщений
			add_theme_support( 'post-thumbnails' );

		//Регистрируется сразу несколько расположений меню, к которым затем прикрепляются меню.
			register_nav_menus( [
				'header_menu'	=> esc_html__( 'Header Menu', 'dmz_theme' ),
				'mobile_menu'	=> esc_html__( 'Mobile Menu', 'dmz_theme' ),
			] );
		}

	endif;
	add_action( 'after_setup_theme', 'dmz_theme_setup' );

/**************************************************
* *Функция пагинации работает с циклом new WP_Query
***************************************************/
function dmz_paginate_links( $dmz_paginate ) 
{
	$big = 999;

	$args = [
		'base'    => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
		'format'  => '',
		'current' => max( 1, get_query_var( 'paged' ) ),
		'total'   => $dmz_paginate->max_num_pages,
		'prev_next'    => false,
		'mid_size'     => 1,
	];

	$result = paginate_links( $args );

	// удаляем добавку к пагинации для первой страницы
	$result = preg_replace( '~/page/1/?([\'"])~', '\1', $result );

	echo $result;
}