<?php

/**
 * Sidebars Extensions
 *
 * @package cleanyetibasicCoreLibrary
 * @subpackage SidebarExtensions
 */


/**
 * Get the standard sidebar
 *
 * This includes the primary and secondary widget areas. 
 * The sidebar can be switched on or off using cleanyetibasic_sidebar. <br>
 * Default: ON <br>
 * 
 * Filter: cleanyetibasic_sidebar
 */
function cleanyetibasic_sidebar() {
	$show = TRUE;
	$show = apply_filters('cleanyetibasic_sidebar', $show);
	
	if ($show)
        get_sidebar() . "\n\n";
	
	return;
} // end cleanyetibasic_sidebar

/**
 * Opening & closing element for sidebar
 *
 * Width may be changed by editing large-4 to large-*
 * If changed, filter for cleanyetibasic_container must be applied
 * Filters: cleanyetibasic_sidebar_open, cleanyetibasic_sidebar_close
 */
 
function cleanyetibasic_sidebar_open() {
    global $cleanyetibasic_options;
    $cleanyetibasic_options = cleanyetibasic_get_options();
    $sbpos = $cleanyetibasic_options['sidebar_position'];
    $sbwidth = $cleanyetibasic_options['sidebar_width'];
    $pullwidth = 12 - $sbwidth;
    if ( 'left' == $sbpos ) {
        $open = '<div class="medium-' . $sbwidth . ' medium-pull-' . $pullwidth . ' columns">';
    } else {
        $open = '<div class="medium-' . $sbwidth . ' columns">';
    }
    echo apply_filters('cleanyetibasic_sidebar_open', $open);
}
add_action( 'cleanyetibasic_abovemainasides', 'cleanyetibasic_sidebar_open', 1);

function cleanyetibasic_sidebar_close() {
    $close = '</div>';
    echo apply_filters('cleanyetibasic_sidebar_close', $close);
}
add_action( 'cleanyetibasic_belowmainasides', 'cleanyetibasic_sidebar_close', 99);

/* 
 * Main Aside Hooks
 */


/**
 * Register action hook: cleanyetibasic_abovemainasides 
 *
 * Located in sidebar.php
 * Just before the main asides (commonly used as sidebars)
 */
function cleanyetibasic_abovemainasides() {
    do_action('cleanyetibasic_abovemainasides');
}


/**
 * Register action hook: widget_area_primary_aside 
 *
 * Located in sidebar.php
 * Regular hook for primary widget area
 */
function cleanyetibasic_widget_area_primary_aside() {
    do_action('widget_area_primary_aside');
}


/**
 * Register action hook: cleanyetibasic_betweenmainasides 
 *
 * Located in sidebar.php
 * Between the main asides (commonly used as sidebars)
 */
function cleanyetibasic_betweenmainasides() {
    do_action('cleanyetibasic_betweenmainasides');
}


/**
 * Register action hook: widget_area_secondary_aside 
 *
 * Located in sidebar.php
 * Regular hook for secondary widget area
 */
function cleanyetibasic_widget_area_secondary_aside() {
    do_action('widget_area_secondary_aside');
}


/**
 * Register action hook: cleanyetibasic_belowmainasides 
 *
 * Located in sidebar.php
 * Just after the main asides (commonly used as sidebars)
 */
function cleanyetibasic_belowmainasides() {
    do_action('cleanyetibasic_belowmainasides');
}


/*
 * Index Aside Hooks
 */


/*	
 * Register action hook: cleanyetibasic_aboveindextop 
 *
 * Located in sidebar-index-top.php
 * Just above the 'index.top' widget area
 */
function cleanyetibasic_aboveindextop() {
	do_action('cleanyetibasic_aboveindextop');
}


/**
 * Register action hook: widget_area_index_top
 *
 * Located in sidebar.php
 * Regular hook for the 'index.top' widget area
 */
function cleanyetibasic_widget_area_index_top() {
    do_action('widget_area_index_top');
}

	
/**
 * Register action hook: cleanyetibasic_belowindextop 
 *
 * Located in sidebar-index-top.php
 * Just below the 'index.top' widget area
 */
function cleanyetibasic_belowindextop() {
    do_action('cleanyetibasic_belowindextop');
}


/**
 * Register action hook: cleanyetibasic_aboveindexinsert 
 *
 * Located in sidebar-index-insert.php
 * Just before the 'index-insert' widget area
 */
function cleanyetibasic_aboveindexinsert() {
    do_action('cleanyetibasic_aboveindexinsert');
}


/**
 * Register action hook: widget_area_index_insert
 * 
 * Located in sidebar-index-insert.php
 * Regular hook for the 'index-insert' widget area
 */
function cleanyetibasic_widget_area_index_insert() {
	do_action('widget_area_index_insert');
}
	
	
/**
 * Register action hook: cleanyetibasic_belowindexinsert 
 *
 * Located in sidebar-index-insert.php
 * Just after the 'index-insert' widget area
 */
function cleanyetibasic_belowindexinsert() {
    do_action('cleanyetibasic_belowindexinsert');
}	


/**
 * Register action hook: cleanyetibasic_aboveindexbottom 
 *
 * Located in sidebar-index-bottom.php
 * Just above the 'index-bottom' widget area
 */
function cleanyetibasic_aboveindexbottom() {
    do_action('cleanyetibasic_aboveindexbottom');
}
	

/**
 * Register action hook: widget_area_index_bottom 
 *
 * Located in sidebar-index-bottom.php
 * Regular hook for the 'index-bottom' widget area
 */	
function cleanyetibasic_widget_area_index_bottom() {
    do_action('widget_area_index_bottom');
}
	
	
/**
 * Register action hook: cleanyetibasic_belowindexbottom 
 *
 * Located in sidebar-index-bottom.php
 * Just below the 'index-bottom' widget area
 */	function cleanyetibasic_belowindexbottom() {
    do_action('cleanyetibasic_belowindexbottom');
}
	
	
/*
 * Single Post Asides
 */


/**
 * Register action hook: cleanyetibasic_abovesingletop 
 *
 * Located in sidebar-single-top.php
 * Just above the 'single-top' widget area
 */
function cleanyetibasic_abovesingletop() {
    do_action('cleanyetibasic_abovesingletop');
}


/**
 * Register action hook: widget_area_single_top 
 *
 * Located in sidebar-single-top.php
 * Regular hook for the 'single-top' widget area
 */
function cleanyetibasic_widget_area_single_top() {
    do_action('widget_area_single_top');
}


/**
 * Register action hook: cleanyetibasic_belowsingletop 
 *
 * Located in sidebar-single-top.php
 * Just below the 'single-top' widget area
 */
function cleanyetibasic_belowsingletop() {
    do_action('cleanyetibasic_belowsingletop');
}
	
	
/**
 * Register action hook: cleanyetibasic_abovesingleinsert 
 *
 * Located in sidebar-single-insert.php
 * Just above the 'single-insert' widget area
 */
function cleanyetibasic_abovesingleinsert() {
    do_action('cleanyetibasic_abovesingleinsert');
}


/**
 * Register action hook: widget_area_single_insert 
 *
 * Located in sidebar-single-insert.php
 * Regular hook for the 'single-insert' widget area
 */
function cleanyetibasic_widget_area_single_insert() {
    do_action('widget_area_single_insert');
}


/**
 * Register action hook: cleanyetibasic_belowsingleinsert 
 *
 * Located in sidebar-single-insert.php
 * Just below the 'single-insert' widget area
 */
function cleanyetibasic_belowsingleinsert() {
    do_action('cleanyetibasic_belowsingleinsert');
}


/**
 * Register action hook: cleanyetibasic_abovesinglebottom 
 *
 * Located in sidebar-single-bottom.php
 * Just above the 'single-bottom' widget area
 */
function cleanyetibasic_abovesinglebottom() {
    do_action('cleanyetibasic_abovesinglebottom');
}


/**
 * Register action hook: widget_area_single_bottom 
 *
 * Located in sidebar-single-bottom.php
 * Regular hook for the 'single-bottom' widget area
 */
function cleanyetibasic_widget_area_single_bottom() {
    do_action('widget_area_single_bottom');
}


/**
 * Register action hook: cleanyetibasic_belowsinglebottom 
 *
 * Located in sidebar-single-bottom.php
 * Just below the 'single-bottom' widget area
 */
function cleanyetibasic_belowsinglebottom() {
    do_action('cleanyetibasic_belowsinglebottom');
}


/*
 * Page Aside Hooks
 */


/**
 * Register action hook: cleanyetibasic_abovepagetop 
 *
 * Located in sidebar-page-top.php
 * Just above the 'page-top' widget area
 */
function cleanyetibasic_abovepagetop() {
    do_action('cleanyetibasic_abovepagetop');
}


/**
 * Register action hook: widget_area_page_top 
 *
 * Located in sidebar-page-top.php
 * Regular hook for the 'page-top' widget area
 */
function cleanyetibasic_widget_area_page_top() {
    do_action('widget_area_page_top');
}


/**
 * Register action hook: cleanyetibasic_belowpagetop 
 *
 * Located in sidebar-page-top.php
 * Just below the 'page-top' widget area
 */
function cleanyetibasic_belowpagetop() {
    do_action('cleanyetibasic_belowpagetop');
} // end cleanyetibasic_belowpagetop


/**
 * Register action hook: cleanyetibasic_abovepagebottom 
 *
 * Located in sidebar-page-bottom.php
 * Just above the 'page-bottom' widget area
 */
function cleanyetibasic_abovepagebottom() {
    do_action('cleanyetibasic_abovepagebottom');
} // end cleanyetibasic_abovepagebottom


/**
 * Register action hook: widget_area_page_bottom 
 *
 * Located in sidebar-page-bottom.php
 * Regular hook for the 'page-bottom' widget area
 */
function cleanyetibasic_widget_area_page_bottom() {
    do_action('widget_area_page_bottom');
} // end widget_area_page_bottom


/**
 * Register action hook: cleanyetibasic_belowpagebottom 
 *
 * Located in sidebar-page-bottom.php
 * Just below the 'page-bottom' widget area
 */
function cleanyetibasic_belowpagebottom() {
    do_action('cleanyetibasic_belowpagebottom');
} // end cleanyetibasic_belowpagebottom	


/*
 * Subsidiary Aside Hooks
 */


/**
 * Register action hook: cleanyetibasic_abovesubasides 
 *
 * Located in sidebar-subsidiary.php
 * Just above the subsidiary widget areas
 */
function cleanyetibasic_abovesubasides() {
    do_action('cleanyetibasic_abovesubasides');
}


/**
 * Register action hook: cleanyetibasic_belowsubasides 
 *
 * Located in sidebar-subsidiary.php
 * Just below the subsidiary widget areas
 */
function cleanyetibasic_belowsubasides() {
    do_action('cleanyetibasic_belowsubasides');
}


/**
 * Open the #subsidiary div
 * 
 * Will only display if there is a widget in one of the subsidiary asides
 */
function cleanyetibasic_subsidiaryopen() {
    if ( is_active_sidebar('1st-subsidiary-aside') || is_active_sidebar('2nd-subsidiary-aside') || is_active_sidebar('3rd-subsidiary-aside') ) { // one of the subsidiary asides has a widget ?>
        
        <div id="subsidiary" class="row">
        
    <?php
    }
}
add_action('widget_area_subsidiaries', 'cleanyetibasic_subsidiaryopen', 10);


/**
 * Register action hook: cleanyetibasic_before_first_sub 
 *
 * Is only available if there is a widget in one of the subsidiary asides
 */
function cleanyetibasic_before_first_sub() {
    do_action('cleanyetibasic_before_first_sub');
}


/**
 * Add the cleanyetibasic_before_first_sub hook within the #subsidiary div
 *
 * Will only add the hook if there is a widget in one of the subsidiary asides
 */
function cleanyetibasic_add_before_first_sub() {
    if ( is_active_sidebar('1st-subsidiary-aside') || is_active_sidebar('2nd-subsidiary-aside') || is_active_sidebar('3rd-subsidiary-aside') ) { // one of the subsidiary asides has a widget
        cleanyetibasic_before_first_sub();
    }
}
add_action('widget_area_subsidiaries', 'cleanyetibasic_add_before_first_sub',20);

	
/**
 * Register action hook: widget_area_subsidiaries 
 *
 * Located in sidebar-subsidiary.php
 * Regular hook for the subsidiary widget areas
 */
function cleanyetibasic_widget_area_subsidiaries() {
    do_action('widget_area_subsidiaries');
}


/**
 * Register action hook: cleanyetibasic_between_firstsecond_sub 
 *
 * Is only available if there is a widget in one of the subsidiary asides
 */
function cleanyetibasic_between_firstsecond_sub() {
    do_action('cleanyetibasic_between_firstsecond_sub');
}


/**
 * Add the cleanyetibasic_between_firstsecond_sub hook within the #subsidiary div
 *
 * Will only add the hook if there is a widget in one of the subsidiary asides
 */
function cleanyetibasic_add_between_firstsecond_sub() {
    if ( is_active_sidebar('1st-subsidiary-aside') || is_active_sidebar('2nd-subsidiary-aside') || is_active_sidebar('3rd-subsidiary-aside') ) { // one of the subsidiary asides has a widget
        cleanyetibasic_between_firstsecond_sub();
    }
}
add_action('widget_area_subsidiaries', 'cleanyetibasic_add_between_firstsecond_sub',40);


/**
 * Register action hook: cleanyetibasic_between_secondthird_sub 
 *
 * Is only available if there is a widget in one of the subsidiary asides
 */
function cleanyetibasic_between_secondthird_sub() {
    do_action('cleanyetibasic_between_secondthird_sub');
}


/**
 * Add the cleanyetibasic_between_secondthird_sub hook within the #subsidiary div
 *
 * Will only add the hook if there is a widget in one of the subsidiary asides
 */
function cleanyetibasic_add_between_secondthird_sub() {
    if ( is_active_sidebar('1st-subsidiary-aside') || is_active_sidebar('2nd-subsidiary-aside') || is_active_sidebar('3rd-subsidiary-aside') ) { // one of the subsidiary asides has a widget
        cleanyetibasic_between_secondthird_sub();
    }
}
add_action('widget_area_subsidiaries', 'cleanyetibasic_add_between_secondthird_sub',60);


/**
 * Register action hook: cleanyetibasic_after_third_sub 
 *
 * Is only available if there is a widget in one of the subsidiary asides
 */
function cleanyetibasic_after_third_sub() {
    do_action('cleanyetibasic_after_third_sub');
}	


/**
 * Add the cleanyetibasic_after_third_sub hook within the #subsidiary div
 *
 * Will only add the hook if there is a widget in one of the subsidiary asides
 */
function cleanyetibasic_add_after_third_sub() {
    if ( is_active_sidebar('1st-subsidiary-aside') || is_active_sidebar('2nd-subsidiary-aside') || is_active_sidebar('3rd-subsidiary-aside') ) { // one of the subsidiary asides has a widget
        cleanyetibasic_after_third_sub();
    }
}
add_action('widget_area_subsidiaries', 'cleanyetibasic_add_after_third_sub',80);


/**
 * Close the #subsidiary div
 * 
 * Will only display if there is a widget in one of the subsidiary asides
 */
function cleanyetibasic_subsidiaryclose() {
    if ( is_active_sidebar('1st-subsidiary-aside') || is_active_sidebar('2nd-subsidiary-aside') || is_active_sidebar('3rd-subsidiary-aside') ) { // one of the subsidiary asides has a widget ?>
        
        </div><!-- #subsidiary -->
        
    <?php
    }
}
add_action('widget_area_subsidiaries', 'cleanyetibasic_subsidiaryclose', 200);