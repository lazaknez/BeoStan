<?php
/**
 * @package C4D WordPress theme
 */
global $tet30;
$mainCol = 12;
$rightCol = 0;
$leftCol = 0;
$leftSidebar = 'left';
$rightSidebar = 'right';

if (isset($_GET['sidebar_pos'])) {
	$showSidebar = esc_attr($_GET['sidebar_pos']);
	if ($showSidebar == 'left') {
		$leftSidebar = 'right';
		$rightSidebar = 'left';
	}
}

if (is_active_sidebar($rightSidebar)) {
	$rightCol = isset($tet30['blog-sidebar-right']) && $tet30['blog-sidebar-right'] != '' ? $tet30['blog-sidebar-right'] : 3;

}
if (is_active_sidebar($leftSidebar)) {
	$leftCol = isset($tet30['blog-sidebar-left']) && $tet30['blog-sidebar-left'] != '' ? $tet30['blog-sidebar-left'] : 3;
}

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>
			<div class="archive entry-header">
				<div class="tet30-main-width">
					<div class="container-fluid">
						<div class="row">
							<div class="col-sm-12">
								<?php
									the_archive_title( '<h1 class="page-title">', '</h1>' );
									the_archive_description( '<div class="taxonomy-description">', '</div>' );
									if ( function_exists('yoast_breadcrumb') ) {
										echo yoast_breadcrumb('<p id="breadcrumbs">','</p>');
									}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tet30-main-width">
				<div class="container-fluid">
					<div class="row">
						<?php
							if ($leftCol > 0) {
								echo '<div class="sidebar col-sm-'.esc_attr($leftCol).'">';
								echo '<div class="tet30-category-left-col">';
								dynamic_sidebar($leftSidebar);
								echo '</div>';
								echo '</div>';
							}
						?>
						<div class="col-sm-<?php echo esc_attr($mainCol - $rightCol - $leftCol); ?>">
							<?php
							// Start the Loop.
							while ( have_posts() ) : the_post();
								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', get_post_format() );

							// End the loop.
							endwhile;

							// Previous/next page navigation.
							the_posts_pagination( array(
								'prev_text'          => __( 'Previous page', 'tet30' ),
								'next_text'          => __( 'Next page', 'tet30' ),
								'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'tet30' ) . ' </span>',
							) );

							// If no content, include the "No posts found" template.
							else :
								get_template_part( 'template-parts/content', 'none' );

							endif;
							?>
						</div>
						<?php
							if ($rightCol > 0) {
								echo '<div class="sidebar col-sm-'.esc_attr($rightCol).'">';
								echo '<div class="tet30-category-right-col">';
								dynamic_sidebar($rightSidebar);
								echo '</div>';
								echo '</div>';
							}
						?>
					</div>
				</div>
			</div>
		</main><!-- .site-main -->
	</div><!-- .content-area -->
<?php get_footer(); ?>
