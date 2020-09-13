<?php
/**
 * @package C4D WordPress theme
 */
add_filter( 'body_class', 'c4d_theme_blog_body_class');

function c4d_theme_blog_body_class($classes) {
	global $c4d_plugin_manager;
	$class = isset($c4d_plugin_manager['blog-style']) ? $c4d_plugin_manager['blog-style'] : '';
	$class = isset($_GET['blog_style']) ? $_GET['blog_style'] : $class;
	if ($class) {
		$classes[] = 'c4d-theme-blog-style-' . esc_attr($class);
	}
	return $classes;
}