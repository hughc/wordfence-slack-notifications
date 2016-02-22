<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://highbrow.com.au/
 * @since      1.0.0
 *
 * @package    Wordfence_Slack_Notifications
 * @subpackage Wordfence_Slack_Notifications/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wordfence_Slack_Notifications
 * @subpackage Wordfence_Slack_Notifications/admin
 * @author     Hugh Campbell <hc@highbrow.com.au>
 */
class Wordfence_Slack_Notifications_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;
	/*
	* The options name to be used in this plugin
	 *
	 * @since  	1.0.0
	 * @access 	private
	 * @var  	string 		$option_name 	Option name of this plugin
	 */
	public $option_name = 'wf_slack_notifications';

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}
	/*
	* Add an options page under the Settings submenu
	*
	* @since  1.0.0
	*/
	public function add_options_page() {
	
		$this->plugin_screen_hook_suffix = add_options_page(
			__( 'Wordfence Slack Notifications Settings', 'wf-slack-notifications' ),
			__( 'Wordfence Slack Notifications', 'wf-slack-notifications' ),
			'manage_options',
			$this->plugin_name,
			array( $this, 'display_options_page' )
		);
	
	}

/**
	 * Render the options page for plugin
	 *
	 * @since  1.0.0
	 */
	public function display_options_page() {
		include_once 'partials/wordfence-slack-notifications-admin-display.php';
	}

	public function register_setting() {
		// Add a General section
		add_settings_section(
			$this->option_name . '_general',
			__( 'General', 'wf-slack-notifications' ),
			array( $this, $this->option_name . '_general_cb' ),
			$this->plugin_name
		);

		$apiKeyId = $this->option_name . '_api_key';
		$channelName = $this->option_name . '_channel';

		add_settings_field(
			$apiKeyId,
			__( 'API Key', 'wf-slack-notifications' ),
			array( $this, $apiKeyId . '_cb' ),
			$this->plugin_name,
			$this->option_name . '_general',
			array( 'label_for' => $apiKeyId )
		);

		add_settings_field(
			$channelName,
			__( 'Channel', 'wf-slack-notifications' ),
			array( $this, $channelName . '_cb'),
			$this->plugin_name,
			$this->option_name . '_general',
			array( 'label_for' => $channelName )
		);

		register_setting( $this->plugin_name, $apiKeyId, 'sanitize_text_field' );
		register_setting( $this->plugin_name, $channelName, 'sanitize_text_field' );
	}

	public function wf_slack_notifications_general_cb() {
		echo '<p>' . __( 'Please change the settings accordingly.', 'wf-slack-notifications' ) . '</p>';
	}

	public function wf_slack_notifications_api_key_cb() {
		$oName = $this->option_name . '_api_key';
		$value = get_option($oName, '');
		?>
		<fieldset>
				<input type="text" name='<?php echo $oName ?>' id="<?php echo $oName ?>" value='<? echo $value; ?>' placeholder="put your Slack API key here" class="regular-text" />
				<span class='description'>you can get an API key from <a target="_blank" href="https://api.slack.com/web">Slack</a></span>
		</fieldset>
		<?php
	}

	public function wf_slack_notifications_channel_cb() {
		$oName = $this->option_name . '_channel';
		$value = get_option($oName, '');
		?>

		<fieldset>
				<input type="text" name='<?php echo $oName ?>' id="<?php echo $oName ?>" value='<? echo $value; ?>' placeholder="general" class="regular-text" />
				<span class='description'>no need to include the hash ( # )</span>
		</fieldset>
		<?php
	}

	/**
	 * Sanitize the text position value before being saved to database
	 *
	 * @param  string $position $_POST value
	 * @since  1.0.0
	 * @return string           Sanitized value
	 */
	public function wf_slack_notifications_sanitize_position( $position ) {
		if ( in_array( $position, array( 'before', 'after' ), true ) ) {
	        return $position;
	    }
	}

/*
	**
	 * Render the radio input field for position option
	 *
	 * @since  1.0.0
	 */
	public function wf_slack_notifications_cb() {
		?>
			<fieldset>
				<label>
					<input type="radio" name="<?php echo $this->option_name . '_position' ?>" id="<?php echo $this->option_name . '_position' ?>" value="before">
					<?php _e( 'Before the content', 'outdated-notice' ); ?>
				</label>
				<br>
				<label>
					<input type="radio" name="<?php echo $this->option_name . '_position' ?>" value="after">
					<?php _e( 'After the content', 'outdated-notice' ); ?>
				</label>
			</fieldset>
		<?php
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wordfence_Slack_Notifications_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wordfence_Slack_Notifications_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wordfence-slack-notifications-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wordfence_Slack_Notifications_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wordfence_Slack_Notifications_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wordfence-slack-notifications-admin.js', array( 'jquery' ), $this->version, false );

	}

}
