<?php

/*
Plugin Name: Contact Form 7 Domain Blacklist
Description: Create a blacklist of prohibited domains integrated with the Contact Form 7 plugin.
Version: 1.1.3
Author: Ademir Diniz
Author URI: https://www.ademirdiniz.com.br/
Text Domain: cf7-domain-blacklist
Domain Path: /languages
*/

defined('ABSPATH') or exit;
define('CF7_DOMAIN_BL_DIR', plugin_dir_path(__FILE__));
define('CF7_DOMAIN_BL_URL', plugins_url('', __FILE__));
define('CF7_DOMAIN_BL_PREFIX', 'cf7-domain-blacklist');

register_activation_hook(__FILE__, 'cf7_domain_blacklist_install');
function cf7_domain_blacklist_install()
{
    require_once(CF7_DOMAIN_BL_DIR . '/install.php');
}

register_uninstall_hook(__FILE__, 'cf7_domain_blacklist_uninstall');
function cf7_domain_blacklist_uninstall()
{
    require_once(CF7_DOMAIN_BL_DIR . '/uninstall.php');
}

add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'cf7_domain_blacklist_install_action_Links', 10, 2 );
function cf7_domain_blacklist_install_action_Links($links)
{
    $settings_link = '<a href="' . esc_url(get_admin_url(null, 'admin.php?page=cf7_domain_blacklist_settings')) . '">' . esc_attr__("Settings", "mpwp_forms") . '</a>';

    array_unshift($links, $settings_link);
    return $links;
}

add_action('admin_enqueue_scripts', function () {
    wp_register_style('cf7-domain-blacklist-styles-css', CF7_DOMAIN_BL_URL . '/assets/css/styles.css', false);
    wp_enqueue_style('cf7-domain-blacklist-styles-css');
    wp_register_style('cf7-domain-blacklist-custom-css', CF7_DOMAIN_BL_URL . '/assets/css/custom.css', false);
    wp_enqueue_style('cf7-domain-blacklist-custom-css');
    wp_register_style('cf7-domain-blacklist-font-awesome-css', CF7_DOMAIN_BL_URL . '/assets/css/font-awesome.min.css', false);
    wp_enqueue_style('cf7-domain-blacklist-font-awesome-css');
    wp_register_script('cf7-domain-blacklist-bootstrap-js', CF7_DOMAIN_BL_URL . '/assets/js/bootstrap.min.js', array('jquery'));
    wp_enqueue_script('cf7-domain-blacklist-bootstrap-js');
    wp_register_script('cf7-domain-blacklist-validate-js', CF7_DOMAIN_BL_URL . '/assets/js/jquery.validate.min.js', array('jquery'));
    wp_enqueue_script('cf7-domain-blacklist-validate-js');
    wp_register_script('cf7-domain-blacklist-default-js', CF7_DOMAIN_BL_URL . '/assets/js/default.js', array('jquery'));
    wp_enqueue_script('cf7-domain-blacklist-default-js');
});

if (!is_admin()) {
    require_once CF7_DOMAIN_BL_DIR . '/includes/functions.php';
} else {
    require_once(CF7_DOMAIN_BL_DIR . 'includes/admin/menus.php');
    require_once(CF7_DOMAIN_BL_DIR . 'includes/admin/settings.php');
}
