<?php
if ( post_password_required() ) {
    return;
}
?>

<div class="container">
    <div class="col-md-8">
        <div class="row">
            <div id="comments" class="comments-area">

                <?php
                // You can start editing here -- including this comment!
                if ( have_comments() ) : ?>
                    <h6 class="comment-total-title">
                        <?php
                        $comments_number = get_comments_number();
                        if ( '1' === $comments_number ) {
                            /* translators: %s: post title */
                            printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'cherry' ), get_the_title() );
                        } else {
                            printf(
                                /* translators: 1: number of comments, 2: post title */
                                _nx(
                                    ' THERE ARE %1$s COMMENTS ',
                                    ' THERE ARE %1$s COMMETNS ',
                                    $comments_number,
                                    'comments title',
                                    'cherry'
                                ),
                                number_format_i18n( $comments_number ),
                                get_the_title()
                            );
                        }
                        ?>
                    </h6>

                    <ol class="comment-list">
                        <?php
                            wp_list_comments( array(
                                'avatar_size' => 80,
                                'style'       => 'ol',
                                'short_ping'  => true,
                                'reply_text'  => 'Reply',
                            ) );
                        ?>
                    </ol>

                    <?php the_comments_pagination( array(
                        'prev_text' => 'Prev',
                        'next_text' =>'Next',
                    ) );

                endif; // Check for have_comments().

                // If comments are closed and there are comments, let's leave a little note, shall we?
                if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
                    <p class="no-comments"><?php _e( 'Comments are closed.', 'cherry' ); ?></p>
                <?php
                endif;

                comment_form();
                ?>
            </div><!-- #comments -->
        </div>
    </div>
</div>
