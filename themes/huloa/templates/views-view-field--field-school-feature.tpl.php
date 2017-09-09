<?php
/**
* @file
* This template is used to print a single field in a view.
*
* It is not actually used in default Views, as this is registered as a theme
* function which has better performance. For single overrides, the template is
* perfectly okay.
*
* Variables available:
* - $view: The view object
* - $field: The field handler object that can process the input
* - $row: The raw SQL result that can be used
* - $output: The processed output that will normally be used.
*
* When fetching output from the $row, this construct should be used:
* $data = $row->{$field->field_alias}
*
* The above will guarantee that you'll always get the correct data,
* regardless of any changes in the aliasing that might happen if
* the view is modified.
*/

$field_info = field_info_field('field_school_feature');
$field_info_values = $field_info['settings']['allowed_values'];
$data = $row->field_field_school_feature;
?>
<ul>
    <?php foreach ($data as $delta => $item): ?>
      <?php
      $key = array_search($item['rendered']['#markup'], $field_info_values);
      $class = $key ? $key : '';
      $class = drupal_html_class($class);
      ?>
      <li class="field-item field-school-feature field-school-feature-<?php print $class; ?>"><?php print $item['rendered']['#markup']; ?></li>
    <?php endforeach; ?>
</ul>
