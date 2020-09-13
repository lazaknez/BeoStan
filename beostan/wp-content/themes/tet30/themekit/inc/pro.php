<?php
///////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////// HOOK //////////////////////////////////////////////
if (!isset($_GET['c4dedition']) || isset($_GET['c4dedition']) && $_GET['c4dedition'] !== 'free') {
  add_filter( 'body_class', 'c4d_theme_custom_class' );
  add_filter( 'c4d_theme_header_template', 'c4d_theme_header_template');
  add_filter( 'c4d_theme_footer_template', 'c4d_theme_footer_template');
  add_action( 'save_post', 'c4d_theme_page_save_meta_box' );
}

/////////////////////////////////////// HOOK //////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////// OPTIMIZE //////////////////////////////////////////////


/////////////////////////////////////// END OPTIMIZE ////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////// EFFECT ///////////////////////////////////

function c4d_theme_custom_class( $classes ) {
  global $c4dThemeOptions;
  $classes[] = 'c4d-theme-pro';
  $classes[] = 'c4d-theme-effect';

  // global setting
  if (isset($c4dThemeOptions['header-global-transparent']) && $c4dThemeOptions['header-global-transparent'] === 'yes') {
    $classes[] = 'c4d-theme-header-transparent';
  }

  if (isset($c4dThemeOptions['header-global-sticky']) && $c4dThemeOptions['header-global-sticky'] === 'yes') {
    $classes[] = 'c4d-theme-header-sticky';
  }

  if (isset($c4dThemeOptions['header-global-fullwidth']) && $c4dThemeOptions['header-global-fullwidth'] === 'yes') {
    $classes[] = 'c4d-theme-header-fullwidth';
  }

  // page setting
  $pageId = get_the_id();
  if ($pageId) {
    $headerTrans = get_post_meta( $pageId, 'c4d_theme_header_transparent', true );

    if ($headerTrans === 'yes') {
      $classes[] = 'c4d-theme-header-transparent';
    } else if ($headerTrans === 'no') {
      $classes = array_diff( $classes, array('c4d-theme-header-transparent'));
    }

    $headerSticky = get_post_meta( $pageId, 'c4d_theme_header_sticky', true );
    if ($headerSticky === 'yes') {
      $classes[] = 'c4d-theme-header-sticky';
    } else if ($headerSticky === 'no') {
      $classes = array_diff( $classes, array('c4d-theme-header-sticky'));
    }

    $headerFullWidth = get_post_meta( $pageId, 'c4d_theme_header_fullwidth', true );
    if ($headerFullWidth === 'yes') {
      $classes[] = 'c4d-theme-header-fullwidth';
    } else if ($headerFullWidth === 'no') {
      $classes = array_diff( $classes, array('c4d-theme-header-fullwidth'));
    }
  }

  // set via url
  if (isset($_GET['header-transparent']) && $_GET['header-transparent'] === 'yes') {
    $classes[] = 'c4d-theme-header-transparent';
  }

  if (isset($_GET['header-sticky']) && $_GET['header-sticky'] === 'yes') {
    $classes[] = 'c4d-theme-header-sticky';
  }

  if (isset($_GET['header-fullwidth']) && $_GET['header-fullwidth'] === 'yes') {
    $classes[] = 'c4d-theme-header-fullwidth';
  }

  return $classes;
}
/////////////////////////////////// END EFFECT ///////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////// HEADER TEMPLATE ///////////////////////////////////

function c4d_theme_header_template($template) {
  global $c4dThemeOptions;

  // global setting
  if (isset($c4dThemeOptions['header-global-layout'])) {
    $template = $c4dThemeOptions['header-global-layout'];
  }

  // page setting
  $pageId = get_the_id();
  $headerLayout = get_post_meta( $pageId, 'c4d_theme_header_layout', true );
  if ($headerLayout && $headerLayout != '') {
    $template = $headerLayout;
  }

  // set via url
  if (isset($_GET['header-global-layout'])) {
    $template = sanitize_text_field($_GET['header-global-layout']);
  }
  return $template;
}
/////////////////////////////////// END HEADER TEMPLATE ///////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////// FOOTER TEMPLATE ///////////////////////////////////

function c4d_theme_footer_template($template) {
  global $c4dThemeOptions;

  // global setting
  if (isset($c4dThemeOptions['footer-global-layout'])) {
    $template = $c4dThemeOptions['footer-global-layout'];
  }

  // page setting
  $pageId = get_the_id();
  $footerLayout = get_post_meta( $pageId, 'c4d_theme_footer_layout', true );
  if ($footerLayout && $footerLayout != '') {
    $template = $footerLayout;
  }

  // set via url
  if (isset($_GET['footer-global-layout'])) {
    $template = sanitize_text_field($_GET['footer-global-layout']);
  }
  return $template;
}
/////////////////////////////////// END FOOTER TEMPLATE ///////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////// PAGE OTIONS //////////////////////////////////////
/**
 * Register meta box(es).
 */
function c4d_theme_page_register_meta_boxes() {
    add_meta_box( 'meta-box-id', __( 'Page Options', 'tet30' ), 'c4d_theme_page_display_form_options', array('page', 'post'), 'side' );
}
add_action( 'add_meta_boxes', 'c4d_theme_page_register_meta_boxes' );

/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function c4d_theme_page_display_form_options( $post ) {
  // Add an nonce field so we can check for it later.
  wp_nonce_field( 'c4d_theme_page_option', 'c4d_theme_page_option_nonce' );

  // Display code/markup goes here. Don't forget to include nonces!
  // Use get_post_meta to retrieve an existing value from the database.
  $headerLayout = get_post_meta( $post->ID, 'c4d_theme_header_layout', true );
  $headerSticky = get_post_meta( $post->ID, 'c4d_theme_header_sticky', true );
  $headerFullWidth = get_post_meta( $post->ID, 'c4d_theme_header_fullwidth', true );
  $headerTrans = get_post_meta( $post->ID, 'c4d_theme_header_transparent', true );
  $footerLayout = get_post_meta( $post->ID, 'c4d_theme_footer_layout', true );
  $pageTitle = get_post_meta( $post->ID, 'c4d_theme_show_page_title', true );
  // Display the form, using the current value.
  ?>
  <div class="c4d-theme-page-option-wrap">
    <div class="components-base-control ">
      <div class="components-base-control__field">
        <label class="components-base-control__label"><?php _e('Header Layout', 'tet30'); ?></label>
        <?php
          $options = array(
            array('value' => '', 'text' => __('Global Setting', 'tet30')),
            array('value' => 'header-default', 'text' => 'Header Default'),
            array('value' => 'header-logo-menu-buttons', 'text' => 'Menu Center'),
            array('value' => 'header-big-search', 'text' => 'Header Big Search')
          );
        ?>
        <select name="c4d_theme_header_layout" class="components-select-control__input">
          <?php foreach ($options as $key => $value) {
            echo '<option '. selected($value['value'], $headerLayout, false) .' value="'. esc_attr($value['value']) .'">'. $value['text'] .'</option>';
          } ?>
        </select>
      </div>
    </div>

    <div class="components-base-control ">
      <div class="components-base-control__field">
        <label class="components-base-control__label"><?php _e('Header Full Width', 'tet30'); ?></label>
        <?php
          $options = array(
            array('value' => '', 'text' => __('Global Setting', 'tet30')),
            array('value' => 'no', 'text' => __('No', 'tet30')),
            array('value' => 'yes', 'text' => __('Yes', 'tet30'))
          );
        ?>
        <select name="c4d_theme_header_fullwidth" class="components-select-control__input">
          <?php foreach ($options as $key => $value) {
            echo '<option '. selected($value['value'], $headerFullWidth, false) .' value="'. esc_attr($value['value']) .'">'. $value['text'] .'</option>';
          } ?>
        </select>
      </div>
    </div>

    <div class="components-base-control ">
      <div class="components-base-control__field">
        <label class="components-base-control__label"><?php _e('Header Sticky', 'tet30'); ?></label>
        <?php
          $options = array(
            array('value' => '', 'text' => __('Global Setting', 'tet30')),
            array('value' => 'no', 'text' => __('No', 'tet30')),
            array('value' => 'yes', 'text' => __('Yes', 'tet30'))
          );
        ?>
        <select name="c4d_theme_header_sticky" class="components-select-control__input">
          <?php foreach ($options as $key => $value) {
            echo '<option '. selected($value['value'], $headerSticky, false) .' value="'. esc_attr($value['value']) .'">'. $value['text'] .'</option>';
          } ?>
        </select>
      </div>
    </div>

    <div class="components-base-control ">
      <div class="components-base-control__field">
        <label class="components-base-control__label"><?php _e('Header Transparent', 'tet30'); ?></label>
        <?php
          $options = array(
            array('value' => '', 'text' => __('Global Setting', 'tet30')),
            array('value' => 'no', 'text' => __('No', 'tet30')),
            array('value' => 'yes', 'text' => __('Yes', 'tet30'))
          );
        ?>
        <select name="c4d_theme_header_transparent" class="components-select-control__input">
          <?php foreach ($options as $key => $value) {
            echo '<option '. selected($value['value'], $headerTrans, false) .' value="'. esc_attr($value['value']) .'">'. $value['text'] .'</option>';
          } ?>
        </select>
      </div>
    </div>

    <div class="components-base-control ">
      <div class="components-base-control__field">
        <label class="components-base-control__label"><?php _e('Page Title', 'tet30'); ?></label>
        <?php
          $options = array(
            array('value' => 'yes', 'text' => __('Yes', 'tet30')),
            array('value' => 'no', 'text' => __('No', 'tet30'))
          );
        ?>
        <select name="c4d_theme_show_page_title" class="components-select-control__input">
          <?php foreach ($options as $key => $value) {
            echo '<option '. selected($value['value'], $pageTitle, false) .' value="'. esc_attr($value['value']) .'">'. $value['text'] .'</option>';
          } ?>
        </select>
      </div>
    </div>

    <div class="components-base-control ">
      <div class="components-base-control__field">
        <label class="components-base-control__label"><?php _e('Footer Layout', 'tet30'); ?></label>
        <?php
          $options = array(
            array('value' => '', 'text' => __('Global Setting', 'tet30')),
            array('value' => 'footer-default', 'text' => __('Footer Default', 'tet30')),
            array('value' => 'footer-simple', 'text' => __('Footer Simple', 'tet30'))
          );
        ?>
        <select name="c4d_theme_footer_layout" class="components-select-control__input">
          <?php foreach ($options as $key => $value) {
            echo '<option '.selected($value['value'], $footerLayout, false).' value="'. esc_attr($value['value']) .'">'. $value['text'] .'</option>';
          } ?>
        </select>
      </div>
    </div>

  </div>

  <?php
}

/**
 * Save meta box content.
 *
 * @param int $post_id Post ID
 */
function c4d_theme_page_save_meta_box( $post_id ) {
  // Save logic goes here. Don't forget to include nonce checks!
  /*
   * If this is an autosave, our form has not been submitted,
   * so we don't want to do anything.
   */
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
      return $post_id;
  }

  // Verify that the nonce is valid.
  if ( !isset($_POST['c4d_theme_page_option_nonce']) || ! wp_verify_nonce( $_POST['c4d_theme_page_option_nonce'], 'c4d_theme_page_option' ) ) {
      return $post_id;
  }

  /* OK, it's safe for us to save the data now. */
  $fields = array(
    'c4d_theme_header_layout',
    'c4d_theme_header_fullwidth',
    'c4d_theme_header_sticky',
    'c4d_theme_header_transparent',
    'c4d_theme_footer_layout',
    'c4d_theme_show_page_title'
  );

  foreach ($fields as $field) {
    update_post_meta( $post_id, $field, $headerLayout, sanitize_text_field( $_POST[$field] ));
  }
}

//////////////////////////////// END PAGE OTIONS //////////////////////////////////////
