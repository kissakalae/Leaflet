<?php

/**
 * The settings of the plugin.
 *
 * @link       https://www.linkedin.com/in/shayanabbas
 * @since      1.0.0
 *
 * @package    Leaflet_Store_Locator
 * @subpackage Leaflet_Store_Locator/admin
 */

/**
 * Class Sctrucks_Settings
 *
 */
class Leaflet_Store_Locator_Settings {

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

	}

	/**
	 * This function Setup the custom post types
	 */
	public function setup() {
		
		/*
		*		OPTIONS PAGES
		*/
		
		if ( function_exists('acf_add_options_page') ) :
		// Create options pages
		// Parent
		$parent = acf_add_options_page( array(
			'page_title' 	=> 'Toimipistehaun asetukset',
			'menu_title'	=> 'Toimipistehaun asetukset',
			'menu_slug' 	=> 'toimipistehaun_asetukset',
			'capability'	=> 'edit_posts',
			'redirect'		=> true,
			'icon_url'		=> 'dashicons-location',
			'position'		=> 5,
		) );
		
		// Child - text fields
		acf_add_options_sub_page(array(
            'page_title'  => __('Toimipistehaun tekstit'),
            'menu_title'  => __('Toimipistehaun tekstit'),
            'parent_slug' => 'toimipistehaun_asetukset',
        ));
		
		// Child - post type
		acf_add_options_sub_page(array(
            'page_title'  => __('Admin-asetukset'),
            'menu_title'  => __('Admin-asetukset'),
            'parent_slug' => 'toimipistehaun_asetukset',
        ));

		endif;
		
		/*
		*		OPTIONS PAGE ACF FIELDS
		*		TOIMIPISTEHAUN TEKSTIT FIELDS
		*/
		acf_add_local_field_group(array(
			'key' => 'group_toimipistehaun_tekstit',
			'title' => 'Toimipistehaun tekstit',
			'fields' => array(
				// Linkit toimipisteille
				array(
				'key' => 'field_linkit_toimipisteille',
				'label' => 'Tulevatko linkit yksittäisille toimipaikkasivuille näkyviin?',
				'name' => 'linkit_toimipisteille',
				'type' => 'true_false',
				'instructions' => 'Linkit lisätään hakutuloksiin, sekä kartalle. <br /> get_field("linkit_toimipisteille", "option")',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '100%',
					'class' => '',
					'id' => '',
				),
				'default_value' => false,
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			// Hakukentän otsikko
			array(
				'key' => 'field_hakukentan_otsikko',
				'label' => 'Hakukentän otsikko',
				'name' => 'hakukentan_otsikko',
				'type' => 'text',
				'instructions' => 'get_field("hakukentan_otsikko", "option")',
				'required' => 0,
				'conditional_logic' => false,
				'wrapper' => array(
					'width' => '33%',
					'class' => '',
					'id' => '',
				),
				'default_value' => 'Löydä lähin toimipiste',
				'placeholder' => 'Löydä lähin toimipiste',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			// Hakukentän teksti
			array(
				'key' => 'field_hakukentan_teksti',
				'label' => 'Hakukentän teksti',
				'name' => 'hakukentan_teksti',
				'type' => 'text',
				'instructions' => 'get_field("hakukentan_teksti", "option")',
				'required' => 0,
				'conditional_logic' => false,
				'wrapper' => array(
					'width' => '33%',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => 'Hae postinumerolla...',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			// Ei hakutuloksia
			array(
				'key' => 'field_ei_hakutuloksia',
				'label' => 'Ei hakutuloksia',
				'name' => 'ei_hakutuloksia',
				'type' => 'text',
				'instructions' => 'get_field("ei_hakutuloksia", "option")',
				'required' => 0,
				'conditional_logic' => false,
				'wrapper' => array(
					'width' => '33%',
					'class' => '',
					'id' => '',
				),
				'default_value' => 'Ei hakutuloksia.',
				'placeholder' => 'Ei hakutuloksia.',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			// Ohjeteksti (tekstilaatikko)
			array(
				'key' => 'field_ohjeteksti',
				'label' => 'Ohjeteksti',
				'name' => 'ohjeteksti',
				'type' => 'textarea',
				'instructions' => 'Tämä tekstikenttä tulee näkyviin hakukentän alapuolelle. Voit käyttää rivinvaihtoja, sekä HTML-koodia tekstikentässä. <br /> get_field("ohjeteksti", "option")',
				'required' => 0,
				'conditional_logic' => false,
				'wrapper' => array(
					'width' => '66%',
					'class' => '',
					'id' => '',
				),
				'default_value' => 'Hae toimipisteitä helposti syöttämällä hakukenttään paikkakunta tai postinumero.',
				'placeholder' => 'Hae toimipisteitä helposti syöttämällä hakukenttään paikkakunta tai postinumero.',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			// Ikonin värivalitsin
			array(
				'key' => 'field_ikonin_vari',
				'label' => 'Paikannusikonin väri',
				'name' => 'ikonin_vari',
				'type' => 'color_picker',
				'instructions' => 'get_field("ikonin_vari", "option")',
				'required' => 0,
				'conditional_logic' => false,
				'wrapper' => array(
					'width' => '33%',
					'class' => '',
					'id' => '',
				),
				'default_value' => '#FFF',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
				//
			),
			'location' => array(
				array(
					array(
						'param' => 'options_page',
						'operator' => '==',
						'value' => 'acf-options-toimipistehaun-tekstit',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => true,
			'description' => '',
		));
		
		/*
		*		OPTIONS PAGE ACF FIELDS
		*		ADMIN PAGE FIELDS
		*/
		
		acf_add_local_field_group(array(
			'key' => 'group_sisaltotyypin_asetukset',
			'title' => 'Sisältötyypin asetukset',
			'fields' => array(
			
			// Boolean at the start of the admin page - default: false -> don't show
				// If true, show rest of the options
			array(
				'key' => 'field_sisaltotyypinEditointi',
				'label' => 'Haluatko muokata sisältötyyppiasetuksia?',
				'name' => 'sisaltotyypin_editointi',
				'type' => 'true_false',
				'instructions' => 'HUOM!: Tämän osion tarkoitus on helpottaa tiettyjen asetusten esivalmistelua. Asetuksia muuttamalla on mahdollista rikkoa sivusto, joten ethän tee muutoksia tämän sivun asetuksiin, ellet todella tiedä mitä olet tekemässä.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '100%',
					'class' => '',
					'id' => '',
				),
				'default_value' => false,
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
				// Post type label (plural)
			array(
				'key' => 'field_sisaltotyypinNimi_monikossa',
				'label' => 'Sisältötyypin nimi (monikossa)',
				'name' => 'sisaltotyypin_nimi_monikossa',
				'type' => 'text',
				'instructions' => '',
				'required' => 1,
				'conditional_logic' => array(
					'field' => 'field_sisaltotyypinEditointi',
					'operator' => '==',
					'value' => 1
				),
				'wrapper' => array(
					'width' => '33%',
					'class' => '',
					'id' => '',
				),
				'default_value' => 'Toimipisteet',
				'placeholder' => 'Toimipisteet',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
				// Post type label (singular)
			array(
				'key' => 'field_sisaltotyypinNimi_yksikossa',
				'label' => 'Sisältötyypin nimi (yksikössä)',
				'name' => 'sisaltotyypin_nimi_yksikossa',
				'type' => 'text',
				'instructions' => '',
				'required' => 1,
				'conditional_logic' => array(
					'field' => 'field_sisaltotyypinEditointi',
					'operator' => '==',
					'value' => 1
				),
				'wrapper' => array(
					'width' => '33%',
					'class' => '',
					'id' => '',
				),
				'default_value' => 'Toimipiste',
				'placeholder' => 'Toimipiste',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
				// Post type slug
			array(
				'key' => 'field_sisaltotyypin_slug',
				'label' => 'Sisältötyypin URL-slug',
				'name' => 'sisaltotyypin_slug',
				'type' => 'text',
				'instructions' => 'Huom. Noudata URL-slug -logiikkaa. (Ei välejä, yms)',
				'required' => 1,
				'conditional_logic' => array(
					'field' => 'field_sisaltotyypinEditointi',
					'operator' => '==',
					'value' => 1
				),
				'wrapper' => array(
					'width' => '33%',
					'class' => '',
					'id' => '',
				),
				'default_value' => 'toimipiste',
				'placeholder' => 'toimipiste',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
				// Kartan väriteema
			array(
				'key' => 'field_kartan_variteema',
				'label' => 'Kartan väriteema',
				'name' => 'kartan_variteema',
				'type' => 'text',
				'instructions' => 'Tämä on merkkijono, jonka saa MapBoxin sivustolta. Esim. https://api.mapbox.com/styles/v1/myyntimatti/MERKKIJONO/tiles/256/',
				'required' => 1,
				'conditional_logic' => array(
					'field' => 'field_sisaltotyypinEditointi',
					'operator' => '==',
					'value' => 1
				),
				'wrapper' => array(
					'width' => '100%',
					'class' => '',
					'id' => '',
				),
				'default_value' => 'ck8e5yenu3iaz1imy4mr4cfdg',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_taksonomiat',
				'label' => 'Mukautetut taksonomiat',
				'name' => 'mukautetut_taksonomiat',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array(
					'field' => 'field_sisaltotyypinEditointi',
					'operator' => '==',
					'value' => 1
				),
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'collapsed' => '',
				'min' => 0,
				'max' => 0,
				'layout' => 'table',
				'button_label' => '',
				'sub_fields' => array(
					array(
						'key' => 'field_taksonomia_monikko',
						'label' => 'Taksonomian nimi (monikko)',
						'name' => 'taksonomian_nimi_monikko',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
					array(
						'key' => 'field_taksonomia_yksikko',
						'label' => 'Taksonomian nimi (yksikkö)',
						'name' => 'taksonomian_nimi_yksikko',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
					array(
						'key' => 'field_taksonomia_slug',
						'label' => 'Taksonomian URL-slug',
						'name' => 'taksonomian_slug',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
						),
				),
			),
				//
				),
				'location' => array(
					array(
						array(
							'param' => 'options_page',
							'operator' => '==',
							'value' => 'acf-options-admin-asetukset',
						),
					),
				),
				'menu_order' => 0,
				'position' => 'normal',
				'style' => 'default',
				'label_placement' => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen' => '',
				'active' => true,
				'description' => '',
			));
		
		/*
		*		POST TYPE SETTINGS
		*/
		
		$labels = [
			"name" => __( get_field('sisaltotyypin_nimi_monikossa', 'option'), $this->plugin_name ),
			"singular_name" => __( get_field('sisaltotyypin_nimi_yksikossa', 'option'), $this->plugin_name ),
		];

		$args = [
			"label" 				=> __( get_field('sisaltotyypin_nimi_monikossa', 'option'), $this->plugin_name ),
			"labels" 				=> $labels,
			"description" 			=> "",
			"public" 				=> true,
			"publicly_queryable"	=> true,
			"show_ui" 				=> true,
			"show_in_rest" 			=> true,
			"rest_base" 			=> "",
			'menu_position'         => 5,
			"rest_controller_class" => "WP_REST_Posts_Controller",
			"has_archive" 			=> true,
			"show_in_menu" 			=> true,
			"show_in_nav_menus" 	=> true,
			"delete_with_user" 		=> false,
			"exclude_from_search" 	=> false,
			"capability_type" 		=> "post",
			"map_meta_cap" 			=> true,
			"hierarchical" 			=> false,
			'menu_icon'             => 'dashicons-location',
			"rewrite" 				=> [ "slug" => get_field('sisaltotyypin_slug', 'option'), "with_front" => true ],
			"query_var" 			=> true,
			"supports" 				=> [ "title" ],
		];

		register_post_type( get_field('sisaltotyypin_slug', 'option'), $args );

		/*
		*		POST TYPE CUSTOM FIELDS
		*/
		
		if( function_exists('acf_add_local_field_group') ):

		acf_add_local_field_group(array(
			'key' => 'group_5ecccdbad1964',
			'title' => 'Toimipaikan lisäkentät',
			'fields' => array(
				array(
					'key' => 'field_5eccced536de8',
					'label' => 'Name',
					'name' => 'name',
					'type' => 'text',
					'instructions' => 'for eg: Prisma Tripla',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '25%',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5ecccdc736de7',
					'label' => 'City',
					'name' => 'area',
					'type' => 'text',
					'instructions' => 'for eg: Helsinki',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '25%',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5ecccf1236dea',
					'label' => 'Postal Code',
					'name' => 'postal_code',
					'type' => 'number',
					'instructions' => 'for eg: 00100',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '25%',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'min' => '',
					'max' => '',
					'step' => '',
				),
				array(
					'key' => 'field_5ecccefd36de9',
					'label' => 'Address',
					'name' => 'address',
					'type' => 'text',
					'instructions' => 'for eg: Hermannin rantatie 2',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '25%',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5ecf54885f040',
					'label' => 'Phone',
					'name' => 'phone',
					'type' => 'text',
					'instructions' => 'for eg: 020 7669 755',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '25%',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5easdds885f040',
					'label' => 'Email',
					'name' => 'email',
					'type' => 'text',
					'instructions' => 'for eg: info@example.com',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '25%',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5ecd0b6065541',
					'label' => 'Latitude',
					'name' => 'latitude',
					'type' => 'text',
					'instructions' => 'for eg: 60.1674098',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '25%',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5ecd0c3c65542',
					'label' => 'Longitude',
					'name' => 'longitude',
					'type' => 'text',
					'instructions' => 'for eg: 24.9425769',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '25%',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5ecd0c3c6555ac',
					'label' => 'Linkki',
					'name' => 'linkki',
					'type' => 'url',
					'instructions' => 'for eg: https://www.verkkosivut.com',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '100%',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'post_type',
						'operator' => '==',
						'value' => get_field('sisaltotyypin_slug', 'option'),
					),
				),
			),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => true,
			'description' => '',
		));
								  
		/*
		*		CUSTOM TAXONOMIES
		*/

		if ( have_rows('mukautetut_taksonomiat', 'option') ) :
			while ( have_rows('mukautetut_taksonomiat', 'option') ) : the_row();
			
			$labels = array(
				'name'                       => _x( get_sub_field('taksonomian_nimi_monikko'), 'Taxonomy General Name', 'text_domain' ),
				'singular_name'              => _x( get_sub_field('taksonomian_nimi_yksikko'), 'Taxonomy Singular Name', 'text_domain' ),
				'menu_name'                  => __( get_sub_field('taksonomian_nimi_monikko'), 'text_domain' ),
				'all_items'                  => __( 'All Items', 'text_domain' ),
				'parent_item'                => __( 'Parent Item', 'text_domain' ),
				'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
				'new_item_name'              => __( 'New Item Name', 'text_domain' ),
				'add_new_item'               => __( 'Add New Item', 'text_domain' ),
				'edit_item'                  => __( 'Edit Item', 'text_domain' ),
				'update_item'                => __( 'Update Item', 'text_domain' ),
				'view_item'                  => __( 'View Item', 'text_domain' ),
				'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
				'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
				'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
				'popular_items'              => __( 'Popular Items', 'text_domain' ),
				'search_items'               => __( 'Search Items', 'text_domain' ),
				'not_found'                  => __( 'Not Found', 'text_domain' ),
				'no_terms'                   => __( 'No items', 'text_domain' ),
				'items_list'                 => __( 'Items list', 'text_domain' ),
				'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
			);
			$args = array(
				'labels'                     => $labels,
				'hierarchical'               => false,
				'public'                     => true,
				'show_ui'                    => true,
				'show_admin_column'          => true,
				'show_in_menu'				 =>	true,
				'show_in_nav_menus'          => true,
				'has_archive'				 =>	true,
				'show_tagcloud'              => true,
				'show_in_rest'               => true,
				'publicly_queryable'		 => true,
				'rewrite_with_front'		 => true,
			);
			register_taxonomy( get_sub_field('taksonomian_slug'), array( get_field('sisaltotyypin_slug', 'option') ), $args );
								  
			endwhile;
		endif;
								  
		endif;
		
		/* Pass variable to JS */
		wp_register_script( 'toimipaikkaScripts', plugin_dir_url( __DIR__ ) . 'public/js/leaflet-store-locator-public.js' );
		wp_enqueue_script( 'toimipaikkaScripts' );
		$toimipaikkaJS = array(
			'teksti' => get_field('ohjeteksti', 'option'),
		);
		wp_localize_script( 'toimipaikkaScripts', 'scripts', $toimipaikkaJS );

    }


	/**
	 * Renders store locator.
	*/
    public function store_locator() {

    	ob_start();
    	?>
			<!-- Main Form -->
			<div id="showapp" class="bootstrap">
				
				
				<div class="container-fluid">
				    <div class="row">
				    	<div class="col-md-4 text-center">
				    		<h2><?php echo get_field('hakukentan_otsikko', 'option'); ?> </h2>
				    		<div>
							<form role="form" id="mm_form" method="post" onsubmit="return false;">
								<input type="hidden" name="action" value="send_request" />
				    			<input id="leaflet_postal_code" name="leaflet_postal_code" value="" placeholder="<?php echo get_field('hakukentan_teksti', 'option'); ?>" />
				    			<div id="mm-records">
				    				<p><?php echo get_field("ohjeteksti", "option"); ?></p>
								</div>
							</form>
				    		</div>
				    	</div>
				    	<div class="col-md-8">
				    		<div id="mapid"></div>
				    	</div>
					</div>
				</div>

				
			</div>
			<script>
					var whiteIcon = L.divIcon({
						
						iconSize:     [28, 41], // size of the icon
						iconAnchor:   [12, 24], // point of the icon which will correspond to marker's location
						popupAnchor:  [0, -30], // point from which the popup should open relative to the iconAnchor
						html: '<i class="fas fa-map-marker-alt" style = "font-size: 30px; color: <?php echo get_field('ikonin_vari', 'option'); ?>"></i>',
					})
					
					/*var whiteIcon = L.icon({
						iconUrl: '<?php //echo get_site_url(); ?>/wp-content/plugins/leaflet-store-locator/public/images/white-pin.png',

						iconSize:     [28, 41], // size of the icon
						iconAnchor:   [13, 41], // point of the icon which will correspond to marker's location
						popupAnchor:  [0, -36], // point from which the popup should open relative to the iconAnchor
						html: '<span style="background-color:<?php echo get_field('ikonin_vari', 'option'); ?>" />'
					});*/

					var greenIcon = L.icon({
						iconUrl: '<?php echo get_site_url(); ?>/wp-content/plugins/leaflet-store-locator/public/images/green-pin.png',

						iconSize:     [28, 41], // size of the icon
						iconAnchor:   [13, 41], // point of the icon which will correspond to marker's location
						popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
					});
					
					var mymap = L.map('mapid').setView([60.1695583,24.9347579], 5);
					
	        		mymap.panBy(L.point(0, -130));
	        		<?php

	        		$args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
					$posts_per_page = -1;
					
					$queries = array();

			        $queries['post_type'] = get_field('sisaltotyypin_slug', 'option');
			        $queries['paged'] = $args['paged'];
			        $queries['posts_per_page'] = $posts_per_page;


					$loop = new WP_Query( $queries );
				    
				    if ( $loop->have_posts() ) {
						
					// Filter special characters from coords
					function RemoveSpecialChars($str) {
						$res = str_replace( array( '\'', '"', ',' , ';', '<', '>', '|' ), '', $str );
						return $res;
					}

				    ?>
					var markers = [
		   			<?php
		        	while ( $loop->have_posts() ) : $loop->the_post(); 
		        		if ( get_field('latitude') && get_field('longitude') ) :
						
						// Filter special chars from coords
						$long = RemoveSpecialChars( get_field('latitude') );
						$lat = RemoveSpecialChars( get_field('longitude') );
						
						echo "{ coords: [" . $long .", " . $lat ."], 
								uri: '#', 
								icon: whiteIcon, 
								popup: '<strong>" . get_field( "area" ) 
							."<br />" . 
							get_field( "name" ) 
							."</strong><br />" . 
							get_field( "address" ) 
							.", " . 
							get_field( "postal_code" ) .
							"<br /><a href=\" "  . get_permalink() . " \">Linkki</a>'},\n ";
						endif; 
	    			endwhile;
	    			?>
					];
						var x = markers.length;

						while(x--)
						{	
							var m = L.marker(markers[x].coords, {icon: markers[x].icon}).addTo(mymap),
								p = new L.Popup({ autoClose: true, closeOnClick: true })
										.setContent(markers[x].popup)
										.setLatLng(markers[x].coords);
							m.bindPopup(p);
// 							var m = L.marker(markers[x].coords, {icon: markers[x].icon}).on('click', function(e) {
// 								//window.location = markers[e.target._leaflet_id].uri;
// 								//markers[e.target._leaflet_id].bindPopup("This is the Transamerica Pyramid").openPopup();
// 							}).addTo(mymap)._leaflet_id = x;
						}

						
					<?php
					}
					?>

					L.tileLayer('https://api.mapbox.com/styles/v1/myyntimatti/<?php echo get_field('kartan_variteema', 'option'); ?>/tiles/256/{z}/{x}/{y}@2x?access_token=pk.eyJ1IjoibXl5bnRpbWF0dGkiLCJhIjoiY2pueWhteWdxMGkyNjN2bnhnNWc2ZTJxdiJ9.Ygqhrf050CThyuiUi8bnhg', {
						minZoom: 5,
						maxZoom: 20,
						attribution: 'Created by <strong><a href="https://myyntimaatio.fi" target="_blank" rel="noopener">Myyntimaatio</a></strong>',
						id: 'mapbox/streets-v11',
						tileSize: 512,
						zoomOffset: -1
					}).addTo(mymap);


				</script>
    	<?php
		wp_reset_postdata();
    	$content = ob_get_contents();
		ob_end_clean();
		return $content;
    }

	/**
	 * Ajax requests.
	*/
	public function send_request() {
		ob_start();
		$args['query_keyword'] = $_GET['leaflet_postal_code'];
		
		if( strlen(trim($_GET['leaflet_postal_code'])) < 2 ) return;
		
		if( $args['query_keyword'] == "" ) {
		?>
			<p><?php echo get_field("ohjeteksti", "option"); ?></p>
		<?php
		} else {
			$args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
			$posts_per_page = -1;
			$queries = array(
				'post_type' => get_field('sisaltotyypin_slug', 'option'),
				'posts_per_page' => -1,
			);
	        //$queries['post_type'] = get_field('sisaltotyypin_slug', 'option');
	       // $queries['posts_per_page'] = $posts_per_page;
			//$queries['meta_key'] = 'postal_code';
			//$queries['meta_value'] = $args['query_keyword'];
	        //$queries['paged'] = $args['paged'];

			$queries['meta_query']	= array(
				'relation'		=> 'OR',
					array(
						'key'	 	=> 'postal_code',
						'value' 	=> $args['query_keyword'],
						'compare' 		=> 'IN',
					),
					array(
						'key'	  	=> 'area',
						'value'	=> $args['query_keyword'],
						'compare' 		=> 'LIKE',
					),
					array(
						'key'	  	=> 'address',
						'value'	=> $args['query_keyword'],
						'compare' 		=> '==',
					),
					array(
						'key'	 	=> 'name',
						'value'	=> $args['query_keyword'],
						'compare' 		=> 'LIKE',
				)
            );
			/*$args = array(
				'post_type' 	=>	'kaupat',
				'meta_key'		=>	'postal_code',
				'meta_value'	=>	'00350',
			);
			$kukkuu = new WP_Query($args);
			var_dump($kukkuu);*/

			//$queries['s'] = $args['query_keyword'];
			$queries['s'] = $queries['meta_query'];
			$loop = new WP_Query( $queries );
			//var_dump($queries['meta_query']);
			
		    if ( $loop->have_posts() ) { ?>
			<div class="row">
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

		        	<div class="col-md-12">
		        		<div class="row story" data-point="<?php echo get_field( "latitude" ); ?>, <?php echo get_field( "longitude" ); ?>">
			        			<span class="area"><?php echo get_field( "area" ); ?></span>
			        			<span class="name"><?php echo get_field( "name" ); ?></span>
			        			<span class="address"><?php echo get_field( "address" ); ?></span>
			        			<span class="postal"><?php echo get_field( "postal_code" ); ?> <?php echo get_field( "area" ); ?></span>
								<?php if ( get_field('linkit_toimipisteille', 'option') == 1 ) : ?>
								<a href = "<?php echo get_permalink(); ?>" class = "mm-toimipaikkaLinkki">Linkki <?php echo get_field('sisaltotyypin_slug', 'option'); ?>-sivulle
									<i class = "fas fa-caret-right"></i>
								</a>
								<?php endif; ?>
		        		</div>
		        	</div>


		    <?php endwhile; ?>
			</div>
	    	<?php } else { ?>
				<p><?php echo get_field('ei_hakutuloksia', 'option') ?></p>
			<?php
		    }
		}
		
		wp_reset_postdata();
    	$content = ob_get_contents();
		ob_end_clean();
		wp_send_json_success($content);
	}
	
}