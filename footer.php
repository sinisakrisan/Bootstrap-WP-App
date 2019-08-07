          <footer class="footer-background mt-5">
            <div class="container accent-<?php esc_html_e( get_theme_mod( 'app_footer_accent', 'dark' ) ); ?>">

              <?php if(is_active_sidebar('footer-widget-area')): ?>
                <div class="row border-bottom pt-3" id="footer" role="navigation">
                  <?php dynamic_sidebar('footer-widget-area'); ?>
                </div>
              <?php endif; ?>

              <div class="row pt-1">
                <div class="col">
                  <p class="text-center">&copy; <?php echo date('Y'); ?> <a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a></p>
                </div>
              </div>
            </div>

          </footer>
        
        </div><!-- /#page-content-wrapper -->

      </div><!-- /#wrapper -->

    <?php wp_footer(); ?>

  </body>

</html>
