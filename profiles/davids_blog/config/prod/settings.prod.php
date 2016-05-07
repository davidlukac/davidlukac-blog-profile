<?php
/**
 * @file
 * File settings.php for PRODUCTION environment.
 */

// Specify where's the secure folder located.
// Websupport.sk location of secure folder.
define('CUSTOM_CONFIG_SECURE_ROOT', DRUPAL_ROOT . '/../../secure/');

// Setting Base URL - NO trailing slash!
$base_url = 'http://davidlukac.com';

// Setting cookie domain.
// $cookie_domain = '.davidlukac.com';

/**
 * Google Analytics.
 */
// PROD value.
$conf['googleanalytics_account'] = 'UA-32388620-3';

/**
 * Basic Drupal caching/performance settings.
 *
 * Force the caching to be ENABLED for production development environment.
 */
$conf['block_cache'] = 1;
$conf['cache'] = 1;
$conf['cache_lifetime'] = 900;
$conf['page_cache_maximum_age'] = 32400;
$conf['page_compression'] = 1;
$conf['preprocess_css'] = 1;
$conf['preprocess_js'] = 1;
