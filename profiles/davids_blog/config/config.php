<?php
/**
 * @file
 * Config loader.
 */

$custom_config_env = strtolower(CUSTOM_CONFIG_ENV);
$custom_config_general_settings_root = '/profiles/davids_blog/config';
$custom_config_common_settings_php = '/common/settings.common.php';
$custom_config_settings_env_php = '/' . $custom_config_env . '/settings.' . $custom_config_env . '.php';

require DRUPAL_ROOT . $custom_config_general_settings_root . $custom_config_common_settings_php;
require DRUPAL_ROOT . $custom_config_general_settings_root . $custom_config_settings_env_php;

require DRUPAL_ROOT . $custom_config_general_settings_root . '/common/prepare-secure.php';

require CUSTOM_CONFIG_SECURE_ROOT . $custom_config_common_settings_php;
require CUSTOM_CONFIG_SECURE_ROOT . $custom_config_settings_env_php;
