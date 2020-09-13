<?php
/**
 * @package C4D WordPress theme
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="media-attachment">
		<?php tet30_post_thumbnail(); ?>
	</div>
	<div class="content-body">
		<div class="entry-header">
			<?php if (is_single()){ ?>
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<?php } else { ?>
				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			<?php } ?>
			<?php tet30_entry_meta(); ?>
		</div>
		
		<?php tet30_excerpt(); ?>

		<?php if(is_single()): ?>
			<div class="entry-content"><?php the_content(); ?></div><!-- .entry-content -->
			<?php tet30_social_share(); ?>
			<div class="tet30-next-prev-post">
				<div class="row">
					<div class="col-sm-6">
						<div class="prev-post">
						<?php 
							$prevPost = get_previous_post();
							if ($prevPost) {
		        		$prevthumbnail = get_the_post_thumbnail($prevPost->ID, 'medium');
		        		$prevTitle = '<h3><span>'.esc_html__('Previous Post', 'tet30').'</span>'.get_the_title($prevPost->ID).'</h3>';
		        		previous_post_link('%link',''.$prevTitle.$prevthumbnail.'');
			        }
						?>	
						</div>
					</div>
					<div class="col-sm-6">
						<div class="next-post">
						<?php 
							$nextPost = get_next_post();
							if ($nextPost) {
								$nextthumbnail = get_the_post_thumbnail($nextPost->ID, 'medium');
		        		$nextTitle = '<h3><span>'.esc_html__('Next Post', 'tet30').'</span>'.get_the_title($nextPost->ID).'</h3>';
		        		next_post_link('%link',''.$nextTitle.$nextthumbnail.'');	
							}
	        	?>
						</div>
					</div>
				</div>
			</div>
			<?php 
				if ( '' !== get_the_author_meta( 'description' ) ) {
					get_template_part( 'template-parts/biography' );
				}
			?>
		<?php endif; ?>
	</div>
</article><!-- #post-## -->		
	
