<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php $page_title = wp_title('', false, 'right') ?>
  <title><?php echo $page_title ? $page_title : "Home"; ?> - <?php echo get_bloginfo("name") ?></title>

  <!-- icons & favicons -->
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
  <?php // wp_enqueue_script("foundation-js", get_template_directory_uri() . "/js/foundation.min.js"); ?>
  <?php wp_enqueue_script("jquery-js", get_template_directory_uri() . "/js/jquery-1.11.3.min.js"); ?>
  <?php wp_enqueue_script("cherubs-js", get_template_directory_uri() . "/script.js"); ?>
  <?php wp_enqueue_script("pym-js", get_template_directory_uri() . "/js/vendor/pym.min.js"); ?>

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
          <img src="<?php echo get_template_directory_uri() . "/images/logo.png" ?> " alt="">
        </a>
      </header>

      <!-- TOP MENU -->
      <?php wp_nav_menu( array(
          "theme_location" => "header-menu",
          "menu_class" => "top-menu"
        ) ); ?>

    </div> <!-- HEADER -->

    <!-- CONTENT -->
    <div class="content large-12 columns">
