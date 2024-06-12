<?php
/**
 * kolektyw-kreatywny Theme Customizer
 *
 * @package kolektyw-kreatywny
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function kolektyw_kreatywny_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'kolektyw_kreatywny_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'kolektyw_kreatywny_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'kolektyw_kreatywny_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function kolektyw_kreatywny_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function kolektyw_kreatywny_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function kolektyw_kreatywny_customize_preview_js() {
	wp_enqueue_script( 'kolektyw-kreatywny-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'kolektyw_kreatywny_customize_preview_js' );
