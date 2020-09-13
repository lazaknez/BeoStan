<?php
add_action( 'admin_menu', 'c4d_theme_in_redux_menu', 10);
add_action('admin_menu', 'c4d_theme_in_theme_menu', 0);

function c4d_theme_in_redux_menu() {
  $theme = wp_get_theme(); 
  $slug = str_replace('-', '', sanitize_title($theme->get('Name')));
  add_theme_page(
    $slug,
    __( 'Welcome', 'tet30' ),
    __( 'Welcome', 'tet30' ),
    'edit_theme_options',
    'themes.php?page=tet30-theme-welcome',
    'c4d_theme_welcome_page_callback'
  );
}

function c4d_theme_in_theme_menu() {
  add_theme_page(__( 'Welcome', 'tet30' ), __( 'Welcome', 'tet30' ), 'edit_theme_options', 'tet30-theme-welcome', 'c4d_theme_welcome_page_callback');
}

function c4d_theme_welcome_page_callback(){
  echo '<div class="c4d-welcome-wrap"><div class="c4d-welcome-container">';
  require_once(get_template_directory().'/themekit/inc/welcome-header.php');
  require_once(get_template_directory().'/themekit/inc/welcome-body.php');
  require_once(get_template_directory().'/themekit/inc/welcome-footer.php');
  echo '</div></div>';
}
