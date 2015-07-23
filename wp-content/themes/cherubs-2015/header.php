<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title><?php wp_title('', true, 'right'); ?> - <?php echo get_bloginfo("name") ?></title>

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

  <? // SCRIPTS ?>
  <?php wp_enqueue_script("jquery-js", get_template_directory_uri() . "/js/jquery-1.11.3.min.js"); ?>
  <?php wp_enqueue_script("foundation-js", get_template_directory_uri() . "/js/foundation.min.js"); ?>

  <? // STYLES ?>
  <?php wp_enqueue_style("foundation-css", get_template_directory_uri() . "/css/foundation.min.css"); ?>
  <?php wp_enqueue_style("cherubs-css", get_template_directory_uri() . "/style.css"); ?>

  <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

  <div class="row container">

    <!-- HEADER -->
    <div class="twelve columns">
      <!-- MAIN LOGO -->
      <header role="banner" class="logo-header">
        <a class="logo" href="<?php echo get_bloginfo('url'); ?>">
          <img src="<?php echo get_template_directory_uri() . "/images/logo-small.png" ?> " alt="">
        </a>
      </header>

      <!-- MENU -->
      <?php wp_nav_menu( array(
          "theme_location" => "header-menu",
          "menu_class" => "navigation-menu"
        ) ); ?>

    </div> <!-- HEADER -->
    <?php // bones_main_nav(); // Adjust using Menus in Wordpress Admin ?>

    <!-- CONTENT -->
    <div class="content twelve columns">
