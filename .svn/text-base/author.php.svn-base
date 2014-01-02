<?php
/**
 * Author Template
 *
 * Displays an archive index of posts by a singular Author.
 * It displays a micrformatted vCard for Author.
 *
 * @package cleanyetibasic
 * @subpackage Templates
 *
 * @link http://codex.wordpress.org/Author_Templates Codex:Author Templates
 */

	// calling the header.php
	get_header();

	// action hook for placing content above #container
	cleanyetibasic_abovecontainer();

				// action hook for placing content above #content
				cleanyetibasic_abovecontent();

				echo apply_filters( 'cleanyetibasic_open_id_content', '<div id="content">' . "\n\n" );

				// create the navigation above the content
				cleanyetibasic_navigation_above();

				// setup the first post to acess the Author's metadata
				the_post();
				?>

    	            <div id="author-info" class="vcard">

    	                <h2 class="entry-title"><?php the_author_meta( 'first_name' ); ?> <?php the_author_meta( 'last_name' ); ?></h2>

    	                <?php
    	               		// display the author's avatar
    	               		cleanyetibasic_author_info_avatar();
    	                ?>

    	                <div class="author-bio note">

    	                    <?php
    	                    	// Display Author's discription if it exists
    	                    	if ( get_the_author_meta( 'user_description' ) )
    	                    		// Filterable use the_author_user_description *or* get_the_author_user_description
    	                    		the_author_meta( 'user_description' );
    	                    ?>

    	                </div>

    				<div id="author-email">

    	                <a class="email" title="<?php echo antispambot( get_the_author_meta( 'user_email' ) ); ?>" href="mailto:<?php echo antispambot( get_the_author_meta( 'user_email' ) ); ?>">
    	                	<?php _e( 'Email ', 'cleanyetibasic' ) ?>
    	                	<span class="fn n">
    	                		<span class="given-name"><?php the_author_meta( 'first_name' ); ?></span>
    	                		<span class="family-name"><?php the_author_meta( 'last_name' ); ?></span>
    	                	</span>
    	                </a>

    	                <a class="url"  style="display:none;" href="<?php echo home_url() ?>/"><?php bloginfo('name') ?></a>

    	            </div>

				</div><!-- #author-info -->

				<?php
					//end microformmatted vCard
					//endif;
					// Return to the beginning of the loop
					rewind_posts();
				?>

				<?php
    	        	// action hook creating the author loop
    	        	cleanyetibasic_authorloop();

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
