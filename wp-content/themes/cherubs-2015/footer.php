			</div> <!-- end .content -->

			<footer role="contentinfo">
			
					<div class="twelve columns">

						<div class="row">

							<nav class="twelve columns clearfix">

								<!-- FOOTER MENU -->
					      <?php wp_nav_menu( array(
					          "theme_location" => "footer-menu",
					          "menu_class" => "footer-navigation-menu"
					        ) ); ?>
                
							</nav>
						</div>

					</div>
					
			</footer> <!-- end footer -->
		
		</div> <!-- end #container -->
		
		<?php wp_footer(); // js scripts are inserted using this function ?>
		
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-33500738-3', 'auto');
		  ga('send', 'pageview');

		</script>
	</body>

</html>