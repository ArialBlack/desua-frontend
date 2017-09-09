<?php
/**
 * @file
 * Stub file for "region" theme hook [pre]process functions.
 */

/**
 * Pre-processes variables for the "region" theme hook.
 *
 * See template for list of available variables.
 *
 * @see region.tpl.php
 *
 * @ingroup theme_preprocess
 */
function huloa_preprocess_region(&$variables) {
  global $theme;

  $region = $variables['region'];
  $classes = &$variables['classes_array'];

  switch ($region) {
    case 'navigation':
      $classes[] = 'navbar-nav';
      $classes[] = 'navbar-right';
      break;

    case 'main_menu':
      $classes[] = 'navbar-nav';
      break;
  }
}
