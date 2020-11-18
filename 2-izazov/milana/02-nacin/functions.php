<?php
/**
 * Child Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package twentytwenty-child
 */

add_action( 'wp_enqueue_scripts', 'twentytwenty_parent_theme_enqueue_styles' );

/**
 * Enqueue scripts and styles.
 */
function twentytwenty_parent_theme_enqueue_styles() {
	wp_enqueue_style(
		'twentytwenty-style',
		get_template_directory_uri() . '/style.css'
	);
	wp_enqueue_style(
		'twenty-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( 'twentytwenty-style' )
	);
}

/**
 * Overwrite default more tag with styling and screen reader markup.
 *
 * @link https://core.trac.wordpress.org/browser/tags/5.5.1/src/wp-includes/post-template.php#L369
 *
 * @param string $more_link_element  Read More link element.
 * @param string $more_link_text     Read More text.
 *
 * @return string  Returns filtered Read More link
 */
function twentytwenty_child_the_content_more_link( $more_link_element, $more_link_text ) {
	$more_link_text = esc_html( 'Go on, if you really must &rarr;', 'twentytwenty-child' );

	return '<a href="' . get_permalink( get_the_ID() ) . '#more-' . get_the_ID() . '" class="more-link">' . $more_link_text . '</a>';
}
add_filter( 'the_content_more_link', 'twentytwenty_child_the_content_more_link', 11, 2 );
