<?php if ( ! defined( 'ABSPATH' ) ) die( 'Forbidden' );
/**
 * Tariff Shortcode
 */

$args = get_query_var('like_sc_tariff');

$class = '';
if ( !empty($args['class']) ) $class .= ' '. esc_attr($args['class']);
if ( !empty($args['id']) ) $id = ' id="'. esc_attr($args['id']). '"'; else $id = '';

if ( !empty($args['layout']) ) $class .= ' layout-'.$args['layout'];
if ( $args['layout'] == 'default' ) $class .= ' matchHeight';
if ( !empty($args['vip']) ) $class .= ' vip';


echo '<div class="tariff-item item  '.esc_attr($class).'" '.$id.'>';

	if ( !empty($args['vip']) ) {

		echo '<span class="label-vip">'.esc_html($args['vip_text']).'</span>';
	}

	if ( !empty($args['image'])) {

		$image = ltx_get_attachment_img_url( $args['image'] );
		echo '<div class="image"><img src="' . $image[0] . '" class="full-width" alt="'. esc_html($args['header']) .'"></div>';
	}

	if ( !empty($args['header']) ) echo '<h4 class="header">'. esc_html($args['header']) .'</h4>';
	if ( !empty($args['price']) ) echo '<div class="price">' . wp_kses_post($args['price']) . '</div>';
	if ( !empty($args['text']) ) echo '<p>'. wp_kses_post($args['text']) .'</p>';
	if ( !empty($args['btn_header']) ) {

		$btn_color = 'btn-second';

		if ( $args['layout'] == 'default' ) {
			echo '<div><a href="'.esc_attr($args['btn_href']).'" class="btn btn-default '.esc_attr($btn_color).'">'. esc_html($args['btn_header']) .'</a></div>';
		}
	}

echo '</div>';


