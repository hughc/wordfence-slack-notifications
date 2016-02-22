<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://highbrow.com.au/
 * @since      1.0.0
 *
 * @package    Wordfence_Slack_Notifications
 * @subpackage Wordfence_Slack_Notifications/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wordfence_Slack_Notifications
 * @subpackage Wordfence_Slack_Notifications/includes
 * @author     Hugh Campbell <hc@highbrow.com.au>
 */
class Wordfence_Slack_Notifications_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wf-slack-notifications',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
