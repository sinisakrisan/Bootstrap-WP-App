<?php
/*
The Single Post
===============
*/
?>

<?php if(have_posts()): while(have_posts()): the_post(); ?>
  <article role="article" id="post_<?php the_ID()?>" <?php post_class()?>>

    <!-- Article Card -->
    <div class="card">
      <div class="card-header text-center">
        <h2><?php the_title();?></h2>
      </div>
      <?php if (get_the_post_thumbnail()):?>
        <div class="post-thumbnail">
            <?php the_post_thumbnail();?>
        </div>
      <?php endif;?>
      
      <?php if (is_singular('post')):?>
      <div class="card-footer">
        <?php
          _e('Author: ', 'app');
          the_author_posts_link();
          _e(' on ', 'app');
          app_post_date();
        ?>
      </div>
    <?php endif;?>

      <div class="card-body">
        <?php the_content();?>
        <?php wp_link_pages();?>
      </div>

      <?php if (is_singular('post')):?>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">
          <?php _e('Category: ', 'app'); the_category(', ') ?> | <?php if (has_tag()) { the_tags('Tags: ', ', '); ?> | <?php } _e('Comments', 'app'); ?>: <?php printf( number_format_i18n( get_comments_number() ) ); ?>
        </li>
      </ul>
      <div class="card-footer">
        <div class="row">
          <div class="col">
            <?php previous_post_link('%link', '<i class="fa fa-fw fa-arrow-left"></i> Previous post: '.'%title'); ?>
          </div>
          <div class="col text-right">
            <?php next_post_link('%link', 'Next post: '.'%title' . ' <i class="fa fa-fw fa-arrow-right"></i>'); ?>
          </div>
        </div>
      </div>
    <?php endif;?>
  </div>

  <!-- Author Card -->
  <?php if (is_singular('post') && (get_theme_mod( 'app_blogs_author') == '1') ):?>
  <div class="card">
    <div class="card-header text-center">
      <h4><?php _e( 'About Author', 'app' ); ?></h4>
    </div>

    <div class="card-body">

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-2">
            <div class="ps-avatar author-avatar">
              <?php echo get_avatar( get_the_author_meta( 'user_email' ));?>
            </div><!-- .author-avatar -->
          </div>

          <div class="col-md-10">
            <div class="author-description">
              <p class="author-title border-bottom"><i class="fa fa-user"></i> <?php echo get_the_author(); ?></p>
              <p class="author-bio"><i class="fa fa-vcard"></i> <?php the_author_meta( 'description' ); ?></p><!-- .author-bio -->
            </div><!-- .author-description -->
          </div>

        </div> <!-- container fluid-->
      </div> <!-- row -->
    </div><!-- card-body -->

    <div class="card-footer">
      <?php if( PeepSo::get_option('always_link_to_peepso_profile', 0) ):?>
        <i class="fa fa-eye"></i> <a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"> <?php printf( __( 'View profile page', 'app' ), get_the_author() ); ?></a>
      <?php else:?>
        <i class="fa fa-eye"></i> <a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"> <?php printf( __( 'View all posts by %s', 'app' ), get_the_author() ); ?></a>
      <?php endif;?>
    </div>
  </div> <!-- card-->
  <?php endif;?>
        
</article>

<?php
    if ( comments_open() || get_comments_number() ) :
      //comments_template();
      comments_template('/loops/single-post-comments.php');
		endif;
  endwhile; else :
    get_template_part('loops/404');
  endif;
?>

