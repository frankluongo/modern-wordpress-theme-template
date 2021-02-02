<?php
  class Scripts {
    function appScripts() {
      global $post;
      wp_dequeue_style( 'wp-block-library' );
      wp_dequeue_style( 'wp-block-library-theme' );
      if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
        wp_deregister_script( 'wp-embed' );
        wp_register_script('app', get_template_directory_uri() . '/assets/app.js');
        wp_enqueue_style('app', get_template_directory_uri() . '/assets/app.css');
        wp_enqueue_script('app');
      }
      // Adding custom css / js to posts
      // if (is_single()) {
      //   if ($post->post_type == 'photos') {
      //     wp_enqueue_script('photos', get_template_directory_uri() . '/assets/photos.js');
      //   }
      // }
      if( is_page()) {
        switch($post->post_name) {
          case 'home':
            wp_enqueue_script('home', get_template_directory_uri() . '/assets/home.js');
          break;
        }
      }
    }

    function initScripts() {
      add_action('wp_enqueue_scripts', array($this, 'appScripts'));
      remove_action('wp_head', 'print_emoji_detection_script', 7);
      remove_action('wp_print_styles', 'print_emoji_styles');
    }
  }
