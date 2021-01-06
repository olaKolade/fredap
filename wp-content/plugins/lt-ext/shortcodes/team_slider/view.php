<?php if ( ! defined( 'ABSPATH' ) ) die( 'Forbidden' );
/**
 * Team Shortcode
 */

$args = get_query_var('like_sc_team_sliders');

$class = '';
if ( !empty($args['class']) ) $class .= ' '. esc_attr($args['class']);
if ( !empty($args['id']) ) $id = ' id="'. esc_attr($args['id']). '"'; else $id = '';

if ( !empty($args['style']) ) $class .= $args['style'];

$query_args = array(
	'post_type' => 'team',
	'post_status' => 'publish',
	'posts_per_page' => (int)($atts['limit']),
);

if ( !empty($atts['cat']) ) {

	$query_args['tax_query'] = 	array(
		array(
            'taxonomy'  => 'team-category',
            'field'     => 'if', 
            'terms'     => array(esc_attr($atts['cat'])),
		)
    );
}

$query = new WP_Query( $query_args );

if ( $query->have_posts() ) {

	echo '<div class="team-sc '.esc_attr($class).' row">';

	while ( $query->have_posts() ):

		$query->the_post();

		$subheader = fw_get_db_post_option(get_The_ID(), 'subheader');
		$items = fw_get_db_post_option(get_The_ID(), 'items');

echo '<div class="col-md-3 col-sm-6">
	<div class="team-item item matchHeight item-type-'.esc_attr($atts['type']).' ">';

	echo '<a href="'.get_the_permalink().'" class="image">'.wp_get_attachment_image( get_post_thumbnail_id( get_The_ID()) , 'full').'</a>';
	echo '<a href="'.get_the_permalink().'"><h4>'. get_the_title() .'</h4></a>';

	if ( !empty($subheader) ) echo '<p>'. wp_kses_post($subheader) .'</p>';

	if ( !empty($items) ) {

		echo '<div class="social"><ul>';
		foreach ( $items as $item ) {

			if ( empty($item['href']) ) $item['href'] = '#';

			echo '<li><a href="'. esc_url( $item['href'] ) .'"><span class="'. esc_attr( $item['icon'] ) .'"></span></a></li>';
		}

		echo '</ul></div>';
	}

echo '</div></div>';	
?>
<?php
	endwhile;

	echo '</div>';

	wp_reset_postdata();
}

