<?php
/**
 * Script that compiles css file based on user settings and Foundation framework
 *
 */
function cleanyetibasic_scss_compile( $preview ) {
    $scsspath = get_stylesheet_directory() . '/library/Foundation/scss/';
    $csspath = get_stylesheet_directory() . '/library/Foundation/css/';

    ob_start();
    require( $scsspath . 'settings.php');
    $scss = ob_get_clean();
    file_put_contents( $scsspath . '_cleanyetibasic.scss', $scss, LOCK_EX);

    require_once( $scsspath . 'scss.inc.php');

    $scss = new scssc();
    $scss->setImportPaths( $scsspath );
    $scss->setFormatter("scss_formatter");

    $css = $scss->compile('
      @import "cleanyetibasic-app.scss"
    ');

    if ( true == $preview ) {
        $preview = 'preview';
    } else {
        $preview = '';
    }
    file_put_contents( $csspath . 'cleanyetibasic' . $preview . '.css', $css, LOCK_EX);
    return;
}
function cleanyetibasic_scss_compile_save() {
    cleanyetibasic_scss_compile( false );
}
if ( isset( $_GET['settings-updated'] ) && isset( $_GET['page'] ) && $_GET['page'] == 'cleanyetibasic-settings' )
    add_action( 'admin_init', 'cleanyetibasic_scss_compile_save' );


function cleanyetibasic_scss_compile_preview() {
        cleanyetibasic_scss_compile( true );
    // add option that customize.php has been viewed recently
    $option = get_option( 'theme_cleanyetibasic_customize', true );
    update_option( 'theme_cleanyetibasic_customize', true );
    return;
}
add_action( 'customize_preview_init', 'cleanyetibasic_scss_compile_preview', 1 );

// failsafe incase settings were saved in customize.php
function cleanyetibasic_scss_compile_wp_head() {
    global $wp_customize, $pagenow;
    $option = get_option( 'theme_cleanyetibasic_customize', true );
    if ( true == $option && ! is_admin() ) {
        cleanyetibasic_scss_compile_save();
        $option = false;
        update_option( 'theme_cleanyetibasic_customize', $option );
    }
}
add_action( 'init', 'cleanyetibasic_scss_compile_wp_head' );
?>