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
	do_action('load_resources_if_required');
}

// Add the editor styles
function load_editor_styles() {
	add_editor_style(SHRM_2016_TEMPLATE_URL . '/includes/css/editor.css');
}
add_action('admin_init', 'load_editor_styles');

// Add the typekit fonts to the tinymce editor
function shrm_typekit_mce_plugin($plugin_array){
	$plugin_array['typekit']  =  SHRM_2016_TEMPLATE_URL . '/includes/js/typekit.tinymce.js';
    return $plugin_array;
}
add_filter('mce_external_plugins', 'shrm_typekit_mce_plugin');




// Add the theme styles to <head>
function initialize_theme_styles() {
	wp_enqueue_style('main', SHRM_2016_TEMPLATE_URL . '/includes/css/style.min.css');
// 	wp_enqueue_style('main', SHRM_2016_TEMPLATE_URL . '/style.css');
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
	wp_enqueue_script('jquerymenutoggle', SHRM_2016_TEMPLATE_URL . '/includes/js/jquery.menutoggle.js', array('jquery'), '1.0', false);
}
add_action('wp_enqueue_scripts','initialize_theme_scripts', 1);



function add_typekit_fonts() {
	echo '<script src="https://use.typekit.net/qlu1hyf.js"></script>';
	echo '<script>try{Typekit.load({ async: true });}catch(e){}</script>';
}
add_action('footer_scripts', 'add_typekit_fonts');
add_action('admin_head', 'add_typekit_fonts');


function add_theme_icons() {
	echo file_get_contents(SHRM_2016_TEMPLATE_PATH . '/includes/modules/theme-icons.txt');
}
add_action('header_scripts', 'add_theme_icons');


// Remove jquery.migrate.js from site
add_filter('wp_default_scripts', 'dequeue_jquery_migrate');
function dequeue_jquery_migrate( &$scripts){
	$scripts->remove('jquery');
	$scripts->add('jquery', false, array('jquery-core'), '1.10.2');
}


add_action('wp_enqueue_scripts', 'remove_plugin_resources', 99999);
function remove_plugin_resources() {
	if (is_front_page()) {
		wp_dequeue_script('responsive-lightbox-nivo_lightbox');
		wp_dequeue_script('responsive-lightbox-lite-script');
		wp_dequeue_script('wp-gallery-custom-links-js');
		wp_dequeue_style('responsive-lightbox-nivo_lightbox-css');
		wp_dequeue_style('responsive-lightbox-nivo_lightbox-css-d');
	}
}

/* COMPONENT CHECKING FUNCTIONS */
/*
function check_for_events() {
	$posttype = get_post_type();
	if ($posttype === "event") {
		global $stylesheets;
		$stylesheets[] = 'event-organizer';
	}
}
*/