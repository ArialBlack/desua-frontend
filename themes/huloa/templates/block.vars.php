<?php
/**
 * @file
 * Stub file for "block" theme hook [pre]process functions.
 */

/**
 * Pre-processes variables for the "block" theme hook.
 *
 * See template for list of available variables.
 *
 * @see block.tpl.php
 *
 * @ingroup theme_preprocess
 */
function huloa_preprocess_block(&$variables) {
  // Use a bare template for the page's main content.
  if ($variables['block_html_id'] == 'block-system-main') {
    $variables['theme_hook_suggestions'][] = 'block__no_wrapper';
  }
  $variables['title_attributes_array']['class'][] = 'block-title';

  // When block is displayed in footer
  switch ($variables['block']->region) {
    case 'footer':
      $list_count = &drupal_static(__FUNCTION__);

      if (!isset($list_count)) {
        $list = block_list('footer');
        $list_count = count($list);
      }

      switch ($list_count) {
        case 1:
        case 2:
        case 3:
        case 4:
        case 6:
          $variables['classes_array'][] = 'col-sm-'. (12/$list_count);
          break;

        default:
          $variables['classes_array'][] = 'col-sm-4';
          break;
      }
      break;

    case 'logo':
      $variables['elements']['#block']->subject = '';
      $variables['content'] = '<div class="block-content">'. $variables['content'] .'</div>';
      break;

    case 'main_menu':
      $variables['elements']['#block']->subject = '';
      break;
  }

}
