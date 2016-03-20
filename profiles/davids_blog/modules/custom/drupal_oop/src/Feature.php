<?php
/**
 * @file
 * Feature class file.
 */

namespace davidlukac\drupal_oop;

/**
 * Class Feature.
 *
 * @package davidlukac\drupal_oop
 */
class Feature extends Module {

  /**
   * Reverts given component of `this` Feature.
   *
   * @param string $component
   *   Component name to revert.
   *   Examples:
   *     - variable.
   */
  public function revert($component) {
    features_revert(array(static::getName() => array($component)));
  }

}
