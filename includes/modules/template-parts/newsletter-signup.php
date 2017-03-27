<?php
//************************************************************************************************
// Section: 		Newsletter Signup
// Description:		Template part that handles displaying and submitting the newsletter signup form
//************************************************************************************************

$result_message = array(
	'error_general'			=>	'There was an error. Contact <a href="mailto:office@shrmsk.com">office@shrmsk.com</a> to sign up for the newsletter.',
	'error_long_email'		=>	'Your email address is too long.',
	'error_invalid_email'	=>	'Your email address is invalid.',
	'success'				=>	'Thank you for signing up for our newsletter!',
);

$show_form = true;
$message_class = 'newsletter-message';

// Handle email signups
if (!empty($_POST['newsletter-email'])) {
	$result = add_newsletter_subscriber($_POST['newsletter-email']);
	
	if ($result === $result_message['success']) {
		$show_form = false;
	} else { $message_class .= ' error'; }
	
	echo '<p class="' . $message_class . '">' . $result . '</p>';
}



// Display the signup form
if ($show_form) {
	global $post;
	?>
	<form method="post" action="<?php echo get_the_permalink($post->ID); ?>" id="newsletter-form">
		<label for="newsletter-email">Sign up for our Newsletter</label>
		<input type="email" id="newsletter-email" name="newsletter-email" placeholder="Email Address">
		<input type="submit" id="newsletter-submit" name="newsletter-submit" class="button" value="SIGN UP">
	</form>
	<?php
}



function add_newsletter_subscriber($email) {
	$result_message = array(
		'error_general'			=>	'There was an error. Contact <a href="mailto:office@shrmsk.com">office@shrmsk.com</a> to sign up for the newsletter.',
		'error_long_email'		=>	'Your email address is too long.',
		'error_invalid_email'	=>	'Your email address is invalid.',
		'error_feed_broken'     =>  'There was an error. Contact <a href="mailto:office@shrmsk.com">office@shrmsk.com</a> to sign up for the newsletter. ERROR: Feed is invalid', 
		'success'				=>	'Thank you for signing up for our newsletter!',
	);
	
	// Validate the email address input
	if (empty($email)) { return; }
	if (strlen($email) > 254) { return $result_message['error_long_email']; }
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { return $result_message['error_invalid_email']; }
	
	// Setup values for accessing backend components
	$form_id = 1;
	$email_field_id = 2;
	$addon_slug = 'gravityformsmailchimp';
	$addon_path = WP_PLUGIN_DIR . '/' . $addon_slug . '/class-gf-mailchimp.php';
	$addon_class = 'GFMailChimp';
	
	// Check to make sure that the addon can be loaded
	if (!file_exists($addon_path)) { return $result_message['error_general']; }
	
	// Get the feed to trigger
	$feeds = GFAPI::get_feeds(null, $form_id, $addon_slug, true);
	$target_feed = @$feeds[0];
	if (!is_array($target_feed) || empty($target_feed)) {
		return $result_message['error_feed_broken'];
	}
	
	
		
	// Build the GF Entry Object we'll be creating
	$new_entry = array(
		'form_id'		=>	$form_id,
		$email_field_id	=>	$email,
	);
	
	// Add the email as a form entry to the database
	$new_entry_id = GFAPI::add_entry($new_entry);
	
	// Build / Get the objects required to send the signup to Campaign Monitor
	$entry = GFAPI::get_entry($new_entry_id);
	$form  = GFAPI::get_form($form_id);
	
	// Attempt to process the newsletter signup - note, will succeed on API failures
	require_once($addon_path);
	if (class_exists($addon_class)) {
		$addon = $addon_class::get_instance();
		$addon->process_feed($target_feed, $entry, $form);
	} else {
		return $result_message['error_general'];
	}
	
	// If everything has worked properly
	return $result_message['success'];
}


/*
echo '<h2>TESTING NEWSLETTER SIGNUP - IGNORE</h2><br><pre>';
$entry = GFAPI::get_entry(1);
var_dump($entry);
echo '</pre>';

echo '<br>';

echo '<pre>';



// $new_entry_id = GFAPI::add_entry($new_entry);

echo $new_entry_id;

var_dump(WP_PLUGIN_DIR);
$cm_slug = 'gravityformscampaignmonitor';
require_once(WP_PLUGIN_DIR . '/' . $cm_slug . '/class-gf-campaignmonitor.php');

try {
	$campaign_monitor = new GFCampaignMonitor();
} catch (Exception $ex) {
	echo 'Failed to load campaign monitor add on';
}

echo '</pre>';
*/