<?php
/**
 * @package C4D WordPress theme
 */

get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'tet30' ); ?></h1>
				</header><!-- .page-header -->
				<div class="page-content">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'tet30' ); ?></p>
					<p><a class="tet30-button-1" href="<?php echo esc_url(site_url()); ?>"><?php _e('Go to home page', 'tet30'); ?></a></p>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</main><!-- .site-main -->
		<?php get_sidebar( 'content-bottom' ); ?>
	</div><!-- .content-area -->
<?php get_footer(); ?>
