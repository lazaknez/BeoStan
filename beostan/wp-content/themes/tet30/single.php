<?php
/**
 * @package C4D WordPress theme
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

	<?php
	// Start the loop.
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
	while ( have_posts() ) : the_post();

		/*
		 * Include the post format-specific template for the content. If you want to
		 * use this in a child theme, then include a file called called content-___.php
		 * (where ___ is the post format) and that will be used instead.
		 */
		?>
		<div class="entry-header">
			<div class="tet30-main-width">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-12">
							<?php 
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
							echo '<div class="col-sm-'.esc_attr($leftCol).'">';
							echo '<div class="tet30-category-left-col">';
							dynamic_sidebar('left');
							echo '</div>';
							echo '</div>';
						}
					?>
					<div class="col-sm-<?php echo esc_attr($mainCol - $rightCol - $leftCol); ?>">
						<?php
						get_template_part( 'template-parts/content', get_post_format() );
						
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>
					</div>
					<?php 
						if ($rightCol > 0) {
							echo '<div class="col-sm-'.esc_attr($rightCol).'">';
							echo '<div class="tet30-category-right-col">';
							dynamic_sidebar('right');
							echo '</div>';
							echo '</div>';
						}
					?>
				</div>
			</div>
		</div>
	<?php
	endwhile; // End the loop.
	?>
	</main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>
