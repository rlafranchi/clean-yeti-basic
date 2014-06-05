<?php
/**
 * Content Extensions
 *
 * @package cleanyetibasicCoreLibrary
 * @subpackage ContentExtensions
 * @todo revisit docblock desciptions & tags
 */


/**
 * Register action hook: cleanyetibasic_abovecontainer
 *
 * Located in 404.php, archive.php, archives.php, attachement.php, author.php, category.php index.php,
 * page.php, search.php, single.php, tag.php
 * Just between #main and #container
 */
function cleanyetibasic_abovecontainer() {
    do_action('cleanyetibasic_abovecontainer');
} // end cleanyetibasic_abovecontainer


/**
 * Register action hook: cleanyetibasic_abovecontent
 *
 * Located in 404.php, archive.php, archives.php, attachement.php, author.php, category.php index.php,
 * page.php, search.php, single.php, tag.php
 * Just between #main and #container
 */
function cleanyetibasic_abovecontent() {
    do_action('cleanyetibasic_abovecontent');
} // end cleanyetibasic_abovecontent


/**
 * Register action hook: cleanyetibasic_abovepost
 *
 * Located in 404.php, archives.php, attachment.php, page.php, search.php and template-page-fullwidth.php
 * Just above #post
 */
function cleanyetibasic_abovepost() {
    do_action('cleanyetibasic_abovepost');
} // end cleanyetibasic_abovepost


/**
 * Register action hook: cleanyetibasic_archives
 *
 * Located in archives.php
 * Just after the content
 */
function cleanyetibasic_archives() {
	do_action('cleanyetibasic_archives');
} // end cleanyetibasic_archives


/**
 * Register action hook: cleanyetibasic_navigation_above
 *
 * Located in archive.php, author.php, category.php, index.php, search.php, single.php, tag.php
 * Just before the content
 */
function cleanyetibasic_navigation_above() {
	do_action('cleanyetibasic_navigation_above');
} // end cleanyetibasic_navigation_above


/**
 * Register action hook: cleanyetibasic_navigation_below
 *
 * Located in archive.php, author.php, category.php, index.php, search.php, single.php, tag.php
 * Just after the content
 */
function cleanyetibasic_navigation_below() {
	do_action('cleanyetibasic_navigation_below');
} // end cleanyetibasic_navigation_below


/**
 * Register action hook: cleanyetibasic_above_indexloop
 *
 * Located in index.php
 * Just before the loop
 */
function cleanyetibasic_above_indexloop() {
    do_action('cleanyetibasic_above_indexloop');
} // end cleanyetibasic_above_indexloop


/**
 * Register action hook: cleanyetibasic_above_archiveloop
 *
 * Located in archive.php
 * Just before the loop
 */
function cleanyetibasic_above_archiveloop() {
    do_action('cleanyetibasic_above_archiveloop');
} // end cleanyetibasic_above_archiveloop


/**
 * Register action hook: cleanyetibasic_archiveloop
 *
 * Located in archive.php
 * The Loop used on archive pages
 */
function cleanyetibasic_archiveloop() {
	do_action('cleanyetibasic_archiveloop');
} // end cleanyetibasic_archiveloop


/**
 * Register action hook: cleanyetibasic_authorloop
 *
 * Located in author.pgp
 * The Loop used on author pages
 */
function cleanyetibasic_authorloop() {
	do_action('cleanyetibasic_authorloop');
} // end cleanyetibasic_authorloop


/**
 * Register action hook: cleanyetibasic_categoryloop
 *
 * Located in category.php
 * The Loop used on category pages
 */
function cleanyetibasic_categoryloop() {
	do_action('cleanyetibasic_categoryloop');
} // end cleanyetibasic_categoryloop


/**
 * Register action hook: cleanyetibasic_indexloop
 *
 * Located in index.php
 * The default loop
 */
function cleanyetibasic_indexloop() {
	do_action('cleanyetibasic_indexloop');
} // end cleanyetibasic_indexloop


/**
 * Register action hook: cleanyetibasic_searchloop
 *
 * Located in search.php
 * The loop used on search result pages
 */
function cleanyetibasic_searchloop() {
	do_action('cleanyetibasic_searchloop');
} // end cleanyetibasic_searchloop


/**
 * Register action hook: cleanyetibasic_singlepost
 *
 * Located in single.php
 * The Loop on single pages
 */
function cleanyetibasic_singlepost() {
	do_action('cleanyetibasic_singlepost');
} //end cleanyetibasic_singlepost


/**
 * Register action hook: cleanyetibasic_tagloop
 *
 * Located in tag.php
 * The Loop on tag archive pages
 */
function cleanyetibasic_tagloop() {
	do_action('cleanyetibasic_tagloop');
} // end cleanyetibasic_tagloop


/**
 * Register action hook: cleanyetibasic_below_indexloop
 *
 * Located in index.php
 * Just after the loop
 */
function cleanyetibasic_below_indexloop() {
    do_action('cleanyetibasic_below_indexloop');
} // end cleanyetibasic_below_indexloop


/**
 * Register action hook: cleanyetibasic_below_archiveloop
 *
 * Located in archive.php
 * Just after the loop
 */
function cleanyetibasic_below_archiveloop() {
    do_action('cleanyetibasic_below_archiveloop');
} // end cleanyetibasic_below_archiveloop


/**
 * Register action hook: cleanyetibasic_above_categoryloop
 *
 * Located in category.php
 * Just before the loop
 */
function cleanyetibasic_above_categoryloop() {
    do_action('cleanyetibasic_above_categoryloop');
} // end cleanyetibasic_above_categoryloop


/**
 * Register action hook: cleanyetibasic_below_categoryloop
 *
 * Located in category.php
 * Just after the loop
 */
function cleanyetibasic_below_categoryloop() {
    do_action('cleanyetibasic_below_categoryloop');
} // end cleanyetibasic_below_categoryloop


/**
 * Register action hook: cleanyetibasic_above_searchloop
 *
 * Located in search.php
 * Just before the loop
 */
function cleanyetibasic_above_searchloop() {
    do_action('cleanyetibasic_above_searchloop');
} // end cleanyetibasic_above_searchloop


/**
 * Register action hook: cleanyetibasic_below_searchloop
 *
 * Located in search.php
 * Just after the loop
 */
function cleanyetibasic_below_searchloop() {
    do_action('cleanyetibasic_below_searchloop');
} // end cleanyetibasic_below_searchloop


/**
 * Register action hook: cleanyetibasic_above_tagloop
 *
 * Located in tag.php
 * Just before the loop
 */
function cleanyetibasic_above_tagloop() {
    do_action('cleanyetibasic_above_tagloop');
} // end cleanyetibasic_above_tagloop


/**
 * Register action hook: cleanyetibasic_init
 *
 * Located in tag.php
 * Just after the loop
 */
function cleanyetibasic_below_tagloop() {
    do_action('cleanyetibasic_below_tagloop');
} // end cleanyetibasic_below_tagloop


/**
 * Register action hook: cleanyetibasic_belowpost
 *
 * Located in 404.php, archives.php, attachment.php, page.php, search.php and template-page-fullwidth.php
 * Just below #post
 */
function cleanyetibasic_belowpost() {
    do_action('cleanyetibasic_belowpost');
} // end cleanyetibasic_belowpost


/**
 * Register action hook: cleanyetibasic_belowcontent
 *
 * Located in 404.php, archive.php, archives.php, attachement.php, author.php, category.php index.php,
 * page.php, search.php, single.php, tag.php
 * Just below #content
 */
function cleanyetibasic_belowcontent() {
    do_action('cleanyetibasic_belowcontent');
} // end cleanyetibasic_belowcontent


/**
 * Register action hook: cleanyetibasic_belowcontainer
 *
 * Located in 404.php, archive.php, archives.php, attachement.php, author.php, category.php index.php,
 * page.php, search.php, single.php, tag.php
 * Just below #container
 */
function cleanyetibasic_belowcontainer() {
    do_action('cleanyetibasic_belowcontainer');
} // end cleanyetibasic_belowcontainer

function childtheme_override_page_title() {
    echo "";
}



if (function_exists('childtheme_override_archive_loop'))  {
	/**
	 * @ignore
	 */
	function cleanyetibasic_archive_loop() {
		childtheme_override_archive_loop();
	}
} else {
	/**
	 * The Archive loop
	 *
	 * Located in archive.php
	 *
	 * Override: childtheme_override_archive_loop
	 */
	function cleanyetibasic_archive_loop() {
		while ( have_posts() ) : the_post();

				// action hook for insterting content above #post
				cleanyetibasic_abovepost();

                //post-formats
                $format = get_post_format();
                if ( false === $format )
	                $format = 'standard';
                get_template_part( 'library/postformats/format', $format );

				// action hook for insterting content below #post
				cleanyetibasic_belowpost();

		endwhile;
	}
} // end archive_loop

add_action('cleanyetibasic_archiveloop', 'cleanyetibasic_archive_loop');


if (function_exists('childtheme_override_author_loop'))  {
	/**
	 * @ignore
	 */
	function cleanyetibasic_author_loop() {
		childtheme_override_author_loop();
	}
} else {
	/**
	 * The Author loop
	 *
	 * Located in author.php
	 *
	 * Override: childtheme_override_author_loop
	 */
	function cleanyetibasic_author_loop() {
		rewind_posts();
		while ( have_posts() ) : the_post();

				// action hook for insterting content above #post
				cleanyetibasic_abovepost();

                //post-formats
                $format = get_post_format();
                if ( false === $format )
	                $format = 'standard';
                get_template_part( 'library/postformats/format', $format );

				// action hook for insterting content below #post
				cleanyetibasic_belowpost();

		endwhile;
	}
} // end author_loop

add_action('cleanyetibasic_authorloop', 'cleanyetibasic_author_loop');


if (function_exists('childtheme_override_category_loop'))  {
	/**
	 * @ignore
	 */
	function cleanyetibasic_category_loop() {
		childtheme_override_category_loop();
	}
} else {
	/**
	 * The Category loop
	 *
	 * Located in category.php
	 *
	 * Override: childtheme_override_category_loop
	 */
	function cleanyetibasic_category_loop() {
		while ( have_posts() ) : the_post();

				// action hook for insterting content above #post
				cleanyetibasic_abovepost();

				//post-formats
				$format = get_post_format();
				if ( false === $format )
					$format = 'standard';
				get_template_part( 'library/postformats/format', $format );

				// action hook for insterting content below #post
				cleanyetibasic_belowpost();

		endwhile;
	}
} // end category_loop

add_action('cleanyetibasic_categoryloop', 'cleanyetibasic_category_loop');


if (function_exists('childtheme_override_index_loop'))  {
	/**
	 * @ignore
	 */
	function cleanyetibasic_index_loop() {
		childtheme_override_index_loop();
	}
} else {
	/**
	 * The Index loop
	 *
	 * Located in index.php
	 *
	 * Override: childtheme_override_index_loop
	 */
	function cleanyetibasic_index_loop() {

		while ( have_posts() ) : the_post();

				// action hook for inserting content above #post
				cleanyetibasic_abovepost();

				//post-formats
				$format = get_post_format();
				if ( false === $format )
					$format = 'standard';
				get_template_part( 'library/postformats/format', $format );

				if ( function_exists( 'cleanyetibasic_numerical_link_pages' )) {
					cleanyetibasic_numerical_link_pages( array (
						'before' => sprintf('<div class="pagination-centered"><ul class="page-numbers">%s', __('<li class="unavailable">Pages:<li>', 'cleanyetibasic')),
						'after'  => '</ul></div>'
					));
				} else {
					wp_link_pages();
				}

				// action hook for insterting content below #post
				cleanyetibasic_belowpost();

				comments_template();

		endwhile;
	}
} // end index_loop

add_action('cleanyetibasic_indexloop', 'cleanyetibasic_index_loop');


if (function_exists('childtheme_override_single_post'))  {
	/**
	 * @ignore
	 */
	function cleanyetibasic_single_post() {
		childtheme_override_single_post();
	}
} else {
	/**
	 * The Single post loop
	 *
	 * Located in single.php
	 *
	 * Override: childtheme_override_single_post
	 */
	function cleanyetibasic_single_post() {

				// action hook for insterting content above #post
				cleanyetibasic_abovepost();

				//post-formats
				$format = get_post_format();
				if ( false === $format )
					$format = 'standard';
				get_template_part( 'library/postformats/format', $format );

				if ( function_exists( 'cleanyetibasic_numerical_link_pages' )) {
					cleanyetibasic_numerical_link_pages( array (
						'before' => sprintf('<div class="pagination-centered"><ul class="page-numbers">%s', __('<li class="unavailable">Pages:<li>', 'cleanyetibasic')),
						'after'  => '</ul></div>'
					));
				} else {
					wp_link_pages();
				}

				// action hook for insterting content below #post
				cleanyetibasic_belowpost();
	}
} // end single_post

add_action('cleanyetibasic_singlepost', 'cleanyetibasic_single_post');


if (function_exists('childtheme_override_search_loop'))  {
	/**
	 * @ignore
	 */
	function cleanyetibasic_search_loop() {
		childtheme_override_search_loop();
	}
} else {
	/**
	 * The Search loop
	 *
	 * Located in search.php
	 *
	 * Override: childtheme_override_search_loop
	 */
	function cleanyetibasic_search_loop() {
		while ( have_posts() ) : the_post();

				// action hook for insterting content above #post
				cleanyetibasic_abovepost();

				//post-formats
				$format = get_post_format();
				if ( false === $format )
					$format = 'standard';
				get_template_part( 'library/postformats/format', $format );

				// action hook for insterting content below #post
				cleanyetibasic_belowpost();

		endwhile;
	}
} // end search_loop

add_action('cleanyetibasic_searchloop', 'cleanyetibasic_search_loop');


if (function_exists('childtheme_override_tag_loop'))  {
	/**
	 * @ignore
	 */
	function cleanyetibasic_tag_loop() {
		childtheme_override_tag_loop();
	}
} else {
	/**
	 * The Tag loop
	 *
	 * Located in tag.php
	 *
	 * Override: childtheme_override_tag_loop
	 */
	function cleanyetibasic_tag_loop() {
		while ( have_posts() ) : the_post();

				// action hook for insterting content above #post
				cleanyetibasic_abovepost();

				//post-formats
				$format = get_post_format();
				if ( false === $format )
					$format = 'standard';
				get_template_part( 'library/postformats/format', $format );

				// action hook for insterting content below #post
				cleanyetibasic_belowpost();

		endwhile;
	}
} // end tag_loop

add_action('cleanyetibasic_tagloop', 'cleanyetibasic_tag_loop');


/**
 * Filter: cleanyetibasic_time_title
 *
 * Create the time url title displayed in the post header
 */
function cleanyetibasic_time_title() {

	$time_title = 'Y-m-d';

	// Filters should return correct
	$time_title = apply_filters('cleanyetibasic_time_title', $time_title);

	return $time_title;
} // end time_title


/**
 * Filter: cleanyetibasic_time_display
 *
 * Create the time displayed in the post header
 */
function cleanyetibasic_time_display() {

	$time_display = get_option('date_format');

	// Filters should return correct
	$time_display = apply_filters('cleanyetibasic_time_display', $time_display);

	return $time_display;
} // end time_display


if (function_exists('childtheme_override_postheader'))  {
	/**
	 * @ignore
	 */
	function cleanyetibasic_postheader() {
		childtheme_override_postheader();
	}
} else {
	/**
	 * Create the post header
	 *
	 * Override: childtheme_override_postheader <br>
	 * Filter: cleanyetibasic_postheader
	 */
	function cleanyetibasic_postheader() {

 	   global $post;

 	   if ( is_404() || $post->post_type == 'page') {
 	       $postheader = cleanyetibasic_postheader_posttitle();
 	   } else {
 	       $postheader = cleanyetibasic_postheader_posttitle() . cleanyetibasic_postheader_postmeta();
 	   }

 	   echo apply_filters( 'cleanyetibasic_postheader', $postheader ); // Filter to override default post header
	}
}  // end postheader


if (function_exists('childtheme_override_postheader_posteditlink'))  {
	/**
	 * @ignore
	 */
	function cleanyetibasic_postheader_posteditlink() {
		return childtheme_override_postheader_posteditlink();
	}
} else {
	/**
	 * Create the post edit link
	 *
	 * Override: childtheme_override_postheader_posteditlink <br>
	 * Filter: cleanyetibasic_postheader_posteditlink
	 */
	function cleanyetibasic_postheader_posteditlink() {

    	$posteditlink = sprintf( '<a href="%s" title="%s">%s</a>' ,

			    			get_edit_post_link(),
			    			esc_attr__('Edit post', 'cleanyetibasic'),
							/* translators: post edit link */
			    			__('Edit', 'cleanyetibasic'));

		return apply_filters('cleanyetibasic_postheader_posteditlink', $posteditlink);

	}
} // end postheader_posteditlink

if (function_exists('childtheme_override_pageeditlink'))  {
	/**
	 * @ignore
	 */
	function cleanyetibasic_pageeditlink() {
		return childtheme_override_pageeditlink(); 
	}
} else {
	/**
	 * Create the page edit link
	 * 
	 * Override: childtheme_override_pageeditlink <br>
	 * Filter: cleanyetibasic_pageeditlink
	 */
	function cleanyetibasic_pageeditlink() {
	  
    if (current_user_can('edit_posts')) {

    	$posteditlink = sprintf( '<a href="%s" title="%s">%s</a>' , 

			    			get_edit_post_link(),
			    			esc_attr__('Edit page', 'cleanyetibasic'),
							/* translators: page edit link */
			    			__('Edit', 'cleanyetibasic'));
		
		  return apply_filters('cleanyetibasic_pageeditlink', $posteditlink);
    }
	}
} // end pageeditlink


if (function_exists('childtheme_override_postheader_posttitle'))  {
	/**
	 * @ignore
	 */
	function cleanyetibasic_postheader_posttitle() {
		return childtheme_override_postheader_posttitle();
	}
} else {
	/**
	 * Create the post title
	 *
	 * Override: childtheme_override_postheader_posttitle <br>
	 * Filter: cleanyetibasic_postheader_posttitle
	 */
	function cleanyetibasic_postheader_posttitle() {
		$posttitle = "\n\n\t\t\t\t\t";

		if ( !$title_content = get_the_title() )
			$title_content = _x('', 'Default title for untitled posts', 'cleanyetibasic');

	    if (is_single() || is_page()) {
	        $posttitle .= '<h1 class="entry-title">' . $title_content . "</h1>\n";
	    } elseif (is_404()) {
	        $posttitle .= '<h1 class="entry-title">' . __('Not Found', 'cleanyetibasic') . "</h1>\n";
	    } else {
	        $posttitle .= '<h2 class="entry-title">';
	        $posttitle .= sprintf('<a href="%s" title="%s" rel="bookmark">%s</a>',
	        		apply_filters('the_permalink', get_permalink()),
				sprintf( esc_attr__('Permalink to %s', 'cleanyetibasic'), the_title_attribute( 'echo=0' ) ),
	        		$title_content
	        		);
	        $posttitle .= "</h2>\n";
	    }

	    return apply_filters('cleanyetibasic_postheader_posttitle',$posttitle);
	}
} // end postheader_posttitle


if (function_exists('childtheme_override_postheader_postmeta'))  {
	/**
	 * @ignore
	 */
	function cleanyetibasic_postheader_postmeta() {
		return childtheme_override_postheader_postmeta();
	}
} else {
	/**
	 * Create the post meta
	 *
	 * Override: childtheme_override_postheader_postmeta <br>
	 * Filter: cleanyetibasic_postheader_postmeta
	 */
	function cleanyetibasic_postheader_postmeta() {

		$postmeta  = "\n\t\t\t\t\t";
		$postmeta .= '<div class="entry-meta">' . "\n\n";
		$postmeta .= "\t" . '<p>' . "\n\n";
		$postmeta .= "\t\t" . cleanyetibasic_postmeta_authorlink() . "\n\n";
		$postmeta .= "\t\t" . cleanyetibasic_postmeta_editlink() . "\n\n";
		$postmeta .= "\t" . '</p>' . "\n\n";
		$postmeta .= '</div><!-- .entry-meta -->' . "\n";

	    return apply_filters('cleanyetibasic_postheader_postmeta',$postmeta);

	}
} // end postheader_postmeta


if (function_exists('childtheme_override_postmeta_authorlink'))  {
	/**
	 * @ignore
	 */
	function cleanyetibasic_postmeta_authorlink() {
		return childtheme_override_postmeta_authorlink();
	}
} else {
	/**
	 * Create the author link for post meta
	 *
	 * Override: childtheme_override_postmeta_authorlink <br>
	 * Filter: cleanyetibasic_postmeta_authorlink
	 */
	function cleanyetibasic_postmeta_authorlink() {
		global $authordata;

	    $author_prep = '<span class="meta-prep meta-prep-author">' . __('By', 'cleanyetibasic') . ' </span>';

	    if ( cleanyetibasic_is_custom_post_type() && !current_theme_supports( 'cleanyetibasic_support_post_type_author_link' ) ) {
	    	$author_info  = '<span class="vcard"><span class="fn nickname">';
	    	$author_info .= get_the_author_meta( 'display_name' ) ;
	    	$author_info .= '</span></span>';
	    } else {
	    	$author_info  = '<span class="author vcard">';
	    	$author_info .= sprintf('<a class="url fn n" href="%s" title="%s">%s</a>',
	    							get_author_posts_url( $authordata->ID, $authordata->user_nicename ),
									/* translators: author name */
	    							sprintf( esc_attr__( 'View all posts by %s', 'cleanyetibasic' ), get_the_author_meta( 'display_name' ) ),
	    							get_the_author_meta( 'display_name' ));
	    	$author_info .= '</span>';
	    }

	    $author_credit = $author_prep . $author_info ;

	    return apply_filters('cleanyetibasic_postmeta_authorlink', $author_credit);

	}
} // end postmeta_authorlink


if (function_exists('childtheme_override_postmeta_entrydate'))  {
	/**
	 * @ignore
	 */
	function cleanyetibasic_postmeta_entrydate() {
		return childtheme_override_postmeta_entrydate();
	}
} else {
	/**
	 * Create entry date for post meta
	 *
	 * Override: childtheme_override_postmeta_entrydate <br>
	 * Filter: cleanyetibasic_postmeta_entrydate
	 */
	function cleanyetibasic_postmeta_entrydate() {

	    $entrydate = __('Published:', 'cleanyetibasic');
	    $entrydate .= '<abbr class="published" title="';
	    $entrydate .= get_the_time(cleanyetibasic_time_title()) . '">';
	    $entrydate .= get_the_time(cleanyetibasic_time_display());
	    $entrydate .= '</abbr>';

	    return apply_filters('cleanyetibasic_postmeta_entrydate', $entrydate);

	}
} // end postmeta_entrydate


if (function_exists('childtheme_override_postmeta_editlink'))  {
	/**
	 * @ignore
	 */
	function cleanyetibasic_postmeta_editlink() {
		return childtheme_override_postmeta_editlink();
	}
} else {
	/**
	 * Create edit link for post meta
	 *
	 * Override: childtheme_override_postmeta_editlink <br>
	 * Filter: cleanyetibasic_postmeta_editlink
	 */
	function cleanyetibasic_postmeta_editlink() {

	    // Display edit link
	    if (current_user_can('edit_posts')) {
	        $editlink = '<span class="meta-sep meta-sep-edit"> </span> ' . "\n\n\t\t\t\t\t\t" . cleanyetibasic_postheader_posteditlink();
	        return apply_filters('cleanyetibasic_postmeta_editlink', $editlink);
	    }
	}
} // end postmeta_editlink


// Sets up the post content
if (function_exists('childtheme_override_content_init'))  {
	/**
	 * @ignore
	 */
	function cleanyetibasic_content_init() {
		childtheme_override_content_init();
	}
} else {
	/**
	 * Set up the post content to use excerpt or full posts
	 *
	 * Uses conditional template tags to decide whether posts should be displayed using excerpts or the full content
	 *
	 * Override: childtheme_override_content_init <br>
	 * Filter: cleanyetibasic_content
	 */
	function cleanyetibasic_content_init() {
		global $cleanyetibasic_content_length;

		$content = '';
		$cleanyetibasic_content_length = '';

		if ( is_singular() ) {
			$content = 'full';
		} else {
			$content = 'excerpt';
		}

		$cleanyetibasic_content_length = apply_filters('cleanyetibasic_content', $content);

	}
} // end content_init

add_action('cleanyetibasic_abovepost','cleanyetibasic_content_init');


if (function_exists('childtheme_override_content'))  {
	/**
	 * @ignore
	 */
	function cleanyetibasic_content() {
		childtheme_override_content();
	}
} else {
	/**
	 * Create the post content
	 *
	 * Detects whether to use the full length or excerpt of a post and displays it. Post thumbnails are included on
	 * excerpt posts.
	 *
	 * Override: childtheme_override_content <br>
	 * Filter: cleanyetibasic_post_thumbs <br>
	 * Filter: cleanyetibasic_post_thumb_size <br>
	 * Filter: cleanyetibasic_post_thumb_attr <br>
	 * Filter: cleanyetibasic_post
	 */
	function cleanyetibasic_content() {
		global $cleanyetibasic_content_length;
		$posttype = get_post_type();
		if ( strtolower($cleanyetibasic_content_length) == 'full' ) {
			$post = get_the_content( cleanyetibasic_more_text() );
			$post = apply_filters( 'the_content', $post );
			// Display edit link
			if (current_user_can('edit_posts')) {
				$post .= cleanyetibasic_postfooter_posteditlink();
			}
		} elseif ( strtolower($cleanyetibasic_content_length) == 'excerpt') {
			if ( get_post_format() == 'gallery' ) {
				$post = '<div class="small-12 columns">';
				$post .=cleanyetibasic_attachment_gallery_data();
				$post .='</div>';
			} elseif ( get_post_format() == 'image' && !has_post_thumbnail() ) {
				$post =cleanyetibasic_image_attachments();
			} elseif ( get_post_format() == 'video' ) {
				$post = '<div class="row">';
				$post .= '<div class="large-6 columns">';
				$post .= cleanyetibasic_get_first_video();
				$post .= '</div>';
				$post .= '<div class="large-6 columns"><p>';
				$post .= get_the_excerpt();
				$post .= '</p></div>';
				$post .= '</div>';
				$post = apply_filters('the_excerpt',$post);
			} elseif ( get_post_format() == 'quote' ) {
				$post = get_the_content( cleanyetibasic_more_text() );
				$post = apply_filters('the_content', $post);
				$post = str_replace(']]>', ']]&gt;', $post);
			} else {
				if ( apply_filters( 'cleanyetibasic_post_thumbs', TRUE) ) {
					$post_title = get_the_title();
					$size = apply_filters( 'cleanyetibasic_post_thumb_size' , array(400,300) );
					$attr = apply_filters( 'cleanyetibasic_post_thumb_attr', array('title'	=> sprintf( esc_attr__('Permalink to %s', 'cleanyetibasic'), the_title_attribute( 'echo=0' ) ), 'class' => 'th' ) );
					if ( has_post_thumbnail() ) {
						$post = '<div class="medium-8 columns"><p>';
						$post .= get_the_excerpt();
						$post .='</p>';
						$post .='</div>';
						$post = apply_filters('the_excerpt',$post);
						$post = sprintf('<div class="medium-4 columns"><a class="entry-thumb" href="%s" title="%s">%s</a></div>',
						get_permalink() ,
						sprintf( esc_attr__('Permalink to %s', 'cleanyetibasic'), the_title_attribute( 'echo=0' ) ),
						get_the_post_thumbnail(get_the_ID(), $size, $attr)) . $post;
					} else {
						$post = '<div class="large-12 columns"><p>';
						$post .= get_the_excerpt();
						$post .='</p>';
						if ( $posttype == 'page' ) {
							$post .= '<a href="' . get_permalink() . '" class="tiny button secondary radius">' . __( 'View Page', 'cleanyetibasic' ) . '</a>';
						}
						$post .='</div>';
						$post = apply_filters('the_excerpt',$post);

					}
				}
			}
		} elseif ( strtolower($cleanyetibasic_content_length) == 'none') {
			$post= '';
		} else {
			$post ='<div class="small-12 columns">';
			$post .= get_the_content();
			$post .='</div>';
			$post = apply_filters('the_content', $post);
			$post = str_replace(']]>', ']]&gt;', $post);
		}
		echo apply_filters('cleanyetibasic_post', $post);
	}
} // end content


if (function_exists('childtheme_override_archivesopen'))  {
	/**
	 * @ignore
	 */
	function cleanyetibasic_archivesopen() {
		childtheme_override_archivesopen();
	}
} else {
	/**
	 * Open the list of archived posts in the page template Archives Page
	 *
	 * Override: childtheme_override_archivesopen
	 */
	function cleanyetibasic_archivesopen() { ?>

		<div id="archives-page" class="row">
<?php }
} // end archivesopen

add_action('cleanyetibasic_archives', 'cleanyetibasic_archivesopen', 1);


if (function_exists('childtheme_override_category_archives'))  {
	/**
	 * @ignore
	 */
	function cleanyetibasic_category_archives() {
		childtheme_override_category_archives();
	}
} else {
	/**
	 * Display category archives
	 *
	 * Added to the archive list on the page template Archives Page
	 *
	 * Override: childtheme_override_category_archives
	 */
	function cleanyetibasic_category_archives() { ?>
				<div id="category-archives" class="large-6 columns">
					<h5><?php _e('Archives by Category', 'cleanyetibasic') ?></h5>
					<ul>
						<?php wp_list_categories( array ( 'feed' => 'RSS',
														  'title_li' => '',
														  'show_count' => true ) );
						?>
					</ul>
				</div>
<?php }
} // end category_archives

add_action('cleanyetibasic_archives', 'cleanyetibasic_category_archives', 3);


if (function_exists('childtheme_override_monthly_archives'))  {
	/**
	 * @ignore
	 */
	function cleanyetibasic_monthly_archives() {
		childtheme_override_monthly_archives();
	}
} else {
	/**
	 * Display monthly archives
	 *
	 * Added to the archive list on the page template Archives Page
	 *
	 * Override: childtheme_override_monthly_archives
	 */
	function cleanyetibasic_monthly_archives() { ?>
				<div id="monthly-archives" class="large-6 columns">
					<h5><?php _e('Archives by Month', 'cleanyetibasic') ?></h5>
					<ul>
						<?php wp_get_archives(array('type' => 'monthly',
													'show_post_count' => true )); ?>
					</ul>
				</div>
<?php }
} // end monthly_archives

add_action('cleanyetibasic_archives', 'cleanyetibasic_monthly_archives', 5);


 if (function_exists('childtheme_override_archivesclose'))  {
	/**
	 * @ignore
	 */
	function cleanyetibasic_archivesclose() {
		childtheme_override_archivesclose();
	}
} else {
	/**
	 * Close the archive list used in the page template Archives Page
	 *
	 * Override: childtheme_override_archivesclose
	 */
	function cleanyetibasic_archivesclose() { ?>
		</div>
<?php }
} // end _archivesclose

add_action('cleanyetibasic_archives', 'cleanyetibasic_archivesclose', 9);


/**
 * Register action hook: cleanyetibasic_404
 *
 * Located in 404.php
 */
function cleanyetibasic_404() {
	do_action('cleanyetibasic_404');
} // end cleanyetibasic_404


if ( function_exists('childtheme_override_404_content') )  {
	/**
	 * @ignore
	 */
	function cleanyetibasic_404_content() {
		childtheme_override_404_content();
	}
} else {
	/**
	 * Create the content for the 404 Error page
	 *
	 * Located in 404.php
	 * Override: childtheme_override_404_content
	 */
	function cleanyetibasic_404_content() { ?>
  			<?php cleanyetibasic_postheader(); ?>

			<div class="entry-content">
				<p><?php _e( 'Apologies, but we were unable to find what you were looking for. Perhaps searching will help.', 'cleanyetibasic' ) ?></p>
			</div><!-- .entry-content -->

			<?php get_search_form();
    }
} // end 404_content

add_action( 'cleanyetibasic_404','cleanyetibasic_404_content' );


/**
 * Create the $more_text for the_content
 *
 * Used on posts that are divided using the more tag in post editor
 *
 * Filter: more_text
 *
 */
function cleanyetibasic_more_text() {
	return '...';
} // end cleanyetibasic_more_text
add_filter( 'excerpt_more', 'cleanyetibasic_more_text' );

/**
 * Create the arguments for wp_list_bookmarks in links.php
 *
 * Filter: list_bookmarks_args
 *
 */
function cleanyetibasic_list_bookmarks_args() {
	$content = array ( 'title_before' => '<h2>',
						'title_after' => '</h2>');
	return apply_filters('list_bookmarks_args', $content);
} // end cleanyetibasic_list_bookmarks_args


if (function_exists('childtheme_override_postfooter'))  {
	/**
	 * @ignore
	 */
	function cleanyetibasic_postfooter() {
		childtheme_override_postfooter();
	}
} else {
	/**
	 * Create the post footer
	 *
	 * Override: childtheme_override_postfooter <br>
	 * Filter: cleanyetibasic_postfooter
	 */
	function cleanyetibasic_postfooter() {

	    $post_type = get_post_type();
	    $post_type_obj = get_post_type_object($post_type);

		// Check for "Page" post-type and logged in user to show edit link
	    if ( $post_type == 'page' && current_user_can('edit_posts') ) {
	        $postfooter = '<div class="entry-utility">' . cleanyetibasic_postfooter_posteditlink();
	        $postfooter .= "</div><!-- .entry-utility -->\n";
	    // Display nothing for logged out users on a "Page" post-type
	    } elseif ( $post_type == 'page' ) {
	        $postfooter = '';
	    // For post-types other than "Pages" press on
	    } else {
                $postfooter = '<div class="entry-utility">';
                global $postfootertabs;
                $postfootertabs = '<dl class="tabs" data-tab>';
                $postfootercontent = "\n\t\t\t\t\t\t<div class=\"tabs-content\">";
                
                $postfootertabs .= '<dd><a href="#panel-entry-utility-1' . get_the_ID() . '" class="active">' . __( 'Date', 'cleanyetibasic' ) . '</a></dd>' ."\n";
                $postfootercontent .= cleanyetibasic_postfooter_postdate();

	        if ( is_single() ) {
	        	$post_type_archive_link = ( function_exists( 'get_post_type_archive_link' )  ? get_post_type_archive_link( $post_type ) :  home_url( '/?post_type=' . $post_type ) );
	        	if ( cleanyetibasic_is_custom_post_type() && $post_type_obj->has_archive ) {

					/* translators: %s is custom post type singular name, wrapped in link tags */
                    $postfootertabs .= '<dd><a href="#panel-entry-utility-2' . get_the_ID() . '">' . __( 'Archive', 'cleanyetibasic' ) . '</a></dd>' . "\n";
					$postfootercontent .= '<div class="content" id="panel-entry-utility-2' . get_the_ID() . '"><p>' . sprintf( __( 'Browse the %s archive.', 'cleanyetibasic' ),
					/* translators: %s is custom post type singular name */
					' <a href="' . $post_type_archive_link . '" title="' . sprintf( esc_attr__( 'Permalink to %s Archive', 'cleanyetibasic' ), $post_type_obj->labels->singular_name )  . '">' . $post_type_obj->labels->singular_name . '</a>'
					);
					$postfootercontent .= '</p></div>';

	        	}

	        	$postfootercontent .= cleanyetibasic_postfooter_posttax();
                $postfootertabs .= '<dd><a href="#panel-entry-utility-7' . get_the_ID() . '">' . __( 'Permalink', 'cleanyetibasic' ) . '</a></dd>' . "\n";
	    		$postfootercontent .= '<div class="content" id="panel-entry-utility-7' . get_the_ID() . '"><p>' . sprintf( _x('Bookmark the %1$spermalink%2$s', '1s and 2s are the a href link wrappers, do not reverse them', 'cleanyetibasic'), sprintf('<a title="%s" href="%s">', sprintf( esc_attr__('Permalink to %s', 'cleanyetibasic'), the_title_attribute( 'echo=0' ) ), apply_filters('the_permalink', get_permalink())) , '</a>') . '</p></div>';

	    			if ( post_type_supports( $post_type, 'comments') ) {
	            		$postfootercontent .= cleanyetibasic_postfooter_postconnect();
	            	}
	        } elseif ( post_type_supports( $post_type, 'comments') ) {
	        	$postfootercontent .= cleanyetibasic_postfooter_posttax();
	            $postfootercontent .= cleanyetibasic_postfooter_postcomments();
	        }
            $postfootercontent .= "\n\n\t\t\t\t\t\t</div><!-- .tabs-content -->\n";
            $postfooter .= $postfootertabs;
            $postfooter .= "</dl><!-- .tabs -->\n";
            $postfooter .= $postfootercontent;
	    	$postfooter .= "\n\n\t\t\t\t\t</div><!-- .entry-utility -->\n";
	    }
	    // Put it on the screen
	    echo apply_filters( 'cleanyetibasic_postfooter', $postfooter ); // Filter to override default post footer
    }
} // end postfooter


if (function_exists('childtheme_override_postfooter_posteditlink'))  {
	/**
	 * @ignore
	 */
	function cleanyetibasic_postfooter_posteditlink() {
		return childtheme_override_postfooter_posteditlink();
	}
} else {
	/**
	 * Create the post edit link for the post footer
	 *
	 * Override: childtheme_override_postfooter_posteditlink <br>
	 * Filter: cleanyetibasic_postfooter_posteditlink
	 */
	function cleanyetibasic_postfooter_posteditlink() {

	    $posteditlink = sprintf( '<a href="%s" title="%s" class="edit">%s</a>' ,
			    			get_edit_post_link(),
			    			esc_attr__('Edit post', 'cleanyetibasic'),
							/* translators: post edit link */
			    			__('Edit', 'cleanyetibasic'));


	    return apply_filters('cleanyetibasic_postfooter_posteditlink',$posteditlink);

	}
} // end postfooter_posteditlink


if (function_exists('childtheme_override_postfooter_posttax'))  {
	/**
	 * @ignore
	 */
	function cleanyetibasic_postfooter_posttax() {
		return childtheme_override_postfooter_posttax();
	}
} else {
	/**
	 * Create the taxonomy list for the post footer
	 *
	 * Lists categories, tags, and custom taxonomies
	 *
	 * Override: childtheme_override_postfooter_posttax <br>
	 * Filter: cleanyetibasic_postfooter_posttax
	 */
	function cleanyetibasic_postfooter_posttax() {

		$post_type_tax = get_post_taxonomies();
		$post_tax_list = '';

		if ( isset($post_type_tax) && $post_type_tax ) {
	    	foreach ( $post_type_tax as $tax  )   {
	    		if ($tax  == 'category') {
	    			$post_tax_list .= cleanyetibasic_postfooter_postcategory();
	    		} elseif ($tax  == 'post_tag') {
	    			$post_tax_list .= cleanyetibasic_postfooter_posttags();
	    		} else {
	    			$post_tax_list .= cleanyetibasic_postfooter_postterms($tax);
	    		}
	    	}
	    }
		return apply_filters('cleanyetibasic_postfooter_posttax',$post_tax_list); // Filter for default post terms
	}
}


if (function_exists('childtheme_override_postfooter_postterms'))  {
	/**
	 * @ignore
	 */
	function cleanyetibasic_postfooter_postterms($tax) {
		return childtheme_override_postfooter_postterms($tax);
	}
} else {
	/**
	 * Create the list of custom taxonomy terms for post footer
	 *
	 * Override: childtheme_override_postfooter_postterms($tax) <br>
	 * Filter: cleanyetibasic_postfooter_postterms
	 *
	 * @param string $tax The taxonomy that the terms will be fetched from
	 */
	function cleanyetibasic_postfooter_postterms($tax) {
		global $post;

		if ($tax == 'post_format') return;
		$tax_terms = '';
		$tax_obj = get_taxonomy($tax);

		if ( wp_get_object_terms($post->ID, $tax) ) {
			$term_list = get_the_term_list( 0, $tax, '' , ' ', '' );
			$tax_terms = '<span class="' . $tax . '-links">';

			if ( strpos( $term_list, ',' ) ) {
				$tax_terms .= $tax_obj->labels->name . ': ';
			} else {
				$tax_terms .= $tax_obj->labels->singular_name . ': ';
			}

			$tax_terms .= $term_list;

			if ( is_single() ) {
		 		$tax_terms .= '. ';
		 		$tax_terms .= '</span>';
			} else {
				$tax_terms .= '</span>' . "\n\n\t\t\t\t\t\t" . '<span class="meta-sep meta-sep-tag-links"> </span> ';
			}

		}

		return apply_filters('cleanyetibasic_postfooter_postterms', $tax_terms ); // Filter for custom taxonomy terms
	}
}


if (function_exists('childtheme_override_postfooter_postcategory'))  {
	/**
	 * @ignore
	 */
	function cleanyetibasic_postfooter_postcategory() {
		return childtheme_override_postfooter_postcategory();
	}
} else {
	/**
	 * Create the category list for post footer
	 *
	 * Override: childtheme_override_postfooter_postcategory <br>
	 * Filter: cleanyetibasic_postfooter_postcategory
	 */
	function cleanyetibasic_postfooter_postcategory() {
        global $postfootertabs;
        $postfootertabs .= '<dd><a href="#panel-entry-utility-3' . get_the_ID() . '">' . __( 'Categories', 'cleanyetibasic' ) . '</a></dd>' . "\n";
		$postcategory = "\n" . '<div class="content" id="panel-entry-utility-3' . get_the_ID() . '">';
		if (is_single()) {
			/* translators: %s is postfooter categories */
			$postcategory .= '<p>' . get_the_category_list(' ');
			$postcategory .= '</p></div>';
			$posttags = get_the_tags();
			if ( !$posttags ) {
				$postcategory .= '  ';
			} else {
				//$postcategory .= ' ';
			}

		} elseif ( is_category() && $cats_meow = cleanyetibasic_cats_meow(' ') ) { /* Returns categories other than the one queried */
			/* translators: %s is postfooter categories */
			$postcategory .= '<p>' . $cats_meow;
			$postcategory .= '</p></div>' . "\n\n\t\t\t\t\t\t";
		} else {
			/* translators: %s is postfooter categories */
			$postcategory .= '<p>' . get_the_category_list(' ');
			$postcategory .= '</p></div>' . "\n\n\t\t\t\t\t\t"; //. '<br class="meta-sep meta-sep-tag-links">';
		}
	    return apply_filters('cleanyetibasic_postfooter_postcategory',$postcategory);

	}
}  // end postfooter_postcategory


if (function_exists('childtheme_override_postfooter_posttags'))  {
	/**
	 * @ignore
	 */
	function cleanyetibasic_postfooter_posttags() {
		return childtheme_override_postfooter_posttags();
	}
} else {
	/**
	 * Create the tags list for post footer
	 *
	 * Override: childtheme_override_postfooter_posttags <br>
	 * Filter: cleanyetibasic_postfooter_posttags
	 */
	function cleanyetibasic_postfooter_posttags() {
        global $postfootertabs;
	    if ( is_single() && !is_object_in_taxonomy( get_post_type(), 'category' ) ) {
            $postfootertabs .= '<dd><a href="#panel-entry-utility-4' . get_the_ID() . '">' . __( 'Tags', 'cleanyetibasic' ) . '</a></dd>' . "\n";
	        $posttags = get_the_tag_list("<div class=\"content\" id=\"panel-entry-utility-4" . get_the_ID() . "\"><p>",' ','</p></div>');
	    } elseif ( is_single() ) {
            $postfootertabs .= '<dd><a href="#panel-entry-utility-4' . get_the_ID() . '">' . __( 'Tags', 'cleanyetibasic' ) . '</a></dd>' . "\n";
	        $posttags = get_the_tag_list("<div class=\"content\" id=\"panel-entry-utility-4" . get_the_ID() . "\"><p>",' ','</p></div>');
	    } elseif ( is_tag() && $tag_ur_it = cleanyetibasic_tag_ur_it(' ') ) { /* Returns tags other than the one queried */
            $postfootertabs .= '<dd><a href="#panel-entry-utility-4' . get_the_ID() . '">' . __( 'Tags', 'cleanyetibasic' ) . '</a></dd>' . "\n";
	        $posttags = '<div class="content" id="panel-entry-utility-4' . get_the_ID() . '"><p>' . __('Also tagged', 'cleanyetibasic') . ' ' . $tag_ur_it . '</p></div>' . "\n\n\t\t\t\t\t\t";
	    } else {
            $postfootertabs .= '<dd><a href="#panel-entry-utility-4' . get_the_ID() . '">' . __( 'Tags', 'cleanyetibasic' ) . '</a></dd>' . "\n";
	        $posttags = get_the_tag_list("<div class=\"content\" id=\"panel-entry-utility-4" . get_the_ID() . "\"><p>",' ','</p></div>' . "\n\n\t\t\t\t\t\t");
	    }
	    return apply_filters('cleanyetibasic_postfooter_posttags',$posttags);

	}
} // end postfooter_posttags


if (function_exists('childtheme_override_postfooter_postcomments'))  {
	/**
	 * @ignore
	 */
	function cleanyetibasic_postfooter_postcomments() {
		return childtheme_override_postfooter_postcomments();
	}
} else {
	/**
	 * Create the comments link for the post footer on archive pages
	 *
	 * Override: childtheme_override_postfooter_postcomments <br>
	 * Filter: cleanyetibasic_postfooter_postcomments
	 */
	function cleanyetibasic_postfooter_postcomments() {
        global $postfootertabs;
        $postfootertabs .= '<dd><a href="#panel-entry-utility-6' . get_the_ID() . '">' . __( 'Comments', 'cleanyetibasic' ) . '</a></dd>' . "\n";
        $postcomments = '<div class="content" id="panel-entry-utility-6' . get_the_ID() . '">';
	    if (comments_open()) {
	        $postcommentnumber = get_comments_number();

	        if ($postcommentnumber > '0') {
	        	$postcomments .= sprintf('<span class="comments-link"><a href="%s" title="%s" rel="bookmark">%s</a></span>',
	        						apply_filters('the_permalink', get_permalink()) . '#respond',
	        						sprintf( esc_attr__('Comment on %s', 'cleanyetibasic'), the_title_attribute( 'echo=0' ) ),
									/* translators: number of comments and trackbacks */
	        						sprintf( _n('%s Response', '%s Responses', $postcommentnumber, 'cleanyetibasic'), number_format_i18n( $postcommentnumber ) ) );
				} else {
	            $postcomments .= sprintf('<span class="comments-link"><a href="%s" title="%s" rel="bookmark">%s</a></span>',
	        						apply_filters('the_permalink', get_permalink()) . '#respond',
	        						sprintf( esc_attr__('Comment on %s', 'cleanyetibasic'), the_title_attribute( 'echo=0' ) ),
	        						__('Leave a comment', 'cleanyetibasic'));
	        }
	    } else {
	        $postcomments .= '<span class="comments-link comments-closed-link">' . __('Comments closed', 'cleanyetibasic') .'</span>';
	    }
        $postcomments .= '</div>';
	    return apply_filters('cleanyetibasic_postfooter_postcomments',$postcomments);
	}
} // end postfooter_postcomments


if (function_exists('childtheme_override_postfooter_postconnect'))  {
	/**
	 * @ignore
	 */
	function cleanyetibasic_postfooter_postconnect() {
		return childtheme_override_postfooter_postconnect();
	}
} else {
	/**
	 * Create the comments link for the post footer on single posts
	 *
	 * Override: childtheme_override_postfooter_postconnect <br>
	 * Filter: cleanyetibasic_postfooter_postconnect
	 */
		function cleanyetibasic_postfooter_postconnect() {
        global $postfootertabs;
        $postfootertabs .= '<dd><a href="#panel-entry-utility-5' . get_the_ID() . '">' . __( 'Status', 'cleanyetibasic' ) . '</a></dd>' . "\n";
        $postconnect = '<div class="content" id="panel-entry-utility-5' . get_the_ID() . '"><p>' . "\n";
	    if ((comments_open()) && (pings_open())) { /* Comments are open */
	        $postconnect .= sprintf( _x('%1$sPost a comment%2$s or leave a trackback: %3$s', '1s and 2s are the a href link wrappers, do not reverse them. 3s is trackback url.', 'cleanyetibasic'),
								sprintf('<a class="comment-link" title="%s" href="#respond">', esc_attr__('Post a comment', 'cleanyetibasic')),
								'</a>' ,
								sprintf('<a class="trackback-link" href="%s" title ="%s" rel="trackback">%s</a>',
									get_trackback_url(),
									esc_attr__('Trackback URL for your post', 'cleanyetibasic'),
						 			__('Trackback URL', 'cleanyetibasic'))
							);
	    } elseif (!(comments_open()) && (pings_open())) { /* Only trackbacks are open */
	        $postconnect .= sprintf( _x('Comments are closed, but you can leave a trackback: %s', '%s is trackback url, wrapped in link tags', 'cleanyetibasic'),
							sprintf('<a class="trackback-link" href="%s" title="%s" rel="trackback">%s</a>',
								get_trackback_url(),
								esc_attr__('Trackback URL for your post', 'cleanyetibasic'),
								__('Trackback URL', 'cleanyetibasic'))
							);
	    } elseif ((comments_open()) && !(pings_open())) { /* Only comments open */
	        $postconnect .= sprintf( _x('Trackbacks are closed, but you can %1$spost a comment%2$s', '1s and 2s are the a href link wrappers, do not reverse them', 'cleanyetibasic'), sprintf('<a class="comment-link" title="%s" href="#respond">', esc_attr__('Post a comment', 'cleanyetibasic')), '</a>');
	    } elseif (!(comments_open()) && !(pings_open())) { /* Comments and trackbacks closed */
	        $postconnect .= __('Both comments and trackbacks are currently closed.', 'cleanyetibasic');
	    }
        $postconnect .= "\n" . '</p></div>';
	    return apply_filters('cleanyetibasic_postfooter_postconnect',$postconnect);
	}
} // end postfooter_postconnect

function cleanyetibasic_postfooter_postdate() {
    $postdate = '<div class="content" id="panel-entry-utility-1' . get_the_ID() . '"><p>' . "\n";
    $postdate .= cleanyetibasic_postmeta_entrydate();
    if ( !is_single() )
    $postdate .= "\n" . '<a href="' . get_permalink() . '" class="button tiny radius" >' . __( 'View Post', 'cleanyetibasic' ) . '</a>';
    $postdate .= "\n" . '</p></div>';
	    return apply_filters('cleanyetibasic_postfooter_postdate',$postdate);
}


// Action to create the below navigation
if (function_exists('childtheme_override_nav_below'))  {
	/**
	 * @ignore
	 */
	function cleanyetibasic_nav_below() {
		childtheme_override_nav_below();
	}
} else {
	/**
	 * Create the below navigation
	 *
	 * Provides compatibility with WP-PageNavi plugin
	 *
	 * Override: childtheme_override_nav_below
	 *
	 * @link http://wordpress.org/extend/plugins/wp-pagenavi/ WP-PageNavi Plugin Page
	 */
	function cleanyetibasic_nav_below() {
		if (is_single()) { ?>
        <div class="row">
			<div id="nav-below" class="navigation large-12 columns">
				<div class="nav-previous"><?php cleanyetibasic_previous_post_link() ?></div>
				<div class="nav-next"><?php cleanyetibasic_next_post_link() ?></div>
			</div>
        </div>

<?php
		} else { ?>
        <div class="row">
			<div id="nav-below" class="navigation large-12 columns">
                <?php if(function_exists('wp_pagenavi')) { ?>
                <?php wp_pagenavi(); ?>
                <?php } else { ?>

				<div class="nav-previous"><?php next_posts_link(sprintf('<span class="meta-nav">&laquo;</span> %s', __('Older posts', 'cleanyetibasic') ) ) ?></div>

				<div class="nav-next"><?php previous_posts_link(sprintf('%s <span class="meta-nav">&raquo;</span>',__( 'Newer posts', 'cleanyetibasic') ) ) ?></div>

				<?php } ?>
			</div>
        </div>

<?php
		}
	}
} // end nav_below

add_action('cleanyetibasic_navigation_below', 'cleanyetibasic_nav_below', 2);


if (function_exists('childtheme_override_previous_post_link'))  {
	/**
	 * @ignore
	 */
	function cleanyetibasic_previous_post_link() {
		childtheme_override_previous_post_link();
	}
} else {
	/**
	 * Create the previous post link on single pages
	 *
	 * Override: childtheme_override_previous_post_link
	 * Filter: cleanyetibasic_previous_post_link_args
	 */
	function cleanyetibasic_previous_post_link() {

		$args = array (
			'format'              => '%link',
			'link'                => '<span class="meta-nav">&laquo;</span>' . __(' Previous Post','cleanyetibasic'),
			'in_same_cat'         => FALSE,
			'excluded_categories' => ''
		);

		$args = apply_filters('cleanyetibasic_previous_post_link_args', $args );

		previous_post_link($args['format'], $args['link'], $args['in_same_cat'], $args['excluded_categories']);
	}
} // end previous_post_link


if (function_exists('childtheme_override_next_post_link'))  {
	/**
	 * @ignore
	 */
	function cleanyetibasic_next_post_link() {
		childtheme_override_next_post_link();
	}
} else {
	/**
	 * Create the next post link on single pages
	 *
	 * Override: childtheme_override_next_post_link
	 * Filter: cleanyetibasic_next_post_link_args
	 */
	function cleanyetibasic_next_post_link() {
		$args = array (
			'format' => '%link',
			'link' => __( 'Next Post ', 'cleanyetibasic' ) . '<span class="meta-nav">&raquo;</span>',
			'in_same_cat' => FALSE,
			'excluded_categories' => ''
		);

		$args = apply_filters('cleanyetibasic_next_post_link_args', $args );
		next_post_link($args['format'], $args['link'], $args['in_same_cat'], $args['excluded_categories']);
	}
} // end next_post_link


if (function_exists('childtheme_override_author_info_avatar'))  {
	/**
	 * @ignore
	 */
	function cleanyetibasic_author_info_avatar() {
		childtheme_override_author_info_avatar();
	}
} else {
	/**
	 * Create an avatar image for the author info
	 *
	 * Includes the hCard-compliant photo class on the image. Located in author.php
	 *
	 * Override: childtheme_override_author_info_avatar
	 */
	function cleanyetibasic_author_info_avatar() {

	    global $wp_query; $curauth = $wp_query->get_queried_object();

		$email = $curauth->user_email;
		$avatar = str_replace( "class='avatar", "class='photo avatar", get_avatar("$email") );
		echo $avatar;
	}
} // end author_info_avatar


if (function_exists('childtheme_override_cats_meow'))  {
	/**
	 * @ignore
	 */
	function cleanyetibasic_cats_meow() {
		return childtheme_override_cats_meow();
	}
} else {
	/**
	 * Create a category list with all categories except the current one
	 *
	 * Used in post footer on category archives (redundant)
	 *
	 * Override: childtheme_override_cats_meow
	 */
	function cleanyetibasic_cats_meow($glue) {
		$current_cat = single_cat_title( '', false );
		$separator = "\n";
		$cats = explode( $separator, get_the_category_list($separator) );
		foreach ( $cats as $i => $str ) {
			if ( strpos( $str, ">$current_cat<" ) > 0) {
				unset($cats[$i]);
				break;
			}
		}
		if ( empty($cats) )
			return false;

		return trim(join( $glue, $cats ));
	}
} // end cats_meow


if (function_exists('childtheme_override_tag_ur_it'))  {
	/**
	 * @ignore
	 */
	function cleanyetibasic_tag_ur_it() {
		return childtheme_override_tag_ur_it();
	}
} else {
	/**
	 * Create a tag list with all tags except the current one
	 *
	 * Used in post footer on tag archives (redundant)
	 *
	 * Override: childtheme_override_tag_ur_it
	 */
	function cleanyetibasic_tag_ur_it($glue) {
		$current_tag = single_tag_title( '', '',  false );
		$separator = "\n";
		$tags = explode( $separator, get_the_tag_list( "", "$separator", "" ) );
		foreach ( $tags as $i => $str ) {
			if ( strpos( $str, ">$current_tag<" ) > 0 ) {
				unset($tags[$i]);
				break;
			}
		}
		if ( empty($tags) )
			return false;

		return trim( join( $glue, $tags ) );
	}
} // end cleanyetibasic_tag_ur_it

function cleanyetibasic_addborder() {
	echo "<hr>";
}

function cleanyetibasic_addborder_belowpost() {
	global $post;
	$posttype = get_post_type( $post );
	if ($posttype != 'page' )
    echo "<hr>";
	elseif (is_search() && $posttype == 'page' )
    echo "<hr>";
}
add_action( 'cleanyetibasic_header', 'cleanyetibasic_addborder', 99 );
add_action( 'cleanyetibasic_belowpost', 'cleanyetibasic_addborder_belowpost', 1 );
if ( is_active_sidebar( '1st-subsidiary-aside' ) || is_active_sidebar( '2nd-subsidiary-aside' ) || is_active_sidebar( '3rd-subsidiary-aside' ) ) {
	add_action( 'cleanyetibasic_abovesubasides', 'cleanyetibasic_addborder', 1 );
}
add_action( 'cleanyetibasic_belowsubasides', 'cleanyetibasic_addborder', 1 );

function cleanyetibasic_prefix_setup() {
    add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
}
add_action( 'after_setup_theme', 'cleanyetibasic_prefix_setup' );

function cleanyetibasic_posts_link_class($format){
     $format = str_replace('href=', 'class="small button radius" href=', $format);
     return $format;
}
add_filter('next_post_link', 'cleanyetibasic_posts_link_class');
add_filter('previous_post_link', 'cleanyetibasic_posts_link_class');

function cleanyetibasic_posts_link_attributes() {
    return 'class="small button radius"';
}
add_filter('next_posts_link_attributes', 'cleanyetibasic_posts_link_attributes');
add_filter('previous_posts_link_attributes', 'cleanyetibasic_posts_link_attributes');

function cleanyetibasic_clearfix_filter($content) {
	$new_content = '<div class="clearfix"></div>';
	$content = $content . $new_content;
	return $content;
}
add_filter('the_content', 'cleanyetibasic_clearfix_filter');
?>