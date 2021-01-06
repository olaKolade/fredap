<?php if ( ! defined( 'ABSPATH' ) ) die( 'Forbidden' );
/**
 * Services Shortcode
 */

$args = get_query_var('like_sc_services');

$class = '';
if ( !empty($args['class']) ) $class .= ' '. esc_attr($args['class']);
if ( !empty($args['id']) ) $id = ' id="'. esc_attr($args['id']). '"'; else $id = '';

if ( !empty($args['style']) ) $class .= $args['style'];

if ( !empty($args['highlight'])) {

	$class .= " highlight-".$args['highlight'];
	$header_highlight = true;
}

$query_args = array(
	'post_type' => 'services',
	'post_status' => 'publish',
	'posts_per_page' => (int)($args['limit']),
);


if ( !empty($args['cat']) ) {

	$query_args['tax_query'] = 	array(
		array(
            'taxonomy'  => 'services-category',
            'field'     => 'if', 
            'terms'     => array(esc_attr($args['cat'])),
		)
    );
}

$query = new WP_Query( $query_args );

if ( $query->have_posts() ) {

	echo '<div class="services-sc '.esc_attr($class).'  row">';

	$item_class = '';
	if ( !empty($args['per_slide']) ) {

		echo '<div class="swiper-container services-slider" data-cols="'.esc_attr($args['per_slide']).'" data-autoplay="'.esc_attr($args['autoplay']).'">
			<div class="swiper-wrapper">';		

		$item_class = ' swiper-slide';
	}		

	while ( $query->have_posts() ):

		$query->the_post();
		$link = fw_get_db_post_option(get_The_ID(), 'link');
		$duration = fw_get_db_post_option(get_The_ID(), 'duration');
		$price = fw_get_db_post_option(get_The_ID(), 'price');
?>
	<div class="col-lg-4 col-md-4 col-sm-6 <?php echo esc_attr($item_class); ?>">
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'matchHeight' ); ?>>
		    <a href="<?php echo get_the_permalink(); ?>" class="photo">
		        <?php
		        	echo wp_get_attachment_image( get_post_thumbnail_id( get_The_ID()) , 'aquaterias-service' );
		        ?>
		    </a>
		    <div class="description">
		    	<a href="<?php echo get_the_permalink(); ?>">
		    	<?php
		    		if ( !empty($header_highlight) ) {

		    			$header = explode(' ', get_the_title());
		    			$header_0 = $header[0];
		    			unset($header[0]);
						echo '<h4 class="header"><span class="color-second">'.$header_0.'</span> '.implode(' ', $header).'</h4>';
		    		}
			    		else {

						echo '<h4 class="header">'.get_the_title().'</h4>';
		    		}
		    	?>
		    	</a>
		        <div class="cut">
		        	<?php
		        		$cut = fw_get_db_post_option(get_The_ID(), 'cut');

		        		if ( !empty($cut)) {

		        			echo esc_html( $cut );
		        		}
		        			else {

							add_filter( 'the_content', 'aquaterias_excerpt' );
							the_content( esc_html__( 'Read more &rarr;', 'lt-ext' ) );
	        			}
					?>
		        </div>
		        <div class="row info">
		        	<div class="col-lg-6">
		        		<?php if ( !empty($duration) ): ?><p><span class="fa fa-calendar color-second"></span> <strong><?php echo wp_kses_post($duration); ?></strong></p><?php endif; ?>
		        		<?php if ( !empty($price) ): ?><p><span class="fa fa-money color-second"></span> <strong><?php echo wp_kses_post($price); ?></strong></p><?php endif; ?>
		        	</div>
		        	<div class="col-lg-6 align-right-lg">
			        	<a href="<?php echo get_the_permalink(); ?>" class="btn btn-xs"><?php echo esc_html__( 'more info', 'lt-ext' ); ?> </a>    
			        </div>
		        </div>
		    </div>	   	    
		</article>
	</div>
<?php
	endwhile;

	if ( !empty($args['per_slide']) ) {

		echo '</div>
		</div>
			<div class="arrows">
				<a href="#" class="arrow-left fa fa-chevron-left"></a>
				<a href="#" class="arrow-right fa fa-chevron-right"></a>
			</div>
			';
	}			

	echo '</div>';

	wp_reset_postdata();
}

