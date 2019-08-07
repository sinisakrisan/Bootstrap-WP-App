<?php

echo $args['before_widget'];

$PeepSoProfile=PeepSoProfile::get_instance();
$PeepSoUser = $PeepSoProfile->user;

$disable_registration = intval(PeepSo::get_option('site_registration_disabled', 0));
// PeepSo/peepso#2906 hide "resend activation" until really necessary
$hide_resend_activation = TRUE;

$view_class = $instance['view_option'];

?>

<?php
  if(!$instance['user_id'] > 0)
  {
?>

<div class="app-profile">

  <div class="login">

  <div class="ps-widget--profile__wrapper ps-widget--external">
      <!-- Title of Profile Widget -->
      <?php
        if ( ! empty( $instance['title'] ) ) { ?>
        <div class="text-center mb-3">
          <h3><?php echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title']; ?>
          </h3>
        </div>
      <?php } ?>

    <div class="ps-widget--login ps-widget--login-<?php echo $view_class; ?>">
      <form class="ps-form ps-form--login ps-form--login-widget" action="" onsubmit="return false;" method="post" name="login" id="form-login-login">
        <div class="ps-form__container">
          <?php if ($view_class == "vertical") { ?>
          <div class="ps-form__row">
            <div class="ps-form__field ps-form__field--group">
              <div class="ps-input__prepend">
                <i class="fa fa-user"></i>
              </div>
              <input class="ps-input app-80" type="text" name="username" placeholder="<?php _e('Username', 'peepso-core'); ?>" mouseev="true"
                 autocomplete="off" keyev="true" clickev="true" />
            </div>
          </div>

          <div class="ps-form__row">
            <div class="ps-form__field ps-form__field--group">
              <div class="ps-input__prepend">
                <i class="fa fa-lock"></i>
              </div>
              <input class="ps-input app-80" type="password" name="password" placeholder="<?php _e('Password', 'peepso-core'); ?>" mouseev="true"
                 autocomplete="off" keyev="true" clickev="true" />
            </div>
          </div>

          <div class="ps-form__row">
            <div class="ps-form__field">
              <div class="ps-checkbox">
                <input type="checkbox" alt="<?php _e('Remember Me', 'peepso-core'); ?>" value="yes" name="remember" id="remember2" <?php echo PeepSo::get_option('site_frontpage_rememberme_default', 0) ? ' checked':'';?>>
                <label for="remember2"><?php _e('Remember Me', 'peepso-core'); ?></label>
              </div>
            </div>
          </div>

          <div class="ps-form__row">
            <div class="ps-form__field ps-form__field--submit">
              <button type="submit" class="btn btn-primary btn-block">
                <span><?php _e('Login', 'peepso-core'); ?></span>
                <img style="display:none" src="<?php echo PeepSo::get_asset('images/ajax-loader.gif'); ?>">
              </button>
            </div>
          </div>

          <?php if(0 === $disable_registration) { ?>
          <div class="ps-form__row">
            <div class="ps-form__field">
              <a class="btn btn-success btn-block" href="<?php echo PeepSo::get_page('register'); ?>"><?php _e('Register', 'peepso-core'); ?></a>
            </div>
          </div>
          <?php } ?>

          <div class="ps-form__row">
            <div class="ps-form__field">
              <a class="btn btn-danger btn-block" href="<?php echo PeepSo::get_page('recover'); ?>"><?php _e('Forgot Password', 'peepso-core'); ?></a>
            </div>
          </div>

          <?php if(0 === $disable_registration) { ?>
          <div class="ps-form__row ps-js-register-activation" style="display: none;">
            <div class="ps-form__field">
              <a class="btn btn-warning btn-block" href="<?php echo PeepSo::get_page('register'); ?>?resend"><?php _e('Resend activation code', 'peepso-core'); ?></a>
            </div>
          </div>
          <?php } ?>

          
          <?php } else { ?>
            <div class="ps-form__row ps-form__row--group">
                <div class="ps-form__field ps-form__field--group">
                    <div class="ps-input__prepend">
                        <i class="fa fa-user"></i>
                    </div>
                    <input class="ps-input app-80" type="text" name="username" placeholder="<?php _e('Username', 'peepso-core'); ?>" mouseev="true"
                 autocomplete="off" keyev="true" clickev="true" />
                </div>

                <div class="ps-form__field ps-form__field--group">
                    <div class="ps-input__prepend">
                        <i class="fa fa-lock"></i>
                    </div>
                    <input class="ps-input app-80" type="password" name="password" placeholder="<?php _e('Password', 'peepso-core'); ?>" mouseev="true" autocomplete="off" keyev="true" clickev="true" />
                </div>

                <div class="ps-form__field ps-form__field--submit">
                    <button type="submit" class="btn btn-primary btn-block">
                        <span><?php _e('Login', 'peepso-core'); ?></span>
                        <img style="display:none" src="<?php echo PeepSo::get_asset('images/ajax-loader.gif'); ?>">
                    </button>
                </div>

                <?php do_action('peepso_after_login_form'); ?>
            </div>

            <div class="ps-form__row ps-form__row--inline">
                <div class="ps-form__field">
                  <div class="ps-checkbox">
                    <input type="checkbox" alt="<?php _e('Remember Me', 'peepso-core'); ?>" value="yes" name="remember" id="remember2" <?php echo PeepSo::get_option('site_frontpage_rememberme_default', 0) ? ' checked':'';?>>
                    <label for="remember2"><?php _e('Remember Me', 'peepso-core'); ?></label>
                  </div>
                </div>

                <div class="ps-form__field">

                <?php if (0 === $disable_registration) { ?>
                    <a class="btn btn-success btn-sm" href="<?php echo PeepSo::get_page('register'); ?>"><?php echo _x('Register', 'Registration link in login panel', 'peepso-core'); ?></a>
                <?php } ?>

                <a class="btn btn-danger btn-sm" href="<?php echo PeepSo::get_page('recover'); ?>"><?php _e('Forgot Password', 'peepso-core'); ?></a>

                <?php if (0 === $disable_registration) { ?>
                    <a class="btn btn-warning btn-sm" href="<?php echo PeepSo::get_page('register'); ?>?resend" style="display: none;"><?php _e('Resend activation code', 'peepso-core'); ?></a>
                <?php } ?>
                </div>
            </div>
          <?php } ?>
        </div>

        <input type="hidden" name="option" value="ps_users">
        <input type="hidden" name="task" value="-user-login">
        <input type="hidden" name="redirect_to" value="<?php echo PeepSo::get_page('redirectlogin'); ?>" />
        <?php
          // Remove ID attribute from nonce field.
          $nonce = wp_nonce_field('ajax-login-nonce', 'security', true, false);
          $nonce = preg_replace( '/\sid="[^"]+"/', '', $nonce );
          echo $nonce;
        ?>

        <?php do_action('peepso_action_render_login_form_after'); ?>
      </form>
      <?php do_action('peepso_after_login_form'); ?>

      <script>
        (function() {
          function initLoginForm( $ ) {
            $('.ps-form--login-widget').off('submit').on('submit', function( e ) {
              e.preventDefault();
              e.stopPropagation();
              peepso.login.submit( e.target );
            });
          }

          // naively check if jQuery exist to prevent error
          var timer = setInterval(function() {
            if ( window.jQuery ) {
              clearInterval( timer );
              initLoginForm( window.jQuery );
            }
          }, 1000 );
        })();
      </script>
    </div>
  </div>
</div>
</div>
<?php
  }
?>

<?php
echo $args['after_widget'];
// EOF
