<?php
  define('REQUIRE_DIRECTORY', trailingslashit( get_template_directory() ));
  require_once( REQUIRE_DIRECTORY . 'includes/Menus.php' );
  require_once( REQUIRE_DIRECTORY . 'includes/Scripts.php' );

  $AppScripts->initScripts();
  $AppMenus->initMenus();
