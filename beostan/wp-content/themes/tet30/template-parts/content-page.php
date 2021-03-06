<?php
/**
 * @package C4D WordPress theme
 */
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
					?>
				</div><!-- .entry-content -->

				<?php
					edit_post_link(
						sprintf(
							/* translators: %s: Name of current post */
							__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'tet30' ),
							get_the_title()
						),
						'<footer class="entry-footer"><span class="edit-link">',
						'</span></footer><!-- .entry-footer -->'
					);
				?>
			</article><!-- #post-## -->
		</div>
	</div>
</div>


