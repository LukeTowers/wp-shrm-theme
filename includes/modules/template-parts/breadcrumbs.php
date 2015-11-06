<?php
//************************************************************************************************
// Section: 		Breadcrumbs
// Description:		Template part that generates the HTML for the breadcrumbs
//************************************************************************************************



// Don't display breadcrumbs on the front page
if (!is_front_page()) {
	global $post;
	
	$breadcrumbs = '<div class="breadcrumbs">';
	
	// Load the arguments that have been included with the call to this component
	global $template_component_args;
	$breadcrumb_override = @$template_component_args['breadcrumb-override'];
	
	// Check for override, display that instead if present
	if (!empty($breadcrumb_override['title'])) {
		if (!empty($breadcrumb_override['parent'])) {
			$breadcrumbs .= '<h2><a href="' . @$breadcrumb_override['parent']['url'] . '">' . $breadcrumb_override['parent']['title'] . '</a></h2>';
			$breadcrumbs .= '<span class="seperator">::</span>';
			$breadcrumbs .= '<h2><a href="' . @$breadcrumb_override['url'] . '">' . $breadcrumb_override['title'] . '</a></h2>';
		} else {
			$breadcrumbs .= '<h2><a href="' . @$breadcrumb_override['url'] . '">' . $breadcrumb_override['title'] . '</a></h2>';
		}
	} else {
		if ($post->post_parent) {
			$breadcrumbs .= '<h2><a href="' . get_permalink($post->post_parent) . '">' . get_the_title($post->post_parent) . '</a></h2>';
			$breadcrumbs .= '<span class="seperator">::</span>';
			$breadcrumbs .= '<h1><a href="' . get_permalink($post->ID) . '">' . get_the_title($post->ID) . '</a></h1>';
		} else {
			$breadcrumbs .= '<h1><a href="' . get_permalink($post->ID) . '">' . get_the_title($post->ID) . '</a></h1>';
		}
	}
	
	$breadcrumbs .= '</div>';
	
	echo $breadcrumbs;
}