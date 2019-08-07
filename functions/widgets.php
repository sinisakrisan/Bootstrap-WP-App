<?php
/**!
 * Widgets
 */

function app_widgets_init() {


  register_sidebar( array(
    'name'          => __( 'Off-Canvas Sidebar', 'app' ),
    'id'            => 'off-canvas-sidebar',
    'description'   => __( 'Add widgets here to appear in your off-canvas sidebar. Best place to show PeepSo Profile widget', 'app' ),
    'before_widget' => '<div>',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="rounded">',
    'after_title'   => '</h2>',
  ) );

  register_sidebar( array(
    'name'          => __( 'User Bar', 'app' ),
    'id'            => 'userbar',
    'description'   => __( 'Add PeepSo User Bar widget here.', 'app' ),
    'before_widget' => '<div>',
    'after_widget'  => '</div>',
    'before_title'  => '<div style="display:none">',
    'after_title'   => '</div>',
  ) );

  register_sidebar( array(
    'name'          => __( 'Right Sidebar', 'app' ),
    'id'            => 'right',
    'description'   => __( 'Add widgets here to appear in your right sidebar.', 'app' ),
    'before_widget' => '<div class="%1$s %2$s card">',
    'after_widget'  => '</div>',
    'before_title'  => '<div class="card-header mb-3"><h4>',
    'after_title'   => '</h4></div>',
  ) );

  /*
  Footer (1, 2, 3, or 4 areas)

  Flexbox `col-sm` gives the correct column width:

  * If only 1 widget, then this will have full width ...
  * If 2 widgets, then these will each have half width ...
  * If 3 widgets, then these will each have third width ...
  * If 4 widgets, then these will each have quarter width ...
  ... above the Bootstrap `sm` breakpoint.
   */

  register_sidebar( array(
    'name'            => __( 'Footer', 'app' ),
    'id'              => 'footer-widget-area',
    'description'     => __( 'The footer widget area', 'app' ),
    'before_widget'   => '<div class="%1$s %2$s col-sm">',
    'after_widget'    => '</div>',
    'before_title'    => '<h2 class="h4">',
    'after_title'     => '</h2>',
  ) );

}
add_action( 'widgets_init', 'app_widgets_init' );