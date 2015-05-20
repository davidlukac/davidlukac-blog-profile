<?php
/**
 * @file
 * Enables modules and site configuration for a minimal site installation.
 */

/**
 * Implements hook_form_FORM_ID_alter() for install_configure_form().
 *
 * Allows the profile to alter the site configuration form.
 */
function davids_blog_form_install_configure_form_alter(&$form, $form_state) {
  $form['site_information']['site_name']['#default_value'] = 'Blog of David Lukac';
  $form['site_information']['site_mail']['#default_value'] = 'david.lukac@gmail.com';
  $form['admin_account']['account']['name']['#default_value'] = 'superdivide';
  $form['admin_account']['account']['mail']['#default_value'] = 'david.lukac@gmail.com';
  $form['admin_account']['account']['pass']['#type'] = 'hidden';
  $form['admin_account']['account']['pass']['#required'] = FALSE;
  $form['server_settings']['site_default_country']['#default_value'] = 'SK';
  $form['server_settings']['date_default_timezone']['#default_value'] = "Europe/Bratislava";
  $form['server_settings']['date_default_timezone']['#attributes'] = NULL;
  $form['update_notifications']['update_status_module']['#default_value'] = array(0, 0);
}

/**
 * Implements hook_install_tasks_alter().
 *
 * @inheritdoc
 */
function davids_blog_install_tasks_alter(&$tasks, &$install_state) {
  // So far nothing here.
}
