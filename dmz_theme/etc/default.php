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


// *Инициализация TGM плагина
	function dmz_register_required_plugins() {

		$plugins = array(
			array(
					'name'      => 'SVG Support',
					'slug'      => 'svg-support',
					'required'  => false,
			),
			array(
					'name'      => 'Classic Editor',
					'slug'      => 'classic-editor',
					'required'  => true,
			),
			array(
					'name'      => 'Redux Framework',
					'slug'      => 'redux-framework',
					'required'  => true,
			),		  
			array(
				'name'      => 'Advanced Custom Fields',
				'slug'      => 'advanced-custom-fields',
				'required'  => true,
			),		  		  
			array(
				'name'      => 'Advanced Editor Tools (ранее TinyMCE Advanced)',
				'slug'      => 'tinymce-advanced',
				'required'  => true,
			),
			array(
				'name'      => 'Regenerate Thumbnails',
				'slug'      => 'regenerate-thumbnails',
				'required'  => false,
		),
			array(
					'name'                  => 'CPT dmzTheme',
					'slug'                  => 'dmz_theme_cpt',
					'source'                => get_template_directory() . '/plugins/dmz_theme_cpt.zip',
					'required'              => true,
					'version'               => '',
					'force_activation'      => false,
					'force_deactivation'    => false,
					'external_url'          => '',
			),
		);

		$theme_text_domain = 'dmz_theme';

		$config = array(
			'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => '',                      // Default absolute path to bundled plugins.
			'menu'         => 'tgmpa-install-plugins', // Menu slug.
			'parent_slug'  => 'themes.php',            // Parent menu slug.
			'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
			'has_notices'  => true,                    // Show admin notices or not.
			'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => false,                   // Automatically activate plugins after installation or not.
			'message'      => '',                      // Message to output right before the plugins table.
		);

		tgmpa( $plugins, $config );
	}
	add_action( 'tgmpa_register', 'dmz_register_required_plugins' );

// *Функция для вывода мета-данных из Redux Framework
	function dmz_get_option($name, $default = false) {
		global $dmz_theme;
		$name = 'dmz-' . $name;
		return $dmz_theme[$name];
	}

// *Функция получает мета-данные галлереи
	function dmz_get_meta($key, $single = true, $post_id = null) {

		$post_id = get_the_ID();
		$key = 'dmz_' . $key;
		
		return get_post_meta($post_id, $key, $single);

	}

// *Функция ограничения вывода текста в карточке поста
	function dmz_limit_excerpt($limit) {
		$excerpt = explode(' ', get_the_excerpt(), $limit);
		if (count($excerpt)>=$limit) {
			array_pop($excerpt);
			$excerpt = implode(" ", $excerpt).'... ';
		} else {
			$excerpt = implode(" ", $excerpt).' ';
		}
		$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
		return $excerpt;
	}

// *Функция регистрации кастомных размеров картинок
	function dmz_init_theme_support() {
		if (function_exists('dmz_get_images_sizes')) {
			foreach (dmz_get_images_sizes() as $post_type => $sizes) {
				foreach ($sizes as $config) {
						dmz_add_image_size($post_type, $config);
				}
			}
		}
	}
	add_action('init', 'dmz_init_theme_support');

// *Обертка для создания кастомных размеров картинок
	function dmz_add_image_size($post_type, $config) {
	add_image_size($config['name'], $config['width'], $config['height'], $config['crop']);  
	}

// *Чистим номер телефона
	function dmz_phone_clear($dmz_Phone){
		$dmz_Phone = str_replace(array('(', ')', ' ', '-', '<b>', '</b>'), '', $dmz_Phone);
		return($dmz_Phone);
	}
