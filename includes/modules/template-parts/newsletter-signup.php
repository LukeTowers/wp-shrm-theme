<?php
//************************************************************************************************
// Section: 		Newsletter Signup
// Description:		Template part that handles displaying and submitting the newsletter signup form
//************************************************************************************************

if (!empty($_POST['newsletter-email'])) {
	?>
	<p class="newsletter-message">Thank you for signing up for our newsletter!</p>
	<?php
} else {
	global $post;
	?>
	<form method="post" action="<?php echo get_the_permalink($post->ID); ?>" id="newsletter-form">
		<label for="newsletter-email">Sign up for our Newsletter</label>
		<input type="email" id="newsletter-email" name="newsletter-email" placeholder="Email Address">
		<input type="submit" id="newsletter-submit" name="newsletter-submit" value="SIGN UP">
	</form>
	<?php
}