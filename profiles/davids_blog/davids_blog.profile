<?php
/**
 * @file
 * Enables modules and site configuration for a minimal site installation.
 */

/**
 * Including Pre- and Post- install hooks functionality.
 */
if (!function_exists('site_install_hooks_initialize')) {
  require_once 'libraries/site_install_hooks/site_install_hooks.inc';
}

site_install_hooks_initialize('davids_blog');
