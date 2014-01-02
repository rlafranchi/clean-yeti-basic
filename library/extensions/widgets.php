<?php
/**
 * Widgets
 *
 * @package cleanyetibasicCoreLibrary
 * @subpackage Widgets
 */


/**
 * Markup before the widget
 */
function cleanyetibasic_before_widget() {
	$content = '<aside id="%1$s" class="widgetcontainer %2$s">';
	return apply_filters('cleanyetibasic_before_widget', $content);
}


/**
 * Markup after the widget
 */
function cleanyetibasic_after_widget() {
	$content = '</aside>';
	return apply_filters('cleanyetibasic_after_widget', $content);
}



/**
 * Markup before the widget title
 */
function cleanyetibasic_before_title() {
	$content = "<h3 class=\"widgettitle\">";
	return apply_filters('cleanyetibasic_before_title', $content);
}


/**
 * Markup after the widget title
 */
function cleanyetibasic_after_title() {
	$content = "</h3>\n";
	return apply_filters('cleanyetibasic_after_title', $content);
}


/**
 * Search widget class
 *
 * @since 0.9.6.3
 */
class cleanyetibasic_Widget_Search extends WP_Widget {

	function cleanyetibasic_Widget_Search() {
		$widget_ops = array('classname' => 'widget_search', 'description' => __( 'A search form for your blog', 'cleanyetibasic') );
		$this->WP_Widget('search', __('Search', 'cleanyetibasic'), $widget_ops);
	}

	function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Search', 'cleanyetibasic') : $instance['title']);

		echo $before_widget;
		

		// Use current theme search form if it exists
		get_search_form();

		echo $after_widget;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '') );
		$title = $instance['title'];
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'cleanyetibasic'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$new_instance = wp_parse_args((array) $new_instance, array( 'title' => ''));
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}

}

/**
 * Meta widget class
 *
 * Displays log in/out
 *
 * @since 0.9.6.3
 */
class cleanyetibasic_Widget_Meta extends WP_Widget {

	function cleanyetibasic_Widget_Meta() {
		$widget_ops = array('classname' => 'widget_meta', 'description' => __( "Log in/out and admin", 'cleanyetibasic') );
		$this->WP_Widget('meta', __('Meta', 'cleanyetibasic'), $widget_ops);
	}

	function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Meta', 'cleanyetibasic') : $instance['title']);

		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;
?>
			<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
			<?php wp_meta(); ?>
			</ul>
<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);

		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
		$title = strip_tags($instance['title']);
?>
			<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'cleanyetibasic'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
<?php
	}
}
    
/**
 * RSS links widget class
 *
 * @since 0.9.6.3
 */
class cleanyetibasic_Widget_RSSlinks extends WP_Widget {

	function cleanyetibasic_Widget_RSSlinks() {
		$widget_ops = array( 'description' => __('Links to your posts and comments feed', 'cleanyetibasic') );
		$this->WP_Widget( 'rss-links', __('RSS Links', 'cleanyetibasic'), $widget_ops);
	}

	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? __('RSS Links', 'cleanyetibasic') : $instance['title']);
		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;
?>
			<ul>
				<li><a href="<?php bloginfo('rss2_url') ?>" title="<?php echo esc_attr( get_bloginfo('name', 'display') ) ?> <?php _e('Posts RSS feed', 'cleanyetibasic'); ?>" rel="alternate nofollow" type="application/rss+xml"><?php _e('All posts', 'cleanyetibasic') ?></a></li>
				<li><a href="<?php bloginfo('comments_rss2_url') ?>" title="<?php echo esc_attr( get_bloginfo('name', 'display') ) ?> <?php esc_attr_e('Comments RSS feed', 'cleanyetibasic'); ?>" rel="alternate nofollow" type="application/rss+xml"><?php _e('All comments', 'cleanyetibasic') ?></a></li>
			</ul>
<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);

		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
		$title = strip_tags($instance['title']);
?>
			<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'cleanyetibasic'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
<?php
	}
}

?>