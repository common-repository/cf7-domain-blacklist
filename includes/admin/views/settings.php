<?php defined('ABSPATH') or exit; ?>

<div class="cf7_domain_blacklist">
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-xs-6">
                    <h1><?php esc_attr_e('Settings', 'cf7-domain-blacklist'); ?></h1>
                </div>
                <div class="col-lg-6 col-sm-6 col-xs-6 text-right">
                    <ul class="breadcrumb">
                        <li class="active"><?php esc_attr_e('Contact Form 7 Domain Blacklist', 'cf7-domain-blacklist'); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <?php settings_errors(); ?>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><?php esc_attr_e('Blocked domains', 'cf7-domain-blacklist'); ?></h3>
            </div>
            <div class="panel-body">
                <form method="post" class="validate">
                    <div class="form-group">
                        <label class="control-label" for="domains"><?php esc_attr_e('Domains (comma-separated)', 'cf7-domain-blacklist'); ?></label>
                        <textarea class="form-control" rows="3" name="cf7db_update_settings[domains]" id="domains" placeholder="<?php esc_attr_e('E.g.: gmail.com, hotmail.com, uol.com.br', 'cf7-domain-blacklist'); ?>" required data-msg="<?php esc_attr_e('Please enter the domains.', 'cf7-domain-blacklist'); ?>"><?php echo esc_attr(isset($settings[domains]) ? $settings[domains] : '') ?></textarea>
                        <span class="help-block"><?php esc_attr_e('Enter the domains you want to block separated by commas.', 'cf7-domain-blacklist'); ?></span>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="alert"><?php esc_attr_e('Message', 'cf7-domain-blacklist'); ?></label>
                        <input type="text" class="form-control" name="cf7db_update_settings[alert]" id="alert" required data-msg="<?php esc_attr_e('Please enter the message.', 'cf7-domain-blacklist'); ?>" value="<?php echo esc_attr(isset($settings[alert]) ? $settings[alert] : esc_attr_e('Domain not permitted', 'cf7-domain-blacklist')) ?>" />
                        <span class="help-block"><?php esc_attr_e('Enter the message should be shown when a domain is not allowed.', 'cf7-domain-blacklist'); ?></span>
                    </div>

                    <div class="form-group">
                        <?php wp_nonce_field('update_settings', '_cf7_domain_blacklist_nonce'); ?>
                        <button type="submit" name='cf7_domain_blacklist_update_settings' class="btn btn-primary"><?php esc_attr_e('Save', 'cf7-domain-blacklist'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
