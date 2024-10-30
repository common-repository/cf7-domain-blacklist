<?php
defined('ABSPATH') or exit;

global $wp_version;

if (!is_plugin_active('contact-form-7/wp-contact-form-7.php')) {
    wp_die(esc_attr__('This plugin cannot be used without the Contact Form 7 plugin. Please install and activate it before proceeding.', 'cf7-domain-blacklist'));
}
