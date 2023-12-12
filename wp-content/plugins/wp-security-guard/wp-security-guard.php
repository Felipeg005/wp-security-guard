<?php

/**
 * Bootstrap
 *
 * classes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @since             1.0.0
 * @package           WP_Security_Guard
 *
 * @wordpress-plugin
 * Plugin Name:       WP Security Guard
 * Description:       Rest assured, WP Security Guard is vigilant, even when you're not. Unlike other plugins that constantly bombard you with notifications, 
 * 					  WP Security Guard operates silently, monitoring your website's activity in the background.
 *
 * Version:           1.0.0
 * Author:            JFDev
 * Author URI:        https://juanfelipedev.com/
 * License:           GPL-2.0+
 * Text Domain:       wp/security-guard
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Currently plugin version.
 */
define( 'WP_Security_Guard_VERSION', '1.0.0' );

/**
 * Activate plugin
 */
function activate_WP_Security_Guard() {
	require_once plugin_dir_path( __FILE__ ) . 'classes/class-wp-security-guard-activator.php';
	WP_Security_Guard_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in classes/class-wp-security-guard-deactivator.php
 */
function deactivate_WP_Security_Guard() {
	require_once plugin_dir_path( __FILE__ ) . 'classes/class-wp-security-guard-deactivator.php';
	WP_Security_Guard_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_WP_Security_Guard' );
register_deactivation_hook( __FILE__, 'deactivate_WP_Security_Guard' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'classes/class-wp-security-guard.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_WP_Security_Guard() {

	$plugin = new WP_Security_Guard();
	$plugin->run();

}
run_WP_Security_Guard();