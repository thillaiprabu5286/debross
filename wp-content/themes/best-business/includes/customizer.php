<?php
/**
 * Theme Customizer.
 *
 * @package Best_Business
 */

/**
 * Add Customizer options.
 *
 * @since 1.0.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function best_business_customize_register( $wp_customize ) {

	// Load custom controls.
	require_once trailingslashit( get_template_directory() ) . 'includes/customizer/control.php';

	// Load custom controls and sections.
	$wp_customize->register_control_type( 'Best_Business_Heading_Control' );
	$wp_customize->register_control_type( 'Best_Business_Message_Control' );
	$wp_customize->register_control_type( 'Best_Business_Dropdown_Taxonomies_Control' );
	$wp_customize->register_control_type( 'Best_Business_Dropdown_Sidebars_Control' );
	$wp_customize->register_section_type( 'Best_Business_Upsell_Section' );

	// Upsell section.
	$wp_customize->add_section(
		new Best_Business_Upsell_Section( $wp_customize, 'custom_theme_upsell',
			array(
				'title'    => esc_html__( 'Best Business Pro', 'best-business' ),
				'pro_text' => esc_html__( 'Buy Pro', 'best-business' ),
				'pro_url'  => 'http://axlethemes.com/downloads/best-business-pro/',
				'priority' => 1,
			)
		)
	);

	// Load helpers.
	require_once trailingslashit( get_template_directory() ) . 'includes/helpers.php';

	// Load customize sanitize.
	require_once trailingslashit( get_template_directory() ) . 'includes/customizer/sanitize.php';

	// Load customize callback.
	require_once trailingslashit( get_template_directory() ) . 'includes/customizer/callback.php';

	// Load customize option.
	require_once trailingslashit( get_template_directory() ) . 'includes/customizer/option.php';

	// Load slider customize option.
	require_once trailingslashit( get_template_directory() ) . 'includes/customizer/slider.php';

	// Modify default customizer options.
	$wp_customize->get_control( 'background_color' )->description = esc_html__( 'Note: Background Color is applicable in all pages except static front page.', 'best-business' );
}

add_action( 'customize_register', 'best_business_customize_register' );

/**
 * Register Customizer partials.
 *
 * @since 1.0.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function best_business_customizer_partials( WP_Customize_Manager $wp_customize ) {

	// Bail if selective refresh is not available.
	if ( ! isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->get_setting( 'blogname' )->transport        = 'refresh';
		$wp_customize->get_setting( 'blogdescription' )->transport = 'refresh';
		return;
	}

	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	// Register partial for blogname.
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector'            => '.site-title a',
		'container_inclusive' => false,
		'render_callback'     => 'best_business_customize_partial_blogname',
	) );

	// Register partial for blogdescription.
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector'            => '.site-description',
		'container_inclusive' => false,
		'render_callback'     => 'best_business_customize_partial_blogdescription',
	) );

}

add_action( 'customize_register', 'best_business_customizer_partials', 99 );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since 1.0.0
 *
 * @return void
 */
function best_business_customize_partial_blogname() {

	bloginfo( 'name' );

}

/**
 * Render the site title for the selective refresh partial.
 *
 * @since 1.0.0
 *
 * @return void
 */
function best_business_customize_partial_blogdescription() {

	bloginfo( 'description' );

}

/**
 * Register customizer controls scripts.
 *
 * @since 1.0.0
 */
function best_business_customize_controls_register_scripts() {

	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	wp_enqueue_style( 'best-business-customize-controls', get_template_directory_uri() . '/css/customize-controls' . $min . '.css', array(), '1.0.0' );
	wp_enqueue_script( 'best-business-customize-controls', get_template_directory_uri() . '/js/customize-controls' . $min . '.js', array( 'jquery', 'customize-controls' ), '1.0.0', true );
}

add_action( 'customize_controls_enqueue_scripts', 'best_business_customize_controls_register_scripts', 0 );
