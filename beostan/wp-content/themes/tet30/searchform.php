<?php
/**
 * @package C4D WordPress theme
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'tet30' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<input type="hidden" value="post" name="post_type" id="post_type" />
	<button type="submit" class="search-submit"><?php echo _x( 'Search', 'submit button', 'tet30' ); ?></button>
</form>
