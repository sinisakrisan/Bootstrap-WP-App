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
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
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
    'name'          => __( 'Search', 'app' ),
    'id'            => 'search',
    'description'   => __( 'Search widget position.', 'app' ),
    'before_widget' => '',
    'after_widget'  => '',
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


//
//  Custom options for widgets
//
/*
function app_in_widget_form($t,$return,$instance){
  
  $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '', 'style' => '') );
  if ( !isset($instance['style']) )
      $instance['style'] = null;
  ?>
  <hr>
  <h3>Widget options:</h3>
  <div style="background:#eee; padding:10px; margin-bottom:10px;">
      <label for="<?php echo $t->get_field_id('style'); ?>">Widget style:</label>
      <select id="<?php echo $t->get_field_id('style'); ?>" name="<?php echo $t->get_field_name('style'); ?>">
          <option <?php selected($instance['style'], 'none');?> value="none">none</option>
          <option <?php selected($instance['style'], 'box');?>value="box">Box</option>
          <option <?php selected($instance['style'], 'bordered');?> value="bordered">Bordered</option>
          <option <?php selected($instance['style'], 'gradient');?> value="gradient">Gradient</option>
      </select>
  </div>
  <?php
  $retrun = null;
  return array($t,$return,$instance);
  
}

function app_in_widget_form_update($instance, $new_instance, $old_instance){
  $instance['style'] = $new_instance['style'];
  return $instance;
}

function app_dynamic_sidebar_params($params){
  global $wp_registered_widgets;
  $widget_id = $params[0]['widget_id'];
  $widget_obj = $wp_registered_widgets[$widget_id];
  $widget_opt = get_option($widget_obj['callback'][0]->option_name);
  $widget_num = $widget_obj['params'][0]['number'];

  if(isset($widget_opt[$widget_num]['style']))
    $style = 'widget--' . $widget_opt[$widget_num]['style'];
  else
    $style = '';
    $params[0]['before_widget'] = preg_replace('/class="/', 'class="'.$style.' ',  $params[0]['before_widget'], 1);
  return $params;
}


//Add input fields(priority 5, 3 parameters)
add_action('in_widget_form', 'app_in_widget_form',5,3);
//Callback function for options update (priorität 5, 3 parameters)
add_filter('widget_update_callback', 'app_in_widget_form_update',5,3);
//add class names (default priority, one parameter)
add_filter('dynamic_sidebar_params', 'app_dynamic_sidebar_params');

*/