<?php

/****************************************************************
 "dmz_theme" - functions and definitions
 *! DO NOT DELETE 
 ****************************************************************/

if ( get_stylesheet_directory() == get_template_directory() ) {

	define('DMZ_THEME_DIR', get_template_directory() . '/dmz_theme');
	define('DMZ_THEME_URL', get_template_directory_uri() . '/dmz_theme');

	define('DMZ_PATH_ASSETS', get_template_directory() . '/assets');	
	define('DMZ_URL_ASSETS', get_template_directory_uri() . '/assets');

}  else {

	define('DMZ_THEME_DIR', get_theme_root() . '/hram-kirilla-mefodiya.od.ua/dmz_theme');
	define('DMZ_THEME_URL', get_theme_root_uri() . '/hram-kirilla-mefodiya.od.ua/dmz_theme');
	
	define('DMZ_PATH_ASSETS', get_theme_root() . '/hram-kirilla-mefodiya.od.ua/assets');
	define('DMZ_URL_ASSETS', get_theme_root_uri() . '/hram-kirilla-mefodiya.od.ua/assets');
}

// include system functions
	require_once (DMZ_THEME_DIR . '/constants.php');	

/****************************************************************
* You can add your functions here.
* !BE CAREFULL
* Functions will dissapear after update.
* If you want to add custom functions you should do manual updates only.
****************************************************************/