<!doctype html>

<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title><?php wp_title('', true, 'right'); ?> - <?php echo get_bloginfo("name") ?></title>

    <meta name="viewport" content="width=device-width; initial-scale=1.0">

    <!-- icons & favicons -->
    <!-- For iPhone 4 -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/h/apple-touch-icon.png">
    <!-- For iPad 1-->
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/m/apple-touch-icon.png">
    <!-- For iPhone 3G, iPod Touch and Android -->
    <link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/l/apple-touch-icon-precomposed.png">
    <!-- For Nokia -->
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/l/apple-touch-icon.png">
    <!-- For everything else -->
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico">

    <!-- media-queries.js (fallback) -->
    <!--[if lt IE 9]>
      <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

    <!-- html5.js -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

      <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <?php wp_enqueue_script( 'pym', 'http://cherubs.medill.northwestern.edu/2014/wp-content/themes/medill-cherubs/pym.js' ); ?>
    <!-- wordpress head functions... -->
    <?php wp_head(); ?>
    <!-- end of wordpress head -->

    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />



    <script type="text/javascript">var switchTo5x=true;</script>
    <!-- <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript">stLight.options({publisher: "ur-f3cc7c04-8ebc-c9f9-6f64-7e2529ca93a5"}); < /script> -->
        <meta name="google-site-verification" content="B6VZJmR3INcO_tVw-MbcqqivyM5misaC3QzdzOdJsYU" />

    <!-- <link rel="stylesheet" href="/wp-content/themes/medill-cherubs/style-JG.css"> -->
    <script type="text/javascript">
      $('#menu-sections').append('<li>Search</li>');
    </script>
    <!-- <script src="http://cherubs.medill.northwestern.edu/2014/wp-content/themes/medill-cherubs/pym.js"></script> -->

    <!-- For our SlidePro minimal dark theme -->
    <link rel="stylesheet" type="text/css" href="http://cherubs.medill.northwestern.edu/2014a/wp-content/plugins/slider-pro/skins/slider/minimal-dark/minimal-dark.css?ver=3.9.2">
  </head>

  <body <?php body_class(); ?>>

    <div class="row container">
      <div class="twelve columns">
        <header role="banner" id="top-header">

          <div class="siteinfo">
            <h1><a class="brand" id="logo" href="<?php echo get_bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
          </div>
          <?php // wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>

          <?php bones_main_nav(); // Adjust using Menus in Wordpress Admin ?>

        </header> <!-- end header -->
      </div>

      <div class="content twelve columns">