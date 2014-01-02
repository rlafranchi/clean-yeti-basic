<?php
/**
 * Error 404 Page Template
 *
 * Displays a "Not Found" message and a search form when a 404 Error is encountered.
 *
 * @package cleanyetibasic
 * @subpackage Templates
 *
 * @link http://codex.wordpress.org/Creating_an_Error_404_Page Codex: Create a 404 Page
 */

	// calling the header.php
	get_header();

	// action hook for placing content above #container
	cleanyetibasic_abovecontainer();

				// action hook for placing content above #content includes #container
				cleanyetibasic_abovecontent();

				// filter for manipulating the element that wraps the content
				echo apply_filters( 'cleanyetibasic_open_id_content', '<div id="content">' . "\n\n" );

				// action hook for placing content above #post
				cleanyetibasic_abovepost();
				?>

				<div id="post-0" class="post error404">

				<?php
				// action hook for placing the 404 content
				cleanyetibasic_404()
				?>

				</div><!-- .post -->

				<?php
					// action hook for placing content below #post
					cleanyetibasic_belowpost();
				?>

			</div><!-- #content -->

			<?php
				// action hook for placing content below #content
				cleanyetibasic_belowcontent();
			?>

		</div><!-- #container -->

			<?php
			//calling the standard sidebar
			cleanyetibasic_sidebar();
			?>
    </div>

<?php
	// action hook for placing content below #container
	cleanyetibasic_belowcontainer();
	// calling footer.php
	get_footer();
?>