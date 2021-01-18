<?php
  define('REQUIRE_DIRECTORY', trailingslashit( get_template_directory() ));
  require_once( REQUIRE_DIRECTORY . 'includes/Scripts.php' );
  require_once( REQUIRE_DIRECTORY . 'includes/Helpers.php' );

  $AppScripts = new Scripts();
  $AppScripts->initScripts();
  function register_menus() {
    register_nav_menus(
      array(
        'header_nav' => __('Header Nav'),
        'footer_nav' => __('Footer Nav'),
      )
    );
  }
  function oftu_custom_logo_setup() {
    $defaults = array(
      'height'      => 100,
      'width'       => 400,
      'flex-height' => true,
      'flex-width'  => true,
      'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
  }
  // Add Actions
  add_action('init', 'register_menus');
  add_action( 'after_setup_theme', 'oftu_custom_logo_setup' );
  // Theme Supports
  add_theme_support('post-thumbnails');
  add_theme_support( 'custom-logo' );
