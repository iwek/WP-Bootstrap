<?php

add_theme_support( 'automatic-feed-links' );

if ( ! isset( $content_width ) ) 
    $content_width = 680;

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Sidebar - Index',
		'before_widget' => '<div id="%1$s" class="widgetContainer %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name' => 'Sidebar - Post',
		'before_widget' => '<div id="%1$s" class="widgetContainer %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
}
?>