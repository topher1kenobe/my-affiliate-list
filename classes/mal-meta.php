<?php

/**
 * Instantiate the My_Affiliate_List_Meta instance
 * @since My_Affiliate_List_Meta 1.0
 */

class My_Affiliate_List_Meta {

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

		add_filter( 'rwmb_meta_boxes', [ $this, 'affiliate_meta' ], 1 );

	}

	/*
	 * Register the meta box and fields
	 *
	 * @access public
	 * @return string $output
	 */
	public function affiliate_meta( $meta_boxes ) {

		$prefix = 'mal-';

		$meta_boxes[] = [
			'title'      => esc_html__( 'Affiliate Links', 'my-affiliates' ),
			'id'         => 'affiliate_links',
			'post_types' => [ 'my-affiliates' ],
			'context'    => 'normal',
			'priority'   => 'high',
			'autosave'   => true,
			'fields'     => [
				[
					'type' => 'text',
					'id'   => $prefix . 'mal_affiliate_link',
					'name' => esc_html__( 'Affiliate Link', 'my-affiliates' ),
				],
				[
					'type' => 'text',
					'id'   => $prefix . 'mal_affiliate_admin',
					'name' => esc_html__( 'Link Admin', 'my-affiliates' ),
				],
			],
		];

		return $meta_boxes;

	}

}
?>
