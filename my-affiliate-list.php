<?php
/*
Plugin Name: My Affiliate List
Description: Creates a customs post type to hold all of your affliate relationship information, and create a list of them for  large block in pages.
Version: 1.0
Author: Topher
Author URI: http://topher1kenobe.com
Text Domain: my-affiliates
Domain Path: /languages/
License: GPLv3+
License URI: https://www.gnu.org/licenses/gpl-3.0.en.html
*/

/**
 * Require metabox.io
 *
 * @since My_Affiliate_List_Tax 1.0
 */
if ( file_exists( plugin_dir_path( __FILE__ ) . 'classes/class-tgm-plugin-activation.php' ) ) {
	include_once plugin_dir_path( __FILE__ ) . 'classes/class-tgm-plugin-activation.php';
	add_action( 'tgmpa_register', 'My_Affiliate_List_Meta::register_required_plugins' );
}

/**
 * Prepare for internationalization
 *
 * @since My_Affiliate_List_CPT
 */
function mal_load_text_domain() {
	load_plugin_textdomain( 'my-affiliates', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'mal_load_text_domain' );

/**
 * Instantiate instance of My Affiliate Taxonomy
 *
 * @since My_Affiliate_List_Tax 1.0
 */
if ( file_exists( plugin_dir_path( __FILE__ ) . 'classes/mal-tax.php' ) ) {
	include_once plugin_dir_path( __FILE__ ) . 'classes/mal-tax.php';
	add_action( 'init', array( 'My_Affiliate_List_Tax', 'instance' ) );
}

/**
 * Instantiate instance of My Affiliate CPT
 *
 * @since My_Affiliate_List_CPT 1.0
 */
if ( file_exists( plugin_dir_path( __FILE__ ) . 'classes/mal-cpt.php' ) ) {
	include_once plugin_dir_path( __FILE__ ) . 'classes/mal-cpt.php';
	add_action( 'init', array( 'My_Affiliate_List_CPT', 'instance' ) );
}


/**
 * Instantiate instance of My Affiliate Columns
 *
 * @since My_Affiliate_List_Columns 1.0
 */
if ( file_exists( plugin_dir_path( __FILE__ ) . 'classes/mal-columns.php' ) ) {
	include_once plugin_dir_path( __FILE__ ) . 'classes/mal-columns.php';
	add_action( 'init', array( 'My_Affiliate_List_Columns', 'instance' ) );
}

/**
 * Instantiate instance of My Affiliate Meta Boxes
 *
 * @since My_Affiliate_List_Meta 1.0
 */
if ( file_exists( plugin_dir_path( __FILE__ ) . 'classes/mal-meta.php' ) ) {
	include_once plugin_dir_path( __FILE__ ) . 'classes/mal-meta.php';
	add_action( 'init', array( 'My_Affiliate_List_Meta', 'instance' ) );
}


add_filter( 'post_type_link', function( $url, $post ) {
        if ( is_admin() || 'my-affiliates' != $post->post_type ) {
                return $url;
        }

        $id = $post;
        if ( is_object( $post ) ) {
                $id = $post->ID;
        }

        $get_url = get_post_meta( $id, 'mal-mal_affiliate_link', true );
        if ( ! empty( $get_url ) ) {
                $url = $get_url;
        }
        return $url;

}, 99999, 2 );

function mal_pre_sort( $query ) {
	if ( ! is_admin() && $query->is_main_query() ) {
		// Not a query for an admin page.
		// It's the main query for a front end page of your site.

		if ( is_post_type_archive( 'my-affiliates' ) ) {
			// Let's change the query for category archives.
			$query->set( 'posts_per_page', -1 );
			$query->set( 'nopaging', 1 );
			$query->set( 'orderby', 'title' );
			$query->set( 'order', 'ASC' );
		}
	}
}
add_action( 'pre_get_posts', 'mal_pre_sort' );
