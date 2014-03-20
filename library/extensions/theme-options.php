<?php
/**
 * Theme Options Page and Settings
 *
 * @package CleanyetibasicCoreLibrary
 * @subpackage ThemeOptions
 *
 */

// create custom plugin settings menu
add_action('admin_menu', 'cleanyetibasic_create_menu');

function cleanyetibasic_create_menu() {

	//create new top-level menu
	add_theme_page( __( 'Clean Yeti Basic Theme Settings', 'cleanyetibasic' ), __( 'Theme Settings', 'cleanyetibasic' ), 'administrator', __FILE__, 'cleanyetibasic_settings_page' );

	//call register settings function
	add_action( 'admin_init', 'register_mysettings' );
}


function register_mysettings() {
	//register our settings
	register_setting( 'cleanyetibasic-settings-group', 'cleanyetibasic_copyright_option' );
	register_setting( 'cleanyetibasic-settings-group', 'cleanyetibasic_copyright_text' );
	register_setting( 'cleanyetibasic-settings-group', 'cleanyetibasic_credit' );

}

function cleanyetibasic_settings_page() {
?>
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
    <?php settings_fields( 'cleanyetibasic-settings-group' ); ?>
    <?php do_settings_sections( 'cleanyetibasic-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row"><?php _e( 'Display Credits', 'cleanyetibasic' ); ?>?</th>
        <td>
            <input type="checkbox" id="cleanyetibasic_credit" name="cleanyetibasic_credit" value="1" <?php echo checked(1, get_option('cleanyetibasic_credit'), true); ?> />
        </td>
        </tr>
        
        <tr valign="top">
        <th scope="row"><?php _e( 'Display Custom Copyright Text', 'cleanyetibasic' ); ?>?</th>
        <td><input type="checkbox" id="cleanyetibasic_copyright_option" name="cleanyetibasic_copyright_option" value="1" <?php echo checked(1, get_option('cleanyetibasic_copyright_option'), false); ?> /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row"><?php _e( 'Copyright Text', 'cleanyetibasic' ); ?></th>
        <td>
            <input type="text" name="cleanyetibasic_copyright_text" value="<?php if ( get_option('cleanyetibasic_copyright_text') != '') { echo get_option('cleanyetibasic_copyright_text'); } else { echo '&copy;'; } ?>" />
        </td>
        </tr>
        
    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php
}

/**
 * Filter for custom copyright text
 *
 *
 */
function cleanyetibasic_copyright_filter($output) {
    $output = get_option('cleanyetibasic_copyright_text');
    return $output;
}
if ( get_option('cleanyetibasic_copyright_option') == 1 )
    add_filter('cleanyetibasic_copyright', 'cleanyetibasic_copyright_filter', 1);


function cleanyetibasic_credits() {
    ?>
    <div class="row">
        <div class="medium-12 columns text-center" id="footer-credits">
            <p><?php _e( 'Powered by', 'cleanyetibasic' ); ?>: <a href="http://wordpress.org" title="WordPress">WordPress</a> <?php _e( 'Themed by', 'cleanyetibasic' ); ?>: <a href="http://www.serenethemes.com" title="Serene Themes"><?php _e( 'Serene Themes', 'cleanyetibasic' ); ?></a></p>
        </div>
    </div>
    <?php
}
if ( get_option('cleanyetibasic_credit') == 1 )
    add_action( 'cleanyetibasic_footer', 'cleanyetibasic_credits', 999 );
?>