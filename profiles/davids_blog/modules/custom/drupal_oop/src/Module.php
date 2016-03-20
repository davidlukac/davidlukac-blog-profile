<?php
/**
 * @file
 * Module class file.
 */

namespace davidlukac\drupal_oop;

/**
 * Class Module.
 *
 * @package davidlukac\drupal_oop
 */
class Module {

  // Override module name in the child class.
  protected static $name = '';

  /**
   * Module constructor.
   */
  public function __construct() {
  }

  /**
   * Module name getter.
   *
   * @return string
   *   Module name.
   */
  public static function getName() {
    return static::$name;
  }

}
