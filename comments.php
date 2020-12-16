<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="comments-area">
	<?php
	//fields are hooked in inc/hooks.php
	if ( have_comments() ) {
		$title_reply = sprintf( esc_html( _n( 'One comment In This Topic:', '%1$s comments In This Topic:', get_comments_number(), 'cashelrie' ) ), number_format_i18n( get_comments_number() ) );
	} else {
		$title_reply = esc_html__( 'No comments', 'cashelrie' );
	}
	$args = array(
		'comment_field'        => is_user_logged_in() ? '<div class="col-sm-12"><p class="comment-form-comment"><label for="comment">' . esc_html_x( 'Comment', 'noun', 'cashelrie' ) . '</label> <textarea id="comment"  class="form-control" name="comment" cols="45" rows="3"  aria-required="true" required="required"  placeholder="' . esc_html__( 'Comment', 'cashelrie' ) . '"></textarea></p></div>' : '',
		'logged_in_as'         => '<div class="col-sm-12 darklinks"><p class="logged-in-as">' .
		    sprintf(
				/* translators: 1: edit user link, 2: accessibility text, 3: user name, 4: logout URL */
				'<a href="%1$s" aria-label="%2$s">' . esc_html__( 'Logged in as %3$s', 'cashelrie' ) . '</a>. <a href="%4$s">' . esc_html__( 'Log out?', 'cashelrie' ) . '</a>',
				get_edit_user_link(),
				/* translators: %s: user name */
				esc_attr( sprintf( esc_html__( 'Logged in as %s. Edit your profile.', 'cashelrie' ), $user_identity ) ),
				$user_identity,
				wp_logout_url( apply_filters( 'the_permalink', get_permalink( get_the_ID() ) ) )
			) . '</p></div>',
		'comment_notes_before' => '',
		'class_form'           => 'comment-form row columns_padding_5',
		'cancel_reply_link'    => esc_html__( 'Cancel reply', 'cashelrie' ),
		'label_submit'         => esc_html__( 'Send Comment', 'cashelrie' ),
		'title_reply'          => esc_html__( 'Leave Comment', 'cashelrie' ),
		'title_reply_before'   => '<h2 class="highlightlinks">',
		'title_reply_after'    => '</h2>',
		'submit_button'        => '<button type="submit" name="%1$s" id="%2$s" class="theme_button color1 min_width_button margin_0">%4$s</button><button type="reset" id="reset_%2$s" class="theme_button inverse min_width_button">' . esc_html__( 'Clear Form', 'cashelrie' ) . '</button>',
		'submit_field'         => '<div class="col-xs-12 bottommargin_0"><p class="form-submit topmargin_25">%1$s %2$s</p></div>',
		'format'               => 'html5',
	); ?>
	<?php if ( have_comments() ) : ?>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav id="comment-nav-above" class="navigation comment-navigation text-center" role="navigation">
				<?php cashelrie_paging_comments_nav(); ?>
			</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

        <h2><?php echo esc_html( $title_reply ) ?></h2>

		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'walker'      => cashelrie_return_comments_walker(),
				'style'       => 'ol',
				'short_ping'  => true,
				'avatar_size' => 90,
			) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav id="comment-nav-below" class="navigation comment-navigation text-center" role="navigation">
				<?php cashelrie_paging_comments_nav(); ?>
			</nav><!-- #comment-nav-below -->
		<?php endif; // Check for comment navigation. ?>

		<?php if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'cashelrie' ); ?></p>
		<?php endif; //comments_open() ?>

	<?php endif; // have_comments() ?>

    <?php comment_form( $args ); ?>

</div><!-- #comments -->