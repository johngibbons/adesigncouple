<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' : '; } ?><?php bloginfo('name'); ?></title>

    <link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">

    <?php wp_head(); ?>
<script>
// conditionizr.com
// configure environment tests
conditionizr.config({
assets: '<?php echo get_template_directory_uri(); ?>',
  tests: {}
        });
</script>

  </head>
  <body <?php body_class(); ?>>
    <div id="view">

    <!-- header -->
      <nav id="nav-mobile" role="navigation">
        <div id="nav-contents">
          <?php get_search_form(true); ?>
          <a href="<?php echo home_url(); ?>" id="nav-logo" class="no-underline">
            <img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="Logo" class="logo-img">
          </a>
          <?php html5blank_nav(); ?>
          <div id="nav-social">
            <i class="fa fa-facebook"></i>
            <i class="fa fa-instagram"></i>
            <i class="fa fa-twitter"></i>
          </div>
        </div>
      </nav>
      <div class="l-wrapper transition-container">

        <header id="header-bar" class="transition-container" role="banner">
          <div id="nav-open-overlay"></div>
          <button id="nav-toggle" class="lines-button x" type="button" role="button" data-label="nav-toggle">
            <span class="lines"></span>
          </button>
          <a href="<?php echo home_url(); ?>" class="logo">
            <img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="Logo" class="logo-img">
          </a>
        </header>
        <!-- /header -->

        <div id="content">
