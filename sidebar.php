<?php
/**!
 * The Off-Canvas Sidebar
 */
?>

<!-- Sidebar -->
<div id="sidebar" class="sidebar-background accent-<?php esc_html_e( get_theme_mod( 'app_sidebar_accent', 'dark' ) ); ?>">
	<div class="logo">
		<?php
		// check to see if the logo exists and add it to the page
		if ( get_theme_mod( 'app_logo' ) ) : ?>
 
		<img src="<?php esc_html_e( get_theme_mod( 'app_logo' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" >
 
		<?php // add a fallback if the logo doesn't exist
			else : ?>
 
		<h3 class="site-title"><?php bloginfo( 'name' ); ?></h3>
 
		<?php endif; ?>

	</div>

	<?php if ( is_active_sidebar( 'off-canvas-sidebar' ) ) : ?>
		<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
			<?php dynamic_sidebar( 'off-canvas-sidebar' ); ?>
		</div><!-- #primary-sidebar -->
	<?php endif; ?>
            
</div>
<!-- /#sidebar-wrapper -->
