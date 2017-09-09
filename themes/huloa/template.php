<?php
/**
 * @file
 * The primary PHP file for this theme.
 */
function huloa_form_alter(&$form, &$form_state, $form_id) {
  switch ($form_id) {
    // Language dropdown - add flag
    case 'lang_dropdown_form':
      $languages = language_list();

      $form['lang_dropdown_select']['#attributes']['class'][] = 'selectpicker';
      $form['lang_dropdown_select']['#attributes']['data-width'] = 'fit';
      unset($form['lang_dropdown_select']['#suffix']);

      foreach ($form['lang_dropdown_select']['#options'] as $lng => $lng_txt) {
        $language = $languages[$lng];
        $icon = theme('languageicons_icon', array(
          'language' => $language,
          'title' => check_plain($language->name),
        ));
        $form['lang_dropdown_select']['#options_attributes'][$lng] = array(
          'data-content' => $icon . $lng_txt,
        );
      };
      break;
  }
}

function huloa_menu_link__main_menu($variables)
{
  $element = $variables['element'];
  $sub_menu = '';

  if ($element['#below']) {
    // Prevent dropdown functions from being added to management menu so it
    // does not affect the navbar module.
    if (($element['#original_link']['menu_name'] == 'management') && (module_exists('navbar'))) {
      $sub_menu = drupal_render($element['#below']);
    } /*elseif ((!empty($element['#original_link']['depth'])) && $element['#original_link']['depth'] > 1) {
      // Add our own wrapper.
      unset($element['#below']['#theme_wrappers']);
      $sub_menu = '<ul class="dropdown-menu">' . drupal_render($element['#below']) . '</ul>';
      $element['#title'] .= ' <span class="caret"></span>';
      $element['#attributes']['class'][] = 'dropdown-submenu';
      $element['#localized_options']['html'] = TRUE;
      $element['#localized_options']['attributes']['class'][] = 'dropdown-toggle';
      $element['#localized_options']['attributes']['data-toggle'] = 'dropdown';
    }*/ else {
      unset($element['#below']['#theme_wrappers']);
      $sub_menu = '<ul class="dropdown-menu-xp">' . drupal_render($element['#below']) . '</ul>';
      $element['#title'] .= ' <span class="caret glyphicon glyphicon-menu-down"></span>';
      $element['#attributes']['class'][] = 'dropdown';
      $element['#localized_options']['html'] = TRUE;
      $element['#localized_options']['attributes']['class'][] = 'dropdown-toggle-xp';
      //$element['#localized_options']['attributes']['data-toggle'] = 'dropdown';
    }
  }
  if (($element['#href'] == $_GET['q'] || ($element['#href'] == '<front>' && drupal_is_front_page())) && (empty($element['#localized_options']['language']))) {
    $element['#attributes']['class'][] = 'active';
  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}


