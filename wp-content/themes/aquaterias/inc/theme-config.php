<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

/**
 * Theme Configuration
 */


/*
* Adding additional TinyMCE options
*/
function aquaterias_wpb_mce_buttons_2($buttons) {
    array_unshift($buttons, 'styleselect');
    return $buttons;
}
add_filter('mce_buttons_2', 'aquaterias_wpb_mce_buttons_2');

function aquaterias_mce_before_init_insert_formats( $init_array ) {  

    $style_formats = array(

        array(  
            'title' => esc_html__('Main Color', 'aquaterias'),
            'block' => 'span',  
            'classes' => 'color-main',
            'wrapper' => true,
        ),  
        array(  
            'title' => esc_html__('Second Color', 'aquaterias'),
            'block' => 'span',  
            'classes' => 'color-second',
            'wrapper' => true,
        ),
        array(  
            'title' => esc_html__('White Color', 'aquaterias'),
            'block' => 'span',  
            'classes' => 'color-white',
            'wrapper' => true,   
        ),
        array(  
            'title' => esc_html__('Large Text', 'aquaterias'),
            'block' => 'span',  
            'classes' => 'text-large',
            'wrapper' => true,
             
        ),  
        array(  
            'title' => esc_html__('Small Text', 'aquaterias'),
            'block' => 'span',  
            'classes' => 'text-small',
            'wrapper' => true, 
        ),
        array(  
            'title' => esc_html__('Extra Small Text', 'aquaterias'),
            'block' => 'span',  
            'classes' => 'text-xsmall',
            'wrapper' => true, 
        ),        
        array(  
            'title' => esc_html__('Double Line Height', 'aquaterias'), 
            'block' => 'span',  
            'classes' => 'line-height-2',
            'wrapper' => true, 
        ),        
        array(  
            'title' => esc_html__('List Arrow', 'aquaterias'),
            'selector' => 'ul',
            'classes' => 'ul-arrow',
        ),          
        array(  
            'title' => esc_html__('List Checked', 'aquaterias'),
            'selector' => 'ul',
            'classes' => 'check',
        ),        
        array(  
            'title' => esc_html__('List Two Column', 'aquaterias'),
            'selector' => 'ul',
            'classes' => 'two-col',
        ),            
    );  
    $init_array['style_formats'] = json_encode( $style_formats );  
     
    return $init_array;  
} 
add_filter( 'tiny_mce_before_init', 'aquaterias_mce_before_init_insert_formats' ); 


/**
 * Config used for lt-ext plugin to set Visual Composer configuration
 */
add_filter( 'ltx_get_vc_config', 'aquaterias_vc_config', 10, 1 );
function aquaterias_vc_config( $value ) {

    return array(
    	'sections'	=>	array(
			esc_html__("Row with 5 Columns", 'aquaterias') 		=> "row-5-cols",
			esc_html__("Homepage Icons", 'aquaterias') 		=> "homepage-icons",			
			esc_html__("Background Hidden on mobile", 'aquaterias') 		=> "bg-mobile-hide",			
			esc_html__("Displaced floating section", 'aquaterias') 		=> "displaced-top",			
		),
		'background' => array(
			esc_html__( "Theme Main Color", 'aquaterias' ) => "theme_color",
			esc_html__( "Second Color", 'aquaterias' ) => "second",			
			esc_html__( "Gray", 'aquaterias' ) => "gray",
			esc_html__( "White", 'aquaterias' ) => "white",
			esc_html__( "Black", 'aquaterias' ) => "black",			
			esc_html__( "Black Dark", 'aquaterias' ) => "black-dark",			
			esc_html__( "Black to Main Gradient", 'aquaterias' ) => "gradient",
		),
		'overlay'	=> array(
			esc_html__( "Pattern Waves", 'aquaterias' ) => "waves",
			esc_html__( "Dark Overlay", 'aquaterias' ) => "dark",
		),

	);
}

/**
 * Additional styles init
 */
function aquaterias_css_style() {

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap-grid.css', array(), '1.0' );

	wp_enqueue_style( 'aquaterias-plugins', get_template_directory_uri() . '/assets/css/plugins.css', array(), '1.0' );

	wp_enqueue_style( 'aquaterias-theme-style', get_stylesheet_uri(), array( 'bootstrap', 'aquaterias-plugins' ), wp_get_theme()->get('Version') );

	if ( function_exists( 'fw_get_db_settings_option' ) ){

		$heading_bg = fw_get_db_settings_option( 'heading_bg' );
		if (! empty( $heading_bg ) ) {

			wp_add_inline_style( 'aquaterias-theme-style', '.heading.bg-image { background-image: url(' . esc_attr( $heading_bg['url'] ) . ') !important; } ' );
		}

		$header_bg = fw_get_db_settings_option( 'header_bg' );
		$featured_bg = fw_get_db_settings_option( 'featured_bg' );
		if (! empty( $header_bg ) ) {

 			$bg_id = get_post_thumbnail_id();
			$bg_src = wp_get_attachment_image_src( $bg_id, 'full', false );
			if ( is_page() && has_post_thumbnail()) {

				wp_add_inline_style( 'aquaterias-theme-style', '.page-header { background-image: url(' . esc_attr( $bg_src[0] ) . ') !important; } ' );
			}
				else
			if ( !is_single() && has_post_thumbnail() && $featured_bg == 'enabled') {

				wp_add_inline_style( 'aquaterias-theme-style', '.page-header { background-image: url(' . esc_attr( $bg_src[0] ) . ') !important; } ' );
			}
				else {

				wp_add_inline_style( 'aquaterias-theme-style', '.page-header { background-image: url(' . esc_attr( $header_bg['url'] ) . ') !important; } ' );
			}

		}

		$footer_bg = fw_get_db_settings_option( 'footer_bg' );
		if (! empty( $footer_bg ) ) {

			wp_add_inline_style( 'aquaterias-theme-style', '#block-footer { background-image: url(' . esc_attr( $footer_bg['url'] ) . ') !important; } ' );
		}

		$bg_404 = fw_get_db_settings_option( '404_bg' );
		if (! empty( $bg_404 ) ) {

			wp_add_inline_style( 'aquaterias-theme-style', 'body.error404 { background-image: url(' . esc_attr( $bg_404['url'] ) . ') !important; } ' );
		}

		$go_top_img = fw_get_db_settings_option( 'go_top_img' );
		if (! empty( $go_top_img ) ) {

			wp_add_inline_style( 'aquaterias-theme-style', '.go-top:before { background-image: url(' . esc_attr( $go_top_img['url'] ) . ') !important; } ' );
		}


		$pace = fw_get_db_settings_option( 'page-loader' );

		if ( !empty($pace) AND !empty($pace['loader']) AND !empty($pace['image']['loader_img'])) {

			wp_add_inline_style( 'aquaterias-theme-style', '.paceloader-image .pace-image { background-image: url(' . esc_attr( $pace['image']['loader_img']['url'] ) . ') !important; } ' );
		}

		$logo_height = fw_get_db_customizer_option('logo_height');
		if ( !empty($logo_height) ) {

			wp_add_inline_style( 'aquaterias-theme-style', 'nav.navbar .logo img { max-height: '.esc_attr($logo_height).'px !important; } ' );			
		}

	}
}
add_action( 'wp_enqueue_scripts', 'aquaterias_css_style' );



/**
 * Register widget areas.
 *
 */
function aquaterias_action_theme_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Default', 'aquaterias' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Appears in the right/left section of the site.', 'aquaterias' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="header-widget">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar WooCommerce', 'aquaterias' ),
		'id'            => 'sidebar-wc',
		'description'   => esc_html__( 'Appears in the right/left section of the site.', 'aquaterias' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="header-widget">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'aquaterias' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Appears in the footer section of the site.', 'aquaterias' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="header-widget">',
		'after_title'   => '</h4>',
	) );			

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'aquaterias' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Appears in the footer section of the site.', 'aquaterias' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="header-widget">',
		'after_title'   => '</h4>',
	) );			

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'aquaterias' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Appears in the footer section of the site.', 'aquaterias' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="header-widget">',
		'after_title'   => '</h4>',
	) );			

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 4', 'aquaterias' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Appears in the footer section of the site.', 'aquaterias' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="header-widget">',
		'after_title'   => '</h4>',
	) );			

}

add_action( 'widgets_init', 'aquaterias_action_theme_widgets_init' );

