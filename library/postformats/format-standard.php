<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * For displaying content in the standard post format
 *
 */
 ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >                                   

	                        <?php cleanyetibasic_postheader();?>

					<div class="row">

						<div class="entry-content large-12 columns">
					
						<?php
                            // insert featured image
		                    if (is_single()) {
                                cleanyetibasic_insert_featured_image();
                            }         

                            cleanyetibasic_content();
                        ?>

						</div><!-- .entry-content -->
    					
					</div>

					<?php  cleanyetibasic_postfooter(); ?>

				</div><!-- #post -->