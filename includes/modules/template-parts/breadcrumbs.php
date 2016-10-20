<?php
//************************************************************************************************
// Section: 		Breadcrumbs
// Description:		Template part that generates the HTML for the breadcrumbs
//************************************************************************************************

// Don't display breadcrumbs on the front page
if (!is_front_page()) {
	// Load the arguments that have been included with the call to this component
	global $template_component_args;
	global $post;
	
	$breadcrumbs = '<div class="breadcrumbs ' . @$template_component_args['class'] . '">';
	
	// Manage the override to the defaults
	$breadcrumb_override = @$template_component_args['breadcrumb-override'];
	
	if (!empty($breadcrumb_override['seperator'])) {
		$seperator = $breadcrumb_override['seperator'];
	} else {
		$seperator = ':';
	}
	
	if (empty($breadcrumb_override)) {
		$posttype_breadcrumbs = array(
			'cup-of-joe'	=>	array(
				'title'	=>	'Cup of Joe',
				'url'	=>	'/blog/cup-of-joe/'
			),
			'wtd'	=>	array(
				'title'	=>	'Ways to Donate',
				'url'	=>	'/get-involved/donate/ways-to-donate/'
			),
			'media-item'	=>	array(
				'title'	=>	'Media Room',
				'url'	=>	'/about-us/media-room/'
			),
			'success-story'	=>	array(
				'title'	=>	'Success Stories',
				'url'	=>	'/blog/success-stories/'
			),
			'event'			=>	array(
				'title'	=>	'Events',
				'url'	=>	'/get-involved/events/',
			),
		);
		
		$posttype = get_post_type($post->ID);
		if (!empty($posttype_breadcrumbs[$posttype])) {
			$breadcrumb_override = array(
				'title'	=>	get_the_title(),
				'url'	=>	get_the_permalink(),
				'parent'=>	$posttype_breadcrumbs[$posttype]
			);
		}
	}
	
	
	// Check for override, display that instead if present
	if (!empty($breadcrumb_override['title'])) {
		if (!empty($breadcrumb_override['parent'])) {
			$breadcrumbs .= '<h2><a href="' . @$breadcrumb_override['parent']['url'] . '">' . $breadcrumb_override['parent']['title'] . '</a></h2>';
			$breadcrumbs .= '<span class="seperator">' . $seperator . '</span>';
			$breadcrumbs .= '<h2><a href="' . @$breadcrumb_override['url'] . '">' . $breadcrumb_override['title'] . '</a></h2>';
		} else {
			$breadcrumbs .= '<h2><a href="' . @$breadcrumb_override['url'] . '">' . $breadcrumb_override['title'] . '</a></h2>';
		}
	} else {
		if ($post->post_parent) {
			$breadcrumbs .= '<h2><a href="' . get_permalink($post->post_parent) . '">' . get_the_title($post->post_parent) . '</a></h2>';
			$breadcrumbs .= '<span class="seperator">' . $seperator . '</span>';
			$breadcrumbs .= '<h1><a href="' . get_permalink($post->ID) . '">' . get_the_title($post->ID) . '</a></h1>';
		} else {
			$breadcrumbs .= '<h1><a href="' . get_permalink($post->ID) . '">' . get_the_title($post->ID) . '</a></h1>';
		}
	}
	
	$breadcrumbs .= '</div>';
	
	echo $breadcrumbs;
}