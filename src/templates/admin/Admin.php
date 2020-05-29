<?php
class Admin {
	public function __construct() {
	}
	public function enqueue_styles() {
		// wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/blre-custom-props-admin.css', array(), $this->version, 'all' );
	}
	public function enqueue_scripts() {
		// wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/blre-custom-props-admin.js', array( 'jquery' ), $this->version, false );
	}
}
