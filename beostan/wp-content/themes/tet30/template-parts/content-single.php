<?php
/**
 * @package C4D WordPress theme
 */
$mainCol = 12;
$rightCol = 0;
$leftCol = 0;
if (is_active_sidebar('right')) {
	$rightCol = 3;
}
if (is_active_sidebar('left')) {
	$leftCol = 3;
}

?>
<div class="container-fluid">
	<div class="row">
		<?php 
			if ($leftCol > 0) {
				echo '<div class="col-sm-'.esc_attr($leftCol).'">';
				echo '<div class="tet30-shop-category-left-col">';
				dynamic_sidebar('left');
				echo '</div>';
				echo '</div>';
			}
		?>
		<div class="col-sm-<?php echo esc_attr($mainCol - $rightCol - $leftCol); ?>">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->
				
				<div class="entry-content">
					<?php
						the_content();

						wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'tet30' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
							'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'tet30' ) . ' </span>%',
							'separator'   => '<span class="screen-reader-text">, </span>',
						) );

						if ( '' !== get_the_author_meta( 'description' ) ) {
							get_template_part( 'template-parts/biography' );
						}
					?>
				</div><!-- .entry-content -->

				<footer class="entry-footer">
					<?php //tet30_entry_meta(); ?>
					<?php
						edit_post_link(
							sprintf(
								/* translators: %s: Name of current post */
								__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'tet30' ),
								get_the_title()
							),
							'<span class="edit-link">',
							'</span>'
						);
					?>
				</footer><!-- .entry-footer -->
			</article><!-- #post-## -->		
		</div>
		<?php 
			if ($rightCol > 0) {
				echo '<div class="col-sm-'.esc_attr($rightCol).'">';
				echo '<div class="tet30-shop-category-right-col">';
				dynamic_sidebar('right');
				echo '</div>';
				echo '</div>';
			}
		?>
	</div>
</div>
