<?php
/**
 * Clean Yeti Basic Theme Options
 *
 * This file defines the Options for the Clean Yeti Basic Theme.
 * 
 * Theme Options Functions
 * 
 *  - Define Default Theme Options
 *  - Register/Initialize Theme Options
 *  - Define Admin Settings Page
 *  - Register Contextual Help
 * 
 * @package 	Clean Yeti Basic
 * @copyright	Copyright (c) 2014, Serene Themes
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, v2 (or newer)
 *
 * @since 		Clean Yeti Basic 2.3.0
 */

/**
 * Globalize the variable that holds the Theme Options
 * 
 * @global	array	$cleanyetibasic_options	holds Theme options
 */
global $cleanyetibasic_options;

/**
 * Clean Yeti Basic Theme Settings API Implementation
 *
 * Implement the WordPress Settings API for the 
 * Clean Yeti Basic Theme Settings.
 * 
 * @link	http://codex.wordpress.org/Settings_API	Codex Reference: Settings API
 * @link	http://ottopress.com/2009/wordpress-settings-api-tutorial/	Otto
 * @link	http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/	Ozh
 */
function cleanyetibasic_register_options(){
	require( get_template_directory() . '/library/options/options-register.php' );
}
// Settings API options initilization and validation
add_action( 'admin_init', 'cleanyetibasic_register_options' );

function cleanyetibasic_get_settings_page_cap() {
	return 'edit_theme_options';
}
// Hook into option_page_capability_{option_page}
add_action( 'option_page_capability_cleanyetibasic-settings', 'cleanyetibasic_get_settings_page_cap' );

/**
 * Get current settings page tab
 */
function cleanyetibasic_get_current_tab() {

	$page = 'cleanyetibasic-settings';
	if ( isset( $_GET['page'] ) && 'cleanyetibasic-reference' == $_GET['page'] ) {
		$page = 'cleanyetibasic-reference';
	}
    if ( isset( $_GET['tab'] ) ) {
        $current = $_GET['tab'];
    } else {
		$cleanyetibasic_options = cleanyetibasic_get_options();
		$current = 'general';
    }	
	return apply_filters( 'cleanyetibasic_get_current_tab', $current );
}

/**
 * Define Clean Yeti Basic Admin Page Tab Markup
 * 
 * @uses	cleanyetibasic_get_current_tab()	defined in \functions\options.php
 * @uses	cleanyetibasic_get_settings_page_tabs()	defined in \functions\options.php
 * 
 * @link	http://www.onedesigns.com/tutorials/separate-multiple-theme-options-pages-using-tabs	Daniel Tara
 */
function cleanyetibasic_get_page_tab_markup() {

	$page = 'cleanyetibasic-settings';

    $current = cleanyetibasic_get_current_tab();
	
	$tabs = cleanyetibasic_get_settings_page_tabs();
    
    $links = array();
    
    foreach( $tabs as $tab ) {
		$tabname = $tab['name'];
		$tabtitle = $tab['title'];
        if ( $tabname == $current ) {
            $links[] = "<a class='nav-tab nav-tab-active' href='?page=$page&tab=$tabname'>$tabtitle</a>";
        } else {
            $links[] = "<a class='nav-tab' href='?page=$page&tab=$tabname'>$tabtitle</a>";
        }
    }
    
    echo '<div id="icon-themes" class="icon32"><br /></div>';
    echo '<h2 class="nav-tab-wrapper">';
    foreach ( $links as $link )
        echo $link;
    echo '</h2>';
    
}

/**
 * Setup the Theme Admin Settings Page
 * 
 * Add "Clean Yeti Basic Options" link to the "Appearance" menu
 * 
 * @uses	cleanyetibasic_get_settings_page_cap()	defined in \functions\wordpress-hooks.php
 */
function cleanyetibasic_add_theme_page() {
	// Globalize Theme options page
	global $cleanyetibasic_settings_page;
	// Add Theme options page
	$cleanyetibasic_settings_page = add_theme_page(
		// $page_title
		// Name displayed in HTML title tag
		__( 'Clean Yeti Basic Options', 'cleanyetibasic' ), 
		// $menu_title
		// Name displayed in the Admin Menu
		__( 'Clean Yeti Basic Options', 'cleanyetibasic' ), 
		// $capability
		// User capability required to access page
		'edit_theme_options', 
		// $menu_slug
		// String to append to URL after "themes.php"
		'cleanyetibasic-settings', 
		// $callback
		// Function to define settings page markup
		'cleanyetibasic_admin_options_page'
	);
	// load color picker script
	add_action( 'admin_enqueue_scripts', 'cleanyetibasic_enqueue_settings_scripts');
	
	if ( !empty( $cleanyetibasic_settings_page ) )
	    add_action( "load-{$cleanyetibasic_settings_page}", 'cleanyetibasic_old_options_update' );
	    //cleanyetibasic_old_options_update();
}
// Load the Admin Options page
add_action( 'admin_menu', 'cleanyetibasic_add_theme_page' );

/**
 *
 * Enqueues Color Picker Style and script
 *
 */

function cleanyetibasic_enqueue_settings_scripts($hook_suffix) {
    global $cleanyetibasic_settings_page;
    if ($hook_suffix != $cleanyetibasic_settings_page) return;
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'cleanyetibasic-color-picker', get_template_directory_uri() . '/library/Foundation/js/color-picker.js', array( 'wp-color-picker' ), false, true );
}

/**
 * Clean Yeti Basic Theme Settings Page Markup
 * 
 * @uses	cleanyetibasic_get_current_tab()	defined in \functions\custom.php
 * @uses	cleanyetibasic_get_page_tab_markup()	defined in \functions\custom.php
 */
function cleanyetibasic_admin_options_page() { 
	// Determine the current page tab
	$currenttab = cleanyetibasic_get_current_tab();
	// Define the page section accordingly
	$settings_section = 'cleanyetibasic_' . $currenttab . '_tab';
	?>

	<div class="wrap">
		<?php cleanyetibasic_get_page_tab_markup();
        if ( isset( $_GET['settings-updated'] ) ) {
            echo '<div class="updated"><p>';
            echo __( 'Theme settings updated successfully.', 'cleanyeti' );
            echo '</p></div>';
        } ?>
		<form action="options.php" method="post">
		<?php		
			// Implement settings field security, nonces, etc.
			settings_fields('theme_cleanyetibasic_options');
			// Output each settings section, and each
			// Settings field in each section
			do_settings_sections( $settings_section );
		?>
			<?php submit_button( __( 'Save Settings', 'cleanyetibasic' ), 'primary', 'theme_cleanyetibasic_options[submit-' . $currenttab . ']', false ); ?>
			<?php submit_button( __( 'Reset Defaults', 'cleanyetibasic' ), 'secondary', 'theme_cleanyetibasic_options[reset-' . $currenttab . ']', false ); ?>
		</form>
	</div>
<?php 
}

/**
 * Clean Yeti Basic Theme Option Defaults
 * 
 * Returns an associative array that holds 
 * all of the default values for all Theme 
 * options.
 * 
 * @uses	cleanyetibasic_get_option_parameters()	defined in \functions\options.php
 * 
 * @return	array	$defaults	associative array of option defaults
 */
function cleanyetibasic_get_option_defaults() {
	// Get the array that holds all
	// Theme option parameters
	$option_parameters = cleanyetibasic_get_option_parameters();
	// Initialize the array to hold
	// the default values for all
	// Theme options
	$option_defaults = array();
	// Loop through the option
	// parameters array
	foreach ( $option_parameters as $option_parameter ) {
		$name = $option_parameter['name'];
		// Add an associative array key
		// to the defaults array for each
		// option in the parameters array
		$option_defaults[$name] = $option_parameter['default'];
	}
	// Return the defaults array
	return apply_filters( 'cleanyetibasic_option_defaults', $option_defaults );
}

/**
 * Define default options tab
 */
function cleanyetibasic_define_default_options_tab( $options ) {
	$options['default_options_tab'] = 'general';
	return $options;
}
add_filter( 'cleanyetibasic_option_defaults', 'cleanyetibasic_define_default_options_tab' );

/**
 * Clean Yeti Basic Theme Option Parameters
 * 
 * Array that holds parameters for all options for
 * Clean Yeti Basic. The 'type' key is used to generate
 * the proper form field markup and to sanitize
 * the user-input data properly. The 'tab' key
 * determines the Settings Page on which the
 * option appears, and the 'section' tab determines
 * the section of the Settings Page tab in which
 * the option appears.
 * 
 * @return	array	$options	array of arrays of option parameters
 */
function cleanyetibasic_get_option_parameters() {
    $width_array=array();
    $i = 800;
    while ( $i <= 1400 ) {
        $width_array[$i]['name'] = $i;
        $width_array[$i]['title'] = $i;
        $i = $i + 50;
    }
    $sbwidth_array=array();
    $i = 2;
    while ( $i <= 6 ) {
        $sbwidth_array[$i]['name'] = $i;
        $sbwidth_array[$i]['title'] = $i;
        $i++;
    }
    $options = array(
        'display_admin_notice' => array(
			'name' => 'display_admin_notice',
			'title' => __( 'Display Admin Notice', 'cleanyetibasic' ),
			'type' => 'checkbox',
            'description' => __( 'Display Admin Notice about theme settings?', 'cleanyetibasic' ),
			'section' => 'info',
			'tab' => 'general',
			'since' => '2.3.0',
			'default' => 1
		),
        'title_position' => array(
			'name' => 'title_position',
			'title' => __( 'Main Title Position', 'cleanyetibasic' ),
			'type' => 'select',
			'valid_options' => array(
				'left' => array(
					'name' => 'left',
					'title' => __( 'Left', 'cleanyetibasic' )
				),
				'center' => array(
					'name' => 'center',
					'title' => __( 'Center', 'cleanyetibasic' )
				),
				'right' => array(
					'name' => 'right',
					'title' => __( 'Right', 'cleanyetibasic' )
				)
			),
			'description' => __( 'Position to display main title below navigation.', 'cleanyetibasic' ),
			'section' => 'header',
			'tab' => 'general',
			'since' => '2.3.0',
			'default' => 'left'
		),
        'header_top_bar_position' => array(
			'name' => 'header_top_bar_position',
			'title' => __( 'Header Top Bar Position', 'cleanyetibasic' ),
			'type' => 'select',
			'valid_options' => array(
				'sticky' => array(
					'name' => 'sticky',
					'title' => __( 'Sticky', 'cleanyetibasic' )
				),
				'not_sticky' => array(
					'name' => 'not_sticky',
					'title' => __( 'Not Sticky', 'cleanyetibasic' )
				)
			),
			'description' => __( 'Should Header Top Bar stick to the top of the browser or the top of the page?', 'cleanyetibasic' ),
			'section' => 'header',
			'tab' => 'general',
			'since' => '2.3.0',
			'default' => 'not_sticky'
		),
        'header_top_bar_menu_position' => array(
			'name' => 'header_top_bar_menu_position',
			'title' => __( 'Header Top Bar Menu Position', 'cleanyetibasic' ),
			'type' => 'select',
			'valid_options' => array(
				'left' => array(
					'name' => 'left',
					'title' => __( 'left', 'cleanyetibasic' )
				),
				'right' => array(
					'name' => 'right',
					'title' => __( 'Right', 'cleanyetibasic' )
				)
			),
			'description' => __( 'Choose whether to display menu items on the left or the right in the Top Bar.', 'cleanyetibasic' ),
			'section' => 'header',
			'tab' => 'general',
			'since' => '2.3.0',
			'default' => 'right'
		),
        'display_top_bar_title' => array(
			'name' => 'display_top_bar_title',
			'title' => __( 'Display Top Bar Title', 'cleanyetibasic' ),
			'type' => 'select',
			'valid_options' => array(
				'false' => array(
					'name' => 'false',
					'title' => __( 'Do Not Display', 'cleanyetibasic' )
				),
				'true' => array(
					'name' => 'true',
					'title' => __( 'Display', 'cleanyetibasic' )
				)
			),
			'description' => __( 'Choose whether or not the site title will display in the Top Bar.', 'cleanyetibasic' ),
			'section' => 'header',
			'tab' => 'general',
			'since' => '2.3.0',
			'default' => 'true'
		),
        'display_footer_credit' => array(
			'name' => 'display_footer_credit',
			'title' => __( 'Display Footer Credit', 'cleanyetibasic' ),
			'type' => 'select',
			'valid_options' => array(
				'false' => array(
					'name' => 'false',
					'title' => __( 'Do Not Display', 'cleanyetibasic' )
				),
				'true' => array(
					'name' => 'true',
					'title' => __( 'Display', 'cleanyetibasic' )
				)
			),
			'description' => __( 'Display a credit link in the footer? This option is disabled by default, and you are under no obligation whatsoever to enable it.', 'cleanyetibasic' ),
			'section' => 'footer',
			'tab' => 'general',
			'since' => '2.3.0',
			'default' => 'false'
		),
        'display_custom_copyright' => array(
			'name' => 'display_custom_copyright',
			'title' => __( 'Display Custom Copyright Text', 'cleanyetibasic' ),
			'type' => 'select',
			'valid_options' => array(
				'default' => array(
				    'name' => 'default',
				    'title' => __( 'Display Default Copyright Text', 'cleanyetibasic' )
                ),
				'false' => array(
					'name' => 'false',
					'title' => __( 'Do Not Display', 'cleanyetibasic' )
				),
				'true' => array(
					'name' => 'true',
					'title' => __( 'Display', 'cleanyetibasic' )
				)
			),
			'description' => __( 'Display custom copyright text? This option is disabled by default.  The default copyright text will display the range of your published post dates and blog title.', 'cleanyetibasic' ),
			'section' => 'footer',
			'tab' => 'general',
			'since' => '2.3.0',
			'default' => 'default'
		),
        'copyright_text' => array(
            'name' => 'copyright_text',
            'title' => __( 'Custom Copyright Text', 'cleanyetibasic' ),
            'type' => 'text',
            'sanitize' => 'nohtml',
            'description' => __( 'Enter your custom copyright text to display in the footer.', 'cleanyetibasic' ),
            'section' => 'footer',
            'tab' => 'general',
            'since' => '2.3.0',
            'default' => '&copy; ' . get_bloginfo('name')
        ),
        'abide' => array(
            'name' => 'abide',
            'title' => __( 'Abide', 'cleanyetibasic' ),
            'type' => 'checkbox',
            'description' => sprintf( __( 'Docs: %s', 'cleanyetibasic' ), sprintf( '<a href="http://foundation.zurb.com/docs/components/abide.html">%s</a>', __( 'Abide', 'cleanyetibasic' ) ) ),
            'section' => 'javascript',
            'tab' => 'foundation_settings',
            'since' => '2.3.0',
            'default' => false
        ),
        'alert' => array(
            'name' => 'alert',
            'title' => __( 'Alert', 'cleanyetibasic' ),
            'type' => 'checkbox',
            'description' => sprintf( __( 'Docs: %s', 'cleanyetibasic' ), sprintf( '<a href="http://foundation.zurb.com/docs/components/alert_boxes.html">%s</a>', __( 'Alert', 'cleanyetibasic' ) ) ),
            'section' => 'javascript',
            'tab' => 'foundation_settings',
            'since' => '2.3.0',
            'default' => false
        ),
        'clearing' => array(
            'name' => 'clearing',
            'title' => __( 'Clearing Lightbox', 'cleanyetibasic' ),
            'type' => 'checkbox',
            'description' => sprintf( __( 'Docs: %s', 'cleanyetibasic' ), sprintf( '<a href="http://foundation.zurb.com/docs/components/clearing.html">%s</a>', __( 'Clearing', 'cleanyetibasic' ) ) ),
            'section' => 'javascript',
            'tab' => 'foundation_settings',
            'since' => '2.3.0',
            'default' => false
        ),
        'dropdown' => array(
            'name' => 'dropdown',
            'title' => __( 'Dropdown', 'cleanyetibasic' ),
            'type' => 'checkbox',
            'description' => sprintf( __( 'Docs: %s', 'cleanyetibasic' ), sprintf( '<a href="http://foundation.zurb.com/docs/components/dropdown.html">%s</a>', __( 'Dropdown', 'cleanyetibasic' ) ) ),
            'section' => 'javascript',
            'tab' => 'foundation_settings',
            'since' => '2.3.0',
            'default' => false
        ),
        'equalizer' => array(
            'name' => 'equalizer',
            'title' => __( 'Equalizer', 'cleanyetibasic' ),
            'type' => 'checkbox',
            'description' => sprintf( __( 'Docs: %s', 'cleanyetibasic' ), sprintf( '<a href="http://foundation.zurb.com/docs/components/equalizer.html">%s</a>', __( 'Equalizer', 'cleanyetibasic' ) ) ),
            'section' => 'javascript',
            'tab' => 'foundation_settings',
            'since' => '2.3.0',
            'default' => false
        ),
        'interchange' => array(
            'name' => 'interchange',
            'title' => __( 'Interchange', 'cleanyetibasic' ),
            'type' => 'checkbox',
            'description' => sprintf( __( 'Docs: %s', 'cleanyetibasic' ), sprintf( '<a href="http://foundation.zurb.com/docs/components/interchange.html">%s</a>', __( 'Interchange', 'cleanyetibasic' ) ) ),
            'section' => 'javascript',
            'tab' => 'foundation_settings',
            'since' => '2.3.0',
            'default' => false
        ),
        'joyride' => array(
            'name' => 'joyride',
            'title' => __( 'Joyride', 'cleanyetibasic' ),
            'type' => 'checkbox',
            'description' => sprintf( __( 'Docs: %s', 'cleanyetibasic' ), sprintf( '<a href="http://foundation.zurb.com/docs/components/joyride.html">%s</a>', __( 'Joyride', 'cleanyetibasic' ) ) ),
            'section' => 'javascript',
            'tab' => 'foundation_settings',
            'since' => '2.3.0',
            'default' => false
        ),
        'magellan' => array(
            'name' => 'magellan',
            'title' => __( 'Magellan', 'cleanyetibasic' ),
            'type' => 'checkbox',
            'description' => sprintf( __( 'Docs: %s', 'cleanyetibasic' ), sprintf( '<a href="http://foundation.zurb.com/docs/components/magellan.html">%s</a>', __( 'Magellan', 'cleanyetibasic' ) ) ),
            'section' => 'javascript',
            'tab' => 'foundation_settings',
            'since' => '2.3.0',
            'default' => false
        ),
        'offcanvas' => array(
            'name' => 'offcanvas',
            'title' => __( 'Off Canvas', 'cleanyetibasic' ),
            'type' => 'checkbox',
            'description' => sprintf( __( 'Docs: %s', 'cleanyetibasic' ), sprintf( '<a href="http://foundation.zurb.com/docs/components/offcanvas.html">%s</a>', __( 'Off Canvas', 'cleanyetibasic' ) ) ),
            'section' => 'javascript',
            'tab' => 'foundation_settings',
            'since' => '2.3.0',
            'default' => false
        ),
        'orbit' => array(
            'name' => 'orbit',
            'title' => __( 'Orbit Slider', 'cleanyetibasic' ),
            'type' => 'checkbox',
            'description' => sprintf( __( 'Docs: %s', 'cleanyetibasic' ), sprintf( '<a href="http://foundation.zurb.com/docs/components/orbit.html">%s</a>', __( 'Orbit', 'cleanyetibasic' ) ) ),
            'section' => 'javascript',
            'tab' => 'foundation_settings',
            'since' => '2.3.0',
            'default' => false
        ),
        'reveal' => array(
            'name' => 'reveal',
            'title' => __( 'Reveal Modals', 'cleanyetibasic' ),
            'type' => 'checkbox',
            'description' => sprintf( __( 'Docs: %s', 'cleanyetibasic' ), sprintf( '<a href="http://foundation.zurb.com/docs/components/reveal.html">%s</a>', __( 'Reveal', 'cleanyetibasic' ) ) ),
            'section' => 'javascript',
            'tab' => 'foundation_settings',
            'since' => '2.3.0',
            'default' => false
        ),
        'slider' => array(
            'name' => 'slider',
            'title' => __( 'Range Slider', 'cleanyetibasic' ),
            'type' => 'checkbox',
            'description' => sprintf( __( 'Docs: %s', 'cleanyetibasic' ), sprintf( '<a href="http://foundation.zurb.com/docs/components/range_slider.html">%s</a>', __( 'Slider', 'cleanyetibasic' ) ) ),
            'section' => 'javascript',
            'tab' => 'foundation_settings',
            'since' => '2.3.0',
            'default' => false
        ),
        'tooltip' => array(
            'name' => 'tooltip',
            'title' => __( 'Tooltips', 'cleanyetibasic' ),
            'type' => 'checkbox',
            'description' => sprintf( __( 'Docs: %s', 'cleanyetibasic' ), sprintf( '<a href="http://foundation.zurb.com/docs/components/tooltips.html">%s</a>', __( 'Tooltips', 'cleanyetibasic' ) ) ),
            'section' => 'javascript',
            'tab' => 'foundation_settings',
            'since' => '2.3.0',
            'default' => false
        ),
        'sidebar_position' => array(
			'name' => 'sidebar_position',
			'title' => __( 'Sidebar Position', 'cleanyetibasic' ),
			'type' => 'select',
			'valid_options' => array(
				'left' => array(
					'name' => 'left',
					'title' => __( 'Left', 'cleanyetibasic' )
				),
				'right' => array(
					'name' => 'right',
					'title' => __( 'Right', 'cleanyetibasic' )
				)
			),
			'description' => __( 'Choose the positiong in which you would like to display the sidebar.', 'cleanyetibasic' ),
			'section' => 'layouts',
			'tab' => 'layout',
			'since' => '2.3.0',
			'default' => 'right'
		),
        'max_width' => array(
            'name' => 'max_width',
            'title' => __( 'Maximum Content Width', 'cleanyetibasic' ),
            'type' => 'select',
            'valid_options' => $width_array,
            'description' => __( 'Choose the maximum content width.  This value is the maximum width of the main content and the sidebar combined.', 'cleanyetibasic'),
            'section' => 'layouts',
            'tab' => 'layout',
            'since' => '2.3.0',
            'default' => '1200'
        ),
        'sidebar_width' => array(
            'name' => 'sidebar_width',
            'title' => __( 'Sidebar Column Width', 'cleanyetibasic' ),
            'type' => 'select',
            'valid_options' => $sbwidth_array,
            'description' => __( 'Choose the sidebar column width.  Width is based on a 12 column grid so a width of 6 columns will split the main content and sidebar down the middle.', 'cleanyetibasic' ),
            'section' => 'layouts',
            'tab' => 'layout',
            'since' => '2.3.0',
            'default' => '4'
        )
    );
    return apply_filters( 'cleanyetibasic_get_option_parameters', $options );
}

/**
 * Get Clean Yeti Basic Theme Options
 * 
 * Array that holds all of the defined values
 * for Clean Yeti Basic Theme options. If the user 
 * has not specified a value for a given Theme 
 * option, then the option's default value is
 * used instead.
 *
 * @uses	cleanyetibasic_get_option_defaults()	defined in \functions\options.php
 * 
 * @uses	get_option()
 * @uses	wp_parse_args()
 * 
 * @return	array	$cleanyetibasic_options	current values for all Theme options
 */
function cleanyetibasic_get_options() {
	// Get the option defaults
	$option_defaults = cleanyetibasic_get_option_defaults();
	// Globalize the variable that holds the Theme options
	global $cleanyetibasic_options;
	// Parse the stored options with the defaults
	$cleanyetibasic_options = wp_parse_args( get_option( 'theme_cleanyetibasic_options', array() ), $option_defaults );
	// Return the parsed array
	return $cleanyetibasic_options;
}

/**
 * Separate settings by tab
 * 
 * Returns an array of tabs, each of
 * which is an indexed array of settings
 * included with the specified tab.
 *
 * @uses	cleanyetibasic_get_option_parameters()	defined in \functions\options.php
 * @uses	cleanyetibasic_get_settings_page_tabs()	defined in \functions\options.php
 * 
 * @return	array	$settingsbytab	array of arrays of settings by tab
 */
function cleanyetibasic_get_settings_by_tab() {
	// Get the list of settings page tabs
	$tabs = cleanyetibasic_get_settings_page_tabs();
	// Initialize an array to hold
	// an indexed array of tabnames
	$settingsbytab = array();
	// Loop through the array of tabs
	foreach ( $tabs as $tab ) {
		$tabname = $tab['name'];
		// Add an indexed array key
		// to the settings-by-tab 
		// array for each tab name
		$settingsbytab[] = $tabname;
	}
	// Get the array of option parameters
	$option_parameters = cleanyetibasic_get_option_parameters();
	// Loop through the option parameters
	// array
	foreach ( $option_parameters as $option_parameter ) {
		$optiontab = $option_parameter['tab'];
		$optionname = $option_parameter['name'];
		// Add an indexed array key to the 
		// settings-by-tab array for each
		// setting associated with each tab
		$settingsbytab[$optiontab][] = $optionname;
		$settingsbytab['all'][] = $optionname;
	}
	// Return the settings-by-tab
	// array
	return $settingsbytab;
}
 
/**
 * Clean Yeti Basic Theme Admin Settings Page Tabs
 * 
 * Array that holds all of the tabs for the
 * Clean Yeti Basic Theme Settings Page. Each tab
 * key holds an array that defines the 
 * sections for each tab, including the
 * description text.
 * 
 * @uses	cleanyetibasic_get_color_text()	defined in \functions\options-register.php
 * 
 * @return	array	$tabs	array of arrays of tab parameters
 */
function cleanyetibasic_get_settings_page_tabs() {
	
	$tabs = array(
        'general' => array(
			'name' => 'general',
			'title' => __( 'General', 'cleanyetibasic' ),
			'sections' => array(
				'info' => array(
				    'name' => 'info',
				    'title' => __( 'Thank You for using the Clean Yeti Basic Theme', 'cleanyetibasic' ),
				    'description' => cleanyetibasic_theme_info()
                ),
				'header' => array(
					'name' => 'header',
					'title' => __( 'Header Options', 'cleanyetibasic' ),
					'description' => __( 'Manage Header options for the Clean Yeti Basic Theme. Refer to the contextual help screen for descriptions and help regarding each theme option.', 'cleanyetibasic' )
				),
				'footer' => array(
					'name' => 'footer',
					'title' => __( 'Footer Options', 'cleanyetibasic' ),
					'description' => __( 'Manage Footer options for the Clean Yeti Basic Theme. Refer to the contextual help screen for descriptions and help regarding each theme option.', 'cleanyetibasic' )
				)
			)
		),
        'foundation_settings' => array(
			'name' => 'foundation_settings',
			'title' => __( 'Foundation Settings', 'cleanyetibasic' ),
			'sections' => array(
                'javascript' => array(
                    'name' => 'javascript',
                    'title' => __( 'Javascript Libraries', 'cleanyetibasic' ),
                    'description' => __( 'Choose which Foundation javascript libraries you would like to load.  If you decided to load all libraries, then it is recommended to use a plugin such as W3 total cache to increase page load speed.  Clean Yeti Basic loads the Accordion, Tabs, and Top Bar libraries by default, since these features are integrated into the theme.', 'cleanyetibasic' ),
                ),
			)
		),
        'layout' => array(
			'name' => 'layout',
			'title' => __( 'Layout', 'cleanyetibasic' ),
			'sections' => array(
				'layouts' => array(
					'name' => 'layouts',
					'title' => __( 'Content Arrangement', 'cleanyetibasic' ),
					'description' => __( 'Manage the layout and sizes of the main content and sidebar.', 'cleanyetibasic' )
				),
			)
		),
    );
	return apply_filters( 'cleanyetibasic_get_settings_page_tabs', $tabs );
}

function cleanyetibasic_theme_info() {
    $text = sprintf( __('Donating will ensure future support and updates to this theme.  Serene Themes also provides themes that include more features along with extended theme support at a reasonable cost.  Need help getting started? Serene Themes also offers Web Development services to help you get started with your website or provide improvements to your current site.  Find out more at %s.', 'cleanyetibasic' ), '<a href="http://www.serenethemes.com" title="Serene Themes">www.serenethemes.com</a>' );
    $text .= '<h3>' . __( 'Donate using PayPal', 'cleanyetibasic' ) . ':</h3>';
    $text .= '<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=YEC2X426PKBGA" class="button button-primary">' . __( 'Donate', 'cleanyetibasic' ) . '</a>';
    $text .= '<h3>' . __( 'Serene Themes also accepts Bitcoin and Litecoin donations', 'cleanyetibasic' ) . ':</h3>';
    $text .= '<a href="bitcoin:12tHYy7GqmrvmHLUk549VSuqKr6no1RXTY">BTC: 12tHYy7GqmrvmHLUk549VSuqKr6no1RXTY</a><br />';
    $text .= '<a href="litecoin:LcYa8MgjJwaP1edxn8qSLwQkMagj4H3P2r">LTC: LcYa8MgjJwaP1edxn8qSLwQkMagj4H3P2r</a>';
    return $text;
}

/**
 * Theme settings page notice
 */
function cleanyetibasic_admin_notices($hook_suffix) {
    global $cleanyetibasic_options;
    $cleanyetibasic_options = cleanyetibasic_get_options();
    $set_url = esc_url( admin_url( 'themes.php?page=cleanyetibasic-settings' ) );
    $page = ( isset( $_GET['page'] ) ? $_GET['page'] : '' );
    if( $page == 'cleanyetibasic-settings' || $cleanyetibasic_options['display_admin_notice'] == 0 ) {
    return;
    } else { ?>
    
    <div class="updated">
        <p><?php echo sprintf( __( 'Clean Yeti Basic has added more theme settings. <a href="%s">Customize Here</a>', 'cleanyetibasic'), $set_url ); ?></p>
    </div> <?php
    }
}
add_action( 'admin_notices', 'cleanyetibasic_admin_notices' );

function cleanyetibasic_old_options_update() {

	$old_options = array();
	$old_cpopt   = get_option( 'cleanyetibasic_copyright_option', 'notset' );
	$old_cptext  = get_option( 'cleanyetibasic_copyright_text',   'notset' );
	$old_credit  = get_option( 'cleanyetibasic_credit',           'notset' );

	if ( 'notset' !== $old_cpopt ) {
		delete_option( 'cleanyetibasic_copyright_option' );

		if ( 1 == $old_cpopt )
			$old_options['display_custom_copyright'] = 'true';
        }

	if ( 'notset' !== $old_cptext ) {
		$old_options['copyright_text'] = $old_cptext;

		delete_option( 'cleanyetibasic_copyright_text' );
	}

	if ( 'notset' !== $old_credit ) {
		delete_option( 'cleanyetibasic_credit' );

		if ( 1 == $old_credit )
			$old_options['display_footer_credit'] = 'true';
	}

	if ( !empty( $old_options ) )
		update_option( 'theme_cleanyetibasic_options', array_merge( cleanyetibasic_get_options(), $old_options ) );
}
?>