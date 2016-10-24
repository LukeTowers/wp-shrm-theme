<?php get_header(); ?>

		<div class="content_container">
			<?php if (have_posts()) : while (have_posts()) : the_post();
				get_template_component('breadcrumbs');
				the_content();
			endwhile; else:
			endif;
			?>
			<div class="clearfix"></div>
			
			
			<?php
				$id = (int) @$_GET['donation_id'];
				$id = abs($id);
				$total = trim(str_replace('CAD', '', str_replace('$', '', @$_GET['total'])));
				$total = abs($total);
				$donation_type = @$_GET['donation'];
				
				if (!empty($id) && !empty($total) && !empty($donation_type)) { ?>
					<a class="twitter-share-button" href="https://twitter.com/share" data-url="https://www.shrmsk.com/" data-text="I just donated to Souls Harbour Rescue Mission!" data-via="souls_harbour" data-size="large" data-count="none">Tweet</a>
					<script>
						!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
					</script>
					
					
					<div id="fb-root"></div>
					<script>
						(function(d, s, id) {
							var js, fjs = d.getElementsByTagName(s)[0];
							if (d.getElementById(id)) return;
							js = d.createElement(s); js.id = id;
							js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
							fjs.parentNode.insertBefore(js, fjs);
						}(document, 'script', 'facebook-jssdk'));
					</script>
					<div class="fb-share-button" data-href="https://www.shrmsk.com/" data-layout="button"></div>
					
					<script>
						(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
						(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
						m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
						})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
						
						ga('create', 'UA-17932908-1', 'auto');
						ga('send', 'pageview');
					</script>		
					
					<script type="text/javascript">
						
						var donation_id = <?php echo $id; ?>;
						var donation_total = <?php echo $total; ?>;
						var donation_type = '<?php echo $donation_type ?>';
										
						ga('require', 'ecommerce');
					
						ga('ecommerce:addTransaction', {
							'id': donation_id,                 // Transaction ID. Required.
							'affiliation': 'SHRM Donations',   // Affiliation or store name.
							'revenue': donation_total,         // Grand Total.
						});
						
						ga('ecommerce:addItem', {
							'id': donation_id,        // Transaction ID. Required.
							'name': donation_type,    // Product name. Required.
							'price': donation_total,  // Unit price.
							'quantity': '1'           // Quantity.
						});
						
						ga('ecommerce:send');					
					</script>
				<?php } ?>
		</div>
			
<?php get_footer(); ?>