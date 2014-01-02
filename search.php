<?php
/**
 * Search Template
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


		// action hook for inserting contentabove #content
		cleanyetibasic_abovecontent();

		// filter for manipulating the element that wraps the content
		echo apply_filters( 'cleanyetibasic_open_id_content', '<div id="content">' . "\n\n" );

		if (have_posts()) {

	                // create the navigation above the content
	                cleanyetibasic_navigation_above();

	                // action hook for placing content above the search loop
	                cleanyetibasic_above_searchloop();

	                // action hook creating the search loop
	                cleanyetibasic_searchloop();

	                // action hook for placing content below the search loop
	                cleanyetibasic_below_searchloop();

	                // create the navigation below the content
	                cleanyetibasic_navigation_below();

		} else {

			// action hook for inserting content above #post
			cleanyetibasic_abovepost();
			?>

				<div id="post-0" class="post noresults">

					<h1 class="entry-title"><?php _e( 'Nothing Found', 'cleanyetibasic' ) ?></h1>

					<div class="entry-content">

						<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'cleanyetibasic' ) ?></p>

					</div><!-- .entry-content -->
					<?php get_search_form(); ?>

				</div><!-- #post -->

		<?php
		// action hook for inserting content below #post
		cleanyetibasic_belowpost();
		}
		?>

			</div><!-- #content -->

		<?php
		// action hook for inserting content below #content
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