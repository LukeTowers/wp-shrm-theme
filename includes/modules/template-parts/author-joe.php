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
			<p>Joe Miller is the Executive Director for Souls Harbour Rescue Mission. After working in the manufacturing industry for many years, he felt called to move from 'building things' to 'building people.' He has a passion to see the people that walk through the Mission's doors, get the help they need; whatever their situation may be. He enjoys fishing and the outdoors and often finds God in the stillness of nature. He writes here his thoughts on poverty, society, faith, and his reflections on life.</p>
		</div>
	</div>
	<div class="clearfix"></div>
</div>