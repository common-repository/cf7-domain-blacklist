<?php
defined('ABSPATH') or exit;

add_action('admin_menu', 'cf7_domain_blacklist_menu', 9, 1);
function cf7_domain_blacklist_menu()
{
    global $_wp_last_object_menu;

    $_wp_last_object_menu++;

    add_menu_page(
        __('Contact Form 7 Domain Blacklist', 'cf7-domain-blacklist'),
        __('Contact Blacklist', 'cf7-domain-blacklist'),
        'manage_options',
        'cf7_domain_blacklist_settings',
        'cf7_domain_blacklist_settings',
        'dashicons-email',
        $_wp_last_object_menu
    );
}
