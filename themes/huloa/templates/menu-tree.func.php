<?php
/**
 * @file
 * Stub file for bootstrap_menu_tree() and suggestion(s).
 */

/**
 * Returns HTML for a wrapper for a menu sub-tree.
 *
 * @param array $variables
 *   An associative array containing:
 *   - tree: An HTML string containing the tree's items.
 *
 * @return string
 *   The constructed HTML.
 *
 * @see template_preprocess_menu_tree()
 * @see theme_menu_tree()
 *
 * @ingroup theme_functions
 */

/**
 * Bootstrap theme wrapper function for the secondary menu links.
 */
function huloa_menu_tree__secondary(&$variables) {
  return '<ul class="menu nav navbar-nav navbar-right menu-secondary">' . $variables['tree'] . '</ul>';
}

function huloa_menu_tree(&$variables) {
  return '<ul class="menu nav navbar-nav">' . $variables['tree'] . '</ul>';
}
