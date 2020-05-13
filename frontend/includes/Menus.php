<?php
  class Menus {
    function registerAppMenus() {
      register_nav_menus(
        array(
          'header-menu'  => esc_html( 'Header Menu'),
          'footer-menu'   => esc_html( 'Footer Menu')
        )
      );
    }

    function initMenus() {
      add_action('init', array($this, 'registerAppMenus'));
    }
  }

  $AppMenus = new Menus();
