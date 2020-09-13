<?php
/**
*@package C4D WordPress theme
*Template Name: Page Narrow 
*/
get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();
			?>
			<header class="entry-header">
				<div class="tet30-main-width">
					<div class="container-fluid">
						<div class="row">
							<div class="col-sm-12">
								<?php 
									$style = '';
									$imgr = get_the_post_thumbnail_url();
									if ($imgr) {
										$style = 'style="background-image: url('.$imgr.')"';
									}
								?>
								<div class="entry-header-inner" <?php echo $style; ?>>
									<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header><!-- .entry-header -->
			<div class="tet30-main-width">
			<?php
			// Include the page content template.
			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
			echo '</div>';
			// End of the loop.
		endwhile;
		?>

	</main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>
