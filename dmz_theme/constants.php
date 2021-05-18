<?php

/****************************************************************
 * Define Constants
 ****************************************************************/

$dmz_theme = wp_get_theme()->get( 'Version' );

define( 'DMZ_THEME_VERSION', $dmz_theme );

/****************************************************************
 * System Functions
 ****************************************************************/

require_once ( DMZ_THEME_DIR . '/etc/admin.php' );
require_once ( DMZ_THEME_DIR . '/etc/default.php' );
require_once ( DMZ_THEME_DIR . '/etc/front.php' );
require_once ( DMZ_THEME_DIR . '/etc/map-shortcode.php' );
require_once ( DMZ_THEME_DIR . '/etc/customizer.php' );
require_once ( DMZ_THEME_DIR . '/options/theme-options.php');
require_once ( DMZ_THEME_DIR . '/functions/tgm.php' );
require_once ( DMZ_THEME_DIR . '/functions/general.php' );
require_once ( DMZ_THEME_DIR . '/config.php' );