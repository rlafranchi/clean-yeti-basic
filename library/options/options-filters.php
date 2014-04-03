<?php
/**
 *
 * Filters to render content based on options
 *
 */

// filter copyright option
function cleanyetibasic_copyright_filter( $output ) {
    global $cleanyetibasic_options;
    $cleanyetibasic_options = cleanyetibasic_get_options();
    if ( 'true' == $cleanyetibasic_options['display_custom_copyright'] ) {
        $output = $cleanyetibasic_options['copyright_text'];
        return $output;
    } elseif ( 'default' == $cleanyetibasic_options['display_custom_copyright'] ) {
        return $output;
    } else {
        $output = '';
        return $output;
    }
}
add_filter('cleanyetibasic_copyright', 'cleanyetibasic_copyright_filter' );

// credit action
function cleanyetibasic_credits() {
    global $cleanyetibasic_options;
    $cleanyetibasic_options = cleanyetibasic_get_options();
    if ( 'true' == $cleanyetibasic_options['display_footer_credit'] ) :
    ?>
    <div class="row">
        <div class="medium-12 columns text-center" id="footer-credits">
            <p><?php _e( 'Powered by', 'cleanyetibasic' ); ?>: <a href="http://wordpress.org" rel="generator" title="WordPress">WordPress</a> <?php _e( 'Themed by', 'cleanyetibasic' ); ?>: <a href="http://www.serenethemes.com" title="Serene Themes"><?php _e( 'Serene Themes', 'cleanyetibasic' ); ?></a></p>
        </div>
    </div>
    <?php
    endif;
}
add_action( 'cleanyetibasic_footer', 'cleanyetibasic_credits', 999 );
?>