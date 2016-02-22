## Wordfence Slack Notifications
This is a proof-of-concept plugin to demonstrate the value of adding a few simple hooks to Wordfence to allow 3rd-party reporting services.

If you find yourself managing a number of sites, and thus swimming in a sea of emails from Wordfence, a few of which are of interest, others that are not, then aggregating that data into a feed that can be more easily parsed may be of value.

It *does not work* with vanilla Wordfence. It requires [this fork](https://github.com/hughc/wordfence-with-notifications) that I created to demonstrate that adding a set of simple action hooks does not require a massive amount of code.

It is not, at this point, recommended for production sites. If there is interest, I will consider tightening both it and its dependant parent plugin up.

### Usage
Once activated (alongside [Wordfence With Notifications](https://github.com/hughc/wordfence-with-notifications)), proceed to Settings > Wordfence Slack Notifications and enter a valid [Slack API Access Token](https://api.slack.com/web) and the channel to which you want to post.

The plugin posts to Slack when a matching action hook is fired. You can test that the integration you have set up is working, by using the 'send test email' function in the Settings screen  [Wordfence With Notifications](https://github.com/hughc/wordfence-with-notifications). You should see a Slack post as follows:

[[https://github.com/hughc/wordfence-slack-notifications/raw/master/images/screenshot.png|alt=screenhot from Slack]]

### Code
The code is based on Wordpress Plugin Boilerplate, and [this gist](https://gist.github.com/nadar/68a347d2d1de586e4393) for posting to the Slack API.
