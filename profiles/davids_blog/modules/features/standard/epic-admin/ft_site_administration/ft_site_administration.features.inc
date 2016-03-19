<?php
/**
 * @file
 * ft_site_administration.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function ft_site_administration_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}
