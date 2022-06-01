<?php
/**
 * The template file for displaying the comments and comment form for the
 * Twenty Twenty theme.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
*/
if ( post_password_required() ) {
	return;
}

if ( $comments ) {
	?>

	<div class="post_comments" id="comments">

		<?php
		$comments_number = absint( get_comments_number() );
		?>

		<div class="post_comments_header">

			<h2 class="post_comments_title">
			<?php
			if ( ! have_comments() ) {
				_e( 'Оставить комментарий', 'funnycoon' );
			} else {

				printf(  _n(
					'Комментариев (%s)', 
					'Комментариев (%s)',
					$comments_number,
					'funnycoon'
					), 
					number_format_i18n( $comments_number ),
				);
				
			}

			?>
			</h2>

		</div>

		<div class="comments-wrp">

			<?php
			wp_list_comments(
				array(
					'walker'      => new Funnycoon_Walker_Comment(),
					'avatar_size' => 42,
					'style'       => 'div',
				)
			);

			$comment_pagination = paginate_comments_links(
				array(
					'echo'      => false,
					'end_size'  => 0,
					'mid_size'  => 0,
					'next_text' => __( 'Newer Comments', 'funnycoon' ) . ' <span aria-hidden="true">&rarr;</span>',
					'prev_text' => '<span aria-hidden="true">&larr;</span> ' . __( 'Older Comments', 'funnycoon' ),
				)
			);

			if ( $comment_pagination ) {
				$pagination_classes = '';

				// If we're only showing the "Next" link, add a class indicating so.
				if ( false === strpos( $comment_pagination, 'prev page-numbers' ) ) {
					$pagination_classes = ' only-next';
				}
				?>

				<nav class="comments-pagination pagination<?php echo $pagination_classes; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static output ?>" aria-label="<?php esc_attr_e( 'Comments', 'funnycoon' ); ?>">
					<?php echo wp_kses_post( $comment_pagination ); ?>
				</nav>

				<?php
			}
			?>

		</div><!-- .comments-wrp -->

	</div><!-- comments -->

	<?php
}



if ( comments_open() || pings_open() ) {

	if ( $comments ) {
		echo '<hr class="comment-hr" aria-hidden="true" />';
	}

	comment_form(
		array(
			'class_form'         => 'section-inner thin max-percentage',
			'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
			'title_reply_after'  => '</h2>',
		)
	);

} elseif ( is_single() ) {

	if ( $comments ) {
		echo '<hr class="comment-hr" aria-hidden="true" />';
	}

	?>

	<div class="comment-respond" id="respond">

		<p class="comments-closed"><?php _e( 'Comments are closed.', 'twentytwenty' ); ?></p>

	</div><!-- #respond -->

	<?php
}
