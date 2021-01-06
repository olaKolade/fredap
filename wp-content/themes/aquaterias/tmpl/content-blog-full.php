<?php
/**
 * Full blog post
 */

?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="image"><?php echo the_post_thumbnail( 'aquaterias-post' ); ?></div>

	    <div class="description">
	        <div class="text text-page">
				<?php
					the_content();
					wp_link_pages( array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'aquaterias' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
					) );
				?>
	        </div>
	    </div>	    
	    <div class="clearfix"></div>

	    <div class="blog-info font-headers">
			<?php
                echo '<ul>';

				echo '<li><span class="fa fa-calendar"></span><span class="date">'.get_the_date().'</span>';

				echo '<span class="author-by">'.esc_html__( 'by', 'aquaterias' ).' '.get_the_author_link().'</span></li>';

            	if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {

					if ( function_exists( 'pvc_post_views' ) ) {

						echo '<li class="icon-fav">
							<span class="fa fa-eye"></span> '.esc_html( strip_tags( pvc_post_views(get_the_ID(), false) ) ) .' 
						</li>';
					}
                    
                    echo '<li class="icon-comments"><span class="fa fa-commenting"></span> '. get_comments_number( '0', '1', '%' ) .'</li>';
                }
				
				if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && aquaterias_categorized_blog() ) {
					echo '<li><span class="cats"><span class="fa fa-bookmark"></span>';
					echo get_the_category_list( esc_html_x( ', ', 'Used between list items, there is a space after the comma.', 'aquaterias' ) );
					echo '</span></li>';
				}

				the_tags( '<li><span class="tags-short"><span class="fa fa-tags"></span>', ',', '</span></li>' );

                echo '</ul>';


			?>	
	    </div>	

	    <?php 
			// Previous/next post navigation.
			aquaterias_post_nav();
	    ?>

	</article>
