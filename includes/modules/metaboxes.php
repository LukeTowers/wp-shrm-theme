<?php
//************************************************************************************************
// Section: 		Metaboxes
// Description:		Module that handles the theme's metaboxes
//************************************************************************************************

// Register the metaboxes
function add_theme_metaboxes($post) {
	add_meta_box(
		'tickets_url_metabox',			// ID of the metabox
		'Link to purchase tickets',		// Title of the metabox
		'render_tickets_url_metabox',	// Callback function to print out the html for the metabox
		'event',						// "Screen" to display metabox on, i.e. 'schedules' post type
		'side',							// Context of the metabox
		'core'							// Priority of the metabox being displayed
	);
}
add_action('add_meta_boxes_event', 'add_theme_metaboxes');


function render_tickets_url_metabox($post) {	
	$ticket_url = get_post_meta($post->ID, 'ticket_url', true);
	
	?>
	<input type="text" id="ticket_url" name="ticket_url" value="<?php echo $ticket_url; ?>" style="width: 100%;" placeholder="http://www.example.com/">
	<?php
}


function save_tickets_url($event_id) {
	if (!empty($_POST['ticket_url'])) {
		update_post_meta($event_id, 'ticket_url', $_POST['ticket_url']);
	}
}
add_action('save_post_event', 'save_tickets_url');