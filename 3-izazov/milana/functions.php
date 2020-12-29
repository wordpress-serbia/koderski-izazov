<?php
/**
 * Storefront engine room
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package storefront
 */
/**
 * Get all Black variations and display them
 * before all products on Shop page.
 *
 * This function is hooked to 'woocommerce_before_main_content' action hook.
 *
 * @link https://woocommerce.github.io/code-reference/files/woocommerce-templates-archive-product.html#source-view.29
 * @link http://hookr.io/actions/woocommerce_before_main_content/
 */
function storefront_woocommerce_before_shop_loop() {
	// Make sure we're adding this only on Shop page.
	if ( is_shop() ) :

		global $woocommerce;

		$args = array(
			'post_type'      => 'product_variation',
			'posts_per_page' => -1,
			'meta_query' => array(
				array(
					'key'     => 'attribute_pa_color',
					'value'   => 'black',
					'compare' => '=',
				)
			),
		);

		$black_ladas = new WP_Query( $args );

		if ( $black_ladas->have_posts() ) :
			?>
			<header class="woocommerce-products-header">
				<h1 class="woocommerce-products-header__title page-title"><?php esc_html_e( 'Black Lada Sale', 'storefront' ); ?></h1>
			</header>

			<ul class="products columns-3">
			<?php
			while ( $black_ladas->have_posts() ) :  $black_ladas->the_post();

				wc_get_template_part( 'content', 'product' );

			endwhile;
			?>
			</ul>
		<?php endif; // $black_ladas->have_posts()
		wp_reset_postdata();
	endif; // is_shop()
}
add_action( 'woocommerce_before_main_content', 'storefront_woocommerce_before_shop_loop' );

/**
 * Filter Shop page title.
 *
 * @link https://woocommerce.github.io/code-reference/files/woocommerce-includes-wc-template-functions.html#source-view.1093
 * @link http://hookr.io/filters/woocommerce_page_title/
 *
 * @param   string  $title  Page title.
 *
 * @return  string          Returns filtered page title.
 */
function storefront_woocommerce_page_title( $title ) {
	// Make sure we're adding this only on Shop page.
	if ( is_shop() ) :
		$title = esc_html__( 'Marvelous Lada Niva', 'storefront' );
	endif; // is_shop()

	return $title;
}
add_filter( 'woocommerce_page_title', 'storefront_woocommerce_page_title' );