<?php

/**
 *
 * @link              frankluongo.com
 * @since             1.2.0
 * @package           CustomPlugin
 *
 * @wordpress-plugin
 * Plugin Name:       Custom Plugin
 * Plugin URI:        --
 * Description:       This Plugin does dope stuff
 * Version:           1.0.0
 * Author:            Frank Luongo
 * Author URI:        frankluongo.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       custom-plugin
 * Domain Path:       /languages
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}
$url = plugin_dir_url(__FILE__);
define('PLUGIN_BASE_URL',$url);

function activate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/Activator.php';
	Activator::activate();
}
function deactivate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/Deactivator.php';
	Deactivator::deactivate();
}
register_activation_hook( __FILE__, 'activate' );
register_deactivation_hook( __FILE__, 'deactivate' );
require plugin_dir_path( __FILE__ ) . 'includes/CustomPlugin.php';

function runnit() {
	$plugin = new CustomPlugin();
  $plugin->run();
  flush_rewrite_rules();
}
runnit();
