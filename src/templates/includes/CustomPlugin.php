<?php
class CustomPlugin {
	protected $loader;
	public function __construct() {
		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
    $this->define_public_hooks();
    $this->add_theme_supports();
	}
	private function load_dependencies() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/Loader.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/i18n.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/Admin.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/Public.php';
		$this->loader = new Loader();
	}
	private function set_locale() {
		$plugin_i18n = new i18n();
		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
	}
	private function define_admin_hooks() {
		$plugin_admin = new Admin();
		// $this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		// $this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
	}
	private function define_public_hooks() {
    $pluginPublic = new PluginPublic();
    $pluginPublic->enqueue_scripts();
  }
	public function run() {
		$this->loader->run();
	}
	public function get_loader() {
		return $this->loader;
	}
  public function add_theme_supports() {
    if (function_exists('add_theme_support')) {
      // Add Menu Support
      add_theme_support('menus');
      // Add Thumbnail Theme Support
      // Enables post and comment RSS feed links to head
      add_theme_support('automatic-feed-links');
      // Localisation Support
      load_theme_textdomain('lang_support', get_template_directory() . '/languages');
    }
  }
}
