      </div> <!-- end .content -->

      <footer role="contentinfo">

          <div class="twelve columns">

            <div class="row">

              <nav class="twelve columns clearfix">

                <?php wp_nav_menu( array( 'theme_location' => 'footer-nav' ) ); ?>

                <!-- ?php dynamic_sidebar( 'Footer Sidebar' ); ? -->

              </nav>
            </div>

          </div>

      </footer> <!-- end footer -->

    </div> <!-- end #container -->

    <!--[if lt IE 7 ]>
        <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
        <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
    <![endif]-->

    <?php wp_footer(); // js scripts are inserted using this function ?>

    <!-- Script for Search bar animation -->
    <!-- <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script> -->
    <script type="text/javascript">
      $('#menu-sections').append('<li id="search-button"><span class="search-input"><img id="search-img" src="http://cherubs.medill.northwestern.edu/wp-content/uploads/2014/07/magnifying_glass1.png"> <form action="<?php echo home_url( '/' ); ?>" method="get"><input type="text" id="search" placeholder="Search" name="s" value="<?php the_search_query(); ?>" /></form></span></li>');
    </script>

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