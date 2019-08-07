<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
  <meta name="description" content="<?php if ( is_single() ) {
      single_post_title('', true);
    } else {
      bloginfo('name'); echo " - "; bloginfo('description');
    }
  ?>" />
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


<!-- Check for PeepSo --> 

<?php include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); ?>
<?php is_plugin_active($plugin) ?>

<?php if (!is_plugin_active( 'peepso-core/peepso.php' ) ) :?>
  <div class ="alert alert-danger text-center">
    <i class="fa fa-warning"></i> <?php printf( __( 'App Theme requires FREE version of PeepSo plugin to work properly. Before you continue, please install <a href="https://wordpress.org/plugins/peepso-core/">PeepSo plugin</a>.', 'app' )); ?>
  </div>
<?php endif; ?>




