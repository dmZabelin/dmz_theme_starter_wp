<?php

/****************************************************************
 * Define Constants
 ****************************************************************/

$my_theme = wp_get_theme()->get( 'Version' );

define('DM_THEME_VERSION', $my_theme);

/****************************************************************
 * System Functions
 ****************************************************************/

require_once (DM_PATH_INC . '/theme-options.php');
require_once (DM_PATH_INC . '/default.php');
require_once (DM_PATH_INC . '/front.php');
require_once (DM_PATH_INC . '/config.php');
require_once (DM_PATH_INC . '/tgm.php');
require_once (DM_PATH_INC . '/gallery-meta.php');