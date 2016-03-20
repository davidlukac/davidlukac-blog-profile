<?php
/**
 * @file
 * Theme class file.
 */

namespace davidlukac\drupal_oop;

/**
 * Class Theme.
 *
 * @package davidlukac\drupal_oop
 */
class Theme {

  private $name = '';

  /**
   * Theme constructor.
   *
   * @param string $name
   *   Theme name.
   */
  public function __construct($name) {
    $this->name = $name;
  }

  /**
   * Enable the theme.
   */
  public function enable() {
    theme_enable(array($this->name));
    drupal_theme_rebuild();
  }

  /**
   * Performs a check whether a theme was enabled.
   *
   * @return bool
   *   TRUE if the theme was enabled, false otherwise.
   */
  public function checkIfEnabled() {
    $themes = list_themes(TRUE);
    $enabled = FALSE;
    if (array_key_exists($this->name, $themes)) {
      $enabled = TRUE;
    }
    return $enabled;
  }

}
