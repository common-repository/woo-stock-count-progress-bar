<?php
/**
 * Plugin Name: Product stock count progress bar for Woocommerce
 * Description: This plugin will show product stock counts on the shop page and in product single page.
 * Plugin URI: https://codewithmehedi.com/
 * Version: 1.1.1
 * Author: Mehedi Hasan
 * Author URI: https://codewithmehedi.com/contact/
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: scfwc
 * Domain Path: /languages
 *
 * @package SCFWC
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Check if WooCommerce is active
 */
if ( ! in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

	add_action(
		'admin_notices',
		function() {
			echo '<div class="notice notice-error"><p>' . esc_html__( 'Stock Status Bar For Woocommerce requires WooCommerce to be installed and active. You can download', 'scfwc' ) . ' <a href="https://woocommerce.com/" target="_blank">WooCommerce</a> ' . esc_html__( 'here.', 'scfwc' ) . '</p></div>';
		}
	);
	return;

}

/**
 * Initialize the plugin tracker
 *
 * @return void
 */
function appsero_init_tracker_woo_stock_count_progress_bar() {

	if ( ! class_exists( 'Appsero\Client' ) ) {
		require_once __DIR__ . '/inc/appsero/Client.php';
	}

	$client = new Appsero\Client( '47de1042-6ff5-407c-9d68-0bb0f32c7553', 'Stock Status Bar for Woocommerce', __FILE__ );

	// Active insights
	$client->insights()->init();
}

appsero_init_tracker_woo_stock_count_progress_bar();



/**
 * Add setting links for plugin
 */
function scfwc_settings_link( $links ) {
	$settings_link = '<a href="admin.php?page=wc-settings&tab=stock_counts_setting_tab">Settings</a>';
	array_unshift( $links, $settings_link );
	return $links;
}
$plugin = plugin_basename( __FILE__ );
add_filter( "plugin_action_links_$plugin", 'scfwc_settings_link' );

// require plugin scripts and styles from inc folder
require_once plugin_dir_path( __FILE__ ) . 'inc/stock-scripts.php';

// require admin settings file
require_once plugin_dir_path( __FILE__ ) . 'admin/stock-counts-settings.php';

// require stock-counts-controllers from inc folder
require_once plugin_dir_path( __FILE__ ) . 'inc/stock-counts-controllers.php';

