<?php
class PluginPublic {
	// public function __construct() {
	// }

	public function enqueue_scripts() {
    add_action('wp_enqueue_scripts', array(&$this, 'loadScripts'));
  }

  function loadScripts() {
    wp_enqueue_script('customPluginScript', PLUGIN_BASE_URL . '/plugin.js');
  }
}
