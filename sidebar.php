<?php 
/**
 * Main Sidebar Template
 *
 * …
 * 
 * @package cleanyetibasic
 * @subpackage Templates
 */

    // action hook for placing content above the main asides
    cleanyetibasic_abovemainasides();

    // action hook creating the primary aside
    cleanyetibasic_widget_area_primary_aside();	
	
    // action hook for placing content between primary and secondary aside
    cleanyetibasic_betweenmainasides();

    // action hook creating the secondary aside
    cleanyetibasic_widget_area_secondary_aside();	
	
    // action hook for placing content below the main asides
    cleanyetibasic_belowmainasides(); 
?>