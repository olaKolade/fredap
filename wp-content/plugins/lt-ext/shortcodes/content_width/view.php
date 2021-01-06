<?php if ( ! defined( 'ABSPATH' ) ) die( 'Forbidden' );
/**
 * ES Shortcode
 */

$class = "";
if ( !empty($args['class']) ) $class .= ' '. esc_attr($args['class']);
if ( !empty($args['id']) ) $id = ' id="'. esc_attr($args['id']). '"'; else $id = '';

$class .= " col-align-" . esc_attr($atts['align']);
$style = "";
if ( !empty($atts['max_width']) ) $style = ' style="max-width: '.esc_attr(ltx_vc_get_metric($atts['max_width'])).'"';

echo '<div class="ltx-content-width'.esc_attr($class).'"'.$id.$style.'>';
echo wp_kses_post(do_shortcode( $content ));
echo '</div>';


