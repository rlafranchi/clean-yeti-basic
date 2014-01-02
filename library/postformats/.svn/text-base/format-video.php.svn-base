<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * For displaying content in the video post format
 *
 */
 $videodomain = cleanyetibasic_return_domain();
 ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> > 
                    <div class="row">                                                
                                          
                        <div class="columns large-10">

	                        <?php cleanyetibasic_postheader();?>
                            
          					    
	                    </div>

                        <div class="columns large-2">
                            <?php if ( $videodomain == 'youtube.com' ) : ?>
                                <i class="small social-foundicon-youtube"></i>
                            <?php elseif ( $videodomain == 'vimeo.com' ) : ?>
                                <i class="small social-foundicon-vimeo"></i>
                            <?php elseif ( $videodomain == 'wordpress.com' ) : ?>
                                <i class="small social-foundicon-wordpress"></i>
                            <?php else : ?>
                                <i class="small general-foundicon-video"></i>
                            <?php endif; ?>
                            
                        </div>
                    </div>
                    
                    <div class="row">
                    
						<div class="entry-content large-12 columns">
					
						<?php        

                            cleanyetibasic_content();
                        ?>
                        
						</div><!-- .entry-content -->
                    
                    </div>
    					
					<?php  cleanyetibasic_postfooter(); ?>

				</div><!-- #post -->