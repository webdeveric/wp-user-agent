<?php
/*
Plugin Name: WP User Agent
Description:
Version: 0.2.0
Author: Eric King
Author URI: http://webdeveric.com/
*/

namespace webdeveric\WPUserAgent;

const WP_USER_AGENT_FILE = __FILE__;
const OPTION_NAME = 'wp_user_agent';

include __DIR__ . '/src/functions.php';

\add_filter('http_request_args', __NAMESPACE__ . '\useCustomUserAgent', 10, 2);
\add_filter('site_option_' . OPTION_NAME, __NAMESPACE__ . '\filterCustomUserAgent', 10, 3);
\add_filter('network_admin_plugin_action_links_' . \plugin_basename(WP_USER_AGENT_FILE), __NAMESPACE__ . '\addActionLink', 10, 1);
\add_filter('plugin_row_meta', __NAMESPACE__ . '\pluginMeta', 10, 2);

\register_activation_hook(WP_USER_AGENT_FILE, __NAMESPACE__ . '\activate');
\register_deactivation_hook(WP_USER_AGENT_FILE, __NAMESPACE__ . '\deactivate');
