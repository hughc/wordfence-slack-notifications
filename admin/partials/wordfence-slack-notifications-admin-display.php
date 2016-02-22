<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://highbrow.com.au/
 * @since      1.0.0
 *
 * @package    Wordfence_Slack_Notifications
 * @subpackage Wordfence_Slack_Notifications/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<h1>Wordfence Slack Notifications</h1>

<form action="options.php" method="post">
<?php
    settings_fields( $this->plugin_name );
    do_settings_sections( $this->plugin_name );
    submit_button();
?>
</form>

