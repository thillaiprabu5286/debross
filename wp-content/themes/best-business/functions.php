<?php
/**
 * Theme functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package Best_Business
 */

if ( ! function_exists( 'best_business_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function best_business_setup() {

		// Make theme available for translation.
		load_theme_textdomain( 'best-business' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails.
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'best-business-thumb', 360, 270 );

		// Register nav menus.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'best-business' ),
			'top'     => esc_html__( 'Top Menu', 'best-business' ),
			'footer'  => esc_html__( 'Footer Menu', 'best-business' ),
			'social'  => esc_html__( 'Social Menu', 'best-business' ),
		) );

		// Add support for HTML5 markup.
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'best_business_custom_background_args', array(
			'default-color' => 'FFFFFF',
			'default-image' => '',
		) ) );

		// Enable support for selective refresh of widgets in Customizer.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Enable support for custom logo.
		add_theme_support( 'custom-logo', array(
			'width'       => 300,
			'height'      => 100,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		// Add WooCommerce support.
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-lightbox' );

		$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		// Enable admin editor style.
		add_editor_style( array( best_business_fonts_url(), 'css/editor-style' . $min . '.css' ) );

		add_theme_support( 'custom-header', apply_filters( 'best_business_custom_header_args', array(
			'default-image' => get_template_directory_uri() . '/images/custom-header.jpg',
			'width'         => 1920,
			'height'        => 490,
			'flex-height'   => true,
			'header-text'   => false,
		) ) );

		// Register default custom headers.
		register_default_headers( array(
			'business-time' => array(
				'url'           => '%s/images/custom-header.jpg',
				'thumbnail_url' => '%s/images/custom-header.jpg',
				'description'   => esc_html_x( 'Business Time', 'header image description', 'best-business' ),
			),
		) );

		// Declare support for demo importer.
		$importer_content = array(
			'static_front_page' => true,
			'static_page'       => 'home',
			'posts_page'        => 'blog',
			'menu_locations'    => array(
				'primary' => 'main-menu',
				'top'     => 'top-menu',
				'social'  => 'social-menu',
				),
			);
		add_theme_support( 'axle-demo-importer', $importer_content );
	}

endif;

add_action( 'after_setup_theme', 'best_business_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function best_business_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'best_business_content_width', 640 );
}
add_action( 'after_setup_theme', 'best_business_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function best_business_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'best-business' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to appear in your Primary Sidebar.', 'best-business' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Secondary Sidebar', 'best-business' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here to appear in your Secondary Sidebar.', 'best-business' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Front Page Widget Area', 'best-business' ),
		'id'            => 'sidebar-front-page-widget-area',
		'description'   => esc_html__( 'Add widgets here to appear in your Static Front Page.', 'best-business' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="container">',
		'after_widget'  => '</div></aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '<span class="divider"></span></h2>',
	) );
	register_sidebar( array(
		'name'          => sprintf( esc_html__( 'Footer %d', 'best-business' ), 1 ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => sprintf( esc_html__( 'Footer %d', 'best-business' ), 2 ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => sprintf( esc_html__( 'Footer %d', 'best-business' ), 3 ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => sprintf( esc_html__( 'Footer %d', 'best-business' ), 4 ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'best_business_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function best_business_scripts() {

	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/vendors/font-awesome/css/font-awesome' . $min . '.css', '', '4.7.0' );

	$fonts_url = best_business_fonts_url();
	if ( ! empty( $fonts_url ) ) {
		wp_enqueue_style( 'best-business-google-fonts', $fonts_url, array(), null );
	}

    wp_enqueue_style( 'bootstrap.min.css', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '1.12.4' );
    wp_enqueue_style( 'best-business-customize-controls', get_template_directory_uri() . '/css/jquery-ui.css', array(), '1.12.4' );
    wp_enqueue_script( 'best-business-customize-controls', get_template_directory_uri() . '/js/jquery-ui.js', array( 'jquery', 'customize-controls' ), '1.12.4', true );

	wp_enqueue_style( 'jquery-sidr', get_template_directory_uri() . '/vendors/sidr/css/jquery.sidr.dark' . $min . '.css', '', '2.2.1' );

	wp_enqueue_style( 'best-business-style', get_stylesheet_uri(), array(), '1.0.6' );

	wp_enqueue_script( 'best-business-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix' . $min . '.js', array(), '20130115', true );

	wp_enqueue_script( 'jquery-cycle2', get_template_directory_uri() . '/vendors/cycle2/js/jquery.cycle2' . $min . '.js', array( 'jquery' ), '2.1.6', true );

	wp_enqueue_script( 'jquery-sidr', get_template_directory_uri() . '/vendors/sidr/js/jquery.sidr' . $min . '.js', array( 'jquery' ), '2.2.1', true );

	wp_enqueue_script( 'best-business-custom', get_template_directory_uri() . '/js/custom' . $min . '.js', array( 'jquery' ), '1.0.1', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'best_business_scripts' );

// Load starting file.
require_once trailingslashit( get_template_directory() ) . 'includes/start.php';


// Our custom post type function
function colocation_posttype() {

    register_post_type( 'colocation',
        // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Colocation' ),
                'singular_name' => __( 'Colocation' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'colocation'),
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'colocation_posttype' );

/*
* Creating a function to create our CPT
*/

function colocation_post_type() {

// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Colocation', 'Post Type General Name', 'twentythirteen' ),
        'singular_name'       => _x( 'Colocation', 'Post Type Singular Name', 'twentythirteen' ),
        'menu_name'           => __( 'Colocation', 'twentythirteen' ),
        'parent_item_colon'   => __( 'Parent Colocation', 'twentythirteen' ),
        'all_items'           => __( 'All Colocation', 'twentythirteen' ),
        'view_item'           => __( 'View Colocation', 'twentythirteen' ),
        'add_new_item'        => __( 'Add New Colocation', 'twentythirteen' ),
        'add_new'             => __( 'Add New', 'twentythirteen' ),
        'edit_item'           => __( 'Edit Colocation', 'twentythirteen' ),
        'update_item'         => __( 'Update Colocation', 'twentythirteen' ),
        'search_items'        => __( 'Search Colocation', 'twentythirteen' ),
        'not_found'           => __( 'Not Found', 'twentythirteen' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
    );

// Set other options for Custom Post Type

    $args = array(
        'label'               => __( 'colocation', 'twentythirteen' ),
        'description'         => __( 'Colocation Packages', 'twentythirteen' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'thumbnail', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy.
        'taxonomies'          => array( 'genres' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );

    // Registering your Custom Post Type
    register_post_type( 'colocation', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/

add_action( 'init', 'colocation_post_type', 0 );

function add_my_post_types_to_query( $query ) {
    if ( is_home() && $query->is_main_query() )
        $query->set( 'post_type', array( 'post', 'colocation' ) );
    return $query;
}

add_action( 'pre_get_posts', 'add_my_post_types_to_query' );

add_action('init', 'my_rem_editor_from_post_type');
function my_rem_editor_from_post_type() {
    remove_post_type_support( 'colocation', 'editor' );
}


/**
 * Get site url for links
 *
 * @author WPSnacks.com
 * @link http://www.wpsnacks.com
 */
function theme_url_shortcode( $attrs = array (), $content = '' ) {

    $siteUrl = ( is_child_theme() ? get_stylesheet_directory_uri() : get_template_directory_uri() );

    return $siteUrl;

}
add_shortcode('site-url', 'theme_url_shortcode' );
