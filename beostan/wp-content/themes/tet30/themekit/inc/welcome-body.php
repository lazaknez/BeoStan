<div class="c4d-welcome-body">
  <div class="c4d-welcome-body-inner">

      <!----------------------------------------- LEFT ------------------------------------------->
      <div class="left">
        <?php require_once(dirname(__FILE__).'/welcome-global.php'); ?>
        <?php require_once(dirname(__FILE__).'/welcome-woo.php'); ?>
        <?php require_once(dirname(__FILE__).'/welcome-blog.php'); ?>
      </div>

      <!----------------------------------------- RIGHT ------------------------------------------->
      <div class="right">

        <div class="c4d-block">

          <div class="c4d-block-header">
            <h3 class="c4d-block-title">
              <span class="dashicons dashicons-admin-customizer"></span>
              <span><?php _e('Import Sample Data', 'tet30'); ?></span>
            </h3>
          </div>
          <div class="c4d-block-body">
            <div class="c4d-element c4d-align-center">
              <?php
                if (class_exists('OCDI_Plugin')) {
                  $link = 'themes.php?page=pt-one-click-demo-import';
                } else {
                  $link = 'http://coffee4dev.com/docs/28-doc/index.html';
                }
              ?>
              <a target="blank" href="<?php echo esc_attr($link); ?>">
                <img src="<?php echo get_template_directory_uri().'/screenshot.png'; ?>">
                <p class="margin-bottom-0"><span class="c4d-element-button"><?php _e('Go To Import', 'tet30'); ?></span></p>
              </a>
            </div>
          </div>
        </div>

        <div class="c4d-block">
          <div class="c4d-block-header">
            <h3 class="c4d-block-title">
              <span class="dashicons dashicons-sos"></span>
              <span><?php _e('Five Star Support', 'tet30'); ?></span>
            </h3>
          </div>
          <div class="c4d-block-body">
            <p><?php _e('Got a question? Get in touch with Coffee4dev developers. We\'re happy to help!', 'tet30'); ?></p>
            <p><a href="http://coffee4dev.com/contact/" target="_blank" rel="noopener"><?php _e('Submit a Ticket', 'tet30'); ?></a></p>
          </div>
        </div>

    </div>
  </div>
</div>
