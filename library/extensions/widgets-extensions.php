<?php

/**
 * Widgets Extensions
 *
 * @package cleanyetibasicCoreLibrary
 * @subpackage WidgetsExtensions
 */


/**
 * Displays a filterable Search Form
 *
 * This function is called from the searchform.php template. 
 * That template is called by the WP function get_search_form()
 *
 * Filter: search_field_value Controls the input element's size attribute <br>
 * Filter: cleanyetibasic_search_submit Controls the form's "submit" input element <br>
 * Filters: cleanyetibasic_search_form Controls the entire from output just before display <br>
 *
 * @see cleanyetibasic_Widget_Search
 * @link http://codex.wordpress.org/Function_Reference/get_search_form Codex: get_search_form()
 */

function cleanyetibasic_search_form() {
	$search_form_length = apply_filters('cleanyetibasic_search_form_length', '32');
	$search_form  = "\n\t\t\t\t\t\t";
	$search_form .= '<form id="searchform" method="get" action="' .esc_url( home_url()) .'/">';
	$search_form .= "\n\n\t\t\t\t\t\t\t";
	$search_form .= '<div class="row collapse">';
	$search_form .= "\n\t\t\t\t\t\t\t\t";
	$search_form .= '<div class="small-8 columns">';
	if (is_search()) {
	    	$search_form .= '<input id="s" class="search" name="s" type="text" value="' . esc_html ( stripslashes( $_GET['s'] ) ) .'" size="' . $search_form_length . '" tabindex="1" />';
	} else {
	    	$value = __( 'Search&hellip;', 'cleanyetibasic' );
	    	$value = apply_filters( 'search_field_value',$value );
	    	$search_form .= '<input id="s" class="search" name="s" type="text" value="' . $value . '" onfocus="if (this.value == \'' . $value . '\') {this.value = \'\';}" onblur="if (this.value == \'\') {this.value = \'' . $value . '\';}" size="'. $search_form_length .'" tabindex="1" />';
	}
	$search_form .= "\n\n\t\t\t\t\t\t\t\t";
	$search_form .= '</div>';
	$search_form .= "\n\n\t\t\t\t\t\t\t\t";
	$search_form .= '<div class="small-4 columns">';
	
	$search_submit = '<input id="searchsubmit" name="searchsubmit" type="submit" value="' . __('Search', 'cleanyetibasic') . '" tabindex="2" class="button radius secondary postfix" />';
	
	$search_form .= apply_filters('cleanyetibasic_search_submit', $search_submit);
	
	$search_form .= "\n\t\t\t\t\t\t\t";
	$search_form .= '</div>';
	$search_form .= '</div>';
	
	$search_form .= "\n\n\t\t\t\t\t\t";
	$search_form .= '</form>' . "\n\n\t\t\t\t\t";
	
	echo apply_filters('cleanyetibasic_search_form', $search_form);
}

/**
 * Defines the array for creating and displaying the widgetized areas
 * in the WP-Admin and front-end of the site.
 * 
 * Filter: cleanyetibasic_widgetized_areas
 *
 * @uses cleanyetibasic_before_widget()
 * @uses cleanyetibasic_after_widget()
 * @uses cleanyetibasic_before_title()
 * @uses cleanyetibasic_after_title()
 * @return array
 */
function cleanyetibasic_widgets_array() {
	$cleanyetibasic_widgetized_areas = array(
		'Primary Aside' => array(
			'admin_menu_order' => 100,
			'args' => array (
				'name' => __( 'Primary Aside', 'cleanyetibasic' ),
				'id' => 'primary-aside',
                'description' => __('The primary widget area, most often used as a sidebar.', 'cleanyetibasic'),
				'before_widget' => cleanyetibasic_before_widget(),
				'after_widget' => cleanyetibasic_after_widget(),
				'before_title' => cleanyetibasic_before_title(),
				'after_title' => cleanyetibasic_after_title(),
				),
			'action_hook'	=> 'widget_area_primary_aside',
			'function'		=> 'cleanyetibasic_primary_aside',
			'priority'		=> 10,
			),
		'Secondary Aside' => array(
			'admin_menu_order' => 200,
			'args' => array (
				'name' => __( 'Sections', 'cleanyetibasic' ),
				'id' => 'secondary-aside',
                		'description'       => __('Widgets placed here will display in the right column as an accordian section style.', 'cleanyetibasic'),
                		'before_title'      =>'',
                		'after_title'       =>'</a><div class="content">',
                		'before_widget'     => '<dd id="%1$s" class="%2$s section-border"><a href="#panel-%1$s">',
	             		'after_widget'      => '<div class="clearfix"></div></div></dd>'
				),
			'action_hook'	=> 'widget_area_secondary_aside',
			'function'		=> 'cleanyetibasic_secondary_aside',
			'priority'		=> 10,
			),
		'1st Subsidiary Aside' => array(
			'admin_menu_order' => 300,
			'args' => array (
				'name' => __( '1st Footer Area', 'cleanyetibasic' ),
				'id' => '1st-subsidiary-aside',
                'description' => __('The 1st widget area in the footer.', 'cleanyetibasic'),
				'before_widget' => cleanyetibasic_before_widget(),
				'after_widget' => cleanyetibasic_after_widget(),
				'before_title' => cleanyetibasic_before_title(),
				'after_title' => cleanyetibasic_after_title(),
				),
			'action_hook'	=> 'widget_area_subsidiaries',
			'function'		=> 'cleanyetibasic_1st_subsidiary_aside',
			'priority'		=> 30,
			),
		'2nd Subsidiary Aside' => array(
			'admin_menu_order' => 400,
			'args' => array (
				'name' => __( '2nd Footer Area', 'cleanyetibasic' ),
				'id' => '2nd-subsidiary-aside',
                'description' => __('The 2nd widget area in the footer.', 'cleanyetibasic'),
				'before_widget' => cleanyetibasic_before_widget(),
				'after_widget' => cleanyetibasic_after_widget(),
				'before_title' => cleanyetibasic_before_title(),
				'after_title' => cleanyetibasic_after_title(),
				),
			'action_hook'	=> 'widget_area_subsidiaries',
			'function'		=> 'cleanyetibasic_2nd_subsidiary_aside',
			'priority'		=> 50,
			),
		'3rd Subsidiary Aside' => array(
			'admin_menu_order' => 500,
			'args' => array (
				'name' => __( '3rd Footer Area', 'cleanyetibasic' ),
				'id' => '3rd-subsidiary-aside',
                'description' => __('The 3rd widget area in the footer.', 'cleanyetibasic'),
				'before_widget' => cleanyetibasic_before_widget(),
				'after_widget' => cleanyetibasic_after_widget(),
				'before_title' => cleanyetibasic_before_title(),
				'after_title' => cleanyetibasic_after_title(),
				),
			'action_hook'	=> 'widget_area_subsidiaries',
			'function'		=> 'cleanyetibasic_3rd_subsidiary_aside',
			'priority'		=> 70,
		),
		
		);
	
	return apply_filters('cleanyetibasic_widgetized_areas', $cleanyetibasic_widgetized_areas);
	
}

/**
 * Registers Widget Areas(Sidebars) and pre-sets default widgets
 *
 * @uses cleanyetibasic_presetwidgets
 * @todo consider deprecating the widgets directory search this seems to have never been used
 */
function cleanyetibasic_widgets_init() {

	$cleanyetibasic_widgetized_areas = cleanyetibasic_widgets_array();
	foreach ( $cleanyetibasic_widgetized_areas as $key => $value ) {
		register_sidebar( $cleanyetibasic_widgetized_areas[$key]['args'] );
	}
}

add_action( 'widgets_init', 'cleanyetibasic_widgets_init' );

/**
 * Add wigitized area functions to specific action hooks.
 *
 * @uses cleanyetibasic_widgets_array to get function names and action hooks.
 */
function cleanyetibasic_connect_functions() {

	$cleanyetibasic_widgetized_areas = cleanyetibasic_widgets_array();

	foreach ( $cleanyetibasic_widgetized_areas as $key => $value ) {
		if ( !has_action( $cleanyetibasic_widgetized_areas[$key]['action_hook'], $cleanyetibasic_widgetized_areas[$key]['function'] ) )
			add_action( $cleanyetibasic_widgetized_areas[$key]['action_hook'], $cleanyetibasic_widgetized_areas[$key]['function'], $cleanyetibasic_widgetized_areas[$key]['priority'] );	
	}

}

add_action( 'wp_head', 'cleanyetibasic_connect_functions');


/**
 * Filters the order in which the Widget Areas (Sidebars) will be listed in the WP-Admin/Widgets
 * 
 * It sorts the array generated by cleanyetibasic_widgetized_areas() by [admin_menu_order]
 * allowing for child themes to filter cleanyetibasic_widgetized_areas to control
 * the sidebar list order in the WP-Admin/Widgets.
 * 
 * @see cleanyetibasic_widgetized_areas
 * @param array
 * @return array
 */
function cleanyetibasic_sort_widgetized_areas($content) {
	asort($content);
	return $content;
}
add_filter('cleanyetibasic_widgetized_areas', 'cleanyetibasic_sort_widgetized_areas', 100);

/**
 * Opening element for container
 *
 * Width may be changed by editing large-8 to large-*
 * If changed, filter for cleanyetibasic_sidebar_open must be applied
 * Filter: cleanyetibasic_container
 */

function cleanyetibasic_container() {
	global $wp_customize, $cleanyetibasic_options;
    $cleanyetibasic_options = cleanyetibasic_get_options();
    $sbpos = $cleanyetibasic_options['sidebar_position'];
    $sbwidth = $cleanyetibasic_options['sidebar_width'];
    $contentwidth = 12 - $sbwidth;
	if ( is_page_template( 'template-page-fullwidth.php' )) :
		$open = '<div id="container" class="medium-12 columns">';
	elseif (is_active_sidebar('primary-aside') || is_active_sidebar('secondary-aside') || ( method_exists ( $wp_customize,'is_preview' ) && $wp_customize->is_preview()  )) :
		if ( 'left' == $sbpos ) {
		    $open = '<div id="container" class="medium-' . $contentwidth . ' medium-push-' . $sbwidth . ' columns">';
		} else {
		    $open = '<div id="container" class="medium-' . $contentwidth . ' columns">';
        }
    else:
        $open = '<div id="container" class="medium-12 columns">';
    endif;
    echo apply_filters( 'cleanyetibasic_container', $open );
}
add_action( 'cleanyetibasic_abovecontent', 'cleanyetibasic_container', 1 );

/**
 * Displays the Primary Aside
 * 
 * @uses cleanyetibasic_before_widget_area
 * @uses cleanyetibasic_after_widget_area
 */
function cleanyetibasic_primary_aside() {	
	global $wp_customize;
	$args =	array(	
			'before_title' 	=> cleanyetibasic_before_title(),
			'after_title' 	=> cleanyetibasic_after_title()
			);
			
	if ( is_active_sidebar( 'primary-aside' ) ) { 
		echo cleanyetibasic_before_widget_area( 'primary-aside' );
		dynamic_sidebar( 'primary-aside' );
		echo cleanyetibasic_after_widget_area( 'primary-aside' );
	// WordPress 3.4
	} elseif ( method_exists ( $wp_customize,'is_preview' ) && $wp_customize->is_preview()  ){ 
		echo cleanyetibasic_before_widget_area( 'primary-aside' );
	//	the_widget('cleanyetibasic_Widget_Search', null , $args);
		the_widget('WP_Widget_Text', array( 'title' => __( 'Widget Preview', 'cleanyetibasic' ), 'text' => '<p>' . __( 'This is the main sidebar area where you can add your own widgets such as a search bar, text, recent post links, and much much more...', 'cleanyetibasic' ) . '</p>') , $args);
		echo cleanyetibasic_after_widget_area( 'primary-aside' );
	}
}

/**
 * Displays the Secondary Aside 
 *
 * @uses cleanyetibasic_before_widget_area
 * @uses cleanyetibasic_after_widget_area
 */
function cleanyetibasic_secondary_aside() {
	global $wp_customize;
	$args =	array(	
			'before_title'      => '',
			'after_title'       => '</a><div class="content">',
			'before_widget'     => '<dd id="%1$s" class="%2$s section-border"><a href="#panel-%1$s">',
			'after_widget'      => '</div></dd>'
			);
				
	if ( is_active_sidebar( 'secondary-aside' ) ) {
		echo cleanyetibasic_before_widget_area( 'secondary-aside' );
		dynamic_sidebar( 'secondary-aside' );
		echo cleanyetibasic_after_widget_area( 'secondary-aside' );
	} elseif ( method_exists ( $wp_customize,'is_preview' ) && $wp_customize->is_preview()  ){
		echo '<dl class="accordion" data-accordion>';
		the_widget('WP_Widget_Text', array( 'title' => __( 'Section 1', 'cleanyetibasic' ), 'text' => '<p>' . __( 'This is the section sidebar area where you can display your own widgets in a section accordion style', 'cleanyetibasic' ) . '</p>') , $args);
		the_widget('WP_Widget_Text', array( 'title' => __( 'Section 2', 'cleanyetibasic' ), 'text' => '<p>' . __( 'This is the section sidebar area where you can display your own widgets in a section accordion style', 'cleanyetibasic' ) . '</p>') , $args);
		echo '</dl>';
	}
}

/**
 * Displays the 2nd Subsidiary Aside
 *
 * @uses cleanyetibasic_before_widget_area
 * @uses cleanyetibasic_after_widget_area
 */
function cleanyetibasic_1st_subsidiary_aside() {
	if ( is_active_sidebar( '1st-subsidiary-aside' ) ) {
		echo cleanyetibasic_before_widget_area( '1st-subsidiary-aside' );
		dynamic_sidebar( '1st-subsidiary-aside' );
		echo cleanyetibasic_after_widget_area( '1st-subsidiary-aside' );
	}
}

/**
 * Displays the 2nd Subsidiary Aside
 *
 * @uses cleanyetibasic_before_widget_area
 * @uses cleanyetibasic_after_widget_area
 */
function cleanyetibasic_2nd_subsidiary_aside() {
	if ( is_active_sidebar( '2nd-subsidiary-aside' ) ) {
		echo cleanyetibasic_before_widget_area('2nd-subsidiary-aside' );
		dynamic_sidebar( '2nd-subsidiary-aside' );
		echo cleanyetibasic_after_widget_area( '2nd-subsidiary-aside' );
	}
}

/**
 * Displays the 3rd Subsidiary Aside
 *
 * @uses cleanyetibasic_before_widget_area
 * @uses cleanyetibasic_after_widget_area
 */
function cleanyetibasic_3rd_subsidiary_aside() {
	if ( is_active_sidebar( '3rd-subsidiary-aside' ) ) {
		echo cleanyetibasic_before_widget_area('3rd-subsidiary-aside' );
		dynamic_sidebar( '3rd-subsidiary-aside' );
		echo cleanyetibasic_after_widget_area( '3rd-subsidiary-aside' );
	}
}

/**
 * Returns the opening CSS markup before the widget area
 *
 * Filter: cleanyetibasic_before_widget_area
 * 
 * @param $hook determines the markup specific to the widget area
 * @return string 
 */
 


function cleanyetibasic_before_widget_area($hook) {
		$content =  "\n\t\t";
	if ( $hook == 'primary-aside' ) {
		$content .= '<div id="primary" class="aside main-aside">' . "\n\n";
	} elseif ( $hook == 'secondary-aside' ) {
		$content .= '<dl id="secondary" class="accordion" data-accordion>' . "\n\n";
	} elseif ( $hook == '1st-subsidiary-aside' ) {
		$content .= '<div id="first" class="aside sub-aside large-5 columns">' . "\n\n";
	} elseif ( $hook == '2nd-subsidiary-aside' ) {
		$content .= '<div id="second" class="aside sub-aside large-4 columns">' . "\n\n";
	} elseif ( $hook == '3rd-subsidiary-aside' ) {
		$content .= '<div id="third" class="aside sub-aside large-3 columns">' . "\n\n";
	} else {
		$content .= '<div id="' . $hook . '" class="aside">' ."\n";
	}
	return apply_filters( 'cleanyetibasic_before_widget_area', $content, $hook );
}

/**
 * Returns the closing CSS markup before the widget area
 *
 * Filter: cleanyetibasic_after_widget_area
 * 
 * @param $hook determines the markup specific to the widget area
 * @return string 
 */
function cleanyetibasic_after_widget_area($hook) {
		$content = "\n\t\t";
	if ( $hook == 'primary-aside' ) {		
		$content .= '</div><!-- #primary .aside -->' ."\n\n";
	} elseif ( $hook == 'secondary-aside' ) {
		$content .= '</dl><!-- #secondary .aside -->' ."\n\n";
	} elseif ( $hook == '1st-subsidiary-aside' ) {
		$content .= '</div><!-- #first .aside -->' ."\n\n";
	} elseif ( $hook == '2nd-subsidiary-aside' ) {
		$content .= '</div><!-- #second .aside -->' ."\n\n";
	} elseif ( $hook == '3rd-subsidiary-aside' ) {
		$content .= '</div><!-- #third .aside -->' ."\n\n";
	} else {
		$content .= '</div><!-- #' . $hook . ' .aside -->' ."\n\n";
	} 
	return apply_filters( 'cleanyetibasic_after_widget_area', $content, $hook );
}

/* This code filters the Categories archive widget to include the post count inside the link */
add_filter('wp_list_categories', 'cleanyetibasic_cat_count_span');
function cleanyetibasic_cat_count_span($links) {
        $links = str_replace('</a> (', ' (', $links);
        $links = str_replace(')', ')</a>', $links);
        return $links;
}

/* This code filters the Archive widget to include the post count inside the link */
add_filter('get_archives_link', 'cleanyetibasic_archive_count_span');
function cleanyetibasic_archive_count_span($links) {
        $links = str_replace('</a>&nbsp;(', ' (', $links);
        $links = str_replace(')', ')</a>', $links);
        return $links;
}
?>