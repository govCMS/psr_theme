<?php
/**
 * @file
 * Box style.
 */

// Plugin definition.
$plugin = array(
  'title' => t('3 column layout'),
  'description' => t('Arranges the panes in a 3 column grid.'),
  'render region' => 'sport_3col_layout_region',
);

/**
 * Render callback.
 *
 * @ingroup themeable
 */
function theme_sport_3col_layout_region($vars) {
  return '<div class="layout-sport-3col">' . implode($vars['panes']) . '</div>';
}
