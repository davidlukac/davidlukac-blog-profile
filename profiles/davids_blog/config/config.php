<?php
/**
 * @file
 * Config loader.
 *
 * This file is included in all `settings.php` files and the configuration
 * splits from here.
 */

// This can be: LOCAL, DEV, STAGE, UAT, PROD.
// For special needs on different DB handling on Websupport environment, this
// can also be e.g. PROD-DRUSH ord DEV-DRUSH, etc.
// Variable `CUSTOM_CONFIG_ENV` is defined in `settings.php` for each
// environment.
$custom_config_env = strtolower(CUSTOM_CONFIG_ENV);
// Root of configuration files.
$custom_config_root = '/profiles/davids_blog/config';
// Common settings applied to all environments.
$custom_config_common_settings_php = '/common/settings.common.php';
// Including `settings.ENV.php` for given environment.
$custom_config_settings_env_php = '/' . $custom_config_env . '/settings.' . $custom_config_env . '.php';

require DRUPAL_ROOT . $custom_config_root . $custom_config_common_settings_php;
require DRUPAL_ROOT . $custom_config_root . $custom_config_settings_env_php;

require DRUPAL_ROOT . $custom_config_root . '/common/prepare-secure.php';

require CUSTOM_CONFIG_SECURE_ROOT . $custom_config_common_settings_php;
require CUSTOM_CONFIG_SECURE_ROOT . $custom_config_settings_env_php;
