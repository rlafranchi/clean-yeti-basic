<?php
/**
 * Comments Extensions
 *
 * @package cleanyetibasicCoreLibrary
 * @subpackage CommentsExtensions
 */

/**
 * Action Hook: cleanyetibasic_abovecomments
 * 
 * Located in comments.php
 * Just before #comments
 */
function cleanyetibasic_abovecomments() {
    do_action('cleanyetibasic_abovecomments');
}

/**
 * Action Hook: cleanyetibasic_abovecommentslist
 * 
 * Located in comments.php
 * Just before #comments-list
 */
function cleanyetibasic_abovecommentslist() {
    do_action('cleanyetibasic_abovecommentslist');
}

/**
 * Action Hook: cleanyetibasic_belowcommentslist
 * 
 * Located in comments.php
 * Just after #comments-list
 */
function cleanyetibasic_belowcommentslist() {
    do_action('cleanyetibasic_belowcommentslist');
}

/**
 * Action Hook: cleanyetibasic_abovetrackbackslist
 * 
 * Located in comments.php
 * Just before #trackbacks-list
 */
function cleanyetibasic_abovetrackbackslist() {
    do_action('cleanyetibasic_abovetrackbackslist');
}

/**
 * Action Hook: cleanyetibasic_belowtrackbackslist
 * 
 * Located in comments.php
 * Just after #trackbacks-list
 */
function cleanyetibasic_belowtrackbackslist() {
    do_action('cleanyetibasic_belowtrackbackslist');
}

/**
 * Action Hook: cleanyetibasic_abovecommentsform
 * 
 * Located in comments.php
 * Just before the comments form
 */
function cleanyetibasic_abovecommentsform() {
    do_action('cleanyetibasic_abovecommentsform');
}

/**
 * Provides Plugin Compatibility: Subscribe to Comments
 *
 * Adds the subscribe to comments button.
 *
 * @link http://wordpress.org/extend/plugins/subscribe-to-comments/ Subscribe to Comments Plugin Page
 */
function cleanyetibasic_show_subscription_checkbox() {
    if(function_exists('show_subscription_checkbox')) { show_subscription_checkbox(); }
}
add_action('comment_form', 'cleanyetibasic_show_subscription_checkbox', 98);

/**
 * Action Hook: cleanyetibasic_belowcommentsform
 * 
 * Located in comments.php
 * Just after the comments form
 */
function cleanyetibasic_belowcommentsform() {
    do_action('cleanyetibasic_belowcommentsform');
}

/**
 * Provides Plugin Compatibility: Subscribe to Comments
 *
 * Adds the subscribe without commenting button
 *
 * @link http://wordpress.org/extend/plugins/subscribe-to-comments/ Subscribe to Comments Plugin Page
 */
function cleanyetibasic_show_manual_subscription_form() {
    if(function_exists('show_manual_subscription_form')) { show_manual_subscription_form(); }
}
add_action('cleanyetibasic_belowcommentsform', 'cleanyetibasic_show_manual_subscription_form', 5);

/**
 * Action Hook: cleanyetibasic_belowcomments
 * 
 * Located in comments.php
 * Just after #comments
 */
function cleanyetibasic_belowcomments() {
    do_action('cleanyetibasic_belowcomments');
}

/**
 * Filter: cleanyetibasic_singlecomment_text
 *
 * Creates the standard text for one comment
 * Located in comments.php
 */
function cleanyetibasic_singlecomment_text() {
    $content = sprintf( _x( '%1$sOne%2$s Comment' , 'One Comment, where %$1s and %$2s are <span> tags', 'cleanyetibasic' ), '<span>' , '</span>' );
    return apply_filters( 'cleanyetibasic_singlecomment_text', $content );
}

/**
 * Filter: cleanyetibasic_multiplecomments_text
 *
 * Creates the standard text for more than one comment
 * Located in comments.php
 */
function cleanyetibasic_multiplecomments_text() {
    $content = '<span>%d</span> ' . __('Comments', 'cleanyetibasic');
    return apply_filters( 'cleanyetibasic_multiplecomments_text', $content );
}


/**
 * Filter: list_comments_arg
 * 
 * Creates the list comments arguments
 */
function cleanyetibasic_list_comments_arg() {
	$content = 'type=comment&callback=cleanyetibasic_comments';
	return apply_filters('list_comments_arg', $content);
}


/**
 * Filter: cleanyetibasic_postcomment_text
 * 
 * Creates the standard text 'Post a Comment'
 * Located in comments.php
 */
function cleanyetibasic_postcomment_text() {
	/* translators: comment form title */
    $content = __('Post a Comment', 'cleanyetibasic');
    return apply_filters( 'cleanyetibasic_postcomment_text', $content );
}

/**
 * Filter: cleanyetibasic_postreply_text
 * 
 * Creates the standard text 'Post a Reply to %s'
 * Located in comments.php
 */
function cleanyetibasic_postreply_text() {
	/* translators: comment reply form title, %s is author of comment */
    $content = __('Post a Reply to %s', 'cleanyetibasic');
    return apply_filters( 'cleanyetibasic_postreply_text', $content );
}

/**
 * Filter: cleanyetibasic_commentbox_text
 * 
 * Creates the standard text 'Comment' for the text box
 * Located in comments.php
 */
function cleanyetibasic_commentbox_text() {
	/* translators: label for comment form textarea */
	$content = _x('Comment', 'noun', 'cleanyetibasic');
    return apply_filters( 'cleanyetibasic_commentbox_text', $content );
}

/**
 * Filter: cleanyetibasic_cancelreply_text function.
 * 
 * Creates the standard text 'Cancel reply'
 * Located in comments-extensions.php
 */
function cleanyetibasic_cancelreply_text() {
    $content = __('Cancel reply', 'cleanyetibasic');
    return apply_filters( 'cleanyetibasic_cancelreply_text', $content );
}

/**
 * Filter: cleanyetibasic_commentbutton_text
 * 
 * Creates the standard text 'Post Comment' for the send button
 * Located in comments.php
 */
function cleanyetibasic_commentbutton_text() {
	/* translators: text of comment button */
    $content = esc_attr( __('Post Comment', 'cleanyetibasic') );
    return apply_filters( 'cleanyetibasic_commentbutton_text', $content );
}

/**
 * Function: cleanyetibasic_comment_form_args
 * Filter: comment_form_default_fields
 * 
 * Creates the standard arguments for comment_form()
 * Located in comments.php
 */
function cleanyetibasic_comment_form_args( $post_id = null ) {
	global $user_identity, $id;

	if ( null === $post_id )
          $post_id = $id;
      else
          $id = $post_id;

	$req = get_option( 'require_name_email' );

	$commenter = wp_get_current_commenter();

	$aria_req = ( $req ? " aria-required='true'" : '' );

	$fields =  array(
		'author' => '<div id="form-section-author" class="form-section"><div class="form-label">' . '<label for="author">' . __( 'Name', 'cleanyetibasic' ) . '</label> ' . ( $req ? '<span class="required">' . _x( '*', 'denotes required field', 'cleanyetibasic' ) . '</span>' : '' ) . '</div>' . '<div class="form-input">' . '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' .  ' maxlength="20" tabindex="3"' . $aria_req . ' /></div></div><!-- #form-section-author .form-section -->',
		'email'  => '<div id="form-section-email" class="form-section"><div class="form-label"><label for="email">' . __( 'Email', 'cleanyetibasic' ) . '</label> ' . ( $req ? '<span class="required">' . _x( '*', 'denotes required field', 'cleanyetibasic' ) . '</span>' : '' ) . '</div><div class="form-input">' . '<input id="email" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" maxlength="50" tabindex="4"' . $aria_req . ' /></div></div><!-- #form-section-email .form-section -->',
		'url'    => '<div id="form-section-url" class="form-section"><div class="form-label"><label for="url">' . __( 'Website', 'cleanyetibasic' ) . '</label></div>' . '<div class="form-input"><input id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" maxlength="50" tabindex="5" /></div></div><!-- #form-section-url .form-section -->',
	);


	$args = array(
		'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
		'comment_field'        => '<div id="form-section-comment" class="form-section"><div class="form-label"><label for="comment">' . __(cleanyetibasic_commentbox_text(), 'cleanyetibasic') . '</label></div><div class="form-textarea"><textarea id="comment" name="comment" cols="45" rows="8" tabindex="6" aria-required="true"></textarea></div></div><!-- #form-section-comment .form-section -->',

		'comment_notes_before' => '<fieldset><legend>' . sprintf( _x( 'Your email is %1$snever%2$s   published nor shared.' , '%$1s and %$2s are <em> tags for emphasis on never', 'cleanyetibasic' ), '<strong>' , '</strong>' ) . ( $req ? ' ' . sprintf( _x('Required fields are marked %1$s*%2$s', '%$1s and %$2s are <span> tags', 'cleanyetibasic'), '<span class="required">', '</span>' ) : '' ) . '</legend>',

		'must_log_in'          => '<p id="login-req">' .  sprintf( __('You must be %1$slogged in%2$s to post a comment.', 'cleanyetibasic'), sprintf('<a href="%s" title ="%s">', esc_attr( wp_login_url( apply_filters( 'the_permalink', get_permalink() ) ) ), esc_attr__( 'Log in', 'cleanyetibasic' ) ), '</a>' ). '</p>',

		'logged_in_as'         => '<fieldset><legend><span class="loggedin">' . sprintf( __('Logged in as %s', 'cleanyetibasic' ), sprintf( ' <a href="%1$s" title="%2$s">%3$s</a>', admin_url( 'profile.php' ), sprintf( esc_attr__('Logged in as %s', 'cleanyetibasic'), $user_identity ) , $user_identity ) ) .'</span> <span class="logout">(' . sprintf('<a href="%s" title="%s">%s</a>' , esc_attr( wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ), esc_attr__('Log out of this account', 'cleanyetibasic' ) , __('Log out', 'cleanyetibasic' ) ) . ')</span></legend>',
		
		'comment_notes_after'  => '<div id="form-allowed-tags" class="form-section"><p><span>' . sprintf( _x('You may use these %1$sHTML%2$s tags and attributes', '%$1s and %$2s are <abbr> tags', 'cleanyetibasic'), '<abbr title="HyperText Markup Language">', '</abbr>' ) . '</span> <code>' . allowed_tags() . '</code></p></div></fieldset>',

		'id_form'              => 'commentform',
		'id_submit'            => 'submit',
		'title_reply'          => cleanyetibasic_postcomment_text(),
		'title_reply_to'       => cleanyetibasic_postreply_text(),
		'cancel_reply_link'    => cleanyetibasic_cancelreply_text(),
		'label_submit'         => cleanyetibasic_commentbutton_text()

	);
	return apply_filters( 'cleanyetibasic_comment_form_args', $args );	
}

/**
 * Produces an avatar image with the hCard-compliant photo class
 */
function cleanyetibasic_commenter_link() {
	$commenter = get_comment_author_link();
	$avatar_email = get_comment_author_email();
	$avatar_size = apply_filters( 'avatar_size', '80' ); // Available filter: avatar_size
	$avatar = str_replace( "class='avatar", "class='photo avatar", get_avatar( $avatar_email, $avatar_size ) );
	echo $avatar . ' <span class="fn n">' . $commenter . '</span>';
} 

/**
 * ActionHook: cleanyetibasic_comments_template
 */
function cleanyetibasic_comments_template() {
	do_action('cleanyetibasic_comments_template');
}

/**
 *  Outputs the standard comments template
 */
function cleanyetibasic_include_comments() {
	// Checking for defined constant to enable conditional comment display for Pages
    if (  current_theme_supports( 'cleanyetibasic_legacy_comment_handling' ) && is_page() ) {
    	// Needs post-meta key/value of "comments" to call comments template on Pages!
       	if ( get_post_custom_values('comments') )
			comments_template('', true);	    	
	// WordPress standard comment handling is the default if constant is not set
	} else {
		comments_template('', true);
	}
}

add_action('cleanyetibasic_comments_template','cleanyetibasic_include_comments', 5);

function cleanyetibasic_get_comment_link( $link , $comment, $args ) {
	global  $wp_rewrite; 

	$args['type'] = 'comment';
	$args['page'] = get_page_of_comment( $comment->comment_ID, $args );
	
	if ( $args['per_page'] ) {
		if ( '' == $args['page'] )
			$args['page'] = ( !empty($in_comment_loop) ) ? get_query_var('cpage') : get_page_of_comment( $comment->comment_ID, $args );

		if ( $wp_rewrite->using_permalinks() )
			$link = user_trailingslashit( trailingslashit( get_permalink( $comment->comment_post_ID ) ) . 'comment-page-' . $args['page'], 'comment' );
		else
			$link = add_query_arg( 'cpage', $args['page'], get_permalink( $comment->comment_post_ID ) );
	} else {
		$link = get_permalink( $comment->comment_post_ID );
	}

	return $link . '#comment-' . $comment->comment_ID; 
}
add_filter( 'get_comment_link', 'cleanyetibasic_get_comment_link', 10, 3 );

?>