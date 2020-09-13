<?php

add_action( 'woocommerce_locate_template', 'c4d_woocommerce_locate_template', 10, 3 );

function c4d_woocommerce_locate_template( $template, $template_name, $template_path ) {
  $dir = get_template_directory();
  $theme_path = $dir. '/woocommerce/';
  $kit_path = $dir. '/themekit/woocommerce/';
  $kit_file = $kit_path.$template_name;
  $theme_file = $theme_path.$template_name;

  if (!file_exists($theme_file) && file_exists($kit_file)) {
    return $kit_file;
  }

  return $template;
}

add_action( 'woocommerce_before_checkout_form', 'c4d_kit_open_main_width' );
add_action( 'woocommerce_after_checkout_form', 'c4d_kit_close_main_width' );
add_action( 'woocommerce_before_cart', 'c4d_kit_open_main_width' );
add_action( 'woocommerce_after_cart', 'c4d_kit_close_main_width', 100000 );
add_action( 'woocommerce_account_content', 'c4d_kit_open_main_width', 0 );
add_action( 'woocommerce_account_content', 'c4d_kit_close_main_width', 100000 );

function c4d_kit_open_main_width() {
  echo '<div class="c4d-kit-main-width">';
}
function c4d_kit_close_main_width() {
  echo '</div>';
}
