<nav class="navbar sticky-top navbar-expand-lg navbar-<?php esc_html_e( get_theme_mod( 'app_navbar_accent', 'dark' ) ); ?> navbar-background">

  <a href="#menu-toggle" class="btn btn-<?php esc_html_e( get_theme_mod( 'app_navbar_color' ) ); ?> mr-3" id="menu-toggle"><i class="fa fa-columns"></i></a>

  <?php if ( is_active_sidebar( 'userbar' ) ) : ?>
  <div id="userbar-widget" class="userbar-widget widget-area" role="navigation">
    <?php dynamic_sidebar( 'userbar' ); ?>
  </div><!-- #primary-sidebar -->
  <?php endif; ?>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <?php
        wp_nav_menu( array(
          'theme_location'  => 'navbar',
          'container'       => false,
          'menu_class'      => '',
          'fallback_cb'     => '__return_false',
          'items_wrap'      => '<ul id="%1$s" class="navbar-nav mr-auto mt-2 mt-lg-0 %2$s">%3$s</ul>',
          'depth'           => 2,
          'walker'          => new app_walker_nav_menu()
        ) );
      ?>
      
    <!-- Search Widget -->
    <?php if ( is_active_sidebar( 'search' ) ) : ?>
		  <div id="search-widget" class="search-widget widget-area" role="complementary">
			 <?php dynamic_sidebar( 'search' ); ?>
		  </div>
    <?php endif; ?>
    <!-- Search Widget -->
    
  </div>
</nav>