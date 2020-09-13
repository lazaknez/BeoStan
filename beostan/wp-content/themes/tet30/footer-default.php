<?php 
  global $tet30;
?>
<footer id="colophon" class="site-footer" role="contentinfo">
  <?php if ( is_active_sidebar( 'footer-top' )  ) : ?>
    <?php dynamic_sidebar( 'footer-top' ); ?>
  <?php endif; ?>
  <?php if ( is_active_sidebar( 'footer-1' ) 
          || is_active_sidebar( 'footer-2' )
          || is_active_sidebar( 'footer-3' )
          || is_active_sidebar( 'footer-4' )
          || is_active_sidebar( 'footer-5' )
   ) : ?>
  <div class="tet30-footer-top">
    <div class="tet30-main-width">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-3">
            <?php if ( is_active_sidebar( 'footer-1' )  ) : ?>
                <?php dynamic_sidebar( 'footer-1' ); ?>
            <?php endif; ?>
          </div>
          <div class="col-sm-2">
            <?php if ( is_active_sidebar( 'footer-2' )  ) : ?>
                <?php dynamic_sidebar( 'footer-2' ); ?>
            <?php endif; ?>
          </div>
          <div class="col-sm-2">
            <?php if ( is_active_sidebar( 'footer-3' )  ) : ?>
                <?php dynamic_sidebar( 'footer-3' ); ?>
            <?php endif; ?>
          </div>
          <div class="col-sm-2">
            <?php if ( is_active_sidebar( 'footer-4' )  ) : ?>
                <?php dynamic_sidebar( 'footer-4' ); ?>
            <?php endif; ?>
          </div>
          <div class="col-sm-3">
            <?php if ( is_active_sidebar( 'footer-5' )  ) : ?>
                <?php dynamic_sidebar( 'footer-5' ); ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>
  <div class="tet30-footer-bottom">
    <div class="tet30-main-width">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-4">
            <?php if (isset( $tet30['copyright'])) { ?>
              <div class="tet30-copyright">
                <?php echo wp_kses_post($tet30['copyright']); ?>
              </div>
            <?php } else { ?>
              <div class="tet30-copyright">
                <?php echo __('All Rights Reserved.', 'tet30'); ?>
              </div>
            <?php } ?>
          </div>
          <div class="col-sm-4">
            <?php if ( is_active_sidebar( 'footer' )  ) : ?>
                <?php dynamic_sidebar( 'footer' ); ?>
            <?php endif; ?>
          </div>
          <div class="col-sm-4">
            <?php if (isset( $tet30['footer-social'])): ?>
              <div class="tet30-copyright">
                <?php echo wp_kses_post($tet30['footer-social']); ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer><!-- .site-footer -->