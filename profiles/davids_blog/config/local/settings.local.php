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

/**
 * Memcache settings.
// */
$memcache_storage_path = 'profiles/davids_blog/modules/contrib/memcache_storage/';
// Move all cached data (except form cache) to memcache storage.
$conf['cache_backends'][] = $memcache_storage_path . 'memcache_storage.inc';
$conf['cache_default_class'] = 'MemcacheStorage';
$conf['cache_class_cache_form'] = 'DrupalDatabaseCache';
$conf['cache_class_cache_update'] = 'DrupalDatabaseCache';

// Advanced usage of Drupal page cache.
$conf['cache_backends'][] = $memcache_storage_path . 'memcache_storage.page_cache.inc';
$conf['cache_class_cache_page'] = 'MemcacheStoragePageCache';

// Do not connect to the database when serving cached page for anonymous users.
$conf['page_cache_invoke_hooks'] = FALSE;
$conf['page_cache_without_database'] = TRUE;

// Open persistent memcached connection.
$conf['memcache_storage_persistent_connection'] = TRUE;

// Set unique prefix for our site.
$conf['memcache_storage_key_prefix'] = 'davidllukac-com-local';

// Move storage for lock system into memcached.
$conf['lock_inc'] = $memcache_storage_path . 'includes/lock.inc';

// Move storage for sessions into memcached.
$conf['session_inc'] = $memcache_storage_path . 'includes/session.inc';

// Set correct memcache server.
$conf['memcache_servers'] = array(
  'memcache_srv:32768' => 'default',
);
