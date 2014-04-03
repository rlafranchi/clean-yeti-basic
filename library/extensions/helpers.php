<?php
/**
 * Helper Functions
 *
 * @package cleanyetibasicCoreLibrary
 * @subpackage Helpers
 */
 
 

/**
 * Create bullet-proof excerpt for meta name="description"
 * 
 * @param mixed $text
 * @return $text
 */
function cleanyetibasic_trim_excerpt($text) {
	if ( '' == $text ) {
		$text = get_the_content('');

		$text = strip_shortcodes( $text );

		$text = str_replace(']]>', ']]&gt;', $text);
		$text = strip_tags($text);
	  $text = str_replace('"', '\'', $text);
		$excerpt_length = apply_filters('excerpt_length', 55);
		$words = explode(' ', $text, $excerpt_length + 1);
		if (count($words) > $excerpt_length) {
			array_pop($words);
			array_push($words, '[...]');
			$text = implode(' ', $words);
		}
	}
	return $text;
}


/**
 * cleanyetibasic_the_excerpt function.
 * 
 * @param string $deprecated (default: '')
 * @return $output
 */
function cleanyetibasic_the_excerpt( $deprecated = '' ) {
	global $post;
	$output = '';
	$output = strip_tags( $post->post_excerpt );
	$output = str_replace( '"', '\'', $output );
	if ( post_password_required($post) ) {
		$output = __( 'There is no excerpt because this is a protected post.', 'cleanyetibasic');
		return $output;
	}

	return $output;
	
}


/**
 * cleanyetibasic_excerpt_rss function.
 *
 * @return $output
 */
function cleanyetibasic_excerpt_rss() {
	global $post;
	$output = '';
	$output = strip_tags( $post->post_excerpt );
	if ( post_password_required( $post ) ) {
		$output = __( 'There is no excerpt because this is a protected post.', 'cleanyetibasic' );
		return $output;
}

	return apply_filters( 'cleanyetibasic_excerpt_rss', $output );

}

add_filter( 'cleanyetibasic_excerpt_rss', 'cleanyetibasic_trim_excerpt' );


/**
 * Create nice multi_tag_title
 */
function cleanyetibasic_tag_query() {
	$nice_tag_query = get_query_var( 'tag' ); // tags in current query
	$nice_tag_query = str_replace(' ', '+', $nice_tag_query); // get_query_var returns ' ' for AND, replace by +
	$tag_slugs = preg_split('%[,+]%', $nice_tag_query, -1, PREG_SPLIT_NO_EMPTY); // create array of tag slugs
	$tag_ops = preg_split('%[^,+]*%', $nice_tag_query, -1, PREG_SPLIT_NO_EMPTY); // create array of operators

	$tag_ops_counter = 0;
	$nice_tag_query = '';

	foreach ($tag_slugs as $tag_slug) { 
		$tag = get_term_by('slug', $tag_slug ,'post_tag');
		// prettify tag operator, if any
		if ( isset($tag_ops[$tag_ops_counter])  &&  $tag_ops[$tag_ops_counter] == ',') {
			$tag_ops[$tag_ops_counter] = ', ';
		} elseif ( isset( $tag_ops[$tag_ops_counter])  &&  $tag_ops[$tag_ops_counter] == '+') {
			$tag_ops[$tag_ops_counter] = ' + ';
		}
		// concatenate display name and prettified operators
		if ( isset( $tag_ops[$tag_ops_counter] ) ) {
			$nice_tag_query = $nice_tag_query.$tag->name.$tag_ops[$tag_ops_counter];
			$tag_ops_counter += 1;
		} else {
			$nice_tag_query = $nice_tag_query.$tag->name;
			$tag_ops_counter += 1;
		}
	}
	return $nice_tag_query;
}


/**
 * Gets the term name of the current post
 *
 * @todo deprcate when cleanyetibasic_body_class becomes a filter of body_class
 * @return $term->name
 */
function cleanyetibasic_get_term_name() {
	$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
	return $term->name;
}


/**
 * Check to see if the current post is a custom post type
 * 
 * @return bool
 */
function cleanyetibasic_is_custom_post_type() {
	global $post; 

	if ( !in_array(  $post->post_type , get_post_types( array( '_builtin' => true ) ) ) ) {
		return true;
 	}
 	return false;
 }

/**
 * Modification of wp_link_pages() with an extra element to highlight the current page.
 *
 * @param  array $args
 * @return void
 */
function cleanyetibasic_numerical_link_pages( $args = array () )
{
    $defaults = array(
        'before'      => '<p>' . __( 'Pages:', 'cleanyetibasic' )
    ,   'after'       => '</p>'
    ,   'link_before' => ''
    ,   'link_after'  => ''
    ,   'pagelink'    => '%'
    ,   'echo'        => 1
    );

    $r = wp_parse_args( $args, $defaults );
    $r = apply_filters( 'wp_link_pages_args', $r );
    extract( $r, EXTR_SKIP );

    global $page, $numpages, $multipage, $more, $pagenow;

    if ( ! $multipage )
    {
        return;
    }

    $output = $before;

    for ( $i = 1; $i < ( $numpages + 1 ); $i++ )
    {
        $j       = str_replace( '%', $i, $pagelink );
        $output .= ' ';

        if ( $i != $page || ( ! $more && 1 == $page ) )
        {
            $output .= "<li>" . _wp_link_page( $i ) . "{$link_before}{$j}{$link_after}</a></li>";
        }
        else
        {   // highlight the current page
            // not sure if we need $link_before and $link_after
            $output .= "<li><span class=\"page-numbers current\">{$link_before}{$j}{$link_after}</span></li>";
        }
    }

    $echo and print $output . $after;
    return $output . $after;
}

/**
 * Locate the directory URI for a template
 * 
 * This function is essentially a rewrite of locate_template()
 * that searches for filepath and returns file directory. Useful for
 * child-theme overrides of parent Theme resources.
 */
function cleanyetibasic_locate_template_uri( $template_names, $load = false, $require_once = true ) {
	$located = '';
	foreach ( (array) $template_names as $template_name ) {
		if ( ! $template_name ) {
			continue;
		}
		if ( file_exists( get_stylesheet_directory() . '/' . $template_name ) ) {
			$located = get_stylesheet_directory_uri() . '/' . $template_name;
			break;
		} else if ( file_exists( get_template_directory() . '/' . $template_name ) ) {
			$located = get_template_directory_uri() . '/' . $template_name;
			break;
		}
	}

	if ( $load && '' != $located ) {
		load_template( $located, $require_once );
	}

	return $located;
}
?>