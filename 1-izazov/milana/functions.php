<?php

/**
 * Editor Color Palette
 *
 * Disable color picker and set custom color palette for the block editor.
 *
 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/
 */
function koderski_izazov_setup_theme_supported_features() {
	/**
	 * Disable custom colors in block Color Palettes
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-custom-colors-in-block-color-palettes
	 */
	add_theme_support( 'disable-custom-colors' );

	/**
	 * Block Color Palettes
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#block-color-palettes
	 */
	add_theme_support( 'editor-color-palette', array(
		array(
			'name'  => esc_attr__( 'Dark Green', 'koderski-izazov' ),
			'slug'  => 'dark-green',
			'color' => '#071e22',
		),
		array(
			'name'  => esc_attr__( 'Green', 'koderski-izazov' ),
			'slug'  => 'just-green',
			'color' => '#1d7874',
		),
		array(
			'name'  => esc_attr__( 'Light Green', 'koderski-izazov' ),
			'slug'  => 'light-green',
			'color' => '#679289',
		),
		array(
			'name'  => esc_attr__( 'Light Peach', 'koderski-izazov' ),
			'slug'  => 'light-peach',
			'color' => '#f4c095',
		),
		array(
			'name'  => esc_attr__( 'Red', 'koderski-izazov' ),
			'slug'  => 'just-red',
			'color' => '#ee2e31',
		),
	) );
}
add_action( 'after_setup_theme', 'koderski_izazov_setup_theme_supported_features' );
