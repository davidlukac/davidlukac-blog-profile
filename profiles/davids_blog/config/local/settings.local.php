<?php
/**
 * @file
 * Local settings.LOCAL.php.
 */

// Specify where's the secure folder located.
// Local location of secure folder.
define('CUSTOM_CONFIG_SECURE_ROOT', DRUPAL_ROOT . '/secret/');

// Setting Base URL - NO trailing slash!
$base_url = 'http://davidlukac.dd:8083';

// Setting cookie domain.
// $cookie_domain = '.davidlukac.com';

/**
 * Google Analytics.
 */
// DEV value.
$conf['googleanalytics_account'] = 'UA-32388620-2';

/**
 * Basic Drupal caching/performance settings.
 *
 * Force the caching to be DISABLED for local development environment.
 */
$conf['block_cache'] = 0;
$conf['cache'] = 0;
$conf['cache_lifetime'] = 0;
$conf['page_cache_maximum_age'] = 0;
$conf['page_compression'] = 0;
$conf['preprocess_css'] = 0;
$conf['preprocess_js'] = 0;
