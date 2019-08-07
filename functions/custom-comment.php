<?php

function app_comment( $comment, $args, $depth ) {
    ?>

    <li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">

        <?php
            $app_gravatar_url = get_avatar_url( $comment );
        ?>
        <article class="media app-comment">
            <?php if (! empty( $app_gravatar_url ) ) : ?>
                <img class="d-flex align-self-start mr-4 comment-img rounded" src="<?php echo esc_url( $app_gravatar_url ); ?>" alt="<?php echo esc_attr( get_comment_author() ); ?>" width="60">
            <?php endif; ?>
            <div class="media-body">
                <h6 class="mt-0 mb-0 comment-author">
                    <?php echo get_comment_author_link(); ?>
                    <?php if ( $comment->comment_author_email == get_the_author_meta( 'email' ) ) : ?>
                        <small class="app-comment-by-author ml-2 text-muted"><?php echo esc_html__( '&#8226; Post Author &#8226;', 'app' ) ?></small>
                    <?php endif; ?>
                </h6>
                <small class="date text-muted"><i class="fa fa-calendar"></i> <?php printf( // WPCS: XSS OK.
                                                        /* translators: %1 %2: date and time. */
                                                        esc_html__('%1$s at %2$s', 'app'),
                                                        get_comment_date(),
                                                        get_comment_time()
                                                    ); ?></small>
                <?php if ($comment->comment_approved == '0') : ?>
					<small><em class="comment-awaiting text-muted"><?php esc_html_e('Comment is awaiting approval', 'app'); ?></em></small>
					<br />
				<?php endif; ?>

                <div class="mt-3">
                    <?php comment_text(); ?>
                </div>

                <?php
                    $args['before'] = '';
                ?>

                <small class="reply">
					<?php comment_reply_link( 
                        array_merge( $args, array( 
                            'reply_text' => '<i class="fa fa-reply"></i> ' . esc_html__( 'Reply', 'app' ), 
                            'depth' => $depth,
                            'max_depth' => $args['max_depth'] ) ), $comment->comment_ID ); 
                             ?>
					<?php edit_comment_link( esc_html__( 'Edit', 'app' ) ); ?>
				</small>
            </div>
            <!-- /.media-body -->
        </article>

    <?php
}
