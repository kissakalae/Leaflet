<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.linkedin.com/in/shayanabbas/
 * @since             1.0.0
 * @package           Leaflet_Store_Locator
 *
 * @wordpress-plugin
 * Plugin Name:       Leaflet Store Locator
 * Plugin URI:        http://ministryofcoders.com
 * Description:       Create a store locator based on Leafletjs.
 * Version:           1.1.0
 * Author:            Shayan Abbas & Nader Gam
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       leaflet-store-locator
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'LEAFLET_STORE_LOCATOR_VERSION', '1.1.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-leaflet-store-locator-activator.php
 */
function activate_leaflet_store_locator() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-leaflet-store-locator-activator.php';
	Leaflet_Store_Locator_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-leaflet-store-locator-deactivator.php
 */
function deactivate_leaflet_store_locator() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-leaflet-store-locator-deactivator.php';
	Leaflet_Store_Locator_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_leaflet_store_locator' );
register_deactivation_hook( __FILE__, 'deactivate_leaflet_store_locator' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-leaflet-store-locator.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_leaflet_store_locator() {

	$plugin = new Leaflet_Store_Locator();
	$plugin->run();

}
run_leaflet_store_locator();
