<?php
/**
 * Plugin Name:      فعال سازی فارسی ساز
 * Plugin URI:        https://wpvar.com/wp-shamsi
 * Description:       اقدام به فعال سازی فارسی ساز بعد نصب وردپرس می کند. بعد نصب وردپرس می توانید از پوشه "wp-content/mu-plugins/wpsh.php" حذف کنید.
 * Version:           1.0.0
 * Requires at least: 4
 * Requires PHP:      5.3
 * Author:            wpvar.com
 * Author URI:        https://wpvar.com/
 * License:           GNU Public License v3.0
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:       wpsh
 * @package WPSH
 */

defined('ABSPATH') or die();

if (!get_option('wpsh_active'))
{
    add_action('init', 'wpsh_activate');
}

function wpsh_activate()
{

    include ABSPATH . 'wp-admin/includes/plugin.php';

    $plugin = 'wp-shamsi/wp-shamsi.php';
    $current = get_option('active_plugins');
    $plugin = plugin_basename(trim($plugin));

    if (!in_array($plugin, $current))
    {
        $current[] = $plugin;
        sort($current);
        do_action('activate_plugin', trim($plugin));
        update_option('active_plugins', $current);
        do_action('activate_' . trim($plugin));
        do_action('activated_plugin', trim($plugin));
    }

    update_option('wpsh_active', true);

    return null;
}

