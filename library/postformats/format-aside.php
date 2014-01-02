<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * For displaying content in the aside post format
 *
 */
 ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> > 
                    <div class="row">
                        <div class="large-12 columns">

	                        <h2 class="subheader"><?php if ( is_single() ){echo "Aside";} else {echo '<a href=' . get_permalink() . '>Aside</a>';} ?></h2>
                            <p><?php echo cleanyetibasic_postheader_postmeta(); ?></p>
	                    </div>
                        
                    </div>

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
					
					<?php cleanyetibasic_postfooter(); ?>				

				</div><!-- #post -->