<?php 
/* 
 *
 *Template Name: Landing
 *
 */ ?>

<?php get_header(); ?>

<?php 
    // Useful for getting the page id (in loop only)
    // $pageid = get_the_ID(); 
    // echo $pageid;
?>


<style>
    .carousel,.carousel-item,.active{height:100vh;}
    .carousel {border-right: 10px solid #000;}
    .login-wrapper {height:100vh; position:fixed; padding:10px;}
    .login-logo {text-align:center;}
    .container-fluid {padding-left:0;}
    .shadow { border-right: 1px solid #888; -webkit-box-shadow: 10px 0 3px 0 #888; box-shadow: 10px 0 3px 0 #888;}
    .carousel-caption{right:0; left: 0; background: #000; opacity:0.6;}
    .slide-title { font-size: 34px; text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black; }
    .slide-text { font-size: 28px; text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;} 
</style>

<div class="container-fluid">
  <div class="row">
    <div class="col-md d-none d-md-block">
      <div id="app-carousel" class="carousel shadow slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100 h-100" src="<?php esc_html_e( get_theme_mod( 'app_landing_slide_1' ) ); ?>" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
            <div class="slide-title">
                <?php esc_html_e( get_theme_mod( 'app_landing_slide_title_1' ) ); ?>
            </div>
            <div class="slide-text">
                <?php esc_html_e( get_theme_mod( 'app_landing_slide_text_1' ) ); ?>
            </div>
        </div>
    </div>
      
    <?php if (get_theme_mod( 'app_landing_slide_switch_2') == '1') :?>
    <div class="carousel-item">
      <img class="d-block w-100 h-100" src="<?php esc_html_e( get_theme_mod( 'app_landing_slide_2' ) ); ?>" alt="Second slide">
        <div class="carousel-caption d-none d-md-block">
            <div class="slide-title">
                <?php esc_html_e( get_theme_mod( 'app_landing_slide_title_2' ) ); ?>
            </div>
            <div class="slide-text">
                <?php esc_html_e( get_theme_mod( 'app_landing_slide_text_2' ) ); ?>
            </div>
        </div>
    </div>
    <?php endif;?> 
      
    <?php if (get_theme_mod( 'app_landing_slide_switch_3') == '1'):?>
    <div class="carousel-item">
      <img class="d-block w-100 h-100" src="<?php esc_html_e( get_theme_mod( 'app_landing_slide_3' ) ); ?>" alt="Third slide">
        <div class="carousel-caption d-none d-md-block">
            <div class="slide-title">
                <?php esc_html_e( get_theme_mod( 'app_landing_slide_title_3' ) ); ?>
            </div>
            <div class="slide-text">
                <?php esc_html_e( get_theme_mod( 'app_landing_slide_text_3' ) ); ?>
            </div>
        </div>
    </div>
    <?php endif;?> 
  </div>
          
  <!-- Controls -->
  <?php /* not needed as we have autoplay
  <a class="carousel-control-prev" href="#app-carousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#app-carousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  */ ?>
  <!-- end controls -->
</div>
    </div>
    <div class="col-md-4">
        <div class="login-wrapper">
            
            <div class="login-logo">
                <?php if ( get_theme_mod( 'app_logo' ) ) : ?>
                    <img src="<?php esc_html_e( get_theme_mod( 'app_logo' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" >
                <?php else : ?>
                    <h3 class="site-title"><?php bloginfo( 'name' ); ?>
                    </h3>
                <?php endif; ?>
            </div>
            
            <?php if(is_user_logged_in()):?>
                <?php if ( class_exists('PeepSo') ) { the_widget( 'PeepSoWidgetMe', 'show_cover=1' ); } ?>
            <?php else: ?>
                <div class="login-widget">
                    <?php if ( class_exists('PeepSo') ) { the_widget( 'PeepSoWidgetLogin', 'view_option=vertical' ); } ?>
                </div>
            <?php endif;?>
        </div>
    </div>
  </div>
</div>

<script>
$(function(){
    $('.carousel').carousel({
      interval: 2000
    });
});
</script>


<?php wp_footer(); ?>

  </body>

</html>