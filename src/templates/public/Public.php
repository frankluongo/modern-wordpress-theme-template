<?php
class PluginPublic {
	public function __construct() {
	}
	public function enqueue_styles() {
    // echo plugin_dir_url( __FILE__ );
    // wp_enqueue_scripts('stylesheet', plugin_dir_url( __FILE__ ) . '/main.css');
	}
	public function enqueue_scripts() {
    add_action('wp_enqueue_scripts', array(&$this, 'loadScripts'));
  }

  function loadScripts() {
    wp_enqueue_script('customPluginScript', PLUGIN_BASE_URL . '/plugin.js');
  }
}
