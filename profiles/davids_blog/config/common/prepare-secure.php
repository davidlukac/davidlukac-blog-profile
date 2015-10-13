<?php

/**
 * @file
 * Preparation before secure configuration.
 *
 * You can do common tasks here, that are related to secure configuration. Do
 * not store sensitive information here though!
 */

// Include secure salt.
$drupal_hash_salt = file_get_contents(CUSTOM_CONFIG_SECURE_ROOT . '/common/salt.txt');
