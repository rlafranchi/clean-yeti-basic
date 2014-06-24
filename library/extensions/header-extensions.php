<?php
/**
 * Header Extensions
 *
 * @package cleanyetibasicCoreLibrary
 * @subpackage HeaderExtensions
 *
 *
 * Display the DOCTYPE
 * 
 * Filter: cleanyetibasic_create_doctype
 */

function cleanyetibasic_create_doctype() {
?>
<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" <?php language_attributes();?> > <![endif]-->
<html class="no-js" <?php language_attributes();?> >
<?php
}


/**
 * Display the HEAD profile
 * 
 * Filter: cleanyetibasic_head_profile
 */
function cleanyetibasic_head_profile() {
    $content = '<head>' . "\n";
    echo apply_filters('cleanyetibasic_head_profile', $content );
}


/**
 * Display the META content-type
 * 
 * Filter: cleanyetibasic_create_contenttype
 */
function cleanyetibasic_create_contenttype() {
    $content = "<meta http-equiv=\"Content-Type\" content=\"";
    $content .= get_bloginfo('html_type'); 
    $content .= "; charset=";
    $content .= get_bloginfo('charset');
    $content .= "\" />";
    $content .= "\n";
    $content .="<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\" />";
    $content .= "\n";
    echo apply_filters('cleanyetibasic_create_contenttype', $content);
}

if ( function_exists('childtheme_override_doctitle') )  {
	/**
	 * @ignore
	 */
	 function cleanyetibasic_doctitle() {
    	childtheme_override_doctitle();
    }
} else {
	/**
	 * Display the content of the title tag
	 * 
	 * Override: childtheme_override_doctitle
	 * Filter: cleanyetibasic_doctitle_separator
	 *
	 */
	function cleanyetibasic_doctitle() {
        $separator = apply_filters('cleanyetibasic_doctitle_separator', '|');
        $doctitle = '<title>' . wp_title( $separator, false, 'right' ) . '</title>' . "\n";
        echo $doctitle;
	}
}

/**
 * Display links to RSS feed
 * 
 * This can be switched on or off using cleanyetibasic_show_rss. Default: ON
 * 
 * Filter: cleanyetibasic_show_rss
 * Filter: cleanyetibasic_rss
 */
function cleanyetibasic_show_rss() {
    $display = TRUE;
    $display = apply_filters('cleanyetibasic_show_rss', $display);
    if ($display) {
        $content = '<link rel="alternate" type="application/rss+xml" href="';
        $content .= get_feed_link( get_default_feed() );
        $content .= '" title="';
        $content .= esc_attr( get_bloginfo('name', 'display') );
        $content .= ' ' . __('Posts RSS feed', 'cleanyetibasic');
        $content .= '" />';
        $content .= "\n";
        echo apply_filters('cleanyetibasic_rss', $content);
    }
}

/**
 * Display pingback link
 * 
 * This can be switched on or off using cleanyetibasic_show_pingback. Default: ON
 * 
 * Filter: cleanyetibasic_show_pingback
 * Filter: cleanyetibasic_pingback_url
 */
function cleanyetibasic_show_pingback() {
    $display = TRUE;
    $display = apply_filters('cleanyetibasic_show_pingback', $display);
    if ($display) {
        $content = '<link rel="pingback" href="';
        $content .= get_bloginfo('pingback_url');
        $content .= '" />';
        $content .= "\n";
        echo apply_filters('cleanyetibasic_pingback_url',$content);
    }
}

/**
 * Add the default stylesheet to the head of the document.
 * 
 * Register and enqueue cleanyetibasic style.css
 * 
 *
 * Register Ubuntu font 
 * Ubuntu Font: http://font.ubuntu.com
 * Copyright: 2013 Canonical ltd.
 * License: http://font.ubuntu.com/ufl/ubuntu-font-licence-1.0.txt
 *
 * Register Foundation Style
 * Foundation Styles and Scripts bundle:
 * Foundation 5: http://foundation.zurb.com
 * Copyright: 2013 ZURB
 * License: MIT http://www.opensource.org/licenses/mit-license.php
 */



function cleanyetibasic_create_stylesheet() {
	wp_register_style( 'cleanyetibasic-ubuntu', 'http://fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,700,700italic|Ubuntu+Mono' );
    wp_enqueue_style( 'cleanyetibasic-foundation', get_template_directory_uri() . '/library/Foundation/css/cleanyetibasic.css' );
	wp_enqueue_style( 'cleanyetibasic-postformaticons', get_template_directory_uri() . '/library/Foundation/icons/postformaticons.css');
	wp_enqueue_style( 'cleanyetibasic-style', get_stylesheet_uri(), array( 'cleanyetibasic-ubuntu', 'cleanyetibasic-foundation', 'cleanyetibasic-postformaticons' ) );

}

add_action('wp_enqueue_scripts','cleanyetibasic_create_stylesheet');

if ( function_exists('childtheme_override_head_scripts') )  {
    /**
     * @ignore
     */
    function cleanyetibasic_head_scripts() {
    	childtheme_override_head_scripts();
    }
} else {
    /**
     *
     * Child themes should use wp_dequeue_scripts to remove individual scripts.
     * Larger changes can be made using the override.
     *
     * Override: childtheme_override_head_scripts <br>
     *
     * @since 1.0
     */
    function cleanyetibasic_head_scripts() {
        global $cleanyetibasic_options;
        $cleanyetibasic_options = cleanyetibasic_get_options();
        $option_parameters = cleanyetibasic_get_option_parameters();

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
			has_filter( 'cleanyetibasic_show_commentreply' ) ? cleanyetibasic_show_commentreply() : wp_enqueue_script( 'comment-reply' );

		wp_enqueue_script( 'cleanyetibasic-modernizr-js', get_template_directory_uri() . '/library/Foundation/js/modernizr.js', array( 'jquery' ), '2.8.2' );
		wp_enqueue_script( 'cleanyetibasic-foundation-js', get_template_directory_uri() . '/library/Foundation/js/foundation/foundation.js', array(), '5.3.0', true );
        wp_enqueue_script( 'cleanyetibasic-foundation-accordion-js', get_template_directory_uri() . '/library/Foundation/js/foundation/foundation.accordion.js', array(), '5.3.0', true );
        wp_enqueue_script( 'cleanyetibasic-foundation-tabs-js', get_template_directory_uri() . '/library/Foundation/js/foundation/foundation.tab.js', array(), '5.3.0', true );
        wp_enqueue_script( 'cleanyetibasic-foundation-topbar-js', get_template_directory_uri() . '/library/Foundation/js/foundation/foundation.topbar.js', array(), '5.3.0', true );
        foreach ( $option_parameters as $option_parameter ) {
            $section = $option_parameter['section'];
            $name = $option_parameter['name'];
            if ( 'javascript' == $section && isset( $cleanyetibasic_options[$name] ) && 1 == $cleanyetibasic_options[$name] ) {
                wp_enqueue_script( 'cleanyetibasic-foundation-' . $name . '-js', get_template_directory_uri() . '/library/Foundation/js/foundation/foundation.' . $name . '.js', array(), '5.3.0', true );
            }
        }
        wp_enqueue_script( 'cleanyetibasic-document-js', get_template_directory_uri() . '/library/Foundation/js/document.js', array () , '5.3.0', true );
	}
}

add_action('wp_enqueue_scripts','cleanyetibasic_head_scripts');


/**
 * Return the default arguments for wp_page_menu()
 *
 * This is used as fallback when the user has not created a custom nav menu in wordpress admin
 * 
 * Filter: cleanyetibasic_page_menu_args
 *
 * @return array
 */
function cleanyetibasic_page_menu_args() {
	$args = array (
		'sort_column' => 'menu_order',
		'menu_class'  => 'menu',
		'include'     => '',
		'exclude'     => '',
		'echo'        => FALSE,
		'show_home'   => FALSE,
		'link_before' => '',
		'link_after'  => ''
	);
	return apply_filters('cleanyetibasic_page_menu_args', $args);
}


/**
 * Return the default arguments for wp_nav_menu
 * 
 * Filter: cleanyetibasic_primary_menu_id <br>
 * Filter: cleanyetibasic_nav_menu_args
 *
 * @return array
 */
class Topbar_Walker_Nav_Menu extends Walker_Nav_Menu {
  function start_lvl(&$output, $depth=0 , $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output = preg_replace( "/(.*)(\<li.*?class\=\")([^\"]*)(\".*?)$/", "$1$2$3 has-dropdown$4", $output );
    $output .= "\n$indent<ul class=\"dropdown\">\n";
  }

  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		$item_output = $args->before;
		$item_output .= '<a '. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

function cleanyetibasic_nav_menu_args() {
    global $cleanyetibasic_options;
    $cleanyetibasic_options = cleanyetibasic_get_options();
    $menuclass = $cleanyetibasic_options['header_top_bar_menu_position'];
	$args = array (
		'theme_location'	=> apply_filters('cleanyetibasic_primary_menu_id', 'primary-menu'),
		'menu'				=> '',
		'container'			=> '',
		'container_class'	=> '',
		'menu_class'		=> $menuclass,
		'fallback_cb'		=> false,
		'before'			=> '',
		'after'				=> '',
		'link_before'		=> '',
		'link_after'		=> '',
		'depth'				=> 0,
		'walker'			=> new Topbar_Walker_Nav_Menu(),
		'echo'				=> false
	);

	return apply_filters('cleanyetibasic_nav_menu_args', $args);
}



if ( function_exists( 'childtheme_override_body' ) )  {
	/**
	 * @ignore
	 */
	 function cleanyetibasic_body() {
		childtheme_override_body();
	}
} else {
	/**
	 * Creates the body tag
	 */
	 function cleanyetibasic_body() {
    	if ( apply_filters( 'cleanyetibasic_show_bodyclass',TRUE ) ) { 
        	// Creating the body class
    		echo '<body ';
    		body_class();
    		echo '>' . "\n\n";
    	} else {
    		echo '<body>' . "\n\n";
    	}
	}
}


/**
 * Register action hook: cleanyetibasic_before
 * 
 * Located in header.php, just after the body tag, before anything else.
 */
function cleanyetibasic_before() {
    do_action( 'cleanyetibasic_before' );
}


/**
 * Register action hook: cleanyetibasic_abovefooter
 * 
 * Located in header.php, inside the header div
 */
function cleanyetibasic_aboveheader() {
    do_action( 'cleanyetibasic_aboveheader' );
}


/**
 * Register action hook: cleanyetibasic_abovefooter
 * 
 * Located in header.php, inside the header div
 */
function cleanyetibasic_header() {
    do_action( 'cleanyetibasic_header' );
}


if ( function_exists( 'childtheme_override_brandingopen' ) )  {
	/**
	 * @ignore
	 */
	function cleanyetibasic_brandingopen() {
		childtheme_override_brandingopen();
		}
	} else {
	/**
	 * Display the opening of the #branding div
	 * 
	 * Override: childtheme_override_brandingopen
	 */
    function cleanyetibasic_brandingopen() {
        global $cleanyetibasic_options;
        $cleanyetibasic_options = cleanyetibasic_get_options();
        $align = 'text-' . $cleanyetibasic_options['title_position'];
		echo '<div class="row">' . "\n";
		echo "\t<div id=\"branding\" class=\"large-12 columns $align\">\n";
    }
}

add_action( 'cleanyetibasic_header','cleanyetibasic_brandingopen',2 );


if ( function_exists( 'childtheme_override_blogtitle' ) )  {
	/**
	 * @ignore
	 */
    function cleanyetibasic_blogtitle() {
    	childtheme_override_blogtitle();
    }
} else {
    /**
     * Display the blog title within the #branding div
     * 
     * Override: childtheme_override_blogtitle
     */    
    function cleanyetibasic_blogtitle() { 
    ?>
    
    	<div id="blog-title"><a href="<?php echo esc_url(home_url()); ?>/" title="<?php bloginfo('name'); ?>" rel="home"><h1><?php bloginfo('name'); ?></h1></a></div>
    
    <?php 
    }
}

add_action('cleanyetibasic_header','cleanyetibasic_blogtitle',3);


if ( function_exists('childtheme_override_blogdescription') )  {
	/**
	 * @ignore
	 */
    function cleanyetibasic_blogdescription() {
    	childtheme_override_blogdescription();
    }
} else {
    /**
     * Display the blog description within the #branding div
     * 
     * Override: childtheme_override_blogdescription
     */
    function cleanyetibasic_blogdescription() {
        $blogdescclass = '"subheader"';
    	$blogdesc = '"blog-description">' . get_bloginfo('description', 'display');
        echo "\t<h3 class=$blogdescclass id=$blogdesc</h3>\n\n";
        echo '</div>';
    }
}

add_action('cleanyetibasic_header','cleanyetibasic_blogdescription',4);



if ( function_exists('childtheme_override_brandingclose') )  {
	/**
	 * @ignore
	 */
	 function cleanyetibasic_brandingclose() {
    	childtheme_override_brandingclose();
    }
} else {
    /**
     * Display the closing of the #branding div
     * 
     * Override: childtheme_override_brandingclose
     */    
    function cleanyetibasic_brandingclose() {
    	echo "\t\t</div><!--  #branding -->\n";
    }
}

add_action('cleanyetibasic_header','cleanyetibasic_brandingclose',6);


if ( function_exists('childtheme_override_access') )  {
    /**
	 * @ignore
	 */
	 function cleanyetibasic_access() {
    	childtheme_override_access();
    }
} else {
    /**
     * Display the #access div
     * 
     * Override: childtheme_override_access
     */    
    function cleanyetibasic_access() {
    global $cleanyetibasic_options;
    $cleanyetibasic_options = cleanyetibasic_get_options();
    $sticky = ( ( 'sticky' == $cleanyetibasic_options['header_top_bar_position'] ) ? ' class="found-sticky"' : '' );
    $menuclass = $cleanyetibasic_options['header_top_bar_menu_position'];
    ?> 
        <div id="access"<?php echo $sticky; ?>>
            <nav class="top-bar" data-topbar>
                <ul class="title-area">
                <!-- Title Area -->
                    <li class="name">
                        <?php if ( 'true' == $cleanyetibasic_options['display_top_bar_title'] ) : ?><h1><a href="<?php echo esc_url(home_url()); ?>/" title="<?php bloginfo('name'); ?>" rel="home"><?php bloginfo('name'); ?></a></h1><?php endif; ?>
                    </li>
                    <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
                    <li class="toggle-topbar menu-icon"><a href="#"><?php _e( 'Menu', 'cleanyetibasic' ); ?></a></li>
                </ul>
                
                <section class="top-bar-section">
<?php 
    	if ( ( function_exists("has_nav_menu") ) && ( has_nav_menu( apply_filters('cleanyetibasic_primary_menu_id', 'primary-menu') ) ) ) {
    	    echo  wp_nav_menu(cleanyetibasic_nav_menu_args());
    	} else {
    	    echo  "<ul class=\"$menuclass\">\n";
            echo  "<li><a href=\"#\">" . __( 'Primary', 'cleanyetibasic' ) . "</a></li>\n";
            echo  "<li><a href=\"#\">" . __( 'Menu', 'cleanyetibasic' ) . "</a></li>\n";
            echo  "<li><a href=\"#\">" . __( 'Location', 'cleanyetibasic' ) . "</a></li>\n";
            echo  "<li><a href=\"";
            echo  home_url() . '/wp-admin/nav-menus.php';
            echo  "\">" . __( 'Customize Here...', 'cleanyetibasic' ) . "</a></li>\n";
            echo  "</ul>\n";	
    	}
?>
                </section>             
            </nav>
        </div><!-- #access -->          

<?php
   }
}

add_action('cleanyetibasic_header','cleanyetibasic_access',1);

/**
 * Register action hook: cleanyetibasic_belowheader
 * 
 * Located in header.php, just after the header div
 */
function cleanyetibasic_belowheader() {
    
    do_action('cleanyetibasic_belowheader');
}   // end cleanyetibasic_belowheader
?>