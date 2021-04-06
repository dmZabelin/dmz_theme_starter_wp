<?php

// *Меняю класс у sub-menu
	add_filter( 'nav_menu_submenu_css_class', 'change_wp_nav_menu', 10, 3 );

	function change_wp_nav_menu( $classes, $args, $depth ) {
		foreach ( $classes as $key => $class ) {
			if ( $class == 'sub-menu' ) {
				$classes[ $key ] = 'submenu-list';
			}
		}

		return $classes;
	}

// *Кастомные размеры картинок
	function dmz_get_images_sizes() {
		return array(
			'page' => array(
				array(
						'name'      => 'big_news',
						'width'     => 570,
						'height'    => 350,
						'crop'      => true,
				),
				array(
					'name'      => 'min_news',
					'width'     => 240,
					'height'    => 160,
					'crop'      => true,
			),
			),
		);
	}