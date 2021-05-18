<?php
/**
 * Блок header для нашей темы
 *
 * Это шаблон, который отображает весь раздел <head> и все что до <main class="main">
 *
 * @package dmz_theme
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
   <meta charset="<?php bloginfo( 'charset' ); ?>">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="profile" href="https://gmpg.org/xfn/11">
   <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>