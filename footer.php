			</div> <!-- .shadow_container -->
			<div class="footer_container">
				<div class="newsletter_container">
					<?php get_template_component('newsletter-signup'); ?>
				</div>
				<div class="footer-content">
					<div class="footer_column_container">
						<div class="footer-column">
							<?php dynamic_sidebar('footer-column-1'); ?>
						</div>
						<div class="footer-column">
							<?php dynamic_sidebar('footer-column-2'); ?>
						</div>
						<div class="footer-column">
							<?php dynamic_sidebar('footer-column-3'); ?>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="footer-credits">
					<div class="column_container">
						<div class="footer-column privacy-policy">
							<a href="/privacy-policy/">Privacy Policy</a>
						</div>
						<div class="footer-column copyright">
							<span>&copy; <?php echo date('Y'); ?> Souls Harbour Rescue Mission</span>
						</div>
						<div class="footer-column fusion-credits">
							<a href="https://www.lookagency.com/" target="_blank">Website by Look Agency</a>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div> <!-- .site_container -->
		<?php wp_footer(); ?>
	</body>
</html>