<?php
//************************************************************************************************
// Section: 		Breadcrumbs
// Description:		Template part that generates the HTML for the breadcrumbs
//************************************************************************************************



// Don't display breadcrumbs on the front page
if (!is_front_page()) {
	global $post;
	
	$breadcrumbs = '<div class="breadcrumbs">';
	
	if ($post->post_parent) {
		$breadcrumbs .= '<h2><a href="' . get_permalink($post->post_parent) . '">' . get_the_title($post->post_parent) . '</a></h2>';
		$breadcrumbs .= '<span class="seperator">::</span>';
		$breadcrumbs .= '<h1><a href="' . get_permalink($post->ID) . '">' . get_the_title($post->ID) . '</a></h1>';
	} else {
		$breadcrumbs .= '<h1><a href="' . get_permalink($post->ID) . '">' . get_the_title($post->ID) . '</a></h1>';
	}
	
	$breadcrumbs .= '</div>';
	
	echo $breadcrumbs;
}