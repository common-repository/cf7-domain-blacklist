<?php
defined("ABSPATH") or exit;

function cf7_domain_blacklist_is_blocked_domain($email, $domains)
{
    $blocked = array_map("trim", explode(",", $domains));
    list($user, $domain) = explode("@", $email);
    if (in_array($domain, $blocked)) {
        return true;
    }
    return false;
}

function cf7_domain_blacklist_email_validation_filter($result, $tag)
{
    if ($tag["type"] == "email" || $tag["type"] == "email*") {
        $email_address = $_POST[$tag["name"]];
        $settings = get_option(CF7_DOMAIN_BL_PREFIX);
        if (cf7_domain_blacklist_is_blocked_domain($email_address, $settings["domains"])) {
            $result->invalidate($tag, $settings["alert"]);
        };
    };
    return $result;
}
add_filter("wpcf7_validate_email", "cf7_domain_blacklist_email_validation_filter", 10, 2);
add_filter("wpcf7_validate_email*", "cf7_domain_blacklist_email_validation_filter", 10, 2);
