<?php
/**!
 * Search form for the native widget
 */

if ( ! function_exists('app_search_form') ) {

  function app_search_form( $form ) {
    $form = '<form class="form-inline" role="search" method="get" id="searchform" action="' . home_url('/') . '" >
      <div class="input-group">
      <input class="form-control" type="text" value="' . get_search_query() . '" placeholder="' . esc_attr_x('Search', 'app') . '..." name="s" id="s" />
      <div class="input-group-append">
      <button type="submit" id="searchsubmit" value="'. esc_attr_x('Search', 'app') .'" class="btn btn-danger"><i class="fas fa-search"></i></button>
      </div>
      </div>
    </form>';
    return $form;
  }
}
add_filter( 'get_search_form', 'app_search_form' );