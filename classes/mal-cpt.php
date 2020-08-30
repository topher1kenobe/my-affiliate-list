<?php

/**
 * Instantiate the My_Affiliate_List_CPT instance
 * @since My_Affiliate_List_CPT 1.0
 */

class My_Affiliate_List_CPT {

	/**
	* Instance handle
	*
	* @static
	* @since 1.2
	* @var string
	*/
	private static $__instance = null;

	/**
	 * Constructor, actually contains nothing
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {
	}

	/*
	 * Instance initiator, runs setup etc.
	 *
	 * @static
	 * @access public
	 * @return self
	 */
	public static function instance() {
		if ( ! is_a( self::$__instance, __CLASS__ ) ) {
			self::$__instance = new self;
			self::$__instance->setup();
		}

		return self::$__instance;
	}

	/**
	 * Runs things that would normally be in __construct
	 *
	 * @access private
	 * @return void
	 */
	public function setup() {

		$this->affiliate_cpt();

	}

	/*
	 * Get the store hash
	 *
	 * @access private
	 * @return string $output
	 */
	// Register Custom Post Type
	public function affiliate_cpt() {

		$labels = array(
			'name'					=> _x( 'Affialiates', 'Post Type General Name', 'my_affiliates' ),
			'singular_name'			=> _x( 'Affiliate', 'Post Type Singular Name', 'my_affiliates' ),
			'menu_name'				=> __( 'Affiliates', 'my_affiliates' ),
			'name_admin_bar'		=> __( 'Affiliates', 'my_affiliates' ),
			'archives'				=> __( 'Affiliate Archives', 'my_affiliates' ),
			'attributes'			=> __( 'Affiliate Attributes', 'my_affiliates' ),
			'parent_item_colon'		=> __( 'Parent Affiliate:', 'my_affiliates' ),
			'all_items'				=> __( 'All Affiliates', 'my_affiliates' ),
			'add_new_item'			=> __( 'Add New Affiliate', 'my_affiliates' ),
			'add_new'				=> __( 'Add New Affiliate', 'my_affiliates' ),
			'new_item'				=> __( 'New Affiliate', 'my_affiliates' ),
			'edit_item'				=> __( 'Edit Affiliate', 'my_affiliates' ),
			'update_item'			=> __( 'Update Affiliate', 'my_affiliates' ),
			'view_item'				=> __( 'View Affiliate', 'my_affiliates' ),
			'view_items'			=> __( 'View Affiliates', 'my_affiliates' ),
			'search_items'			=> __( 'Search Affiliate', 'my_affiliates' ),
			'not_found'				=> __( 'Not found', 'my_affiliates' ),
			'not_found_in_trash'	=> __( 'Not found in Trash', 'my_affiliates' ),
			'featured_image'		=> __( 'Featured Image', 'my_affiliates' ),
			'set_featured_image'	=> __( 'Set featured image', 'my_affiliates' ),
			'remove_featured_image' => __( 'Remove featured image', 'my_affiliates' ),
			'use_featured_image'	=> __( 'Use as featured image', 'my_affiliates' ),
			'insert_into_item'		=> __( 'Insert into affiliate', 'my_affiliates' ),
			'uploaded_to_this_item' => __( 'Uploaded to this affiliate', 'my_affiliates' ),
			'items_list'			=> __( 'Affiliates list', 'my_affiliates' ),
			'items_list_navigation' => __( 'Affiliates list navigation', 'my_affiliates' ),
			'filter_items_list'		=> __( 'Filter affiliates list', 'my_affiliates' ),
		);
		$rewrite = array(
			'slug'					=> 'affiliates',
			'with_front'			=> true,
			'pages'					=> true,
			'feeds'					=> true,
		);
		$args = array(
			'label'					=> __( 'Affiliate', 'my_affiliates' ),
			'description'			=> __( 'Intended to be a list of affiliates', 'my_affiliates' ),
			'labels'				=> $labels,
			'supports'				=> array( 'title', 'editor', 'revisions', 'page-attributes', 'thumbnail' ),
			'hierarchical'			=> true,
			'public'				=> true,
			'show_ui'				=> true,
			'show_in_menu'			=> true,
			'show_in_rest'			=> true,
			'menu_position'			=> 25,
			'menu_icon'				=> 'dashicons-networking',
			'show_in_admin_bar'		=> true,
			'show_in_nav_menus'		=> true,
			'can_export'			=> true,
			'has_archive'			=> true,
			'exclude_from_search'	=> false,
			'publicly_queryable'	=> true,
			'rewrite'				=> $rewrite,
			'capability_type'		=> 'page',
			'taxonomies'            => [ 'affiliate_type' ]
		);
		register_post_type( 'my_affiliates', $args );

	}

}
?>
