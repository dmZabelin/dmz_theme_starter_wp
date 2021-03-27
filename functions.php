<?php

/****************************************************************
 "dm_starter_theme" - functions and definitions
 * * DO NOT DELETE **
 ****************************************************************/

if ( get_stylesheet_directory() == get_template_directory() ) {

   define('DM_PATH_INC', get_template_directory() . '/inc');
	define('DM_URL_INC', get_template_directory_uri() . '/inc');

   define('DM_PATH_ASSETS', get_template_directory() . '/assets');	
	define('DM_URL_ASSETS', get_template_directory_uri() . '/assets');

}  else {

   define('DM_PATH_INC', get_theme_root() . '/dm_starter_theme/inc');
	define('DM_URL_INC', get_theme_root_uri() . '/dm_starter_theme/inc');
	
   define('DM_PATH_ASSETS', get_theme_root() . '/dm_starter_theme/assets');
	define('DM_URL_ASSETS', get_theme_root_uri() . '/dm_starter_theme/assets');
}

// include system functions
   require_once (DM_PATH_INC . '/constants.php');	

/****************************************************************
* You can add your functions here.
*
* BE CAREFULL! Functions will dissapear after update.
* If you want to add custom functions you should do manual
* updates only.
****************************************************************/