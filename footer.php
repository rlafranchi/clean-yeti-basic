<?php
/**
 * Footer Template
 *
 * This template closes #main div and displays the #footer div.
 *
 * cleanyetibasic Action Hooks: cleanyetibasic_abovefooter cleanyetibasic_belowfooter cleanyetibasic_after
 * cleanyetibasic Filters: cleanyetibasic_close_wrapper can be used to remove the closing of the #wrapper div
 *
 * @package cleanyetibasic
 * @subpackage Templates
 */
			// action hook for placing content above the closing of the #main div
			cleanyetibasic_abovemainclose();
		?>

		</div><!-- #main -->

    	<?php
			// action hook for placing content above the footer
			cleanyetibasic_abovefooter();

			// Filter provided for altering output of the footer opening element
    		echo ( apply_filters( 'cleanyetibasic_open_footer', '<div id="footer">' ) );
    	?>

        	<?php
        		// action hook creating the footer
        		cleanyetibasic_footer();
        	?>

		<?php
			// Filter provided for altering output of the footer closing element
    		echo ( apply_filters( 'cleanyetibasic_close_footer', '</div><!-- #footer -->' . "\n" ) );

   			// action hook for placing content below the footer
			cleanyetibasic_belowfooter();

			// Filter provided for altering output of wrapping element follows the body tag
			if ( apply_filters( 'cleanyetibasic_close_wrapper', true ) )
				echo ( '</div><!-- #wrapper .hfeed -->' . "\n" );


			// action hook for placing content before closing the BODY tag
			cleanyetibasic_after();

		// calling WordPress' footer action hook
		wp_footer();
?>
	</body>
</html>