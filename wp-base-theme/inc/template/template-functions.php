<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package wp_base_theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function wp_base_theme_body_classes($classes) {
    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    // Adds a class of no-sidebar when there is no sidebar present.
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    return $classes;
}

add_filter('body_class', 'wp_base_theme_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function wp_base_theme_pingback_header() {
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}

add_action('wp_head', 'wp_base_theme_pingback_header');


/**
 * Get the last compiled file from the static/assets folder.
 * @param string $path_to_style
 * @return array
 */
function get_compiled_style($path_to_style = '/static/assets/') {
    $url = get_template_directory() . '/webpack-bundle.json';
    $json_string = file_get_contents($url);
    $json = json_decode($json_string, true);
    $styles = ['js' => [], 'css' => []];
    foreach ($json['chunks']['storefront'] as $style) {
        $path = get_template_directory_uri() . $path_to_style . $style['name'];
        $pathinfo = pathinfo($path);
        $ext = $pathinfo['extension'];
        if (isset($styles[$ext])) {
            array_push($styles[$ext], array(
                'basename' => $pathinfo['basename'],
                'path' => $path
            ));
        } else {
            $styles[$ext] = array(
                'basename' => pathinfo($path, PATHINFO_BASENAME),
                'path' => $path
            );
        }
    }
    return $styles;
}
