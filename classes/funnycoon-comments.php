<?php
/**
 * Custom comment walker for Funnycoon Theme
 * 
 */

if ( ! class_exists( 'Funnycoon_Walker_Comment' ) ) {
    /**
     * CUSTOM COMMENT WALKER for Funnycoon Theme
     */
    class Funnycoon_Walker_Comment extends Walker_Comment {

        protected function html5_comment( $comment, $depth, $args ) {


            $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';

            ?>

            <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'parent' : '', $comment); ?>>
                <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
                    <div class="comment_author_avatar_wrp">
                        <?php 
                            $avatar = get_avatar( $comment, $args['avatar_size'] );
                            if ( 0 !== $args['avatar_size'] ) {
                                echo wp_kses_post( $avatar );
                            };

                            
                        ?>

                    </div>
                    <div class="comment-content">
                        <div class="comment_author_info">
                            <?php 
                                $comment_author = get_comment_author( $comment );
                                $comment_author_link_profile = '#';

                                $comment_time = human_time_diff( strtotime( $comment->comment_date ), current_time( 'timestamp', 0 ) ) . " " . __('назад');
                                printf(
                                    '<a href="%2$s" class="comment_author_fn">%1$s</a>',
                                    esc_html( $comment_author ),
                                    esc_html( $comment_author_link_profile ),
                                );

                                printf(
                                    '<a href="%s" class="comment_time">%s</a>',
                                    esc_url( get_comment_link( $comment, $args ) ),
                                    esc_html( $comment_time ),
                                );

                                if ( get_edit_comment_link() ) {
                                    printf(
                                        '<a class="comment-edit-link" href="%s">(%s)</a>',
                                        esc_url( get_edit_comment_link() ),
                                        __( 'Редактировать', 'funnycoon' )
                                    );
                                }
                            ?>
                        </div>
                        <div class="comment-text">
                            <?php  comment_text(); 
                            
                            if ( '0' === $comment->comment_approved ) {
                                ?>
                                <p class="comment-awaiting-moderation"><?php _e( 'Ваш комментарий ожидает проверки администрацией', 'funnycoon' ); ?></p>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="comment-reply">
                            <?php
                                // Fix for max depth for comments (last comment will always be previous level then $args['max_depth'])
                                if ($depth === intval($args['max_depth'])) {
                                    $depth = $args['max_depth'] - 1;
                                }
                                $comment_reply_link = get_comment_reply_link(
                                    array_merge(
                                        $args,
                                        array(
                                            'add_below' => 'div-comment',
                                            'depth' => $depth,
                                            'max_depth' => $args['max_depth'],
                                        )
                                    )
                                );
                            
                            echo $comment_reply_link; ?>
                        </div>
                    </div>
                    
                </article>
            <?php
        }
    }
}







