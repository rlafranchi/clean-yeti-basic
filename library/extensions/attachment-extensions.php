<?php
/**
 * Attachments Extensions
 *
 * Displays singular WordPress Media Library items.
 *
 * @package CleanyetibasicCoreLibrary
 * @subpackage Extensions
 *
 */

function cleanyetibasic_get_attachment_link( $id = 0, $size = 'thumbnail', $permalink = false, $icon = false, $text = false ) {
    $id = intval( $id );
	$_post = get_post( $id );


	if ( empty( $_post ) || ( 'attachment' != $_post->post_type ) || ! $url = wp_get_attachment_url( $_post->ID ) )
		return __( 'Missing Attachment', 'cleanyetibasic' );

	if ( $permalink )
		$url = get_attachment_link( $_post->ID );

	$post_title = esc_attr( $_post->post_title );

    $attr = array(
	    'class'	=> "attachment-$size th",
	    'alt'   => trim(strip_tags( get_post_meta($id, '_wp_attachment_image_alt', true) )),
    );

	if ( $text )
		$link_text = $text;
	elseif ( $size && 'none' != $size )
		$link_text = wp_get_attachment_image( $id, $size, $icon, $attr);
	else
		$link_text = '';

	if ( trim( $link_text ) == '' )
		$link_text = $_post->post_title;

	return apply_filters( 'cleanyetibasic_get_attachment_link', "<a href='#' title='$post_title' data-reveal-id='$id'>$link_text</a>", $id, $size, $permalink, $icon, $text );
}

function cleanyetibasic_attachment_gallery_data() {
    $post        = get_post();
    $id          = $post->ID;
    $id          = intval( $id );
    $posturl     = get_permalink();
    $attachments = get_children( array(
        'post_parent'    => $id,
        'post_status'    => 'inherit',
        'post_type'      => 'attachment',
        'post_mime_type' => 'image',
        'order'          => 'ASC',
        'orderby'        => 'menu_order ID'
        )
    );
    $indexarray  = array();
    if ( class_exists( 'Jetpack_Media_Summary' ) ) {
        $summary = Jetpack_Media_Summary::get( $post->ID );
        $images = $summary['images']; ?>
            <div class="small-12-cloumns"><ul class="small-block-grid-2 medium-block-grid-4">
                <li><a href="<?php echo $posturl; ?>"><img src="<?php echo $images[0]['url']; ?>" alt="<?php the_title(); ?>" class="th" /></a></li>
                <li><a href="<?php echo $posturl; ?>"><img src="<?php echo $images[1]['url']; ?>" alt="<?php the_title(); ?>" class="th" /></a></li>
                <li><a href="<?php echo $posturl; ?>"><img src="<?php echo $images[2]['url']; ?>" alt="<?php the_title(); ?>" class="th" /></a></li>
                <li><a href="<?php echo $posturl; ?>"><img src="<?php echo $images[3]['url']; ?>" alt="<?php the_title(); ?>" class="th" /></a></li>
            </ul></div> <?php
    } else {

        foreach( $attachments as $id => $attachment) {
            array_push( $indexarray, $id);
        } ?>
                <div class="small-12 columns">
                    <ul class="small-block-grid-2 medium-block-grid-4">
        <?php $i = 0;
        while ( $i <= 3 ) {
            $imageid   = $indexarray[ $i ];
            $imagepost = get_post( $imageid );
            $imgurl    = wp_get_attachment_url( $imageid );
            $imgalt    = trim(strip_tags( get_post_meta($imageid, '_wp_attachment_image_alt', true) ));

            if ( false !== $imgurl ): ?>
                        <li><a href="<?php echo $posturl;?>"><img src="<?php echo $imgurl; ?>" alt="<?php echo $imgalt; ?>"class="th" /></a></li>
            <?php
            endif;
            $i++;
        } ?>
                    </ul>
                </div> <?php
    }
}

function cleanyetibasic_image_attachments() {
    $post = get_post();

    // Get the all post content in a variable
    $posttext  = $post->post_content;
    $posttext1 = $post->post_content;

    // We will search for the src="" in the post content
    $regular_expression  = '~src="[^"]*"~';
    $regular_expression1 = '~<img [^\>]*\ />~';

    // WE will grab all the images from the post in an array $allpics using preg_match_all
    preg_match_all( $regular_expression, $posttext, $allpics );

    // Count the number of images found.
    $NumberOfPics = count($allpics[0]);

    // This time we replace/remove the images from the content
    $only_post_text = preg_replace( $regular_expression1, '' , $posttext1);
    $str1=$allpics[0][0];
    $str1=trim($str1);
    $len=strlen($str1);
    $imgpath=substr_replace(substr($str1, 5, $len), "", -1);
        if ( $NumberOfPics > 0 ) { ?>
                <div class="medium-4 columns">
                    <a href='<?php echo get_permalink(); ?>'><img src='<?php echo $imgpath;?>' alt='<?php echo $post->post_title; ?>'/></a>
                </div>
                <div class="medium-8 columns">
                    <?php the_excerpt(); ?>
                </div>
                    <?php
                } else { ?>
                <div class="small-12 columns">
                    <?php the_excerpt(); ?>
                </div>
            <?php }
}

function  cleanyetibasic_get_domain($url) {
    $pieces = parse_url($url);
    $domain = isset($pieces['host']) ? $pieces['host'] : '';

    if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)) {
        return $regs['domain'];
    } else {
        return false;
    }
}

function cleanyetibasic_return_domain() {
    $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
    $videopost = get_post();
    $videotext = apply_filters ("the_content", $videopost->post_content);
    preg_match($reg_exUrl, $videotext, $url);
    $domain = cleanyetibasic_get_domain( $url[0] );
    return $domain;
}

function cleanyetibasic_get_first_video() {
    $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
    $videopost = get_post();
    $videotext = apply_filters ("the_content", $videopost->post_content);
    preg_match($reg_exUrl, $videotext, $url);
    $domain = cleanyetibasic_get_domain( $url[0] );

    if ( $domain == 'youtube.com' || $domain == 'vimeo.com' || $domain == 'hulu.com' ) {
        $content = '<div class="panel radius"><div class="flex-video"><iframe width="540" height="312" src="' . $url[0] . ' frameborder="0" scrolling="no" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div></div>' . "\n";
    } elseif ( $domain == 'wordpress.com' ) {
        $content = '<div class="panel radius"><div class="flex-video"><embed src="' . $url[0] . ' type="application/x-shockwave-flash" width="540" height="312" allowscriptaccess="always" allowfullscreen="true" wmode="transparent"></div></div>' . "\n";
    } else {
        $content  = '<h3 class="subheader">' . __( 'Add a Video to The Post!', 'cleanyetibasic') . '</h3>' . "\n";
        $content .= '<p>' . __( 'Just paste the url of the video on a separate line to display the video.  Hulu, Youtube, Vimeo, and WordPressTV videos are currently supported.', 'cleanyetibasic' ) . '</p>' . "\n";
    }
    return $content;
}

function cleanyetibasic_insert_featured_image() {
	global $post;
	$id = get_post_thumbnail_id($post->ID);
	$attr = array (
		'class' => 'alignright th',
        'alt'   => trim(strip_tags( get_post_meta($id, '_wp_attachment_image_alt', true) ))
	);
	$large_image_url = wp_get_attachment_url( $id );
	if ( has_post_thumbnail() ) {
		echo '<a href="' . $large_image_url . '" title="' . the_title_attribute('echo=0') . '" >';
		echo get_the_post_thumbnail( $post->ID, 'medium', $attr );
		echo '</a>';
	}
}

add_filter('embed_oembed_html', 'cleanyetibasic_embed_oembed_html', 99, 4);
function cleanyetibasic_embed_oembed_html($html, $url, $attr, $post_id) {
  return '<div class="panel radius"><div class="flex-video">' . $html . '</div></div>';
}
?>