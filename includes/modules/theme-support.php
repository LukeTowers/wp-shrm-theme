<?php
//************************************************************************************************
// Section: 		Theme Support Module
// Description:		Module that manages options that the theme supports
//************************************************************************************************

add_theme_support('post-thumbnails');

// Enable the seo metabox on Pages & Posts
add_theme_support('seo-metabox', array('page', 'post', 'cup-of-joe', 'wtd', 'media-item', 'success-story', 'staff'));

// Enable Typekit embeds
add_theme_support('typekit');

// Enable Google Analytics
add_theme_support('google-analytics');

// Enable Google Tag Manager
add_theme_support('google-tag-manager');

// Enable favicons and specify the location to the file containing the favicon meta tags for echoing in <head>
add_theme_support('favicons', SHRM_2016_TEMPLATE_PATH . '/includes/icons/icons.html');

//Enable custom navigation menus
add_theme_support('menus');

function register_theme_menus() {
  register_nav_menus(
    array(
      'main-menu'	=> 'Main Menu',
      'sitemap'		=>	'Sitemap',
    )
  );
}
add_action( 'init', 'register_theme_menus' );


function add_event_type_query_var($vars) {
	$vars[] = 'event-type';
	return $vars;
}
add_filter('query_vars', 'add_event_type_query_var');