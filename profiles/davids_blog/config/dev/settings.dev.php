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

/**
 * Memcache settings.
 */
// Indicator whether we need special prefix handling for broken memcache lib.
$memcache_broken_lib = TRUE;
$memcache_module_path = 'profiles/davids_blog/modules/contrib/memcache/';
// Move all cached data (except form cache) to memcache storage.
$conf['cache_backends'][] = $memcache_module_path . 'memcache.inc';
$conf['cache_default_class'] = 'MemCacheDrupal';
$conf['cache_class_cache_form'] = 'DrupalDatabaseCache';
$conf['cache_class_cache_update'] = 'DrupalDatabaseCache';

// Do not connect to the database when serving cached page for anonymous users.
$conf['page_cache_invoke_hooks'] = FALSE;
$conf['page_cache_without_database'] = TRUE;

// Set unique prefix for our site.
// The prefix should match the domain on WebSupport.
$conf['memcache_key_prefix'] = 'dev.davidlukac.com';

// Move storage for lock system into memcached.
$conf['lock_inc'] = $memcache_module_path . 'memcache-lock.inc';

// Move storage for sessions into memcached.
$conf['session_inc'] = $memcache_module_path . 'unstable/memcache-session.inc';

// Stampede protection.
// Stampede protection seems to be causing:
// "WD memcache: Bootstrap failed in lockInit(),
// lock_acquire() is not available. (phase:3)".
// @see https://www.drupal.org/node/2599126
// @see https://www.drupal.org/node/2376391
$conf['memcache_stampede_protection'] = FALSE;
