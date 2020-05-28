<?php
  class Scripts {
    function appScript() {
      if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
        wp_deregister_script( 'wp-embed' );
        wp_register_script('app', get_template_directory_uri() . '/app.js');
        wp_enqueue_script('app');
      }
    }

    function appStyles() {
      wp_dequeue_style( 'wp-block-library' );
      wp_dequeue_style( 'wp-block-library-theme' );
    }

    function initScripts() {
      add_action('wp_enqueue_scripts', array($this, 'appScript'));
      add_action('wp_enqueue_scripts', array($this, 'appStyles'));
      remove_action('wp_head', 'print_emoji_detection_script', 7);
      remove_action('wp_print_styles', 'print_emoji_styles');
    }
  }
