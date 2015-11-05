<?php
//************************************************************************************************
// Section: 		Theme Support Module
// Description:		Module that manages options that the theme supports
//************************************************************************************************

add_theme_support('post-thumbnails');

//Enable custom navigation menus
add_theme_support('menus');

function register_theme_menus() {
  register_nav_menus(
    array(
      'main-menu' => 'Main Menu',
    )
  );
}
add_action( 'init', 'register_theme_menus' );