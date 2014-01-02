<?php
/**
 * Archive Template
 *
 * Displays an Archive index of post-type items. Other more specific archive templates
 * may override the display of this template for example the category.php.
 *
 * @package cleanyetibasic
 * @subpackage Templates
 *
 * @link http://codex.wordpress.org/Template_Hierarchy Codex: Template Hierarchy
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

			// action hook for placing content above the archive loop
			cleanyetibasic_above_archiveloop();

			// action hook creating the archive loop
			cleanyetibasic_archiveloop();

			// action hook for placing content below the archive loop
			cleanyetibasic_below_archiveloop();

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