<?php

/*
 * Plugin Name:       ZS Social Chat
 * Plugin URI:        https://wordpress.org/plugins/zs-social-chat/
 * Description:       ZS Social Chat will allow you to add & customize chat button in the bottom of your site. Clicking the button will redirect your website users to your whatsapp.
 * Version:           1.0.1
 * Requires at least: 5.2
 * Requires PHP:      7.3
 * Author:            ZS Software Studio
 * Author URI:        https://studio.zarifprogrammer.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       zswwc
 */


/**
 * Redirection to settings page after activation
 */
function zswwc_activation_redirect($plugin)
{
    if ($plugin == plugin_basename(__FILE__)) {
        $settings_url = esc_url(add_query_arg(
            'page',
            'zs-social-chat',
            get_admin_url() . 'admin.php'
        ));

        exit(wp_redirect($settings_url));
    }
}
add_action('activated_plugin', 'zswwc_activation_redirect');

/**
 * Settings Page Link in Plugins Page
 */
function zswwc_settings_link($links)
{
    $url = esc_url(add_query_arg(
        'page',
        'zs-social-chat',
        get_admin_url() . 'admin.php'
    ));
    $settings_link = "<a href='$url'>" . __('Settings') . '</a>';
    array_push(
        $links,
        $settings_link
    );
    return $links;
}
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'zswwc_settings_link');


/**
 * Plugin's Admin Page Content
 */
include_once plugin_dir_path(__FILE__) . 'zswwc-plugin-admin.php';

/**
 * Plugin's Home Page Content
 */
include_once plugin_dir_path(__FILE__) . 'zswwc-plugin-home.php';
