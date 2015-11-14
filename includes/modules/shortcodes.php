<?php
//************************************************************************************************
// Section: 		Shortcodes
// Description:		Module that handles the theme's shortcodes
//************************************************************************************************

// [latest_cup_of_joe]
add_shortcode('latest_cup_of_joe', 'display_latest_cup_of_joe');
function display_latest_cup_of_joe($atts) {

	$output = '';
	
	$coj_args = array(
		'post_type'			=>	'cup-of-joe',
		'post_status'		=>	'publish',
		'posts_per_page'	=>	1,
		'order'				=>	'DESC',
	);
	
	$coj_query = new WP_Query($coj_args);
	
	
	if ($coj_query->have_posts()) : while ($coj_query->have_posts()) : $coj_query->the_post();
		$output .= '<div class="post_container">';
			$output .= '<div class="post-picture">';
				$output .= '<a href="' . get_the_permalink() .'">';
					$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'medium');
					if (empty($image[0])) {
						$image[0] = SHRM_2016_TEMPLATE_URL . '/includes/images/cup-of-joe.jpg';
					}
					$output .= '<span class="image-content rectangle" style="background-image: url(\'' . $image[0] . '\');"></span>';
				$output .= '</a>';
			$output .= '</div>';
			$output .= '<div class="post-content">';
				$output .= '<h2 class="post-title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h2>';
				$output .= '<div class="post-excerpt">';
					$output .= get_the_excerpt();
				$output .= '</div>';
			$output .= '</div>';
			$output .= '<div class="clearfix"></div>';
		$output .= '</div>';
	endwhile; else:
		$output .= '<p>There are no posts to display at this time. Check back later.</p>';
	endif;
	
	wp_reset_postdata();
	
	return $output;
}


// [latest_success_story]
add_shortcode('latest_success_story', 'display_latest_success_story');
function display_latest_success_story($atts) {

	$output = '';
	
	$ss_args = array(
		'post_type'			=>	'success-story',
		'post_status'		=>	'publish',
		'posts_per_page'	=>	1,
		'order'				=>	'DESC',
	);
	
	$ss_query = new WP_Query($ss_args);
	
	
	if ($ss_query->have_posts()) : while ($ss_query->have_posts()) : $ss_query->the_post();
		$output .= '<div class="post_container">';
			$output .= '<div class="post-picture">';
				$output .= '<a href="' . get_the_permalink() .'">';
					$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'medium');
					if (empty($image[0])) {
						$image[0] = SHRM_2016_TEMPLATE_URL . '/includes/images/default-placeholder.jpg';
					}
					$output .= '<span class="image-content rectangle" style="background-image: url(\'' . $image[0] . '\');"></span>';
				$output .= '</a>';
			$output .= '</div>';
			$output .= '<div class="post-content">';
				$output .= '<h2 class="post-title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h2>';
				$output .= '<div class="post-excerpt">';
					$output .= get_the_excerpt();
				$output .= '</div>';
			$output .= '</div>';
			$output .= '<div class="clearfix"></div>';
		$output .= '</div>';
	endwhile; else:
		$output .= '<p>There are no posts to display at this time. Check back later.</p>';
	endif;
	
	wp_reset_postdata();
	
	return $output;
}