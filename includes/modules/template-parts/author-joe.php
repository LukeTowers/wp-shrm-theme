<?php
	$author_id = 336; // ID of staff post that is for the author (Joe Miller)
	$author = get_post($author_id);
?>
<div class="staff_container author_container">
	<?php if (has_post_thumbnail()) { ?>
		<div class="staff-picture">
			<?php 
				$image = wp_get_attachment_image_src(get_post_thumbnail_id($author->ID), 'medium');
				echo '<span class="image-content circle" style="background-image: url(\'' . $image[0] . '\');"></span>';
			?>
		</div>
	<?php } ?>
	<div class="staff-content">
		<h2 class="staff-title"><?php echo $author->post_title; ?></h2>
		<div class="staff-description">
			<?php echo apply_filters('the_content', $author->post_content); ?>
		</div>
	</div>
	<div class="clearfix"></div>
</div>