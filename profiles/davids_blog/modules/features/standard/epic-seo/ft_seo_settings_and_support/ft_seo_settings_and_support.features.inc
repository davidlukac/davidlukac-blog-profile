<?php
/**
 * @file
 * ft_seo_settings_and_support.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function ft_seo_settings_and_support_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}
