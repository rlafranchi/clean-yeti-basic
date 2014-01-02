<?php
/**
 * Header Template
 *
 * This template calls a series of functions that output the head tag of the document.
 * The body and div #main elements are opened at the end of this file.
 *
 * @package cleanyetibasic
 * @subpackage Templates
 */

	// Create doctype
	cleanyetibasic_create_doctype();

	// Opens the head tag
	cleanyetibasic_head_profile();

	// Create the meta content type
	cleanyetibasic_create_contenttype();

	// Create the title tag
	cleanyetibasic_doctitle();

	// Legacy feedlink handling
	if ( current_theme_supports( 'cleanyetibasic_legacy_feedlinks' ) ) {
		// Creating the internal RSS links
		cleanyetibasic_show_rss();
	}

	// Create pingback adress
	cleanyetibasic_show_pingback();

	/* The function wp_head() loads cleanyetibasic's stylesheet and scripts.
	 * Calling wp_head() is required to provide plugins and child themes
	 * the ability to insert markup within the <head> tag.
	 */
	wp_head();
?>
</head>

<?php
	// Create the body element and dynamic body classes
	cleanyetibasic_body();

	// Action hook to place content before opening #wrapper
	cleanyetibasic_before();
?>
	<?php
		// Filter provided for removing output of wrapping element follows the body tag
		if ( apply_filters( 'cleanyetibasic_open_wrapper', true ) )
  		  echo ( '<div id="wrapper" class="hfeed">' );

		// Action hook for placing content above the theme header
		cleanyetibasic_aboveheader();
	?>


		<?php
			// Filter provided for altering output of the header opening element
			echo ( apply_filters( 'cleanyetibasic_open_header',  '<div id="header">' ) );
    	?>


        	<?php
				// Action hook creating the theme header
				cleanyetibasic_header();
       		?>

    	<?php
    		// Filter provided for altering output of the header closing element
			echo ( apply_filters( 'cleanyetibasic_close_header', '</div><!-- #header-->' ) );
		?>

    	<?php
			// Action hook for placing content below the theme header
			cleanyetibasic_belowheader();
    	?>

	<div id="main" class="row">
