<?php
  class Scripts {
    function appScript() {
      if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
        wp_register_script('app', get_template_directory_uri() . '/assets/app.js');
        wp_enqueue_script('app');
      }
    }

    function initScripts() {
      add_action('init', array($this, 'appScript'));
    }
  }
