<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

/**
 * Theme setup and custom theme supports.
 */
require get_template_directory() . '/inc/setup.php';

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Load functions to secure your WP install.
 */
require get_template_directory() . '/inc/security.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/pagination.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom WordPress nav walker.
 */
require get_template_directory() . '/inc/bootstrap-wp-navwalker.php';

/**
 * Load WooCommerce functions.
 */
require get_template_directory() . '/inc/woocommerce.php';

/**
 * Load Editor functions.
 */
require get_template_directory() . '/inc/editor.php';
function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Artists';
    $submenu['edit.php'][5][0] = 'Artists';
    $submenu['edit.php'][10][0] = 'Add Artist';
    $submenu['edit.php'][16][0] = 'Artist Tags';
}
function revcon_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Artists';
    $labels->singular_name = 'Artists';
    $labels->add_new = 'Add Artist';
    $labels->add_new_item = 'Add Artist';
    $labels->edit_item = 'Edit Artist';
    $labels->new_item = 'Artists';
    $labels->view_item = 'View Artists';
    $labels->search_items = 'Search Artists';
    $labels->not_found = 'No Artists found';
    $labels->not_found_in_trash = 'No Artists found in Trash';
    $labels->all_items = 'All Artists';
    $labels->menu_name = 'Artists';
    $labels->name_admin_bar = 'News';
}

add_action('wp_enqueue_scripts', 'load_my_script');