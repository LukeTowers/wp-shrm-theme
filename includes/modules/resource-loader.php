<?php
//************************************************************************************************
// Section: 		Theme Resources
// Description:		Loads the required scripts and styles for the theme
//************************************************************************************************

$stylesheets = array();

// Run the component checking funcitons
add_action('wp', 'load_styles_as_required');
function load_styles_as_required($wp) {
	// Run functions to check for additional css to include
	include_fusion_slider();
}

// Add the editor styles
function load_editor_styles() {
	add_editor_style(SHRM_2016_TEMPLATE_URL . '/includes/css/editor.css');
}
// add_action('admin_init', 'load_editor_styles');




// Add the theme styles to <head>
function initialize_theme_styles() {
	wp_enqueue_style('main', SHRM_2016_TEMPLATE_URL . '/style.css');
	global $stylesheets;
	if (!empty($stylesheets)) {
		foreach ($stylesheets as $stylesheet) {
			wp_enqueue_style($stylesheet, SHRM_2016_TEMPLATE_URL . "/includes/css/{$stylesheet}.css");
		}
	}
}
add_action('wp_enqueue_scripts','initialize_theme_styles');



// Add the front-end theme scripts to <head>
function initialize_theme_scripts() {
	wp_enqueue_script('jquery');
// 	wp_enqueue_script('jquerymenutoggle', SHRM_2016_TEMPLATE_URL . '/includes/js/jquery.menutoggle.js', array('jquery'), '1.0', false);
}
add_action('wp_enqueue_scripts','initialize_theme_scripts');



function add_typekit_fonts() {
	echo '<script src="https://use.typekit.net/qlu1hyf.js"></script>';
	echo '<script>try{Typekit.load({ async: true });}catch(e){}</script>';
}
add_action('header_scripts', 'add_typekit_fonts');



/* COMPONENT CHECKING FUNCTIONS */
function include_fusion_slider() {
	global $stylesheets;
	$stylesheets[] = 'fusion-slider';
}



/*
function check_for_events() {
	$posttype = get_post_type();
	if ($posttype === "event") {
		global $stylesheets;
		$stylesheets[] = 'event-organizer';
	}
}
*/