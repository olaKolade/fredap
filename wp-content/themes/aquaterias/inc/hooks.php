<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
/**
 * Filters and Actions
 */

/**
 * Enqueue Google fonts style to admin screen for custom header display.
 *
 * @internal
 */
function aquaterias_action_theme_admin_fonts() {
	wp_enqueue_style( 'fw-theme-lato', aquaterias_font_url(), array(), '1.0' );
}

add_action( 'admin_print_scripts-appearance_page_custom-header', 'aquaterias_action_theme_admin_fonts' );

if ( ! function_exists( 'aquaterias_action_theme_setup' ) ) : /**
 * Theme setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 * @internal
 */ {
	function aquaterias_action_theme_setup() {

		/*
		 * Make Theme available for translation.
		 */
		load_theme_textdomain( 'aquaterias', get_template_directory() . '/languages' );

		// This theme styles the visual editor to resemble the theme style.
		add_editor_style( array( 'css/editor-style.css', aquaterias_font_url() ) );

		// Add RSS feed links to <head> for posts and comments.
		add_theme_support( 'automatic-feed-links' );

		// Enable support for Post Thumbnails, and declare two sizes.
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1150, 810, true );

		add_image_size( 'aquaterias-post', 1150, 600, true );	
		add_image_size( 'aquaterias-gallery', 755, 500, true );	
		add_image_size( 'aquaterias-client', 100, 100, true );	

		add_image_size( 'aquaterias-blog-thumb', 494, 348, true );	
		add_image_size( 'aquaterias-blog-mob', 719, 506, true );	

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'audio',
			'quote',
			'link',
			'gallery',
		) );

		// This theme uses its own gallery styles.
		add_filter( 'use_default_gallery_style', '__return_false' );
	}
	}
endif;
add_action( 'init', 'aquaterias_action_theme_setup' );

/**
 * Adjust content_width value for image attachment template.
 *
 * @internal
 */
function aquaterias_action_theme_content_width() {
	if ( is_attachment() && wp_attachment_is_image() ) {
		$GLOBALS['content_width'] = 770;
	}
}

add_action( 'template_redirect', 'aquaterias_action_theme_content_width' );

/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Presence of header image.
 * 3. Index views.
 * 4. Full-width content layout.
 * 5. Presence of footer widgets.
 * 6. Single views.
 * 7. Featured content layout.
 *
 * @param array $classes A list of existing body class values.
 *
 * @return array The filtered body class list.
 * @internal
 */
function aquaterias_filter_theme_body_classes( $classes ) {

	global $wp_query;

	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	if ( get_header_image() ) {
		$classes[] = 'header-image';
	} else {
		$classes[] = 'masthead-fixed';
	}

	if ( is_archive() || is_search() || is_home() ) {
		$classes[] = 'list-view';
	}

	if ( function_exists( 'fw_ext_sidebars_get_current_position' ) ) {
		$current_position = fw_ext_sidebars_get_current_position();
		if ( in_array( $current_position, array( 'full', 'left' ) )
		     || empty( $current_position )
		     || is_page_template( 'page-templates/full-width.php' )
		     || is_page_template( 'page-templates/contributors.php' )
		     || is_attachment()
		) {
			$classes[] = 'full-width';
		}
	} else {
		$classes[] = 'full-width';
	}

	if ( is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'footer-widgets';
	}

	if ( is_singular() && ! is_front_page() ) {
		$classes[] = 'singular';
	}

	if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' ) ) {
		$classes[] = 'slider';
	} elseif ( is_front_page() ) {
		$classes[] = 'grid';
	}

	$aquaterias_pace = 'disabled';
	if ( function_exists( 'fw' ) ) {

		$aquaterias_pace = fw_get_db_settings_option( 'page-loader' );
		if ( !empty($aquaterias_pace) AND !empty($aquaterias_pace['loader'])) $aquaterias_pace = $aquaterias_pace['loader'];
		
		$body_color = fw_get_db_post_option( $wp_query->get_queried_object_id(), 'body-color' );
		if ( !empty($body_color) AND $body_color != 'default' ) $classes[] = "body-".esc_attr($body_color);
	}
	$classes[] = 'paceloader-'.esc_attr($aquaterias_pace);

	return $classes;
}

add_filter( 'body_class', 'aquaterias_filter_theme_body_classes' );

/**
 * Extend the default WordPress post classes.
 *
 * Adds a post class to denote:
 * Non-password protected page with a post thumbnail.
 *
 * @param array $classes A list of existing post class values.
 *
 * @return array The filtered post class list.
 * @internal
 */
function aquaterias_filter_theme_post_classes( $classes ) {
	if ( ! post_password_required() && ! is_attachment() && has_post_thumbnail() ) {
		$classes[] = 'has-post-thumbnail';
	}

	return $classes;
}

add_filter( 'post_class', 'aquaterias_filter_theme_post_classes' );

/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 *
 * @return string The filtered title.
 * @internal
 */
function aquaterias_filter_theme_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( esc_html__( 'Page %s', 'aquaterias' ), max( $paged, $page ) );
	}

	return $title;
}

add_filter( 'wp_title', 'aquaterias_filter_theme_wp_title', 10, 2 );


/**
 * Flush out the transients used in aquaterias_categorized_blog.
 *
 * @internal
 */
function aquaterias_action_theme_category_transient_flusher() {

	delete_transient( 'aquaterias_category_count' );
}

add_action( 'edit_category', 'aquaterias_action_theme_category_transient_flusher' );
add_action( 'save_post', 'aquaterias_action_theme_category_transient_flusher' );

/**
 * Theme Customizer support
 */
{
	/**
	 * Implement Theme Customizer additions and adjustments.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 *
	 * @internal
	 */
	function aquaterias_action_theme_customize_register( $wp_customize ) {
		// Add custom description to Colors and Background sections.
		$wp_customize->get_section( 'colors' )->description           = esc_html__( 'Background may only be visible on wide screens.',
		'aquaterias' );
		$wp_customize->get_section( 'background_image' )->description = esc_html__( 'Background may only be visible on wide screens.',
		'aquaterias' );

		// Add postMessage support for site title and description.
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

		// Rename the label to "Site Title Color" because this only affects the site title in this theme.
		$wp_customize->get_control( 'header_textcolor' )->label = esc_html__( 'Site Title Color', 'aquaterias' );

		// Rename the label to "Display Site Title & Tagline" in order to make this option extra clear.
		$wp_customize->get_control( 'display_header_text' )->label = esc_html__( 'Display Site Title &amp; Tagline', 'aquaterias' );

		// Add the featured content layout setting and control.
		$wp_customize->add_setting( 'featured_content_layout', array(
			'default'           => 'grid',
			'sanitize_callback' => 'aquaterias_theme_sanitize_layout',
		) );

		$wp_customize->add_control( 'featured_content_layout', array(
			'label'   => esc_html__( 'Layout', 'aquaterias' ),
			'section' => 'featured_content',
			'type'    => 'select',
			'choices' => array(
			'grid'   => esc_html__( 'Grid', 'aquaterias' ),
			'slider' => esc_html__( 'Slider', 'aquaterias' ),
			),
		) );
	}

	add_action( 'customize_register', 'aquaterias_action_theme_customize_register' );

	/**
	 * Sanitize the Featured Content layout value.
	 *
	 * @param string $layout Layout type.
	 *
	 * @return string Filtered layout type (grid|slider).
	 * @internal
	 */
	function aquaterias_theme_sanitize_layout( $layout ) {
		if ( ! in_array( $layout, array( 'grid', 'slider' ) ) ) {
			$layout = 'grid';
		}

		return $layout;
	}

	/**
	 * Bind JS handlers to make Theme Customizer preview reload changes asynchronously.
	 *
	 * @internal
	 */
	function aquaterias_action_theme_customize_preview_js() {
		wp_enqueue_script(
			'fw-theme-customizer',
			get_template_directory_uri() . '/js/customizer.js',
			array( 'customize-preview' ),
			'1.0',
			true
		);
	}

	add_action( 'customize_preview_init', 'aquaterias_action_theme_customize_preview_js' );
}

if ( defined( 'FW' ) ) :
	/**
	 * Display current submitted FW_Form errors
	 *
	 * @return array
	 */
	if ( ! function_exists( 'aquaterias_action_theme_display_form_errors' ) ) :
		function aquaterias_action_theme_display_form_errors() {
			$form = FW_Form::get_submitted();

			if ( ! $form || $form->is_valid() ) {
				return;
			}

			wp_enqueue_script(
				'fw-theme-show-form-errors',
				get_template_directory_uri() . '/js/form-errors.js',
				array( 'jquery' ),
				'1.0',
				true
			);

			wp_localize_script( 'fw-theme-show-form-errors', '_localized_form_errors', array(
				'errors'  => $form->get_errors(),
				'form_id' => $form->get_id(),
			) );
		}
	endif;
	add_action( 'wp_enqueue_scripts', 'aquaterias_action_theme_display_form_errors' );
endif;


/**
 * @param FW_Ext_Backups_Demo[] $demos
 * @return FW_Ext_Backups_Demo[]
 */
function aquaterias_filter_theme_fw_ext_backups_demos( $demos ) {
	$demos_array = array(
		'aquaterias-demo' => array(
			'title' => esc_html__( 'Aquaterias Demo Content', 'aquaterias' ),
			'screenshot' => 'http://updates.like-themes.com/aquaterias/screenshot.png',
			'preview_link' => 'http://aquaterias.like-themes.com/',
		),
	);

	$download_url = 'http://updates.like-themes.com/aquaterias/?v='.esc_attr(wp_get_theme(get_template())->version);

	foreach ( $demos_array as $id => $data ) {
		$demo = new FW_Ext_Backups_Demo($id, 'piecemeal', array(
			'url' => $download_url,
			'file_id' => $id,
		));
		$demo->set_title( $data['title'] );
		$demo->set_screenshot( $data['screenshot'] );
		$demo->set_preview_link( $data['preview_link'] );

		$demos[ $demo->get_id() ] = $demo;

		unset( $demo );
	}

	return $demos;
}
add_filter( 'fw:ext:backups-demo:demos', 'aquaterias_filter_theme_fw_ext_backups_demos' );

