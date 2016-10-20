<?php
//************************************************************************************************
// Section: 		Widget Areas
// Description:		Module that handles the templates widget areas (sidebars)
//************************************************************************************************

// Register Theme Widget Areas
add_action('widgets_init', 'theme_widgets_init');
function theme_widgets_init() {
	
	register_sidebar( array(
		'name'          => 'Home Slider Area',
		'id'            => 'home-slider-area',
		'before_widget' => '<div class="home-slider-area-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	));
	
	register_sidebar( array(
		'name'          => 'Footer Column 1',
		'id'            => 'footer-column-1',
		'before_widget' => '<div class="footer-column-1-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	));
	
	register_sidebar( array(
		'name'          => 'Footer Column 2',
		'id'            => 'footer-column-2',
		'before_widget' => '<div class="footer-column-2-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	));
	
	register_sidebar( array(
		'name'          => 'Footer Column 3',
		'id'            => 'footer-column-3',
		'before_widget' => '<div class="footer-column-3-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	));
}