<?php
/**
 * @file
 * File settings.php for development environment.
 */

// Specify where's the secure folder located.
// Websupport.sk location of secure folder.
define('CUSTOM_CONFIG_SECURE_ROOT', DRUPAL_ROOT . '/../../secure/');

// Setting Base URL - NO trailing slash!
$base_url = 'http://dev.davidlukac.com';

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
 * DO NOT enforce the caching for the development environment, so we can play.
 *
 * @code
 *
 * $conf['block_cache'] = 1;
 * $conf['cache'] = 1;
 * $conf['cache_lifetime'] = 900;
 * $conf['page_cache_maximum_age'] = 32400;
 * $conf['page_compression'] = 1;
 * $conf['preprocess_css'] = 1;
 * $conf['preprocess_js'] = 1;
 *
 * @codeend
 */
