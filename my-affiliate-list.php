<?php
/*
Plugin Name: My Affiliate List
Description: Creates a customs post type to hold all of your affliate relationship information, and create a list of them for  large block in pages.
Version: 1.0
Author: Topher
Author URI: http://topher1kenobe.com
License: GPLv3+
License URI: https://www.gnu.org/licenses/gpl-3.0.en.html
*/

/**
 * Instantiate the My_Affiliate_List instance
 * @since My_Affiliate_List 1.0
 */
add_action( 'init', [ 'My_Affiliate_List', 'instance' ] );

class My_Affiliate_List {

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
			self::$__instance->class_init();
			self::$__instance->get_local_auth_token();
		}

		return self::$__instance;
	}

	/*
	 * Get the store hash
	 *
	 * @access private
	 * @return string $output
	 */
	private function bc_get_store_hash() {

		$url = get_option( 'bigcommerce_store_url' );

		preg_match( '#stores/([^\/]+)/#', $url, $matches );
		if ( empty( $matches[ 1 ] ) ) {
			$output = '';
		} else {
			$output = $matches[ 1 ];
		}

		return $output;

	}

}
?>
