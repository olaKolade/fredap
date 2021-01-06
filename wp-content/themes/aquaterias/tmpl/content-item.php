	<?php
/**
 * The default template for displaying content inner item
 *
 * Used for both single and index/archive/search.
 */

?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	    <a href="<?php the_permalink(); ?>" class="photo">
	        <?php

	        	$aquaterias_layout = get_query_var( 'aquaterias_layout' );
	        	if ( !empty($aquaterias_layout) AND $aquaterias_layout == 'classic' ) {

		        	echo the_post_thumbnail('aquaterias-post' );
		        	$col_class1 = 'col-sm-6';
		        	$col_class2 = 'col-sm-6';
	        	}
	        		else {

		        	echo the_post_thumbnail();
		        	$col_class1 = 'col-lg-12';
		        	$col_class2 = 'col-lg-12';
        		}
	        ?>
	    </a>
	    <div class="description">
	        <a href="<?php esc_url( the_permalink() ); ?>" class="header"><h4><?php the_title(); ?></h4></a>
	        <div class="text text-page">
			<?php if ( is_search() ) : ?> 
				<?php
					the_excerpt();
				?>
			<?php else : ?>
				<?php
					add_filter( 'the_content', 'aquaterias_excerpt' );
					the_content( esc_html__( 'Read more &rarr;', 'aquaterias' ) );
				?>
			<?php endif; ?>
	        </div>
	        <div class="row">
	        	<div class="<?php echo esc_attr($col_class1); ?>">
				    <a href="<?php esc_url( the_permalink() ); ?>" class="blog-info font-headers">
						<?php
							echo '<span class="date ">'.get_the_date().'</span>';

			            	if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {

				                echo '<ul>';
								if ( function_exists( 'pvc_post_views' ) ) {

									echo '<li class="icon-fav">
										<span class="fa fa-eye"></span> '. esc_html( strip_tags( pvc_post_views(get_the_ID(), false) ) ) .'
									</li>';
								}
			                    
			                    	echo '<li class="icon-comments"><span class="fa fa-commenting"></span> '. get_comments_number( '0', '1', '%' ) .'</li>';
				                echo '</ul>';
			                }
						?>	
				    </a>
				</div>
				<div class="<?php echo esc_attr($col_class2); ?>">
		    		<a href="<?php esc_url( the_permalink() ); ?>" class="btn btn-xs"><?php echo esc_html__( 'Read more', 'aquaterias' );?></a>	        
		    	</div>
		    </div>
	    </div>    
	</article>
