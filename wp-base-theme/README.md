
WP Base Theme
===

Starter theme for WordPress with Bootstrap integration.
 
* A just right amount of lean, well-commented, modern, HTML5 templates.
* A helpful 404 template.
* A custom header implementation in `inc/custom-header.php` just add the code snippet found in the comments of `inc/custom-header.php` to your `header.php` template.
* Custom template tags in `inc/template-tags.php` that keep your templates clean and neat and prevent code duplication.
* Some small tweaks in `inc/template-functions.php` that can improve your theming experience.
* A script at `js/navigation.js` that makes your menu a toggled dropdown on small screens (like your phone), ready for CSS artistry. It's enqueued in `functions.php`.
* 2 sample CSS layouts in `layouts/` for a sidebar on either side of your content.
Note: `.no-sidebar` styles are not automatically loaded.
* Smartly organized starter CSS in `style.css` that will help you to quickly get your design off the ground.
* Full support for `WooCommerce plugin` integration with hooks in `inc/woocommerce.php`, styling override woocommerce.css with product gallery features (zoom, swipe, lightbox) enabled.
* Licensed under GPLv2 or later. :) Use it to make something cool.

Getting Started
---------------

Download `wp-base-theme` from GitHub. The first thing you want to do is copy the `wp-base-theme` directory and change the name to something else (like, say, `megatherium-is-awesome`), and then you'll need to do a five-step find and replace on the name in all the templates.

1. Search for: `'wp-base-theme'` and replace with: `'megatherium-is-awesome'`.
2. Search for: `wp_base_theme_` and replace with: `megatherium_is_awesome_`.
3. Search for: `Text Domain: wp-base-theme` and replace with: `Text Domain: megatherium-is-awesome` in `style.css`.
4. Search for: ` wp_base_theme` and replace with: ` megatherium_is_awesome`.
5. Search for: `wp-base-theme-` and replace with: `megatherium-is-awesome-`.

Then, update the stylesheet header in `style.css`, the links in `footer.php` with your own information and rename `wp-base-theme.pot` from `languages` folder to use the theme's slug. Next, update or delete this readme.

3. `npm install`
4. `npm run build` or `npm run watch`

### Distribution
1. `npm run dist`

Now you're ready to go! The next step is easy to say, but harder to do: make an awesome WordPress theme. :)

Good luck!


References
---------------
wp-base-theme was created by using the underscores theme: https://github.com/Automattic/_s
