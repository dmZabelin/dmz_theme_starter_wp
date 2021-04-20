<?php

/************************************************
 * *ПОДКЛЮЧЕНИЕ СКРИПТОВ И СТИЛЕЙ ДЛЯ АДМИН ПАНЕЛИ
 *************************************************/

function dmz_add_scripts($hook) {

	// Подключение кастомных стилей админ панели
		wp_enqueue_style('dmz-admin-css', DMZ_THEME_URL . '/src/css/admin.css');
		wp_enqueue_style('dmz-fontawesome-admin-css', DMZ_THEME_URL . '/src/css/all.min.css');

	// Скрипты для подключения галлереи в Админпанель
		if ( $hook == 'post.php' || $hook == 'post-new.php' || $hook == 'page-new.php' || $hook == 'page.php'  ) {
			wp_enqueue_script('dmz-gallery-meta-scripts', DMZ_THEME_URL . '/src/js/metabox-gallery.js', array('jquery', 'jquery-ui-sortable'));
		}

}
add_action( 'admin_enqueue_scripts', 'dmz_add_scripts', 10 );