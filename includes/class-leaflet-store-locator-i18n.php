<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.linkedin.com/in/shayanabbas/
 * @since      1.0.0
 *
 * @package    Leaflet_Store_Locator
 * @subpackage Leaflet_Store_Locator/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Leaflet_Store_Locator
 * @subpackage Leaflet_Store_Locator/includes
 * @author     Shayan Abbas <shayanabbas@outlook.com>
 */
class Leaflet_Store_Locator_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'leaflet-store-locator',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
