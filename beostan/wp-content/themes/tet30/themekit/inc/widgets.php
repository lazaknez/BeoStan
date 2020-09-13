<?php
/**
 * @package C4D WordPress theme
 */

function c4d_theme_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Right', 'tet30' ),
		'id'            => 'right',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'tet30' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Left', 'tet30' ),
		'id'            => 'left',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'tet30' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Top', 'tet30' ),
		'id'            => 'footer-top',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'tet30' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer', 'tet30' ),
		'id'            => 'footer',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'tet30' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'tet30' ),
		'id'            => 'footer-1',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'tet30' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'tet30' ),
		'id'            => 'footer-2',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'tet30' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'tet30' ),
		'id'            => 'footer-3',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'tet30' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'tet30' ),
		'id'            => 'footer-4',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'tet30' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 5', 'tet30' ),
		'id'            => 'footer-5',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'tet30' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Shop Right', 'tet30' ),
		'id'            => 'shop-right',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'tet30' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Shop Left', 'tet30' ),
		'id'            => 'shop-left',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'tet30' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'c4d_theme_widgets_init' );