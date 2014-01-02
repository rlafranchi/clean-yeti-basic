<?php
/**
 * Footer Extensions
 *
 * @package cleanyetibasicCoreLibrary
 * @subpackage FooterExtensions
 */
 
/**
 * Register action hook: cleanyetibasic_abovemainclose
 * 
 * Located in footer.php, just before the closing of the main div
 */
function cleanyetibasic_abovemainclose() {
    do_action('cleanyetibasic_abovemainclose');
} // end cleanyetibasic_belowmainsidebar


/**
 * Register action hook: cleanyetibasic_abovefooter
 * 
 * Located in footer.php, just before the footer div
 */
function cleanyetibasic_abovefooter() {
    do_action('cleanyetibasic_abovefooter');
} // end cleanyetibasic_abovefooter


/**
 * Register action hook: cleanyetibasic_footer
 * 
 * Located in footer.php, inside the footer div
 */
function cleanyetibasic_footer() {
    do_action('cleanyetibasic_footer');
} // end cleanyetibasic_footer


/**
 * Register action hook: cleanyetibasic_belowfooter
 * 
 * Located in footer.php, just after the footer div
 */
function cleanyetibasic_belowfooter() {
    do_action('cleanyetibasic_belowfooter');
} // end cleanyetibasic_belowfooter


/**
 * Register action hook: cleanyetibasic_after
 * 
 * Located in footer.php, just before the closing body tag, after everything else.
 */
function cleanyetibasic_after() {
    do_action('cleanyetibasic_after');
} // end cleanyetibasic_after


if (function_exists('childtheme_override_subsidiaries'))  {
	/**
	 * @ignore
	 */
	function cleanyetibasic_subsidiaries() {
		childtheme_override_subsidiaries();
	}
} else {
	/**
	 * Create the subsidiary widgets areas in footer
	 * 
	 * Override: childtheme_override_subsidiaries
	 */
	function cleanyetibasic_subsidiaries() {
	      	
		// action hook for placing content above the subsidiary widget areas
		cleanyetibasic_abovesubasides();
		
		// action hook for creating the subsidiary widget areas
		cleanyetibasic_widget_area_subsidiaries();
		
		// action hook for placing content below subsidiary widget areas
		cleanyetibasic_belowsubasides();
   	}
}

add_action('cleanyetibasic_footer', 'cleanyetibasic_subsidiaries', 10);


function cleanyetibasic_footer_menu_display() {
   ?>
<div class="row">
	<div class="large-4 columns">
    	<p class="copyright">&copy; <?php echo bloginfo( 'name' ); ?> <?php echo date('Y'); ?></p>
   </div>
	<div class="large-8 columns">
	<?php 
	wp_nav_menu( array(
	'theme_location'        => 'cleanyetibasic_footer_menu',
	'container'             => false,
	'menu_class'            => 'right inline-list footerlink',
	'fallback_cb'           => false,
	'depth'                 => 1
	 ) );
	 ?>
	 </div>
</div>
<?php
}
add_action( 'cleanyetibasic_footer', 'cleanyetibasic_footer_menu_display', 25);
?>