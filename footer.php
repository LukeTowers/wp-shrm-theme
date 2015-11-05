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
						<div class="footer-column privacy-policy">
							<a href="/privacy-policy/">Privacy Policy</a>
						</div>
						<div class="footer-column">
							<span class="copyright">&copy; <?php echo date('Y'); ?> Souls Harbour Rescue Mission</span>
						</div>
						<div class="footer-column fusion-credits">
							<a href="http://fusiononline.ca/" target="_blank">Developed by Fusion Online</a>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div> <!-- .shadow_container -->
		</div> <!-- .site_container -->
		<?php wp_footer(); ?>
	</body>
</html>