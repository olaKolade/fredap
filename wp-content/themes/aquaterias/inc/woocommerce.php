<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

/**
 * Woocommerce Hooks
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

remove_action( 'woocommerce_before_shop_loop_item',	'woocommerce_template_loop_product_link_open', 10);
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);

remove_action( 'woocommerce_before_subcategory', 'woocommerce_template_loop_category_link_open', 10);
remove_action( 'woocommerce_after_subcategory',	'woocommerce_template_loop_category_link_close', 10);


add_filter( 'woocommerce_show_page_title', '__return_false' );

add_action('woocommerce_before_main_content', 'aquaterias_wc_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'aquaterias_wc_wrapper_end', 10);

if ( !function_exists( 'aquaterias_wc_wrapper_start' ) ) {
	function aquaterias_wc_wrapper_start() {

		if ( is_active_sidebar( 'sidebar-wc' ) ) {

	  		echo '<div class="inner-page margin-default"><div class="row"><div class="col-xl-9 col-xl-push-3 col-lg-8 col-lg-push-4 col-md-8 col-md-push-4 text-page">';
		}
			else {

	  		echo '<div class="inner-page margin-default"><div class="row"><div class="col-lg-12 text-page">';
		}	  

	}
}

if ( !function_exists( 'aquaterias_wc_wrapper_end' ) ) {
	function aquaterias_wc_wrapper_end() {
	  echo '</div>';
	}
}


add_action( 'woocommerce_before_subcategory_title',	'aquaterias_woocommerce_item_wrapper_start', 9 );
add_action( 'woocommerce_before_shop_loop_item_title', 'aquaterias_woocommerce_item_wrapper_start', 9 );

add_action( 'woocommerce_before_subcategory_title',	'aquaterias_woocommerce_title_wrapper_start', 20 );
add_action( 'woocommerce_before_shop_loop_item_title', 'aquaterias_woocommerce_title_wrapper_start', 20 );

add_action(    'woocommerce_after_shop_loop_item_title',	'aquaterias_woocommerce_title_wrapper_end', 7);


if ( !function_exists( 'aquaterias_woocommerce_item_wrapper_start' ) ) {

	function aquaterias_woocommerce_item_wrapper_start($cat='') {

		echo '<div class="matchHeight item">';
		?>
			<a href="<?php echo esc_url(is_object($cat) ? get_term_link($cat->slug, 'product_cat') : get_permalink()); ?>">
				<div class="image">
		<?php
	}
}



if ( !function_exists( 'aquaterias_woocommerce_title_wrapper_end' ) ) {

	function aquaterias_woocommerce_title_wrapper_end() {

		echo '</a>';		

		if ((is_shop() || is_product_category() || is_product_tag() || is_product_taxonomy()) && !is_product()) {

		    $excerpt = apply_filters('the_excerpt', get_the_excerpt());

			echo '<div class="post_content entry-content">'. wp_kses_post( aquaterias_cut_text( $excerpt, 50 ) ) .'</div>';
		}
	}
}


if ( !function_exists( 'aquaterias_woocommerce_close_item_wrapper' ) ) {

	function aquaterias_woocommerce_item_wrapper_end($cat='') {

		echo '</div>';
	}
}


if ( !function_exists( 'aquaterias_woocommerce_title_wrapper_start' ) ) {

	function aquaterias_woocommerce_title_wrapper_start($cat='') {

		echo '</div>';			
	}
}


add_filter( 'post_class', 'aquaterias_woocommerce_loop_shop_columns_class' );
add_filter( 'product_cat_class', 'aquaterias_woocommerce_loop_shop_columns_class', 10, 3 );

if ( !function_exists( 'aquaterias_woocommerce_loop_shop_columns_class' ) ) {
	function aquaterias_woocommerce_loop_shop_columns_class($classes, $class='', $cat='') {
		global $woocommerce_loop;

		return $classes;
	}
}

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
	
    add_theme_support( 'woocommerce' );

    if ( function_exists( 'fw_get_db_settings_option' ) ) $wc_zoom = fw_get_db_settings_option( 'wc_zoom' );
	if ( !empty($wc_zoom) AND $wc_zoom == 'enabled') add_theme_support( 'wc-product-gallery-zoom' );

	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );    

	$aquateriasWoocommerceNewLabel = new aquateriasWoocommerceNewLabel();
}


/*
	New Label
*/
if ( !class_exists( 'aquaterias_woocommerce_new_label' ) ) {

	class aquateriasWoocommerceNewLabel {

		public function __construct() {

			$this->settings = array(

				array(
					'id' => 'wc_nb_options',
					'type' => 'title',
					'name' => esc_html__( 'Label New', 'aquaterias' ),
				),
				array(
					'id' 		=> 'wc_new_label_days',
					'type' 		=> 'number',
					'name' 		=> esc_html__( 'Show New Products Days', 'aquaterias' ),
				),
				array(
					'type' => 'sectionend',
					'id' => 'wc_new_label_options',
				),
			);

			add_option( 'wc_new_label_days', '30' );

			add_action( 'woocommerce_settings_image_options_after', array( $this, 'aquaterias_woocommerce_admin_settings' ), 20 );
			add_action( 'woocommerce_update_options_catalog', array( $this, 'aquaterias_woocommerce_save_admin_settings' ) );
			add_action( 'woocommerce_update_options_products', array( $this, 'aquaterias_woocommerce_save_admin_settings' ) );

			add_action( 'woocommerce_before_shop_loop_item_title', array( $this, 'aquaterias_woocommerce_product_loop_new_label' ), 30 );
		}

		function aquaterias_woocommerce_product_loop_new_label() {

			$product_date = strtotime( get_the_time( 'Y-m-d' ) );

			if ( function_exists('FW') ) {

				$new_days = fw_get_db_settings_option( 'wc_new_days' );
			}
			
			$item = wc_get_product( get_the_ID() );

			if ( empty($new_days)) {

				$new_days = 0;
			}


			if ( !$item->is_on_sale() AND ( time() - ( 60 * 60 * 24 * $new_days ) ) < $product_date ) {

				echo '<span class="wc-label-new">' . esc_html__( 'New', 'aquaterias' ) . '</span>';
			}
		}

		function aquaterias_woocommerce_admin_settings() {

			woocommerce_admin_fields( $this->settings );
		}

		function aquaterias_woocommerce_save_admin_settings() {

			woocommerce_update_options( $this->settings );
		}

	}
}


function aquaterias_related_products_limit() {

	global $product;
	
	$args['posts_per_page'] = 3;
	return $args;
}

add_filter( 'woocommerce_output_related_products_args', 'aquaterias_related_products_args' );
function aquaterias_related_products_args( $args ) {
	$args['posts_per_page'] = 3;
	$args['columns'] = 2;
	return $args;
}

add_filter( 'woocommerce_add_to_cart_fragments', 'aquaterias_refresh_mini_cart_count');
function aquaterias_refresh_mini_cart_count($fragments){
    
    $out = '<span class="cart-contents header-cart-count count">'.esc_html(WC()->cart->get_cart_contents_count()).'</span>';
	$fragments['.cart-contents'] = $out;
    return $fragments;
}

