<?php
/**
 * @package C4D WordPress theme
 */

if ( ! function_exists( 'c4d_theme_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the categories, tags.
 *
 * Create your own c4d_theme_entry_meta() function to override in a child theme.
 */
function c4d_theme_entry_meta() {
  echo '<div class="post-meta">';
  if ( 'post' === get_post_type() ) {
    $author_avatar_size = apply_filters( 'c4d_theme_author_avatar_size', 49 );
    printf( '<span class="byline">%1$s<span class="author vcard">%2$s<a class="url fn n" href="%3$s">%4$s</a></span></span>',
      _x( 'By', 'by', 'tet30' ),
      get_avatar( get_the_author_meta( 'user_email' ), $author_avatar_size ),
      esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
      get_the_author()
    );
  }

  if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
    c4d_theme_entry_date();
  }

  if ( 'post' === get_post_type() ) {
    c4d_theme_entry_taxonomies();
  }

  if ( ! is_singular() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
    echo '<span class="comments-link">';
    comments_popup_link( sprintf( __( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'tet30' ), get_the_title() ) );
    echo '</span>';
  }
  echo '</div>';
}
endif;

if ( ! function_exists( 'c4d_theme_entry_date' ) ) :
/**
 * Prints HTML with date information for current post.
 *
 * Create your own c4d_theme_entry_date() function to override in a child theme.
 */
function c4d_theme_entry_date() {
  $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
  $time_string = sprintf( $time_string,
    esc_attr( get_the_date( 'c' ) ),
    get_the_date()
  );

  printf( '<span class="posted-on"><i class="ion-ios-clock-outline"></i><a href="%1$s" rel="bookmark">%2$s</a></span>',
    esc_url( get_permalink() ),
    $time_string
  );
}
endif;

if ( ! function_exists( 'c4d_theme_entry_taxonomies' ) ) :
/**
 * Prints HTML with category and tags for current post.
 *
 * Create your own c4d_theme_entry_taxonomies() function to override in a child theme.
 */
function c4d_theme_entry_taxonomies() {
  $categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'tet30' ) );
  if ( $categories_list ) {
    printf( '<span class="cat-links"><i class="ion-ios-albums-outline"></i>%1$s</span>',
      $categories_list
    );

  }

  $tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'tet30' ) );
  if ( $tags_list ) {
    printf( '<span class="tags-links"><i class="ion-ios-pricetag-outline"></i> %1$s</span>',
      $tags_list
    );
  }
}
endif;

if ( ! function_exists( 'c4d_theme_post_thumbnail' ) ) :
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 *
 * Create your own c4d_theme_post_thumbnail() function to override in a child theme.
 */
function c4d_theme_post_thumbnail() {
  if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
    return;
  }

  if ( is_singular() ) :
  ?>

  <div class="post-thumbnail">
    <?php the_post_thumbnail(); ?>
  </div><!-- .post-thumbnail -->

  <?php else : ?>

  <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
    <?php the_post_thumbnail( 'large', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
  </a>

  <?php endif; // End is_singular()
}
endif;

if ( ! function_exists( 'c4d_theme_excerpt' ) ) :
  /**
   * Displays the optional excerpt.
   *
   * Wraps the excerpt in a div element.
   *
   * Create your own c4d_theme_excerpt() function to override in a child theme.
   */
  function c4d_theme_excerpt( $class = 'entry-summary' ) {
    $class = esc_attr( $class );

    if ( has_excerpt() || is_search() ) { ?>
      <div class="<?php echo $class; ?>">
        <?php the_excerpt(); ?>
      </div><!-- .<?php echo $class; ?> -->
    <?php } else { ?>
      <div class="<?php echo $class; ?>">
        <?php
          echo wp_trim_words( get_the_content(), 60, c4d_theme_continue_reading() );
        ?>
      </div><!-- .<?php echo $class; ?> -->
    <?php }
  }
endif;

if ( ! function_exists( 'c4d_theme_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * Create your own c4d_theme_excerpt_more() function to override in a child theme.
 */
function c4d_theme_excerpt_more() {
  $link = c4d_theme_continue_reading();
  return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'c4d_theme_excerpt_more' );
endif;

function c4d_theme_continue_reading() {
  return sprintf( '<div class="tet30-more-link"><a href="%1$s" class="more-link">%2$s</a></div>',
    esc_url( get_permalink( get_the_ID() ) ),
    __( 'Continue reading', 'tet30' )
  );
}

/**
 * Flushes out the transients used in c4d_theme_categorized_blog().
 */
function c4d_theme_category_transient_flusher() {
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
    return;
  }
  delete_transient( 'c4d_theme_categories' );
}
add_action( 'edit_category', 'c4d_theme_category_transient_flusher' );
add_action( 'save_post',     'c4d_theme_category_transient_flusher' );

if ( ! function_exists( 'c4d_theme_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 */
function c4d_theme_the_custom_logo() {
  if ( function_exists( 'the_custom_logo' ) ) {
    the_custom_logo();
  }
}
endif;

function c4d_theme_social_share() {
  if(function_exists('c4d_social_share_button')) {
    echo '<div class="tet30-share-this">';
    echo '<h3 class="title">'.esc_html__('Share this', 'tet30').'</h3>';
    echo c4d_social_share_button();
    echo '</div>';
  }
}
