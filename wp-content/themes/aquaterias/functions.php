<?php

/**
 * Theme Includes
 */
require_once get_template_directory() . '/inc/init.php';
require_once get_template_directory() . '/inc/theme-config.php';

/**
 * Theme defaults
 */

add_theme_support( 'title-tag' );

/**
 * TGM Plugin Activation
 */
{
	require_once get_template_directory() . '/tgm-plugin-activation/class-tgm-plugin-activation.php';

	/** @internal */
	function aquaterias_action_theme_register_required_plugins() {

		$config = array(
			'id'           => 'aquaterias',
			'menu'         => 'aquaterias-install-plugins',
			'parent_slug'  => 'themes.php',
			'capability'   => 'edit_theme_options',
			'has_notices'  => true,
			'dismissable'  => true,
			'is_automatic' => false,
		);

		tgmpa( array(

			array(
			'name'      => esc_html__('LT Extension', 'aquaterias'),
			'slug'      => 'lt-ext',
			'source'   	=> get_template_directory() . '/inc/plugins/lt-ext.zip',
			'required'  => true,
			'version'  => '1.7.6',
			),
			array(
			'name'      => esc_html__('WPBakery Page Builder', 'aquaterias'),
			'slug'      => 'js_composer',
			'source'   	=> 'http://updates.like-themes.com/plugins/js_composer_6.zip',
			'required'  => true,
			),				
			array(
			'name'             => esc_html__('Envato Market', 'aquaterias'),
			'slug'             => 'envato-market',
			'source'   	=> get_template_directory() . '/inc/plugins/envato-market.zip',
			'required'         => false,
			),						
			array(
			'name'      => esc_html__('Breadcrumb-navxt', 'aquaterias'),
			'slug'      => 'breadcrumb-navxt',
			'required'  => false,
			),
			array(
			'name'      => esc_html__('Contact Form 7', 'aquaterias'),
			'slug'      => 'contact-form-7',
			'required'  => true,
			),
			array(
			'name'      => esc_html__('The Events Calendar', 'aquaterias'),
			'slug'      => 'the-events-calendar',
			'required'  => false,
			),				
			array(
			'name'      => esc_html__('Post-views-counter', 'aquaterias'),
			'slug'      => 'post-views-counter',
			'required'  => false,
			),
			array(
			'name'      => esc_html__('Unyson', 'aquaterias'),
			'slug'      => 'unyson',
			'required'  => true,
			),
			array(
			'name'             => esc_html__('MailChimp for WordPress', 'aquaterias'),
			'slug'             => 'mailchimp-for-wp',
			'required'         => false,
			),		
			array(
			'name'             => esc_html__('WooCommerce', 'aquaterias'),
			'slug'             => 'woocommerce',
			'required'         => false,
			),
		), $config);

	}
	add_action( 'tgmpa_register', 'aquaterias_action_theme_register_required_plugins' );
}

/**
 * Includes template part, allowing to pass variables
 */
function aquaterias_get_template_part( $slug, $name = null, array $aquaterias_params = array() ) {

	/* list of allowable includes */
	$allow = array('tmpl/content-ltx-gallery');

	$slug = $slug;
	if ( ! is_null( $name ) ) {

		$slug .= '-' . $name;
	}

	if (in_array($slug, $allow) AND file_exists(get_template_directory() . '/' . $slug . '.php')) include( get_template_directory() . '/' . $slug . '.php' );

}

/**
 * Single comment function
 */
if ( ! function_exists( 'aquaterias_single_comment' ) ) {
	function aquaterias_single_comment( $comment, $args, $depth ) {

		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) {
			case 'pingback' :
				?>
				<li class="trackback"><?php esc_html_e( 'Trackback:', 'aquaterias' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__( 'Edit', 'aquaterias' ), '<span class="edit-link">', '<span>' ); ?>
				<?php
				break;
			case 'trackback' :
				?>
				<li class="pingback"><?php esc_html_e( 'Pingback:', 'aquaterias' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__( 'Edit', 'aquaterias' ), '<span class="edit-link">', '<span>' ); ?>
				<?php
				break;
			default :
				$author_id = $comment->user_id;
				$author_link = get_author_posts_url( $author_id );
				?>
				<li id="comment-<?php comment_ID(); ?>" <?php comment_class( 'comment_item' ); ?>>
					<div class="comment-single">
						<div class="comment-author-avatar"><?php echo get_avatar( $comment, 45 ); ?></div>
						<div class="comment-content">
							<div class="comment-info">
	                            <?php echo esc_html__( 'by', 'aquaterias' );?> <span class="comment-author"><?php echo ( ! empty( $author_id ) ? '<a href="' . esc_url( $author_link ) . '">' : '') . comment_author() . ( ! empty( $author_id ) ? '</a>' : ''); ?></span><span class="hidden-ms hidden-xs"> | </span>
	                            <span class="comment-date-time"><span class="comment-date"><span class="comment_date_label hidden-ms hidden-xs"><?php esc_html_e( 'Posted', 'aquaterias' ); ?></span> <span class="comment_date_value"><?php echo get_comment_date( get_option( 'date_format' ) ); ?></span></span><span class="hidden-ms hidden-xs"> | </span>
	                            <span class="comment-time"><?php echo get_comment_date( get_option( 'time_format' ) ); ?></span></span>
							</div>
							<div class="comment_text_wrap">
								<?php if ( $comment->comment_approved == 0 ) { ?>
								<div class="comment_not_approved"><?php esc_html_e( 'Your comment is awaiting moderation.', 'aquaterias' ); ?></div>
								<?php } ?>
								<div class="comment-text"><?php comment_text(); ?></div>
							</div>
							<?php if ( $depth < $args['max_depth'] ) { ?>
								<div class="comment-reply"><?php comment_reply_link( array_merge( $args, array(
									'depth' => $depth,
									'max_depth' => $args['max_depth'],
								) ) ); ?></div>
							<?php } ?>
						</div>
					</div>
				<?php
				break;
		}
	}
}


/**
 * Print H1 header
*/
if ( ! function_exists( 'aquaterias_the_h1' ) ) {

	function aquaterias_the_h1() {

		global $wp_query;

		if ( function_exists('FW') ) {

			if ( aquaterias_is_wc('product') ) {

				$wc_h1 = fw_get_db_settings_option( 'hide_wc_h1' );
				if ( (empty($wc_h1) OR $wc_h1 != 'disabled') ) {

					$title = aquaterias_get_the_h1();
					if ( !empty($title) ) echo '<h1>' . esc_html( $title ) . '</h1>';
				}
			}
				else {

				$h1 = fw_get_db_post_option( $wp_query->get_queried_object_id(), 'hide_h1' );
				if ( $h1 != 'disabled' ) {

					$title = aquaterias_get_the_h1();
					if ( !empty($title) ) echo '<h1>' . esc_html( $title ) . '</h1>';
				}
			}
		}
			else {

			$title = aquaterias_get_the_h1();
			if ( !empty($title) ) echo '<h1>' . esc_html( $title ) . '</h1>';
		}
	}
}

if ( !function_exists( 'aquaterias_get_the_h1' ) ) {

	function aquaterias_get_the_h1() {

		global $wp_post;
		
		if ( is_home() ) {

			$title = esc_html__( 'All Blog Posts', 'aquaterias' );
		} 
			else
		if ( is_front_page() ) {

			$title = esc_html__( 'Home', 'aquaterias' );
		}
			else
		if ( is_year() ) {

			$title = sprintf( esc_html__( 'Year Archives: %s', 'aquaterias' ), get_the_date( 'Y' ) );
		}
			else				
		if ( is_month() ) {

			$title = sprintf( esc_html__( 'Month Archives: %s', 'aquaterias' ), get_the_date( 'F Y' ) );
		}
			else
		if ( is_day() ) {

			$title = sprintf( esc_html__( 'Day Archives: %s', 'aquaterias' ), get_the_date() );
		}
			else
		if ( is_category() ) {

			$title = single_cat_title( '', false );
		}
			else
		if ( is_tag() ) {

			$title = sprintf( esc_html__( 'Tag: %s', 'aquaterias' ), single_tag_title( '', false ) );
		}
			else
		if ( is_tax() ) {

			$title = single_term_title( '', false );
		}
			else
		if ( is_search() ) {

			$title = sprintf( esc_html__( 'Search Results: %s', 'aquaterias' ), get_search_query() );
		} 
			else				
		if ( is_author() ) {

			if ( !empty( get_query_var( 'author_name' ) ) ) {

				$q = get_user_by( 'slug', get_query_var( 'author_name' ) );
			}
				else {

				$q = get_userdata( get_query_var( 'author' ) );
			}

			$title = sprintf( esc_html__( 'Author: %s', 'aquaterias' ), $q->display_name );
		} 
			else
		if ( is_post_type_archive() ) {

			$q   = get_queried_object();
			$title = '';
			if ( !empty( $q->labels->all_items ) ) {

				$title = $q->labels->all_items;
			}
		}
			else
		if ( is_attachment() ) {

			$title = sprintf( esc_html__( 'Attachment: %s', 'aquaterias' ), get_the_title() );
		}
			else
		if ( is_404() ) {

			$title = esc_html__( '404 Not Found', 'aquaterias' );
		}
			else {

			$title = get_the_title();
		}

		return $title;
	}
}



/**
 * Adds custom post type active item in menu
 */
add_action( 'nav_menu_css_class', 'aquaterias_add_current_nav_class', 10, 2 );
function aquaterias_add_current_nav_class( $classes, $item ) {

	// Getting the current post details
	global $post, $wp;

	$id = ( isset( $post->ID ) ? get_the_ID() : null );

	if ( isset( $id ) ) {

		// Getting the post type of the current post
		$current_post_type = get_post_type_object( get_post_type( $post->ID ) );
		if (!empty($current_post_type->rewrite['slug'])) $current_post_type_slug = $current_post_type->rewrite['slug']; else $current_post_type_slug = '';

		$home_url = parse_url( esc_url( home_url( add_query_arg( array(), $wp->request ) ) ) );
		if (isset($home_url['path'])) $current_url = esc_url( str_replace( '/', '', $home_url['path'] ) ); else $current_url = esc_url( home_url( '/' ) );
		$menu_slug = strtolower( trim( $item->url ) );

		if ( !empty($current_post_type_slug) && strpos( $menu_slug,$current_post_type_slug ) !== false && $current_url != '#' && $current_url != '' && $current_url === str_replace( '/', '', parse_url( $item->url, PHP_URL_PATH ) ) ) {

			$classes[] = 'current-menu-item';

		} else {

			$classes = array_diff( $classes, array( 'current_page_parent' ) );
		}
	}

	if ( get_post_type() != 'post' && $item->object_id == get_site_option( 'page_for_posts' ) ) {

		$classes = array_diff( $classes, array( 'current_page_parent' ) );
	}

	return $classes;
}


/**
 * Manual excerpt generation
 */
function aquaterias_excerpt( $content, $excerpt = 0 ) {
	global $post;

	if ( ! empty( $post->post_content ) &&
		 ! preg_match( '#<!--more-->#', $post->post_content ) &&
		 ! preg_match( '#<!--nextpage-->#', $post->post_content ) &&
		 ! preg_match( '#twitter.com#', $post->post_content ) &&
		 ! preg_match( '#wp-caption#', $post->post_content ) &&
		 ! preg_match( '#embed#i', $post->post_content ) &&
		 ! preg_match( '#iframe#i', $post->post_content )
		) {
		$content = aquaterias_cut_excerpt( $post->post_content , $excerpt );
	}

	return $content;
}

function aquaterias_cut_excerpt( $content = '', $excerpt = 0 ) {

	$cut = false;
	$excerpt_more = apply_filters( 'excerpt_more', ' ...' );
	$content = aquaterias_get_content( $content );
	$texts = preg_grep( '#(<[^>]+>)|(<\/[^>]+>)#s', $content, PREG_GREP_INVERT );
	$total_length = count( preg_split( '//u', implode( '', $texts ), - 1, PREG_SPLIT_NO_EMPTY ) );
	if ( function_exists( 'fw' ) ) {
		$excerpt_set = (int) fw_get_db_settings_option( 'excerpt_auto' );
	} else {
		$excerpt_set = 0;
	}

	if ( $excerpt_set == 0 ) {

		$excerpt_set = 255;
	}

	$excerpt_length = (int) apply_filters( 'excerpt_length', $excerpt_set );

	foreach ( $texts as $key => $text ) {

		$text = preg_split( '//u', $text, - 1, PREG_SPLIT_NO_EMPTY );
		$text = array_slice( $text, 0, $excerpt_length );
		$excerpt_length = $excerpt_length - count( $text );
		$cut = $key;

		if ( 0 >= $excerpt_length ) {
			$content[ $key ] = $texts[ $key ] = implode( '', $text );
			break;
		}
	}

	if ( false !== $cut ) {
		array_splice( $content, $cut + 1 );
	}

	$content = aquaterias_strip_tags( $texts, $cut );

	$content = implode( ' ', $content );

	$content = preg_replace( '/<\/p>/', '', $content );

	if ( $total_length > $excerpt_length ) {
		$content .= $excerpt_more;
	}

	return wp_kses_post( $content );
}

/**
 * Cuts text by the number of characters
 */
if ( !function_exists( 'aquaterias_cut_text' ) ) {

	function aquaterias_cut_text( $text, $cut = 300, $aft = ' ...' ) {
		if ( empty( $text ) ) {
			return null;
		}

		if ( empty($cut) AND function_exists( 'fw' ) ) {
			$cut = (int) fw_get_db_settings_option( 'excerpt_wc_auto' );
		}

		$text = wp_strip_all_tags( $text, true );
		$text = strip_tags( $text );
		$text = preg_replace( "/<p>|<\/p>|<br>|(( *&nbsp; *)|(\s{2,}))|\\r|\\n/", ' ', $text );
		if ( function_exists('mb_substr') AND  function_exists('mb_strripos') AND mb_strlen( $text ) > $cut ) {
			$text = mb_substr( $text, 0, $cut, 'UTF-8' );
			return mb_substr( $text, 0, mb_strripos( $text, ' ', 0, 'UTF-8' ), 'UTF-8' ) . $aft;
		} else {
			return $text;
		}
	}
}

function aquaterias_get_content( $content = '' ) {

	$result = array();
	$content = capital_P_dangit( $content );

	$content = wptexturize( $content );
	$content = convert_smilies( $content );
	$content = wpautop( $content );
	$content = prepend_attachment( $content );
	$content = strip_shortcodes( $content );
	$content = str_replace( ']]>', ']]&gt;', $content );
	$content = str_replace( array( "\r\n", "\r" ), "\n", $content );
	$content = preg_split( '#(<[^>]+>)|(<\/[^>]+>)#s', trim( $content ), - 1, PREG_SPLIT_DELIM_CAPTURE );
	$content = array_diff( $content, array( "\n", '' ) );
	$content = array_values( $content );

	foreach ( $content as $key => $value ) {
		$result[] = str_replace( array( "\r\n", "\r", "\n" ), '', $value );
	}

	return $result;
}

function aquaterias_strip_tags( $texts = array(), $cut = 0 ) {
	if ( ! is_array( $texts ) ) {
		return $texts;
	}

	$clean = array( '<p>' );

	foreach ( $texts as $key => $value ) {
		if ( $key <= $cut ) {
			$clean[] = $value;
		}
	}

	return $clean;
}

if ( !function_exists( 'aquaterias_is_wc' ) ) {
	/**
	 * Return true|false is woocommerce conditions.
	 *
	 * @param string $tag
	 * @param string|array $attr
	 *
	 * @return bool
	 */
	function aquaterias_is_wc($tag, $attr='') {
		if( !class_exists( 'woocommerce' ) ) return false;
		switch ($tag) {
			case 'wc_active':
		        return true;
			
		    case 'woocommerce':
		        if( function_exists( 'is_woocommerce' ) && is_woocommerce() ) return true;
				break;
		    case 'shop':
		        if( function_exists( 'is_shop' ) && is_shop() ) return true;
				break;
			case 'product_category':
		        if( function_exists( 'is_product_category' ) && is_product_category($attr) ) return true;
				break;
		    case 'product_tag':
		        if( function_exists( 'is_product_tag' ) && is_product_tag($attr) ) return true;
				break;
		    case 'product':
		    	if( function_exists( 'is_product' ) && is_product() ) return true;
				break;
		    case 'cart':
		        if( function_exists( 'is_cart' ) && is_cart() ) return true;
				break;
		    case 'checkout':
		        if( function_exists( 'is_checkout' ) && is_checkout() ) return true;
				break;
		    case 'account_page':
		        if( function_exists( 'is_account_page' ) && is_account_page() ) return true;
				break;
		    case 'wc_endpoint_url':
		        if( function_exists( 'is_wc_endpoint_url' ) && is_wc_endpoint_url($attr) ) return true;
				break;
		    case 'ajax':
		        if( function_exists( 'is_ajax' ) && is_ajax() ) return true;
				break;
		}

		return false;
	}
}


/**
 * Checking active status of plugin
 */
function aquaterias_plugin_is_active( $plugin_var, $plugin_dir = null ) {

	if ( empty( $plugin_dir ) ) { $plugin_dir = $plugin_var;
	}
	return in_array( $plugin_dir . '/' . $plugin_var . '.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) );
}

/**
 * Adding custom stylesheet to admin
 */
add_action( 'admin_enqueue_scripts', 'aquaterias_admin_css' );
function aquaterias_admin_css() {

	wp_enqueue_style( 'aquaterias-admin-css', get_template_directory_uri() . '/css/admin.css', false, '1.0.0' );
}

/**
 * Return inverted contrast value of color
 */
function aquaterias_rgb_contrast($r, $g, $b) {

	if ($r < 128) return array(255,255,255,0.1); else return array(255,255,255,1);
}

/**
 * Lightens/darkens a given colour (hex format), returning the altered colour in hex format.7
 * @param str $hex Colour as hexadecimal (with or without hash);
 * @percent float $percent Decimal ( 0.2 = lighten by 20%(), -0.4 = darken by 40%() )
 * @return str Lightened/Darkend colour as hexadecimal (with hash);
 */
function aquaterias_color_change( $hex, $percent ) {
	
	$hex = preg_replace( '/[^0-9a-f]/i', '', $hex );
	$new_hex = '#';
	
	if ( strlen( $hex ) < 6 ) {

		$hex = $hex[0] + $hex[0] + $hex[1] + $hex[1] + $hex[2] + $hex[2];
	}
	
	for ($i = 0; $i < 3; $i++) {

		$dec = hexdec( substr( $hex, $i*2, 2 ) );
		$dec = min( max( 0, $dec + $dec * $percent ), 255 ); 
		$new_hex .= str_pad( dechex( $dec ) , 2, 0, STR_PAD_LEFT );
	}		
	
	return $new_hex;
}

/**
 * Print html code with footer subscribe section
 */
function aquaterias_the_subscribe_block() {

	global $wp_query;

    if ( function_exists( 'FW' ) ) {

    	$subscribe_layout = 'visible';

        $subscribe_layout_global = fw_get_db_settings_option( 'subscribe' );

        if ( $subscribe_layout_global == 'visible' ) $subscribe_layout = 'visible';
            else
        if ( $subscribe_layout_global == 'hidden' ) $subscribe_layout = 'disabled';

        if ( $subscribe_layout != 'disabled' ) {

        	// If default visibility, cheking page settings
	        if ( $subscribe_layout_global == 'default' ) $subscribe_layout = fw_get_db_post_option( $wp_query->get_queried_object_id(), 'subscribe-layout' );
        	$subscribe_section = get_page_by_path( 'subscribe', OBJECT, 'sections' );
        }

        if ( !empty($subscribe_section) AND !empty($subscribe_layout) AND $subscribe_layout != 'disabled' ) {

            echo '<div class="container subscribe-block">'.do_shortcode(wp_kses_post($subscribe_section->post_content)).'</div>';
        }
    }

    return true;
}


/**
 * Return footer widget columns number and hidden widgets array
 * @return array();
 */
function aquaterias_get_footer_cols_num() {

	global $wp_query;	

	// Footer columns classes, depends total columns number
    $footer_tmpl = array(
    	4	=>	array(
    			'col-md-3 col-sm-6 col-ms-12',
    			'col-md-3 col-sm-6 col-ms-12',
    			'col-md-3 col-sm-6 col-ms-12',
    			'col-md-3 col-sm-6 col-ms-12',
    		),
    	3	=>	array(
    			'col-md-4 col-sm-6 col-ms-12',
    			'col-md-4 col-sm-6 col-ms-12',
    			'col-md-4 col-sm-6 col-ms-12',
    			'col-md-4 col-sm-6 col-ms-12',
    		),
    	2	=>	array(
    			'col-md-6 col-sm-12',
    			'col-md-6 col-sm-12',
    			'col-md-6 col-sm-12',
    			'col-md-6 col-sm-12',
    		),
    	1	=>	array(
    			'col-md-6 col-md-offset-3 text-align-center ',
    			'col-md-6 col-md-offset-3 text-align-center ',
    			'col-md-6 col-md-offset-3 text-align-center ',
    			'col-md-6 col-md-offset-3 text-align-center ',
    		),
    );	

	if ( function_exists( 'FW' ) ) {

		$col_hidden_mobile = $classes = $footer_hide = array();

	    $footer_layout = fw_get_db_post_option( $wp_query->get_queried_object_id(), 'footer-layout' );
	    if ( $footer_layout != 'disabled') {

	    	$footer_cols_num = 0;
	    	for ($x = 1; $x <= 4; $x++) {

	    		$col_hidden = fw_get_db_settings_option( 'footer_' . $x . '_hide' );
	    		if ( !$col_hidden ) {

	    			$footer_cols_num++;
	    		}
	    			else {

					$footer_hide[$x] = true;
    			}

              	$hide_mobile = fw_get_db_settings_option( 'footer_' . $x . '_hide_mobile');
            	if ( $hide_mobile ) {

            		$col_hidden_mobile[$x] = 'hidden-xs hidden-ms hidden-sm';
            	}    	
            		else {

					$col_hidden_mobile[$x] = '';
           		}
            			
	    	}

	    	for ($x = 1; $x <= 4; $x++) {

				if ( isset($footer_tmpl[$footer_cols_num][( $x - 1 )]) ) {

	        		$classes[$x] = $footer_tmpl[$footer_cols_num][( $x - 1 )];
	        	}
	        }	
	    }                
	    	else {

	        $footer_cols_num = 0;
	   	}    		

		return array(
			'num'			=>	$footer_cols_num,
			'hidden'		=>	$footer_hide,
			'hidden_mobile'	=>	$col_hidden_mobile,
			'classes'		=>	$classes,
		);
	}
		else {

		return array();
	}
}


/**
 * Get page header layout
 */
function aquaterias_get_pageheader_layout() {

	global $wp_query;

	$pageheader_layout = 'default';
	if ( function_exists( 'FW' ) ) {

		$pageheader_layout = fw_get_db_post_option( $wp_query->get_queried_object_id(), 'header-layout' );
	}

	return $pageheader_layout;	
}


/**
 * Prints pageloader overlay, if enabled
 */
function aquaterias_the_pageloader_overlay() {

	if ( function_exists( 'FW' ) ) {

		$aquaterias_pace = fw_get_db_settings_option( 'page-loader' );

		if ( !empty($aquaterias_pace) AND !empty($aquaterias_pace['loader']) AND $aquaterias_pace['loader'] != 'disabled' ) echo '<div id="preloader"></div>';
	}
}

/**
 * Print html code with topbar section
 */
function aquaterias_the_topbar_block() {

	global $wp_query;

    if ( function_exists( 'FW' ) ) {

    	$topbar_layout = 'hidden';
        $topbar_layout = fw_get_db_settings_option( 'topbar' );

        if ( $topbar_layout != 'hidden' ) {

        	$topbar_section = get_page_by_path( 'top-bar', OBJECT, 'sections' );
        }

        if ( !empty($topbar_section) ) {

        	if ($topbar_layout == 'desktop') $topbar_class = ' hidden-ms hidden-xs hidden-sm'; else $topbar_class = '';

            echo '<div class="ltx-topbar-block'.esc_attr($topbar_class).'"><div class="container">'.do_shortcode(wp_kses_post($topbar_section->post_content)).'</div></div>';
        }
    }

    return true;
}


/**
 * Bcn first crumb title
 */
add_filter('bcn_breadcrumb_title', function($title, $type, $id) {

	if ($type[0] === 'home') {
		$title = esc_html__('Home', 'aquaterias');
	}
	return $title;
}, 42, 3);


/**
 * Display image with srcset and sizes tags
 * 
 */
function aquaterias_the_img_srcset( $attachment_id, $sizes_hooks, $sizes_media ) {

	if ( !empty($attachment_id) AND !empty($sizes_hooks) AND !empty($sizes_media) ) {

		$attachment_id = get_post_thumbnail_id();

		$srcset = array();
		foreach ( $sizes_hooks as $hook ) {

			$size = wp_get_attachment_image_src( $attachment_id, $hook );
			$img = wp_get_attachment_image_url( $attachment_id, $hook );
			$srcset[] = $img .' '. $size[1].'w';
		}

		$sizes = array();
		foreach ( $sizes_media as $width => $hook ) {

			$size = wp_get_attachment_image_src( $attachment_id, $hook );
			$sizes[] = '(max-width: '.$width.') '.$size[1].'px';
		}

		$size = wp_get_attachment_image_src( $attachment_id, $sizes_hooks[0] );
		$sizes[] = $size[1].'px';

		$image_alt = get_post_meta( $attachment_id, '_wp_attachment_image_alt', true);
		$image = wp_get_attachment_image_url( $attachment_id, $sizes_hooks[0] );

		echo '<img src="'.esc_url($image).'" width="'.esc_attr($size[1]).'" height="'.esc_attr($size[2]).'" alt="'.esc_attr($image_alt).'" 
		srcset="'. esc_attr( implode(',', $srcset)) .'"
		sizes="'. esc_attr( implode(',', $sizes)) .'">';
	}
}

