<?php
/**
 * Tag Archive Template
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

		// create the navigation above the content
		cleanyetibasic_navigation_above();

		// action hook for placing content above the tag loop
		cleanyetibasic_above_tagloop();

		// action hook creating the tag loop
		cleanyetibasic_tagloop();

		// action hook for placing content below the tag loop
		cleanyetibasic_below_tagloop();

		// create the navigation below the content
		cleanyetibasic_navigation_below();
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