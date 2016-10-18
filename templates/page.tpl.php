<?php
/**
 * @file
 * Returns the HTML for a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728148
 */
?>

<div class="layout-centered page-wrapper">
  <header class="header" role="banner">
    <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="header__logo"><img src="<?php print $logo; ?>" alt="<?php print t('ASADA - Australian Sports Anti‑Doping Authority website'); ?>" class="header__logo-image" /></a>

    <div class="header__name-and-slogan element-invisible">
      <h1 class="header__site-name">
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" class="header__site-link" rel="home"><span><?php print $site_name; ?></span></a>
      </h1>

      <?php if ($site_slogan): ?>
        <div class="header__site-slogan"><?php print $site_slogan; ?></div>
      <?php endif; ?>
    </div>

    <nav class="header__secondary-menu" role="navigation">
      <?php print theme('links__system_secondary_menu', array(
        'links' => $secondary_menu,
        'attributes' => array(
          'class' => array(
            'header__secondary-menu-list',
          ),
        ),
        'heading' => array(
          'text' => isset($secondary_menu_heading) ? $secondary_menu_heading : '',
          'level' => 'h2',
          'class' => array('element-invisible'),
        ),
      )); ?>
    </nav>

    <?php print render($page['header']); ?>
  </header>

  <?php print render($page['navigation']); ?>

  <?php
  // Render the sidebar to see if there's anything in them.
  $sidebar  = render($page['sidebar']);

  $layout = $sidebar ? 'layout-sidebar' : 'layout-full';
  ?>

  <?php print render($page['highlighted']); ?>
  <?php print $breadcrumb; ?>
  <div class="<?php print $layout; ?> sharing__container">

    <div class="<?php print $layout; ?>__main main-content" role="main">
      <div class="skip-link">
        <a href="#skip-link" class="element-focusable" id="main-content">Back to top</a>
      </div>
      <?php print render($title_prefix); ?>
      <?php if ($title): ?>
        <h1 class="page__title title" id="page-title"><?php print $title; ?></h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php print $messages; ?>
      <?php print render($tabs); ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
      <?php print $feed_icons; ?>
    </div>

    <?php if ($sidebar): ?>
      <aside class="<?php print $layout; ?>__sidebar" role="complementary">
        <?php print $sidebar; ?>
      </aside>
    <?php endif; ?>

  </div>

  <?php print render($page['footer_top']); ?>
  <?php print render($page['footer_bottom']); ?>

</div>

<?php print render($page['bottom']); ?>
