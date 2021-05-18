<?php

// *Инициализация TGM плагина
	function dmz_register_required_plugins( ) 
	{

		$plugins = [
			[
				'name'      => 'SVG Support',
				'slug'      => 'svg-support',
				'required'  => false,
			],[
				'name'      => 'Advanced Editor Tools (ранее TinyMCE Advanced)',
				'slug'      => 'tinymce-advanced',
				'required'  => true,
			],[
				'name'      => 'Cyrlitera – transliteration of links and file names',
				'slug'      => 'cyrlitera',
				'required'  => true,
			],	[
				'name'      => 'Regenerate Thumbnails',
				'slug'      => 'regenerate-thumbnails',
				'required'  => false,
			],	[
					'name'                  => 'CPT dmzTheme',
					'slug'                  => 'dmz_theme_cpt',
					'source'                => get_template_directory() . '/plugins/dmz_theme_cpt.zip',
					'required'              => true,
					'version'               => '',
					'force_activation'      => false,
					'force_deactivation'    => false,
					'external_url'          => '',
			],	[
					'name'                  => 'Metaboxes dmzTheme',
					'slug'                  => 'dmz_theme_metaboxes',
					'source'                => get_template_directory() . '/plugins/dmz_theme_metaboxes.zip',
					'required'              => true,
					'version'               => '',
					'force_activation'      => false,
					'force_deactivation'    => false,
					'external_url'          => '',
			],
		];

		$theme_text_domain = 'dmz_hram_site';

		$config = [
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
		];

		tgmpa( $plugins, $config );
	}
	add_action( 'tgmpa_register', 'dmz_register_required_plugins' );

// *Функция ограничения вывода текста в карточке поста
	function dmz_limit_excerpt( $limit ) 
	{
		$excerpt = explode( ' ', get_the_excerpt(), $limit );
		if ( count( $excerpt ) >= $limit ):
			array_pop( $excerpt );
			$excerpt = implode( " ", $excerpt ).'... ';
		else:
			$excerpt = implode( " ", $excerpt ).' ';
		endif;
		$excerpt = preg_replace( '`\[[^\]]*\]`', '', $excerpt );

		return $excerpt;
	}

// *Функция регистрации кастомных размеров картинок
	function dmz_init_theme_support() 
	{
		if ( function_exists( 'dmz_get_images_sizes' ) ):
			foreach ( dmz_get_images_sizes() as $post_type => $sizes ) 
			{
				foreach ( $sizes as $config ) 
				{
					dmz_add_image_size( $post_type, $config );
				}
			}
		endif;
	}
	add_action( 'init', 'dmz_init_theme_support' );

// *Обертка для создания кастомных размеров картинок
	function dmz_add_image_size( $post_type, $config ) 
	{
		add_image_size( $config['name'], $config['width'], $config['height'], $config['crop'] );  
	}

// *Чистит строку, оставляя в ней только указанные HTML теги, их атрибуты и значения атрибутов.
	function dmz_wp_kses( $dmz_string )
	{
		$allowed_tags = [
			'img' => [
				'src'		=>	[],
				'alt'		=>	[],
				'width'	=>	[],
				'height'	=>	[],
				'class'	=>	[],
			],
			'a' => [
				'href'	=>	[],
				'title'	=>	[],
				'class'	=>	[],
			],
			'b' => [
				'href'	=>	[],
				'title'	=> [],
				'class'	=>	[],
			],
			'span' => [
				'class'	=>	[],
			],
			'div' => [
				'class'	=>	[],
				'id'		=>	[],
			],
			'h1' => [
				'class'	=>	[],
				'id'		=>	[],
			],
			'h2' => [
				'class'	=> [],
				'id'		=> [],
			],
			'h3' => [
				'class'	=> [],
				'id'		=> [],
			],
			'h4' => [
				'class'	=> [],
				'id'		=> [],
			],
			'h5' => [
				'class'	=> [],
				'id'		=> [],
			],
			'h6' => [
				'class'	=> [],
				'id'		=> [],
			],
			'p' => [
				'class'	=> [],
				'id'		=> [],
			],
			'strong' => [
				'class'	=> [],
				'id'		=> [],
			],
			'br' => [
				'class'	=> [],
				'id'		=> [],
			],
			'i' => [
				'class'	=> [],
				'id'		=> [],
			],
			'del' => [
				'class'	=> [],
				'id'		=> [],
			],	
			'ul' => [
				'class'	=> [],
				'id'		=> [],
			],	
			'li' => [
				'class'	=> [],
				'id'		=> [],
			],
			'ol' => [
				'class'	=> [],
				'id'		=> [],
			],
			'input' => [
				'class'	=> [],
				'id'		=> [],
				'type'	=> [],
				'style'	=> [],
				'name'	=> [],
				'value'	=> [],
			],
		];

		if ( function_exists( 'wp_kses' ) ):
			 return wp_kses( $dmz_string, $allowed_tags );
		endif;
  }