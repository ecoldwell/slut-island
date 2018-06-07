<header id="main-header">
  <h1>
    <a href="/">Robbins Locations</a>
  </h1>

  <?php wp_nav_menu(
    array(
      'theme_location'  => 'location-finding-menu',
      'container_class' => 'main-nav-menu-dropdowns',
      'menu_class'      => 'navbar-nav',
    )
  ); ?>

  <?php wp_nav_menu(
    array(
      'theme_location'  => 'primary',
      'container_class' => 'main-nav-menu',
      'menu_class'      => 'navbar-nav',
      'fallback_cb'     => '',
      'menu_id'         => 'main-menu'
    )
  ); ?>

</header>
