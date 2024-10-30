<?php
defined('ABSPATH') or exit;

function cf7_domain_blacklist_settings()
{
    $settings = get_option(CF7_DOMAIN_BL_PREFIX);
    require_once(CF7_DOMAIN_BL_DIR . 'includes/admin/views/settings.php');
}

add_action('admin_init', 'cf7_domain_blacklist_settings_callback');
function cf7_domain_blacklist_settings_callback()
{
    if (!empty($_POST) && isset($_POST['cf7db_update_settings'])) {
        check_admin_referer('update_settings', '_cf7_domain_blacklist_nonce');
        $settings = stripslashes_deep($_POST['cf7db_update_settings']);

        if (update_option(CF7_DOMAIN_BL_PREFIX, $settings)) {
            add_settings_error(
                'cf7db_update_settings',
                'form-saved',
                __("Changes saved successfully.", "cf7-domain-blacklist"),
                'updated'
            );
        } else {
            add_settings_error(
                'cf7db_update_settings',
                'form-saved',
                __("Couldn't save. Please try again.", "cf7-domain-blacklist"),
                'update-nag'
            );
        }
    }
}
