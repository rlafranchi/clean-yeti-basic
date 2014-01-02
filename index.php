<?php
/**
 * Index Template
 *
 * This file is required by WordPress to recoginze cleanyetibasic as a valid theme.
 * It is also the default template WordPress will use to display your web site,
 * when no other applicable templates are present in this theme's root directory
 * that apply to the query made to the site.
 *
 * WP Codex Reference: http://codex.wordpress.org/Template_Hierarchy
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

            	// action hook for placing content above the index loop
            	cleanyetibasic_above_indexloop();

            	// action hook creating the index loop
            	cleanyetibasic_indexloop();

            	// action hook for placing content below the index loop
            	cleanyetibasic_below_indexloop();

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