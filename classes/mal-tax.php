<?php

/**
 * Instantiate the My_Affiliate_List_Tax instance
 * @since My_Affiliate_List_Tax 1.0
 */

class My_Affiliate_List_Tax {

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

		$this->affiliate_tax();

	}

	/*
	 * Get the store hash
	 *
	 * @access private
	 * @return string $output
	 */
	// Register Custom Post Type
	public function affiliate_tax() {

		$labels = array(
			'name'                       => _x( 'Affiliate Types', 'Taxonomy General Name', 'my_affiliates' ),
			'singular_name'              => _x( 'Affiliate Type', 'Taxonomy Singular Name', 'my_affiliates' ),
			'menu_name'                  => __( 'Affiliate Types', 'my_affiliates' ),
			'all_items'                  => __( 'All Types', 'my_affiliates' ),
			'parent_item'                => __( 'Parent Type', 'my_affiliates' ),
			'parent_item_colon'          => __( 'Parent Type:', 'my_affiliates' ),
			'new_item_name'              => __( 'New Type Name', 'my_affiliates' ),
			'add_new_item'               => __( 'Add New Type', 'my_affiliates' ),
			'edit_item'                  => __( 'Edit Type', 'my_affiliates' ),
			'update_item'                => __( 'Update Type', 'my_affiliates' ),
			'view_item'                  => __( 'View Type', 'my_affiliates' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'my_affiliates' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'my_affiliates' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'my_affiliates' ),
			'popular_items'              => __( 'Popular Types', 'my_affiliates' ),
			'search_items'               => __( 'Search Types', 'my_affiliates' ),
			'not_found'                  => __( 'Not Found', 'my_affiliates' ),
			'no_terms'                   => __( 'No items', 'my_affiliates' ),
			'items_list'                 => __( 'Types list', 'my_affiliates' ),
			'items_list_navigation'      => __( 'Types list navigation', 'my_affiliates' ),
		);
		$rewrite = array(
			'slug'                       => 'type',
			'with_front'                 => true,
			'hierarchical'               => false,
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'show_in_rest'			     => true,
			'rewrite'                    => $rewrite,
		);
		register_taxonomy( 'affiliate_type', array( 'my_affiliates' ), $args );

	}

}
?>
