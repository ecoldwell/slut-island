<header id="main-header" class="sticky">
  <h1>
    <a href="http://www.slutislandfestival.com/">SLUT ISLAND</a>
  </h1>



<?php
    $taxonomyQueries = $wp_query->tax_query->queries;


    if ($taxonomyQueries OR is_home()) {
      $activityTerms = get_terms( array(
          'taxonomy' => 'activity',
          'hide_empty' => true,
      ));

      $cityTerms = get_terms( array(
          'taxonomy' => 'city',
          'hide_empty' => true,
      ));

      foreach($taxonomyQueries as $taxArray) {
        if ($taxArray["taxonomy"] == "activity") {
          $activityActive = true;
          $activityActiveTermSlug = $taxArray["terms"][0];
          $activityActiveTerm = get_term_by('slug', $activityActiveTermSlug, "activity");
          $activityActivePostIDs = getPostIdsForTaxonomyAndTerm('activity', $activityActiveTermSlug);
          $activityActiveValidCityTerms = wp_get_object_terms($activityActivePostIDs, 'city');
          $activityActiveValidCityTermIDs = wp_list_pluck($activityActiveValidCityTerms, 'term_id');
        }

        if ($taxArray["taxonomy"] == "city") {
          $cityActive = true;
          $cityActiveTermSlug = $taxArray["terms"][0];
          $cityActiveTerm = get_term_by('slug', $cityActiveTermSlug, "city");
          $cityActivePostIDs = getPostIdsForTaxonomyAndTerm('city', $cityActiveTermSlug);
          $cityActiveValidActivityTerms = wp_get_object_terms($cityActivePostIDs, 'activity');
          $cityActiveValidActivityTermIDs = wp_list_pluck($cityActiveValidActivityTerms, 'term_id');
        }

        if ($cityActive) {
          $cityActiveClearSecondaryURL = get_term_link($cityActiveTerm);
        }


        if ($activityActive) {
          $activityActiveClearSecondaryURL = get_term_link($activityActiveTerm);
        }

        if ($cityActive && $activityActive) {
          $bothMenusActive = true;
        } else if ($cityActive || $activityActive) {
          $oneMenuActive = true;
        }
      };
    }
?>



<div class="dropdowns">
  <?php renderDropdown($activityTerms, $activityActive ? $activityActiveTerm->name : "Artists", $activityActive, $activityActiveTermSlug, $cityActive ? "?city=".$cityActiveTermSlug : null, $cityActive ? $cityActiveValidActivityTermIDs : array(), $cityActive ? $cityActiveClearSecondaryURL : null, $bothMenusActive, $oneMenuActive  ) ?>
  <?php renderDropdown($cityTerms, $cityActive ? $cityActiveTerm->name : "Info", $cityActive, $cityActiveTermSlug, $activityActive ? "?activity=".$activityActiveTermSlug : null, $activityActive ? $activityActiveValidCityTermIDs : array(), $activityActive ? $activityActiveClearSecondaryURL : null, $bothMenusActive, $oneMenuActive ) ?>

<?php wp_nav_menu(
  array(
    'theme_location'  => 'primary',
    'container_class' => 'main-nav-menu',
    'menu_class'      => 'navbar-nav top-menu nav',
    'fallback_cb'     => '',
    'menu_id'         => 'main-menu'
  )
); ?>

</div>


</header>
<script>
  var $et_top_menu = $( 'ul.nav' );

  $et_top_menu.find( 'li' ).click( function() {
      if ( ! $(this).closest( 'li.mega-menu' ).length || $(this).hasClass( 'mega-menu' ) ) {
          $(this).toggleClass( 'et-show-dropdown' );
          // $(this).hide('et-show-dropdown');
      }
  });

</script>

