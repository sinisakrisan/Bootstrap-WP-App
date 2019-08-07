<?php

echo $args['before_widget'];

$PeepSoProfile=PeepSoProfile::get_instance();
$PeepSoUser = $PeepSoProfile->user;

?>

<div class="app-profile">
    <div class="profile">
    <?php //echo $instance['toolbar']; ?>

    <?php
    if($instance['user_id'] >0)
    {
      $user  = $instance['user'];

      if($instance['user_id'] > 0 && $instance['user_id'] == get_current_user_id()) {
        $user->profile_fields->load_fields();
        $stats = $user->profile_fields->profile_fields_stats;
      }

      ?>

      <a href="<?php echo $user->get_profileurl();?>">
      <?php if(isset($instance['show_cover']) && 1 == intval($instance['show_cover'])) :?>
        <div class="cover">
          <img alt="cover" src="<?php echo $user->get_cover();?>"> 
        </div>
      <?php else: ?>
        <div class="mb-3"></div>
      <?php endif; ?>

      <div class="ps-avatar avatar">
        <img alt="<?php echo $user->get_fullname();?> avatar" title="<?php echo $user->get_profileurl();?>" src="<?php echo $user->get_avatar();?>">
      </div>

      <div class="name my-2">
        <?php
          //[peepso]_[action]_[WHICH_PLUGIN]_[WHERE]_[WHAT]_[BEFORE/AFTER]
          do_action('peepso_action_render_user_name_before', $user->get_id());

          echo $user->get_fullname();

          //[peepso]_[action]_[WHICH_PLUGIN]_[WHERE]_[WHAT]_[BEFORE/AFTER]
          do_action('peepso_action_render_user_name_after', $user->get_id());
          ?>
      </div>
      </a>
      <?php
      //[peepso]_[action]_[WHICH_PLUGIN]_[WHERE]_[WHAT]_[BEFORE/AFTER]
      do_action('peepso_action_widget_profile_name_after', $instance['user_id']);
      ?>

      <!-- Profile Completeness -->
      <div class="completeness">
      <?php

      if(isset($stats) && $stats['fields_all'] > 0) :

        $style = '';
        if ($stats['completeness'] >= 100) {
          $style.='display:none;';
        }
        ?>
        <div class="ps-progress-bar ps-completeness-bar" style="<?php echo $style;?>">
          <span style="width:<?php echo $stats['completeness'];?>%"></span>
        </div>
        <div class="ps-progress-status ps-completeness-status" style="<?php echo $style;?>">
          <?php
            echo $stats['completeness_message'];
            do_action('peepso_action_render_profile_completeness_message_after', $stats);
          ?>
        </div>

      <?php endif; ?>
      </div>

      <!-- Profile Links -->

      <div class="links">
      <h6><?php _e('Control Panel', 'app'); ?></h6>
      <div class="ps-widget--profile__menu">
        <?php

        // Profile Submenu extra links
        $instance['links']['peepso-core-preferences'] = array(
          'href' => $user->get_profileurl() . 'about/preferences/',
          'icon' => 'ps-icon-edit',
          'label' => __('Preferences', 'peepso-core'),
        );

        // @todo #2274 this has to be peepso_navigation_profile
//                if(class_exists('PeepSoPMP')) {
//                    $instance['links']['peepso-pmp'] = array(
//                        'href' => pmpro_url("account"),
//                        'label' => __('Membership', 'peepso-pmp'),
//                        'icon' => 'ps-icon-vcard',
//                    );
//                }

        $instance['links']['peepso-core-logout'] = array(
          'href' => PeepSo::get_page('logout'),
          'icon' => 'ps-icon-off',
          'label' => __('Log Out', 'peepso-core'),
          'widget'=>TRUE,
        );

        if (isset($instance['show_community_links']) && $instance['show_community_links'] === 1) {
          $instance['community_links']['peepso-core-logout'] = $instance['links']['peepso-core-logout'];
          unset($instance['links']['peepso-core-logout']);
        }
        ?>

        <div class="row">
          <?php foreach($instance['links'] as $id => $link) {
            if(!isset($link['label']) || !isset($link['href']) || !isset($link['icon'])) {
              var_dump($link);
            }

            //$class = isset($link['class']) ? $link['class'] : '' ;
            //$class = 'col-sm-6 quicklink';

            $href = $user->get_profileurl(). $link['href'];
            
            if('http' == substr(strtolower($link['href']), 0,4)) {
              $href = $link['href'];
            }

            //echo '<a href="' . $href . '" class="' . $class . '"><span class="' . $link['icon'] . '"></span> ' . $link['label'] . '</a>';

            echo 
            '<div class="col-sm-6"><a class="app-quicklink-item" href="' . $href . '">' . '<div class="app-quicklink mb-4">
              <span class="' . $link['icon'] . '"></span><br/>' . $link['label'] . '</div></a></div>';
          }?>
        </div> <!-- end row-->

      </div>

      <?php if (isset($instance['show_community_links']) && $instance['show_community_links'] === 1) { ?>
        <!-- Community Links -->
        <h6><?php _e('Community', 'peepso-core'); ?></h6>
        <div class="ps-widget--profile__menu">

          <div class="row">
          <?php foreach($instance['community_links'] as $link){
              if(FALSE == $link['widget'] ) {
                continue;
              }

              //$class = isset($link['class']) ? $link['class'] : '' ;
              //$class = 'col-sm-6';
              //echo '<a href="' . $link['href'] . '" class="' . $class . '"><span class="' . $link['icon'] . '"></span> ' . $link['label'] . '</a>';

              $href = $user->get_profileurl(). $link['href'];
            
            if('http' == substr(strtolower($link['href']), 0,4)) {
              $href = $link['href'];
            }

              echo 
              '<div class="col-sm-6"><a class="app-quicklink-item" href="' . $href . '">' . '<div class="app-quicklink mb-4">
              <span class="' . $link['icon'] . '"></span><br/>' . $link['label'] . '</div></a></div>';

          }
          ?>
          </div> <!-- end: row-->
        </div>
        <?php } ?>
  </div>
<?php } else { ?>
      <form class="ps-form ps-form--login ps-form--login-widget" action="" onsubmit="return false;" method="post" name="login" id="form-login-me">
        <div class="login"> 
        <h3 class="text-center mb-3"><?php _e('Login', 'peepso-core'); ?></h3>
        <div class="ps-form__container">
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

          <?php
          $disable_registration = intval(PeepSo::get_option('site_registration_disabled', 0));

          // PeepSo/peepso#2906 hide "resend activation" until really necessary
          $hide_resend_activation = TRUE;
          ?>

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
              <a class="btn btn-default btn-block" href="<?php echo PeepSo::get_page('register'); ?>?resend"><?php _e('Resend activation code', 'peepso-core'); ?></a>
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
        </div>
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

      <?php
      }
      ?>

    </div>
  
</div><!-- end app-profile-->

<?php
echo $args['after_widget'];
// EOF
