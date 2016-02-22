<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://highbrow.com.au/
 * @since             1.0.0
 * @package           Wordfence_Slack_Notifications
 *
 * @wordpress-plugin
 * Plugin Name:       Wordfence Slack Notification
 * Plugin URI:        http://highbrow.com.au/wordfence-slack-notifications
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Hugh Campbell
 * Author URI:        http://highbrow.com.au/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wordfence-slack-notifications
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wordfence-slack-notifications-activator.php
 */
function activate_wordfence_slack_notifications() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wordfence-slack-notifications-activator.php';
	Wordfence_Slack_Notifications_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wordfence-slack-notifications-deactivator.php
 */
function deactivate_wordfence_slack_notifications() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wordfence-slack-notifications-deactivator.php';
	Wordfence_Slack_Notifications_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wordfence_slack_notifications' );
register_deactivation_hook( __FILE__, 'deactivate_wordfence_slack_notifications' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wordfence-slack-notifications.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wordfence_slack_notifications() {

	$plugin = new Wordfence_Slack_Notifications();
	$plugin->run();

}
run_wordfence_slack_notifications();
