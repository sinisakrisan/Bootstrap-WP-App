<?php if ( is_active_sidebar( 'right' ) ) : ?>

<div class="col-sm-<?php esc_html_e( get_theme_mod( 'app_sidebar_size' ), '4' ); ?> my-3">
    <div id="secondary-sidebar" class="secondary-sidebar widget-area" role="sidebar">
    	<?php dynamic_sidebar( 'right' ); ?>
    </div><!-- #secondary-sidebar -->
</div>

<?php endif; ?>