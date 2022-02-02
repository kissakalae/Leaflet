<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.linkedin.com/in/shayanabbas/
 * @since      1.0.0
 *
 * @package    Leaflet_Store_Locator
 * @subpackage Leaflet_Store_Locator/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Leaflet_Store_Locator
 * @subpackage Leaflet_Store_Locator/admin
 * @author     Shayan Abbas <shayanabbas@outlook.com>
 */
class Leaflet_Store_Locator_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

        
		$this->load_dependencies();
		
		/**
		 * Setup admin menu links, for settings page.
		 */
		// REMOVED ON 21.10. add_action( 'admin_menu', array($this, 'setup_menu'));

		/**
		 * Init admin fields.
		 */
		// REMOVED ON 21.10. add_action( 'admin_init', array( $this, 'setup_fields' ) );

		/**
		 * Init sections for fields.
		 */
		// REMOVED ON 21.10. add_action( 'admin_init', array( $this, 'setup_sections' ) );
		
	}
	
	/*public function setup_menu()
	{
		// Add the menu item and page
		$page_title = 'Kauppahaun kentät';
		$menu_title = 'Kauppahaun kentät';
		$capability = 'manage_options';
		$slug = 'kauppahaun-kentat';
		$callback = array( $this, 'adminPage' );
		$icon = 'dashicons-admin-post';
		$position = 9;

		add_menu_page( $page_title, $menu_title, $capability, $slug, $callback, $icon, $position );
	}*/

	/** Add the sections to menu page. */

	/*public function setup_sections()
	{
		add_settings_section( 'settings_section', 'Kauppahaun kentät', false, 'kauppahaun-kentat' );
	}*/

	/** Add the fields to menu page. */

	/*public function setup_fields()
	{
		// Register settings
		register_setting( 'kauppahaku_settings', 'yrityksen_sahkoposti' );
		register_setting( 'kauppahaku_settings', 'kaupat_singlePage' );
		register_setting( 'kauppahaku_settings', 'hakukentan_otsikko' );
		register_setting( 'kauppahaku_settings', 'hakukentan_teksti' );
		register_setting( 'kauppahaku_settings', 'pitka_teksti' );
		register_setting( 'kauppahaku_settings', 'ei_kauppoja' );

		// Add fields
		add_settings_field( 'yrityksen_sahkoposti', 'Yrityksen sähköposti', array( $this, 'yrityksenSpostiFunk' ), 'kauppahaun-kentat', 'settings_section' );
		add_settings_field( 'kaupat_singlePage', 'Tulevatko yksittäiset kauppasivut näkyviin?', array( $this, 'kaupat_singlePageFunk' ), 'kauppahaun-kentat', 'settings_section' );
		add_settings_field( 'kauppahaku_hakukentan_otsikko', 'Hakukentän otsikko', array( $this, 'hakukentan_otsikkoFunk' ), 'kauppahaun-kentat', 'settings_section' );
		add_settings_field( 'kauppahaku_hakukentan_teksti', 'Hakukentän teksti', array( $this, 'hakukentan_tekstiFunk' ), 'kauppahaun-kentat', 'settings_section' );
		add_settings_field( 'kauppahaku_pitka_teksti', 'Kentän alapuolinen teksti', array( $this, 'pitka_tekstiFunk' ), 'kauppahaun-kentat', 'settings_section' );
		add_settings_field( 'kauppahaku_ei_kauppoja', 'Ei hakutuloksia', array( $this, 'ei_kauppojaFunk' ), 'kauppahaun-kentat', 'settings_section' );
	}*/

	/**
	 * Fields
	 */
    /*public function avainapteekitSpostiFunk($args)
	{
		// Echo field HTML
		// Render fields
		echo '<input name="yrityksen_sahkoposti" id="yrityksen_sahkoposti" type="text" value="' . get_option( 'yrityksen_sahkoposti' ) . '"> </input>';

	}
	public function kaupat_singlePageFunk($args)
	{
		// Echo field HTML
		// Render fields
		echo '<input name="kaupat_singlePage" id="kaupat_singlePage" type="checkbox" value="1" ' . checked( 1, get_option( 'kaupat_singlePage' ) ) . '> </input>';

	}
	public function hakukentan_otsikkoFunk($args)
	 {
		// Echo field HTML
		// Render fields
		echo '<input name="hakukentan_otsikko" id="hakukentan_otsikko" type="text" value="' . get_option( 'hakukentan_otsikko' ) . '"> </input>';

	 }
	 public function hakukentan_tekstiFunk($args)
	 {
		// Echo field HTML
		// Render fields
		echo '<input name="hakukentan_teksti" id="hakukentan_teksti" type="text" value="' . get_option( 'hakukentan_teksti' ) . '"> </input>';
	 }
	 public function pitka_tekstiFunk($args)
	 {
		// Echo field HTML
		echo '<textarea name="pitka_teksti" id="pitka_teksti" type="text" cols="100" rows="10">' . get_option( 'pitka_teksti' ) . '</textarea>';
	 }
	 public function ei_kauppojaFunk($args)
	 {
		// Echo field HTML
		// Render fields
		echo '<input name="ei_kauppoja" id="ei_kauppoja" type="text" value="' . get_option( 'ei_kauppoja' ) . '"> </input>';
	 }*/
	
	/**
	 * Call the admin settings page template.
	 */

	/*public function adminPage()
	{
		return require_once plugin_dir_path(__FILE__) . 'templates/admin.php';
	}*/

	private function load_dependencies() {
		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) .  'admin/class-leaflet-store-locator-settings.php';
    }

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Leaflet_Store_Locator_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Leaflet_Store_Locator_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/leaflet-store-locator-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Leaflet_Store_Locator_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Leaflet_Store_Locator_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/leaflet-store-locator-admin.js', array( 'jquery' ), $this->version, false );
			
	}
	
}