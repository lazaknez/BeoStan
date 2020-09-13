<?php
/**
 * @package C4D WordPress theme
 */

if ( ! function_exists( 'c4d_theme_setup' ) ) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   */
  function c4d_theme_setup() {
    require_once(get_template_directory().'/inc/configs.php');
    /*
     * Make theme available for translation.
     */
    load_theme_textdomain( 'tet30' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-logo' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
     */
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );

    set_post_thumbnail_size( 1200, 9999 );

    register_nav_menus( array(
      'primary' => __( 'Primary Menu', 'tet30' ),
      'under-big-search' => __( 'Header Big Search Menu', 'tet30' ),
      'footer' => __( 'Footer Menu', 'tet30' ),
      'social'  => __( 'Social Links Menu', 'tet30' ),
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ) );

    // Indicate widget sidebars can use selective refresh in the Customizer.
    add_theme_support( 'customize-selective-refresh-widgets' );
  }
endif; // c4d_theme_setup

add_action( 'after_setup_theme', 'c4d_theme_setup' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function c4d_theme_content_width() {
  $GLOBALS['content_width'] = apply_filters( 'c4d_theme_content_width', 1200 );
}

add_action( 'after_setup_theme', 'c4d_theme_content_width', 0 );

/**
 * Handles JavaScript detection.
 */
function c4d_theme_javascript_detection() {
  echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}

add_action( 'wp_head', 'c4d_theme_javascript_detection', 0 );

/**
 * Enqueues scripts and styles.
 */
function c4d_theme_scripts() {
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
  wp_enqueue_style( 'c4d-theme-vendor-style', get_template_directory_uri() . '/css/vendors.css');
  if (WP_DEBUG){
    wp_enqueue_style( 'c4d-theme-style', get_template_directory_uri() . '/style.css' , array('c4d-theme-vendor-style'));
  } else {
    wp_enqueue_style('c4d-theme-style', get_template_directory_uri() . '/style.min.css', array('c4d-theme-vendor-style'));
  }

  wp_enqueue_script( 'c4d-theme-vendor-script', get_template_directory_uri() . '/js/vendors.js', array( 'jquery' ), '1.0.0', true );
  if (WP_DEBUG){
    wp_enqueue_script( 'c4d-theme-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '1.0.0', true );
  } else {
    wp_enqueue_script( 'c4d-theme-script', get_template_directory_uri() . '/js/functions.min.js', array( 'jquery' ), '1.0.0', true );
  }
}

add_action( 'wp_enqueue_scripts', 'c4d_theme_scripts' );

function c4d_theme_load_custom_wp_admin_style($hook) {
  $theme = wp_get_theme();
  $slug = str_replace('-', '', sanitize_title($theme->get('Name')));
  if (in_array($hook, array('toplevel_page_'.$slug, 'appearance_page_'.$slug.'-theme-welcome'))) {
    wp_enqueue_script( 'c4d-theme-admin-js', get_template_directory_uri().'/themekit/js/admin.js', array( 'jquery' ), false, true );
    wp_enqueue_style( 'c4d-theme-admin', get_template_directory_uri().'/themekit/admin.css');
  }
}

add_action( 'admin_enqueue_scripts', 'c4d_theme_load_custom_wp_admin_style' );

$proPath = get_template_directory().'/themekit/inc/pro.php';
if (file_exists($proPath)) {
  require_once($proPath);
}
