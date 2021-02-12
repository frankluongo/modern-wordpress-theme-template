<?php
  define('REQUIRE_DIRECTORY', trailingslashit( get_template_directory() ));
  require_once REQUIRE_DIRECTORY . 'includes/Scripts.php';
  require_once REQUIRE_DIRECTORY . 'includes/Helpers.php';

  $AppScripts = new Scripts();
  $AppScripts->initScripts();
