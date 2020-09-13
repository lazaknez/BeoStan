<?php
/**
 * @package C4D WordPress theme
 */
////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////// LOOP //////////////////////////////////////////////////////////////////////
remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

add_action('woocommerce_before_shop_loop_item', 'tet30_woo_loop_open_image_div', 10);
add_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 20);
add_action('woocommerce_before_shop_loop_item_title', 'tet30_woo_loop_close_image_div', 30);
add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 10);
add_action('woocommerce_before_shop_loop_item_title', 'tet30_shop_loop_buttons', 20);
add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 40);
add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 10);
add_filter('woocommerce_product_get_image', 'tet30_woocommerce_product_get_image', 10, 5);

function tet30_woocommerce_product_get_image($image, $self, $size, $attr, $placeholder) {
  if (!$image && $placeholder) {
    return wc_placeholder_img($size);
  }
  return $image;
}
///////////////////////////////////LOOP ///////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////// SINGLE //////////////////////////////////////////////////////////////////////
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
add_action('woocommerce_single_product_summary', 'woocommerce_show_product_sale_flash', 0);
add_filter('woocommerce_product_reviews_tab_title', 'tet30_review_tab_title');
add_action('woocommerce_single_product_summary', 'tet30_single_page_share', 50);
add_action('woocommerce_after_add_to_cart_button', 'tet30_single_page_buttons', 30);

function tet30_review_tab_title($title) {
  $title = str_replace('(', '<span class="count">', $title);
  $title = str_replace(')', '</span>', $title);
  return $title;
}
function tet30_single_page_share() {
  global $tet30;
  if (isset($tet30['single-share']) && $tet30['single-share'] == 1 && function_exists('c4d_social_share_button')) {
    echo do_shortcode("[c4d-social-share]");
  }
}
function tet30_single_page_buttons() {
  global $tet30;
  $buttons = isset($tet30['single-buttons']) ? $tet30['single-buttons'] : array();
  ?>
  <div class="tet30-feature-buttons">
      <?php if(isset($buttons['wishlist']) && $buttons['wishlist'] == 1): ?>
        <?php if(function_exists('c4d_woo_wishlist_shortcode_button')): ?>
        <div class="wishlist">
          <?php echo do_shortcode('[c4d-woo-wishlist-button icon="fi flaticon-heart" label=""]')?>
        </div>
        <?php endif; ?>
      <?php endif; ?>

      <?php if(isset($buttons['compare']) && $buttons['compare'] == 1): ?>
        <?php if(function_exists('c4d_woo_compare_shortcode_cart')): ?>
        <div class="compare">
          <?php echo do_shortcode('[c4d-woo-compare-button icon="fi flaticon-shuffle"]'); ?>
        </div>
        <?php endif; ?>
      <?php endif; ?>
  </div>
  <?php
}
////////////////////////////////// END SINGLE //////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////


////////////////////////////////// CATEGORY //////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////
add_action('woocommerce_before_shop_loop', 'tet30_woo_category_open', 10);
add_action('woocommerce_after_shop_loop', 'tet30_woo_category_right', 20);
add_filter('loop_shop_columns', 'tet30_loop_shop_columns');
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

function tet30_woo_category_open() {
  global $tet30;
  $mainCol = 12;
  $rightCol = 0;
  $leftCol = 0;
  $leftSidebar = 'shop-left';
  $rightSidebar = 'shop-right';

  if (isset($_GET['sidebar_pos'])) {
    $showSidebar = esc_attr($_GET['sidebar_pos']);
    if ($showSidebar == 'right') {
      $leftSidebar = 'shop-right';
      $rightSidebar = 'shop-left';
    }
  }

  if (is_active_sidebar($rightSidebar)) {
    $rightCol = isset($tet30['listing-sidebar-right']) && $tet30['listing-sidebar-right'] != '' ? $tet30['listing-sidebar-right'] : 3;
  }
  if (is_active_sidebar($leftSidebar)) {
    $leftCol = isset($tet30['listing-sidebar-left']) && $tet30['listing-sidebar-left'] != '' ? $tet30['listing-sidebar-left'] : 2;
  }
  echo '<div class="tet30-main-width">';
  echo '<div class="container-fluid">';
  echo '<div class="row">';

  if ($leftCol > 0) {
    echo '<div class="sidebar tet30-shop-category-left-col-wrap col-lg-'.esc_attr($leftCol).' col-md-12" >';
    echo '<div class="tet30-shop-category-left-col">';
    echo '<div class="tet30-archive-left-sidebar-close"><i class="fi flaticon-cancel"></i></div>';
    dynamic_sidebar($leftSidebar);
    echo '</div>';
    echo '</div>';
  }

  echo '<div class="tet30-shop-category-main-col-wrap col-lg-'.esc_attr($mainCol - $rightCol - $leftCol).' col-md-12">';
  echo '<div class="tet30-shop-category-main-col">
        <div class="tet30-archive-left-sidebar-stick"><i class="fi flaticon-list"></i> <span class="block-title">'.esc_html__('Filter', 'tet30').'</span></div>';
}

function tet30_woo_category_right() {
  global $tet30;
  $mainCol = 12;
  $rightCol = 0;
  $leftCol = 0;
  $leftSidebar = 'shop-left';
  $rightSidebar = 'shop-right';
  if (isset($_GET['sidebar_pos'])) {
    $showSidebar = esc_attr($_GET['sidebar_pos']);
    if ($showSidebar == 'right') {
      $leftSidebar = 'shop-right';
      $rightSidebar = 'shop-left';
    }
  }
  if (is_active_sidebar($rightSidebar)) {
    $rightCol = isset($tet30['listing-sidebar-right']) && $tet30['listing-sidebar-right'] != '' ? $tet30['listing-sidebar-right'] : 3;
  }
  if (is_active_sidebar($leftSidebar)) {
    $leftCol = isset($tet30['listing-sidebar-left']) && $tet30['listing-sidebar-left'] != '' ? $tet30['listing-sidebar-left'] : 2;
  }
  echo "</div>";
  echo "</div><!-- main col -->";// main col

  if ($rightCol > 0) {
    echo '<div class="sidebar tet30-shop-category-right-col-wrap col-lg-'.esc_attr($rightCol).'">';
    echo '<div class="tet30-shop-category-right-col">';
    dynamic_sidebar($rightSidebar);
    echo '</div>';
    echo '</div>';
  }

  echo "</div><!-- row -->";// row
  echo "</div><!-- container-fluid -->";// container fluid
  echo "</div><!-- main width -->";// main width
}

function tet30_loop_shop_columns($columns){
  global $tet30;
  if (isset($tet30['listing-column'])) {
    return $tet30['listing-column'];
  }
  return $columns;
}
////////////////////////////////// END CATEGORY //////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////



function tet30_woo_loop_open_image_div() {
  ?>
  <div class="image-button">
  <?php
}
function tet30_woo_loop_close_image_div() {
  ?>
  </div>
  <?php
}

function tet30_shop_loop_buttons() {
  global $tet30;
  $buttons = isset($tet30['listing-buttons']) ? $tet30['listing-buttons'] : array();
  ?>
  <div class="buttons-right">
      <?php if (isset($buttons['wishlist']) && $buttons['wishlist'] == 1) : ?>
        <?php if(function_exists('c4d_woo_wishlist_shortcode_button')): ?>
        <div class="wishlist">
          <?php echo do_shortcode('[c4d-woo-wishlist-button icon="fi flaticon-heart" label=""]')?>
        </div>
        <?php endif; ?>
      <?php endif; ?>
      <?php if (isset($buttons['compare']) && $buttons['compare'] == 1) : ?>
        <?php if(function_exists('c4d_woo_compare_shortcode_cart')): ?>
        <div class="compare">
          <?php echo do_shortcode('[c4d-woo-compare-button icon="fi flaticon-shuffle"]'); ?>
        </div>
        <?php endif; ?>
      <?php endif; ?>
      <?php if (isset($buttons['quickview']) && $buttons['quickview'] == 1) : ?>
        <?php if(function_exists('c4d_woo_qv_shortcode')): ?>
        <div class="quickview">
          <?php echo do_shortcode('[c4d-woo-qv button_text="Quick View" button_icon="fi flaticon-magnifying-glass"]')?>
        </div>
        <?php endif; ?>
      <?php endif; ?>
  </div>
  <div class="buttons-center">
      <?php if ((isset($buttons['addtocart']) && $buttons['addtocart'] == 1) || !isset($buttons['addtocart'])) : ?>
        <div class="addtocart">
          <?php echo woocommerce_template_loop_add_to_cart(); ?>
        </div>
      <?php endif; ?>
  </div>
  <?php
}

////////////////////////////////////// CART //////////////////////////////
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
add_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display', 15 );
add_filter('woocommerce_cross_sells_columns', 'c4d_woo_cross_sells_columns');

function c4d_woo_cross_sells_columns($col) {
  return 4;
}
