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
 * Include CPT class
 */
if ( file_exists( plugin_dir_path( __FILE__ ) . 'classes/mal-cpt.php' ) ) {
	require_once plugin_dir_path( __FILE__ ) . 'classes/mal-cpt.php';
}

?>
