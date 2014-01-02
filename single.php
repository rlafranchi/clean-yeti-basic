<?php
/**
 * Single Post Template
 *
 * …
 *
 * @package cleanyetibasic
 * @subpackage Templates
 */

	// calling the header.php
	get_header();

	// action hook for placing content above #container
	cleanyetibasic_abovecontainer();

	// action hook for placing content above #content
	cleanyetibasic_abovecontent();

	// filter for manipulating the element that wraps the content
	echo apply_filters( 'cleanyetibasic_open_id_content', '<div id="content">' . "\n\n" );

	// start the loop
	while ( have_posts() ) : the_post();

		// create the navigation above the content
		cleanyetibasic_navigation_above();

		// action hook creating the single post
		cleanyetibasic_singlepost();

		// create the navigation below the content
		cleanyetibasic_navigation_below();

		// action hook for calling the comments_template
		cleanyetibasic_comments_template();

	// end the loop
	endwhile;

			?>

			</div><!-- #content -->

			<?php
			// action hook for placing content below #content
			cleanyetibasic_belowcontent();
			?>
		</div><!-- #container -->

<?php
	// action hook for placing content below #container
	cleanyetibasic_belowcontainer();

	// calling the standard sidebar
	cleanyetibasic_sidebar();

	// calling footer.php
	get_footer();
?>