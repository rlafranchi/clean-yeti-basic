<?php
/**
 *Custom Breadcrumbs using Foundation style
 *
 *@package cleanyetibasic
 *@subpackage Extensions
 *
 */
function cleanyetibasic_custom_breadcrumbs() {

    $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $delimiter = '</li><li>'; // delimiter between crumbs
    $home = __( 'Home', 'cleanyetibasic'); // text for the 'Home' link
    $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $before = '<li class="current">'; // tag before the current crumb
    $after = '</li>'; // tag after the current crumb
    $archive = __( 'Archive by category', 'cleanyetibasic' );
    $search = __( 'Search results for', 'cleanyetibasic' );
    $tags = __( 'Posts tagged', 'cleanyetibasic' );
    $postedby = __( 'Articles posted by', 'cleanyetibasic' );
    $error404 = __( 'Error 404', 'cleanyetibasic' );

    global $post;
    $homeLink = esc_url(home_url());

    if (is_home() || is_front_page()) {

        if ($showOnHome == 1) echo '<ul id="crumbs" class="breadcrumbs"><li><a href="' . $homeLink . '">' . $home . '</a></li></ul>';

    } else {

        echo '<ul id="crumbs" class="breadcrumbs"><li><a href="' . $homeLink . '">' . $home . '</a></li>';

        if ( is_category() ) {
            $thisCat = get_category(get_query_var('cat'), false);
	    $catstr = get_category_parents($thisCat->parent, TRUE, $delimiter );
        if ( !is_object($catstr) )
	    $catparents =  substr($catstr, 0, strlen($catstr) -4 );
            if ($thisCat->parent != 0) echo '<li>' . $catparents;
            echo $before . $archive . ' "' . single_cat_title('', false) . '"' . $after;

        } elseif ( is_search() ) {
            echo $before . $search . ' "' . get_search_query() . '"' . $after;

        } elseif ( is_day() ) {
            echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li>';
            echo '<li><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a></li>';
            echo $before . get_the_time('d') . $after;

        } elseif ( is_month() ) {
            echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li>';
            echo $before . get_the_time('F') . $after;

        } elseif ( is_year() ) {
            echo $before . get_the_time('Y') . $after;

        } elseif ( is_single() && !is_attachment() ) {
            if ( get_post_type() != 'post' ) {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                echo '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></li>';
                if ($showCurrent == 1) echo $before . get_the_title() . $after;
            } else {
                $cat = get_the_category(); $cat = $cat[0];
		$catstr = get_category_parents($cat, TRUE, $delimiter);
		$catsparents = substr($catstr, 0, strlen($catstr) -4 );
                $cats = '<li>' . $catsparents;
                if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
                echo $cats;
                if ($showCurrent == 1) echo $before . get_the_title() . $after;
            }

        } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;

        } elseif ( is_attachment() ) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID); $cat = $cat[0];
	    $catstr = get_category_parents($cat, TRUE, $delimiter);
            $catsparents = substr($catstr, 0, strlen($catstr) -4 );
            echo '<li>' . $catsparents;
            echo '<li><a href="' . get_permalink($parent) . '">' . $parent->post_title . '</li>';
            if ($showCurrent == 1) echo $before . get_the_title() . $after;

        } elseif ( is_page() && !$post->post_parent ) {
            if ($showCurrent == 1) echo $before . get_the_title() . $after;

        } elseif ( is_page() && $post->post_parent ) {
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();

            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
                $parent_id  = $page->post_parent;
            }

            $breadcrumbs = array_reverse($breadcrumbs);

            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo $breadcrumbs[ $i ];
            }

            if ($showCurrent == 1) echo $before . get_the_title() . $after;

        } elseif ( is_tag() ) {
            echo $before . $tags . ' "' . single_tag_title('', false) . '"' . $after;

        } elseif ( is_author() ) {
            global $author;
            $userdata = get_userdata($author);
            echo $before . $postedby . ' ' . $userdata->display_name . $after;

        } elseif ( is_404() ) {
            echo $before . $error404 . $after;
        }

        if ( get_query_var('paged') ) {
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo '<li class="current">(';
            echo __('Page', 'cleanyetibasic' ) . ' ' . get_query_var('paged');
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')</li>';
        }

        echo '</ul>'; 
    }
}
add_action('cleanyetibasic_navigation_above', 'cleanyetibasic_custom_breadcrumbs', 2);
?>