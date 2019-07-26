<?php
/**
 *
 * =====================================
 * wp_base_theme functions and definitions
 * =====================================
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wp_base_theme
 */


/**
 * Function admin
 */
require get_template_directory() . '/inc/cleanup.php';

/**
 * Theme general
 */
require get_template_directory() . '/inc/template/template-general.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template/template-functions.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template/template-personalize.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/plugin/jetpack.php';
}

