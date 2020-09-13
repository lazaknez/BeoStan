<?php
/**
 * Front Page.
 *
 * @package WEN Associate
 *
 */

get_header(); ?>

  <div id="primary" class="content-area col-sm-12">
    <?php
    if ( is_active_sidebar( 'sidebar-front-page-main' ) || is_active_sidebar( 'sidebar-front-page-lower-left' ) || is_active_sidebar( 'sidebar-front-page-lower-right' ) ) {
      $classes = "site-main sidebar-content";
    }
    else {
      $classes = "site-main";
    }
    ?>
    <main id="main" class="<?php echo $classes; ?>" role="main">

      <?php
      /**
       * wen_associate_action_front_page hook
       */
      do_action( 'wen_associate_action_front_page' );
      ?>

    </main><!-- #main -->
  </div><!-- #primary -->

<?php get_footer(); ?>
