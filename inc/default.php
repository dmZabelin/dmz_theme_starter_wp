<?php

/**
 *  Максимально допустимая ширина для любого контента в теме
 */
	function dm_theme_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'dm_theme_content_width', 640 );
	}
	add_action( 'after_setup_theme', 'dm_theme_content_width', 0 );

/**
 * Базовые установки 
 */
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
				'headerMenu'	=> esc_html__('Header Menu', 'dmz_theme'),
				'mobileMenu'	=> esc_html__('Mobile Menu', 'dmz_theme'),
			]);
		}

	endif;
	add_action( 'after_setup_theme', 'dm_starter_theme_setup' );


/**
 * Init TGM Activation
 */

function dm_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
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
            'name'                  => 'CPT dmTheme',
            'slug'                  => 'dm_theme_cpt',
            'source'                => get_template_directory() . '/plugins/dm_theme_cpt.zip',
            'required'              => true,
            'version'               => '',
            'force_activation'      => false,
            'force_deactivation'    => false,
            'external_url'          => '',
        ),
    );

    // Change this to your theme text domain, used for internationalising strings
    $theme_text_domain = 'dmz_theme';

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */

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
add_action( 'tgmpa_register', 'dm_register_required_plugins' );