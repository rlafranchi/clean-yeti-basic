<?php
/**
 * Theme Options Page and Settings
 *
 * @package CleanyetibasicCoreLibrary
 * @subpackage ThemeOptions
 *
 */
global $cyb_menu_hook;
global $cyb_options;
$cyb_crtext = cleanyetibasic_copyright();
$cyb_options = array(
    'primary_color' => '#2ba6cb',
    'secondary_color' => '#e9e9e9',
    'alert_color' => '#c60f13',
    'success_color' => '#5da423',
    'credits' => true,
    'copyright_option' => false,
    'copyright_text' => $cyb_crtext,
);

/**
 * Theme settings page notice
 */
 
function cleanyetibasic_admin_notices($hook_suffix) {
    $page = isset($_GET['page']) ? $_GET['page'] : ''; //isset($_GET['message']) ? $_GET['message'] : '';
    if( $page == 'cleanyetibasic-theme-settings' ) {
    return;
    } else { ?>
    
    <div class="updated">
        <p><?php echo sprintf( __( 'Clean Yeti Basic has added more theme settings. <a href="%s">Customize Here</a>', 'cleanyetibasic'), menu_page_url( 'cleanyetibasic-theme-settings', false ) ); ?></p>
    </div> <?php
    }
}
add_action( 'admin_notices', 'cleanyetibasic_admin_notices' );


/**
 * Function that compiles css file on first run as well as on theme update and activation
 */
 
function cleanyetibasic_first_run() {
    global $cyb_options, $pagenow;
    $cyb_settings = get_option('cyb_options', $cyb_options);
    $check = isset($cyb_settings['check']) ? $cyb_settings['check'] : false;  //isset($_GET['message']) ? $_GET['message'] : '';
    
    // check if old options were set
    $old_cpopt = get_option( 'cleanyetibasic_copyright_option', false );
	$old_cptext = get_option( 'cleanyetibasic_copyright_text', false );
	$old_credit = get_option( 'cleanyetibasic_credit', false );
    //if ( isset($old_cpopt) ) {
    //    echo 'old_cpopt';
    //    $cyb_settings['copyright_option'] = $old_cpopt;
    //    update_option( 'cyb_options', $cyb_settings );
    //    delete_option( 'cleanyetibasic_copyright_option' );
    //}
    //if ( isset($old_cptext) ) {
    //    echo $old_cptext;
    //    $cyb_settings['copyright_text'] = $old_cptext;
    //    update_option( 'cyb_options', $cyb_settings );
    //    delete_option( 'cleanyetibasic_copyright_text' );
    //}
    //if ( isset($old_credit) ) {
    //    echo $old_credit;
    //    $cyb_settings['credit'] = $old_credit;
    //    update_option( 'cyb_options', $cyb_settings );
    //    delete_option( 'cleanyetibasic_credit' );
    //}
    if ( $check == false ) {
        echo '<br />check is false';
        cleanyetibasic_scss_compile();
        $cyb_settings['check'] = 1;
        update_option( 'cyb_options', $cyb_settings );
    } elseif ( ( isset( $_GET['action'] ) && 'do_theme_upgrade' == $_GET['action'] ) || ( isset( $_GET['activated'] ) && 'themes.php' == $pagenow ) ) {
	    echo '<br />theme update or activated';
	    cleanyetibasic_scss_compile();
    }
}
add_action('init', 'cleanyetibasic_first_run');

/**
 * deletes options on theme switch
 */
function cleanyetibasic_switch_theme() {
    delete_option( 'cyb_options' );
}
add_action ( 'switch_theme', 'cleanyetibasic_switch_theme' );

function cleanyetibasic_create_menu() {
    global $cyb_menu_hook;

	$cyb_menu_hook = add_theme_page( __( 'Clean Yeti Basic Theme Settings', 'cleanyetibasic' ), __( 'Theme Settings', 'cleanyetibasic' ), 'edit_theme_options', 'cleanyetibasic-theme-settings', 'cleanyetibasic_settings_page' );

	add_action( 'admin_init', 'cleanyetibasic_register_settings' );
	add_action( 'admin_enqueue_scripts', 'cleanyetibasic_enqueue_settings_scripts');
}
add_action('admin_menu', 'cleanyetibasic_create_menu');

function cleanyetibasic_validate_options( $input ) {
    global $cyb_options;
    $settings = get_option( 'cyb_options', $cyb_options );
    
    $input['copyright_text'] = wp_filter_nohtml_kses( $input['copyright_text'] );

    if ( ! isset( $input['credits'] ) )
    $input['credits'] = null;
    $input['credits'] = ( $input['credits'] == 1 ? 1 : 0 );
    
    if ( ! isset( $input['copyright_option'] ) )
    $input['copyright_option'] = null;
    $input['copyright_option'] = ( $input['copyright_option'] == 1 ? 1 : 0 );
    
    return $input;
}


function cleanyetibasic_enqueue_settings_scripts($hook_suffix) {
    global $cyb_menu_hook;
    if ($hook_suffix != $cyb_menu_hook) return;
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'cleanyetibasic-color-picker', get_template_directory_uri() . '/library/Foundation/js/color-picker.js', array( 'wp-color-picker' ), false, true );
    //cleanyetibasic_head_scripts();
    //cleanyetibasic_create_stylesheet();
}


function cleanyetibasic_register_settings() {
	//register our settings
	register_setting( 'cleanyetibasic-theme-options', 'cyb_options', 'cleanyetibasic_validate_options' ); //'cleanyetibasic_validate_options'
	
	// compile foundation settings options accordingly on theme activation or update
}

function cleanyetibasic_settings_page() {
print_r($_POST['reset']);
echo '<br />';
print_r($_POST['submit']);
global $cyb_options; ?>


<?php if( isset( $_GET['settings-updated'] ) && isset( $_POST['submit'] ) )  : ?>
<div class="updated"><p><strong>
<?php _e( 'Options saved' ); ?>
</strong></p></div>
<?php
cleanyetibasic_scss_compile();
elseif ( isset( $_POST['reset'] ) ) : ?>
<div class="updated"><p><strong>
<?php _e( 'Defaults Reset' ); ?>
</strong></p></div>
<?php
update_option( 'cyb_options', $cyb_options );
endif; // If the form has just been submitted, this shows the notification ?>
<div class="wrap">


<h3><?php _e( 'Happy with this Theme', 'cleanyetibasic' ); ?>?</h3>
<p><?php printf( __('Donating will ensure future support and updates to this theme.  Serene Themes also provides themes that include more features along with extended theme support at a reasonable cost.  Need help getting started? Serene Themes also offers Web Development services to help you get started with your website or provide improvements to your current site.  Find out more at %s.', 'cleanyetibasic' ), '<a href="http://www.serenethemes.com" title="Serene Themes">www.serenethemes.com</a>' ); ?></p>
<h3><?php _e( 'Donate using PayPal', 'cleanyetibasic' ); ?>:</h3>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
    <input type="hidden" name="cmd" value="_s-xclick">
    <input type="hidden" name="hosted_button_id" value="YEC2X426PKBGA">
    <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
    <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

<h3><?php _e( 'Serene Themes also accepts Bitcoin and Litecoin donations', 'cleanyetibasic' ); ?>:</h3>
<a href="bitcoin:12tHYy7GqmrvmHLUk549VSuqKr6no1RXTY">BTC: 12tHYy7GqmrvmHLUk549VSuqKr6no1RXTY</a><br />
<a href="litecoin:LcYa8MgjJwaP1edxn8qSLwQkMagj4H3P2r">LTC: LcYa8MgjJwaP1edxn8qSLwQkMagj4H3P2r</a>

<h2><?php _e( 'Clean Yeti Basic Theme Options', 'cleanyetibasic' ); ?></h2>
<form method="post" action="options.php">
    <?php settings_fields( 'cleanyetibasic-theme-options' ); ?>
    <?php do_settings_sections( 'cleanyetibasic-theme-options' ); ?>
    <?php $cyb_settings = get_option( 'cyb_options', $cyb_options ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row"><label for="cyb_credits"><?php _e( 'Display Credits', 'cleanyetibasic' ); ?>?</label></th>
        <td>
            <input type="checkbox" id="cyb_credits" name="cyb_options[credits]" value="1" <?php checked( true, $cyb_settings['credits'] ); ?> />
        </td>
        </tr>
        
        <tr valign="top">
        <th scope="row"><label for="cyb_copyright"><?php _e( 'Display Custom Copyright Text', 'cleanyetibasic' ); ?>?</label></th>
        <td><input type="checkbox" id="cyb_copyright" name="cyb_options[copyright_option]" value="1" <?php checked( true, $cyb_settings['copyright_option'] ); ?> /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row"><label for="cyb_copytext"><?php _e( 'Copyright Text', 'cleanyetibasic' ); ?></label></th>
        <td>
            <input type="text" id="cyb_copytext" name="cyb_options[copyright_text]" value="<?php esc_attr_e($cyb_settings['copyright_text']); ?>" />
        </td>
        </tr>
        
        
        <tr valign="top">
        <h3><?php _e('Foundation Settings', 'cleanyetibasic'); ?></h3>
        <th scope="row"><label for="cyb_primary"><?php _e( 'Primary color', 'cleanyetibasic' ); ?></label></th>
        <td>
            <input type="text" id="cyb_primary" class="cyb-color-field" name="cyb_options[primary_color]" value="<?php esc_attr_e($cyb_settings['primary_color']); ?>" />
        </td>
        </tr>
        
    </table>
    
    <?php submit_button();
    submit_button( 'Reset to Defaults', 'secondary', 'reset' ); ?>

</form>

</div>
<?php
}


$cyb_settings = get_option( 'cyb_options', $cyb_options );

// filter copyright option
function cleanyetibasic_copyright_filter($output) {
    global $cyb_options;
    $cyb_settings = get_option( 'cyb_options', $cyb_options );
    $output =$cyb_settings['copyright_text'];
    return $output;
}
if ( isset( $cyb_settings['copyright_option'] ) )
    add_filter('cleanyetibasic_copyright', 'cleanyetibasic_copyright_filter', 1);

// credit action
function cleanyetibasic_credits() {
    ?>
    <div class="row">
        <div class="medium-12 columns text-center" id="footer-credits">
            <p><?php _e( 'Powered by', 'cleanyetibasic' ); ?>: <a href="http://wordpress.org" title="WordPress">WordPress</a> <?php _e( 'Themed by', 'cleanyetibasic' ); ?>: <a href="http://www.serenethemes.com" title="Serene Themes"><?php _e( 'Serene Themes', 'cleanyetibasic' ); ?></a></p>
        </div>
    </div>
    <?php
}
if ( isset( $cyb_settings['credits'] ) )
    add_action( 'cleanyetibasic_footer', 'cleanyetibasic_credits', 999 );
?>