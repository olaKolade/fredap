<?php if ( ! defined( 'ABSPATH' ) ) die( 'Forbidden' );
/**
 * Social Icons Shortcode
 */

$args = get_query_var('like_sc_countup');

echo '<div class="row">';
	foreach ( $atts['list'] as $k => $item ) {

		$item['header'] = str_replace(array('{{', '}}'), array('<span>', '</span>'), $item['header']);

		echo '
			<div class="col-md-3 col-sm-6 col-ms-6 col-xs-6 center-flex countUp-wrap">
				<div class=" countUp-item item matchHeight">
					<span class="h1 countUp" id="'.esc_attr( $args['id'].'-'.$k ).'">'.esc_html($item['number']).'</span>
					<h4 class="subheader">'.wp_kses_post($item['header']).'</h4>
				</div>
			</div>';
	}
echo '</div>';

