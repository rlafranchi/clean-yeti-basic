<?php
/**
 * Clean Yeti Basic Options Theme Customizer Integration
 *
 * This file integrates the Theme Customizer
 * for the Clean Yeti Basic Theme.
 * 
 * @package 	Clean Yeti Basic
 * @copyright	Copyright (c) 2014, Serene Themes
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, v2 (or newer)
 *
 * @since 		Clean Yeti Basic 2.3.0
 */

/**
 * Clean Yeti Basic Theme Settings Theme Customizer Implementation
 *
 * Implement the Theme Customizer for the 
 * Clean Yeti Basic Theme Settings.
 * 
 * @param 	object	$wp_customize	Object that holds the customizer data
 * 
 * @link	http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/	Otto
 */
function cleanyetibasic_register_theme_customizer( $wp_customize ){

	// Failsafe is safe
	if ( ! isset( $wp_customize ) ) {
		return;
	}

	global $cleanyetibasic_options;
	$cleanyetibasic_options = cleanyetibasic_get_options();

	// Get the array of option parameters
	$option_parameters = cleanyetibasic_get_option_parameters();
	// Get list of tabs
	$tabs = cleanyetibasic_get_settings_page_tabs();

	// Add Sections
	foreach ( $tabs as $tab ) {
		// Add $tab section
		$wp_customize->add_section( 'cleanyetibasic_' . $tab['name'], array(
			'title'		=> $tab['title'],
		) );
	}

	// Add Settings
	foreach ( $option_parameters as $option_parameter ) {
		// sanitize callback based on type
		if ( 'text' == $option_parameter['type'] )
		    $sanitize = 'cleanyetibasic_sanitize_text';
        else if ( 'checkbox' == $option_parameter['type'] )
            $sanitize = 'cleanyetibasic_sanitize_checkbox';
        else if ( 'radio' == $option_parameter['type'] || 'select' == $option_parameter['type'] )
            $sanitize = 'cleanyetibasic_sanitize_choices';
        else if ( 'color-picker' == $option_parameter['type'] )
            $sanitize = 'sanitize_hex_color';
		
		// Add $option_parameter setting
		$wp_customize->add_setting( 'theme_cleanyetibasic_options[' . $option_parameter['name'] . ']', array(
			'default'        => $option_parameter['default'],
			'type'           => 'option',
			'sanitize_callback' => $sanitize
		) );

		// Add $option_parameter control
		if ( 'text' == $option_parameter['type'] ) {
			$wp_customize->add_control( 'cleanyetibasic_' . $option_parameter['name'], array(
				'label'   => $option_parameter['title'],
				'section' => 'cleanyetibasic_' . $option_parameter['tab'],
				'settings'   => 'theme_cleanyetibasic_options['. $option_parameter['name'] . ']',
				'type'    => 'text',
			) );

		} else if ( 'checkbox' == $option_parameter['type'] ) {
			$wp_customize->add_control( 'cleanyetibasic_' . $option_parameter['name'], array(
				'label'   => $option_parameter['title'],
				'section' => 'cleanyetibasic_' . $option_parameter['tab'],
				'settings'   => 'theme_cleanyetibasic_options['. $option_parameter['name'] . ']',
				'type'    => 'checkbox',
			) );

		} else if ( 'radio' == $option_parameter['type'] ) {
			$valid_options = array();
			foreach ( $option_parameter['valid_options'] as $valid_option ) {
				$valid_options[$valid_option['name']] = $valid_option['title'];
			}
			$wp_customize->add_control( 'cleanyetibasic_' . $option_parameter['name'], array(
				'label'   => $option_parameter['title'],
				'section' => 'cleanyetibasic_' . $option_parameter['tab'],
				'settings'   => 'theme_cleanyetibasic_options['. $option_parameter['name'] . ']',
				'type'    => 'radio',
				'choices'    => $valid_options,
			) );

		} else if ( 'select' == $option_parameter['type'] ) {
			$valid_options = array();
			foreach ( $option_parameter['valid_options'] as $valid_option ) {
				$valid_options[$valid_option['name']] = $valid_option['title'];
			}
			$wp_customize->add_control( 'cleanyetibasic_' . $option_parameter['name'], array(
				'label'   => $option_parameter['title'],
				'section' => 'cleanyetibasic_' . $option_parameter['tab'],
				'settings'   => 'theme_cleanyetibasic_options['. $option_parameter['name'] . ']',
				'type'    => 'select',
				'choices'    => $valid_options,
			) );
		} else if ( 'color-picker' == $option_parameter['type'] ) {
            $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cleanyetibasic_' . $option_parameter['name'], array(
		        'label'      => $option_parameter['title'],
		        'section'    => 'cleanyetibasic_' . $option_parameter['tab'],
                'settings'   => 'theme_cleanyetibasic_options['. $option_parameter['name'] . ']',
	        ) ) );
        } else if ( 'custom' == $option_parameter['type'] ) {
			$valid_options = array();
			foreach ( $option_parameter['valid_options'] as $valid_option ) {
				$valid_options[$valid_option['name']] = $valid_option['title'];
			}
			$wp_customize->add_control( 'cleanyetibasic_' . $option_parameter['name'], array(
				'label'   => $option_parameter['title'],
				'section' => 'cleanyetibasic_' . $option_parameter['tab'],
				'settings'   => 'theme_cleanyetibasic_options['. $option_parameter['name'] . ']',
				'type'    => 'select',
				'choices'    => $valid_options,
			) );
		}
	}
}
// Settings API options initilization and validation
add_action( 'customize_register', 'cleanyetibasic_register_theme_customizer' );

/**
 * Theme customizer sanitize callback for text fields
 */

function cleanyetibasic_sanitize_text( $input ) {
    return wp_filter_nohtml_kses( $input );
}

/**
 * Theme customizer sanitize callback for checkbox fields
 */
function cleanyetibasic_sanitize_checkbox( $input ) {
    $input = ( ( isset( $input ) && true == $input ) ? true : false );
    return $input;
}

/**
 * Sanitize select and radio fields
 * @link http://cachingandburning.com/wordpress-theme-customizer-sanitizing-radio-buttons-and-select-lists/
 *
 */
function cleanyetibasic_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $name = preg_replace('/theme_cleanyetibasic_options\[(.*)\]/', '$1', $setting->id);
    $control = $wp_customize->get_control( 'cleanyetibasic_' . $name );
    $choices = $control->choices;

    if ( array_key_exists( $input, $choices ) ) {
        return $input;      
    } else {
        return $setting->default;
    }
}
?>