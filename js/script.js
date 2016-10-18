/**
 * @file
 * A JavaScript file for the theme.
 *
 * In order for this JavaScript to be loaded on pages, see the instructions in
 * the README.txt next to this file.
 */

// JavaScript should be made compatible with libraries other than jQuery by
// wrapping it with an "anonymous closure". See:
// - https://drupal.org/node/1446420
// - http://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth
(function ($, Drupal, window, document, undefined) {

Drupal.behaviors.mainMenuSuperfish = {
  attach: function(context, settings) {

    var superfish_menu = $(".region-navigation .block__content > .menu");

    superfish_menu.addClass('sf-menu');
    superfish_menu.superfish({
      autoArrows:  false
    });
  }
};

Drupal.behaviors.responsiveSlides = {
    attach: function(context, settings) {

        $(".view-slideshow ul:not(.contextual-links)").responsiveSlides({
            "auto": false,
            "pager": true,         // Boolean: Show pager, true or false
            "pauseButton": false   // Boolean: Create Pause Button
        });

    }
};

Drupal.behaviors.mobileNavigation = {
  attach: function(context, settings) {
    // Vars
    var header, menu, menuRegion, menuButton;
    header = document.querySelector('.region-navigation');
    menu = document.querySelector('.sf-main-menu');
    menuRegion = document.querySelector('.block-superfish');
    menuButton = document.createElement('button');

    // Button properties
    menuButton.classList.add('navigation-mobile__button');
    menuButton.setAttribute('id', 'navigation-mobile__button');
    menuButton.setAttribute('aria-label', 'Menu');
    menuButton.setAttribute('aria-expanded', 'false');
    menuButton.setAttribute('aria-controls', 'menu');
    menuButton.innerHTML = '<span aria-hidden="true">&#x2261;</span>';

    // Menu properties.
    menu.setAttribute('aria-hidden', 'true');
    menu.setAttribute('aria-labelledby', 'menu-button');

    // Add button to page.
    header.insertBefore(menuButton, menuRegion);

    // Handle button click event.
    menuButton.addEventListener('click', function () {
      // If active...
      if (menu.classList.contains('is-expanded')) {
        // Hide
        menu.classList.remove('is-expanded');
        menu.setAttribute('aria-hidden', 'true');
        menuButton.setAttribute('aria-expanded', 'false');
      }
      else {
        // Show
        menu.classList.add('is-expanded');
        menu.setAttribute('aria-hidden', 'false');
        menuButton.setAttribute('aria-expanded', 'true');
      }
    }, false);
  }
};


})(jQuery, Drupal, this, this.document);
