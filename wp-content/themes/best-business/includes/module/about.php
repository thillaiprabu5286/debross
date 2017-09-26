<?php
/**
 * About
 *
 * @package Best_Business
 */

$config = array(
	'menu_name' => esc_html__( 'About Best Business', 'best-business' ),
	'page_name' => esc_html__( 'About Best Business', 'best-business' ),

	/* translators: theme version */
	'welcome_title' => sprintf( esc_html__( 'Welcome to %s - v', 'best-business' ), 'Best Business' ),

	/* translators: 1: theme name */
	'welcome_content' => sprintf( esc_html__( '%1$s is now installed and ready to use! We want to make sure you have the best experience using %1$s and that is why we gathered here all the necessary information for you. We hope you will enjoy using %1$s.', 'best-business' ), 'Best Business' ),

	// Quick links.
	'quick_links' => array(
		'theme_url' => array(
			'text' => esc_html__( 'Theme Details','best-business' ),
			'url'  => 'https://axlethemes.com/downloads/best-business/',
			),
		'demo_url' => array(
			'text' => esc_html__( 'View Demo','best-business' ),
			'url'  => 'https://axlethemes.com/theme-demo/?demo=best-business',
			),
		'documentation_url' => array(
			'text'   => esc_html__( 'View Documentation','best-business' ),
			'url'    => 'https://axlethemes.com/documentation/best-business/',
			'button' => 'primary',
			),
		'rate_url' => array(
			'text' => esc_html__( 'Rate This Theme','best-business' ),
			'url'  => 'https://wordpress.org/support/theme/best-business/reviews/',
			),
		),

	// Tabs.
	'tabs' => array(
		'getting_started'     => esc_html__( 'Getting Started', 'best-business' ),
		'recommended_actions' => esc_html__( 'Recommended Actions', 'best-business' ),
		'useful_plugins'      => esc_html__( 'Useful Plugins', 'best-business' ),
		'support'             => esc_html__( 'Support', 'best-business' ),
		'upgrade_to_pro'      => esc_html__( 'Upgrade to Pro', 'best-business' ),
	),

	// Getting started.
	'getting_started' => array(
		array(
			'title'               => esc_html__( 'Theme Documentation', 'best-business' ),
			'text'                => esc_html__( 'Even if you are a long-time WordPress user, we still believe you should give our documentation a very quick read.', 'best-business' ),
			'button_label'        => esc_html__( 'View documentation', 'best-business' ),
			'button_link'         => 'https://axlethemes.com/documentation/best-business/',
			'is_button'           => false,
			'recommended_actions' => false,
			'is_new_tab'          => true,
		),
		array(
			'title'               => esc_html__( 'Recommended Actions', 'best-business' ),
			'text'                => esc_html__( 'We have compiled a list of steps for you, to take make sure the experience you will have using one of our products is very easy to follow.', 'best-business' ),
			'button_label'        => esc_html__( 'Check recommended actions', 'best-business' ),
			'button_link'         => esc_url( admin_url( 'themes.php?page=best-business-about&tab=recommended_actions' ) ),
			'is_button'           => false,
			'recommended_actions' => false,
			'is_new_tab'          => false,
		),
		array(
			'title'               => esc_html__( 'Customize Everything', 'best-business' ),
			'text'                => esc_html__( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'best-business' ),
			'button_label'        => esc_html__( 'Go to Customizer', 'best-business' ),
			'button_link'         => esc_url( wp_customize_url() ),
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => false,
		),
	),

	// Recommended actions.
	'recommended_actions' => array(
		'content' => array(
			'front-page' => array(
				'title'       => esc_html__( 'Setting Static Front Page','best-business' ),
				'description' => esc_html__( 'Select A static page then Front page and Posts page to display front page specific sections. Note: If you import demo content using our Axle Demo Importer plugin, static page will be set automatically.', 'best-business' ),
				'id'          => 'front-page',
				'check'       => ( 'page' === get_option( 'show_on_front' ) ) ? true : false,
				'help'        => '<a href="' . esc_url( admin_url( 'customize.php' ) ) . '?autofocus[section]=static_front_page" class="button button-secondary">' . esc_html__( 'Static Front Page', 'best-business' ) . '</a>',
			),
			'axle-demo-importer' => array(
				'title'       => esc_html__( 'Axle Demo Importer', 'best-business' ),
				'description' => esc_html__( 'Please install the Axle Demo Importer plugin to import the demo content.', 'best-business' ),
				'check'       => class_exists( 'Axle_Demo_Importer' ),
				'plugin_slug' => 'axle-demo-importer',
				'id'          => 'axle-demo-importer',
			),
			'axle-demo-importer-files' => array(
				'title'       => esc_html__( 'Demo Import File', 'best-business' ),
				'description' => esc_html__( 'Please download demo content zip file to import using Axle Demo Importer plugin.', 'best-business' ),
				'id'          => 'axle-demo-importer-files',
				'help'        => '<a href="https://raw.githubusercontent.com/axlethemes/demo-contents/master/files/best-business.zip">' . esc_html__( 'Download File', 'best-business' ) . '</a>',
			),
		),
	),

	// Useful plugins.
	'useful_plugins' => array(
		'description'        => esc_html__( 'This theme supports some helpful WordPress plugins to enhance your website.', 'best-business' ),
		'plugins_list_title' => esc_html__( 'Useful Plugins List:', 'best-business' ),
	),

	// Support.
	'support_content' => array(
		'first' => array(
			'title'        => esc_html__( 'Contact Support', 'best-business' ),
			'icon'         => 'dashicons dashicons-sos',
			'text'         => esc_html__( 'Got theme support question or found bug? Best place to ask your query is our dedicated Support forum.', 'best-business' ),
			'button_label' => esc_html__( 'Contact Support', 'best-business' ),
			'button_link'  => esc_url( 'https://axlethemes.com/support-forum/forum/best-business/' ),
			'is_button'    => true,
			'is_new_tab'   => true,
		),
		'second' => array(
			'title'        => esc_html__( 'Theme Documentation', 'best-business' ),
			'icon'         => 'dashicons dashicons-book-alt',
			'text'         => esc_html__( 'Please check our theme documentation for detailed information on how to setup and use theme.', 'best-business' ),
			'button_label' => esc_html__( 'View Documentation', 'best-business' ),
			'button_link'  => 'https://axlethemes.com/documentation/best-business/',
			'is_button'    => false,
			'is_new_tab'   => true,
		),
		'third' => array(
			'title'        => esc_html__( 'Pro Version', 'best-business' ),
			'icon'         => 'dashicons dashicons-products',
			'icon'         => 'dashicons dashicons-star-filled',
			'text'         => esc_html__( 'Upgrade to pro version for more exciting features and additional theme options.', 'best-business' ),
			'button_label' => esc_html__( 'View Pro Version', 'best-business' ),
			'button_link'  => 'https://axlethemes.com/downloads/best-business-pro/',
			'is_button'    => true,
			'is_new_tab'   => true,
		),
		'fourth' => array(
			'title'        => esc_html__( 'Pre-sale Queries', 'best-business' ),
			'icon'         => 'dashicons dashicons-cart',
			'text'         => esc_html__( 'Have any query before purchase, you are more than welcome to ask.', 'best-business' ),
			'button_label' => esc_html__( 'Pre-sale question?', 'best-business' ),
			'button_link'  => 'https://axlethemes.com/pre-sale-question/',
			'is_button'    => false,
			'is_new_tab'   => true,
		),
		'fifth' => array(
			'title'        => esc_html__( 'Customization Request', 'best-business' ),
			'icon'         => 'dashicons dashicons-admin-tools',
			'text'         => esc_html__( 'Needed any customization for the theme, you can request from here.', 'best-business' ),
			'button_label' => esc_html__( 'Customization Request', 'best-business' ),
			'button_link'  => 'https://axlethemes.com/customization-request/',
			'is_button'    => false,
			'is_new_tab'   => true,
		),
		'sixth' => array(
			'title'        => esc_html__( 'Child Theme', 'best-business' ),
			'icon'         => 'dashicons dashicons-admin-customizer',
			'text'         => esc_html__( 'If you want to customize theme file, you should use child theme rather than modifying theme file itself.', 'best-business' ),
			'button_label' => esc_html__( 'About child theme', 'best-business' ),
			'button_link'  => 'https://developer.wordpress.org/themes/advanced-topics/child-themes/',
			'is_button'    => false,
			'is_new_tab'   => true,
		),
	),

	// Upgrade.
	'upgrade_to_pro' => array(
		'description'  => esc_html__( 'Upgrade to pro version for more exciting features and additional theme options.', 'best-business' ),
		'button_label' => esc_html__( 'Upgrade to Pro', 'best-business' ),
		'button_link'  => 'https://axlethemes.com/downloads/best-business-pro/',
		'is_new_tab'   => true,
	),

);

Best_Business_About::init( apply_filters( 'best_business_about_filter', $config ) );
