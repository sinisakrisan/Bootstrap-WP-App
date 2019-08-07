<nav class="navbar sticky-top navbar-expand-lg navbar-<?php esc_html_e( get_theme_mod( 'app_navbar_accent', 'dark' ) ); ?> navbar-background">

  <a href="#menu-toggle" class="btn btn-<?php esc_html_e( get_theme_mod( 'app_navbar_color' ) ); ?> mr-3" id="menu-toggle"><i class="fa fa-columns"></i></a>

  <?php if ( is_active_sidebar( 'userbar' ) ) : ?>
  <div id="userbar" class="userbar widget-area" role="navigation">
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


    <form class="form-inline ml-auto pt-2 pt-md-0" role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <input class="form-control mr-sm-1" type="text" value="<?php echo get_search_query(); ?>" placeholder="Search..." name="s" id="s">

        <button type="submit" id="searchsubmit" value="<?php esc_attr_x('Search', 'app') ?>" class="btn btn-default my-2 my-sm-0">
          <i class="fa fa-search"></i>
        </button>
      </form>
  </div>
</nav>