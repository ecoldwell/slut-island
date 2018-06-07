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
// require get_template_directory() . '/inc/editor.php';
// function revcon_change_post_label() {
//     global $menu;
//     global $submenu;
//     $menu[5][0] = 'Locations';
//     $submenu['edit.php'][5][0] = 'Locations';
//     $submenu['edit.php'][10][0] = 'Add Location';
//     $submenu['edit.php'][16][0] = 'Locations Tags';
// }
// function revcon_change_post_object() {
//     global $wp_post_types;
//     $labels = &$wp_post_types['post']->labels;
//     $labels->name = 'Locations';
//     $labels->singular_name = 'Locations';
//     $labels->add_new = 'Add Location';
//     $labels->add_new_item = 'Add Location';
//     $labels->edit_item = 'Edit Location';
//     $labels->new_item = 'Locations';
//     $labels->view_item = 'View Locations';
//     $labels->search_items = 'Search Locations';
//     $labels->not_found = 'No Locations found';
//     $labels->not_found_in_trash = 'No Locations found in Trash';
//     $labels->all_items = 'All Locations';
//     $labels->menu_name = 'Locations';
//     $labels->name_admin_bar = 'News';
// }

// add_action( 'admin_menu', 'revcon_change_post_label' );
add_action( 'init', 'revcon_change_post_object' );
function add_custom_taxonomies() {
  // Add new "Locations" taxonomy to Posts
  register_taxonomy('city', 'post', array(
    // Hierarchical taxonomy (like categories)
    'hierarchical' => true,
    // This array of options controls the labels displayed in the WordPress Admin UI
    'labels' => array(
      'name' => _x( 'City', 'taxonomy general name' ),
      'singular_name' => _x( 'City', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search City' ),
      'all_items' => __( 'All Cities' ),
      'parent_item' => __( 'Parent City' ),
      'parent_item_colon' => __( 'Parent City:' ),
      'edit_item' => __( 'Edit City' ),
      'update_item' => __( 'Update City' ),
      'add_new_item' => __( 'Add New City' ),
      'new_item_name' => __( 'New City Name' ),
      'menu_name' => __( 'Cities' ),
    ),
    // Control the slugs used for this taxonomy
    'rewrite' => array(
      'slug' => 'cities', // This controls the base slug that will display before each term
      'with_front' => false, // Don't display the category base before "/locations/"
      'hierarchical' => true, // This will allow URL's like "/locations/boston/cambridge/"
      'publicly_queryable'    => true,
    ),
    'show_admin_column' => true,
    'show_in_nav_menus' => true
  ));
}
  add_action( 'init', 'add_custom_taxonomies', 0 );
  function add_custom_taxonomies1() {
  register_taxonomy('activity', 'post', array(
    // Hierarchical taxonomy (like categories)
    'hierarchical' => true,
    // This array of options controls the labels displayed in the WordPress Admin UI
    'labels' => array(
      'name' => _x( 'Activity', 'taxonomy general name' ),
      'singular_name' => _x( 'Activity', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Activity' ),
      'all_items' => __( 'All Activity' ),
      'parent_item' => __( 'Parent Activity' ),
      'parent_item_colon' => __( 'Parent Activity:' ),
      'edit_item' => __( 'Edit Activity' ),
      'update_item' => __( 'Update Activity' ),
      'add_new_item' => __( 'Add New Activity' ),
      'new_item_name' => __( 'New Activity Name' ),
      'menu_name' => __( 'Activities' ),
    ),
    // Control the slugs used for this taxonomy
    'rewrite' => array(
      'slug' => 'activities', // This controls the base slug that will display before each term
      'with_front' => false, // Don't display the category base before "/locations/"
      'hierarchical' => true,
      'publicly_queryable'    => true,// This will allow URL's like "/locations/boston/cambridge/"
    ),
    'show_admin_column' => true,
  ));
}
add_action( 'init', 'add_custom_taxonomies1');

add_filter('show_admin_bar', '__return_false');

function unregister_tags() {
    unregister_taxonomy_for_object_type( 'post_tag', 'post' );
}
add_action( 'init', 'unregister_tags' );

function unregister_category() {
    unregister_taxonomy_for_object_type( 'category', 'post' );
}
add_action( 'init', 'unregister_category' );

function remove_max_srcset_image_width( $max_width ) {
    return false;
}
add_filter( 'max_srcset_image_width', 'remove_max_srcset_image_width' );

add_image_size( '600w', 600, 1200 );
add_image_size( '1500w', 1500, 3000 );
add_image_size( '2000w', 2000, 2000 );
add_image_size( '2500w', 2500, 5000 );

function getPostIdsForTaxonomyAndTerm($taxonomyName, $termSlug) {
  return get_posts(array(
    'numberposts'   => -1, // get all posts.
    'tax_query'     => array(
        array(
            'taxonomy'  => $taxonomyName,
            'field'     => 'slug',
            'terms'     => $termSlug
        ),
    ),
    'fields'        => 'ids', // Only get post IDs
  ));
}

function renderDropdown($terms, $label, $isActiveTaxonomy, $currentTermSlug, $linkSuffix, $termIDsToAllowSecondaryLinking, $clearSecondaryURL, $bothMenusActive, $oneMenuActive) {
  ?>

    <div class="dropdown">

    <label>
      <?php echo $label; ?>
      <!-- <?php if ($isActiveTaxonomy && $clearSecondaryURL) {echo '<a class="clear" href="'.$clearSecondaryURL.'">✕</a>';} ?> -->
    </label>
    <ul class="dropdown-items <?php if (!$isActiveTaxonomy){ ?> secondary-items <?php }?>">
      <?php foreach ($terms as $term) : ?>

        <?php
          $allowSecondaryLinking = $termIDsToAllowSecondaryLinking && count($termIDsToAllowSecondaryLinking) > 0 && in_array($term->term_id, $termIDsToAllowSecondaryLinking);
          $isActiveItem = $isActiveTaxonomy && $term->slug == $currentTermSlug;
          if ($oneMenuActive) {
            $willBreakSecondaryLink =  (!$isActiveTaxonomy || $bothMenusActive) && !$allowSecondaryLinking;
          }

          if (!$isActiveTaxonomy && $allowSecondaryLinking) {
            $link = "?" . $term->taxonomy . "=" . $term->slug;
          } else {
            $link = get_term_link($term);
            if ($linkSuffix && $allowSecondaryLinking) {
              $link = $link.$linkSuffix;
            }
          };
        ?>
        <li class="<?php if ($willBreakSecondaryLink) {?>will-break-secondary-link<?php } ?>">
          <a href="<?php echo $link ?>" class="dropdown-link <?php if ($isActiveItem) { ?>active<?php }?> <?php if ($willBreakSecondaryLink) {?>will-break-secondary-link<?php } ?>">
            <?php echo $term->name ?>
          </a>
          <?php if ($isActiveItem && $clearSecondaryURL) {echo '<a class="clear" title="Clear this parameter" href="'.$clearSecondaryURL.'">✕</a>';} ?>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
  <?php
}

require_once get_template_directory() . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'robbins_locations_register_required_plugins' );

function robbins_locations_register_required_plugins() {
  /*
   * Array of plugin arrays. Required keys are name and slug.
   * If the source is NOT from the .org repo, then source is also required.
   */
  $plugins = array(
    array(
      'name'      => 'Attachments',
      'slug'      => 'attachments',
      'required'  => true,
    ),
    array(
      'name'      => 'WP Term Images',
      'slug'      => 'wp-term-images',
      'required'  => true,
    ),
    array(
      'name'      => 'WP Term Order',
      'slug'      => 'wp-term-order',
      'required'  => true,
    ),
  );

  $config = array(
    'id'           => 'robbins-locations',                 // Unique ID for hashing notices for multiple instances of TGMPA.
    'default_path' => '',                      // Default absolute path to bundled plugins.
    'menu'         => 'tgmpa-install-plugins', // Menu slug.
    'parent_slug'  => 'themes.php',            // Parent menu slug.
    'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
    'has_notices'  => true,                    // Show admin notices or not.
    'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
    'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
    'is_automatic' => false,                   // Automatically activate plugins after installation or not.
    'message'      => '',                      // Message to output right before the plugins table.
  );

  tgmpa( $plugins, $config );
}
